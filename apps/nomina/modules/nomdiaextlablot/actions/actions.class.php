<?php

/**
 * nomdiaextlablot actions.
 *
 * @package    siga
 * @subpackage nomdiaextlablot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdiaextlablotActions extends autonomdiaextlablotActions
{
  public function executeEdit()
  {
    $this->npdiaext = $this->getNpdiaextOrCreate();
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdiaextFromRequest();
      $this->saveNpdiaext($this->npdiaext);

	  $c= new Criteria();
		 $c->add(NpdiaextPeer::CODNOM,$this->npdiaext->getCodnom());
		 $c->add(NpdiaextPeer::FECHA,$this->npdiaext->getFecha());
		 $npdiaext_bus = NpdiaextPeer::doSelectOne($c);
		 if (count($npdiaext_bus)>0)
		 {
		 	$this->npdiaext->setId($npdiaext_bus->getId());
		 }

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdiaextlablot/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdiaextlablot/list');
      }
      else
      {
        return $this->redirect('nomdiaextlablot/edit?id='.$this->npdiaext->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


	public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$codigo=trim($this->getRequestParameter('codigo'));
	 	$fecha=$this->getRequestParameter('fecha');
	 	$dato=NpnominaPeer::getDesnom(trim($this->getRequestParameter('codigo')));
	 	$this->configGrid($codigo,$fecha);
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	 }
	}



  public function configGrid($codigo='',$fecha='')
  {

		 if($fecha=='')
		 {
		 	$sql="select 0 as check,id as id from empresa where codemp='xxx'";
		 }else
		 	$sql="select 0 as check,  a.codemp as codemp,a.nomemp as nomemp, a.id as id
				from  nphojint a ,npasicaremp c left outer join npdiaext b ON
				(c.codemp=b.codemp and c.codnom=b.codnom and b.codnom='$codigo' and b.fecha=to_date('$fecha','dd/mm/yyyy') )
				where a.codemp=c.codemp and trim(b.codnom) is null and c.codnom='$codigo' and c.status='V'
				union all
				select 1 as check,  a.codemp as codemp,a.nomemp as nomemp, a.id as id
				from nphojint a ,npdiaext b, npasicaremp c
				where b.codemp=a.codemp
				and a.codemp=c.codemp
				and b.codnom=c.codnom
				and b.codnom='$codigo'
				and b.fecha=to_date('$fecha','dd/mm/yyyy')
				and c.status='V'
				--order by a.codemp ";

		if(Herramientas::BuscarDatos($sql,&$result))
		{
			$per=$result;
		}else
		{
			$per=array();
		}
		$filas_arreglo=0;

		/*$c = new Criteria();
		$c->add(NpdiaextPeer::CODNOM,$codigo);
		$c->add(NpdiaextPeer::FECHA,$fecha);
		$c->addAscendingOrderByColumn(NpdiaextPeer::CODNOM);
		$per = NpdiaextPeer::doSelect($c);*/



		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npdiaext');
		$opciones->setName('a');
		$opciones->setAncho(800);
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('Empleados');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Marque');
	    $col1->setTipo(Columna::CHECK);
	    $col1->setNombreCampo('check');
	    $col1->setEsGrabable(true);
	    $col1->setHTML(' ');


		$col2 = new Columna('Cedula');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('codemp');
		$col2->setHTML('type="text" size="15" maxlength="15" readonly="readonly"');

		$col3 = new Columna('Nombre Empleado');
		$col3->setTipo(Columna::TEXTO);
		//$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::IZQUIERDA);
		$col3->setAlineacionContenido(Columna::IZQUIERDA);
		$col3->setNombreCampo('nomemp');
      	//$col3->setEsNumerico(true);
		$col3->setHTML('type="text" size="35" readonly="readonly"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
  }


protected function updateNpdiaextFromRequest()
  {
    $npdiaext = $this->getRequestParameter('npdiaext');

    if (isset($npdiaext['codnom']))
    {
      $this->npdiaext->setCodnom($npdiaext['codnom']);
    }
    if (isset($npdiaext['fecha']))
    {
      if ($npdiaext['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npdiaext['fecha']))
          {
            $value = $dateFormat->format($npdiaext['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npdiaext['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npdiaext->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npdiaext->setFecha(null);
      }
    }
    if (isset($npdiaext['codemp']))
    {
      $this->npdiaext->setCodemp($npdiaext['codemp']);
    }
  }

  protected function getNpdiaextOrCreate($id = 'id', $codnom = 'codnom', $fecha = 'fecha')
  {
    if (!$this->getRequestParameter($codnom))
    {
      $npdiaext = new Npdiaext();
 	  $this->configGrid($npdiaext->getCodnom(),$npdiaext->getFecha());
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpdiaextPeer::CODNOM,$this->getRequestParameter($codnom));
  	  $c->add(NpdiaextPeer::FECHA,$this->getRequestParameter($fecha));
  	  $npdiaext = NpdiaextPeer::doSelectOne($c);
 	  $this->configGrid($this->getRequestParameter($codnom),$this->getRequestParameter($fecha));
      $this->forward404Unless($npdiaext);
    }
    return $npdiaext;
  }


  protected function saveNpdiaext($npdiaext)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
	Nomina::Grabar_grid_nomdiaextlablot($npdiaext,$grid);
  }

  public function executeList()
  {
   return $this->redirect('nomdiaextlablot/edit');
  }

  public function executeDelete()
  {
   // $this->npdiaext = NpdiaextPeer::retrieveByPk($this->getRequestParameter('id'));
    $c = new Criteria();
    $c->add(NpdiaextPeer::CODNOM,$this->getRequestParameter('codnom'));
  	$c->add(NpdiaextPeer::FECHA,$this->getRequestParameter('fecha'));
    $this->npdiaext = NpdiaextPeer::doSelectOne($c);
    $this->forward404Unless($this->npdiaext);

    try
    {
      $this->deleteNpdiaext($this->npdiaext);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npdiaext. Make sure it does not have any associated items.');
      return $this->forward('nomdiaextlablot', 'list');
    }

    return $this->redirect('nomdiaextlablot/list');
  }

}
