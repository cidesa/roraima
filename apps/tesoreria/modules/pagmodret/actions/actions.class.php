<?php

/**
 * pagmodret actions.
 *
 * @package    siga
 * @subpackage pagmodret
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagmodretActions extends autopagmodretActions
{
public function getMostrar_tipo()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->opordpag->getTipcau(),3,' ');
  	  $c->add(CpdoccauPeer::TIPCAU, $this->campo);
  	  $this->hola = CpdoccauPeer::doSelect($c);
	  if ($this->hola)
	  	return $this->hola[0]->getNomext();
	  else 
	    return ' ';
  }
	
	public function presupuesto()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT opretord.codpre, cpdeftit.nompre, opretord.codtip, optipret.destip, opretord.monret, opretord.refere FROM opretord, opordpag, cpdeftit, optipret where (opretord.numord ='".($this->opordpag->getNumord())."') AND (opretord.codpre=cpdeftit.codpre) AND (opretord.codtip=optipret.codtip)";
        $stmt = $con->createStatement();
        $stmt->setLimit(10000);
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
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->rs = $this->presupuesto(); 
    $this->reten = $this->getMostrar_tipo();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpordpagFromRequest();

      $this->saveOpordpag($this->opordpag);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagmodret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagmodret/list');
      }
      else
      {
        return $this->redirect('pagmodret/edit?id='.$this->opordpag->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
