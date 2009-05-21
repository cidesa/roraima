<?php

/**
 * docpen actions.
 *
 * @package    siga
 * @subpackage docpen
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class docpenActions extends autodocpenActions
{

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

  public function executeEdit()
  {
    $this->dfatendoc = $this->getDfatendocOrCreate();
    $this->dfatendocdet = new Dfatendocdet();

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

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->dfatendoc = $this->getDfatendocOrCreate();
    $this->dfatendocdet = new Dfatendocdet();
    $this->updateDfatendocFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function updateDfatendocFromRequest()
  {
    $dfatendocdet = $this->getRequestParameter('dfatendocdet', '');

    if($dfatendocdet['desate']) $desate = $dfatendocdet['desate'];
    else $desate = 'Sin Comentario';

    if($dfatendocdet['diaent']) $diaent = $dfatendocdet['diaent'];
    else $diaent = 0;

    $this->dfatendocdet->setDesate($desate);
    $this->dfatendocdet->setDiaent($diaent);
    $this->dfatendocdet->setIdDfmedtra($dfatendocdet['id_dfmedtra']);

  }

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

  public function executeDelete()
  {

    try {

      $this->dfatendoc = DfatendocPeer::retrieveByPk($this->getRequestParameter('id'));

      if($this->dfatendocdet['desate']) $desate = $this->dfatendocdet['desate'];
      else $desate = 'Sin Comentario';
      $coderr = Documentos::eliminarDocpen($this->dfatendoc,$this->getUser()->getAttribute('usuario_id',''),$desate);

      if($coderr!=-1){

        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->handleErrorEdit();

      }else
      {
      	$this->Bitacora('Elimino');
      	return $this->redirect('docpen/list');
      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

      $this->handleErrorEdit();

    }
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
