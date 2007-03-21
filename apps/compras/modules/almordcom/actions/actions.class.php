<?php

/**
 * almordcom actions.
 *
 * @package    siga
 * @subpackage almordcom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almordcomActions extends autoalmordcomActions
{
  public function getDes_pro()
  {
  	// nombre proveedor
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getCodpro();
  	  $c->add(CaproveePeer::CODPRO, $this->campo);
  	  $this->nompro = CaproveePeer::doSelect($c);
	  if ($this->nompro)
	  	return $this->nompro[0]->getNompro();
	  else 
	    return '<!Registro no Encontrado o vacio!> ';
  }	
  public function getDes_mon()
  {
  	// nombre moneda
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getTipmon();
  	  $c->add(TsdesmonPeer::CODMON, $this->campo);
  	  $this->nommon = TsdesmonPeer::doSelect($c);
	  if ($this->nommon)
	  {
	  	return $this->nommon[0]->getNommon();
	  }	  
	  else
	  { 
	    return '<!Registro no Encontrado o vacio!> ';
	  }
  }	  
    
  public function getDes_comp()
  {
  	// nombre compromiso
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getDoccom();
  	  $c->add(CpdoccomPeer::TIPCOM, $this->campo);
  	  $this->nomcomp = CpdoccomPeer::doSelect($c);
	  if ($this->nomcomp) 
	  {
	  		$this->nom_comp = $this->nomcomp[0]->getNomext();
	  	    $this->nomrefprc = $this->nomcomp[0]->getRifpro();	  	
	  }	  
	  else
	  { 
	  	return '<!Registro no Encontrado o vacio!>';	  	
	  }
  }	 
  
  public function getCon_pago()
  {
  	//consulta a 3 tablas para saber tipo de pago
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getOrdcom();  	  
  	  $c->add(CaordcomPeer::ORDCOM, $this->campo);	  
  	  $c->addJoin(CaordconpagPeer::ORDCOM,CaordcomPeer::ORDCOM);
  	  $c->addJoin(CaconpagPeer::CODCONPAG,CaordconpagPeer::CODCONPAG);
  	  $this->rt = CaconpagPeer::doSelect($c);
  	  if ($this->rt)
	  	{
	  		$this->codigo = $this->rt[0]->getCodconpag();
	  	    $this->descripcion = $this->rt[0]->getDesconpag();
	  	}
	  	else
	  	{
	  		$this->codigo = '<!Registro no Encontrado o vacio!>';
	  	    $this->descripcion = '<!Registro no Encontrado o vacio!>';
	  	}
  }	
  public function executeSQL()    
    {
    	//Funcion que ejecuta sql lista
        $con =
        sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "Select a.Codart, b.Desart, b.Unimed From Caartord a, Caregart b where a.Codart=b.Codart and a.Ordcom ='".$this->caordcom->getOrdcom()."'";
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
    
  public function getDes_proyecto()
  {
  	// nombre proyecto
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getTippro();
  	  $c->add(CatipproPeer::CODPRO, $this->campo);
  	  $this->nomproy = CatipproPeer::doSelect($c);
	  if ($this->nomproy) 
	  {
	  	return $this->nomproy[0]->getDespro();	  	
	  }	  
	  else
	  { 
	  	return '<!Registro no Encontrado o vacio!>';	  	
	  }
  }
  	     
  public function getForm_entrega()
  {
  	//consulta a 3 tablas para saber la foma de entrega
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getOrdcom();  	  
  	  $c->add(CaordcomPeer::ORDCOM, $this->campo);	  
  	  $c->addJoin(CaordforentPeer::ORDCOM,CaordcomPeer::ORDCOM);
  	  $c->addJoin(CacotizaPeer::FORENT,CaordforentPeer::CODFORENT);
  	  $this->rt_en = CacotizaPeer::doSelect($c);
  	  if ($this->rt_en)
	  	{
	  		$this->id_entrega = $this->rt_en[0]->getRefcot();
	  		$this->descripcion_entrega = $this->rt_en[0]->getDescot();	  		
	  	}
	  	else
	  	{
	  	    $this->id_entrega = '<!Registro no Encontrado o vacio!>';
	  	    $this->descripcion_entrega = '<!Registro no Encontrado o vacio!>';	  	    
	  	}
	  	 
  }	  
  
  public function getForm_financiamiento()
  {
  	//consulta a 3 tablas para saber la foma de financiamiento
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getTipfin();  	  
  	  $c->add(CaordcomPeer::TIPFIN, $this->campo);	  
  	  $c->addJoin(FortipfinPeer::CODFIN,CaordcomPeer::TIPFIN);
   	  $this->rt_fin = FortipfinPeer::doSelect($c);
  	  if ($this->rt_fin)
	  	{
	  		$this->descripcion_financiamiento = $this->rt_fin[0]->getNomext();	  		
	  	}
	  	else
	  	{
	  	    $this->descripcion_financiamiento = '<!Registro no Encontrado o vacio!>';	  	    
	  	}
	  	 
  }	    
  
  public function executeSQL_resumen()    
    {
    	//Funcion que ejecuta sql lista
        $con =
        sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "select codart,desres,codartpro,canord,canaju,canrec,cantot,costo,rgoart,totart from CAResOrdCom where ordcom ='".$this->caordcom->getOrdcom()."'";// where a.Codart=b.Codart and a.Ordcom ='".$this->caordcom->getOrdcom()."'";
        $stmt = $con->createStatement();
        $stmt->setLimit(50000);
        $rs2 = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($rs2->next())
             {
                $resultado[]=$rs2->getRow();
             }
        //y la envio al template:
        $this->rs2=$resultado;
        return $this->rs2;
    } 
  
  public function executeEdit()
  {
    $this->caordcom = $this->getCaordcomOrCreate();
    $this->nom_pro = $this->getDes_pro();    
    $this->nom_mon = $this->getDes_mon();
    $this->getDes_comp();
    $this->getCon_pago();      
    $this->rs = $this->executeSQL();
    $this->rs2= $this->executeSQL_resumen();    
    $this->nom_proyecto = $this->getDes_proyecto();
    $this->getForm_entrega();
    $this->getForm_financiamiento();    
    
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaordcomFromRequest();

      $this->saveCaordcom($this->caordcom);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almordcom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almordcom/list');
      }
      else
      {
        return $this->redirect('almordcom/edit?ordcom='.$this->caordcom->getOrdcom());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }  
  protected function updateCaordcomFromRequest()
  {
    $caordcom = $this->getRequestParameter('caordcom');

    if (isset($caordcom['fecord']))
    {
      if ($caordcom['fecord'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caordcom['fecord']))
          {
            $value = $dateFormat->format($caordcom['fecord'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caordcom['fecord'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caordcom->setFecord($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caordcom->setFecord(null);
      }
    }
    if (isset($caordcom['codpro']))
    {
      $this->caordcom->setCodpro($caordcom['codpro']);
    }
    if (isset($caordcom['desord']))
    {
      $this->caordcom->setDesord($caordcom['desord']);
    }
    if (isset($caordcom['crecon']))
    {
      $this->caordcom->setCrecon($caordcom['crecon']);
    }
    if (isset($caordcom['plaent']))
    {
      $this->caordcom->setPlaent($caordcom['plaent']);
    }
    /*
    if (isset($caordcom['tiecan']))
    {
      $this->caordcom->setTiecan($caordcom['tiecan']);
    }*/
    if (isset($caordcom['monord']))
    {
      $this->caordcom->setMonord($caordcom['monord']);
    }
    /*if (isset($caordcom['dtoord']))
    {
      $this->caordcom->setDtoord($caordcom['dtoord']);
    }*/
    if (isset($caordcom['refcom']))
    {
      $this->caordcom->setRefcom($caordcom['refcom']);
    }
    /*if (isset($caordcom['staord']))
    {
      $this->caordcom->setStaord($caordcom['staord']);
    }*/
    /*if (isset($caordcom['afepre']))
    {
      $this->caordcom->setAfepre($caordcom['afepre']);
    }*/
    /*if (isset($caordcom['conpag']))
    {
      $this->caordcom->setConpag($caordcom['conpag']);
    }*/
    /*if (isset($caordcom['forent']))
    {
      $this->caordcom->setForent($caordcom['forent']);
    }
    if (isset($caordcom['fecanu']))
    {
      if ($caordcom['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caordcom['fecanu']))
          {
            $value = $dateFormat->format($caordcom['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caordcom['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caordcom->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caordcom->setFecanu(null);
      }
    }*/
    if (isset($caordcom['tipmon']))
    {
      $this->caordcom->setTipmon($caordcom['tipmon']);
    }
    /*if (isset($caordcom['valmon']))
    {
      $this->caordcom->setValmon($caordcom['valmon']);
    }*/
    /*if (isset($caordcom['tipcom']))
    {
      $this->caordcom->setTipcom($caordcom['tipcom']);
    }*/
    if (isset($caordcom['tipord']))
    {
      $this->caordcom->setTipord($caordcom['tipord']);
    }
    if (isset($caordcom['tipo']))
    {
      $this->caordcom->setTipo($caordcom['tipo']);
    }
    /*if (isset($caordcom['coduni']))
    {
      $this->caordcom->setCoduni($caordcom['coduni']);
    }*/
    /*if (isset($caordcom['codemp']))
    {
      $this->caordcom->setCodemp($caordcom['codemp']);
    }*/
    /*if (isset($caordcom['notord']))
    {
      $this->caordcom->setNotord($caordcom['notord']);
    }*/
    /*if (isset($caordcom['tipdoc']))
    {
      $this->caordcom->setTipdoc($caordcom['tipdoc']);
    }*/
    if (isset($caordcom['tippro']))
    {
      $this->caordcom->setTippro($caordcom['tippro']);
    }
    /*if (isset($caordcom['afepro']))
    {
      $this->caordcom->setAfepro($caordcom['afepro']);
    }*/
    if (isset($caordcom['doccom']))
    {
      $this->caordcom->setDoccom($caordcom['doccom']);
    }
    if (isset($caordcom['refsol']))
    {
      $this->caordcom->setRefsol($caordcom['refsol']);
    }
    if (isset($caordcom['tipfin']))
    {
      $this->caordcom->setTipfin($caordcom['tipfin']);
    }
    /*if (isset($caordcom['justif']))
    {
      $this->caordcom->setJustif($caordcom['justif']);
    }*/
    /*if (isset($caordcom['refprc']))
    {
      $this->caordcom->setRefprc($caordcom['refprc']);
    }*/
    /*if (isset($caordcom['id']))
    {
      $this->caordcom->setId($caordcom['id']);
    }*/
  }  
}
