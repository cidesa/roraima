<?php

/**
 * nomasicarconnom actions.
 *
 * @package    siga
 * @subpackage nomasicarconnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomasicarconnomActions extends autonomasicarconnomActions
{
  protected $coderr = -1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasicaremp/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Npasicaremp', 15);
    $c = new Criteria();
    $c->add(NpasicarempPeer::STATUS,"V");
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function cargarFrecuencias($frecal)
  {
    $frecuencia = array();
    if ($frecal=='Q')
    {
      $frecuencia=array('P' => 'Primera Quincena', 'S' => 'Segunda Quincena', 'D' => 'Las Dos Quincenas');
    }
    else if ($frecal=='S')
    {
      $frecuencia=array('1' => 'Primera Semana', '2' => 'Segunda Semana', '3' => 'Tercera Semana', '4' => 'Cuarta Semana', 'U' => 'Ultima Semana', 'T' => 'Todas las Semanas');
    }
    else
    {
      $frecuencia=array('M' => 'Mensual');
    }

    return $frecuencia;
  }
  
  public function CargarDedicacion()
  {
    $c = new Criteria();
    $lista_ded = NptipdedPeer::doSelect($c);

    $dedl = array();

    foreach($lista_ded as $obj_ded)
    {
      $dedl += array($obj_ded->getCodtip() => $obj_ded->getDestip());
    }
    return $dedl;
  }
  public function CargarCategoria()
  {
    $c = new Criteria();
    $lista_cat = NptipcatPeer::doSelect($c);

    $catl = array();

    foreach($lista_cat as $obj_cat)
    {
      $catl += array($obj_cat->getCodtipcat() => $obj_cat->getDestipcat());
    }
    return $catl;
  }
  
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
        $this->npasicaremp = $this->getNpasicarempOrCreate();
    	$this->formato= Herramientas::getMascaraCategoria();
    	$this->lonfor=strlen($this->formato);
   		$this->tipos=self::CargarTipoGasto();
        $this->updateNpasicarempFromRequest();
	    if (!$this->npasicaremp->getId())
	    {
			$cc = new Criteria();
			$cc->add(NpasicarempPeer :: CODEMP, $this->npasicaremp->getCodemp());
			$cc->add(NpasicarempPeer :: CODCAR, $this->npasicaremp->getCodcar());
			$cc->add(NpasicarempPeer :: CODNOM, $this->npasicaremp->getCodnom());
			$r = NpasicarempPeer :: doSelectOne($cc);
			if ($r)
			{
	            $this->coderr=447;
			}
	    }//if (!$npasicaremp->getId())


        if ($this->coderr<>-1 )
        {
          return false;
        }else return true;
    }else return true;
  }


  protected function saveNpasicaremp($npasicaremp)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    $arreglo=array($grid);
	
    $this->coderror = Nomina::salvarNomasicarconnom($npasicaremp,$arreglo);

    if($this->coderror!=-1)
    {
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
    }

  }

  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=NphojintPeer::getNomemp($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             return sfView::HEADER_ONLY;
      }
    else if ($this->getRequestParameter('ajax')=='2')
      { $this->div='';
        $dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
        $dato2=Herramientas::getX('codnom','npnomina','Frecal',$this->getRequestParameter('codigo'));
       $this->nomina=$this->getRequestParameter('codigo');

       $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["frecuencal","'.$dato2.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
      }
     else if ($this->getRequestParameter('ajax')=='3')
      { $this->div='S';
	    $js="";
        $c = new Criteria();
        $c->add(NpcargosPeer::CODCAR,$this->getRequestParameter('codigo'));
        $c->addJoin(NpcargosPeer::CODCAR,NpasicarnomPeer::CODCAR);
        $npcargos = NpcargosPeer::doSelectOne($c);
        if($npcargos){
          $dato=$npcargos->getNomcar();
          $cod = $npcargos->getCodcar();
		  $codtipcar=$npcargos->getCodtip();
        }else{
          $dato=Constantes::REGVACIO;
          $cod = '';
		  $codtipcar='';
        }
		if($this->getUser()->getAttribute('codcar','','nomasicarconnom')!='')
		{
			if($this->getUser()->getAttribute('codcar','','nomasicarconnom')==$codtipcar)
				$js.="$('gridcatded').show()";
			else
				$js.="$('gridcatded').hide()";		
		}
		

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$cod.'",""],["javascript","'.$js.'",""]]';
        $this->configGrid($this->getRequestParameter('codemp'),$this->getRequestParameter('codnom'),$this->getRequestParameter('codigo'),$this->getRequestParameter('frecuen'));
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

      }
     else if ($this->getRequestParameter('ajax')=='5')
      {
        $dato=NptipgasPeer::getDestipgas($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
     else if ($this->getRequestParameter('ajax')=='6')
      {
        $dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
  }

public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODEMP','Nphojint','CODEMP',$this->getRequestParameter('npasicaremp[codemp]'));
      }
      else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npasicaremp[codnom]'));
      }
      else if ($this->getRequestParameter('ajax')=='3')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCAR','Npcargos','CODCAR',$this->getRequestParameter('npasicaremp[codcar]'));
      }
      else if ($this->getRequestParameter('ajax')=='5')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIPGAS','Nptipgas','CODTIPGAS',$this->getRequestParameter('npasicaremp[codtipgas]'));
      }
  }


 public function configGrid($codemp,$codnom,$codcar,$frecal='')
  {
    $c = new Criteria();
    $c->add(NpasiconempPeer::CODEMP,$codemp);
    $objNpasiconemp = NpasiconempPeer::doSelect($c);
    // SI EL EMPLEADO NO TIENE CONCEPTOS ASIGNADOS LOS MARCA TODOS POR DEFECTO SINO MARCA SOLO LOS QUE TIENE
    if ($objNpasiconemp)
      $check = 0;
    else
      $check = 1;

  $sql = "SELECT y.*,
      max(case when z.status='M' then 'M' else '' end) as mont,
      max(case when z.status='C' then 'C' else '' end) as cant
      FROM (
      Select 1 as check,b.CodCon, b.nomcon, b.fecini, b.fecexp,b.cantidad,b.monto,b.FreCon,b.ACTIVO, b.acumulado, 9 as id
      from npasiconnom a, npasiconemp b
        where b.codemp='".$codemp."' and b.codcar='".$codcar."'
        and a.codnom='".$codnom."' and a.codcon=b.codcon
      union
      Select ".$check.",a.CodCon,b.nomcon,to_date('1970-01-01','yyyy-mm-dd'),
      to_date('2099-12-31','yyyy-mm-dd'),'0.00','0.00',a.FreCon,a.ACTIVO, '0.00', 9 as id
      from NpAsiConNom a,npdefcpt b
      where a.codcon=b.codcon
      and a.CodNom ='".$codnom."'
      AND A.CODCON NOT IN (
        SELECT f.CODCON
          FROM NPASICONEMP f, npasiconnom g
          WHERE
            CODEMP ='".$codemp."' and
            f.codcar='".$codcar."' and
            g.codnom='".$codnom."' and
            g.codcon=f.codcon
      )
        ) AS y
      left outer join (SELECT * FROM NPDEFMOV WHERE CODNOM = '001') AS z on (y.codcon=z.codcon)
      GROUP BY Y.CHECK,Y.CODCON,Y.NOMCON,Y.FECINI,Y.FECEXP,Y.CANTIDAD,Y.MONTO,Y.FRECON,Y.ACTIVO,Y.ACUMULADO,Y.ID
      ORDER BY CODCON";
//      print $sql; exit;



    $resp = Herramientas::BuscarDatos($sql,&$per);
  $filas_arreglo=0;

      $opciones = new OpcionesGrid();
      $opciones->setTabla('Npasiconemp');
        $opciones->setAnchoGrid(1000);
        $opciones->setTitulo(' Conceptos ');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas($filas_arreglo);
        $opciones->setEliminar(false);

        $col1 = new Columna('Marque');
        $col1->setTipo(Columna::CHECK);
        $col1->setEsGrabable(true);
        $col1->setNombreCampo('check');
        $col1->setHTML(' ');

        $col2 = new Columna('Cod. Concepto');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Codcon');
        $col2->setEsGrabable(true);
        $col2->setHTML('type="text" size="6" readonly=true');

        $col3 = new Columna('Nombre del Concepto');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setEsGrabable(true);
        $col3->setNombreCampo('Nomcon');
        $col3->setHTML('type="text" size="50" readonly=true');

        $col4 = new Columna('Fecha de Inicio');
        $col4->setTipo(Columna::FECHA);
        $col4->setAlineacionObjeto(Columna::IZQUIERDA);
        $col4->setAlineacionContenido(Columna::IZQUIERDA);
        $col4->setNombreCampo('Fecini');
        $col4->setEsGrabable(true);
        $col4->setJScript('onkeyup="javascript: mascara(this,"/",patron,true);"');
        $col4->setHTML('type="date" size="10"');

        $col5 = new Columna('Fecha de Expiración');
        $col5->setTipo(Columna::FECHA);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setNombreCampo('Fecexp');
        $col5->setJScript('onkeyup="javascript: mascara(this,"/",patron,true);"');
        $col5->setEsGrabable(true);
        $col5->setHTML('type="date" size="10"');

        $col6 = new Columna('Cantidad');
        $col6->setTipo(Columna::MONTO);
        $col6->setAlineacionObjeto(Columna::IZQUIERDA);
        $col6->setAlineacionContenido(Columna::IZQUIERDA);
        $col6->setNombreCampo('Cantidad');
        $col6->setEsGrabable(true);
        $col6->setHTML('type="integer" size="10" readonly=false');

        $col7 = new Columna('Monto');
        $col7->setTipo(Columna::MONTO);
        $col7->setAlineacionObjeto(Columna::IZQUIERDA);
        $col7->setAlineacionContenido(Columna::IZQUIERDA);
        $col7->setEsGrabable(true);
        $col7->setNombreCampo('Monto');
        $col7->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');
        $col7->setHTML('type="real" size="10" readonly=false');

        $col8 = new Columna('Frecuencia');
        $col8->setTipo(Columna::COMBO);
        $col8->setEsGrabable(true);
        $col8->setNombreCampo('frecon');
        $col8->setCombo(self::cargarFrecuencias($frecal));
        $col8->setHTML(' ');

        $col9 = new Columna('Activo');
        $col9->setTipo(Columna::TEXTO);
        $col9->setAlineacionObjeto(Columna::IZQUIERDA);
        $col9->setAlineacionContenido(Columna::IZQUIERDA);
        $col9->setEsGrabable(true);
        $col9->setNombreCampo('Activo');
        $col9->setHTML('type="text" size="1" readonly=false');

        $col10 = new Columna('Acumulado');
        $col10->setTipo(Columna::MONTO);
        $col10->setAlineacionObjeto(Columna::IZQUIERDA);
        $col10->setAlineacionContenido(Columna::IZQUIERDA);
        $col10->setEsGrabable(true);
        $col10->setOculta(true);
        $col10->setNombreCampo('Acumulado');
        $col10->setHTML('type="real" size="10" readonly=false');

        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
        $opciones->addColumna($col10);

        $this->obj = $opciones->getConfig($per);
     }

 public function executeEdit()
  {
  	$codtipcar='';
  	$varemp = $this->getUser()->getAttribute('configemp');
	  if(is_array($varemp))
	    if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomasicarconnom',$varemp['aplicacion']['nomina']['modulos']))
			 {
			 	if(array_key_exists('varforma',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
				   $this->getUser()->setAttribute('varforma',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['varforma'],'nomasicarconnom');									   
				if(array_key_exists('codcar',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))		 		 
				{
					#LA VARIABLE QUE SE TRAE DEL YML ES EL CODTICAR
					$this->getUser()->setAttribute('codcar',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['codcar'],'nomasicarconnom');	  		      									   					
					$codtipcar=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['codcar'];
				}
						
			 }
  
    $this->npasicaremp = $this->getNpasicarempOrCreate();
	$this->listadedicacion= $this->cargardedicacion();
	$this->listacategoria= $this->cargarcategoria();
    $this->formato= Herramientas::getMascaraCategoria();
    $this->lonfor=strlen($this->formato);
    $this->tipos=self::CargarTipoGasto();
	if($this->npasicaremp->getCodcar())	  
	  {
	  	$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,$this->npasicaremp->getCodcar());
		$perr = NpcargosPeer::doSelectOne($c);
		if($perr)
		{
			if($perr->getCodtip()==$codtipcar)
			{
				$this->getUser()->setAttribute('codtipcar',$codtipcar,'nomasicarconnom'); 	
			}else{
				$this->getUser()->setAttribute('codtipcar','','nomasicarconnom');
			}
		}	  	
	  }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasicarempFromRequest();

	  /*if($this->npasicaremp->getCodcar())	  
	  {
	  	$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,$this->npasicaremp->getCodcar());
		$perr = NpcargosPeer::doSelectOne($c);

		if($perr)
		{
			if($perr->getCodtip()==$codtipcar)
			{
				$this->getUser()->setAttribute('codtipcar',$codtipcar,'nomasicarconnom'); 	
			}else{
				$this->getUser()->setAttribute('codtipcar','','nomasicarconnom');
			}
		}	  	
	  }*/

      $this->saveNpasicaremp($this->npasicaremp);

      $this->npasicaremp->setId(Herramientas::getX_vacio('codemp','npasicaremp','id',$this->npasicaremp->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomasicarconnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomasicarconnom/list');
      }
      else
      {
        return $this->redirect('nomasicarconnom/edit?id='.$this->npasicaremp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateNpasicarempFromRequest()
  {
    $npasicaremp = $this->getRequestParameter('npasicaremp');
    $this->formato= Herramientas::getMascaraCategoria();
    $this->lonfor=strlen($this->formato);
    $this->tipos=self::CargarTipoGasto();

    if (isset($npasicaremp['codemp']))
    {
      $this->npasicaremp->setCodemp($npasicaremp['codemp']);
    }
    if (isset($npasicaremp['nomemp']))
    {
      $this->npasicaremp->setNomemp($npasicaremp['nomemp']);
    }
    if (isset($npasicaremp['codnom']))
    {
      $this->npasicaremp->setCodnom($npasicaremp['codnom']);
    }
    if (isset($npasicaremp['nomnom']))
    {
      $this->npasicaremp->setNomnom($npasicaremp['nomnom']);
    }
    if (isset($npasicaremp['codcar']))
    {
      $this->npasicaremp->setCodcar($npasicaremp['codcar']);
    }
    if (isset($npasicaremp['nomcar']))
    {
      $this->npasicaremp->setNomcar($npasicaremp['nomcar']);
    }
    if (isset($npasicaremp['paso']))
    {
      $this->npasicaremp->setPaso($npasicaremp['paso']);
    }
    if (isset($npasicaremp['despaso']))
    {
      $this->npasicaremp->setDespaso($npasicaremp['despaso']);
    }
    if (isset($npasicaremp['fecasi']))
    {
      if ($npasicaremp['fecasi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npasicaremp['fecasi']))
          {
            $value = $dateFormat->format($npasicaremp['fecasi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npasicaremp['fecasi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npasicaremp->setFecasi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npasicaremp->setFecasi(null);
      }
    }
    if (isset($npasicaremp['codtipgas']))
    {
      $this->npasicaremp->setCodtipgas($npasicaremp['codtipgas']);
    }
    if (isset($npasicaremp['destipgas']))
    {
      $this->npasicaremp->setDestipgas($npasicaremp['destipgas']);
    }
    if (isset($npasicaremp['codcat']))
    {
      $this->npasicaremp->setCodcat($npasicaremp['codcat']);
    }
    if (isset($npasicaremp['nomcat']))
    {
      $this->npasicaremp->setNomcat($npasicaremp['nomcat']);
    }
	if (isset($npasicaremp['codtipded']))
    {
      $this->npasicaremp->setCodtipded($npasicaremp['codtipded']);
    }
	if (isset($npasicaremp['codtipcat']))
    {
      $this->npasicaremp->setCodtipcat($npasicaremp['codtipcat']);
    }
  }

  public function CargarTipoGasto()
  {
   $c = new Criteria();
   $lista_tip = NptipgasPeer::doSelect($c);

   $tipos = array();

   foreach($lista_tip as $obj_tip)
   {
    $tipos += array($obj_tip->getCodtipgas() => $obj_tip->getDestipgas());
   }
   return $tipos;
  }

 protected function getNpasicarempOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npasicaremp = new Npasicaremp();$c = new Criteria();
      $fre = '';
      $c->add(NpnominaPeer::CODNOM,$this->getRequestParameter('npasicaremp[codnom]'));
      $objNomina = NpnominaPeer::doSelectOne($c);
      if ($objNomina)
      $fre = $objNomina->getFrecal();
      $this->configGrid($this->getRequestParameter('npasicaremp[codemp]'),$this->getRequestParameter('npasicaremp[codnom]'),$this->getRequestParameter('npasicaremp[codcar]'),$fre);
     }
    else
    {
      $npasicaremp = NpasicarempPeer::retrieveByPk($this->getRequestParameter($id));
          $fre = '';
    $c = new Criteria();
      $c->add(NpnominaPeer::CODNOM,$npasicaremp->getCodnom());
      $objNomina = NpnominaPeer::doSelectOne($c);
      if ($objNomina)
      $fre = $objNomina->getFrecal();

      $this->configGrid($npasicaremp->getCodemp(),$npasicaremp->getCodnom(),$npasicaremp->getCodcar(),$fre);
      $this->forward404Unless($npasicaremp);
    }
    return $npasicaremp;
  }

  public function executeEliminar()
  {
    $emp=$this->getRequestParameter('empleado');
    $car=$this->getRequestParameter('cargo');
    $nom=$this->getRequestParameter('nomina');
    $fec=$this->getRequestParameter('fecha');
	$explab=$this->getRequestParameter('explab');

    Nomina::eliminarNomasicarconnom($emp,$car,$nom,$fec,$explab);
    $this->setFlash('notice','Registro Eliminado exitosamente');
    return $this->redirect('nomasicarconnom/edit');

  }

   public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->npasicaremp = $this->getNpasicarempOrCreate();
	$this->formato= Herramientas::getMascaraCategoria();
	$this->lonfor=strlen($this->formato);
	$this->tipos=self::CargarTipoGasto();
	$this->listadedicacion= $this->cargardedicacion();
	$this->listacategoria= $this->cargarcategoria();
    $this->updateNpasicarempFromRequest();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }
}
