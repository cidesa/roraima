<?php

/**
 * nomregemb actions.
 *
 * @package    Roraima
 * @subpackage nomregemb
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomregembActions extends autonomregembActions
{

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
	$this->configGridCon($this->npmaeemb->getCodemb(),$this->npmaeemb->getCodemp());
	$this->configGridBen($this->npmaeemb->getCodemb(),$this->npmaeemb->getCodemp());
	$this->npmaeemb->getTipcal()=='M' ? $cal_valmon=true : $cal_valmon=false;
	$this->npmaeemb->getTipcal()=='P' ? $cal_valpor=true : $cal_valpor=false;	
	$this->npmaeemb->getTipdis()=='M' ? $dis_valmon=true : $dis_valmon=false;
	$this->npmaeemb->getTipdis()=='P' ? $dis_valpor=true : $dis_valpor=false;
	$this->params=array('obj_con' => $this->obj_con,'obj_ben' => $this->obj_ben,'cal_valpor' => $cal_valpor,'cal_valmon' => $cal_valmon,'dis_valpor' => $dis_valpor,'dis_valmon' => $dis_valmon);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCon($codemb='',$codemp='')
  {
    
	$c = new Criteria();
	$c->add(NpdetembconPeer::CODEMB,$codemb);
	$c->add(NpdetembconPeer::CODEMP,$codemp);
    $per = NpdetembconPeer::doSelect($c);
    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Npdetembcon');
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(700);
	$opciones->setName('a');
	$opciones->setFilas(1);	
    $opciones->setTitulo('Conceptos');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Código');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codcon');
	$col1->setCatalogo('npdefcpt','sf_admin_edit_form',array('codcon' => 1,'nomcon' => 2), 'Npdefcpt_embargos2');
	$col1->setHTML('type="text" size="15" ');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomcon');
    $col2->setHTML('type="text" size="60" readonly="true" ');
	
	$col3 = new Columna('Porcentaje');
    $col3->setTipo(Columna::MONTO);
	$col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('porcon');
    $col3->setHTML('type="text" size="15" ');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj_con = $opciones->getConfig($per);

  }
  
  public function cargar_parentesco()
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
  
  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridBen($codemb='',$codemp='')
  {
    
	$c = new Criteria();
	$c->add(NpdetembbenPeer::CODEMB,$codemb);
	$c->add(NpdetembbenPeer::CODEMP,$codemp);
    $per = NpdetembbenPeer::doSelect($c);

    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Npdetembben');
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(700);
	$opciones->setFilas(1);	
	$opciones->setName('b');
    $opciones->setTitulo('Beneficiario(s)');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Código');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('cedrifben');
	$col1->setCatalogo('npbenefiemb','sf_admin_edit_form',array('cedrif' => 1,'nomben' => 2), 'Npbenefiemb_embargos');
	$col1->setHTML('type="text" size="15" ');

    $col2 = new Columna('Beneficiario');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomben');
    $col2->setHTML('type="text" size="60" readonly="true" ');
	
	$col3 = new Columna('Parentesco');
    $col3->setTipo(Columna::COMBO);
	$col3->setEsGrabable(true);
	$col3->setCombo($this->cargar_parentesco());
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('tiprel');
    $col3->setHTML(' ');
	
	$col4 = new Columna('Valor');
    $col4->setTipo(Columna::MONTO);
	$col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('valemb');
	$col4->setEsTotal(true,'ben_total');
    $col4->setHTML('type="text" size="15" ');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj_ben = $opciones->getConfig($per);

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;


    if($this->getRequest()->getMethod() == sfRequest::POST){
    	
	  $this->npmaeemb = $this->getNpmaeembOrCreate();
      $this->updateNpmaeembFromRequest();
	  if($this->npmaeemb->getTipCal()=='P')
	  {
	  	if($this->npmaeemb->getTipdis()=='M')
		{
			$this->coderr=476;
			return false;		
		}
	  }
	  $this->configGridCon();
	  $this->configGridBen();
	  $gridcon = Herramientas::CargarDatosGridv2($this,$this->obj_con);
	  $gridben = Herramientas::CargarDatosGridv2($this,$this->obj_ben);
	  
	  if($this->npmaeemb->getTipcal()=='P')
	  {
	  	  if($this->npmaeemb->getMontotemb()!='' && $this->npmaeemb->getMontotemb()>0)
		  {
		  	$this->coderr=477;
			return false;
		  }
	  	  if(count($gridcon[0])>0)
		  {
		  	foreach($gridcon[0] as $r)
			{
				if($r->getCodcon()=='')
				{
					$this->coderr=478;
					return false;
				}
				if($r->getPorcon()=='' or $r->getPorcon()<=0)
				{
					if($r->getPorcon()<0)
					{
						$this->coderr=479;
						return false;	
					}else
					{
						$this->coderr=478;
						return false;
					}					
				}				
			}
		  }else
		  {
		  	$this->coderr=480;
			return false;
		  }	
	  }elseif($this->npmaeemb->getTipcal()=='M')	  
	  {
	  	  if(count($gridcon[0])>0)
		  {
		  	$this->coderr=481;
			return false;
		  }
		  if($this->npmaeemb->getMontotemb()=='' || $this->npmaeemb->getMontotemb()==0)
		  {
		  	$this->coderr=482;
			return false;
		  }
	  }else
	  {
	  	$this->coderr=483;
		return false;
	  }
	  
	  if($this->npmaeemb->getTipdis()=='P' || $this->npmaeemb->getTipdis()=='M')
	  {
	  	if($this->npmaeemb->getTipdis()=='P')
		{
			if(count($gridben[0])>0)	
			{
				$valsum=0;
				foreach($gridben[0] as $r)
				{
					if($r->getCedrifben()=='')
					{
						$this->coderr=484;
						return false;	
					}
					if($r->getTiprel()=='')
					{
						$this->coderr=484;
						return false;	
					}
					if($r->getValemb()=='' || $r->getValemb()<=0)
					{
						if($r->getValemb()<=0)
						{
							$this->coderr=485;
							return false;		
						}else
						{
							$this->coderr=484;
							return false;	
						}						
					}
					if($r->getValemb()>0)
					   $valsum+=$r->getValemb();
					
				}
				if($valsum!=100)
				{
					$this->coderr=487;
					return false;					
				}
			}else
			{
				$this->coderr=484;
				return false;	
			}
		}
		elseif($this->npmaeemb->getTipdis()=='M')
		{
			if(count($gridben[0])>0)	
			{
				$valsum=0;
				foreach($gridben[0] as $r)
				{
					if($r->getCedrifben()=='')
					{
						$this->coderr=484;
						return false;	
					}
					if($r->getTiprel()=='')
					{
						$this->coderr=484;
						return false;	
					}
					if($r->getValemb()=='' || $r->getValemb()<=0)
					{
						if($r->getValemb()<=0)
						{
							$this->coderr=485;
							return false;		
						}else
						{
							$this->coderr=484;
							return false;	
						}						
					}
					if($r->getValemb()>0)
					   $valsum+=$r->getValemb();
					
				}
				if($valsum!=$this->npmaeemb->getMontotemb())
				{
					$this->coderr=488;
					return false;					
				}
			}else
			{
				$this->coderr=484;
				return false;	
			}						
		}
	  }else
	  {
	  	$this->coderr=486;
		return false;	  	
	  }
	  

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGridCon();
	$this->configGridBen();
    $gridcon = Herramientas::CargarDatosGridv2($this,$this->obj_con);
	$gridben = Herramientas::CargarDatosGridv2($this,$this->obj_ben);
	$this->npmaeemb->getTipcal()=='M' ? $cal_valmon=true : $cal_valmon=false;
	$this->npmaeemb->getTipcal()=='P' ? $cal_valpor=true : $cal_valpor=false;	
	$this->npmaeemb->getTipdis()=='M' ? $dis_valmon=true : $dis_valmon=false;
	$this->npmaeemb->getTipdis()=='P' ? $dis_valpor=true : $dis_valpor=false;
	$this->params=array('obj_con' => $this->obj_con,'obj_ben' => $this->obj_ben,'cal_valpor' => $cal_valpor,'cal_valmon' => $cal_valmon,'dis_valpor' => $dis_valpor,'dis_valmon' => $dis_valmon);
    //$this->configGrid($grid[0],$grid[1]);

  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
  	$gridcon = Herramientas::CargarDatosGridv2($this,$this->obj_con);
	$gridben = Herramientas::CargarDatosGridv2($this,$this->obj_ben);
	
	
	foreach($gridcon[0] as $r){		
		$r->setCodemb($clasemodelo->getCodemb());
		$r->setCodemp($clasemodelo->getCodemp());
		$r->save();		
	}
	foreach($gridben[0] as $r){		
		$r->setCodemb($clasemodelo->getCodemb());
		$r->setCodemp($clasemodelo->getCodemp());
		$r->save();		
	}
	$clasemodelo->setCodconemb($clasemodelo->getCodcon());
    return parent::saving($clasemodelo);
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
  	$c = new Criteria();
	$c->add(NpdetembbenPeer::CODEMB,$clasemodelo->getCodemb());
	$c->add(NpdetembbenPeer::CODEMP,$clasemodelo->getCodemp());
	NpdetembbenPeer::doDelete($c);
	
	$c = new Criteria();
	$c->add(NpdetembconPeer::CODEMB,$clasemodelo->getCodemb());
	$c->add(NpdetembconPeer::CODEMP,$clasemodelo->getCodemp());
	NpdetembconPeer::doDelete($c);
	
    return parent::deleting($clasemodelo);
  }


}
