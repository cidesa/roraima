<?php

/**
 * oycregact actions.
 *
 * @package    siga
 * @subpackage oycregact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycregactActions extends autooycregactActions
{

	public function getDes_proyecto()
	{
		$c = new Criteria();
		$c->add(OcasiactPeer::CODCON,str_pad($this->ocregact->getCodcon(),32,' '));
		$c->addAscendingOrderByColumn(OcasiactPeer::CODCON);
		$this->per = OcasiactPeer::doSelect($c);
	}
	public function executeEdit()
	{
		$this->ocregact = $this->getOcregactOrCreate();
        $this->configGrid();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateOcregactFromRequest();

			$this->saveOcregact($this->ocregact);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('oycregact/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('oycregact/list');
			}
			else
      {
        return $this->redirect('oycregact/edit?id='.$this->ocregact->getId());
      }
    }
    else
    {
    	$this->labels = $this->getLabels();
    }
  }	
	protected function updateOcregactFromRequest()
	{
		$ocregact = $this->getRequestParameter('ocregact');
        $this->configGrid();

        if (isset($ocregact['codcon']))
        {
        	$this->ocregact->setCodcon($ocregact['codcon']);
		}
		if (isset($ocregact['codobr']))
		{
			$this->ocregact->setCodobr($ocregact['codobr']);
		}
		if (isset($ocregact['desobr']))
		{
			$this->ocregact->setDesobr($ocregact['desobr']);
		}
		if (isset($ocregact['codpro']))
		{
			$this->ocregact->setCodpro($ocregact['codpro']);
		}
		if (isset($ocregact['nompro']))
		{
			$this->ocregact->setNompro($ocregact['nompro']);
		}
		if (isset($ocregact['destipact']))
		{
			$this->ocregact->setDestipact($ocregact['destipact']);
		}
		if (isset($ocregact['numofi']))
		{
			$this->ocregact->setNumofi($ocregact['numofi']);
		}
		if (isset($ocregact['fecact']))
		{
			$this->ocregact->setFecact($ocregact['fecact']);
		}
		if (isset($ocregact['obsact']))
		{
			$this->ocregact->setObsact($ocregact['obsact']);
		}
		if (isset($ocregact['cedins']))
		{
			$this->ocregact->setCedins($ocregact['cedins']);
		}
		if (isset($ocregact['nomins']))
		{
			$this->ocregact->setNomins($ocregact['nomins']);
		}
		if (isset($ocregact['cedtec']))
		{
			$this->ocregact->setCedtec($ocregact['cedtec']);
		}
		if (isset($ocregact['nomtec']))
		{
			$this->ocregact->setNomtec($ocregact['nomtec']);
		}
		if (isset($ocregact['cedfis']))
		{
			$this->ocregact->setCedfis($ocregact['cedfis']);
		}
		if (isset($ocregact['nomdir']))
		{
			$this->ocregact->setNomdir($ocregact['nomdir']);
		}
		if (isset($ocregact['cedres']))
		{
			$this->ocregact->setCedres($ocregact['cedres']);
		}
		if (isset($ocregact['nomper']))
		{
			$this->ocregact->setNomper($ocregact['nomper']);
		}
		if (isset($ocregact['cedtop']))
		{
			$this->ocregact->setCedtop($ocregact['cedtop']);
		}
	}

	protected function getOcregactOrCreate($id = 'id')
	{
		if (!$this->getRequestParameter($id))
		{
			$ocregact = new Ocregact();
		}
		else
		{
			$ocregact = OcregactPeer::retrieveByPk($this->getRequestParameter($id));

			$this->forward404Unless($ocregact);
		}

		return $ocregact;
	}

	protected function processFilters()
	{
		if ($this->getRequest()->hasParameter('filter'))
		{
			$filters = $this->getRequestParameter('filters');

			$this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/ocregact/filters');
			$this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/ocregact/filters');
		}
	}

	protected function processSort()
	{
		if ($this->getRequestParameter('sort'))
		{
			$this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/ocregact/sort');
			$this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/ocregact/sort');
		}

		if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/ocregact/sort'))
		{
		}
	}

	protected function addFiltersCriteria($c)
	{
		if (isset($this->filters['codcon_is_empty']))
		{
			$criterion = $c->getNewCriterion(OcregactPeer::CODCON, '');
			$criterion->addOr($c->getNewCriterion(OcregactPeer::CODCON, null, Criteria::ISNULL));
			$c->add($criterion);
		}
		else if (isset($this->filters['codcon']) && $this->filters['codcon'] !== '')
		{
			$c->add(OcregactPeer::CODCON, strtr($this->filters['codcon'], '*', '%'), Criteria::LIKE);
		}
		if (isset($this->filters['cedins_is_empty']))
		{
			$criterion = $c->getNewCriterion(OcregactPeer::CEDINS, '');
			$criterion->addOr($c->getNewCriterion(OcregactPeer::CEDINS, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['cedins']) && $this->filters['cedins'] !== '')
    {
    	$c->add(OcregactPeer::CEDINS, strtr($this->filters['cedins'], '*', '%'), Criteria::LIKE);
    }
  }	

    public function configGrid()
	{

		/*$c = new Criteria();
		$c->add(OcasiactPeer::CODCON,str_pad($this->ocregact->getCodcon(),32,' '));*/
		$per = array();
		 
		//////////////////////
			//GRID

			$filas=17;
			$cabeza="Historial de Actas";
			$eliminar=true;
			$titulos=array("Código","Tipo Acta","Numero Oficio","Fecha",);
			$ancho="1100";
			$alignf=array('center','left','center','left');
			$alignt=array('center','left','center','left');
			$campos=array('Codcon','Codtipact','Numofi','Fecact');
			$catalogos=array('','','','');// por todas las columnas, si no tiene, se coloca vacio
			$ajax=array('2-x2-x1','','3-x4-x3',''); //parametro-cajitamostrar-autocompletar
			$tipos=array('t','t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
			$montos=array("5","6","7","8");
			$totales=array("", "", "ocregact_exitot", "");
			$mascaraubicacion=$this->mascaraubicacion;
			$html=array('type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
			$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
			$grabar=array("1","3","5","6","7","8");
			$filatotal='';
				

			$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos,
			'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos,
			'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales,
			'html'=>$html, 'js'=>$js, 'datos'=> $per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
			//////////////////////
	}
	      
}
