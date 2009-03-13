<?php

/**
 * oycdefemp actions.
 *
 * @package    siga
 * @subpackage oycdefemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefempActions extends autooycdefempActions
{
  public function executeIndex()
  {
    $c= new Criteria();
  	$c->add(OcdefempPeer::CODEMP,'001');
  	$resul= OcdefempPeer::doSelectOne($c);
  	if ($resul)
  	{
  	 $id=$resul->getId();
  	 return $this->redirect('oycdefemp/edit?id='.$id);
  	}
  	else
  	{
  	  return $this->redirect('oycdefemp/edit');
  	}
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
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  protected function saveOcdefemp($ocdefemp)
  {
  	$ocdefemp->setCodemp('001');
  	if ($ocdefemp->getIvaant()=='1')
  	$ocdefemp->setIvaant('S');
  	else $ocdefemp->setIvaant(null);

  	if ($ocdefemp->getRetant()=='1')
  	$ocdefemp->setRetant('S');
  	else $ocdefemp->setRetant(null);
    $ocdefemp->save();

  }
}
