<?php

/**
 * presnomantpre actions.
 *
 * @package    siga
 * @subpackage presnomantpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomantpreActions extends autopresnomantpreActions
{
public function executeAjax()
	{
	     $this->mensaje="";
	     $this->campo="";

	  if ($this->getRequestParameter('ajax')=='1')
	    {
	      $cajtexmos1=$this->getRequestParameter('cajtexmos1');
	      $cajtexmos=$this->getRequestParameter('cajtexmos');
   		  $cajtexcom=$this->getRequestParameter('cajtexcom');
   		     $sql= "Select b.NOMEMP From NPASIEMPCONT a,NPHOJINT b, NPPRESOC c Where a.codemp=b.codemp and a.codemp = c.codemp and a.CodEmp = '".$this->getRequestParameter('codigo')."' ";

             $resp = Herramientas::BuscarDatos($sql,&$per);

	    	if ($resp)
	    	{
	    	//SELECT * FROM NPPRESOC WHERE CODEMP = '" + DatosAntPre(0).Text + "'"
	        $dato1=Herramientas::getX('codemp','nppresoc','antacu',$this->getRequestParameter('codigo'));
	        $dato1=H::formatoMonto($dato1);
	        $dato=Herramientas::getX('codemp','nphojint','nomemp',$this->getRequestParameter('codigo'));
	    	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos1.'","'.$dato1.'",""]]';
	    	}
	    	else
	        {
             $dato = "";
             $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
			 $this->mensaje="Trabajador no Registrado para Prestaciones o no se encuentran Calculadas... ";
			 $this->campo='npantpre_codemp';
			}
	    }
           else
	          	{ if ($this->getRequestParameter('ajax')=='2')

	          		{
	          		//	$sql="Select codemp From NpAntPre Where codemp = '".$this->getRequestParameter('cod')."' and fecant='".$this->getRequestParameter('codigo')."'";

		          	    $fec=$this->getRequestParameter('codigo');
		          		$prueba=split('/',$fec);
		                $dia=$prueba[0];
		                $mes=$prueba[1];
		                $ano = $prueba[2];
		                $fecha = $ano.'-'.$mes.'-'.$dia;

		          		$c = new Criteria();
	  	  			 	$c->add(NpantprePeer::CODEMP,$this->getRequestParameter('cod'));
	  	     			$c->add(NpantprePeer::FECANT,$fecha);
	  	  				$frecuencia = NpantprePeer::doSelectOne($c);
		  				if ($frecuencia)
		  				{   $dato="";
                        	$this->mensaje="Ya existe un anticpo para este empleado en esta fecha";
                        	$this->campo='npantpre_fecant';
		  				}
		   	         $dato="";
		   	         $cajtexmos="";
		  			 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	          		}
	          		else if ($this->getRequestParameter('ajax')=='3')
	          		{
	          			$sql="select sum(monto) as totpre from npantpre where codemp='".$this->getRequestParameter('codemp')."'";
	          			if (Herramientas :: BuscarDatos($sql, & $resul)) {
							$totpre = $resul[0]["totpre"];
						} else {
							$totpre = 0;
						}

	          			$dato="";
	          			$cajtexmos="";
	          			if($this->getRequestParameter('cajtexcom')=='npantpre_monto')
	          			{
	          				$valor=0.75*H::toFloat($this->getRequestParameter('cod'));
			          		if ($valor<H::toFloat($this->getRequestParameter('codigo')))
			          			{
			          				$this->mensaje="Valor del Anticipo debe ser menor o igual al 75 % del Monto Total de las Prestaciones Equivalente a:  ".H::FormatoMonto($valor);
			          			    $this->campo='npantpre_monto';
			          			}else
			          			{
			          				if(($valor-$totpre)<H::toFloat($this->getRequestParameter('codigo')))
			          				{

			          					$this->mensaje="Su prestamos anteriores mas el actual da un total de ".H::formatoMonto(H::toFloat($this->getRequestParameter('codigo'))+$totpre)." y es mayor al  75%  ".H::FormatoMonto($valor);
			          			    	$this->campo='npantpre_monto';
			          				}else
			          				{
			          					$cajtexmos='npantpre_pormon';
									  	$dato=((100*H::toFloat($this->getRequestParameter('codigo')))/H::toFloat($this->getRequestParameter('cod')));
									  	$dato=H::formatoMonto($dato);
			          				}


			          			}
	          			}else
	          			{
							$valor=0.75*H::toFloat($this->getRequestParameter('cod'));
			          		if (H::toFloat($this->getRequestParameter('codigo2'))<0 || H::toFloat($this->getRequestParameter('codigo2'))>75)
			          			{
			          				$this->mensaje="Valor del Anticipo debe ser menor o igual al 75 % del Monto Total de las Prestaciones Equivalente a:  ".H::FormatoMonto($valor);
			          			    $this->campo='npantpre_monto';
			          			}else
			          			{
			          			  $por=round((100*$totpre)/H::toFloat($this->getRequestParameter('cod')));
			          			  $valor2=((H::toFloat($this->getRequestParameter('cod'))*H::toFloat($this->getRequestParameter('codigo2')))/100);
			          			  if ((H::toFloat($this->getRequestParameter('codigo2'))+$por)<0 || (H::toFloat($this->getRequestParameter('codigo2'))+$por)>75)
			          			  {
									$this->mensaje="Su prestamos anteriores mas el actual da un total de ".H::formatoMonto($valor2+$totpre)." y es mayor al  75%  ".H::FormatoMonto($valor);
			          			    $this->campo='npantpre_pormon';

			          			  }else
			          			  {
			          			  	$cajtexmos='npantpre_monto';
								    $dato=((H::toFloat($this->getRequestParameter('cod'))*H::toFloat($this->getRequestParameter('codigo2')))/100);
								    $dato=H::formatoMonto($dato);
			          			  }

			          			}
	          			}
		          		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	          		}

	          	}

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	}


 protected function updateNpantpreFromRequest()
  {
    $npantpre = $this->getRequestParameter('npantpre');

    if (isset($npantpre['codemp']))
    {
      $this->npantpre->setCodemp($npantpre['codemp']);
    }
    if (isset($npantpre['monant']))
    {
      $this->npantpre->setMonant($npantpre['monant']);
    }
    if (isset($npantpre['fecant']))
    {
      if ($npantpre['fecant'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npantpre['fecant']))
          {
            $value = $dateFormat->format($npantpre['fecant'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npantpre['fecant'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npantpre->setFecant($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npantpre->setFecant(null);
      }
    }
    if (isset($npantpre['monto']))
    {
      $this->npantpre->setMonto($npantpre['monto']);
    }
    if (isset($npantpre['observacion']))
    {
      $this->npantpre->setObservacion($npantpre['observacion']);
    }
  }


}
