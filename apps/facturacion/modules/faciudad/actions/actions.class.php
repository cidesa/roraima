<?php

/**
 * faciudad actions.
 *
 * @package    siga
 * @subpackage faciudad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faciudadActions extends autofaciudadActions
{
  private $coderror = -1;

  public function editing()
  {
    $this->configGrid();
  }

  // Para incluir funcionalidades al executeEdit()
  public function executeEdit()
  {
  	   $this->faciudad= $this->getFaciudadOrCreate();

	   $c = new Criteria();
	   $c->Add(FaestadoPeer::ID, $this->getRequestParameter('edo'));
	   $datos = FaestadoPeer::doSelect($c);

	   if ($datos){
	   	  foreach ($datos as $reg){
		    $pais = $reg->getFapaisId();
	   	  }
	   }
	   else
	   	  $pais = ' ';

	   $this->setVars($pais);


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateFaciudadFromRequest();

      $this->saveFaciudad($this->faciudad);

      $this->faciudad->setId(Herramientas::getX_vacio('id','faciudad','id',$this->faciudad->getId()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('faciudad/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('faciudad/list');
      }
      else
      {
        return $this->redirect('faciudad/edit?id='.$this->faciudad->getId());
      }


    }
    else
    {
      $this->labels = $this->getLabels();
    }

  }
/*
  protected function updateFaciudadFromRequest()
  {
    $faciudad = $this->getRequestParameter('faciudad');
    if (isset($faciudad['estado']))
    {
      $this->faciudad->setFaestadoId($faciudad['estado']);
    }
    if (isset($faciudad['nomciu']))
    {
      $this->faciudad->setNomciu($faciudad['nomciu']);
    }
  }
*/
  public function setVars($pais = ' ')
  {
    $this->paises=$this->CargarPais();
    $this->estados=$this->CargarEstado($pais);
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
	   $c = new Criteria();
	   $c->Add(FaestadoPeer::ID, $this->getRequestParameter('edo'));
	   $datos = FaestadoPeer::doSelect($c);

	   if ($datos){
	   	  foreach ($datos as $reg){
		    $pais = $reg->getFapaisId();
	   	  }
	   }
	   else
	   	  $pais = ' ';

	   $this->setVars($pais);

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->faciudad = $this->getFaciudadOrCreate();
       try{
	     $this->updateFaciudadFromRequest();
          }

       catch(Exception $ex){}
/*
	       if ($this->getRequestParameter('edo') == ''){
	          $this->coderror=1102;
	          return false;
	       }
*/
          return true;
      } else return true;
  }

/*
  public function validateEdit()
  {
    $this->coderror =-1;
    $this->setVars();
    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->coderror=170;

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

      if($this->coderror!=-1){
        return false;
      } else return true;

    }else return true;



  }
*/

 public function handleErrorEdit()
  {

      $this->labels = $this->getLabels();
      $this->preExecute();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror!=-1){
         $err = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('',$err);
        }
      }
      try{
    	$this->updateFaciudadFromRequest();
      }
      catch(Exception $ex){}

      return sfView::SUCCESS;
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


  protected function saveFaciudad($faciudad)
  {

     Facturacion::salvarFaciudad($faciudad,$this->getRequestParameter('estado'),$this->getRequestParameter('faciudad[nomciu]'));

  }

/*
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }
*/
  public function CargarPais()
  {
    $tablas=array('Fapais');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('id','nompai');// arreglos donde me traigo el nombre y el codigo
    $paisesresult = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
    $paises=array();
	foreach ($paisesresult as $pai => $paiv)
	{
		$paises[$pai] = ucfirst($paiv);
	}
    return $paises;

  }

  public function CargarEstado($codpais)
  {
    $tablas=array('Faestado');//areglo de los joins de las tablas
    $filtros_tablas=array('fapais_id');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('id','nomedo');// arreglos donde me traigo el nombre y el codigo
    $estadosresult = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
    $estados=array();
	foreach ($estadosresult as $est => $estv)
	{
		$estados[$est] = ucfirst($estv);
	}
    return $estados;

  }

   public function executeCombo()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->estados = $this->CargarEstado($this->getRequestParameter('pais'));
      $this->tipo='P';
    }
  }

}
