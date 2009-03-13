<?php

/**
 * facinmdec actions.
 *
 * @package    siga
 * @subpackage facinmdec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facinmdecActions extends autofacinmdecActions
{

  public function executeEdit()
  {
    $this->fcdeclar = $this->getFcdeclarOrCreate();
   // $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcdeclarFromRequest();

      $this->saveFcdeclar($this->fcdeclar);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('facinmdec/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('facinmdec/list');
      }
      else
      {
        return $this->redirect('facinmdec/edit?id='.$this->fcdeclar->getId());
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
      $c->add(FcdeclarPeer::NUMDEC,$this->fcdeclar->getnumdec());
      $per = FcdeclarPeer::doSelect($c);
	  
	  
	  if(false){
		//////////////////////
		//GRID
		
		$filas=17;
		$cabeza="Distribución de Deuda";
		$eliminar=true;
		$titulos=array("Cod. Almacen","Descripción","Cod. Ubicacion","Ubicación","Exi. Mínima","Exi. Máxima","Exi. Actual","Reorden");
		$ancho="1100";
		$alignf=array('center','left','center','left','right','right','right','right');
		$alignt=array('center','left','center','left','right','right','right','right');
		$campos=array('Codalm','Nomalm','Codubi','Nomubi','Eximin','Eximax','Exiact','Ptoreo');
		$catalogos=array('Cadefalm-sf_admin_edit_form-x1-x2','','Cadefubi-sf_admin_edit_form-x3-x4','','','','','');// por todas las columnas, si no tiene, se coloca vacio
		$ajax=array('2-x2-x1','','3-x4-x3','','','','',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','m','m','m','m'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("5","6","7","8");
		$totales=array("", "", "caregart_exitot", "");
		$mascaraubicacion=$this->mascaraubicacion;
		$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
		$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
		$grabar=array("1","3","5","6","7","8");
		$filatotal='';
		 
		
		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'ancho'=>$ancho, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
		'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar, 'tabla' => 'Caartalm');
		////////////////////// 

	  }else {
	    
	    //$mascaraubicacion=$this->mascaraubicacion;
	    // $i18n = $this->getContext()->getI18N();
	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid 
        $opciones->setEliminar(true);
        $opciones->setTabla('Ocregact');
        $opciones->setAnchoGrid(1150);
        $opciones->setTitulo('Distribución de Deuda');
        $opciones->setHTMLTotalFilas(' ');
        // Se generan las columnas
        $col1 = new Columna('Cod. Almacen');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codalm');
        $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
        $col1->setAjax(2,2);
        
        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('codalm');
        $col2->setHTML('type="text" size="25" disabled=true');
        
        $col3 = clone $col1;
        $col3->setTitulo('Cod. Ubicacion');
        $col3->setNombreCampo('codubi');
        $col3->setCatalogo('cadefubi','sf_admin_edit_form','4');
        //$col3->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
        $col3->setAjax(3,4);
        
        $col4 = clone $col2;
        $col4->setTitulo('Ubicación');
        $col4->setNombreCampo('Nomubi');
        
        $col5 = new Columna('Exi. Mínima');
        $col5->setTipo(Columna::MONTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setNombreCampo('Eximin');
        $col5->setEsNumerico(true);
        $col5->setHTML('type="text" size="10"');
        //$col5->setJScript('onKeypress="entermonto(event,this.id)"');

        $col6 = clone $col5;
        $col6->setTitulo('Exi. Máxima');
        $col6->setNombreCampo('Eximax');
        
        $col7 = clone $col5;
        $col7->setTitulo('Exi. Actual');
        $col7->setNombreCampo('Exiact');
        $col7->setEsTotal(true,'caregart_exitot');
        
        $col8 = clone $col5;
        $col8->setTitulo('Reorden');
        $col8->setNombreCampo('Ptoreo');
        
        // Se guardan las columnas en el objetos de opciones        
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per); 
	    
	  }
	  
	}	
}
