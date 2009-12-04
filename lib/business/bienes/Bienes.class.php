<?php
/**
 * Bienes: Clase estática para el manejo de los Bienes Nacionales
 *
 * @package    Roraima
 * @subpackage bienes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Bienes
{
  /*
   * Función Principal para validar datos del formulario Bieregactmued
   */
  public static function validarBnregmue($articulo) {
      return self::validarCodact($articulo);
    }


  public static function validarCodact($articulo)
  {
         $codact=$articulo->getCodact();
         $codmue=$articulo->getCodmue();

     $c = new Criteria();
     $c->add(BnregmuePeer::CODACT,$codact);
     $c->add(BnregmuePeer::CODMUE,$codmue);
     $objBnregmue = BnregmuePeer::doSelectOne($c);

     if ($objBnregmue)
       return 203;
     else
        return -1;

  }

  /*
   * Función Principal para validar datos del formulario Bieregactinm
   */
  public static function validarBnreginm($articulo)
  {
      return self::validarCodmue($articulo);
  }


  public static function validarCodmue($articulo)
  {
     $codact=$articulo->getCodact();
     $codinm=$articulo->getCodinm();

     $c = new Criteria();
     //$c->add(BnreginmPeer::CODACT,$codact);
     $c->add(BnreginmPeer::CODINM,$codinm);
     $objBnreginm = BnreginmPeer::doSelectOne($c);

     if ($objBnreginm)
       return 203;
     else
        return -1;
  }

  public static function iniciarAjusteActivos($tipoactivo,$fecha,&$revejecutada)
  {
     switch ($tipoactivo)
     {
       case '1':
         $c= new Criteria();
         $c->add(BnregmuePeer::FECREG,$fecha,Criteria::LESS_EQUAL);
         $c->add(BnregmuePeer::STAMUE,'A');
         $c->addAscendingOrderByColumn(BnregmuePeer::CODACT);
         $c->addAscendingOrderByColumn(BnregmuePeer::CODMUE);
         $reg= BnregmuePeer::doSelect($c);
        break;
       case '2':
         $c= new Criteria();
         $c->add(BnreginmPeer::FECREG,$fecha,Criteria::LESS_EQUAL);
         $c->add(BnreginmPeer::STAINM,'A');
         $c->addAscendingOrderByColumn(BnreginmPeer::CODACT);
         $c->addAscendingOrderByColumn(BnreginmPeer::CODINM);
         $reg= BnreginmPeer::doSelect($c);
        break;
       case '3':
         $c= new Criteria();
         $c->add(BnregsemPeer::FECREG,$fecha,Criteria::LESS_EQUAL);
         $c->add(BnregsemPeer::STASEM,'A');
         $c->addAscendingOrderByColumn(BnregsemPeer::CODACT);
         $c->addAscendingOrderByColumn(BnregsemPeer::CODSEM);
         $reg= BnregsemPeer::doSelect($c);
        break;
     }

     if ($reg)
     {
     	foreach ($reg as $datos)
     	{
          $anoipc=date('Y',strtotime($datos->getFecreg()));
          $d= new Criteria();
          $criterion=$d->getNewCriterion(BnipcactPeer::ANOIPC,$anoipc);
          $criterion->addOr($d->getNewCriterion(BnipcactPeer::ANOIPC,date('Y',strtotime($fecha))));
          $d->add($criterion);
          $d->addAscendingOrderByColumn(BnipcactPeer::ANOIPC);
          $resultado=BnipcactPeer::doSelect($d);
          if ($resultado)
          {
          	 $contador=0;
             foreach ($resultado as $result)
             {
             	$contador=$contador +1;
               if ($contador==1)
               {
             	$mesipc=date('m',strtotime($datos->getFecreg()));
             	switch ($mesipc)
             	{
             	  case '1':
             	    $ipcmesini=$result->getIpcene();
             	   break;
             	  case '2':
             	    $ipcmesini=$result->getIpcfeb();
             	   break;
             	  case '3':
             	    $ipcmesini=$result->getIpcmar();
             	   break;
             	  case '4':
             	    $ipcmesini=$result->getIpcabr();
             	   break;
             	  case '5':
             	    $ipcmesini=$result->getIpcmay();
             	   break;
             	  case '6':
             	    $ipcmesini=$result->getIpcjun();
             	   break;
             	  case '7':
             	    $ipcmesini=$result->getIpcjul();
             	   break;
             	  case '8':
             	    $ipcmesini=$result->getIpcago();
             	   break;
             	  case '9':
             	    $ipcmesini=$result->getIpcsep();
             	   break;
             	  case '10':
             	    $ipcmesini=$result->getIpcoct();
             	   break;
             	  case '11':
             	    $ipcmesini=$result->getIpcnov();
             	   break;
             	  case '12':
             	    $ipcmesini=$result->getIpcdic();
             	   break;
             	}
               }
               	 $mesipc=date('m',strtotime($fecha));
             	 switch ($mesipc)
             	 {
             	  case '1':
             	    $ipcmesfin=$result->getIpcene();
             	   break;
             	  case '2':
             	    $ipcmesfin=$result->getIpcfeb();
             	   break;
             	  case '3':
             	    $ipcmesfin=$result->getIpcmar();
             	   break;
             	  case '4':
             	    $ipcmesfin=$result->getIpcabr();
             	   break;
             	  case '5':
             	    $ipcmesfin=$result->getIpcmay();
             	   break;
             	  case '6':
             	    $ipcmesfin=$result->getIpcjun();
             	   break;
             	  case '7':
             	    $ipcmesfin=$result->getIpcjul();
             	   break;
             	  case '8':
             	    $ipcmesfin=$result->getIpcago();
             	   break;
             	  case '9':
             	    $ipcmesfin=$result->getIpcsep();
             	   break;
             	  case '10':
             	    $ipcmesfin=$result->getIpcoct();
             	   break;
             	  case '11':
             	    $ipcmesfin=$result->getIpcnov();
             	   break;
             	  case '12':
             	    $ipcmesfin=$result->getIpcdic();
             	   break;
             	  }
               }

             if ($ipcmesini>0)
             {
             	$calculo= (($ipcmesini/$ipcmesfin)* $datos->getValini());
               $datos->setvalrex($calculo);
             }else $datos->setvalrex(0);
             $datos->save();
          }
       }
     }
     else
     {
     	$revejecutada=false;
     }
  }

  public static function actualizarRevalorizacion($fecha)
  {
     $r= new Criteria();
     $r->add(BnrevactPeer::FECREV,$fecha);
     $trajo=BnrevactPeer::doSelectOne($r);
     if (!$trajo)
     {
     	$bnrevact= new Bnrevact();
     	$bnrevact->setFecrev($fecha);
     	$bnrevact->setMonmuerev(0);
     	$bnrevact->setMoninmrev(0);
     	$bnrevact->setMonsegrev(0);
     	$bnrevact->save();
     }
  }

  public static function iniciarDepreciacionActivos($tipoactivo,$lafechadep,&$depejecutadam,&$depejecutadai,&$montodepm,&$montodepi,&$msj)
  {
  	 switch ($tipoactivo)
     {
       case '1':
         $c= new Criteria();
         $c->add(BnregmuePeer::STAMUE,'A');
         $c->addAscendingOrderByColumn(BnregmuePeer::CODACT);  //Muebles
         $c->addAscendingOrderByColumn(BnregmuePeer::CODMUE);
         $reg= BnregmuePeer::doSelect($c);

         $c1= new Criteria();
         $c1->add(BndefconPeer::STACTA,'A');
         $c1->add(BnregmuePeer::STAMUE,'A');
         $c1->addAscendingOrderByColumn(BndefconPeer::CODACT);
         $c1->addAscendingOrderByColumn(BndefconPeer::CODMUE); //Definición Contable
         $c1->addJoin(BndefconPeer::CODACT, BnregmuePeer::CODACT);
         $c1->addJoin(BndefconPeer::CODMUE, BnregmuePeer::CODMUE);
         $reg1= BndefconPeer::doSelect($c1);

         //Monto  Depreciación Mueble
         $montodepm=0;

         $c2= new Criteria();    //Detalle Depreciación
         $reg2= BndepactdetPeer::doSelect($c2);

        break;
       case '2':
         $c= new Criteria();
         $c->add(BnreginmPeer::STAINM,'A');
         $c->addAscendingOrderByColumn(BnreginmPeer::CODACT);
         $c->addAscendingOrderByColumn(BnreginmPeer::CODINM); //Inmuebles
         $reg= BnreginmPeer::doSelect($c);

         $c1= new Criteria();
         $c1->add(BndefconiPeer::STACTA,'A');
         $c1->add(BnreginmPeer::STAINM,'A');
         $c1->addAscendingOrderByColumn(BndefconiPeer::CODACT);
         $c1->addAscendingOrderByColumn(BndefconiPeer::CODINM); //Definición Contable
         $c1->addJoin(BndefconiPeer::CODACT, BnreginmPeer::CODACT);
         $c1->addJoin(BndefconiPeer::CODINM, BnreginmPeer::CODINM);
         $reg1= BndefconiPeer::doSelect($c1);

         //Monto  Depreciación Inmueble
         $montodepi=0;

         $c2= new Criteria();    //Detalle Depreciación
         $reg2= BndepactdetPeer::doSelect($c2);

        break;
     }

     if ($reg)
     {
     	if ($reg1)
     	{
     		if (count($reg)==count($reg1))
     		{
              foreach ($reg as $dato)
              {
                $montodep=0;
                $depmensual=0;

                if ($tipoactivo=='1')
                {
                  self::obtenerMejora($dato->getCodact(),$dato->getCodmue(),$lafechadep,'1',&$montomejora,&$vidamejora);
                }else{
                  self::obtenerMejora($dato->getCodact(),$dato->getCodinm(),$lafechadep,'2',&$montomejora,&$vidamejora);
                }

                $difmes=Herramientas :: dateDiff('m', $dato->getFecreg(), $lafechadep) + 1;
                $difdia=Herramientas :: dateDiff('d', $dato->getFecreg(), $lafechadep);

                if ($dato->getDepmen()==0)
                {
                  if ($dato->getViduti()>0)
                  {
                    $valorbien= (($dato->getValini() + $montomejora) - $dato->getValres());
                    $vidabien= ($dato->getViduti() + $vidamejora);
                    $depmen= ($valorbien / $vidabien);
                  }
                  else $depmen=0;
                }
                else $depmen=$dato->getDepmen();

                if ($difdia>0)
                {
                  if ($difmes > ($dato->getViduti()+$vidamejora))
                  {
                    $depacu= (($dato->getValini() + $montomejora)- $dato->getValres());
                    $mesesdep= ($dato->getViduti() + $vidamejora);
                    $montodeprec=0;
                  }
                  else
                  {
                    if ($montomejora>0 && $vidamejora>0)
                    {
                      $difmes= (($dato->getViduti() - $difmes) + 1);
                      $valorbien= (($dato->getvalini()-$dato->getDepacu()) +$montomejora -$dato->getValres());
                      $vidabien= $difmes + $vidamejora;

                      $depmensual= ($valorbien / $vidabien);
                      $depacu= $dato->getDepacu() + $depmensual;
                    }
                    else
                    {
                      $depacu= $depmensual * $difmes;
                      $mesesdep= $difmes;
                      $montodeprec=$depmensual;
                    }
                  }
                  $vallib=$dato->getValini() + $dato->getValadi() - $depacu;
                  $dato->setVallib($vallib);
                  $dato->setDepmen($depmensual);
                  $dato->setDepacu($depacu);
                  $dato->setMesdep($mesesdep);
                  $dato->save();

                  $bndepactdet= new Bndepactdet();
                  $bndepactdet->setCodact($dato->getCodact());
                  if ($tipoactivo=='1')
                  $bndepactdet->setCodmue($dato->getCodmue());
                  else $bndepactdet->setCodmue($dato->getCodinm());
                  $bndepactdet->setFecdep($lafechadep);
                  $bndepactdet->setDepmue($depmensual);
                  $bndepactdet->setDepacu($depacu);
                  $bndepactdet->setVallib($vallib);
                  $bndepactdet->save();
                }
                else
                {
                   $dato->setDepacu(0);
                   $dato->setMesdep(0);
                   $dato->save();
                   $depmensual=0;

	               $bndepactdet= new Bndepactdet();
	               $bndepactdet->setCodact($dato->getCodact());
	               if ($tipoactivo=='1')
	               $bndepactdet->setCodmue($dato->getCodmue());
	               else $bndepactdet->setCodmue($dato->getCodinm());
	               $bndepactdet->setFecdep($lafechadep);
	               $bndepactdet->setDepmue($depmensual);
	               $bndepactdet->setDepacu(0);
	               $bndepactdet->setVallib($dato->getVallib());
	               $bndepactdet->save();
                }

                switch ($tipoactivo)
			    {
			      case '1':
			       $montodepm= $montodepm + $montodeprec;
			       break;
			      case '2':
			        $montodepi= $montodepi + $montodeprec;
			       break;
			    }
              }

              switch ($tipoactivo)
			  {
			    case '1':
			     $depejecutadam=true;
			     break;
			    case '2':
			     $depejecutadai=true;
			     break;
			  }
     		}
     		else
     		{
     		  switch ($tipoactivo)
			  {
			    case '1':
			    $depejecutadam=false;
			     $msj="alert('Existe Muebles que no tienen la definicion contable por consiguiente la Depreciacion no puede ser realizada');";
			     break;
			    case '2':
			     $msj="alert('Existe Inmueble que no tienen la definicion contable por consiguiente la Depreciacion no puede ser realizada');";
			     $depejecutadai=false;
			     break;
			  }
     		}
     	}
     	else
     	{
     	  switch ($tipoactivo)
		  {
		    case '1':
		    $depejecutadam=false;
		     $msj="alert('Existe Muebles que no tienen la definición contable por consiguiente la Depreciacion no puede ser realizada');";
		     break;
		    case '2':
		     $msj="alert('Existe Inmueble que no tienen la definición contable por consiguiente la Depreciacion no puede ser realizada');";
		     $depejecutadai=false;
		     break;
		  }
     	}
     }
     else
     {
          switch ($tipoactivo)
		  {
		    case '1':
		    $depejecutadam=true;
		     break;
		    case '2':
		     $depejecutadai=true;
		     break;
		  }
     }
  }

  public static function obtenerMejora($codigoact,$codigo,$fecdep,$codtipact,&$montomejora,&$vidamejora)
  {
  	if ($codtipact=='1')
  	{
	  	$sql="select coalesce(sum(mondismue),0) as mondismue, coalesce(sum(vidutil),0) as vidutil from bndismue where codmue='".$codigo."' and codact='".$codigoact."' and fecdismue<='".$fecdep."'";
	  	if (Herramientas::BuscarDatos($sql,&$result))
	    {
	       $montomejora=$result[0]["mondismue"];
	       $vidamejora=$result[0]["vidutil"];
	    }
  	}else
  	{
  	  $sql="select coalesce(sum(mondisinm),0) as mondisinm, coalesce(sum(vidutil),0) as vidutil from bndisinm where codmue='".$codigo."' and codact='".$codigoact."' and fecdisinm<='".$fecdep."'";
  	    if (Herramientas::BuscarDatos($sql,&$result))
	    {
	       $montomejora=$result[0]["mondisinm"];
	       $vidamejora=$result[0]["vidutil"];
	    }
  	}
  }

  public static function actualizarFecdep($lafechadep,$montodepm,$montodepi)
  {
    $y= new Criteria();
    $y->add(BndepactPeer::FECDEP,$lafechadep);
    $y->addAscendingOrderByColumn(BndepactPeer::FECDEP);
    $result= BndepactPeer::doSelectOne($y);
    if ($result)
    {
       $montomejora=$result[0]["mondismue"];
       $vidamejora=$result[0]["vidutil"];
       $result->setMonmue($montodepm);
       $result->setMoninm($montodepi);
       $result->save();
    }else
    {
      $bndepact= new Bndepact();
      $bndepact->setFecdep($lafechadep);
      $bndepact->setMonmue($montodepm);
      $bndepact->setMoninm($montodepi);
      $bndepact->save();
    }
  }

  public static function generaComprobanteDepreciacion($fechacomp,&$arrcompro)
  {
    $result=array();  $codigocuenta=""; $tipo=""; $des=""; $monto="";  $codigocuentas=""; $tipo1=""; $desc="";
    $monto1=""; $cuentas=""; $tipos="";
    $montos=""; $descr=""; $msjuno="";
    $numerocomprob= '########';
    $mes=date('m',strtotime($fechacomp));
    $anno=date('Y',strtotime($fechacomp));
    $reftra="DM".str_pad($mes, 2, '0', STR_PAD_LEFT).$anno;
    $descom="DEPRECIACION DE MUE. MES ".$mes." AÑO ".$anno;

    $sql="SELECT A.CTAAJUCAR as codcta, SUM(B.DEPMEN) as monto FROM BNDEFCON A, BnRegmue B WHERE A.CODACT=B.CODACT AND
          A.CODMUE = B.CODMUE AND A.STACTA = 'A' AND B.STAMUE = 'A' AND B.FECEXP >= '".$fechacomp."' AND B.DEPACU > 0 Group By(a.CTAAJUCAR)";
    if (H::BuscarDatos($sql,&$result))
    {
       $i=0;
       while ($i<count($result))
       {
          $codigocuenta=$result[$i]["codcta"];
          $tipo='D';
          $des="";
          $moncau=$result[$i]["monto"];
          $monto=$moncau;

          if ($i==0)
          {
            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;
          }
          else
          {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
       	$i++;
       }
    }
    $result2=array();
    $sql1="SELECT A.CTAAJUABO as codcta, SUM(B.DEPMEN) as monto FROM BNDEFCON A, BnRegmue B WHERE A.CODACT=B.CODACT AND
           A.CODMUE = B.CODMUE AND A.STACTA = 'A' AND B.STAMUE = 'A' AND B.FECEXP >= '".$fechacomp."' AND B.DEPACU > 0 Group By(a.CTAAJUABO)";
    if (H::BuscarDatos($sql1,&$result2))
    {
      $l=0;
      while ($l<count($result2))
      {
          $codigocuenta=$result2[$l]["codcta"];
          $tipo='C';
          $des="";
          $moncau=$result2[$l]["monto"];
          $monto=$moncau;

          if ($i==0)
          {
            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;
          }
          else
          {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
      	$l++;
      }
    }

    $result3=array();
    $sql2="SELECT A.CTAAJUCAR as codcta, SUM(B.DEPMEN) as monto FROM BNDEFCONI A, BnRegInm B WHERE A.CODACT=B.CODACT AND
           A.CODINM = B.CODINM AND A.STACTA = 'A' AND B.STAINM = 'A' AND B.FECEXP >= '".$fechacomp."' AND B.DEPACU > 0 Group By(A.CTAAJUCAR)";
    if (H::BuscarDatos($sql2,&$result3))
    {
      $p=0;
      while ($p<count($result3))
      {
          $codigocuenta=$result3[$p]["codcta"];
          $tipo='D';
          $des="";
          $moncau=$result3[$p]["monto"];
          $monto=$moncau;

          if ($i==0)
          {
            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;
          }
          else
          {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
      	$p++;
      }
    }

    $result4=array();
    $sql3="SELECT A.CTAAJUABO as codcta, SUM(B.DEPMEN) as monto FROM BNDEFCONI A, BnRegInm B WHERE A.CODACT=B.CODACT AND
           A.CODINM = B.CODINM AND A.STACTA = 'A' AND B.STAINM = 'A' AND B.FECEXP >= '".$fechacomp."' AND B.DEPACU > 0 Group By(A.CTAAJUABO)";
    if (H::BuscarDatos($sql3,&$result4))
    {
      $e=0;
      while ($e<count($result4))
      {
      	  $codigocuenta=$result4[$e]["codcta"];
          $tipo='C';
          $des="";
          $moncau=$result4[$e]["monto"];
          $monto=$moncau;

          if ($i==0)
          {
            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;
          }
          else
          {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
      	$e++;
      }
    }

    $cuentas=$codigocuentas;
    $descr=$desc;
    $tipos=$tipo1;
    $montos=$monto1;

	$clscommpro=new Comprobante();
	$clscommpro->setGrabar("N");
	$clscommpro->setNumcom($numerocomprob);
	$clscommpro->setReftra($reftra);
	$clscommpro->setFectra(date("d/m/Y",strtotime($fechacomp)));
	$clscommpro->setDestra($descom);
	$clscommpro->setCtas($cuentas);
	$clscommpro->setDesc($descr);
	$clscommpro->setMov($tipos);
	$clscommpro->setMontos($montos);
	$arrcompro[]=$clscommpro;

    return true;
  }

  public static function salvarSaveBnregmue($clase)
  {
  	if ($clase->getId()==''){
	 	//self::GrabarMovimiento($clase);
  	}
     $clase->save();
     return -1;
  }

  public static function GrabarMovimiento($id) //Incorporacion
  {
  	$c = new Criteria();
  	$c->add(BnregmuePeer::ID,$id);
  	$clase = BnregmuePeer::doselectone($c);


  	if ($clase){
	  //	$tipoinc='';
	  //	$c = new Criteria();
	 // 	$per = BndefinsPeer::doselectone($c);
	 // 	if ($per){
	//		if ($per->getCodinc()){
			//  	$c = new Criteria();
			//  	$c->add(BndisbiePeer::CODDIS,$per->getCodinc());
			//  	$per2 = BndisbiePeer::doselectone($c);
		//		if ($per2){
		//			$tipoinc = $per->getCodinc().' - '.$per2->getDesdis();
		//		}

			  	$c = new Criteria();
			  	$c->add(BndisbiePeer::CODDIS,$clase->getCoddis());
			  	$per2 = BndisbiePeer::doselectone($c);
				if ($per2){
					$tipoinc = $per2->getCoddis().' - '.$per2->getDesdis();
				}

				if (H::getVerCorrelativo('corrmue','bndefins',&$output)){
			        $ref = str_pad($output, 10, '0', STR_PAD_LEFT);
	          		if (H::getSalvarCorrelativo('corrmue','bndefins','Registo de Disposicion de Bienes',$output,&$msg)){
						$c = new Bndismue();
						$c->setCodact($clase->getCodact());
						$c->setCodmue($clase->getCodmue());
						$c->setNrodismue($ref);
						$c->setTipdismue($tipoinc);
						$c->setFecdismue($clase->getFeccom());
						$c->setMotdismue(Herramientas::getX('coddis','Bndisbie','desdis',$clase->getCoddis()));
						$c->setCodubiori($clase->getCodubi());
						$c->setMondismue($clase->getValini());
						$c->setStadismue('A');
						$c->save();
						return 'Se Genero una Incorporacion con el numero '.$ref;
	          		}else{ //echo $msg;
	          		}
				}else{
					return 'Error al Buscar el Correlativo';
				}
	//		}else{
		//		return 'No esta definido El Codigo de la Incorporacion, Verifique en el modulo de Definicion de Empresa.';
			//}
	 // 	}else{
	 // 		return 'No esta definido El Codigo de la Incorporacion, Verifique en el modulo de Definicion de Empresa.';
	 // 	}
  	}
  }

  public static function validarCodubi($codubi)
  {
     $formato=Herramientas::ObtenerFormato('Bndefins','forubi');
     $posrup1=Herramientas::instr($formato,'-',0,1);
     $posrup1=$posrup1-1;
     if (strlen(trim($codubi))<$posrup1)
     {
       return 101;
     }

    Herramientas::FormarCodigoPadre($codubi,&$nivelcodigo,&$ultimo,$formato);     
    $c= new Criteria();
    $c->add(BnubibiePeer::CODUBI,$ultimo);
    $bnubibie = BnubibiePeer::doSelectOne($c);
    if (!$bnubibie)
    {        
       if ($nivelcodigo == 0) return 100;
    }    
    return -1;
  }

    public static function validarCodactivo($codact)
  {
     $formato=Herramientas::ObtenerFormato('Bndefins','foract');
     $posrup1=Herramientas::instr($formato,'-',0,1);
     $posrup1=$posrup1-1;
     if (strlen(trim($codact))<$posrup1)
     {
       return 101;
     }

    Herramientas::FormarCodigoPadre($codact,&$nivelcodigo,&$ultimo,$formato);
    $c= new Criteria();
    $c->add(BndefactPeer::CODACT,$ultimo);
    $bnubibie = BndefactPeer::doSelectOne($c);
    if (!$bnubibie)
    {
       if ($nivelcodigo == 0) return 100;
    }
    return -1;
  }

}
?>
