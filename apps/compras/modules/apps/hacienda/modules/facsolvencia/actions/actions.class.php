<?php

/**
 * facsolvencia actions.
 *
 * @package    siga
 * @subpackage facsolvencia
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facsolvenciaActions extends autofacsolvenciaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->setVars();
        $this->configGridGeneral($this->fcsolvencia->getCodsol());
  }

  public function setVars()
  {
    //$this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
    $this->fcsolvencia->setFunrec($this->fcsolvencia->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcsolvencia->getFunrec());
  }


  public function configGridGeneral($codigo='', $codrif='') {

	if ($codigo != '')
	{
            $c = new Criteria();
            $c->add(Fcsoldet2Peer::CODSOL, $codigo);
            $reg = Fcsoldet2Peer::doSelect($c);

            if ($reg){
                $grid = Herramientas::getConfigGrid('grid_general',$reg);
            }else{
                $per = array();
                $grid = Herramientas::getConfigGrid('grid_general',$per);
            }
	}else{
            if ($codrif != ''){
                $c = new Criteria();
                $c->addJoin(FcdeclarPeer::FUEING, FcfueprePeer::CODFUE);
                $c->add(FcdeclarPeer::RIFCON, $codrif);
                $c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
                $c->addAscendingOrderByColumn(FcdeclarPeer::NUMREF);
                $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);

                $per = FcdeclarPeer::doSelect($c);

                if ($per){
                    $grid = Herramientas::getConfigGrid('grid_general',$per);
                }else{
                    $per = array();
                    $grid = Herramientas::getConfigGrid('grid_general',$per);
                }
             }else{
                $per = array();
                $grid = Herramientas::getConfigGrid('grid_general',$per);
             }

        }
        
        $this->grid = $grid;
	$this->fcsolvencia->setGrid($this->grid);
    }

  public function configGridResumen($codigo='') {

	if ($codigo != '')
	{
		$c = new Criteria();
		$c->addJoin(FcdeclarPeer::FUEING, FcfueprePeer::CODFUE);
		$c->add(FcdeclarPeer::RIFCON, $codigo."%", Criteria::LIKE);
		$c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
		$c->addAscendingOrderByColumn(FcdeclarPeer::NUMREF);
		$c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);

		$per = FcdeclarPeer :: doSelect($c);

                if ($per){
                    $grid = Herramientas::getConfigGrid('grid_resumen',$per);
                }else{
                    $per = array();
                    $grid = Herramientas::getConfigGrid('grid_resumen',$per);
                }
	}else{
            $per = array();
	     $grid = Herramientas::getConfigGrid('grid_ge',$per);
        }
        $this->grid = $grid;
	$this->fcsolvencia->setGrid($this->grid);
    }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $javascript = "";
    $ajax   = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');


    switch ($ajax){
      case '2':
                $c = new Criteria();
                $c->add(FcconrepPeer::RIFCON, $codigo);
                $reg = FcconrepPeer::doSelectOne($c);

                if ($reg){
                    $nomcon = $reg->getNomcon();
                    $dircon = $reg->getDircon();
                    $javascript = "$('fcsolvencia_rifcon').value = '$codigo'; $('fcsolvencia_nomcon').value = '$nomcon'; $('fcsolvencia_dircon').value = '$dircon';";
                }else{
                    $javascript = "$('fcsolvencia_rifcon').value = ''; $('fcsolvencia_nomcon').value = ''; $('fcsolvencia_dircon').value = '';";
                }

                $this->params=array();
                $this->fcsolvencia = $this->getFcsolvenciaOrCreate();
		$this->updateFcsolvenciaFromRequest();
		//$this->setVars();
		$this->configGridGeneral('', $codigo);

		$output = '[["javascript","'.$javascript.'",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                //return sfView::HEADER_ONLY;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
   //// $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
//    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
  	$this->setVars();
    $this->configGridGeneral();
  }

  public function saving($fcsolvencia)
  {
    $grid = Herramientas::CargarDatosGridv2($this, $this->grid, true);
    return Hacienda::salvarFacsolvencia($fcsolvencia, $grid, $this->getUser()->getAttribute('loguse'));
  }

  public function deleting($fcsolvencia)
  {
    return Hacienda::eliminarSolvencia($fcsolvencia);
  }


}
