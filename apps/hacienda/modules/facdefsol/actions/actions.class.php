<?php

/**
 * Facdefsol actions.
 *
 * @package    siga
 * @subpackage Facdefsol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacdefsolActions extends autoFacdefsolActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	  $this->configGrid();

	  if ($this->fctipsol->getPrivdeu()=="N")
      {
        $this->fctipsol->setPrivdeu("");
      }
	  if ($this->fctipsol->getAnocom()=="N")
      {
        $this->fctipsol->setAnocom("");
      }
  }

  protected function updateFctipsolFromRequest()
  {
    $fctipsol = $this->getRequestParameter('fctipsol');

    if (isset($fctipsol['codtip']))
    {
      $this->fctipsol->setCodtip($fctipsol['codtip']);
    }
    if (isset($fctipsol['destip']))
    {
      $this->fctipsol->setDestip($fctipsol['destip']);
    }
    if (isset($fctipsol['fueing']))
    {
      $this->fctipsol->setFueing($fctipsol['fueing']);
    }
    if (isset($fctipsol['monsol']))
    {
      $this->fctipsol->setMonsol($fctipsol['monsol']);
    }
    if (isset($fctipsol['valsol']))
    {
      $this->fctipsol->setValsol($fctipsol['valsol']);
    }
    if (isset($fctipsol['privdeu']))
    {
      $this->fctipsol->setPrivdeu($fctipsol['privdeu']);
    }
    if (isset($fctipsol['anocom']))
    {
      $this->fctipsol->setAnocom($fctipsol['anocom']);
    }
    if (isset($fctipsol['privmsg']))
    {
      $this->fctipsol->setPrivmsg($fctipsol['privmsg']);
    }
    if (isset($fctipsol['gendeu']))
    {
      $this->fctipsol->setGendeu($fctipsol['gendeu']);
    }
    if (isset($fctipsol['grid']))
    {
      $this->fctipsol->setGrid($fctipsol['grid']);
    }

    if (isset($fctipsol['codtip']))
    {
      $this->fctipsol->setCodtip($fctipsol['codtip']);
    }
    if (isset($fctipsol['destip']))
    {
      $this->fctipsol->setDestip($fctipsol['destip']);
    }
    if (isset($fctipsol['monsol']))
    {
      $this->fctipsol->setMonsol($fctipsol['monsol']);
    }
    if (isset($fctipsol['valsol']))
    {
      $this->fctipsol->setValsol($fctipsol['valsol']);
    }
    if (isset($fctipsol['privdeu']))
    {
      $this->fctipsol->setPrivdeu($fctipsol['privdeu']);
    }
    if (isset($fctipsol['privmsg']))
    {
      $this->fctipsol->setPrivmsg($fctipsol['privmsg']);
    }
    if (isset($fctipsol['anocom']))
    {
      $this->fctipsol->setAnocom($fctipsol['anocom']);
    }
    if (isset($fctipsol['fueing']))
    {
      $this->fctipsol->setFueing($fctipsol['fueing']);
    }
    if (isset($fctipsol['gendeu']))
    {
      $this->fctipsol->setGendeu($fctipsol['gendeu']);
    }

    if (isset($fctipsol['codtip']))
    {
      $this->fctipsol->setCodtip($fctipsol['codtip']);
    }
    if (isset($fctipsol['destip']))
    {
      $this->fctipsol->setDestip($fctipsol['destip']);
    }
    if (isset($fctipsol['monsol']))
    {
      $this->fctipsol->setMonsol($fctipsol['monsol']);
    }
    if (isset($fctipsol['valsol']))
    {
      $this->fctipsol->setValsol($fctipsol['valsol']);
    }
    if (isset($fctipsol['privdeu']))
    {
      $this->fctipsol->setPrivdeu("S");
    }
    else
    {
      $this->fctipsol->setPrivdeu("N");
    }
    if (isset($fctipsol['anocom']))
    {
      $this->fctipsol->setAnocom("S");
    }
    else
    {
      $this->fctipsol->setAnocom("N");
    }
    if (isset($fctipsol['fueing']))
    {
      $this->fctipsol->setFueing($fctipsol['fueing']);;
    }
    else
    {
      $this->fctipsol->setFueing("");
    }
    if (isset($fctipsol['gendeu']))
    {
      $this->fctipsol->setGendeu($fctipsol['gendeu']);
    }

  }


  public function configGrid($reg = array(),$regelim = array())
  {
  	    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $per = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $this->grid = array();
    }

    $c = new Criteria();
    $c->add(FcdefdetsolPeer::CODSOL,$this->fctipsol->getCodtip());
    $per = FcdefdetsolPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdefsol/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
	$this->columnas[1][0]->setCombo(Constantes::Tipo_Fctipsol());
	$this->columnas[1][1]->setCombo(Constantes::Cuantos_Fctipsol());
	$this->columnas[1][2]->setCombo(Constantes::Propietarios_Fctipsol());
	$this->columnas[1][3]->setCombo(Constantes::Mostrar_Fctipsol());
	$this->grid = $this->columnas[0]->getConfig($per);
    $this->fctipsol->setGrid($this->grid);
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
        $nomfue= Herramientas::getX('CODFUE','fcfuepre','Nomfue',$codigo);
        $cajtexcom="fctipsol_nomfue";

        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["'.$cajtexcom.'","'.$nomfue.'",""]]';
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $this->configGrid($grid[0],$grid[1]);
  }

  public function saving($fctipsol)
  {
    $fctipsol->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Fcdefsol($fctipsol, $grid);
    return -1;
  }

  /*protected function deleteCaordcom($caordcom)
  {
      $id=$this->getRequestParameter('id');
    if (!Orden_compra::Eliminar($caordcom,&$coderror))
      {
          if($coderror!=-1)
        {
            $err = Herramientas::obtenerMensajeError($coderror);
          $this->getRequest()->setError('delete', $err);
          return $this->forward('almordcom', 'list');
        }
      }
  }*/

  public function deleting($fctipsol)
  {
   if ($fctipsol->getId()!="")
   {
	$c = new Criteria();
	$c->add(FcdefdetsolPeer::CODSOL,$fctipsol->getCodtip());
	FcdefdetsolPeer::doDelete($c);
    $fctipsol->delete();
    return -1;
   }
  }

}
