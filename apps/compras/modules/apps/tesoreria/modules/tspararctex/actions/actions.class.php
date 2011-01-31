<?php

/**
 * tspararctex actions.
 *
 * @package    siga
 * @subpackage tspararctex
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tspararctexActions extends autotspararctexActions
{
  public function editing()
  {

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $dato=""; $javascript="";
    switch ($ajax){
      case '1':
        $t= new Criteria();
        $t->add(TsdefbanPeer::NUMCUE,$codigo);
        $reg= TsdefbanPeer::doSelectOne($t);
        if ($reg)
        {
        	$dato=$reg->getNomcue();
        }else{
        	$javascript="alert_('El N&uacute;mero de Cuenta Bancaria no existe'); $('tspararc_numcue').value=''; $('tspararc_numcue').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

}
