<?php

/**
 * pagbenfic actions.
 *
 * @package    Roraima
 * @subpackage pagbenfic
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagbenficActions extends autopagbenficActions
{
   public $coderror=-1;

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->opbenefi = $this->getOpbenefiOrCreate();
      $this->updateOpbenefiFromRequest();
      $opbenefi = $this->getRequestParameter('opbenefi');
      $valor = $opbenefi['cedrif'];
       $campo='cedrif';
    $resp=Herramientas::ValidarCodigo($valor,$this->opbenefi,$campo);

    if($resp!=-1)
    {
        $this->coderror = $resp;
        return false;
      }else return true;

    }else return true;
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
    $this->opbenefi = $this->getOpbenefiOrCreate();

    try{
    $this->updateOpbenefiFromRequest();
    }catch(Exception $ex){}

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opbenefi = $this->getOpbenefiOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpbenefiFromRequest();

      $this->saveOpbenefi($this->opbenefi);

    $this->opbenefi->setId(Herramientas::getX_vacio('cedrif','opbenefi','id',$this->opbenefi->getCedrif()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagbenfic/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagbenfic/list');
      }
      else
      {
        return $this->redirect('pagbenfic/edit?id='.$this->opbenefi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOpbenefiFromRequest()
  {
    $opbenefi = $this->getRequestParameter('opbenefi');
    $this->setVars();

    if (isset($opbenefi['cedrif']))
    {
      $this->opbenefi->setCedrif($opbenefi['cedrif']);
    }
    if (isset($opbenefi['nomben']))
    {
      $this->opbenefi->setNomben($opbenefi['nomben']);
    }
    if (isset($opbenefi['dirben']))
    {
      $this->opbenefi->setDirben($opbenefi['dirben']);
    }
    if (isset($opbenefi['telben']))
    {
      $this->opbenefi->setTelben($opbenefi['telben']);
    }
    if (isset($opbenefi['codcta']))
    {
      $this->opbenefi->setCodcta($opbenefi['codcta']);
    }
    if (isset($opbenefi['nitben']))
    {
      $this->opbenefi->setNitben($opbenefi['nitben']);
    }
    if (isset($opbenefi['codtipben']))
    {
      $this->opbenefi->setCodtipben($opbenefi['codtipben']);
    }
    if (isset($opbenefi['tipper']))
    {
      $this->opbenefi->setTipper($opbenefi['tipper']);
    }
    if (isset($opbenefi['nacionalidad']))
    {
      $this->opbenefi->setNacionalidad($opbenefi['nacionalidad']);
    }
    if (isset($opbenefi['residente']))
    {
      $this->opbenefi->setResidente($opbenefi['residente']);
    }
    if (isset($opbenefi['constituida']))
    {
      $this->opbenefi->setConstituida($opbenefi['constituida']);
    }
    if (isset($opbenefi['codord']))
    {
      $this->opbenefi->setCodord($opbenefi['codord']);
    }
    if (isset($opbenefi['codpercon']))
    {
      $this->opbenefi->setCodpercon($opbenefi['codpercon']);
    }
    if (isset($opbenefi['codordadi']))
    {
      $this->opbenefi->setCodordadi($opbenefi['codordadi']);
    }
    if (isset($opbenefi['codperconadi']))
    {
      $this->opbenefi->setCodperconadi($opbenefi['codperconadi']);
    }
    if (isset($opbenefi['codordcontra']))
    {
      $this->opbenefi->setCodordcontra($opbenefi['codordcontra']);
    }
    if (isset($opbenefi['codpercontra']))
    {
      $this->opbenefi->setCodpercontra($opbenefi['codpercontra']);
    }
    if (isset($opbenefi['temcedrif']))
    {
      $this->opbenefi->setTemcedrif($opbenefi['temcedrif']);
    }
    if (isset($opbenefi['codctasec']))
    {
      $this->opbenefi->setCodctasec($opbenefi['codctasec']);
    }
    if (isset($opbenefi['codctacajchi']))
    {
      $this->opbenefi->setCodctacajchi($opbenefi['codctacajchi']);
    }
  }

 public function setVars()
  {
     $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
     $this->lengthmask = strlen($this->mascaracontabilidad);
    //$this->getUser()->setAttribute('lengthmask',$lengthmask);
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
        $dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["cargable","'.$dato2.'",""]]';
      }
   else if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=OptipbenPeer::getDestipben($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    $this->tags=Herramientas::autocompleteAjax('CODTIPBEN','Optipben','codtipben',$this->getRequestParameter('opbenefi[codtipben]'));
  }
  }

  public function executeDelete()
  {
    $this->opbenefi = OpbenefiPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->opbenefi);

    try
    {
      $tiene=H::getX_vacio('CEDRIF', 'Opordpag', 'CEDRIF', $this->opbenefi->getCedrif());
      if ($tiene=="")
      {
        $this->deleteOpbenefi($this->opbenefi);
        $this->Bitacora('Elimino');
      }else {
        $this->getRequest()->setError('delete', 'No se pudo borrar el registro seleccionado. Debido a que tiene Ordenes de Pago asociadas.');
        return $this->forward('pagbenfic', 'list');
}
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('pagbenfic', 'list');
    }

    return $this->redirect('pagbenfic/list');
  }

}
