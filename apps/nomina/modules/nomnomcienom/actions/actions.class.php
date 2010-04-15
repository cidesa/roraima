<?php

/**
 * nomnomcienom actions.
 *
 * @package    Roraima
 * @subpackage nomnomcienom
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
 */
class nomnomcienomActions extends sfActions
{
  public function executeIndex()
  {
    //return $this->redirect('nomnomcienom/index');
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
    $codigo   = $this->getRequestParameter('codigo');

	if ($this->getRequestParameter('ajax')=='1')
	{ $dato="";
	  $dato2="";
	  $dato3="";
	  $dato4="";
	  $datos="";
	  $fre="";
	  $validafechacierre="";
	  $this->visible="";
	  $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
	  if ($dato!='<!Registro no Encontrado o Vacio!>')
	  {
	  	/*$dato2=NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Ultfec');
	  	$datos=date('d/m/Y',strtotime(NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Ultfec')));
	    $dato3=NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Profec');
	    $dato4=NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Frecal');
		*/

	  	$dato2=Herramientas::getX('CODNOM','Npnomina','Ultfec',$codigo);
	  	$datos=date('d/m/Y',strtotime($dato2));
	  	$dato3=Herramientas::getX('CODNOM','Npnomina','Profec',$codigo);
	  	$dato4=Herramientas::getX('CODNOM','Npnomina','Frecal',$codigo);


        if ($dato4=='S')
        { $fre='Nomina Semanal';}
        else if ($dato4=='Q')
        { $fre='Nomina Quincenal';}
        else if ($dato4=='M')
        { $fre='Nomina Mensual';}

	    CierredeNomina::Consulta($this->getRequestParameter('codigo'),$dato2,$dato3,&$visible);
	    if (CierredeNomina::Consulta2($this->getRequestParameter('codigo'),$dato3))
	    {
	     $validafechacierre='S';
	    }else {$validafechacierre='N';}
	    $this->visible=$visible;
	  }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fecha","'.$datos.'",""],["proxcalculo","'.$dato3.'",""],["frecuencia","'.$dato4.'",""],["pago","'.$fre.'",""],["valida","'.$validafechacierre.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	}
  }

  public function executeRealizarcierre()
  {
	$codigo=$this->getRequestParameter('codigo');
	$fecha=$this->getRequestParameter('fecha');

	CierredeNomina::procesoCierre($codigo,$fecha,&$msj);
	if ($msj=='1')
	{ $this->setFlash('notice2', 'La Nómina no puede ser cerrada');}
	else { $this->setFlash('notice', 'La Nómina fue Cerrada Satisfactoriamente');}
	return $this->redirect('nomnomcienom/index');
  }
}
