<?php

/**
 * almordrec actions.
 *
 * @package    siga
 * @subpackage almordrec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almordrecActions extends autoalmordrecActions
{
  public function getDes_pro()
  {
  	// nombre proveedor
  	  $c = new Criteria;
  	  $c->add(CaproveePeer::CODPRO, str_pad($this->carcpart->getCodpro(),10,' '));
  	  $this->nompro = CaproveePeer::doSelect($c);
	  if ($this->nompro)
	  	return $this->nompro[0]->getNompro();
	  else 
	    return ' ';
  }
  public function getDes_alm()
  {
  	// nombre proveedor
  	  $c = new Criteria;
  	  $c->add(CadefalmPeer::CODALM,$this->carcpart->getCodalm());
  	  $this->nompro = CadefalmPeer::doSelect($c);
	  if ($this->nompro)
	  	return $this->nompro[0]->getNomalm();
	  else 
	    return ' ';
  }
  
  public function detalleSQL()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql ="Select A.codart, B.DesArt,A.canrec, A.candev,A.mondes,A.monrgo,A.montot,A.codcat,A.codfal,A.fecest From CaArtRcp A,CaRegArt B Where A.codart= RPAD(B.codart,20,' ')  and A.RcpArt = '" . $this->carcpart->getRcpart() . "' order By A.CodArt";
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
    $this->carcpart = $this->getCarcpartOrCreate();
    $this->nomprovee = $this->getDes_pro();
    $this->nomalmace = $this->getDes_alm();
    $this->detrec = $this->detalleSQL();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCarcpartFromRequest();

      $this->saveCarcpart($this->carcpart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almordrec/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almordrec/list');
      }
      else
      {
        return $this->redirect('almordrec/edit?id='.$this->carcpart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
}
