<?php

/**
 * tesmovsegban actions.
 *
 * @package    Roraima
 * @subpackage tesmovsegban
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovsegbanActions extends autotesmovsegbanActions
{
  public  $coderror1=-1;

	
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->tsmovban = $this->getTsmovbanOrCreate();
      try{ $this->updateTsmovbanFromRequest();}catch(Exception $ex){}
      if ($this->tsmovban->getId()=="")
      {
      	if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('tsmovban[fecban]'),$this->getRequestParameter('tsmovban[numcue]'))==false)
      	{
          $this->coderror1=536;
          return false;
      	}
      }
      return true;
    }else return true;
  }


	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->tsmovban = $this->getTsmovbanOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateTsmovbanFromRequest();

			$this->saveTsmovban($this->tsmovban);

			if (Herramientas::getX_vacio('numcue','Tsmovban','status',$this->tsmovban->getNumcue())=='A')
			{
				$this->setFlash('notice', 'Tus modificaciones han sido guardadas y el movimiento esta Anulado');
			}
			else
			{
				$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
			}

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('tesmovsegban/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('tesmovsegban/list');
			}
			else
      {
        return $this->redirect('tesmovsegban/edit?id='.$this->tsmovban->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
  protected function saveTsmovban($tsmovban,$id = 'id')
	{
		if (!$this->getRequestParameter($id))
		{
			$tsmovban->save();
		}
		else
		{
			$tsmovban->setStacon1('N');
                        $tsmovban->save();
			$debcre=Herramientas::getX('codtip','tstipmov','debcre',$this->tsmovban->getTipmov());
			$this->Actualiza_Bancos('A',$debcre);
		}
	}
	function  Actualiza_Bancos($accion,$debcre)
	{
		$debito=Herramientas::getX('numcue','Tsdefban','Debban',$this->tsmovban->getNumcue());
		$credito=Herramientas::getX('numcue','Tsdefban','Creban',$this->tsmovban->getNumcue());
		$montostrdeb=0;
		$montostrcre=0;
		if ($debcre=='D')
		{
			if ($accion == "A")
			{
				$montostrdeb = $debito + $this->tsmovban->getMonmov();
			}
			elseif ($accion == "E")
			{
				$montostrdeb = $debito - $this->tsmovban->getMonmov();
			}
		}
		elseif ($debcre=='C')
		{
			if ($accion == "A")
			{
				$montostrcre = $credito + $this->tsmovban->getMonmov();
			}
			elseif ($accion == "E")
			{
				$montostrcre = $credito - $this->tsmovban->getMonmov();
			}
		}
		$c = new Criteria();
		$c->add(TsdefbanPeer::NUMCUE, $this->tsmovban->getNumcue());
		$obj = TsdefbanPeer::doSelectone($c);
		if ($obj)
		{
			$obj->setDebban($montostrdeb);
			$obj->setCreban($montostrcre);
			$obj->save();
		}
	}

	public function executeAnular()
	{
		$obj1=$this->getRequestParameter('obj1');
		$c = new Criteria();
		$c->add(TsmovbanPeer::NUMCUE,$obj1);
		$this->tsmovban = TsmovbanPeer::doSelectOne($c);
		sfView::SUCCESS;

	}

	public function executeSalvaranu()
	{
		$c = new Criteria();
		$c->add(TsmovbanPeer::NUMCUE,$this->getRequestParameter('numcue'));
		$tsmovban = TsmovbanPeer::doSelectOne($c);
		if ($tsmovban)
		{
			if ($tsmovban->getStatus()=='C')
			{
				$tsmovban->setStatus('A');
				$tsmovban->save();
			}
		}
		sfView::SUCCESS;
	}



	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsmovbanFromRequest()
	{
		$tsmovban = $this->getRequestParameter('tsmovban');

		if (isset($tsmovban['numcue']))
		{
			$this->tsmovban->setNumcue($tsmovban['numcue']);
		}
		if (isset($tsmovban['nombanco']))
		{
			$this->tsmovban->setNombanco($tsmovban['nombanco']);
		}
		if (isset($tsmovban['codcta']))
        {
           $this->tsmovban->setCodcta($tsmovban['codcta']);
        }
		if (isset($tsmovban['refban']))
		{
			$this->tsmovban->setRefban($tsmovban['refban']);
		}
		if (isset($tsmovban['tipmov']))
		{
			$this->tsmovban->setTipmov($tsmovban['tipmov']);
		}
		if (isset($tsmovban['nommovim']))
		{
			$this->tsmovban->setNommovim($tsmovban['nommovim']);
		}
		if (isset($tsmovban['fecban']))
		{
			if ($tsmovban['fecban'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($tsmovban['fecban']))
					{
						$value = $dateFormat->format($tsmovban['fecban'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $tsmovban['fecban'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->tsmovban->setFecban($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->tsmovban->setFecban(null);
			}
		}
		if (isset($tsmovban['desban']))
		{
			$this->tsmovban->setDesban($tsmovban['desban']);
		}
		if (isset($tsmovban['monmov']))
		{
			$this->tsmovban->setMonmov($tsmovban['monmov']);
		}
		$this->tsmovban->setStatus('C');
		$this->tsmovban->setStacon('N');
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
	 {
	 	$dato=TsdefbanPeer::getNomcue($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=TstipmovPeer::getDestip($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }

	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
		{
			$this->tags=Herramientas::autocompleteAjax('numcue','tsdefban','numcue',$this->getRequestParameter('tsmovban[numcue]'));
		}
		if ($this->getRequestParameter('ajax')=='2')
		{
			$this->tags=Herramientas::autocompleteAjax('CodTip','TsTipMov','CodTip',$this->getRequestParameter('tsmovban[tipmov]'));
	    }
	}

	/**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->tsmovban = $this->getTsmovbanOrCreate();
    try{ $this->updateTsmovbanFromRequest();}catch(Exception $ex){}


    $this->labels = $this->getLabels();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('tsmovban{fecban}',$err);
      }
    }

    return sfView::SUCCESS;
  }

}
