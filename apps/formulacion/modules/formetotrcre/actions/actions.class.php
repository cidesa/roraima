<?php

/**
 * formetotrcre actions.
 *
 * @package    siga
 * @subpackage formetotrcre
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class formetotrcreActions extends autoformetotrcreActions
{
  protected $act = "";

  public function executeIndex()
  {
    return $this->forward('formetotrcre', 'edit');
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

  public function configGridPartidas($codmet='',$codpro='')
  {
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formetotrcre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas');

    $c = new Criteria();
    $c->add(FormetotrcrePeer::CODMET,$codmet);
    $c->add(FormetotrcrePeer::CODPRO,$codpro);
    $costo = FormetotrcrePeer::doSelect($c);
    if (!$costo)
    {
        $c = new Criteria();
        $c->add(ForasoactproPeer::CODMET,$codmet);
        $c->add(ForasoactproPeer::CODPRO,$codpro);
        $cos = ForasoactproPeer::doSelect($c);
        if ($cos)
        {
            foreach ($cos as $obj)
            {
              $formetotrcre2= new Formetotrcre();
              $formetotrcre2->setCodact($obj->getCodact());
              $formetotrcre2->setDesact(H::getX('CODACT','Fordefact','Desact',$obj->getCodact()));
              $costo[]=$formetotrcre2;
            }

        }       
    }

    $mascarapar=$this->formetotrcre->getMascarapar();
    $lonpar=strlen($mascarapar);

    $obj= array('codparegr' => 4, 'nomparegr' => 5);
    $params= array('param1' => $lonpar, 'val2');
    $this->columnas[1][3]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonpar.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapar.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&longitud=\'+$(\'formetotrcre_longitud\').value+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][3]->setCatalogo('fordefparegr','sf_admin_edit_form',$obj,'Fordefparegr_Codparegr',$params);

    $this->obj =$this->columnas[0]->getConfig($costo);

    $this->formetotrcre->setObj($this->obj);
  }

  public function configGridPeriodos($arreglo=array())
  {
    $periodos = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formetotrcre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_periodos');

    $this->objper =$this->columnas[0]->getConfig($periodos);

    $this->formetotrcre->setObjper($this->objper);
  }

  public function configGridFueFin($arreglo=array())
  {
    $fuentes = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formetotrcre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fuentefin');

    $this->objfin =$this->columnas[0]->getConfig($fuentes);

    $this->formetotrcre->setObjfin($this->objfin);
  }

  public function configGridOrganismo($codmet='', $codpro='', $codact='', $codpar='')
  {
    $c = new Criteria();
    $c->add(FormetdistraPeer::CODMET,$codmet);
    $c->add(FormetdistraPeer::CODPRO,$codpro);
    $c->add(FormetdistraPeer::CODACT,$codact);
    $c->add(FormetdistraPeer::CODPAREGR,$codpar);
    $organismos = FormetdistraPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formetotrcre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_organismos');

    $this->objorg =$this->columnas[0]->getConfig($organismos);

    $this->formetotrcre->setObjorg($this->objorg);
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
         $u= new Criteria();
         $u->add(FordefmetPeer::CODMET,$codigo);
         $result= FordefmetPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getDesmet();
         }else $javascript="alert_('La Acci&oacute;n no Existe'); $('formetotrcre_codmet').value=''; $('formetotrcre_codmet').focus();";

         $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
         $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
         return sfView::HEADER_ONLY;
        break;
      case '2':
         $meta = $this->getRequestParameter('meta');
         $u= new Criteria();
         $u->add(FordefproPeer::CODPRO,$codigo);
         $reg= FordefproPeer::doSelectOne($u);
         if ($reg)
         {
           $p= new Criteria();
           $p->add(ForasoprometPeer::CODMET,$meta);
           $p->add(ForasoprometPeer::CODPRO,$codigo);
           $resul= ForasoprometPeer::doSelectOne($p);
           if ($resul) {
               $dato=$reg->getDespro();
           }else {
             $javascript="alert_('La Unidad de Medida no esta asociado a la acci&oacute;n seleccionada'); $('formetotrcre_codpro').value=''; $('formetotrcre_codpro').focus(); ";
             $meta="";
             $codigo="";
           }
         }else {
             $javascript="alert_('La Unidad de Medida no existe'); $('formetotrcre_codpro').value=''; $('formetotrcre_codpro').focus(); ";
             $meta="";
             $codigo="";
         }
           $this->params=array();
           $this->formetotrcre = $this->getFormetotrcreOrCreate();
           $this->updateFormetotrcreFromRequest();
           $this->labels = $this->getLabels();
           $this->numajax='1';
           $this->configGridPartidas($meta,$codigo);

           $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
           $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '3':
          $g= new Criteria();
          $g->add(FordefparegrPeer::CODPAREGR,$codigo);
          $result= FordefparegrPeer::doSelectOne($g);
          if ($result)
          {
            if (strlen($codigo)==strlen(H::getObtener_FormatoPartida_Formulacion())){
             $dato=$result->getNomparegr();
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
      case '6':
          $meta=$this->getRequestParameter('meta');
          $producto=$this->getRequestParameter('producto');
          $actividad=$this->getRequestParameter('actividad');
          $cadena=$this->getRequestParameter('cadena');
          $partida=$this->getRequestParameter('partida');
          $filper=$this->getRequestParameter('filper');
          $colmon=$this->getRequestParameter('colmon');

          $arreglo=Formulacion::cargarPeriodosOtrCre($meta,$producto,$actividad,$partida,$cadena,&$acum);
          $this->params=array();
          $this->formetotrcre = $this->getFormetotrcreOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='5';

          $this->configGridPeriodos($arreglo);

          $javascript="$('divgridper').show(); $('divgrid').hide();";

          $output = '[["'.$colmon.'","'.$acum.'",""],["formetotrcre_filper","'.$filper.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '7':
          $meta=$this->getRequestParameter('meta');
          $producto=$this->getRequestParameter('producto');
          $actividad=$this->getRequestParameter('actividad');
          $cadena=$this->getRequestParameter('cadena');
          $partida=$this->getRequestParameter('partida');
          $filfin=$this->getRequestParameter('filfin');

          $arreglo=Formulacion::cargarFuentesOtrCre($meta, $producto, $actividad, $partida, $cadena);
          $this->params=array();
          $this->formetotrcre = $this->getFormetotrcreOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='6';

          $this->configGridFueFin($arreglo);

          $javascript="$('divgridfue').show(); $('divgrid').hide();";

          $output = '[["formetotrcre_filfin","'.$filfin.'",""],["formetotrcre_totfil","'.count($arreglo).'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '8':
          $montopre=H::toFloat($this->getRequestParameter('montopre'));
          $totfin=H::toFloat($this->getRequestParameter('totfin'));
          $monfin=H::toFloat($this->getRequestParameter('monfin'));
          $codfin=$this->getRequestParameter('codfin');
          if (Formulacion::chequearDispIngresosOtrCre($monfin,$codfin))
          {
            if ($montopre!=$totfin)
            {
                $resta=$montopre-$totfin;
                if ($resta<0)
                {
                    $neg=$resta*-1;
                    $javascript="alert('Monto de la Fuente de Financiamiento se excede por $neg Bs. del Monto Presupuestado');  $('$codigo').value='0,00';";
                }
            }
          }else {
              $javascript="alert('Monto de la Fuente de Financiamiento se excede del Monto Disponible'); $('$codigo').value='0,00';";
          }

          $output = '[["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;
      case '9':
          $meta=$this->getRequestParameter('meta');
          $producto=$this->getRequestParameter('producto');
          $actividad=$this->getRequestParameter('actividad');
          $codpar=$this->getRequestParameter('partida');
          $cadena=$this->getRequestParameter('cadena');
          $filorg=$this->getRequestParameter('filorg');

          $this->params=array();
          $this->formetotrcre = $this->getFormetotrcreOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='8';

          $this->configGridOrganismo($meta, $producto, $actividad, $codpar);

          $javascript="$('divgridorg').show(); $('divgrid').hide();";

          $output = '[["formetotrcre_filorg","'.$filorg.'",""],["javascript","'.$javascript.'",""]]';
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
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
    $this->act ="";

    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->formetotrcre = $this->getFormetotrcreOrCreate();
        $this->updateFormetotrcreFromRequest();
        $this->configGridPartidas($this->formetotrcre->getCodmet(),$this->formetotrcre->getCodpro());
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
       if ($x[$j]->getCanact()!=0 && $x[$j]->getCodparegr()!='')
       {
          $this->act=$x[$j]->getCodact();
          if ($x[$j]->getMonpre()==0)
          {
            $this->coderr=329;
            break;
          }
          if ($x[$j]->getCodtip()=='')
          {
            $this->coderr=331;
            break;
          }
       }
       $j++;
    }
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
    $gridpar = Herramientas::CargarDatosGridv2($this,$this->obj);
    $gridper = Herramientas::CargarDatosGridv2($this,$this->objper);
    $gridfue = Herramientas::CargarDatosGridv2($this,$this->objfue);
    $gridorg = Herramientas::CargarDatosGridv2($this,$this->objorg);
  }

  public function saving($clasemodelo)
  {
    $gridpar = Herramientas::CargarDatosGridv2($this,$this->obj);
    Formulacion::grabarOtrosCreditosPresupuestarios($clasemodelo,$gridpar);

    return -1;
  }

  /**
   * FunciÃ³n para manejar la captura de errores del negocio, tanto que se
   * produzcan por algÃºn validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->formetotrcre = $this->getFormetotrcreOrCreate();
    $this->updateFormetotrcreFromRequest();
    $this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err." ".$this->act);
      }
    }
    return sfView::SUCCESS;
  }


}
