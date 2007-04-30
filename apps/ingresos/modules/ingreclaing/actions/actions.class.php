<?php

/**
 * ingreclaing actions.
 *
 * @package    siga
 * @subpackage ingreclaing
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingreclaingActions extends autoingreclaingActions
{
	public function executeEdit()
	  {
	    $this->cireging = $this->getCiregingOrCreate();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCiregingFromRequest();
	
	      $this->saveCireging($this->cireging);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('ingreclaing/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('ingreclaing/list');
	      }
	      else
	      {
	        return $this->redirect('ingreclaing/edit?id='.$this->cireging->getId());
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
	    $this->cireging = $this->getCiregingOrCreate();
	    $this->updateCiregingFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  
	  
	protected function updateCiregingFromRequest()
	  {
	    $cireging = $this->getRequestParameter('cireging');
	
	    if (isset($cireging['refing']))
	    {
	      $this->cireging->setRefing($cireging['refing']);
	    }
	    if (isset($cireging['fecing']))
	    {
	      if ($cireging['fecing'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($cireging['fecing']))
	          {
	            $value = $dateFormat->format($cireging['fecing'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $cireging['fecing'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->cireging->setFecing($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->cireging->setFecing(null);
	      }
	    }
	    if (isset($cireging['desing']))
	    {
	      $this->cireging->setDesing($cireging['desing']);
	    }
	    if (isset($cireging['codtip']))
	    {
	      $this->cireging->setCodtip($cireging['codtip']);
	    }
	    if (isset($cireging['destip1']))
	    {
	      $this->cireging->setDestip1($cireging['destip1']);
	    }
	    if (isset($cireging['rifcon']))
	    {
	      $this->cireging->setRifcon($cireging['rifcon']);
	    }
	    if (isset($cireging['nomcon']))
	    {
	      $this->cireging->setNomcon($cireging['nomcon']);
	    }
	    if (isset($cireging['ctaban']))
	    {
	      $this->cireging->setCtaban($cireging['ctaban']);
	    }
	    if (isset($cireging['nomcue']))
	    {
	      $this->cireging->setNomcue($cireging['nomcue']);
	    }
	    if (isset($cireging['tipmov']))
	    {
	      $this->cireging->setTipmov($cireging['tipmov']);
	    }
	    if (isset($cireging['destip2']))
	    {
	      $this->cireging->setDestip2($cireging['destip2']);
	    }
	    if (isset($cireging['moning']))
	    {
	      $this->cireging->setMoning($cireging['moning']);
	    }
	    if (isset($cireging['monrec']))
	    {
	      $this->cireging->setMonrec($cireging['monrec']);
	    }
	    if (isset($cireging['mondes']))
	    {
	      $this->cireging->setMondes($cireging['mondes']);
	    }
	    if (isset($cireging['montot']))
	    {
	      $this->cireging->setMontot($cireging['montot']);
	    }
	    if (isset($cireging['previs']))
	    {
	      $this->cireging->setPrevis($cireging['previs']);
	    }
	    if (isset($cireging['desanu']))
	    {
	      $this->cireging->setDesanu($cireging['desanu']);
	    }
	    if (isset($cireging['fecanu']))
	    {
	      if ($cireging['fecanu'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($cireging['fecanu']))
	          {
	            $value = $dateFormat->format($cireging['fecanu'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $cireging['fecanu'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->cireging->setFecanu($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->cireging->setFecanu(null);
	      }
	    }
	  
	      $this->cireging->setStaing('A');
	    
	    if (isset($cireging['anoing']))
	    {
	      $this->cireging->setAnoing(substr($cireging['fecing'],7,10));
	    }
	  }	  
	  
	protected function getLabels()
	  {
	    return array(
	      'cireging{refing}' => 'Referencia:',
	      'cireging{fecing}' => 'Fecha:',
	      'cireging{desing}' => 'Descripción:',
	      'cireging{codtip}' => 'Tipo:',
	      'cireging{destip1}' => 'Descrición1:',
	      'cireging{rifcon}' => 'C.I./RIF del Contribuyente:',
	      'cireging{nomcon}' => 'Nombre:',
	      'cireging{ctaban}' => 'Cuenta Bancaria Nro:',
	      'cireging{nomcue}' => 'Nombre de la Cuenta:',
	      'cireging{tipmov}' => 'Tipo de Movimiento:',
	      'cireging{destip2}' => 'Descripción2:',
	      'cireging{moning}' => 'Ingreso:',
	      'cireging{monrec}' => 'Recargo:',
	      'cireging{mondes}' => 'Descuento:',
	      'cireging{montot}' => 'Neto:',
	      'cireging{previs}' => 'Previsto:',
	      'cireging{desanu}' => 'Descripción de Anulación:',
	      'cireging{fecanu}' => 'Fecha de Anulación:',
	      'cireging{staing}' => 'Estatus:',
	      'cireging{anoing}' => 'Anno:',
	    );
	  }	  
}	