<?php

/**
 * facranpagimp actions.
 *
 * @package    siga
 * @subpackage facranpagimp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facranpagimpActions extends autofacranpagimpActions
{
	
  public function executeIndex()
  {
    return $this->forward('facranpagimp', 'edit');
  }
	
  public function executeEdit()
  {
  	
    $this->fcdefpgi = $this->getFcdefpgiOrCreate();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcdefpgiFromRequest();

      $this->saveFcdefpgi($this->fcdefpgi);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('facranpagimp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('facranpagimp/list');
      }
      else
      {
        return $this->redirect('facranpagimp/edit?id='.$this->fcdefpgi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  	
	public function configGrid()
	{

		$c = new Criteria();
        $per = FcdefpgiPeer::doSelect($c);
		//$per = array();
	  
	    
	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
		$opciones->setFilas(6); 
        $opciones->setEliminar(true);
        $opciones->setTabla('Fcdefpgi');
        $opciones->setAnchoGrid(800);
        $opciones->setTitulo('Distribucion del Pago de la Tasa (en Unidades Tributarias)');
        $opciones->setHTMLTotalFilas(' ');
        
        // Se generan las columnas
        $col1 = new Columna('Desde');
        $col1->setTipo(Columna::MONTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::DERECHA);
        $col1->setAlineacionContenido(Columna::DERECHA);
        $col1->setEsNumerico(true);
        $col1->setHTML('type="text" size="15"');
        $col1->setNombreCampo('mondes');
         
        $col2 = clone $col1;
        $col2->setTitulo('Hasta');
		$col2->setNombreCampo('mondes');
        
        $col3 = clone $col1;
        $col3->setTitulo('Monto a Pagar (U.T.)');
        $col3->setNombreCampo('monpag');
        
        $col4 = new Columna('Nro. de Porciones');
        $col4->setTipo(Columna::TEXTO);
        $col4->setEsGrabable(true);
        $col4->setAlineacionObjeto(Columna::CENTRO);
        $col4->setAlineacionContenido(Columna::CENTRO);
        $col4->setEsNumerico(false);
        $col4->setHTML('type="text" size="20"');
        $col4->setNombreCampo('numpor');
        
        // Se guardan las columnas en el objetos de opciones        
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per); 
	  
	}
	
	
	
	
	
	
	
}
