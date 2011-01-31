<?php

/**
 * forpreobr actions.
 *
 * @package    siga
 * @subpackage forpreobr
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forpreobrActions extends autoforpreobrActions
{

  public function executeIndex()
  {
    return $this->forward('forpreobr', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridObras();
    $this->configGridPeriodos();
    $this->configGridFueFin();
    $this->configGridOrganismo();
  }

  public function configGridObras($codcat='')
  {
    $c = new Criteria();
    $c->add(ForpreobrPeer::CODCAT,$codcat);
    $obras = ForpreobrPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forpreobr/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_obras');

    $this->objobr =$this->columnas[0]->getConfig($obras);

    $this->forpreobr->setObjobr($this->objobr);
  }

  public function configGridPeriodos($arreglo=array())
  {
    $periodos = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forpreobr/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_periodos');

    $this->objper =$this->columnas[0]->getConfig($periodos);

    $this->forpreobr->setObjper($this->objper);
  }

  public function configGridFueFin($arreglo=array())
  {
    $fuentes = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forpreobr/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fuentefin');

    $this->objfin =$this->columnas[0]->getConfig($fuentes);

    $this->forpreobr->setObjfin($this->objfin);
  }

  public function configGridOrganismo($codcat='',$codobr='',$codpar='')
  {
    $c = new Criteria();
    $c->add(ForobrdistraPeer::CODCAT,$codcat);
    $c->add(ForobrdistraPeer::CODOBR,$codobr);
    $c->add(ForobrdistraPeer::CODPAREGR,$codpar);
    $organismos = ForobrdistraPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forpreobr/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_organismos');

    $this->objorg =$this->columnas[0]->getConfig($organismos);

    $this->forpreobr->setObjorg($this->objorg);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript = "";  $dato="";
    $this->numajax='';
    switch ($ajax){
      case '1':
         $t=new Criteria();
         $t->add(FordefcatprePeer::CODCAT,$codigo);
         $reg= FordefcatprePeer::doSelectOne($t);
         if ($reg)
         {
           if (strlen($codigo)==$this->getRequestParameter('longitud')) {
             $dato=$reg->getNomcat();

             $g= new Criteria();
             $g->add(ForpreobrPeer::CODCAT,$codigo);
             $result= ForpreobrPeer::doSelectOne($g);
             if ($result)
             {
               $this->params=array();
               $this->forpreobr = $this->getForpreobrOrCreate();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridObras($codigo);
               $javascript="$('elimi').show();";
               $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

             }else {
               $this->params=array();
               $this->forpreobr = $this->getForpreobrOrCreate();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridObras();
               $javascript="$('elimi').hide();";
               $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             }
           }else {
               $this->params=array();
               $this->forpreobr = $this->getForpreobrOrCreate();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridObras();
               $javascript="alert_('La Categoria debe ser de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); $('elimi').hide();";

             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

           }
         }else {
               $this->params=array();
               $this->forpreobr = $this->getForpreobrOrCreate();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridObras();
               $javascript="alert_('La Categoria no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); $('elimi').hide();";

             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             return sfView::HEADER_ONLY;
         }
        break;
      case '2':
          $partida=$this->getRequestParameter('partida');
          $dato1="";
          $g= new Criteria();
          $g->add(FordefobrPeer::CODOBR,$codigo);
          $result= FordefobrPeer::doSelectOne($g);
          if ($result)
          {            
             $dato=$result->getNomobr();
             $dato1=$result->getCodparegr();
          }else{
            $javascript="alert('La Obra no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); ";
          }

          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$partida.'","'.$dato1.'",""],["javascript","'.$javascript.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        break;
      case '3':
          $g= new Criteria();
          $g->add(FortiptitPeer::CODTIP,$codigo);
          $result= FortiptitPeer::doSelectOne($g);
          if ($result)
          {
            $dato=$result->getDestip();
          }else{
            $javascript="alert('El Tipo de Gasto no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); ";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        break;
      case '4':
          $g= new Criteria();
          $g->add(FordeforgpubPeer::CODORG,$codigo);
          $result= FordeforgpubPeer::doSelectOne($g);
          if ($result)
          {
            $dato=$result->getNomorg();
          }else{
            $javascript="alert('El Organismo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); ";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        break;
      case '5':
          $codcat=$this->getRequestParameter('categoria');
          $codobr=$this->getRequestParameter('obra');
          $codpar=$this->getRequestParameter('partida');
          $cadena=$this->getRequestParameter('cadena');
          $colmon=$this->getRequestParameter('colmon');
          $filper=$this->getRequestParameter('filper');

          $arreglo=Formulacion::cargarPeriodosObras($codcat,$codobr,$codpar,$cadena,&$acum);
          $this->params=array();
          $this->forpreobr = $this->getForpreobrOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='5';

          $this->configGridPeriodos($arreglo);

          $javascript="$('divgridper').show(); $('divgridobr').hide();";

          $output = '[["'.$colmon.'","'.$acum.'",""],["forpreobr_filper","'.$filper.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          break;
      case '6':
          $codcat=$this->getRequestParameter('categoria');
          $codobr=$this->getRequestParameter('obra');
          $codpar=$this->getRequestParameter('partida');
          $cadena=$this->getRequestParameter('cadena');
          $colmon=$this->getRequestParameter('colmon');
          $filfin=$this->getRequestParameter('filfin');

          $arreglo=Formulacion::cargarFuentesObras($codcat, $codobr, $codpar, $cadena);
          $this->params=array();
          $this->forpreobr = $this->getForpreobrOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='6';

          $this->configGridFueFin($arreglo);

          $javascript="$('divgridfue').show(); $('divgridobr').hide();";

          $output = '[["forpreobr_filfin","'.$filfin.'",""],["forpreobr_totfil","'.count($arreglo).'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          break;
      case '7':
          $montopre=$this->getRequestParameter('montopre');
          $totfin=$this->getRequestParameter('totfin');
          $monfin=$this->getRequestParameter('monfin');
          $codfin=$this->getRequestParameter('codfin');
          $codcat=$this->getRequestParameter('categoria');

          if (Formulacion::chequearDispIngresos($monfin,$codfin,$codcat))
          {
            if ($montopre!=$totfin)
            {
                $resta=$montopre-$totfin;
                if ($resta<0)
                {
                    $neg=$resta*-1;
                    $javascript="alert('Monto de la Fuente de Financiamiento se excede por $neg Bs. del Monto Presupuestado'); $('$codigo').value='0,00';";
                }
            }
          }else {
              $javascript="alert('Monto de la Fuente de Financiamiento se excede del Monto Disponible'); $('$codigo').value='0,00';";
          }

          $output = '[["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;

          break;
      case '8':
          $codcat=$this->getRequestParameter('categoria');
          $codobr=$this->getRequestParameter('obra');
          $codpar=$this->getRequestParameter('partida');
          $cadena=$this->getRequestParameter('cadena');
          $filorg=$this->getRequestParameter('filorg');

          $this->params=array();
          $this->forpreobr = $this->getForpreobrOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='8';

          $this->configGridOrganismo($codcat, $codobr, $codpar);

          $javascript="$('divgridorg').show(); $('divgridobr').hide();";

          $output = '[["forpreobr_filorg","'.$filorg.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }
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

    $gridobr = Herramientas::CargarDatosGridv2($this,$this->objobr);
    $gridper = Herramientas::CargarDatosGridv2($this,$this->objper);
    $gridfue = Herramientas::CargarDatosGridv2($this,$this->objfue);
    $gridorg = Herramientas::CargarDatosGridv2($this,$this->objorg);
  }

  public function saving($clasemodelo)
  {
    $gridobr = Herramientas::CargarDatosGridv2($this,$this->objobr);

    Formulacion::grabarForObras($clasemodelo,$gridobr);

    return -1;
  }

  public function executeAnular()
  {
    $codcat=$this->getRequestParameter('codcat');
    $h= new Criteria();
    $h->add(ForpreobrPeer::CODCAT,$codcat);
    $resul= ForpreobrPeer::doSelect($h);
    if ($resul)
    {
      foreach ($resul as $obj)
      {
         $a= new Criteria();
         $a->add(ForperobrPeer::CODCAT,$codcat);
         $a->add(ForperobrPeer::CODOBR,$obj->getCodobr());
         $a->add(ForperobrPeer::CODPAREGR,$obj->getCodparegr());
         ForperobrPeer::doDelete($a);

         $b= new Criteria();
         $b->add(ForfinobrPeer::CODCAT,$codcat);
         $b->add(ForfinobrPeer::CODOBR,$obj->getCodobr());
         $b->add(ForfinobrPeer::CODPAREGR,$obj->getCodparegr());
         ForfinobrPeer::doDelete($b);

         $c= new Criteria();
         $c->add(ForobrdistraPeer::CODCAT,$codcat);
         $c->add(ForobrdistraPeer::CODOBR,$obj->getCodobr());
         $c->add(ForobrdistraPeer::CODPAREGR,$obj->getCodparegr());
         ForobrdistraPeer::doDelete($c);
         $obj->delete();
      }

      $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('forpreobr/edit');
    }else {
        $this->setFlash('notice','El Registro no existe');
    return $this->redirect('forpreobr/edit');
    }
  }

}
