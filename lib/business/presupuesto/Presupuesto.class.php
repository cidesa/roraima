<?php
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
      $monasi = Herramientas::getXx('cpasiini',array('codpre','perpre'),array($clasemodelo->getCodpre(),'00'),'monasi');  //Monto Asignado

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
}
?>