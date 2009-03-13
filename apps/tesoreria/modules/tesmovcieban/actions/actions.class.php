<?php

/**
 * tesmovcieban actions.
 *
 * @package    siga
 * @subpackage tesmovcieban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovciebanActions extends autotesmovciebanActions
{

  private $coderror = -1;
	
  	public function executeIndex()
	  {
	    return $this->redirect('tesmovcieban/edit');
	  }
  
  
  public function executeEdit()
  {

    parent::executeEdit();

  }
      
  	public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
			$dato=TsdefbanPeer::getNomcue($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';	    
	    }
		else if ($this->getRequestParameter('ajax')=='2')
	    {
	    }
	    
	    
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 
    
  	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('NUMCUE','Tsdefban','Numcue',trim($this->getRequestParameter('nrocuenta')));
	    }	   
	    else if ($this->getRequestParameter('ajax')=='2')
	    {

	    }
	}
  
  
  public function validateEdit()
  {
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    // $this->caajuoc = $this->getCaajuocOrCreate();
    // $this->configGrid();
    // $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    

    if($this->getRequest()->getMethod() == sfRequest::POST){
      
      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en 
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1){
        $this->coderror = $resp; 
        return false;
      } else return true;

    }else return true;
      
      
  
  }
	
  public function handleErrorEdit()
  {

    $this->labels = $this->getLabels();
        
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);	    
        $this->getRequest()->setError('',$err);	
      }
    }
    return sfView::SUCCESS;

  }

  public function executeCerrar()
  {
   $nro=$this->getRequestParameter('nrocuenta');
   $mes=$this->getRequestParameter('combomes');
   $ano=$this->getRequestParameter('ano');
  	if (Tesoreria::hay_Conciliacion('Tsconcil',$nro,$mes,$ano))
  	{
  		Tesoreria::generaCierre($nro,$mes,$ano);
  		$this->setFlash('notice', 'El Cierre fue realizado Exitosamente');
  	}
  	else
  	{
  		$this->setFlash('notice', 'El Mes no se encuentra conciliado');
  	}
  	
  	return $this->redirect('tesmovcieban/edit');
  }
  
  public function executeAbrir()
  {
   $nro=$this->getRequestParameter('nrocuenta');
   $mes=$this->getRequestParameter('combomes');
   $ano=$this->getRequestParameter('ano');
  	if (Tesoreria::hay_Conciliacion('Tsconcilhis',$nro,$mes,$ano))
  	{
  		Tesoreria::generaApertura($nro,$mes,$ano);
  		$this->setFlash('notice', 'La Apertura del Banco fue realizada Exitosamente');
  	}
  	else
  	{
  		$this->setFlash('notice', 'No Existen Datos para Abrir el Banco Cerrado');
  	}
  	
  	return $this->redirect('tesmovcieban/edit');
  }

  protected function updateTsconcilFromRequest()
  {
    $tsconcil = $this->getRequestParameter('tsconcil');

    if (isset($tsconcil['numcue']))
    {
      $this->tsconcil->setNumcue($tsconcil['numcue']);
    }
    if (isset($tsconcil['mescon']))
    {
      $this->tsconcil->setMescon($tsconcil['mescon']);
    }
    if (isset($tsconcil['anocon']))
    {
      $this->tsconcil->setAnocon($tsconcil['anocon']);
    }
    if (isset($tsconcil['refere']))
    {
      $this->tsconcil->setRefere($tsconcil['refere']);
    }
    if (isset($tsconcil['movlib']))
    {
      $this->tsconcil->setMovlib($tsconcil['movlib']);
    }
    if (isset($tsconcil['movban']))
    {
      $this->tsconcil->setMovban($tsconcil['movban']);
    }
    if (isset($tsconcil['feclib']))
    {
      if ($tsconcil['feclib'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsconcil['feclib']))
          {
            $value = $dateFormat->format($tsconcil['feclib'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsconcil['feclib'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsconcil->setFeclib($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsconcil->setFeclib(null);
      }
    }
    if (isset($tsconcil['fecban']))
    {
      if ($tsconcil['fecban'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsconcil['fecban']))
          {
            $value = $dateFormat->format($tsconcil['fecban'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsconcil['fecban'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsconcil->setFecban($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsconcil->setFecban(null);
      }
    }
    if (isset($tsconcil['desref']))
    {
      $this->tsconcil->setDesref($tsconcil['desref']);
    }
    if (isset($tsconcil['monlib']))
    {
      $this->tsconcil->setMonlib($tsconcil['monlib']);
    }
    if (isset($tsconcil['monban']))
    {
      $this->tsconcil->setMonban($tsconcil['monban']);
    }
    if (isset($tsconcil['result']))
    {
      $this->tsconcil->setResult($tsconcil['result']);
    }
  }
  
  
}
