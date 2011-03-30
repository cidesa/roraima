<?php

/**
 * licregofe actions.
 *
 * @package    siga
 * @subpackage licregofe
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licregofeActions extends autolicregofeActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridArt();
    $this->configGridRgo();
    $this->configGridForPag();
    $this->configGridCroEnt();
    $this->configGridLeg();
    $this->configGridTec();
    $this->configGridFin();
    $this->configGridFia();
  }

   public function configGridArt($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregofedetPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LiregofedetPeer::doSelect($c);
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridart');

    $this->obj = $this->obj[0]->getConfig($reg);
    $this->liregofe->setGridart($this->obj);

   }

   public function configGridRgo($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregofergoPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LiregofergoPeer::doSelect($c);
    }
    $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridrgo');

    $this->obj2 = $this->obj2[0]->getConfig($reg);
    $this->liregofe->setGridrgo($this->obj2);

   }

   public function configGridForPag($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiforpagPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LiforpagPeer::doSelect($c);
    }
    $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridforpag');

    $this->obj3 = $this->obj3[0]->getConfig($reg);
    $this->liregofe->setGridforpag($this->obj3);

   }

   public function configGridCroEnt($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LicroentPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LicroentPeer::doSelect($c);
    }
    $this->obj4 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridcroent');

    $this->obj4 = $this->obj4[0]->getConfig($reg);
    $this->liregofe->setGridcroent($this->obj4);

   }

   public function configGridLeg($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregofelegPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LiregofelegPeer::doSelect($c);
    }
    $this->obj5 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridleg');

    $this->obj5 = $this->obj5[0]->getConfig($reg);
    $this->liregofe->setGridleg($this->obj5);

   }

   public function configGridTec($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregofetecPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LiregofetecPeer::doSelect($c);
    }
    $this->obj6 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridtec');

    $this->obj6 = $this->obj6[0]->getConfig($reg);
    $this->liregofe->setGridtec($this->obj6);

   }

   public function configGridFin($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregofefinPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LiregofefinPeer::doSelect($c);
    }
    $this->obj7 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridfin');

    $this->obj7 = $this->obj7[0]->getConfig($reg);
    $this->liregofe->setGridfin($this->obj7);

   }

   public function configGridFia($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregofefiaPeer::NUMOFE,$this->liregofe->getNumofe());
      $reg = LiregofefiaPeer::doSelect($c);
    }
    $this->obj8 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licregofe/'.sfConfig::get('sf_app_module_config_dir_name').'/gridfia');

    $this->obj8 = $this->obj8[0]->getConfig($reg);
    $this->liregofe->setGridfia($this->obj8);

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
           $numplie = '';
           $c = new Criteria();
           $c->add(LiplieespPeer::NUMEXP,$codigo);
           $c->addJoin(LiplieespPeer::NUMCOMINT,  LicomintPeer::NUMCOMINT);
           $per = LicomintPeer::doSelectOne($c);
           if($per)
           {
               $compra = $per->getTipcom()=='N' ? 'NACIONAL' : ($per->getTipcom()=='I' ? 'INTERNACIONAL' : '');
               $modcon = H::GetX('Codtiplic','Litiplic','Destiplic',$per->getCodtiplic());
               $desclacomp = H::GetX('Codclacomp','Occlacomp','Desclacomp',$per->getCodclacomp());
               $bieser= $per->getTipcon()=='B' ? 'BIENES' : ($per->getTipcon()=='S' ? 'SERVICIO' : '');
               $numplie = H::GetX('Numexp','Liplieesp','Numplie',$codigo);
           }
           $this->liregofe = $this->getLiregofeOrCreate();
           $this->updateLiregofeFromRequest();
           $c = new Criteria();
           $c->add(LiplieartPeer::NUMEXP,$codigo);
           $reg = LiplieartPeer::doSelect($c);
           $this->configGridArt($reg);
           $js="toAjaxUpdater('divgridcroent','8',getUrlModuloAjax(),'$codigo','','');";
           $output = '[["liregofe_tipcom","'.$compra.'",""],["liregofe_destiplic","'.$modcon.'",""],["liregofe_tipcon","'.$bieser.'",""],
                       ["liregofe_desclacomp","'.$desclacomp.'",""],["liregofe_numplie","'.$numplie.'",""],["javascript","'.$js.'",""]]';
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
            $output = '[["liregofe_nomempadm","'.$nomemp.'",""],["liregofe_nomcaradm","'.$nomcar.'",""],["liregofe_coduniadm","'.$coduniadm.'",""],["liregofe_desuniadm","'.$desuniadm.'",""]]';
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
            $output = '[["liregofe_coduniadm","'.$coduniadm.'",""],["liregofe_desuniadm","'.$desuniadm.'",""],["","",""]]';
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
            $output = '[["liregofe_nomempeje","'.$nomemp.'",""],["liregofe_nomcareje","'.$nomcar.'",""],["liregofe_coduniste","'.$coduniste.'",""],["liregofe_desuniste","'.$desuniste.'",""]]';
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
            $output = '[["liregofe_coduniste","'.$coduniste.'",""],["liregofe_desuniste","'.$desuniste.'",""],["","",""]]';
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
          $output = '[["liregofe_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '7':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $nompro = '';
           $nomrepleg = '';
           $rif = '';
           $c = new Criteria();
           $c->add(CaproveePeer::CODPRO,$codigo);
           $per = CaproveePeer::doSelectOne($c);
           if($per)
           {
               $nompro = $per->getNompro();
               $nomrepleg = $per->getNomrepleg();
               $rif = $per->getRifpro();
           }
           $output = '[["liregofe_nompro","'.$nompro.'",""],["liregofe_nomrepleg","'.$nomrepleg.'",""],["liregofe_rif","'.$rif.'",""]]';
        break;
      case '8':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='8';
           $this->liregofe = $this->getLiregofeOrCreate();
           $this->updateLiregofeFromRequest();
           $sql="select b.codart,c.desart,FormatoNum(sum(b.cansol)) as cantid, d.coduniste as coduniadm,e.desuniste,e.dirste as dir,max(a.id) as id, '' as condic
                from lidetcomint a, lisolegrdet b, caregart c, lisolegrdir d, lidatste e, liplieesp f
                where f.numexp='$codigo' and
                a.numcomint=f.numcomint and
                a.numsol=b.numsol and
                b.codart=c.codart and
                a.numsol=d.numsol and
                b.codart=d.codart and
                d.coduniste=e.coduniste
                group by b.codart,c.desart, d.coduniste,e.desuniste,e.dirste";
           H::BuscarDatos($sql, $reg);
           $this->configGridCroEnt($reg);
           $js="toAjaxUpdater('divgridleg','9',getUrlModuloAjax(),'$codigo','','');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '9':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='9';
           $this->liregofe = $this->getLiregofeOrCreate();
           $this->updateLiregofeFromRequest();
           $sql="select b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    0 as check,'' as observ, max(a.id) as id
                    from liasplegcrieva a, lipliecrileg b
                    where
                    b.numexp='$codigo' and
                    a.codcri=b.codcri
           group by b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end";
           H::BuscarDatos($sql, $reg);
           $this->configGridLeg($reg);
           $js="toAjaxUpdater('divgridtec','10',getUrlModuloAjax(),'$codigo','','');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '10':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='10';
           $this->liregofe = $this->getLiregofeOrCreate();
           $this->updateLiregofeFromRequest();
           $sql="select b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    0 as check,'' as observ, max(a.id) as id
                    from liaspteccrieva a, lipliecritec b
                    where
                    b.numexp='$codigo' and
                    a.codcri=b.codcri
           group by b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end";
           H::BuscarDatos($sql, $reg);
           $this->configGridtec($reg);
           $js="toAjaxUpdater('divgridfin','11',getUrlModuloAjax(),'$codigo','','');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '11':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='11';
           $this->liregofe = $this->getLiregofeOrCreate();
           $this->updateLiregofeFromRequest();
           $sql="select b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    0 as check,'' as observ, max(a.id) as id
                    from liaspfincrieva a, lipliecrifin b
                    where
                    b.numexp='$codigo' and
                    a.codcri=b.codcri
           group by b.codcri,a.descri,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end";
           H::BuscarDatos($sql, $reg);
           $this->configGridfin($reg);
           $js="toAjaxUpdater('divgridfia','12',getUrlModuloAjax(),'$codigo','','');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '12':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='12';
           $this->liregofe = $this->getLiregofeOrCreate();
           $this->updateLiregofeFromRequest();
           $sql="select b.codcomres,a.descomres,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end as limit,
                    0 as check,'' as observ, max(a.id) as id
                    from liccomres a, lipliecrifian b
                    where
                    b.numexp='$codigo' and
                    a.codcomres=b.codcomres
           group by b.codcomres,a.descomres,case when b.limit is null or b.limit<>'S'  then 'NO' else 'SI' end";
           H::BuscarDatos($sql, $reg);
           $this->configGridFia($reg);
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
    $this->configGridArt();
    $this->configGridRgo();
    $this->configGridForPag();
    $this->configGridCroEnt();
    $this->configGridLeg();
    $this->configGridTec();
    $this->configGridFin();
    $this->configGridFia();

    $gridart = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $gridrgo = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $gridforpag = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $gridcroent = Herramientas::CargarDatosGridv2($this,$this->obj4,true);
    $gridleg= Herramientas::CargarDatosGridv2($this,$this->obj5,true);
    $gridtec= Herramientas::CargarDatosGridv2($this,$this->obj6,true);
    $gridfin= Herramientas::CargarDatosGridv2($this,$this->obj7,true);
    $gridfia= Herramientas::CargarDatosGridv2($this,$this->obj8,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getNumofe()=='########')
    {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        $numero = str_pad($per->getOferta(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numofe','Liregofe','Numofe',$numero);
        if($val==$numero)
            return 'V008';
        $clasemodelo->setNumofe($numero);
        $sql="update lidefemp set oferta='".($per->getOferta()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    if($clasemodelo->getStatus()=='') $clasemodelo->setStatus('P');    
    if($clasemodelo->getDeclar()=='1' or $clasemodelo->getDeclar()=='S')
        $clasemodelo->setDeclar('S');
    else
        $clasemodelo->setDeclar('N');
    $gridart = Herramientas::CargarDatosGridv2($this,$this->obj, true);
    $gridrgo = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $gridforpag = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $gridcroent = Herramientas::CargarDatosGridv2($this,$this->obj4,true);
    $gridleg = Herramientas::CargarDatosGridv2($this,$this->obj5,true);
    $gridtec= Herramientas::CargarDatosGridv2($this,$this->obj6,true);
    $gridfin= Herramientas::CargarDatosGridv2($this,$this->obj7,true);
    $gridfia= Herramientas::CargarDatosGridv2($this,$this->obj8,true);
    Licitacion::SalvarGridOferta($clasemodelo, $gridart, $gridrgo, $gridforpag, $gridcroent, $gridleg, $gridtec, $gridfin, $gridfia);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    Licitacion::EliminarGridOferta($clasemodelo);
    return parent::deleting($clasemodelo);
  }


}
