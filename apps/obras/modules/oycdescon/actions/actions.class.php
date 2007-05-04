<?php

/**
 * oycdescon actions.
 *
 * @package    siga
 * @subpackage oycdescon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdesconActions extends autooycdesconActions
{
 	public function executeEdit()
   {
    $this->ocregcon = $this->getOcregconOrCreate();
  	$this->configGrid();
  	
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcregconFromRequest();

      $this->saveOcregcon($this->ocregcon);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdescon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdescon/list');
      }
      else
      {
        return $this->redirect('oycdescon/edit?id='.$this->ocregcon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
	public function configGrid()
	{
       
       $per = array();
	  
		$filas=5;
		$cabeza="Ingenieros Residentes";
		$eliminar=true;
		$titulos=array("Cédula","Nombre","Nro. C.I.V.");
		$ancho="1100";
		$alignf=array('left','left','left');
		$alignt=array('left','left','left');
		$campos=array('','','');
		$catalogos=array('','','');
		$ajax=array('','',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("","","");
		$totales=array("","","");
		$html=array('','','');
		$js=array('','','');
		$grabar=array("1","2","3");
		$filatotal='';
		 
		
		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
		'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
		////////////////////// 
	  
	}
	  
}
