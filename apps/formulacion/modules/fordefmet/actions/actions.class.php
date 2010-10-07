<?php

/**
 * fordefmet actions.
 *
 * @package    siga
 * @subpackage fordefmet
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fordefmetActions extends autofordefmetActions
{

  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridProductos($this->fordefmet->getCodmet());
    $this->configGridPeriodos();
  }

   public function configGridProductos($codmet='')
  {
    $c = new Criteria();
    $c->add(ForasoprometPeer::CODMET,$codmet);
    $productos = ForasoprometPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fordefmet/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_productos');

    $this->objpro =$this->columnas[0]->getConfig($productos);

    $this->fordefmet->setObjpro($this->objpro);
  }

  public function configGridPeriodos($arreglo=array())
  {
    $periodos = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fordefmet/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_periodos');
    
    $this->objper =$this->columnas[0]->getConfig($periodos);

    $this->fordefmet->setObjper($this->objper);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
         $u= new Criteria();
         $u->add(NphojintPeer::CODEMP,$codigo);
         $result= NphojintPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getNomemp();
         }else $javascript="alert_('El C&oacute;digo del Funcionario no Existe'); $('fordefmet_codemp').value=''; $('fordefmet_codemp').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
         $u= new Criteria();
         $u->add(FordefproPeer::CODPRO,$codigo);
         $result= FordefproPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getDespro();
             $javascript="verificarrepetido('".$cajtexcom."');";
         }else $javascript="alert_('El C&oacute;digo de la Unidad de Medida no est&aacute; registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '3':
         $u= new Criteria();
         $u->add(NphojintPeer::CODEMP,$codigo);
         $result= NphojintPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getNomemp();
         }else $javascript="alert_('El C&oacute;digo del Funcionario no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '4':
          $codmet=$this->getRequestParameter('meta');
          $codpro=$this->getRequestParameter('producto');
          $cadena=$this->getRequestParameter('cadena');
          $colmon=$this->getRequestParameter('colmon');
          $filper=$this->getRequestParameter('filper');

          $arreglo=Formulacion::cargarPeriodosMet($codmet,$codpro,$cadena,&$acum);
          $this->params=array();
          $this->fordefmet = $this->getFordefmetOrCreate();
          $this->labels = $this->getLabels();
          $this->configGridPeriodos($arreglo);

          $javascript="$('divgridper').show(); $('divgridpro').hide();";

          $output = '[["'.$acum.'","'.$colmon.'",""],["fordefmet_filper","'.$filper.'",""],["javascript","'.$javascript.'",""]]';
          break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($ajax!='4') return sfView::HEADER_ONLY;

  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;

  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->objpro);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->objper);   

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->objpro);
    Formulacion::grabarMetasProductos($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    $l= new Criteria();
    $l->add(ForasoactproPeer::CODMET,$clasemodelo->getCodmet());
    $resul= ForasoactproPeer::doSelect($l);
    if (!$resul)
    {
        $a= new Criteria();
        $a->add(ForasoprometPeer::CODMET,$clasemodelo->getCodmet());
        $result= ForasoprometPeer::doSelect($a);
        if ($result)
        {
            foreach ($result as $obj)
            {
                $q= new Criteria();
                $q->add(FordisperproPeer::CODMET,$clasemodelo->getCodmet());
                $q->add(FordisperproPeer::CODPRO,$obj->getCodpro());
                FordisperproPeer::doDelete($q);

              $obj->delete();
            }
        }

        $clasemodelo->delete();
     return -1;
    }
    else return 319;
  }


}
