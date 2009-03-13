<?php

/**
 * tesmovsegban actions.
 *
 * @package    siga
 * @subpackage tesmovsegban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovsegbanantActions extends autotesmovsegbanantActions
{
  public function executeIndex()
  {
     return $this->redirect('tesmovsegbanant/edit');
  }
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
