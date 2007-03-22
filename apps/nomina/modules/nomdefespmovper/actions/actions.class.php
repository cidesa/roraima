<?php

/**
 * nomdefespmovper actions.
 *
 * @package    siga
 * @subpackage nomdefespmovper
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespmovperActions extends autonomdefespmovperActions
{
  public function getCadetent()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,$this->npnomina->getCodnom());
		return NpnominaPeer::doSelect($c);
		
	}	
  public function executeSQL_resumen()    
    {
    	//Funcion que ejecuta sql lista
        $con =
        sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "Select DISTINCT a.codnom,a.nomnom,case2(b.status,'C','Activado','') as monto, case2(b.status,'M','Activado','') as cantidad from NpNomina a, npdefmov b where a.codnom=b.codnom and a.codNom='".$this->npnomina->getCodnom()."'";// where a.Codart=b.Codart and a.Ordcom ='".$this->caordcom->getOrdcom()."'";
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
    $this->npnomina = $this->getNpnominaOrCreate();
    $this->executeSQL_resumen();
    $this->cadetent = $this->getCadetent();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnominaFromRequest();

      $this->saveNpnomina($this->npnomina);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespmovper/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespmovper/list');
      }
      else
      {
        return $this->redirect('nomdefespmovper/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
