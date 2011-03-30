<?php

/**
 * licplieesp actions.
 *
 * @package    siga
 * @subpackage licplieesp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licplieespActions extends autolicplieespActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridArt();
    $this->configGridUniArt($this->liplieesp->getNumcomint());
    $this->configGridDep();
    $this->configGridMec();
    $this->configGridAct();
    $this->configGridPub();
    $this->configGridLeg();
    $this->configGridTec();
    $this->configGridFin();
    $this->configGridFia();
    $this->configGridTipemp();
  }

 public function configGridArt($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiplieartPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LiplieartPeer::doSelect($c);
            
      $this->obj = array();
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridart');

    $this->obj = $this->obj[0]->getConfig($reg);
    $this->liplieesp->setGridart($this->obj);

  }

  public function configGridUniArt($codigo='',$reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $sql="select b.codart,c.desart,FormatoNum(sum(b.cansol)) as cantid, d.coduniste,e.desuniste,e.dirste,
            f.nompai,g.nomedo,h.nommun,i.nompar,j.nomsec,max(a.id) as id
            from lidetcomint a, lisolegrdet b, caregart c, lisolegrdir d, lidatste e,
            ocpais f, ocestado g, ocmunici h, ocparroq i, ocsector j
            where a.numcomint='".$codigo."' and
            a.numsol=b.numsol and
            b.codart=c.codart and
            a.numsol=d.numsol and
            b.codart=d.codart and
            d.coduniste=e.coduniste and
            e.codpai=f.codpai and
            e.codedo=g.codedo and
            e.codmun=h.codmun and
            e.codpar=i.codpar and
            e.codsec=j.codsec
            group by b.codart,c.desart, d.coduniste,e.desuniste,f.nompai,g.nomedo,h.nommun,i.nompar,j.nomsec,e.dirste";
      if(!H::BuscarDatos($sql, $reg))
      {
            $reg=array();
      }
      $this->obj2 = array();
    }
    $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/griduniart');

    $this->obj2 = $this->obj2[0]->getConfig($reg);
    $this->liplieesp->setGriduniart($this->obj2);

  }

  public function configGridDep($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LipliedepPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LipliedepPeer::doSelect($c);

      $this->obj3 = array();
    }
    $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/griddep');

    $this->obj3 = $this->obj3[0]->getConfig($reg);
    $this->liplieesp->setGriddep($this->obj3);

  }

  public function configGridMec($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LipliemecPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LipliemecPeer::doSelect($c);

      $this->obj4 = array();
    }
    $this->obj4 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridmec');

    $this->obj4 = $this->obj4[0]->getConfig($reg);
    $this->liplieesp->setGridmec($this->obj4);

  }

  public function configGridAct($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiplieactPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LiplieactPeer::doSelect($c);

      $this->obj5 = array();
    }
    $this->obj5 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridact');

    $this->obj5 = $this->obj5[0]->getConfig($reg);
    $this->liplieesp->setGridact($this->obj5);

  }

  public function configGridPub($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LipliepubPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LipliepubPeer::doSelect($c);

      $this->obj6 = array();
    }
    $this->obj6 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridpub');

    $this->obj6 = $this->obj6[0]->getConfig($reg);
    $this->liplieesp->setGridpub($this->obj6);

  }

  public function configGridLeg($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LipliecrilegPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LipliecrilegPeer::doSelect($c);    
    }
    $this->obj7 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridleg');

    #$this->obj7[1][4]->setCombo(array('N'=>'NO','S'=>'SI'));    

    $this->obj7 = $this->obj7[0]->getConfig($reg);
    $this->liplieesp->setGridleg($this->obj7);

  }

  public function configGridTec($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LipliecritecPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LipliecritecPeer::doSelect($c);

      $this->obj8 = array();
    }
    $this->obj8 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridtec');

    #$this->obj8[1][4]->setCombo(array('N'=>'NO','S'=>'SI'));

    $this->obj8 = $this->obj8[0]->getConfig($reg);
    $this->liplieesp->setGridtec($this->obj8);

  }

  public function configGridFin($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LipliecrifinPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LipliecrifinPeer::doSelect($c);

      $this->obj9 = array();
    }
    $this->obj9 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridfin');

    #$this->obj9[1][4]->setCombo(array('N'=>'NO','S'=>'SI'));

    $this->obj9 = $this->obj9[0]->getConfig($reg);
    $this->liplieesp->setGridfin($this->obj9);

  }

  public function configGridFia($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LipliecrifianPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LipliecrifianPeer::doSelect($c);

      $this->obj10 = array();
    }
    $this->obj10 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridfia');

    #$this->obj10[1][7]->setCombo(array('N'=>'NO','S'=>'SI'));

    $this->obj10 = $this->obj10[0]->getConfig($reg);
    $this->liplieesp->setGridfia($this->obj10);

  }

  public function configGridTipEmp($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiplietipempPeer::NUMPLIE,$this->liplieesp->getNumplie());
      $reg = LiplietipempPeer::doSelect($c);

      $this->obj11 = array();
    }
    $this->obj11 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licplieesp/'.sfConfig::get('sf_app_module_config_dir_name').'/gridtipemp');

    #$this->obj11[1][6]->setCombo(array('N'=>'NO','S'=>'SI'));

    $this->obj11 = $this->obj11[0]->getConfig($reg);
    $this->liplieesp->setGridtipemp($this->obj11);

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
           $this->ajax='1';
           $c = new Criteria();
           $c->add(LicomintPeer::NUMCOMINT,$codigo);
           $per = LicomintPeer::doselectOne($c);
           if($per)
           {
                $this->liplieesp = $this->getLiplieespOrCreate();
                $this->updateLiplieespFromRequest();
                $sql="select b.codart,c.desart,FormatoNum(sum(b.cansol)) as cantid,max(a.id) as id from lidetcomint a, lisolegrdet b, caregart c
                    where a.numcomint='$codigo' and
                    a.numsol=b.numsol and
                    b.codart=c.codart
                    group by b.codart,c.desart ";
                H::BuscarDatos($sql, $reg);
                $this->configGridArt($reg);
                $compra = $per->getTipcom()=='N' ? 'NACIONAL' : ($per->getTipcom()=='I' ? 'INTERNACIONAL' : '');
                $modcon = H::GetX('Codtiplic','Litiplic','Destiplic',$per->getCodtiplic());
                $desclacomp = H::GetX('Codclacomp','Occlacomp','Desclacomp',$per->getCodclacomp());
                $c2 = new Criteria();
                $c2->add(TsdesmonPeer::CODMON,$per->getCodmon());
                $per2 = TsdesmonPeer::doSelectOne($c2);
                if($per2)
                    $moneda = $per2->getNommon();
                else
                    $moneda = 0;
                $sw=false;
                $js="toAjaxUpdater('divgriduniart','7',getUrlModuloAjax(),$('liplieesp_numcomint').value,'','');";
           }else
           {
               $moneda=0;
               $compra='';
               $modcon='';
               $desclacomp='';
               $js='';
               $sw=true;
           }           
           $output = '[["javascript","'.$js.'",""],["liplieesp_tipcom","'.$compra.'",""],["liplieesp_destiplic","'.$modcon.'",""],["liplieesp_destiplic","'.$modcon.'",""],
                       ["liplieesp_desclacomp","'.$desclacomp.'",""],["liplieesp_moneda","'.$moneda.'",""]]';
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
            $output = '[["liplieesp_nomempadm","'.$nomemp.'",""],["liplieesp_nomcaradm","'.$nomcar.'",""],["liplieesp_coduniadm","'.$coduniadm.'",""],["liplieesp_desuniadm","'.$desuniadm.'",""]]';
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
            $output = '[["liplieesp_coduniadm","'.$coduniadm.'",""],["liplieesp_desuniadm","'.$desuniadm.'",""],["","",""]]';
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
            $output = '[["liplieesp_nomempeje","'.$nomemp.'",""],["liplieesp_nomcareje","'.$nomcar.'",""],["liplieesp_coduniste","'.$coduniste.'",""],["liplieesp_desuniste","'.$desuniste.'",""]]';
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
            $output = '[["liplieesp_coduniste","'.$coduniste.'",""],["liplieesp_desuniste","'.$desuniste.'",""],["","",""]]';
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
          $output = '[["liplieesp_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '7':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $this->ajax='7';
           $sw=false;
           $this->liplieesp = $this->getLiplieespOrCreate();                      
           $this->updateLiplieespFromRequest();
           $this->configGridUniArt($codigo);
           $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '8':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $monto = H::FormatoNum($codigo);
           $output = '[["liplieesp_cosplielet","'.H::obtenermontoescrito($monto).'",""],["","",""],["","",""]]';
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
    $this->configGridUniArt();
    $this->configGridDep();
    $this->configGridMec();
    $this->configGridAct();
    $this->configGridPub();
    $this->configGridLeg();
    $this->configGridTec();
    $this->configGridFin();
    $this->configGridFia();
    $this->configGridTipemp();

    $gridart = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $griduniart = Herramientas::CargarDatosGridv2($this,$this->obj2,true);
    $griddep = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $gridmec = Herramientas::CargarDatosGridv2($this,$this->obj4);
    $gridact = Herramientas::CargarDatosGridv2($this,$this->obj5);
    $gridpub = Herramientas::CargarDatosGridv2($this,$this->obj6);
    $gridleg = Herramientas::CargarDatosGridv2($this,$this->obj7);
    $gridtec = Herramientas::CargarDatosGridv2($this,$this->obj8);
    $gridfin = Herramientas::CargarDatosGridv2($this,$this->obj9);
    $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj10);
    $gridtipemp = Herramientas::CargarDatosGridv2($this,$this->obj11);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getNumplie()=='########')
    {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        $numero = str_pad($per->getPliego(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numplie','Liplieesp','Numplie',$numero);
        if($val==$numero)
            return 'V008';
        $clasemodelo->setNumplie($numero);
        $sql="update lidefemp set pliego='".($per->getPliego()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    if($clasemodelo->getNumexp()=='########')
    {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        $numero = str_pad($per->getExpdie(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numexp','Liplieesp','Numexp',$numero);
        if($val==$numero)
            return 'V008';
        $clasemodelo->setNumexp($numero);
        $sql="update lidefemp set expdie='".($per->getExpdie()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    if($clasemodelo->getStatus()=='') $clasemodelo->setStatus('P');
    $gridart = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $griddep = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $gridmec = Herramientas::CargarDatosGridv2($this,$this->obj4);
    $gridact = Herramientas::CargarDatosGridv2($this,$this->obj5);
    $gridpub = Herramientas::CargarDatosGridv2($this,$this->obj6);
    $gridleg = Herramientas::CargarDatosGridv2($this,$this->obj7);    
    $gridtec = Herramientas::CargarDatosGridv2($this,$this->obj8);
    $gridfin = Herramientas::CargarDatosGridv2($this,$this->obj9);
    $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj10);
    $gridtipemp = Herramientas::CargarDatosGridv2($this,$this->obj11);
    Licitacion::SalvarGridPliego($clasemodelo, $gridart, $griddep, $gridmec, $gridact, $gridpub, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    Licitacion::EliminarGridPliego($clasemodelo);
    return parent::deleting($clasemodelo);
  }


}
