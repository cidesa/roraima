<?php

/**
 * npcomocp actions.
 *
 * @package    siga
 * @subpackage npcomocp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class npcomocpActions extends autonpcomocpActions
{

  private $coderror = -1;

  public function executeEdit()
  {

    parent::executeEdit();

  }

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

  protected function saveNpcomocp($npcomocp)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
	Nomina::Grabar_grid_nomdefespasicartipnomlot($npcomocp,$grid);
  }


}
