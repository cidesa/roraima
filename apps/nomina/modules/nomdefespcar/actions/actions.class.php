<?php

/**
 * nomdefespcar actions.
 *
 * @package    siga
 * @subpackage nomdefespcar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespcarActions extends autonomdefespcarActions
{
	public function gridperfil()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "select a.codperfil, b.desperfil, a.puntos FROM npperfil b,nppercar a where rpad(a.codcar,16,' ') =rpad('".$this->npcargos->getCodcar()."',16,' ') and a.codperfil=b.codperfil";
        $stmt = $con->createStatement();
                $rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
           while ($rs->next())
             {
                $resultado[]=$rs->getRow();
             }
        $this->rs=$resultado;
        return $this->rs;
    }
    
  public function executeEdit()
  {
    $this->npcargos = $this->getNpcargosOrCreate();
    if ($this->npcargos->getId())
    {
    	$this->grid = $this->gridperfil();
    }
    else
    {
		$this->grid = '';    	
    }
    
   
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpcargosFromRequest();

      $this->saveNpcargos($this->npcargos);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespcar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespcar/list');
      }
      else
      {
        return $this->redirect('nomdefespcar/edit?id='.$this->npcargos->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateNpcargosFromRequest()
  {
    $npcargos = $this->getRequestParameter('npcargos');

    if (isset($npcargos['codcar']))
    {
      $this->npcargos->setCodcar($npcargos['codcar']);
    }
    if (isset($npcargos['nomcar']))
    {
      $this->npcargos->setNomcar($npcargos['nomcar']);
    }
    if (isset($npcargos['codtip']))
    {
      $this->npcargos->setCodtip($npcargos['codtip']);
    }
    if (isset($npcargos['graocp']))
    {
      $this->npcargos->setGraocp($npcargos['graocp']);
    }
    if (isset($npcargos['suecar']))
    {
      $this->npcargos->setSuecar($npcargos['suecar']);
    }
    if (isset($npcargos['punmin']))
    {
      $this->npcargos->setPunmin($npcargos['punmin']);
    }
    //if (isset($npcargos['stacar']))
    //{
      $this->npcargos->setStacar($this->getRequestParameter('stacar'));
    //}
  }
    
}
