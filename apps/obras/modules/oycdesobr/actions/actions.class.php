<?php

/**
 * oycdesobr actions.
 *
 * @package    siga
 * @subpackage oycdesobr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdesobrActions extends autooycdesobrActions
{
	public function Cargarpais()
	{
		$tablas=array('ocpais');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
		return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function Cargarestados($codpais)
	{
		$tablas=array('ocestado');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
		return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}


	public function Cargarmunicipio($codpais,$codestado)
	{
		$tablas=array('ocmunici');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codmun','nommun');// arreglos donde me traigo el nombre y el codigo
		return $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		
	}

	public function Cargarparroquia($codpais,$codestado,$codmunicipio)
	{
		$tablas=array('ocparroq');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpar','nompar');// arreglos donde me traigo el nombre y el codigo
		return $parroquia= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		
	}
	public function Cargarsector($codpais,$codestado,$codmunicipio,$codparroquia)
	{
		$tablas=array('ocsector');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun','codpar');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio,$codparroquia);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codsec','nomsec');// arreglos donde me traigo el nombre y el codigo
		return $sector= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		
	}		
    
	public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}
		elseif ($this->getRequestParameter('par')=='2')
		{
			$this->municipio = $this->Cargarmunicipio($this->getRequestParameter('pais'),$this->getRequestParameter('estado'));
			$this->tipo='E';
		}
		elseif ($this->getRequestParameter('par')=='3')
		{
			$this->parroquia = $this->Cargarparroquia($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
			$this->tipo='M';
		}
		elseif ($this->getRequestParameter('par')=='4')
		{
			$this->sector = $this->Cargarsector($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'),$this->getRequestParameter('parroquia'));
			$this->tipo='S';
		}
	}
       
    public function configGrid()
	{
      $c = new Criteria();
      $c->add(OcregobrPeer::CODOBR,$this->ocregobr->getCodobr());
      $per = OcregobrPeer::doSelect($c);
	  	 
	  if(false){
		//////////////////////
		//GRID
		
		$filas=17;
		$cabeza="";
		$eliminar=true;
		$titulos=array("Cod Partida","Descripción","Unidad","Cant","Cant.Contratada","Costo","Monto Presupuestario","Adicional");
		$ancho="1100";
		$alignf=array('center','left','center','left','right','right','right','right');
		$alignt=array('center','left','center','left','right','right','right','right');
		$campos=array('Codalm','Nomalm','Codubi','Nomubi','Eximin','Eximax','Exiact','Ptoreo');
		$catalogos=array('Cadefalm-sf_admin_edit_form-x1-x2','','Cadefubi-sf_admin_edit_form-x3-x4','','','','','');// por todas las columnas, si no tiene, se coloca vacio
		$ajax=array('2-x2-x1','','3-x4-x3','','','','',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','m','m','m','m'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("5","6","7","8");
		$totales=array("", "", "caregart_exitot", "");
		$mascaraubicacion=$this->mascaraubicacion;
		$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
		$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
		$grabar=array("1","3","5","6","7","8");
		$filatotal='';
		 
		
		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
		'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
		////////////////////// 

	  }else {
	    
	    //$mascaraubicacion=$this->mascaraubicacion;
	    // $i18n = $this->getContext()->getI18N();
	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid 
        $opciones->setEliminar(true);
        $opciones->setTabla('Ocregobr');
        $opciones->setAnchoGrid(1150);
        $opciones->setTitulo('');
        $opciones->setHTMLTotalFilas(' ');
        
        // Se generan las columnas
        $col1 = new Columna('Cod. Partida');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codobr');
        $col1->setCatalogo('','','');
        $col1->setAjax(2,2);
        
        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Despre');
        $col2->setHTML('type="text" size="25" disabled=true');
        
        $col3 = clone $col1;
        $col3->setTitulo('Unidad');        
        $col3->setNombreCampo('Despre');
        //$col3->setCatalogo('','','');
        $col3->setEsNumerico(true);
        //$col3->setJScript('');
        //$col3->setAjax(3,4);
        
        $col4 = clone $col3;        
        $col4->setTitulo('Cantidad');
        $col4->setNombreCampo('Despre');
        $col4->setTipo(Columna::MONTO);
        
        $col5 = new Columna('Cant.Contratada');
        $col5->setTipo(Columna::MONTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setNombreCampo('Despre');
        $col5->setEsNumerico(true);
        //$col5->setHTML('type="text" size="10"');
        $col5->setJScript('');

        $col6 = clone $col5;
        $col6->setTitulo('Costo');
        $col6->setNombreCampo('Despre');
        
        $col7 = clone $col5;
        $col7->setTitulo('Monto Presupuestado');
        $col7->setNombreCampo('Despre');
        //$col7->setEsTotal(true,'');
        
        $col8 = clone $col5;
        $col8->setTitulo('Adicional');
        $col8->setNombreCampo('Despre');
        
        // Se guardan las columnas en el objetos de opciones        
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per); 
	    
	  }
	  
	}

    public function configGrid2()
	{
      $c = new Criteria();
      $c->add(OcregobrPeer::CODOBR,$this->ocregobr->getCodobr());
      $per = OcregobrPeer::doSelect($c);
	  	 
	  if(false){
		//////////////////////
		//GRID
		
		$filas=5;
		$cabeza="";
		$eliminar=true;
		$titulos=array("Cod Partida","Descripción","Unidad","Cant","Cant.Contratada","Costo","Monto Presupuestario","Adicional");
		$ancho="1100";
		$alignf=array('center','left','center','left','right','right','right','right');
		$alignt=array('center','left','center','left','right','right','right','right');
		$campos=array('Codalm','Nomalm','Codubi','Nomubi','Eximin','Eximax','Exiact','Ptoreo');
		$catalogos=array('Cadefalm-sf_admin_edit_form-x1-x2','','Cadefubi-sf_admin_edit_form-x3-x4','','','','','');// por todas las columnas, si no tiene, se coloca vacio
		$ajax=array('2-x2-x1','','3-x4-x3','','','','',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','m','m','m','m'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("5","6","7","8");
		$totales=array("", "", "caregart_exitot", "");
		$mascaraubicacion=$this->mascaraubicacion;
		$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
		$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
		$grabar=array("1","3","5","6","7","8");
		$filatotal='';
		 
		
		$this->obj2=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
		'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
		////////////////////// 

	  }else {
	    
	    //$mascaraubicacion=$this->mascaraubicacion;
	    // $i18n = $this->getContext()->getI18N();
	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid 
        $opciones->setEliminar(true);
        $opciones->setTabla('Ocregobr');
        $opciones->setAnchoGrid(1150);
        $opciones->setTitulo('');
        $opciones->setHTMLTotalFilas(' ');
        
        // Se generan las columnas
        $col1 = new Columna('Cédula');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codobr');

        
        $col2 = new Columna('Nombre');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('codobr');        
        
        $col3 = clone $col1;
        $col3->setTitulo('Nro.C.I.V');                
        $col3->setTipo(Columna::TEXTO);        
        $col3->setNombreCampo('codobr');     
        
        
        // Se guardan las columnas en el objetos de opciones        
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
	    // Se genera el arreglo de opciones necesario para generar el grid
        $this->obj2 = $opciones->getConfig($per); 
	    
	  }
	  
	}
		
	
  public function executeEdit()
  {
    $this->ocregobr = $this->getOcregobrOrCreate();
    $this->funciones_combos(); 
    $this->configGrid();
    $this->configGrid2();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcregobrFromRequest();

      $this->saveOcregobr($this->ocregobr);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdesobr/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdesobr/list');
      }
      else
      {
        return $this->redirect('oycdesobr/edit?id='.$this->ocregobr->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }	
  
  protected function updateOcregobrFromRequest()
  {
    $ocregobr = $this->getRequestParameter('ocregobr');
    $this->funciones_combos(); 

    if (isset($ocregobr['codobr']))
    {
      $this->ocregobr->setCodobr($ocregobr['codobr']);
    }
    if (isset($ocregobr['codtipobr']))
    {
      $this->ocregobr->setCodtipobr($ocregobr['codtipobr']);
    }
    if (isset($ocregobr['desobr']))
    {
      $this->ocregobr->setDesobr($ocregobr['desobr']);
    }
    if (isset($ocregobr['fecini']))
    {
      if ($ocregobr['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregobr['fecini']))
          {
            $value = $dateFormat->format($ocregobr['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregobr['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregobr->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregobr->setFecini(null);
      }
    }
    if (isset($ocregobr['fecfin']))
    {
      if ($ocregobr['fecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregobr['fecfin']))
          {
            $value = $dateFormat->format($ocregobr['fecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregobr['fecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregobr->setFecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregobr->setFecfin(null);
      }
    }
    if (isset($ocregobr['codpai']))
    {
      $this->ocregobr->setCodpai($ocregobr['codpai']);
    }
    if (isset($ocregobr['codedo']))
    {
      $this->ocregobr->setCodedo($ocregobr['codedo']);
    }
    if (isset($ocregobr['codmun']))
    {
      $this->ocregobr->setCodmun($ocregobr['codmun']);
    }
    if (isset($ocregobr['nommun']))
    {
      $this->ocregobr->setNommun($ocregobr['nommun']);
    }
    if (isset($ocregobr['codpar']))
    {
      $this->ocregobr->setCodpar($ocregobr['codpar']);
    }
    if (isset($ocregobr['codsec']))
    {
      $this->ocregobr->setCodsec($ocregobr['codsec']);
    }
    if (isset($ocregobr['dirobr']))
    {
      $this->ocregobr->setDirobr($ocregobr['dirobr']);
    }
    if (isset($ocregobr['codpre']))
    {
      $this->ocregobr->setCodpre($ocregobr['codpre']);
    }
    if (isset($ocregobr['despre']))
    {
      $this->ocregobr->setDespre($ocregobr['despre']);
    }
  }
    
	public function funciones_combos()
	{
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->ocregobr->getCodpai());//colocar lo q viene de bd
		$this->municipio = $this->Cargarmunicipio($this->ocregobr->getCodpai(),$this->ocregobr->getCodedo());//colocar lo q viene de bd
		$this->parroquia = $this->Cargarparroquia($this->ocregobr->getCodpai(),$this->ocregobr->getCodedo(),$this->ocregobr->getCodmun());//colocar lo q viene de bd
		$this->sector = $this->Cargarsector($this->ocregobr->getCodpai(),$this->ocregobr->getCodedo(),$this->ocregobr->getCodmun(),$this->ocregobr->getCodpar());
	}  
}
