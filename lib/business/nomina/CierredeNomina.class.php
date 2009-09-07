<?php
/**
 * Cierre de Nomina: Clase estática para procesar el cierre de pre-nóminas
 *
 * @package    Roraima
 * @subpackage nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CierredeNomina
{
  public static function Consulta($codigo,$fecult,$fecpro,&$visible)
  {
  	 $c= new Criteria();
	 $c->add(NpnomcalPeer::CODNOM,$codigo);
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

 public static function Consulta2($codigo,$fec)
 {
 	$c= new Criteria();
 	$c->add(NphisconPeer::CODNOM,$codigo);
 	$c->add(NphisconPeer::FECNOM,$fec);
 	$resultado= NphisconPeer::doSelectOne($c);
 	if ($resultado)
 	{ return true;}else {return false;}
 }

 public static function procesoCierre($codnomina,$fecha,&$msj)
 {
 	$profecha=Herramientas::getX('CODNOM','Npnomina','Profec',$codnomina);
   if (self::generarNompag($codnomina,$fecha))
   { $msj="";
     self::cierre($codnomina,$fecha);
     self::eliminarNpnomcal($codnomina,$profecha);
   }
   else
   {
     $msj='1'; //La Nómina no puede ser Cerrada
   }
 }

 public static function generarNompag($codnomina,$fecha)
 {
   self::eliminarCierre($codnomina,$fecha);
   if(self::generar($codnomina,$fecha))
   { return true;}
   else {return false;}
 }

 public static function eliminarCierre($codnomina,$fecha)
 {
   $dateFormat = new sfDateFormat('es_VE');
   $fecha = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

   $c= new Criteria();
   $c->add(NpcienomPeer::CODNOM,$codnomina);
   $c->add(NpcienomPeer::FECNOM,$fecha);
   $c->add(NpcienomPeer::ESPECIAL,'N');
   $resul= NpcienomPeer::doSelect($c);
   if ($resul)
   {
   	 foreach ($resul as $update)
   	 {
   	   $update->delete();
   	 }
   }
 }

 public static function generar($codnomina,$fecha)
 {
   $dateFormat = new sfDateFormat('es_VE');
   $fecha = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

   $variable=array();

   $c= new Criteria();
   $c->add(NpnomcalPeer::CODNOM,$codnomina);
   $c->add(NpnomcalPeer::SALDO,0,Criteria::NOT_EQUAL);
   $c->add(NpnomcalPeer::ESPECIAL,'N');
   $resultados= NpnomcalPeer::doSelect($c);
   if ($resultados)
   {
   	foreach ($resultados as $npnomcal)
   	{
   	 $sql="Select A.codemp as codemp,A.codcar as codcar,A.codnom as codnom,A.codcat as codcat,A.fecasi as fecasi,A.nomemp as nomemp,A.nomcar as nomcar,A.nomnom as nomnom,A.nomcat as nomcat,A.unieje as unieje,A.sueldo as sueldo,A.status as status,A.nronom as nronom,A.montonomina as montonomina,A.codtip as codtip,A.codtipgas as codtipgas,A.codniv as codniv,A.grado as grado,A.paso as paso,
      (CASE when C.CodTipPag='01' then C.Codban else C.Codemp end) as codigobancario
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
	   	 	{ $categoria=$dato3->getCodcat();}
	   	 	else {$categoria=$result[0]['codcat'];}
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
 }

 public static function cierre($codnomina,$fecha)
 {
//Para Conceptos que no estan asociados a Categorias Especiales
  $sql1="Insert into Nphiscon    (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
			     codnomesp, nomnomesp )
  		(SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),'',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,A.CANTIDAD,A.FECNOMDES,A.ESPECIAL,A.FECNOMESPDES,A.FECNOMESPHAS,'',''
   FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D
   WHERE A.CODNOM='".$codnomina."' AND A.ESPECIAL='N' AND
   A.SALDO>0 AND A.CODEMP=B.CODEMP AND
   A.CODNOM=B.CODNOM AND A.CODCAR=B.CODCAR AND
   A.CODCON=C.CODCON AND A.CODEMP=D.CODEMP AND  C.ACUHIS='S' AND B.STATUS='V'  AND
   A.CODCON NOT IN (SELECT CODCON FROM NPCONCEPTOSCATEGORIA) AND
   A.CODCON NOT IN (SELECT CODCON FROM NPASICATCONEMP))";

  Herramientas::insertarRegistros($sql1);


//Para Conceptos que estan asociados a Categorias Especiales
  $sql2="Insert into Nphiscon  (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
			     codnomesp, nomnomesp )   (SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),'',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,A.CANTIDAD,A.FECNOMDES,A.ESPECIAL,A.FECNOMESPDES,A.FECNOMESPHAS,'',''
     FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D,NPCONCEPTOSCATEGORIA E
       WHERE A.CODNOM='".$codnomina."' AND A.ESPECIAL='N' AND
       A.SALDO>0 AND A.CODEMP=B.CODEMP AND
       A.CODNOM=B.CODNOM AND A.CODCAR=B.CODCAR AND
       C.ACUHIS='S'  AND B.STATUS='V' AND A.CODCON=C.CODCON AND
       A.CODEMP=D.CODEMP AND A.CODCON=E.CODCON AND
       A.CODCON NOT IN (SELECT CODCON FROM NPASICATCONEMP))";

    Herramientas::insertarRegistros($sql2);

 //Para Conceptos que estan asociados a Categorias Especiales
 $sql3="Insert into Nphiscon (codnom,codemp, codcar, codcon, fecnom, monto, codcat, codpar, codescuela, codniv, codtipgas, nomcon, numrec, cantidad, fecnomdes, especial, fecnomespdes, fecnomesphas,
			     codnomesp, nomnomesp ) (SELECT A.CodNom,A.CodEmp,A.CodCar,A.CodCon,A.FecNom,A.Saldo,categoriaemp(A.CodNom,A.CodEmp,A.CodCar,A.CodCon),partidaconcepto(A.CodCon,A.CodNom,A.CodCar),'',D.CodNiv,B.CODTIPGAS,C.NOMCON,A.NUMREC,A.CANTIDAD,A.FECNOMDES,A.ESPECIAL, A.FECNOMESPDES,A.FECNOMESPHAS,'',''
     FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,NPHOJINT D,NPASICATCONEMP E
       WHERE A.CODNOM='".$codnomina."' AND A.ESPECIAL='N' AND
       A.SALDO>0 AND A.CODEMP=B.CODEMP AND
       A.CODNOM=B.CODNOM AND A.CODCAR=B.CODCAR AND  C.ACUHIS='S' AND B.STATUS='V' AND
       A.CODCON=C.CODCON AND A.CODEMP=D.CODEMP AND A.CODCON=E.CODCON AND
       A.CODCON NOT IN (SELECT CODCON FROM NPCONCEPTOSCATEGORIA))";

    Herramientas::insertarRegistros($sql3);

//Inicialización de Conceptos
  $sql4="update npasiconemp set monto=0, cantidad=0 where codemp||codcar||codcon in (select a.codemp ||a.codcar||b.codcon from npasicaremp a,npdefmov b,npdefcpt c where b.codnom='".$codnomina."' and
  c.inimon='S' and b.codcon=c.codcon and a.codnom=b.codnom and a.status='V')";

 Herramientas::insertarRegistros($sql4);

//Actualización de Prestamos
   $sql5="select * from Nptippre where codcon in (select codcon from npnomcal where codnom='".$codnomina."')";
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
  $sql6="Update Npvacregsal set Stavac='S' where codemp||codnom in
(Select CodEmp||codnom From  NPVACREGCALNOM b Where b.CodNom='".$codnomina."') and stavac='N'";

  Herramientas::insertarRegistros($sql6);

//Actualizacion de fechas
   $u= new Criteria();
   $u->add(NpnominaPeer::CODNOM,$codnomina);
   $registros= NpnominaPeer::doSelectOne($u);
   if ($registros)
   {
   	 if (!is_null($registros->getNumsem()))
   	 {
   	 	$registros->setNumsem($registros->getNumsem()+1);
   	 }
   	 $fecha2=Herramientas::dateAdd('d',1,$registros->getProfec(),'+');
   	 $registros->setUltfec($fecha2);

   	 switch($registros->getFrecal())
     {
	   case 'S':
		 $intervalo='ww';
		 $cant=1;
      	 break;
	   case  'Q':
	   	 $intervalo='d';
		 $cant=15;
		 $ultfec=split('-',$registros->getUltfec());
		 $tal= $ultfec[0].'-'.$ultfec[1].'-'.'01';
   	     $fec2=Herramientas::dateAdd('d',13,$registros->getUltfec(),'+');
   	     $feccompara=split('-',$fec2);
         $fechafin=Herramientas::dateAdd('d',1,(Herramientas::dateAdd('m',1,$tal,'+')),'-');
   	     if ((intval($ultfec[2])>15) && (intval($ultfec[1])==intval($feccompara[1])))
   	     {
   	     	$cant=48;
   	     	$registros->setProfec($fechafin);
   	     }

         if ((intval($ultfec[2])>15) && (intval($ultfec[1])==2))
   	     {
   	     	$cant=48;
   	     	$registros->setProfec($fechafin);
   	     }
		 break;
	   case ('M' || 'A'):
		 $intervalo='m';
		 $cant=1;
		 $ultfec=split('-',$registros->getUltfec());
		 if ((intval($ultfec[1])==2) && (intval($ultfec[2])==1))
		 {
		   $fec2=Herramientas::dateAdd('d',28,$registros->getUltfec(),'+');
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
		 $fec3=Herramientas::dateAdd('d',1,$registros->getUltfec(),'+');
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
	 { $registros->setProfec(Herramientas::dateAdd('d',1,(Herramientas::dateAdd($intervalo,$cant,$registros->getUltfec(),'+')),'-'));}

	 $registros->save();
   }
   unset($registros);
 }

 public static function eliminarNpnomcal($codnomina,$fecnom)
 {
   $c= new Criteria();
   $c->add(NpnomcalPeer::CODNOM,$codnomina);
   $c->add(NpnomcalPeer::FECNOM,$fecnom);
   $c->add(NpnomcalPeer::ESPECIAL,'N');
   NpnomcalPeer::doDelete($c);
 }


}

?>