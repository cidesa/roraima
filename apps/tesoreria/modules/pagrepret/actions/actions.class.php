<?php

/**
 * pagrepret actions.
 *
 * @package    siga
 * @subpackage pagrepret
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
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

	protected function saveTsrepret($tsrepret)
	{
		$grid=Herramientas::CargarDatosGrid($this,$this->grid);
		Tesoreria::grabarIva2($tsrepret,$grid);
	  }
    public function executeSave()
	  {
	    return $this->forward('pagrepret', 'edit');
	  }

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
