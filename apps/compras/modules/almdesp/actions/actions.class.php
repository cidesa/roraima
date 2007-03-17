<?php

/**
 * almdesp actions.
 *
 * @package    siga
 * @subpackage almdesp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almdespActions extends autoalmdespActions
{
public function getMostrar_Almacen()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->cadphart->getCodalm(),6,' ');
  	  $c->add(CadefalmPeer::CODALM, $this->campo);
  	  $this->alma = CadefalmPeer::doSelect($c);
	  if ($this->alma)
	  	return $this->alma[0]->getNomalm();
	  else 
	    return ' ';
  }
	
public function getMostrar_Requisicion()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->cadphart->getReqart(),6,' ');
  	  $c->add(CareqartPeer::REQART, $this->campo);
  	  $this->requi = CareqartPeer::doSelect($c);
	  if ($this->requi)
	  	return $this->requi[0]->getDesreq();
	  else 
	    return ' ';
  }
	
public function getMostrar_Unidad()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->cadphart->getCodori(),32,' ');
  	  $c->add(NpcatprePeer::CODCAT, $this->campo);
  	  $this->uni = NpcatprePeer::doSelect($c);
	  if ($this->uni)
	  	return $this->uni[0]->getNomcat();
	  else 
	    return ' ';
  }	
	
public function despacho()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT caartdph.codart, caregart.desart, caartdph.candph, caartdph.candev, caregart.unimed, caartdph.montot, caartdph.codfal FROM cadphart, caartdph,caregart where (caartdph.dphart ='".($this->cadphart->getDphart())."') AND (caartdph.codart=caregart.codart)";
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
    $this->cadphart = $this->getCadphartOrCreate();
    $this->almacen = $this->getMostrar_Almacen();
    $this->Requision = $this->getMostrar_Requisicion();
    $this->origen = $this->getMostrar_Unidad();
    $this->rs = $this->despacho();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadphartFromRequest();

      $this->saveCadphart($this->cadphart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almdesp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almdesp/list');
      }
      else
      {
        return $this->redirect('almdesp/edit?id='.$this->cadphart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
