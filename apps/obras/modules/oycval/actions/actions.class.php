<?php

/**
 * oycval actions.
 *
 * @package    siga
 * @subpackage oycval
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycvalActions extends autooycvalActions
{
	public function cargarTipo()
		{
		$c = new Criteria();
		$lista_tip = OctipvalPeer::doSelect($c);
		
		$tipos = array();
		
		foreach($lista_tip as $obj_tip)
		{
			$tipos += array($obj_tip->getCodtipval() => $obj_ban->getDestipval());    
		}
		return $tipos;
	    }	
	
	public function executeEdit()
	  {
	    $this->ocregval = $this->getOcregvalOrCreate();
	    $this->tipos = $this->cargarTipo();	
	    $this->configGrid();
	    $this->configGrid2();
	    $this->configGrid3();     
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateOcregvalFromRequest();
	
	      $this->saveOcregval($this->ocregval);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('oycval/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('oycval/list');
	      }
	      else
	      {
	        return $this->redirect('oycval/edit?id='.$this->ocregval->getId());
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
	    $this->ocregval = $this->getOcregvalOrCreate();
	    $this->updateOcregvalFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  
	  
	protected function updateOcregvalFromRequest()
	  {
	    $ocregval = $this->getRequestParameter('ocregval');
	    $this->configGrid();
	    $this->configGrid2();
	    $this->configGrid3();
	
	    if (isset($ocregval['codcon']))
	    {
	      $this->ocregval->setCodcon($ocregval['codcon']);
	    }
	    if (isset($ocregval['codtipval']))
	    {
	      $this->ocregval->setCodtipval($ocregval['codtipval']);
	    }
	    if (isset($ocregval['numval']))
	    {
	      $this->ocregval->setNumval($ocregval['numval']);
	    }
	    if (isset($ocregval['desobr']))
	    {
	      $this->ocregval->setDesobr($ocregval['desobr']);
	    }
	    if (isset($ocregval['nompro']))
	    {
	      $this->ocregval->setNompro($ocregval['nompro']);
	    }
	    if (isset($ocregval['tipcon']))
	    {
	      $this->ocregval->setTipcon($ocregval['tipcon']);
	    }
	    if (isset($ocregval['gasree']))
	    {
	      $this->ocregval->setGasree($ocregval['gasree']);
	    }
	    if (isset($ocregval['moncon']))
	    {
	      $this->ocregval->setMoncon($ocregval['moncon']);
	    }
	    if (isset($ocregval['fecini']))
	    {
	      if ($ocregval['fecini'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($ocregval['fecini']))
	          {
	            $value = $dateFormat->format($ocregval['fecini'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $ocregval['fecini'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->ocregval->setFecini($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->ocregval->setFecini(null);
	      }
	    }
	    if (isset($ocregval['fecfin']))
	    {
	      if ($ocregval['fecfin'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($ocregval['fecfin']))
	          {
	            $value = $dateFormat->format($ocregval['fecfin'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $ocregval['fecfin'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->ocregval->setFecfin($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->ocregval->setFecfin(null);
	      }
	    }
	    if (isset($ocregval['fecreg']))
	    {
	      if ($ocregval['fecreg'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($ocregval['fecreg']))
	          {
	            $value = $dateFormat->format($ocregval['fecreg'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $ocregval['fecreg'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->ocregval->setFecreg($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->ocregval->setFecreg(null);
	      }
	    }
	    if (isset($ocregval['aumobr']))
	    {
	      $this->ocregval->setAumobr($ocregval['aumobr']);
	    }
	    if (isset($ocregval['disobr']))
	    {
	      $this->ocregval->setDisobr($ocregval['disobr']);
	    }
	    if (isset($ocregval['obrext']))
	    {
	      $this->ocregval->setObrext($ocregval['obrext']);
	    }
	    if (isset($ocregval['monful']))
	    {
	      $this->ocregval->setMonful($ocregval['monful']);
	    }
	    if (isset($ocregval['monper']))
	    {
	      $this->ocregval->setMonper($ocregval['monper']);
	    }
	    if (isset($ocregval['monperiva']))
	    {
	      $this->ocregval->setMonperiva($ocregval['monperiva']);
	    }
	    if (isset($ocregval['totded']))
	    {
	      $this->ocregval->setTotded($ocregval['totded']);
	    }
	    if (isset($ocregval['monpag']))
	    {
	      $this->ocregval->setMonpag($ocregval['monpag']);
	    }
	    if (isset($ocregval['monfia']))
	    {
	      $this->ocregval->setMonfia($ocregval['monfia']);
	    }
	    if (isset($ocregval['moniva']))
	    {
	      $this->ocregval->setMoniva($ocregval['moniva']);
	    }
	    if (isset($ocregval['subtot']))
	    {
	      $this->ocregval->setSubtot($ocregval['subtot']);
	    }
	    if (isset($ocregval['gasree']))
	    {
	      $this->ocregval->setGasree($ocregval['gasree']);
	    }
	    if (isset($ocregval['poriva']))
	    {
	      $this->ocregval->setPoriva($ocregval['poriva']);
	    }
	    if (isset($ocregval['porant']))
	    {
	      $this->ocregval->setPorant($ocregval['porant']);
	    }
	    if (isset($ocregval['monval']))
	    {
	      $this->ocregval->setMonval($ocregval['monval']);
	    }
	    if (isset($ocregval['salliq']))
	    {
	      $this->ocregval->setSalliq($ocregval['salliq']);
	    }
	    if (isset($ocregval['retacu']))
	    {
	      $this->ocregval->setRetacu($ocregval['retacu']);
	    }
	    if (isset($ocregval['monant']))
	    {
	      $this->ocregval->setMonant($ocregval['monant']);
	    }
	    if (isset($ocregval['amoant']))
	    {
	      $this->ocregval->setAmoant($ocregval['amoant']);
	    }
	    if (isset($ocregval['staval']))
	    {
	      $this->ocregval->setStaval($ocregval['staval']);
	    }
	    if (isset($ocregval['salant']))
	    {
	      $this->ocregval->setSalant($ocregval['salant']);
	    }
	  }

	protected function getLabels()
	  {
	    return array(
	      'ocregval{codcon}' => 'Contrato No.',
	      'ocregval{codtipval}' => 'Tipo',
	      'ocregval{numval}' => 'Nro',
	      'ocregval{desobr}' => 'Obra',
	      'ocregval{nompro}' => 'Contratista',
	      'ocregval{tipcon}' => 'Tipo de Contrato',
	      'ocregval{gasree}' => 'Gastos Reembolsables',
	      'ocregval{moncon}' => 'Monto Original del Contrato(+)',
	      'ocregval{fecini}' => 'Del',
	      'ocregval{fecfin}' => 'Al',
	      'ocregval{fecreg}' => 'Fecha',
	      'ocregval{aumobr}' => 'Aumentos de Obra',
	      'ocregval{disobr}' => 'Disminución de Obras',
	      'ocregval{obrext}' => 'Obras Extras',
	      'ocregval{monful}' => 'Monto total del Contrato',
	      'ocregval{monper}' => 'Sub Total (1)-(2)-(3)',
	      'ocregval{monperiva}' => 'Monto IVA',
	      'ocregval{totded}' => 'Total Retenciones(Sin Fianza)',
	      'ocregval{monpag}' => 'Saldo Neto a Pagar',
	      'ocregval{monfia}' => 'Fianza(3)',
	      'ocregval{moniva}' => 'IVA',
	      'ocregval{subtot}' => 'SubTotal sin IVA',
	      'ocregval{gasree}' => 'Gastos Reembolsables',
	      'ocregval{poriva}' => 'IVA',
	      'ocregval{porant}' => 'Anticipo',
	      'ocregval{monval}' => 'Monto Total Valuaciones Presentadas',
	      'ocregval{salliq}' => 'Saldo por Liquidar',
	      'ocregval{retacu}' => 'Retenciones Acumuladas',
	      'ocregval{monant}' => 'Monto del Anticipo',
	      'ocregval{amoant}' => 'Amortización del Anticipo',
	      'ocregval{staval}' => 'Estatus',
	      'ocregval{salant}' => 'Saldo Anterior',
	    );
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
			$titulos=array("Código Presupuestario","Descripción","Unidad");
			$ancho="1100";
			$alignf=array('center','left','center');
			$alignt=array('center','left','center');
			$campos=array('','','');
			$catalogos=array('','','');// por todas las columnas, si no tiene, se coloca vacio
			$ajax=array('','',''); //parametro-cajitamostrar-autocompletar
			$tipos=array('t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
			$montos=array("");
			$totales=array("");
			
			$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"');
			$js=array('','','');
			$grabar=array("1","3");
			$filatotal='';
			 
			
			$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
			'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
			'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
			'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
			////////////////////// 
	
		  }else {
		    
		    
		  }
		  
		}	  
		
	public function configGrid2()
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
				$titulos=array("Código","Descripción","%","Monto");
				$ancho="1100";
				$alignf=array('center','left','center','center');
				$alignt=array('center','left','center','center');
				$campos=array('','','','');
				$catalogos=array('','','','');// por todas las columnas, si no tiene, se coloca vacio
				$ajax=array('','','',''); //parametro-cajitamostrar-autocompletar
				$tipos=array('t','t','m','m'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
				$montos=array("");
				$totales=array("");
				
				$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"','type="text" size="5"');
				$js=array('','','','');
				$grabar=array("1","3","4");
				$filatotal='';
				 
				
				$this->obj2=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
				'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
				'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
				'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
				////////////////////// 
		
			  }else {
			    
			    
			  }
			  
			}		
			
	public function configGrid3()
				{
				  if(true){
					//////////////////////
					//GRID
					//$c = new Criteria();
					//$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
					$per = array();//CaartalmPeer::doSelect($c);
					
					$filas=17;
					$cabeza="Inspector(es)";
					$eliminar=true;
					$titulos=array("Código","Nombre","Nro. C.I.V");
					$ancho="1100";
					$alignf=array('center','left','left',);
					$alignt=array('center','left','left');
					$campos=array('','','');
					$catalogos=array('','','');// por todas las columnas, si no tiene, se coloca vacio
					$ajax=array('','','',''); //parametro-cajitamostrar-autocompletar
					$tipos=array('t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
					$montos=array("");
					$totales=array("");
					
					$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="10"');
					$js=array('','','');
					$grabar=array("1","3");
					$filatotal='';
					 
					
					$this->obj3=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
					'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
					'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
					'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
					////////////////////// 
			
				  }else {
				    
				    
				  }
				  
				}			
}
