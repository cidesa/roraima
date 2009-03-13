<?php

/**
 * fordefpryaccsubaccivss actions.
 *
 * @package    siga
 * @subpackage fordefpryaccsubaccivss
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefpryaccsubaccivssActions extends autofordefpryaccsubaccivssActions
{
  public function getMostrarProyecto()
  {
  	  $c = new Criteria;
  	  $c->addJoin(FordefpryPeer::CODPRO,ForasopryaccespsubaccPeer::CODPRO);
  	  $c->add(FordefpryPeer::CODPRO,Str_pad($this->forasopryaccespsubacc->getCodpro(),20,' '));
  	  $this->proy = FordefpryPeer::doSelect($c);
  	  if ($this->proy)
	  	{
	  		$this->pnom = $this->proy[0]->getNompro();
	  	    $this->pproac = $this->proy[0]->getProacc();
	  	     if ($this->pproac='P')
	  	     	{
	  	     	 $this->pproac="Proyecto";
	  	         } 

	  	         else
	  	         	{
	  	         	$this->pproac="Accion Centralizada";
	  	         }
	  	}
	  	else
	  	{
	  		$this->pnom = '';
	  	    $this->pproac = '';
	  	}
  }	
	
  public function getMostrarAccion()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->forasopryaccespsubacc->getCodaccesp(),20,' ');
  	  $c->add(FordefaccespPeer::CODACCESP, $this->campo);
  	  $this->Des = FordefaccespPeer::doSelect($c);
	  if ($this->Des)
	  	return $this->Des[0]->getDesaccesp();
	  else 
	    return ' ';
  }

  
  
  public function AccionesPoa()    
    {
    if ($this->forasopryaccespsubacc->getCodpro()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT forasopryaccespsubacc.codsubacc, fordefaccpoa.dessubacc from forasopryaccespsubacc, fordefaccpoa  WHERE (fordefaccpoa.codsubacc='".($this->forasopryaccespsubacc->getCodsubacc())."')";
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
    $this->forasopryaccespsubacc = $this->getForasopryaccespsubaccOrCreate();
    $this->getMostrarProyecto();
    $this->descripcion = $this->getMostrarAccion();
    $this->rs = $this->AccionesPoa();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateForasopryaccespsubaccFromRequest();

      $this->saveForasopryaccespsubacc($this->forasopryaccespsubacc);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefpryaccsubaccivss/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefpryaccsubaccivss/list');
      }
      else
      {
        return $this->redirect('fordefpryaccsubaccivss/edit?id='.$this->forasopryaccespsubacc->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
protected function updateForasopryaccespsubaccFromRequest()
  {
    $forasopryaccespsubacc = $this->getRequestParameter('forasopryaccespsubacc');

    if (isset($forasopryaccespsubacc['codpro']))
    {
      $this->forasopryaccespsubacc->setCodpro($forasopryaccespsubacc['codpro']);
    }
    if (isset($forasopryaccespsubacc['codaccesp']))
    {
      $this->forasopryaccespsubacc->setCodaccesp($forasopryaccespsubacc['codaccesp']);
    }
    if (isset($forasopryaccespsubacc['codsubacc']))
    {
      $this->forasopryaccespsubacc->setCodsubacc($forasopryaccespsubacc['codsubacc']);
    }
  }
  
  
	
}
