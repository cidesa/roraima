<?php

/**
 * predoccau actions.
 *
 * @package    siga
 * @subpackage predoccau
 * @author     Your name here
 * @version    SVN: $Id$
 */
class predoccauActions extends autopredoccauActions
{

  public function editing()
  {

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
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
    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  public function saving($cpdoccau)
  {
    return Presupuesto::salvarPredoccau($cpdoccau);
  }

  public function deleting($cpdoccau)
  {
    return Presupuesto::eliminarPredoccau($cpdoccau);
  }

   public function executeCreate()
  {
  	$c= new Criteria();
    $cpdefniv=CpdefnivPeer::doSelectOne($c);
    if (!$cpdefniv)
    {
      $this->getRequest()->setError('valida', 'Debe definir los Niveles Presupuestarios.');
      return $this->forward('predoccau', 'list');
    }else{
    	if ($cpdefniv->getEtadef()=='C')
    	{
    	  $this->getRequest()->setError('valida', 'La Etapa de Definición está Cerrada.');
          return $this->forward('predoccau', 'list');
    	}
    }

    return $this->forward('predoccau', 'edit');
  }


}
