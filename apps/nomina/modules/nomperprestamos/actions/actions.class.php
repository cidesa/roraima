<?php

/**
 * nomperprestamos actions.
 *
 * @package    siga
 * @subpackage nomperprestamos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomperprestamosActions extends autonomperprestamosActions
{
  public $coderr =-1;

   public function configGrid()
   {
      $c = new Criteria();
      $sql = "Select Distinct(A.CodEmp) as codemp,B.NomEmp as nomemp,sum(A.Monto) as monto,sum(A.Cantidad) as cantidad," .
      		"Sum(A.Acumulado) as acumulado, a.id as id  From NPAsiConEmp A,NpHojInt B where A.CodEmp=B.CodEmp and A.CodCon='" . $this->nptippre->getCodcon() . "' and B.StaEmp = 'A' Group by a.id,a.Codemp,B.NomEmp Order By A.CodEmp";
      $resp = Herramientas::BuscarDatos($sql,&$per);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(false);
      $opciones->setTabla('Npasiconemp');
      $opciones->setAnchoGrid(700);
      $opciones->setAncho(870);
      $opciones->setName('a');
      $opciones->setTitulo(' ');
      $opciones->setHTMLTotalFilas(' ');


      $col1 = new Columna('Codigo Empleado');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(false);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codemp');
      $col1->setHTML('type="text" size="10" readonly=true');

	  $col2 = new Columna('Nombre');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomemp');
      $col2->setEsGrabable(false);
      $col2->setHTML('type="text" size="40" readonly=true');

      $col3 = new Columna('Monto Prestamo');
      $col3->setTipo(Columna::MONTO);
      $col3->setAlineacionObjeto(Columna::DERECHA);
      $col3->setAlineacionContenido(Columna::DERECHA);
      $col3->setEsGrabable(true);
      $col3->setNombreCampo('monto');
      $col3->setHTML('type="text" size="12" ');
      $col3->setJScript('onBlur="javascript:event.keyCode=13;return entermonto(event,this.id)"');

      $col4 = clone $col3;
      $col4->setTitulo('Cuota Periódica');
      $col4->setNombreCampo('cantidad');

      $col5 = clone $col3;
      $col5->setTitulo('Saldo Prestamo');
      $col5->setNombreCampo('acumulado');



      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);
      $this->obj = $opciones->getConfig($per);
  }

   public function executeEdit()
  {
    $this->nptippre = $this->getNptippreOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptippreFromRequest();

      $this->saveNptippre($this->nptippre);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomperprestamos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomperprestamos/list');
      }
      else
      {
        return $this->redirect('nomperprestamos/edit?id='.$this->nptippre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   protected function saveNptippre($nptippre)
   {
   	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      NominaConceptos::ActualizarNpasiconemp($grid);
   }


  public function validateEdit()
  {
	    $this->nptippre = $this->getNptippreOrCreate();
	    try{
	      $this->updateNptippreFromRequest();
	    }
	    catch(Exception $ex){}

	    $this->configGrid();
	    $this->nptippre->setObj($this->obj);

	    if($this->getRequest()->getMethod() == sfRequest::POST)
        {
          $grid=Herramientas::CargarDatosGrid($this,$this->obj);
		  $resp=NominaConceptos::ValidarDatosenGrid($grid);
		  if ($resp!=-1)  {
		  	$this->coderr=$resp;
		  	return false;
		  }
		  else return true;
        }
  }

  public function handleErrorEdit()
  {

	    $this->preExecute();

	    $this->labels = $this->getLabels();
		if($this->getRequest()->getMethod() == sfRequest::POST)
  	    {
		     $grid=Herramientas::CargarDatosGrid($this,$this->obj);

		 	 if($this->coderr!=-1)
		      {
		       $err = Herramientas::obtenerMensajeError($this->coderr);
		       $this->getRequest()->setError('',$err);
		      }
		      return sfView::SUCCESS;
         }//if($this->getRequest()->getMethod() == sfRequest::POST)
        return sfView::SUCCESS;
  }
}
