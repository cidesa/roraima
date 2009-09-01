<?php

/**
 * catdefdivbarurb actions.
 *
 * @package    siga
 * @subpackage catdefdivbarurb
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class catdefdivbarurbActions extends autocatdefdivbarurbActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   $this->setVars();
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
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $dato2="";
    $javascript="";
    switch ($ajax){
      case '1':
	  	$this->loncc=0;
	  	$c = new Criteria();
	  	$reg = CatnivcatPeer::doselect($c);

	  	foreach ($reg as $datos)
	  	{
	  	  $formato= $datos->getForcodcat();
	  		if ($datos->getEssector()!='S')
	  		{
	            $this->loncc = $this->loncc + $datos->getLonniv()+1;
	  		}else{
	  			$this->loncc = $this->loncc + $datos->getLonniv();
	  			break;
	  		}
	  	}

	  	$mascara = substr($formato,0,$this->loncc);
	  	$longitud = strlen($mascara);
       if (strlen($codigo)==$longitud)
       {
        $t= new Criteria();
        $t->add(CatdivgeoPeer::CODDIVGEO,$codigo);
        $reg= CatdivgeoPeer::doSelectOne($t);
        if ($reg)
        {
          $dato=$reg->getDesdivgeo(); $dato2=$reg->getId();
        }else{
        	$javascript="alert_('La Ubicaci&oacute;n Ge&oacute;grafica no existe'); $('catcosaval_coddivgeo').value=''; $('catcosaval_coddivgeo').focus();";
        }
       }else{
       	$javascript="alert_('El  C&oacute;digo de Ubicaci&oacute;n no tiene nivel de Sector'); $('catcosaval_coddivgeo').value=''; $('catcosaval_coddivgeo').focus();";
       }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["catbarurb_catdivgeo_id","'.$dato2.'",""]]';
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

  public function saving($clasemodelo)
  {
    parent::saving($clasemodelo);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  public function setVars()
  {
  	$this->loncc=0;
  	$c = new Criteria();
  	$reg = CatnivcatPeer::doselect($c);

  	foreach ($reg as $datos)
  	{
  	  $formato= $datos->getForcodcat();
  		if ($datos->getEssector()!='S')
  		{
            $this->loncc = $this->loncc + $datos->getLonniv()+1;
            $this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
  		}else{
  			$this->loncc = $this->loncc + $datos->getLonniv();
  			$this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
  			break;
  		}
  	}

  	$this->params[0] = substr($formato,0,$this->loncc);
  	$this->params[1] = strlen($this->params[0]);
  	$this->params[2] = substr($this->nomabr,1,strlen($this->nomabr));
  }


}
