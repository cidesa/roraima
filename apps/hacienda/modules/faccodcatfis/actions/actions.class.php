<?php

/**
 * faccodcatfis actions.
 *
 * @package    siga
 * @subpackage faccodcatfis
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faccodcatfisActions extends autofaccodcatfisActions
{
	public function executeIndex()
	  {
	    return $this->forward('faccodcatfis', 'list');
	  }

	public function executeEdit()
	  {
	    $this->fcdefnca = $this->getFcdefncaOrCreate();
	    $this->lista = array();
	    $this->listaperiodos = Constantes::ListaPeriodos();
	    $this->listadescripcion = Constantes::ListaDescripcion();
	    $this->listanivelinmueble = Constantes::ListaNivelesInmueble();
	    $this->tamano = Constantes::ListaCategorias();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFcdefncaFromRequest();
	
	      $this->saveFcdefnca($this->fcdefnca);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('faccodcatfis/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('faccodcatfis/list');
	      }
	      else
	      {
	        return $this->redirect('faccodcatfis/edit?id='.$this->fcdefnca->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }	  
	  
	public function handleErrorEdit()
	  {
	    $this->preExecute();
	    $this->fcdefnca = $this->getFcdefncaOrCreate();
	    $this->updateFcdefncaFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }

	protected function updateFcdefncaFromRequest()
	  {
	    $fcdefnca = $this->getRequestParameter('fcdefnca');
	
	    if (isset($fcdefnca['codpar']))
	    {
	      $this->fcdefnca->setCodpar($fcdefnca['codpar']);
	    }
	    if (isset($fcdefnca['codmun']))
	    {
	      $this->fcdefnca->setCodmun($fcdefnca['codmun']);
	    }
	    if (isset($fcdefnca['codedo']))
	    {
	      $this->fcdefnca->setCodedo($fcdefnca['codedo']);
	    }
	    if (isset($fcdefnca['codpai']))
	    {
	      $this->fcdefnca->setCodpai($fcdefnca['codpai']);
	    }
	    if (isset($fcdefnca['numper']))
	    {
	      $this->fcdefnca->setNumper($fcdefnca['numper']);
	    }
	    if (isset($fcdefnca['denumper']))
	    {
	      $this->fcdefnca->setDenumper($fcdefnca['denumper']);
	    }
	    if (isset($fcdefnca['numniv']))
	    {
	      $this->fcdefnca->setNumniv($fcdefnca['numniv']);
	    }
	    if (isset($fcdefnca['nivinm']))
	    {
	      $this->fcdefnca->setNivinm($fcdefnca['nivinm']);
	    }
	    if (isset($fcdefnca['nomext1']))
	    {
	      $this->fcdefnca->setNomext1($fcdefnca['nomext1']);
	    }
	    if (isset($fcdefnca['nomabr1']))
	    {
	      $this->fcdefnca->setNomabr1($fcdefnca['nomabr1']);
	    }
	    if (isset($fcdefnca['tamano1']))
	    {
	      $this->fcdefnca->setTamano1($fcdefnca['tamano1']);
	    }
	    if (isset($fcdefnca['nomext2']))
	    {
	      $this->fcdefnca->setNomext2($fcdefnca['nomext2']);
	    }
	    if (isset($fcdefnca['nomabr2']))
	    {
	      $this->fcdefnca->setNomabr2($fcdefnca['nomabr2']);
	    }
	    if (isset($fcdefnca['tamano2']))
	    {
	      $this->fcdefnca->setTamano2($fcdefnca['tamano2']);
	    }
	    if (isset($fcdefnca['nomext3']))
	    {
	      $this->fcdefnca->setNomext3($fcdefnca['nomext3']);
	    }
	    if (isset($fcdefnca['nomabr3']))
	    {
	      $this->fcdefnca->setNomabr3($fcdefnca['nomabr3']);
	    }
	    if (isset($fcdefnca['tamano3']))
	    {
	      $this->fcdefnca->setTamano3($fcdefnca['tamano3']);
	    }
	    if (isset($fcdefnca['nomext4']))
	    {
	      $this->fcdefnca->setNomext4($fcdefnca['nomext4']);
	    }
	    if (isset($fcdefnca['nomabr4']))
	    {
	      $this->fcdefnca->setNomabr4($fcdefnca['nomabr4']);
	    }
	    if (isset($fcdefnca['tamano4']))
	    {
	      $this->fcdefnca->setTamano4($fcdefnca['tamano4']);
	    }
	    if (isset($fcdefnca['nomext5']))
	    {
	      $this->fcdefnca->setNomext5($fcdefnca['nomext5']);
	    }
	    if (isset($fcdefnca['nomabr5']))
	    {
	      $this->fcdefnca->setNomabr5($fcdefnca['nomabr5']);
	    }
	    if (isset($fcdefnca['tamano5']))
	    {
	      $this->fcdefnca->setTamano5($fcdefnca['tamano5']);
	    }
	    if (isset($fcdefnca['nomext6']))
	    {
	      $this->fcdefnca->setNomext6($fcdefnca['nomext6']);
	    }
	    if (isset($fcdefnca['nomabr6']))
	    {
	      $this->fcdefnca->setNomabr6($fcdefnca['nomabr6']);
	    }
	    if (isset($fcdefnca['tamano6']))
	    {
	      $this->fcdefnca->setTamano6($fcdefnca['tamano6']);
	    }
	    if (isset($fcdefnca['nomext7']))
	    {
	      $this->fcdefnca->setNomext7($fcdefnca['nomext7']);
	    }
	    if (isset($fcdefnca['nomabr7']))
	    {
	      $this->fcdefnca->setNomabr7($fcdefnca['nomabr7']);
	    }
	    if (isset($fcdefnca['tamano7']))
	    {
	      $this->fcdefnca->setTamano7($fcdefnca['tamano7']);
	    }
	    if (isset($fcdefnca['nomext8']))
	    {
	      $this->fcdefnca->setNomext8($fcdefnca['nomext8']);
	    }
	    if (isset($fcdefnca['nomabr8']))
	    {
	      $this->fcdefnca->setNomabr8($fcdefnca['nomabr8']);
	    }
	    if (isset($fcdefnca['tamano8']))
	    {
	      $this->fcdefnca->setTamano8($fcdefnca['tamano8']);
	    }
	    if (isset($fcdefnca['nomext9']))
	    {
	      $this->fcdefnca->setNomext9($fcdefnca['nomext9']);
	    }
	    if (isset($fcdefnca['nomabr9']))
	    {
	      $this->fcdefnca->setNomabr9($fcdefnca['nomabr9']);
	    }
	    if (isset($fcdefnca['tamano9']))
	    {
	      $this->fcdefnca->setTamano9($fcdefnca['tamano9']);
	    }
	    if (isset($fcdefnca['nomext10']))
	    {
	      $this->fcdefnca->setNomext10($fcdefnca['nomext10']);
	    }
	    if (isset($fcdefnca['nomabr10']))
	    {
	      $this->fcdefnca->setNomabr10($fcdefnca['nomabr10']);
	    }
	    if (isset($fcdefnca['tamano10']))
	    {
	      $this->fcdefnca->setTamano10($fcdefnca['tamano10']);
	    }
	  }	  
	  
	protected function getLabels()
	  {
	    return array(
	      'fcdefnca{codpar}' => 'Parroquia:',
	      'fcdefnca{codmun}' => 'Mundo:',
	      'fcdefnca{codedo}' => 'Estado:',
	      'fcdefnca{codpai}' => 'Pais:',
	      'fcdefnca{numper}' => 'Número de Períodos por Año:',
	      'fcdefnca{denumper}' => 'Descripción:',
	      'fcdefnca{numniv}' => 'Número de Niveles:',
	      'fcdefnca{nivinm}' => 'Nivel del Inmuebles:',
	      'fcdefnca{nomext1}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr1}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano1}' => 'Tamaño:',
	      'fcdefnca{nomext2}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr2}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano2}' => 'Tamaño:',
	      'fcdefnca{nomext3}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr3}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano3}' => 'Tamaño:',
	      'fcdefnca{nomext4}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr4}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano4}' => 'Tamaño:',
	      'fcdefnca{nomext5}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr5}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano5}' => 'Tamaño:',
	      'fcdefnca{nomext6}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr6}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano6}' => 'Tamaño:',
	      'fcdefnca{nomext7}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr7}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano7}' => 'Tamaño:',
	      'fcdefnca{nomext8}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr8}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano8}' => 'Tamaño:',
	      'fcdefnca{nomext9}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr9}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano9}' => 'Tamaño:',
	      'fcdefnca{nomext10}' => 'Nombre Extendido:',
	      'fcdefnca{nomabr10}' => 'Nombre Abreviado:',
	      'fcdefnca{tamano10}' => 'Tamaño:',
	    );
	  }	  
}
