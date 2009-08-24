<?php

/**
 * segrangosapr actions.
 *
 * @package    siga
 * @subpackage segrangosapr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class segrangosaprActions extends autosegrangosaprActions
{
  public function editing()
  {

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        $t= new Criteria();
	    $t->add(SegnivaprPeer::CODNIV,$codigo);
	    $data= SegnivaprPeer::doSelectOne($t);
	    if ($data)
	    {
          $dato=$data->getDesniv();
	    }else $javascript="alert('El Nivel de Aprobación no existe'); $('segranapr_codniv').value='';";
	    $output = '[["segranapr_desniv","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

    	$t= new Criteria();
    	$t->add(SegranaprPeer::CODNIV,$this->getRequestParameter('segranapr[codniv]'));
    	$t->add(SegranaprPeer::RANDES,H::tofloat($this->getRequestParameter('segranapr[randes]')));
    	$t->add(SegranaprPeer::RANHAS,H::tofloat($this->getRequestParameter('segranapr[ranhas]')));
    	$resultado= SegranaprPeer::doSelectOne($t);
    	if ($resultado)
    	{
    	  $this->coderr=206;
    	}

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }
}
