<?php

/**
 * facpiclic actions.
 *
 * @package    siga
 * @subpackage facpiclic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facpiclicActions extends autofacpiclicActions
{
	public function configGrid()
	{

		/*$c = new Criteria();
		 $c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
		 $per = CaartalmPeer::doSelect($c);*/
		$per = array();
			
		$filas=17;
		$cabeza="Actividades Comerciales";
		$eliminar=true;
		$titulos=array("Código","Descripción","Ingresos Brutos","Exonerable","Exonerada","Exoneración");
		$ancho="900";
		$alignf=array('center','center','center','center','center','center');
		$alignt=array('center','center','center','center','center','center');
		$campos=array('Codcon','Codtipact','Numofi','Fecact','Numofi','Fecact');
		$catalogos=array('','','','','','');// por todas las columnas, si no tiene, se coloca vacio
		$ajax=array('2-x2-x1','','3-x4-x3','','3-x4-x3',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','t','t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("5","6","7","8","7","8");
		$totales=array("", "", "ocregact_exitot", "", "ocregact_exitot", "");
		$mascaraubicacion=$this->mascaraubicacion;
		$html=array('type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true');
		$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
		$grabar=array("1","3","5","6","7","8");
		$filatotal='';


		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos,
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos,
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales,
		'html'=>$html, 'js'=>$js, 'datos'=> $per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
		//////////////////////

	}
	public function executeEdit()
	{
		$this->fcsollic = $this->getFcsollicOrCreate();
        $this->configGrid();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateFcsollicFromRequest();

			$this->saveFcsollic($this->fcsollic);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('Facpiclic/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('Facpiclic/list');
			}
			else
      {
        return $this->redirect('Facpiclic/edit?id='.$this->fcsollic->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }	
}
