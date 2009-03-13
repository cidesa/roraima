<?php
class Ingresos
{
	//Guarda los detalles del traslado
  public static function salvarDetalletraslado($citrasla, $grid){

	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		if ($x[$j]->getCodori()<>'' and $x[$j]->getMonmov()<>0){
        $x[$j]->setReftra($citrasla->getReftra());
        $x[$j]->setStamov('A');
        $x[$j]->save();

		}
		 $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

  }

	//Guarda el detalle del nivel presupuestario
  public static function salvarNiveles($cidefniv, $grid){

	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {

        $x[$j]->setConsec($j+1);
        $x[$j]->setStaniv('A');
        $x[$j]->save();

		 $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

  }

  public static function ListaCatpar()
  {

    $tipo = array('C' => 'Categoría', 'P' => 'Partida');

    return $tipo;

  }

  public static function ListaPeriodos()
  {
     $c = new Criteria();
     $lista= CiperejePeer::doSelect($c);
     $per = array();
     foreach($lista as $obj)
       {
     $per += array($obj->getPereje() => $obj->getPereje());
     }
     return $per;
  }
	//Guarda los detalles de las Adiciones/Disminuciones
    public static function salvarMovadi($ciadidis, $grid)
    {

	  $x=$grid[0];
      $j=0;
      $fecha=$ciadidis->getFecadi();
      $sql="select pereje from cipereje where '".$fecha."'>=fecdes and '".$fecha."'<=fechas";
	  H::BuscarDatos($sql,&$dato);
      while ($j<count($x))
      {

		$x[$j]->setRefadi($ciadidis->getRefadi());
		$x[$j]->setPerpre($dato[0]["pereje"]);
        $x[$j]->save();

		 $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

  }
	//Guarda los movimientos del ajuste
    public static function salvarMovaju($ciajuste, $grid){

    	//H::printR($grid);exit;

	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setRefaju($ciajuste->getRefaju());
        $x[$j]->setStamov('A');
        $x[$j]->save();

		 $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

  }
	//Guarda los detalles del ingreso
  public static function salvarImping($cireging, $grid){

	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		$x[$j]->setRefing($cireging->getRefing());
		$x[$j]->setFecing($cireging->getFecing());
        $x[$j]->setStaimp('A');
        $x[$j]->save();

		 $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

  }

  //Guarda los periodos del nivel presupuestario
  public static function salvarPereje($cidefniv, $grid){

	  $x=$grid[0];
      $j=0;

      $c= new Criteria();

      $per=CiperejePeer::doSelect($c);
      foreach ($per as $per2){
      	$per2->delete();
      }


      while ($j<count($x))
      {
      	$cipereje= new Cipereje();

      	$cipereje->setPereje($x[$j]["pereje"]);
		$cipereje->setFecdes($x[$j]["fecdes"]);
		$cipereje->setFechas($x[$j]["fechas"]);
		$cipereje->setFecini($cidefniv->getFecini());
		$cipereje->setFeccie($cidefniv->getFeccie());
		if ($x[$j]["pereje"]!=''){
			$cipereje->save();
		}

		$j++;
      }


  }
	//Guarda los detalles de la Estimacion Inicial
  public static function salvarEstimacion($ciasiini, $grid){

	  $x=$grid[0];
      $j=0;

      $cod=$ciasiini->getCodpre();
      $nom=$ciasiini->getNompre();
      $ano=$ciasiini->getAnopre();
      $monto=$ciasiini->getMonasi();


      $c= new Criteria();
	  $c->add(CiasiiniPeer::CODPRE,$ciasiini->getCodpre());
      $per=CiasiiniPeer::doSelect($c);

      foreach ($per as $per2){
      	$per2->delete();
      }

      $ciasiini= new Ciasiini();
      $ciasiini->setPerpre('00');
      $ciasiini->setCodpre($cod);
  	  $ciasiini->setNompre($nom);
  	  $ciasiini->setAnopre($ano);
  	  $ciasiini->setStatus('A');
  	  $ciasiini->setMonasi($monto);
  	  $ciasiini->setMondis($monto);
      $ciasiini->save();

      while ($j<count($x))
      {
      	$ciasiini= new Ciasiini();

		$ciasiini->setCodpre($cod);
		$ciasiini->setNompre($nom);
		$ciasiini->setPerpre($x[$j]["perpre"]);
		$ciasiini->setAnopre($ano);
		$ciasiini->setMonasi($x[$j]["monasi"]);
		$ciasiini->setMondis($x[$j]["monasi"]);
		$ciasiini->setStatus('A');

		if ($x[$j]["perpre"]!=''){
			$ciasiini->save();
		}

		$j++;
      }

  }

  public static function generarperiodos($fecha,$incmes,$fecfinal,$numper,$contador){

	$datos=array();
	$datos='';


  	if($fecha<$fecfinal && $contador<=$numper){


  		if ($contador<10){
  			$per="0".(string)$contador;

  		}else{
  			$per=(string)$contador;
  		}
  		$fecha1=$fecha;
  		$fecini=substr($fecha,6,4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);
  		$fecfin=H::dateAdd('d',-1,(H::dateAdd('m',(int)$incmes,$fecini,'+')),'+');

  	}

  	$datos[0]=$per;
  	$datos[1]=$fecha1;
  	$datos[2]=substr($fecfin,8,2)."/".substr($fecfin,5,2)."/".substr($fecfin,0,4);


  return $datos;
  }

  public static function movimientos(){

  	$c = new Criteria();
    $ingresos = CiregingPeer::doSelect($c);

    $c = new Criteria();
    $adiciones = CiadidisPeer::doSelect($c);

    $c = new Criteria();
    $ajuste = CiajustePeer::doSelect($c);

  	$c = new Criteria();
    $asignacion = CiasiiniPeer::doSelect($c);

    $c = new Criteria();
    $traslados = CitraslaPeer::doSelect($c);

	if ($ingresos or $adiciones or $ajuste or $asignacion or $traslados){

		return 1;
	}else{

		return 0 ;
	}

  }

  public static function generar_movimientos_segun_libros($cireging){

  $grabocontabilidad=true;
  $tsmovlib= new Tsmovlib();

  $tsmovlib->setNumcue($cireging->getCtaban());
  $tsmovlib->setReflib($cireging->getNumdep());
  $tsmovlib->setCedrif($cireging->getRifcon());
  $tsmovlib->setFeclib($cireging->getFecing());
  $tsmovlib->setFecing($cireging->getFecing());
  $tsmovlib->setTipmov($cireging->getTipmov());
  $tsmovlib->setMonmov($cireging->getMontot());
  $tsmovlib->setCodcta($cireging->getCtaban());
  $tsmovlib->setStatus('C');
  $tsmovlib->setStacon('S');
  $tsmovlib->setDeslib($cireging->getDesing());
  //print "guardo la 1ra parte"; exit;
  if ($grabocontabilidad){
  	$tsmovlib->setStatus('C');
  	$tsmovlib->setFeccom($cireging->getFecing());
  	$tsmovlib->setNumcom($cireging->getRefing());
  }else{
	$tsmovlib->setStatus('N');
  	$tsmovlib->setNumcom('');
  	$tsmovlib->setCodcta('');
  	$tsmovlib->setFeccom('NULO');
  }
  $tsmovlib->save();
  }//Fin generar_movimientos_segun_libros()


  public static function generar_msl_anulado($cireging){

 //H::printR($cireging);exit;

  $c= new Criteria();
  $c->add(TsmovlibPeer::NUMCUE,$cireging->getCtaban());
  //$c->add(TsmovlibPeer::REFLIB,$cireging->getRefing());
  $c->add(TsmovlibPeer::TIPMOV,$cireging->getTipmov());
  $datos=TsmovlibPeer::doSelectOne($c);

  //H::printR($datos);exit;

  if ($datos->getStacon()!='C'){

  $tsmovlibnew= new Tsmovlib();

  $tsmovlibnew->setNumcue($datos->getNumcue());
  $tsmovlibnew->setReflib('A'.$cireging->getRefing);
  $tsmovlibnew->setCedrif($cireging->getCedrif);
  $tsmovlibnew->setFeclib($cireging->getFecing);
  $tsmovlibnew->setTipmov("ANUD");
  $tsmovlibnew->setMonmov($datos->getMonmov());
  $tsmovlibnew->setNumcom();
  $tsmovlibnew->setCodcta($datos->getCodcta());
  $tsmovlibnew->setFeccom($cireging->getFecing());
  $tsmovlibnew->setStatus('C');
  $tsmovlibnew->setStacon('C');
  $tsmovlibnew->setDeslib('Ingreso Conciliado');
  $tsmovlibnew->setReflibpad($cireging->getRefing());
  $tsmovlibnew->setTipmovpad($cireging->getTipmov);

  $tsmovlibnew->save();
  self::actualizabancos('A','C');

  }else{
  	 return 'El movimiento según libros está conciliado';

  }


  }//Fin generar_msl_anulado()

  public static function actualiza_bancos($cireging,$accion,$debcre){

  $c= new Criteria();
  $c->add(TsdefbanPeer::NUMCUE,$cireging->getCtaban());
  $datos=TsdefbanPeer::doSelectOne($c);

  if ($debcre=='D'){

  	if ($accion='A'){
  	   $debito=$datos->getDeblib();
  	   $total=$debito+$cireging->getMontot();
  	   $datos->setDeblib($total);
  	   $datos->save();

  	}elseif($accion='E'){
  	   $debito=$datos->getDeblib();
  	   $total=$debito-$cireging->getMontot();
  	   $datos->setDeblib($total);
  	   $datos->save();

  	}

  }elseif($debcre=='C'){

	if ($accion='A'){
  	   $credito=$datos->getCrelib();
  	   $total=$credito+$cireging->getMontot();
  	   $datos->setCrelib($total);
  	   $datos->save();

  	}elseif($accion='E'){
  	   $credito=$datos->getCrelib();
  	   $total=$credito-$cireging->getMontot();
  	   $datos->setCrelib($total);
  	   $datos->save();

  	}

  }

 }//Fin actualiza_bancos()


///Comprobante*******************REVISAR**************
public static function incluir_asiento($cuenta,$descripcion,$referencia,$debcre,$monasi,$asiento){

	//asiento es el arreglo que contiene todos los datos del grid

	$ind=0;
	$enc=false;
	$numasientos=count($asiento);

	while ($ind<$numasientos and $enc==false){

		if ($asiento->getCodcta()==$cuenta  and $asiento->getDebcre()==$debcre){
			$enc=true;
		}else{
			$ind=$ind+1;
		}

	}


	if ($enc==false){

		$asiento[$numasientos]->setCuenta($cuenta);
		$asiento[$numasientos]->setDescripcion($descripcion);
		$asiento[$numasientos]->setReferencia($referencia);
		$asiento[$numasientos]->setDebcre($debcre);
		$asiento[$numasientos]->setMonasi($monasi);

	}else{

		$asiento->setMonasi($asiento->getMonasi()+$monasi);
	}


}// fin incluir asiento

public static function eliminar_comprobante($cireging){

	$c= new Criteria();
	$c->add(ContabcPeer::NUMCOM,$cireging->getRefing());
	$c->add(ContabcPeer::FECCOM,$cireging->getFecing());
	$datos=ContabcPeer::doSelect($c);

	if ($datos){

	foreach ($datos as $per2){
      	$per2->delete();
    }

    $c= new Criteria();
	$c->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
	$c->add(Contabc1Peer::FECCOM,$cireging->getFecing());
	$datos=Contabc1Peer::doSelect($c);

	foreach ($datos as $per2){
      	$per2->delete();
    }

	}else{
		return 'El comprobante Nro. '.$cireging->getRefing().' no fué eliminado';
	}


}// fin eliminar_comprobante

public static function generar_comprobante($cireging,$arreglo=array()){

	$numerocomprobante=$cireging->getRefing();

	$c= new Criteria();
	$c->add(TsdefbanPeer::NUMCUE,$cireging->getCtaban());
	$datos=TsdefbanPeer::doSelectOne($c);

	$descripcion=$datos->getNomcue();

	self::incluir_asiento($cireging->getCtaban(),$descripcion,$numerocomprobante,'D',$cireging->getMontot(),$arreglo);

	$ind=0;
	$numreg=count($arreglo);
	while ($ind<$numreg){

		$c1= new Criteria();
		$c1->add(CideftitPeer::CODPRE,$arreglo[$ind]->getCodpre());
		$dat=CideftitPeer::doSelectone();

		if ($dat){

			if ($dat->getCodcta()!=''){
				$codigocuenta=$dat->getCodcta();
			}else{
				$codigocuenta='';
			}

		}

		$c2= new Criteria();
		$c2->add(ContabbPeer::CODCTA,$codigocuenta);
		$d=ContabbPeer::doSelect($c2);

		if ($d){
			self::incluir_asiento($d->getCodcta(),$d->getDescta(),$numerocomprobante,'C',$arreglo[$ind]->getMontot(),$arreglo[$ind]);
		}else{
			return 'El Código presupuestario '.$arreglo[$ind]->getCodpre().' no tiene un código contable asociado';
		}

		$ind++;
	}


}// fin generar_comprobante


public static function buscar_comprobante($cireging,$accion,$fecanu){

	if ($accion='E'){

		$c= new Criteria();
		$c->add(ContabcPeer::NUMCOM,$cireging->getRefing());
		$c->add(ContabcPeer::FECCOM,$cireging->getFeccom());
		$contabc=ContabcPeer::doSelect($c);

		if ($contabc!=''){

      	  $c1= new Criteria();
		  $c1->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
		  $c1->add(ContabcPeer1::FECCOM,$cireging->getFeccom());
		  $contabc1=Contabc1Peer::doSelect($c);

		  if ($contabc1){

			$c1= new Criteria();
		    $c1->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
		    $c1->add(ContabcPeer1::FECCOM,$cireging->getFeccom());
		    $asiento=Contabc1Peer::doSelect($c);

		    if(count($contabc)==count($contabc1)){
		    	$eliminar=true;
		    }else{
		    	$eliminar=false;
		    }

		    foreach ($asiento as $p){
		  	  $p->delete();
		    }

		    if ($eliminar){

		     foreach ($contabc as $per){
		  	   $per->delete();
		     }

		    }

		  }

    	}else{ return 'El comprobante Nro. '.$cireging->getRefing().' no fué anulado'; }

	}else{

		$c3= new Criteria();
		$c3->add(ContabcPeer::NUMCOM,$cireging->getRefing());
		$contabc=ContabcPeer::doSelect($c3);

		if ($contabc!=''){

			$tcontabc= new Contabc();

			$tcontabc->setNumcom($cireging->getRefing());
			$tcontabc->setFeccom($fecanu);
			$tcontabc->setDescom($contabc->getDescom());
			$tcontabc->setStacom('D');
			$tcontabc->setTipcom('');
			$tcontabc->setMoncom($contabc->getMoncom());

			$tscontabc->save();

			$c3= new Criteria();
			$c3->add(ContabcPeer::NUMCOM,$cireging->getRefing());
			$contabc1=ContabcPeer::doSelect($c3);

			foreach ($contabc1 as $per){

			$tcontabc1= new Contabc1();

			$tcontabc1->setNumcom($per->getRefing());
			$tcontabc1->setFeccom($fecanu);
			$tcontabc1->setCodcta($per->getCodcta());
			$tcontabc1->setNumasi($per->getNumasi());
			$tcontabc1->setRefasi($per->getRefasi());
			$tcontabc1->setDesasi($per->getDesasi());

			if ($per->getDebcre()=='D'){$tcontabc1->setDebcre('C');}
			else{$tcontabc1->setDebcre('D');}
			$tcontabc1->setMonasi($per->getMonasi());

			$tcontabc1->save();

			}

		}else{

			return 'El comprobante Nro. '.$cireging->getRefing().' no fué anulado';
			self::incluir_asiento();
			self::cargar_comprobante();
		}


	}

}///Fin buscar_comprobante


  public static function grabarComprobante($cireging,$grid,&$arrcompro)
  {
    $mensaje="";
    $numeroorden="";
    $r='';

    if (Herramientas::getVerCorrelativo('cortras','cidefniv',&$r))
    {
          $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);
          //print $numeroorden; exit;
    }


    $numerocomprob=$numeroorden;
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
    $x=$grid[0];
    $j=0;

    //H::printR($x);exit;

	//print $x[0]->getCodpre();exit;

      while ($j<count($x))
      {
        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$x[$j]->getCodpre());
        $regis = CideftitPeer::doSelectOne($c);
        //H::printR($regis);exit;
        if ($regis)
        {
          if($regis->getCodcta()!='')
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          //H::printR($regis2);exit;
          if ($regis2)
          {
            	$moncau=$x[$j]->getMoning()+$x[$j]->getMonrec()-$x[$j]->getMondes();
            	//print "moncau".$moncau;exit;
                $codigocuenta=$regis2->getCodcta();
                $tipo='C';
                $des="";
                $monto=$moncau;
          }else { $msjuno='El Código Presupuestario no tiene asociado Codigo Contable válido'; return true;}
        }
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

			//print "descripcion".$desc; exit;

        $j++;
      }

		//Obtener cta asociada al banco
        $codigocuenta2=$cireging->getCtaban();
        $b1= new Criteria();
        $b1->add(TsdefbanPeer::NUMCUE,$codigocuenta2);
        $regis3 = TsdefbanPeer::doSelectOne($b1);
        $codigo= $regis3->getCodcta();

        //Obtener la descripcion del codigo de cuenta
        $b2= new Criteria();
        $b2->add(ContabbPeer::CODCTA,$codigo);
        $regis4 = ContabbPeer::doSelectOne($b2);
        //H::printR($regis4); exit;
        $nomcta= $regis4->getDescta();
        $tipo2='D';
        $des2=$regis4->getDescta();
        $b=$cireging->getMontot();
        $monto2=$b;

      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;

      //print "Cuentas".$cuentas."Descripcion".$descr."tipos".$tipos."montos".$montos;exit;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($cireging->getRefing());
      $clscommpro->setFectra(date("d/m/Y",strtotime($cireging->getFecing())));
      $clscommpro->setDestra($cireging->getDesing());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }

    public static function movcod($codpre){

  	$c = new Criteria();
  	$c->add(CimovajuPeer::CODPRE,$codpre);
    $ajustes = CimovajuPeer::doSelect($c);

    $c = new Criteria();
    $c->add(CimovadiPeer::CODPRE,$codpre);
    $adiciones = CimovadiPeer::doSelect($c);

  	$c = new Criteria();
  	$c->add(CimovtraPeer::CODORI,$codpre);
  	$c->addOr(CimovtraPeer::CODDES,$codpre);
    $traslados = CimovtraPeer::doSelect($c);

    $c = new Criteria();
    $c->add(CiimpingPeer::CODPRE,$codpre);
    $ingresos = CiimpingPeer::doSelect($c);

	if ($ingresos or $adiciones or $ajustes or $traslados){

		return 1;
	}else{

		return 0 ;
	}

  }//fin de movcod

  public static function anularmovajuste($ciajuste){

  	$c = new Criteria();
  	$c->add(CimovajuPeer::REFAJU,$ciajuste->getRefaju());
    $per = CimovajuPeer::doSelect($c);

    foreach ($per as $dato){
    	$dato->setStamov('N');
        $dato->save();
    }

  }

  public static function hayasignacion($codigo){

  	$c = new Criteria();
  	$c->add(CiasiiniPeer::PERPRE,'00');
  	$c->add(CiasiiniPeer::CODPRE,$codigo);
    $asignacion = CiasiiniPeer::doSelect($c);

    //H::printR($asignacion);exit;

  	if ($asignacion!=''){
  		$valor=1;
  	}else{
  		$valor=0;}

    return $valor;
  }

  public static function verificardisponibilidad($codigo,$monto){

  		$verificardisponibilidad=true;
  	    $c= new Criteria();
        $c->add(CiasiiniPeer::CODPRE,$codigo);
        $c->add(CiasiiniPeer::PERPRE,'00');
        $reg=CiasiiniPeer::doSelectOne($c);


        if ($reg->getMondis()-$monto<0){
        	return false;
        }else{return true;}

  }


}
?>