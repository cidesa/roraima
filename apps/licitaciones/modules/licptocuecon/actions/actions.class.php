<?php

/**
 * licptocuecon actions.
 *
 * @package    siga
 * @subpackage licptocuecon
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licptocueconActions extends autolicptocueconActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $bieser = '';
           $compra = '';
           $modcon = '';
           $desclacomp = '';
           $numplie = '';
           $numexp = '';
           $codpro='';
           $numofe='';
           $fecofe='';
           $monofe='';
           $recomen='';
           $nompro='';
           $rifpro='';
           $nomrepleg='';
           $direccion='';
           $c = new Criteria();
           $c->add(LirecomenPeer::NUMRECOFE,  $codigo);
           $c->addJoin(LiplieespPeer::NUMEXP,LirecomenPeer::NUMEXP);
           $c->addJoin(LiplieespPeer::NUMCOMINT,LicomintPeer::NUMCOMINT);
           $per = LicomintPeer::doSelectOne($c);
           if($per)
           {
               $compra = $per->getTipcom()=='N' ? 'NACIONAL' : ($per->getTipcom()=='I' ? 'INTERNACIONAL' : '');
               $modcon = H::GetX('Codtiplic','Litiplic','Destiplic',$per->getCodtiplic());
               $desclacomp = H::GetX('Codclacomp','Occlacomp','Desclacomp',$per->getCodclacomp());
               $bieser= $per->getTipcon()=='B' ? 'BIENES' : ($per->getTipcon()=='S' ? 'SERVICIO' : '');               
           }
           $c = new Criteria();
           $c->add(LirecomenPeer::NUMRECOFE,  $codigo);
           $c->addJoin(LiregofePeer::NUMEXP,LirecomenPeer::NUMEXP);
           $per = LiregofePeer::doSelectOne($c);
           if($per)
           {
                $numplie = $per->getNumplie();
                $numexp = $per->getNumexp();
                $codpro = $per->getCodpro();
                $numofe = $per->getNumofe();
                $fecofe = $per->getFecofe('d/m/Y');
                $monofe = $per->getMonofe();                
           }
           $c = new Criteria();
           $c->add(LirecomenPeer::NUMRECOFE,  $codigo);
           $c->addJoin(LiregofePeer::NUMEXP,LirecomenPeer::NUMEXP);
           $c->addJoin(LiregofePeer::CODPRO,CaproveePeer::CODPRO);
           $per = CaproveePeer::doSelectOne($c);
           if($per)
           {
               $nompro=$per->getNompro();
               $rifpro=$per->getrifpro();
               $nomrepleg=$per->getNomrepleg();
               $direccion=$per->getdirpro();
           }
           $recomen = H::GetX('Numrecofe','Lirecomen','Recomen',$codigo);
           $js='';
           $output = '[["liptocuecon_tipcom","'.$compra.'",""],["liptocuecon_destiplic","'.$modcon.'",""],["liptocuecon_tipcon","'.$bieser.'",""],
                       ["liptocuecon_desclacomp","'.$desclacomp.'",""],["liptocuecon_numplie","'.$numplie.'",""],["liptocuecon_numexp","'.$numexp.'",""],
                       ["liptocuecon_codpro","'.$codpro.'",""],["liptocuecon_numofe","'.$numofe.'",""],["liptocuecon_fecofe","'.$fecofe.'",""],
                       ["liptocuecon_monofe","'.H::FormatoMonto($monofe).'",""],["liptocuecon_detrecomen","'.$recomen.'",""],["liptocuecon_nompro","'.$nompro.'",""],
                       ["liptocuecon_rifpro","'.$rifpro.'",""],["liptocuecon_nomrepleg","'.$nomrepleg.'",""],["liptocuecon_direccion","'.$direccion.'",""],
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
            $output = '[["liptocuecon_nomempadm","'.$nomemp.'",""],["liptocuecon_nomcaradm","'.$nomcar.'",""],["liptocuecon_coduniadm","'.$coduniadm.'",""],["liptocuecon_desuniadm","'.$desuniadm.'",""]]';
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
            $output = '[["liptocuecon_coduniadm","'.$coduniadm.'",""],["liptocuecon_desuniadm","'.$desuniadm.'",""],["","",""]]';
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
            $output = '[["liptocuecon_nomempeje","'.$nomemp.'",""],["liptocuecon_nomcareje","'.$nomcar.'",""],["liptocuecon_coduniste","'.$coduniste.'",""],["liptocuecon_desuniste","'.$desuniste.'",""]]';
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
            $output = '[["liptocuecon_coduniste","'.$coduniste.'",""],["liptocuecon_desuniste","'.$desuniste.'",""],["","",""]]';
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
          $output = '[["liptocuecon_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getNumptocuecon()=='########')
    {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        $numero = str_pad($per->getPtocuecon(),8,'0',STR_PAD_LEFT);
        $val = H::GetX('Numptocuecon','Liptocuecon','Numptocuecon',$numero);
        if($val==$numero)
            return 'V008';
        $clasemodelo->setNumptocuecon($numero);
        $sql="update lidefemp set ptocuecon='".($per->getPtocuecon()+1)."'";
        H::BuscarDatos($sql,$rs);
    }
    if($clasemodelo->getStatus()=='') $clasemodelo->setStatus('P');
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
