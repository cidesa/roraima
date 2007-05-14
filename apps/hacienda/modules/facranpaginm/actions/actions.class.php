<?php

/**
 * facranpaginm actions.
 *
 * @package    siga
 * @subpackage facranpaginm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facranpaginmActions extends autofacranpaginmActions
{
  public function executeIndex()
  {
    return $this->forward('facranpaginm', 'edit');
  }	
	public function executeSave()
	{
		return $this->forward('facranpaginm', 'edit');
	}

	public function executeEdit()
	{
		$this->fcdefpgi = $this->getFcdefpgiOrCreate();
        $this->configGrid();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateFcdefpgiFromRequest();

			$this->saveFcdefpgi($this->fcdefpgi);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('facranpaginm/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('facranpaginm/list');
      }
      else
      {
        return $this->redirect('facranpaginm/edit?id='.$this->fcdefpgi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
	}
	public function configGrid()
	{

		/*$c = new Criteria();
		 $c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
		 $per = CaartalmPeer::doSelect($c);*/
		$per = array();
			
		$filas=17;
		$cabeza="Distribución del Pago de la Tasa (en Unidades Tributarias)";
		$eliminar=true;
		$titulos=array("Desde","Hasta","Monto a Pagar (U.T.)","Nro. de Porciones");
		$ancho="900";
		$alignf=array('center','center','center','center');
		$alignt=array('center','center','center','center');
		$campos=array('Codcon','Codtipact','Numofi','Fecact');
		$catalogos=array('','','','');// por todas las columnas, si no tiene, se coloca vacio
		$ajax=array('2-x2-x1','','3-x4-x3',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("5","6","7","8");
		$totales=array("", "", "ocregact_exitot", "");
		$mascaraubicacion=$this->mascaraubicacion;
		$html=array('type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
		$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
		$grabar=array("1","3","5","6","7","8");
		$filatotal='';


		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos,
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos,
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales,
			'html'=>$html, 'js'=>$js, 'datos'=> $per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
			//////////////////////
		
	}
  protected function updateFcdefpgiFromRequest()
  {
    $fcdefpgi = $this->getRequestParameter('fcdefpgi');
    $this->configGrid();    

    if (isset($fcdefpgi['mondes']))
    {
      $this->fcdefpgi->setMondes($fcdefpgi['mondes']);
    }
  }	
	
}
