<?php

/**
 * oycreglic actions.
 *
 * @package    siga
 * @subpackage oycreglic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycreglicActions extends autooycreglicActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->ocreglic->getId())
    {$this->configGrid($this->getRequestParameter('ocreglic[codlic]'));}
    else { $this->configGrid($this->ocreglic->getCodlic());}

  }

  public function configGrid($codigolic='')
  {
    $c = new Criteria();
  	$c->add(OclichisPeer::CODLIC,$codigolic);
  	$lichist = OclichisPeer::doSelect($c);
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/oycreglic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_historial',$lichist);

    $this->ocreglic->setObjhistorial($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    switch ($ajax){
      case '1':
         $dato=Herramientas::getX('codobr','Ocregobr','desobr',$codigo);
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      case '2':
         $dato=Herramientas::getX('codfin','Fortipfin','nomext',$codigo);
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      case '3':
         $dato=Herramientas::getX('codclacomp','Occlacomp','desclacomp',$codigo);
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
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

  public function saving($ocreglic)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    Obras::salvarLicitacion($ocreglic,$grid);
    return -1;
  }

  public function deleting($ocreglic)
  {
  	$c= new Criteria();
  	$c->add(OclichisPeer::CODLIC,$ocreglic->getCodlic());
  	OclichisPeer::doDelete($c);

  	$ocreglic->delete();

    return -1;
  }

}
