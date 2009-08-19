<?php

/**
 * vacliquidacion actions.
 *
 * @package    siga
 * @subpackage vacliquidacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vacliquidacionActions extends autovacliquidacionActions
{
	private static $coderror=-1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nphojint/filters');

    // pager
    $this->pager = new sfPropelPager('Nphojint', 5);
    $c = new Criteria();
    $c->addJoin(NphojintPeer::CODEMP, NpvacliquidacionPeer::CODEMP);
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

 public function executeAjax()
  {
    $cajnomemp=$this->getRequestParameter('cajnomemp');
    $cajfecing=$this->getRequestParameter('cajfecing');
    $cajfecret=$this->getRequestParameter('cajfecret');
    $cajultsue=$this->getRequestParameter('cajultsue');
    $cajsuenor=$this->getRequestParameter('cajsuenor');
    $cajcodemp=$this->getRequestParameter('cajcodemp');
    $codigo=$this->getRequestParameter('codigo');

    if ($this->getRequestParameter('ajax')=='1')
    {
       $fecha='';
       $sal1=0;
       $sal2=0;
       $c=new Criteria();
       $c->add(NphojintPeer::CODEMP,$codigo);
       $datos=NphojintPeer::doSelectOne($c);
	   if ($datos)
	   {
	   	   $c=new Criteria();
	       $c->add(NpvacliquidacionPeer::CODEMP,$codigo);
	       $rs=NpvacliquidacionPeer::doSelectOne($c);
		   if($rs)
		   {
		   	   $nomemp="";
		       $fecing="";
		       $fecret="";
		       $this->configGrid();
		       $ultimosueldo=0;
		       $sueldonormal=0;
		       $javascript="$('nphojint_codemp').value='';alert('El Empleado ya fue Liquidado');$('nphojint_codemp').focus();";
		   }else
		   {
		   	   $nomemp=$datos->getNomemp();
		       $fecing=NphojintPeer::getFecing($codigo);
		       $fecret=$datos->getFecret();
		       if ($fecret) $fecret= date("d/m/Y",strtotime($fecret));
		       $c = new Criteria();
		       $c->add(NpvacliquidacionPeer::CODEMP,$datos->getCodemp());
		       $rs = NpvacliquidacionPeer::doSelectOne($c);
		       if($rs)
		       {
		       	  $sal1=$rs->getUltsue();
			      $sal2=$rs->getMontoinci();
		       }
		       $this->configGrid($codigo,"S",&$ultimosueldo,&$sal1,&$sal2);
		       $sueldonormal=$this->sueldonormal;
		       $javascript="";
		   }
	   }
	   else
	   {   $nomemp="";
	       $fecing="";
	       $fecret="";
	       $this->configGrid();
	       $ultimosueldo=0;
	       $sueldonormal=0;
	       $javascript="alert('El Empleado no Existe')";
	   }

	   $output = '[["'.$cajnomemp.'","'.$nomemp.'",""], ["'.$cajfecing.'","'.$fecing.'",""], ["'.$cajfecret.'","'.$fecret.'",""],["'.$cajultsue.'","'.$sueldonormal.'",""],["'.$cajsuenor.'","'.$ultimosueldo.'",""],["javascript","'.$javascript.'",""] ]';
    }
    if ($this->getRequestParameter('ajax')=='2')
    {
       if(strpos($cajultsue,'.') && strpos($cajultsue,','))
	    	$cajultsue = H::convnume($cajultsue);
	   else   
	   	 if(strpos($cajultsue,'.'))
           $cajultsue = str_replace('.',',',$cajultsue);
	   
	   if(strpos($cajsuenor,'.') && strpos($cajsuenor,','))
	   	   	$cajsuenor = H::convnume($cajsuenor);
	   else
	   	 if(strpos($cajsuenor,'.'))
           $cajsuenor = str_replace('.',',',$cajsuenor);	   

       $c=new Criteria();
       $c->add(NphojintPeer::CODEMP,$cajcodemp);
       $datos=NphojintPeer::doSelectOne($c);
	   if ($datos)
	   {

	       $this->configGrid($cajcodemp,"S",&$ultimosueldo,&$cajultsue,&$cajsuenor);
	       $sueldonormal=$this->sueldonormal;
	   }
	   else
       {
	       $this->configGrid();
	       $ultimosueldo=0;
	       $sueldonormal=0;
	   }

	   $output = '[["javascritp","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }

  public function configGrid($codemp="", $nuevo="",&$ultimosueldo=0,&$ultsue=0,&$suenor=0)
  {
    $ultimosueldo=$suenor;
    $this->sueldonormal=$ultsue;
    $per=array();
    $perHis=array();
    if ($nuevo=="S" and $codemp!="")
    {
      $arr=array();
      $sql="select * from NPLIQVACACION WHERE CODEMP='$codemp' ORDER BY DESDE desc";
      if (H::BuscarDatos($sql,$arr))
      {
      //  H::PrintR($arr);
        $i=0;
        $cont=0;
        while ($cont<count($arr))
        {
          if ((H::tofloat($arr[$cont]['corresponde'])-H::tofloat($arr[$cont]['disfrutados']))!=0)
          {
           $per[$i]['perini']=$arr[$cont]['desde'];
           $per[$i]['perfin']=$arr[$cont]['hasta'];
           if ($arr[$cont]['fraccion']=='SI')
           		$per[$i]['diadis']=H::tofloat($arr[$cont]['fracciondia']);
           else
           		$per[$i]['diadis']=H::tofloat($arr[$cont]['corresponde']-$arr[$cont]['disfrutados']);
           $per[$i]['diasbono']=H::tofloat($arr[$cont]['fraccionbono']);
           $per[$i]['diacan']=$per[$i]['diadis']+$per[$i]['diasbono'];

           if($ultsue==0)
           	$salnor=$arr[$cont]['salnor'];
           else
           	$salnor=$ultsue;

           if($suenor==0)
            $salint=$arr[$cont]['salint'];
           else
            $salint=$suenor;

           $monto=($per[$i]['diadis']*($salnor/30))+($per[$i]['diasbono']*($salint/30));


           $per[$i]['monto']=number_format($monto,2,',','.');
           $per[$i]['id']=9;
           //Historico
           $perHis[$cont]['perini']=$arr[$cont]['desde'];
           $perHis[$cont]['perfin']=$arr[$cont]['hasta'];
           $perHis[$cont]['diadis']=$per[$i]['diadis'];
           $perHis[$cont]['diadisfru']=H::tofloat($arr[$cont]['disfrutados']);
           $perHis[$cont]['id']=9;
           $i++;
          }
         else
         {
           $perHis[$cont]['perini']=$arr[$cont]['desde'];
           $perHis[$cont]['perfin']=$arr[$cont]['hasta'];
           if ($arr[$cont]['fraccion']=='SI')
           		$perHis[$cont]['diadis']=H::tofloat($arr[$cont]['fracciondia']);
           else
           		$perHis[$cont]['diadis']=H::tofloat($arr[$cont]['corresponde']);

           $perHis[$cont]['diadisfru']=H::tofloat($arr[$cont]['disfrutados']);
           $perHis[$cont]['id']=9;
         }
          $cont++;
        }//fin del while
        //obtener el salario integral del ultimo registro del arreglo ya que ese es el ultimo sueldo del empleado
        if($suenor==0)
        	$ultimosueldo=number_format($arr[$i-1]['salint'],2,',','.');
        else
        	$ultimosueldo=number_format($suenor,2,',','.');
        if($ultsue==0)
        	$this->sueldonormal=number_format($arr[$i-1]['salnor'],2,',','.');
        else
        	$this->sueldonormal=number_format($ultsue,2,',','.');
      }
    }
    else
    {
	    $c = new Criteria();
	    $c->add(NpvacliquidacionPeer::CODEMP,$codemp);
	    $per = NpvacliquidacionPeer::doSelect($c);
	    $c = new Criteria();
	    $c->add(NpvacdisfrutePeer::CODEMP,$codemp);
	    $perHis = NpvacdisfrutePeer::doSelect($c);
	    /*if($per)
	    	$ultimosueldo=$per[0]->getUltsue();
	    else
	    	$ultimosueldo=0;
		*/
    }


    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npvacliquidacion');
    $opciones->setAnchoGrid(600);
    $opciones->setAncho(600);
    $opciones->setFilas(0);
    $opciones->setName('a');
    $opciones->setTitulo('Vacaciones por Disfrutar');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período Desde');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setHTML('type="text" size="10" readonly="true"');
    $col1->setNombreCampo('perini');

    $col2 = new Columna('Período Hasta');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="10" readonly="true"');
    $col2->setNombreCampo('perfin');

    $col3 = new Columna('Días Disfrute');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('diadis');
    $col3->setHTML('type="text" size="8" readonly="true"');

    $col4 = new Columna('Días Bono Vac.');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('diasbono');
    $col4->setHTML('type="text" size="8" readonly="true"');

    $col5 = new Columna('Días a Cancelar');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('diacan');
    $col5->setHTML('type="text" size="8" readonly="true"');

    $col6 = new Columna('Monto del Período');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setNombreCampo('monto');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="10" readonly="true"');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->objVac = $opciones->getConfig($per);
    array_multisort($perHis);
    //Grid de Historico de Vacaciones
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npvacliquidacion');
    $opciones->setAnchoGrid(600);
    $opciones->setAncho(600);
    $opciones->setFilas(0);
    $opciones->setName('b');
    $opciones->setTitulo('Historial de Disfrute de Vacaciones');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período Desde');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setHTML('type="text" size="10" readonly="true"');
    $col1->setNombreCampo('perini');

    $col2 = new Columna('Período Hasta');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="10" readonly="true"');
    $col2->setNombreCampo('perfin');

    $col3 = new Columna('Días a Disfrutar');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('diadis');
    $col3->setHTML('type="text" size="8" readonly="true"');

    $col4 = new Columna('Días Disfrutados');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('diadisfru');
    $col4->setHTML('type="text" size="8" readonly="true"');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);


    $this->objHis = $opciones->getConfig($perHis);


  }

  protected function getNphojintOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $nphojint = new Nphojint();
      if($_POST)
      {
       $sal1=H::convnume($_POST['nphojint_suenor']);
       $sal2=H::convnume($_POST['nphojint_ultsue']);
      }else
      {
      	$sal1=0;
        $sal2=0;
      }
      $this->configGrid($this->getRequestParameter('nphojint[codemp]'),"S",&$ultimosueldo,&$sal2,&$sal1);
      $this->ultsue=$ultimosueldo;
      $this->suenor=$this->sueldonormal;
    }
    else
    {
      $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
      $c->add(NpvacliquidacionPeer::CODEMP,$nphojint->getCodemp());
      $rs = NpvacliquidacionPeer::doSelectOne($c);
	  $sal1=$rs->getUltsue();
      $sal2=$rs->getMontoinci();
      $this->configGrid($nphojint->getCodemp(),"N",&$ultimosueldo,&$sal1,&$sal2);
      $this->ultsue=$ultimosueldo;
      $this->suenor=$this->sueldonormal;
      $this->forward404Unless($nphojint);
    }

    return $nphojint;
  }
   protected function saveNphojint($nphojint)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->objVac,true);//0
    V::salvarnpvacliquidacion($nphojint,$grid,$this->ultsue,$this->suenor);
  }

   public function validateEdit()
    {
      $this->nphojint = $this->getNphojintOrCreate();
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

        $this->updateNphojintFromRequest();
		$c = new Criteria();
		$c->add(NpliquidacionDetPeer::CODEMP,$this->nphojint->getCodemp());
		$obj = NpliquidacionDetPeer::doSelectOne($c);

		if($obj)
			$coderror=441;

       if ((self::$coderror<>-1))
        {
                return false;

        }else return true;

      }else return true;
    }


 public function handleErrorEdit()
  {
    $this->preExecute();
    $this->nphojint = $this->getNphojintOrCreate();
    $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter('id'));

   try{
     $this->updateNphojintFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }

    public function executeDelete()
  {
    $this->nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->nphojint);
    try
    {
       	 $c = new Criteria();
		 $c->add(NpvacliquidacionPeer::CODEMP,$this->nphojint->getCodemp());
		 NpvacliquidacionPeer::doDelete($c);
		 $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Nphojint. Make sure it does not have any associated items.');
      return $this->forward('vacliquidacion', 'list');
    }

    return $this->redirect('vacliquidacion/list');
  }

}
