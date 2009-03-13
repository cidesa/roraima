<?php

/**
 * almaprsolegr actions.
 *
 * @package    siga
 * @subpackage almaprsolegr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almaprsolegrActions extends autoalmaprsolegrActions
{
  public function executeIndex()
  {
    return $this->forward('almaprsolegr', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

	$this->configGrid();
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
    	$c = new Criteria();
    	//$c->add(CasolartPeer::APRREQ,'S',Criteria::NOT_EQUAL);
    	$c->add(CasolartPeer::STAREQ,'A');
        $sql = "(casolart.APRREQ<>'S' or casolart.APRREQ isnull)";
        $c->add(CasolartPeer::APRREQ, $sql, Criteria :: CUSTOM);
    	$c->addAscendingOrderByColumn(CasolartPeer::REQART);
    	$c->addAscendingOrderByColumn(CasolartPeer::FECREQ);
    	$reg = CasolartPeer::doSelect($c);

	    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almaprsolegr/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_casolart',$reg);

        $this->casolart->setObj($this->obj);


  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->casolart->getObj());

    $coderr = SolicituddeEgresos::salvarAlmaprsolegr($clasemodelo,$grid);

    return $coderr;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
