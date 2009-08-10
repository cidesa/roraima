<?php

/**
 * tesdesconmovban actions.
 *
 * @package    siga
 * @subpackage tesdesconmovban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdesconmovbanActions extends autotesdesconmovbanActions
{


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->updateTsdefbanFromRequest();
	$this->configGrid($this->tsdefban->getNumcue(), $this->tsdefban->getFechades(), $this->tsdefban->getFechahas());   //Plan de Trabajo
  }

  public function transformarFecha($fecha)
  {
      $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                          if (!is_array($fecha))
      {
        $value = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
      }
      else
      {
        $value_array = $fecha;
        $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
      }

      return $value;
  }

  public function configGrid($numcue,$fechades,$fechahas,$reg = array(),$regelim = array())  //Plan de Trabajo
  {
   // $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

	$fechades = $fechades=='' ? date('d/m/Y') : $fechades;
	$fechades = $this->transformarFecha($fechades);

	$fechahas = $fechahas=='' ? date('d/m/Y') : $fechahas;
	$fechahas = $this->transformarFecha($fechahas);

   $c = new Criteria();
   $c->add(TsmovbanPeer::NUMCUE,$numcue);
    $opc6=$c->getNewCriterion(TsmovbanPeer::FECBAN,$fechades,Criteria::GREATER_EQUAL);
    $opc66=$c->getNewCriterion(TsmovbanPeer::FECBAN,$fechahas,Criteria::LESS_EQUAL);
    $opc6->addAnd($opc66);
    $c->add($opc6);

   $c->add(TsmovbanPeer::STACON1,'C');
   $c->addAscendingOrderByColumn(TsmovbanPeer :: FECBAN);
   $per = TsmovbanPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesdesconmovban/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_movimiento');
   $this->obj = $this->columnas[0]->getConfig($per);
   $this->tsdefban->setGripdesmovban($this->obj);
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
        $numcue   = $this->getRequestParameter('numcue','');
        $fechades = $this->getRequestParameter('fechades','');
        $fechahas = $this->getRequestParameter('fechahas','');
	    $this->tsdefban = $this->getTsdefbanOrCreate();
	    $this->updateTsdefbanFromRequest();

        $output = '[["","",""],["","",""],["","",""]]';

       $this->configGrid($numcue,$fechades,$fechahas);
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

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

  protected function updateTsdefbanFromRequest()
  {
    $tsdefban = $this->getRequestParameter('tsdefban');

    if (isset($tsdefban['numcue']))
    {
      $this->tsdefban->setNumcue($tsdefban['numcue']);
    }

    if (isset($tsdefban['fechahas']))
    {
      $this->tsdefban->setFechahas($tsdefban['fechahas']);
    }

    if (isset($tsdefban['fechades']))
    {
      $this->tsdefban->setFechades($tsdefban['fechades']);
    }
  //  H::printR($this->tsdefban);
//exit('55');
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGrid($this,$this->gripdesmovban);

    $this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGripdesmovban());
  	return Tesoreria::saveTesdesconmovban($clasemodelo,$grid);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
