<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

/*
AYUDA:
Cell(with,healt,Texto,border,linea,align,fillm-Fondo,link)
AddFont(family,style,file)
ln() -> Salto de Linea
*/

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $ancho;
		var $campos;

var $ini;
var $inv;
		var $codcta1;
		var $codcta2;
		var $periodo;
 		var $auxnivel;
		var $nrorup;
		var $comodin;

		var $loniv1;
		var $fecha_ini;
		var $fecha_cie;
		var $nivel;
		var $fechainicio;
		var $total;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->campos=array();
			$this->anchos=array();
			$this->titulos=array();
			$this->codcta1=$_POST["codcta1"];
			$this->codcta2=$_POST["codcta2"];
			$this->periodo=$_POST["periodo"];
			$this->auxnivel=$_POST["auxnivel"];
			$this->comodin=$_POST["comodin"];
			$this->nrorup=$_POST["nrorup"];
			$this->obtenerFecha();
			$this->sql="SELECT  A.ORDEN,
								A.TITULO,
								A.CUENTA,
								A.NOMBRE,
								A.DEBITO,
								A.CREDITO,
								(A.SALDO) as SALDO,
								A.CARGABLE
						FROM
						(SELECT RTRIM(A.CODCTA) AS ORDEN,
						    A.CODCTA AS TITULO,
							A.CODCTA AS CUENTA,
						 	B.DESCTA AS NOMBRE,
						 	A.TOTDEB AS DEBITO,
						 	A.TOTCRE AS CREDITO,
							 A.SALACT AS SALDO,
						 	B.CARGAB AS CARGABLE,'C'
                         FROM
					  		CONTABB1 A,
							CONTABB B
                     	 WHERE
					  		A.CODCTA=B.CODCTA AND
                            A.PEREJE = ('".$this->periodo."') AND
                            A.FECINI = ('".$this->fecha_ini."') AND
                            A.FECCIE = ('".$this->fecha_cie."')
						UNION ALL
						SELECT RTRIM(A.CODCTA)||'T' AS ORDEN,'TOTAL' AS TITULO,
						 	A.CODCTA AS CUENTA,
						 	B.DESCTA AS NOMBRE,
						 	A.TOTDEB AS DEBITO,
						 	A.TOTCRE AS CREDITO,
							 A.SALACT AS SALDO,
						 	B.CARGAB AS CARGABLE,'C'
                         FROM
						 	CONTABB1 A,
							CONTABB B

                         WHERE A.CODCTA=B.CODCTA AND
                               A.PEREJE = ('".$this->periodo."') AND
                               A.FECINI = ('".$this->fecha_ini."') AND
                               A.FECCIE = ('".$this->fecha_cie."') AND
                               B.CARGAB<>'C') A,
								CONTABA B
						WHERE
								LENGTH(RTRIM(A.CUENTA)) <= ('".$this->nivel."')  AND
								RTRIM(A.CUENTA) >= RTRIM('".$this->codcta1."') AND
								RTRIM(A.CUENTA) <= RTRIM('".$this->codcta2."')  AND
								RTRIM(A.CUENTA) LIKE RTRIM('".$this->comodin."') AND
								((A.CARGABLE='C' AND A.SALDO <> 0) OR A.CARGABLE<>'C') AND
								( A.CUENTA LIKE (RTRIM(B.CODIND)||'%')  OR
								A.CUENTA LIKE (RTRIM(B.CODEGD)||'%'))
						ORDER BY A.ORDEN";

			//print '<pre>';print $this->sql;
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
		}


		function obtenerFecha()
		{
		  $tb3=$this->bd->select("select fecini as fechainic, forcta as forcta from contaba");
			if (!$tb3->EOF){
				$this->fechainicio=$tb3->fields["fechainic"];
				$this->forcta=$tb3->fields["forcta"];
				}
			$this->valor=$this->instr($this->forcta,'-',0,1);
//		   $tb4=$this->bd->select("SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,position('-' in FORCTA)-1)), 0), 0) as LONIV1,
		   $tb4=$this->bd->select("SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,$this->valor))-1, 0), 0) as LONIV1,
										FECINI as fecha_ini,
										FECCIE as fecha_cie
								   FROM
										CONTABA");
				if (!$tb4->EOF)
				{
					$this->loniv1=$tb4->fields["loniv1"];
					$this->fecha_ini=$tb4->fields["fecha_ini"];
					$this->fecha_cie=$tb4->fields["fecha_cie"];
				} //EndIf

			  if ($this->auxnivel==$this->nrorup)
			   {
					$tb5=$this->bd->select("SELECT coalesce(coalesce(LENGTH(RTRIM(FORCTA)), 0), 0) as nivel FROM contaba");
						if (!$tb5->EOF)
						{
							$this->nivel=$tb5->fields["nivel"];
						}			 //EndIf
			   }	  //EndIf
			   else
			   {
/*						$this->palabra="#-##-##-##-##-###";
						$this->busqueda='-';
						$this->comienzo='5';
						$this->concurrencia=1;
						print $this->instr($this->palabra,$this->busqueda,$this->comienzo,$this->concurrencia)."<br>";*/

					$this->valor=$this->instr($this->forcta,'-',0,$this->auxnivel);
					$tb5=$this->bd->select("SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,$this->valor))-1, 0), 0) as nivel FROM contaba");
						if (!$tb5->EOF)
						{
							$this->nivel=$tb5->fields["nivel"];
						}					//EndIf
			   } //EndIf
	   		   $tb6=$this->bd->select("select fecdes,fechas from contaba1 where pereje='$this->periodo'");
			   $this->fecdesde=date("d/m/Y",strtotime($tb6->fields["fecdes"]));
			   $this->fechasta=date("d/m/Y",strtotime($tb6->fields["fechas"]));

		}	//Return


		function instr($palabra,$busqueda,$comienzo,$concurrencia){
		/*echo $palabra. " ";
		echo $busqueda. " ";
		echo $comienzo. " ";
		echo $concurrencia. " ";*/
		//echo $palabra="#-##-##-##-##-###";
		//$concurrencia=6;
		//echo "   ,   ";

		$tamano=strlen($palabra);
		//echo "   ,   ";
		$cont=0;
		$cont_conc=0;

		for ($i=$comienzo;$i<=$tamano;$i++){
			$cont=$cont+1;
			if ($palabra[$i]==$busqueda):
				$cont_conc=$cont_conc+1;

				if ($cont_conc==$concurrencia):
					$i=$tamano;
				endif;
			endif;
		}
			if ($concurrencia > $cont_conc ):
				 $cont=0;
			else:
				 $cont;
			endif;

		return $this->instr=$cont;
		}



		function llenartitulosmaestro()
		{

				$this->anchos[0]=120;
				$this->anchos[1]=30;
				$this->anchos[2]=35;
				$this->anchos[4]=30;
				$this->anchos[3]=120;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->cell(40,10,"Desde: ".$this->fecdesde);
			$this->cell(40,10,"Hasta: ".$this->fechasta);
			$this->Line(10,48,200,48);
			$this->ln();
		}

		function Cuerpo()
		{
			$tb=$this->bd->select($this->sql);
			while(!$tb->EOF)
			{
				if(!empty($tb->fields["titulo"]))
				{
				 $this->setFont("Arial","",8);
					 if ((trim($tb->fields["titulo"])=='TOTAL') and (trim($tb->fields["saldo"]<>0)))
					 //and trim($tb->fields["cargable"]=='C'))
					 {
						$descta=$tb->fields["titulo"]." ".$tb->fields["nombre"];
						$this->cell(30,10,"");
 					    $this->cell($this->anchos[0]-10,10,$descta);
 					    //$this->cell($this->anchos[1],10,"");
						//$this->cell($this->anchos[2],10,"");
						//$this->cell($this->anchos[4],10,number_format($tb->fields["saldo"],2,'.',','),0,0,'R');
						//$this->ln(4);
						//$this->ln(3);

					 }
					 elseif (trim($tb->fields["titulo"])!='TOTAL')
					 {
					 	if ($tb->fields["cargable"]=='N'){
						$descta=$tb->fields["nombre"];
						$this->cell(30,10,$tb->fields["cuenta"]);
 					    $this->cell($this->anchos[0]-10,10,$descta);

						}else{
						$descta=$tb->fields["nombre"];
						$this->cell(30,10,$tb->fields["cuenta"]);
 					    $this->cell($this->anchos[0]-11,10,$descta);
 					    $this->cell($this->anchos[1]-10,10,H::FormatoMonto($tb->fields["saldo"]),0,0,'R');

						}
					 }

						/////////////////////////////////////////////
								$palabra=$tb->fields["cuenta"];
								$tamano=strlen($palabra);
								$niv=0;
								for ($i=0;$i<=$tamano;$i++){
									if ($palabra[$i]=='-'):
										$niv=$niv+1;
									endif;
								}
								//print "    ".$niv."<br>";
						/////////////////////////////////////////////
						  $tb_temp=$this->bd->select("SELECT CARGAB as mov FROM CONTABB  WHERE RTRIM(CODCTA)=RTRIM('".$tb->fields["cuenta"]."')");
						    if (!empty($tb_temp->fields["mov"])){ $mov=$tb_temp->fields["mov"]; }

			  if (($niv == (($this->nrorup)-2) and (($this->nrorup)-2) >0) and (trim($tb->fields["cargable"]=='C')) and (trim($tb->fields["saldo"]<>0)) ){
				  $this->cell($this->anchos[1],10,number_format($tb->fields["saldo"],2,',','.'),0,0,'R');
			   } else{
				   if (($niv == (($this->nrorup)-3) and (($this->nrorup)-3) >0) and ((trim($tb->fields["cargable"]=='C'))  or  (trim($tb->fields["titulo"]=='TOTAL')) and (trim($tb->fields["saldo"]<>0)) ) ){
						//$this->cell($this->anchos[1],10,"");
						$this->cell($this->anchos[2]-16,10,number_format($tb->fields["saldo"],2,',','.'),0,0,'R');
				   }else{

				   if (( ($niv == (($this->nrorup)-4) and (($this->nrorup)-4) >0) or
						($niv == (($this->nrorup)-5) and (($this->nrorup)-5) >0) or
						($niv == (($this->nrorup)-6) and (($this->nrorup)-6) >0) or
						($niv == 0) or
						($niv == (($this->nrorup)-7) and (($this->nrorup)-7) >0)) and
					   (trim($tb->fields["cargable"]=='N'))  and  (trim($tb->fields["titulo"]=='TOTAL')) and (trim($tb->fields["saldo"]<>0)) )
					  {
						//$this->cell($this->anchos[1],10,"");

						/// Para hacer la raya ////
							   if ( ($niv == ($this->nrorup)-4) and ((($this->nrorup)-4) >0) and
								   ($mov<>'C') and (trim($tb->fields["titulo"]=='TOTAL')) )
									{ $this->Line($this->GetX()-10,$this->GetY()+2,$this->GetX()+25,$this->GetY()+2); }

						/// ///// ////

						// $this->cell(15,10,"");

						/// Para hacer la raya ////
							   if ((($niv == (($this->nrorup)-5) and (($this->nrorup)-5) >0) or
									($niv == (($this->nrorup)-6) and (($this->nrorup)-6) >0) or
									($niv == (($this->nrorup)-7) and (($this->nrorup)-7) >0) or
									($niv == (($this->nrorup)-8) and (($this->nrorup)-8) >0)) and
								   ($mov<>'C') and (trim($tb->fields["titulo"]=='TOTAL')) )
									{ $this->Line($this->GetX()-10,$this->GetY()+2,$this->GetX()+25,$this->GetY()+2); }
						/// ///// ////

						$this->cell($this->anchos[2]-16,10,number_format($tb->fields["saldo"],2,',','.'),0,0,'R');
				   }

				    } }

				 }   //EndIF
				$this->Ln(5);
				$tb->MoveNext();
			}
		     $this->CalcularIngresoYEgreso();
			 $this->ln();
 			 $this->setFont("Arial","B",10);
			 $this->cell(125,10,"    TOTAL RESULTADO DEL EJERCICIO     ");
 			 $this->cell(35,10,number_format($this->total,2,',','.'),0,0,'R');
 			 $this->total=0;
		}

	function CalcularIngresoYEgreso(){

			$tb50=$this->bd->select("SELECT A.SALACT as INGRESO
									FROM
										CONTABB1 A,
										CONTABA B
								   WHERE
										 A.CODCTA = B.CODIND AND
										 A.PEREJE = '".$this->periodo."' AND
										 A.FECINI = B.FECINI AND
										 A.FECCIE = B.FECCIE --ojo de aqui en adelante fue porq solo son la 5 y 6
										 		 and LENGTH(RTRIM(A.CODCTA)) <= ('".$this->nivel."')  AND
								RTRIM(A.CODCTA) >= RTRIM('".$this->codcta1."') AND
								RTRIM(A.CODCTA) <= RTRIM('".$this->codcta2."')");
			if (!$tb50->EOF){
				$Tingreso=$tb50->fields["ingreso"];
				}

			$tb50=$this->bd->select("SELECT A.SALACT as EGRESO
									FROM
										CONTABB1 A,
										CONTABA B
								   WHERE
										 A.CODCTA = B.CODEGD AND
										 A.PEREJE = '".$this->periodo."' AND
										 A.FECINI = B.FECINI AND
										 A.FECCIE = B.FECCIE and LENGTH(RTRIM(A.CODCTA)) <= ('".$this->nivel."')  AND
								RTRIM(A.CODCTA) >= RTRIM('".$this->codcta1."') AND
								RTRIM(A.CODCTA) <= RTRIM('".$this->codcta2."')");

			if (!$tb50->EOF){
				$Tegreso=$tb50->fields["egreso"];
				}
			$this->total=((ABS($Tingreso)-($Tegreso))*-1);
			}
	}
?>