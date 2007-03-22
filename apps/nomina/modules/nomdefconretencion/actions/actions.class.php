<?php

/**
 * nomdefconretencion actions.
 *
 * @package    siga
 * @subpackage nomdefconretencion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefconretencionActions extends autonomdefconretencionActions
{
public function getMostrarTipo()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npcontipaporet->getCodtipapo(),4,' ');
  	  $c->add(NptipaportesPeer::CODTIPAPO, $this->campo);
  	  $this->aporte = NptipaportesPeer::doSelect($c);
	  if ($this->aporte)
	  	return $this->aporte[0]->getDestipapo();
	  else 
	    return ' ';
  }
	
public function getMostrar_NOM()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npcontipaporet->getCodnom(),3,' ');
  	  $c->add(NpnominaPeer::CODNOM, $this->campo);
  	  $this->nomina = NpnominaPeer::doSelect($c);
	  if ($this->nomina)
	  	return $this->nomina[0]->getNomnom();
	  else 
	    return ' ';
  }
	
public function getMostrar_CONCEP()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npcontipaporet->getCodcon(),3,' ');
  	  $c->add(NpdefcptPeer::CODCON, $this->campo);
  	  $this->concep = NpdefcptPeer::doSelect($c);
	  if ($this->concep)
	  	return $this->concep[0]->getNomcon();
	  else 
	    return ' ';
  }	
  
public function detalle()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT npcontipaporet.codnom, npnomina.nomnom, npcontipaporet.codcon, npdefcpt.nomcon FROM npcontipaporet, npnomina, npdefcpt WHERE ((npcontipaporet.codtipapo='".($this->npcontipaporet->getCodtipapo())."')AND(npcontipaporet.codnom=npnomina.codnom) AND (npcontipaporet.codcon=npdefcpt.codcon) AND (npcontipaporet.tipo='R'))";
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
    $this->npcontipaporet = $this->getNpcontipaporetOrCreate();
    $this->tipo = $this->getMostrarTipo();
    $this->nomina = $this->getMostrar_NOM();
    $this->concepto = $this->getMostrar_CONCEP();
    $this->rs = $this->detalle();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpcontipaporetFromRequest();

      $this->saveNpcontipaporet($this->npcontipaporet);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefconretencion/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefconretencion/list');
      }
      else
      {
        return $this->redirect('nomdefconretencion/edit?id='.$this->npcontipaporet->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
protected function updateNpcontipaporetFromRequest()
  {
    $npcontipaporet = $this->getRequestParameter('npcontipaporet');

    if (isset($npcontipaporet['codtipapo']))
    {
      $this->npcontipaporet->setCodtipapo($npcontipaporet['codtipapo']);
    }
    if (isset($npcontipaporet['codnom']))
    {
      $this->npcontipaporet->setCodnom($npcontipaporet['codnom']);
    }
    if (isset($npcontipaporet['codcon']))
    {
      $this->npcontipaporet->setCodcon($npcontipaporet['codcon']);
    }
    
     $this->npcontipaporet->setTipo('R');
   
  }
}
