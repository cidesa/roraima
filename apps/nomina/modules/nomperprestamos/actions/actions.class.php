<?php

/**
 * nomperprestamos actions.
 *
 * @package    siga
 * @subpackage nomperprestamos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomperprestamosActions extends autonomperprestamosActions
{
  public function PrestamosEmp()    
    {
    if ($this->nptippre->getCodcon()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT npasiconemp.codemp, npasiconemp.nomemp, npasiconemp.monto, npasiconemp.cantidad, npasiconemp.acumulado from npasiconemp, nptippre WHERE (npasiconemp.codcon='".($this->nptippre->getCodcon())."')";
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
  
public function getMostrarConcepto()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->nptippre->getCodcon(),3,' ');
  	  $c->add(NpasiconempPeer::CODCON, $this->campo);
  	  $this->nom = NpasiconempPeer::doSelect($c);
	  if ($this->nom)
	  	return $this->nom[0]->getNomcon();
	  else 
	    return ' ';
  }
	
public function executeEdit()
  {
    $this->nptippre = $this->getNptippreOrCreate();
    $this->rs = $this->PrestamosEmp();
    $this->nombre = $this->getMostrarConcepto();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateNptippreFromRequest();

      //$this->saveNptippre($this->nptippre);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomperprestamos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomperprestamos/list');
      }
      else
      {
        return $this->redirect('nomperprestamos/edit?id='.$this->nptippre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
protected function updateNptippreFromRequest()
  {
    $nptippre = $this->getRequestParameter('nptippre');

    if (isset($nptippre['codtippre']))
    {
      $this->nptippre->setCodtippre($nptippre['codtippre']);
    }
    if (isset($nptippre['destippre']))
    {
      $this->nptippre->setDestippre($nptippre['destippre']);
    }
  }
  
}
