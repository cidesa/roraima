<?php

/**
 * oycdefdivmun actions.
 *
 * @package    Roraima
 * @subpackage oycdefdivmun
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefdivmunActions extends autooycdefdivmunActions
{
  public $coderror= -1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->ocmunici = $this->getOcmuniciOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcmuniciFromRequest();

      if ($this->saveOcmunici($this->ocmunici)==-1)
      {
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdefdivmun/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdefdivmun/list');
      }
      else
      {
        return $this->redirect('oycdefdivmun/edit?id='.$this->ocmunici->getId());
      }
      }else
      {
         $this->labels = $this->getLabels();
         $err = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('',$err);
         return sfView::SUCCESS;
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
  protected function updateOcmuniciFromRequest()
  {
    $ocmunici = $this->getRequestParameter('ocmunici');
    $this->funciones_combos();

    if (isset($ocmunici['codpai']))
    {
      $this->ocmunici->setCodpai($ocmunici['codpai']);
    }
    if (isset($ocmunici['codedo']))
    {
      $this->ocmunici->setCodedo($ocmunici['codedo']);
    }
    if (isset($ocmunici['codciu']))
    {
      $this->ocmunici->setCodciu($ocmunici['codciu']);
    }
    if (isset($ocmunici['codmun']))
    {
      $this->ocmunici->setCodmun($ocmunici['codmun']);
    }
    if (isset($ocmunici['nommun']))
    {
      $this->ocmunici->setNommun($ocmunici['nommun']);
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
  protected function saveOcmunici($ocmunici)
  {
     $c= new Criteria();
    $c->add(OcmuniciPeer::CODPAI,$ocmunici->getCodpai());
    $c->add(OcmuniciPeer::CODEDO,$ocmunici->getCodedo());
    $c->add(OcmuniciPeer::CODCIU,$ocmunici->getCodciu());
    $c->add(OcmuniciPeer::CODMUN,$ocmunici->getCodmun());
    $data= OcmuniciPeer::doSelectOne($c);
    if (!$data)
    {
      $ocmunici->save();
      $this->coderror=-1;
      return $this->coderror;
    }
    else
    {
    	$this->coderror=1026;
    	return $this->coderror;
    }

  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->ocmunici = OcmuniciPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocmunici);

    $c= new Criteria();
    $c->add(OcparroqPeer::CODPAI,$this->ocmunici->getCodpai());
    $c->add(OcparroqPeer::CODEDO,$this->ocmunici->getCodedo());
    $c->add(OcparroqPeer::CODMUN,$this->ocmunici->getCodmun());
    $reg= OcparroqPeer::doSelect($c);
    if (!$reg)
    {
      $this->deleteOcmunici($this->ocmunici);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->getRequest()->setError('delete', 'No se puede eliminar el registro, tiene datos asociados.');
      return $this->forward('oycdefdivmun', 'list');
    }

    return $this->redirect('oycdefdivmun/list');
  }

  public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}else if ($this->getRequestParameter('par')=='2')
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
		$this->estados = $this->Cargarestados($this->ocmunici->getCodpai());//colocar lo q viene de bd
                $this->ciudades = $this->Cargarciudades($this->ocmunici->getCodpai(),$this->ocmunici->getCodedo());//colocar lo q viene de bd

	}

}
