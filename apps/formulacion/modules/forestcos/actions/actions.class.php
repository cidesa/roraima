<?php

/**
 * forestcos actions.
 *
 * @package    siga
 * @subpackage forestcos
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forestcosActions extends autoforestcosActions
{
   protected $act = "";

  public function executeIndex()
  {
    return $this->forward('forestcos', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridCostos();
    $this->configGridPeriodos();
    $this->configGridFueFin();
  }

  public function configGridCostos($codmet='',$codpro='')
  {
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forestcos/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_costos');

    $c = new Criteria();
    $c->add(ForestcosPeer::CODMET,$codmet);
    $c->add(ForestcosPeer::CODPRO,$codpro);
    $costo = ForestcosPeer::doSelect($c);
    if (!$costo)
    {
        $c = new Criteria();
        $c->add(ForasoactproPeer::CODMET,$codmet);
        $c->add(ForasoactproPeer::CODPRO,$codpro);
        $costo = ForasoactproPeer::doSelect($c);

        $this->columnas[0]->setTabla('Forasoactpro');
    }else $this->columnas[0]->setTabla('Forestcos');

    $mascaraart=$this->forestcos->getMascaraart();
    $lonart=strlen($mascaraart);

    $obj= array('codart' => 4, 'desart' => 5, 'unimed' => 6, 'codpar' => 7, 'cosult' => 10);
    $params= array('param1' => $lonart, 'val2');                                                                                                                                                                                                                                                //           toAjax(2,getUrlModuloAjax(),this.value,0,'&cajtxtmos='+$(this.id).up().next(0).descendants()[0].id+'&unimed='+$(this.id).up().next(1).descendants()[1].id+'&partida='+$(this.id).up().next(2).descendants()[2].id+'&nompar='+$(this.id).up().next(3).descendants()[3].id+'&monto='+$(this.id).up().next(4).descendants()[4].id+'&cajtxtcom='+this.id)'
    $this->columnas[1][3]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&unimed=\'+$(this.id).up().next(1).descendants()[0].id+\'&partida=\'+$(this.id).up().next(2).descendants()[0].id+\'&nompar=\'+$(this.id).up().next(3).descendants()[0].id+\'&monto=\'+$(this.id).up().next(5).descendants()[0].id+\'&longitud=\'+$(\'forestcos_longitud\').value+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][3]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Forestcos',$params);

    $this->obj =$this->columnas[0]->getConfig($costo);

    $this->forestcos->setObj($this->obj);
  }

  public function configGridPeriodos($arreglo=array())
  {
    $periodos = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forestcos/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_periodos');

    $this->objper =$this->columnas[0]->getConfig($periodos);

    $this->forestcos->setObjper($this->objper);
  }

  public function configGridFueFin($arreglo=array())
  {
    $fuentes = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forestcos/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fuentefin');

    $this->objfin =$this->columnas[0]->getConfig($fuentes);

    $this->forestcos->setObjfin($this->objfin);
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
         }else $javascript="alert_('La Acci&oacute;n no Existe'); $('forestcos_codmet').value=''; $('forestcos_codmet').focus();";

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

               $this->params=array();
               $this->forestcos = $this->getForestcosOrCreate();
               $this->updateForestcosFromRequest();
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridCostos($meta,$codigo);

               $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
           }else {
             $javascript="alert_('La Unidad de Medida no esta asociado a la acci&oacute;n seleccionada'); $('forestcos_codpro').value=''; $('forestcos_codpro').focus(); ";

             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             return sfView::HEADER_ONLY;
           }
         }else {
             $javascript="alert_('La Unidad de Medida no existe'); $('forestcos_codpro').value=''; $('forestcos_codpro').focus(); ";

             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             return sfView::HEADER_ONLY;
         }
        break;
      case '3':
         $unimed = $this->getRequestParameter('unimed');
         $longitud = $this->getRequestParameter('longitud');
         $partida = $this->getRequestParameter('partida');
         $nompar = $this->getRequestParameter('nompar');
         $monto = $this->getRequestParameter('monto');
         $dato1="";$dato2="";$dato3="";$dato4="";
         $u= new Criteria();
         $u->add(CaregartPeer::CODART,$codigo);
         $result= CaregartPeer::doSelectOne($u);
         if ($result)
         {
             if (strlen($codigo)==$longitud) {
                 $dato=$result->getDesart();
                 $dato1=$result->getUnimed();
                 $dato2=$result->getCodpar();
                 $dato3=number_format($result->getCosult(),2,',','.');
                 $dato4=H::getX('CODPAR','Nppartidas','Nompar',$dato2);
                 $javascript="validararticulorepetida('".$cajtexcom."')";
             }else {
               $javascript="alert_('El Articulo no es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
         }else $javascript="alert_('El Articulo no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$unimed.'","'.$dato1.'",""],["'.$partida.'","'.$dato2.'",""],["'.$nompar.'","'.$dato4.'",""],["'.$monto.'","'.$dato3.'",""],["javascript","'.$javascript.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;
      case '4':
          $cajtxtcom = $this->getRequestParameter('cajtxtcom','');
          $cajtxtmos = $this->getRequestParameter('cajtxtmos','');
          $g= new Criteria();
          $g->add(FortiptitPeer::CODTIP,$codigo);
          $result= FortiptitPeer::doSelectOne($g);
          if ($result)
          {
            $dato=$result->getDestip();
          }else{
            $javascript="alert('El Tipo de Gasto no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus(); ";
          }
          $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;
      case '5':
          $meta=$this->getRequestParameter('meta');
          $producto=$this->getRequestParameter('producto');
          $actividad=$this->getRequestParameter('actividad');
          $cadena=$this->getRequestParameter('cadena');
          $articulo=$this->getRequestParameter('articulo');
          $filper=$this->getRequestParameter('filper');
          $colmon=$this->getRequestParameter('colmon');

          $arreglo=Formulacion::cargarPeriodosCos($meta,$producto,$actividad,$articulo,$cadena,&$acum);
          $this->params=array();
          $this->forestcos = $this->getForestcosOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='5';

          $this->configGridPeriodos($arreglo);

          $javascript="$('divgridper').show(); $('divgrid').hide();";

          $output = '[["'.$colmon.'","'.$acum.'",""],["forestcos_filper","'.$filper.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '6':
          $meta=$this->getRequestParameter('meta');
          $producto=$this->getRequestParameter('producto');
          $actividad=$this->getRequestParameter('actividad');
          $cadena=$this->getRequestParameter('cadena');
          $articulo=$this->getRequestParameter('articulo');
          $filfin=$this->getRequestParameter('filfin');

          $arreglo=Formulacion::cargarFuentesCos($meta, $producto, $actividad, $articulo, $cadena);
          $this->params=array();
          $this->forestcos = $this->getForestcosOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='6';

          $this->configGridFueFin($arreglo);

          $javascript="$('divgridfue').show(); $('divgrid').hide();";

          $output = '[["forestcos_filfin","'.$filfin.'",""],["forestcos_totfil","'.count($arreglo).'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '7':
          $montopre=H::toFloat($this->getRequestParameter('montopre'));
          $totfin=H::toFloat($this->getRequestParameter('totfin'));
          $monfin=H::toFloat($this->getRequestParameter('monfin'));
          $codfin=$this->getRequestParameter('codfin');
          if (Formulacion::chequearDispIngresosCos($monfin,$codfin))
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
    $this->act ="";
    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->forestcos = $this->getForestcosOrCreate();
        $this->updateForestcosFromRequest();
        $this->configGridCostos();        
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);       

        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
           if ($x[$j]->getCanuni()!=0 && $x[$j]->getCodart()!='')
           {
              $this->act=$x[$j]->getCodact();
              if ($x[$j]->getCanart()==0)
              {
                $this->coderr=328;
                break;
              }
              if ($x[$j]->getMonart()==0)
              {
                $this->coderr=329;
                break;
              }
             /* if ($x[$j]->getCodfin()=='')
              {
                $this->coderr=330;
                break;
              }*/
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
    $this->configGridCostos();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Formulacion::grabarEstructuraCostos($clasemodelo,$grid);
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
    $this->forestcos = $this->getForestcosOrCreate();
    $this->updateForestcosFromRequest();
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
