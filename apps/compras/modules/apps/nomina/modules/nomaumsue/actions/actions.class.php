<?php

/**
 * nomaumsue actions.
 *
 * @package    siga
 * @subpackage nomaumsue
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomaumsueActions extends autonomaumsueActions
{

  public function executeIndex()
  {
     return $this->redirect('nomaumsue/edit');
  }
  
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($nomina='',$cargodes='',$cargohas='',$codcon='')
  {
    $sql="select '' as check,a.codemp as codemp,a.nomemp as nomemp,b.monto as monto, b.cantidad as cantidad,b.monto as mon2, b.cantidad as can2, b.codcar as codcar, 9 as id
          from npasicaremp a,npasiconemp b where b.codcon='".$codcon."'  and b.codcar<='".$cargohas."'  and b.codcar>='".$cargodes."' and  a.codnom='".$nomina."' 
          and  a.codemp=b.codemp and a.codcar=b.codcar and status='V' order by a.codcar ,a.codemp";

    Herramientas::BuscarDatos($sql,&$detalle);

    $this->npasiconemp->setFilas(count($detalle));
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomaumsue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empleados');

    $this->columnas[1][0]->setHTML('onClick="desmarcar(this.id)"');

    $this->objcon =$this->columnas[0]->getConfig($detalle);

    $this->npasiconemp->setObjcon($this->objcon);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript=""; $dato="";
    switch ($ajax){
      case '1':
          $r= new Criteria();
          $r->add(NpnominaPeer::CODNOM,$codigo);
          $onresult= NpnominaPeer::doSelectOne($r);
          if ($onresult)
          {
             $dato=$onresult->getNomnom();
          }else {
              $javascript="alert(); $('npasiconemp_codnom').value=''; $('npasiconemp_codnom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
          $r= new Criteria();
          $r->add(NpcargosPeer::CODCAR,$codigo);
          $onresult= NpcargosPeer::doSelectOne($r);
          if ($onresult)
          {
              $rr= new Criteria();
              $rr->add(NpcargosPeer::CODCAR,$codigo);
              $rr->add(NpasicarnomPeer::CODNOM,$this->getRequestParameter('nomina'));
              $rr->addJoin(NpcargosPeer::CODCAR,NpasicarnomPeer::CODCAR);
              $oneresult= NpcargosPeer::doSelectOne($rr);
              if ($oneresult)
              {
                $dato=$oneresult->getNomcar();
              }else {
                  $javascript="alert_('El Cargo no esta asociado a la N&oacute;mina'); $('npasiconemp_codcar').value=''; $('npasiconemp_codcar').focus();";
              }
          }else {
              $javascript="alert('El Cargo no existe'); $('npasiconemp_codcar').value=''; $('npasiconemp_codcar').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '3':
          $r= new Criteria();
          $r->add(NpcargosPeer::CODCAR,$codigo);
          $onresult= NpcargosPeer::doSelectOne($r);
          if ($onresult)
          {
              $rr= new Criteria();
              $rr->add(NpcargosPeer::CODCAR,$codigo);
              $rr->add(NpasicarnomPeer::CODNOM,$this->getRequestParameter('nomina'));
              $rr->addJoin(NpcargosPeer::CODCAR,NpasicarnomPeer::CODCAR);
              $oneresult= NpcargosPeer::doSelectOne($rr);
              if ($oneresult)
              {
                $dato=$oneresult->getNomcar();
              }else {
                  $javascript="alert_('El Cargo no esta asociado a la N&oacute;mina'); $('npasiconemp_codcarnew').value=''; $('npasiconemp_codcarnew').focus();";
              }
          }else {
              $javascript="alert('El Cargo no existe'); $('npasiconemp_codcarnew').value=''; $('npasiconemp_codcarnew').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
       case '4':
          $nomina=$this->getRequestParameter('nomina');
          $cargodes=$this->getRequestParameter('cargodes');
          $cargohas=$this->getRequestParameter('cargohas');
          $this->params=array();
          $this->npasiconemp = $this->getNpasiconempOrCreate();
          $this->labels = $this->getLabels();
          $filas=0;
          if ($nomina!="") {
              $r= new Criteria();
              $r->add(NpdefcptPeer::CODCON,$codigo);
              $onresult= NpdefcptPeer::doSelectOne($r);
              if ($onresult)
              {
                  $rr= new Criteria();
                  $rr->add(NpdefcptPeer::CODCON,$codigo);
                  $rr->add(NpasiconnomPeer::CODNOM,$nomina);
                  $rr->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
                  $oneresult= NpdefcptPeer::doSelectOne($rr);
                  if ($oneresult)
                  {
                    $dato=$oneresult->getNomcon();
                    if ($cargodes!="" && $cargohas!="")
                    {                      
                      $this->configGrid($nomina,$cargodes,$cargohas,$codigo);
                      $filas=$this->npasiconemp->getFilas();
                    }else {
                      $dato="";
                      $javascript="alert_('Debe introducir el rango de cargos, para poder cargar los empleados'); $('npasiconemp_codcon').value=''; $('npasiconemp_codcon').focus();";
                      $this->configGrid();
                    }
                  }else {
                      $javascript="alert_('El Concepto no esta asociado a la N&oacute;mina'); $('npasiconemp_codcon').value=''; $('npasiconemp_codcon').focus();";
                      $this->configGrid();
                  }
              }else {
                  $javascript="alert('El Concepto no existe'); $('npasiconemp_codcon').value=''; $('npasiconemp_codcon').focus();";
                  $this->configGrid();
              }
          }else {
            $javascript="alert('Debe introducir la N&oacute;mina'); $('npasiconemp_codcon').value=''; $('npasiconemp_codcon').focus();";
            $this->configGrid();
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["npasiconemp_filas","'.$filas.'",""]]';
        break;
        default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($ajax!=4) {        
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->objcon,true);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->objcon,true);
    Nomina::actualizarSueldosporNominaCargosConcepto($clasemodelo,$grid);
    return -1;
  }

}
