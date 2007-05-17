<?php

/**
 * doctab actions.
 *
 * @package    siga
 * @subpackage doctab
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class doctabActions extends autodoctabActions
{
  
  /*
   * TODO: Colocar el Catálogo para seleccionar el Coddoc
   * TODO: Verificar la carga de datos al modificar un registro.
   * tSql="INSERT INTO "+Session("NOMUSU")+".DFTEMPORAL4 SELECT TIPPRC AS TIPO, NOMABR AS ABR, NOMEXT AS EXT FROM "+Session("NOMUSU")+".CPDOCPRC"
	                tSql2="INSERT INTO "+Session("NOMUSU")+".DFTEMPORAL4 SELECT TIPCOM AS TIPO, NOMABR AS ABR, NOMEXT AS EXT FROM "+Session("NOMUSU")+".CPDOCCOM"
	                tSql3="INSERT INTO "+Session("NOMUSU")+".DFTEMPORAL4 SELECT TIPCAU AS TIPO, NOMABR AS ABR, NOMEXT AS EXT FROM "+Session("NOMUSU")+".CPDOCCAU"
	                tSql4="INSERT INTO "+Session("NOMUSU")+".DFTEMPORAL4 SELECT TIPPAG AS TIPO, NOMABR AS ABR, NOMEXT AS EXT FROM "+Session("NOMUSU")+".CPDOCPAG"

   */

  public function getTablas(){
    
    $user = $this->getUser();
    $schema = $user->getAttribute('schema'); 
    
    $sql = 'select tablename as nombre from pg_tables where trim(schemaname)=trim("'.$schema.'") order by tablename';

    $reg = array();
    $reg['acunidad'] = 'acunidad';
    
    //Herramientas::BuscarDatos($sql,&$reg);
    /*
    if(isset($reg)){
      
      $result = array();
      
      for($i=0;i<count($reg);$i++){
        
        $result[] =  $reg[$i]['nombre'];
        
      }
      
      return array();
      
    }*/

    return $reg;

    
  }
  
  public function getCampos($tabla){
    
    
    //print '$tab = '.ucfirst(strtolower($tabla)).'Peer::getFieldNames();';
    eval('$tab = '.ucfirst(strtolower($tabla)).'Peer::getFieldNames();'); 
    
    //print $tab[0];
    
    if(isset($tab)){
      
      for($i=0;$i<count($tab);$i++){
        
        $regtab[$tab[$i]] = $tab[$i];
        
      }
      
      return $regtab;
      
    }else return array(); 
    
  }
  
  public function executeEdit()
  {
    $this->dftabtip = $this->getDftabtipOrCreate();
    
    $this->tablas = $this->getTablas();
    
    $this->campos = array();
    
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateDftabtipFromRequest();
      
      $this->campos = $this->getCampos($this->dftabtip->getNomtab());

      $this->saveDftabtip($this->dftabtip);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('doctab/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('doctab/list');
      }
      else
      {
        return $this->redirect('doctab/edit?id='.$this->dftabtip->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateDftabtipFromRequest()
  {
    $dftabtip = $this->getRequestParameter('dftabtip');

    if (isset($dftabtip['tipdoc']))
    {
      $this->dftabtip->setTipdoc($dftabtip['tipdoc']);
    }
    if (isset($dftabtip['nomtab']))
    {
      $this->dftabtip->setNomtab($dftabtip['nomtab']);
    }
    if (isset($dftabtip['vidutil']))
    {
      $this->dftabtip->setVidutil($dftabtip['vidutil']);
    }
    if (isset($dftabtip['clvprm']))
    {
      $this->dftabtip->setClvprm($dftabtip['clvprm']);
    }
    if (isset($dftabtip['clvfrn']))
    {
      $this->dftabtip->setClvfrn($dftabtip['clvfrn']);
    }
    if (isset($dftabtip['mondoc']))
    {
      $this->dftabtip->setMondoc($dftabtip['mondoc']);
    }
    if (isset($dftabtip['fecdoc']))
    {
      $this->dftabtip->setFecdoc($dftabtip['fecdoc']);
    }
    if (isset($dftabtip['desdoc']))
    {
      $this->dftabtip->setDesdoc($dftabtip['desdoc']);
    }
    if (isset($dftabtip['stadoc']))
    {
      $this->dftabtip->setStadoc($dftabtip['stadoc']);
    }
  }
  
  public function executeAjax()
  {
    if ($this->getRequestParameter('par')=='1')
	{
	  $campo = $this->getRequestParameter('campo');
	  $this->dftabtip = $this->getDftabtipOrCreate();
      $this->updateDftabtipFromRequest();
      
      $this->campos = $this->getCampos($campo);
      
      $this->labels = $this->getLabels();
	  
	  
      $this->tablas = $this->getTablas();
	} 
  }	
  
  
}
