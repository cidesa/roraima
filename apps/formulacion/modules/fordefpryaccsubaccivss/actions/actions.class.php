<?php

/**
 * fordefpryaccsubaccivss actions.
 *
 * @package    Roraima
 * @subpackage fordefpryaccsubaccivss
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
	
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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
  
/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
