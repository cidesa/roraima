<?php
/**
 * Orden de Pago: Clase estática para procesar las ordenes de pago
 *
 * @package    Roraima
 * @subpackage tesoreria
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class OrdendePago
{
/**********************************Fondos a Terceros*****************************************************/
  public static function salvarPagemiret($fondos,$grid)
  {
    self::grabarFondos($fondos,$grid,&$msj);
    if (self::agregaBenefi($fondos)==true)
    {
      self::grabarBenefi($fondos);
    }
    self::grabarRetenciones($fondos,$grid);
    self::actualizarRetenciones($fondos,$grid);
  }

  public static function grabarFondos($fondos,$grid,&$msj)
  {
    if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
    {
     $tienecorrelativo=false;
      if ($fondos->getNumord()=='########')
      {
      	  $valido=false;
      	  $longitud='8';
      	  $nroorden=0;
      	  $formato='';
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = date('ym');
	      	$mes=date('m');
	      	$longitud='4';
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,3,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $fondos->setNumord($nroorden);

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = date('my');
			$longitud='4';
			$mes=date('m');
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,1,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $fondos->setNumord($nroorden);

	      }else{
	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }

	        $fondos->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));
         }
      }
      else
      {
        $fondos->setNumord(str_replace('#','0',$fondos->getNumord()));
      }

     }

     if ($tienecorrelativo==true)
     {
       Herramientas::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,$msg);
     }
      $fondos->setStatus('N');
	  $fondos->setAproba('N');
	  $fondos->setMondes(0.00);
	  $fondos->setMonret(0.00);
	  $fondos->setFecven($fondos->getFecemi());
	  $e= new Criteria();
      $ooo= OpdefempPeer::doSelectOne($e);
      if ($ooo)
      {
        if ($ooo->getReqaprord()=='S')
        {
          $fondos->setAprobadoord('A');
          $fondos->setAprobadotes('A');
        }
      }

	  $x=$grid[0];
	  $valor="";
	  $j=0;
	  while ($j<count($x))
	  {
	    if ($x[$j]['check']=="1")
	    {
	      $c= new Criteria();
	      $c->add(OpordpagPeer::NUMORD,$x[$j]['numord']);
	      $consulta = OpordpagPeer::doSelectOne($c);
	      if ($consulta)
	      {
	        $valor= $consulta->getCoduni();
	      }
	    }
	    $j++;
	  }
	  $fondos->setCoduni($valor);
      $fondos->save();
  }

  public static function afectaPresupuesto($fondos,&$refiere)
  {
    $c= new Criteria();
    $c->add(CpdoccauPeer::TIPCAU, $fondos->getTipcau());
    $uno= CpdoccauPeer::doSelectOne($c);
    if ($uno)
    {
      if($uno->getAfeprc()=='N' and $uno->getAfecom()=='N' and $uno->getAfecau()=='N')
      { $refiere=$uno->getRefier();
        return false;
      }
      else
      {
        $refiere=$uno->getRefier();
        return true;
      }
     }
  }

  public static function grabarRetenciones($fondos,$grid)
  {
    if (self::afectaPresupuesto($fondos,&$refiere)==true)
    {
      $referencia=$fondos->getNumord();
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]['check']=="1")
        {
          $detalle = new Opdetord();
          $detalle->setNumord($referencia);
          if ($refiere=='N')
          {
            $detalle->setRefcom('NULO');
          }
          $detalle->setCodpre($x[$j]['codpre']);
          $detalle->setMoncau($x[$j]['monret']);
          $detalle->setMonret(0);
          $detalle->setMondes(0);
          $detalle->save();
        }
        $j++;
      }
    }
  }

  public static function actualizarRetenciones($fondos,$grid)
  {
    $referencia=$fondos->getNumord();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['check']=="1")
      {
        if (self::afectaPresupuesto($fondos,&$refiere))
        {
          $c = new Criteria();
          $c->add(OpretordPeer::NUMORD,$x[$j]['numord']);
          $c->add(OpretordPeer::CODPRE,$x[$j]['codpre']);
          $c->add(OpretordPeer::CODTIP,$fondos->getCodtip());
          $numero= OpretordPeer::doSelectOne($c);
          if ($numero)
          {
            $numero->setNumret($referencia);
          }
        }
        else
        {
          $c = new Criteria();
          $c->add(OpretordPeer::NUMORD,$x[$j]['numord']);
          $c->add(OpretordPeer::CODTIP,$fondos->getCodtip());
          $numero= OpretordPeer::doSelectOne($c);
          if ($numero)
          {
            $numero->setNumret($referencia);
          }
        }
        $numero->save();
      }
      $j++;
    }
  }

  public static function agregaBenefi($fondos)
  {
    $c= new Criteria();
    $c->add(OpbenefiPeer::CEDRIF, $fondos->getCedrif());
    $ben= OpbenefiPeer::doSelectOne($c);
    if ($ben)
    {return false;}
    else {return true;}
  }

  public static function grabarBenefi($fondos)
  {
    $benefi= new Opbenefi();
    $benefi->setCedrif($fondos->getCedrif());
    $benefi->setNomben($fondos->getNomben());
    $benefi->setCodcta($fondos->getCtapag());
    $benefi->save();
  }
/********************************************************************************************************/

/**************************************Ordenes de Pago***************************************************/
  public static function obtenerCorrelativo($orden,&$msj,&$correlativo)
  {
    $msj=-1;
    if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
    {
      if ($orden->getNumord()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

          $sql="select numord from opordpag where numord='".$numero."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $correlativo=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
    }
  }

  public static function salvarPagemiord($orden,$grid,$grid2,$grid3,$referencias,$cuentaporpagarrendicion,$numerocomp,$comprobaut)
  {
    $nroregimp=count($grid[0]);
    self::formload(&$afectarecargo,&$ordpagnom,&$ordpagapo,&$ordpagliq,&$ordpagfid,&$ordpagval,&$compadic,&$genctaord);
    if (self::afectaPresupuesto($orden,&$refiere)==true)
    {
     self::grabarOrden($orden,$cuentaporpagarrendicion,$numerocomp,$nroregimp,&$msj);
     if ($comprobaut=='S')
     {
     	if ($orden->getDocumento()=='C' || $orden->getDocumento()=='P')
     	{
     	  $t= new Criteria();
     	  $resul=OpdefempPeer::doSelectOne($t);
     	  if ($resul)
     	  {
     	  	if ($resul->getGenctaord()=='S')
     	  	{
              self::grabarComprobanteOrdenAutomatico($orden);
     	  	}
     	  }
     	}
     	self::grabarComprobanteAutomatico($orden,$grid,&$correl3);
     	$orden->setNumcom($correl3);
     	$orden->save();
     }
     if (self::agregaBenefi($orden)==true)
     {
      self::grabarBenefi($orden);
     }
     self::grabarImputaciones($orden,$grid,$refiere,$referencias);
     self::grabarCausado($orden,$grid,$refiere,$referencias);
     if (count($grid2[0])>0)
     {
     self::grabarFacturas($orden,$grid2);}
     self::grabarRetencion($orden,$grid3);
     self::actualizarOrdenPag($orden,$grid3);

    }
    else
    {
     self::grabarOrden($orden,$cuentaporpagarrendicion,$numerocomp,$nroregimp,&$msj);
     if ($comprobaut=='S')
     {
       if ($orden->getDocumento()=='C' || $orden->getDocumento()=='P')
     	{
     	  $t= new Criteria();
     	  $resul=OpdefempPeer::doSelectOne($t);
     	  if ($resul)
     	  {
     	  	if ($resul->getGenctaord()=='S')
     	  	{
              self::grabarComprobanteOrdenAutomatico($orden);
     	  	}
     	  }
     	}
     	self::grabarComprobanteAutomatico($orden,$grid,&$correl3);
     	$orden->setNumcom($correl3);
     	$orden->save();
     }
     if (self::agregaBenefi($orden)==true)
     {
       self::grabarBenefi($orden);
     }
     self::grabarImputaciones($orden,$grid,$refiere,$referencias);
      if (count($grid2[0])>0)
     {
     self::grabarFacturas($orden,$grid2);}
     self::grabarRetencion($orden,$grid3);
     self::actualizarOrdenPag($orden,$grid3);
   }
 }

  public static function grabarOrden($orden,$cuentaporpagarrendicion,$numerocomp,$nroregimp,&$msj)
  {
    $tienecorrelativo=false;
    if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
    {
      if ($orden->getNumord()=='########')
      {
      	  $valido=false;
      	  $longitud='8';
      	  $nroorden=0;
      	  $formato='';
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = date('ym');
	      	$mes=date('m');
	      	$longitud='4';
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,3,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $orden->setNumord($nroorden);

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = date('my');
			$longitud='4';
			$mes=date('m');
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,1,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $orden->setNumord($nroorden);

	      }else{
	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $orden->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));
        }
      }
      else
      {
        $orden->setNumord(str_replace('#','0',$orden->getNumord()));
      }
    }

   if ($tienecorrelativo)
   {
     Herramientas::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,$msg);
   }

   if ($nroregimp==0)
   {
    $orden->setMonord($orden->getNeto());
   }

   $c= new Criteria();
   $c->add(OpbenefiPeer::CEDRIF, $orden->getCedrif());
   $ben= OpbenefiPeer::doSelectOne($c);
   if ($ben) $orden->setNomben($ben->getNomben());

   $orden->setStatus('N');
   $orden->setNumche(null);
   $orden->setCtaban(null);
   $orden->setNumcom($numerocomp);
   if ($cuentaporpagarrendicion!="")
   {
     $orden->setCtapag($cuentaporpagarrendicion);
   }

   $e= new Criteria();
   $ooo= OpdefempPeer::doSelectOne($e);
   if ($ooo)
   {
      if ($ooo->getReqaprord()=='S')
      {
      	if ($orden->getTipcau()==$ooo->getOrdtna() || $orden->getTipcau()==$ooo->getOrdtba())
      	{
          $orden->setAprobadoord('A');
      	}
      }
   }//////////////////////

   $orden->save();
   Comprobante::ActualizarReferenciaComprobante($numerocomp,$orden->getNumord());

  }

  public static function grabarImputaciones($orden,$grid,$refiere,$referencias)
  {
    $referencia=$orden->getNumord();
    $x=$grid[0];
    if ($referencias=='')
    { $referencias='_';}
    $refere=split('_',$referencias);
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodpre()!='')
      {
        $x[$j]->setNumord($referencia);
        if ($refiere=='N')
        {
          $x[$j]->setRefcom('NULO');
        }
        else
        {
          $x[$j]->setRefcom($refere[$j+1]);
        }
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function formload(&$afectarecargo,&$ordpagnom,&$ordpagapo,&$ordpagliq,&$ordpagfid,&$ordpagval,&$compadic,&$genctaord)
  {
    $c = new Criteria();
    $reg= CadefartPeer::doSelectOne($c);
    if ($reg)
    {
      $afectarecargo=$reg->getAsiparrec();
    }else {$afectarecargo='C';}

    $c = new Criteria();
    $c->add(OpdefempPeer::CODEMP,'001');
    $reg2= OpdefempPeer::doSelectOne($c);
    if ($reg2)
    {
      $ordpagnom=$reg2->getOrdnom();
      $ordpagapo=$reg2->getOrdobr();
      $ordpagliq=$reg2->getOrdliq();
      $ordpagfid=$reg2->getOrdfid();
      $ordpagval=$reg2->getOrdval();
      $compadic=$reg2->getGencomadi();
      $genctaord=$reg2->getGenctaord();
    }
    else
    {
      $ordpagnom='####';
      $ordpagapo='####';
      $ordpagliq='####';
      $ordpagfid='####';
      $ordpagval='####';
      $compadic="";
      $genctaord="";
    }

  }

  public static function partida(&$partidas)
  {
    $sql="Select DISTINCT(CODPAR) as CODPAR from TSRetIva";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
      foreach ($result as $par)
      {
        $partidas=$partidas.'_'.$par["codpar"];
      }
    }else { $partidas='';}
  }

  public static function Buscar_Correlativo()
  {
    return Comprobante::Buscar_Correlativo();
  }

  public static function grabarComprobante($orden,$grid,&$cuentaporpagarrendicion,&$mensaje,&$msjuno,&$msjdos,&$arrcompro)
  {
    $mensaje="";
    $numeroorden="";
    self::formload(&$afectarecargo,&$ordpagnom,&$ordpagapo,&$ordpagliq,&$ordpagfid,&$ordpagval,&$compadic,&$genctaord);
    if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
    {
      if ($orden->getNumord()=='########')
      {
          $valido=false;
      	  $longitud='8';
      	  $nroorden=0;
      	  $formato='';
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = date('ym');
	      	$mes=date('m');
	      	$longitud='4';
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,3,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$numeroorden=$nroorden;

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = date('my');
			$longitud='4';
			$mes=date('m');
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,1,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$numeroorden=$nroorden;

	      }else{
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      }
      else
      {
        $numeroorden=str_replace('#','0',$orden->getNumord());
      }
    }
    $numeroorden2="OP".substr($numeroorden,2,6);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numeroorden2;
    }else $numerocomprob= '########';

    $reftra = $numeroorden2;
    $cuentaporpagarrendicion="";
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";
    $msjdos="";
    $c = new Criteria();
    $resul= TsdefrengasPeer::doSelectOne($c);
    if ($resul)
    {
      if (($orden->getTipcau()==$resul->getPagrepcaj()) && ($resul->getCtarepcaj()!=''))
      {
        $sql="Select A.CodCtaCajChi as codctacajchi,B.DesCta as descta from OPBenefi A,Contabb B where A.CedRif='".$orden->getCedrif()."' and A.CodCtaCajChi=B.CodCta";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          if ($result[0]["codctacajchi"]!='')
          {
            $cuenta=$result[0]["codctacajchi"];
          }else { $cuenta='';}
          $monord=$orden->getMonord();
          if ($monord>0)
          {
            $codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getMonord();
            $monto=$mon;
          }else{
          	$codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getNeto();
            $monto=$mon;
          }
        }else { $msjuno='El Código Contable de la Caja Chica asociado al Beneficiario no es válido'; return true;}
        $codigocuentapagar=$resul->getCtarepcaj();
        $cuentaporpagarrendicion=$codigocuentapagar;
        $sql2="SELECT CodCta,DesCta FROM CONTABB WHERE CODCTA = '".$codigocuentapagar."'";
        if (Herramientas::BuscarDatos($sql2,&$result2))
        {
          $codigocuenta2=$codigocuentapagar;
          $tipo2='C';
          $des2="";
          $mont=$orden->getMonord();
          $monto2=$mont;
        }else { $msjdos='El Código Contable asociado a la Cuenta Transitoria por Pagar no es válido';  return true;}

        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
      }
      else
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $c= new Criteria();
          $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
          $regis = CpdeftitPeer::doSelectOne($c);
          if ($regis)
          {
            if($regis->getCodcta()!='')
            {
              $cuenta=$regis->getCodcta();
            }else {$cuenta='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
              $moncau=$x[$j]->getMoncau();
              if ($moncau>0)
              {
                if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
                {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mont1=$x[$j]->getMoncau();
                  $mont2=$x[$j]->getMonret();
                  $monto=$mont1 - $mont2;
                }else {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mon=$x[$j]->getMoncau();
                  $monto=$mon;
                }
              }
            }else { $msjuno='El Código Presupuestario no tiene asociado Codigo Contable válido'; return true;}
          }
          if ($moncau>0)
          {
          if ($j==0)
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
          }
          $j++;
        }
        if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
        {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
          $a=$orden->getMonord();
          $monto2=$a;
        }else {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
           if ($orden->getAfectapre()==1) $a=$orden->getMonord();
           else $a=$orden->getNeto();
          $monto2=$a;
        }
        $cuentas=$codigocuenta2.'_'.$codigocuentas;
        $descr=$des2.'_'.$desc;
        $tipos=$tipo2.'_'.$tipo1;
        $montos=$monto2.'_'.$monto1;
      }
    }else
    {
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if($regis->getCodcta()!='')
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=H::tofloat($x[$j]->getMoncau());
            if ($moncau>0)
            {
              if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
              {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();
                $monto=$moncau;
              }else {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();
                $monto=$moncau;
              }
            }
          }else { $msjuno='El Código Presupuestario no tiene asociado Codigo Contable válido'; return true;}
        if ($moncau>0)
        {
         if ($j==0)
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
        }

        }

        $j++;
      }

      if(($orden->getTipcau()==$ordpagnom) or ($orden->getTipcau()==$ordpagapo) or ($orden->getTipcau()==$ordpagliq))
      {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
        $b=$orden->getMonord();
        $monto2=$b;
      }else {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
         //if ($orden->getAfectapre()==1) $b=$orden->getMonord();
           //else $b=$orden->getNeto();
        $b=$orden->getMonord();
        $monto2=$b;
      }
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;
    }

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($orden->getFecemi())));
      $clscommpro->setDestra($orden->getDesord()." - ".$orden->getNomben());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }

  public static function obtenerTags($command,&$tag1,&$tag2)
  {
    if ($command=="")
    {
     $tag1="";
     $tag2="";
    }
    if ($command=='P')
    {
      $tag1="SI";
    }else { $tag1="";}

    if ($command=='C')
    {
      $tag2="SI";
    }else { $tag2="";}
  }

  public static function grabarComprobanteOrden($orden,$command,&$mensaje,&$msj1,&$msj2,&$arrcompro)
  {
    $msj1="";
    $msj2="";
    self::obtenerTags($command,&$tag1,&$tag2);
    $c = new Criteria();
    $c->add(CaproveePeer::RIFPRO,$orden->getCedrif());
    $reg = CaproveePeer::doSelectOne($c);
    if ($reg)
    { $tipoben=$reg->getTipo();}
      $mensaje="";
    if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
    {
      if ($orden->getNumord()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

          $sql="select numord from opordpag where numord='".$numero."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      else
      {
        $numeroorden=str_replace('#','0',$orden->getNumord());
      }
    }
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob="PR".substr($numeroorden,2,6);
    }else $numerocomprob= '########';

    $reftra="PR".substr($numeroorden,2,6);

    $b = new Criteria();
    $b->add(OpbenefiPeer::CEDRIF,$orden->getCedrif());
    $reg2 = OpbenefiPeer::doSelectOne($b);
    if ($reg2)
    {
        if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta=$reg2->getCodord();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta=$reg2->getCodordadi();
            }
          }else { $cuenta=$reg2->getCodord();}
        }else { $cuenta=$reg2->getCodord();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta);
        $reg3 = ContabbPeer::doSelectOne($c);
        if ($reg3)
        {
         $codigocuenta=$reg3->getCodcta();
         $tipo='C';
         $des="";
         $mon2=$orden->getMonord();
         $monto=$mon2;
        }else { $msj1='El Beneficiario no tiene una Cuenta de Orden válida asociada'; return true;}

       if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta2=$reg2->getCodpercon();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta2=$reg2->getCodperconadi();
            }
          }else { $cuenta2=$reg2->getCodpercon();}
        }else { $cuenta2=$reg2->getCodpercon();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta2);
        $reg4 = ContabbPeer::doSelectOne($c);
        if ($reg4)
        {
         $codigocuenta2=$reg4->getCodcta();
         $tipo2='D';
         $des2="";
         $mon=$orden->getMonord();
         $monto2=$mon;
        }else { $msj2='El Beneficiario no tiene una Cuenta de Percontra válida asociada'; return true;}
    }

    $cuentas=$codigocuenta.'_'.$codigocuenta2;
    $tipos=$tipo.'_'.$tipo2;
    $descr=$des.'_'.$des2;
    $montos=$monto.'_'.$monto2;

     $clscommpro=new Comprobante();
     $clscommpro->setGrabar("N");
     $clscommpro->setNumcom($numerocomprob);
     $clscommpro->setReftra($reftra);
     $clscommpro->setFectra(date("d/m/Y",strtotime($orden->getFecemi())));
     $clscommpro->setDestra($orden->getDesord());
     $clscommpro->setCtas($cuentas);
     $clscommpro->setDesc($descr);
     $clscommpro->setMov($tipos);
     $clscommpro->setMontos($montos);
     $arrcompro[]=$clscommpro;

   return true;
  }

  public static function grabarFacturas($orden,$grid2)
  {
    $referencia=$orden->getNumord();
    //primero elimino todas las facturas, para luego guardar las que el usuario haya dejado en el grid
    Herramientas::EliminarRegistro('Opfactur','Numord',$orden->getNumord());
    $x=$grid2[0];
    if (count($x)!=0)
    {
    $j=0;
    while ($j<count($x))
    {
      if (($x[$j]['fecfac']!='') and (($x[$j]['numfac']!='') or ($x[$j]['notdeb']!='') or ($x[$j]['notcrd']!='')))
      {
        $factura= new Opfactur();
        $factura->setNumord($referencia);
        if ($x[$j]['tiptra']=='01')
        {
          $factura->setNumfac($x[$j]['numfac']);
        }
        else if ($x[$j]['tiptra']=='02')
        {
          $factura->setNumfac($x[$j]['notdeb']);
        }
        else
        {
          $factura->setNumfac($x[$j]['notcrd']);
        }

        if ($x[$j]['tiptra']=='01')
        {
          $factura->setFacafe($x[$j]['facafe']);
        }
        $factura->setFecfac($x[$j]['fecfac']);
        $factura->setNumctr($x[$j]['numctr']);
        $factura->setTiptra($x[$j]['tiptra']);
        $factura->setPoriva($x[$j]['poriva']);
        $factura->setTotfac($x[$j]['totfac']);
        $factura->setExeiva($x[$j]['exeiva']);
        $factura->setBasimp($x[$j]['basimp']);
        $factura->setMonret($x[$j]['monret']);
        $factura->setMoniva($x[$j]['moniva']);
        $factura->setBasltf($x[$j]['basltf']);
        $factura->setPorltf($x[$j]['porltf']);
        $factura->setMonltf($x[$j]['monltf']);
        $factura->setBasislr($x[$j]['basislr']);
        $factura->setPorislr($x[$j]['porislr']);
        $factura->setMonislr($x[$j]['monislr']);
        $factura->setCodislr($x[$j]['codislr']);
        $factura->setRifalt($x[$j]['rifalt']);

        $factura->save();
      }
      $j++;
    }
   }

  }

  public static function grabarRetencion($orden,$grid3)
  {
    $referencia=$orden->getNumord();
    $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['codtip']!='')
      {
        $opretord= new Opretord();
        $opretord->setNumord($referencia);
        $opretord->setCodtip($x[$j]['codtip']);
        $opretord->setMonret($x[$j]['monret']);
        $opretord->setCodpre($x[$j]['codpre']);
        $opretord->setNumret('NOASIGNA');
        $opretord->setRefere($x[$j]['refere']);
        $opretord->setCorrel(str_pad($j+1,3,'0',STR_PAD_LEFT));
        $opretord->setMonbas(0);
        $opretord->save();
      }
     $j++;
    }
  }

  public static function grabarCausado($orden,$grid,$refiere,$referencias)
  {
     $c = new Criteria();
     $c->add(CpcausadPeer::REFCAU,$orden->getNumord());
     $causa = CpcausadPeer::doSelectOne($c);
     if (!$causa)
     {
       $causado = new Cpcausad();
       $causado->setRefcau($orden->getNumord());
       $causado->setTipcau($orden->getTipcau());
       $causado->setFeccau($orden->getFecemi());
       $causado->setAnocau(substr($orden->getFecemi(),0,4));
       $causado->setRefcom(null);
       $causado->setTipcom(null);
       $causado->setDescau($orden->getDesord());
       $causado->setDesanu(null);
       $causado->setMoncau($orden->getMonord());
       $causado->setSalpag(0);
       $causado->setSalaju(0);
       $causado->setStacau('A');
       $causado->setCedrif($orden->getCedrif());
       $causado->save();

       if ($referencias=='')
       { $referencias='_';}
       $refere=split('_',$referencias);
       $x=$grid[0];
       $j=0;
       while ($j<count($x))
       {
         $detalle = new Cpimpcau();
         $detalle->setRefcau($orden->getNumord());
         $detalle->setCodpre($x[$j]->getCodpre());
         $detalle->setMonimp($x[$j]->getMoncau());
         $detalle->setMonpag(0);
         $detalle->setMonaju(0);
         $detalle->setStaimp('A');
         if ($refiere=='N')
         {
           $detalle->setRefere('NULO');
           $detalle->setRefprc('NULO');
         }
         else
         {
           if ($refiere=='C')
           {
             $detalle->setRefere($refere[$j+1]);
             $c = new Criteria();
             $c->add(CpimpcomPeer::CODPRE,$x[$j]->getCodpre());
             $c->add(CpimpcomPeer::REFCOM,$refere[$j+1]);
             $ref= CpimpcomPeer::doselectOne($c);
             if ($ref)
             {
              if ($ref->getRefere()!='')
              {
                $detalle->setRefprc($ref->getRefere());
              }
              else
              {
                $detalle->setRefprc('NULO');
              }
             }
             else{$detalle->setRefprc('NULO');}
           }
           else
           {
             $detalle->setRefere('NULO');
             $detalle->setRefprc($refere[$j+1]);
           }
         }
         $detalle->save();
         $j++;
       }
    }
  }

  public static function datosRefere($codigo,$fec,&$fecha,&$descripcion,&$tipo,&$destipo,&$elrif,&$descripcion2,&$msj)
  {
    $c= new Criteria();
    $c->add(CpprecomPeer::REFPRC,$codigo);
    $datos= CpprecomPeer::doselectOne($c);
    if ($datos)
    {
      if ($datos->getStaprc()=='A')
      {
        if ($datos->getMonprc()> $datos->getSalcau())
        {
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));
          if ($datos->getFecprc()<= $fec1)
          {
            $descripcion=$datos->getDesprc();
            $fecha=date("d/m/Y",strtotime($datos->getFecprc()));
            $tipo=$datos->getTipprc();
            $elrif=$datos->getCedrif();
            $descripcion2=$datos->getDesprc();

            $c= new Criteria();
            $c->add(CpdocprcPeer::TIPPRC,$tipo);
            $datos2= CpdocprcPeer::doSelectOne($c);
            if ($datos2)
            {
              $destipo=$datos2->getNomext();
            }else {$destipo='';}
          }else { $msj='La Fecha del Precompromiso es Mayor a la Orden de Pago';}
        }else { $msj='El Precompromiso se encuentra totalmente Causado';}
      }else { $msj='El Precompromiso se encuentra anulado';}
    }else { $msj='La Referencia No existe';}
  }

  public static function encontroReferencia($arreglo,$referencia)
  {
    $posicion=1;
    $encontro=false;
    if ($arreglo=='')
    { $arreglo='_';}
    $arre=split('_',$arreglo);
    $indice=count($arre)-1;
    while (($posicion<=$indice) and (!$encontro))
    {
      if ($arre[$posicion]==$referencia)
      {
        $encontro=true;
      }else {$encontro=false;}
      $posicion++;
    }
    return $encontro;
  }

  public static function datosRefere2($codigo,$fec,$referencias,&$fecha,&$descripcion,&$tipo,&$elrif,&$descripcion2,&$destipo,&$financiamiento,&$oppermanente,&$montocuo,&$msj)
  {
    $montocausado=0;
    $msj="";
    $montoajustado=0;

    $c= new Criteria();
    $c->add(CpcomproPeer::REFCOM,$codigo);
    $datos= CpcomproPeer::doselectOne($c);
    if ($datos)
    {
      if (!self::encontroReferencia($referencias,$codigo))
      {
        if ($datos->getStacom()=='A')
        {
          $t= new Criteria();
          $trajo=CadefartPeer::doSelectOne($t);
          if ($trajo)
          {
          	if ($trajo->getComreqapr()=='S')
          	{
          		if ($datos->getAprcom()=='S')
          		{

          $SQL = "Select Sum(MonCau) as moncau from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL,&$reg))
          {
            $montocausado= $reg[0]['moncau'];
          }

          $SQL1 = "Select Sum(monaju) as monaju from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL1,&$reg2))
          {
            $montoajustado= $reg2[0]['monaju'];
          }

          if (($datos->getMoncom()) > ($montocausado+$montoajustado))
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fec2 = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));

            if ($datos->getFeccom()<= $fec2)
            {
              $descripcion=$datos->getDescom();
              $fecha=date("d/m/Y",strtotime($datos->getFeccom()));
              $tipo=$datos->getTipcom();
              $elrif=$datos->getCedrif();
              $descripcion2=$datos->getDescom();

              $c= new Criteria();
              $c->add(CpdoccomPeer::TIPCOM,$tipo);
              $datos3= CpdoccomPeer::doSelectOne($c);
              if ($datos3)
              {
                $destipo=$datos3->getNomext();
              }else {$destipo='';}
              $monedacom=0;
              $monedaord=0;
              $c= new Criteria();
              $c->add(CaordcomPeer::ORDCOM,$codigo);
              $datos2= CaordcomPeer::doSelectOne($c);
              if ($datos2)
              {
                $financiamiento=$datos2->getTipfin();

                $sql="Select valmon from Tsdesmon where codmon='".$datos2->getTipmon()."' and fecmon=To_Date('".$fec."','DD/MM/YYYY') ";
                if (!Herramientas::BuscarDatos($sql,&$result))
                {
                  $c = new Criteria();
                  $c->add(TsdesmonPeer::CODMON,$datos2->getTipmon());
                  $c->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                  $reg = TsdesmonPeer::doSelectOne($c);
                  if ($reg)
                  {
                    $monedaord=$reg->getValmon();
                  }else {$monedaord=0;}
                }else {$monedaord=$result[0]['valmon'];}
                $monedacom=$datos2->getValmon();
              }else {$monedacom=0;}
              if ($monedacom!=$monedaord)
              {
                $monedaord='aqui se llama a la cajita para introducir la nueva tasa cambiaria';
              }


              /*$c= new Criteria();
               $c->add(OpdetperPeer::REFOPP,$codigo);
               $c->add(OpdetperPeer::FECPAG,null,CRITERIA::ISNULL);
               $c->addAscendingOrderByColumn(OpdetperPeer::FECINICUO);
               $registro= OpdetperPeer::doSelectOne($c);
               if ($registro)
               {
               $oppermanente=$codigo;
               $montocuo=$registro->getMoncuo();

               }else {$oppermanente=''; $montocuo='';}*/

              $oppermanente='';
              $montocuo='';

            }else { $msj='La Fecha de la Orden de Pago es menor a la del Compromiso';}
          }else { $msj='El Compromiso se encuentra totalmente Causado';}
        }else { $msj='El Compromiso no se encuentra Aprobado';}
        }
        else
        {
        	$SQL = "Select Sum(MonCau) as moncau from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL,&$reg))
          {
            $montocausado= $reg[0]['moncau'];
          }

          $SQL1 = "Select Sum(monaju) as monaju from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL1,&$reg2))
          {
            $montoajustado= $reg2[0]['monaju'];
          }

          if (($datos->getMoncom()) > ($montocausado+$montoajustado))
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fec2 = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));

            if ($datos->getFeccom()<= $fec2)
            {
              $descripcion=$datos->getDescom();
              $fecha=date("d/m/Y",strtotime($datos->getFeccom()));
              $tipo=$datos->getTipcom();
              $elrif=$datos->getCedrif();
              $descripcion2=$datos->getDescom();

              $c= new Criteria();
              $c->add(CpdoccomPeer::TIPCOM,$tipo);
              $datos3= CpdoccomPeer::doSelectOne($c);
              if ($datos3)
              {
                $destipo=$datos3->getNomext();
              }else {$destipo='';}
              $monedacom=0;
              $monedaord=0;
              $c= new Criteria();
              $c->add(CaordcomPeer::ORDCOM,$codigo);
              $datos2= CaordcomPeer::doSelectOne($c);
              if ($datos2)
              {
                $financiamiento=$datos2->getTipfin();

                $sql="Select valmon from Tsdesmon where codmon='".$datos2->getTipmon()."' and fecmon=To_Date('".$fec."','DD/MM/YYYY') ";
                if (!Herramientas::BuscarDatos($sql,&$result))
                {
                  $c = new Criteria();
                  $c->add(TsdesmonPeer::CODMON,$datos2->getTipmon());
                  $c->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                  $reg = TsdesmonPeer::doSelectOne($c);
                  if ($reg)
                  {
                    $monedaord=$reg->getValmon();
                  }else {$monedaord=0;}
                }else {$monedaord=$result[0]['valmon'];}
                $monedacom=$datos2->getValmon();
              }else {$monedacom=0;}
              if ($monedacom!=$monedaord)
              {
                $monedaord='aqui se llama a la cajita para introducir la nueva tasa cambiaria';
              }


              /*$c= new Criteria();
               $c->add(OpdetperPeer::REFOPP,$codigo);
               $c->add(OpdetperPeer::FECPAG,null,CRITERIA::ISNULL);
               $c->addAscendingOrderByColumn(OpdetperPeer::FECINICUO);
               $registro= OpdetperPeer::doSelectOne($c);
               if ($registro)
               {
               $oppermanente=$codigo;
               $montocuo=$registro->getMoncuo();

               }else {$oppermanente=''; $montocuo='';}*/

              $oppermanente='';
              $montocuo='';

            }else { $msj='La Fecha de la Orden de Pago es menor a la del Compromiso';}
          }else { $msj='El Compromiso se encuentra totalmente Causado';}
        }
        }else { $msj='El Tipo de Compromiso no existe';}
        }else { $msj='El Compromiso se encuentra anulado';}
      }else { $msj='La Referencia ya fue Causada';}
    }else { $msj='La Referencia No existe';}
  }

  public static function actualizarPagemiord($orden,$grid2)
  {
     $orden->save();
     self::grabarFacturas($orden,$grid2);
  }

  public static function validarPagemiord($grid,$afecta,&$cod,&$msj,&$monto)
  {
    $msj=-1;
    $cod="";
    $monto="";
    if (!self::UltimoChequeo($grid,$afecta,&$codigo,&$msj,&$mondis))
    {
        $msj=$msj;  $cod=$codigo; $monto=$mondis;
    }else { $msj=-1; $cod=""; $monto="";}
  }

  public static function UltimoChequeo($grid,$afecta,&$codigo,&$msj,&$mondis)
  {
   $ultimochequeo=true;
   $sobregiro=false;
   $x=$grid[0];
   $j=0;
   while ($j<count($x))
   {
      $codigo=$x[$j]->getCodpre();
     OrdendePago::montoValido($j,$x[$j]->getMoncau(),'N',$codigo,$afecta,&$msj,&$mondis,&$sobregiro);

    if ($sobregiro)
    {
     $ultimochequeo=false;
     break;
    }
    $j++;
   }
   return $ultimochequeo;
  }


  public static function encontrarIva($grid,$col,$id)
  {
    $x=$grid[0];
    $encontrariva=0;
    $j=0;
    $r="";
    while ($j<count($x))
    {
      $r=$x[$j][$col];

      $c= new Criteria();
      $c->add(TsretivaPeer::CODRET,$r);
      $reg= TsretivaPeer::doSelectOne($c);
      if ($reg)
      {
        $b= new Criteria();
        $b->add(CarecargPeer::CODRGO,$reg->getCodrec());
        $reg2=CarecargPeer::doSelectOne($b);
        if ($reg2)
        {
          $encontrariva=$reg2->getMonrgo();
          break;
        }
      }
      $j++;
    }

    return $encontrariva;
  }

  public static function encontrarIslr($grid,$columna,$colmonto,$tipo,$id)
  {
    $x=$grid[0];
    $encontrarislr=0;
    $j=0;
    $col1="";
    $col2="";
    while ($j<count($x))
    {
     $col1=$x[$j][$columna];
     $col2=$x[$j][$colmonto];

      switch($tipo)
      {
        case "ISLR":
          $c= new Criteria();
          $c->add(TsrepretPeer::CODREP,'002');
          $c->add(TsrepretPeer::CODRET,$col1);
          $reg= TsrepretPeer::doSelectOne($c);
          break;
       case "1*MIL":
         $c= new Criteria();
         $c->add(TsrepretPeer::CODREP,'003');
         $c->add(TsrepretPeer::CODRET,$col1);
         $reg= TsrepretPeer::doSelectOne($c);
         break;
      }
      if ($reg)
      {
        $encontrarislr=$col2;
        break;
      }
      $j++;
    }
    return $encontrarislr;
  }

  public static function llenarComboIva($gridret,$colcod,$numord,$id,$arreglo)
  {
    $comboboxiva=array();
    $x=$gridret[0];
    $j=0;
    if (count($x)>0)
    {
    if ($id=="" && $arreglo!="")
    {
      $arre=split('_',$arreglo);
      $col1="";
      while ($j<count($x))
      {
      $col1=$x[$j][$colcod];

      $c= new Criteria();
      $c->add(TsretivaPeer::CODRET,$col1);
      $resul= TsretivaPeer::doSelect($c);
      if ($resul)
      {
        foreach ($resul as $codigo)
        {
          $z=0;
          while ($z<(count($arre)-1))
          {
            $b= new Criteria();
            $b->add(CargosolPeer::REQART,$arre[$z+1]);
            $b->add(CargosolPeer::CODRGO,$codigo->getCodrec());
            $result2= CargosolPeer::doSelectOne($b);
            if ($result2)
            {
              $a= new Criteria();
              $a->add(CarecargPeer::CODRGO,$result2->getCodrgo());
              $result3= CarecargPeer::doSelectOne($a);
              if ($result3)
              {
              $comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
              }
            }
            else
            {
            $a= new Criteria();
            $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
            $result3= CarecargPeer::doSelectOne($a);
            if ($result3)
            {
              $comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
            }
          }
            $z++;
          }
        }
      }
      $j++;
    }
  }
  else if ($id=="" && $arreglo=="")
  {
     $col1="";
      while ($j<count($x))
      {
       $col1=$x[$j][$colcod];

       $c= new Criteria();
       $c->add(TsretivaPeer::CODRET,$col1);
       $resul= TsretivaPeer::doSelect($c);
       if ($resul)
       {
        foreach ($resul as $codigo)
        {
         $a= new Criteria();
         $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
         $result3= CarecargPeer::doSelectOne($a);
         if ($result3)
         {
          $comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
         }
        }
      }
     $j++;
    }
  }else if ($id!="")
  {
    $referencias="";
    $sql="select distinct (refere) as refere from cpimpcau where refcau='".$numord."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $c= new Criteria();
      $c->add(OpordpagPeer::NUMORD,$numord);
      $dat=OpordpagPeer::doSelectOne($c);
      if ($dat)
      {
        $a= new Criteria();
        $a->add(CpdoccauPeer::TIPCAU,$dat->getTipcau());
        $dat2=CpdoccauPeer::doSelectOne($a);
        if ($dat2)
        {
          if ($dat2->getRefier()=='C')
          {
            foreach ($result as $ref)
            {
             $referencias=$referencias.'_'.$ref["refere"];
            }

            $arreglo=$referencias;
            $arre=split('_',$arreglo);
            $col1="";
            while ($j<count($x))
            {
              $col1=$x[$j][$colcod];

              $c= new Criteria();
              $c->add(TsretivaPeer::CODRET,$col1);
              $resul= TsretivaPeer::doSelect($c);
              if ($resul)
              {
               foreach ($resul as $codigo)
               {
                $z=0;
                while ($z<(count($arre)-1))
                {
                 $b= new Criteria();
                 $b->add(CargosolPeer::REQART,$arre[$z+1]);
                 $b->add(CargosolPeer::CODRGO,$codigo->getCodrec());
                 $result2= CargosolPeer::doSelectOne($b);
                 if ($result2)
                 {
                  $a= new Criteria();
                  $a->add(CarecargPeer::CODRGO,$result2->getCodrgo());
                  $result3= CarecargPeer::doSelectOne($a);
                  if ($result3)
                  {
                   $comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
                  }
                 }
                 else
                 {
                   $a= new Criteria();
                $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
                $result3= CarecargPeer::doSelectOne($a);
                if ($result3)
                {
                  $comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
                }
                 }
                $z++;
                }
               }
              }
            $j++;
           }
          }
          else
          {
            $col1="";
            while ($j<count($x))
            {
             $col1=$x[$j][$colcod];

             $c= new Criteria();
             $c->add(TsretivaPeer::CODRET,$col1);
             $resul= TsretivaPeer::doSelect($c);
             if ($resul)
             {
              foreach ($resul as $codigo)
              {
               $a= new Criteria();
               $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
               $result3= CarecargPeer::doSelectOne($a);
               if ($result3)
               {
                $comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
               }
              }
             }
             $j++;
             }
           }
        }
      }
    }
    else
    {
      $col1="";
      while ($j<count($x))
      {
       $col1=$x[$j][$colcod];

       $c= new Criteria();
       $c->add(TsretivaPeer::CODRET,$col1);
       $resul= TsretivaPeer::doSelect($c);
       if ($resul)
       {
        foreach ($resul as $codigo)
        {
         $a= new Criteria();
         $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
         $result3= CarecargPeer::doSelectOne($a);
         if ($result3)
         {
          $comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
         }
        }
       }
      $j++;
     }
    }
  }
  }
  else
  {
    $a= new Criteria();
     $result3= CarecargPeer::doSelect($a);
     if ($result3)
     {
       foreach ($result3 as $obj)
       {
         $comboboxiva[$obj->getMonrgo()] = $obj->getCodrgo().'_'.$obj->getNomrgo();
       }
     }
  }
      return $comboboxiva;
 }

  public static function llenarComboIslr($gridret,$colcod,$id)
  {
    $x=$gridret[0];
    $comboboxislr=array();
    $col1="";
    $j=0;
   if (count($x)>0)
   {
    while ($j<count($x))
    {
      $col1=$x[$j][$colcod];

      $c= new Criteria();
      $c->add(TsrepretPeer::CODREP,'002');
      $c->add(TsrepretPeer::CODRET,$col1);
      $resul= TsrepretPeer::doSelectOne($c);
      if ($resul)
      {
        $b= new Criteria();
        $b->add(OptipretPeer::CODTIP,$col1);
        $result2= OptipretPeer::doSelectOne($b);
        if ($result2)
        {
         if ($result2->getPorret()>0)
         {
           $comboboxislr[$result2->getPorret()] = $col1.'_'.$result2->getDestip();
         }else{
         	$comboboxislr[$result2->getPorsus()] = $col1.'_'.$result2->getDestip();
         }
        }
      }
     $j++;
    }
   }
   else
   {
    $b= new Criteria();
    $result2= OptipretPeer::doSelect($b);
    if ($result2)
    {
      foreach ($result2 as $obj2)
      {
        $comboboxislr[$obj2->getPorret()] = $obj2->getCodtip().'_'.$obj2->getDestip();
      }
    }
   }
    return $comboboxislr;
  }

  public static function facturar($numord,$id,$gridret,$arreglo,&$eliva,&$elislr,&$eltimbre,&$msj,&$comboiva,&$comboislr)
  {
    $eliva=0;
    $elislr=0;
    $eltimbre=0;
    $comboiva=array();
    $comboislr=array();
    if ($numord!="")
    {
      if ($id=="")
      {
        $eliva=self::encontrarIva($gridret,'codtip',$id);
        $elislr=self::encontrarIslr($gridret,'codtip','montorete','ISLR',$id);
        $eltimbre=self::encontrarIslr($gridret,'codtip','montorete','1*MIL',$id);
        $comboiva=self::llenarComboIva($gridret,'codtip',$numord,$id,$arreglo);
        $comboislr=self::llenarComboIslr($gridret,'codtip','destip','porret',$id);
      }
      else
      {
        $eliva=self::encontrarIva($gridret,'codtip',$id);
        $elislr=self::encontrarIslr($gridret,'codtip','montoret','ISLR',$id);
        $eltimbre=self::encontrarIslr($gridret,'codtip','montoret','1*MIL',$id);
        $comboiva=self::llenarComboIva($gridret,'codtip',$numord,$id,$arreglo);
        $comboislr=self::llenarComboIslr($gridret,'codtip','destip','porret',$id);
      }

      /*if (($eliva!=0) or ($elislr!=0) or ($eltimbre)!=0)
      {
        $msj="";
      }
      else
      {
         $msj='Aun no se han aplicado Retenciones';
      }*/
    }
  }

  public static function verificarStatusComprobante($numero)
  {
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numero);
    $datos= ContabcPeer::doSelectOne($c);
    if ($datos)
    {
      if ($datos->getStacom()!='A')
      {
        $verificarstatuscomprobante=true;
      }
      else { $verificarstatuscomprobante=false;}
    }
    else { $verificarstatuscomprobante=false;}

   return $verificarstatuscomprobante;
  }

  public static function eliminarCausado($numord)
  {
    Herramientas::EliminarRegistro('Cpimpcau','Refcau',$numord);
    $c= new Criteria();
    $c->add(CpcausadPeer::REFCAU,$numord);
    $dato= CpcausadPeer::doSelectOne($c);
    if ($dato)
    {
    $dato->delete();
    }
  }

  public static function eliminarRetenciones($numord,&$puedeeliminar,&$msj)
  {
    $haypagosret=false;
    $msj="";
    $sql="Select numord as numord, codtip as codtip, numret as numret from opretord where numord='".$numord."' and numret<>'NOASIGNA' group by numord,codtip,numret";
    $result=array();
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $j=0;
      while ($j<count($result))
      {
        $ordenret=$result[$j]['numret'];
        $c= new Criteria();
        $c->add(OpordpagPeer::STATUS,'N',Criteria::NOT_EQUAL);
        $c->add(OpordpagPeer::NUMORD,$ordenret);
        $dato= OpordpagPeer::doSelectOne($c);
        if ($dato)
        {
          $msj="Una de las Ordenes de Pago ya fue Pagada";
          $haypagosret=true;
          $puedeeliminar=false;
          break;
        }
       $j++;
      }

      if (!$haypagosret)
      {
        $tempnumord=$numord;
        $puedeeliminar=true;
        $z=0;
        while ($z<count($result))
        {
          $numord=$result[$z]['numret'];
          $b= new Criteria();
          $b->add(OpordpagPeer::NUMORD,$result[$z]['numret']);
          $datos= OpordpagPeer::doSelectOne($b);
          if ($datos)
          {
          if ($datos->getStatus()=='A')
          {
            $msj="La Orden de Pago ha sido Anulada";
            break;
          }

          if (($datos->getNumche()=='') || (strlen($datos->getNumche())==0))
          {
            Herramientas::EliminarRegistro('Opdetord','Numord',$numord);
            self::EliminarCausado($numord);
            self::eliminarOPP($numord);
            $datos->delete();
          }
          else { $msj="La Orden ya fue Pagada en el Módulo de Bancos"; break;}
          }
         $z++;
        }

        $numord=$tempnumord;
        $f= new Criteria();
        $f->add(OpretordPeer::NUMORD,$numord);
        $reg= OpretordPeer::doSelect($f);
        if ($reg)
        {
          foreach ($reg as $opretord)
          {
          $opretord->delete();
          }
        }
      }
    }
    else
    {
      $puedeeliminar=true;
      $f= new Criteria();
      $f->add(OpretordPeer::NUMORD,$numord);
      $reg= OpretordPeer::doSelect($f);
      if ($reg)
      {
       foreach ($reg as $opretord)
       {
        $opretord->delete();
       }
      }
    }
  }

  public static function eliminarComprob($fecha,$numcomprob)
  {
   $b= new Criteria();
   $b->add(Contabc1Peer::FECCOM,$fecha);
   $b->add(Contabc1Peer::NUMCOM,$numcomprob);
   Contabc1Peer::doDelete($b);

   $c = new Criteria();
   $c->add(ContabcPeer::FECCOM,$fecha);
   $c->add(ContabcPeer::NUMCOM,$numcomprob);
   ContabcPeer::doDelete($c);
  }

  public static function eliminarOrdenRetencion($orden)
  {
    $c= new Criteria();
    $c->add(OpretordPeer::NUMRET,$orden);
    $regis= OpretordPeer::doSelect($c);
    if ($regis)
    {
      foreach ($regis as $opretord)
      {
        $opretord->setNumret('NOASIGNA');
        $opretord->save();
      }
    }
  }

  public static function anularComprobOrden($numero,$fecha,&$msj)
  {
    $msj="";
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numero);
    $resul= ContabcPeer::doSelectOne($c);
    if ($resul)
    {
      $numcom= 'AR'.substr($resul->getNumcom(),2,6);
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

      $contabc= new Contabc();
      $contabc->setNumcom($numcom);
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $contabc->setFeccom($fec);}
      else { $contabc->setFeccom(date('Y-m-d'));}
      $contabc->setDescom($resul->getDescom());
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setMoncom($resul->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$numero);
      $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $resul2= Contabc1Peer::doSelect($a);
      if ($resul2)
      {
        $asiento=0;
        foreach ($resul2 as $datos)
        {
           $numcom1= 'AR'.substr($datos->getNumcom(),2,6);
          $contabc1= new Contabc1();
          $contabc1->setNumcom($numcom1);
          if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
          { $contabc1->setFeccom($fec);}
          $contabc1->setCodcta($datos->getCodcta());
          $asiento= $asiento + 1;
          $contabc1->setNumasi($asiento);
          $contabc1->setRefasi($datos->getRefasi());
          $contabc1->setDesasi($datos->getDesasi());
          if ($datos->getDebcre()=='D')
          {  $contabc1->setDebcre('C');}
          else { $contabc1->setDebcre('D');}
          $contabc1->setMonasi($datos->getMonasi());
          $contabc1->save();
        }
      }
    }
    else
    {
      $msj="El Comprobante Nro. ".$numero."no fue Anulado";
    }
  }

  public static function anularRetenciones($numero,&$msJ,&$puede_eliminar)
  {
    $msJ="";
    $c= new Criteria();
    $c->add(OpretordPeer::NUMRET,'NOASIGNA',Criteria::NOT_EQUAL);
    $c->add(OpretordPeer::NUMORD,$numero);
    $result= OpretordPeer::doSelect($c);
    if ($result)
    {
      foreach ($result as $opretord)
      {
        $b= new Criteria();
        $b->add(OpordpagPeer::NUMORD,$opretord->getNumret());
        $result2= OpordpagPeer::doSelectOne($b);
        if ($result2)
        {
          if ($result2->getStatus()!='A')
          {
            $msJ="Una de las Retenciones no se encuentra Anulada";
            $puede_eliminar=false;
            return true;
          }
          else { $puede_eliminar=true;}
        }
      }
    }
    else
    {
     $puede_eliminar=true;
     $h= new Criteria();
     $h->add(OpretordPeer::NUMORD,$numero);
     $result3= OpretordPeer::doSelect($h);
     if ($result3)
     {
       foreach ($result3 as $opretord)
       {
         $opretord->setNumret($opretord->getNumord());
         $opretord->save();
       }
     }
    }
    return true;
  }

  public static function anularCausado($numero,$fecha,$desc)
  {
    $fecha_aux=split("/",$fecha);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

    $r= new Criteria();
    $r->add(CpcausadPeer::REFCAU,$numero);
    $resul= CpcausadPeer::doSelectOne($r);
    if ($resul)
    {
      $resul->setStacau('N');
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $resul->setFecanu($fec);}
      $resul->setDesanu($desc);
      $resul->save();
    }

    $sql="update cpimpcau set staimp='N' where refcau='".$numero."'";

    Herramientas::insertarRegistros($sql);
  }

  public static function anularComprob($numero,$fecha,$desc,$compadicional,$generaotro,&$msj)
  {
    $msj="";
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numero);
    $resul= ContabcPeer::doSelectOne($c);
    if ($resul)
    {
      $numcom= Comprobante::Buscar_Correlativo();
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

      $contabc= new Contabc();
      $contabc->setNumcom($numcom);
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $contabc->setFeccom($fec);}
      else { $contabc->setFeccom(date('Y-m-d'));}
      //$contabc->setDescom($desc);
      $contabc->setDescom($resul->getDescom());
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setReftra($resul->getReftra());
      $contabc->setMoncom($resul->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$numero);
      $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $resul2= Contabc1Peer::doSelect($a);
      if ($resul2)
      {
        foreach ($resul2 as $datos)
        {
          $numcom1= $numcom;
          $contabc1= new Contabc1();
          $contabc1->setNumcom($numcom1);
          if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
          { $contabc1->setFeccom($fec);}
          $contabc1->setCodcta($datos->getCodcta());
          $contabc1->setNumasi($datos->getNumasi());
          $contabc1->setRefasi($datos->getRefasi());
          $contabc1->setDesasi($datos->getDesasi());
          if ($datos->getDebcre()=='D')
          {  $contabc1->setDebcre('C');}
          else { $contabc1->setDebcre('D');}
          $contabc1->setMonasi($datos->getMonasi());
          $contabc1->save();
        }
      }
    }
    else
    {
      $msj="El Comprobante Nro. ".$numero."no fue Anulado";
      return true;
    }

  /*if ($compadicional=='S')
  {
    if ($generaotro==true)
    {
      $generaotro=false;
      $p= new Criteria();
      $p->add(ContabcPeer::NUMCOM,$numero);
      $resul5= ContabcPeer::doSelectOne($p);
      if ($resul5)
     {
      $numcom= 'RE'.substr($resul5->getNumcom(),2,6);
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

      $contabcotro= new Contabc();
      $contabcotro->setNumcom($numcom);
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $contabcotro->setFeccom($fec);}
      else { $contabcotro->setFeccom(date('Y-m-d'));}
      $contabcotro->setDescom($desc);
      $contabcotro->setStacom('D');
      $contabcotro->setTipcom(null);
      $contabcotro->setMoncom($resul5->getMoncom());
      $contabcotro->save();

      if ($compadicional=='S')
      {
        $l= new Criteria();
        $l->add(Contabc1Peer::NUMCOM,$numero);
        $l->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
        $resul6= Contabc1Peer::doSelect($l);
        if ($resul6)
       {
        foreach ($resul6 as $datos1)
        {
          $numcom1= 'RE'.substr($datos1->getNumcom(),2,6);
          $contabc1otro= new Contabc1();
          $contabc1otro->setNumcom($numcom1);
          if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
          { $contabc1otro->setFeccom($fec);}
          $contabc1otro->setCodcta($datos1->getCodcta());
          $contabc1otro->setNumasi($datos1->getNumasi());
          $contabc1otro->setRefasi($datos1->getRefasi());
          $contabc1otro->setDesasi($datos1->getDesasi());
          if ($datos1->getDebcre()=='D')
          {  $contabc1otro->setDebcre('C');}
          else { $contabc1otro->setDebcre('D');}
          $contabc1otro->setMonasi($datos1->getMonasi());
          $contabc1otro->save();
        }
       }
      }
     }
     else
     {
        $msj="El Comprobante Nro. ".$numero."no fue Anulado";
        return true;
     }
    }
  }*/
  return true;
  }

  public static function eliminarOPP($numero)
  {
    $c= new Criteria();
    $c->add(OpdetperPeer::NUMORD,$numero);
    $resultado= OpdetperPeer::doSelectOne($c);
    if ($resultado)
    {
      $resultado->setNumord(null);
      $resultado->setFecpag(null);
      $resultado->save();
    }
  }

  public static function validarGrid($codigo,$longitud,&$error1,&$error2,&$error3)
  {
    $error1="";
    $error2="";
    $error3="";

    $c= new Criteria();
    $c->add(CpdeftitPeer::CODPRE,$codigo);
    $data=CpdeftitPeer::doSelectOne($c);
    if (!$data)
    {
    $error1='N';
    }

    if (strlen($codigo)!=$longitud)
    {
      $error2='N';
    }

    $c= new Criteria();
    $c->add(CpasiiniPeer::PERPRE,'00');
    $c->add(CpasiiniPeer::CODPRE,$codigo);
    $data2=CpasiiniPeer::doSelectOne($c);
    if (!$data2)
    {
    $error3='N';
    }
  }

  public static function montoValido($fila,$monto, $letra, $codigo,$afecta,&$msj,&$mondis,&$sobregiro)
  {
    $anocie=substr(Herramientas::getX('CODEMP','Cpdefniv','feccie','001'),0,4);
    $msj="";
    $montovalido=true;
    $sobregiro=false;
    $monto2=$monto;
    $mondis=0;
    if ($afecta==1)
    {
      if ($letra=='N')
      {
        $c= new Criteria();
        $c->add(CpasiiniPeer::CODPRE,$codigo);
        $c->add(CpasiiniPeer::PERPRE,'00');
        $c->add(CpasiiniPeer::ANOPRE,$anocie);
        $data=CpasiiniPeer::doSelectOne($c);
        if ($data)
        {
          $mondis=SolicituddeEgresos::montoDisponible($codigo);
          if ($monto2 > $mondis)
          {
            $montovalido=false;
            $sobregiro=true;
            $msj='511';
          }
          else
          {
            $montovalido=true;
            $sobregiro=false;
          }
        }
        else
        {
          $montovalido=false;
          $sobregiro=true;
          $msj='512';
        }
      }
    }
    return $montovalido;
  }

  public static function posicion_en_el_grid($arreglo,$codigo,$referencias,$referencia)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($referencias=='')
      { $referencias='_';}
      $refere=split('_',$referencias);
      if ($referencia=="")
      {
        if ($arreglo[$ind]["codpre"]==$codigo)
        { $enc=true; }
      }
      else
      {
        if ($arreglo[$ind]["codpre"]==$codigo  && $refere[$ind+1]==$referencia)
        { $enc=true;}
      }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function posiciondelaretencion($arreglo,$codret,$codpre,$fila,$referencia)
  {
    $enc=false;
    $ind=0;

    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($referencia!="")
      {
        if ($ind<count($arreglo))
        { $i=$ind;}else{ $i=1;}

        if ($arreglo[$ind]["codpre"]==$codpre && $arreglo[$ind]["codtip"]==$codret && $arreglo[$ind]["refere"]==$referencia && $fila!=$ind)
        { $enc=true;}
      }
      else
      {
        if ($arreglo[$ind]["codpre"]==$codpre && $arreglo[$ind]["codtip"]==$codret && $fila!=$ind)
        { $enc=true;}
      }
      $ind++;
    }

    if ($enc)
    {$posiciondelaretencion=$ind;}else{ $posiciondelaretencion=0;}

   return $posiciondelaretencion;
  }

  public static function Retencioniva($codigo)
  {
    $c= new Criteria();
    $reg= CadefartPeer::doSelectOne($c);
    if ($reg)
    { $afectarecargo=$reg->getAsiparrec();
    }else {$afectarecargo='C';}

    if ($afectarecargo=='R' || $afectarecargo=='S')
    {
      Herramientas::obtenerFormatoCategoria(&$formatopar,&$iniciopartida);
      $par=substr($codigo,$iniciopartida,strlen($formatopar));
      $c= new Criteria();
      $c->add(TsretivaPeer::CODPAR,$par);
      $datos= TsretivaPeer::doSelectOne($c);
      if ($datos)
      {
      return 'S';
      }else return 'N';
   }else if ($afectarecargo=='P')
   {
      $c= new Criteria();
      $c->add(TsretivaPeer::CODPAR,$codigo);
      $datos= TsretivaPeer::doSelectOne($c);
      if ($datos)
      {
      return 'S';
      }else return 'N';

   }
  }

  public static function ArregloNomina($tipnom,$banco,$gasto,$fecha, $referencias,&$arreglodet,&$arregloret,&$dato,$impcpt='',$nomespecial='',$codnomesp='')
  {
    $dato="";
    $result=array();
	$impcpt=='X' ? $sqlimpcpt='' : $sqlimpcpt="AND  b.impcpt='S'";
    $sql="SELECT a.codpre as codpre, a.monto as monto, a.asided as asided, a.codcon as codcon FROM NPCIENOM a,NPDEFCPT b WHERE  a.CODNOM = '".$tipnom."' AND a.CodTipGas='".$gasto."' AND a.CODBAN='".$banco."' AND  (a.ASIDED='A' OR a.ASIDED='D') ".($nomespecial=='S' ? "AND a.especial='S' AND a.codnomesp='".$codnomesp."'" : "AND a.especial='N'")." AND a.FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') $sqlimpcpt  AND a.codcon=b.codcon Order By CodCon";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$banco);
      $data=OpbenefiPeer::doSelectOne($c);
      if ($data)
      {
        $dato=$data->getCedrif();
      }
      $arreglodet=array();
      $arregloret=array();
      $i=0;
      while ($i<count($result))
      {
       if ($result[$i]["asided"]=='A' && $result[$i]["monto"]>0)
       {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }

       if ($result[$i]["asided"]=='D' && $result[$i]["monto"]>0)
       {
         $c= new Criteria();
         $c->add(OpretconPeer::CODCON,$result[$i]["codcon"]);
         $c->add(OpretconPeer::CODNOM,$tipnom);
         $resultado=OpretconPeer::doSelectOne($c);
         if ($resultado)
         {
          $pos2=OrdendePago::posiciondelaretencion($arregloret,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($pos2==0)
          {
            $e=count($arregloret)+1;
            $arregloret[$e-1]["codpre"]=$result[$i]["codpre"];
            $arregloret[$e-1]["codtip"]=$resultado->getCodtip();
            $arregloret[$e-1]["monret"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret[$e-1]["refere"]=null;
            $arregloret[$e-1]["id"]="9";

          }
          else
          {
            $valor=H::convnume($arregloret[$pos2-1]["monret"]);
            $arregloret[$pos2-1]["monret"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }
         }
         else
         {
           $pos3=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
           if ($pos3==0)
           {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["check"]='0';
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["moncau"]=number_format(($result[$i]["monto"]*-1),2,',','.');
             $arreglodet[$j-1]["monret"]="0,00";
             $arreglodet[$j-1]["mondes"]="0,00";
             $arreglodet[$j-1]["id"]="9";
           }
           else
           {
            $valor=H::convnume($arreglodet[$pos3-1]["moncau"]);
             $arreglodet[$pos3-1]["moncau"]=number_format(($valor-$result[$i]["monto"]),2,',','.');
           }
         }
       }
        $i++;
      }
      $p=0;
      while ($p<count($arreglodet))
      {
        $arreglodet[$p]["monret"]="0,00";
        $p++;
      }

      $inc=0;
      $y=0;
      while ($y<count($arregloret))
      {
        if ($referencias=='')
        { $referencias='_';}
        $refere=split('_',$referencias);
        if ($refere[1]!="")
        {
          if ($y<count($arregloret))
          {
            $I=$y;
          }
          else
          {
            $I=$inc;
            $inc=$inc+1;
            if ($inc>=count($arregloret))
            {
              $inc=0;
            }
          }
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,$arregloret[$y]["refere"]);
        }
        else
        {
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,"");
        }

        if ($fil!=0)
        {
         $valor=H::convnume($arreglodet[$fil-1]["monret"]);
         $valor1=H::convnume($arregloret[$y]["monret"]);
         $arreglodet[$fil-1]["monret"]=number_format(($valor+$valor1),2,',','.');
        }
        $y++;
      }
       return true;
    }
  }

  public static function ArregloAporte($codcon,$fecha,$gasto,$referencias,&$arreglodet)
  {
    $result=array();
    $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODCON = '".$codcon."' AND CodTipGas='".$gasto."'  AND ASIDED='P' AND FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') Order By CodCon";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $arreglodet=array();
      $i=0;
      while ($i<count($result))
      {
       if ($result[$i]["asided"]=='P' && $result[$i]["monto"]>0)
       {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }
       $i++;
      }
    }
    return true;
  }

  public static function ArregloLiquidacion($codemp,$nomemp,$cedemp,$referencias,&$arreglodet,&$arregloret,&$dato)
  {
    $dato="";
    $result=array();
    $sql="SELECT asided as asided,codpre as codpre, (CASE when codcon='' THEN 'AUT'
          else codcon END) as codcon, SUM(MONTO) as monto FROM NPLIQUIDACION_DET WHERE CODEMP = '".$codemp."' GROUP BY asided,codpre,codcon";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$cedemp);
      $data=OpbenefiPeer::doSelectOne($c);
      if ($data)
      {
        $dato=$data->getCedrif();
      }
      $arreglodet=array();
      $arregloret=array();
      $i=0;
      while ($i<count($result))
      {
       if ($result[$i]["asided"]=='A' && $result[$i]["monto"]>0)
       {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }

       if ($result[$i]["asided"]=='D' && $result[$i]["monto"]>0)
       {
         $c= new Criteria();
         $c->add(OpretconPeer::CODCON,$result[$i]["codcon"]);
         $resultado=OpretconPeer::doSelectOne($c);
         if ($resultado)
         {
          $pos2=OrdendePago::posiciondelaretencion($arregloret,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($pos2==0)
          {
            $e=count($arregloret)+1;
            $arregloret[$e-1]["codpre"]=$result[$i]["codpre"];
            $arregloret[$e-1]["codtip"]=$resultado->getCodtip();
            $arregloret[$e-1]["monret"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret[$e-1]["refere"]=null;
            $arregloret[$e-1]["id"]="8";

          }
          else
          {
            $valor=H::convnume($arregloret[$pos2-1]["monret"]);
            $arregloret[$pos2-1]["monret"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }
         }
         else
         {
           $pos3=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
           if ($pos3==0)
           {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["check"]='0';
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["moncau"]=number_format(($result[$i]["monto"]*-1),2,',','.');
             $arreglodet[$j-1]["monret"]="0,00";
             $arreglodet[$j-1]["mondes"]="0,00";
             $arreglodet[$j-1]["id"]="9";
           }
           else
           {
              $valor=H::convnume($arreglodet[$pos3-1]["moncau"]);
             $arreglodet[$pos3-1]["moncau"]=number_format(($valor-$result[$i]["monto"]),2,',','.');
           }
         }
       }
        $i++;
      }
    }
    $p=0;
      while ($p<count($arreglodet))
      {
        $arreglodet[$p]["monret"]="0,00";
        $p++;
      }

      $inc=0;
      $y=0;
      while ($y<count($arregloret))
      {
        if ($referencias=='')
        { $referencias='_';}
        $refere=split('_',$referencias);
        if ($refere[1]!="")
        {
          if ($y<count($arregloret))
          {
            $I=$y;
          }
          else
          {
            $I=$inc;
            $inc=$inc+1;
            if ($inc>=count($arregloret))
            {
              $inc=0;
            }
          }
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,$arregloret[$y]["refere"]);
        }
        else
        {
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,"");
        }

        if ($fil!=0)
        {
         $valor=H::convnume($arreglodet[$fil-1]["monret"]);
         $valor1=H::convnume($arregloret[$y]["monret"]);
         $arreglodet[$fil-1]["monret"]=number_format(($valor+$valor1),2,',','.');
        }
        $y++;
      }


    return true;
  }

  public static function ArregloFideicomiso($codnom,$nomnom,$fecha,$referencias,&$arreglodet)
  {
    $result=array();
    $sql="SELECT codpre as codpre,SUM(MONFID) as monto FROM NPOrdFid WHERE CODNom = '".$codnom."' and Fecha=TO_DATE('".$fecha."','YYYY-MM-DD') GROUP BY codpre";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $arreglodet=array();
      $i=0;
      while ($i<count($result))
      {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       $i++;
      }
    }
    return true;
  }

  public static function validarDisponibilidadPresu($grid,$afecta,&$codigo)
  {
    $validardisponibilidad=true;
    $x=$grid[0];
    $i=0;
    while ($i<count($x))
    {
     $codigo=$x[$i]->getCodpre();
     if (!OrdendePago::montoValido($i,$x[$i]->getMoncau(),'N',$codigo,$afecta,&$msj,&$mondis,&$sobregiro))
     {
      $validardisponibilidad=false;
      break;
     }
     $i++;
    }
    return $validardisponibilidad;
  }

  public static function salvarPagmodret($orden,$grid,$totalret)
  {
    self::grabarGrid($orden,$grid);
    self::actualizarOrden($orden,$grid,$totalret);
    self::actualizarImpcau($orden,$grid);
    self::actualizarComprobante($orden,$grid);
  }

  public static function grabarGrid($orden,$grid)
  {
    $referencia=$orden->getNumord();
    $c = new Criteria();
    $c->add(OpretordPeer::NUMORD,$referencia);
    $c->add(OpretordPeer::NUMRET,'NOASIGNA');
    OpretordPeer::doDelete($c);

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpre()!="")
     {
       $tabla= new Opretord();
       $tabla->setNumord($referencia);
       $tabla->setNumret('NOASIGNA');
       $tabla->setCodpre($x[$j]->getCodpre());
       $tabla->setCodtip($x[$j]->getCodtip());
       $tabla->setMonret($x[$j]->getMonret());
       $tabla->setRefere($x[$j]->getRefere());
       $tabla->setCorrel(str_pad($j+1,3,'0',STR_PAD_LEFT));
       $tabla->save();
     }
      $j++;
    }
  }

  public static function actualizarOrden($orden,$grid,$totalret)
  {
    $referencia=$orden->getNumord();
    $c= new Criteria();
    $c->add(OpdetordPeer::NUMORD,$referencia);
    $resul= OpdetordPeer::doSelect($c);
    if ($resul)
    {
      foreach ($resul as $opdetord)
      {
        $opdetord->setMonret(0);
        $opdetord->save();
      }
    }

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpre()!="" && $x[$j]->getMonret()>0)
     {
      if ($x[$j]->getRefere()=="")
      {
        $dato='NULO';
      }else {$dato=$x[$j]->getRefere();}
       $c= new Criteria();
       $c->add(OpdetordPeer::NUMORD,$referencia);
       $c->add(OpdetordPeer::CODPRE,$x[$j]->getCodpre());
       $c->add(OpdetordPeer::REFCOM,$dato);
       $result= OpdetordPeer::doSelectOne($c);
       if ($result)
       {
         $result->setMonret($result->getMonret()+$x[$j]->getMonret());
        $result->save();
       }
     }
      $j++;
    }

    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$referencia);
    $result2= OpordpagPeer::doSelectOne($c);
    if ($result2)
    {
      $result2->setMonret($totalret);
      $result2->save();
    }
  }

  public static function actualizarImpcau($orden,$grid)
  {
    $referencia=$orden->getNumord();
    $c = new Criteria();
    $c->add(CpimpcauPeer::REFCAU,$referencia);
    CpimpcauPeer::doDelete($c);

    $totalcausado=0;

    $sql="select numord as numord, refcom as refcom , codpre as codpre, sum(moncau) as moncau, sum(monret) as monret
    from opdetord where numord='".$referencia."' group by numord,refcom,codpre";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
      foreach ($result as $opdet)
      {
        $tabla2= new Cpimpcau();
        $tabla2->setRefcau($opdet['numord']);
        $tabla2->setCodpre($opdet['codpre']);
        $total=$opdet['moncau']-$opdet['monret'];
        $tabla2->setMonimp($total);
        $tabla2->setMonpag(0);
        $tabla2->setMonaju(0);
        $tabla2->setStaimp('A');
        $tabla2->setRefere($opdet['refcom']);
        $tabla2->setRefprc('NULO');
        $totalcausado= $totalcausado+$total;
        $tabla2->save();
      }
    }

    $c = new Criteria();
    $c->add(CpcausadPeer::REFCAU,$referencia);
    $resul3= CpcausadPeer::doSelectOne($c);
    if ($resul3)
    {
      $resul3->setMoncau($totalcausado);
      $resul3->save();
    }
  }

  public static function actualizarComprobante($orden,$grid)
  {
    $referencia=$orden->getNumord();
    $montocomprobante=0;
    $sql="select b.codcta as codcta, sum(a.moncau-a.monret) as monret from opdetord a, cpdeftit b where a.numord='".$referencia."' and a.codpre=b.codpre group by codcta";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      foreach ($result as $datos)
      {
        $c=new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$orden->getNumcom());
        $c->add(Contabc1Peer::FECCOM,$orden->getFecemi());
        $c->add(Contabc1Peer::CODCTA,$datos['codpre']);
        $c->add(Contabc1Peer::DEBCRE,'D');
        $data= Contabc1Peer::doSelectOne($c);
        if ($data)
        {
          $data->setMonasi($datos['monret']);
          $montocomprobante= $montocomprobante + $datos['monret'];
          $data->save();
        }
      }
    }

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$orden->getNumcom());
    $c->add(ContabcPeer::FECCOM,$orden->getFecemi());
    $data2= ContabcPeer::doSelectOne($c);
    if ($data2)
    {
       $data2->setMoncom($montocomprobante);
       $data2->save();
    }
  }

  public static function ArregloValuacion($refcom,$montoval,$referencias,&$arreglodet)
  {
    $result=array();
    $sql="SELECT A.codpre as codpre FROM cpimpcom A WHERE A.refcom='".$refcom."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $arreglodet=array();
      $i=0;
      while ($i<count($result))
      {
       $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["moncau"]=number_format($montoval,2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$montoval),2,',','.');
        }
       $i++;
      }
    }
    return true;
  }

  public static function grabarComprobanteAlc($numord,&$msjuno,&$arrcompro,$bene)
  {
    $numeroorden="";

    $numeroorden3="OP".substr($numord,2,6);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numeroorden3;
    }else $numerocomprob= '########';

    $t= new Criteria();
    $t->add(OpordpagPeer::NUMORD,$numord);
    $data= OpordpagPeer::doSelectOne($t);
    if ($data)
    {
      $ctapago=$data->getCtapag();
      $monorden=$data->getMonord();
      $desord= $data->getDesord();
      $fecha=$data->getFecemi();
    }

    $reftra = $numeroorden3;
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";

    $cuenta=$ctapago;
    $monord=$monorden;
    if ($monord>0)
    {
      $codigocuenta=$cuenta;
      $tipo='D';
      $des="";
      $mon=$monorden;
      $monto=$mon;
    }

    $c= new Criteria();
    $c->add(TsrelasiordPeer::CTAGASXPAG,$ctapago);
    $reg= TsrelasiordPeer::doSelectOne($c);
    if ($reg)
    {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$reg->getCtaordxpag());
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta2=$dato->getCodcta();
        $tipo2='C';
        $des2="";
        $mont=$monorden;
        $monto2=$mont;
      }else { $msjuno='El Código Contable asociado a Cuenta de Gastos por Pagar no es válido';  return true;}
    }else { $msjuno='El Código Contable asociado al Beneficiario en la Orden de Pago no posee Relacion para Asientos de Ordenes'; return true;}

    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($fecha)));
    $clscommpro->setDestra($desord." - ".$bene);
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;

    return true;
  }

  public static function aprobarOrdenes($opordpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getAprobadoord()=="1")
      {
        $x[$j]->setAprobadoord('A');
        $x[$j]->save();
      }
      else
      {
      	$x[$j]->setAprobadoord(null);
      	$x[$j]->save();
      }
      if ($x[$j]->getCheck()=="1")
      {
        $x[$j]->setAprobadoord('R');
        $x[$j]->save();
      }
      $j++;
    }
  }

  public static function aprobarOrdenesTes($opordpag,$grid,$numcomprob,$numorden,$comprobaut)
  {
    $x=$grid[0];
    $j=0;
    $l=0;
    $numcom=split('/',$numcomprob);
    $numord=split('/',$numorden);
    while ($j<count($x))
    {
      if ($x[$j]->getAprobadotes()=="1")
      {
        $x[$j]->setAprobadotes('A');
         $e= new Criteria();
         $reg= OpdefempPeer::doSelectOne($e);
         if ($reg){
          if ($reg->getGencomalc()=="S"){
          if ($comprobaut=='S')
		    {
		      self::grabarComprobanteAlcAutomatico($x[$j]->getNumord(),&$numcom,&$reftra);
		      $orden1="OP".substr($x[$j]->getNumord(),2,6);
		        if ($orden1==$reftra)
		        {
			      $x[$j]->setNumcomapr($numcom);
		        }
		    }else{
           $orden1="OP".substr($x[$j]->getNumord(),2,6);
	        if ($orden1==$numord[$l+1])
	        {
	          $x[$j]->setNumcomapr($numcom[$l+1]);
	          $l++;
	        }
	        }
          }
         }
         $x[$j]->save();
      }
      else
      {
      	$x[$j]->setAprobadotes(null);
      	$x[$j]->save();
      }
      if ($x[$j]->getCheck()=="1")
      {
        $x[$j]->setAprobadotes('R');
        $x[$j]->save();
      }

      $j++;
    }
  }

public static function actualizarOrdenPag($orden,$grid3)
  {
    $referencia=$orden->getNumord();
    $totalret=0;
    $c= new Criteria();
    $c->add(OpdetordPeer::NUMORD,$referencia);
    $resul= OpdetordPeer::doSelect($c);
    if ($resul)
    {
      foreach ($resul as $opdetord)
      {
        $opdetord->setMonret(0);
        $opdetord->save();
      }
    }

    $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]['codpre']!="" && H::tofloat($x[$j]['monret'])>0)
     {
       if ($x[$j]['refere']=="")
       {
         $dato='NULO';
       }else {$dato=$x[$j]['refere'];}

       $totalret= $totalret + H::tofloat($x[$j]['monret']);

       $c= new Criteria();
       $c->add(OpdetordPeer::NUMORD,$referencia);
       $c->add(OpdetordPeer::CODPRE,$x[$j]['codpre']);
       $c->add(OpdetordPeer::REFCOM,$dato);
       $result= OpdetordPeer::doSelectOne($c);
       if ($result)
       {
         $result->setMonret($result->getMonret()+ H::tofloat($x[$j]['monret']));
         $result->save();
       }
     }
      $j++;
    }

    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$referencia);
    $result2= OpordpagPeer::doSelectOne($c);
    if ($result2)
    {
      $result2->setMonret($totalret);
      $result2->save();
    }
  }

  public static function grabarComprobanteAutomatico($orden,$grid,&$correl3)
  {
    self::formload(&$afectarecargo,&$ordpagnom,&$ordpagapo,&$ordpagliq,&$ordpagfid,&$ordpagval,&$compadic,&$genctaord);
    $reftra="OP".substr($orden->getNumord(),2,6);
    $cuentaporpagarrendicion=""; $codigocuenta="";  $tipo="";  $des="";  $monto=""; $codigocuentas="";  $tipo1="";  $desc="";
    $monto1="";  $codigocuenta2="";  $tipo2=""; $des2=""; $monto2="";  $cuentas="";   $tipos="";   $montos="";    $descr="";

    $c = new Criteria();
    $resul= TsdefrengasPeer::doSelectOne($c);
    if ($resul)
    {
      if (($orden->getTipcau()==$resul->getPagrepcaj()) && ($resul->getCtarepcaj()!=''))
      {
        $sql="Select A.CodCtaCajChi as codctacajchi,B.DesCta as descta from OPBenefi A,Contabb B where A.CedRif='".$orden->getCedrif()."' and A.CodCtaCajChi=B.CodCta";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          if ($result[0]["codctacajchi"]!='')
          {
            $cuenta=$result[0]["codctacajchi"];
          }else { $cuenta='';}
          $monord=$orden->getMonord();
          if ($monord>0)
          {
            $codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getMonord();
            $monto=$mon;
          }else{
          	$codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getNeto();
            $monto=$mon;
          }
        }

        $codigocuentapagar=$resul->getCtarepcaj();
        $cuentaporpagarrendicion=$codigocuentapagar;
        $sql2="SELECT CodCta,DesCta FROM CONTABB WHERE CODCTA = '".$codigocuentapagar."'";
        if (Herramientas::BuscarDatos($sql2,&$result2))
        {
          $codigocuenta2=$codigocuentapagar;
          $tipo2='C';
          $des2="";
          $mont=$orden->getMonord();
          $monto2=$mont;
        }

        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
      }
      else
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $c= new Criteria();
          $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
          $regis = CpdeftitPeer::doSelectOne($c);
          if ($regis)
          {
            if($regis->getCodcta()!='')
            {
              $cuenta=$regis->getCodcta();
            }else {$cuenta='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
              $moncau=$x[$j]->getMoncau();
              if ($moncau>0)
              {
                if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
                {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mont1=$x[$j]->getMoncau();
                  $mont2=$x[$j]->getMonret();
                  $monto=$mont1 - $mont2;
                }else {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mon=$x[$j]->getMoncau();
                  $monto=$mon;
                }
              }
            }
          }
          if ($moncau>0)
          {
          if ($j==0)
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
          }
          $j++;
        }
        if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
        {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
          $a=$orden->getMonord();
          $monto2=$a;
        }else {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
           if ($orden->getAfectapre()==1) $a=$orden->getMonord();
           else $a=$orden->getNeto();
          $monto2=$a;
        }
        $cuentas=$codigocuenta2.'_'.$codigocuentas;
        $descr=$des2.'_'.$desc;
        $tipos=$tipo2.'_'.$tipo1;
        $montos=$monto2.'_'.$monto1;
      }
    }else
    {
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if($regis->getCodcta()!='')
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=H::tofloat($x[$j]->getMoncau());
            if ($moncau>0)
            {
              if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
              {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();
                $monto=$moncau;
              }else {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();
                $monto=$moncau;
              }
            }
          }
        }
        if ($moncau>0)
        {
         if ($j==0)
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
        }

        $j++;
      }

      if(($orden->getTipcau()==$ordpagnom) or ($orden->getTipcau()==$ordpagapo) or ($orden->getTipcau()==$ordpagliq))
      {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
        $b=$orden->getMonord();
        $monto2=$b;
      }else {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
        $b=$orden->getMonord();
        $monto2=$b;
      }
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;
    }

    $arrecuentas=split("_",$cuentas);
    $arretipos=split("_",$tipos);
    $arremontos=split("_",$montos);
    $yapaso=array();
    $dondesta=array();
     $t=1;
     foreach ($arrecuentas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($arrecuentas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;
         $sumdeb=0;
         $sumcre=0;

         foreach ($posiciones as $pos)
         {
           if ($arretipos[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($arremontos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($arremontos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='D';
           $new_montos[]=$acumd;

	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='C';
           $new_montos[]=$acumc;

	      }

	  } // if dondesta

    } // foreach 1

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          if ($new_movs[$i]=='D')
          {
          	$sumdeb= $sumdeb +$new_montos[$i];
          }
          else
          {
          	$sumcre= $sumcre + $new_montos[$i];
          }
	  	}
	  	$i++;
	  }


        $correl3=OrdendePago::Buscar_Correlativo();
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl3);
	    $contabc->setReftra($reftra);
	    $contabc->setFeccom($orden->getFecemi());
	    $contabc->setDescom($orden->getDesord()." - ".$orden->getNomben());
	    if ($sumdeb==$sumcre)
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom(null);
	    $contabc->setMoncom($sumdeb);
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl3);
          $contabc1->setFeccom($orden->getFecemi());
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($reftra);
          $contabc1->setDesasi($new_descs[$i]);
          if ($new_movs[$i]=='D')
          {
          	$contabc1->setDebcre('D');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          else
          {
          	$contabc1->setDebcre('C');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          $contabc1->save();
	  	}
	  	$i++;
	  }


  return true;
  }

  public static function grabarComprobanteOrdenAutomatico($orden)
  { $command="";
    self::obtenerTags($command,&$tag1,&$tag2);
    $c = new Criteria();
    $c->add(CaproveePeer::RIFPRO,$orden->getCedrif());
    $reg = CaproveePeer::doSelectOne($c);
    if ($reg)
    { $tipoben=$reg->getTipo();}

    $reftra="PR".substr($orden->getNumord(),2,6);

    $b = new Criteria();
    $b->add(OpbenefiPeer::CEDRIF,$orden->getCedrif());
    $reg2 = OpbenefiPeer::doSelectOne($b);
    if ($reg2)
    {
        if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta=$reg2->getCodord();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta=$reg2->getCodordadi();
            }
          }else { $cuenta=$reg2->getCodord();}
        }else { $cuenta=$reg2->getCodord();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta);
        $reg3 = ContabbPeer::doSelectOne($c);
        if ($reg3)
        {
         $codigocuenta=$reg3->getCodcta();
         $tipo='C';
         $des="";
         $mon2=$orden->getMonord();
         $monto=$mon2;
        }

       if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta2=$reg2->getCodpercon();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta2=$reg2->getCodperconadi();
            }
          }else { $cuenta2=$reg2->getCodpercon();}
        }else { $cuenta2=$reg2->getCodpercon();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta2);
        $reg4 = ContabbPeer::doSelectOne($c);
        if ($reg4)
        {
         $codigocuenta2=$reg4->getCodcta();
         $tipo2='D';
         $des2="";
         $mon=$orden->getMonord();
         $monto2=$mon;
        }
    }

    $cuentas=$codigocuenta.'_'.$codigocuenta2;
    $tipos=$tipo.'_'.$tipo2;
    $descr=$des.'_'.$des2;
    $montos=$monto.'_'.$monto2;

    $arrecuentas=split("_",$cuentas);
    $arretipos=split("_",$tipos);
    $arremontos=split("_",$montos);
    $yapaso=array();
    $dondesta=array();

     foreach ($arrecuentas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($arrecuentas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;

         foreach ($posiciones as $pos)
         {
           if ($arretipos[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($arremontos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($arremontos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='D';
           $new_montos[]=$acumd;
	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='C';
           $new_montos[]=$acumc;
	      }

	  } // if dondesta
    } // foreach 1

    $sumdeb=0;
    $sumcre=0;

    $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          if ($new_movs[$i]=='D')
          {
          	$sumdeb= $sumdeb +$new_montos[$i];
          }
          else
          {
          	$sumcre= $sumcre + $new_montos[$i];
          }
	  	}
	  	$i++;
	  }

        $correl2=OrdendePago::Buscar_Correlativo();
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl2);
	    $contabc->setReftra($reftra);
	    $contabc->setFeccom($orden->getFecemi());
	    $contabc->setDescom($orden->getDesord());
	    if ($sumdeb==$sumcre)
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom(null);
	    $contabc->setMoncom($sumdeb);
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl2);
          $contabc1->setFeccom($orden->getFecemi());
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($reftra);
          $contabc1->setDesasi($new_descs[$i]);
          if ($new_movs[$i]=='D')
          {
          	$contabc1->setDebcre('D');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          else
          {
          	$contabc1->setDebcre('C');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          $contabc1->save();
	  	}
	  	$i++;
	  }

   return true;
  }

  public static function grabarComprobanteAlcAutomatico($numord,&$correl2,&$reftra)
  {
    $numeroorden3="OP".substr($numord,2,6);
    $t= new Criteria();
    $t->add(OpordpagPeer::NUMORD,$numord);
    $data= OpordpagPeer::doSelectOne($t);
    if ($data)
    {
      $ctapago=$data->getCtapag();
      $monorden=$data->getMonord();
      $desord= $data->getDesord();
      $fecha=$data->getFecemi();
      $bene=$data->getNomben();
    }

    $reftra = $numeroorden3;
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";

    $cuenta=$ctapago;
    $monord=$monorden;
    if ($monord>0)
    {
      $codigocuenta=$cuenta;
      $tipo='D';
      $des="";
      $mon=$monorden;
      $monto=$mon;
    }

    $c= new Criteria();
    $c->add(TsrelasiordPeer::CTAGASXPAG,$ctapago);
    $reg= TsrelasiordPeer::doSelectOne($c);
    if ($reg)
    {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$reg->getCtaordxpag());
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta2=$dato->getCodcta();
        $tipo2='C';
        $des2="";
        $mont=$monorden;
        $monto2=$mont;
      }
    }

    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $arrecuentas=split("_",$cuentas);
    $arretipos=split("_",$tipos);
    $arremontos=split("_",$montos);
    $yapaso=array();
    $dondesta=array();

     foreach ($arrecuentas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($arrecuentas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;

         foreach ($posiciones as $pos)
         {
           if ($arretipos[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($arremontos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($arremontos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='D';
           $new_montos[]=$acumd;
	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='C';
           $new_montos[]=$acumc;
	      }

	  } // if dondesta
    } // foreach 1

    $sumdeb=0;
    $sumcre=0;

    $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          if ($new_movs[$i]=='D')
          {
          	$sumdeb= $sumdeb +$new_montos[$i];
          }
          else
          {
          	$sumcre= $sumcre + $new_montos[$i];
          }
	  	}
	  	$i++;
	  }

        $correl2=OrdendePago::Buscar_Correlativo();
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl2);
	    $contabc->setReftra($reftra);
	    $contabc->setFeccom($fecha);
	    $contabc->setDescom($desord." - ".$bene);
	    if ($sumdeb==$sumcre)
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom(null);
	    $contabc->setMoncom($sumdeb);
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl2);
          $contabc1->setFeccom($fecha);
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($reftra);
          $contabc1->setDesasi($new_descs[$i]);
          if ($new_movs[$i]=='D')
          {
          	$contabc1->setDebcre('D');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          else
          {
          	$contabc1->setDebcre('C');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          $contabc1->save();
	  	}
	  	$i++;
	  }
    return true;
  }

  public static function aprobarOrdenesDirectas($opordpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getAprorddir()=="1")
      {
        $x[$j]->setAprorddir('A');
        $x[$j]->save();
      }
      else
      {
      	$x[$j]->setAprorddir(null);
      	$x[$j]->save();
      }
      if ($x[$j]->getCheck()=="1")
      {
        $x[$j]->setAprorddir('R');
        $x[$j]->save();
      }
      $j++;
    }
  }

}
?>