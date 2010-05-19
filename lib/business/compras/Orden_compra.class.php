<?php
/**
 * Orden de Compra: Clase estática para el manejo de las ordenes de compras
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Orden_compra
{

  /***************************************************************************
   **                 ORDEN DE COMPRA ALMORDCOM                             **
   **                       Jaime Suárez                                    **
   **************************************************************************/
  /**
   * Función para registrar la Requisición
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */

//<!-----------------------------------Funcion General o madre  del Negocio------------------------------------------------------------>
/*
 * Funcion general del negocio
 * aqui se hacen todos los procesos
 * de validacion y gfuardar del formulariop almordcom
 */
  public static function Salvar($caordcom,$arreglo_arreglo,$arreglo_objetos,$arreglo_campos,&$coderror)
  {

	$refere1 = Herramientas::getX_vacio('refere','cpimppag','refere',$caordcom->getOrdcom());
	$refere2 = Herramientas::getX_vacio('refere','cpimpcau','refere',$caordcom->getOrdcom());
	$refere0 = Herramientas::getX_vacio('refcom','cpimpcom','refcom',$caordcom->getOrdcom());

	if (((!empty($refere1)) or (!empty($refere2)) or (!empty($refere0))) and ($caordcom->getId()))
	{
		$coderror=109;
		return false;
  	}else{

      /*if ($caordcom->getId()){
                $reg = CaordcomPeer::retrieveByPKs($caordcom->getId());
                $reg1 = array();
                $reg1 = $reg[0];
                $reg1->setDesord($caordcom->getDesord());
                $reg1->save();
                $coderror=-11;
          }else {*/
 	      $refiereprecom = '';
		  $afectacompro = '';
		  $afectadis = '';
		  $referencia='';
		  $codconpag='';
		  $codforent='';
		  $genero_compromiso='';
		  $coderror=-1;
		      self::Obtener_formatocategoria(&$formatocategoria,&$tiporec,&$manejacompra,&$manejaservicio);
		      self::obtener_moneda($caordcom,&$moneda,&$posneg,&$codigomoneda);
		      self::definir_tasa_cambio($caordcom,$moneda,&$tasacambio,&$combo1_text,&$multiplicar_grid_por_tasacambio,&$monedasol,&$tip_fin);
		      $codigo_proveedor=$arreglo_campos[3];
		      $hay_presupuesto=true;
		      $referencia=$arreglo_campos[5];
		      $codconpag=$arreglo_campos[6];
		      $codforent=$arreglo_campos[7];
		      $genero_compromiso=$arreglo_campos[8];
		      $grid_detalle_orden_arreglos=$arreglo_arreglo[0][0];
		      $grid_detalle_resumen=$arreglo_arreglo[1][0];
		      $grid_detalle_entregas=$arreglo_arreglo[2][0];
		      $grid_detalle_recargo=$arreglo_arreglo[3][0];

		      //exit($grid_detalle_orden_arreglos[0]['codpre']);
		      //exit(print_r($grid_detalle_recargo));

		        $i=0;
		        $result=array();
		        $sql = "Select refprc,afecom,afedis From CpDocCom Where TipCom='".$caordcom->getDoccom()."'";
		        if (Herramientas::BuscarDatos($sql,&$result))
		        {
		          $refiereprecom = $result[0]['refprc'];
		          $afectacompro = $result[0]['afecom'];
		          $afectadis = $result[0]['afedis'];
		        }
		        if ($referencia==0) // para saber de que tabla me lo estoy trayendo
		        {
		          $campo11='rgoart';//tabla Caartord
		          $campo10='dtoart';//tabla Caartord
		        }
		        else
		        {
		          $campo11='monrgo';//tabla Caartsol
		          $campo10='mondes';//tabla Caartord
		        }

		        if (trim($caordcom->getRefsol())!='')
		        {
		          $c= new Criteria();
		          $c->add(CasolartPeer::REQART,$caordcom->getRefsol());
		          $casolart2 = CasolartPeer::doSelectOne($c);
		          if (count($casolart2)>0)
		          {
		            if ($tasacambio>$monedasol)
		            {
		                $totalaju=0;
		                $sigo=true;
		                if ($afectadis=='R')
		                {
		                  $i=0;
		                  while ($i<count($grid_detalle_orden_arreglos))
		                  {
		                    $chequear_disponibilidad=self::Chequear_disponibilidad_incremento($caordcom,$grid_detalle_orden_arreglos,$i,$referencia,$tiporec,$tasacambio,$monedasol);
		                    if (!$chequear_disponibilidad)
		                    {
		                      $sigo=false;
		                      break;
		                    }
		                    else
		                    {
		                      if ($tiporec=='C')// columna 16 del grid detalle orden
		                        $totalaju=($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])-((($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])/$tasacambio)*$monedasol);
		                      else
		                        $totalaju=((($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])/$tasacambio)*$monedasol);
		                    }
		                    $i++;
		                  }
		                }
		                if ($sigo)
		                {
		                  $sigo=self::Grabar_orden_compra($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$arreglo_objetos,$arreglo_campos,$moneda,$codigomoneda,$codigo_proveedor,$referencia,$codconpag,$codforent);
		                  if (($afectadis=='R') and ($sigo))
		                  {
		                    if (!self::chequear_disponibilidad_incremento_recargo($caordcom,&$detalle_arreglo_recargos_obtenido,&$total_ajuste))
		                      $sigo=false;
		                  }
		                }
		                if ($sigo)
		                {
		                  if ($hay_presupuesto)
		                  {
		                    if (count($detalle_arreglo_recargos_obtenido)>0)
		                    {
		                      $grabo=self::Grabar_ajuste_solicitud($caordcom,$total_ajuste,$grid_detalle_orden_arreglos,$detalle_arreglo_recargos_obtenido,$tiporec,$tasacambio,$monedasol,$referencia);
		                      if (!$grabo)
		                        $sigo=false;
		                    }
		                  }
		                }
		                if ($sigo)
		                {
		                  if ($afectacompro=='S')
		                  {
		                    // grabo imputacion
		                    $c= new Criteria();
		                    $cadefart_search = CadefartPeer::doSelectOne($c);
		                    if (($cadefart_search->getComasopre()=='S') and ($cadefart_search->getComreqapr()=='S'))
		                      $aprobacion='S';
		                    else
		                      $aprobacion='N';
		                    if ($aprobacion=='S')
		                    {
		                      if (substr($genero_compromiso, 0, 1)=='S')//SE EJECUTA SI L DOY AL BOTON GENERAR COMPROMISO
		                        self::Grabar_compromiso($caordcom);
		                    }
		                    else
		                      self::Grabar_compromiso($caordcom);
		                  }
		                }
		                $c= new Criteria();
		                $opdefemp = OpdefempPeer::doSelectOne($c);
		                if (count($opdefemp)>0)
		                {
		                  if ($opdefemp->getGenctaord()=='S')
		                  {
		                      //self::Grabar_comprobante_orden($caordcom) //segunda fase
		                  }
		                }
		            }
		            else  // $tasacambio==$monedasol
		            {
		              self::Grabar_orden_compra($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$arreglo_objetos,$arreglo_campos,$moneda,$codigomoneda,$codigo_proveedor,$referencia,$codconpag,$codforent);
		            if ($afectacompro=='S')
		            {
		                  // grabo imputacion
		                $c= new Criteria();
		                $cadefart_search = CadefartPeer::doSelectOne($c);
		                if (($cadefart_search->getComasopre()=='S') and ($cadefart_search->getComreqapr()=='S'))
		                    $aprobacion='S';
		                else
		                    $aprobacion='N';
		                if ($aprobacion=='S')
		                {
		                    if (substr($genero_compromiso, 0, 1)=='S')//SE EJECUTA SI L DOY AL BOTON GENERAR COMPROMISO
		                      self::Grabar_compromiso($caordcom);
		                }
		                else
		                  self::Grabar_compromiso($caordcom);
		              }
		             }
		           }  //if (count($casolart2)>0)
		        }
		        else  //REFSOL
		        {
		          if (self::Grabar_orden_compra($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$arreglo_objetos,$arreglo_campos,$moneda,$codigomoneda,$codigo_proveedor,$referencia,$codconpag,$codforent))
		          {
		            if ($afectacompro=='S')
		            {
		              // grabo imputacion
		              $c= new Criteria();
		              $cadefart_search = CadefartPeer::doSelectOne($c);
		              if (($cadefart_search->getComasopre()=='S') and ($cadefart_search->getComreqapr()=='S'))
		                $aprobacion='S';
		              else
		                $aprobacion='N';

		              if ($aprobacion=='S')
		              {
		                if (substr($genero_compromiso, 0, 1)=='S')//SE EJECUTA SI L DOY AL BOTON GENERAR COMPROMISO
		                  self::Grabar_compromiso($caordcom);
		              }
		              else
		                self::Grabar_compromiso($caordcom);

		            }
		            $c= new Criteria();
		            $opdefemp = OpdefempPeer::doSelectOne($c);
		            if (count($opdefemp)>0)
		            {
		              //if ($opdefemp->getGencomadi()=='S')
		                  //self::Grabar_comprobante_orden($caordcom) //segunda fase
		            }
		          }    // si grabo orden_de_compra
		     }  //REFSOL
		      //exit($caordcom->getOrdcom());
          //}
  	}
   return true;
  }



//<!-----------------------------------Funciones del grid para cuando viene referida------------------------------------------------------------>
/*
 * esta funcion es para obtener el grid de los recargos cuando se llama parcialmente
 * me traigo ewl grid dependiendo del rif del proveedor escogido por el usuario
 */
  public static function Obtener_Grid_Parcial_Recargos($refsol,$rifpro,&$output)
  {
    $result=array();
    $arreglo_codart=array();
    if (Orden_compra::Verificar_proveedor(trim($refsol),trim($rifpro),&$rifpro,&$msg,&$cancotpril,&$strrifpro,&$srtrefcot))
    {
      $sql = "Select reqart,codart,codcat,canreq,canrec,montot,costo,monrgo,canord,mondes,relart,unimed,codpar From CaArtSol Where ReqArt='".$refsol."' order By CodArt";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        $i=0;
        while ($i<count($result))
        {
           if ($result[$i]['canord']<$result[$i]['canreq'])
           {
              if ($cancotpril>0)
              {
                //ARTICULO DE LA COTIZACION CON PRIORIDAD #1 PARA EL NUMERO DE FILAS DEL GRID
                  $result1=array();
                $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='".$srtrefcot."' and codart='".$result[$i]['codart']."' and priori='1'";
                if (Herramientas::BuscarDatos($sql1,&$result1))
                  $arreglo_codart[]=$result1[0]['codart'];
               }
           }
           $i++;
        }
      }
    }


    $output = array();
    $grid=array();
    $j=0;
    $seguir=true;
    $distinto=array_unique($arreglo_codart);
    //print print_r($distinto);
    if (count($distinto)>0)
    {
      while ($j<count($distinto))//la hace dos veces
      {
        $result=array();
        $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
        $sql="Select reqart,codrgo,monrgo,tipdoc From cadisrgo Where ReqArt ='".$refsol."' and codart='".$distinto[$j]."' and TipDoc='".$tipdoc."' order By CodRgo";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $i=0;
          while ($i<count($result))
          {
              if (count($output)>0)
              {
                $k=0;
                while ($k<count($output))
                {
                  if ($output[$k]['codrgo']==$result[0]['codrgo'])
                  {
                    $output[$k]['monrgo']=$output[$k]['monrgo']+$result[0]['monrgo'];
                    $output[$k]['recargototal'] = $output[$k]['monrgo'];
                    $output[$k]['pormonrgo'] = $output[$k]['monrgo'];
                    $seguir=false;
                    break;
                  }
                  $k++;
                }
              }
              if ($seguir)
              {
                $grid['id']=$i;
                $grid['codrgo'] = $result[0]['codrgo'];
                $grid['nomrgo'] = Herramientas::getX_vacio('codrgo','carecarg','nomrgo',$result[0]['codrgo']);
                $grid['monrgo'] = $result[0]['monrgo'];
                $grid['recargototal'] = $grid['monrgo'];
                $grid['pormonrgo'] = $grid['monrgo'];
                $grid['tiprgodos'] = $result[0]['tipdoc'];
                $output[] = $grid;
              }
              $i++;
           }
         }
         $j++;
      }

    }
  }
/*
 * esta funcion es para obtener el grid de los articulos cuando se llama parcialmente
 * me traigo ewl grid dependiendo del rif del proveedor escogido por el usuario
 * el grid yo lo envio en un arreglo
 */

  public static function Obtener_Grid_Parcial($refsol,$rifpro,&$output)
  {
    $result=array();
    $output = array();
    $grid=array();
    $result=array();
    $arreglo_codart=array();
    $tipopro=H::getX('RIFPRO','Caprovee','Tipo',trim($rifpro));
    if (Orden_compra::Verificar_proveedor(trim($refsol),trim($rifpro),&$rifpro,&$msg,&$cancotpril,&$strrifpro,&$srtrefcot))
    {
      $sql = "Select reqart,codart,codcat,canreq,canrec,montot,costo,monrgo,canord,mondes,relart,unimed,codpar From CaArtSol Where ReqArt='".$refsol."' order By CodArt";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        $i=0;
        while ($i<count($result))
        {
           if ($result[$i]['canord']<$result[$i]['canreq'])
           {
              if ($cancotpril>0)
              {
                //ARTICULO DE LA COTIZACION CON PRIORIDAD #1 PARA EL NUMERO DE FILAS DEL GRID
                $result1=array();
                $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='".$srtrefcot."' and codart='".$result[$i]['codart']."' and priori='1'";
                if (Herramientas::BuscarDatos($sql1,&$result1))
                {
                  $result2=array();
                  $sql2 ="Select codart,desart,codcta,codpar,ramart,cosult,cospro,exitot,unimed,unialt,relart,fecult,invini,codmar,codref,costot,sigecof,codclaart,lotuni,ctavta,ctacos,ctapro,preart,distot,tipo,tip0,coding,mercon From CaRegArt Where CodArt = '".$result[$i]['codart']."'";
                  if (Herramientas::BuscarDatos($sql2,&$result2))
                  {
                    $grid['id']=$i;
                    if ($result[$i]['monrgo']>0 && $tipopro!='P')
                       $grid['check'] = '1';
                    else
                      $grid['check'] = '0';
                  $grid['codart']=$result2[0]['codart'];
                  $grid['desart'] = $result2[0]['desart'];
                  $grid['unimed'] = $result2[0]['unimed'];
                  $partidaregart = $result2[0]['codpar'];
                    //BUSCAMOS LOS TIPOS De ARTICULOS (ARTICULOS O SERVICIOS)
                    //PARA SABER SI ES ORDEN DE COMPRA, SERVICIO O MIXTA
                    if ($result2[0]['tipo']=='A')
                        $hay_articulos=true;
                    else
                        $hay_servicios=true;
                  $grid['codcat'] = $result[$i]['codcat'];

                  if ($result[$i]['canreq']>0)
                      $grid['canreq'] = $result[$i]['canreq'];
                    else
                      $grid['canreq'] = "0.00";

                    $grid['canaju'] = "0.00";

                    if ($result[$i]['canrec']>0)
                      $grid['canrec'] = $result[$i]['canrec'];
                    else
                      $grid['canrec'] = "0.00";

                  if ($result[$i]['canreq']>0)
                      $grid['canreq'] = $result[$i]['canreq'];
                  else
                      $grid['canreq'] = "0.00";

                  if ($result[$i]['costo']>0)
                      $grid['costo'] = $result[$i]['costo'];
                  else
                      $grid['costo'] = "0.00";

                  if ($result[$i]['canreq']>0 && $result[$i]['costo']>0)
                      $grid['cancost'] = $result[$i]['canreq'] * $result[$i]['costo'];
                  else
                      $grid['cancost'] = "0.00";

                  if ($result[$i]['mondes']>0)
                      $grid['mondes'] = $result[$i]['mondes'];
                  else
                      $grid['mondes'] = "0.00";

                  if ($result[$i]['monrgo']>0 && $tipopro!='P')
                      $grid['monrgo'] = $result[$i]['monrgo'];
                  else
                      $grid['monrgo'] = "0.00";

                  if ($result[$i]['montot']>0 && $tipopro!='P')
                      $grid['montot'] =$result[$i]['montot'];
                  else if ($result[$i]['montot']>0 && $tipopro=='P')
                      $grid['montot'] =$result[$i]['montot'] -$result[$i]['monrgo'];
                  else
                      $grid['montot'] = "0.00";

                  if ($refsol!="") {
                  if (($result[$i]['codpar']!='') and ($result[$i]['codcat']))
                        $grid['codigopre']=$result[$i]['codcat'].'-'.$result[$i]['codpar'];
                    else
                        $grid['codigopre']=$partidaregart;
                  }else {
                      if (($result[$i]['codpar']!='') and ($result[$i]['codcat']))
                        $grid['codpre']=$result[$i]['codcat'].'-'.$result[$i]['codpar'];
                    else
                        $grid['codpre']=$partidaregart;
                  }

                    if ($result[$i]['codpar']!='')
                        $grid['codpar']=$result[$i]['codpar'];
                    else
                        $grid['codpar']=$partidaregart;

                    $grid['anadir']="";
                    $grid['datosrecargo']="";
                    if ($tipopro!='P') $grid['datosrecargo']=self::Cargartirarecargosgrid($refsol,$result[$i]['codart'],$result[$i]['codcat']);
                    $output[] = $grid;
                 }
               }
            }
           }
         $i++;
        }
      }
    }
  }

/*
 * verifica los pŕoveedores que tienen cotizaciones
 * y los acumula y cuando los escoge el usuario el verifica si esta en el arreglo obtenido por esta funcion
 *
 */
  public static function Verificar_proveedor($orden,$rif,&$rifpro,&$msg,&$cancotpril,&$strrifpro,&$srtrefcot)
  {
    if ($orden!='')
    {
      $espro1=false;
      $msg='';
      $cancotpril=0;
      $strrifpro='';
      $rifpro='';
      $srtrefcot='';
      $codigo=str_pad($orden,8,'0',STR_PAD_LEFT);
    $result2=array();
    $sql2 = "Select refsol from cacotiza where refsol= '".$codigo."'";
        if (Herramientas::BuscarDatos($sql2,&$result2))
        {
          $result=array();
          $sql = "Select reqart,sum(coalesce(canreq,0)) as canreq,sum(coalesce(canord,0)) as canrec From CAArtSol Where ReqArt = '".$codigo."' Group By ReqArt";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        if (($result[0]['canreq']-$result[0]['canrec'])<=0)
        {
            $msg="La Solicitud se encuentra totalmente saldada";
            $rifpro='';
        }
        else
        {
            $result1=array();
            $sql1 = "select distinct(b.rifpro) as rifpro, a.refcot,c.conpag,c.forent from cadetcot a,caprovee b,cacotiza c where c.codpro=b.codpro and c.refsol='".$codigo."' and a.refcot=c.refcot and a.priori=1";
            if (Herramientas::BuscarDatos($sql1,&$result1))
            {
                $i=0;
                  $msg='';
                  $cancotpril=count($result1);
                  while ($i<count($result1))
                  {
                    $strrifpro=$result1[$i]['rifpro'];
                    $rifpro=$result1[$i]['rifpro'];
                    $srtrefcot=$result1[$i]['refcot'];
                    if ($result1[$i]['rifpro']==$rif)
                    {
                      $espro1=true;
                      break;
                    }
                    $i++;
                  }
            }
            if (!$espro1)
            {
                  $msg="La Contratistas de Bienes o Servicio y Cooperativas de la cotizacion asociada a la  Solicitud no se le ha asignado Prioridad";
                  $rifpro=$strrifpro;
            }
        }
      }
    }
    else
    {
          $msg="No hay Cotizaciones para esta Solicitud";
          $espro1=true;
    }
    }
    return $espro1;
  }

  public static function chequear_disponibilidad_incremento_recargo($caordcom,&$arreglo,&$total_ajuste)
  {
    $variable=false;
    $mitotal=0;
    if ($caordcom->getOrdcom()!='')
    {
     $result=array();
     $arreglo=array();
     $sql="select a.codart,a.codcat,a.codpre,a.monrgo,b.canord as comprada from cadisrgo a,caartord b where a.reqart='".$caordcom->getOrdcom()."' and a.tipdoc in (select tipcom from cpdoccom) and a.reqart=b.ordcom and a.codart=b.codart and a.codcat=b.codcat";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        $i=0;
        if ($caordcom->getRefsol()!='')
        {
          while ($i<count($result))
          {
            $result1=array();
            $sql1="select a.codart,a.codcat,a.codpre,a.monrgo,b.canreq as solicitada from cadisrgo a,caartsol b where a.reqart='".$caordcom->getRefsol()."' and a.codart='".$result[$i]['codart']."' and a.codcat='".$result[$i]['codcat']."' and a.tipdoc in (select tipprc from cpdocprc) and a.reqart=b.reqart and a.codart=b.codart and a.codcat = b.codcat";
            if (Herramientas::BuscarDatos($sql1,&$result1))
            {
              if ($result1[0]['monrgo'])
                $mitotal= $mitotal + ($result[$i]['monrgo'] - (($result1[0]['monrgo']) / ($result1[0]['solicitada'] * $result[$i]['comprada'])));
              else
                $mitotal=0;
            }
            if ($mitotal>0)
            {
              $codigopresupuestario = $result[$i]['codpre'];
              $ano=substr($caordcom->getFecord(), 0, 4);
              $result2=array();
              $sql2 = "Select mondis from CPAsiIni WHERE CodPre = '".$codigopresupuestario."' AND PERPRE = '00' and AnoPre='".$ano."'";
              if (Herramientas::BuscarDatos($sql2,&$result2))
              {
                $lleno=true;
                if ($i>0)
                {
                  $j=0;
                  while ($j<count($arreglo))
                  {
                    if ($arreglo[$j][0]==$codigopresupuestario)
                    {
                      $arreglo[$j][1]=$arreglo[$j][1]+$mitotal;
                      $lleno=false;
                    }
                    $j++;
                  }
                }
                if ($lleno)
                {
                  $arreglo[$i][0]=$codigopresupuestario;
                  $arreglo[$i][1]=$mitotal;
                }
                $total_ajuste = $total_ajuste + $mitotal;
                $variable=true;
              }
            }
            $i++;
          }
        }
      }
    }
    return $variable;
  }



/*
 *Funcion para anular una orden de compra
 *esta se ejecuta en el executeSalvaranu
 *ya su ves esta es llamada en un javascript en el js almordcom
 */
  public static function Salvar_anular($caordcom,$descripcion,$fecanu, &$coderror)
  {
    $coderror=-1;
    $result=array();
    $sql = "Select refprc,afecom,afedis From CpDocCom Where TipCom='".$caordcom->getDoccom()."'";

    if (Herramientas::BuscarDatos($sql,&$result))
      $afectacompro = $result[0]['afecom'];

      //Buscamos si tiene un Ajuste

      $result=array();
        $sql = "Select refere From Cpajuste Where refaju='".'IS'.trim(substr($caordcom->getOrdcom(), 2, 6))."' and staaju='A'";
    if (!Herramientas::BuscarDatos($sql,&$result))
    {
        $result1=array();
          $sql1 = "Select rcpart From Carcpart Where ordcom='".$caordcom->getOrdcom()."'";
      if (!Herramientas::BuscarDatos($sql1,&$result1))
      {
        //Ahora preguntamos si genero Comprobante de Orden y si lo podemos eliminar
          $result2=array();
            $sql2 = "Select codemp From Opdefemp";
        if (Herramientas::BuscarDatos($sql2,&$result2))
        {
          if ($caordcom->getTipord()=='C')
            $numerocomprob='OC'.substr($caordcom->getOrdcom(), 2, 6);
          elseif($caordcom->getTipord()=='S' || $caordcom->getTipord()=='T')
            $numerocomprob='OS'.substr($caordcom->getOrdcom(), 2, 6);
          else
            $numerocomprob='OC'.substr($caordcom->getOrdcom(), 2, 6);



          if (self::verificar_status_compro($numerocomprob))///////////////////////////////////////////
          {
            if(!self::anular_comprob($numerocomprob,$fecanu,&$coderror))
            {
              $coderror=124;
              return false;
            }
          }
          /*else
          {
            $coderror=167;
            return false;
          }*/
          }//Opdefemp

          $result3=array();
            $sql3 = "Select ordcom,refcom From Caordcom Where ordcom='".$caordcom->getOrdcom()."'";
        if (Herramientas::BuscarDatos($sql3,&$result3))
        {
            $result4=array();
              $sql4 = "select * from cpimpcau where refere='".$result3[0]['ordcom']."' and STAIMP<>'N'";
          if (!Herramientas::BuscarDatos($sql4,&$result4))
          {
                $sql5="Update Caordcom set fecanu='".$fecanu."',staord='N'  where ordcom='".$caordcom->getOrdcom()."'";
              Herramientas::insertarRegistros($sql5);
                      $referenciacomp = $result3[0]['refcom'];
              if ($caordcom->getRefsol()!='')
              {
                $result5=array();
              $sql5 = "select canord,codart,codcat from Caartord Where ordcom='".$caordcom->getOrdcom()."'";
              if (Herramientas::BuscarDatos($sql5,&$result5))
              {
                  $i=0;
                  // en vez del grid hice una consulta a bd
                  while ($i<count($result5))
                  {
                  $sql6="Update Caartsol set Canord=Canord-".$result5[$i]['canord']." where reqart='".$caordcom->getRefsol()."' and codart='".$result5[$i]['codart']."' and codcat='".$result5[$i]['codcat']."'";
                  Herramientas::insertarRegistros($sql6);
                  $i++;
                    }
              }
              }
                if ($afectacompro=="S")
              {
                $sql7="Update Cpcompro set desanu='".$descripcion."',fecanu='".$fecanu."',stacom='N'  where refcom='".$referenciacomp."'";
              Herramientas::insertarRegistros($sql7);
                        //Anular_ImpCom
              $sql8 = "Update Cpimpcom set staimp='N' Where Rtrim(RefCom)='".$referenciacomp."'";
              Herramientas::insertarRegistros($sql8);
            }
                    }
                    else
                    {
                $coderror=154;
              return false;
                    }
          }
        }
        else
        {
              $coderror=155;
            return false;
        }//Carcpart
      }
      else
      {
        $coderror=157;
        return false;
      }//$cpajuste
  }
/*
 * verifica el estatus del compromiso
 */
  public static function verificar_status_compro($comprobante)
  {
      $var=false;
      $result=array();
        $sql = "Select stacom From Contabc Where numcom='".$comprobante."'";
    if (Herramientas::BuscarDatos($sql,&$result))
      $var=true;
  return $var;
  }

/*
 * anula el comprobante de la orden de compra
 */
  public static function anular_comprob($comprobante,$fecanu,&$coderror)
  {
    $coderror=-1;
    $contabc_up='';
    $c= new Criteria();
      $c->add(ContabcPeer::NUMCOM,$comprobante);
    $contabc_up = ContabcPeer::doSelectOne($c);
    if (count($contabc_up)>0)
    {
        $numcom='AC'.substr($contabc_up->getNumcom(), 2, 6);
        if ($fecanu=='')
        {
          $dateFormat = new sfDateFormat('es_VE');
          $fecanu = $dateFormat->format(date("d-m-Y"), 'i', $dateFormat->getInputPattern('d'));
        }
        $vacio='';
        $result=array();
      $sql = "Select numcom From Contabc Where numcom='".$numcom."'";
      if (!Herramientas::BuscarDatos($sql,&$result))
      {
            $sql="Insert into Contabc values ('".$numcom."','".$fecanu."','".$contabc_up->getDescom()."','".$contabc_up->getMoncom()."','D','".$vacio."')";
            Herramientas::insertarRegistros($sql);

          $c= new Criteria();
            $c->add(Contabc1Peer::NUMCOM,$comprobante);
          $contabc1_up = Contabc1Peer::doSelect($c);
          if (count($contabc1_up)>0)
          {
              $i=0;
              $asiento=1;
              foreach ($contabc1_up as $detalle)
              {
                  $numcom='AC'.substr($detalle->getNumcom(), 2, 6);
                  if ($detalle->getDebcre()=='D')
                    $debcre='C';
                  else
                    $debcre='D';
                  $sql1="Insert into Contabc1 values ('".$numcom."','".$fecanu."','".$debcre."','".$detalle->getCodcta()."','".$asiento."','".$detalle->getRefasi()."','".$detalle->getDesasi()."','".$detalle->getMonasi()."')";
                  Herramientas::insertarRegistros($sql1);
              $asiento++;
            }
            return true;
          }
      }
      else
      {
          $coderror=159;
          return false;
      }
    }
    else
    {
        $coderror=124;
        return false;
    }
    return true;

  }

/*
 * calcula el monto del recargo que se va a guardar
 * esto se hace tanto en javascript como en codigo php
 */
  public static function monto_recargo($acumulado, $totalrgo, $totalart,&$monto_recargo)
  {
    $monto_recargo= 0;
    if ($acumulado!=0)
      $monto_recargo = ($totalrgo) * ($totalart / $acumulado);
    else
      $monto_recargo=0;
    return true;
  }


  public static function chequear_disponibilidad_recargo($codigo,$elmonto,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$referencia,&$sobregiro_recargo,$grid_total_unidad)
  {
      $codigo=str_replace("'","",$codigo);
      $chequear_disponibilidad_recargo = false;
      $sobregiro_recargo = true;
      $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
      if ($codigo=='')
        $mitotal=0;
      else
        $mitotal=$elmonto;
      $result=array();
      $sql = "Select codpre from CaRecArg where CodRgo = '".$codigo."'";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
          if (trim($tiporec)=='P')
          {
            $mitotal=$elmonto;
            $codigo_presupuestario = str_replace("'","",$result[0]['codpre']);
            $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
            if ($mitotal <= $mondis)
            {
                $chequear_disponibilidad_recargo = true;
                $sobregiro_recargo = false;
            }
          }
        elseif (trim($tiporec)=='R')
        {
            $grid_total_unidad=self::acumular_unidad($elmonto,$grid_detalle_orden_arreglos,$referencia,$grid_total_unidad);
            $j=0;
            while ($j<count($grid_total_unidad))
            {
                $codigo_presupuestario = $grid_total_unidad[$j][0].'-'.$result[0]['codpre'];
                $mitotal=$grid_total_unidad[$j][1];
                $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
                if ($mitotal <= $mondis)
                {
                    $chequear_disponibilidad_recargo = true;
                    $sobregiro_recargo = false;
                }
                $j++;
            }
          }
       }

      return $chequear_disponibilidad_recargo;
  }

/*
 *
 */

  public static function acumular_unidad($elmonto,$grid_detalle_orden_arreglos,$referencia,$grid_total_unidad)
  {
    if ($referencia==0) // para saber de que tabla me lo estoy trayendo
    {
      $campo5='canord';//tabla Caartord
      $campo9='preart';//tabla Caartord
    }
    else
    {
      $campo5='canreq';//tabla Caartsol
      $campo9='costo';//tabla Caartsol
    }
    $i=0;
    $acum=0;
    while ($i<count($grid_detalle_orden_arreglos))
    {
      if ((str_replace("'","",$grid_detalle_orden_arreglos[$i]['check'])=='1') and (str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo9])>0))
        $acum = $acum + (str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo5])*str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo9]));
        $i++;
    }
    $i=0;
    while ($i<count($grid_detalle_orden_arreglos))
    {
        if (str_replace("'","",$grid_detalle_orden_arreglos[$i]['check'])=='1')
        {
          $totart = str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo9]) * str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo5]);
          $j=0;
          if (count($grid_total_unidad)>0)
          {
            while ($j<count($grid_total_unidad))
            {
                $encontrado=false;
                if (str_replace("'","",$grid_detalle_orden_arreglos[$i]['codcat'])==$grid_total_unidad[$j][0])
                {
                  $encontrado=true;
                  $fila=$j;
                  break;
                }
                $j++;
            }
            if ($encontrado)
            {
              self::monto_recargo($acum,$elmonto,$totart,&$monto_recargo);
              $grid_total_unidad[$fila][1]=$grid_total_unidad[$fila][1]+$monto_recargo;
            }
            else
            {
              $var=count($grid_total_unidad);
              $grid_total_unidad[$var][0]=str_replace("'","",$grid_detalle_orden_arreglos[$i]['codcat']);
              self::monto_recargo($acum,$elmonto,$totart,&$monto_recargo);
              $grid_total_unidad[$var][1]=$monto_recargo;
            }
          }
          else
          {
            $grid_total_unidad[$j][0]=str_replace("'","",$grid_detalle_orden_arreglos[$i]['codcat']);
            self::monto_recargo($acum,$elmonto,$totart,&$monto_recargo);
            $monto_recargo.$grid_total_unidad[$j][1]=$monto_recargo;
          }
        }
        $i++;
    }
      return $grid_total_unidad;
  }


//<!-----------------------------------Funciones del codigo probadas----------------------------------------------------------->

  public static function chequear_disponibilidad_presupuesto($caordcom,$grid_detalle_orden_arreglos,$fila,$referencia,&$sobregiro,&$codigo_presupuestario_sin_disponibilidad)
  {
    //print $referencia;
    if ($referencia==0) // para saber de que tabla me lo estoy trayendo
    {
      $campo12='rgoart';//tabla Caartord
      $campo11='dtoart';//tabla Caartord
      $campo9='preart';//tabla Caartord
      $campo13='totart';//tabla Caartord
      $campo15='codpre';//tabla Caartord
    }
    else
    {
      $campo12='monrgo';//tabla Caartsol
      $campo11='dondes';//tabla Caartsol
      $campo9='costo';//tabla Caartsol
      $campo13='montot';//tabla Caartsol
      $campo15='codigopre';//tabla Caartsol
    }
    $mitotal = 0;
    $codigo_presupuestario='';
    $chequear_disponibilidad=false;
    $sobregiro=true;
    $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
    if (count($grid_detalle_orden_arreglos)>0)
    {
        $j=0;
          while ($j<count($grid_detalle_orden_arreglos))
          {
            if (str_replace("'","",$grid_detalle_orden_arreglos[$fila][$campo15])==str_replace("'","",$grid_detalle_orden_arreglos[$j][$campo15]))
            {
              if ($tiporec=='C')
                $elmonto=str_replace("'","",$grid_detalle_orden_arreglos[$j][$campo13]);
              else
                $elmonto=($grid_detalle_orden_arreglos[$j][$campo13]-$grid_detalle_orden_arreglos[$j][$campo12]);
              $mitotal=$mitotal+$elmonto;
            }
              $j++;
          }
        if ($caordcom->getId()!='')
           $mitotal = $mitotal - $grid_detalle_orden_arreglos[$fila][$campo11];

        if ($grid_detalle_orden_arreglos[$fila][$campo15]!='')
        {
           $codigo_presupuestario =  $grid_detalle_orden_arreglos[$fila]['codcat']."-".$grid_detalle_orden_arreglos[$fila]['codpar'];
           $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
           if ($mitotal<=$mondis)
           {
               $chequear_disponibilidad=true;
               $sobregiro=false;
           }
        }
    }
    $codigo_presupuestario_sin_disponibilidad=$codigo_presupuestario;
    return $chequear_disponibilidad;
  }


   public static function Grabar_ajuste_solicitud($caordcom,$totalaju,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$tiporec,$tasacambio,$monedasol,$referencia)
   {
      if ($referencia==0) // para saber de que tabla me lo estoy trayendo
      {
        $campo11='rgoart';//tabla Caartord
        $campo10='dtoart';//tabla Caartord
      }
        else
        {
          $campo11='monrgo';//tabla Caartsol
          $campo10='mondes';//tabla Caartord
        }
        $grabarajustesolicitud = true;
        $result=array();
        $fecha_ano=substr($caordcom->getFecord(), 0, 4);
        $sql = "SELECT tipaju FROM CPDOCAJU WHERE REFIER='P'";
        if (Herramientas::BuscarDatos($sql,&$result))
           $tipo=str_replace("'","",$result[0]['tipaju']);
        else
           $tipo="AJPR";
        if ($caordcom->getOrdcom()!='')
        {
          $referenciaajuste = 'IS'.substr($caordcom->getOrdcom(), 2, 6);
          $cpajuste_new = new Cpajuste();
              $cpajuste_new->setRefaju($referenciaajuste);
              $cpajuste_new->setTipaju($tipo);
              $cpajuste_new->setFecaju($caordcom->getFecord());
              $cpajuste_new->setAnoaju($fecha_ano);
              $cpajuste_new->setRefere($caordcom->getRefsol());
              $cpajuste_new->setDesaju('AJUSTE POR INCREMENTO DE TASA CAMBIARIA A LA SOLICITUD DE EGRESO N° '. $caordcom->getRefer());
              $cpajuste_new->setTotaju($totalaju);
              $cpajuste_new->setStaaju('A');
              $cpajuste_new->save();
              $grabarajustesolicitud = true;
        }
        else
          $grabarajustesolicitud = false;
      $i=0;
      if ($grabarajustesolicitud)
      {
        while ($i<count($grid_detalle_orden_arreglos))
        {
          $result=array();
          if (self::obtener_codigo_presupuestario($caordcom,$grid_detalle_orden_arreglos,$i,&$obtenercodigopresupuestario)=='true')
          {
              $sql1 = "select * From CPMovAju where refaju='".$referenciaajuste."' and Codpre='".$obtenercodigopresupuestario."'";
              if (Herramientas::BuscarDatos($sql1,&$result))
              {
                $montoaxu=str_replace("'","",$result[0]['monaju']);
                $c = new Criteria();
                $c->add(CpmovajuPeer::REFAJU,$referenciaajuste);
                $c->add(CpmovajuPeer::CODPRE,$obtenercodigopresupuestario);
                  $cadisrgo = CadisrgoPeer::doSelect($c);
                  foreach ($cadisrgo as $arreglo)
                  {
                    $arreglo->delete();
                  }
              }
              else
                $montoaxu=0;

             $cpmovaju_new = new Cpmovaju();
             $cpmovaju_new->setRefaju($referenciaajuste);
             $cpmovaju_new->setCodpre($obtenercodigopresupuestario);
             if ($tiporec=='C')
               $mitotal=($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])-((($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])/$tasacambio)*$monedasol);
             else
               $mitotal=((($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])/$tasacambio)*$monedasol);
             $cpmovaju_new->setMonaju('-'.($mitotal-$montoaxu));// es columna 16
             $cpmovaju_new->setStamov('A');
             $cpmovaju_new->setRefprc($caordcom->getRefsol());
             $cpmovaju_new->setRefcom('NULO');
             $cpmovaju_new->setRefcau('NULO');
             $cpmovaju_new->setRefpag('NULO');
             $cpmovaju_new->save();
          }
              $i++;
        }
        $i=0;
        if (count($grid_detalle_recargo)>0)
        {
          while ($i<count($grid_detalle_recargo))
          {
            $result1=array();
            $codigo = $grid_detalle_recargo[$i][0];// colocar el nombre del griup q falta
            $sql1 = "select * From CPMovAju where refaju='".$referenciaajuste."' and Codpre='".$codigo."'";
            if (Herramientas::BuscarDatos($sql1,&$result1))
            {
              $montoaxu=str_replace("'","",$result1[0]['monaju']);
                $c = new Criteria();
                $c->add(CpmovajuPeer::REFAJU,$referenciaajuste);
                $c->add(CpmovajuPeer::CODPRE,$obtenercodigopresupuestario);
                  $cpmovaju = CadisrgoPeer::doSelect($c);
                  foreach ($cpmovaju as $arreglo)
                  {
                    $arreglo->delete();
                  }
            }
            else
              $montoaxu=0;

                $cpmovaju_new = new Cpmovaju();
                  $cpmovaju_new->setRefaju($referenciaajuste);
                  $cpmovaju_new->setCodpre($obtenercodigopresupuestario);
                  $cpmovaju_new->setMonaju('-'.($montoaxu-$grid_detalle_recargo[$i][1]));
                  $cpmovaju_new->setStamov('A');
                  $cpmovaju_new->setRefprc($caordcom->getRefsol());
                  $cpmovaju_new->setRefcom('NULO'); // no vb
                  $cpmovaju_new->setRefcau('NULO'); // no vb
                  $cpmovaju_new->setRefpag('NULO'); //no vb
                  $cpmovaju_new->save();
                $i++;
          }
        }
      }
    return   $grabarajustesolicitud;
   }




  public static function Grabar_distribucion_recargo($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$referencia)// Aqui se usan los grid como arreglos
  {
    $arreglo_grid=$grid_detalle_orden_arreglos;
    $arreglo_grid_recargo=$grid_detalle_recargo;
    $acum=0;

    if (count($arreglo_grid_recargo)>0)
    {
      if ($referencia==0) // para saber de que tabla me lo estoy trayendo
      {
        $campo5='canord';//tabla Caartord
        $campo9='preart';//tabla Caartord
        $campo='canord';//tabla Caartord
        $campo1='totart';//tabla Caartord
        $campo11='rgoart';//tabla Caartsol
      }
      else
      {
        $campo5='canreq';//tabla Caartsol
        $campo9='costo';//tabla Caartord
        $campo='canreq';//tabla Caartsol
        $campo1='montot';//tabla Caartsol
        $campo11='monrgo';//tabla Caartsol
      }
      $i=0;
      while ($i<count($arreglo_grid))
      {
        $acum=$acum+($arreglo_grid[$i][$campo]*$arreglo_grid[$i][$campo9]);
        $i++;
      }

      $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
        $cadisrgo = CadisrgoPeer::doSelect($c);
        foreach ($cadisrgo as $arreglo)
        {
          $arreglo->delete();
        }


      $i=0;
      //guardo tantos recargos halla de acuerdo a cuantos articulos halla sido marcado con el check
      while ($i<count($arreglo_grid_recargo))
      {
        if ($arreglo_grid_recargo[$i]["codrgo"]!='')
        {
           $j=0;
           $total_articulo=0;
           while ($j<count($arreglo_grid))
           {
              if (($arreglo_grid[$j]["codart"]!='') and ($arreglo_grid[$j][$campo]!=''))
              {
                $total_articulo=($arreglo_grid[$j][$campo])*($arreglo_grid[$j][$campo9]);
                $cadisrgo_new = new Cadisrgo();
                $cadisrgo_new->setReqart($caordcom->getOrdcom());
                $cadisrgo_new->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
                $cadisrgo_new->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
                $cadisrgo_new->setCodrgo(str_replace("'","",$arreglo_grid_recargo[$i]["codrgo"]));
                $result2=array();
                $sql2 = "SELECT asiparrec FROM cadefart WHERE codemp<>''";
                if (Herramientas::BuscarDatos($sql2,&$result2))
                  $tiporec=str_replace("'","",$result2[0]['asiparrec']);
                if ($tiporec!='')
                {
                  if ($tiporec!='C')
                  {
                      if ($tiporec=='P')
                        $cadisrgo_new->setCodpre(Herramientas::getX_vacio('codrgo','carecarg','codpre',$arreglo_grid_recargo[$i]["codrgo"]));
                      else
                        $cadisrgo_new->setCodpre(str_replace("'","",$arreglo_grid[$j]["codcat"]).'-'.Herramientas::getX_vacio('codrgo','carecarg','codpre',str_replace("'","",$arreglo_grid_recargo[$i]["codrgo"])));
                   }
                   else {
                      if ($referencia==1)
                      $cadisrgo_new->setCodpre(str_replace("'","",$arreglo_grid[$j]["codigopre"]));
                      else $cadisrgo_new->setCodpre(str_replace("'","",$arreglo_grid[$j]["codpre"]));
                   }
                }
                self::monto_recargo($acum, $arreglo_grid_recargo[$i]["recargototal"], $total_articulo,&$monto_recargo);
                //$cadisrgo_new->setMonrgo(str_replace("'","",$arreglo_grid[$j][$campo11]));
                $cadisrgo_new->setMonrgo($monto_recargo);
                $cadisrgo_new->setTipdoc($caordcom->getDoccom());
                $cadisrgo_new->save();
               }
            $j++;
         }
        }
      $i++;
      }
      return true;
    }
    else
    {
      return false;
    }
  }



   public static function Grabar_compromiso($caordcom)
   {
      $referencia = $caordcom->getOrdcom();
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      Herramientas::EliminarRegistro("CpCompro", "Refcom", $referencia);
      Herramientas::EliminarRegistro("Cpimpcom", "Refcom", $referencia);
      $result=array();
      $sql = "Select * From CpCompro Where rtrim(RefCom) ='".$referencia."'";
      $fecha_ano=substr($caordcom->getFecord(), 0, 4);
      if (!Herramientas::BuscarDatos($sql,&$result))
      {
          $cpcompro_new = new Cpcompro();
          $cpcompro_new->setRefcom($referencia);
          $cpcompro_new->setTipcom($caordcom->getDoccom());
          $cpcompro_new->setFeccom($caordcom->getFecord());
          $cpcompro_new->setAnocom($fecha_ano);
          if ($caordcom->getRefsol())
             $cpcompro_new->setRefprc($caordcom->getRefsol());
          else
             $cpcompro_new->setRefprc('NULO');
          $cpcompro_new->setTipprc($tipdoc);
          /*$descripcion=Herramientas::getX_vacio('refprc','cpprecom','desprc',$caordcom->getRefsol());
          if ($descripcion!='')
            $cpcompro_new->setDescom($descripcion);
          else*/
            $cpcompro_new->setDescom($caordcom->getDesord());

          //$cpcompro_new->setDesanu('');
          $cpcompro_new->setMoncom($caordcom->getMonord());
              $cpcompro_new->setSalcau('0');
              $cpcompro_new->setSalpag('0');
              $cpcompro_new->setSalaju('0');
              $cpcompro_new->setCedrif($caordcom->getRifpro());
              $cpcompro_new->setStacom('A');
              $cpcompro_new->setTipo($caordcom->getTipo());
              $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$caordcom->getDoccom());
              if ($reqaut=='S')              
                $cpcompro_new->setAprcom('N');
              else 
                $cpcompro_new->setAprcom('S');
              
              $cpcompro_new->save();
        $result=array();
        $sql1='';
        $sql = "Select AsiParRec from CaDefArt";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $tiporec=str_replace("'","",$result[0]['asiparrec']);
          if (str_replace("'","",$result[0]['asiparrec'])!='C')
            $sql1="Select (A.CodCat)||'-'||(A.CodPar) AS codpre, SUM(A.TotArt)-SUM(A.RGOART) AS totimp From CaArtOrd A,CARegArt B  Where A.CODART=B.CODART AND A.OrdCom='".$caordcom->getOrdcom()."'  GROUP BY (A.CodCat)||'-'||(A.CodPar)";
          else     //COSTO DEL ARTICULO
            $sql1= "Select Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar) as codpre, SUM(A.TotArt) as totimp From CaArtOrd A,CARegArt B Where A.CODART=B.CODART AND A.OrdCom='".$caordcom->getOrdcom()."' GROUP BY Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar)";//ojo rebisar
        }
        $sql1;
        $result2=array();
        if (Herramientas::BuscarDatos($sql1,&$result2))
        {
          $i=0;
          while ($i<count($result2))
          {
            if (str_replace("'","",$result2[$i]['totimp'])>0)
            {
                  $cpimpcom_new = new Cpimpcom();
                    $cpimpcom_new->setRefcom($referencia);
                    $cpimpcom_new->setCodpre(str_replace("'","",$result2[$i]['codpre']));
                    $cpimpcom_new->setMonimp(str_replace("'","",$result2[$i]['totimp']));
                    $cpimpcom_new->setMoncau('0');
                    $cpimpcom_new->setMonpag('0');
                    $cpimpcom_new->setMonaju('0');
                    $cpimpcom_new->setStaimp('A');
                    if ($caordcom->getRefsol())
                         $cpimpcom_new->setRefere($caordcom->getRefsol());
                    else
                         $cpimpcom_new->setRefere('NULO');
                  $cpimpcom_new->save();
            }
            $i++;
          }
       }
       if ($tiporec<>'C')
       {
        $sql="SELECT SUM(monrgo) as totimp,codpre FROM CADISRGO WHERE REQART='".$caordcom->getOrdcom()."' AND TIPDOC='".$caordcom->getDoccom()."' GROUP BY CODPRE";
        $result=array();
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $i=0;
          while ($i<count($result))
          {
            if (str_replace("'","",$result[$i]['totimp'])>0)
            {
                if ($caordcom->getRefsol()!='')
                      $var=$caordcom->getRefsol();
                else
                      $var='NULO';
                $sql="Insert into Cpimpcom values ('".$referencia."','".$result[$i]['codpre']."','".$result[$i]['totimp']."','0','0','0','A','".$var."')";
                Herramientas::insertarRegistros($sql);
             }
             $i++;
           }
        }
       }
         $c= new Criteria();
         $c->add(CaordcomPeer::ORDCOM,$caordcom->getOrdcom());
         $caordcom_up = CaordcomPeer::doSelectOne($c);
         if (count($caordcom_up)>0)
         {
              $caordcom_up->setRefcom($referencia);
              $caordcom_up->setAfepre('S');
              $caordcom_up->save();
         }
        return true;
    }
    else
        return false;
 }



 public static function chequear_disponibilidad_incremento_recargo2($caordcom,&$total_ajuste)
  {
    if ($caordcom->getOrdcom()!='')
    {
      $result=array();
      $chequear_disponibilidad_incremento_recargo=true;
      //AQUI ESTAMOS BUSCANDO LA DISTRIBUCION DEL RECARGO DE LA ORDEN
      $sql = "SELECT
          A.CODART,
          A.CODCAT,
          A.CODPRE,
          A.MONRGO,
          B.CANORD AS COMPRADA
          FROM
            CADISRGO A,
            CAARTORD B
          WHERE
          A.REQART='".$caordcom->getOrdcom()."' AND
          A.TIPDOC
          IN (SELECT TIPCOM FROM CPDOCCOM) AND
          A.REQART=B.ORDCOM AND
          A.CODART=B.CODART AND
          A.CODCAT=B.CODCAT";
      //DE COMPRA QUE ESTAMOS GRABANDO. ESTO ES POR ARTICULO Y CODIGO DE UNIDAD
      $i=0;
      if (Herramientas::BuscarDatos($sql,&$result))
      {
          while ($i<count($result))
          {
            $mitotal=0;
            if ($caordcom->getRefsol()!='')
            {
                //AQUI ESTAMOS BUSCANDO LA DISTRIBUCION DEL RECARGO DE LA ORDEN
                $sql = "SELECT A.CODART,
                  A.CODCAT,
                  A.CODPRE,
                  A.MONRGO,
                  B.CANREQ AS SOLICITADA
                  FROM
                  CADISRGO A,
                  CAARTSOL B
                  WHERE
                  A.REQART='".$caordcom->getRefsol()."' AND
                  A.CODART='".str_replace("'","",$result[$i]['codart'])."' AND
                  A.CODCAT='".str_replace("'","",$result[$i]['codcat'])."' AND
                  A.TIPDOC IN (SELECT TIPPRC FROM CPDOCPRC) AND
                  A.REQART=B.REQART AND
                  A.CODART=B.CODART AND
                  A.CODCAT = B.CODCAT";
            }
            if ((Herramientas::BuscarDatos($sql,&$result2)) and ($caordcom->getRefsol()!=''))
            {
              $result2=array();
              $mitotal = $mitotal + str_replace("'","",$result[$i]['monrgo']) - ((str_replace("'","",$result2[$i]['monrgo']) / str_replace("'","",$result2[$i]['solicitada'])) * str_replace("'","",$result[$i]['comprada']));
            }
                  if (($mitotal>0) and ($caordcom->getRefsol()!=''))
                  {
                      $codigopresupuestario = str_replace("'","",$result[$i]['codpre']);
                      $fecha=substr($caordcom->getFecord(), 0, 4);
                      $sql = "Select mondis from CPAsiIni WHERE CodPre ='".$codigopresupuestario."' AND PERPRE = '00' and AnoPre='".$fecha."'";
                      $result3=array();
                      if (Herramientas::BuscarDatos($sql,&$result3))
                      {
                        if ($mitotal>str_replace("'","",$result3[0]['mondis']))
                            $chequear_disponibilidad_incremento_recargo=false;
                        else
                            $total_ajuste = $total_ajuste + $mitotal;
                      }
                      else
                        $chequear_disponibilidad_incremento_recargo=false;
                  }
          $i++;
          }
      }
      return $chequear_disponibilidad_incremento_recargo;
  }

 }


  public static function Grabar_orden_compra($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$arreglo_objetos,$arreglo_campos,$moneda,$codigomoneda,$codigo_proveedor,$referencia,$codconpag,$codforent)
  {
    if (Herramientas::getX_vacio('ordcom','caordcom','ordcom',$caordcom->getOrdcom())=='')
    {
        if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
              $tipord='corser';
           else
              $tipord='corcom';

          if (Herramientas::getVerCorrelativo($tipord,'cacorrel',&$r))
          {
              if ($caordcom->getOrdcom()=='########')
              {
              	  $valido=false;
              	  $longitud='8';
              	  $nroorden=0;
              	  $formato='';
			      $c = new Criteria();
			      $c->add(ContabaPeer::CODEMP,'001');
			      $per = ContabaPeer::doSelectOne($c);

			      if ($per->getCorcomp()=='AAMM####'){
			      	$formato = date('ym');
			      	$mes=date('m');
			      	$longitud='4';
			      	$sql="select substring(ordcom,5,4) as num from caordcom where substring(ordcom,3,2)='".$mes."' order by fecord desc limit 1";
			      	if (Herramientas::BuscarDatos($sql,&$result))
			      	{
			      	  $cor=$result[0]["num"]+1;
			      	}else $cor=1;

			      	while(!$valido){
				     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

				      $c = new Criteria();
				      $c->add(CaordcomPeer::ORDCOM,$nroorden);
				      $clase = CaordcomPeer::doSelectOne($c);
				      if(!$clase){
				        $valido = true;
				      }else { $cor=$cor +1;}
			      	}
			      	$caordcom->setOrdcom($nroorden);

			      }elseif ($per->getCorcomp()=='MMAA####'){
			      	$formato = date('my');
					$longitud='4';
					$mes=date('m');
			      	$sql="select substring(ordcom,5,4) as num from caordcom where substring(ordcom,1,2)='".$mes."' order by fecord desc limit 1";
			      	if (Herramientas::BuscarDatos($sql,&$result))
			      	{
			      	  $cor=$result[0]["num"]+1;
			      	}else $cor=1;

			      	while(!$valido){
				     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

				      $c = new Criteria();
				      $c->add(CaordcomPeer::ORDCOM,$nroorden);
				      $clase = CaordcomPeer::doSelectOne($c);
				      if(!$clase){
				        $valido = true;
				      }else { $cor=$cor +1;}
			      	}
			      	$caordcom->setOrdcom($nroorden);

			      }else{
	            $encontrado=false;
	            while (!$encontrado)
	            {
	              $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	                  if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
	                  $numero='OS'.(substr($numero,2,strlen($numero)));
	                else
	                    $numero='OC'.(substr($numero,2,strlen($numero)));
	                $sql="select ordcom from caordcom where ordcom='".$numero."'";
	                if (Herramientas::BuscarDatos($sql,&$result))
	                {
	                  $r=$r+1;
	                }
	                else
	                {
	                  $encontrado=true;
	                }
	            }//while (!$encontrado)
                $caordcom->setOrdcom(str_pad($r, 8, '0', STR_PAD_LEFT));
                Herramientas::getSalvarCorrelativo($tipord,'cacorrel','cacorrel',$r,&$msg);
                //$caordcom->setOrdcom(Herramientas::getBuscar_correlativo($caordcom->getOrdcom(),'cadefart',$tipord,'caordcom','ordcom'));

                if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
                 $caordcom->setOrdcom('OS'.substr($caordcom->getOrdcom(), 2, 6));
                else
                 $caordcom->setOrdcom('OC'.substr($caordcom->getOrdcom(), 2, 6));
              }
              }
              else
              {
                $caordcom->setOrdcom(str_replace('#','0',$caordcom->getOrdcom()));
                $caordcom->setOrdcom(str_pad($caordcom->getOrdcom(), 8, '0', STR_PAD_LEFT));
                //$caordcom->setOrdcom(Herramientas::getBuscar_correlativo($caordcom->getOrdcom(),'cadefart',$tipord,'caordcom','ordcom'));

                if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
		          $caordcom->setOrdcom('OS'.substr($caordcom->getOrdcom(), 2, 6));
		        else
		          $caordcom->setOrdcom('OC'.substr($caordcom->getOrdcom(), 2, 6));
              }
           }

          // campos
            $total_detalle_orden=$arreglo_campos[0];
            $total_descuento=$arreglo_campos[1];
            $total_recargo=$arreglo_campos[2];
            //arreglos de arreglos
            $grid_detalle_orden_objetos=$grid_detalle_orden_arreglos;
            //arreglos de objetos
            $grid_detalle_resumen_objetos=$arreglo_objetos[0];
            $grid_detalle_entrega_objetos=$arreglo_objetos[1];
            //$grid_detalle_recargo_objetos=$arreglo_objetos[2];

            if ($caordcom->getOrdcom()!='')
            {
              $caordcom_new = new Caordcom();
              $caordcom_new->setOrdcom($caordcom->getOrdcom());
              $caordcom_new->setFecord($caordcom->getFecord());
              $caordcom_new->setCodpro($codigo_proveedor);
              $caordcom_new->setDesord($caordcom->getDesord());
              $caordcom_new->setMonord($caordcom->getMonord());
              $caordcom_new->setDtoord($total_descuento);
              $caordcom_new->setStaord('A');
              $caordcom_new->setAfepre('N');
              $caordcom_new->setTipmon($codigomoneda);
              $caordcom_new->setValmon($moneda);
              $caordcom_new->setTipord($caordcom->getTipord());
              $caordcom_new->setTipo($caordcom->getTipo());
              $caordcom_new->setCodemp($caordcom->getCodemp());
              $caordcom_new->setNotord($caordcom->getNotord());
              $caordcom_new->setTippro($caordcom->getTippro());
              $caordcom_new->setAfepro($caordcom->getRefprc());
              $caordcom_new->setDoccom($caordcom->getDoccom());
              $caordcom_new->setRefsol($caordcom->getRefsol());
              $caordcom_new->setTipfin($caordcom->getTipfin());
              $caordcom_new->setJustif($caordcom->getJustif());
              $caordcom_new->setRefprc($caordcom->getRefprc());
              $caordcom_new->setCoduni($caordcom->getCoduni());
              $caordcom_new->setCodmedcom($caordcom->getCodmedcom());
              $caordcom_new->setCodprocom($caordcom->getCodprocom());
              $caordcom_new->setCodpai($caordcom->getCodpai());
              $caordcom_new->setCodedo($caordcom->getCodedo());
              $caordcom_new->setCodmun($caordcom->getCodmun());
              $caordcom_new->setAplart($caordcom->getAplart());
              $caordcom_new->setAplart6($caordcom->getAplart6());

              $caordcom_new->setNumsigecof($caordcom->getNumsigecof());
              $caordcom_new->setFecsigecof($caordcom->getFecsigecof());
              $caordcom_new->setExpsigecof($caordcom->getExpsigecof());
              $caordcom_new->setForent($codforent);
              $caordcom_new->setConpag($codconpag);
              $caordcom_new->getMonord();
              $caordcom->getOrdcom();
              $caordcom_new->save();
              self::Grabar_detalles_orden_compra($caordcom,$grid_detalle_orden_objetos,$grid_detalle_recargo,$total_recargo,$referencia,$codconpag,$codforent);//grabo en el grid general de detalle de la orden
              self::Grabar_grid_resumen($caordcom,$grid_detalle_resumen_objetos);//grabo en el grid resumen
              //self::Grabar_recargos($caordcom,$grid_detalle_recargo);//grabo recargo general
              self::Grabar_grid_entregas($caordcom,$grid_detalle_entrega_objetos);//grabo en el grid entrega
              //self::Grabar_distribucion_recargo($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$referencia);
              self::grabarDistribucionRgo($caordcom,$grid_detalle_orden_arreglos);
              self::grabarRecargo($caordcom);
              return true;
            }
            else
              return false;
    }
    else
    {
      $c= new Criteria();
      $c->add(CaordcomPeer::ORDCOM,$caordcom->getOrdcom());
      $caordcom_mod= CaordcomPeer::doSelectOne($c);
      if (count($caordcom_mod)>0)
      {
		  $caordcom_mod->setCodmedcom($caordcom->getCodmedcom());
		  $caordcom_mod->setCodprocom($caordcom->getCodprocom());
		  $caordcom_mod->setCodpai($caordcom->getCodpai());
		  $caordcom_mod->setCodedo($caordcom->getCodedo());
		  $caordcom_mod->setCodmun($caordcom->getCodmun());
		  $caordcom_mod->setAplart($caordcom->getAplart());
		  $caordcom_mod->setAplart6($caordcom->getAplart6());
		  $caordcom_mod->setNumsigecof($caordcom->getNumsigecof());
		  $caordcom_mod->setFecsigecof($caordcom->getFecsigecof());
		  $caordcom_mod->setExpsigecof($caordcom->getExpsigecof());
          $caordcom_mod->setDesord($caordcom->getDesord());
          $caordcom_mod->setNotord($caordcom->getNotord());

        if ($caordcom_mod->getCompro()=='N') {
         $caordcom_mod->setMonord($caordcom->getMonord());
          $caordcom_mod->save();
        // campos
        $total_detalle_orden=$arreglo_campos[0];
        $total_descuento=$arreglo_campos[1];
        $total_recargo=$arreglo_campos[2];
        //arreglos de arreglos
        $grid_detalle_orden_objetos=$grid_detalle_orden_arreglos;
        //arreglos de objetos
        $grid_detalle_resumen_objetos=$arreglo_objetos[0];
        $grid_detalle_entrega_objetos=$arreglo_objetos[1];

        self::Grabar_detalles_orden_compra($caordcom,$grid_detalle_orden_objetos,$grid_detalle_recargo,$total_recargo,$referencia,$codconpag,$codforent);//grabo en el grid general de detalle de la orden
        self::Grabar_grid_resumen($caordcom,$grid_detalle_resumen_objetos);//grabo en el grid resumen
        self::Grabar_grid_entregas($caordcom,$grid_detalle_entrega_objetos);//grabo en el grid entrega
        self::grabarDistribucionRgo($caordcom,$grid_detalle_orden_arreglos);
        self::grabarRecargo($caordcom);
        }else  { $caordcom_mod->save(); }

      }
      return false;
    }
  }

  public static function Grabar_recargos($caordcom,$grid_detalle_recargo)
  {
    $monto_total_recargo=0;
    if ($caordcom->getOrdcom()!='')
    {
        Herramientas::EliminarRegistro("Cargosol", "Reqart", $caordcom->getOrdcom());
        $i=0;
        if (count($grid_detalle_recargo)>0)
        {
            while ($i<count($grid_detalle_recargo))
            {
              if ($grid_detalle_recargo[$i]['codrgo']!='')
              {
                $cargosol_new = new Cargosol();
                $cargosol_new->setReqart($caordcom->getOrdcom());
                $cargosol_new->setCodrgo(str_replace("'","",$grid_detalle_recargo[$i]['codrgo']));
                $cargosol_new->setMonrgo(str_replace("'","",$grid_detalle_recargo[$i]['recargototal']));
                $cargosol_new->setTipdoc($caordcom->getDoccom());
                $cargosol_new->save();
              }
              $i++;
            }
              return true;
         }
    }
    else
    {
       return false;
    }
  }


  public static function Grabar_grid_entregas($caordcom,$grid_entregas)
  {
      $x=$grid_entregas[0];
      $j=0;
      while ($j<count($x)) {
      if ($x[$j]->getCodart()!="")
      {
        $x[$j]->setOrdcom($caordcom->getOrdcom());
        $x[$j]->save();
      }
        $j++;
      }
      $z=$grid_entregas[1];
      $j=0;
      if (!empty($z[$j])) {
        while ($j<count($z)) {
          $z[$j]->delete();
          $j++;
        }

      }
  }

  public static function Grabar_grid_resumen($caordcom,$grid_resumen)
  {
      $x=$grid_resumen[0];
      $j=0;
      while ($j<count($x)) {
      if ($x[$j]->getCodart()!="")
      {
        $x[$j]->setOrdcom($caordcom->getOrdcom());
        $x[$j]->save();
      }
        $j++;
      }
      $z=$grid_resumen[1];
      $j=0;
      if (!empty($z[$j])) {
        while ($j<count($z)) {
          $z[$j]->delete();
          $j++;
        }

      }
    }


  public static function Grabar_detalles_orden_compra($caordcom,$grid_detalle,$grid_detalle_recargo,$total_recargo,$referencia,$codconpag,$codforent)
  {
    if ($referencia==0)
    {
        $campo_col5='canord';//tabla Caartord
        $campo_col6='canaju';//tabla Caartord
        $campo_col8='cantot';//tabla Caartord
        $campo_col9='preart';//tabla Caartord
        $campo_col10='dtoart';//tabla Caartord
        $campo_col11='rgoart';//tabla Caartord
        $campo_col12='totart';//tabla Caartord
        $campo_col13='unimed';//tabla Caartord
    }
    elseif ($referencia==1)
    {
        $campo_col5='canreq';//tabla Caartsol
        $campo_col6='canaju';//tabla Caartsol
        $campo_col8='canreq';//tabla Caartsol
        $campo_col9='costo';//tabla Caartsol
        $campo_col10='mondes';//tabla Caartsol
        $campo_col11='monrgo';//tabla Caartsol
        $campo_col12='montot';//tabla Caartsol
        $campo_col13='unimed';//tabla Caartsol
    }
    if (count($grid_detalle)>0)
    {
    	if ($caordcom->getId()){
    		Herramientas::EliminarRegistro("Caartord", "Ordcom", $caordcom->getOrdcom());
    	}
      $i=0;
      $a=0;
        while ($i<count($grid_detalle))
        {
          if (count($grid_detalle_recargo)>0)
            $codrgo=str_replace("'","",$grid_detalle_recargo[$a]['codrgo']);
          else
            $codrgo=0;

          $vacio='';
          $caartord_new = new Caartord();
          $caartord_new->setOrdcom($caordcom->getOrdcom());
          $caartord_new->setCodart(str_replace("'","",$grid_detalle[$i]['codart']));
          $caartord_new->setCodcat(str_replace("'","",$grid_detalle[$i]['codcat']));
          $caartord_new->setCanord(str_replace("'","",$grid_detalle[$i][$campo_col5]));
          $caartord_new->setCanaju(str_replace("'","",$grid_detalle[$i][$campo_col6]));
          $caartord_new->setCanrec(str_replace("'","",$grid_detalle[$i]['canrec']));
          $caartord_new->setCantot(str_replace("'","",$grid_detalle[$i][$campo_col8]));
          $caartord_new->setPreart(str_replace("'","",$grid_detalle[$i][$campo_col9]));
          $result=array();
          $sql = "select preart from caregart where codart='".str_replace("'","",$grid_detalle[$i]['codart'])."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            if (Herramientas::toFloat($result[0]['preart'])!=Herramientas::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col9])))
            {
                  $sql="Update Caregart set cosult='".str_replace("'","",$grid_detalle[$i][$campo_col9])."' where codart='".str_replace("'","",$grid_detalle[$i]['codart'])."'";
                  Herramientas::insertarRegistros($sql);
            }
          }
          $caartord_new->setDtoart(str_replace("'","",$grid_detalle[$i][$campo_col10]));
          $caartord_new->setRgoart(str_replace("'","",$grid_detalle[$i][$campo_col11]));
          $caartord_new->setCodrgo($codrgo);
          $caartord_new->setTotart(str_replace("'","",$grid_detalle[$i][$campo_col12]));
          $caartord_new->setDesart(Herramientas::getX_vacio('codart','caregart','desart',$grid_detalle[$i]['codart']));
          $caartord_new->setUnimed(str_replace("'","",$grid_detalle[$i][$campo_col13]));
          $caartord_new->setCodpar(Herramientas::getX_vacio('codart','CARegArt','codpar',$grid_detalle[$i]['codart']));
          $caartord_new->setPartida($vacio);
          $caartord_new->save();
          if ($caordcom->getRefprc()=='S')
          {
            $c= new Criteria();
                $c->add(CaartsolPeer::REQART,$caordcom->getRefsol());
                $c->add(CaartsolPeer::CODART,$grid_detalle[$i]['codart']);
                $c->add(CaartsolPeer::CODCAT,$grid_detalle[$i]['codcat']);
                $caartsol2 = CaartsolPeer::doSelectOne($c);
            if (count($caartsol2)>0)
            {
              $suma=$caartsol2->getCanord()+$grid_detalle[$i][$campo_col5];
              $caartsol2->setCanord($suma);
              $caartsol2->save();
            }
        }
        $i++;
    }
      if ($codconpag!='')
      {
          Herramientas::EliminarRegistro("Caordconpag", "Ordcom", $caordcom->getOrdcom());
          $caordconpag_new = new Caordconpag();
              $caordconpag_new->setOrdcom($caordcom->getOrdcom());
              $caordconpag_new->setCodconpag($codconpag);
              $caordconpag_new->save();

      }

      if ($codforent!='')
      {
          Herramientas::EliminarRegistro("Caordforent", "Ordcom", $caordcom->getOrdcom());
          $caordforent_new = new Caordforent();
              $caordforent_new->setOrdcom($caordcom->getOrdcom());
              $caordforent_new->setCodforent($codforent);
              $caordforent_new->save();
      }
      return true;
    }
    else
      return false;
  }

  public static function chequear_disponibilidad_incremento($caordcom,$grid_detalle,$f,$referencia,$tiporec,$tasacambio,$monedasol)
  {
    $mitotal=0;
    $i=0;
    $chequear_disponibilidad_incremento=false;
    if ($referencia==0) // para saber de que tabla me lo estoy trayendo
    {
      $campo11='rgoart';//tabla Caartord
      $campo10='dtoart';//tabla Caartord
    }
    else
    {
      $campo11='monrgo';//tabla Caartsol
      $campo10='mondes';//tabla Caartord
    }

        while ($i<count($grid_detalle))
        {
          if (self::obtener_codigo_presupuestario($caordcom,$grid_detalle,$f,&$obtenercodigopresupuestario))
            $codigo_fila_presupuestario = $obtenercodigopresupuestario;
          else
            $codigo_fila_presupuestario='';
          if (self::obtener_codigo_presupuestario($caordcom,$grid_detalle,$i,&$obtenercodigopresupuestario))
            $codigo_presupuestario = $obtenercodigopresupuestario;
          else
            $codigo_presupuestario ='';

          if ($codigo_fila_presupuestario == $codigo_presupuestario)// quede aquiiiiiii
          {
            if ($tiporec=='C')
              $mitotal=($grid_detalle[$i][$campo11]-$grid_detalle[$i][$campo10])-((($grid_detalle[$i][$campo11]-$grid_detalle[$i][$campo10])/$tasacambio)*$monedasol);
            else
              $mitotal=((($grid_detalle[$i][$campo11]-$grid_detalle[$i][$campo10])/$tasacambio)*$monedasol);
          }
          $i++;
        }
        if ($codigo_fila_presupuestario<>'')
        {
          $mondis=Herramientas::Monto_disponible($codigo_fila_presupuestario);
          if ($mitotal>$mondis)
            $chequear_disponibilidad_incremento=false;
          else
            $chequear_disponibilidad_incremento=true;
        }
        else
          $chequear_disponibilidad_incremento=false;
    return $chequear_disponibilidad_incremento;
    }


  public static function Obtener_codigo_presupuestario($caordcom,$grid,$i,&$obtenercodigopresupuestario)
  {
    $arreglo=$grid;
    $result=array();
    $sql= "Select codpar From caregart Where codart = '".$arreglo[$i]['codart']."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
        $partida = $result[0]['codpar'];
        $codigopresupuestario=str_replace("'","",$arreglo[$i]['codcat']).'-'.$partida;
        $sql1 = "Select * From CpDefTit Where Rtrim(CodPre) ='".$codigopresupuestario."'";
        if (Herramientas::BuscarDatos($sql1,&$result))
        {
             $obtenercodigopresupuestario = $codigopresupuestario;
             $encontrado=true;
        }
        else
        {
         $obtenercodigopresupuestario='';
         $encontrado=false;
        }
    }
    else
    {
      $obtenercodigopresupuestario='';
      $encontrado=false;
    }
    return $encontrado;
  }

  public static function Obtener_codigo_presupuestario_v2($codart,$codcat)
  {
    $obtenercodigopresupuestario = '';
    $result=array();
    $sql= "Select codpar From caregart Where codart = '".$codart."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
          $partida = $result[0]['codpar'];
        $codigopresupuestario=str_replace("'","",$codcat).'-'.$partida;
          $sql1 = "Select * From CpDefTit Where Rtrim(CodPre) ='".$codigopresupuestario."'";
        if (Herramientas::BuscarDatos($sql1,&$result))
        {
             $obtenercodigopresupuestario = $codigopresupuestario;
             $encontrado=true;
        }
        else
        {
         $obtenercodigopresupuestario='';
         $encontrado=false;
        }
     }
     else
     {
        $obtenercodigopresupuestario='';
        $encontrado=false;
     }
     return $obtenercodigopresupuestario;
  }

  public static function Obtener_formatocategoria(&$formatocategoria,&$tiporec,&$manejacompra,&$manejaservicio)
  {
    $manejaservicio=false;
    $manejacompra=false;
    $formatocategoria=Herramientas::getObtener_FormatoCategoria();
      $c= new Criteria();
      $cadefart2 = CadefartPeer::doSelectOne($c);
      if (count($cadefart2)>0)
      {
          $tiporec=$cadefart2->getAsiparrec();
          if ($cadefart2->getOrdcom()<>0)  $manejacompra=true;
          if ($cadefart2->getOrdser()<>0)  $manejaservicio=true;
      }
  }



  public static function definir_tasa_cambio($caordcom,$moneda,&$tasacambio,&$combo1_text,&$multiplicar_grid_por_tasacambio,&$monedasol,&$tip_fin)//Combo1_LostFocus()
  {
    $result=array();
    $multiplicar_grid_por_tasacambio=false;
    $combo1_text='';
    $tasacambio='';
    //Buscamos la Tasa de Cambio con que fue hecha la Solicitud de Egreso Y EL TIPO DE FINANCIAMIENTO
    $sql = "Select valmon,tipfin from CASolArt where ReqArt='".$caordcom->getRefsol()."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $monedasol = $result[0]['valmon'];
      $tip_fin = $result[0]['tipfin'];
    }
    $sql='';
    $result='';
    $result=array();
    $sql = "Select tipmon from casolart where reqart='".$caordcom->getRefsol()."'";
    if (Herramientas::BuscarDatos($sql,&$result))
        $combo1_text = $result[0]['tipmon'];
    if ($combo1_text<>$caordcom->getTipmon())
    {
        if ($monedasol<>$moneda)
        {
            if ($tasacambio<>'')
            {
              if ($tasacambio>$monedasol)
                 $multiplicar_grid_por_tasacambio=true;
              else
                 $tasacambio = $monedasol;
            }
            else
              $tasacambio = $monedasol;
        }
        else
         $tasacambio = $monedasol;
    }
    else
      $tasacambio = $monedasol;
    $sql='';
    $result='';
    return $multiplicar_grid_por_tasacambio;
  }



  public static function obtener_moneda($caordcom,&$moneda,&$posneg,&$codigomoneda)//Combo1_LostFocus()
  {
    $result=array();
    $sql = "Select valmon,aumdis,codmon from TSDesMon where codmon='".$caordcom->getTipmon()."' and FecMon=TO_DATE('".$caordcom->getFecord()."','DD/MM/YYYY')";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
        $moneda = $result[0]['valmon'];
        $posneg = $result[0]['aumdis'];
        $codigomoneda = $result[0]['codmon'];
    }
    else
    {
      $sql = "Select valmon,aumdis,codmon from TSDesMon where codmon='".$caordcom->getTipmon()."'ORDER BY FECMON DESC";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        $moneda = $result[0]['valmon'];
        $posneg = $result[0]['aumdis'];
        $codigomoneda = $result[0]['codmon'];
      }
      else
      {
        $moneda = 0;
        $posneg = "D";
        $codigomoneda = "";
      }
    }
    $sql='';
    $result='';
  }


//<!-----------------------------------Funciones de  Eliminar------------------------------------------------------------>
  public static function Eliminar($caordcom,&$coderror)
  {
    $coderror=-1;
    $refiereprecom = '';
    $seguir='';
    $afectacompro = '';
    $afectadis = '';
    $genctaord='';
    $numerocomprobante='';
    $result=array();
    $sql = "Select staord from caordcom Where ordcom='".$caordcom->getOrdcom()."' and staord='A'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
        $result=array();
        $sql = "Select refprc,afecom,afedis From CpDocCom Where TipCom='".$caordcom->getDoccom()."'";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
            $refiereprecom = $result[0]['refprc'];
            $afectacompro = $result[0]['afecom'];
            $afectadis = $result[0]['afedis'];
        }
        if (!self::Hay_ajuste($caordcom))
        {
          if (!self::Hay_ajuste_orden($caordcom))
          {
            if (!self::Hay_recepcion($caordcom))
            {
              if ($afectacompro=='S')
              {
                if (!self::Se_elimina_compromiso($caordcom))
                {
                    $coderror=171;
                    return false;
                }
              }
              if ($seguir!='N')
              {
                  $result=array();
                  $sql = "Select genctaord From opdefemp";
                  if (Herramientas::BuscarDatos($sql,&$result))
                  {
                      $genctaord = $result[0]['genctaord'];
                    if ($caordcom->getTipord()=='C')
                      $numerocomprobante='OC'.substr($caordcom->getOrdcom(), 2, 6);
                    elseif   ($caordcom->getTipord()=='S' || $caordcom->getTipord()=='T')
                      $numerocomprobante='OS'.substr($caordcom->getOrdcom(), 2, 6);
                    else
                      $numerocomprobante='OC'.substr($caordcom->getOrdcom(), 2, 6);

                    if (self::Verificar_status_comprobante($numerocomprobante))
                    {
                      Herramientas::EliminarRegistro("Contabc1", "Numcom", $numerocomprobante);
                      Herramientas::EliminarRegistro("Contabc", "Numcom", $numerocomprobante);
                    }
                  }


                  Herramientas::EliminarRegistro("Caresordcom", "Ordcom", $caordcom->getOrdcom());
                  Herramientas::EliminarRegistro("Caordconpag", "Ordcom", $caordcom->getOrdcom());
                  Herramientas::EliminarRegistro("Caordforent", "Ordcom", $caordcom->getOrdcom());

                  $c= new Criteria();
                  $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
                  $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
                  $cadisrgo_del = CadisrgoPeer::doSelect($c);
                  foreach ($cadisrgo_del as $arreglo)
                  {
                    $arreglo->delete();
                  }

                  Herramientas::EliminarRegistro("Caartfec", "Ordcom", $caordcom->getOrdcom());

                  if ($afectacompro='S')
                    self::Eliminar_compromiso($caordcom);
                  self::Eliminar_recargos($caordcom);
                  //Actualizamos la Solicitud de Egresos
                  $i=0;
                  if ($caordcom->getRefsol()!='')
                  {
                    $sql="SELECT codart,codcat,canord FROM Caartord WHERE ordcom='".$caordcom->getOrdcom()."'";
                    $result=array();
                    if (Herramientas::BuscarDatos($sql,&$result))
                    {
                      $i=0;
                      while ($i<count($result))
                      {
                        if (str_replace("'","",$result[$i]['codart'])!='')
                        {
                        $sql1="SELECT canord FROM Caartsol WHERE reqart='".$caordcom->getRefsol()."'";
                        $result1=array();
                        if (Herramientas::BuscarDatos($sql1,&$result1))
                        {
                            if (($result1[0]['canord']-$result[$i]['canord'])>0)
                              $sql2="Update Caartsol set canord=canord-".$result[$i][canord]." where reqart='".$caordcom->getRefsol()."' and codart='".$result[$i]['codart']."' and codcat='".$result[$i]['codcat']."'";
                            else
                              $sql2="Update Caartsol set canord=0 where reqart='".$caordcom->getRefsol()."' and codart='".$result[$i]['codart']."' and codcat='".$result[$i]['codcat']."'";
                            Herramientas::insertarRegistros($sql2);
                        }
                          }
                          $i++;
                        }
                      }
                  }
                  Herramientas::EliminarRegistro("Caartord", "Ordcom", $caordcom->getOrdcom());
                  Herramientas::EliminarRegistro("Caordcom", "Ordcom", $caordcom->getOrdcom());

              }
              }
              else
              {
                  $coderror=173;
                return false;
              }
            }
          else
          {
                  $coderror=172;
                return false;
          }
          }
          else
          {
                $coderror=172;
              return false;
          }
    }
    else
    {
      $coderror=170;
      return false;
    }
  }


  public static function Hay_recepcion($caordcom)
  {
     $j=0;
     $sql="SELECT canrec FROM Caartord WHERE ordcom='".$caordcom->getOrdcom()."'";

     $result=array();
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        while ($j<count($result))
        {
          if (str_replace("'","",$result[$j]['canrec'])>0)
          {
              return true;
              break;
          }
          $j++;
        }
      }
     return false;
  }


  public static function Verificar_status_comprobante($comprobante)
  {
    $sql="Select stacom From Contabc Where numcom = '".$comprobante."'";
    $result=array();
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      if ($result[0]['stacom']!='A')
         return true;
        else
         return false;
    }
    else
      return false;
  }


  public static function Hay_ajuste_orden($caordcom)
  {
    $sql="Select * From CaAjuOC Where Rtrim(OrdCom) = '".$caordcom->getOrdcom()."'";
    $result=array();
    if (Herramientas::BuscarDatos($sql,&$result))
      return true;
    else
      return false;
  }


  public static function Hay_ajuste($caordcom)
  {
    $sql="Select A.* From Cpajuste a, Cpdocaju b where a.tipaju=b.tipaju and a.refere = '".$caordcom->getOrdcom()."' and a.staaju='A' and b.refier='C'";
     $result=array();
     if (Herramientas::BuscarDatos($sql,&$result))
        return true;
     else
        return false;
  }



  public static function Eliminar_compromiso($caordcom)
  {
    $c= new Criteria();
        $c->add(CpcomproPeer::REFCOM,$caordcom->getOrdcom());
        $cpcompro_del = CpcomproPeer::doSelectOne($c);
          if (count($cpcompro_del)>0)
          {
            Herramientas::EliminarRegistro("Cpimpcom", "Refcom", $caordcom->getOrdcom());
          Herramientas::EliminarRegistro("Cpcompro", "Refcom", $caordcom->getOrdcom());
            return true;
          }
          return false;
  }

  public static function Se_elimina_compromiso($caordcom)
  {
    $c= new Criteria();
    $c->add(CpimpcauPeer::REFERE,$caordcom->getOrdcom());
    $cpimpcau = CpimpcauPeer::doSelect($c);
    if (count($cpimpcau)>0)
    {
      return false;
    }
    else
      return true;
   }


  public static function Eliminar_recargos($caordcom)
  {
    $c= new Criteria();
        $c->add(CargosolPeer::REQART,$caordcom->getOrdcom());
        $c->add(CargosolPeer::TIPDOC,$caordcom->getDoccom());
        //$cargosol_del = CargosolPeer::doDelete($c);
        $cargosol_del = CargosolPeer::doSelect($c);
        foreach ($cargosol_del as $arreglo)
        {
          $arreglo->delete();
        }

        $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
        $cadisrgo_del = CadisrgoPeer::doSelect($c);
        foreach ($cadisrgo_del as $arreglo)
        {
          $arreglo->delete();
        }
    if (Herramientas::getX_vacio('reqart','Cadisrgo','reqart',$caordcom->getOrdcom())=='')  return true;
    return false;
  }

  public static function Validar_fecha_egreso($fecord,$reqart)
  {
     $result=array();
    $sql="Select fecreq from Casolart where reqart='".$reqart."'";
     if (Herramientas::BuscarDatos($sql,&$result))
     {
        if ($result[0]['fecreq']<=$fecord)
          return true;
        else
          return false;
     }
     return false;
  }

  public static function grabarDistribucionRgo($caordcom,$grid_detalle_orden_arreglos)
  {

  $arreglo_grid=$grid_detalle_orden_arreglos;
      $t= new Criteria();
      $t->add(CpdoccomPeer::TIPCOM,$caordcom->getDoccom());
      $reg= CpdoccomPeer::doSelectOne($t);
      if ($reg)
      {
      	$refprc=$reg->getRefprc();
      	$afeprc=$reg->getAfeprc();
      	$afecom=$reg->getAfecom();
      	$afedis=$reg->getAfedis();
      }else {
      	$refprc="";
      	$afeprc="";
      	$afecom="";
      	$afedis="";
      }

  $j=0;
  while ($j<count($arreglo_grid))
  {
   $marcado=$arreglo_grid[$j]["check"];
   $unidad=$arreglo_grid[$j]["codcat"];
   if ($caordcom->getRefsol()!="" && $caordcom->getId()=="")
   $codpresu=$arreglo_grid[$j]["codigopre"];
   else $codpresu=$arreglo_grid[$j]["codpre"];
   if ($marcado=="1")
   {
    if ($caordcom->getRefsol()!="" && $caordcom->getId()=="")
    //si la orden de compra refiere a Solicitud de egreso, los recargos son iguales a los de la solicitud,
    //de lo contrario si es orden de compra directa los recargos son los que el usuario haya introducido
    {
    	
	    $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
	    $c= new Criteria();
	    $c->add(CadisrgoPeer::REQART,$caordcom->getRefsol());
	    $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
	    $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
	    $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
	    $recargos= CadisrgoPeer::doSelect($c);
         foreach ($recargos as $cadisrgo_ordcom)
         {
           $distribucion = new Cadisrgo();
        $distribucion->setReqart($caordcom->getOrdcom());
        $distribucion->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
        $distribucion->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
        $distribucion->setCodrgo($cadisrgo_ordcom->getCodrgo());
           $distribucion->setCodpre($cadisrgo_ordcom->getCodpre());
           $distribucion->setMonrgo($cadisrgo_ordcom->getMonrgo());
           $distribucion->setTipdoc($caordcom->getDoccom());
           $distribucion->save();
         }
    	

         if ($refprc=='N' && $afeprc=='S' && $afecom=='S' && $afedis=='R')
         {
         	 if ($arreglo_grid[$j]["datosrecargo"]!='')
		     {
		    $cadenarec=split('!',$arreglo_grid[$j]["datosrecargo"]);
	              $c= new Criteria();
		        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
		        $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
		        $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
		        //$c->add(CadisrgoPeer::CODRGO,$aux2[0]);
		        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
		        CadisrgoPeer::doDelete($c);
		        $r=0;
		        while ($r<(count($cadenarec)-1))
		        {
		          $aux=$cadenarec[$r];
		          $aux2=split('_',$aux);
		          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
		          {
		            $distribucion = new Cadisrgo();
		          $distribucion->setReqart($caordcom->getOrdcom());
		          $distribucion->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
		          $distribucion->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
		          $distribucion->setCodrgo($aux2[0]);

		          $c = new Criteria();
		          $tiporec = CadefartPeer::doSelectOne($c);
		          if ($tiporec)
		          {
		          if ($tiporec->getAsiparrec()!='C')
		          {
		            $c = new Criteria();
		            $c->add(CarecargPeer::CODRGO,$aux2[0]);
		            $presupuesto = CarecargPeer::doSelectOne($c);
		            if ($presupuesto)
		            {
		            if ($tiporec->getAsiparrec()=='P')
		            {
		            $distribucion->setCodpre($presupuesto->getCodpre());
		            }
		            else
		            {
		            $codigo= $unidad.'-'.$presupuesto->getCodpre();
		            $distribucion->setCodpre($codigo);
		            }
		            }
		          }
		          else
		          {
		            $distribucion->setCodpre($codpresu);
		          }
		          }
		          $montorecargo= Herramientas::toFloat($aux2[4]);
		          $distribucion->setMonrgo($montorecargo);
		          $distribucion->setTipdoc($caordcom->getDoccom());
		          $distribucion->save();
		          }
		          $r++;
		        }//while
		     }//if ($x[$j]->getDatosrecargo()!="")
         }
    }
    else//if ($caordcom->getRefsol()!="")
    {
     if ($arreglo_grid[$j]["datosrecargo"]!='')
     {
    $cadenarec=split('!',$arreglo_grid[$j]["datosrecargo"]);
        $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
        $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
        $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
        //$c->add(CadisrgoPeer::CODRGO,$aux2[0]);
        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
        CadisrgoPeer::doDelete($c);
        $r=0;
        while ($r<(count($cadenarec)-1))
        {
          $aux=$cadenarec[$r];
          $aux2=split('_',$aux);
          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
          {
            $distribucion = new Cadisrgo();
          $distribucion->setReqart($caordcom->getOrdcom());
          $distribucion->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
          $distribucion->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
          $distribucion->setCodrgo($aux2[0]);

          $c = new Criteria();
          $tiporec = CadefartPeer::doSelectOne($c);
          if ($tiporec)
          {
          if ($tiporec->getAsiparrec()!='C')
          {
            $c = new Criteria();
            $c->add(CarecargPeer::CODRGO,$aux2[0]);
            $presupuesto = CarecargPeer::doSelectOne($c);
            if ($presupuesto)
            {
            if ($tiporec->getAsiparrec()=='P')
            {
            $distribucion->setCodpre($presupuesto->getCodpre());
            }
            else
            {
            $codigo= $unidad.'-'.$presupuesto->getCodpre();
            $distribucion->setCodpre($codigo);
            }
            }
          }
          else
          {
            $distribucion->setCodpre($codpresu);
          }
          }
          $montorecargo= Herramientas::toFloat($aux2[4]);
          $distribucion->setMonrgo($montorecargo);
          $distribucion->setTipdoc($caordcom->getDoccom());
          $distribucion->save();
          }
          $r++;
        }//while
     }//if ($x[$j]->getDatosrecargo()!="")
    }//else//if ($caordcom->getRefsol()!="")
   }// if ($marcado=="1")
   $j++;
  }// while ($j<count($x))
  }

  public static function grabarRecargo($caordcom)
  {
   Herramientas::EliminarRegistro("Cargosol", "Reqart", $caordcom->getOrdcom());
   $ordcom=$caordcom->getOrdcom();
   $sql="select reqart,codrgo,sum(coalesce(monrgo,0)) as monrgo from cadisrgo where reqart='".$ordcom."'  group by reqart,codrgo";
   $result=array();
   if (Herramientas::BuscarDatos($sql,&$result))
    {
      $i=0;
      while ($i<count($result))
      {
        $cargosol= new Cargosol();
        $cargosol->setReqart($ordcom);
        $cargosol->setCodrgo($result[$i]['codrgo']);
        $cargosol->setMonrgo($result[$i]['monrgo']);
         $cargosol->setTipdoc($caordcom->getDoccom());
         $cargosol->save();
         $i++;
       }// while ($i<count($result))
    }
 }

  public static function armarArregloTotalesRecargo($caordcom,$grid_detalle_orden_arreglos,&$arrTotRec)
  {

  $arreglo_grid=$grid_detalle_orden_arreglos;

  $j=0;
  $arr_recargo=array();
  $indarr_rec=0;
  while ($j<count($arreglo_grid))
  {
   $marcado=$arreglo_grid[$j]["check"];
   $unidad=$arreglo_grid[$j]["codcat"];
   if ($caordcom->getRefsol()!="")
   $codpresu=$arreglo_grid[$j]["codigopre"];
   else $codpresu=$arreglo_grid[$j]["codpre"];
   if ($marcado=="1")
   {
    if ($caordcom->getRefsol()!="")
    //si la orden de compra refiere a Solicitud de egreso, los recargos son iguales a los de la solicitud,
    //de lo contrario si es orden de compra directa los recargos son los que el usuario haya introducido
    {
    $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
    $c= new Criteria();
    $c->add(CadisrgoPeer::REQART,$caordcom->getRefsol());
    $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
    $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
    $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
    $recargos= CadisrgoPeer::doSelect($c);
         foreach ($recargos as $cadisrgo_ordcom)
         {
          $arr_recargo[$indarr_rec]['codart']=str_replace("'","",$arreglo_grid[$j]["codart"]);
          $arr_recargo[$indarr_rec]['codcat']=str_replace("'","",$arreglo_grid[$j]["codcat"]);
          $arr_recargo[$indarr_rec]['codrgo']=$cadisrgo_ordcom->getCodrgo();
          $montorecargo= $cadisrgo_ordcom->getMonrgo();
          $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
          $indarr_rec++;
         }
    }
    else//if ($caordcom->getRefsol()!="")
    {
     if ($arreglo_grid[$j]["datosrecargo"]!='')
     {
    $cadenarec=split('!',$arreglo_grid[$j]["datosrecargo"]);
        $r=0;
        while ($r<(count($cadenarec)-1))
        {
          $aux=$cadenarec[$r];
          $aux2=split('_',$aux);
          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
          {
              $arr_recargo[$indarr_rec]['codart']=str_replace("'","",$arreglo_grid[$j]["codart"]);
          $arr_recargo[$indarr_rec]['codcat']=str_replace("'","",$arreglo_grid[$j]["codcat"]);
          $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
          $montorecargo= Herramientas::toFloat($aux2[4]);
          $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
           $arr_recargo[$indarr_rec]['codpar']=$aux2[5];
          $indarr_rec++;
          }
          $r++;
        }//while
     }//if ($x[$j]->getDatosrecargo()!="")
    }//else//if ($caordcom->getRefsol()!="")
   }// if ($marcado=="1")
   $j++;
  }// while ($j<count($x))

   //unir el arreglo: $arr_recargo, que corresponde al recargo por articulo(cadisrgo), en un nuevo arreglo con la distribucion total por
   //recargo: Cargosol
    $h = 0;
    $arrTotRec=array();
    $cont=-1;
    while ($h < count($arr_recargo))
     {
        $codrgo=$arr_recargo[$h]['codrgo'];
        if (SolicituddeEgresos::BuscarCodrgoenArreglo($arrTotRec,$codrgo,&$j))
        {
            $arrTotRec[$j]['monrgo']= $arrTotRec[$j]['monrgo'] + $arr_recargo[$h]['monrgo'];
        }
        else
        {
            $cont++;
            $arrTotRec[$cont]['codrgo'] = $arr_recargo[$h]['codrgo'];//codrgo
            $arrTotRec[$cont]['monrgo'] = $arr_recargo[$h]['monrgo'];//monrgo
        }
      $h++;
     }//WHILE
  }//END SUB


 public static function Cargartirarecargosgrid($numordcom="",$codart="",$coduni="")
 {

     $cadena="";
     $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
     $c = new Criteria();
     $c->add(CadisrgoPeer::REQART,$numordcom);
     $c->add(CadisrgoPeer::CODART,$codart);
     $c->add(CadisrgoPeer::CODCAT,$coduni);
     $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
     $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
     $result = CadisrgoPeer::doSelect($c);
     if ($result)
  {
        foreach ($result as $datos)
        {
           $cadena=$cadena . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $datos->getMonrgoc() .'_'. $datos->getTiprgo().'_' . $datos->getMonrgo() .'_'. $datos->getCodpar(). '!';
        }
     }
    return $cadena;
 }

 public static function generarComprobante($caordcom,$grid,$referencia,$total,&$msjuno,&$arrcompro)
 {
 	$codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";

    $numerocomprob= '########';
    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
      $tipord='corser';
    else
      $tipord='corcom';

    if (Herramientas::getVerCorrelativo($tipord,'cacorrel',&$r))
    {
      if ($caordcom->getOrdcom()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
            $numero='OS'.(substr($numero,2,strlen($numero)));
          else
            $numero='OC'.(substr($numero,2,strlen($numero)));
          $sql="select ordcom from caordcom where ordcom='".$numero."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
           }
        }//while (!$encontrado)
       $reftra=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      else
      {
        $reftra=str_replace('#','0',$caordcom->getOrdcom());
        $reftra=str_pad($reftra, 8, '0', STR_PAD_LEFT);
      }
    }

    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
      $reftra='OS'.substr($reftra, 2, 6);
    else
      $reftra='OC'.substr($reftra, 2, 6);

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
      	$codpre=$x[$j]["codcat"]."-".$x[$j]["codpar"];
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$codpre);
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if($regis->getCodcta()!='')
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
          	if ($referencia==0)
          	$mont=$x[$j]["totart"];
          	else $mont=$x[$j]["montot"];

            if ($mont>0)
            {
	            $codigocuenta=$regis2->getCodcta();
	            $tipo='D';
	            $des="";
	            $monto=$mont;
            }
          }else {
          	$msjuno='El Código Presupuestario no tiene asociado Codigo Contable válido'; return true;}
        }
         if ($j==0)
         {
           $codigocuentas=$codigocuenta;
           $desc=$des;
           $tipo1=$tipo;
           $monto1=$monto;
         }
         else
         {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }

        $j++;
      }

      $catpro=H::getX('rifpro','Caprovee','codcta',$caordcom->getRifpro());
      $codigocuenta2=$catpro;
      $tipo2='C';
      $des2="";
      $b=$total;
      $monto2=$b;

      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($caordcom->getFecord())));
      $clscommpro->setDestra($caordcom->getDesord());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

      return true;
 }

 public static function generarComprobanteOrden($caordcom,$total,&$msjuno,&$arrcompro)
 {
    $msjuno="";
    $numerocomprob= '########'; $codigocuenta=""; $codigocuenta2="";
    $tipo2=""; $tipo=""; $des2=""; $des=""; $monto2=""; $monto="";

    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
      $tipord='corser';
    else
      $tipord='corcom';

    if (Herramientas::getVerCorrelativo($tipord,'cacorrel',&$r))
    {
      if ($caordcom->getOrdcom()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
            $numero='OS'.(substr($numero,2,strlen($numero)));
          else
            $numero='OC'.(substr($numero,2,strlen($numero)));
          $sql="select ordcom from caordcom where ordcom='".$numero."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
           }
        }//while (!$encontrado)
       $reftra=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      else
      {
        $reftra=str_replace('#','0',$caordcom->getOrdcom());
        $reftra=str_pad($reftra, 8, '0', STR_PAD_LEFT);
      }
    }

    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
      $reftra='OS'.substr($reftra, 2, 6);
    else
      $reftra='OC'.substr($reftra, 2, 6);

   $afectaproyecto=false;
   $tipprovee=H::getX('rifpro','Caprovee','tipo',$caordcom->getRifpro());
   $c= new Criteria();
   $c->add(CatipproPeer::CODPRO,$caordcom->getTippro());
   $reg= CatipproPeer::doSelectOne($c);
   if ($reg)
   {
   	 if ($reg->getCtaord()!="" && $reg->getCtaper()!="")
   	 {
   	   $ctaproyord=$reg->getCtaord();
   	   $ctaproyper=$reg->getCtaper();
   	   $afectaproyecto=true;
   	 }
   	 else
     {
   	  $afectaproyecto=false;
     }
   }

   if ($afectaproyecto==true)
   {
   	  $b= new Criteria();
   	  $b->add(ContabbPeer::CODCTA,$ctaproyord);
   	  $registro= ContabbPeer::doSelectOne($b);
   	  if ($registro)
   	  {
        $codigocuenta=$registro->getCodcta();
        $tipo='D';
        $des="";
        $monto=$total;
   	  }else { $msjuno='El Proyecto "'.$caordcom->getTippro().'" no tiene una Cuenta de Orden válida asociada'; return true;}

   	  $d= new Criteria();
   	  $d->add(ContabbPeer::CODCTA,$ctaproyper);
   	  $registro= ContabbPeer::doSelectOne($d);
   	  if ($registro)
   	  {
        $codigocuenta2=$registro->getCodcta();
        $tipo2='C';
        $des2="";
        $monto2=$total;

   	  }else { $msjuno='El Proyecto "'.$caordcom->getTippro().'" no tiene una Cuenta de Percontra válida asociada'; return true;}
   }
   else
   {
     $b= new Criteria();
     $b->add(OpbenefiPeer::CEDRIF,$caordcom->getRifpro());
     $reg= OpbenefiPeer::doSelectOne($b);
     if ($reg)
     {
       if ($caordcom->getTipord()!="S") //Orden de Compra
       {
       	 if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodord()))
       	 	{
       	 	  $cuenta=$reg->getCodord();
       	 	}else $cuenta='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodordadi()))
       	 	{
       	 	  $cuenta=$reg->getCodordadi();
       	 	}else $cuenta='';
       	 }
       }
       else  //Orden de Servicio u otra
       {
         if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodordadi()))
       	 	{
       	 	  $cuenta=$reg->getCodordadi();
       	 	}else $cuenta='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodord()))
       	 	{
       	 	  $cuenta=$reg->getCodord();
       	 	}else $cuenta='';
       	 }
       }

      $b= new Criteria();
   	  $b->add(ContabbPeer::CODCTA,$cuenta);
   	  $registro= ContabbPeer::doSelectOne($b);
   	  if ($registro)
   	  {
        $codigocuenta=$registro->getCodcta();
        $tipo='D';
        $des="";
        $monto=$total;
   	  }else { $msjuno='El Beneficiario "'.$caordcom->getRifpro().'" no tiene una Cuenta de Orden válida asociada'; return true;}

      if ($caordcom->getTipord()!="S") //Orden de Compra
      {
       	 if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodpercon()))
       	 	{
       	 	  $cuenta2=$reg->getCodpercon();
       	 	}else $cuenta2='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodperconadi()))
       	 	{
       	 	  $cuenta2=$reg->getCodperconadi();
       	 	}else $cuenta2='';
       	 }
       }
       else  //Orden de Servicio u otra
       {
         if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodperconadi()))
       	 	{
       	 	  $cuenta2=$reg->getCodperconadi();
       	 	}else $cuenta2='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodpercon()))
       	 	{
       	 	  $cuenta2=$reg->getCodpercon();
       	 	}else $cuenta2='';
       	 }
       }

      $d= new Criteria();
   	  $d->add(ContabbPeer::CODCTA,$cuenta2);
   	  $registro= ContabbPeer::doSelectOne($d);
   	  if ($registro)
   	  {
        $codigocuenta2=$registro->getCodcta();
        $tipo2='C';
        $des2="";
        $monto2=$total;
   	  }else { $msjuno='El Beneficiario "'.$caordcom->getRifpro().'" no tiene una Cuenta Percontra válida asociada'; return true;}
     }
   }

    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($caordcom->getFecord())));
    $clscommpro->setDestra($caordcom->getDesord());
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;

    return true;
 }

   public static function totalImputacion($ordcom)
  {
  	$total=0;
  	$c= new Criteria();
  	$c->add(CpimpcomPeer::REFCOM,$ordcom);
  	$result= CpimpcomPeer::doSelect($c);
  	if ($result)
  	{
  	   foreach ($result as $obj)
  	   {
  	   	 $total= $total + $obj->getMonimp();
  	   }
  	}
  	return $total;
  }
  
  public static function verificarDispComprometer($caordcom,&$error1,&$cod1,&$error2,&$error3)
  {
    $hay_disponibilidad=false;
  	$error1=-1;
  	$error2=-1;	
        $error3=-1;
	$cod1="";
        $fec=split('-',$caordcom->getFecord());
        $feccom=$fec[2].'/'.$fec[1].'/'.$fec[0];
      if (!Herramientas::validarPeriodoPresuesto($feccom))
      {
        $error3=151;
        return false;
      }
  	if ($caordcom->AfectaDisponibilidad())
	{
		$l= new Criteria();
		$l->add(CaartordPeer::ORDCOM,$caordcom->getOrdcom());
		$objetos= CaartordPeer::doSelect($l);
		if ($objetos)
		{
			foreach ($objetos as $obj)
			{
				$hay_disponibilidad=true;
				self::chequear_disponibilidad_presupuesto2($caordcom, $obj->getCodpre(), $obj->getDtoart(), $obj->getCodcat(), $obj->getCodpar(), &$sobregiro, &$codigo_presupuestario_sin_disponibilidad);
				if ($sobregiro)
	            { $hay_disponibilidad=false; }
	
	            if(!$hay_disponibilidad)
	            {
	              $cod1=$codigo_presupuestario_sin_disponibilidad;
	              $error1=118;
	              return false;
	            }
			}
			self::armarArregloTotalesRecargo2($caordcom,&$grid_recargos_detalle);
			if ($hay_disponibilidad)
			{
			$i=0;
            $grid_total_unidad=array();
            if (count($grid_recargos_detalle)>0)
            {
              while ($i<count($grid_recargos_detalle))
              {
                if ($grid_recargos_detalle[$i]['monrgo'] >0)
                {
                $hay_disponiblididad_recargos=self::chequear_disponibilidad_recargo2($grid_recargos_detalle[$i]['codrgo'],$grid_recargos_detalle[$i]['monrgo'],$objetos,$grid_recargos_detalle,&$sobregiro_recargo,$grid_total_unidad);
                if (!$hay_disponiblididad_recargos)
                {
                    $error2=119;
                    return false;
                }
              }
              $i++;
              }
            }				
			}
		}
	}

  }
  
  
  public static function chequear_disponibilidad_presupuesto2($caordcom,$codpre,$dtco,$categoria,$partida,&$sobregiro,&$codigo_presupuestario_sin_disponibilidad)
  {
   
    $mitotal = 0;
    $codigo_presupuestario='';
    $chequear_disponibilidad=false;
    $sobregiro=true;
    $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
	$l= new Criteria();
	$l->add(CaartordPeer::ORDCOM,$caordcom->getOrdcom());
	$objetos= CaartordPeer::doSelect($l);
	if ($objetos)
	{
		foreach ($objetos as $obj)
		{
			if ($codpre==$obj->getCodpre())
			{
				if ($tiporec=='C')
                  $elmonto=$obj->getTotart();
                else
                  $elmonto=($obj->getTotart()-$obj->getRgoart());
				
              $mitotal=$mitotal+$elmonto;
			}
		}
		
		if ($caordcom->getId()!='')
           $mitotal = $mitotal - $dtco;
		if ($codpre!="")
		{
		   $codigo_presupuestario =  $categoria."-".$partida;
           $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
           if ($mitotal<=$mondis)
           {
               $chequear_disponibilidad=true;
               $sobregiro=false;
           }
		}
		
	}
    $codigo_presupuestario_sin_disponibilidad=$codigo_presupuestario;
    return $chequear_disponibilidad;
  }
  
  public static function armarArregloTotalesRecargo2($caordcom,&$arrTotRec)
  {
    $arr_recargo=array();
    $indarr_rec=0;
    $l= new Criteria();
	$l->add(CaartordPeer::ORDCOM,$caordcom->getOrdcom());
	$objetos= CaartordPeer::doSelect($l);
	if ($objetos)
	{
		foreach ($objetos as $obj)
		{
		   $marcado=$obj->getCheck();
		   $unidad=$obj->getCodcat();
		   $codpresu=$obj->getCodpre();
		   if ($marcado=="1")
		   {
		     if ($obj->getDatosrecargo()!='')
		     {
  		        $cadenarec=split('!',$obj->getDatosrecargo());
		        $r=0;
		        while ($r<(count($cadenarec)-1))
		        {
		          $aux=$cadenarec[$r];
		          $aux2=split('_',$aux);
		          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
		          {
		              $arr_recargo[$indarr_rec]['codart']=$obj->getCodart();
			          $arr_recargo[$indarr_rec]['codcat']=$obj->getCodcat();
			          $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
			          $montorecargo= Herramientas::toFloat($aux2[4]);
			          $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
			           $arr_recargo[$indarr_rec]['codpar']=$aux2[5];
			          $indarr_rec++;
		          }
		          $r++;
		        }
		     }
		   }
		}
	}

    $h = 0;
    $arrTotRec=array();
    $cont=-1;
    while ($h < count($arr_recargo))
     {
        $codrgo=$arr_recargo[$h]['codrgo'];
        if (SolicituddeEgresos::BuscarCodrgoenArreglo($arrTotRec,$codrgo,&$j))
        {
            $arrTotRec[$j]['monrgo']= $arrTotRec[$j]['monrgo'] + $arr_recargo[$h]['monrgo'];
        }
        else
        {
            $cont++;
            $arrTotRec[$cont]['codrgo'] = $arr_recargo[$h]['codrgo'];//codrgo
            $arrTotRec[$cont]['monrgo'] = $arr_recargo[$h]['monrgo'];//monrgo
        }
      $h++;
     }
  }
  
  public static function chequear_disponibilidad_recargo2($codigo,$elmonto,$objetos,$grid_detalle_recargo,&$sobregiro_recargo,$grid_total_unidad)
  {
      $codigo=str_replace("'","",$codigo);
      $chequear_disponibilidad_recargo = false;
      $sobregiro_recargo = true;
      $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
      if ($codigo=='')
        $mitotal=0;
      else
        $mitotal=$elmonto;
      $result=array();
      $sql = "Select codpre from CaRecArg where CodRgo = '".$codigo."'";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
          if (trim($tiporec)=='P')
          {
            $mitotal=$elmonto;
            $codigo_presupuestario = str_replace("'","",$result[0]['codpre']);
            $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
            if ($mitotal <= $mondis)
            {
                $chequear_disponibilidad_recargo = true;
                $sobregiro_recargo = false;
            }
          }
        elseif (trim($tiporec)=='R')
        {
            $grid_total_unidad=self::acumular_unidad2($elmonto,$objetos,$grid_total_unidad);
            $j=0;
            while ($j<count($grid_total_unidad))
            {
                $codigo_presupuestario = $grid_total_unidad[$j][0].'-'.$result[0]['codpre'];
                $mitotal=$grid_total_unidad[$j][1];
                $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
                if ($mitotal <= $mondis)
                {
                    $chequear_disponibilidad_recargo = true;
                    $sobregiro_recargo = false;
                }
                $j++;
            }
          }
       }

      return $chequear_disponibilidad_recargo;
  }  
  
  public static function acumular_unidad2($elmonto,$objetos,$grid_total_unidad)
  {
    $acum=0;
	foreach ($objetos as $obj)
	{
		if ($obj->getCheck()=='1' && $obj->getPreart()>0)
		  $acum= $acum + ($obj->getCanord() * $obj->getPreart());
	}

	foreach ($objetos as $obj)
	{
		if ($obj->getCheck()=='1')
		{
			$totart=$obj->getCanord() * $obj->getPreart();
			$j=0;
	        if (count($grid_total_unidad)>0)
	        {
	            while ($j<count($grid_total_unidad))
	            {
	                $encontrado=false;
	                if ($obj->getCodcat()==$grid_total_unidad[$j][0])
	                {
	                  $encontrado=true;
	                  $fila=$j;
	                  break;
	                }
	                $j++;
	            }
	            if ($encontrado)
	            {
	              self::monto_recargo($acum,$elmonto,$totart,&$monto_recargo);
	              $grid_total_unidad[$fila][1]=$grid_total_unidad[$fila][1]+$monto_recargo;
	            }
	            else
	            {
	              $var=count($grid_total_unidad);
	              $grid_total_unidad[$var][0]=$obj->getCodcat();
	              self::monto_recargo($acum,$elmonto,$totart,&$monto_recargo);
	              $grid_total_unidad[$var][1]=$monto_recargo;
	            }
	        }
	        else
	        {
	          $grid_total_unidad[$j][0]=$obj->getCodcat();
	          self::monto_recargo($acum,$elmonto,$totart,&$monto_recargo);
	          $grid_total_unidad[$j][1]=$monto_recargo;
	        }
		}
	}

     return $grid_total_unidad;
  }  


}// fin



  /**************************************************************************
   **                     Formulario Amlordcom                             **
   **                       Jaime Suárez                                   **
   **************************************************************************/