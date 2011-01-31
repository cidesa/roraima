<?php

/**
 * tesmovsegban actions.
 *
 * @package    Roraima
 * @subpackage tesmovsegban
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovsegbanantActions extends autotesmovsegbanantActions
{
  public function executeIndex()
  {
     return $this->redirect('tesmovsegbanant/edit');
  }
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->tsmovban = $this->getTsmovbanOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateTsmovbanFromRequest();

			$this->saveTsmovban($this->tsmovban);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('tesmovsegbanant/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('tesmovsegbanant/list');
			}
			else
      {
        return $this->redirect('tesmovsegbanant/edit?id='.$this->tsmovban->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


	/**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveTsmovban($tsmovban)
	{
		if ($tsmovban->getId()!="")
		{
			$tsmovban->save();
		}
		else
		{
			$tsmovban->save();
			$debcre=Herramientas::getX('codtip','tstipmov','debcre',$this->tsmovban->getTipmov());
			$this->Actualiza_Bancos('A',$debcre);
		}
	}
	function  Actualiza_Bancos($accion,$debcre)
	{
	  $c= new Criteria();
  	  $c->add(TsdefbanPeer::NUMCUE,$this->tsmovban->getNumcue());
  	  $dato=TsdefbanPeer::doSelectOne($c);
  	  if ($dato)
  	  {
  	   switch($dato->getDebcre())
       {
        case "D":
          if ($accion=='A')
          {
          	$debito=$dato->getDeblib();
          	$total= $debito + $this->tsmovban->getMonmov();
          	$dato->setDeblib($total);
          }
          if ($accion=='E')
          {
            $debito=$dato->getDeblib();
          	$total= $debito - $this->tsmovban->getMonmov();
          	$dato->setDeblib($total);
          }
          break;
       case "C":
         if ($accion=='A')
          {
          	$credito=$dato->getCrelib();
          	$total= $credito + $this->tsmovban->getMonmov();
          	$dato->setCrelib($total);
          }
          if ($accion=='E')
          {
            $credito=$dato->getCrelib();
          	$total= $credito - $this->tsmovban->getMonmov();
          	$dato->setCrelib($total);
          }
         break;
      }
      $dato->save();
  	}
  }

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsmovbanFromRequest()
	{
		$tsmovban = $this->getRequestParameter('tsmovban');

		if (isset($tsmovban['numcue']))
		{
			$this->tsmovban->setNumcue($tsmovban['numcue']);
		}
		if (isset($tsmovban['nombanco']))
		{
			$this->tsmovban->setNombanco($tsmovban['nombanco']);
		}
		if (isset($tsmovban['refban']))
		{
			$this->tsmovban->setRefban($tsmovban['refban']);
		}
		if (isset($tsmovban['tipmov']))
		{
			$this->tsmovban->setTipmov($tsmovban['tipmov']);
		}
		if (isset($tsmovban['nommovim']))
		{
			$this->tsmovban->setNommovim($tsmovban['nommovim']);
		}
		if (isset($tsmovban['fecban']))
		{
			if ($tsmovban['fecban'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($tsmovban['fecban']))
					{
						$value = $dateFormat->format($tsmovban['fecban'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $tsmovban['fecban'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->tsmovban->setFecban($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->tsmovban->setFecban(null);
			}
		}
		if (isset($tsmovban['desban']))
		{
			$this->tsmovban->setDesban($tsmovban['desban']);
		}
		if (isset($tsmovban['monmov']))
		{
			$this->tsmovban->setMonmov($tsmovban['monmov']);
		}
		$this->tsmovban->setStatus('C');
		$this->tsmovban->setStacon('N');
		$this->tsmovban->setCodcta(Herramientas::getX('Numcue','Tsdefban','Codcta',$tsmovban['numcue']));
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
	 	$dato=TsdefbanPeer::getNomcue($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=TstipmovPeer::getDestip($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }

	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
		{
			$this->tags=Herramientas::autocompleteAjax('numcue','tsdefban','numcue',$this->getRequestParameter('tsmovban[numcue]'));
		}
		if ($this->getRequestParameter('ajax')=='2')
		{
			$this->tags=Herramientas::autocompleteAjax('CodTip','TsTipMov','CodTip',$this->getRequestParameter('tsmovban[tipmov]'));
	    }
	}

}
