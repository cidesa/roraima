<?php

/**
 * catcosavaluo actions.
 *
 * @package    Roraima
 * @subpackage catcosavaluo
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class catcosavaluoActions extends autocatcosavaluoActions
{
  public function editing()
  {
    $this->setVars();
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato="";
    $javascript="";

    switch ($ajax){
      case '1':
        $c = new Criteria();
	   	$reg = CatnivcatPeer::doselect($c);

	  	foreach ($reg as $datos)
	  	{
	  		if ($datos->getCatpar()=='Z')
	  		{
	            $loncc = $datos->getLonniv();
	  		}else{
	  			$loncc = 1;
	  		}
	  	}
	  	$mascara = Herramientas::getX_vacio('catpar','catnivcat','forcodcat','Z');
	  	$longitud = strlen(substr($mascara,0,strlen($mascara)-$loncc-1));
       if (strlen($codigo)==$longitud)
       {
        $t= new Criteria();
        $t->add(CatdivgeoPeer::CODDIVGEO,$codigo);
        $reg= CatdivgeoPeer::doSelectOne($t);
        if ($reg)
        {
          $dato=$reg->getDesdivgeo();
        }else{
        	$javascript="alert_('La Ubicaci&oacute;n Ge&oacute;grafica no existe'); $('catcosaval_coddivgeo').value=''; $('catcosaval_coddivgeo').focus();";
        }
       }else{
       	$javascript="alert_('El  C&oacute;digo de Ubicaci&oacute;n no es de Ultimo Nivel'); $('catcosaval_coddivgeo').value=''; $('catcosaval_coddivgeo').focus();";
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


  public function validateEdit()
  {
    $this->coderr =-1;

   if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

    protected function updateError()
  {
  	$this->setVars();
    return true;
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
  	$this->params[0] = Herramientas::getX_vacio('catpar','catnivcat','forcodcat','Z');  //Z -> Cod.Catastral
  	$this->params[1] = strlen(substr($this->params[0],0,strlen($this->params[0])-$this->loncc-1));
  	$this->params[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$this->params[3] = $this->loncc;
  }
}
