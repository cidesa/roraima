<?php

/**
 * vacliquidacion actions.
 *
 * @package    Roraima
 * @subpackage vacliquidacion
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 33929 2009-10-09 20:48:49Z cramirez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class vacliquidacionActions extends autovacliquidacionActions
{
	// variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
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

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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
			   $sueult=0;
		       $suepro=0;
			   $suedia=0;
			   $suediario=0;
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
			   $sueult=$this->sueult;
			   $suepro=$this->suepro;
			   $suedia=$this->suedia;
			   $suediario=$this->suediario;
		       $javascript="";
			   if($suedia>0)
			   	$javascript.="$('divsuedia').show();";
		   }
	   }
	   else
	   {   $nomemp="";
	       $fecing="";
	       $fecret="";
	       $this->configGrid();
	       $ultimosueldo=0;
	       $sueldonormal=0;
		   $sueult=0;
	       $suepro=0;
		   $suedia=0;
		   $suediario=0;
	       $javascript="alert('El Empleado no Existe');";
		  
	   }

	   $output = '[["'.$cajnomemp.'","'.$nomemp.'",""], ["'.$cajfecing.'","'.$fecing.'",""], ["'.$cajfecret.'","'.$fecret.'",""],["'.$cajultsue.'","'.$sueldonormal.'",""],["'.$cajsuenor.'","'.$ultimosueldo.'",""],["nphojint_sueult","'.$sueult.'",""],["nphojint_suepro","'.$suepro.'",""],["nphojint_suedia","'.$suedia.'",""],["nphojint_suediario","'.$suediario.'",""],["javascript","'.$javascript.'",""] ]';
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

	       $this->configGrid($cajcodemp,"S",&$ultimosueldo,&$cajultsue,&$cajsuenor,'SI');
	       $sueldonormal=$this->sueldonormal;
		   $sueult=$this->sueult;
		   $suepro=$this->suepro;
		   $suedia=$this->suedia;
		   $suediario=$this->suediario;
	   }
	   else
       {
	       $this->configGrid();
	       $ultimosueldo=0;
	       $sueldonormal=0;
		   $sueult=0;
		   $suepro=0;
		   $suedia=0;
		   $suediario=0;
	   }

	   $output = '[["javascritp","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp="", $nuevo="",&$ultimosueldo=0,&$ultsue=0,&$suenor=0,$sal='')
  {
  	//PARA LA PORCION ADICIONAL
		$codnom='';
		$sqlnom="select codnom from npasicaremp where codemp='$codemp' and status='V'";
		if (H::BuscarDatos($sqlnom,$arrnom))
			$codnom=$arrnom[0]['codnom'];			
	
		$porcion=0;
		$sqlpor="SELECT SUM(A.MONTO)/12 as porcion FROM NPHISCON A , NPHOJINT B WHERE A.CODEMP='$codemp' AND A.CODNOM='$codnom' 
				AND A.CODCON in (select codcon from npparamsalint where codnom='$codnom' and afecta='ABV')
				AND A.FECNOM >=
				to_date((case when to_date(to_char(fecing,'dd/mm'),'dd/mm')>to_date(to_char(coalesce(fecret,now()),'dd/mm'),'dd/mm')
				then to_char(fecing,'dd/mm')||'/'||(to_number(to_char(now(),'yyyy'),'9999')-1) 
				else '01/01/'||TO_CHAR(coalesce(FECRET,now()),'YYYY')
				end),'DD/MM/YYYY')
				AND A.FECNOM <=coalesce(FECRET,now())
				AND A.CODEMP=B.CODEMP";

		if (H::BuscarDatos($sqlpor,$arrpor))
			$porcion=$arrpor[0]['porcion'];
	###	
    $tipsalbonvf='';
	$tipsalvacven='';
	########SUELDOS OTROS##########
	#SueldoUltimo
	$sql = "select distinct salemp as sueult from npimppresoc a where a.codemp='$codemp'
			and a.fecini=(select max(fecini) from npimppresoc where codemp=a.codemp)";
	if (H::BuscarDatos($sql,$rs))
		$sueult=$rs[0]["sueult"];
	else
		$sueult= 0;
		
	#Sueldo Promedio
	$sql =  "select coalesce(avg(salemp),0) as suepro from (
				select distinct salemp,fecini from npimppresoc where codemp='$codemp' 
				order by fecini desc limit 12
				)a";
	if (H::BuscarDatos($sql,$rs))
		$suepro=$rs[0]["suepro"];
	else
		$suepro= 0;	

	###############################
    $sqlparam="select * from npdefespparpre  where codnom='$codnom'";
	$factorbonvf=0;
	$factorvacv=0;
	if (H::BuscarDatos($sqlparam,$arrparam))
    {
    	$factorbonvf = $arrparam[0]['factorbonvacfra'];
		$tipsalbonvf = $arrparam[0]['tipsalbonvacfra'];
		$factorvacv = $arrparam[0]['factorvacven'];
		$tipsalvacven = $arrparam[0]['tipsalvacven'];
	}
    $ultimosueldo=$suenor;
    $this->sueldonormal=$ultsue;
    $per=array();
    $perHis=array();
	$salario=0;	
	$salarionor=0;
    if ($nuevo=="S" and $codemp!="")
    {
      $arr=array();
      $sql="select a.*,dcontinuos((corresponde-disfrutados),obtenerjornada(codemp,antiguedad) ) as diasdif
			from NPLIQVACACION a WHERE CODEMP='$codemp' ORDER BY DESDE desc";
      if (H::BuscarDatos($sql,$arr))
      {
      //  H::PrintR($arr);
        $i=0;
        $cont=0;				
        while ($cont<count($arr))
        {
          #if ((H::tofloat($arr[$cont]['corresponde'])-H::tofloat($arr[$cont]['disfrutados']))!=0)
          if (H::tofloat($arr[$cont]['diasdif'])!=0)
          {
           $per[$i]['perini']=$arr[$cont]['desde'];
           $per[$i]['perfin']=$arr[$cont]['hasta'];
           if ($arr[$cont]['fraccion']=='SI')
           		$per[$i]['diadis']=H::tofloat($arr[$cont]['fracciondia']);
           else{
           		#$per[$i]['diadis']=H::tofloat($arr[$cont]['corresponde']-$arr[$cont]['disfrutados']);
           		$per[$i]['diadis']=H::tofloat($arr[$cont]['diasdif']);
           }
           		
           $per[$i]['diasbono']=H::tofloat($arr[$cont]['fraccionbono']);
           $per[$i]['diacan']=$per[$i]['diadis']+$per[$i]['diasbono'];

           if($ultsue==0)
           	$salnor=$arr[$cont]['salnor'];
           else
           	$salnor=$ultsue;

           if($suenor==0)
            $salint=$arr[$cont]['salint']+$porcion;
           else
            $salint=$suenor;          

		   if($sal=='')
		   {
			   if($tipsalbonvf=='UD')
			   	   $salario=$sueult;
			   elseif($tipsalbonvf=='SP')
			   	   $salario=$suepro;
			   elseif($tipsalbonvf=='SN')
			   	   $salario=$salnor;	   
			   else	   
			   	   $salario=$salint;	
		   }else
		   {
		   	   $salario=$salint;
		   }

		   if($tipsalvacven!='')
		   {
			   if($tipsalvacven=='UD')
			   	   $salarionor=$sueult;
			   elseif($tipsalvacven=='SP')
			   	   $salarionor=$suepro;
			   elseif($tipsalvacven=='SI')
			   	   $salarionor=$salint;	   
			   else	   
			   	   $salarionor=$salnor;	
		   }else
		   {
		   	   $salarionor=$salnor;
		   }

		   if($factorbonvf!=0 && (!is_null($factorbonvf)))
		   		$salario=($salario*$factorbonvf)/365;
		   else 
		        $salario=$salario/30;

		   if($factorvacv!=0 && (!is_null($factorvacv)))
		   		$salarionor=($salarionor*$factorvacv)/365;
		   else 
		        $salarionor=$salarionor/30;

		   $monto=($per[$i]['diadis']*($salarionor))+($per[$i]['diasbono']*($salario));


           $per[$i]['monto']=number_format($monto,2,',','.');
           $per[$i]['id']=9;
           //Historico
           $perHis[$cont]['perini']=$arr[$cont]['desde'];
           $perHis[$cont]['perfin']=$arr[$cont]['hasta'];
           $perHis[$cont]['diasdisfutar']=$per[$i]['diadis'];
           $perHis[$cont]['diasdisfrutados']=H::tofloat($arr[$cont]['disfrutados']);
           $perHis[$cont]['id']=9;
           $i++;
          }
         else
         {
           $perHis[$cont]['perini']=$arr[$cont]['desde'];
           $perHis[$cont]['perfin']=$arr[$cont]['hasta'];
           if ($arr[$cont]['fraccion']=='SI')
           		$perHis[$cont]['diasdisfutar']=H::tofloat($arr[$cont]['fracciondia']);
           else
           		$perHis[$cont]['diasdisfutar']=H::tofloat($arr[$cont]['corresponde']);

           $perHis[$cont]['diasdisfrutados']=H::tofloat($arr[$cont]['disfrutados']);
           $perHis[$cont]['id']=9;
         }
          $cont++;
        }//fin del while
        //obtener el salario integral del ultimo registro del arreglo ya que ese es el ultimo sueldo del empleado

/*		if($factor>1){
			if($suenor==0)
	        	#$ultimosueldo=number_format(((($arr[$i-1]['salint']+$porcion)*$factor)/365)*30,2,',','.');
	        	$ultimosueldo=$arr[$cont-1]['salint']+$porcion;
	        else
			    #$ultimosueldo=number_format(((($suenor+$porcion)*$factor)/365)*30,2,',','.');	
	        	$ultimosueldo=$suenor+$porcion;	
		}
		else{*/
		if($suenor==0)
		    #$ultimosueldo=number_format($arr[$i-1]['salint']+$porcion,2,',','.')
        	$ultimosueldo=$arr[$cont-1]['salint']+$porcion;
        else
		    #$ultimosueldo=number_format($suenor+$porcion,2,',','.');
        	$ultimosueldo=$suenor;
		#}
        
        if($ultsue==0)
        	$this->sueldonormal=$arr[$cont-1]['salnor'];
        else
        	$this->sueldonormal=$ultsue;
					
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
	    if($per)
		{
			$salarionor=$per[0]->getUltsue()/30;
			$salario=$per[0]->getMontoinci()/30;
		}		
    }	
	/*if($factorbonvf!=0 && (!is_null($factorbonvf)))
	{
		if($tipsalbonvf=='UD')
	   	   $this->suedia = H::FormatoMonto((($sueult*$factorbonvf)/365));
		elseif($tipsalbonvf=='SP')
	   	   $this->suedia = H::FormatoMonto((($suepro*$factorbonvf)/365));
	    elseif($tipsalbonvf=='SN')
	   	   $this->suedia = H::FormatoMonto((($this->sueldonormal*$factorbonvf)/365));
	    else
		   $this->suedia = H::FormatoMonto((($ultimosueldo*$factorbonvf)/365));	
	}else
	{
		$this->suedia = H::FormatoMonto(0);	
	}

	if($tipsalbonvf=='UD')
	   	   $this->suediario = H::FormatoMonto($sueult/30);
		elseif($tipsalbonvf=='SP')
	   	   $this->suediario = H::FormatoMonto($suepro/30);
	    elseif($tipsalbonvf=='SN')
	   	   $this->suediario = H::FormatoMonto($this->sueldonormal/30);
	    else
		   $this->suediario = H::FormatoMonto($ultimosueldo/30);
*/
    $this->suedia=H::FormatoMonto($salario);
	$this->suediario=H::FormatoMonto($salarionor);
	$this->suedia2=$salario;
	$this->suediario2=$salarionor;
	$this->sueult = H::FormatoMonto($sueult);
	$this->suepro = H::FormatoMonto($suepro);
	$this->sueldonormal=H::FormatoMonto($this->sueldonormal);
	$ultimosueldo=H::FormatoMonto($ultimosueldo);
	$this->factorbonvf=$factorbonvf;
	$this->factorvacv=$factorvacv;

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
    $opciones->setTabla('Npvacdisfrute');
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
    $col3->setNombreCampo('diasdisfutar');
    $col3->setHTML('type="text" size="8" readonly="true"');

    $col4 = new Columna('Días Disfrutados');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('diasdisfrutados');
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
      $this->ultsue=$this->suedia2*30;
      $this->suenor=$this->suediario2*30;      	
      #$this->suenor=$this->sueldonormal;
	  #$this->sueult=$this->sueult;
	  #$this->suepro=$this->suepro;
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
	  #$this->ultsue=$this->suedia2*30;
      #$this->suenor=$this->suediario2*30;
      $this->ultsue=$ultimosueldo;
      $this->suenor=$this->sueldonormal;
      if($this->factorbonvf!=$this->factorvacv)
	  {
	  	$this->ultsue=$this->sueldonormal;
      	$this->suenor=$this->sueldonormal;	
	  }      
	  #$this->sueult=$this->sueult;
	  #$this->suepro=$this->suepro;
      $this->forward404Unless($nphojint);
    }
    return $nphojint;
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
  protected function saveNphojint($nphojint)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->objVac,true);//0       
    V::salvarnpvacliquidacion($nphojint,$grid,$this->ultsue,$this->suenor);
  }

   
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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


 /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

    /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
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
