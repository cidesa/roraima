<?php

/**
 * tesmovconban actions.
 *
 * @package    Roraima
 * @subpackage tesmovconban
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovconbanActions extends autotesmovconbanActions
{

  private $coderror = -1;

  public function executeIndex()
  {
    return $this->redirect('tesmovconban/edit');
  }

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
	  if ($this->getRequestParameter('ajax')=='1')
	    {
			$dato=TsdefbanPeer::getNomcue($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
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

  public function executeHacer()
  {
   $nro=$this->getRequestParameter('nrocuenta');
   $mes=$this->getRequestParameter('combomes');
   $ano=$this->getRequestParameter('ano');

      $contaba=array();
 	  $sql= "Select to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie From contaba Where codemp = '001'";
  	   if (Herramientas::BuscarDatos($sql,&$contaba))
	   {
	   		$fecini=$contaba[0]["fecini"];
	   		$feccie=$contaba[0]["feccie"];
	   		$fecdes='01/'.$mes.'/'.$ano;
	   		$contaba1=array();
	   		$sql2="SELECT to_char(fechas,'dd/mm/yyyy') as fechas, to_char(feccie,'dd/mm/yyyy') as feccie FROM CONTABA1 WHERE To_Char(FecIni,'DD/MM/YYYY')='".$fecini."'
			And To_Char(FecCie,'DD/MM/YYYY')='".$feccie."' And To_Char(FecDes,'DD/MM/YYYY') = '".$fecdes."' ";
	   		if (Herramientas::BuscarDatos($sql2,&$contaba1))
	   		{
	   			$fechas=$contaba1[0]["fechas"];
	   		}
	   		else
	   		{
	   			$fechas=$contaba[0]["feccie"];
	   		}
	   }
	   else
	   {
	       $fechas='01/01/2000';
	   }

	   if (!Tesoreria::el_Banco_Esta_Cerrado($nro,$mes,$ano))
	   {

			if (!Tesoreria::hay_Conciliacion('Tsconcil',$nro,$mes,$ano))
			{
				Tesoreria::elimina_Conciliaciones_Anteriores($nro);
				Tesoreria::hacer_Conciliables_Anulados($nro,$mes,$ano,$fechas);
				Tesoreria::hacer_Conciliables($nro,$mes,$ano,$fechas);
				Tesoreria::hacer_Conciliables_Inconciliables($nro,$mes,$ano,$fechas);
				Tesoreria::hacer_Libro_No_Banco($nro,$mes,$ano,$fechas);
				Tesoreria::hacer_Banco_No_Libro($nro,$mes,$ano,$fechas);
				Tesoreria::hacer_No_Conciliables($nro,$mes,$ano,$fechas);
				$this->setFlash('notice', 'La Conciliación fué Realizada Exitosamente');
			}else $this->setFlash('notice', 'La Conciliación ya fue realizada');
	   }
	   else
	   {
	   		$this->setFlash('notice', 'El Banco ya fue cerrado en este período');
	   }

	  return $this->redirect('tesmovconban/edit');
  }

  public function executeAnular()
  {
  	    $nro=$this->getRequestParameter('nrocuenta');
	   	$mes=$this->getRequestParameter('combomes');
   		$ano=$this->getRequestParameter('ano');

	  	if (!Tesoreria::el_Banco_Esta_Cerrado($nro,$mes,$ano))
		{
			Tesoreria::anular_Conciliacion($nro,$mes,$ano);
			$this->setFlash('notice', 'La Conciliación fué Anulada Exitosamente');
		}
		else
		{
			$this->setFlash('notice', 'El Banco ya fué Cerrado en este Período');
		}
	return $this->redirect('tesmovconban/edit');
  }
}
