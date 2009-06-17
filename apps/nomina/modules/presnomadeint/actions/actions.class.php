<?php

/**
 * presnomadeint actions.
 *
 * @package    siga
 * @subpackage presnomadeint
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomadeintActions extends autopresnomadeintActions
{

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

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');    
	$cajtexcom = $this->getRequestParameter('cajtexcom','');
	$cajtexmos = $this->getRequestParameter('cajtexmos','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $monint = H::getx('Codemp','nppresoc','Intacu',$codigo);	
		$nomemp = H::getx('Codemp','nppresoc','Nomemp',$codigo);
        $output = '[["'.$cajtexmos.'","'.$nomemp.'",""],["npadeint_monantint","'.H::formatoMonto($monint).'",""]]';
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

     	$this->npadeint = $this->getNpadeintOrCreate();
	  	$this->updateNpadeintFromRequest();
		$this->coderr = PS::validarNpreghistadeint($this->npadeint->getCodemp(),$this->npadeint->getFecade());
		if(H::convnume(($this->npadeint->getMonade()))==0)
		{
			$this->coderr=471;
			$err = Herramientas::obtenerMensajeError($this->coderr);		
	        $this->getRequest()->setError('npadeint{monade}',$err);
		}
		if(H::convnume($this->npadeint->getMonade())>H::convnume($this->npadeint->getMonantint()))
		{
			$this->coderr=472;
			$err = Herramientas::obtenerMensajeError($this->coderr);		
	        $this->getRequest()->setError('npadeint{monade}',$err);
			$this->getRequest()->setError('npadeint{monantint}',$err);
		}

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
    $this->npadeint = $this->getNpadeintOrCreate();
	$this->updateNpadeintFromRequest();
  }

 public function saving($npadeint)
  {
  	$npadeint->setCodcon($npadeint->getCodtipcon());
    return parent::saving($npadeint);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
