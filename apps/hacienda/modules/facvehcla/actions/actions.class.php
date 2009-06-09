<?php

/**
 * Facvehcla actions.
 *
 * @package    siga
 * @subpackage Facvehcla
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacvehclaActions extends autoFacvehclaActions
{

  // Para incluir funcionalidades al executeEdit()
   public function editing()
  {
		$this->setVars();
		$this->fcusoveh->setMascara($this->mascara);
  }

  public function setVars()
  {
    $this->mascara = Herramientas::getX('Codemp','fcdefins','forveh','001');

  }

  public function validateEdit()
  {
    $this->mascara = Herramientas::getX('Codemp','fcdefins','forveh','001');
    $this->coderr =-1;
    $this->fcusoveh = $this->getFcusovehOrCreate();
    $this->updateFcusovehFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if ($this->getRequestParameter('id')=="")
      {
        $result=array();
        $sql = "SELECT anovig FROM fcusoveh WHERE anovig ='".$this->getRequestParameter('fcusoveh[anovig]')."' and coduso='".$this->getRequestParameter('fcusoveh[coduso]')."'";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $this->coderr=701;
          return false;
        }
      }
     }
     return true;
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
    $javascript="";
    switch ($ajax){
      case '1':
        $cad=split("-",$codigo);
        $max=count($cad);
        $i=0;
        $seguir=true;
        $cod=$cad[0];

        while ($i<$max-1 and $seguir){
          if (!H::buscarCodigoPadre('codemp','fcdefins', $cod))
          {
           $seguir=false;
           $javascript="alert('Código Presupuestario inválido, no se ha definido el nivel anterior'); $('cideftit_codpre').value='';";
    	   break;
          }else{
          	$i++;
          	$cod=$cod."-".$cad[$i];
          }
        }
        $output = '[["fcusoveh_coduso","'.$javascript.'",""]]';
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
       break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

  }




  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
	//$this->setVars();
    //$this->configGrid();
    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);
    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }



}
