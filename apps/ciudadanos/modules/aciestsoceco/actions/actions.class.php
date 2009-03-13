<?php

/**
 * aciestsoceco actions.
 *
 * @package    siga
 * @subpackage aciestsoceco
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class aciestsocecoActions extends autoaciestsocecoActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

      $this->configGrid();
  }

  public function updatingfromrequest($atestsoceco)
  {
    $this->atestsoceco->getAtciudadanoId();
  }

  public function configGrid()
  {
    // Detalle de grupo familiar

    if($this->atestsoceco->getAtciudadanoId()){
      
      $c = new Criteria();
      $c->add(AtgrufamPeer::ATCIUDADANO_ID,$this->atestsoceco->getAtciudadanoId());
      
      $reg = AtgrufamPeer::doSelect($c);

    }else $reg = Array();

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/aciestsoceco/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atgrufam',$reg);

    $this->setFlash('atgrufam', $this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        $c = new Criteria();
        $c->add(AtayudasPeer::NROEXP,$codigo);
        $atayudas = AtayudasPeer::doSelectOne($c);

        if($atayudas){
          $output = '[["atfacturas_atayudas_id","'.$atayudas->getId().'",""],["atfacturas_nomsolben","'.$atayudas->getNomsolben().'",""],["","",""]]';
        }else{
          $output = '[["","",""],["","",""],["","",""]]';
        }

        
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['atayudas_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(AtestsocecoPeer::ATAYUDAS_ID, '');
      $criterion->addOr($c->getNewCriterion(AtestsocecoPeer::ATAYUDAS_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['atayudas_id']) && $this->filters['atayudas_id'] !== '')
    {
      $c->addJoin(AtestsocecoPeer::ATAYUDAS_ID,AtayudasPeer::ID);
      $c->add(AtayudasPeer::NROEXP, $this->filters['atayudas_id']);
    }
  }


}
