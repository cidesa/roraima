<?php

/**
 * faactpre actions.
 *
 * @package    siga
 * @subpackage faactpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faactpreActions extends autofaactpreActions
{
  public function executeIndex()
  {
  	$this->setVars();
    return $this->forward('faactpre', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
	public function executeEdit()
	{
	    $this->faartpvp = $this->getFaartpvpOrCreate();
	    $this->setVars();
	    $this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('faartpvp[artdesde]'),$this->getRequestParameter('faartpvp[arthasta]'));

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFaartpvpFromRequest();
	      if ($this->saveFaartpvp($this->faartpvp)==-1)
		  {
		      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

              $this->faartpvp->setId(Herramientas::getX_vacio('codart','faartpvp','id',$this->faartpvp->getCodart()));

		      if ($this->getRequestParameter('save_and_add'))
		      {
		        return $this->redirect('faactpre/create');
		      }
		      else if ($this->getRequestParameter('save_and_list'))
		      {
		        return $this->redirect('faactpre/list');
		      }
		      else
		      {
				return $this->redirect('faactpre/edit?id='.$this->faartpvp->getId());
		      }
		    }
		   else
		    {
	          $this->labels = $this->getLabels();
	          return sfView::SUCCESS;
	        }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }

	}
  public function editing()
  {
		//$this->configGrid();

  }

  public function setVars(){
	    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
	    $this->longitud = strlen($this->mascaraarticulo);
  }

  public function configGrid($id=' ',$artdesde=' ',$arthasta=' ')
  {
		$this->setVars();

		$c = new Criteria();
		$c->add(CaregartPeer::TIPO,'A');
	    $c->add(CaregartPeer::CODART, CaregartPeer::CODART." between '{$artdesde}' AND '{$arthasta}' AND length(codart) >= '".$this->longitud."'", Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(CaregartPeer::CODART);
		$per = CaregartPeer::doSelect($c);

	    $filas_arreglo=0;

	    $opciones = new OpcionesGrid();
        $opciones->setTabla('Caregart');
        $opciones->setAnchoGrid(860);
        $opciones->setTitulo(' ');
        $opciones->setName('a');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas($filas_arreglo);
        $opciones->setEliminar(false);

        // Se generan las columnas
        $col1 = new Columna('Codigo Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('Codart');
        $col1->setHTML('type="text" size="20" readonly=true');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Desart');
        $col2->setHTML('type="text" size="100" readonly=true');

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		$this->obj = $opciones->getConfig($per);

  }


  public function executeAjax()
  {

	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $codigo=$this->getRequestParameter('codigo');
	 if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$dato=Herramientas::getX('codart','Caregart','desart',trim($codigo));
		 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
		 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		 	$this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('artdesde'),$this->getRequestParameter('arthasta'));
		 	//$this->configGrid($this->getRequestParameter('id'),'01-0003-003','01-0003-007');
	    }

	    //return sfView::HEADER_ONLY;

  }

  public function executeGrid()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
 		$dato='';
 		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
 		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		$this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('artdesde'),$this->getRequestParameter('arthasta'));
		//$this->configGrid($this->getRequestParameter('id'),'01-0003-003','01-0003-007');
	 }
  }

  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->configGrid();
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

	protected function saveFaartpvp($faartpvp)
	{
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Facturacion::salvarFaactpre($faartpvp,$grid,$this->getRequestParameter('faartpvp[tipo]'),$this->getRequestParameter('faartpvp[precio]'),$this->getRequestParameter('faartpvp[monaum]'));
		return -1;
	}

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
