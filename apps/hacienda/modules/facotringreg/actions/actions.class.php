<?php

/**
 * facotringreg actions.
 *
 * @package    siga
 * @subpackage facotringreg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facotringregActions extends autofacotringregActions
{
	public function CargarFuentes()
	  {
	    $c = new Criteria();
	    $c->add(FcfueprePeer::SIMPRE,'S');
		$lista_fue = FcfueprePeer::doSelect($c);
		
		$fuentes = array();
		
		foreach($lista_fue as $obj_fue)
		{
			$fuentes += array($obj_fue->getCodfue() => $obj_fue->getNomfue());    
		}
		return $fuentes;
	    }	
	
	public function executeEdit()
	  {
	    $this->fcotring = $this->getFcotringOrCreate();
	    $this->fuentes = $this->CargarFuentes();
	    $this->configGrid();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFcotringFromRequest();
	
	      $this->saveFcotring($this->fcotring);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('facotringreg/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('facotringreg/list');
	      }
	      else
	      {
	        return $this->redirect('facotringreg/edit?id='.$this->fcotring->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }	
	  
	public function handleErrorEdit()
	  {
	    $this->preExecute();
	    $this->fcotring = $this->getFcotringOrCreate();
	    $this->updateFcotringFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  
	  
	protected function updateFcotringFromRequest()
	  {
	    $fcotring = $this->getRequestParameter('fcotring');
	    $this->fuentes = $this->CargarFuentes();
	    $this->configGrid();
	
	    if (isset($fcotring['nrocon']))
	    {
	      $this->fcotring->setNrocon($fcotring['nrocon']);
	    }
	    if (isset($fcotring['codfue']))
	    {
	      $this->fcotring->setCodfue($fcotring['codfue']);
	    }
	    if (isset($fcotring['fecreg']))
	    {
	      if ($fcotring['fecreg'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($fcotring['fecreg']))
	          {
	            $value = $dateFormat->format($fcotring['fecreg'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $fcotring['fecreg'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->fcotring->setFecreg($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->fcotring->setFecreg(null);
	      }
	    }
	    if (isset($fcotring['rifcon']))
	    {
	      $this->fcotring->setRifcon($fcotring['rifcon']);
	    }
	    if (isset($fcotring['nomcon']))
	    {
	      $this->fcotring->setNomcon($fcotring['nomcon']);
	    }
	    if (isset($fcotring['dircon']))
	    {
	      $this->fcotring->setDircon($fcotring['dircon']);
	    }
	    if (isset($fcotring['naccon']))
	    {
	      $this->fcotring->setNaccon($fcotring['naccon']);
	    }
	    if (isset($fcotring['tipcon']))
	    {
	      $this->fcotring->setTipcon($fcotring['tipcon']);
	    }
	    if (isset($fcotring['rifrep']))
	    {
	      $this->fcotring->setRifrep($fcotring['rifrep']);
	    }
	    if (isset($fcotring['nomconr']))
	    {
	      $this->fcotring->setNomconr($fcotring['nomconr']);
	    }
	    if (isset($fcotring['dirconr']))
	    {
	      $this->fcotring->setDirconr($fcotring['dirconr']);
	    }
	    if (isset($fcotring['nacconr']))
	    {
	      $this->fcotring->setNacconr($fcotring['nacconr']);
	    }
	    if (isset($fcotring['tipconr']))
	    {
	      $this->fcotring->setTipcon($fcotring['tipconr']);
	    }
	    if (isset($fcotring['desing']))
	    {
	      $this->fcotring->setDesing($fcotring['desing']);
	    }
	    if (isset($fcotring['monimp']))
	    {
	      $this->fcotring->setMonimp($fcotring['monimp']);
	    }
	    if (isset($fcotring['funrec']))
	    {
	      $this->fcotring->setFunrec($fcotring['funrec']);
	    }
	    if (isset($fcotring['fecrec']))
	    {
	      if ($fcotring['fecrec'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($fcotring['fecrec']))
	          {
	            $value = $dateFormat->format($fcotring['fecrec'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $fcotring['fecrec'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->fcotring->setFecrec($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->fcotring->setFecrec(null);
	      }
	    }
	    
	      $this->fcotring->setStaapu('A');
	    
	      $this->fcotring->setStadec('N');
	    
	    if (isset($fcotring['monsal']))
	    {
	      $this->fcotring->setMonsal($fcotring['monsal']);
	    }
	  }	  
	  
	public function configGrid()
			{
			  if(true){
				//////////////////////
				//GRID
				//$c = new Criteria();
				//$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
				$per = array();//CaartalmPeer::doSelect($c);
				
				$filas=17;
				$cabeza="";
				$eliminar=true;
				$titulos=array("Nro","Vencimiento","Descripción de Cuota","Tipo","Monto de la Cuota","Estado de la Deuda");
				$ancho="1100";
				$alignf=array('center','center','left','center','right','center');
				$alignt=array('center','center','left','center','right','center');
				$campos=array('','','','','','');
				$catalogos=array('','','','','','');// por todas las columnas, si no tiene, se coloca vacio
				$ajax=array('','','','','',''); //parametro-cajitamostrar-autocompletar
				$tipos=array('t','t','t','m','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
				$montos=array("");
				$totales=array("");
				
				$html=array('type="text" size="5" disabled="true"','type="text" size="15"','type="text" size="25"','type="text" size="10"','type="text" size="10"','type="text" size="5"');
				$js=array('','','','','','');
				$grabar=array("2","3","4","5","6","7");
				$filatotal='';
				 
				
				$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
				'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
				'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
				'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
				////////////////////// 
		
			  }else {
			    
			    
			  }
			  
			}	  
	  
	protected function getLabels()
	  {
	    return array(
	      'fcotring{nrocon}' => 'Número de Control',
	      'fcotring{codfue}' => 'Fuente',
	      'fcotring{fecreg}' => 'Fecha del Registro',
	      'fcotring{rifcon}' => 'C.I. / RIF',
	      'fcotring{nomcon}' => 'Nombre',
	      'fcotring{dircon}' => 'Dirección',
	      'fcotring{naccon}' => 'Nacionalidad',
	      'fcotring{tipcon}' => 'Tipo',
	      'fcotring{rifrep}' => 'C.I. / RIF',
	      'fcotring{nomconr}' => 'Nombre',
	      'fcotring{dirconr}' => 'Dirección',
	      'fcotring{nacconr}' => 'Nacionalidad',
	      'fcotring{tipconr}' => 'Tipo',
	      'fcotring{desing}' => 'Descripción',
	      'fcotring{monimp}' => 'Monto del Impuesto a Pagar',
	      'fcotring{funrec}' => 'Funcionario Receptor',
	      'fcotring{fecrec}' => 'Fecha',
	      'fcotring{staapu}' => 'Estatusapu',
	      'fcotring{stadec}' => 'Estatusdec',
	      'fcotring{monsal}' => 'Monto',
	    );
	  }	  
}
