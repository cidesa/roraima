<?php

/**
 * facpicsollic actions.
 *
 * @package    siga
 * @subpackage facpicsollic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facpicsollicActions extends autofacpicsollicActions
{
	public function executeEdit()
	{
		$this->fcsollic = $this->getFcsollicOrCreate();
		$this->nomcon ='';
		$this->nomcatrasto ='';
		$this->nomruta ='';
        $this->configGrid();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateFcsollicFromRequest();

			$this->saveFcsollic($this->fcsollic);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('facpicsollic/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('facpicsollic/list');
			}
			else
			{
				return $this->redirect('facpicsollic/edit?id='.$this->fcsollic->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}
	protected function updateFcsollicFromRequest()
	{
		$fcsollic = $this->getRequestParameter('fcsollic');

		if (isset($fcsollic['numsol']))
		{
			$this->fcsollic->setNumsol($fcsollic['numsol']);
		}
		if (isset($fcsollic['fecsol']))
		{
			if ($fcsollic['fecsol'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($fcsollic['fecsol']))
					{
						$value = $dateFormat->format($fcsollic['fecsol'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $fcsollic['fecsol'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->fcsollic->setFecsol($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->fcsollic->setFecsol(null);
			}
		}
		if (isset($fcsollic['rifcon']))
		{
			$this->fcsollic->setRifcon($fcsollic['rifcon']);
		}
		if (isset($fcsollic['nomcon']))
		{
			$this->fcsollic->setNomcon($fcsollic['nomcon']);
		}
		if (isset($fcsollic['dircon']))
		{
			$this->fcsollic->setDircon($fcsollic['dircon']);
		}
		/*if (isset($fcsollic['nacconrep']))
		{
			$this->fcsollic->setNacconrep($fcsollic['nacconrep']);
		}*/
		if (isset($fcsollic['rifrep']))
		{
			$this->fcsollic->setRifrep($fcsollic['rifrep']);
		}
		/*if (isset($fcsollic['nomconrep']))
		{
			$this->fcsollic->setNomconrep($fcsollic['nomconrep']);
		}
		if (isset($fcsollic['dirconrep']))
		{
			$this->fcsollic->setDirconrep($fcsollic['dirconrep']);
		}*/
		if (isset($fcsollic['nomneg']))
		{
			$this->fcsollic->setNomneg($fcsollic['nomneg']);
		}
		if (isset($fcsollic['dirpri']))
		{
			$this->fcsollic->setDirpri($fcsollic['dirpri']);
		}
		if (isset($fcsollic['tipinm']))
		{
			$this->fcsollic->setTipinm($fcsollic['tipinm']);
		}
		if (isset($fcsollic['catcon']))
		{
			$this->fcsollic->setCatcon($fcsollic['catcon']);
		}
		if (isset($fcsollic['nomcatrasto']))
		{
			$this->fcsollic->setNomcatrasto($fcsollic['nomcatrasto']);
		}
		if (isset($fcsollic['tipest']))
		{
			$this->fcsollic->setTipest($fcsollic['tipest']);
		}
		if (isset($fcsollic['codrut']))
		{
			$this->fcsollic->setCodrut($fcsollic['codrut']);
		}
		if (isset($fcsollic['nomruta']))
		{
			$this->fcsollic->setNomruta($fcsollic['nomruta']);
		}
		if (isset($fcsollic['disbar']))
		{
			$this->fcsollic->setDisbar($fcsollic['disbar']);
		}
		if (isset($fcsollic['disins']))
		{
			$this->fcsollic->setDisins($fcsollic['disins']);
		}
		if (isset($fcsollic['discli']))
		{
			$this->fcsollic->setDiscli($fcsollic['discli']);
		}
		if (isset($fcsollic['disfun']))
		{
			$this->fcsollic->setDisfun($fcsollic['disfun']);
		}
		if (isset($fcsollic['disdis']))
		{
			$this->fcsollic->setDisdis($fcsollic['disdis']);
		}
		if (isset($fcsollic['disest']))
		{
			$this->fcsollic->setDisest($fcsollic['disest']);
		}
		if (isset($fcsollic['horini']))
		{
			if ($fcsollic['horini'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($fcsollic['horini']))
					{
						$value = $dateFormat->format($fcsollic['horini'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $fcsollic['horini'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->fcsollic->setHorini($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->fcsollic->setHorini(null);
			}
		}
		if (isset($fcsollic['horcie']))
		{
			if ($fcsollic['horcie'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($fcsollic['horcie']))
					{
						$value = $dateFormat->format($fcsollic['horcie'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $fcsollic['horcie'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->fcsollic->setHorcie($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->fcsollic->setHorcie(null);
			}
		}
		if (isset($fcsollic['fecini']))
		{
			if ($fcsollic['fecini'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($fcsollic['fecini']))
					{
						$value = $dateFormat->format($fcsollic['fecini'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $fcsollic['fecini'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->fcsollic->setFecini($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->fcsollic->setFecini(null);
			}
		}
		if (isset($fcsollic['fecfin']))
		{
			if ($fcsollic['fecfin'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($fcsollic['fecfin']))
					{
						$value = $dateFormat->format($fcsollic['fecfin'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $fcsollic['fecfin'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->fcsollic->setFecfin($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->fcsollic->setFecfin(null);
			}
		}
		if (isset($fcsollic['capsoc']))
		{
			$this->fcsollic->setCapsoc($fcsollic['capsoc']);
		}
		if (isset($fcsollic['funres']))
		{
			$this->fcsollic->setFunres($fcsollic['funres']);
		}
		if (isset($fcsollic['fecres']))
		{
			if ($fcsollic['fecres'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($fcsollic['fecres']))
					{
						$value = $dateFormat->format($fcsollic['fecres'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $fcsollic['fecres'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->fcsollic->setFecres($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->fcsollic->setFecres(null);
			}
		}
	}
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
  
}
