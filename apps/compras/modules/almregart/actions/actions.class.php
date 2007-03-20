<?php

/**
 * almregart actions.
 *
 * @package    siga
 * @subpackage almregart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almregartActions extends autoalmregartActions
{
 public function getMostrar_Ramo()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->caregart->getRamart(),6,' ');
  	  $c->add(CaramartPeer::RAMART, $this->campo);
  	  $this->ram = CaramartPeer::doSelect($c);
	  if ($this->ram)
	  	return $this->ram[0]->getNomram();
	  else 
	    return ' ';
  }	
	
 public function Existencia()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT caartalm.codalm, cadefalm.nomalm, cadefubi.nomubi, caartalm.eximin, caartalm.eximax, caartalm.exiact, caartalm.ptoreo FROM caartalm, caregart, cadefalm, cadefubi WHERE ((caartalm.codart='".($this->caregart->getCodart())."') AND (caartalm.codalm=cadefalm.codalm) AND (caartalm.codubi=cadefubi.codubi))";
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
    $this->caregart = $this->getCaregartOrCreate();   
    $this->tiporamo = $this->getMostrar_Ramo();
    $this->rs = $this->Existencia();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaregartFromRequest();

      $this->saveCaregart($this->caregart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almregart/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almregart/list');
      }
      else
      {
        return $this->redirect('almregart/edit?id='.$this->caregart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
