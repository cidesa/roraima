<?php

/**
 * presnomasitrabcont actions.
 *
 * @package    siga
 * @subpackage presnomasitrabcont
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomasitrabcontActions extends autopresnomasitrabcontActions
{
  public function Asignaciones()    
    {
    if ($this->npasiempcont->getCodtipcon()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT npasiempcont.codemp, npasiempcont.nomemp, npasiempcont.feccal, npasiempcont.codnom, npnomina.nomnom from npasiempcont, npnomina  WHERE (npasiempcont.codtipcon='".($this->npasiempcont->getCodtipcon())."') AND (npasiempcont.codnom=npnomina.codnom)";
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
    $this->npasiempcont = $this->getNpasiempcontOrCreate();
    $this->rs = $this->Asignaciones();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateNpasiempcontFromRequest();

      //$this->saveNpasiempcont($this->npasiempcont);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomasitrabcont/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomasitrabcont/list');
      }
      else
      {
        return $this->redirect('presnomasitrabcont/edit?id='.$this->npasiempcont->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateNpasiempcontFromRequest()
  {
    $npasiempcont = $this->getRequestParameter('npasiempcont');

    if (isset($npasiempcont['codtipcon']))
    {
      $this->npasiempcont->setCodtipcon($npasiempcont['codtipcon']);
    }
    if (isset($npasiempcont['destipcon']))
    {
      $this->npasiempcont->setDestipcon($npasiempcont['destipcon']);
    }
  }
  
}
