<?php
/**
 * Presupuesto: Clase estática para trabajar con el modulo de Contabilidad Presupuestaria
 *
 * @package    Roraima
 * @subpackage presupuesto
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Presupuesto
{
/*
 * Author: Actualiza el Compromiso para su Causado
 */
  public static function salvarPreaprcom($clasemodelo,$grid)
  {
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCheck()=='1')
      {
        $x[$j]->setAprcom('S');
        $x[$j]->save();
      }
      if ($x[$j]->getCheck2()=='1')
      {
        $x[$j]->setAprcom('R');
        $x[$j]->save();
      }
      $j++;
    }

  return -1;
  }

  public static function validarPrecretit($cpdeftit)
  {
    $titulo = $cpdeftit->getCodpre();

    $formato = H::formatoPresupuesto();

    $split_titulo = split('-',$titulo);
    $split_formato = split('-',$formato);

    foreach($split_titulo as $i => $ruptura)
    {
      if($split_formato[$i])
        if(strlen($ruptura)!= strlen($split_formato[$i])) return 1150;
      else return 1150;
    }
    return -1;

  }

  public static function salvarPrecretit($cpdeftit)
  {

    $titulo = $cpdeftit->getCodpre();

    $split_titulo = split('-',$titulo);
    $tit = '';

    foreach($split_titulo as $i => $ruptura)
    {
      $tit .= $ruptura;
      $c = new Criteria();
      $c->add(CpdeftitPeer::CODPRE,$tit);
      $deftit = CpdeftitPeer::doSelectOne($c);
      if(!$deftit){
        $titulo = new Cpdeftit();
        $titulo->setCodpre($tit);
        $titulo->setNombre($cpdeftit->getNombre());
        $titulo->setNombre('A');
        $titulo->save();
      }
    }

  }

  public static function SalvarPreAsiFueFin($clasemodelo,$grid)
  {
    try{
      $x = $grid[0];
      $j = 0;

      while ($j < count($x))  {
        $c = new Criteria();
        $c->add(CpdisfuefinPeer::FUEFIN,$x[$j]->getCodfin());
        $c->add(CpdisfuefinPeer::CODPRE,$clasemodelo->getCodpre());
        CpdisfuefinPeer::doDelete($c);

    if ($x[$j]->getMonasi2()>0){
        if (Herramientas::getVerCorrelativo('corfue','cpdefniv',&$r))
        {
          $ref = str_pad($r, 8, '0', STR_PAD_LEFT);
          H::getSalvarCorrelativo('corfue','cpdefniv','Registo Solicitud Fuente de Financiamiento',$ref,&$msg);

        $c = new Cpdisfuefin();
        $c->setCorrel($ref);
        $c->setCodpre($clasemodelo->getCodpre());
        $c->setFuefin($x[$j]->getCodfin());
        $ano=substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
        $c->setFecdis($ano.date('-m-d'));
        $c->setOrigen('INICIAL');
        $c->setMonasi($x[$j]->getMonasi2());
        $c->setStatus('A');
        $c->save();
      }else{
        return 1303;
      }
      }
      $j++;
     }
    return -1;

  } catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }


  public static function validarPreDisFueFinMov($clasemodelo,$grid)
  {
  $x = $grid[0];
  //Le asigna el monto total del documento
  if ($clasemodelo->getTipmov()=='P') {  $monto = Herramientas::getX('refprc','cpprecom','monprc',$clasemodelo->getRefmov());	}
  if ($clasemodelo->getTipmov()=='C') {  $monto = Herramientas::getX('refcom','cpcompro','moncom',$clasemodelo->getRefmov());	}
  if ($clasemodelo->getTipmov()=='CA'){  $monto = Herramientas::getX('refcau','cpcausad','moncau',$clasemodelo->getRefmov());	}
  if ($clasemodelo->getTipmov()=='PA'){  $monto = Herramientas::getX('refpag','cppagos','monpag',$clasemodelo->getRefmov());  }
  if ($clasemodelo->getTipmov()=='A'){   $monto = Herramientas::getX('refadi','cpadidis','totadi',$clasemodelo->getRefmov()); }
  if ($clasemodelo->getTipmov()=='T'){   $monto = Herramientas::getX('reftra','cpsoltrasla','tottra',$clasemodelo->getRefmov()); }

  $clasemodelo->setMontot($monto);
  /////

  foreach ($x as $reg)
  {
      if ($reg->getMonto() > 0)
    {
      if (H::QuitarMontov2($reg->getMonto()) > H::QuitarMontov2($reg->getMondis()))
      {
           return '1300';  //El Monto del Financiamiento no puede ser Mayor al Disponible
      }
      $total = self::TotalizarColumnaGrid('GridFuentes','',$reg->getCodpre(),$grid);
      if ( $total > $monto)
      {
        return '1301';   //El Monto del Financiamiento no puede ser Mayor que el Comprometido de la Partida
      }
      if ( $total < $monto)
      {
        return '1304';   //El Monto Total del Financiamiento no puede ser Menor al Movimiento del Documento
      }

    }
  }
  return -1;
  }


  public static function TotalizarColumnaGrid($NombreGrid, $LaColumna, $ValorClave,$grid)
  {
    $x = $grid[0];
      $total = 0;
    if ($NombreGrid == "GridFuentes"){
      foreach ($x as $datos){
        if ($datos->getCodpre() == $ValorClave){
          $total += $datos->getMonto();
        }
      }
    }
    return $total;
  }


  public static function SalvarPredisfuefinmov($clasemodelo,$grid)
  {
    try{
      $x = $grid[0];
    if ($clasemodelo->getTipmov()=='P') {  $tipmov="PRECOMPROMISO"; }
    if ($clasemodelo->getTipmov()=='C') {  $tipmov="COMPROMISO";    }
    if ($clasemodelo->getTipmov()=='CA'){  $tipmov="CAUSADO";       }
    if ($clasemodelo->getTipmov()=='PA'){  $tipmov="PAGADO";        }
    if ($clasemodelo->getTipmov()=='A') {  $tipmov="CREDITO";       }
    if ($clasemodelo->getTipmov()=='T') {  $tipmov="TRASLADO";      }
    //if ($clasemodelo->getTipmov()=='AJ'){  $tipmov="AJUSTES";        }
    //return array('P' => 'Precompromiso','C' => 'Compromiso','CA' => 'Causado','PA' => 'Pagado','A' => 'Adicion/Dismunucion','T' => 'Traslado','AJ' => 'Ajuste');

    if ($clasemodelo->getTipmov()=='A'){  //CREDITO -> ADICION / DISMINUCION
      $j = 0;
      while ($j < count($x)){
          if (Herramientas::getVerCorrelativo('correl','cpdisfuefin',&$r))
          {
              $ref  = str_pad($r, 8, '0', STR_PAD_LEFT);
              $ref2 = Herramientas::getBuscar_correlativo($ref,'cpdisfuefin','correl','cpdisfuefin','correl');

          $c = new Criteria();
          $c->add(CpsoladidisPeer::	REFADI,$clasemodelo->getRefmov());
          $per = CpsoladidisPeer::doSelectone($c);

          //Siempre deberia traer valor
          if ($per) $adidis = $per->getAdidis();
          else return 0;

          if ($adidis=='A'){  //S UNA ADICION DEBE GRABAR EN CPDISFUEFIN
            $c = new Criteria();
            $c->add(CpdisfuefinPeer::	REFDIS,$clasemodelo->getRefmov());
            $c->add(CpdisfuefinPeer::CODPRE,$x[$j]->getCodpre());
            $c->add(CpdisfuefinPeer::CORREL,$x[$j]->getCorrel());
            CpdisfuefinPeer::doDelete($c);

            if ($x[$j]->getMonto() > 0){
              $c = new Cpdisfuefin();
              $c->setCorrel($ref2);
              $c->setOrigen($tipmov);
              $c->setFuefin($x[$j]->getFuefin());
              $c->setCodpre($x[$j]->getCodpre());
              $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
              $c->setFecdis($ano.date('-m-d'));
              $c->setMonasi($x[$j]->getMonto());
              $c->setRefdis($clasemodelo->getRefmov());
              $c->setStatus('A');
              $c->save();
            }
          }else if ($adidis=='D'){  //ES UNA DISMINUCION DEBE GRABARSE EN CPMOVFUEFIN
            $tipmov = 'DEBITO';
            $c = new Criteria();
            $c->add(CpmovfuefinPeer::	REFMOV,$clasemodelo->getRefmov());
            $c->add(CpmovfuefinPeer::CODPRE,$x[$j]->getCodpre());
            $c->add(CpmovfuefinPeer::CORREL,$x[$j]->getCorrel());
            CpmovfuefinPeer::doDelete($c);

            if ($x[$j]->getMonto() > 0){
              $c = new Cpmovfuefin();
              $c->setCorrel($x[$j]->getCorrel());
              $c->setRefmov($clasemodelo->getRefmov());
              $c->setTipmov($tipmov);
              $c->setMonmov($x[$j]->getMonto());
              $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
              $c->setFecmov($ano.date('-m-d'));
              $c->setCodpre($x[$j]->getCodpre());
              $c->setStamov('A');
              $c->save();
            }
          }
        }else{
          return 1303;
        }

        $j++;
      }


    }elseif ($clasemodelo->getTipmov()=='MALO'){  //TRASLADO

      $j = 0;
      $i = 1;
      while ($j < count($x)){
          if (Herramientas::getVerCorrelativo('correl','cpdisfuefin',&$r))
          {
              $ref  = str_pad($r, 8, '0', STR_PAD_LEFT);
              $ref2 = Herramientas::getBuscar_correlativo($ref,'cpdisfuefin','correl','cpdisfuefin','correl');

            $c = new Criteria();
          $c->add(CpdisfuefinPeer::	REFDIS,$clasemodelo->getRefmov());
          $c->add(CpdisfuefinPeer::CODPRE,$x[$j]->getCodpre());
          //$c->add(CpdisfuefinPeer::CORREL,$x[$j]->getCorrel());
          $c->add(CpdisfuefinPeer::ORIGEN,'TRASLADO');
          CpdisfuefinPeer::doDelete($c);

          if ($x[$j]->getMonto() > 0){

            //Para buscar el codigo presupuestario ORIGEN
                $c = new Criteria();
                $c->add(CpmovtraPeer::REFTRA,$clasemodelo->getRefmov());
              $c->add(CpmovtraPeer::CODDES,$x[$j]->getCodpre());
              $c->add(CpmovtraPeer::STAMOV,'A');  //Para tener un grado acertacion
              $per = CpmovtraPeer::doSelectOne($c);
              if ($per) $codori = $per->getCodori();
            ////

            ///////////
            $cant_partidas = 0;
              $c = new Criteria();
            $c->add(CpsolmovtraPeer::REFTRA,$clasemodelo->getRefmov());
            $c->add(CpsolmovtraPeer::CODORI,$codori);
            $per = CpsolmovtraPeer::doSelect($c);
            if ($per) $cant_partidas = count($per);
          //////////
            $ftes_diferentes = false;
              $c = new Criteria();
              $c->add(CpmovfuefinPeer::CORREL,$clasemodelo->getRefmov());
              $c->add(CpmovfuefinPeer::CORREL,CpdisfuefinPeer::CORREL);
            $c->addGroupByColumn(CpdisfuefinPeer::CORREL);
            $c->addGroupByColumn(CpdisfuefinPeer::ORIGEN);
            $c->addGroupByColumn(CpdisfuefinPeer::FUEFIN);
            $c->addGroupByColumn(CpdisfuefinPeer::FECDIS);
            $c->addGroupByColumn(CpdisfuefinPeer::CODPRE);
            $c->addGroupByColumn(CpdisfuefinPeer::MONASI);
            $c->addGroupByColumn(CpdisfuefinPeer::REFDIS);
            $c->addGroupByColumn(CpdisfuefinPeer::STATUS);
            $c->addGroupByColumn(CpdisfuefinPeer::ID);
            $per = CpdisfuefinPeer::doSelect($c);
            if (count($per) > 1) $ftes_diferentes = true;
          //////////


          if ($ftes_diferentes){

                $c = new Criteria();
              $c->add(CpmovfuefinPeer::CODPRE,$codori);
              $c->add(CpmovfuefinPeer::REFMOV,$clasemodelo->getRefmov());
              $c->addJoin(CpmovfuefinPeer::CORREL,CpdisfuefinPeer::CORREL);
              $per = CpmovfuefinPeer::doSelect($c);
    exit('55');
          }else{
                $c = new Criteria();
                $c->addJoin(CpsolmovtraPeer::REFTRA,CpmovfuefinPeer::REFMOV);
                $c->addJoin(CpmovfuefinPeer::CORREL,CpdisfuefinPeer::CORREL);
                $c->add(CpsolmovtraPeer::CODORI,$codori);
              $c->add(CpmovfuefinPeer::CODPRE,$codori);
                $c->add(CpsolmovtraPeer::CODDES,$x[$j]->getCodpre());
              $c->add(CpmovfuefinPeer::REFMOV,$clasemodelo->getRefmov());
              $per = CpmovfuefinPeer::doSelect($c);
              //if ($per) $cant_partidas = count($per);
H::printR($per);
          }

          $c = new Cpdisfuefin();
          $c->setCorrel($ref2);
          $c->setOrigen($tipmov);
          $c->setFuefin($x[$j]->getFuefin());
          $c->setCodpre($x[$j]->getCodpre());
          $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
          $c->setFecdis($ano.date('-m-d'));
             $c->setRefdis($clasemodelo->getRefmov());
             $c->setStatus('A');

//H::printR($x);
          if (count($x) > 1){

              if ($i <= count($x))
              { echo $cant_partidas;
                $c->setMonasi($per->getMonmov()/$cant_partidas);
              }else{
            $sql = "select coalesce(sum(monasi),0) as monasi from cpdisfuefin where codpre='$x[$j]->getCodpre()' and refdis='$clasemodelo->getRefmov()'";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
               $c->setMonasi($result[0]["monasi"] - $clasemodelo->getMontot());
            }
              }
          }else{
               $c->setMonasi($x[$j]->getMonto());
          }
        H::printR($c);
        exit();
           $c->save();
          }
        }else{
          exit('1303');
          return 1303;
        }
        $j++;
        $i++;
      }

    }else{
      $j = 0;
      while ($j < count($x)){
        $c = new Criteria();
        $c->add(CpmovfuefinPeer::REFMOV,$clasemodelo->getRefmov());
        $c->add(CpmovfuefinPeer::CODPRE,$x[$j]->getCodpre());
        $c->add(CpmovfuefinPeer::CORREL,$x[$j]->getCorrel());
        CpmovfuefinPeer::doDelete($c);

        if ($x[$j]->getMonto() > 0){
        $c = new Cpmovfuefin();
        $c->setCorrel($x[$j]->getCorrel());
        $c->setRefmov($clasemodelo->getRefmov());
        $c->setTipmov($tipmov);
        $c->setMonmov($x[$j]->getMonto());
        $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
        $c->setFecmov($ano.date('-m-d'));
        $c->setCodpre($x[$j]->getCodpre());
        $c->setStamov('A');
        $c->save();
        }
        $j++;
      }
    }

      return -1;
    } catch (Exception $ex){
      //echo $ex;
      //exit();
      return 0;
    }
  }


  public static function validarPreasifuefin($clasemodelo,$grid)
  {
    $monmov = H::QuitarMontov2($clasemodelo->getMonmov());  //Total
    $a= new Criteria();
    $a->add(CpasiiniPeer::PERPRE,'00');
    $a->add(CpasiiniPeer::CODPRE,$clasemodelo->getCodpre());
    $data2= CpasiiniPeer::doSelectOne($a);
    if ($data2)
    {
      $monasi=$data2->getMonasi();
    }

    if ($monmov > $monasi)
    {
    return 1302;
    }
    if ($monmov < $monasi)
    {
      return '1305';   //El Monto Total del Financiamiento no puede ser Menor al Movimiento del Documento
    }
    return -1;
  }

  public static function VerificarAprobacion()
  {
    $status= true;
    return $status;
  }

/***************************************************************************************************************************************************/

	public static function validarPrenivpre($cpdefniv,$grid) {
		$codE1=self::validarNivel($cpdefniv);
		if ($codE1==-1) {
			$codE2=self::chequeaNiveles($cpdefniv,$grid);
			if ($codE2==-1) {
				$codE3=self::validarFechas($cpdefniv);
				if ($codE3==-1) {
					return -1;
				}else return $codE3;
			}else return $codE2;
		}else return $codE1;
	}

	public static function validarNivel($cpdefniv) {
		$suma=$cpdefniv->getRupcat()+$cpdefniv->getRuppar();
  		if ($cpdefniv->getNivdis()>$suma) {
			return 1308;
  		} else {
  			return -1;
  		}
  	}

  	public static function chequeaNiveles($cpdefniv,$grid) {
  		$contC=0;
  		$contP=0;
  		$cpniveles = $grid[0];

  		foreach($cpniveles as $cpnivel) {
  		if($cpnivel->getCatpar()!="") {
			if($cpnivel->getCatpar()=='C') {
				$contC++;
			}else {
				$contP++;
			}
  		}
  		}
  		if ($cpdefniv->getRupcat()!=$contC) {
			return 1323;
  		}
  		if ($cpdefniv->getRuppar()!=$contP) {
			return 1324;
  		}

  		return -1;
  	}

	public static function validarFechas($cpdefniv) {
		if (strtotime($cpdefniv->getFeccie()) < strtotime($cpdefniv->getFecini())) {
			return 1319;
		}
		if (strtotime($cpdefniv->getFecini()) > strtotime($cpdefniv->getFecper())) {
			return 1320;
		}
		if (strtotime($cpdefniv->getFeccie()) < strtotime($cpdefniv->getFecper())) {
			return 1321;
		}
		return -1;
	}

	public static function salvarPrenivpre($cpdefniv,$grid,$gridPer) {
		$cpdefniv->setLoncod(strlen($cpdefniv->getForpre()));
		$cpdefniv->setCodemp('001');
        $cpdefniv->setPeract('01');
		$cpdefniv->setEtadef('A');
		$cpdefniv->setStaprc('N');
		$cpdefniv->save();

		self::salvarNiveles($grid);
		self::salvarPeriodos($cpdefniv, $gridPer);

		return -1;
	}

	public static function salvarNiveles($grid) {
		$cpniveles=$grid[0];

		foreach($cpniveles as $key => $cpnivel) {
			$cpnivel->setConsec($key+1);
			$cpnivel->setStaniv('A');
			$cpnivel->save();
		}

		$datos=$grid[1];
		foreach($datos as $dato) {
			$dato->delete();
		}
	}

	 public static function salvarPeriodos($cpdefniv, $gridPer) {
	 	$cpperejes = $gridPer[0];

		foreach ($cpperejes as $cppereje) {
			$tablacppereje= new Cppereje();
        	$tablacppereje->setFecini($cpdefniv->getFecini());
        	$tablacppereje->setFeccie($cpdefniv->getFeccie());
        	$tablacppereje->setPereje($cppereje["pereje"]);
        	$tablacppereje->setFecdes($cppereje["fecdes2"]);
        	$tablacppereje->setFechas($cppereje["fechas2"]);
          	$tablacppereje->save();
        }
  	}

/***************************************************************************************************************************************************/

  public static function buscaCodigos($clasemodelo){
	$formato = Herramientas :: ObtenerFormato('cpdefniv', 'forpre');
    Herramientas :: FormarCodigoPadre($clasemodelo->getCodpre(), & $nivelcodigo, & $ultimo, $formato);
	if ( ! (H::buscarCodigoPadre('codpre', 'cpdeftit', $ultimo))){
	      if ($nivelcodigo == 0) {
	        return false;
	      } else
	        return true;
	} else
	      return true;
  }



  public static function modificaAsigInicial($clasemodelo){
  	$c = new Criteria();
	$c->add(CpasiiniPeer::CODPRE,$clasemodelo->getCodpre());
	$regs = CpasiiniPeer::doSelect($c);
	foreach($regs as $reg){
		$reg->setNompre($clasemodelo->getNompre());
	}
  }


  public static function salvarPretitpre($clasemodelo){

	if (self::buscaCodigos($clasemodelo)){
		$cuenta=$clasemodelo->getCodcta();
	 	$c = new Criteria();
	    $c->add(ContabbPeer::CODCTA,$cuenta);
	  	$reg = ContabbPeer::doSelect($c);
	  	if ($reg){
	  		Presupuesto::grabaCodigoPre($clasemodelo);
	  		Presupuesto::modificaAsigInicial($clasemodelo);
	  	}else{
	  		$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
	  		if($cpdefniv){
			    $mascpre = $cpdefniv->getForpre();
			    if(!$mascpre){
			       	return 1306; // La Definición Presupuestaria no ha sido grabada
			    }else{
			    	if (strlen($mascpre)==strlen($cuenta)){
			    		return 1309;
			    	}else{
			    		Presupuesto::grabaCodigoPre($clasemodelo);
	  					Presupuesto::modificaAsigInicial($clasemodelo);
			    	}
			    }
	  		}else{
	  			return 1310;
	  		}
	  	}
		return -1;
   }else
   {
   		return 1307;
   }
  }

  public static function grabaCodigoPre($clasemodelo){
  	$clasemodelo->setStacod('A');
  	$clasemodelo->save();
  }

  public static function verificarEliminar($clasemodelo){

  		$cod=$clasemodelo->getCodpre();

  	       if(!(H::getx('Codpre','cpasiini','nompre',$cod))){
  	       	if(!(H::getx('Codpre','cpimpprc','refprc',$cod))){
  	       		if(!(H::getx('Codpre','cpimpcom','refcom',$cod))){
  	       			if(!(H::getx('Codpre','cpimpcau','refcau',$cod))){
  	       				if(!(H::getx('Codpre','cpimppag','refpag',$cod))){
  	       					if(!(H::getx('Codpre','cpmovaju','refaju',$cod))){
  	       						if(!(H::getx('Codpre','cpmovadi','refadi',$cod))){
  	       							if(!(H::getx('Codpre','cpmovtra','reftra',$cod))){
  	       								return -1;
  	       							} else{ return 1311;}
  	       						}else{ return 1312;}
  	       					}else{ return 1313;}
  	       				}else{ return 1314;}
  	       			}else{ return 1315;}
  	       		}else{ return 1316;}
   	       	 }else{ return 1317;}
  	       }else{ return 1318;}
  }

  public static function eliminarPretitpre($clasemodelo){

  	if (H::buscarCodigoHijo('codpre', 'cpdeftit', $clasemodelo->getCodpre())){
	  return 1322;
  	}else{
  		if (self::verificarEliminar($clasemodelo)==-1) {
			$c = new Criteria();
			$c->add(CpdeftitPeer::CODPRE,$clasemodelo->getCodpre());
			$reg = CpdeftitPeer::doDelete($c);
			$cpdeftit->delete();
			return -1;
	  	}else return 0;
  	}
  }

/***************************************************************************************************************************************************/

	public static function validarPreasiini($cpasiini,$grid) {
		$codN=self::noSobregira($cpasiini);
		if ($codN==-1){
			$codA=self::validarAnoPer($cpasiini);
			if ($codA==-1){
				$codE=self::validarEtadef($cpasiini);
				if ($codE==-1) {
					return -1;
				}else return $codE;
			}else return $codA;
		}else return $codN;
	}

	public static function validarAnoPer($cpasiini){
		$fecini = H::getX('CODEMP','Cpdefniv','fecini','001');
		$feccie = H::getX('CODEMP','Cpdefniv','feccie','001');
		$anoini = substr($fecini,0,4);
		$anocie = substr($feccie,0,4);

		if (($cpasiini->getAnopre() < $anoini) and ($cpasiini->getAnopre() > $anocie)){
			return 1349;
		}else return -1;
	}

	public static function noSobregira($cpasiini) {
		$c = new Criteria();
		$c->add(CpasiiniPeer::PERPRE,'00');
		$c->add(CpasiiniPeer::CODPRE,$cpasiini->getCodpre());
		$reg = CpasiiniPeer::doSelectOne($c);

		if ($reg){
			$moneje = $reg->getMonprc();
			$montoComparar=$cpasiini->getMonasi()+$reg->getMonadi()+$reg->getMontra()-$reg->getMontrn()-$reg->getMondim();
			if ($montoComparar <= $moneje){
				return 1350;
			}
		}
		return -1;
	}

	public static function validarEtadef($cpasiini) {
		$etadef=H::getX('CODEMP','cpdefniv','etadef','001');

		if ($etadef=='C')
		{
		  if ($cpasiini->getMonasi()>0)  return 1351;
		  else return -1;
	    }
		else return -1;
	}

	public static function salvarPreasiini($cpasiini,$grid) {
		$cpasiinis = $grid[0];

		$cpasiini->setPerpre('00');
		$cpasiini->setMonprc(0);
		$cpasiini->setMoncom(0);
		$cpasiini->setMoncau(0);
		$cpasiini->setMonpag(0);
		$cpasiini->setMontra(0);
		$cpasiini->setMontrn(0);
		$cpasiini->setMonadi(0);
		$cpasiini->setMondim(0);
		$cpasiini->setMonaju(0);
		$cpasiini->setMondis($cpasiini->getMonasi());
		$cpasiini->setDifere(0);
		$cpasiini->setStatus('A');
		$cpasiini->save();

      $c= new Criteria();
      $c->add(CpasiiniPeer::CODPRE,$cpasiini->getCodpre());
      $c->add(CpasiiniPeer::ANOPRE,$cpasiini->getAnopre());
      $c->add(CpasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
      CpasiiniPeer::doDelete($c);

		foreach ($cpasiinis as $cpasiini_) {
			$tablacpasiini= new Cpasiini();
			$tablacpasiini->setCodpre($cpasiini->getCodpre());
 		    $tablacpasiini->setNompre($cpasiini->getNompre());
			$tablacpasiini->setAnopre($cpasiini->getAnopre());
			$tablacpasiini->setPerpre($cpasiini_["perpre"]);
			$tablacpasiini->setMonasi($cpasiini_["monasi"]);
			$tablacpasiini->setMonprc(0);
			$tablacpasiini->setMoncom(0);
			$tablacpasiini->setMoncau(0);
			$tablacpasiini->setMonpag(0);
			$tablacpasiini->setMontra(0);
			$tablacpasiini->setMontrn(0);
			$tablacpasiini->setMonadi(0);
			$tablacpasiini->setMondim(0);
			$tablacpasiini->setMonaju(0);
			$tablacpasiini->setMondis($cpasiini_["monasi"]);
			$tablacpasiini->setDifere(0);
			$tablacpasiini->setStatus('A');
			$tablacpasiini->save();
		}
		return -1;
	}



	public static function salvarPreartley($cpartley) {
		$cpartley->save();
		return -1;
	}

	public static function eliminarPreartley($cpartley) {
		if($cpartley->countCpsoladidiss()==0 && $cpartley->countCpsoltraslas()==0){
			$cpartley->delete();
			return -1;
		} else return 1339;
	}

	public static function salvarPredoccom($cpdoccom) {
		$cpdoccom->save();
		return -1;
	}

	public static function eliminarPredoccom($cpdoccom) {
		if($cpdoccom->countCpcompros()==0){
			$cpdoccom->delete();
			return -1;
		} else return 1339;
	}

	public static function salvarPredocpag($cpdocpag) {
		$cpdocpag->save();
		return -1;
	}

	public static function eliminarPredocpag($cpdocpag) {
		if($cpdocpag->countCppagoss()==0){
			$cpdocpag->delete();
			return -1;
		} else return 1326;
	}

/***************************************************************************************************************************************************/
	public static function salvarPredocpre($cpdocprc) {
		$cpdocprc->save();
		return -1;
	}

	public static function eliminarPredocpre($cpdocprc) {
		if($cpdocprc->countCpprecoms()==0 ){
			$cpdocprc->delete();
			return -1;
		} else return 1339;
	}

	public static function salvarPredoccau($cpdoccau) {
		$cpdoccau->save();
		return -1;
	}

	public static function eliminarPredoccau($cpdoccau) {

		if($cpdoccau->countCpcausads()==0 ){
			$cpdoccau->delete();
			return -1;
		} else return 1339;


	}
	public static function salvarPredocaju($cpdocaju) {
		$cpdocaju->save();
		return -1;
	}

	public static function eliminarPredocaju($cpdocaju) {
		if($cpdocaju->countCpajustes()==0 ){
			$cpdocaju->delete();
			return -1;
		} else return 1327;

	}


	public static function salvarPreprecom($clasemodelo,$grid){
			$correlativo=self::correlativo('corprc','cpdefniv',$clasemodelo->getRefprc(),'refprc','Cpprecom',&$valorSetear);
			$clasemodelo->setRefprc($valorSetear);
			self::grabaPrecompromiso($clasemodelo);
			self::grabaGrid($clasemodelo,$grid);
			return -1;
	}

	public static function grabaPrecompromiso($clasemodelo){

		$clasemodelo->setAnoprc(substr($clasemodelo->getFecprc(),6,4));
		$clasemodelo->setDesanu("");
		$clasemodelo->setStaprc('A');
		$clasemodelo->save();
		return -1;
	}

	public static function grabaGrid($clasemodelo,$grid){
		try{
			$cpimpprc = $grid[0];
			foreach ($cpimpprc as $reg){
				$reg->setRefprc($clasemodelo->getRefprc());
				$reg->setStaimp('A');
				$reg->save();
			}
			$cpimpprcb = $grid[1];
			foreach ($cpimpprcb as $reg){
				$reg->delete();
			}
			return -1;
		}catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}

	public static function eliminarPreprecom($clasemodelo){

		$fec= $clasemodelo->getFecprc();
		if ($clasemodelo->getStaprc()=='N'){ return 1328;}
		$c = new Criteria();
		$c->add(CpimpprcPeer::REFPRC,$clasemodelo->getRefprc());
		$reg = CpimpprcPeer::doSelectOne($c);
		if($reg){
			if ($reg->getMonaju()>0){ return 1329;}
		}
		if ($clasemodelo->getSalcom()>0){ return 1330; }
		if(self::validarFechaPresupuesto($fec)==-1){
			$clasemodelo->delete();

		}else return (self::validarFechaPresupuesto($fec));
		return -1;
	}

	public static function verificarAnular($ref,$salcom){

		$mens="";
		$c = new Criteria();
		$c->add(CpprecomPeer::REFPRC,$ref);
		$reg = CpprecomPeer::doSelectOne($c);
		if ($reg){
			if ($reg->getStaprc()=='N'){
				$mens="El Precompromiso ya esta Anulado";
			}
		}
		$c = new Criteria();
		$c->add(CpimpprcPeer::REFPRC,$ref);
		$dato = CpimpprcPeer::doSelectOne($c);
		if($dato){
			if ($dato->getMonaju()>0){
				$mens="El Precompromiso No Puede ser Eliminado Ni Anulado, Tiene un Ajuste";
			}
		}
		if ($salcom>0){
			$mens="El Precompromiso No Puede ser Eliminado Ni Anulado, Tiene Movimiento";
		}
		return $mens;
	}

	public static function generarMovimientos(){
 		$nommovs = array ("Asignado","Precomprometido","Comprometido","Causado","Pagado","Traslados (+)","Traslados (-)","Aumentos","Disminuciones");
 		$movimientos = array();

		foreach ($nommovs as $key=>$nommov){
			$movimientos[$key]["id"]="";
			$movimientos[$key]["nommov"]=$nommov;
			$movimientos[$key]["monmov"]=H::FormatoMonto('');
			$movimientos[$key]["pormov"]=H::FormatoMonto('');
		}
		return $movimientos;
	}


	public static function arregloPreejeglo($codpre,$perpre,&$movimientos,&$dismon,&$dispor,&$msj) {
		$msj="";
		$sql="SELECT anopre FROM cpasiini WHERE codpre||anopre||perpre=(SELECT MAX (codpre||anopre||perpre) FROM cpasiini where perpre='".$perpre."')";
		if (H::BuscarDatos($sql,&$datos)) {
		   $ano=$datos[0]['anopre'];
		}
		$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
		if ($cpdefniv) {
			if ($perpre=='00') {
				$ano = substr($cpdefniv->getFecini(),0,4);
				$fecini = substr($cpdefniv->getFecini(),5,2);
				$feccie = substr($cpdefniv->getFeccie(),5,2);
			} else {
				$fecini = $perpre;
				$feccie = $perpre;
			}

			$nommovs = array ('PRC','COM','CAU','PAG','TRA','TRN','ADI','DIS');
			$i=1;
			foreach ($nommovs as $nommov) {
				$sql="SELECT coalesce(obtener_ejecucion('".$codpre."%','".$fecini."','".$feccie."','".$ano."','".$nommov."'),0) as monto FROM empresa";
				if (H::BuscarDatos($sql,&$registros)) {
					$movimientos[$i]["monmov"]=number_format($registros[0]["monto"],2,'.',',');
					$i++;
				}
			}

			$c = new Criteria();
			$c->add(CpdeftitPeer::CODPRE,$codpre);
			$cpdeftit = CpdeftitPeer::doSelectOne($c);
            if ($cpdeftit) {
		 		$nombre = strtoupper($cpdeftit->getNompre());
            }

        	$sql = "select coalesce(sum(monasi),0) as monasi from cpasiini where codpre like '$codpre%' and anopre='$ano' and perpre='$perpre'";
        	if (H::BuscarDatos($sql,&$monasir)) {
				$movimientos[0]["monmov"]=number_format($monasir[0]["monasi"],2,'.',',');
				$dismon = number_format(H::Monto_disponible_ejecucionP($ano,$codpre.'%',$perpre),2,'.',',');

				if (H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[0]["pormov"]=number_format(100,2,'.',',');
				} else {
					$movimientos[0]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[1]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[1]["pormov"]=number_format(H::tofloat($movimientos[1]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[1]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[2]["monmov"])!=0 && H::tofloat($movimientos[1]["monmov"])!=0) {
					$movimientos[2]["pormov"]=number_format(H::tofloat($movimientos[2]["monmov"])*100/H::tofloat($movimientos[1]["monmov"]),2,'.',',');
				} else {
					$movimientos[2]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[3]["monmov"])!=0 && H::tofloat($movimientos[2]["monmov"])!=0) {
					$movimientos[3]["pormov"]=number_format(H::tofloat($movimientos[3]["monmov"])*100/H::tofloat($movimientos[2]["monmov"]),2,'.',',');
				} else {
					$movimientos[3]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[4]["monmov"])!=0 && H::tofloat($movimientos[3]["monmov"])!=0) {
					$movimientos[4]["pormov"]=number_format(H::tofloat($movimientos[4]["monmov"])*100/H::tofloat($movimientos[3]["monmov"]),2,'.',',');
				} else {
					$movimientos[4]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[5]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[5]["pormov"]=number_format(H::tofloat($movimientos[5]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[5]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[6]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[6]["pormov"]=number_format(H::tofloat($movimientos[6]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[6]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[7]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[7]["pormov"]=number_format(H::tofloat($movimientos[7]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[7]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[8]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[8]["pormov"]=number_format(H::tofloat($movimientos[8]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[8]["pormov"]=number_format(0,2,'.',',');
				}
				if ($dismon!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$dispor=number_format((H::tofloat($dismon)*100/H::tofloat($movimientos[0]["monmov"])),2,'.',',');
				} else {
					$dispor=number_format(0,2,'.',',');
				}
			} else {}
		} else {
			return $msj='No se ha Definido Saldo Inicial para este Periodo.';
		}
	}

	public static function salvarAnular($ref,$fec,$desanu){
      if (self::validarFechaPresupuesto($fec)==-1) {
			$c= new Criteria();
		    $c->add(CpprecomPeer::REFPRC,$ref);
		    $resul= CpprecomPeer::doSelectOne($c);
		    if ($resul){
			   $resul->setFecanu($fec);
		       $resul->setDesanu($desanu);
		       $resul->setStaprc('N');
		       $resul->save();
		    }
		    $c= new Criteria();
		    $c->add(CpimpprcPeer::REFPRC,$ref);
		    $res= CpimpprcPeer::doSelect($c);
		    if ($res){
		    	foreach ($res as $rs){
		          $rs->setStaimp('N');
		          $rs->save();
		        }
		    }
		    $c= new Criteria();
		    $c->add(CpmovfuefinPeer::REFMOV,$ref);
		    $c->add(CpmovfuefinPeer::TIPMOV,'PRECOMPROMISO');
		    $res= CpmovfuefinPeer::doSelect($c);
		    if ($res){
		    	foreach ($res as $rs){
		          $rs->setStamov('N');
		          $rs->save();
		        }
		    }
      }
	}


	public static function validarFechaPresupuesto($fecanu) {
		$sql="SELECT cerrado FROM cppereje WHERE '".$fecanu."' BETWEEN fecdes AND fechas";

		if (!H::BuscarDatos($sql,&$cerrado)){
			return 1333;
		}else {
			if ($cerrado=='C') {
				return 1334;
			}else {
				return -1;
			}
		}
	}

	public static function verificarAnuPrecompro($refcom,$salcau){
		$c = new Criteria();
		$c->add(CpcomproPeer::REFCOM,$refcom);
		$reg = CpcomproPeer::doSelectOne($c);

		$msj='';

		if ($reg){
			if ($reg->getStacom()=='N') {
				$msj = 'El Compromiso ya esta Anulado.';
			}
		}
		if ($salcau>0) {
			$msj = 'El Compromiso No Puede ser Anulado, Tiene Movimiento.';
		}
		$c = new Criteria();
		$c->add(CpimpcomPeer::REFCOM,$refcom);
		$cpimpcoms = CpimpcomPeer::doSelect($c);
		if($cpimpcoms){
			foreach ($cpimpcoms as $cpimpcom){
				if ($cpimpcom->getMonaju()>0) {
					$msj = 'El Compromiso No Puede ser Anulado, Tiene un Ajuste.';
				}
			}
		}
		return $msj;
	}

	public static function salvarAnuPrecompro($refcom,$fecanu,$desanu) {
		if (self::validarFechaPresupuesto($fecanu)==-1) {
			$c = new Criteria();
			$c->add(CpcomproPeer::REFCOM,$refcom);
			$cpcompro = CpcomproPeer::doSelectOne($c);
			if ($cpcompro){
				$cpcompro->setFecanu($fecanu);
				$cpcompro->setDesanu($desanu);
				$cpcompro->setStacom('N');
				$cpcompro->save();
			}
			$c = new Criteria();
			$c->add(CpimpcomPeer::REFCOM,$refcom);
			$cpimpcoms = CpimpcomPeer::doSelect($c);
			if ($cpimpcoms) {
				foreach ($cpimpcoms as $cpimpcom) {
					$cpimpcom->setStaimp('N');
					$cpimpcom->save();
				}
			}
			$c = new Criteria();
			$c->add(CpmovfuefinPeer::REFMOV,$refcom);
			$c->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
			$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
			if ($cpmovfuefins) {
				foreach ($cpmovfuefins as $cpmovfuefin) {
					$cpmovfuefin->setStamov('N');
					$cpmovfuefin->save();
				}
			}
			return -1;
		}
	}

	public static function verificarEliPrecompro($cpcompro){
		$c = new Criteria();
		$c->add(CpcomproPeer::REFCOM,$cpcompro->getRefcom());
		$reg = CpcomproPeer::doSelectOne($c);

		if ($reg){
			if ($reg->getStacom()=='N') {
				return 1331;
			}
		}
		if ($cpcompro->getSalcau()>0) {
			return 1332;
		}
		$c = new Criteria();
		$c->add(CpimpcomPeer::REFCOM,$cpcompro->getRefcom());
		$cpimpcoms = CpimpcomPeer::doSelect($c);
		if($cpimpcoms){
			foreach ($cpimpcoms as $cpimpcom){
				if ($cpimpcom->getMonaju()>0) {
					return 1335;
				}
			}
		}
		return -1;
	}

	public static function verificarEliminarPrecompro($cpcompro){
		$c = new Criteria();
		$c->add(CaordcomPeer::ORDCOM,$cpcompro->getRefcom());
		$caordcom = CaordcomPeer::doSelectOne($c);
		if ($caordcom){
			return 1336;
		}
		$c = new Criteria();
		$c->add(CaordserPeer::ORDCOM,$cpcompro->getRefcom());
		$caordser = CaordserPeer::doSelectOne($c);
		if ($caordser){
			return 1336;
		}
		return -1;
	}

	public static function eliminarPrecompro($cpcompro){
		$codE1=self::verificarEliPrecompro($cpcompro);
		if ($codE1==-1){
			$codE2=self::verificarEliminarPrecompro($cpcompro);
			if ($codE2==-1){
				$codE3=self::validarFechaPresupuesto($cpcompro->getFeccom());
				if ($codE3==-1){
					$c = new Criteria();
					$c->add(CpimpcomPeer::REFCOM,$cpcompro->getRefcom());
					$cpimpcoms = CpimpcomPeer::doSelect($c);
					if ($cpimpcoms) {
						foreach ($cpimpcoms as $cpimpcom) {
							$cpimpcom->delete();
						}
					}
					$c = new Criteria();
					$c->add(CpmovfuefinPeer::REFMOV,$cpcompro->getRefcom());
					$c->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
					$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
					if ($cpmovfuefins) {
						foreach ($cpmovfuefins as $cpmovfuefin) {
							$cpmovfuefin->delete();
						}
					}
					$cpcompro->delete();
					return -1;
				} else return $codE3;
			} else $codE2;
		} else return $codE1;
	}

	public static function salvarPrecompro($cpcompro,$grid){
		self::salvarCompromiso($cpcompro);
		self::salvarCpimpcom($cpcompro,$grid);
		return -1;
	}

	public static function validarPreCom($clasemodelo,$grid) {
		$datosGrid=$grid[0];
		foreach($datosGrid as $fila){
			$actual=$fila->getCodpre();
			$c = new Criteria();
    		$c->add(CpasiiniPeer::CODPRE,$actual);
    		$cpasiini = CpasiiniPeer::doSelectOne($c);

			if(!$cpasiini) {
				return 1340;
			} else {
				$disponible = H::Monto_disponible($actual);
				if($fila->getMonimp()> $disponible){
					return 1338;
				}
				$encontrado = false;
				foreach ($datosGrid as $fila){
					if ($fila->getCodpre()==$actual){
						if ($encontrado) return 1337;
						$encontrado=true;
					}
				}
			}
		}
		return -1;
	}

	public static function correlativo($campoC,$tablaC,$getReferencia,$campo,$tabla,&$valorSetear) {
		$tienecorrelativo=false;

		if (H::getVerCorrelativo($campoC,$tablaC,&$r)) {
			if ($getReferencia=='########') {
				$tienecorrelativo=true;
				$encontrado=false;
				while (!$encontrado) {
					$numero=str_pad($r, 8, '0', STR_PAD_LEFT);
					eval ('$field = '.ucfirst(strtolower($tabla)).'Peer::'.strtoupper($campo).';');
					$c = new Criteria();
     				$c->add($field,$numero);
     				eval ('$registro = '.ucfirst(strtolower($tabla)).'Peer::doSelectOne($c);');
     				if ($registro){
						$r++;
     				}else { $encontrado=true; }
				}
				$valorSetear=str_pad($r, 8, '0', STR_PAD_LEFT);
			}
			else {
				$valorSetear=str_replace('#','0',$getReferencia);
      		}
		}
		if ($tienecorrelativo) {
			H::getSalvarCorrelativo($campoC,$tablaC,'Referencia',$r,$msg);
		}
	}

	public static function salvarCompromiso($cpcompro){
		self::correlativo('corcom','cpdefniv',$cpcompro->getRefcom(),'refcom','Cpcompro',&$valorSetear);
		$cpcompro->setRefcom($valorSetear);
		$cpcompro->setTipprc('');
		$cpcompro->setAnocom(substr($cpcompro->getFeccom(),6,4));
		$cpcompro->setDesanu('');
		$cpcompro->setStacom('A');

		$c = new Criteria();
		$c->add(CpdoccomPeer::TIPCOM,$cpcompro->getTipcom());
		$cpdoccom = CpdoccomPeer::doSelectOne($c);
		if ($cpdoccom->getReqaut()=='S'){
			$reqaut='N';
		}else $reqaut='';

		$cpcompro->setAprcom($reqaut);
		$cpcompro->save();
		return -1;
	}

	public static function salvarCpimpcom($cpcompro,$grid){
		try{
			$cpimpcoms = $grid[0];
			foreach ($cpimpcoms as $cpimpcom){
				$cpimpcom->setRefcom($cpcompro->getRefcom());
				$cpimpcom->setStaimp('A');
				$cpimpcom->setRefere(H::iif($cpimpcom->getRefere()=='','NULO',$refere=$cpimpcom->getRefere()));
				$cpimpcom->save();
			}
			$cpimpcoms1 = $grid[1];
			foreach ($cpimpcoms1 as $cpimpcom1){
				$cpimpcom1->delete();
			}
			return -1;
		} catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}

	public static function autorizarCompromiso($cpcompro){
		if ($cpcompro->getRefcom()!=''){
			if ($cpcompro->getStacom()=='N'){
					return 1341;
			}
			else{
				$cpcompro->setAprcom('S');
				$cpcompro->save();
				return -1;
			}
		}
	}

	public static function eliminarPrecausar($clasemodelo){
		$fec= $clasemodelo->getFeccau();
		if ($clasemodelo->getStacau()=='N'){ return 1346;}
		$c = new Criteria();
		$c->add(CpimpcauPeer::REFCAU,$clasemodelo->getRefcau());
		$reg = CpimpcauPeer::doSelectOne($c);
		if($reg){
			if ($reg->getMonaju()>0){ return 1347;}
		}
		if ($clasemodelo->getTotpag()>0){ return 1348; }
		if(self::validarFechaPresupuesto($fec)==-1){
			$clasemodelo->delete();

		}else return (self::validarFechaPresupuesto($fec));
		return -1;
	}

	public static function verificarAnuPrepagar($refpag){
		$c = new Criteria();
		$c->add(CppagosPeer::REFPAG,$refpag);
		$reg = CppagosPeer::doSelectOne($c);

		$msj='';

		if ($reg){
			if ($reg->getStapag()=='N') {
				$msj = 'El Pagado ya esta Anulado.';
			}
		}
		$c = new Criteria();
		$c->add(CpimppagPeer::REFPAG,$refpag);
		$cpimppags = CpimpcomPeer::doSelect($c);
		if($cpimppags){
			foreach ($cpimppags as $cpimppag){
				if ($cpimppag->getMonaju()>0) {
					$msj = 'El Pagado No Puede ser Anulado, Tiene un Ajuste.';
				}
			}
		}
		return $msj;
	}

	public static function salvarAnuPrepagar($refpag,$fecanu,$desanu) {
		if (self::validarFechaPresupuesto($fecanu)==-1) {
			$c = new Criteria();
			$c->add(CppagosPeer::REFPAG,$refpag);
			$cppagos = CppagosPeer::doSelectOne($c);
			if ($cppagos){
				$cppagos->setFecanu($fecanu);
				$cppagos->setDesanu($desanu);
				$cppagos->setStapag('N');
				$cppagos->save();
			}
			$c = new Criteria();
			$c->add(CpimppagPeer::REFCOM,$refpag);
			$cpimppags = CpimppagPeer::doSelect($c);
			if ($cpimppags) {
				foreach ($cpimppags as $cpimppag) {
					$cpimppag->setStaimp('N');
					$cpimppag->save();
				}
			}
			$c = new Criteria();
			$c->add(CpmovfuefinPeer::REFMOV,$refpag);
			$c->add(CpmovfuefinPeer::TIPMOV,'PAGADO');
			$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
			if ($cpmovfuefins) {
				foreach ($cpmovfuefins as $cpmovfuefin) {
					$cpmovfuefin->setStamov('N');
					$cpmovfuefin->save();
				}
			}
			return -1;
		} else return self::validarFechaPresupuesto($fecanu);
	}

	public static function verificarEliminarPrepagar($cppagos) {
		$c = new Criteria();
		$c->add(CppagosPeer::REFPAG,$cppagos->getRefpag());
		$reg = CppagosPeer::doSelectOne($c);

		if ($reg){
			if ($reg->getStapag()=='N') {
				return 1343;
			}
		}
		$c = new Criteria();
		$c->add(CpimppagPeer::REFPAG,$cppagos->getRefpag());
		$cpimppags = CpimppagPeer::doSelect($c);
		if($cpimppags){
			foreach ($cpimppags as $cpimppag){
				if ($cpimppag->getMonaju()>0) {
					return 1344;
				}
			}
		}
		$c = new Criteria();
		$c->add(TsmovlibPeer::REFLIB,$cppagos->getRefpag());
		$tsmovlib = TsmovlibPeer::doSelectOne($c);
		if ($tsmovlib){
			return 1345;
		}
		return -1;
	}

	/*public static function verificarEliminarPrepagar($cppagos) {
		$c = new Criteria();
		$c->add(TsmovlibPeer::REFLIB,$cppagos->getRefpag());
		$tsmovlib = TsmovlibPeer::doSelectOne($c);
		if ($tsmovlib){
			return 1345;
		}
		else return -1;
	}*/

	public static function eliminarPrepagar($cppagos) {
		if (self::verificarEliminarPrepagar($cppagos)==-1){
			//if (self::verificarEliminarPrepagar($cppagos)==-1){
				if (self::validarFechaPresupuesto($cppagos->getFecpag())==-1){
					$c = new Criteria();
					$c->add(CpimppagPeer::REFPAG,$cppagos->getRefpag());
					$cpimppags = CpimppagPeer::doSelect($c);
					if ($cpimppags) {
						foreach ($cpimppags as $cpimppag) {
							$cpimppag->delete();
						}
					}
					$c = new Criteria();
					$c->add(CpmovfuefinPeer::REFMOV,$cppagos->getRefpag());
					$c->add(CpmovfuefinPeer::TIPMOV,'PAGADO');
					$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
					if ($cpmovfuefins) {
						foreach ($cpmovfuefins as $cpmovfuefin) {
							$cpmovfuefin->delete();
						}
					}
					$cppagos->delete();
					return -1;
				}
				else return (self::validarFechaPresupuesto($cppagos->getFecpag()));
			//}
		} else return self::verificarEliminarPrepagar($cppagos);
	}

	public static function salvarPagado($cppagos){
		self::correlativo('corpag','cpdefniv',$cppagos->getRefpag(),'refpag','Cppagos',&$valorSetear);
		$cppagos->setRefpag($valorSetear);
		$cppagos->setTipcau('');
		$cppagos->setAnopag(substr($cppagos->getFecpag(),6,4));
		$cppagos->setDesanu('');
		$cppagos->setStapag('A');
		$cppagos->save();
		return -1;
	}

	public static function generarRefer($cppagos,$refcom,$refcau,&$refere,&$refcom,&$refprc){
		$refier = H::getX('TIPPAG','Cpdocpag','Refier',$cppagos->tippag);
		/*$c = new Criteria();
		 *$c->add(CpdocpagPeer::TIPPAG,$cppagos->tippag);
		 *$cpdocpag=CpdocpagPeer::doSelectOne($c);*/

		if ($refier=='A'){
			$c = new Criteria();
			$c->add(CpimpcauPeer::REFCAU,$refcau);
		}
		//if ($cpdocpag->getRefier()=='A'){
		//}
	}

	public static function salvarCpimppag($cppagos,$grid){
		try{
			$cpimppags = $grid[0];
			foreach ($cpimppags as $cpimppag){
			}
			$cpimppags1 = $grid[1];
			foreach ($cpimppags1 as $cpimppag1){
				$cpimppag1->delete();
			}
			return -1;
		} catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}



	public static function verificarAnuCausado($referencia,$totpag){
		$mens="";
		$c = new Criteria();
		$c->add(CpcausadPeer::REFCAU,$referencia);
		$reg = CpcausadPeer::doSelectOne($c);
		if ($reg){
			if ($reg->getStacau()=='N'){
				$mens="El Causado ya esta Anulado";
			}
		}
		$c = new Criteria();
		$c->add(CpimpcauPeer::REFPRC,$referencia);
		$dato = CpimpprcPeer::doSelectOne($c);
		if($dato){
			if ($dato->getMonaju()>0){
				$mens="El Causado No Puede ser Eliminado Ni Anulado, Tiene un Ajuste";
			}
		}
		if ($totpag>0){
			$mens="El Causado No Puede ser Eliminado Ni Anulado, Tiene Movimiento";
		}
		return $mens;
	}

	public static function salvarAnuCausado($refcau,$fecanu,$desanu){
		if (self::validarFechaPresupuesto($fecanu)==-1) {
			$c= new Criteria();
		    $c->add(CpcausadPeer::REFCAU,$refcau);
		    $resul= CpcausadPeer::doSelectOne($c);
		    if ($resul){
			   $resul->setFecanu($fecanu);
		       $resul->setDesanu($desanu);
		       $resul->setStacau('N');
		       $resul->save();
		    }
		    $c= new Criteria();
		    $c->add(CpimpcauPeer::REFCAU,$refcau);
		    $res= CpimpcauPeer::doSelect($c);
		    if ($res){
		    	foreach ($res as $rs){
		          $rs->setStaimp('N');
		          $rs->save();
		        }
		    }
		    $c= new Criteria();
		    $c->add(CpmovfuefinPeer::REFMOV,$refcau);
		    $c->add(CpmovfuefinPeer::TIPMOV,'CAUSADO');
		    $res= CpmovfuefinPeer::doSelect($c);
		    if ($res){
		    	foreach ($res as $rs){
		          $rs->setStamov('N');
		          $rs->save();
		        }
		    }
      }
	}

		public static function salvarPrecausar($clasemodelo,$grid){
			$correlativo=self::correlativo('corcau','cpdefniv',$clasemodelo->getRefprc(),'refprc','Cpcausad',&$valorSetear);
			$clasemodelo->setRefcom($valorSetear);
			self::grabaCausado($clasemodelo);
			self::grabaGridCau($clasemodelo,$grid);
			return -1;
	}

	public static function grabaCausado($clasemodelo){

		$clasemodelo->setAnocau(substr($clasemodelo->getFeccau(),6,4));
		$clasemodelo->setDesanu("");
		$clasemodelo->setStacau('A');
		$clasemodelo->save();
		return -1;
	}

	public static function grabaGridCau($clasemodelo,$grid){
		try{
			$cpcausad = $grid[0];
			foreach ($cpcausad as $reg){
				$reg->setRefcau($clasemodelo->getRefcau());
				$reg->setStacau('A');
				$reg->save();
			}
			$cpcausadb = $grid[1];
			foreach ($cpcausadb as $reg){
				$reg->delete();
			}
			return -1;
		}catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}

	public static function salvarPreasipar($clasemodelo,$grid){
		 $datosgrid = $grid[0];

		 foreach ($datosgrid as $reg){
			if($reg->getChecked()=='1') {
				$concurrencia=1;
				$codigopre=$clasemodelo->getCodpre();
				$codigocon=$clasemodelo->getCodigo1();
		        $PosGuion=H::instr($reg->getCodpre(),'-',0,$concurrencia);
		        while ($PosGuion!=0){

		        $CodigoMov= $codigopre."-".substr($reg->getCodpre(),0,$PosGuion-1);
		        $CodigoMov=trim($CodigoMov);

		        $c = new Criteria();
				$c->add(CpdeftitPeer::CODPRE,$CodigoMov);
				$regs = CpdeftitPeer::doSelectOne($c);
		 		if ($regs){
		 			$CodigoGrabar= $codigocon."-".substr($reg->getCodpre(),0,$PosGuion-1);
		            $nompre=$regs->getNompre();
		            $codcta=$regs->getCodcta();
		            $c = new Criteria();
					$c->add(CpdeftitPeer::CODPRE,$CodigoGrabar);
					$regs = CpdeftitPeer::doSelectOne($c);
		              if (!$regs){
		              	  $c = new Cpdeftit();
		                  $c->setCodpre($CodigoGrabar);
		                  $c->setNompre($nompre);
		                  $c->setCodcta($codcta);
						  $c->setStacod('A');
						  $c->save();
		               }
		 		}
		 		$concurrencia=$concurrencia+1;
		        $PosGuion=H::instr($reg->getCodpre(),'-',0,$concurrencia);
		        }
		        $CodigoMov= $codigopre."-".$reg->getCodpre();
		        $CodigoMov=trim($CodigoMov);
		        $c = new Criteria();
				$c->add(CpdeftitPeer::CODPRE,$CodigoMov);
				$regs = CpdeftitPeer::doSelectOne($c);
				if ($regs){
					$CodigoGrabar= $codigocon."-".$reg->getCodpre();
		            $nompre=$regs->getNompre();
		            $codcta=$regs->getCodcta();

		             $c = new Criteria();
					$c->add(CpdeftitPeer::CODPRE,$CodigoGrabar);
					$regs = CpdeftitPeer::doSelectOne($c);
		              if (!$regs){
		              	  $c = new Cpdeftit();
		                  $c->setCodpre($CodigoGrabar);
		                  $c->setNompre($nompre);
		                  $c->setCodcta($codcta);
						  $c->setStacod('A');
						  $c->save();
		               }
				}
			}
		}return -1;
	}

	public static function validarPretitpre($clasemodelo)
	{
		return H::VerificarFormatoPadre($clasemodelo->getCodpre());
	}

	public static function llenarPer($numper=12,$monasi=0)
	{
		$arregloper=array();
		if ($monasi>0)
		{
		  $monto=$monasi/$numper;
		}
		$j=0;
		while ($j<$numper){
	    if (($j+1)<10){
         $arregloper[$j]["perpre"]='0'.($j+1); }
        else {$arregloper[$j]["perpre"]=$j+1;}
         if ($monasi>0) $arregloper[$j]["monasi"]=number_format($monto,2,',','.');
         else $arregloper[$j]["monasi"]="0,00";
         $arregloper[$j]["id"]="";
         $j++;
		}
		return $arregloper;
	}
}
?>