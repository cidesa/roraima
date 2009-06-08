<?php

/**
 * nomdefespprimas actions.
 *
 * @package    siga
 * @subpackage nomdefespprimas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespprimasActions extends autonomdefespprimasActions
{

  public function executeList()
  {
  	$this->redirect('nomdefespprimas/edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->npprimashijos = $this->getNpprimashijosOrCreate();
	$this->configGrid();
	$this->configGridProfes();
	$this->configGridCarcol();

  }
  
  public function cargar_tippar()
  {
  	  $c = new Criteria();
	  $obj = NptipparPeer::doSelect($c);
	  $r=array();

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getTippar()=>$i->getDespar());
	  }
	  return $r;
  }

  public function configGrid()
    {
        $c = new Criteria();
		$per = NpprimashijosPeer::doSelect($c);
	
		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npprimashijos');
		$opciones->setName('a');
		$opciones->setAncho(800);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo(' ');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Parentesco Familiar');
		$col1->setTipo(Columna::COMBO);
		$col1->setCombo($this->cargar_tippar());
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('parfam');
		$col1->setHTML(' ');

		$col2 = new Columna('Edad Desde');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('edaddes');
		$col2->setHTML('type="text" size="20" ');

		$col3 = new Columna('Edad Hasta');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('edadhas');
		$col3->setHTML('type="text" size="20" ');

		$col4 = new Columna('Monto');
		$col4->setTipo(Columna::MONTO);
		$col4->setEsGrabable(true);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setNombreCampo('monto');
		$col4->setHTML('type="text" size="20"');

		$col5 = new Columna('Estudios');
		$col5->setTipo(Columna::COMBO);
		$col5->setEsGrabable(true);
		$col5->setCombo(array('S'=>'SI','N'=>'NO'));
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('estudios');
		$col5->setHTML(' ');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj_hij = $opciones->getConfig($per);
    	$this->npprimashijos->setObj_hij($this->obj_hij);
    }
	
    public function cargar_nivedu()
    {
  	  $c = new Criteria();
	  $obj = NpniveduPeer::doSelect($c);
	  $r=array();

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getCodniv()=>$i->getDesniv());
	  }
	  return $r;
    }
	
    public function configGridProfes()
    {

        $c = new Criteria();
		$per = NpprimaprofesPeer::doSelect($c);
	
		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npprimaprofes');
		$opciones->setName('b');
		$opciones->setAncho(400);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo(' ');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Grado de Estudio');
		$col1->setTipo(Columna::COMBO);
		$col1->setCombo($this->cargar_nivedu());
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('grado');
		$col1->setHTML(' ');

		$col2 = new Columna('Prima');
		$col2->setTipo(Columna::MONTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('prima');
		$col2->setHTML('type="text" size="20"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj_pro = $opciones->getConfig($per);
    	$this->npprimashijos->setObj_pro($this->obj_pro);
    }	
	
      public function configGridCarCol()
    {

        $c = new Criteria();
		$per = NpcargoscolPeer::doSelect($c);
	
		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npcargoscol');
		$opciones->setName('c');
		$opciones->setAncho(400);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo(' ');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código del Cargo');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codcarcol');
		$col1->setHTML('type="text" size="20" readonly="true" ');
	
		$col2 = new Columna('Descripción del Cargo');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('descarcol');
		$col2->setHTML('type="text" size="20" readonly="true" ');
		
		$col3 = new Columna('Monto Prima');
		$col3->setTipo(Columna::MONTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('prima');
		$col3->setHTML('type="text" size="20"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj_car = $opciones->getConfig($per);
    	$this->npprimashijos->setObj_car($this->obj_car);
    }	

  public function validateEdit()
  {
    $this->coderr =-1;
    $this->npprimashijos = $this->getNpprimashijosOrCreate();
	$this->updateNpprimashijosFromRequest();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {    			

		$this->configGrid();	
	    $grid=Herramientas::CargarDatosGridv2($this,$this->obj_hij);//0
	    $x=$grid[0]; 
		$r=0;
		if(count($x)>0)
		while ($r<count($x))
	    {
	      if($x[$r]->getParfam()=='')
		  {
		  	$this->coderr= 466;
		  	break;
		  }	  	
	      if($x[$r]->getEdaddes()=='')
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  if($x[$r]->getEdadhas()=='')
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  if($x[$r]->getMonto()==0)
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  if($x[$r]->getEstudios()=='')
		  {
		  	$this->coderr= 466;
		  	break;
		  }
		  $r++;
		}

      $this->configGridProfes();	
	    $grid_pro=Herramientas::CargarDatosGridv2($this,$this->obj_pro);//0
	    $x=$grid_pro[0]; 
		$r=0;
		if(count($x)>0)
		while ($r<count($x))
	    {
	      if($x[$r]->getGrado()=='')
		  {
		  	$this->coderr= 467;
		  	break;
		  }	  	
	      if($x[$r]->getPrima()==0)
		  {
		  	$this->coderr= 467;
		  	break;
		  }
		  $r++;
		}

	  $this->configGridCarcol();	
	    $grid_car=Herramientas::CargarDatosGridv2($this,$this->obj_car);//0
	    $x=$grid_car[0]; 
		$r=0;
		if(count($x)>0)
		while ($r<count($x))
	    {
	      if($x[$r]->getCodcarcol()=='')
		  {
		  	$this->coderr= 468;
		  	break;
		  }	  	
	      if($x[$r]->getDescarcol()=='')
		  {
		  	$this->coderr= 468;
		  	break;
		  }
		  if($x[$r]->getPrima()==0)
		  {
		  	$this->coderr= 468;
		  	break;
		  }
		  $r++;
		}
    }else return false;
//print $this->coderr; exit;
   if ($this->coderr== -1)
     return true;
     else
     return false;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
  	$this->npprimashijos = $this->getNpprimashijosOrCreate();
    $this->updateNpprimashijosFromRequest();
	
  	$this->configGrid();	
	$this->configGridProfes();
	$this->configGridCarcol();
	
    $grid_hij = Herramientas::CargarDatosGridv2($this,$this->obj_hij);
	$grid_pro = Herramientas::CargarDatosGridv2($this,$this->obj_pro);
	$grid_car = Herramientas::CargarDatosGridv2($this,$this->obj_car);

  }

  public function saving($clasemodelo)
  {
	$grid_hij = Herramientas::CargarDatosGridv2($this,$this->obj_hij);
	$grid_pro = Herramientas::CargarDatosGridv2($this,$this->obj_pro);
	$grid_car = Herramientas::CargarDatosGridv2($this,$this->obj_car);
    $coderr = Nomina::Grabar_grid_nomdefespprimas($grid_hij,$grid_pro,$grid_car);
	 
	return $coderr;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
