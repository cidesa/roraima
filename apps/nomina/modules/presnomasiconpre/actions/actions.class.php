<?php

/**
 * presnomasiconpre actions.
 *
 * @package    siga
 * @subpackage presnomasiconpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomasiconpreActions extends autopresnomasiconpreActions
{
 public function detalleSQL()    
    {
      if ($this->npasipre->getCodcon()!='')
      {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="Select A.codcpt,B.NomCon From NPConAsi A,NPDefCpt B Where A.Codcpt=B.CodCon and  A.CodCon = '" . $this->npasipre->getCodcon() . "' And A.CodAsi = '" . $this->npasipre->getCodasi() . "' Order By CodCpt";         
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
    $this->npasipre = $this->getNpasipreOrCreate();
    $this->detalles = $this->detalleSQL();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasipreFromRequest();

      $this->saveNpasipre($this->npasipre);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomasiconpre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomasiconpre/list');
      }
      else
      {
        return $this->redirect('presnomasiconpre/edit?id='.$this->npasipre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
    
  protected function updateNpasipreFromRequest()
  {
    $npasipre = $this->getRequestParameter('npasipre');

    if (isset($npasipre['codcon']))
    {
      $this->npasipre->setCodcon(str_pad($npasipre['codcon'],3,'0',STR_PAD_LEFT));
    }
    if (isset($npasipre['codasi']))
    {
      $this->npasipre->setCodasi(str_pad($npasipre['codasi'],3,'0',STR_PAD_LEFT));
    }
    if (isset($npasipre['desasi']))
    {
      $this->npasipre->setDesasi($npasipre['desasi']);
    }
  }
	
}
