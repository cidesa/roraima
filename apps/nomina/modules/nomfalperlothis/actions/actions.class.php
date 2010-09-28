<?php

/**
 * nomfalperlothis actions.
 *
 * @package    siga
 * @subpackage nomfalperlothis
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomfalperlothisActions extends autonomfalperlothisActions
{

  public function executeIndex()
  {
    return $this->forward('nomfalperlothis', 'edit');
  }

  public function executeList()
  {
    return $this->forward('nomfalperlothis', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {    
    $this->configGrid();
  }

   public function CargarMotivo()
    {
        $c = new Criteria();
        $lista = NpmotfalPeer::doSelect($c);

        $tipos = array();

        foreach($lista as $obj_tip)
        {
          $tipos += array($obj_tip->getCodmotfal() => $obj_tip->getDesmotfal());
        }
        return $tipos;
    }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // AquÃ­ va el cÃ³digo para traernos los registros que contendrÃ¡ el grid
        $reg = array();
        $c = new Criteria();
        $c->add(NpasicarempPeer::CODNOM,$this->npfalper->getCodnom());
        $c->add(NpasicarempPeer::STATUS,'V');
        $reg = NpasicarempPeer::doSelect($c);
      // AquÃ­ va el cÃ³digo para generar arreglo de configuraciÃ³n del grid
    $this->obj = array();
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomfalperlothis/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     #$this->obj[1][1]->setHtml('size=40 maxlength=250 onBlur="if($(id).value!=\'\')cambiardescripcion(this.id)"');
     #$this->obj[1][3]->setHtml('size=10 readonly=true onBlur="calculamontofinal(this.id,3);" onkeyPress="return validaEntero(event)"');
     #$this->obj[1][4]->setHtml('size=10 readonly=true onBlur="ValidarMontoGridv2(this.id);calculamontofinal(this.id,4);"');
     $this->obj[1][4]->setCombo(self::CargarMotivo());

     $this->obj = $this->obj[0]->getConfig($reg);
     $this->npfalper->setObjemp($this->obj);

    


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el cÃ³digo necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la peticiÃ³n ajax desde el cliente los datos que necesitemos
    // para generar el cÃ³digo de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $this->npfalper = $this->getNpfalperOrCreate();
        $fecdes = $this->getRequestParameter('fecdes','');
        $c = new Criteria();
        $c->add(NpasicarempPeer::CODNOM,$codigo);
        $c->add(NpasicarempPeer::STATUS,'V');
        $reg = NpasicarempPeer::doSelect($c);
        if($reg)
        {
            $i=0;
            foreach($reg as $r)
            {
               $c = new Criteria();
               $c->add(NpfalperPeer::CODNOM,$codigo);
               $c->add(NpfalperPeer::FECDES,$fecdes);
               $c->add(NpfalperPeer::CODEMP,$r->getCodemp());
               $reg1 = NpfalperPeer::doSelectOne($c);
               if($reg1)
               {
                  $reg[$i]->setCheck(1);
                  $reg[$i]->setCodmot($reg1->getCodmot());
               }
               $i++;
            }
            $this->configGrid($reg);
            $nomemp=$reg[0]->getNomnom();
        }
        else
        {
            $this->configGrid();
            $nomnom='';
        }
        $output = '[["npfalper_nomnom","'.$nomemp.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucciÃ³n
    #return sfView::HEADER_ONLY;

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

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);    
    foreach($grid[0] as $r)
    {
        if($r['check']=='1')
        {
            $c = new Criteria();
            $c->add(NpfalperPeer::CODNOM,$clasemodelo->getCodnom());
            $c->add(NpfalperPeer::FECDES,$clasemodelo->getFecdes());
            $c->add(NpfalperPeer::CODEMP,$r['codemp']);
            $per = NpfalperPeer::doSelectOne($c);
            if($per)
            {
                $per->setCodmot($r['codmot']);
                $per->save();

            }else
            {
                $obj = new Npfalper();
                $obj->setCodemp($r['codemp']);
                $obj->setCodmot($r['codmot']);
                $obj->setCodnom($clasemodelo->getCodnom());
                $obj->setFecdes($clasemodelo->getFecdes());
                $obj->setFechas($clasemodelo->getFecdes());
                $obj->setNrodia('1');
                $obj->save();
            }            
        }
    }
    return '-1';
    #return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
