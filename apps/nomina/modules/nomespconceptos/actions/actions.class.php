<?php

/**
 * nomespconceptos actions.
 *
 * @package    siga
 * @subpackage nomespconceptos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomespconceptosActions extends autonomespconceptosActions
{
 public function detalleSQL()    
    {
      if ($this->npnomespnomtip->getCodnomesp()!='')
      {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="Select a.CodCon,b.nomcon From NPNomEspConNomTip a,NPDefCpt b Where a.codcon=b.codcon and   a.CodNomEsp = '" . $this->npnomespnomtip->getCodnomesp() . "'  And a.CodNom = '" . $this->npnomespnomtip->getCodnom() . "' Order By CodCon";                 
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
    $this->npnomespnomtip = $this->getNpnomespnomtipOrCreate();
    $this->detalles = $this->detalleSQL();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnomespnomtipFromRequest();

      $this->saveNpnomespnomtip($this->npnomespnomtip);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomespconceptos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomespconceptos/list');
      }
      else
      {
        return $this->redirect('nomespconceptos/edit?id='.$this->npnomespnomtip->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }  

  protected function updateNpnomespnomtipFromRequest()
  {
    $npnomespnomtip = $this->getRequestParameter('npnomespnomtip');

    if (isset($npnomespnomtip['codnomesp']))
    {
      $this->npnomespnomtip->setCodnomesp(str_pad($npnomespnomtip['codnomesp'],3,'0',STR_PAD_LEFT));
    }
    if (isset($npnomespnomtip['codnom']))
    {
      $this->npnomespnomtip->setCodnom(str_pad($npnomespnomtip['codnom'],3,'0',STR_PAD_LEFT));
    }
  }
  
  
}
