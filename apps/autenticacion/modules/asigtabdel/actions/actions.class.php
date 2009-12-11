<?php

/**
 * asigtabdel actions.
 *
 * @package    siga
 * @subpackage asigtabdel
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class asigtabdelActions extends autoasigtabdelActions
{

  public function executeIndex()
  {
    return $this->redirect('asigtabdel/edit');
  }

  public function editing()
  {
    $this->apernueper->setModulo('cont');
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->apernueper = $this->getApernueperOrCreate();
        $this->apernueper->setModulo($codigo);
        $concat = $this->getRequestParameter('concatenado','');
        $this->apernueper->setConcatenado($concat);

        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    //return sfView::HEADER_ONLY;
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

  }

  public function saving($apernueper)
  {  	
    Autenticacion::grabarTablas($apernueper,$this->getRequestParameter('apernueper[nomtab_r]'));
    return -1;
  }

}
