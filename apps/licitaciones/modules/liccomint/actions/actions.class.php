<?php

/**
 * liccomint actions.
 *
 * @package    siga
 * @subpackage liccomint
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class liccomintActions extends autoliccomintActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $c = new Criteria();
    $per = TsdesmonPeer::doSelect($c);
    $arrmon=array(''=>'Seleccione...');
    foreach($per as $d)
    {
        $arrmon[$d->getCodmon()] = $d->getNommon();
    }
    $this->params=array('arrmon'=>$arrmon);
    $this->configGrid($this->licomint->getCodmon());
  }

  public function configGrid($codmon='', $reg = array(),$a='')
  {

    if(!count($reg)>0 && $a=='')
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $c = new Criteria();
      $c->add(LidetcomintPeer::NUMCOMINT,$this->licomint->getNumcomint());
      $reg = LidetcomintPeer::doSelect($c);
      $this->obj = array();
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/liccomint/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    if($codmon=='' || $codmon=='001')
    {
        $this->obj[1][6]->setOculta(true);
    }else
    {
        $this->obj[1][6]->setOculta(false);
    }

    $this->obj = $this->obj[0]->getConfig($reg);
    $this->licomint->setGrid($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
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
          $tipcom = $this->getRequestParameter('tipcom','');
          $codclacomp = $this->getRequestParameter('codclacomp','');
          $this->licomint = $this->getLicomintOrCreate();
          $this->updateLicomintFromRequest();
          $c = new Criteria();
          $c->add(LiprebasPeer::CODMON,$codigo);
          $c->add(LiprebasPeer::CODCLACOMP,$codclacomp);
          $c->add(LiprebasPeer::TIPCOM,$tipcom);
          $c->addJoin(LiprebasPeer::NUMPRE,  LisolegrPeer::NUMPRE);
          $sql = "  lisolegr.numsol not in (select lidetcomint.numsol from lidetcomint )";
          $c->add(LisolegrPeer :: NUMSOL, $sql, Criteria :: CUSTOM);
          $reg = LisolegrPeer::doSelect($c);
          $this->configGrid($codigo,$reg,'X');
          $moncom=0;
          $moncomext=0;
          $valcam=0;
          if($reg)
              $valcam = $reg[0]->getValcam();
          foreach($reg as $r)
            $moncom+=$r->getMonsol();
          if($valcam>0)
            $moncomext=$moncom/$valcam;
          $sw=false;
          if($codigo=='001' || $codigo=='')
            $js="$('divmoncomext').hide();
                 $('divmoncomextlet').hide();";
          else
            $js="$('divmoncomext').show();
                 $('divmoncomextlet').show();";
        $output = '[["licomint_moncom","'.H::FormatoMonto($moncom).'",""],["licomint_moncomlet","'.H::obtenermontoescrito($moncom).'",""],
                    ["licomint_moncomext","'.H::FormatoMonto($moncomext).'",""],["licomint_moncomextlet","'.H::obtenermontoescrito($moncomext).'",""],
                    ["javascript","'.$js.'",""]]';
        break;
      case '2':
            $nomemp = '';
            $nomcar = '';
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["licomint_nomempadm","'.$nomemp.'",""],["licomint_nomcaradm","'.$nomcar.'",""],["licomint_coduniadm","'.$coduniadm.'",""],["licomint_desuniadm","'.$desuniadm.'",""]]';
        break;
      case '3':
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["licomint_coduniadm","'.$coduniadm.'",""],["licomint_desuniadm","'.$desuniadm.'",""],["","",""]]';
        break;
      case '4':
            $nomemp = '';
            $nomcar = '';
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["licomint_nomempeje","'.$nomemp.'",""],["licomint_nomcareje","'.$nomcar.'",""],["licomint_coduniste","'.$coduniste.'",""],["licomint_desuniste","'.$desuniste.'",""]]';
        break;
      case '5':
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["licomint_coduniste","'.$coduniste.'",""],["licomint_desuniste","'.$desuniste.'",""],["","",""]]';
        break;
      case '6':
          $fecha = $this->getRequestParameter('fecha','');
          $dias = $this->getRequestParameter('dias','');
          if($fecha && $dias)
          {
              $sql="select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
              if(H::BuscarDatos($sql, $rs))
                 $fecven = $rs[0]['fecven'];
          }else
             $fecven=null;
          $output = '[["licomint_fecven","'.$fecven.'",""],["","",""],["","",""]]';
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

  public function executeAjaxgrid()
  {
      
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);


  }

  public function saving($clasemodelo)
  {
    $c = new Criteria();
    $per = LidefempPeer::doSelectOne($c);
    if($clasemodelo->getNumcomint()=='########')
    {
        $numero = str_pad($per->getComint(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numcomint','Licomint','Numcomint',$numero);
        if($val==$numero)
            return 'V008';
        $clasemodelo->setNumcomint($numero);
        $sql="update lidefemp set comint='".($per->getComint()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    if($clasemodelo->getStatus()=='') $clasemodelo->setStatus('P');
    $canuni=0;
    if($per->getUnitri()>0)
       $canuni = $clasemodelo->getMoncom()/$per->getUnitri();
    $codtiplic='';
    $sql="select codtiplic from litiplic where canunitribie>=$canuni order by canunitribie limit 1";
    if(H::BuscarDatos($sql, $rs))    
        $codtiplic = $rs[0]['codtiplic'];
    else
    {
        $sql="select codtiplic from litiplic order by canunitribie desc limit 1";
            if(H::BuscarDatos($sql, $rs))
                $codtiplic = $rs[0]['codtiplic'];
    }
    $clasemodelo->setCodtiplic($codtiplic);
    $c = new Criteria();
    $c->add(LidetcomintPeer::NUMCOMINT,$clasemodelo->getNumcomint());
    $per = LidetcomintPeer::doSelect($c);
    foreach($per as  $r)
        $r->delete();
    
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    foreach($grid[0] as $reg)
    {
        $obj = new Lidetcomint();
        $obj->setNumcomint($clasemodelo->getNumcomint());
        $obj->setNumsol($reg['numsol']);
        $obj->setMontot($reg['montot']);
        $obj->save();
    }
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
    $c->add(LidetcomintPeer::NUMCOMINT,$clasemodelo->getNumcomint());
    $per = LidetcomintPeer::doSelect($c);
    foreach($per as  $r)
        $r->delete();

    return parent::deleting($clasemodelo);
  }


}
