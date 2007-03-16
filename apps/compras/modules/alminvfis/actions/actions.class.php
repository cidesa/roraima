<?php

/**
 * alminvfis actions.
 *
 * @package    siga
 * @subpackage alminvfis
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class alminvfisActions extends autoalminvfisActions
{
    //public function executeAlumnosPorDia()
    public function executeSQL()    
    {
    	//Funcion que ejecuta sql
        $con =
        sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT * FROM cainvfis where codalm ='".$this->cainvfis->getCodalm()."'";
        $stmt = $con->createStatement();
        $stmt->setLimit(50000);
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
    $this->cainvfis = $this->getCainvfisOrCreate();
    $this->rs = $this->executeSQL();    

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCainvfisFromRequest();

      $this->saveCainvfis($this->cainvfis);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('alminvfis/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('alminvfis/list');
      }
      else
      {
        return $this->redirect('alminvfis/edit?id='.$this->cainvfis->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 }
