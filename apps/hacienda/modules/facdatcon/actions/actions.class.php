<?php

/**
 * facdatcon actions.
 *
 * @package    siga
 * @subpackage facdatcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facdatconActions extends autofacdatconActions
{
	public function CargarPartida()
		{
		$c = new Criteria();
		$lista_tip = BndisbiePeer::doSelect($c);
		
		$tipos = array();
		
		foreach($lista_tip as $obj_tip)
		{
		$tipos += array($obj_tip->getCoddis()." - ".$obj_tip->getDesdis() => $obj_tip->getCoddis()." - ".$obj_tip->getDesdis());    
		}
		return $tipos;
	    }	
	
	public function executeEdit()
	  {
	    $this->fcconrep = $this->getFcconrepOrCreate();
	    $this->configGrid();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFcconrepFromRequest();
	
	      $this->saveFcconrep($this->fcconrep);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('facdatcon/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('facdatcon/list');
	      }
	      else
	      {
	        return $this->redirect('facdatcon/edit?id='.$this->fcconrep->getId());
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
	    $this->fcconrep = $this->getFcconrepOrCreate();
	    $this->updateFcconrepFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }

	protected function updateFcconrepFromRequest()
	  {
	    $fcconrep = $this->getRequestParameter('fcconrep');
	    $this->configGrid();
	
	    if (isset($fcconrep['rifcon']))
	    {
	      $this->fcconrep->setRifcon($fcconrep['rifcon']);
	    }
	    if (isset($fcconrep['nitcon']))
	    {
	      $this->fcconrep->setNitcon($fcconrep['nitcon']);
	    }
	    if (isset($fcconrep['nomcon']))
	    {
	      $this->fcconrep->setNomcon($fcconrep['nomcon']);
	    }
	    if (isset($fcconrep['naccon']))
	    {
	      $this->fcconrep->setNaccon($fcconrep['naccon']);
	    }
	    if (isset($fcconrep['tipcon']))
	    {
	      $this->fcconrep->setTipcon($fcconrep['tipcon']);
	    }
	    if (isset($fcconrep['dircon']))
	    {
	      $this->fcconrep->setDircon($fcconrep['dircon']);
	    }
	    if (isset($fcconrep['codpar']))
	    {
	      $this->fcconrep->setCodpar($fcconrep['codpar']);
	    }
	    if (isset($fcconrep['ciucon']))
	    {
	      $this->fcconrep->setCiucon($fcconrep['ciucon']);
	    }
	    if (isset($fcconrep['cpocon']))
	    {
	      $this->fcconrep->setCpocon($fcconrep['cpocon']);
	    }
	    if (isset($fcconrep['apocon']))
	    {
	      $this->fcconrep->setApocon($fcconrep['apocon']);
	    }
	    if (isset($fcconrep['telcon']))
	    {
	      $this->fcconrep->setTelcon($fcconrep['telcon']);
	    }
	    if (isset($fcconrep['emacon']))
	    {
	      $this->fcconrep->setEmacon($fcconrep['emacon']);
	    }
	    if (isset($fcconrep['faxcon']))
	    {
	      $this->fcconrep->setFaxcon($fcconrep['faxcon']);
	    }
	    if (isset($fcconrep['urlcon']))
	    {
	      $this->fcconrep->setUrlcon($fcconrep['urlcon']);
	    }
	    if (isset($fcconrep['codmun']))
	    {
	      $this->fcconrep->setCodmun($fcconrep['codmun']);
	    }
	    if (isset($fcconrep['codedo']))
	    {
	      $this->fcconrep->setCodedo($fcconrep['codedo']);
	    }
	    if (isset($fcconrep['codpai']))
	    {
	      $this->fcconrep->setCodpai($fcconrep['codpai']);
	    }
	    
	      $this->fcconrep->setRepcon('C');
	    
	    if (isset($fcconrep['cedcon']))
	    {
	      $this->fcconrep->setCedcon($fcconrep['cedcon']);
	    }
	    if (isset($fcconrep['codsec']))
	    {
	      $this->fcconrep->setCodsec($fcconrep['codsec']);
	    }
	    if (isset($fcconrep['clacon']))
	    {
	      $this->fcconrep->setClacon($fcconrep['clacon']);
	    }
	    if (isset($fcconrep['fecdescon']))
	    {
	      if ($fcconrep['fecdescon'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($fcconrep['fecdescon']))
	          {
	            $value = $dateFormat->format($fcconrep['fecdescon'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $fcconrep['fecdescon'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->fcconrep->setFecdescon($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->fcconrep->setFecdescon(null);
	      }
	    }
	    if (isset($fcconrep['fecactcon']))
	    {
	      if ($fcconrep['fecactcon'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($fcconrep['fecactcon']))
	          {
	            $value = $dateFormat->format($fcconrep['fecactcon'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $fcconrep['fecactcon'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->fcconrep->setFecactcon($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->fcconrep->setFecactcon(null);
	      }
	    }
	    if (isset($fcconrep['stacon']))
	    {
	      $this->fcconrep->setStacon($fcconrep['stacon']);
	    }
	    if (isset($fcconrep['origen']))
	    {
	      $this->fcconrep->setOrigen($fcconrep['origen']);
	    }
	    if (isset($fcconrep['nomneg']))
	    {
	      $this->fcconrep->setNomneg($fcconrep['nomneg']);
	    }
	    if (isset($fcconrep['reccon']))
	    {
	      $this->fcconrep->setReccon($fcconrep['reccon']);
	    }
	    if (isset($fcconrep['tem']))
	    {
	      $this->fcconrep->setTem($fcconrep['tem']);
	    }
	  }	
	  
	public function configGrid()
      {
		/////////////////////
		//GRID
		//$c = new Criteria();
		//$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
		$per = array();//CaartalmPeer::doSelect($c);
					
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid 
		$opciones->setEliminar(true);
		$opciones->setTabla('Fcreccon');
		$opciones->setAnchoGrid(500);
		$opciones->setTitulo('');
		$opciones->setHTMLTotalFilas(' ');
		// Se generan las columnas
		$col1 = new Columna('Código');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setNombreCampo('codrec');
		$col1->setAlineacionObjeto(Columna::IZQUIERDA);
		$col1->setAlineacionContenido(Columna::IZQUIERDA);	
		$col1->setHTML('type="text" size="5"');
		
		$col2 = new Columna('Descripción'); 
		$col2->setTipo(Columna::TEXTO);	
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);		
		$col2->setNombreCampo('codrec');
		$col2->setHTML('type="text" size="25" disabled="true"');
		
		// Se guardan las columnas en el objetos de opciones        
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);			
		
		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
						  
    }	  

	protected function getLabels()
	  {
	    return array(
	      'fcconrep{rifcon}' => 'C.I/RIF',
	      'fcconrep{nitcon}' => 'N.I.T',
	      'fcconrep{nomcon}' => 'Nombre/Razón Social',
	      'fcconrep{naccon}' => 'Nacionalidad',
	      'fcconrep{tipcon}' => 'Tipo',
	      'fcconrep{dircon}' => 'Dirección',
	      'fcconrep{codpar}' => 'Partida',
	      'fcconrep{ciucon}' => 'Cuidad',
	      'fcconrep{cpocon}' => 'Código Postal',
	      'fcconrep{apocon}' => 'Cod. Apartado Postal',
	      'fcconrep{telcon}' => 'Teléfono',
	      'fcconrep{emacon}' => 'Email',
	      'fcconrep{faxcon}' => 'Fax',
	      'fcconrep{urlcon}' => 'URL',
	      'fcconrep{codmun}' => 'Municipio',
	      'fcconrep{codedo}' => 'Estado',
	      'fcconrep{codpai}' => 'Pais',
	      'fcconrep{repcon}' => 'Tipo de Contribuyente',
	      'fcconrep{cedcon}' => 'cedula',
	      'fcconrep{codsec}' => 'Sector',
	      'fcconrep{clacon}' => 'clase',
	      'fcconrep{fecdescon}' => 'Fechacon',
	      'fcconrep{fecactcon}' => 'Fechacatcon',
	      'fcconrep{stacon}' => 'Estatus',
	      'fcconrep{origen}' => 'Origen',
	      'fcconrep{nomneg}' => 'Nombre',
	      'fcconrep{reccon}' => 'recibo',
	      'fcconrep{tem}' => 'tempo',
	    );
	  }	  
}
