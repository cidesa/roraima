<?php

/**
 * almsolegr actions.
 *
 * @package    siga
 * @subpackage almsolegr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almsolegrActions extends autoalmsolegrActions
{
public function getMostrar_Unidad()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->casolart->getUnires(),32,' ');
  	  $c->add(NpcatprePeer::CODCAT, $this->campo);
  	  $this->unidad = NpcatprePeer::doSelect($c);
	  if ($this->unidad)
	  	return $this->unidad[0]->getNomcat();
	  else 
	    return ' ';
  }
  
public function getMostrar_Finan()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->casolart->getTipfin(),4,' ');
  	  $c->add(FortipfinPeer::CODFIN, $this->campo);
  	  $this->financia = FortipfinPeer::doSelect($c);
	  if ($this->financia)
	  	return $this->financia[0]->getNomext();
	  else 
	    return ' ';
  }
	
  public function solicitud()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT caartsol.codart, caregart.desart, caartsol.codcat, caartsol.canreq, caartsol.canrec, caartsol.costo, caartsol.mondes, caartsol.monrgo, caartsol.montot, caartsol.unimed, caregart.codpar FROM casolart,caartsol,caregart where (caartsol.reqart ='".($this->casolart->getReqart())."') AND (caartsol.codart=caregart.codart)";
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
    $this->casolart = $this->getCasolartOrCreate();
    $this->respon = $this->getMostrar_Unidad();
    $this->tipofin = $this->getMostrar_Finan();
    $this->rs = $this->solicitud();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCasolartFromRequest();

      $this->saveCasolart($this->casolart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almsolegr/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almsolegr/list');
      }
      else
      {
        return $this->redirect('almsolegr/edit?id='.$this->casolart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
