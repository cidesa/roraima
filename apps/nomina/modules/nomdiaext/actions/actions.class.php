<?php

/**
 * nomdiaext actions.
 *
 * @package    siga
 * @subpackage nomdiaext
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdiaextActions extends autonomdiaextActions
{
public function getMostrarNomina()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npdiaext->getCodnom(),3,' ');
  	  $c->add(NpnominaPeer::CODNOM, $this->campo);
  	  $this->nom = NpnominaPeer::doSelect($c);
	  if ($this->nom)
	  	return $this->nom[0]->getNomnom();
	  else 
	    return ' ';
  }
public function DatosEmp()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT npdiaext.codemp, npasicaremp.nomemp, npdiaext.fecha FROM npdiaext, npasicaremp  WHERE ((npasicaremp.codnom='".($this->npdiaext->getCodnom())."') and (npasicaremp.codemp=npdiaext.codemp))";
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
	
public function executeEdit()
  {
    $this->npdiaext = $this->getNpdiaextOrCreate();
    $this->nombre = $this->getMostrarNomina();
    $this->rs = $this->DatosEmp();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdiaextFromRequest();

      $this->saveNpdiaext($this->npdiaext);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdiaext/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdiaext/list');
      }
      else
      {
        return $this->redirect('nomdiaext/edit?id='.$this->npdiaext->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
protected function updateNpdiaextFromRequest()
  {
    $npdiaext = $this->getRequestParameter('npdiaext');

    if (isset($npdiaext['codnom']))
    {
      $this->npdiaext->setCodnom($npdiaext['codnom']);
    }
    if (isset($npdiaext['fecha']))
    {
      if ($npdiaext['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npdiaext['fecha']))
          {
            $value = $dateFormat->format($npdiaext['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npdiaext['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npdiaext->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npdiaext->setFecha(null);
      }
    }
    if (isset($npdiaext['codemp']))
    {
      $this->npdiaext->setCodemp($npdiaext['codemp']);
    }
  }
  
}
