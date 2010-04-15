<?php

/**
 * doctab actions.
 *
 * @package    Roraima
 * @subpackage doctab
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateError()
  {
    $this->editing();
    return true;
  }

  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
    $this->tablas = Documentos::getTablas();

    $nomtab = $this->dftabtip->getNomtab();

    if($nomtab){
      $this->campos = $this->getCampos($nomtab);
    } else $this->campos = array();


  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
