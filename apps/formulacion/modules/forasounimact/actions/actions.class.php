<?php

/**
 * forasounimact actions.
 *
 * @package    siga
 * @subpackage forasounimact
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forasounimactActions extends autoforasounimactActions
{

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/forasoactpro/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Forasoactpro', 15);
    $c = new Criteria();

    $c->addSelectColumn(ForasoactproPeer::CODMET);
    $c->addSelectColumn(ForasoactproPeer::CODPRO);
    $c->addSelectColumn("'' AS CODACT");
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(ForasoactproPeer::CODMET);
    $c->addGroupByColumn(ForasoactproPeer::CODPRO);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridActividades($this->forasoactpro->getCodmet(),$this->forasoactpro->getCodpro());
  }

   public function configGridActividades($codmet='',$codpro='')
  {
    $c = new Criteria();
    $c->add(ForasoactproPeer::CODMET,$codmet);
    $c->add(ForasoactproPeer::CODPRO,$codpro);
    $actividades = ForasoactproPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forasounimact/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_actividades');

    $this->obj =$this->columnas[0]->getConfig($actividades);

    $this->forasoactpro->setObj($this->obj);
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
         $u->add(FordefmetPeer::CODMET,$codigo);
         $result= FordefmetPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getDesmet();
         }else $javascript="alert_('La Acci&oacute;n no Existe'); $('forasoactpro_codmet').value=''; $('forasoactpro_codmet').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
         $meta = $this->getRequestParameter('meta');
         $u= new Criteria();
         $u->add(FordefproPeer::CODPRO,$codigo);
         $result= FordefproPeer::doSelectOne($u);
         if ($result)
         {
             $p= new Criteria();
             $p->add(ForasoprometPeer::CODMET,$meta);
             $p->add(ForasoprometPeer::CODPRO,$codigo);
             $resul= ForasoprometPeer::doSelectOne($p);
             if ($resul)
               $dato=$result->getDespro();
             else $javascript="alert_('La Unidad de Medida no esta asociado a la acci&oacute;n seleccionada'); $('forasoactpro_codpro').value=''; $('forasoactpro_codpro').focus();";

         }else $javascript="alert_('La Unidad de Medida no Existe'); $('forasoactpro_codpro').value=''; $('forasoactpro_codpro').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '3':
         $u= new Criteria();
         $u->add(FordefactPeer::CODACT,$codigo);
         $result= FordefactPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getDesact();
             $javascript="validaractividadrepetida('".$cajtexcom."')";
         }else $javascript="alert_('La Meta no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
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

        $this->forasoactpro = $this->getForasoactproOrCreate();
        $this->updateForasoactproFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

        if ($this->forasoactpro->getId()==''){
            $o= new Criteria();
            $o->add(ForasoactproPeer::CODMET,$this->getRequestParameter('forasoactpro[codmet]'));
            $o->add(ForasoactproPeer::CODPRO,$this->getRequestParameter('forasoactpro[codpro]'));
            $result=ForasoactproPeer::doSelect($o);
            if ($result)
                $this->coderr=327;

            if (count($grid[0])==0)
                $this->coderr=326;
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Formulacion::grabarMetasProductosActividades($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    $t= new Criteria();
    $t->add(ForasoactproPeer::CODMET,$clasemodelo->getCodmet());
    $t->add(ForasoactproPeer::CODPRO,$clasemodelo->getCodpro());
    ForasoactproPeer::doDelete($t);
    return -1;
  }


}
