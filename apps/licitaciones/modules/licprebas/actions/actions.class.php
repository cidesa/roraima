<?php

/**
 * licprebas actions.
 *
 * @package    siga
 * @subpackage licprebas
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licprebasActions extends autolicprebasActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {    
    $c = new Criteria();
    $per = TsdesmonPeer::doSelect($c);
    $arrmon=array();
    foreach($per as $d)
    {
        $arrmon[$d->getCodmon()] = $d->getNommon();
    }
    $this->params=array('arrmon'=>$arrmon);

    $this->configGrid($this->liprebas->getCodmon(),$this->liprebas->getValcam());

  }

  public function configGrid($codigo='',$valmon='',$reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $this->obj = array();
    }    
    $c = new Criteria();
    $c->add(LiprebasdetPeer::NUMPRE,$this->liprebas->getNumpre());
    $reg = LiprebasdetPeer::doSelect($c);
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licprebas/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    if($codigo=='' || $codigo=='001')
    {
        $this->obj[1][9]->setHtml(' readonly=false ');
        $this->obj[1][10]->setOculta(true);
        $this->obj[1][12]->setOculta(true);
        $this->obj[1][13]->setOculta(false);
        $this->obj[1][15]->setOculta(true);
        $this->obj[1][16]->setOculta(true);
        $this->obj[1][17]->setOculta(false);
    }else
    {
        $this->obj[1][9]->setHtml(' readonly=true ');
        $this->obj[1][10]->setHtml(' readonly=false ');
        $this->obj[1][10]->setOculta(false);
        $this->obj[1][12]->setOculta(false);
        $this->obj[1][13]->setOculta(true);
        $this->obj[1][15]->setOculta(false);
        $this->obj[1][16]->setOculta(false);
        $this->obj[1][17]->setOculta(true);
    }
    $valmon=H::FormatoMonto($valmon);
    $this->obj[1][16]->setHtml(' value="'.$valmon.'"  readonly=true');
    $this->obj[1][17]->setHtml(' size="1"  class="imagenalmacen" readonly=true  onClick="MostrarGrid(this.id)" ');
    $this->obj = $this->obj[0]->getConfig($reg);    
    $this->liprebas->setGrid($this->obj);

  }

  public function configGridRec($codart='',$codcat='',$subtot='',$reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $this->obj = array();
    }
    $c = new Criteria();
    $c->add(LiprergoPeer::NUMPRE,$this->liprebas->getNumpre());
    $c->add(LiprergoPeer::CODART,$codart);
    $reg = LiprergoPeer::doSelect($c);
    $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licprebas/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rec');

    $this->obj2[1][5]->setHtml(" value='$codart' ");
    $this->obj2[1][6]->setHtml(" value='$codcat' ");
    $this->obj2[1][8]->setHtml(" value='$subtot' ");
    $this->obj2[1][0]->setHtml(" onBlur='CalculaRgo(this.id);' ");

    $this->obj2 = $this->obj2[0]->getConfig($reg);
    $this->liprebas->setGrid_rec($this->obj2);

  }

   public function executeAjaxfila()
  {
    $js='';
    $name = $this->getRequestParameter('grid','');
    $grid = $this->getRequestParameter('grid'.$name,'');

    $fila = $this->getRequestParameter('fila','');
    $columna = $this->getRequestParameter('columna','');

    if($name=='a')
    {
        if($columna=='3'){
          $codcat = $grid[$fila][2];
          $codart = $grid[$fila][0];
          $codpar = H::GetX('Codart','Caregart','Codpar',$codart);
          $nomcat = H::GetX('Codcat','Npcatpre','Nomcat',$codcat);
          $codpre = $codcat.'-'.$codpar;
          $mondis=0;
          $sql="select mondis from cpasiini where perpre='00' and codpre='$codpre'";
          if(H::BuscarDatos($sql, $rs))
          {
              $mondis = $rs[0]['mondis'];
          }
          $grid[$fila][4]=$codpre;
          $grid[$fila][3]=$nomcat;
          $grid[$fila][5]=H::FormatoMonto($mondis);
          #$js+="$('".$name."x_".$fila."_7').focus()";

        }elseif($columna=='8' || $columna=='9' || $columna=='10' || $columna=='11'){
          $cansol = H::FormatoNum($grid[$fila][7]);
          $canapr = H::FormatoNum($grid[$fila][8]);
          $costoo = H::FormatoNum($grid[$fila][9]);
          $costoe = H::FormatoNum($grid[$fila][10]);
          $monrec = H::FormatoNum($grid[$fila][13]);
          $subtoto = H::FormatoNum($grid[$fila][11]);
          $subtote = H::FormatoNum($grid[$fila][12]);
          $totalo = H::FormatoNum($grid[$fila][14]);
          $totale = H::FormatoNum($grid[$fila][15]);
          $valmon = H::FormatoNum($grid[$fila][16]);
          if($columna=='8' && $canapr<=0)
          {
            $subtoto=$cansol*$costoo;
            $totalo=$subtoto+$monrec;
            $subtote=$cansol*$costoe;
            $totale=$subtote+$monrec;
          }elseif($columna=='9')
          {
            $subtoto=$canapr*$costoo;
            $totalo=$subtoto+$monrec;
            $subtote=$canapr*$costoe;
            $totale=$subtote+$monrec;
          }elseif($columna=='10')
          {
            if($canapr<=0)
            {
                $subtoto=$cansol*$costoo;
            }else
            {
                $subtoto=$canapr*$costoo;
            }
            $totalo=$subtoto+$monrec;
          }elseif($columna=='11')
          {
                $costoo = $costoe*$valmon;
                if($canapr<=0)
                {
                    $subtote=$cansol*$costoe;
                    $subtoto=$cansol*$costoo;
                }else
                {
                    $subtote=$canapr*$costoe;
                    $subtoto=$canapr*$costoo;
                }
                $monrec=0;
                $totale=$subtote+$monrec;
                $totalo=$subtoto+$monrec;
                $grid[$fila][9]=H::FormatoMonto($costoo);
          }
          $grid[$fila][11]=H::FormatoMonto($subtoto);
          $grid[$fila][14]=H::FormatoMonto($totalo);
          $grid[$fila][12]=H::FormatoMonto($subtote);
          $grid[$fila][13]=H::FormatoMonto($monrec);
          $grid[$fila][15]=H::FormatoMonto($totale);
          $js="CalcularTotal();";
        }
    }elseif($name=='b')
    {
        if($columna=='3'){
          $codcat = $grid[$fila][1];
          $codart = $grid[$fila][0];
          $tiprgo = $grid[$fila][4];
          $monrgo = H::FormatoNum($grid[$fila][5]);
          $subtot = H::FormatoNum($grid[$fila][7]);
          $codpar = H::GetX('Codart','Caregart','Codpar',$codart);
          $codpre = $codcat.'-'.$codpar;
          if($tiprgo=='P')
          {
              $monto = ($subtot*$monrgo)/100;
          }else
          {
              $monto = $subtot+$monrgo;
          }
          $grid[$fila][6]=$codpre;
          $grid[$fila][8]=H::FormatoMonto($monto);
          }

    }
    
    $output = Herramientas::grid_to_json($grid,$name,',["javascript","'.$js.'",""]');

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true;
    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $c = new Criteria();
        $c->add(LidatstePeer::CODEMP,$codigo);
        $per = LidatstePeer::doSelectOne($c);
        $coduniadm = '';
        $desuniadm = '';
        $nomemp='';
        $nomcar='';
        if($per)
        {
            $nomemp = $per->getNomemp();
            $nomcar = $per->getNomcar();
            $coduniadm = $per->getCoduniadm();
            $desuniadm = $per->getDesuniadm();
        }
        $output = '[["liprebas_nomempadm","'.$nomemp.'",""],["liprebas_nomcaradm","'.$nomcar.'",""],["liprebas_coduniadm","'.$coduniadm.'",""],
                    ["liprebas_desuniadm","'.$desuniadm.'",""]]';
        break;
      case '2':
        $c = new Criteria();
        $c->add(LidatstePeer::CODEMP,$codigo);
        $per = LidatstePeer::doSelectOne($c);
        $nomemp='';
        $nomcar='';
        $coduniste = '';
        $desuniste = '';
        $dir = '';
        $pai = '';
        $edo = '';
        $mun = '';
        $par = '';
        $sec = '';
        if($per)
        {
            $nomemp = $per->getNomemp();
            $nomcar = $per->getNomcar();
            $coduniste = $per->getCoduniste();
            $desuniste = $per->getDesuniste();
            $dir = $per->getDirste();
            $pai = H::GetX('Codpai','Ocpais','Nompai',$per->getCodpai());
            $edo = H::GetX('Codedo','Ocestado','Nomedo',$per->getCodedo());
            $mun = H::GetX('Codmun','Ocmunici','Nommun',$per->getCodmun());
            $par = H::GetX('Codpar','Ocparroq','Nompar',$per->getCodpar());
            $sec = H::GetX('Codsec','Ocsector','Nomsec',$per->getCodsec());
        }
        $output = '[["liprebas_nomempeje","'.$nomemp.'",""],["liprebas_nomcareje","'.$nomcar.'",""],["liprebas_coduniste","'.$coduniste.'",""],
                    ["liprebas_desuniste","'.$desuniste.'",""],["liprebas_dirunieje","'.$dir.'",""],["liprebas_pai","'.$pai.'",""],
                    ["liprebas_edo","'.$edo.'",""],["liprebas_mun","'.$mun.'",""],["liprebas_par","'.$par.'",""],["liprebas_sec","'.$sec.'",""]]';
        break;
      case '3':
        $c = new Criteria();
        $c->add(LidatstePeer::CODUNISTE,$codigo);
        $per = LidatstePeer::doSelectOne($c);
        $coduniste = '';
        $desuniste = '';
        $dir = '';
        $pai = '';
        $edo = '';
        $mun = '';
        $par = '';
        $sec = '';
        if($per)
        {
            $coduniste = $per->getCoduniste();
            $desuniste = $per->getDesuniste();
            $dir = $per->getDirste();
            $pai = H::GetX('Codpai','Ocpais','Nompai',$per->getCodpai());
            $edo = H::GetX('Codedo','Ocestado','Nomedo',$per->getCodedo());
            $mun = H::GetX('Codmun','Ocmunici','Nommun',$per->getCodmun());
            $par = H::GetX('Codpar','Ocparroq','Nompar',$per->getCodpar());
            $sec = H::GetX('Codsec','Ocsector','Nomsec',$per->getCodsec());
        }
        $output = '[["liprebas_coduniste","'.$coduniste.'",""],["liprebas_desuniste","'.$desuniste.'",""],["liprebas_dirunieje","'.$dir.'",""],["liprebas_pai","'.$pai.'",""],
                    ["liprebas_edo","'.$edo.'",""],["liprebas_mun","'.$mun.'",""],["liprebas_par","'.$par.'",""],["liprebas_sec","'.$sec.'",""]]';
        break;
      case '4':
          $fecha = $this->getRequestParameter('fecha','');
          $dias = $this->getRequestParameter('dias','');
          if($fecha && $dias)
          {
              $sql="select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
              if(H::BuscarDatos($sql, $rs))
                 $fecven = $rs[0]['fecven'];
          }else
             $fecven=null;
          $output = '[["liprebas_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '5':
          $monpre = $this->getRequestParameter('monpre','');
          $monpreext = $this->getRequestParameter('monpreext','');          
          $monpreletras=H::obtenermontoescrito(($monpre));
          $monpreextletras=H::obtenermontoescrito(($monpreext));
          $output = '[["liprebas_monpre","'.H::FormatoMonto($monpre).'",""],["liprebas_monpreext","'.H::FormatoMonto($monpreext).'",""],
                      ["liprebas_monpreletras","'.$monpreletras.'",""],["liprebas_monpreextletras","'.$monpreextletras.'",""]]';
        break;
      case '6':
          $codmon = $this->getRequestParameter('codmon','');
          $c = new Criteria();
          $c->add(TscammonPeer::CODMON,$codmon);
          $c->add(TscammonPeer::VALMON,H::FormatoNum($codigo));
          $per = TscammonPeer::doSelectOne($c);          
          $dato='';
          if($per)
          {
             $dato = $per->getFecmon();
          }
          if($codmon!='001')
          {
             $js="$('liprebas_valcam').setAttribute('style','border:none');
               $('liprebas_feccam').setAttribute('style','border:none');
               $('divmonpreext').show();
               $('divmonpreextletras').show();
               CalculaGrid('$codmon','$codigo');";
          }else
          {
              $js="
               $('divmonpreext').hide();
               $('divmonpreextletras').hide();
               $('divvalcam').hide();
               CalculaGrid('$codmon','$codigo');";
          }
          
          $output = '[["liprebas_fecmon","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '7':
          $valmon = $this->getRequestParameter('valmon','');
          $this->liprebas = $this->getLiprebasOrCreate();
          $this->UpdateLiprebasFromRequest();
          $this->configGrid($codigo,$valmon);
          $sw=false;
          $this->ajax=$ajax;
          $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '8':
          $codart = $this->getRequestParameter('codart','');
          $codcat = $this->getRequestParameter('codcat','');
          $subtot = $this->getRequestParameter('subtot','');
          $this->getUser()->getAttributeHolder()->remove('idmonrec','licprebas');
          $this->getUser()->getAttributeHolder()->remove('idcadena','licprebas');
          $this->getUser()->getAttributeHolder()->remove('idmontot','licprebas');
          $this->getUser()->getAttributeHolder()->remove('subtot','licprebas');
          $this->getUser()->setAttribute('idmonrec',$this->getRequestParameter('idmonrec',''),'licprebas');
          $this->getUser()->setAttribute('idcadena',$this->getRequestParameter('idcadena',''),'licprebas');
          $this->getUser()->setAttribute('idmontot',$this->getRequestParameter('idmontot',''),'licprebas');
          $this->getUser()->setAttribute('subtot',$this->getRequestParameter('subtot',''),'licprebas');
          $this->liprebas = $this->getLiprebasOrCreate();
          $this->UpdateLiprebasFromRequest();
          $this->configGridRec($codart,$codcat,$subtot);
          $sw=false;
          $this->ajax=$ajax;
          $js="$('divgrid_rec').show();";
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '9':
          $idcodpre = $this->getRequestParameter('idcodpre','');
          $idmonto = $this->getRequestParameter('idmonto','');
          $codart = $this->getRequestParameter('codart','');
          $codcat = $this->getRequestParameter('codcat','');
          $codrgo = $this->getRequestParameter('codrgo','');
          $tiprgo = $this->getRequestParameter('tiprgo','');
          $monrgo = H::FormatoNum($this->getRequestParameter('monrgo',''));
          $subtot = H::FormatoNum($this->getRequestParameter('subtot',''));
          $codpar = H::GetX('Codart','Caregart','Codpar',$codart);
          $codpre = $codcat.'-'.$codpar;
          if($tiprgo=='P')
          {
              $monto = ($subtot*$monrgo)/100;
          }else
          {
              $monto = $subtot+$monrgo;
          }
          $output = '[["'.$idcodpre.'","'.$codpre.'",""],["'.$idmonto.'","'.H::FormatoMonto($monto).'",""]]';
        break;
      case '10':
          $monrgo = $this->getRequestParameter('monrgo','');
          $cadena = $this->getRequestParameter('cadena','');
          $idmonrec = $this->getUser()->getAttribute('idmonrec','','licprebas');
          $idcadena = $this->getUser()->getAttribute('idcadena','','licprebas');
          $idmontot = $this->getUser()->getAttribute('idmontot','','licprebas');
          $subtot = $this->getUser()->getAttribute('subtot','','licprebas');
          $montot = $monrgo + H::FormatoNum($subtot);    
          $output = '[["'.$idmonrec.'","'.H::FormatoMonto($monrgo).'",""],["'.$idcadena.'","'.$cadena.'",""],["'.$idmontot.'","'.H::FormatoMonto($montot).'",""],
                      ["liprebas_monpre","'.H::FormatoMonto($montot).'",""],["liprebas_monpreletras","'.H::obtenermontoescrito($montot).'",""]]';
        break;
      case '11':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $c = new Criteria();
        $c->add(LidatstePeer::CODUNISTE,$codigo);
        $per = LidatstePeer::doSelectOne($c);
        $coduniadm = '';
        $desuniadm = '';
        if($per)
        {
            $coduniadm = $per->getCoduniadm();
            $desuniadm = $per->getDesuniadm();
        }
        $output = '[["liprebas_coduniadm","'.$coduniadm.'",""],["liprebas_desuniadm","'.$desuniadm.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $c = new Criteria();
    $per = TsdesmonPeer::doSelect($c);
    $arrmon=array(''=>'Seleccione...');
    foreach($per as $d)
    {
        $arrmon[$d->getCodmon()] = $d->getNommon();
    }
    $this->params=array('arrmon'=>$arrmon);
    $this->configGrid();
    $this->configGridRec();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $gridrec = Herramientas::CargarDatosGridv2($this,$this->obj2);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getNumpre()=='########')
    {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        $numpre = str_pad($per->getPrebas(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numpre','Liprebas','Numpre',$numpre);
        if($val==$numpre)
            return 'V008';
        $clasemodelo->setNumpre($numpre);
        $sql="update lidefemp set prebas='".($per->getPrebas()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    if($clasemodelo->getStatus()=='') $clasemodelo->setStatus('P');
    if($clasemodelo->getHorreg()=='') $clasemodelo->setHorreg(date('H:i:s'));
    if($clasemodelo->getCodmon()=='001')
    {       
       $clasemodelo->setValcam(0);
       $clasemodelo->setFeccam(null);
    }else
       $clasemodelo->setMonrec(0);
    $c = new Criteria();
    $c->add(LiprergoPeer::NUMPRE,$clasemodelo->getNumpre());
    $per2 = LiprergoPeer::doSelect($c);
    foreach($per2 as $f)
        $f->delete();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    foreach($grid[0] as $reg)
    {
        $reg->setNumpre($clasemodelo->getNumpre());
        $reg->setStatus($clasemodelo->getStatus());
        $reg->setCodmon($clasemodelo->getCodmon());
        $reg->setValcam($clasemodelo->getValcam());
        $reg->save();
        $auxcad = explode('!',$reg->getCadena());      
        foreach($auxcad as $r)
        {
            $auxr = explode('_',$r);
            if(count($auxr)>=4)
            {
               $obj = new Liprergo();
               $obj->setNumpre($clasemodelo->getNumpre());
               $obj->setCodart($auxr[0]);
               $obj->setCodcat($auxr[1]);
               $obj->setMonrgo($auxr[2]);
               $obj->setCodrgo($auxr[3]);
               $codpar = H::GetX('Codart','Caregart','Codpar',$auxr[0]);
               $obj->setCodpre($auxr[1].'-'.$codpar);
               $obj->save();
            }
        }        
    }
    foreach($grid[1] as $r)
        $r->delete();
    return parent::saving($clasemodelo);    
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
    $c->add(LiprebasdetPeer::NUMPRE,$clasemodelo->getNumpre());
    $per = LiprebasdetPeer::doSelect($c);
    foreach($per as $d)
        $d->delete();
    $c = new Criteria();
    $c->add(LiprergoPeer::NUMPRE,$clasemodelo->getNumpre());
    $per2 = LiprergoPeer::doSelect($c);
    foreach($per2 as $f)
        $f->delete();
    return parent::deleting($clasemodelo);
  }


}
