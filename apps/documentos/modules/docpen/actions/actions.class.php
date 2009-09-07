<?php

/**
 * docpen actions.
 *
 * @package    Roraima
 * @subpackage docpen
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class docpenActions extends autodocpenActions
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
    $this->redirect('docpen/edit?id='.$id);
    
  }

  public function executePendientes()
  {
    $this->resultado = Documentos::getDocPendientes($this->getUser()->getAttribute('usuario_id', ''));
  }

  public function executePagerlist($info = '')
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/dfatendocdef/filters');

    // pager
    $this->pager = new sfPropelPager('Dfatendocdet', 10);
    $c = new Criteria();
    $c->add(DfatendocdetPeer::ID,$info);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->dfatendoc = $this->getDfatendocOrCreate();
    $this->dfatendocdet = new Dfatendocdet();
    
    $list = Constantes::listaEstadoDocumento();
    if($this->dfatendoc->getAnuate()==$list[1]){
      $this->setFlash('info', 'Información');
      $this->getRequest()->setError('','Documento Anulado.');
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateDfatendocFromRequest();

      if($this->saveDfatendoc($this->dfatendoc)==-1){
        $this->executePagerlist($this->dfatendoc->getId());

        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('docpen/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('docpen/list');
        }
        else
        {
          return $this->redirect('docpen/edit?id='.$this->dfatendoc->getId());
        }
      }else $this->labels = $this->getLabels();

    }
    else
    {
//      $this->executePagerlist($this->dfatendoc->getId());
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->dfatendoc = $this->getDfatendocOrCreate();
    $this->dfatendocdet = new Dfatendocdet();
    $this->updateDfatendocFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateDfatendocFromRequest()
  {
    $dfatendocdet = $this->getRequestParameter('dfatendocdet', '');
    
    if($dfatendocdet){
      if($dfatendocdet['desate']) $desate = $dfatendocdet['desate'];
      else $desate = 'Sin Comentario';
  
      if($dfatendocdet['diaent']) $diaent = $dfatendocdet['diaent'];
      else $diaent = 0;
  
      $this->dfatendocdet->setDesate($desate);
      $this->dfatendocdet->setDiaent($diaent);
      $this->dfatendocdet->setIdDfmedtra($dfatendocdet['id_dfmedtra']);
    }


  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  public function saveDfatendoc($dfatendoc)
  {

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio
      $coderr = Documentos::salvarDocpen($dfatendoc,$this->getUser()->getAttribute('usuario_id',''),$this->dfatendocdet);

      //print $coderr.'--';
      //exit();

      if($coderr!=-1){

        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;

      }
      return -1;

    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

      return $coderr;

    }

  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {

//    try {

      $this->dfatendoc = DfatendocPeer::retrieveByPk($this->getRequestParameter('id'));

      if($this->dfatendocdet['desate']) $desate = $this->dfatendocdet['desate'];
      else $desate = 'Sin Comentario';
      $coderr = Documentos::eliminarDocpen($this->dfatendoc,$this->getUser()->getAttribute('usuario_id',''),$desate);

      if($coderr!=-1){

        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('delete',$err);
        //$this->handleErrorEdit();
        return $this->forward('docpen', 'list');
        //return $this->redirect('docpen/list');

      }else
      {
      	$this->Bitacora('Elimino');
      	return $this->redirect('docpen/list');
      }
/*
    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);
      //return $this->fordward('docpen', 'list');
      //$this->handleErrorEdit();

    }
*/
  }

  protected function getLabels()
  {
    $labels = parent::getLabels();
    $labels['dfatendocdet{desate}'] = 'Descripción de la Atención/ Observacion:';
    $labels['dfatendocdet{id_dfmedtra}'] = 'Medio de Transporte:';
    $labels['dfatendocdet{diaent}'] = 'Dias de entrega:';

    return $labels;
  }

}
