<?php
class CierredeNominaEspecial
{
  public static function Consulta($codigo,$fecult,$fecpro,&$visible,$codnomesp)
  {
  	 $c= new Criteria();
	 $c->add(NpnomcalPeer::CODNOM,$codigo);
	 $c->add(NpnomespnomtipPeer::CODNOMESP,$codnomesp);
	 $c->addJoin(NpnomcalPeer::CODNOM,NpnomespnomtipPeer::CODNOM);
	 $datos = NpnomcalPeer::doSelect($c);
	 if ($datos)
	 {
	 	$visible='0';
	    return true;
	 }
	 else
	 {
	 	$visible='1';
	    return false;
	 }
 }


  public static function Consulta2($codigo,$fecult,$fecpro,&$visible,$codnomesp)
  {
  	 $c= new Criteria();
	 $c->add(NpnomcalPeer::CODNOM,$codigo);
	 $c->add(NpnomcalPeer::CODNOMESP,$codnomesp);
	 $c->add(NpnomcalPeer::ESPECIAL,'S');
	 $c->add(NpnomcalPeer::FECNOM,$fecult,Criteria::GREATER_EQUAL);
	 $c->add(NpnomcalPeer::FECNOM,$fecpro,Criteria::LESS_EQUAL);
	 $datos = NpnomcalPeer::doSelect($c);
	 if ($datos)
	 { $visible='0';
	  return true;
	 }
	 else
	 { $visible='1';

	 return false;
	 }
 }

 public static function Validar_Fecha_Cierre($codigo, $codnomesp, $fecnomhas)
 {
 	try{
 		$c= new Criteria();
 		$c->add(NpcienomPeer::CODNOM,$codigo);
		$c->add(NpcienomPeer::CODNOMESP,$codnomesp);
		$c->add(NpcienomPeer::ESPECIAL,'S');
 		$c->add(NpcienomPeer::FECNOM,$fecnomhas);
 		$resultado= NpcienomPeer::doSelect($c);

 		if ($resultado)
 		{ return true;}else {return false;}

  } catch (Exception $ex){
     return 0;
  }
 }

 public static function procesoCierre($codnomina,$ultfec,$profec,&$msj,$codnomesp,$numsem)
 {
   if (self::generarNompag($codnomina,$ultfec,$profec,$codnomesp))
   { $msj="";
     self::cierre($codnomina,$ultfec,$profec,$codnomesp,$numsem);
     self::eliminarNpnomcal($codnomina,$codnomesp,$profec);
   }
   else
   {
     $msj='1'; //La Nómina no puede ser Cerrada
   }
 }

 public static function generarNompag($codnomina,$ultfec,$profec,$codnomesp)
 {
   self::eliminarCierre($codnomina,$ultfec,$profec,$codnomesp);
   if(self::generar($codnomina,$ultfec,$profec,$codnomesp))
   { return true;}
   else {return false;}
 }

 public static function eliminarCierre($codnomina,$ultfec,$profec,$codnomesp)
 {
 	try{
   		$dateFormat = new sfDateFormat('es_VE');
   		$ultfec = $dateFormat->format($ultfec, 'i', $dateFormat->getInputPattern('d'));

   		$c= new Criteria();
   		$c->add(NpcienomPeer::CODNOMESP,$codnomesp);
   		$c->add(NpcienomPeer::FECNOM,$ultfec);
   		$c->add(NpcienomPeer::ESPECIAL,'S');
   		$c->add(NpcienomPeer::CODNOM,$codnomina);
   		$resul= NpcienomPeer::doSelect($c);
   		if ($resul)
   		{
   	 		foreach ($resul as $update)
   	 		{
   	   			$update->delete();
   	 		}
   		}
	  } catch (Exception $ex){
	  	exit($ex);
     	return 0;
  	}

 }

 public static function generar($codnomina,$ultfec,$profec,$codnomesp)
 {
   try{
   $dateFormat = new sfDateFormat('es_VE');
   $ultfec = $dateFormat->format($ultfec, 'i', $dateFormat->getInputPattern('d'));
   $profec = $dateFormat->format($profec, 'i', $dateFormat->getInputPattern('d'));

   $variable=array();

   $c= new Criteria();
   $c->add(NpnomcalPeer::CODNOM,$codnomina);
   $c->add(NpnomcalPeer::CODNOMESP,$codnomesp);
   $c->add(NpnomcalPeer::FECNOMESPDES,$ultfec);
   $c->add(NpnomcalPeer::FECNOMESPHAS,$profec);
   $c->add(NpnomcalPeer::ESPECIAL,'S');
   $c->add(NpnomcalPeer::SALDO,0,Criteria::NOT_EQUAL);
   $c->add(NpnomcalPeer::CODCON,'XXX',Criteria::NOT_EQUAL);
   $resultados= NpnomcalPeer::doSelect($c);

//H::printR($resultados);
  // exit('11');

   if ($resultados)
   {
   	foreach ($resultados as $npnomcal)
   	{
   	 $sql="Select A.codemp as codemp,A.codcar as codcar,A.codnom as codnom,A.codcat as codcat,A.fecasi as fecasi,A.nomemp as nomemp,A.nomcar as nomcar,A.nomnom as nomnom,A.nomcat as nomcat,A.unieje as unieje,A.sueldo as sueldo,A.status as status,A.nronom as nronom,A.montonomina as montonomina,A.codtip as codtip,A.codtipgas as codtipgas,A.codniv as codniv,A.grado as grado,A.paso as paso,
      C.codban as codigobancario,
      C.codban, C.codtippag, C.cedemp
      From NPAsiCarEmp A,NPHOJINT C Where
      A.CodNom = '".$npnomcal->getCodnom()."' And
      A.CodCar = '" .$npnomcal->getCodcar()."'   And
      A.CodEmp = '" .$npnomcal->getCodemp()."' And
      A.Status = 'V' And A.CODEMP = C.CODEMP";

   	 if (Herramientas::BuscarDatos($sql,&$result))
	 {
	   $b= new Criteria();
	   $b->add(NpdefcptPeer::CODCON,$npnomcal->getCodcon());
	   $dato= NpdefcptPeer::doSelectOne($b);
	   if ($dato)
	   {
	   	 $a= new Criteria();
	   	 $a->add(NpasiparconPeer::CODNOM,$npnomcal->getCodnom());
	   	 $a->add(NpasiparconPeer::CODCAR,$npnomcal->getCodcar());
	   	 $a->add(NpasiparconPeer::CODCON,$npnomcal->getCodcon());
	   	 $dato1= NpasiparconPeer::doSelectOne($a);
	   	 if ($dato1)
	   	 { $partida=$dato1->getCodpar();}
	   	 //else { $partida=$dato->getCodpar();}
         else
	   	 {
	         $cri= new Criteria();
		   	 $cri->add(NpasicodprePeer::CODNOM,$npnomcal->getCodnom());
		   	 $cri->add(NpasicodprePeer::CODCON,$npnomcal->getCodcon());
		   	 $resul= NpasicodprePeer::doSelectOne($cri);
		   	 if ($resul)
		   	 { $partida=$resul->getCodpre();}
		   	 else
		   	   { $partida=$dato->getCodpar();}
	   	 }//else if $dato1

        /*  integracion con presupuesto*/
	   	 $p= new Criteria();
	   	 $p->add(NpconceptoscategoriaPeer::CODCON,$npnomcal->getCodcon());
	   	 $dato2=NpconceptoscategoriaPeer::doSelectOne($p);
	   	 if ($dato2)
	   	 { $categoria=$dato2->getCodcat();}
	   	 else
	   	 {
	   	 	$f=new Criteria();
	   	 	$f->add(NpasicatconempPeer::CODEMP,$npnomcal->getCodemp());
	   	 	$f->add(NpasicatconempPeer::CODCAR,$npnomcal->getCodcar());
	   	 	$f->add(NpasicatconempPeer::CODNOM,$npnomcal->getCodnom());
	   	 	$f->add(NpasicatconempPeer::CODCON,$npnomcal->getCodcon());
	   	 	$dato3= NpasicatconempPeer::doselectOne($f);
	   	 	if ($dato3)
	   	 	{
	   	 		$categoria=$dato3->getCodcat();}
	   	 	else {
	   	 		$categoria=$result[0]['codcat'];}
	   	 }
	   	 $codpre=$categoria.'-'.$partida;

	   	 if (($dato->getOrdpag()=='S' && $dato->getImpcpt()=='S' && ($dato->getOpecon()=='A' || $dato->getOpecon()=='D'))||($dato->getOrdpag()=='S' && $dato->getOpecon()=='P'))
	   	 {
	   	 	$genord=true;
	   	 }else {$genord=false;}

	   	 if ($genord==true)
	   	 {
	   	   $s= new Criteria();
	   	   $s->add(CpdeftitPeer::CODPRE,$codpre);
	   	   $data=CpdeftitPeer::doSelectOne($s);
	   	   if ($data)
	   	   {
	   	   	 $t= new Criteria();
	   	   	 $t->add(NpcienomPeer::ESPECIAL,'S');
	   	   	 $t->add(NpcienomPeer::CODNOMESP,$codnomesp);
	   	   	 $t->add(NpcienomPeer::CODTIPGAS,$result[0]['codtipgas']);
	   	   	 $t->add(NpcienomPeer::CODPRE,$codpre);
	   	   	 $t->add(NpcienomPeer::CODCON,$npnomcal->getCodcon());
	   	   	 $t->add(NpcienomPeer::CODNOM,$codnomina);
	   	   	 $t->add(NpcienomPeer::ASIDED,$npnomcal->getAsided());
	   	   	 $t->add(NpcienomPeer::FECNOM,$npnomcal->getFecnom());
	   	   	 $t->add(NpcienomPeer::CODBAN,$result[0]['codigobancario']);
	   	   	 $resultado=NpcienomPeer::doSelectOne($t);
	   	   	 if (count($resultado)>0)
	   	   	 {
	   	       $resultado->setMonto($resultado->getMonto() + $npnomcal->getSaldo());
	   	       $variable[]=$resultado;
	   	   	 }
	   	   	 else
	   	   	 {
	   	   	 	$npcienom = new Npcienom();
	   	   	 	$npcienom->setCodnom($npnomcal->getCodnom());
	   	   	 	$npcienom->setCodcon($npnomcal->getCodcon());
	   	   	 	$npcienom->setFecnom($npnomcal->getFecnom());
	   	   	 	$npcienom->setEspecial($npnomcal->getEspecial());
	   	   	 	$npcienom->setCodnomesp($npnomcal->getCodnomesp());
	   	   	 	$npcienom->setCodpre($codpre);
	   	   	 	$npcienom->setCodcta('1');
	   	   	 	$npcienom->setMonto($npnomcal->getSaldo());
	   	   	 	$npcienom->setCantidad($npnomcal->getCantidad());
	   	   	 	$npcienom->setAsided($npnomcal->getAsided());
	   	   	 	$npcienom->setCodtipgas($result[0]['codtipgas']);
	   	   	 	$npcienom->setCodban($result[0]['codigobancario']);
	   	   	 	$variable[]=$npcienom;
	   	   	 }
	   	   }
	   	 }
	   }
	 }
   	}
   	foreach ($variable as $grabar)
   	{
   	 $grabar->save();
    }
    unset($npnomcal);
    unset($result);
    unset($dato);
    unset($dato1);
    unset($dato2);
    unset($dato3);
    unset($data);
    unset($resultado);
    unset($grabar);
   	return true;
   	} else {return false;}

	  } catch (Exception $ex){
	  	exit($ex);
     	return 0;
  	}

 }

 public static function cierre($codnomina,$ultfec,$profec,$codnomesp,$numsem)
 {
 	try{
		//Para Conceptos que no estan asociados a Categorias Especiales
		$sql1 = "INSERT INTO NPHISCON (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
			     codnomesp, nomnomesp, codban, nomban, cuenta_banco, nomemp, cedemp, nomcar, desniv, nomcat, numsem)
			     (SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),' ',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,
					A.CANTIDAD,A.FECNOMDES,A.ESPECIAL,A.FECNOMESPDES,A.FECNOMESPHAS,A.CODNOMESP,A.NOMNOMESP,
					D.CODBAN,E.NOMBAN,G.CUENTA_BANCO,D.NOMEMP,D.CEDEMP,F.NOMCAR,H.DESNIV,B.NOMCAT,'".$numsem."'
					FROM NPNOMCAL A ,NPHOJINT D left outer join NPEMPLEADOS_BANCO G on D.CODEMP=G.CODEMP AND
					D.CODBAN=G.CODBAN and G.CodNom='".$codnomina."' left outer join NPESTORG H on D.CODNIV=H.CODNIV
					,NPASICAREMP B,NPDEFCPT C,NPBANCOS E,NPCARGOS F
					WHERE
					A.CODNOMESP='".$codnomesp."' AND A.ESPECIAL='S' AND A.CODNOM='".$codnomina."' AND   B.STATUS='V' AND
					A.SALDO>0 AND A.CODNOM=B.CODNOM AND
					A.CODEMP=B.CODEMP AND
					A.CODNOM=B.CODNOM AND
					A.CODCAR=B.CODCAR AND
					A.CODCON=C.CODCON AND
					A.CODEMP=D.CODEMP AND A.CODCON NOT IN (SELECT CODCON FROM NPCONCEPTOSCATEGORIA) AND
					D.CODBAN=E.CODBAN AND
					A.CodCar = F.CodCar)";

//exit($sql1);
  Herramientas::insertarRegistros($sql1);


		//Para Conceptos que estan asociados a Categorias Especiales
		$sql2 = "INSERT INTO NPHISCON (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
			     codnomesp, nomnomesp, codban, nomban, cuenta_banco, nomemp, cedemp, nomcar, desniv, nomcat, numsem)
				 (SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),' ',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,
					A.CANTIDAD, A.FECNOMDES, A.ESPECIAL,A.FECNOMESPDES,A.FECNOMESPHAS,A.CODNOMESP,A.NOMNOMESP,D.CODBAN,F.NOMBAN,H.CUENTA_BANCO,
					D.NOMEMP,D.CEDEMP,G.NOMCAR,I.DESNIV,
					B.NOMCAT,'".$numsem."'
					FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D left outer join NPEMPLEADOS_BANCO H on D.CODEMP = H.CODEMP AND D.CODBAN = H.CODBAN and H.codnom='".$codnomina."' left outer join NPESTORG I on D.CODNIV=I.CODNIV ,NPCONCEPTOSCATEGORIA E,NPBANCOS F,NPCARGOS G
					WHERE  A.CODNOMESP='".$codnomesp."' AND ESPECIAL='N' AND A.CODNOM='".$codnomina."' AND  B.STATUS='V' AND
					A.SALDO>0 AND A.CODNOM=B.CODNOM AND A.CODEMP=B.CODEMP AND
					A.CODEMP=D.CODEMP AND A.CODCAR=B.CODCAR AND
					A.CODCAR=G.CODCAR AND
					A.CODCON=E.CODCON AND
					A.CODCON=C.CODCON AND
					D.CODBAN=F.CODBAN)";
//exit($sql2);
    Herramientas::insertarRegistros($sql2);

//Inicialización de Conceptos
  $sql4 = "Update npasiconemp
             Set Acumulado = npasiconemp.Acumulado + coalesce(NPNOMCAL.Saldo, 0)
             From NPNOMCAL
             Where npnomcal.codemp=npasiconemp.codemp and
                   npnomcal.codcar=npasiconemp.codcar and
                   npnomcal.codcon=npasiconemp.codcon and
                   npnomcal.codnomesp='".$codnomesp."' and
                   npnomcal.especial='S' and
                   npnomcal.codnom='".$codnomina."' and
                   Npasiconemp.codcon not in (select codcon from nptippre)";
 Herramientas::insertarRegistros($sql4);

  $sql4="update npasiconemp set monto=0, cantidad=0 where codemp||codcar||codcon in (select a.codemp ||a.codcar||b.codcon from npasicaremp a,npnomcal d,npdefmov b,npdefcpt c where b.codnom=d.codnom and b.codcon=d.codcon and b.codnom='".$codnomina."' and
  c.inimon='S' and b.codcon=c.codcon and a.codnom=b.codnom and d.codnomesp='".$codnomesp."' and d.especial='S'  AND a.status='V')";

 Herramientas::insertarRegistros($sql4);
 
 #SI LA NOMINA ES DE INTERESES DE PRESTACIONES AGREGAMOS EL REGISTRO EN NPADEINT

 $sqlade="INSERT INTO NPADEINT(CODCON,CODEMP,FECADE,MONADE,FECSOLADE)
			(select C.CODTIPCON,A.CODEMP,A.FECNOMESPHAS,A.MONTO,A.FECNOMESPHAS
			from NPNOMCAL A, NPNOMESPTIPOS B, NPASIEMPCONT C WHERE A.CODNOM='$codnomina' AND A.CODNOMESP='$codnomesp' AND A.ESPECIAL='S'
			AND COALESCE(B.NOMINTPRE,'N')='S'
			AND A.CODNOMESP=B.CODNOMESP
			AND A.CODEMP=C.CODEMP AND STATUS='A'
			)";
			
 Herramientas::insertarRegistros($sqlade);			

//Actualización de Prestamos
   $sql5="select * from Nptippre where codcon in (select codcon from npnomcal where codnom='".$codnomina."' and codnomesp='".$codnomesp."' and especial='S')";
   if (Herramientas::BuscarDatos($sql5,&$resul5))
   {
	 foreach ($resul5 as $regnew5)
	 {
	 	$c= new Criteria();
	 	$c->add(NpasiconempPeer::CODCON,$regnew5['codcon']);
	 	$c->addAscendingOrderByColumn(NpasiconempPeer::CODEMP);
	 	$reg2= NpasiconempPeer::doSelect($c);
	 	if ($reg2)
	 	{
	 		foreach ($reg2 as $npasiconemp)
	 		{
	 		  $d= new Criteria();
	 	      $d->add(NpnomcalPeer::CODNOM,$codnomina);
	   	   	  $d->add(NpnomcalPeer::ESPECIAL,'S');
	   	   	  $d->add(NpnomcalPeer::CODNOMESP,$codnomesp);
	 	      $d->add(NpnomcalPeer::CODEMP,$npasiconemp->getCodemp());
	 	      $d->add(NpnomcalPeer::CODCAR,$npasiconemp->getCodcar());
	 	      $d->add(NpnomcalPeer::CODCON,$npasiconemp->getCodcon());
	 	      $reg3=NpnomcalPeer::doSelectOne($d);
	 	      if ($reg3)
	 	      {
	 	      	$monpre=$reg3->getSaldo();
	 	      	$saldo=$npasiconemp->getAcumulado()-$reg3->getSaldo();
	 	      	$npasiconemp->setAcumulado($saldo);
	 	      	if ($saldo<0)
	 	      	{
	 	      	  $monpre=$npasiconemp->getAcumulado()-$reg3->getSaldo();
	 	      	  $saldo=0;
	 	      	  $npasiconemp->setCantidad(0);
	 	      	  $npasiconemp->setAcumulado(0);
	 	      	}
	 	      	else
	 	      	{
	 	      	  if ($saldo<=$monpre)
	 	      	  {
	 	      	  	$npasiconemp->setCantidad($saldo);
	 	      	  }
	 	      	}
	 	      	$npasiconemp->save();

	 	      	if ($monpre>0)
	 	      	{
	 	      	 $nphispre= new Nphispre();
	 	      	 $nphispre->setCodemp($npasiconemp->getCodemp());
	 	      	 $nphispre->setCodtippre($regnew5['codtippre']);
	 	      	 $nphispre->setFechispre($reg3->getFecnom());
	 	      	 $nphispre->setDeshispre('Abono a Préstamo por Nómina');
	 	      	 $nphispre->setMonpre($monpre*(-1));
	 	      	 $nphispre->setSaldo($saldo);
	 	         $nphispre->save();
	 	        }
	 	      }
	 		}
	 	 }
	  }
   }
   unset($regnew5);
   unset($npasiconemp);
   unset($reg3);
   unset($nphispre);

//Actualizaciones de Vacaciones
  $sql6="Update Npvacregsal set Stavac='S' where codemp in
(Select CodEmp From  NPVACREGCALNOM b Where Npvacregsal.codemp=b.codemp and  Npvacregsal.codnom=b.codnom and b.CodNom='".$codnomina."') and Npvacregsal.stavac='N'";

  Herramientas::insertarRegistros($sql6);


   //Actualizacion de fechas
   $u= new Criteria();
   $u->add(NpnomesptiposPeer::CODNOMESP,$codnomesp);
   $nomestipos= NpnomesptiposPeer::doSelectOne($u);
   if ($nomestipos)
   {
     $fecini=$nomestipos->getFecnomdes();
     $fecfin=$nomestipos->getFecnomhas();


	   $u= new Criteria();
	   $u->add(NpnominaPeer::CODNOM,$codnomina);
	   $registros= NpnominaPeer::doSelectOne($u);
	   if ($registros)
	   {
	   	 if (!is_null($registros->getNumsem()))
	   	 {
	   	 	$registros->setNumsem($registros->getNumsem()+1);
	   	 }
	   	 $fecha2=Herramientas::dateAdd('d',1,$nomestipos->getFecnomhas(),'+');
	   	 $nomestipos->setFecnomdes($fecha2);

	   	 switch($registros->getFrecal())
	     {
		   case 'S':
			 $intervalo='ww';
			 $cant=1;
	      	 break;
		   case  'Q':
		   	 $intervalo='d';
			 $cant=15;
			 $ultfec=split('-',$nomestipos->getFecnomdes());
			 $tal= $ultfec[0].'-'.$ultfec[1].'-'.'01';
	   	     $fec2=Herramientas::dateAdd('d',13,$nomestipos->getFecnomdes(),'+');
	   	     $feccompara=split('-',$fec2);
	         $fechafin=Herramientas::dateAdd('d',1,(Herramientas::dateAdd('m',1,$tal,'+')),'-');
	   	     if ((intval($ultfec[2])>15) && (intval($ultfec[1])==intval($feccompara[1])))
	   	     {
	   	     	$cant=48;
	   	     	//$registros->setProfec($fechafin);
	   	     	$nomestipos->setFecnomhas($fechafin);
	   	     }

	         if ((intval($ultfec[2])>15) && (intval($ultfec[1])==2))
	   	     {
	   	     	$cant=48;
	   	     	//$registros->setProfec($fechafin);
	   	     	$nomestipos->setFecnomhas($fechafin);
	   	     }
			 break;
		   case ('M' || 'A'):
			 $intervalo='m';
			 $cant=1;
			 $ultfec=split('-',$nomestipos->getFecnomdes());
			 if ((intval($ultfec[1])==2) && (intval($ultfec[2])==1))
			 {
			   $fec2=Herramientas::dateAdd('d',28,$nomestipos->getFecnomdes(),'+');
	   	       $feccompara=split('-',$fec2);
	   	       if (intval($feccompara[1])==3)
	   	       {
	   	       	 $intervalo='d';
			     $cant=28;
	   	       }
	   	       else
	   	       {
	   	       	 $intervalo='d';
			     $cant=29;
	   	       }
			 }
			 $fec3=Herramientas::dateAdd('d',1,$nomestipos->getFecnomdes(),'+');
	   	     $feccompara2=split('-',$fec3);
			 if ((intval($ultfec[1])==2) && (intval($feccompara2[1])==3))
			 {
			   $intervalo='d';
			   $cant=31;
			 }

			 if ((intval($ultfec[1])==4) || (intval($ultfec[1])==6) || (intval($ultfec[1])==9) || (intval($ultfec[1])==11) || (intval($ultfec[2])==30))
			 {
			   $intervalo='d';
			   $cant=31;
			 }

	         if ((intval($ultfec[1])==3) || (intval($ultfec[1])==5) || (intval($ultfec[1])==7) || (intval($ultfec[1])==10) || (intval($ultfec[1])==12) || (intval($ultfec[2])==31))
			 {
			   $intervalo='d';
			   $cant=30;
			 }
	      	 break;
		 }

		 if ($cant!=48)
		 { $nomestipos->setFecnomhas(Herramientas::dateAdd('d',1,(Herramientas::dateAdd($intervalo,$cant,$nomestipos->getFecnomdes(),'+')),'-'));}

		 $nomestipos->save();
    }// if ($registros)
  }//if ($nomestipos)

  // unset($registros);

	  } catch (Exception $ex){
	  	exit($ex);
     	return 0;
  	}

 }
 public static function eliminarNpnomcal($codnomina,$codnomesp,$fecnom)
 {
   $dateFormat = new sfDateFormat('es_VE');
   $profecha = $dateFormat->format($fecnom, 'i', $dateFormat->getInputPattern('d'));

   $c= new Criteria();
   $c->add(NpnomcalPeer::CODNOM,$codnomina);
   $c->add(NpnomcalPeer::CODNOMESP,$codnomesp);
   $c->add(NpnomcalPeer::FECNOM,$profecha);
   $c->add(NpnomcalPeer::ESPECIAL,'S');
   NpnomcalPeer::doDelete($c);
 }


}

?>