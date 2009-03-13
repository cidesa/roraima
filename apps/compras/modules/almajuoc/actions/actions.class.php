<?php

/**
 * almajuoc actions.
 *
 * @package    siga
 * @subpackage almajuoc
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almajuocActions extends autoalmajuocActions
{
  private $coderror = -1;

  public function executeEdit()
  {

    $this->caajuoc = $this->getCaajuocOrCreate();

    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaajuocFromRequest();

      if($this->saveCaajuoc($this->caajuoc)==-1)
      {

        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('almajuoc/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('almajuoc/list');
        }
        else
        {
          return $this->redirect('almajuoc/edit?id='.$this->caajuoc->getId());
        }

      }
      else
      {
        $this->labels = $this->getLabels();
        return sfView::SUCCESS;
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


 public function configGrid(){

    // TODO: Agregar los js para actualizar los saldos de los ajustes en todo el grid

    //$this->regelim = $regelim;
    $this->mensaje="";
    if($this->caajuoc->getId()>0)
    {

      //$SQL = "SELECT caartaoc.AJUOC, caartaoc.CODART, caartaoc.CODCAT, caartaoc.CANORD, caartaoc.CANAJU, caartaoc.MONTOT, caartaoc.MONRGO, caartaoc.MONAJU, caartaoc.MONREC, caartaoc.ID FROM caartaoc WHERE caartaoc.AJUOC='00002'";
      //$resp = Herramientas::BuscarDatos($SQL,&$reg);

      $c = new Criteria();
      $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
      $reg = CaartaocPeer::doSelect($c);

      $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almajuoc/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    }
    else
    {

      $c = new Criteria();
      $ordcom = $this->getRequestParameter('caajuoc[ordcom]','');
      if($ordcom=='') $ordcom = $this->getRequestParameter('codigo','');
      $c->add(CaartordPeer::ORDCOM,$ordcom);
      $this->sql = "Caartord.canord - Caartord.canaju <> Caartord.canrec ";
      $c->add(CaartordPeer::CANORD, $this->sql, Criteria::CUSTOM);

      $reg = CaartordPeer::doSelect($c);

      $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almajuoc/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartord',$reg);

      	 //si no existen datos quiere decir que no hay articulos pendientes por ajustar, la orden de compra ha sido ajustada en su totalidad
      if ($this->getRequestParameter('codigo')!="" && !$reg)
      {
         $this->mensaje="La Orden de Compra ". $this->getRequestParameter('codigo') ." ya ha sido ajustada en su totalidad !!";
      }

    }

  }

 public function executeAjax(){

    $ordcom=$this->getRequestParameter('codigo','');
    $this->mensaje="";

    $this->caajuoc = $this->getCaajuocOrCreate();

    $this->updateCaajuocFromRequest();

    $this->configGrid();

    if ($ordcom!="")
    {
	    $c = new Criteria;
	    $c->add(CaordcomPeer::ORDCOM,$ordcom);

	    $reg_ordcom = CaordcomPeer::doSelectOne($c);


	    if($reg_ordcom)
	    {
	      $output = '[["caajuoc_desord","'.$reg_ordcom->getDesord() .'",""],["caajuoc_codpro","'.$reg_ordcom->getCodpro().'",""],["caajuoc_nompro","'.$reg_ordcom->getNompro().'",""]]';
	    }
	    else
	    {
 	      $this->mensaje="Orden de Compra no existe...";
 	      $output = '[["caajuoc_desord","",""],["caajuoc_codpro","",""],["caajuoc_nompro","",""]]';
	    }
    }//if ($ordcom!="")
   else
      $output = '[["caajuoc_desord","",""],["caajuoc_codpro","",""],["caajuoc_nompro","",""]]';

	if ($this->mensaje!="")
	   {
	       $output = '[["caajuoc_desord","",""],["caajuoc_codpro","",""],["caajuoc_nompro","",""]]';
	   }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

 public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $ordcom = $this->getRequestParameter('caajuoc_ordcom','');
    $fila = $this->getRequestParameter('fila','');

    // Aqui podemos modificar el arreglo con los datos que necesitemos modificar en la vista

    $montoajuste = 0;
    $montorecargo = 0;
    $montototal = 0;
    $costo = 0;
    $cantidadOrd = 0;
    $ajuste = 0;

    $costo = Herramientas::toFloat($grid[$fila][6]);
    $cantidadOrd = Herramientas::toFloat($grid[$fila][4]);
    $ajuste = Herramientas::toFloat($grid[$fila][3]);

    $codart = $grid[$fila][0];
    $codcat = $grid[$fila][2];


    if($costo>0 && $cantidadOrd>0 && $ajuste>0){
      $montoajuste = $costo*$ajuste;
    }

    $c = new Criteria;
    $c->add(CaordcomPeer::ORDCOM,$ordcom);

    $reg_ordcom = CaordcomPeer::doSelectOne($c);

    $montorecargo = Compras::Calcular_Recargo($reg_ordcom->getOrdCom(),$ajuste,$codart,$codcat);
    $montototal = $montoajuste + $montorecargo;



    $grid[$fila][7] = number_format($montoajuste,2,',','.');
    $grid[$fila][8] = number_format($montorecargo,2,',','.');
    $grid[$fila][9] = number_format($montototal,2,',','.');


    // Inicio de la conversión y envio Json+Ajax

    $output = Herramientas::grid_to_json($grid,$name);

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

  }


 public function executeAjaxgrid(){


    $params = $this->getRequest()->getParameterHolder()->getAll();

    $params['ax_0_4'] = '111';

    $params = '[["ax_0_4","'.Herramientas::REGVACIO.'",""]]';

    //print_r(Herramientas::to_json($params));

   // $this->getResponse()->setHttpHeader("X-JSON", '('.Herramientas::to_json($params).')');
   $this->getResponse()->setHttpHeader("X-JSON", '('.$params.')');

    //return sfView::HEADER_ONLY;

  }

 public function saveCaajuoc($caajuoc)
  {

    // habilitar la siguiente línea si se usa grid
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

//    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio
      $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      if($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);

        $this->ActualizarGrid();

        return $coderr;

      }else return $coderr;
/*
    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

      return $coderr;

    }
*/
  }

 protected function deleteCaajuoc($caajuoc)
  {

    //$this->caajuoc = $this->getCaajuocOrCreate();

    //    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio
      $coderr = Compras::eliminarAlmajuoc($caajuoc);

      if($coderr!=-1)
      {
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);

        $this->ActualizarGrid();

        return $this->redirect('almajuoc/edit?id='.$caajuoc->getId());
      }
/*
    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

      return $this->redirect('almajuoc/edit?id='.$caajuoc->getId());

    }
*/
    return $this->redirect('almajuoc/list');

  }

 public function validateEdit()
  {
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {

      $this->caajuoc = $this->getCaajuocOrCreate();

      $this->updateCaajuocFromRequest();

      $this->ActualizarGrid();

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      $resp = Compras::validarAlmajuoc($this->caajuoc,$this->grid);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1)
      {
        $this->coderror = $resp;
        return false;
      } else return true;

    }
    else return true;

  }

 public function handleErrorEdit()
  {

        $this->labels = $this->getLabels();
    $this->preExecute();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror!=-1){
         $err = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('',$err);
        }
      }
      try{
    $this->updateCaajuocFromRequest();
    }
    catch(Exception $ex){}

      return sfView::SUCCESS;
  }

  public function ActualizarGrid()
  {
    $this->configGrid();

    $this->grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

 public function executeRemote()
  {
    $this->caajuoc = $this->getCaajuocOrCreate();
    $this->updateCaajuocFromRequest();
  }

}
