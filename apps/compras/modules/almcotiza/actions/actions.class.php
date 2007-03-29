<?php

/**
 * almcotiza actions.
 *
 * @package    siga
 * @subpackage almcotiza
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almcotizaActions extends autoalmcotizaActions
{
	public function executeSQL()
	{
		if ($this->cacotiza->getrefcot()!=''){		
				//Funcion que ejecuta sql
				$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
				$sql = "SELECT codart,codart,canord,costo,totdet,fecent  FROM cadetcot where refcot ='".$this->cacotiza->getrefcot()."'";
				$stmt = $con->createStatement();
				$stmt->setLimit(50000);
				$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
				$resultado=array();
				//aqui lleno el array con los resultados:
				while ($rs->next())
				{
					$resultado[]=$rs->getRow();
				}
				//y la envio al template:
				$this->rs=$resultado;
				return $this->rs;
		}
	}

	public function busq_prov()
	{
		$c = new Criteria;
		//$this->campo = $this->cacotiza->getCodpro();
		//$this->campo = str_pad($this->cacotiza->getCodpro(),15,' ');
		//rtrim($this->cacotiza->getCodpro())
		$c->add(CaproveePeer::CODPRO, $this->cacotiza->getCodpro());
		$this->rt = CaproveePeer::doSelect($c);
		if ($this->rt){
			$this->nompro = $this->rt[0]->getNompro();
			$this->rifpro = $this->rt[0]->getRifpro();
		}else{
			$this->nompro = '<!Registro no Encontrado o vacio!>';
			$this->rifpro = '<!Registro no Encontrado o vacio!>';
		}
	}

	public function desconpag()
	{
		$c = new Criteria;
		//$this->campo = $this->cacotiza->getCodpro();
		//$this->campo = str_pad($this->cacotiza->getCodpro(),15,' ');
		//rtrim($this->cacotiza->getCodpro())
		$c->add(CaconpagPeer::CODCONPAG, $this->cacotiza->getConpag());
		$this->rt = CaconpagPeer::doSelect($c);
		if ($this->rt){
			return $this->desconpag = $this->rt[0]->getDesconpag();
		}else{
			return $this->desconpag = '<!Registro no Encontrado o vacio!>';
		}
	}

	public function desforent()
	{
		$c = new Criteria;
		//$this->campo = $this->cacotiza->getCodpro();
		//$this->campo = str_pad($this->cacotiza->getCodpro(),15,' ');
		//rtrim($this->cacotiza->getCodpro())
		$c->add(CaforentPeer::CODFORENT, $this->cacotiza->getConpag());
		$this->rt = CaforentPeer::doSelect($c);
		if ($this->rt){
			return $this->desforent = $this->rt[0]->getDesforent();
		}else{
			return $this->desforent = '<!Registro no Encontrado o vacio!>';
		}
	}

	
	public function nommon()
	{
		$c = new Criteria;
		//$this->campo = $this->cacotiza->getCodpro();
		//$this->campo = str_pad($this->cacotiza->getCodpro(),15,' ');
		//rtrim($this->cacotiza->getCodpro())
		$c->add(TsdesmonPeer::CODMON, $this->cacotiza->gettipmon());
		$this->rt = TsdesmonPeer::doSelect($c);
		if ($this->rt){
			return $this->nommon = $this->rt[0]->getNommon();
		}else{
			return $this->nommon = '<!Registro no Encontrado o vacio!>';
		}
	}	
	
	protected function updateCacotizaFromRequest()
	{
		$cacotiza = $this->getRequestParameter('cacotiza');

		if (isset($cacotiza['refcot']))
		{
			$this->cacotiza->setRefcot($cacotiza['refcot']);
	}
	if (isset($cacotiza['feccot']))
	{
		if ($cacotiza['feccot'])
		{
			try
			{
				$dateFormat = new sfDateFormat($this->getUser()->getCulture());
				if (!is_array($cacotiza['feccot']))
				{
					$value = $dateFormat->format($cacotiza['feccot'], 'i', $dateFormat->getInputPattern('d'));
				}
				else
				{
					$value_array = $cacotiza['feccot'];
					$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
				}
				$this->cacotiza->setFeccot($value);
			}
			catch (sfException $e)
			{
				// not a date
			}
		}
		else
		{
			$this->cacotiza->setFeccot(null);
		}
	}
	if (isset($cacotiza['codpro']))
	{
		$this->cacotiza->setCodpro($cacotiza['codpro']);
    }
    if (isset($cacotiza['descot']))
    {
      $this->cacotiza->setDescot($cacotiza['descot']);
    }
    if (isset($cacotiza['refsol']))
    {
      $this->cacotiza->setRefsol($cacotiza['refsol']);
    }
    if (isset($cacotiza['moncot']))
    {
      $this->cacotiza->setMoncot($cacotiza['moncot']);
    }
    if (isset($cacotiza['conpag']))
    {
      $this->cacotiza->setConpag(str_pad($cacotiza['conpag'],4,'0'));
    }
    if (isset($cacotiza['forent']))
    {
      $this->cacotiza->setForent(str_pad($cacotiza['forent'],4,'0'));
    }
    if (isset($cacotiza['priori']))
    {
      $this->cacotiza->setPriori($cacotiza['priori']);
    }
    if (isset($cacotiza['mondes']))
    {
      $this->cacotiza->setMondes($cacotiza['mondes']);
    }
    if (isset($cacotiza['monrec']))
    {
      $this->cacotiza->setMonrec($cacotiza['monrec']);
    }
    if (isset($cacotiza['tipmon']))
    {
      $this->cacotiza->setTipmon($cacotiza['tipmon']);
    }
    if (isset($cacotiza['valmon']))
    {
      $this->cacotiza->setValmon($cacotiza['valmon']);
    }
    if (isset($cacotiza['refpro']))
    {
      $this->cacotiza->setRefpro($cacotiza['refpro']);
    }
    if (isset($cacotiza['correl']))
    {
      $this->cacotiza->setCorrel($cacotiza['correl']);
    }
  }

	public function executeEdit()
	{
		$this->cacotiza = $this->getCacotizaOrCreate();
		$this->rs = $this->executeSQL();
		$this->desconpag = $this->desconpag();
		$this->nommon = $this->nommon();
		$this->desforent = $this->desforent();
		$this->busq_prov();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCacotizaFromRequest();

			$this->saveCacotiza($this->cacotiza);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('almcotiza/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('almcotiza/list');
			}
			else
			{
				return $this->redirect('almcotiza/edit?id='.$this->cacotiza->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}
}


