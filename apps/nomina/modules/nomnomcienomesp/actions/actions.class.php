<?php

/**
 * nomnomcienomesp actions.
 *
 * @package    siga
 * @subpackage nomnomcienomesp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnomcienomespActions extends autonomnomcienomespActions
{
  //public $visible="";

  public function executeIndex()
  {
    return $this->redirect('nomnomcienomesp/edit');
  }

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
     $codnomesp = $this->getRequestParameter('codnomesp');
     $cajtexmos = $this->getRequestParameter('cajtexmos');
     $cajtexcom = $this->getRequestParameter('cajtexcom');
     $codigo    = $this->getRequestParameter('codigo');

	if ($this->getRequestParameter('ajax')=='1')
      {
		$dato      = Herramientas::getX('codnomesp','npnomesptipos','desnomesp',$codigo);
		$fecnomdes = Herramientas::getX('codnomesp','npnomesptipos','fecnomdes',$codigo);
		$fecnomhas = Herramientas::getX('codnomesp','npnomesptipos','fecnomhas',$codigo);

//		date('d/m/Y',strtotime($dato2));
        //$dato=CaproveePeer::getNompro($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["npnomesptipos_ultfec","'.date('d/m/Y',strtotime($fecnomdes)).'",""],["npnomesptipos_profec","'.date('d/m/Y',strtotime($fecnomhas)).'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
      }
	elseif ($this->getRequestParameter('ajax')=='2')
	{ $dato="";
	  $dato2="";
	  $dato3="";
	  $dato4="";
	  $datos="";
	  $fre="";
	  $validafechacierre="";
	  $this->visible="";

	  $fecnomhas = Herramientas::getX('codnomesp','npnomesptipos','fecnomhas',$codnomesp);
	  $dato2=Herramientas::getX('codnomesp','npnomesptipos','fecnomdes',$codnomesp);
	  $dato3=Herramientas::getX('codnomesp','npnomesptipos','fecnomhas',$codnomesp);

	  $dato=Herramientas::getX('CODNOM','Npnomina','nomnom',$codigo);

	  if ($dato!='<!Registro no Encontrado o Vacio!>')
	  {
	  	//$dato2=Herramientas::getX('CODNOM','Npnomina','Ultfec',$codigo);
	  	$datos=date('d/m/Y',strtotime($dato2));
	  	//$dato3=Herramientas::getX('CODNOM','Npnomina','Profec',$codigo);
	  	$dato4=Herramientas::getX('CODNOM','Npnomina','Frecal',$codigo);
	  	$numsem=Herramientas::getX('CODNOM','Npnomina','numsem',$codigo);

        if ($dato4=='S')
        { $fre='Nomina Semanal';}
        else if ($dato4=='Q')
        { $fre='Nomina Quincenal';}
        else if ($dato4=='M')
        { $fre='Nomina Mensual';}

	    CierredeNominaEspecial::Consulta2($codigo,$dato2,$dato3,&$jesus,$codnomesp);
	    if (CierredeNominaEspecial::Validar_Fecha_Cierre($codigo, $codnomesp, $fecnomhas))
	    {
	      $validafechacierre='S';
	    }else {
	      $validafechacierre='N';
	    }
	      $this->visible=$jesus;
	  }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fecha","'.$datos.'",""],["frecuencia","'.$dato4.'",""],["npnomesptipos_pago","'.$fre.'",""],["valida","'.$validafechacierre.'",""],["npnomesptipos_numsem","'.$numsem.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      $this->npnomesptipos = $this->getNpnomesptiposOrCreate();
     // return sfView::HEADER_ONLY;
	}
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

  public function executeRealizarcierre()
  {
    $codnomesp = $this->getRequestParameter('codnomesp');
    $codigo    = $this->getRequestParameter('codnom');
    $ultfec    = $this->getRequestParameter('ultfec');
    $profec    = $this->getRequestParameter('profec');
    $numsem    = $this->getRequestParameter('numsem');

	CierredeNominaEspecial::procesoCierre($codigo,$ultfec,$profec,&$msj,$codnomesp,$numsem);

	if ($msj=='1')
	{
		$this->setFlash('notice2', 'La Nómina Especial no puede ser cerrada');
		}
	else {
		$this->setFlash('notice', 'La Nómina Especial fue Cerrada Satisfactoriamente');
		}
		return $this->redirect('nomnomcienomesp/index');

  }

}
