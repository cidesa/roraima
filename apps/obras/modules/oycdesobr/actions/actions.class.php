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
       
       $per = array();
	  
		$filas=5;
		$cabeza="Ingenieros Residentes";
		$eliminar=true;
		$titulos=array("Cdula","Nombre","Nro. C.I.V.");
		$ancho="1100";
		$alignf=array('left','left','left');
		$alignt=array('left','left','left');
		$campos=array('','','');
		$catalogos=array('','','');
		$ajax=array('','',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','t'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("","","");
		$totales=array("","","");
		$html=array('','','');
		$js=array('','','');
		$grabar=array("1","2","3");
		$filatotal='';
		 
		
		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
		'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
		
	  
	}
	
  public function executeEdit()
  {
    $this->ocregobr = $this->getOcregobrOrCreate();
    $this->funciones_combos(); 

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
