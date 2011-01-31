<?php

/**
 * presnomsemmes actions.
 *
 * @package    Roraima
 * @subpackage presnomsemmes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomsemmesActions extends autopresnomsemmesActions
{
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nppernom/filters');

     // 15    // pager
    $this->pager = new sfPropelPager('Nppernom', 15);
    $c = new Criteria();
	$c->addSelectColumn(NppernomPeer::CODNOM);
	$c->addSelectColumn(NppernomPeer::ANNO);
	$c->addSelectColumn("'' AS MES");
	$c->addSelectColumn("date(now()) AS FECINI");
	$c->addSelectColumn("date(now()) AS FECFIN");
	$c->addSelectColumn("max(ID) AS ID");
	$c->addGroupByColumn(NppernomPeer::CODNOM);
    $c->addGroupByColumn(NppernomPeer::ANNO);
	
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }	

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->configGrid($this->nppernom->getCodnom());
  }

  public function configGrid($nomina='')
  {
  	if($nomina!='') 
	{
		$cc = new Criteria();
		$cc->add(NpnominaPeer::CODNOM,$nomina);
		$percc = NpnominaPeer::doSelect($cc);
		
		if($percc)
		{
			$c = new Criteria();
			$c->add(NppernomPeer::CODNOM,$nomina);
			$c->addAscendingOrderByColumn(NppernomPeer::MES);
			$per = NppernomPeer::doSelect($c);	
			if(!$per)
			{
			  $sql="select pereje as mes,
			  			case when pereje='01' then 'ENERO'
						when pereje='02' then 'FEBRERO'
						when pereje='03' then 'MARZO'
						when pereje='04' then 'ABRIL'
						when pereje='05' then 'MAYO'
						when pereje='06' then 'JUNIO'
						when pereje='07' then 'JULIO'
						when pereje='08' then 'AGOSTO'
						when pereje='09' then 'SEPTIEMBRE'
						when pereje='10' then 'OCTUBRE'
						when pereje='11' then 'NOVIEMBRE'
						else 'DICIEMBRE' end as desmes,
			  to_char(fecdes,'dd/mm/yyyy') as fecini,to_char(fechas,'dd/mm/yyyy') as fecfin, 9 as id 
			  from contaba1 order by pereje";	
				if (Herramientas :: BuscarDatos($sql, & $result)) 
				   $per = $result;
				else
				   $per=array();
			}	
		}else
		{
			$per=array();
		}			
	}else
	   $per=array();
		
  	
	$opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Nppernom');
    $opciones->setAnchoGrid(800);
    $opciones->setAncho(600);
    $opciones->setFilas(0);
    $opciones->setName('a');
    $opciones->setTitulo('Periodos por Nomina');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Mes');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setHTML('type="text" size="10" readonly="true"');
    $col1->setNombreCampo('mes');

    $col2 = new Columna('Descripcion');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="10" readonly="true"');
    $col2->setNombreCampo('desmes');

    $col3 = new Columna('Fecha Desde');
    $col3->setTipo(Columna::FECHA);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('fecini');
    $col3->setHTML('type="text" size="10" ');

    $col4 = new Columna('Fecha Hasta');
    $col4->setTipo(Columna::FECHA);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('fecfin');
    $col4->setHTML('type="text" size="10" ');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    $this->obj_per = $opciones->getConfig($per);
    $this->nppernom->setObjper($this->obj_per);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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
		$nomnom = H::getX('Codnom','Npnomina','Nomnom',$codigo);
		$sql="select to_char(fecini,'yyyy') as anno from contaba";
		if (Herramientas :: BuscarDatos($sql, & $result)) 
	      $anno = $result[0]['anno'];
	    else
		  $anno = date('Y');
		$this->nppernom = $this->getNppernomOrCreate();
		$this->configGrid($codigo);
		$js="$('nppernom_nomnom').focus()";
		
        $output = '[["nppernom_nomnom","'.$nomnom.'",""],["nppernom_anno","'.$anno.'",""],["javascript","'.$js.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    #return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj_per,true);

  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($nppernom)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj_per,true);
		
    return PS::salvar_nppernom($nppernom,$grid);
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($nppernom)
  {
    $c = new Criteria;
    $c->add(NppernomPeer :: CODNOM, $nppernom->getCodnom());	
    $per = NppernomPeer :: doDelete($c);
	return -1;
  }


}
