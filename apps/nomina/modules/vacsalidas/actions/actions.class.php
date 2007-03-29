<?php

/**
 * vacsalidas actions.
 *
 * @package    siga
 * @subpackage vacsalidas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vacsalidasActions extends autovacsalidasActions
{
public function getMostrar_nombre()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npvacsalidas->getCodemp(),16,' ');
  	  $c->add(NphojintPeer::CODEMP, $this->campo);
  	  $this->nombre = NphojintPeer::doSelect($c);
	  if ($this->nombre)
	  	return $this->nombre[0]->getNomemp();
	  else 
	    return ' ';
  }
  
public function Dias()    
    {
    if ($this->npvacsalidas->getCodemp()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT npvacdisfrute.perini, npvacdisfrute.perfin, npvacdisfrute.diasdisfutar, npvacdisfrute.diasdisfrutados from npvacdisfrute, npvacsalidas  WHERE (npvacdisfrute.codemp='".($this->npvacsalidas->getCodemp())."')";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
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
    else
    {
    	return '';
    }
	
    }
	
  public function executeEdit()
  {
    $this->npvacsalidas = $this->getNpvacsalidasOrCreate();
    $this-> nombres= $this->getMostrar_nombre();
    $this->rs = $this->Dias();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpvacsalidasFromRequest();

      $this->saveNpvacsalidas($this->npvacsalidas);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vacsalidas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vacsalidas/list');
      }
      else
      {
        return $this->redirect('vacsalidas/edit?id='.$this->npvacsalidas->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateNpvacsalidasFromRequest()
  {
    $npvacsalidas = $this->getRequestParameter('npvacsalidas');

    if (isset($npvacsalidas['codemp']))
    {
      $this->npvacsalidas->setCodemp($npvacsalidas['codemp']);
    }
    if (isset($npvacsalidas['nomemp']))
    {
      $this->npvacsalidas->setNomemp($npvacsalidas['nomemp']);
    }
    if (isset($npvacsalidas['fecing']))
    {
      $this->npvacsalidas->setFecing($npvacsalidas['fecing']);
    }
    if (isset($npvacsalidas['fecvac']))
    {
      if ($npvacsalidas['fecvac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacsalidas['fecvac']))
          {
            $value = $dateFormat->format($npvacsalidas['fecvac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacsalidas['fecvac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacsalidas->setFecvac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacsalidas->setFecvac(null);
      }
    }
    if (isset($npvacsalidas['fecdes']))
    {
      if ($npvacsalidas['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacsalidas['fecdes']))
          {
            $value = $dateFormat->format($npvacsalidas['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacsalidas['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacsalidas->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacsalidas->setFecdes(null);
      }
    }
    if (isset($npvacsalidas['fechas']))
    {
      if ($npvacsalidas['fechas'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacsalidas['fechas']))
          {
            $value = $dateFormat->format($npvacsalidas['fechas'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacsalidas['fechas'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacsalidas->setFechas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacsalidas->setFechas(null);
      }
    }
    if (isset($npvacsalidas['diasdisfrutar']))
    {
      $this->npvacsalidas->setDiasdisfrutar($npvacsalidas['diasdisfrutar']);
    }
    if (isset($npvacsalidas['observa']))
    {
      $this->npvacsalidas->setObserva($npvacsalidas['observa']);
    }
  }
	
}
