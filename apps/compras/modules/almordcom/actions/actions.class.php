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
  	// nombre proveedor
  	  $c = new Criteria;
  	  $this->campo = $this->caordcom->getTipmon();
  	  $c->add(TsdesmonPeer::CODMON, $this->campo);
  	  $this->nomnom = TsdesmonPeer::doSelect($c);
	  if ($this->nommon)
	  	return $this->nommon[0]->getNommon();
	  else 
	    return '<!Registro no Encontrado o vacio!> ';
  }	  
  
  public function executeEdit()
  {
    $this->caordcom = $this->getCaordcomOrCreate();
    $this->nom_pro = $this->getDes_pro();    
    $this->nom_mon = $this->getDes_mon();  
    
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
    if (isset($caordcom['tiecan']))
    {
      $this->caordcom->setTiecan($caordcom['tiecan']);
    }
    if (isset($caordcom['monord']))
    {
      $this->caordcom->setMonord($caordcom['monord']);
    }
    if (isset($caordcom['dtoord']))
    {
      $this->caordcom->setDtoord($caordcom['dtoord']);
    }
    if (isset($caordcom['refcom']))
    {
      $this->caordcom->setRefcom($caordcom['refcom']);
    }
    if (isset($caordcom['staord']))
    {
      $this->caordcom->setStaord($caordcom['staord']);
    }
    if (isset($caordcom['afepre']))
    {
      $this->caordcom->setAfepre($caordcom['afepre']);
    }
    if (isset($caordcom['conpag']))
    {
      $this->caordcom->setConpag($caordcom['conpag']);
    }
    if (isset($caordcom['forent']))
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
    }
    if (isset($caordcom['tipmon']))
    {
      $this->caordcom->setTipmon($caordcom['tipmon']);
    }
    if (isset($caordcom['valmon']))
    {
      $this->caordcom->setValmon($caordcom['valmon']);
    }
    if (isset($caordcom['tipcom']))
    {
      $this->caordcom->setTipcom($caordcom['tipcom']);
    }
    if (isset($caordcom['tipord']))
    {
      $this->caordcom->setTipord($caordcom['tipord']);
    }
    if (isset($caordcom['tipo']))
    {
      $this->caordcom->setTipo($caordcom['tipo']);
    }
    if (isset($caordcom['coduni']))
    {
      $this->caordcom->setCoduni($caordcom['coduni']);
    }
    if (isset($caordcom['codemp']))
    {
      $this->caordcom->setCodemp($caordcom['codemp']);
    }
    if (isset($caordcom['notord']))
    {
      $this->caordcom->setNotord($caordcom['notord']);
    }
    if (isset($caordcom['tipdoc']))
    {
      $this->caordcom->setTipdoc($caordcom['tipdoc']);
    }
    if (isset($caordcom['tippro']))
    {
      $this->caordcom->setTippro($caordcom['tippro']);
    }
    if (isset($caordcom['afepro']))
    {
      $this->caordcom->setAfepro($caordcom['afepro']);
    }
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
    if (isset($caordcom['justif']))
    {
      $this->caordcom->setJustif($caordcom['justif']);
    }
    if (isset($caordcom['refprc']))
    {
      $this->caordcom->setRefprc($caordcom['refprc']);
    }
    if (isset($caordcom['id']))
    {
      $this->caordcom->setId($caordcom['id']);
    }
  }  
}
