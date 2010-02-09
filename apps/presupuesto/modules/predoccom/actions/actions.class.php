<?php

/**
 * predoccom actions.
 *
 * @package    Roraima
 * @subpackage predoccom
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class predoccomActions extends autopredoccomActions
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

  public function saving($clasemodelo)
  {
    return Presupuesto::salvarPredoccom($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return Presupuesto::eliminarPredoccom($clasemodelo);
  }

    public function executeCreate()
  {
  	$c= new Criteria();
    $cpdefniv=CpdefnivPeer::doSelectOne($c);
    if (!$cpdefniv)
    {
      $this->getRequest()->setError('valida', 'Debe definir los Niveles Presupuestarios.');
      return $this->forward('predoccom', 'list');
    }else{
    	if ($cpdefniv->getEtadef()=='C')
    	{
    	  $this->getRequest()->setError('valida', 'La Etapa de Definición está Cerrada.');
          return $this->forward('predoccom', 'list');
    	}
    }

    return $this->forward('predoccom', 'edit');
  }


}
