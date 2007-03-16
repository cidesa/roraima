<?php

/**
 * pagemiret actions.
 *
 * @package    siga
 * @subpackage pagemiret
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagemiretActions extends autopagemiretActions
{
    public function retSQL()    
    {
        $con2 = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql2 = "SELECT a.numord, b.codtip, c.destip, b.monret 
		FROM opordpag a, opretord b, optipret c  
		where a.numord ='".($this->opordpag->getNumord())."'
		and a.numord=b.numord
		and b.codtip=c.codtip";
        $stmt2 = $con2->createStatement();
        $stmt2->setLimit(5000);
        $rs2 = $stmt2->executeQuery($sql2, ResultSet::FETCHMODE_NUM);
        $resultado2=array();
        //aqui lleno el array con los resultados:
           while ($rs2->next())
             {
                $resultado2[]=$rs2->getRow();
             }
        //y la envio al template:
        $this->rs2=$resultado2;
        return $this->rs2;
    }
    
   public function executeEdit()
   {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->ret = $this->retSQL();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpordpagFromRequest();

      $this->saveOpordpag($this->opordpag);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagemiret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagemiret/list');
      }
      else
      {
        return $this->redirect('pagemiret/edit?id='.$this->opordpag->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
    
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opordpag/filters');

    // pager
    $this->pager = new sfPropelPager('Opordpag', 10);
    $c = new Criteria();
    $c->addJoin(OpordpagPeer::NUMORD, OpretordPeer::NUMORD);
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
protected function updateOpordpagFromRequest()
  {
    $opordpag = $this->getRequestParameter('opordpag');

    if (isset($opordpag['numord']))
    {
      $this->opordpag->setNumord($opordpag['numord']);
    }
    if (isset($opordpag['tipcau']))
    {
      $this->opordpag->setTipcau($opordpag['tipcau']);
    }
    if (isset($opordpag['fecemi']))
    {
      if ($opordpag['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecemi']))
          {
            $value = $dateFormat->format($opordpag['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecemi(null);
      }
    }
    if (isset($opordpag['cedrif']))
    {
      $this->opordpag->setCedrif($opordpag['cedrif']);
    }
    if (isset($opordpag['nomben']))
    {
      $this->opordpag->setNomben($opordpag['nomben']);
    }
    if (isset($opordpag['monord']))
    {
      $this->opordpag->setMonord($opordpag['monord']);
    }
    if (isset($opordpag['desord']))
    {
      $this->opordpag->setDesord($opordpag['desord']);
    }
    if (isset($opordpag['ctapag']))
    {
      $this->opordpag->setCtapag($opordpag['ctapag']);
    }
    if (isset($opordpag['obsord']))
    {
      $this->opordpag->setObsord($opordpag['obsord']);
    }
    
    
    
    
    
    
    
    
    /*if (isset($opordpag['mondes']))
    {
      $this->opordpag->setMondes($opordpag['mondes']);
    }
    if (isset($opordpag['monret']))
    {
      $this->opordpag->setMonret($opordpag['monret']);
    }
    if (isset($opordpag['numche']))
    {
      $this->opordpag->setNumche($opordpag['numche']);
    }
    if (isset($opordpag['ctaban']))
    {
      $this->opordpag->setCtaban($opordpag['ctaban']);
    }
    
    if (isset($opordpag['numcom']))
    {
      $this->opordpag->setNumcom($opordpag['numcom']);
    }
    if (isset($opordpag['status']))
    {
      $this->opordpag->setStatus($opordpag['status']);
    }
    if (isset($opordpag['coduni']))
    {
      $this->opordpag->setCoduni($opordpag['coduni']);
    }
    if (isset($opordpag['fecenvcon']))
    {
      if ($opordpag['fecenvcon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecenvcon']))
          {
            $value = $dateFormat->format($opordpag['fecenvcon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecenvcon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecenvcon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecenvcon(null);
      }
    }
    if (isset($opordpag['fecenvfin']))
    {
      if ($opordpag['fecenvfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecenvfin']))
          {
            $value = $dateFormat->format($opordpag['fecenvfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecenvfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecenvfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecenvfin(null);
      }
    }
    if (isset($opordpag['ctapagfin']))
    {
      $this->opordpag->setCtapagfin($opordpag['ctapagfin']);
    }
    
    if (isset($opordpag['fecven']))
    {
      if ($opordpag['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecven']))
          {
            $value = $dateFormat->format($opordpag['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecven(null);
      }
    }
    if (isset($opordpag['fecanu']))
    {
      if ($opordpag['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecanu']))
          {
            $value = $dateFormat->format($opordpag['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecanu(null);
      }
    }
    if (isset($opordpag['desanu']))
    {
      $this->opordpag->setDesanu($opordpag['desanu']);
    }
    if (isset($opordpag['monpag']))
    {
      $this->opordpag->setMonpag($opordpag['monpag']);
    }
    if (isset($opordpag['aproba']))
    {
      $this->opordpag->setAproba($opordpag['aproba']);
    }
    if (isset($opordpag['nombensus']))
    {
      $this->opordpag->setNombensus($opordpag['nombensus']);
    }
    if (isset($opordpag['fecrecfin']))
    {
      if ($opordpag['fecrecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecrecfin']))
          {
            $value = $dateFormat->format($opordpag['fecrecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecrecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecrecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecrecfin(null);
      }
    }
    if (isset($opordpag['anopre']))
    {
      $this->opordpag->setAnopre($opordpag['anopre']);
    }
    if (isset($opordpag['fecpag']))
    {
      if ($opordpag['fecpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecpag']))
          {
            $value = $dateFormat->format($opordpag['fecpag'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecpag(null);
      }
    }
    if (isset($opordpag['numtiq']))
    {
      $this->opordpag->setNumtiq($opordpag['numtiq']);
    }
    if (isset($opordpag['peraut']))
    {
      $this->opordpag->setPeraut($opordpag['peraut']);
    }
    if (isset($opordpag['cedaut']))
    {
      $this->opordpag->setCedaut($opordpag['cedaut']);
    }
    if (isset($opordpag['nomper2']))
    {
      $this->opordpag->setNomper2($opordpag['nomper2']);
    }
    if (isset($opordpag['nomper1']))
    {
      $this->opordpag->setNomper1($opordpag['nomper1']);
    }
    if (isset($opordpag['horcon']))
    {
      $this->opordpag->setHorcon($opordpag['horcon']);
    }
    if (isset($opordpag['feccon']))
    {
      if ($opordpag['feccon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['feccon']))
          {
            $value = $dateFormat->format($opordpag['feccon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['feccon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFeccon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFeccon(null);
      }
    }
    if (isset($opordpag['nomcat']))
    {
      $this->opordpag->setNomcat($opordpag['nomcat']);
    }
    if (isset($opordpag['numfac']))
    {
      $this->opordpag->setNumfac($opordpag['numfac']);
    }
    if (isset($opordpag['numconfac']))
    {
      $this->opordpag->setNumconfac($opordpag['numconfac']);
    }
    if (isset($opordpag['numcorfac']))
    {
      $this->opordpag->setNumcorfac($opordpag['numcorfac']);
    }
    if (isset($opordpag['fechafac']))
    {
      if ($opordpag['fechafac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fechafac']))
          {
            $value = $dateFormat->format($opordpag['fechafac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fechafac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFechafac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFechafac(null);
      }
    }
    if (isset($opordpag['fecfac']))
    {
      if ($opordpag['fecfac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecfac']))
          {
            $value = $dateFormat->format($opordpag['fecfac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecfac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecfac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecfac(null);
      }
    }
    if (isset($opordpag['tipfin']))
    {
      $this->opordpag->setTipfin($opordpag['tipfin']);
    }
    if (isset($opordpag['comret']))
    {
      $this->opordpag->setComret($opordpag['comret']);
    }
    if (isset($opordpag['feccomret']))
    {
      if ($opordpag['feccomret'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['feccomret']))
          {
            $value = $dateFormat->format($opordpag['feccomret'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['feccomret'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFeccomret($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFeccomret(null);
      }
    }
    if (isset($opordpag['comretislr']))
    {
      $this->opordpag->setComretislr($opordpag['comretislr']);
    }
    if (isset($opordpag['feccomretislr']))
    {
      if ($opordpag['feccomretislr'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['feccomretislr']))
          {
            $value = $dateFormat->format($opordpag['feccomretislr'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['feccomretislr'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFeccomretislr($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFeccomretislr(null);
      }
    }
    if (isset($opordpag['comretltf']))
    {
      $this->opordpag->setComretltf($opordpag['comretltf']);
    }
    if (isset($opordpag['feccomretltf']))
    {
      if ($opordpag['feccomretltf'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['feccomretltf']))
          {
            $value = $dateFormat->format($opordpag['feccomretltf'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['feccomretltf'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFeccomretltf($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFeccomretltf(null);
      }
    }*/
  }
  
}
