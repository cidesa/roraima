<?php

/**
 * tesdeffonant actions.
 *
 * @package    siga
 * @subpackage tesdeffonant
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesdeffonantActions extends autotesdeffonantActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $camcatejeadm=H::getConfApp2('camcatejeadm', 'tesoreria', 'tesdeffonant');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
          if ($camcatejeadm=='S')
          {
              $r= new Criteria();
              $r->add(CadefcenPeer::CODCEN,$codigo);
              $reg= CadefcenPeer::doSelectOne($r);
              if ($reg)
              {
                $dato=$reg->getDescen();
              }else {
                $js="alert('La Unidad Ejecutora no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }else {
              $r= new Criteria();
              $r->add(BnubicaPeer::CODUBI,$codigo);
              $reg= BnubicaPeer::doSelectOne($r);
              if ($reg)
              {
                $dato=$reg->getDesubi();
              }else {
                $js="alert('La Unidad Ejecutora no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        if ($camcatejeadm=='S')
          {
              $r= new Criteria();
              $r->add(BnubicaPeer::CODUBI,$codigo);
              $reg= BnubicaPeer::doSelectOne($r);
              if ($reg)
              {
                $dato=$reg->getDesubi();
              }else {
                $js="alert('La Unidad Administradora no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }else {
              $r= new Criteria();
              $r->add(TsuniadmPeer::CODUNIADM,$codigo);
              $reg= TsuniadmPeer::doSelectOne($r);
              if ($reg)
              {
                $dato=$reg->getDesuniadm();
              }else {
                $js="alert('La Unidad Administradora no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;


  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->tsdeffonant = $this->getTsdeffonantOrCreate();
        $this->updateTsdeffonantFromRequest();

        $camcatejeadm=H::getConfApp2('camcatejeadm', 'tesoreria', 'tesdeffonant');

        if ($camcatejeadm=='S')
        {
          $r= new Criteria();
          $r->add(CadefcenPeer::CODCEN,$this->getRequestParameter('tsdeffonant[unieje]'));
          $reg= CadefcenPeer::doSelectOne($r);
          if (!$reg)
          {
              $this->coderr=582;
              return false;
          }

          $r= new Criteria();
          $r->add(BnubicaPeer::CODUBI,$this->getRequestParameter('tsdeffonant[coduniadm]'));
          $reg= BnubicaPeer::doSelectOne($r);
          if (!$reg)
          {
            $this->coderr=583;
            return false;
          }
        }else {
              $r= new Criteria();
              $r->add(BnubicaPeer::CODUBI,$this->getRequestParameter('tsdeffonant[unieje]'));
              $reg= BnubicaPeer::doSelectOne($r);
              if (!$reg)
              {
                $this->coderr=582;
                return false;
              }

              $r= new Criteria();
              $r->add(TsuniadmPeer::CODUNIADM,$this->getRequestParameter('tsdeffonant[coduniadm]'));
              $reg= TsuniadmPeer::doSelectOne($r);
              if (!$reg)
              {
                $this->coderr=583;
                return false;
              }
        }

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


}
