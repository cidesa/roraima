<?php

/**
 * npcomocp actions.
 *
 * @package    Roraima
 * @subpackage npcomocp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class npcomocpActions extends autonpcomocpActions
{

  private $coderror = -1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {

    parent::executeEdit();

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codtipcar='',$fecdes='',$columnas='')
  {
	  	if ($codtipcar=='') $codtipcar='0';
	  	if ($fecdes=='') $fecdes=date('Y-m-d');
	  	$result=array();
		$sql = "Select Distinct(gracar) as gracar from NPComOcp where CodTipCar='".$codtipcar."' and Fecdes='".$fecdes."'";
		if (Herramientas::BuscarDatos($sql,&$result))
		{
	        $gracar = $result[0]['gracar'];
		}
		else
		{
			$gracar='0';
		}

		$c = new Criteria();
			    $c->add(NpcomocpPeer::CODTIPCAR,$codtipcar);
			    $c->add(NpcomocpPeer::GRACAR,$gracar);
			    $c->add(NpcomocpPeer::FECDES,$fecdes);


		$per = NpcomocpPeer::doSelect($c);
		$filas_arreglo=10;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npcomocp');
		$opciones->setName('a');
		$opciones->setAnchoGrid(1200);
		$opciones->setTitulo('Cargos');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Grado');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('gracar');
		$col1->setHTML('type="text" size="4"');


		$col2 = new Columna('Paso 1');
		$col2->setTipo(Columna::MONTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::DERECHA);
		$col2->setAlineacionContenido(Columna::DERECHA);
		$col2->setNombreCampo('suecar');
		$col2->setHTML('type="text" size="10"');

        if ($columnas>1)
        {
	        for($i=3;$i<=$columnas+1;$i++)
			{
				$nombre=$i-1;
				eval('$col'.$i.'= new Columna('.chr(39).'Paso '.$nombre.chr(39).');');
	        	eval('$col'.$i.'->setTipo(Columna::MONTO);');
	        	eval('$col'.$i.'->setEsGrabable(true);');
	        	eval('$col'.$i.'->setOculta(false);');
	        	eval('$col'.$i.'->setAlineacionContenido(Columna::DERECHA);');
	        	eval('$col'.$i.'->setAlineacionObjeto(Columna::DERECHA);');
	         	eval('$col'.$i.'->setNombreCampo('.chr(39).'Campo'.$i.chr(39).');');
	         	eval('$col'.$i.'->setEsNumerico(true);');
	         	eval('$col'.$i.'->setHTML('.chr(39).'type="text" size="10"'.chr(39).');');
	         	$nombre=0;
			}
        }



		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
        if ($columnas>1)
        {
	        for($i=3;$i<=$columnas+1;$i++)
			{
				$var='$col'.$i;
	        	eval('$opciones->addColumna('.$var.');');
			}
        }

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
  }

  protected function getNpcomocpOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npcomocp = new Npcomocp();
 	  $this->configGrid($npcomocp->getCodtipcar(),$npcomocp->getFecdes(),$npcomocp->getPascar());
    }
    else
    {
      $npcomocp = NpcomocpPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($npcomocp);
 	  $this->configGrid($npcomocp->getCodtipcar(),$npcomocp->getFecdes(),$npcomocp->getPascar());
    }

    return $npcomocp;
  }

	public function executeGrid()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=str_pad(trim($this->getRequestParameter('columna')), 3, "0", STR_PAD_LEFT);
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		$this->configGrid($this->getRequestParameter('codtipcar'),$this->getRequestParameter('fecdes'),$this->getRequestParameter('columna'));
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
  protected function saveNpcomocp($npcomocp)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
	Nomina::Grabar_grid_nomdefespasicartipnomlot($npcomocp,$grid);
  }


}
