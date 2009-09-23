<?php

/**
 * catdefaval actions.
 *
 * @package    Roraima
 * @subpackage catdefaval
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class catdefavalActions extends autocatdefavalActions
{
  public function editing()
  {
    $this->setVars();
    $this->configGrid($this->catdefaval->getId());
  }

  public function configGrid($nuevo='',$idcatreging='')
  {
	if ($nuevo== '') {
	  $r= new Criteria();
	  $r->add(CatusoespinmPeer::CATREGINM_ID,$idcatreging);
	  $calaval=CatusoespinmPeer::doSelect($r);
	} else {
		$r = new Criteria();
		$r->add(CatdetavalPeer::CATDEFAVAL_ID,$nuevo);
		$calaval = CatdetavalPeer::doSelect($r);
	}

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catdefaval/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catdetaval');
     if ($nuevo=='') $this->columnas[0]->setTabla('Catusoespinm');
     $this->columnas[1][0]->setCombo(Constantes::ListaCaract());
     $this->columnas[1][1]->setCombo(Catusoespinm::Tipocons());

     $this->obj = $this->columnas[0]->getConfig($calaval);

     $this->catdefaval->setObj($this->obj);
}

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexmos2 = $this->getRequestParameter('cajtexmos2','');
    $javascript=""; $dato=""; $dato2="";
    switch ($ajax){
      case '1':
         $this->params = array();
         $this->catdefaval = $this->getCatdefavalOrCreate();
         $this->labels = $this->getLabels();

         $c = new Criteria();
	   	 $reg = CatnivcatPeer::doselect($c);
         if ($reg){
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
         }

         if (strlen($codigo)==$longitud){
	         $u= new Criteria();
	         $u->add(CatdivgeoPeer::CODDIVGEO,$codigo);
	         $data= CatdivgeoPeer::doSelectOne($u);
	         if ($data){
	         	 $dato=$data->getDesdivgeo();
		         $p= new Criteria();
		         $p->add(CatreginmPeer::CODDIVGEO,$codigo);
		         $p->add(CatreginmPeer::NROCAS,$this->getRequestParameter('nrocas'));
		         $reg= CatreginmPeer::doSelectOne($p);
		         if ($reg)
		         {
		         	  $o= new Criteria();
				      $o->add(CatperinmPeer::CATREGINM_ID,$reg->getId());
				      $o->add(CatperinmPeer::CONOCU,'P');
				      $data2= CatperinmPeer::doSelectOne($o);
				      if ($data2)
				      {
				      	$t= new Criteria();
				      	$t->add(CatregperPeer::ID,$data2->getCatregperId());
				      	$res= CatregperPeer::doSelectOne($t);
				      	if ($res)
				      	{
				      	  $dato2= $res->getPrinom()." ".$res->getSegnom()." ".$res->getPriape()." ".$res->getSegape();
				      	}
				      }

		         	$this->configGrid('',$reg->getId());
		         }else{
		         	$this->configGrid();
		         }
	         }else{
	         	$this->configGrid();
         	    $javascript="alert_('El C&oacute;digo de Ubicaci&oacute;n no existe'); $('catdefaval_coddivgeo').value=''; $('catdefaval_coddivgeo').focus();";
	         }
         }else{
         	$this->configGrid();
         	$javascript="alert_('El C&oacute;digo no es de &uacute;ltimo Nivel'); $('catdefaval_coddivgeo').value=''; $('catdefaval_coddivgeo').focus();";
         }
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos2.'","'.$dato2.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
         $this->params = array();
         $this->catdefaval = $this->getCatdefavalOrCreate();
         $this->labels = $this->getLabels();

         if ($this->getRequestParameter('coddivgeo')!=""){
	         $u= new Criteria();
	         $u->add(CatreginmPeer::CODDIVGEO,$this->getRequestParameter('coddivgeo'));
	         $u->add(CatreginmPeer::NROCAS,$codigo);
	         $data= CatreginmPeer::doSelectOne($u);
	         if ($data){
	              $o= new Criteria();
			      $o->add(CatperinmPeer::CATREGINM_ID,$data->getId());
			      $o->add(CatperinmPeer::CONOCU,'P');
			      $data2= CatperinmPeer::doSelectOne($o);
			      if ($data2)
			      {
			      	$t= new Criteria();
			      	$t->add(CatregperPeer::ID,$data2->getCatregperId());
			      	$res= CatregperPeer::doSelectOne($t);
			      	if ($res)
			      	{
			      	  $dato= $res->getPrinom()." ".$res->getSegnom()." ".$res->getPriape()." ".$res->getSegape();
			      	}
			      }

		       $this->configGrid('',$data->getId());
	         }else{
	         	$this->configGrid();
         	    $javascript="alert_('El Nro Catastral no existe para la Ubicaci&oacute;n dada'); $('catdefaval_nrocas').value=''; $('catdefaval_nrocas').focus();";
	         }
         }else{
            $this->configGrid();
         	$javascript="alert_('Debe introducir la Ubicaci&oacute;n Ge&oacute;grafica'); $('catdefaval_nrocas').value=''; $('catdefaval_nrocas').focus();";
         }

        $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
    $this->catdefaval = $this->getCatdefavalOrCreate();
    $this->updateCatdefavalFromRequest();
  if (!$this->catdefaval->getId()){
    $p= new Criteria();
    $p->add(CatdefavalPeer::CODDIVGEO,$this->getRequestParameter('catdefaval[coddivgeo]'));
    $p->add(CatdefavalPeer::NROCAS,$this->getRequestParameter('catdefaval[nrocas]'));
    $reg= CatdefavalPeer::doSelectOne($p);
    if ($reg){
    	$this->coderr=8885;
    }
  }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
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
  	$arreglopar=array();
  	$arreglopar[0] = Herramientas::getX_vacio('catpar','catnivcat','forcodcat','Z');  //Z -> Cod.Catastral
  	$arreglopar[1] = strlen(substr($arreglopar[0],0,strlen($arreglopar[0])-$this->loncc-1));
  	$arreglopar[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$arreglopar[3] = $this->loncc;
  	$this->params=$arreglopar;
  }

  protected function updateError()
  {
  	$this->setVars();
  	$this->configGrid($this->catdefaval->getId());
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    return true;
  }

  protected function saving($catdefaval)
  {
    if ($catdefaval->getId())
    {
      $catdefaval->save();
      $msj=-1;
    }else{
    $grid = Herramientas :: CargarDatosGridv2($this, $this->obj);
    $msj=Catastro::salvarAvaluos($catdefaval,$grid);
    }
    return $msj;

  }

    protected function deleting($catdefaval)
  {
  	Herramientas::EliminarRegistro('Catdetaval','Catdefaval_id',$catdefaval->getId());
  	$catdefaval->delete();
    return -1;

  }

}

