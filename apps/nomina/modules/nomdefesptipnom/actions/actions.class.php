<?php

/**
 * nomdefesptipnom actions.
 *
 * @package    siga
 * @subpackage nomdefesptipnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefesptipnomActions extends autonomdefesptipnomActions
{
  public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();
    $this->listafrecpag = Constantes::ListaFrecuenciaPago();
    $this->listagenordpag = Constantes::ListaGeneraOrdenPago();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnominaFromRequest();

      $this->saveNpnomina($this->npnomina);

      $this->npnomina->setId(Herramientas::getX_vacio('codnom','npnomina','id',$this->npnomina->getCodnom()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesptipnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesptipnom/list');
      }
      else
      {
        return $this->redirect('nomdefesptipnom/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


 protected function updateNpnominaFromRequest()
  {
    $npnomina = $this->getRequestParameter('npnomina');
    $this->listafrecpag = Constantes::ListaFrecuenciaPago();
		$this->listagenordpag = Constantes::ListaGeneraOrdenPago();


    if (isset($npnomina['codnom']))
    {
      $this->npnomina->setCodnom(str_pad($npnomina['codnom'], 3, '0', STR_PAD_LEFT));
    }
    if (isset($npnomina['nomnom']))
    {
      $this->npnomina->setNomnom($npnomina['nomnom']);
    }
    if (isset($npnomina['frecal']))
    {
      $this->npnomina->setFrecal($npnomina['frecal']);
    }
    if (isset($npnomina['ultfec']))
    {
      if ($npnomina['ultfec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npnomina['ultfec']))
          {
            $value = $dateFormat->format($npnomina['ultfec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomina['ultfec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npnomina->setUltfec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomina->setUltfec(null);
      }
    }
    if (isset($npnomina['profec_']))
    {
      if ($npnomina['profec_'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($npnomina['profec_']))
          {
          	//echo  $npnomina['profec'].'-------- ';
          	//$value = substr($npnomina['profec'],8,2) .'-'.substr($npnomina['profec'],5,2) .'-'.substr($npnomina['profec'],0,4);
            $value = $dateFormat->format($npnomina['profec_'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomina['profec_'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }

//          echo $value;

          $this->npnomina->setProfec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomina->setProfec(null);
      }
    }
    if (isset($npnomina['numsem']))
    {
      $this->npnomina->setNumsem($npnomina['numsem']);
    }
    if (isset($npnomina['ordpag']))
    {
      $this->npnomina->setOrdpag($npnomina['ordpag']);
    }
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npnomina = $this->getNpnominaOrCreate();
    try{ $this->updateNpnominaFromRequest();}catch(Exception $ex){}


    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function executeDelete()
  {
    $this->npnomina = NpnominaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npnomina);


    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(NpasicarnomPeer::CODNOM,$this->npnomina->getCodnom());
    $dato=NpasicarnomPeer::doSelect($c);
    if (!$dato)
    {
      $c= new Criteria();
      $c->add(NpdefmovPeer::CODNOM,$this->npnomina->getCodnom());
      $dato2=NpdefmovPeer::doSelect($c);
      if (!$dato2)
      {
      	$this->deleteNpnomina($this->npnomina);
      	$this->Bitacora('Elimino');
      }
      else
      {
      	$this->setFlash('notice','Esta Nómina esta asociada a Definición de Movimientos.');
        return $this->redirect('nomdefesptipnom/edit?id='.$id);
      }
    }
    else
    {
      $this->setFlash('notice','Esta Nómina ya tiene Cargos asignados.');
      return $this->redirect('nomdefesptipnom/edit?id='.$id);
    }
    return $this->redirect('nomdefesptipnom/list');
  }


  public function executeAjax()
  {
    $this->codigo = $this->getRequestParameter('codigo','');
    $this->ultfech = $this->getRequestParameter('ultfec','');
    $ajax = $this->getRequestParameter('ajax','');
    $ultfec=split('/',$this->ultfech);
    $newulfec=$ultfec[2].'-'.$ultfec[1].'-'.$ultfec[0];
    switch ($ajax){
      case '1':
        switch($this->codigo)
	     {
		   case 'S':
			 $intervalo='ww';
			 $cant=1;
	      	 break;
		   case  'Q':
		   	 $intervalo='d';
			 $cant=15;
			 $ultfec=split('/',$this->ultfech);
			 $newulfec=$ultfec[2].'-'.$ultfec[1].'-'.$ultfec[0];
			 $tal= $ultfec[2].'-'.$ultfec[1].'-'.'01';
	   	     $fec2=Herramientas::dateAdd('d',13,$newulfec,'+');
	   	     $feccompara=split('-',$fec2);
	         $fechafin=Herramientas::dateAdd('d',1,(Herramientas::dateAdd('m',1,$tal,'+')),'-');
	   	     if ((intval($ultfec[0])>15) && (intval($ultfec[1])==intval($feccompara[1])))
	   	     {
	   	     	$cant=48;
	   	     	$newfechafin=split('-',$fechafin);
	   	     	$profec=$newfechafin[2].'/'.$newfechafin[1].'/'.$newfechafin[0];
	   	     }

	         if ((intval($ultfec[0])>15) && (intval($ultfec[1])==2))
	   	     {
	   	     	$cant=48;
	   	     	$newfechafin=split('-',$fechafin);
	   	     	$profec=$newfechafin[2].'/'.$newfechafin[1].'/'.$newfechafin[0];
	   	     }
			 break;
		   case ('M' || 'A'):
			 $intervalo='m';
			 $cant=1;
			 $ultfec=split('/',$this->ultfech);
			 $newulfec=$ultfec[2].'-'.$ultfec[1].'-'.$ultfec[0];
			 if ((intval($ultfec[1])==2) && (intval($ultfec[0])==1))
			 {
			   $fec2=Herramientas::dateAdd('d',28,$newulfec,'+');
	   	       $feccompara=split('-',$fec2);
	   	       if (intval($feccompara[1])==3)
	   	       {
	   	       	 $intervalo='d';
			     $cant=28;
	   	       }
	   	       else
	   	       {
	   	       	 $intervalo='d';
			     $cant=29;
	   	       }
			 }
			 $fec3=Herramientas::dateAdd('d',1,$newulfec,'+');
	   	     $feccompara2=split('-',$fec3);
			 if ((intval($ultfec[1])==2) && (intval($feccompara2[1])==3))
			 {
			   $intervalo='d';
			   $cant=31;
			 }

			 if ((intval($ultfec[1])==4) || (intval($ultfec[1])==6) || (intval($ultfec[1])==9) || (intval($ultfec[1])==11) || (intval($ultfec[0])==30))
			 {
			   $intervalo='d';
			   $cant=31;
			 }

	         if ((intval($ultfec[1])==3) || (intval($ultfec[1])==5) || (intval($ultfec[1])==7) || (intval($ultfec[1])==10) || (intval($ultfec[1])==12) || (intval($ultfec[0])==31))
			 {
			   $intervalo='d';
			   $cant=30;
			 }
	      	 break;
		 }

		 if ($cant!=48)
		 {
		 	$fechafin=Herramientas::dateAdd('d',1,(Herramientas::dateAdd($intervalo,$cant,$newulfec,'+')),'-');
		 	$newfechafin=split('-',$fechafin);
	   	    $profec=$newfechafin[2].'/'.$newfechafin[1].'/'.$newfechafin[0];
		 }

		$sql = "SELECT extract(week from (to_date('$profec','dd/mm/yyyy'))::date) as fecha";
		if (H::BuscarDatos($sql,&$output))
		{
			$numsem=$output[0]['fecha'];
		}

        $output = '[["npnomina_numsem","'.$numsem.'",""], ["npnomina_profec_","'.$profec.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

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
}