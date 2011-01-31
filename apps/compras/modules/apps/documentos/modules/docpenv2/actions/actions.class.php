<?php

/**
 * docpenv2 actions.
 *
 * @package    siga
 * @subpackage docpenv2
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class docpenv2Actions extends autodocpenv2Actions
{

  public function executeObservacion()
  {
    //$this->dfatendoc = $this->getDfatendocOrCreate();
    //$this->updateDfatendocFromRequest();
    $id = $this->getRequestParameter('id', '');
    $desate = $this->getRequestParameter('desate', '');
    $error = Documentos::salvarObservacion($this->getUser()->getAttribute('usuario_id', ''),$id,$desate);
    if($error!=-1) $this->setFlash('error', 'Your modifications have been saved');
    else $this->getRequest()->setError('','No se pudo guardar la Observación, hacen falta datos');
    $this->redirect('docpenv2/edit?id='.$id);

  }

  public function executePendientes()
  {
    $this->resultado = Documentos::getDocPendientes($this->getUser()->getAttribute('usuario_id', ''));
  }

  protected function updateDfatendocFromRequest()
  {
    $this->dfatendocdet = new Dfatendocdet();
    $dfatendoc = $this->getRequestParameter('dfatendoc', '');

    if($dfatendoc){
      if($dfatendoc['desate']) $desate = $dfatendoc['desate'];
      else $desate = 'Sin Comentario';

      if($dfatendoc['diaent']) $diaent = $dfatendoc['diaent'];
      else $diaent = 0;

      $this->dfatendocdet->setDesate($desate);
      $this->dfatendocdet->setDiaent($diaent);
      $this->dfatendocdet->setIdDfmedtra($dfatendoc['dfmedtra']);
    }

    parent::updateDfatendocFromRequest();

  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

    $params['diaent'] = array(0,1,2,3,4,5,6,7,8,9,10);

    $dfmedtra = DfmedtraPeer::doSelect(new Criteria());

    $arreglo = array();
    foreach($dfmedtra as $medtra){
        $arreglo[$medtra->getId()] = $medtra->__toString();
    }

    $params['dfmedtra'] = $arreglo;

    $list = Constantes::listaEstadoDocumento();
    if($this->dfatendoc->getAnuate(true)==$list[1]){
      $this->setFlash('info', 'Información');
      $this->getRequest()->setError('','Documento Anulado.');
    }

    $this->params = $params;

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


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');


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

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio
      $coderr = Documentos::salvarDocpen($clasemodelo,$this->getUser()->getAttribute('usuario_id',''),$this->dfatendocdet);

      //print $coderr.'--';
      //exit();

      if($coderr!=-1){
        return $coderr;
      }
      return -1;

    } catch (Exception $ex) {

      $coderr = 0;
      return $coderr;

    }
  }

  public function deleting($clasemodelo)
  {

    try {

      $this->dfatendoc = DfatendocPeer::retrieveByPk($this->getRequestParameter('id'));

      if($this->dfatendocdet['desate']) $desate = $this->dfatendocdet['desate'];
      else $desate = 'Sin Comentario';
      $coderr = Documentos::eliminarDocpen($this->dfatendoc,$this->getUser()->getAttribute('usuario_id',''),$desate);

      if($coderr!=-1){

        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('delete',$err);
        //$this->handleErrorEdit();
        return $this->forward('docpenv2', 'list');
        //return $this->redirect('docpen/list');

      }else
      {
      	$this->Bitacora('Elimino');
      	return $this->redirect('docpenv2/list');
      }

    } catch (Exception $ex) {
      $coderr = 0;
      return $coderr;
    }

  }


}
