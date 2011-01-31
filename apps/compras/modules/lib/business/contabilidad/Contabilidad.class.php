<?php

/**
 * Contabilidad: Clase estática para el manejo de los procesos contables
 *
 * @package    Roraima
 * @subpackage contabilidad
 * @author     $Author: aperez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contabilidad.class.php 33668 2009-10-01 16:47:21Z aperez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contabilidad
{

  public static function Distribuir($fecini, $feccie){
	$fectem = $fecini;
	$fecha1 = explode("/",$fecini);
	$fecha2 = explode("/",$feccie);
	$mes = $fecha1[1];
	if ($fecha1[0]!=1){
   		$numper = $fecha2[1] - $fecha1[1];
    	for($i=0;$i<$numper;$i++){
	  	  $reg[$i] = new Contaba1();
	      $reg[$i]->setPereje(str_pad((string)($i+1),2,"0",STR_PAD_LEFT));
	      $reg[$i]->setFecdes($fectem);
	      $reg[$i]->setFechas(H::AddDaysDateVE($fectem,30));
	  	  $fectem= H::AddDaysDateVE($fectem,31);
  		}
	}
	else{
   	    $numper = ($fecha2[1] - $fecha1[1])+1;
		for($i=00;$i<$numper;$i++){
	  	  $reg[$i] = new Contaba1();
	      $reg[$i]->setPereje(str_pad((string)($i+1),2,"0",STR_PAD_LEFT));
	      $reg[$i]->setFecdes($fectem);
	      $fecaux= explode("/",$fectem);
		  $sql= "select to_char(last_day(to_date('$fectem','dd/mm/yyyy')),'dd/mm/yyyy') as last_day;";
		  H::BuscarDatos($sql,$fecini1);
		  $fectem=$fecini1[0]['last_day'];
	      $reg[$i]->setFechas($fectem);
		  $fectem= H::AddDaysDateVE($fectem,1);
		}
	}
    return $reg;
  }

  public static function salvarConfinins($contaba){
	$numrup=split("-",$contaba->getForcta());
	$contaba->setCodemp('001');
    $contaba->setLoncta(strlen(trim($contaba->getForcta())));
    $contaba->setNumrup(count($numrup));
    $contaba->setEtadef('A');

    $contaba->save();

	$c = new Criteria();
	$reg= Contaba1Peer::doSelect($c);
    foreach ($reg as $r){
    	$r->delete();
    }

    $contaba1 = Contabilidad::Distribuir($contaba->getFecini2(),$contaba->getFeccie2());
    foreach($contaba1 as $conta1){
      $conta1->setFecini($contaba->getFecini2());
      $conta1->setFeccie($contaba->getFeccie2());
      $conta1->setStatus('A');

      $conta1->save();
    }

    return -1;
  }

  public static function salvarConfintipcuecon($contaba){
    $contaba->save();
    return -1;
  }

	/********************************************************************/

	public static function validarDefiniciones() {
		$contaba = ContabaPeer::doSelectOne(new Criteria());

		if ($contaba) {
			if ($contaba->getEtadef()=='C')
				return 619;
			else return -1;
		} else  return 610;
	}

  	public static function validarConfincue($contabb) {
  		$codigopadre = H::obtenerCodigoPadre('codcta','contabb',$contabb->getCodcta());
  		$cargab = H::getX('codcta','contabb','cargab',$codigopadre);
  		if ($cargab=='C'){
  			return 625;
  		}
		if ($contabb->getCargab()=='C') {
			$p=H::buscarCodigoHijo('codcta','contabb',$contabb->getCodcta());
			if ($p) return 600;
		}
		return -1;
	}

	public static function salvarConfincue($contabb, $grid) {
		//if (!$contabb->getId()){
			self::salvarCuenta($contabb, $grid);
			self::salvarPeriodos($contabb, $grid);
			self::actualizarCuenta($contabb, $grid);
		/*} else {
			$c = new Criteria();
			$c->add(ContabbPeer::CODCTA,$contabb->getCodcta());
			$reg = ContabbPeer::doSelectOne($c);

			if ($reg){
				$reg->setDescta($contabb->getDescta());
				$reg->save();
			}
		}*/
		return -1;
	}

	public static function salvarCuenta($contabb, $grid) {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		$contabb1 = $grid[0];

		if ($contabb->getId()) {
			$c = new Criteria();
    		$c->add(ContabbPeer::CODCTA,ContabbPeer::CODCTA." LIKE '".$contabb->getCodcta()."%'",Criteria::CUSTOM);
    		$contabbs = ContabbPeer::doSelect($c);

    		foreach($contabbs as $contabb_){
      			$contabb_->setDebcre($contabb->getDebcre());
      			$contabb_->save();
    		}
		}
		$contabb->setSalant($contabb1[0]->getSalact());
		$contabb->setSalprgper($contabb1[0]->getSalprger());
		$contabb->setSalacuper(0);
		$contabb->setFecini($contaba->getFecini());
		$contabb->setFeccie($contaba->getFeccie());
		$contabb->save();

		return -1;
	}

	public static function salvarPeriodos($contabb, $grid) {
		$datos = $grid[0];
		$salant = $datos[0]->getSalact();
		foreach ($datos as $key=> $contabb1) {
			if ($key!=0) {
				$contabb1->setCodcta($contabb->getCodcta());
				$contabb1->setSalact($salant+$contabb1->getSalper());
				$contabb1->setFecini($contabb->getFecini());
				$contabb1->setFeccie($contabb->getFeccie());
				$contabb1->save();
			}
		}
		return -1;
	}

	public static function actualizarCuenta($contabb, $grid) {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		$contabb1 = $grid[0];

		if ($contaba->getEtadef()!='C') {
			$arr=split('-',$contabb->getCodcta());

			if ($arr[0]!=0) {
				$cuentaini = $arr[0];
				$cuentafin = $contabb->getCodcta();

				$c = new Criteria();
				$c->add(ContabbPeer::CODCTA,$cuentaini,Criteria::GREATER_EQUAL);
				$c->add(ContabbPeer::CODCTA,$cuentafin,Criteria::LESS_THAN);
				$c->add(ContabbPeer::CODCTA," position(".ContabbPeer::CODCTA." IN ".$cuentafin.")<>0",Criteria::CUSTOM);
				$c->add(ContabbPeer::FECINI,$contaba->getFecini());
				$c->add(ContabbPeer::FECCIE,$contaba->getFeccie());
				$contabbs = ContabbPeer::doSelect($c);
				if ($contabbs) {
					$salant = $contabb1[0]->getSalact();
					foreach ($contabbs as $contabb_) {
						$saldoAnterior = $contabb->getSalant();
						$salant = $contabb_->getSalant() - $saldoAnterior + $salant;
						$contabb_->setSalant($salant);
						//$contabb_->setCargab($contabb->getCargab());
						$contabb_->save();

						$c=new Criteria();
						$c->add(Contabb1Peer::CODCTA,$contabb->getCodcta());
						$c->add(Contabb1Peer::FECINI,$contaba->getFecini());
						$c->add(Contabb1Peer::FECCIE,$contaba->getFeccie());
						$contabb1s =$contabb->getContabb1s($c);

						foreach($contabb1s as $contabb1_) {
							$contabb1_->setSalact($salant+$contabb1_->getTotDeb()-$contabb1_->getTotCre());
							$contabb1_->save();
						}
					}
				}
			}
		}
		return -1;
	}

	public static function verificarEliminar($contabb) {
		$c = new Criteria();
		$c->add(Contabc1Peer::CODCTA,$contabb->getCodcta());
		$reg = Contabc1Peer::doSelectOne($c);
		if ($reg) {
			return 611;
		} else {
			$c = new Criteria();
			$c->add(CaproveePeer::CODCTA,$contabb->getCodcta());
			$reg = CaproveePeer::doSelectOne($c);
			if ($reg) {
				return 612;
			} else {
				$c = new Criteria();
				$c->add(CpdeftitPeer::CODCTA,$contabb->getCodcta());
				$reg = CpdeftitPeer::doSelectOne($c);
				if ($reg) {
					return 613;
				}
			}
		}
		return -1;
	}

	public static function eliminarConfincue($contabb, $grid) {
		$codE=self::verificarEliminar($contabb);
		if ($codE==-1) {
			$c = new Criteria();
			$c->add(Contabb1Peer::CODCTA,$contabb->getCodcta());
			$c->add(Contabb1Peer::FECINI,$contabb->getFecini());
			$c->add(Contabb1Peer::FECCIE,$contabb->getFeccie());
			$regs = Contabb1Peer::doSelect($c);
			foreach($regs as $reg){
				$reg->delete();
			}
			$contabb->delete();

			self::actualizarCuenta($contabb, $grid);
			return -1;
		}else return $codE;
	}

	/********************************************************************/


	public static function trasladarSaldos($contaba) {

	   $CodOrigen="SIMA".$contaba->getEsqori();
  	   $CodDestino="SIMA".$contaba->getEsqdes();

  	   $reg= ContabaPeer::doSelectOne(new Criteria());
  	   if ($reg){
  	   		$CodIngreso = $reg-> getCodind();
  	    	$CodEgreso = $reg-> getCodegd();
  	   }else{
     	$CodIngreso = '5';
     	$CodEgreso  = '6';
    	}

    	/*
    	 *
    	 *          CODIGO VIEJO QUE SIGUE
    	 *
    	 *
    	 *  ¡¡   QUE HAY Q REPRESENTARLO AQUI:  !!!  !!


       $sql = "update ".chr(34)."$CodDestino".chr(34).".contabb
       set SalAnt=(Select SalAct from ".chr(34)."$CodOrigen".chr(34).".contabb1
     		 where
     		 ".chr(34)."$CodOrigen".chr(34).".contabb1.codcta=".chr(34)."$CodDestino".chr(34).".contabb.codcta and
     		 ".chr(34)."$CodOrigen".chr(34).".contabb1.PerEje='12')";

	   $bd->actualizar($sql);

	   $sql = "update ".chr(34)."$CodDestino".chr(34).".contabb set salant=0,salprgper=0,salacuper=0 where ".chr(34)."$CodDestino".chr(34).".contabb.codcta like '$CodIngreso%' " ;
       $bd->actualizar($sql);

	   $sql = "update ".chr(34)."$CodDestino".chr(34).".contabb set salant=0,salprgper=0,salacuper=0 where ".chr(34)."$CodDestino".chr(34).".contabb.codcta like '$CodEgreso%' " ;
	   $bd->actualizar($sql);
*/

	return 0;
	}

	public static function generarComprobantes($clase,&$arrcompro) {

		$fecini=$clase->getFecini();
		$feccie=$clase->getFeccie();

		$errA = self::Verificar_Diferidos($fecini,$feccie);
		$errB = self::Cargar_Cuentas($clase,&$datos);
		$err1=$err2=$err3=618;

		if (($errA==-1) and ($errB==-1)){
			 if((self::Verificar_Comprobante('CIERREEG'))==-1){
			 	$err1 = self::Generar_Comprobante_CierreEgr('CIERREEG', $datos, &$arrcompro);
			 	}
			 if((self::Verificar_Comprobante('CIERREIN'))==-1){
			 	$err2 = self::Generar_Comprobante_CierreIng('CIERREIN', $datos, &$arrcompro);
			 	}
			 if((self::Verificar_Comprobante('CIERRERE'))==-1){
			 	$err3 = self::Generar_Comprobante_CierreRes('CIERRERE', $datos, &$arrcompro);
			 }
			 if(($err1==-1)and($err2==-1)and($err3==-1)){
       			return -1;
       		 }else{ return 618;}
       			//irPagina('contabilidad','ConFinComGen.php?comprobante=1&fecini='.$fecini.'&feccie='.$fecha.'');
       	}else {
          if($errA!=-1) return $errA; else return $errB;
       	}

	}

	public static function Verificar_Diferidos($fecini,$feccie){
           $c = new Criteria();
           $c->add(ContabcPeer::FECCOM,$fecini,Criteria::GREATER_EQUAL);
           $c->add(ContabcPeer::FECCOM,$feccie,Criteria::LESS_EQUAL);
           $c->add(ContabcPeer::STACOM,'D');
           $reg = ContabcPeer::doSelect($c);
           if ($reg){
           	return 605;
           }
           $c = new Criteria();
           $c->add(Contaba1Peer::STATUS,'A');
           $reg = Contaba1Peer::doSelect($c);
           if($reg){
           	return 606;
           }
           return -1;
	}

	public static function Cargar_Cuentas($contaba,&$datos){

		if ($contaba->getId()!=""){
			$datos= array();
			$datos["fecini"] = $contaba->getFecini();
			$datos["feccie"] = $contaba->getFeccie();
			$datos["activos"] = $contaba->getCodtesact();
			$datos["pasivos"] = $contaba->getCodtespas();
			$datos["ingresos"] = $contaba->getCodind();
			$datos["egresos"] = $contaba->getCodegd();
			$datos["capital"] = $contaba->getCodcta();
			$datos["resultado"] = $contaba->getCodres();
			$datos["resultado_anterior"] = $contaba->getCodresant();

		    $c = new Criteria();
		    $c->add(ContabbPeer::CODCTA,$datos["resultado"]);
		    $reg = ContabcPeer::doSelectOne($c);
		    if($reg){
			 	$datos["descta"]= $reg->getDescta();
			}
			$sql="select MAX(PEREJE) as pereje from Contaba1";
	   	 	if (Herramientas::BuscarDatos($sql,&$numper)){
	   	 		$datos["ultimoperiodo"]=$numper[0]["pereje"];
	   	 	}
	   	 	if ( $datos["activos"]=="" ||
	   	 		 $datos["pasivos"] =="" ||
				 $datos["ingresos"] =="" ||
				 $datos["egresos"] == "" ||
				 $datos["capital"] =="" ||
			 	 $datos["resultado"] ==""||
				 $datos["resultado_anterior"] ==""){
				 return 608;

			}else{ return -1; }
		}else{
			return 0;
		}
	}

	public static function Verificar_Comprobante($numero){

	 $c = new Criteria();
     $c->add(ContabcPeer::NUMCOM,$numero);
     $reg = ContabcPeer::doSelect($c);
	 if($reg){
	 	return 609;
	 }else {
	 	return -1;
	  }
	}

	public static function Generar_Comprobante_CierreRes($numero, $datos,&$arrcompro){
	  $cuentas = "";
      $descr   = "";
      $tipos   = "";
      $montos  = "";
      if (self::Verificar_Comprobante($numero)){
      	 $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".$datos["egresos"]."%' and
		          	 A.PEREJE='".$datos["ultimoperiodo"]."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";
		  if(H::BuscarDatos($sql,&$regs)){
		 	$check='1';
            $cont=0;
            $i=0;
            $i=$i+1;
	        $cont=$i;

	         $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".$datos["ingresos"]."%' AND
	                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";


	         if(H::BuscarDatos($sql,&$reg2)){
	         	$toting = abs($reg2[0]["total"]);
	         }

			 $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".$datos["egresos"]."%' AND
	                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";
	         if(H::BuscarDatos($sql,&$reg3)){
	         	$totegr = abs($reg3[0]["total"]);
	         }


	           $c = new Criteria();
			   $reg= ContabaPeer::doSelectOne($c);
	           if($reg){
	           	$resultado= $reg->getCodres();
			  	$resultado_anterior= $reg->getCodresant();
	           }
	            $sql="select descta from contabb where codcta='$resultado'";
	             $c = new Criteria();
				 $c->add(ContabbPeer::CODCTA,$resultado);
		         $reg2 = ContabbPeer::doSelectOne($c);
		         if($reg2){
		         	$descta=$reg2->getDescta();
		         	$descr   = $descta;
		         }
			  	$monres = $toting - $totegr;
				$montos  = $monres.'_'.$resultado.'_'.$resultado_anterior;


		  }
		/*$mensaje="";
	    $numeroorden="";
	    $r='';
	    $numorden=$numero;*/
	    $numerocomprob=Comprobante::Buscar_Correlativo();
	    $clscommpro=new Comprobante();
	    $clscommpro->setGrabar("S");
	    $clscommpro->setNumcom($numerocomprob);  //Correlativo
	    $clscommpro->setReftra("CIERRERE");
	    $clscommpro->setFectra(date("d/m/Y"));
	    $clscommpro->setDesc($descr);
	    $clscommpro->setMontos($montos);
	    $arrcompro[]=$clscommpro;
	    return -1;
      }
	}

	public static function Generar_Comprobante_CierreIng($numero, $datos,&$arrcompro){
	  $cuentas = "";
      $descr   = "";
      $tipos   = "";
      $montos  = "";

	  if (self::Verificar_Comprobante($numero)){
		  $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".$datos["ingresos"]."%' and
		          	 A.PEREJE='".$datos["ultimoperiodo"]."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";

		 if(H::BuscarDatos($sql,&$regs)){
		 	$check='1';
            $cont=0;
            $i=0;
            $i=$i+1;
	        $cont=$i;

		    foreach($regs as $reg){
			     $c = new Criteria();
				 $opc1 = $c->getNewCriterion(ContabbPeer::CODCTA,$reg["codcta"]);
			 	 $opc2 = $c->getNewCriterion(ContabbPeer::CODCTA,ContabbPeer::CODCTA." LIKE '".$datos["ingresos"]."%'",Criteria::CUSTOM);
				 $opc1->addAnd($opc2);
 				 $c->add($opc1);

		         $reg2 = ContabbPeer::doSelectOne($c);
			     if ($reg2){
			     	$codigocuenta = $reg["codcta"];
			     	$descta       = $reg["descta"];
			     	$tipo         = $reg2->getDebcre();
	            	if ($tipo=='D'){
	            		    $tipo ='C';
							$monto=$reg["salact"];
					}
		            else{
	            		    $tipo ='D';
							$monto=$reg["salact"] * (-1);
	            	}
	            	if ($cuentas==""){
	            		$cuentas = $codigocuenta;
		         	    $descr   = $descta;
						$tipos   = $tipo;
				 		$montos  = $monto;

	            	}else{
	            		$cuentas = $cuentas.'_'.$codigocuenta;
			         	$descr   = $descr.'_'.$descta;
						$tipos   = $tipos.'_'.$tipo;
					 	$montos  = $montos.'_'.$monto;
	            	}
			     }
			}

			 $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".$datos["ingresos"]."%' AND
	                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";

	         if(H::BuscarDatos($sql,&$regs)){
	         	$toting = abs($regs[0]["total"]);

	         	//$montos  = $montos.'_'.$toting;
	         }
	         if ($cuentas==""){
	         	 $cuentas = $datos["resultado"];
			     $descr   = $datos["descta"];
			     if ($toting>=0){
			     	 $t ='C';
					 $montos  = $toting;
			     }else{
			     	$t ='D';
			     	$montos  = $toting;
			     }
			     $tipos   = $t;
	         }else{
	         	 $cuentas = $cuentas.'_'.$datos["resultado"];
			     $descr   = $descr.'_'.$datos["descta"];
			     if ($toting>=0){
			     	 $t ='C';
					 $montos  = $montos.'_'.$toting;
			     }else{
			     	$t ='D';
			     	$montos  = $montos.'_'.$toting;
			     }
			     $tipos   = $tipos.'_'.$t;
	         }
		 }
		/*$mensaje="";
	    $numeroorden="";
	    $r='';
	    $numorden=$numero;*/
	    $numerocomprob=Comprobante::Buscar_Correlativo();

	    $clscommpro=new Comprobante();
	    $clscommpro->setGrabar("S");
	    $clscommpro->setNumcom($numerocomprob);  //Correlativo
	    $clscommpro->setReftra("CIERREIN");
	    $clscommpro->setFectra(date("d/m/Y"));
	    $clscommpro->setCtas($cuentas);
	    $clscommpro->setDesc($descr);
	    $clscommpro->setMov($tipos);
	    $clscommpro->setMontos($montos);
	    $arrcompro[]=$clscommpro;
	    return -1;
	  }
	}

	public static function Generar_Comprobante_CierreEgr($numero, $datos, &$arrcompro){
		  $cuentas = "";
	      $descr   = "";
	      $tipos   = "";
	      $montos  = "";

		 if (self::Verificar_Comprobante($numero)){
	         $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
			          FROM
				          CONTABB1 A,CONTABB B
			          WHERE
				         A.CODCTA=B.CODCTA AND
			          	 A.CODCTA LIKE '".$datos["egresos"]."%' and
			          	 A.PEREJE='".$datos["ultimoperiodo"]."' AND
			          	 A.SALACT<>0 AND
			          	 B.CARGAB='C'
			          ORDER BY
			          	B.CODCTA";
			 if(H::BuscarDatos($sql,&$regs)){
			 	   	$check='1';
		            $cont=0;
		            $i=0;
		            $i=$i+1;
		            $cont=$i;

		            $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
			                	WHERE A.CODCTA=B.CODCTA AND
			                	A.CODCTA LIKE '".$datos["egresos"]."%' AND
			                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";
			        if(H::BuscarDatos($sql,&$regs2)){
			        	$totegr = abs($regs2[0]["total"]);
		        	}
		        	if ($cuentas==""){
		        		 $cuentas = $datos["resultado"];
					     $descr   = $datos["descta"];
					     $tipos   = 'D';
					     $montos  = $totegr;
		        	}else{
		        		 $cuentas = $cuentas.'_'.$datos["resultado"];
					     $descr   = $descr.'_'.$datos["descta"];
					     $tipos   = $tipos.'_'.'D';
					     $montos  = $montos.'_'.$totegr;
		        	}

			     foreach($regs as $reg){
				     $c = new Criteria();
				     $opc1 = $c->getNewCriterion(ContabbPeer::CODCTA,$reg["codcta"]);
				     $opc2 = $c->getNewCriterion(ContabbPeer::CODCTA,ContabbPeer::CODCTA." LIKE '".$datos["egresos"]."%'",Criteria::CUSTOM);
			         $opc1->addAnd($opc2);
			         $c->add($opc1);
			         $reg2 = ContabbPeer::doSelectOne($c);
				     if ($reg2){
				     	$codigocuenta=$reg["codcta"];
				     	$descta=$reg["descta"];
				     	$tipo= $reg2->getDebcre();
				  		if ($tipo=='D'){
				  			 $tipo ='C';
				  			 $monto=$reg["salact"];
				  		}else{
				  			$tipo ='D';
				  			$monto=$reg["salact"] * (-1);
				  		}
				  		if ($cuentas==""){
				  		 $cuentas = $codigocuenta;
				         $descr   = $descta;
						 $tipos   = $tipo;
						 $montos  = $monto;
						}else{
						 $cuentas = $cuentas.'_'.$codigocuenta;
				         $descr   = $descr.'_'.$descta;
						 $tipos   = $tipos.'_'.$tipo;
						 $montos  = $montos.'_'.$monto;
						}
				     }
				}


		    }

			/*$mensaje="";
		    $numeroorden="";
		    $r='';
		    $numorden=$numero;*/
		    $numerocomprob=Comprobante::Buscar_Correlativo();
		    $clscommpro=new Comprobante();
		    $clscommpro->setGrabar("S");
		    $clscommpro->setNumcom($numerocomprob);  //Correlativo
		    $clscommpro->setReftra("CIERREEG");
		    $clscommpro->setFectra(date("d/m/Y"));
		    $clscommpro->setCtas($cuentas);
		    $clscommpro->setDesc($descr);
		    $clscommpro->setMov($tipos);
		    $clscommpro->setMontos($montos);
		    $arrcompro[]=$clscommpro;
		    return -1;
		 }
	}


	public static function abrirEtadef() {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		$contaba->setEtadef('A');
		$contaba->save();

		return -1;
    }

    public static function cerrarEtadef() {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		$contaba->setEtadef('C');
		$contaba->save();

		return -1;
    }

    public static function abrirPeriodo($contaba1) {

		$c = new Criteria();
		$c->add(Contaba1Peer::PEREJE,$contaba1->getPereje());
		$contaba1 = Contaba1Peer::doSelectOne($c);

		if ($contaba1->getStatus()!='A') {
			$c = new Criteria();
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFecdes(),Criteria::GREATER_EQUAL);
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFechas(),Criteria::LESS_EQUAL);
    		$c->add(ContabcPeer::STACOM,'D');
    		$reg = ContabcPeer::doSelect($c);

    		if (!$reg) {
				$contaba1->setStatus('A');
				$contaba1->save();
				return -1;
    		} else {
    			return 607;
	    	}
		} else return 614;
	}

    public static function cerrarPeriodo($contaba1) {

		$c = new Criteria();
		$c->add(Contaba1Peer::PEREJE,$contaba1->getPereje());
		$contaba1 = Contaba1Peer::doSelectOne($c);

		if ($contaba1->getStatus()!='C') {
			$c = new Criteria();
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFecdes(),Criteria::GREATER_EQUAL);
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFechas(),Criteria::LESS_EQUAL);
    		$c->add(ContabcPeer::STACOM,'D');
    		$reg = ContabcPeer::doSelect($c);

    		if (!$reg) {
    			$c = new Criteria();
    			$c->add(Contaba1Peer::PEREJE,$contaba1->getPereje(),Criteria::LESS_THAN);
    			$c->add(Contaba1Peer::STATUS,'A');
    			$reg = ContabcPeer::doSelect($c);
    			if (!$reg) {
					$contaba1->setStatus('C');
					$contaba1->save();
					return -1;
    			} else {
    				return 603;
    			}
    		} else {
    			return 604;
    		}
		} else return 615;
    }


    public static function verificarCierre(){
    	$contaba = ContabaPeer::doSelectOne(new Criteria());

		if ($contaba) {
			if ($contaba->getEtadef()=='A')
				return 620;
			else return -1;
		}
    }

    public static function salvarAsigCentroCosto($contabc,$grid)
    {
        $x=$grid[0];
        $j=0;
        $r = new Criteria();
        $r->add(CodetcencosPeer::NUMCOM,$contabc->getNumcom());
        $datos=CodetcencosPeer::doSelect($r);
        if (!$datos)
        {            
            while ($j<count($x))
            {
             if ($x[$j]->getCodcencos()!="" && $x[$j]->getMoncencos()>0) {
              $detcencos= new Codetcencos();
              $detcencos->setNumcom($contabc->getNumcom());
              $detcencos->setCodcta($x[$j]->getCodcta());
              $detcencos->setCodcencos($x[$j]->getCodcencos());
              $detcencos->setMoncencos($x[$j]->getMoncencos());
              $detcencos->save();
             }
              $j++;
            }
        }else {
            while ($j<count($x))
            {
             if ($x[$j]->getCodcencos()!="" && $x[$j]->getMoncencos()>0) {
              $x[$j]->setNumcom($contabc->getNumcom());
              $x[$j]->save();
             }
              $j++;
            }
        }
    }

  public static function posicion_en_el_grid($arreglo,$codigo)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["codcta"]==$codigo)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function ArregloCuentas($grid)
  {
    $arreglocta=array();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
  	$pos=self::posicion_en_el_grid($arreglocta,$x[$j]->getCodcta());
        if ($pos==0)
        {
         $l=count($arreglocta)+1;
         $arreglocta[$l-1]["codcta"]=$x[$j]->getCodcta();
         $arreglocta[$l-1]["monasi"]=$x[$j]->getMonasi();
         $arreglocta[$l-1]["moncencos"]=$x[$j]->getMoncencos();
        }
        else
        {
          $valor=H::toFloat($arreglocta[$pos-1]["moncencos"]);
          $arreglocta[$pos-1]["moncencos"]=($valor+$x[$j]->getMoncencos());
        }
        $j++;
    }

    return $arreglocta;
  }

  public static function validarMontoTotalCuenta($grid,&$cod)
  {
    $arreglo=self::ArregloCuentas($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if (H::toFloat($arreglo[$j]["moncencos"])>H::toFloat($arreglo[$j]["monasi"]))
      {
        $cod=$arreglo[$j]["codcta"];
        return 626;
      }
     $j++;
    }
    return -1;
  }


}
?>
