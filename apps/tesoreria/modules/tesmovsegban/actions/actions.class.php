<?php

/**
 * tesmovsegban actions.
 *
 * @package    siga
 * @subpackage tesmovsegban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovsegbanActions extends autotesmovsegbanActions
{
  public  $coderror1=-1;

	public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->tsmovban = $this->getTsmovbanOrCreate();
      try{ $this->updateTsmovbanFromRequest();}catch(Exception $ex){}
      if ($this->tsmovban->getId()=="")
      {
      	if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('tsmovban[fecban]'),$this->getRequestParameter('tsmovban[numcue]'))==false)
      	{
          $this->coderror1=535;
          return false;
      	}
      }
      return true;
    }else return true;
  }


	public function executeEdit()
	{
		$this->tsmovban = $this->getTsmovbanOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateTsmovbanFromRequest();

			$this->saveTsmovban($this->tsmovban);

			if (Herramientas::getX_vacio('numcue','Tsmovban','status',$this->tsmovban->getNumcue())=='A')
			{
				$this->setFlash('notice', 'Tus modificaciones han sido guardadas y el movimiento esta Anulado');
			}
			else
			{
				$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
			}

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('tesmovsegban/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('tesmovsegban/list');
			}
			else
      {
        return $this->redirect('tesmovsegban/edit?id='.$this->tsmovban->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


	protected function saveTsmovban($tsmovban,$id = 'id')
	{
		if (!$this->getRequestParameter($id))
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
		$debito=Herramientas::getX('numcue','Tsdefban','Debban',$this->tsmovban->getNumcue());
		$credito=Herramientas::getX('numcue','Tsdefban','Creban',$this->tsmovban->getNumcue());
		$montostrdeb=0;
		$montostrcre=0;
		if ($debcre=='D')
		{
			if ($accion == "A")
			{
				$montostrdeb = $debito + $this->tsmovban->getMonmov();
			}
			elseif ($accion == "E")
			{
				$montostrdeb = $debito - $this->tsmovban->getMonmov();
			}
		}
		elseif ($debcre=='C')
		{
			if ($accion == "A")
			{
				$montostrcre = $credito + $this->tsmovban->getMonmov();
			}
			elseif ($accion == "E")
			{
				$montostrcre = $credito - $this->tsmovban->getMonmov();
			}
		}
		$c = new Criteria();
		$c->add(TsdefbanPeer::NUMCUE, $this->tsmovban->getNumcue());
		$obj = TsdefbanPeer::doSelectone($c);
		if ($obj)
		{
			$obj->setDebban($montostrdeb);
			$obj->setCreban($montostrcre);
			$obj->save();
		}
	}

	public function executeAnular()
	{
		$obj1=$this->getRequestParameter('obj1');
		$c = new Criteria();
		$c->add(TsmovbanPeer::NUMCUE,$obj1);
		$this->tsmovban = TsmovbanPeer::doSelectOne($c);
		sfView::SUCCESS;

	}

	public function executeSalvaranu()
	{
		$c = new Criteria();
		$c->add(TsmovbanPeer::NUMCUE,$this->getRequestParameter('numcue'));
		$tsmovban = TsmovbanPeer::doSelectOne($c);
		if ($tsmovban)
		{
			if ($tsmovban->getStatus()=='C')
			{
				$tsmovban->setStatus('A');
				$tsmovban->save();
			}
		}
		sfView::SUCCESS;
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
		if (isset($tsmovban['codcta']))
        {
           $this->tsmovban->setCodcta($tsmovban['codcta']);
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

	public function handleErrorEdit()
  {
    $this->preExecute();
    $this->tsmovban = $this->getTsmovbanOrCreate();
    try{ $this->updateTsmovbanFromRequest();}catch(Exception $ex){}


    $this->labels = $this->getLabels();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('tsmovban{fecban}',$err);
      }
    }

    return sfView::SUCCESS;
  }

}
