<?php

/**
 * gindregeje actions.
 *
 * @package    siga
 * @subpackage gindregeje
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class gindregejeActions extends autogindregejeActions
{
  

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->giproanu = $this->getGiproanuOrCreate();	  
    $this->configGrid($this->giproanu->getNumtrim(),$this->giproanu->getAnoindg(),$this->giproanu->getRevanoindg());
  }

public function configGrid($ntri='',$ano='',$rev='')
  {	
	$c = new Criteria();
	$c->add(GiproanuPeer::NUMTRIM,$ntri);
	$c->add(GiproanuPeer::ANOINDG,$ano);
	$c->add(GiproanuPeer::REVANOINDG,$rev);
	$per = GiproanuPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Giregind');
    $opciones->setAnchoGrid(800);
    $opciones->setAncho(600);
    $opciones->setFilas(0);
    $opciones->setName('c');
    $opciones->setTitulo('Programación Indicadores');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Indicador');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setHTML(' type="text" readonly="true"');
    $col1->setNombreCampo('numindg');

    $col2 = new Columna('Programado');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="10" readonly="true" ');
    $col2->setNombreCampo('progtrim');
	
	$col3 = new Columna('Ejecutado');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);    
    $col3->setHTML('type="text" size="10" ');	
    $col3->setNombreCampo('ejectrim');
	
	$col4 = new Columna('Estatus Trimestre');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
	$col4->setOculta(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setHTML(' type="text" size="10" readonly="true"');
    $col4->setNombreCampo('esttrim');
	
	$col5 = new Columna('Fecha Cierre');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(true);
	$col5->setOculta(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
	$col5->setHTML(' type="text" size="10" readonly="true" ');
    $col5->setNombreCampo('feccierre');	

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
	$opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj = $opciones->getConfig($per);
    $this->giproanu->setObjtri($this->obj);

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

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
	$c = new Criteria();
	$c->add(GiproanuPeer::NUMTRIM,$clasemodelo->getNumtrim());
	$c->add(GiproanuPeer::ANOINDG,$clasemodelo->getAnoindg());
	$c->add(GiproanuPeer::REVANOINDG,$clasemodelo->getRevanoindg());
	$per = GiproanuPeer::doSelect($c);
	foreach($per as $reg)
	{
		$reg->delete();
	}
	
	foreach($grid[0] as $r)
	{
		$giproanu = new Giproanu();
		$giproanu->setNumtrim($clasemodelo->getNumtrim());
		$giproanu->setAnoindg($clasemodelo->getAnoindg());
		$giproanu->setRevanoindg($clasemodelo->getRevanoindg());
		$giproanu->setNumindg($r['numindg']);
		$giproanu->setProgtrim($r['progtrim']);
		$giproanu->setEjectrim($r['ejectrim']);
		$giproanu->setEsttrim($r['esttrim']);				
		if($r['esttrim']=='' || $r['esttrim']=='A')	
			$giproanu->setFeccierre(null);
		else
			$giproanu->setFeccierre($r['feccierre']);	
		$giproanu->save();	
	}
    return $this->redirect('gindregeje/list');
  }

  public function deleting($clasemodelo)
  {
    return $this->redirect('gindregeje/list');
  }


}
