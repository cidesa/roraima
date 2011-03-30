<?php

/**
 * licanaofe actions.
 *
 * @package    siga
 * @subpackage licanaofe
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licanaofeActions extends autolicanaofeActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridLeg();
    $this->configGridTec();
    $this->configGridFin();
    $this->configGridFia();
    $this->configGridTipEmp();
  }

  public function configGridLeg($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LianaofelegPeer::NUMANAOFE,$this->lianaofe->getNumanaofe());
      $reg = LianaofelegPeer::doSelect($c);
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licanaofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridleg');

    $this->obj = $this->obj[0]->getConfig($reg);
    $this->lianaofe->setGridleg($this->obj);

   }

   public function configGridTec($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LianaofetecPeer::NUMANAOFE,$this->lianaofe->getNumanaofe());
      $reg = LianaofetecPeer::doSelect($c);
    }
    $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licanaofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridtec');

    $this->obj2 = $this->obj2[0]->getConfig($reg);
    $this->lianaofe->setGridtec($this->obj2);

   }

   public function configGridFin($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LianaofefinPeer::NUMANAOFE,$this->lianaofe->getNumanaofe());
      $reg = LianaofefinPeer::doSelect($c);
    }
    $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licanaofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridfin');

    $this->obj3 = $this->obj3[0]->getConfig($reg);
    $this->lianaofe->setGridfin($this->obj3);

   }

   public function configGridFia($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LianaofefiaPeer::NUMANAOFE,$this->lianaofe->getNumanaofe());
      $reg = LianaofefiaPeer::doSelect($c);
    }
    $this->obj4 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licanaofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridfia');

    $this->obj4 = $this->obj4[0]->getConfig($reg);
    $this->lianaofe->setGridfia($this->obj4);

   }

   public function configGridTipEmp($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LianaofetipempPeer::NUMANAOFE,$this->lianaofe->getNumanaofe());
      $reg = LianaofetipempPeer::doSelect($c);
    }
    $this->obj5 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licanaofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridtipemp');

    $this->obj5 = $this->obj5[0]->getConfig($reg);
    $this->lianaofe->setGridtipemp($this->obj5);

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
           $sw=false;
           $this->ajax='1';
           $bieser = '';
           $compra = '';
           $modcon = '';
           $desclacomp = '';
           $numexp = '';
           $numplie = '';
           $nompro = '';
           $rif = '';
           $nomrepleg = '';
           $ofenro = '';
           $fecofe = '';
           $monofe = '';
           $monofelet = '';
           $c = new Criteria();
           $c->add(LiregofePeer::NUMOFE,$codigo);
           $c->addJoin(LiregofePeer::NUMEXP,  LiplieespPeer::NUMEXP);
           $c->addJoin(LiplieespPeer::NUMCOMINT,  LicomintPeer::NUMCOMINT);
           $per = LicomintPeer::doSelectOne($c);
           if($per)
           {
               $compra = $per->getTipcom()=='N' ? 'NACIONAL' : ($per->getTipcom()=='I' ? 'INTERNACIONAL' : '');
               $modcon = H::GetX('Codtiplic','Litiplic','Destiplic',$per->getCodtiplic());
               $desclacomp = H::GetX('Codclacomp','Occlacomp','Desclacomp',$per->getCodclacomp());
               $bieser= $per->getTipcon()=='B' ? 'BIENES' : ($per->getTipcon()=='S' ? 'SERVICIO' : '');               
           }
           $c = new Criteria();
           $c->add(LiregofePeer::NUMOFE,$codigo);
           $per = LiregofePeer::doSelectOne($c);
           if($per)
           {
               $numplie = $per->getNumplie();
               $numexp = $per->getNumexp();
               $c2 = new Criteria();
               $c2->add(CaproveePeer::CODPRO,$per->getCodpro());
               $per2 = CaproveePeer::doSelectOne($c2);
               if($per2)
               {
                   $nompro = $per2->getNompro();
                   $rif = $per2->getRifpro();
                   $nomrepleg = $per2->getNomrepleg();
               }
               $ofenro = $per->getOfenro();
               $fecofe = $per->getFecofe('d/m/Y');
               $monofe = $per->getMonofe();
               $monofelet = H::obtenermontoescrito($monofe);
               $porvan = $per->getPorvan();
               $declar = $per->getDeclar()=='N' ? 'NO ENTREGADO' : ($per->getDeclar()=='S' ? 'ENTREGADO' : '');
           }
           $this->lianaofe = $this->getLianaofeOrCreate();
           $this->updateLianaofeFromRequest();
           $sql="select b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    b.puntua,b.porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, max(a.id) as id
                    from liasplegcrieva a, lipliecrileg b, liregofeleg c
                    where
                    c.numofe='$codigo' and
                    a.codcri=b.codcri and
                    a.codcri=c.codcri
                    group by b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end,
                    b.puntua,b.porcen";
           H::BuscarDatos($sql, $reg);
           $this->configGridLeg($reg);
           $js="toAjaxUpdater('divgridtec','7',getUrlModuloAjax(),'$codigo','','');";
           $output = '[["lianaofe_tipcom","'.$compra.'",""],["lianaofe_destiplic","'.$modcon.'",""],["lianaofe_tipcon","'.$bieser.'",""],
                       ["lianaofe_desclacomp","'.$desclacomp.'",""],["lianaofe_numplie","'.$numplie.'",""],["javascript","'.$js.'",""],
                       ["lianaofe_numexp","'.$numexp.'",""],["lianaofe_nompro","'.$nompro.'",""],["lianaofe_rif","'.$rif.'",""],
                       ["lianaofe_nomrepleg","'.$nomrepleg.'",""],["lianaofe_ofenro","'.$ofenro.'",""],["lianaofe_fecofe","'.$fecofe.'",""],
                       ["lianaofe_monofe","'.H::FormatoMonto($monofe).'",""],["lianaofe_monofelet","'.$monofelet.'",""],
                       ["lianaofe_porvan","'.H::FormatoMonto($porvan).'",""],["lianaofe_declar","'.$declar.'",""]]';
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
            $output = '[["lianaofe_nomempadm","'.$nomemp.'",""],["lianaofe_nomcaradm","'.$nomcar.'",""],["lianaofe_coduniadm","'.$coduniadm.'",""],["lianaofe_desuniadm","'.$desuniadm.'",""]]';
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
            $output = '[["lianaofe_coduniadm","'.$coduniadm.'",""],["lianaofe_desuniadm","'.$desuniadm.'",""],["","",""]]';
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
            $output = '[["lianaofe_nomempeje","'.$nomemp.'",""],["lianaofe_nomcareje","'.$nomcar.'",""],["lianaofe_coduniste","'.$coduniste.'",""],["lianaofe_desuniste","'.$desuniste.'",""]]';
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
            $output = '[["lianaofe_coduniste","'.$coduniste.'",""],["lianaofe_desuniste","'.$desuniste.'",""],["","",""]]';
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
          $output = '[["lianaofe_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '7':
          $sw=false;
          $this->ajax='7';
          $this->lianaofe = $this->getLianaofeOrCreate();
          $this->updateLianaofeFromRequest();
          $sql="select b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    b.puntua,b.porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, max(a.id) as id
                    from liaspteccrieva a, lipliecritec b, liregofetec c
                    where
                    c.numofe='$codigo' and
                    a.codcri=b.codcri and
                    a.codcri=c.codcri
                    group by b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end,
                    b.puntua,b.porcen";
           H::BuscarDatos($sql, $reg);
           $this->configGridTec($reg);
           $js="toAjaxUpdater('divgridfin','8',getUrlModuloAjax(),'$codigo','','');";
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '8':
          $sw=false;
          $this->ajax='8';
          $this->lianaofe = $this->getLianaofeOrCreate();
          $this->updateLianaofeFromRequest();
          $sql="select b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    b.puntua,b.porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, max(a.id) as id
                    from liaspfincrieva a, lipliecrifin b, liregofefin c
                    where
                    c.numofe='$codigo' and
                    a.codcri=b.codcri and
                    a.codcri=c.codcri
                    group by b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end,
                    b.puntua,b.porcen";
           H::BuscarDatos($sql, $reg);
           $this->configGridFin($reg);
           $js="toAjaxUpdater('divgridfia','9',getUrlModuloAjax(),'$codigo','','');";
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '9':
          $sw=false;
          $this->ajax='9';
          $this->lianaofe = $this->getLianaofeOrCreate();
          $this->updateLianaofeFromRequest();
          $sql="select b.codcomres,a.descomres,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    b.puntua,b.porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, max(a.id) as id
                    from liccomres a, lipliecrifian b, liregofefia c
                    where
                    c.numofe='$codigo' and
                    a.codcomres=b.codcomres and
                    a.codcomres=c.codcomres
                    group by b.codcomres,a.descomres,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end,
                    b.puntua,b.porcen";
           H::BuscarDatos($sql, $reg);
           $this->configGridFia($reg);
           $js="toAjaxUpdater('divgridtipemp','10',getUrlModuloAjax(),'$codigo','','');";
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '10':
          $sw=false;
          $this->ajax='10';
          $this->lianaofe = $this->getLianaofeOrCreate();
          $this->updateLianaofeFromRequest();
          $sql="select b.codtipemp as codtipemp,a.desemp as destipemp,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    b.puntua,b.porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, max(a.id) as id
                    from litipemp a, liplietipemp b, liregofe c
                    where
                    c.numofe='$codigo' and
                    b.numexp=c.numexp and
                    a.codemp=b.codtipemp
                    group by b.codtipemp,a.desemp,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end,
                    b.puntua,b.porcen";
           H::BuscarDatos($sql, $reg);
           $this->configGridTipemp($reg);
          $output = '[["","",""],["","",""],["","",""]]';
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
    $this->configGridLeg();
    $this->configGridTec();
    $this->configGridFin();
    $this->configGridFia();
    $this->configGridTipEmp();

    $gridleg = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $gridtec = Herramientas::CargarDatosGridv2($this,$this->obj2,true);
    $gridfin = Herramientas::CargarDatosGridv2($this,$this->obj3,true);
    $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj4,true);
    $gridtipemp = Herramientas::CargarDatosGridv2($this,$this->obj5,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getNumanaofe()=='########')
    {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        $numero = str_pad($per->getAnaofe(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numanaofe','Lianaofe','Numanaofe',$numero);
        if($val==$numero)
            return 'V008';
        $clasemodelo->setNumanaofe($numero);
        $sql="update lidefemp set anaofe='".($per->getAnaofe()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    $gridleg = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $gridtec = Herramientas::CargarDatosGridv2($this,$this->obj2,true);
    $gridfin = Herramientas::CargarDatosGridv2($this,$this->obj3,true);
    $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj4,true);
    $gridtipemp = Herramientas::CargarDatosGridv2($this,$this->obj5,true);
    Licitacion::SalvarGridAnalisisOferta($clasemodelo, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    Licitacion::EliminarGridAnalisisOferta($clase);
    return parent::deleting($clasemodelo);
  }


}
