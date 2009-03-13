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

  public function getCampos($tabla){

    if(class_exists(ucfirst(strtolower($tabla)).'Peer')){
      eval('$tab = '.ucfirst(strtolower($tabla)).'Peer::getFieldNames();');

      if(isset($tab)){

        for($i=0;$i<count($tab);$i++){

          $regtab[$tab[$i]] = $tab[$i];

        }

        return $regtab;

      }else return array();

    }else return array();

  }

  protected function updateError()
  {
    $this->editing();
    return true;
  }

  public function editing()
  {
    $this->tablas = Documentos::getTablas();

    $nomtab = $this->dftabtip->getNomtab();

    if($nomtab){
      $this->campos = $this->getCampos($nomtab);
    } else $this->campos = array();


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


      $this->tablas = Documentos::getTablas();
    }
  }

  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->dftabtip = $this->getDftabtipOrCreate();
    $this->updateDftabtipFromRequest();
    $this->editing();

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
        $this->updateError();
      }
    }
    return sfView::SUCCESS;
  }


}
