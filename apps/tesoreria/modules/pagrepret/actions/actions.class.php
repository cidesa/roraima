<?php

/**
 * pagrepret actions.
 *
 * @package    Roraima
 * @subpackage pagrepret
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagrepretActions extends autopagrepretActions
{
	public function executeIndex()
	{
		return $this->forward('pagrepret', 'edit');
	}

	public function funciones_combos()
	{
		$this->tiposreportes = Constantes::ListaTipoReporte();
	}

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->tsrepret = $this->getTsrepretOrCreate();
		$this->funciones_combos();
		$this->configGrid();
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateTsrepretFromRequest();

			$this->saveTsrepret($this->tsrepret);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('pagrepret/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('pagrepret/list');
			}
			else
			{
				return $this->redirect('pagrepret/edit?id='.$this->tsrepret->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codrep=' ')
	{
	  if ($codrep=='')
		{
			$codrep=$this->tsrepret->getCodrep();
		}

		$c = new Criteria();
		$c->add(TsrepretPeer::CODREP,$codrep);
		$per = TsrepretPeer::doSelect($c);

        $this->fila=count($per);

		$opciones = new OpcionesGrid();
		$opciones->setEliminar(true);
		$opciones->setTabla('Tsrepret');
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('Tipo de Retención');
		$opciones->setFilas(200);
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Código');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setNombreCampo('codret');
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setHTML('type="text" size="10" maxlength="3"');
		$objs = array('codtip' => 1, 'destip' => 2);
        $metodo='Optipret_Pagretiva';
        $col1->setCatalogo('Optipret','sf_admin_edit_form',$objs,$metodo);
		$col1->setJScript('onBlur="ajax(this.id)"');

		$col2 = new Columna('Descripción');
		$col2->setTipo(Columna::TEXTO);
		$col2->setNombreCampo('desret');
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setHTML('type="text" size="100" readonly="true"');

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		$this->grid = $opciones->getConfig($per);
	}
	public function executeGrid()
	{
		if ($this->getRequestParameter('ajax')=='1')
		{
			$this->configGrid($this->getRequestParameter('codrep'));
		}

	}

	/**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveTsrepret($tsrepret)
	{
		$grid=Herramientas::CargarDatosGrid($this,$this->grid);
		Tesoreria::grabarIva2($tsrepret,$grid);
	  }
    /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
	  {
	    return $this->forward('pagrepret', 'edit');
	  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
   {
     $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     if ($this->getRequestParameter('ajax')=='1')
      {  $c=new Criteria();
        $c->add(OptipretPeer::CODTIP,$this->getRequestParameter('codigo'));
        $data=OptipretPeer::doSelectOne($c);
        if ($data){ $exis1='';}else{ $exis1='N';}
        $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexcom.'","3","c"],["'.$cajtexmos.'","'.$dato.'",""],["exisret","'.$exis1.'",""]]';
      }
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
   }

}
