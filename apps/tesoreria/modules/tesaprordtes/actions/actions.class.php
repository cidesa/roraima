<?php

/**
 * tesaprordtes actions.
 *
 * @package    siga
 * @subpackage tesaprordtes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesaprordtesActions extends autotesaprordtesActions
{
  public function executeIndex()
  {
    return $this->forward('tesaprordtes', 'edit');
  }

  public function editing()
  {
    $this->configGrid();
    $this->opordpag->setFilasord($this->filas);
  }


  public function configGrid()
  {
    $this->configGridOrdenes();
  }

  public function configGridOrdenes()
  {
    $c = new Criteria();
    $c->add(OpordpagPeer::STATUS,'N');
    $c->add(OpordpagPeer::APROBADOORD,'A');
    $c->add(OpordpagPeer::APROBADOTES,null);
    $c->add(OpordpagPeer::NUMCHE,null);
    $detalle = OpordpagPeer::doSelect($c);

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesaprordtes/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
      if (self::validarGeneraComprobante())
      {
        $this->coderr=508;
      }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

  protected function saving($opordpag)
  {
	$i=0;
	$numcompro="";
	$numorden="";
	$concom=$opordpag->getTotalcomprobantes();
	while ($i<$concom)
	{
	 $form="sf_admin/tesaprordtes/confincomgen";
	 $formulario[$i]=$form.$i;
     if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
     {
      $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
      $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
      $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
      $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
      $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
      $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
      $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

      $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
      $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
      $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
      $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
      $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
      $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
      $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

      $numerocomp = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));
      $numcompro=$numcompro."/".$numerocomp;
      $numorden=$numorden."/".$reftra;
     }

	 $this->getUser()->getAttributeHolder()->remove('grabo',$form."$i");
	  $i++;
	}

    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
    OrdendePago::aprobarOrdenesTes($opordpag,$grid,$numcompro,$numorden);
   return -1;
 }

  public function executeAjaxcomprobante()
  {
     $this->opordpag = $this->getOpordpagOrCreate();
     $this->updateOpordpagFromRequest();
     $concom=0;
     $msjuno="";
     $comprobante="";
     $this->msjuno="";
     $this->i="";
     $f="";
     $this->formulario=array();

     $this->configGrid();
     $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
     $l=0;
     $y=$grid[0];
     while ($l<count($y))
     {
     	if ($y[$l]->getAprobadotes()=='1')
     	{
     	   $c= new Criteria();
	       $reg= OpdefempPeer::doSelectOne($c);
	       if ($reg)
	       {
	         if ($reg->getGencomalc()=='S')
	         {
	          $x=OrdendePago::grabarComprobanteAlc($y[$l]->getNumord(),&$msjuno,&$comprobante);
	          if ($msjuno=="") $concom=$concom + 1;
	          else break;
	         }
	       }
     	}

        $l++;
     }

      if ($msjuno=="")
      {
        $form="sf_admin/tesaprordtes/confincomgen";
        $i=0;
        while ($i<$concom)
        {
         $f[$i]=$form.$i;
         $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
         $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
         $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
         $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
         $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
         $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
         $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
         $this->getUser()->setAttribute('tipmov', '');
         $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
         $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
         $i++;
        }
        $this->i=$concom-1;
        $this->formulario=$f;
        if ($concom==0)
        {
        	$this->msjuno="No hay comprobantes a Generar";
        }

       }else
       {
          $this->msjuno=$msjuno;
       }
       $this->concom=$concom;
      $output = '[["","",""],["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function validarGeneraComprobante()
  {
  	$variable=true;
    $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
    $l=0;
    while($l<$concom)
    {
	    $form="sf_admin/tesaprordtes/confincomgen";
	    $grabo=$this->getUser()->getAttribute('grabo',null,$form."$l");
	    if ($grabo=='')
	    { $variable=true;}
	    else { $variable=false;
	    break;
	    }
	    $l++;
    }
    return $variable;
  }

}
