<?php

/**
 * fordefgen actions.
 *
 * @package    siga
 * @subpackage fordefgen
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefgenActions extends autofordefgenActions
{

  //private $coderr = -1;


  public function executeIndex()
  {
  	$c= new	Criteria();
  	$c->add(FordefegrgenPeer::CODEMP,'001');
  	$data=FordefegrgenPeer::doSelectOne($c);
    if ($data)
    {
    	$id=$data->getId();
    	return $this->redirect('fordefgen/edit?id='.$id);
    }
    else {
    	return $this->redirect('fordefgen/edit');
    	}
  }

  public function executeEdit()
  {
    $this->fordefegrgen = $this->getFordefegrgenOrCreate();
    $this->forpre = Herramientas::ObtenerFormato('Fordefniv','forpre');
	$this->codpariva = Herramientas::ObtenerFormato('Fordefegrgen','codpariva');

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefegrgenFromRequest();

      $this->saveFordefegrgen($this->fordefegrgen);

	    if ($this->coderr!=-1){
	    	$this->labels = $this->getLabels();
	    }else{

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('fordefgen/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('fordefgen/list');
	      }
	      else
	      {
	        return $this->redirect('fordefgen/edit?id='.$this->fordefegrgen->getId());
	      }
	    }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }




  public function saveFordefegrgen22($Fordefegrgen)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {
 		$this->forpre = Herramientas::ObtenerFormato('Fordefniv','forpre');
 		$this->codpariva = Herramientas::ObtenerFormato('Fordefegrgen','codpariva');
      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio
      // $coderr = Formulacion::salvarFordefgen($Fordefegrgen);
       //echo $coderr;
 	   parent::saveFordefegrgen($Fordefegrgen);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);

        }
      }elseif($coderr!=-1){

        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);

      }

    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }


  public function deleteFordefegrgen($Fordefegrgen)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteFordefegrgen($Fordefegrgen);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }

  }

  public function validateEdit()
  {
    $resp=-1;

 		$this->forpre = Herramientas::ObtenerFormato('Fordefniv','forpre');
 		$this->codpariva = Herramientas::ObtenerFormato('Fordefegrgen','codpariva');
 		 $this->fordefegrgen = $this->getFordefegrgenOrCreate();
        $this->updateFordefegrgenFromRequest();
    if($this->getRequest()->getMethod() == sfRequest::POST){

        $desproacc= $this->fordefegrgen->getDesproacc();
        $hasproacc= $this->fordefegrgen->getHasproacc();
        $desaccesp= $this->fordefegrgen->getDesaccesp();
        $hasaccesp= $this->fordefegrgen->getHasaccesp();
        $dessubaccesp= $this->fordefegrgen->getDessubaccesp();
        $hassubaccesp= $this->fordefegrgen->getHassubaccesp();
        $desuae= $this->fordefegrgen->getDesuae();
        $hasuae= $this->fordefegrgen->getHasuae();
		$despar= $this->fordefegrgen->getDespar();
        $haspar= $this->fordefegrgen->getHaspar();

        if ($desproacc > $hasproacc){
        	$resp= 306;
        	//print $resp; exit;

        }
	    if ($desaccesp > $hasaccesp){
        	$resp= 307;

        }
	    if ($dessubaccesp > $hassubaccesp){
        	$resp= 308;

        }
	    if ($desuae > $hasuae){
        	$resp= 309;

        }
	    if ($despar > $haspar){
        	$resp= 311;

        }

		if ($resp != -1) {
			$this->coderr = $resp;
			//print 'error'.$this->coderr; exit;
			return false;
		} else
			return true;

	} else
		return true;
	}


  public function handleErrorEdit()
  {
  	//$this->coderr=-1;
    $this->labels = $this->getLabels();

    //Colocar la Primera letra en minuscula
    $this->fordefegrgen= $this->getFordefegrgenOrCreate();
    $this->updateFordefegrgenFromRequest();
 	$this->forpre = Herramientas::ObtenerFormato('Fordefniv','forpre');
 	$this->codpariva = Herramientas::ObtenerFormato('Fordefegrgen','codpariva');
//print 'error'.$this->coderr; exit;

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
      	//print 'error'.$this->coderr; exit;
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ( $this->coderr== 306){
        $this->getRequest()->setError('fordefegrgen{desproacc}',$err);}
        if ( $this->coderr== 307){
        $this->getRequest()->setError('fordefegrgen{desaccesp}',$err);}
        if ( $this->coderr== 308){
        $this->getRequest()->setError('fordefegrgen{dessubaccesp}',$err);}
        if ( $this->coderr== 309){
        $this->getRequest()->setError('fordefegrgen{desuae}',$err);}
        if ( $this->coderr== 311){
        $this->getRequest()->setError('fordefegrgen{despar}',$err);}




      }
    }
    return sfView::SUCCESS;

  }

    protected function updateFordefegrgenFromRequest()
  {
    $fordefegrgen = $this->getRequestParameter('fordefegrgen');
 	$this->forpre = Herramientas::ObtenerFormato('Fordefniv','forpre');
 	$this->codpariva = Herramientas::ObtenerFormato('Fordefegrgen','codpariva');

 	$this->fordefegrgen->setCodemp('001');

    if (isset($fordefegrgen['nivproacc']))
    {
      //$this->fordefegrgen->setNivproacc($fordefegrgen['nivproacc']);
    }
    if (isset($fordefegrgen['desproacc']))
    {
      $this->fordefegrgen->setDesproacc($fordefegrgen['desproacc']);
    }
    if (isset($fordefegrgen['hasproacc']))
    {
      $this->fordefegrgen->setHasproacc($fordefegrgen['hasproacc']);
    }
    if (isset($fordefegrgen['hasproacc']))
    {
      $this->fordefegrgen->setHasproacc($fordefegrgen['hasproacc']);
    }
    if (isset($fordefegrgen['lonproacc']))
    {
      $this->fordefegrgen->setLonproacc($fordefegrgen['lonproacc']);
    }
    if (isset($fordefegrgen['forproacc']))
    {
      $this->fordefegrgen->setForproacc($fordefegrgen['forproacc']);
    }
    if (isset($fordefegrgen['nivaccesp']))
    {
      //$this->fordefegrgen->setNivaccesp($fordefegrgen['nivaccesp']);
    }
    if (isset($fordefegrgen['desaccesp']))
    {
      $this->fordefegrgen->setDesaccesp($fordefegrgen['desaccesp']);
    }
    if (isset($fordefegrgen['hasaccesp']))
    {
      $this->fordefegrgen->setHasaccesp($fordefegrgen['hasaccesp']);
    }
    if (isset($fordefegrgen['lonaccesp']))
    {
      $this->fordefegrgen->setLonaccesp($fordefegrgen['lonaccesp']);
    }
    if (isset($fordefegrgen['foraccesp']))
    {
      $this->fordefegrgen->setForaccesp($fordefegrgen['foraccesp']);
    }
    if (isset($fordefegrgen['nivsubaccesp']))
    {
      //$this->fordefegrgen->setNivsubaccesp($fordefegrgen['nivsubaccesp']);
    }
    if (isset($fordefegrgen['dessubaccesp']))
    {
      $this->fordefegrgen->setDessubaccesp($fordefegrgen['dessubaccesp']);
    }
    if (isset($fordefegrgen['hassubaccesp']))
    {
      $this->fordefegrgen->setHassubaccesp($fordefegrgen['hassubaccesp']);
    }
    if (isset($fordefegrgen['lonsubaccesp']))
    {
      $this->fordefegrgen->setLonsubaccesp($fordefegrgen['lonsubaccesp']);
    }
    if (isset($fordefegrgen['forsubaccesp']))
    {
      $this->fordefegrgen->setForsubaccesp($fordefegrgen['forsubaccesp']);
    }
    if (isset($fordefegrgen['nivuae']))
    {
      //$this->fordefegrgen->setNivuae($fordefegrgen['nivuae']);
    }
    if (isset($fordefegrgen['desuae']))
    {
      $this->fordefegrgen->setDesuae($fordefegrgen['desuae']);
    }
    if (isset($fordefegrgen['hasuae']))
    {
      $this->fordefegrgen->setHasuae($fordefegrgen['hasuae']);
    }
    if (isset($fordefegrgen['lonuae']))
    {
      $this->fordefegrgen->setLonuae($fordefegrgen['lonuae']);
    }
    if (isset($fordefegrgen['foruae']))
    {
      $this->fordefegrgen->setForuae($fordefegrgen['foruae']);
    }
/*  no se guarda por que es de consulta estos campos
    if (isset($fordefegrgen['corest']))
    {
      $this->fordefegrgen->setCorest($fordefegrgen['corest']);
    }
    if (isset($fordefegrgen['corsec']))
    {
      $this->fordefegrgen->setCorsec($fordefegrgen['corsec']);
    }
    if (isset($fordefegrgen['corequ']))
    {
      $this->fordefegrgen->setCorequ($fordefegrgen['corequ']);
    }
*/
    if (isset($fordefegrgen['despar']))
    {
      $this->fordefegrgen->setDespar($fordefegrgen['despar']);
    }
    if (isset($fordefegrgen['haspar']))
    {
      $this->fordefegrgen->setHaspar($fordefegrgen['haspar']);
    }
    if (isset($fordefegrgen['lonpar']))
    {
      $this->fordefegrgen->setLonpar($fordefegrgen['lonpar']);
    }
    if (isset($fordefegrgen['forpar']))
    {
      $this->fordefegrgen->setForpar($fordefegrgen['forpar']);
    }
  // IVA
    $this->fordefegrgen->setCodpariva($fordefegrgen['codpariva']);
    $this->fordefegrgen->setManivafor($this->getRequestParameter('radio'));
    $this->fordefegrgen->setPorivafor($this->getRequestParameter('moniva'));

  }


  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato = Herramientas::getX('CODPAR','Nppartidas','nompar',trim($this->getRequestParameter('codigo')));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }else
    if ($this->getRequestParameter('ajax')=='2')
      {
        $dato = Herramientas::getX('CodParEgr','Fordefparegr','NomParEgr',trim($this->getRequestParameter('codigo')));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }

      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }


	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax') == '1') {
			$this->tags = Herramientas :: autocompleteAjax('CodParEgr', 'Fordefparegr', 'CodParEgr', trim($this->getRequestParameter('fordefegrgen[codpariva]')));
		}
	}

}
