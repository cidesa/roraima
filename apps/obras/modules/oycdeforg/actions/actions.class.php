<?php

/**
 * oycdeforg actions.
 *
 * @package    Roraima
 * @subpackage oycdeforg
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdeforgActions extends autooycdeforgActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->ocdeforg = $this->getOcdeforgOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcdeforgFromRequest();

      $this->saveOcdeforg($this->ocdeforg);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdeforg/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdeforg/list');
      }
      else
      {
        return $this->redirect('oycdeforg/edit?id='.$this->ocdeforg->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOcdeforgFromRequest()
	{
		$ocdeforg = $this->getRequestParameter('ocdeforg');
		$this->funciones_combos();

		if (isset($ocdeforg['codorg']))
		{
			$this->ocdeforg->setCodorg(str_pad($ocdeforg['codorg'],4,'0',STR_PAD_LEFT));
		}
		if (isset($ocdeforg['desorg']))
		{
			$this->ocdeforg->setDesorg($ocdeforg['desorg']);
		}
		if (isset($ocdeforg['codtiporg']))
		{
			$this->ocdeforg->setCodtiporg($ocdeforg['codtiporg']);
		}
		if (isset($ocdeforg['destiporg']))
		{
			$this->ocdeforg->setDestiporg($ocdeforg['destiporg']);
		}
		if (isset($ocdeforg['entorg']))
		{
			$this->ocdeforg->setEntorg($ocdeforg['entorg']);
		}
		if (isset($ocdeforg['dirorg']))
		{
			$this->ocdeforg->setDirorg($ocdeforg['dirorg']);
		}
		if (isset($ocdeforg['codpai']))
		{
			$this->ocdeforg->setCodpai($ocdeforg['codpai']);
		}
		if (isset($ocdeforg['nompai']))
		{
			$this->ocdeforg->setNompai($ocdeforg['nompai']);
		}
		if (isset($ocdeforg['codedo']))
		{
			$this->ocdeforg->setCodedo($ocdeforg['codedo']);
		}
		if (isset($ocdeforg['nomedo']))
		{
			$this->ocdeforg->setNomedo($ocdeforg['nomedo']);
		}
		if (isset($ocdeforg['codciu']))
		{
			$this->ocdeforg->setCodciu($ocdeforg['codciu']);
		}
		if (isset($ocdeforg['nomciu']))
		{
			$this->ocdeforg->setNomciu($ocdeforg['nomciu']);
		}
		if (isset($ocdeforg['telorg']))
		{
			$this->ocdeforg->setTelorg($ocdeforg['telorg']);
		}
		if (isset($ocdeforg['faxorg']))
    {
      $this->ocdeforg->setFaxorg($ocdeforg['faxorg']);
    }
    if (isset($ocdeforg['emaorg']))
    {
      $this->ocdeforg->setEmaorg($ocdeforg['emaorg']);
    }
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('codtiporg','octiporg','codtiporg',$this->getRequestParameter('ocdeforg[codtiporg]'));
      }
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        $dato=Herramientas::getX('codtiporg','octiporg','destiporg',str_pad($codigo,4,0,STR_PAD_LEFT));
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

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


	public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}
		elseif ($this->getRequestParameter('par')=='2')
		{
			$this->ciudades = $this->Cargarciudades($this->getRequestParameter('pais'),$this->getRequestParameter('estado'));
			$this->tipo='E';
		}
	}

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


	public function Cargarciudades($codpais,$codestado)
	{
		$tablas=array('occiudad');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codciu','nomciu');// arreglos donde me traigo el nombre y el codigo
		return $ciudad= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}

	public function funciones_combos()
	{
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->ocdeforg->getCodpai());//colocar lo q viene de bd
		$this->ciudades = $this->Cargarciudades($this->ocdeforg->getCodpai(),$this->ocdeforg->getCodedo());//colocar lo q viene de bd
	}

}
