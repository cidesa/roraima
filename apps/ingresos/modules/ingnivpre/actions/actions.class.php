<?php

/**
 * ingnivpre actions.
 *
 * @package    siga
 * @subpackage ingnivpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingnivpreActions extends autoingnivpreActions
{
	public function executeIndex()
	  {
	   	$codempresa = $this->getUser()->getAttribute('empresa');	   	
	  	$id=Herramientas::getX('CODEMP','Cidefniv','Id',$codempresa);	  	 	
	    return $this->redirect('ingnivpre/edit?id='.$id);
	  }
	  
	public function executeEdit()
	  {
	    $this->cidefniv = $this->getCidefnivOrCreate();
	    $this->listacategorias=Constantes::ListaCategorias();
	    $this->rs='';
	    $this->per='';
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCidefnivFromRequest();
	
	      $this->saveCidefniv($this->cidefniv);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('ingnivpre/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('ingnivpre/list');
	      }
	      else
	      {
	        return $this->redirect('ingnivpre/edit?id='.$this->cidefniv->getId());
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
	    $this->cidefniv = $this->getCidefnivOrCreate();
	    $this->updateCidefnivFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  
	  
	protected function updateCidefnivFromRequest()
	  {
	    $cidefniv = $this->getRequestParameter('cidefniv');
	    $this->listacategorias=Constantes::ListaCategorias();	   
	  	$codempresa = $this->getUser()->getAttribute('empresa');	  	
	
	    if (isset($cidefniv['codemp']))
	    {
	      $this->cidefniv->setCodemp($codempresa);
	    }
	    if (isset($cidefniv['nomemp']))
	    {
	      $this->cidefniv->setNomemp($cidefniv['nomemp']);
	    }
	    if (isset($cidefniv['rupcat']))
	    {
	      $this->cidefniv->setRupcat($cidefniv['rupcat']);
	    }
	    if (isset($cidefniv['ruppar']))
	    {
	      $this->cidefniv->setRuppar($cidefniv['ruppar']);
	    }
	    if (isset($cidefniv['nivdis']))
	    {
	      $this->cidefniv->setNivdis($cidefniv['nivdis']);
	    }
	    if (isset($cidefniv['forpre']))
	    {
	      $this->cidefniv->setForpre($cidefniv['forpre']);
	    }
	    if (isset($cidefniv['fecini']))
	    {
	      if ($cidefniv['fecini'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($cidefniv['fecini']))
	          {
	            $value = $dateFormat->format($cidefniv['fecini'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $cidefniv['fecini'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->cidefniv->setFecini($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->cidefniv->setFecini(null);
	      }
	    }
	    if (isset($cidefniv['feccie']))
	    {
	      if ($cidefniv['feccie'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($cidefniv['feccie']))
	          {
	            $value = $dateFormat->format($cidefniv['feccie'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $cidefniv['feccie'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->cidefniv->setFeccie($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->cidefniv->setFeccie(null);
	      }
	    }
	    if (isset($cidefniv['fecper']))
	    {
	      if ($cidefniv['fecper'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($cidefniv['fecper']))
	          {
	            $value = $dateFormat->format($cidefniv['fecper'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $cidefniv['fecper'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->cidefniv->setFecper($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->cidefniv->setFecper(null);
	      }
	    }
	    if (isset($cidefniv['asiper']))
	    {
	      $this->cidefniv->setAsiper($cidefniv['asiper']);
	    }
	    if (isset($cidefniv['numper']))
	    {
	      $this->cidefniv->setNumper($cidefniv['numper']);
	    }
	    if (isset($cidefniv['coraep']))
	    {
	      $this->cidefniv->setCoraep($cidefniv['coraep']);
	    }
	  
	      $this->cidefniv->setPeract('01');
	   
	      $this->cidefniv->setEtadef('A');
	    
	      $this->cidefniv->setStaprc('N');
	   
	      $this->cidefniv->setLoncod(32);
	    
	  }	 

	protected function getCidefnivOrCreate($id = 'id')
	  {
	    if (!$this->getRequestParameter($id))
	    {
	      $cidefniv = new Cidefniv();
	    }
	    else
	    {
	      $cidefniv = CidefnivPeer::retrieveByPk($this->getRequestParameter($id));
	
	      $this->forward404Unless($cidefniv);
	    }
	
	    return $cidefniv;
	  }	  
	  
	protected function getLabels()
	  {
	    return array(
	      'cidefniv{codemp}' => 'Código:',
	      'cidefniv{nomemp}' => 'Nombre Empresa:',
	      'cidefniv{rupcat}' => 'Clasificador de Categorías:',
	      'cidefniv{ruppar}' => 'Clasificador de Partidas:',
	      'cidefniv{nivdis}' => 'Nivel de Disponibilidad:',
	      'cidefniv{forpre}' => 'Formato de Código Presupuestario:',
	      'cidefniv{fecini}' => 'Inicio de Ejercicio:',
	      'cidefniv{feccie}' => 'Fin de Ejercicio:',
	      'cidefniv{fecper}' => 'Período:',
	      'cidefniv{asiper}' => 'Estimación Periódica:',
	      'cidefniv{numper}' => 'Números de Períodos:',
	      'cidefniv{coraep}' => 'Inicio de Correlativo de AEP:',
	      'cidefniv{peract}' => 'Activo:',
	      'cidefniv{etadef}' => 'Estatus def:',
	      'cidefniv{staprc}' => 'Estatus pre:',
	      'cidefniv{loncod}' => 'Longitud:',
	    );
	  }	  
}

