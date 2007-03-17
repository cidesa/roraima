<?php

/**
 * almsalalm actions.
 *
 * @package    siga
 * @subpackage almsalalm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almsalalmActions extends autoalmsalalmActions
{
  public function getMostrar_Desalma()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->casalalm->getCodalm(),6,' ');
  	  $c->add(CadefalmPeer::CODALM, $this->campo);
  	  $this->alm = CadefalmPeer::doSelect($c);
	  if ($this->alm)
	  	return $this->alm[0]->getNomalm();
	  else 
	    return ' ';
  }
  
  public function getMostrar_movimiento()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->casalalm->getTipmov(),3,' ');
  	  $c->add(CatipsalPeer::CODTIPSAL, $this->campo);
  	  $this->mov = CatipsalPeer::doSelect($c);
	  if ($this->mov)
	  	return $this->mov[0]->getDestipsal();
	  else 
	    return ' ';
  }
	
public function getMostrar_RIF()
  {
  	  $c = new Criteria;
  	  $c->addJoin(CaproveePeer::CODPRO,CasalalmPeer::CODPRO);
  	  $c->add(CaproveePeer::CODPRO,$this->casalalm->getCodpro());
  	  $this->rif = CaproveePeer::doSelect($c);
  	  if ($this->rif)
	  	{
	  		$this->prif = $this->rif[0]->getRifpro();
	  	    $this->pnom = $this->rif[0]->getNompro();
	  	}
	  	else
	  	{
	  		$this->prif = '';
	  	    $this->pnom = '';
	  	}
  }		
  
public function salidas()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT  DISTINCT cadetsal.codart, caregart.desart, cadetsal.cantot, cadetsal.cosart, cadetsal.totart FROM casalalm,cadetsal,caregart where ((cadetsal.codsal ='".($this->casalalm->getCodsal())."') AND (cadetsal.codart=caregart.codart))";
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
    $this->casalalm = $this->getCasalalmOrCreate();
    $this->almacena = $this->getMostrar_Desalma();
    $this->tipo = $this->getMostrar_movimiento();
    $this->getMostrar_RIF();
    $this->rs = $this->salidas();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCasalalmFromRequest();

      $this->saveCasalalm($this->casalalm);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almsalalm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almsalalm/list');
      }
      else
      {
        return $this->redirect('almsalalm/edit?id='.$this->casalalm->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
