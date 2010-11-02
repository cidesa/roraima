<?php

/**
 * forotrcrepre actions.
 *
 * @package    siga
 * @subpackage forotrcrepre
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forotrcrepreActions extends autoforotrcrepreActions
{

  public function executeIndex()
  {
    return $this->forward('forotrcrepre', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridPartidas();
    $this->configGridPeriodos();
    $this->configGridFueFin();
    $this->configGridOrganismo();
  }

  public function configGridPartidas($codcat='')
  {
    $c = new Criteria();
    $c->add(ForotrcreprePeer::CODCAT,$codcat);
    $partidas = ForotrcreprePeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forotrcrepre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas');

    $mascarapar=$this->forotrcrepre->getMascarapar();
    $lonpar=strlen($mascarapar);
    
    $obj= array('codparegr' => 1, 'nomparegr' => 2);
    $params= array('param1' => $lonpar, 'val2');
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonpar.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapar.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'2\',getUrlModulo()+\'ajax\',this.value,\'\',\'&longitud=\'+$(\'forotrcrepre_longitud\').value+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][0]->setCatalogo('fordefparegr','sf_admin_edit_form',$obj,'Fordefparegr_Codparegr',$params);

    $this->objpar =$this->columnas[0]->getConfig($partidas);

    $this->forotrcrepre->setObjpar($this->objpar);
  }

  public function configGridPeriodos($arreglo=array())
  {
    $periodos = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forotrcrepre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_periodos');
    
    $this->objper =$this->columnas[0]->getConfig($periodos);

    $this->forotrcrepre->setObjper($this->objper);
  }

  public function configGridFueFin($arreglo=array())
  {
    $fuentes = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forotrcrepre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fuentefin');

    $this->objfin =$this->columnas[0]->getConfig($fuentes);

    $this->forotrcrepre->setObjfin($this->objfin);
  }

  public function configGridOrganismo($codcat='',$codpar='')
  {
    $c = new Criteria();
    $c->add(ForotrdistraPeer::CODCAT,$codcat);
    $c->add(ForotrdistraPeer::CODPAREGR,$codpar);
    $organismos = ForotrdistraPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forotrcrepre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_organismos');

    $this->objorg =$this->columnas[0]->getConfig($organismos);

    $this->forotrcrepre->setObjorg($this->objorg);
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
             $g->add(ForotrcreprePeer::CODCAT,$codigo);
             $result= ForotrcreprePeer::doSelectOne($g);
             if ($result)
             {
               $this->params=array();
               $this->forotrcrepre = $this->getForotrcrepreOrCreate();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridPartidas($codigo);
               $javascript="$('elimi').show();";
               $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

             }else {
               $this->params=array();
               $this->forotrcrepre = $this->getForotrcrepreOrCreate();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridPartidas();
               $javascript="$('elimi').hide();";
               $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');               
             }
           }else {
               $this->params=array();
               $this->forotrcrepre = $this->getForotrcrepreOrCreate();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridPartidas();
               $javascript="alert_('La Categoria debe ser de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); $('elimi').hide();";

             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');             
           }
         }else {
             $this->params=array();
             $this->forotrcrepre = $this->getForotrcrepreOrCreate();
             $this->labels = $this->getLabels();
             $this->numajax='1';
             $this->configGridPartidas();
             $javascript="alert_('La Categoria no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); $('elimi').hide();";
             
             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             return sfView::HEADER_ONLY;
         }        
        break;
      case '2':
          $g= new Criteria();
          $g->add(FordefparegrPeer::CODPAREGR,$codigo);
          $result= FordefparegrPeer::doSelectOne($g);
          if ($result)
          {
            if (strlen($codigo)==strlen(H::getObtener_FormatoPartida_Formulacion())){
             $dato=$result->getNomparegr();
             $javascript="validarpartidarepetida('".$cajtexcom."')";
            }else {
                $javascript="alert('La Partida no es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); ";
            }
          }else{
            $javascript="alert('La Partida no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); ";
          }
          
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
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
      case '5':
          $codcat=$this->getRequestParameter('categoria');
          $codpar=$this->getRequestParameter('partida');
          $cadena=$this->getRequestParameter('cadena');
          $colmon=$this->getRequestParameter('colmon');
          $filper=$this->getRequestParameter('filper');

          $arreglo=Formulacion::cargarPeriodos($codcat,$codpar,$cadena,&$acum);
          $this->params=array();
          $this->forotrcrepre = $this->getForotrcrepreOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='5';

          $this->configGridPeriodos($arreglo);

          $javascript="$('divgridper').show(); $('divgridpar').hide();";

          $output = '[["'.$colmon.'","'.$acum.'",""],["forotrcrepre_filper","'.$filper.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '6':
          $codcat=$this->getRequestParameter('categoria');
          $codpar=$this->getRequestParameter('partida');
          $cadena=$this->getRequestParameter('cadena');
          $colmon=$this->getRequestParameter('colmon');
          $filfin=$this->getRequestParameter('filfin');

          $arreglo=Formulacion::cargarFuentes($codcat, $codpar, $cadena);
          $this->params=array();
          $this->forotrcrepre = $this->getForotrcrepreOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='6';

          $this->configGridFueFin($arreglo);

          $javascript="$('divgridfue').show(); $('divgridpar').hide();";

          $output = '[["forotrcrepre_filfin","'.$filfin.'",""],["forotrcrepre_totfil","'.count($arreglo).'",""],["javascript","'.$javascript.'",""]]';
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
          $codpar=$this->getRequestParameter('partida');
          $cadena=$this->getRequestParameter('cadena');
          $filorg=$this->getRequestParameter('filorg');

          $this->params=array();
          $this->forotrcrepre = $this->getForotrcrepreOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='8';

          $this->configGridOrganismo($codcat, $codpar);

          $javascript="$('divgridorg').show(); $('divgridpar').hide();";

          $output = '[["forotrcrepre_filorg","'.$filorg.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '9':
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
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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

    $gridpar = Herramientas::CargarDatosGridv2($this,$this->objpar);
    $gridper = Herramientas::CargarDatosGridv2($this,$this->objper);
    $gridfue = Herramientas::CargarDatosGridv2($this,$this->objfue);
    $gridorg = Herramientas::CargarDatosGridv2($this,$this->objorg);

  }

  public function saving($clasemodelo)
  {
    $gridpar = Herramientas::CargarDatosGridv2($this,$this->objpar);

    Formulacion::grabarOtrosCreditos($clasemodelo,$gridpar);

    return -1;
  }

  public function executeAnular()
  {
    $codcat=$this->getRequestParameter('codcat');
    $h= new Criteria();
    $h->add(ForotrcreprePeer::CODCAT,$codcat);
    $resul= ForotrcreprePeer::doSelect($h);
    if ($resul)
    {
      foreach ($resul as $obj)
      {
         $a= new Criteria();
         $a->add(ForperotrcrePeer::CODCAT,$codcat);
         $a->add(ForperotrcrePeer::CODPAREGR,$obj->getCodparegr());
         ForperotrcrePeer::doDelete($a);

         $b= new Criteria();
         $b->add(ForfinotrcrePeer::CODCAT,$codcat);
         $b->add(ForfinotrcrePeer::CODPAREGR,$obj->getCodparegr());
         ForfinotrcrePeer::doDelete($b);

         $c= new Criteria();
         $c->add(ForotrdistraPeer::CODCAT,$codcat);
         $c->add(ForotrdistraPeer::CODPAREGR,$obj->getCodparegr());
         ForotrdistraPeer::doDelete($c);
         $obj->delete();
      }

      $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('forotrcrepre/edit');
    }else {
        $this->setFlash('notice','El Registro no existe');
    return $this->redirect('forotrcrepre/edit');
    }
  }


}
