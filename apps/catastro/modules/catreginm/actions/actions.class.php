<?php

/**
 * catreginm actions.
 *
 * @package    siga
 * @subpackage catreginm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class catreginmActions extends autocatreginmActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  $this->configGridP();  //Personas
  $this->configGridT();  //Terreno
  $this->configGridC();  //Construccion
  $this->configGridU();  //Uso Especifico
  $this->setVars();

  }

  public function setVars()
  {
  	$c = new Criteria();
  	//$c->add(CatnivcatPeer::CATPAR,'Z',Criteria::ALT_NOT_EQUAL);  // !=
  	$reg = CatnivcatPeer::doselect($c);

  	foreach ($reg as $datos)
  	{
  		if ($datos->getCatpar()=='Z')
  		{
            $this->loncc = $datos->getLonniv();
  		}else{
  			$this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
  		}
  	}
  	$this->params[0] = Herramientas::getX_vacio('catpar','catnivcat','forcodcat','Z');  //Z -> Cod.Catastral
  	$this->params[1] = strlen(substr($this->params[0],0,strlen($this->params[0])-$this->loncc-1));
  	$this->params[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$this->params[3] = $this->loncc;
  }

  public function configGridC()
  {
     $c = new Criteria();
     $c->add(CatcarconinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatcarconinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catcarconinm');
     $this->columnas[1][0]->setCombo(Constantes::ListaCaractConst());
     $this->columnas[1][1]->setCatalogo('catcarcon','sf_admin_edit_form', array('id'=>'2' ,'nomcarcon'=>'3'), 'Catreginm_Catcarcon', array( 'param1'=>"'+getCeldav2(this.id,-1)+'" ) );

     $this->objC = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjconstruccion($this->objC);
  }


  public function configGridT()
  {
     $c = new Criteria();
     $c->add(CatcarterinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatcarterinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catcarterinm');
     //$this->columnas[1][0]->setCombo(Catcarterinm::CargarTerrenos());
     $this->columnas[1][0]->setCombo(Constantes::ListaCaractTierra());
     $this->columnas[1][1]->setCatalogo('catcarter','sf_admin_edit_form', array('id'=>'2' ,'dester'=>'3'), 'Catreginm_Catcarter', array( 'param1'=>"'+getCeldav2(this.id,-1)+'" ) );
     //echo $this->columnas[1][0]->getCatcarterid();

     //$this->columnas[1][0]->setCombo(Catcarterinm::CargarTerrenos());
     $this->objT = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjterreno($this->objT);
  }


  public function configGridU()
  {
     $c = new Criteria();
     $c->add(CatusoespinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatusoespinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catusoespinm');
     $this->columnas[1][0]->setCombo(Constantes::ListaCaract());
     $this->columnas[1][1]->setCombo(Catusoespinm::Tipocons());
     //$this->columnas[1][1]->setCombo(Constantes::ListaCaract());
     ///$this->columnas[1][1]->setCatalogo('catcarter','sf_admin_edit_form', array('id'=>'2' ,'dester'=>'3'), 'Catreginm_Catcarter', array( 'param1'=>"'+getCeldav2(this.id,-1)+'" ) );
     $this->objU = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjusoespec($this->objU);
  }


  public function configGridP()
  {
     $c = new Criteria();
     $c->add(CatperinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatperinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catperinm');
     $this->columnas[1][4]->setCombo(Constantes::ListaCondOcupac());

     $this->objP = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjpersonas($this->objP);
  }


  public function executeAjax()
  {
    $codigo    = $this->getRequestParameter('codigo','');
    $ajax      = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');

    switch ($ajax){
      case '1':
        $desdivgeo = Herramientas::getX('coddivgeo','catdivgeo','desdivgeo',$codigo);
        $output = '[["'.$cajtexmos.'","'.$desdivgeo.'",""]]';

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

  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->catreginm  =  $this->getCatreginmOrCreate();

    /*$this->configGridC();
    $this->configGridP();
    $this->configGridT();
       if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->catreginm->getObjconstruccion)))!=-1){ return false; }
       if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->catreginm->getObjterreno)))!=-1){ return false; }
       if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->catreginm->getObjpersonas)))!=-1){ return false; }

*/

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
    $this->configGridC();
    $this->configGridP();
    $this->configGridT();
    $this->configGridU();  //Uso Especifico
    $this->setVars();

    $grid = Herramientas::CargarDatosGridv2($this,$this->objC);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objP);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objT);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objU);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $gridP = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjpersonas());
    $gridC = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjconstruccion());
    $gridT = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjterreno());
    $gridU = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjusoespec());
    return Inmueblescatastro::SalvarCatreginm($clasemodelo,$gridP,$gridC,$gridT,$gridU);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
