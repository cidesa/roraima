<?php

/**
 * instructivos actions.
 *
 * @package    siga
 * @subpackage instructivos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class instructivosActions extends autoinstructivosActions
{
	protected $coderr=-1;

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

	$this->configGrid($this->forcfgrepins->getNrofor());
  }

  public function configGrid($nrofor='')
  {
  	  $c = new Criteria();
  	  $c->add(ForcfgrepinsPeer::NROFOR,$nrofor);
  	  $c->addAscendingOrderByColumn(ForcfgrepinsPeer::ORDEN);
  	  $datos = ForcfgrepinsPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/instructivos/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cuentas');

	$this->columnas[1][0]->setCombo(Constantes::TipoReportes());
	$this->columnas[1][1]->setCatalogo('contabb', 'sf_admin_edit_form', array('id'=>'1' ,'codigo1'=>'2', 'nombre1'=>'3'), 'Forcfgrepins_instruc', array( 'clase'=>"'+cambiarclasecatalogo(this.id)+'",'param1'=>"'+cambiarclasecatalogo(this.id)+'") );

    $this->obj =$this->columnas[0]->getConfig($datos);

    $this->forcfgrepins->setObj($this->obj);
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
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
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

      $this->forcfgrepins = $this->getForcfgrepinsOrCreate();
      $this->updateForcfgrepinsFromRequest();

      if($this->forcfgrepins->getId()=='')
      {
      	  $c = new Criteria();
	      $c->add(ForcfgrepinsPeer::NROFOR,$this->forcfgrepins->getNrofor());
	      $rs = ForcfgrepinsPeer::doSelectOne($c);
	      if($rs)
	      	$this->coderr=312;
      }




      $this->configGrid($this->forcfgrepins->getNrofor());
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
      $x=$grid[0];
      $i=0;
      if (count($x)>0)
      {
	      while ($i<count($x))
	      {
	       if ($x[$i]->getTipo()=="")
	       {
	       	$this->coderr=313;
	       	return false;
	       }
	       if ($x[$i]->getCuenta()=="")
	       {
	       	$this->coderr=314;
	       	return false;
	       }
	       if ($x[$i]->getOrden()=="")
	       {
	       	$this->coderr=315;
	       	return false;
	       }


	       $i++;
	      }
      }
      else
      {
        $this->coderr=411;
        return false;
      }


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
  	$this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

  }

   protected function saving($forcfgrepins)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->coderr = Instructivos::salvar_forcfgrepins($forcfgrepins,$grid);

    return $this->coderr;

  }


  protected function deleting($forcfgrepins)
  {

     $c= new Criteria();
     $c->add(ForcfgrepinsPeer::NROFOR,$forcfgrepins->getNrofor());
     ForcfgrepinsPeer::doDelete($c);

     return -1;

  }
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->forcfgrepins = $this->getForcfgrepinsOrCreate();
    $this->updateForcfgrepinsFromRequest();

    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
        $this->updateError();
      }
    }
    return sfView::SUCCESS;
  }


}
