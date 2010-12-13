<?php

/**
 * nomforcargosesp actions.
 *
 * @package    siga
 * @subpackage nomforcargosesp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomforcargosespActions extends autonomforcargosespActions
{
  public function executeIndex()
  {
    return $this->redirect('nomforcargosesp/edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();

  }

  public function configGrid()
  {
    $this->configGridEmp();
    $this->configGridEmpCon();
  }

  public function configGridEmpCon($arreglo=array())
  {
    $concepts = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomforcargosesp/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_conceptos');

    $this->obj1 =$this->columnas[0]->getConfig($concepts);

    $this->npcatnomemp->setObj1($this->obj1);
  }

  public function configGridEmp($codcat='', $codnom='')
  {
    $c = new Criteria();
    $c->add(NpcatnomempPeer::CODCAT,$codcat);
    $c->add(NpcatnomempPeer::CODNOM,$codnom);
    $detalle = NpcatnomempPeer::doSelect($c);
    if (!$detalle)
    {
        $t= new Criteria();
        $t->add(NpasicarempPeer::CODNOM,$codnom);
        $t->add(NpasicarempPeer::STATUS,'V');
        $reg= NpasicarempPeer::doSelect($t);
        if ($reg)
        {
            foreach ($reg as $obj)
            {
              $npcatnomemp2= new Npcatnomemp();
              $npcatnomemp2->setCodemp($obj->getCodemp());
              $npcatnomemp2->setNomemp($obj->getNomemp());
              $npcatnomemp2->setCodcar($obj->getCodcar());
              $npcatnomemp2->setNomcar($obj->getNomcar());
              $detalle[]=$npcatnomemp2;
            }
        }

    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomforcargosesp/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empleados');

    $this->obj2 =$this->columnas[0]->getConfig($detalle);

    $this->npcatnomemp->setObj2($this->obj2);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript = "";  $dato="";

    switch ($ajax){
      case '1':
         $t=new Criteria();
         $t->add(FordefcatprePeer::CODCAT,$codigo);
         $reg= FordefcatprePeer::doSelectOne($t);
         if ($reg)
         {
           if (strlen($codigo)==$this->getRequestParameter('longitud')) {
             $dato=$reg->getNomcat();
           }else {
               $javascript="alert_('La Categoria debe ser de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
           }
         }else {
          $javascript="alert_('La Categoria no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
         $t=new Criteria();
         $t->add(NpnominaPeer::CODNOM,$codigo);
         $reg= NpnominaPeer::doSelectOne($t);
         if ($reg)
         {
             $dato=$reg->getNomnom();             
         }else{
             $javascript="alert('La NÃ³mina no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }

         $this->params=array();
         $this->ajaxs=1;
         $this->npcatnomemp = $this->getNpcatnomempOrCreate();
         $this->labels = $this->getLabels();
         $this->configGridEmp($this->getRequestParameter('categoria'),$codigo);

         $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
         $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '3':
        $codcat=$this->getRequestParameter('categoria');
        $fil=$this->getRequestParameter('fil');
        $codnom=$this->getRequestParameter('nomina');
        $codemp=$this->getRequestParameter('empleado');
        $codcar=$this->getRequestParameter('cargo');
        $cadenacon=$this->getRequestParameter('cadenacon');

        $arreglo=Nomina::arregloConceptosCal($codcat,$codnom,$codemp,$codcar,$cadenacon);
        $this->params=array();
        $this->ajaxs=2;
        $this->npcatnomemp = $this->getNpcatnomempOrCreate();
        $this->labels = $this->getLabels();
        $this->configGridEmpCon($arreglo);

        $javascript="$('divgrid1').show();";

        $output = '[["npcatnomemp_fila","'.$fil.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '4':
         $t=new Criteria();
         $t->add(NpdefcptPeer::CODCON,$codigo);
         $reg= NpdefcptPeer::doSelectOne($t);
         if ($reg)
         {
             $dato=$reg->getNomcon();
         }else {
          $javascript="alert_('La Concepto no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '5':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
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

    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
  }

  public function saving($clasemodelo)
  {
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    Nomina::grabarFormulacionCargosEmp($clasemodelo,$grid2);
    return -1;
  }

}
