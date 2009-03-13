<?php

/**
 * vacdiafer actions.
 *
 * @package    siga
 * @subpackage vacdiafer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vacdiaferActions extends autovacdiaferActions
{
	   private static $coderror=-1;

public function executeIndex()
    {
      return $this->redirect('vacdiafer/edit');
    }

protected function getNpvacdiaferOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $this->configGrid();
      $npvacdiafer = new Npvacdiafer();
    }
    else
    {
      $npvacdiafer = NpvacdiaferPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid();
      $this->forward404Unless($npvacdiafer);
    }

    return $npvacdiafer;
  }

	 public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->npvacdiafer = $this->getNpvacdiaferOrCreate();
      $this->updateNpvacdiaferFromRequest();
      $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      self::$coderror=EmpleadosBanco::Validar_Datos_Vacdiafer($grid);

  if ((self::$coderror==-1))
        {
          self::$coderror=EmpleadosBanco::Validar_Vacdiafer($grid);($grid);
          if ((self::$coderror <> -1))
             {
                return false;
             }else return true;

        }else return false;

      }else return true;
    }




  public function saveNpvacdiafer($npvacdiafer)
  {
   $coderr=-1;
   $grid=Herramientas::CargarDatosGrid($this,$this->obj);

   $coderr = EmpleadosBanco::Grabar_grid_Vacdiafer($npvacdiafer,$grid);
   $this->coderror = $coderr;
   return $this->coderror;
  }


 public function handleErrorEdit()
  {
	    $this->preExecute();
	    $this->npvacdiafer = $this->getNpvacdiaferOrCreate();


	   try{
	     $this->updateNpvacdiaferFromRequest();
	      }
      catch(Exception $ex){}

       $this->labels = $this->getLabels();
       $grid=Herramientas::CargarDatosGrid($this,$this->obj);

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror<>-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }



  public function executeEdit()

  {
    $this->npvacdiafer = $this->getNpvacdiaferOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
    	$this->updateNpvacdiaferFromRequest();
        // print $this->saveNpvacdiafer($this->npvacdiafer);exit;
       if ($this->saveNpvacdiafer($this->npvacdiafer)==-1)
       {
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('vacdiafer/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('vacdiafer/list');
	      }
	      else
	      {
	        return $this->redirect('vacdiafer/edit');
	      }
      }
      else
      	{
      	 $this->labels = $this->getLabels();
       	 $err = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('',$err);
      	  return sfView::SUCCESS;
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
    $per = NpvacdiaferPeer::doSelect($c);

    $filas_arreglo=30;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npvacdiafer');
    $opciones->setName('a');
    $opciones->setAnchoGrid(450);
    $opciones->setAncho(600);
    $opciones->setTitulo('Dias Feriados');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Mes');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('mes');
    $col1->setJScript('onBlur=validarMes(this.id)');
    $col1->setHTML('type="text" size="2" ');

    $col2 = new Columna('Dia');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('dia');
    $col2->setJScript('onBlur=validarDiafer(this.id)');
    $col2->setHTML('type="text" size="2" ');

    $col3 = new Columna('Descripcion');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('descripcion');
    $col3->setHTML('type="text" size="30" ');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);



  }
}
