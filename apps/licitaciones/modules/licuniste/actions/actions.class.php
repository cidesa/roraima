<?php

/**
 * licuniste actions.
 *
 * @package    siga
 * @subpackage licuniste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class licunisteActions extends autolicunisteActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->funciones_combos();

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
         $ced = 'lidatste_cedemp';
         $nom = 'lidatste_nomemp';
         $id = 'lidatste_nphojint_id';
         $tel = 'lidatste_telemp';
         $dir = 'lidatste_diremp';
         $c = new Criteria();
         $c->add(NphojintPeer::CODEMP,trim($codigo));

          $empleado = NphojintPeer::doSelectOne($c);

          if($empleado){
            $output = '[["'.$nom.'","'.$empleado->getNomemp().'",""],["'.$id.'","'.$empleado->getId().'",""],["'.$ced.'","'.$empleado->getCedemp().'",""],["'.$dir.'","'.$empleado->getDirhab().'",""],["'.$tel.'","'.$empleado->getTelhab().'",""]]';
          }else{
            $output = '[["'.$nom.'","'.H::REGVACIO.'",""],["'.$id.'","",""],["'.$ced.'","",""],["","",""]]';
          }
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
      $this->lidatste= $this->getLidatsteOrCreate();
      $this->updateLidatsteFromRequest();
      $this->funciones_combos();
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
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

	public function Cargarpais()
	{
		$tablas=array('ocpais');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
		return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function Cargarestados($codpais)
	{
		$tablas=array('ocestado');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
		return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}



	public function Cargarmunicipio($codpais,$codestado)
	{
		$tablas=array('ocmunici');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codmun','nommun');// arreglos donde me traigo el nombre y el codigo
		return $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}

	public function Cargarparroquia($codpais,$codestado,$codmunicipio)
	{
		$tablas=array('ocparroq');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpar','nompar');// arreglos donde me traigo el nombre y el codigo
		return $parroquia= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}
	public function Cargarsector($codpais,$codestado,$codmunicipio,$codparroquia)
	{
		$tablas=array('ocsector');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun','codpar');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio,$codparroquia);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codsec','nomsec');// arreglos donde me traigo el nombre y el codigo
		return $sector= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}

	public function funciones_combos()
	{
		$this->desste ='';
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->lidatste->getCodpai());//colocar lo q viene de bd
		$this->municipio = $this->Cargarmunicipio($this->lidatste->getCodpai(),$this->lidatste->getCodedo());//colocar lo q viene de bd
		$this->parroquia = $this->Cargarparroquia($this->lidatste->getCodpai(),$this->lidatste->getCodedo(),$this->lidatste->getCodmun());//colocar lo q viene de bd
		$this->sector = $this->Cargarsector($this->lidatste->getCodpai(),$this->lidatste->getCodedo(),$this->lidatste->getCodmun(),$this->lidatste->getCodpar());
	}

   public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}
		elseif ($this->getRequestParameter('par')=='2')
		{
			$this->municipio = $this->Cargarmunicipio($this->getRequestParameter('pais'),$this->getRequestParameter('estado'));
			$this->tipo='E';
		}
		elseif ($this->getRequestParameter('par')=='3')
		{
			$this->parroquia = $this->Cargarparroquia($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
			$this->tipo='M';
		}
		elseif ($this->getRequestParameter('par')=='4')
		{
			$this->sector = $this->Cargarsector($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'),$this->getRequestParameter('parroquia'));
			$this->tipo='S';
		}
	}

}
