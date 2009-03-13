<?php

/**
 * cobtransa actions.
 *
 * @package    siga
 * @subpackage cobtransa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class cobtransaActions extends autocobtransaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     if ($this->cobtransa->getId())
     $this->configGrid($this->cobtransa->getCodcli());
     else $this->configGrid($this->getRequestParameter('cobtransa[codcli]'));

     $this->configGridFormaPago();
     $this->cobtransa->afterHydrate();
  }

   public function configGrid($codcli="")
   {
    $reg=array();

    $this->sql=" codcli='" .$codcli."' And (MonDoc + RecDoc - DscDoc - AboDoc) > 0 order by RefDoc";
    $a= new Criteria();
    $a->add(CobdocumePeer::STADOC,'A');
    $a->add(CobdocumePeer::CODCLI,$this->sql,Criteria::CUSTOM);
    $reg= CobdocumePeer::doSelect($a);


    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_documentos');

    //$this->columnas[1][5]->setEsTotal(true,'cobtransa_montra');
     $this->columnas[1][5]->setHTML('onBlur=javascript: ValidarMontoGridv2(this);CalculaTotales(this); ');

    $this->objdocumentos = $this->columnas[0]->getConfig($reg);
    $this->cobtransa->setObjdocumentos($this->objdocumentos);
  }

   public function configGridFormaPago()
   {
    $reg=array();
    $a= new Criteria();
    $reg= FatippagPeer::doSelect($a);


    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_formapago');
    $this->objformapagos = $this->columnas[0]->getConfig($reg);
    $this->cobtransa->setObjformapagos($this->objformapagos);
  }


  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
   case '1':
          $cajnompro = 'cobtransa_nompro';
          $cajrifpro = 'cobtransa_rifpro';
          $cajcodcli = 'cobtransa_codcli';


          $c = new Criteria();
          $c->add(FaclientePeer::CODPRO,$codigo);

          $cliente = FaclientePeer::doSelectOne($c);

          if($cliente){
           //$sql="Select * From CobDocume Where  ='" .$codigo."' And (MonDoc + RecDoc - DscDoc - AboDoc) > 0 and StaDoc='A' order by RefDoc";
           $this->sql=" codcli='".$codigo."' And (MonDoc + RecDoc - DscDoc - AboDoc) > 0 order by RefDoc";
           $a= new Criteria();
		   $a->add(CobdocumePeer::STADOC,'A');
		   $a->add(CobdocumePeer::CODCLI,$this->sql,Criteria::CUSTOM);
		   $result= CobdocumePeer::doSelect($a);
           if ($result)
           {
           	$rifpro = $cliente->getRifpro();
        	$nompro = $cliente->getNompro();
            $output = '[["'.$cajrifpro.'","'.$rifpro.'",""],["'.$cajnompro.'","'.$nompro.'",""]]';
           }
           else
           {
           	$javascript="alert('No existen documentos por pagar para el Cliente o Empleado')";
           	$output = '[["'.$cajcodcli.'","",""],["'.$cajrifpro.'","",""],["'.$cajnompro.'","",""],["javascript","'.$javascript.'",""]]';
           }

          }
          else{
          	$javascript="alert('El Cliente no esta registrado')";
            $output = '[["'.$cajcodcli.'","",""],["'.$cajrifpro.'","",""],["'.$cajnompro.'","",""],["javascript","'.$javascript.'",""]]';
          }
        $this->cobtransa = $this->getCobtransaOrCreate();
        $this->configGrid($codigo);
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  public function handleErrorEdit()
  {
    $this->updateError();


    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);

      }
    }
    return sfView::SUCCESS;
  }
}
