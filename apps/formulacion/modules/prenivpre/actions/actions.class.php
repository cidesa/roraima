<?php

/**
 * prenivpre actions.
 *
 * @package    Roraima
 * @subpackage prenivpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class prenivpreActions extends autoprenivpreActions
{
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
	 //print $this->getRequestParameter('ajax');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
    	$this->configGridPeriodos($this->getRequestParameter('codigo'));
	 }

	 return sfView::SUCCESS;
	}

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPeriodos($filas='')
  {
    $c = new Criteria();
    $per = ForperejePeer::doSelect($c);
	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
    $opciones->setTabla('Forpereje');
    $opciones->setAnchoGrid(500);
    $opciones->setTitulo('Distribución de Períodos');
    //$opciones->setFilas($filas);
    $opciones->setFilas(20);
    $opciones->setName('b');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('pereje');
    $col1->setHTML('type="text" size="5" readonly=true');

    $col2 = new Columna('Fecha Desde');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('fecdes');
    $col1->setEsGrabable(true);
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = new Columna('Fecha Desde');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('fechas');
    $col3->setEsGrabable(true);
    $col3->setHTML('type="text" size="10" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj2 = $opciones->getConfig($per);

   }

   public function executeIndex()
  {
  //$codempresa = $this->getUser()->getAttribute('empresa');
  $id=Herramientas::getX('CODEMP','Fordefniv','Id','001');
    if ($id!='<!Registro no Encontrado o Vacio!>')
    {
    return $this->redirect('prenivpre/edit?id='.$id);
    }
    else { return $this->redirect('prenivpre/edit');}
  }


  public function getEmpresa()
  {
  	$codempresa = $this->getUser()->getAttribute('empresa');
  	$c = new Criteria();
  	$c->add(EmpresaUserPeer::CODEMP,$codempresa);
  	$nombre = EmpresaUserPeer::doSelectOne($c);
	if ($nombre)
	 return $nombre->getNomemp();
    else
	 return 'No encontrado';
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefniv = $this->getFordefnivOrCreate();
    $this->listacategorias=Constantes::ListaCategorias();
    $this->configGrid();
    $this->listaperiodos=Constantes::ListaNumPeriodos();
    $this->configGridPeriodos();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefnivFromRequest();

      $this->saveFordefniv($this->fordefniv);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('prenivpre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('prenivpre/list');
      }
      else
      {
        return $this->redirect('prenivpre/edit?id='.$this->fordefniv->getId());
      }
    }
    else
    {
      $this->empresa= $this->getEmpresa();
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
  protected function saveFordefniv($fordefniv)
  {
  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
    Formulacion::salvarPrenivpre($fordefniv,$grid,$grid2);
  }

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefnivFromRequest()
  {
    $fordefniv = $this->getRequestParameter('fordefniv');
    //$codempresa = $this->getUser()->getAttribute('empresa');
    //$this->empresa= $this->getEmpresa();
    $this->listacategorias=Constantes::ListaCategorias();
    $this->configGrid();
    $this->listaperiodos=Constantes::ListaNumPeriodos();
    $this->configGridPeriodos();


    $this->fordefniv->setCodemp('001');
    /*if (isset($fordefniv['nomemp']))
    {
      $this->fordefniv->setNomemp($fordefniv['nomemp']);
    } */

    $this->fordefniv->setLoncod(32);

    if (isset($fordefniv['rupcat']))
    {
      $this->fordefniv->setRupcat($fordefniv['rupcat']);
    }
    if (isset($fordefniv['ruppar']))
    {
      $this->fordefniv->setRuppar($fordefniv['ruppar']);
    }
    if (isset($fordefniv['nivdis']))
    {
      $this->fordefniv->setNivdis($fordefniv['nivdis']);
    }
    if (isset($fordefniv['forpre']))
    {
      $this->fordefniv->setForpre($fordefniv['forpre']);
    }
    if (isset($fordefniv['fecini']))
    {
      if ($fordefniv['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fordefniv['fecini']))
          {
            $value = $dateFormat->format($fordefniv['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fordefniv['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fordefniv->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fordefniv->setFecini(null);
      }
    }
    if (isset($fordefniv['feccie']))
    {
      if ($fordefniv['feccie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fordefniv['feccie']))
          {
            $value = $dateFormat->format($fordefniv['feccie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fordefniv['feccie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fordefniv->setFeccie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fordefniv->setFeccie(null);
      }
    }
    if (isset($fordefniv['fecper']))
    {
      if ($fordefniv['fecper'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fordefniv['fecper']))
          {
            $value = $dateFormat->format($fordefniv['fecper'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fordefniv['fecper'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fordefniv->setFecper($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fordefniv->setFecper(null);
      }
    }
    if (isset($fordefniv['asiper']))
    {
      $this->fordefniv->setAsiper($fordefniv['asiper']);
    }
    if (isset($fordefniv['numper']))
    {
      $this->fordefniv->setNumper($fordefniv['numper']);
    }

      $this->fordefniv->setPeract('01');


      $this->fordefniv->setEtadef('A');


      $this->fordefniv->setStaprc('N');

    if (isset($fordefniv['coraep']))
    {
      $this->fordefniv->setCoraep($fordefniv['coraep']);
    }
    if (isset($fordefniv['nivobr']))
    {
      $this->fordefniv->setNivobr($fordefniv['nivobr']);
    }
    if (isset($fordefniv['caraep']))
    {
      $this->fordefniv->setCaraep($fordefniv['caraep']);
    }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $c = new Criteria();
    $per = FornivelesPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
    $opciones->setTabla('forniveles');
    $opciones->setAnchoGrid(700);
    $opciones->setFilas(20);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Tipo(Categoria->C Partida->D)');
    $col1->setTipo(Columna::COMBO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('catpar');
    $col1->setCombo(Constantes::Tipo_Categoria());
    $col1->setHTML(' ');

    $col2 = new Columna('Longitud');
    //$col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setNombreCampo('lonniv');
    //$col2->setEsNumerico(true);
    $col2->setHTML('type="text" size="2" maxlength="2"');
    $col2->setJScript('onKeypress="formato(event,this.id)"');

    $col3 = new Columna('Nombre Abreviado');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('nomabr');
    $col3->setEsGrabable(true);
    $col3->setHTML('type="text" size="15" maxlength="10"');

    $col4 = new Columna('Nombre Extendido');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('nomext');
    $col4->setEsGrabable(true);
    $col4->setHTML('type="text" size="30" maxlength="30"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    $this->obj = $opciones->getConfig($per);

  }


}
