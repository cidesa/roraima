<?php

/**
 * nomfalpersal actions.
 *
 * @package    Roraima
 * @subpackage nomfalpersal
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomfalpersalActions extends autonomfalpersalActions
{
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npfalper/filters');

    // pager
    $this->pager = new sfPropelPager('Npfalper', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpfalperFromRequest()
	{
		$npfalper = $this->getRequestParameter('npfalper');

		if (Herramientas::getX('codemp','npasicaremp','status',trim($npfalper['codemp']))=='V')
		{
			$this->npfalper->setCodnom(Herramientas::getX('codemp','npasicaremp','codnom',trim($npfalper['codemp'])));
		}

		if (isset($npfalper['codemp']))
		{
			$this->npfalper->setCodemp($npfalper['codemp']);
		}
		if (isset($npfalper['nomemp']))
		{
			$this->npfalper->setNomemp($npfalper['nomemp']);
		}
		if (isset($npfalper['codmot']))
		{
			$this->npfalper->setCodmot(str_pad($npfalper['codmot'],4,'0',STR_PAD_LEFT));
		}
		if (isset($npfalper['desmotfal']))
		{
			$this->npfalper->setDesmotfal($npfalper['desmotfal']);
		}
		if (isset($npfalper['observ']))
		{
			$this->npfalper->setObserv($npfalper['observ']);
		}

		//$this->nphojint->setStaemp('P');
    if (isset($npfalper['fecdes']))
    {
      if ($npfalper['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npfalper['fecdes']))
          {
            $value = $dateFormat->format($npfalper['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npfalper['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npfalper->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFecdes(null);
      }
    }
		if (isset($npfalper['fechas']))
		{
			if ($npfalper['fechas'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($npfalper['fechas']))
					{
						$value = $dateFormat->format($npfalper['fechas'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $npfalper['fechas'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->npfalper->setFechas(Herramientas::dateAdd('d',0,$value,'-'));
					//$this->npfalper->setFecdes($value);
				}
				catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFechas(null);
        $this->npfalper->setFecdes(null);
      }
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
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=NphojintPeer::getNomemp(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
	 if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=NpmotfalPeer::getDesmotfal_text(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
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
  protected function saveNpfalper($npfalper)
  {
  	$this->updateNpfalperFromRequest();
  	$this->npfalper->setFecdes(date('Y-m-d'));
  	//$this->npfalper->setFechas();
    $npfalper->save();
	$c= new Criteria();
	$c->add(NphojintPeer::CODEMP,$npfalper->getCodemp());
	$nphojint_up = NphojintPeer::doSelectOne($c);
	if (count($nphojint_up)>0)
	{
		$nphojint_up->setStaemp('P');
  	    $nphojint_up->save();
	}
  }


}

