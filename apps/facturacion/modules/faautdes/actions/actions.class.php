<?php

/**
 * faautdes actions.
 *
 * @package    siga
 * @subpackage faautdes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faautdesActions extends autofaautdesActions
{
    public $coderror1=-1;

   public function executeEdit()
  {
    $this->fanotent = $this->getFanotentOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFanotentFromRequest();

      $this->saveFanotent($this->fanotent);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('faautdes/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('faautdes/list');
      }
      else
      {
        return $this->redirect('faautdes/edit?id='.$this->fanotent->getId());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }


  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->fanotent = $this->getFanotentOrCreate();
      try{ $this->updateFanotentFromRequest();}
      catch (Exception $ex){}

      if ($this->fanotent->getNronot()!='')
      {
         $c= new Criteria();
         $c->add(FanotentPeer::NRONOT,$this->fanotent->getNronot());
         $reg= FanotentPeer::doSelectOne($c);
         if ($reg){
	         if ($reg->getAutori() == 'S'){
		      	$this->coderror1=1123;
		        return false;
	         }
	         if ($reg->getStatus() == 'N'){
		      	$this->coderror1=1124;
		        return false;
	         }
         }
      }
      return true;
    }else return true;
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fanotent = $this->getFanotentOrCreate();

    try{
	    $this->updateFanotentFromRequest();
    }

    catch(Exception $ex){}

    $this->labels = $this->getLabels();
	if($this->getRequest()->getMethod() == sfRequest::POST){
	    if($this->coderror1!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror1);
		   $this->getRequest()->setError('',$err);
		  }
	}
    return sfView::SUCCESS;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  protected function updateFanotentFromRequest(){
  	 $this->fanotent->setAutpor($this->getUser()->getAttribute('loguse',null));
  	 $this->fanotent->setAutori('S');
  	 $this->fanotent->setFecaut(date('Y-m-d'));
  }
/*
  protected function getFanotentOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $fanotent = new Fanotent();
    }
    else
    {
      $fanotent = FanotentPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($fanotent);
    }

    return $fanotent;
  }
*/
  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
