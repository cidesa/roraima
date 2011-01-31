<?php

/**
 * nomdefespcarpre actions.
 *
 * @package    siga
 * @subpackage nomdefespcarpre
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdefespcarpreActions extends autonomdefespcarpreActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridAsig();

  }

  public function configGridAsig($reg=array())
  {
      $c = new Criteria();
      $c->add(NpasiconPeer::CODCAT,$this->npcarpre->getCodcat());
      $c->add(NpasiconPeer::CODCAR,$this->npcarpre->getCodcar());
      $reg = NpasiconPeer::doSelect($c);
      
      $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespcarpre/'.sfConfig::get('sf_app_module_config_dir_name').'/gridasig');
      #$this->obj[1][10]->setCombo($this->arrsal);
      #$this->obj[1][11]->setCombo(array('N'=>'NO','S'=>'SI'));
      $this->obj = $this->obj[0]->getConfig($reg);
      $this->npcarpre->setObjasig($this->obj);

  }

  public function executeAjaxfila()
    {
        $name = $this->getRequestParameter('grid','a');
        $grid = $this->getRequestParameter('grid'.$name,'');        

        $fila = $this->getRequestParameter('fila','');
        $col = $this->getRequestParameter('columna','');        
        switch ($col) {
          case '1':
            $codcon = $grid[$fila][0];
            $c = new Criteria();
            $c->add(NpdefcptPeer::CODCON,$codcon);
            $obj = NpdefcptPeer::doSelectOne($c);
            if($obj)
            {
                $grid[$fila][1] = $obj->getNomcon();
                $grid[$fila][2] = $obj->getCodpar();
                $grid[$fila][3] = $obj->getNompar();
            }else
            {
                $grid[$fila][0] = '';
                $grid[$fila][1] = '';
                $grid[$fila][2] = '';
                $grid[$fila][3] = '';
            }
            break;
          /*case '5':
          case '6':
            $npcarpremonpre = H::FormatoNum($this->getRequestParameter('npcarpre_monpre',''));
            $monpre = H::FormatoNum($grid[$fila][4]);
            $frecon = H::FormatoNum($grid[$fila][5]);
            if(floatval($monpre) && floatval($frecon))
            {
                $grid[$fila][6] = H::FormatoMonto($monpre * $frecon);
                #$npcarpremonpre+=$grid[$fila][6];
            }           
            $json = array('grida'=>$grid,'npcarpre_monpre'=>H::FormatoMonto($npcarpremonpre));
            break;*/
          default:
            break;
        }

        $output = Herramientas::grid_to_json($grid, $name);
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }

  public function executeAjaxgrid()
    {
        $name = $this->getRequestParameter('grid','a');
        $grid = $this->getRequestParameter('grid'.$name,'');

        $fila = $this->getRequestParameter('fila','');
        $col = $this->getRequestParameter('columna','');
        switch ($col) {
          case '5':
          case '6':
            $canpre = H::FormatoNum($this->getRequestParameter('npcarpre_canpre',''));
            $canasi = H::FormatoNum($this->getRequestParameter('npcarpre_canasi',''));
            $monpre = H::FormatoNum($grid[$fila][4]);
            $frecon = H::FormatoNum($grid[$fila][5]);
            if(is_numeric($monpre) && is_numeric($frecon))
            {
                $grid[$fila][6] = H::FormatoMonto($monpre * $frecon);
                $valor=0;
                foreach($grid as $val)
                {
                    $valor+=H::formatonum($val[6]);
                }
                #$valor+=$grid[$fila][6];
            }
            $json = array('grida'=>$grid,'npcarpre_monpre'=>H::FormatoMonto($valor*$canpre),'npcarpre_monasi'=>H::FormatoMonto($valor*$canasi),'npcarpre_dispo'=>H::FormatoMonto(($valor*$canpre)-($valor*$canasi)));
            break;
          default:
            break;
        }

        $output = Herramientas::array_to_json($json);
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el cÃ³digo necesario
    $ajax = $this->getRequestParameter('ajax','');
    $js = '';

    // Se debe enviar en la peticiÃ³n ajax desde el cliente los datos que necesitemos
    // para generar el cÃ³digo de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1': 
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $dato='';
        $cajtexmos = $this->getRequestParameter('cajtexmos','');
        $codcat = H::getX_vacio('Codcat','Fordefcatpre','Codcat',$codigo);
        if(!$codcat)
            $js.= "alert('El Codigo de Categoria No Existe');
                   $('npcarpre_codcat').value='';
                   $('npcarpre_codcat').focus();";
        else {
            if (strlen(H::getObtener_FormatoCategoria_Formulacion())==strlen($codigo))
                $dato = H::getX_vacio('Codcat','Fordefcatpre','Nomcat',$codcat);
            else
              $js.= "alert('El Codigo de Categoria No es de Ultimo Nivel');
                   $('npcarpre_codcat').value='';
                   $('npcarpre_codcat').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $dato='';
        $codcat = $this->getRequestParameter('codcat','');        
        $cajtexmos = $this->getRequestParameter('cajtexmos','');
        $canasi=0;
        $canhom=0;
        $canmuj=0;
        if($codcat)
        {
            $codcar = H::getX_vacio('Codcar','Npcargos','Codcar',$codigo);
            if(!$codcar)
                $js.= "alert('El Codigo del Cargo No Existe');
                       $('npcarpre_codcar').value='';
                       $('npcarpre_codcar').focus();";
            else
            {
                $c =  new Criteria();
                $c->add(NpasiconPeer::CODCAT,$codcat);
                $c->add(NpasiconPeer::CODCAR,$codcar);
                $per = NpasiconPeer::doSelectOne($c);
                if(!$per)
                {
                    $dato = H::getX_vacio('Codcar','Npcargos','Nomcar',$codcar);
                    $c = new Criteria();
                    $c->add(NpcargosPeer::CODCAR,$codcar);
                    $obj = NpcargosPeer::doSelectOne($c);
                    $canasi=$obj->getCarasi();
                    $canhom=$obj->getCanhom();
                    $canmuj=$obj->getCanmuj();

                }
                else
                {
                    $js.= "alert('El Cargo asociado a la Categoria $codcat ya estan Registrados');
                           $('npcarpre_codcar').value='';
                           $('npcarpre_codcar').focus();";
                }
            }
        }else
        {
            $js.= "alert('Debe Seleccionar una categoria');
                   $('npcarpre_codcar').value='';
                   $('npcarpre_codcat').value='';
                   $('npcarpre_codcat').focus();";
        }
        


        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["npcarpre_canasi","'.H::FormatoMonto($canasi).'",""],
                    ["npcarpre_canhom","'.$canhom.'",""],["npcarpre_canmuj","'.$canmuj.'",""]]';
        break;
      case '3':
        $canasi = $this->getRequestParameter('canasi','');
        $canpre = $this->getRequestParameter('codigo','');
        $canvac = H::FormatoMonto($canpre-H::FormatoNum($canasi));
        $output = '[["npcarpre_canvac","'.$canvac.'",""],["","",""],["","",""]]';
        break;
      case '4':
        $canasi = $this->getRequestParameter('canhom','');
        $canpre = $this->getRequestParameter('codigo','');
        $canvac = H::FormatoMonto($canpre-H::FormatoNum($canasi));
        $output = '[["npcarpre_canhvac","'.$canvac.'",""],["","",""],["","",""]]';
        break;
      case '5':
        $canasi = $this->getRequestParameter('canmuj','');
        $canpre = $this->getRequestParameter('codigo','');
        $canvac = H::FormatoMonto($canpre-H::FormatoNum($canasi));
        $output = '[["npcarpre_canmvac","'.$canvac.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucciÃ³n
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serÃ¡n usados en las funciones de validaciÃ³n.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->npcarpre = $this->getNpcarpreOrCreate();
       $this->updateNpcarpreFromRequest();

       $this->configGridAsig();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
       if(count($grid[0])<=0)
       {
         $this->coderr='FR001';
         return false;
       }else
       {
           foreach($grid[0] as $reg)
           {
                if($reg->getCodcon()=='')
                {
                    $this->coderr='478';
                    return false;
                }
                if($reg->getMonpre()=='' || $reg->getMonpre()=='0,00')
                {
                    $this->coderr='478';
                    return false;
                }
           }
       }
       

      // Aqui van los llamados a los mÃ©todos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al cÃ³digo que retorna
      // Todas las funciones de validaciÃ³n y procesos del negocio
      // deben retornar cÃ³digos >= -1. Estos cÃ³digo serÃ¡m buscados en
      // el archivo errors.yml en la funciÃ³n handleErrorEdit()

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
    $this->configGridAsig();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $arr=array('Codcat','Codcar');
    H::Guardar_Grid($grid, $arr, $clasemodelo);

    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
    $c->add(NpasiconPeer::CODCAT,$this->npcarpre->getCodcat());
    $c->add(NpasiconPeer::CODCAR,$this->npcarpre->getCodcar());
    $reg = BasePeer::doDelete($c,Propel::getConnection(EmpresaPeer::DATABASE_NAME));
    
    return parent::deleting($clasemodelo);
  }


}
