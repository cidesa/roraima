<?php
/**
 * Viaticos: Clase estática para procesar los viaticos
 *
 * @package    Roraima
 * @subpackage viaticos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Viaticos
{
  public static function EliminarTipoServicio($clasemodelo)
  {
    try {
      $c = new criteria();
      $c->add(ViadettipserPeer::VIAREGTIPSER_ID,$clasemodelo->getId());
      ViadettipserPeer::doDelete($c);

      $clasemodelo->delete();
    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }

  public static function SalvarViaregente($clasemodelo,$grid)
  {
    try {
      $clasemodelo->save();
      $id = $clasemodelo->getId();
      $x  = $grid[0];
      $j  = 0;

      //H::printR($x);
      //exit();
      while ($j<count($x))
       {
         $x[$j]->setViaregenteid($id);
         $x[$j]->save();
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


       return -1;
  }catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }


  public static function SalvarViaRegtipser($clasemodelo,$grid)
  {
    try {
      $clasemodelo->save();
      $x  = $grid[0];
      $j  = 0;

    while ($j<count($x))
    {
      $x[$j]->setViaregtipserid($clasemodelo->getId());
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

       return -1;

  }catch (Exception $ex){
    return 0;
  }
  }
/////
  public static function SalvarViaregsolvia($clasemodelo,$gridTrabajo)
  {
  try{
       $totalgastos = 0;
       $refcom      = 0;
       if ((self::SalvarGridGastos($clasemodelo,$gridTrabajo,&$totalgastos))!=(-1)){ exit('5');return 1601; }
     if ((self::GenerarCompromiso($clasemodelo,$gridTrabajo,$totalgastos,&$refcom))!=(-1)){ exit('4');return 1602; }

     $clasemodelo->setRefcom($refcom);         //Compromiso
     $clasemodelo->setMonto($totalgastos);  //Monto
     $clasemodelo->save();


     if ((self::SalvarGridTrabajo($clasemodelo,$gridTrabajo,$totalgastos))!=(-1)){ return 1600; }

     return -1;

  } catch (Exception $ex){
    exit($ex);
    return 0;
  }

  }

  public static function GenerarCompromiso($clasemodelo,$grid,$totalgastos,&$refcom)
  {
  try{
    $x = $grid[0];
    $j = 0;

  if (!($clasemodelo->getId()))   //Nuevo
  {
      if (Herramientas::getVerCorrelativo('corcom','cpdefniv',&$r))
      {
        $ref = str_pad($r, 8, '0', STR_PAD_LEFT);
        $refcom = Herramientas::getBuscar_correlativoV2($ref,'cpdefniv','corcom','cpcompro','refcom');

        H::getSalvarCorrelativo('corcom','cpdefniv','Registo Solicitud de Viatico',$refcom,&$msg);

        $cpcompro_new = new Cpcompro();
        $cpcompro_new->setRefcom($refcom);
        $cpcompro_new->setTipcom($clasemodelo->getTipcom());
        $cpcompro_new->setFeccom($clasemodelo->getFecha());
        $cpcompro_new->setAnocom(substr($clasemodelo->getFecha(),0,4));
        $cpcompro_new->setStacom('A');
        $cpcompro_new->setRefprc('NULO');
        $cpcompro_new->setDescom($clasemodelo->getDescr());
        $cpcompro_new->setMoncom($totalgastos);
        $cpcompro_new->setSalcau(0);
        $cpcompro_new->setSalpag(0);
        $cpcompro_new->setSalaju(0);
        $cpcompro_new->setCedrif($clasemodelo->getCedemp());
        $cpcompro_new->save();

    //Imputaciones
        $cpimpcom_new = new Cpimpcom();
        $cpimpcom_new->setRefcom($refcom);
        $cpimpcom_new->setCodpre($clasemodelo->getCodpre());
        $cpimpcom_new->setMonimp($totalgastos);
      $cpimpcom_new->setMoncau(0);
        $cpimpcom_new->setMonpag(0);
        $cpimpcom_new->setMonaju(0);
        $cpimpcom_new->setRefere('NULO');
        $cpimpcom_new->setStaimp('A');
        $cpimpcom_new->save();
      }else{
        return 2;  //El numero inicial del Correlativo no ha sido definido
      }
  }else{
    //Documento
    $c = new criteria();
    $c->add(CpcomproPeer::REFCOM,$clasemodelo->getRefcom());
    $per = CpcomproPeer::doSelectone($c);
    if ($per)
    {
        $per->setTipcom($clasemodelo->getTipcom());
        $per->setFeccom($clasemodelo->getFecha());
        $per->setAnocom(substr($clasemodelo->getFecha(),0,4));
        $per->setStacom('A');
        $per->setRefprc('NULO');
        $per->setDescom($clasemodelo->getDescr());
        $per->setMoncom($totalgastos);
        $per->setCedrif($clasemodelo->getCedemp());
        $per->save();
    }

    //Imputaciones
    $c = new criteria();
    $c->add(CpimpcomPeer::REFCOM,$clasemodelo->getRefcom());
    $per = CpimpcomPeer::doSelectone($c);
    if ($per)
    {
          $per->setCodpre($clasemodelo->getCodpre());
          $per->setMonimp($totalgastos);
          $per->setStaimp('A');
          $per->setRefere('NULO');
        $per->save();
    }
  }
      return -1;

  } catch (Exception $ex){
    //exit($ex);
    return 0;
  }

  }


  public static function SalvarGridTrabajo($clasemodelo,$grid,$totalgastos)
  {
  try{
    $x = $grid[0];
    //H::printR($x);exit();
    $j = 0;

    while ($j<count($x))
    {
      $x[$j]->setViaregsolviaid($clasemodelo->getId());
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

  return -1;

  } catch (Exception $ex){
    //exit($ex);
    return 0;
  }

  }


  public static function SalvarGridGastos($clasemodelo,$grid,&$total_gastos)
  {
  try{
    $x            = $grid[0];
    $j            = 0;    //Puntero del grid_Gastos
    $pl           = 0;   //Puntero del grid_plan de trabajo
    $total_gastos = 0;
    while ($pl<count($x))
    {
      $j            = 0;    //Puntero del grid_Gastos
      $reg          = $x[$pl]->getGastos();
      $gastos_filas = split("/",$reg);
      array_pop($gastos_filas);  //Elimina la ultima posicion del array

      $c = new criteria();
      $c->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID,$x[$pl]->getId());
      ViaregdetgassolviaPeer::doDelete($c);

      while ($j<count($gastos_filas))
      {
        $gastos = split("_",substr($gastos_filas[$j],0,strlen($gastos_filas[$j])-2));
        $total_gastos += H::QuitarMonto($gastos[1]);
        $c = new Viaregdetgassolvia();
        $c->setViaregdetsolviaid($x[$pl]->getId());
        $c->setViaregtipserid($gastos[0]);
        $c->setDetgasmont($gastos[1]);
        $c->save();
        $j++;
      }
      $pl++;
    }

    $z=$grid[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }

    return true;
  } catch (Exception $ex){
    return 0;
  }
  }

  public static function ValidarCompromiso($clasemodelo)   //ViaRegSolVia
  {
  $c = new criteria();
  $c->add(CpcausadPeer::REFCOM,$clasemodelo->getRefcom());
  $per = CpcausadPeer::doSelectone($c);

  if ($per) return 1604;

    return -1;
  }

  public static function EliminarGastos($clasemodelo)
  {
    try {
    $c = new criteria();
    $c->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID,$clasemodelo->getId());
    $per = ViaregdetsolviaPeer::doSelect($c);

    if ($per)
    {
      foreach ($per as $reg)
      {
        $c = new criteria();
        $c->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID,$reg->getId());
        ViaregdetgassolviaPeer::doDelete($c);
      }
    }

    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }


  public static function EliminarPlanTrabajo($clasemodelo)
  {
    try {
    $c = new criteria();
      $c->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID,$clasemodelo->getId());
      ViaregdetsolviaPeer::doDelete($c);

    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }

  public static function validarEliminarViaregente($clasemodelo)
  {
    try {
      $c = new criteria();
      $c->add(ViaregdetsolviaPeer::VIAREGENTE_ID,$clasemodelo->getId());
      $per =ViaregdetsolviaPeer::doSelectone($c);
      if ($per) return 5;

      return -1;

  }catch (Exception $ex){
    return 0;
  }
  }

  public static function validarEliminarViaregtipser($clasemodelo)
  {
    try {
      $c = new criteria();
      $c->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID,$clasemodelo->getId());
      $per = ViaregdetgassolviaPeer::doSelectone($c);
      if ($per) return 5;

      return -1;

  }catch (Exception $ex){
    return 0;
  }
  }

  public static function EliminarCompromiso($clasemodelo)
  {
    try {
    $c = new criteria();
      $c->add(CpcomproPeer::REFCOM,$clasemodelo->getRefcom());
      CpcomproPeer::doDelete($c);

    $c = new criteria();
      $c->add(CpimpcomPeer::REFCOM,$clasemodelo->getRefcom());
      CpimpcomPeer::doDelete($c);


    return -1;
  }catch (Exception $ex){
    return 0;
  }
  }

  public static function validarViadettabcar($clasemodelo,$grid)
  {
    $x = $grid[0];
    if (empty($x))
    {
      return 4;
    }
      return -1;
  }

  public static function validarViaregente($clasemodelo,$grid)
  {
    /// Valida que en el grid hayan datos ///
    $x = $grid[0];
    if (empty($x))
    {
      return 4;
    }else{
    }
    /////////////

    return -1;
  }

/////////
}
?>