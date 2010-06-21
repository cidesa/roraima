<?php

/**
 * nomasiconpar actions.
 *
 * @package    siga
 * @subpackage nomasiconpar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasiconparActions extends autonomasiconparActions
{

  public function executeIndex()
  {
    return $this->redirect('nomasiconpar/edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();

  }

  public function configGrid($codnom='',$codtipcar='',$gracar='',$codtip='',$codtipcat='',$codtie='',$codestemp='')
  {
    $cardoc="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
        if(array_key_exists('aplicacion',$varemp))
         if(array_key_exists('nomina',$varemp['aplicacion']))
           if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
             if(array_key_exists('nomcomocp',$varemp['aplicacion']['nomina']['modulos'])){
               if(array_key_exists('codtipcar',$varemp['aplicacion']['nomina']['modulos']['nomcomocp']))
               {
                $cardoc=$varemp['aplicacion']['nomina']['modulos']['nomcomocp']['codtipcar'];
               }}

    $u= new Criteria();
    $u->add(NpasiconparPeer::CODNOM,$codnom);
    $u->add(NpasiconparPeer::CODTIPCAR,$codtipcar);
    if ($cardoc!=$codtipcar) { $u->add(NpasiconparPeer::GRACAR,$gracar); }  //Nivel - Escala
    else {
        $u->add(NpasiconparPeer::CODTIP,$codtip);  //Dedicación
        $u->add(NpasiconparPeer::CODTIPCAT,$codtipcat);  // Categoria
    }
    $u->add(NpasiconparPeer::CODTIE,$codtie);
    $u->add(NpasiconparPeer::CODESTEMP,$codestemp);
    $manyresults= NpasiconparPeer::doSelect($u);
    if (!$manyresults)
    {
      $sql="select a.codcon as codcon, b.nomcon as nomcon, b.codpar as codpar, c.nompar as nompar, 9 as id
          from npasiconnom a, npdefcpt b left outer join nppartidas c  on b.codpar=c.codpar where a.codnom='".$codnom."'
          and  a.codcon=b.codcon order by a.codcon";
      Herramientas::BuscarDatos($sql,&$manyresults);
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomasiconpar/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_conpar');

    $this->obj =$this->columnas[0]->getConfig($manyresults);

    $this->npasiconpar->setObj($this->obj);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtxtmos = $this->getRequestParameter('cajtxtmos','');
    $cajtxtcom = $this->getRequestParameter('cajtxtcom','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        $codtipcar=$this->getRequestParameter('tipcar');
        $gracar=$this->getRequestParameter('gracar');
        $dedicacion=$this->getRequestParameter('dedicacion');
        $categoria=$this->getRequestParameter('categoria');
        $condicion=$this->getRequestParameter('condicion');
        $estatus=$this->getRequestParameter('estatus');

        $this->params=array();
        $this->npasiconpar = $this->getNpasiconparOrCreate();
        $this->labels = $this->getLabels();
        $cardoc="";
        $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
        if ($varemp)
            if(array_key_exists('aplicacion',$varemp))
             if(array_key_exists('nomina',$varemp['aplicacion']))
               if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
                 if(array_key_exists('nomcomocp',$varemp['aplicacion']['nomina']['modulos'])){
                   if(array_key_exists('codtipcar',$varemp['aplicacion']['nomina']['modulos']['nomcomocp']))
                   {
                    $cardoc=$varemp['aplicacion']['nomina']['modulos']['nomcomocp']['codtipcar'];
                   }}

        $q= new Criteria();
        $q->add(NpnominaPeer::CODNOM,$codigo);
        $result= NpnominaPeer::doSelectOne($q);
        if ($result)
        {
            if ($cardoc==$codtipcar)
            {
                if ($dedicacion=="" || $categoria=="")
               {
                   $javascript="alert_('Asegurese de haber introducido la dedicaci&oacute;n y la categoria'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
                   $this->configGrid();
               }else {
                $dato=$result->getNomnom();
                $this->configGrid($codigo, $codtipcar, $gracar, $dedicacion, $categoria, $condicion, $estatus);
               }

            }else {
               if ($gracar=="") {
                  $javascript="alert_('Debe introducir el nivel-escala'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
                  $this->configGrid();
                }else {
                  $dato=$result->getNomnom();
                  $this->configGrid($codigo, $codtipcar, $gracar, $dedicacion, $categoria, $condicion, $estatus);
                }
            }
        }else {
           $javascript="alert_('La N&oacute;mina no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
           $this->configGrid();
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
        $q= new Criteria();
        $q->add(NptipcarPeer::CODTIPCAR,$codigo);
        $result=NptipcarPeer::doSelectOne($q);
        if ($result)
        {
           $dato=$result->getDestipcar() ;
           $cardoc="";
            $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
            if ($varemp)
                if(array_key_exists('aplicacion',$varemp))
                 if(array_key_exists('nomina',$varemp['aplicacion']))
                   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
                     if(array_key_exists('nomcomocp',$varemp['aplicacion']['nomina']['modulos'])){
                       if(array_key_exists('codtipcar',$varemp['aplicacion']['nomina']['modulos']['nomcomocp']))
                       {
                        $cardoc=$varemp['aplicacion']['nomina']['modulos']['nomcomocp']['codtipcar'];
                       }}
           if ($cardoc==$codigo) $javascript="$('divcodtip').show(); $('divcodtipcat').show(); $('divgracar').hide(); $('npasiconpar_gracar').value=''; $('npasiconpar_pascar').value='';";
           else $javascript="$('divgracar').show(); $('divcodtip').hide(); $('divcodtipcat').hide(); $('npasiconpar_codtip').value=''; $('npasiconpar_codtipcat').value='';";
        }else {
            $javascript="alert_('El Tipo de Cargo no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '3':
        $codtipcar=$this->getRequestParameter('tipcar');
        $q= new Criteria();
        $q->add(NpcomocpPeer :: PASCAR, '001');
        $q->add(NpcomocpPeer :: CODTIPCAR, $codtipcar);
        $q->add(NpcomocpPeer :: GRACAR, $codigo);
        $result=NpcomocpPeer::doSelectOne($q);
        if ($result)
        {
           $dato=$result->getPascar();
        }else {
            $javascript="alert_('El Nivel no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '4':
        $q= new Criteria();
        $q->add(NppartidasPeer::CODPAR,$codigo);
        $result=NppartidasPeer::doSelectOne($q);
        if ($result)
        {
           $dato=$result->getNompar() ;
        }else {
            $javascript="alert_('La Partida no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($ajax!=1) return sfView::HEADER_ONLY;

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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    Nomina::grabarConceptoPartidas($clasemodelo,$grid);
    return -1;
  }


}
