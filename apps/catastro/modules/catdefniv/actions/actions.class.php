<?php

/**
 * catdefniv actions.
 *
 * @package    siga
 * @subpackage catdefniv
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class catdefnivActions extends autocatdefnivActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->configGrid();

  }

  public function configGrid()
  {
    $c = new Criteria();
    $per = CatnivcatPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catdefniv/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_niveles');
    $this->columnas[1][0]->setCombo(Constantes::ListadeTipo());
   // $this->columnas[1][0]->setHTML('onChange="validarcatpar()"');
    $this->columnas[1][1]->setHTML('maxlength="3" onBlur="actualizarformato(this.id)"');

	  $valor=Ingresos::movimientos();

	  if($valor==1){

	    $this->columnas[1][0]->setHTML('disabled=true');
	    $this->columnas[1][1]->setHTML('readonly=true');
	    $this->columnas[1][2]->setHTML('readonly=true');
	    $this->columnas[1][3]->setHTML('readonly=true');
	  }

    $this->grid = $this->columnas[0]->getConfig($per);
    $this->catnivcat->setGrid($this->grid);

  }

  public function executeIndex()
  {
    $c= new	Criteria();
    $data=CatnivcatPeer::doSelectOne($c);
    if ($data)
    {
      $id=$data->getId();
      return $this->redirect('catdefniv/edit?id='.$id);
    }
    else { return $this->redirect('catdefniv/create');}
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
        $output = '[["","",""],["","",""],["","",""]]';
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
       $this->catnivcat  =  $this->getCatnivcatOrCreate();

    $this->configGrid();
       if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->catnivcat->getGrid())))!=-1){ return false; }


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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGrid());
    return Catastro::SalvarCatdefniv($clasemodelo,$grid);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
