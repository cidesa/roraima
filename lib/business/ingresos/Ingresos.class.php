<?php
/**
 * Ingresos: Clase estática para el control de ingresos
 *
 * @package    Roraima
 * @subpackage ingresos
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Ingresos.class.php 32397 2009-09-01 19:18:37Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ingresos
{
  //Guarda los detalles del traslado
  public static function salvarDetalletraslado($citrasla, $grid)
  {
    try{
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
    return -1;

    } catch (Exception $ex){
      return 0;
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
      try{
        $x     = $grid[0];
        $j     = 0;
        $fecha = $ciadidis->getFecadi();
        $sql   = "select pereje from cipereje where '".$fecha."'>=fecdes and '".$fecha."'<=fechas";

        if (H::BuscarDatos($sql,&$dato))
        {
          while ($j<count($x))
          {
            $x[$j]->setRefadi($ciadidis->getRefadi());
            $x[$j]->setPerpre($dato[0]["pereje"]);
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
        }else{
          return 0;
        }

      return -1;
    } catch (Exception $ex){
      return 0;
    }

  }
  //Guarda los movimientos del ajuste
    public static function salvarMovaju($ciajuste, $grid, $refiere){

    $x=$grid[0];
      $j=0;
      if ($refiere=='S'){


    $monto=$x[$j]->getMonaju();

      while ($j<count($x))
      {

    if ($x[$j]->getCodpre()!=''){

        $cimovaju= new Cimovaju();
        $cimovaju->setRefaju($ciajuste->getRefaju());
        $cimovaju->setCodpre($x[$j]->getCodpre());
        $cimovaju->setMonaju($monto);
        $cimovaju->setStamov('A');
        //H::printR($cimovaju);exit;
        $cimovaju->save();

    }

        $j++;

        }

      }else{

      while ($j<count($x))
      {
    $x[$j]->setRefaju($ciajuste->getRefaju());
        $x[$j]->setStamov('A');
        $x[$j]->save();

     $j++;
      }

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
  public static function salvarImping($cireging, $grid, &$previsto=true)
  {
    $x = $grid[0];
    $j = 0;
    $previsto = true;
    while ($j<count($x))
    {
      $x[$j]->setRefing($cireging->getRefing());
      $x[$j]->setFecing($cireging->getFecing());
      $x[$j]->setMonaju(0);
      $x[$j]->setStaimp('A');

      //Buscar si es previsto
      if (!(self::Es_Previsto($x[$j]->getCodpre(),$x[$j]->getMoning())))
      {
        $previsto = false;
      }
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

  public static function Es_Previsto($codpre,$moning)
  {
    $PeriodoAsignacion = "00";
    $feccie = substr(Herramientas::getX('Codemp','Cidefniv','feccie','001'),0,4);
    $sql="select sum(monasi) as monasi, sum(monprc) as monprc from ciasiini where codpre like '$codpre%' and anopre='$feccie' and perpre='$PeriodoAsignacion' ";

    $valor = false;
    if (Herramientas :: BuscarDatos($sql, & $result))
    {
      if (($moning + $result[0]['monprc']) <= $result[0]['monasi']){
        $valor = true;
      }
    }
    return $valor;

  }

  //Guarda los periodos del nivel presupuestario
  public static function salvarPereje($cidefniv, $grid)
  {
      $x = $grid[0];
      $j = 0;
      $c = new Criteria();
      CiperejePeer::doDelete($c);

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

  public static function GrabarGrid($ciasiini, $grid)
  {
    try{
      $x = $grid[0];

      $c= new Criteria();
      $c->add(CiasiiniPeer::CODPRE,$ciasiini->getCodpre());
      $c->add(CiasiiniPeer::ANOPRE,$ciasiini->getAnopre());
      $c->add(CiasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
      CiasiiniPeer::doDelete($c);

      $j = 0;
      while ($j < count($x)) {
          $c = new Ciasiini();
          $c->setCodpre($ciasiini->getCodpre());
          $c->setNompre($ciasiini->getNompre());
          $c->setPerpre($x[$j]["perpre"]);
          $c->setAnopre($ciasiini->getAnopre());
          $c->setMonasi($x[$j]["monasi"]);
          $c->setMondis($x[$j]["monasi"]);
        $c->setMonprc('0');
        $c->setMoncom('0');
        $c->setMoncau('0');
        $c->setMonpag('0');
        $c->setMontra('0');
        $c->setMontrn('0');
        $c->setMonadi('0');
        $c->setMondim('0');
        $c->setMonaju('0');
        $c->setDifere('0');
          $c->setStatus('A');
          $c->save();
        $j++;
      }

    return -1;

  } catch (Exception $ex){
    return 0;
  }
  }

  //Guarda los detalles de la Estimacion Inicial
  public static function salvarEstimacion($ciasiini, $grid)
  {
    if (self::GrabarGrid($ciasiini, $grid)!= -1){ return 0; }
    $ciasiini->setPerpre('00');
    $ciasiini->setNompre($ciasiini->getNompre());
    $ciasiini->setStatus('A');
    $ciasiini->setMonprc('0');
    $ciasiini->setMoncom('0');
    $ciasiini->setMoncau('0');
    $ciasiini->setMonpag('0');
    $ciasiini->setMontra('0');
    $ciasiini->setMontrn('0');
    $ciasiini->setMonadi('0');
    $ciasiini->setMondim('0');
    $ciasiini->setMonaju('0');
    $ciasiini->setDifere('0');
    $ciasiini->setMondis($ciasiini->getMonasi());
    $ciasiini->save();
    return -1;
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

  public static function generar_movimientos_segun_libros($cireging)
  {
    $grabocontabilidad = true;

    $tsmovlib = new Tsmovlib();
    $tsmovlib->setNumcue($cireging->getCtaban());
    $tsmovlib->setReflib($cireging->getNumdep());
    $tsmovlib->setCedrif($cireging->getRifcon());
    $tsmovlib->setFeclib($cireging->getFecing());
    $tsmovlib->setFecing($cireging->getFecing());
    $tsmovlib->setTipmov($cireging->getTipmov());
    $tsmovlib->setMonmov($cireging->getMontot());
    $tsmovlib->setCodcta($cireging->getCtaban());
    $tsmovlib->setDeslib($cireging->getDesing());
    $tsmovlib->setStatus('C');
    $tsmovlib->setStacon('N');

    if ($grabocontabilidad){
      $tsmovlib->setStatus('C');   //Contabilizado
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


  public static function generar_msl_anulado($cireging)
  {
    try{
      $c= new Criteria();
      $c->add(TsmovlibPeer::NUMCUE,$cireging->getCtaban());
      $c->add(TsmovlibPeer::REFLIB,$cireging->getRefing());
      $c->add(TsmovlibPeer::TIPMOV,$cireging->getTipmov());
      $datos=TsmovlibPeer::doSelectOne($c);

      //H::printR($datos);exit;
      if ($datos){
          if ($datos->getStacon()!='C'){

            $tsmovlibnew= new Tsmovlib();

            $tsmovlibnew->setNumcue($datos->getNumcue());
            $tsmovlibnew->setReflib('A'.$cireging->getRefing());
            $tsmovlibnew->setCedrif($cireging->getCedrif());
            $tsmovlibnew->setFeclib($cireging->getFecing());
            $tsmovlibnew->setTipmov("ANUD");
            $tsmovlibnew->setMonmov($datos->getMonmov());
            $tsmovlibnew->setNumcom($cireging->getRefing());
            $tsmovlibnew->setCodcta($datos->getCodcta());
            $tsmovlibnew->setFeccom($cireging->getFecing());
            $tsmovlibnew->setStatus('C');
            $tsmovlibnew->setStacon('C');
            $tsmovlibnew->setDeslib('Ingreso Anulado');
            $tsmovlibnew->setReflibpad($cireging->getRefing());
            $tsmovlibnew->setTipmovpad($cireging->getTipmov());
            $tsmovlibnew->save();

            self::actualiza_bancos($cireging,'A','C');


          }else{
             return 'El movimiento según libros está CONCILIADO, No puede ser Anulado';

          }
      }
    return -1;
    } catch (Exception $ex){
      return 0;
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

    if ($contabc){

      $c1= new Criteria();
      $c1->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
      $c1->add(Contabc1Peer::FECCOM,$cireging->getFeccom());
      $contabc1=Contabc1Peer::doSelect($c);

      if ($contabc1){

        $c1= new Criteria();
        $c1->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
        $c1->add(Contabc1Peer::FECCOM,$cireging->getFeccom());
        $asiento=Contabc1Peer::doSelect($c);

        if(count($contabc)==count($contabc1)){
          $eliminar = true;
        }else{
          $eliminar = false;
        }

        $c1= new Criteria();
        $c1->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
        $c1->add(Contabc1Peer::FECCOM,$cireging->getFeccom());
        Contabc1Peer::doDelete($c);

        if ($eliminar){
          $c= new Criteria();
          $c->add(ContabcPeer::NUMCOM,$cireging->getRefing());
          $c->add(ContabcPeer::FECCOM,$cireging->getFeccom());
          ContabcPeer::doDelete($c);
        }

      }

      }else{ return 'El comprobante Nro. '.$cireging->getRefing().' no fué anulado'; }

  }else{

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$cireging->getRefing());
    $contabc=ContabcPeer::doSelect($c);

    if ($contabc){

      $tcontabc= new Contabc();

      $tcontabc->setNumcom($cireging->getRefing());
      $tcontabc->setFeccom($fecanu);
      $tcontabc->setDescom($contabc->getDescom());
      $tcontabc->setStacom('D');
      $tcontabc->setTipcom('');
      $tcontabc->setMoncom($contabc->getMoncom());
      $tscontabc->save();

      $c= new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
      $contabc1=Contabc1Peer::doSelect($c);

      foreach ($contabc1 as $per){
        $tcontabc1= new Contabc1();
        $tcontabc1->setNumcom($per->getRefing());
        $tcontabc1->setFeccom($fecanu);
        $tcontabc1->setCodcta($per->getCodcta());
        $tcontabc1->setNumasi($per->getNumasi());
        $tcontabc1->setRefasi($per->getRefasi());
        $tcontabc1->setDesasi($per->getDesasi());
        $tcontabc1->setMonasi($per->getMonasi());

        if ($per->getDebcre()=='D'){ $tcontabc1->setDebcre('C');}
        else{ $tcontabc1->setDebcre('D');}

        $tcontabc1->save();
      }

    }else{

      return 'El comprobante Nro. '.$cireging->getRefing().' no fué anulado';
      ///arreglar
    //  self::incluir_asiento();
    //  self::cargar_comprobante();
    }


  }

}///Fin buscar_comprobante


  public static function grabarComprobante($cireging,$grid,&$arrcompro)
  {
    $mensaje="";
    $numeroorden="";
    $r='';

    if ($cireging->getRefing()=='########')
    {
      if (Herramientas::getVerCorrelativo('cortras','cidefniv',&$r))
      {
         $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(CitraslaPeer::REFTRA,$numero);
          $resul= CitraslaPeer::doSelectOne($c);
          if ($resul)
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }else{
      $numorden=str_replace('#','0',$cireging->getRefing());
    }

    //$numerocomprob = $numeroorden;
    $numerocomprob=Comprobante::Buscar_Correlativo();
    $reftra=$numorden;
    $cuentaporpagarrendicion = "";

    $codigocuenta = "";
    $tipo  = "";
    $des   = "";
    $monto = "";

    $codigocuentas = "";
    $tipo1  = "";
    $desc   = "";
    $monto1 = "";

    $codigocuenta2 = "";
    $tipo2  ="";
    $des2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";
    $msjdos = "";

    $c = new Criteria();
    $x = $grid[0];
    $j = 0;

      while ($j<count($x))
      {
        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$x[$j]->getCodpre());
        $regis = CideftitPeer::doSelectOne($c);
        if ($regis)
        {
          $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
              $moncau=$x[$j]->getMoning()+$x[$j]->getMonrec()-$x[$j]->getMondes();   // = $x[$j]->getMontot()
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
        $j++;
      }

    //Obtener cta asociada al banco
        $codigocuenta2=$cireging->getCtaban();
        $b1= new Criteria();
        $b1->add(TsdefbanPeer::NUMCUE,$codigocuenta2);
        $regis3 = TsdefbanPeer::doSelectOne($b1);
          $codigo = $regis3->getCodcta();

        //Obtener la descripcion del codigo de cuenta
        $b2= new Criteria();
        $b2->add(ContabbPeer::CODCTA,$codigo);
        $regis4  = ContabbPeer::doSelectOne($b2);
          $nomcta = $regis4->getDescta();
          $tipo2  = 'D';
          $des2   = $regis4->getDescta();
          $monto2 = $cireging->getMontot();

      $cuentas=$codigo.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
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

  $sql="Select substr(feccie,1,4) as ano from cidefniv where codemp='001'";

    Herramientas::BuscarDatos($sql,&$anocierre);


    $c = new Criteria();
    $c->add(CiasiiniPeer::PERPRE,'00');
    $c->add(CiasiiniPeer::CODPRE,$codigo);
    $c->add(CiasiiniPeer::ANOPRE,$anocierre[0]["ano"]);
    $asignacion = CiasiiniPeer::doSelect($c);

    //H::printR($asignacion);exit;

    if ($asignacion!=''){
      $valor=1;
    }else{
      $valor=0;}

    return $valor;
  }

  public static function verificardisponibilidadajuste($codigo,$monto)
  {
    $verificardisponibilidad=true;
    $c= new Criteria();
    $c->add(CiasiiniPeer::CODPRE,$codigo);
    $c->add(CiasiiniPeer::PERPRE,'00');
    $reg=CiasiiniPeer::doSelectOne($c);

    if ($reg->getMondis()-$monto<0) {
      return false;
    }else{return true;}
  }

  public static function verificardisponibilidad($reg)
  {
     foreach ($reg as $dato){
      $c= new Criteria();

      //para que funcione en la forma de traslado
      $c->add(CiasiiniPeer::CODPRE,H::iif($dato->getCodpre(),$dato->getCodpre(),$dato->getCodori()));
      $c->add(CiasiiniPeer::PERPRE,'00');
      $reg=CiasiiniPeer::doSelectOne($c);

      if ($reg){
          if ($reg->getMondis()<$dato->getMonmov()){
            return 2;
          }
      }else{
        return 3;
      }
     }
     return 1;
  }

  public static function buscarcodigohijo($codigo){

    $c=new Criteria();
    $c->add(CideftitPeer::CODPRE,$codigo,LIKE);
    $reg=CideftitPeer::doSelectOne($c);

    if ($reg){
      return true;
    }else{
      return false;
    }

  }

  public static function SalvarIngreging($cireging, $grid)
  {
    if ($cireging->getRefing()=='########')
    {
       if (Herramientas::getVerCorrelativo('coring','cidefniv',&$r))
       {
          $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(CiregingPeer::REFING,$numero);
          $resul= CiregingPeer::doSelectOne($c);
          if ($resul)
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $cireging->setRefing($numero);
      }
     H::getSalvarCorrelativo('coring','cidefniv','refing',$r,&$msg);
    }
    else
    {
       $cireging->setRefing(str_replace('#','0',$cireging->getRefing()));
    }

    $ano  = substr($cireging->getFecing(),0,4);
    $cireging->setAnoing($ano);
    $cireging->setStaing(H::iif(($cireging->getStaing()==''),'A',$cireging->getStaing()));
    $previsto = true;
    $graboing = self::salvarImping($cireging, $grid, $previsto);   //Graba el Grid

    if (!$cireging->getId()){ //Nuevo
      if (!$previsto)   //Si es falso
      {
        $cireging->setPrevis('N');
      }
      $grabodet = self::generar_movimientos_segun_libros($cireging);
    }

    $cireging->save();
  return -1;

  }


  public static function SalvarIngadidis($ciadidis, $grid)
  {
    try{
      $ano = substr(date('d/m/YY'),6,4);
      $ciadidis->setAnoadi($ano);
      $ciadidis->setStaadi('A');
      $ciadidis->save();

      return Ingresos::salvarMovadi($ciadidis, $grid);

    } catch (Exception $ex){
      return 0;
    }
  }

  public static function ValidarIngajustenew($clase)
  {
    if (($clase->getRefmov()=='S') and ($clase->getRefere()==''))
    {
      return 1508;
    }
    return -1;
  }
}
?>