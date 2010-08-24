<?php

/**
 * tscorreflib actions.
 *
 * @package    siga
 * @subpackage tscorreflib
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tscorreflibActions extends autotscorreflibActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->tscormestxt->getId()) {
        $this->tscormestxt->setMes1('01');
        $this->tscormestxt->setMes2('02');
        $this->tscormestxt->setMes3('03');
        $this->tscormestxt->setMes4('04');
        $this->tscormestxt->setMes5('05');
        $this->tscormestxt->setMes6('06');
        $this->tscormestxt->setMes7('07');
        $this->tscormestxt->setMes8('08');
        $this->tscormestxt->setMes9('09');
        $this->tscormestxt->setMes10('10');
        $this->tscormestxt->setMes11('11');
        $this->tscormestxt->setMes12('12');
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
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
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

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
