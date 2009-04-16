<?php

/**
 * ingasiini actions.
 *
 * @package    siga
 * @subpackage ingasiini
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingasiiniActions extends autoingasiiniActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();

  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/ciasiini/filters');

    // pager
    $this->pager = new sfPropelPager('Ciasiini', 5);
    $c = new Criteria();
    $c->add(CiasiiniPeer::PERPRE,'00');
    $c->addDescendingOrderByColumn(CiasiiniPeer::ANOPRE);
    $c->addAscendingOrderByColumn(CiasiiniPeer::CODPRE);
    //$this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function configGrid($genera='', $arreglo=array())
  {
    if ($genera==''){
      $c = new Criteria();
      $c->add(CiasiiniPeer::CODPRE,$this->ciasiini->getCodpre());
      $c->add(CiasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
      $c->add(CiasiiniPeer::ANOPRE,$this->ciasiini->getAnopre());
      $per = CiasiiniPeer::doSelect($c);
    }else{
    $per=$arreglo;
    }

     //H::printR($per);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingasiini/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->grid = $this->columnas[0]->getConfig($per);
    $this->ciasiini->setGrid($this->grid);
  }


   protected function updateCiasiiniFromRequest()
   {
    $ciasiini = $this->getRequestParameter('ciasiini');

    if (isset($ciasiini['codpre']))
    {
      $this->ciasiini->setCodpre($ciasiini['codpre']);
    }
    if (isset($ciasiini['nompre']))
    {
      $this->ciasiini->setNompre($ciasiini['nompre']);
    }
    if (isset($ciasiini['perpre']))
    {
      $this->ciasiini->setPerpre('00');
    }
    if (isset($ciasiini['anopre']))
    {
      $this->ciasiini->setAnopre($ciasiini['anopre']);
    }
    if (isset($ciasiini['monasi']))
    {
      $this->ciasiini->setMonasi($ciasiini['monasi']);
    }
    if (isset($ciasiini['grid']))
    {
      $this->ciasiini->setGrid($ciasiini['grid']);
    }
    if (isset($ciasiini['status']))
    {
      $this->ciasiini->setStatus($ciasiini['status']);
    }

  }

  public function executeAjax()
  {
    $this->ciasiini = $this->getCiasiiniOrCreate();

    $codigo = $this->getRequestParameter('codigo','');
    $ajax   = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        $monto1 = $this->getRequestParameter('monto');

        $c = new Criteria();
        $periodos = CiperejePeer::doSelect($c);

        $numper = count($periodos);

        $i = 1;
        $j = 0;
        $monto=H::QuitarMonto($monto1);
        $monasi=$monto/$numper;

        $per = new Ciasiini();
        $this->per1 = array();
        while ($i<=$numper){

          if ($i<10){
              $p="0".(string)$i;
          }else{ $p=(string)$i;}

          $this->per1[$j]["perpre"]=$p;
          $this->per1[$j]["monasi"]=H::FormatoMonto($monasi);
          $this->per1[$j]["id"]='';
          $this->per1[$j]["codpre"]='';

        $i++;
        $j++;

        }
        //H::printR($this->per1);
        $genera='S';
            $this->configGrid($genera,$this->per1);
            $output = '[["","",""]]';


        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '2':
        $output = '[["","",""],["","",""],["","",""]]';

        if (H::getX_vacio('codpre','ciasiini','codpre',$codigo))
        {
          $javascript =  "alert('Este Codigo Presupuestario ya tiene Asignacion Inicial');";
          $output = '[["'.$cajtexmos.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
        }

          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;

        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
  }


  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->ciasiini  =  $this->getCiasiiniOrCreate();
       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

       $this->coderr = Herramientas::ValidarGrid($grid);

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);


  }


  public function saving($ciasiini)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid,true);
    return  Ingresos::salvarEstimacion($ciasiini, $grid);
  }

  public function deleting($ciasiini)
  {
    try{
      $c1= new Criteria();
      $datos=CidefnivPeer::doSelect($c1);
      $anoini=substr($datos[0]->getFecini(),0,4);
      $anocie=substr($datos[0]->getFeccie(),0,4);

      $c= new Criteria();
      $c->add(CiasiiniPeer::CODPRE,$ciasiini->getCodpre());
      $c->add(CiasiiniPeer::ANOPRE,$anoini,Criteria::GREATER_EQUAL);
      $c->add(CiasiiniPeer::ANOPRE,$anocie,Criteria::LESS_EQUAL);
      CiasiiniPeer::doDelete($c);

      return -1;
    } catch (Exception $ex){
      return 0;
    }
  }


}
