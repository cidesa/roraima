<?php

/**
 * tesdefrengas actions.
 *
 * @package    Roraima
 * @subpackage tesdefrengas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdefrengasActions extends autotesdefrengasActions
{

  public function executeIndex()
  {
    $c= new Criteria();
    $resul= TsdefrengasPeer::doSelectOne($c);
    if ($resul)
    {
      $this->redirect('tesdefrengas/edit?id='.$resul->getId());
    }
  	else
  	{
  		$this->redirect('tesdefrengas/edit');
  	}
  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
     $this->tsdefrengas = $this->getTsdefrengasOrCreate();
     $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
     $this->loncta=strlen($this->mascara);

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsdefrengasFromRequest();

      $this->saveTsdefrengas($this->tsdefrengas);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdefrengas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdefrengas/list');
      }
      else
      {
        return $this->redirect('tesdefrengas/edit?id='.$this->tsdefrengas->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->tsdefrengas = TsdefrengasPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tsdefrengas);

    try
    {
      $this->deleteTsdefrengas($this->tsdefrengas);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Tsdefrengas. Make sure it does not have any associated items.');
      return $this->forward('tesdefrengas', 'edit');
    }

    return $this->redirect('tesdefrengas/edit');
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsdefrengasFromRequest()
  {
    $tsdefrengas = $this->getRequestParameter('tsdefrengas');
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->loncta=strlen($this->mascara);

    if (isset($tsdefrengas['pagrepcaj']))
    {
      $this->tsdefrengas->setPagrepcaj($tsdefrengas['pagrepcaj']);
    }
    if (isset($tsdefrengas['ctarepcaj']))
    {
      $this->tsdefrengas->setCtarepcaj($tsdefrengas['ctarepcaj']);
    }
    if (isset($tsdefrengas['ctacheant']))
    {
      $this->tsdefrengas->setCtacheant($tsdefrengas['ctacheant']);
    }
    if (isset($tsdefrengas['movreicaj']))
    {
      $this->tsdefrengas->setMovreicaj($tsdefrengas['movreicaj']);
    }
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
	$cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
	if ($this->getRequestParameter('ajax')=='1')
	 {
	   $c = new Criteria();
       $c->add(CpdoccauPeer::REFIER,'N');
       $c->add(CpdoccauPeer::AFEPRC,'N');
       $c->add(CpdoccauPeer::AFECOM,'N');
       $c->add(CpdoccauPeer::AFEDIS,'N');
       $c->add(CpdoccauPeer::TIPCAU,$this->getRequestParameter('codigo'));
       $resul=CpdoccauPeer::doSelect($c);
       if ($resul)
       { $ext='';}else{ $ext='N';}
	   $dato=CpdoccauPeer::getNombre($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["extra","'.$ext.'",""]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='2')
	 {
	   $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
	   $dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
	   if ($dato2=='C')
	   { $carg='';}else{ $carg='N';}
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cargable","'.$carg.'",""]]';
	 }
     else  if ($this->getRequestParameter('ajax')=='4')
	 {
	   $dato=TstipmovPeer::getMovimiento($this->getRequestParameter('codigo'));
	   $dato2=TstipmovPeer::getDebcre($this->getRequestParameter('codigo'));
	   if ($dato2!='D')
	   { $deb='N';}else { $deb='';}
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["nodeb","'.$deb.'",""]]';
	 }
  	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
  }
}

