<?php

/**
 * catlotinm actions.
 *
 * @package    siga
 * @subpackage catlotinm
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32323 2009-08-31 18:36:40Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class catlotinmActions extends autocatlotinmActions
{
  public function executeIndex()
  {
    return $this->forward('catlotinm', 'edit');
  }

  public function editing()
  {
  	$this->setVars();
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

  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  public function updateError()
  {

  }

    public function setVars()
  {
  	$c = new Criteria();
   	$reg = CatnivcatPeer::doselect($c);

  	foreach ($reg as $datos)
  	{
  		if ($datos->getCatpar()=='Z')
  		{
            $this->loncc = $datos->getLonniv();
  		}else{
  			$this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
  		}
  	}
  	$arreglo=array();
  	$arreglo[0] = Herramientas::getX_vacio('catpar','catnivcat','forcodcat','Z');  //Z -> Cod.Catastral
  	$arreglo[1] = strlen(substr($this->params[0],0,strlen($this->params[0])-$this->loncc-1));
  	$arreglo[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$arreglo[3] = $this->loncc;
  	$this->params=$arreglo;
  }

  protected function saving($catreginm)
  {
  	Catastro::generarCedCas($catreginm);
    return -1;

  }

}
