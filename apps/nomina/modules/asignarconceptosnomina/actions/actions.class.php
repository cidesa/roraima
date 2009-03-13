<?php

/**
 * asignarconceptosnomina actions.
 *
 * @package    siga
 * @subpackage asignarconceptosnomina
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class asignarconceptosnominaActions extends autoasignarconceptosnominaActions
{

  private $coderror = -1;
  
   public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();
    $this->configGridsi($this->npnomina->getCodnom(),$this->npnomina->getFrecal());
    $this->configGridno($this->npnomina->getCodnom(),$this->npnomina->getFrecal());
    

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnominaFromRequest();

      $this->saveNpnomina($this->npnomina);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('asignarconceptosnomina/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('asignarconceptosnomina/list');
      }
      else
      {
        return $this->redirect('asignarconceptosnomina/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  public function configGridsi($nomina='',$fre)
  {
			$sql = "select 1 as check, a.codcon as codcon, a.nomcon as nomcon, (case when a.conact='S' then 'SI' else 'NO' end) as conact, b.frecon as frecon,a.id as id  
					from npdefcpt a, npasiconnom b, npnomina c
					where a.codcon=b.codcon 
							and b.codnom=c.codnom
					and b.codnom='".$nomina."' order by a.codcon";
            $resp = Herramientas::BuscarDatos($sql,&$per); 
			$filas_arreglo=0;

			    $opciones = new OpcionesGrid();
		        $opciones->setTabla('Npasiconnom');
		        $opciones->setAnchoGrid(450);
		        $opciones->setTitulo('Conceptos Asignados por Nómina');
		        $opciones->setName('a');
		        $opciones->setHTMLTotalFilas(' ');
		        $opciones->setFilas($filas_arreglo);
		        $opciones->setEliminar(false);

		        // Se generan las columnas
		        $col1 = new Columna('');
		        $col1->setTipo(Columna::CHECK);
		        $col1->setEsGrabable(true);
		        $col1->setNombreCampo('check');
		        $col1->setHTML(' ');
		        $col1->setJScript('');
		        
		        $col2 = new Columna('Codigo Concepto');
		        $col2->setTipo(Columna::TEXTO);
		        $col2->setEsGrabable(true);
		        $col2->setAlineacionObjeto(Columna::CENTRO);
		        $col2->setAlineacionContenido(Columna::CENTRO);
		        $col2->setNombreCampo('Codcon');
		        $col2->setHTML('type="text" size="3" readonly=true' );

		        $col3 = new Columna('Nombre del Concepto');
		        $col3->setTipo(Columna::TEXTO);
		        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col3->setAlineacionContenido(Columna::IZQUIERDA);
		        $col3->setNombreCampo('Nomcon');
		        $col3->setHTML('type="text" size="30" readonly=true');

		        $col4 = new Columna('Frecuencia de Pago');
			    $col4->setTipo(Columna::COMBO);
			    $col4->setEsGrabable(true);
			    $col4->setNombreCampo('Frecon');
			    $col4->setCombo(Constantes::comboFrecuencia($fre));
			    $col4->setHTML(' ');

		        $col5 = new Columna('Activo');
		        $col5->setTipo(Columna::TEXTO);
		        $col5->setEsGrabable(true);
		        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col5->setAlineacionContenido(Columna::IZQUIERDA);
		        $col5->setNombreCampo('Conact');
		        $col5->setHTML('type="text" size="5" readonly=true');

		        $opciones->addColumna($col1);
		        $opciones->addColumna($col2);
		        $opciones->addColumna($col3);
		        $opciones->addColumna($col4);
		        $opciones->addColumna($col5);
		        $this->obj = $opciones->getConfig($per);
  } 
  
  
 
  public function configGridno($nomina='',$fre)
  {
	      $sql="select 0 as check, a.codcon as codcon, b.codnom, a.nomcon as nomcon, (case when a.conact='S' then 'SI' else 'NO' end) as conact, a.id as id
				from npdefcpt a left outer join npasiconnom b ON (a.codcon=b.codcon and b.codnom='".$nomina."') 
				where trim(b.codnom) is null";
				
            $resp = Herramientas::BuscarDatos($sql,&$per); 
			$filas_arreglo=0;

			    $opciones = new OpcionesGrid();
		        $opciones->setTabla('Npasiconnom');
		        $opciones->setAnchoGrid(450);
		        $opciones->setTitulo('Conceptos por Asignar');
		        $opciones->setName('b');
		        $opciones->setHTMLTotalFilas(' ');
		        $opciones->setFilas($filas_arreglo);
		        $opciones->setEliminar(false);

		        // Se generan las columnas
		        $col1 = new Columna('');
		        $col1->setTipo(Columna::CHECK);
		        $col1->setEsGrabable(true);
		        $col1->setNombreCampo('check');
		        $col1->setHTML(' ');
		        $col1->setJScript('');
		        
		        $col2 = new Columna('Codigo Concepto');
		        $col2->setTipo(Columna::TEXTO);
		        $col2->setEsGrabable(true);
		        $col2->setAlineacionObjeto(Columna::CENTRO);
		        $col2->setAlineacionContenido(Columna::CENTRO);
		        $col2->setNombreCampo('Codcon');
		        $col2->setHTML('type="text" size="3" readonly=true' );

		        $col3 = new Columna('Nombre del Concepto');
		        $col3->setTipo(Columna::TEXTO);
		        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col3->setAlineacionContenido(Columna::IZQUIERDA);
		        $col3->setNombreCampo('Nomcon');
		        $col3->setHTML('type="text" size="30" readonly=true');

		        $col4 = new Columna('Frecuencia de Pago');
			    $col4->setTipo(Columna::COMBO);
			    $col4->setEsGrabable(true);
			    $col4->setNombreCampo('Frecon');
			    $col4->setCombo(Constantes::comboFrecuencia($fre));
			    $col4->setHTML(' ');

		        $col5 = new Columna('Activo');
		        $col5->setTipo(Columna::TEXTO);
		        $col5->setEsGrabable(true);
		        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col5->setAlineacionContenido(Columna::IZQUIERDA);
		        $col5->setNombreCampo('Conact');
		        $col5->setHTML('type="text" size="5" readonly=true');

		        $opciones->addColumna($col1);
		        $opciones->addColumna($col2);
		        $opciones->addColumna($col3);
		        $opciones->addColumna($col4);
		        $opciones->addColumna($col5);
		        $this->obj2 = $opciones->getConfig($per);
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
  
  public function saveNpnomina($Npnomina)
  {
  	
    $gridsi=Herramientas::CargarDatosGrid($this,$this->obj,true);//1
    $gridno=Herramientas::CargarDatosGrid($this,$this->obj2,true);//2
  	Nomina::salvarAsignarconceptosnomina($Npnomina->getCodnom(),$gridsi,$gridno);
  }


  
  public function validateEdit()
  {
    $resp=-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

		$this->npnomina = $this->getNpnominaOrCreate();
    	$this->configGridsi($this->npnomina->getCodnom(),$this->npnomina->getFrecal());
    	$this->configGridno($this->npnomina->getCodnom(),$this->npnomina->getFrecal());
        $gridsi=Herramientas::CargarDatosGrid($this,$this->obj,true);//1
        $gridno=Herramientas::CargarDatosGrid($this,$this->obj2,true);//2
  	    $resp=Nomina::validarAsignacion($gridsi,$gridno);
  	    

      if($resp!=-1){
        $this->coderror = $resp; 
        return false;
      } else return true;

    }else return true;
  
  }
	
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
        
    $this->Npnomina= $this->getNpnominaOrCreate();
    //$this->configGridsi($this->Npnomina->getCodnom(),$this->npnomina->getFrecal());
    //$this->configGridno($this->Npnomina->getCodnom(),$this->npnomina->getFrecal());
    $this->updateNpnominaFromRequest();    
    
        
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
    if(!$this->validateEdit())
     {
      if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }
     }	
    	
    }
    return sfView::SUCCESS;

  }
  
  protected function updateNpnominaFromRequest()
  {
    /*$npnomina = $this->getRequestParameter('npnomina');

    if (isset($npnomina['codnom']))
    {
      $this->npnomina->setCodnom($npnomina['codnom']);
    }
    if (isset($npnomina['nomnom']))
    {
      $this->npnomina->setNomnom($npnomina['nomnom']);
    }*/
  }
  
  
  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *  
   */
  public function ActualizarGrid()
  {
    $this->configGrid();
      
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    
    
    $this->configGrid($grid[0],$grid[1]);
    
  }


}
