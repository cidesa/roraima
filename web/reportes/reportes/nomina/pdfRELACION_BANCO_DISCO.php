<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");


	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $tipnomdes;
		var $tipnomhas;
		var $archivo;
		var $bancos;
		var $gendis;
		var $numcuenta;
		var $fechaefectiva;
		var $formato;
		var $nombresolic;
		var $numctasol;
		var $tipo;
		var $cf_banco;
		var $elrif="G200005742";

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomhas=$_POST["tipnomhas"];
			$this->bancos=$_POST["bancos"];
			$this->gendis=$_POST["gendis"];
			$this->numcuenta=$_POST["numcuenta"];
			$this->fechaefectiva=$_POST["fechaefectiva"];
			$this->formato=$_POST["formato"];
			$this->nombresolic=$_POST["nombresolic"];
			$this->numctasol=$_POST["numctasol"];
			$this->tipo=$_POST["tipo"];
			$this->archivo=$_POST["archivo"];


/*
 *SQL para crear el cursor
 */

			$this->sql_cursor="SELECT A.NACEMP,
		       SUBSTR(A.CODEMP,2,8) as CODEMP,
		       A.cedemp as cedemp,
		       A.FECNAC,A.NOMEMP,
		       A.NUMCUE as cuenta_banco,
		       A.TIPCUE,
		       COALESCE(B.MONTONOMINA,0) as monto,
		       B.CODNOM
			FROM
			   NPHOJINT A,
			   NPASICAREMP B,
			   NPCARGOS C,
			   NPBANCOS D
			WHERE
			   B.CODNOM>=RPAD('".$this->tipnomdes."',3,' ')  AND
			   B.CODNOM<=RPAD('".$this->tipnomhas."',3,' ')  AND
			   A.CODBAN=D.CODBAN AND
			   B.CODEMP = A.CODEMP AND
			   B.CODCAR=C.CODCAR AND
			   D.CODBAN='".$this->bancos."' AND
			   STATUS='V' AND
			   A.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S') AND
			   MONTONOMINA>0
			   AND RTRIM(COALESCE(A.NUMCUE,' '))<>''
			GROUP BY B.CODNOM,D.CODBAN,A.CEDEMP,A.CODEMP,SUBSTR(A.CODEMP,2,8),A.NOMEMP,B.CODCAR,C.NOMCAR,A.NUMCUE,A.TIPCUE,A.NACEMP,A.FECNAC,MONTONOMINA
			ORDER BY RTRIM(A.cedemp)";
            //print $this->sql_cursor;
			$this->cab=new cabecera();

		}

		function rpad($texto,$veces,$caracter)
		{
			$agregar="";
			for($i=1;$i<=$veces;$i++)
			{
				$agregar.=$caracter;
			}
			$texto.=$agregar;
			return($texto);
		}

		function PutLink($URL,$txt)
		{
		    //Escribir un hiper-enlace
		    $this->SetTextColor(0,0,255);
		    $this->SetStyle('U',true);
		    $this->Write(5,$txt,$URL);
		    $this->SetStyle('U',false);
		    $this->SetTextColor(0);
		}

		function SetStyle($tag,$enable)
		{
		    //Modificar estilo y escoger la fuente correspondiente
		    $this->$tag+=($enable ? 1 : -1);
		    $style='';
		    foreach(array('B','I','U') as $s)
		        if($this->$s>0)
		            $style.=$s;
		    $this->SetFont('',$style);
		}


		function lpad($texto,$veces,$caracter)
		{
			$agregar="";
			for($i=1;$i<=$veces;$i++)
			{
				$agregar.=$caracter;
			}
			$agregar.=$texto;
			return($agregar);
		}

		function nvl($valor,$caracter)
		{
			if($valor=='')
			{
				return($caracter);
			}
			else
			{
				return($valor);
			}
		}

		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);
			//$this->ln(-1);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			//$this->ln();
			$this->Ln(8);
		}
		function Cuerpo()
		{

		if ($this->gendis=='SI')
			{
			//$nombre_archivo='c:/'.$this->tipnomdes.date("dmYhis").'.txt';
			$nombre_archivo=$this->archivo;
            //print $nombre_archivo;
			if (!file_exists($nombre_archivo))
			{
				fopen($nombre_archivo,"w");
			}
			chmod ($nombre_archivo,0777);

			$host = $_SERVER["HTTP_HOST"];

			//print "<pre>";
			$aux = split('/',$_SERVER["REQUEST_URI"]);
			$uri='';
			for ($i=0;$i<count($aux)-1;$i++)
				$uri = $uri.$aux[$i]."/";

			$archivo='http://'.$host.$uri;

			$depositos = fopen($nombre_archivo,'w+');
			$tbg=$this->bd->select($this->sql_cursor);
			$opcion='1';
			$contador=0;
			$monto_total=0;


			if ($this->bancos=='05')
			{
				/*
				 *-------------------------------------------------------------------------------------------------------------------------------------------------
				 *BANCO INDUSTRIAL
							FOR REG IN CUENTAS LOOP
							CANREG:=CANREG+1;
							DECIMALES:=LPAD(TO_CHAR((REG.MONTO-TRUNC(REG.MONTO))*100),2,'0');
							MONTOCHAR:= LPAD(TO_CHAR(TRUNC(REG.MONTO)) || DECIMALES ,12,'0' );
							LINEA:= '770'||
							LPAD(REPLACE(NVL(REG.CUENTA_BANCO,' '),'-',''),20,'0')||
							LPAD(REG.CEDEMP,11,'0')||
							LPAD(LTRIM(MONTOCHAR),13,'0')||
							'00000000000000';
							INSERT INTO NPDEPBAN VALUES (CANREG,LINEA)
							END LOOP;
				 */

							while(!$tbg->EOF)
							{
								$cod='770';
								$cuenta_banco=str_replace('-','',trim($tbg->fields["cuenta_banco"]));
								$cuenta_banco=str_pad($cuenta_banco, 20, '0', STR_PAD_LEFT);
								$cedemp=str_pad(trim($tbg->fields["cedemp"]), 11, '0', STR_PAD_LEFT);
								$monto=number_format(trim($tbg->fields["monto"]),2,'.',',');
									$monto=str_replace(',','',$monto);
									$monto=str_replace('.','',$monto);
									$monto=str_pad(rtrim($monto), 13, '0', STR_PAD_LEFT);
								$relleno='00000000000000';
								$cadena=$cod.$cuenta_banco.$cedemp.$monto.$relleno;
								fwrite($depositos, $cadena);

								fwrite($depositos, chr(13).chr(10));
								$tbg->MoveNext();
							}
							fclose($depositos);
			}
			else if ($this->bancos=='04')
			{
				/*
				 * -------------------------------------------------------------------------------------------------------------------------------------------------
				 *BANCO CENTRAL
							CANREG:=0;
							FOR REG IN CUENTAS LOOP
							CANREG:=CANREG+1;
							ELTOTAL:=ELTOTAL+REG.MONTO;
							DECIMALES:=LPAD(TO_CHAR((REG.MONTO-TRUNC(REG.MONTO))*100),2,'0');
							MONTOCHAR:= LPAD(TO_CHAR(TRUNC(REG.MONTO )) || DECIMALES ,13,'0' );
							LINEA:= 'AC202'||
							LPAD(REPLACE(NVL(REG.CUENTA_BANCO,' '),'-',''),10,'0')||
							LPAD(TO_CHAR(CANREG),8,'0')||
							MONTOCHAR||
							'0506';
							INSERT INTO NPDEPBAN VALUES (CANREG,LINEA);
							END LOOP;
							--REGISTRO DE CARGO A LA CTA MATRIZ
							CANREG:=CANREG+1;
							DECIMALES:=LPAD(TO_CHAR((ELTOTAL-TRUNC(ELTOTAL))*100),2,'0');
							MONTOCHAR:= LPAD( TO_CHAR(TRUNC(ELTOTAL)) || DECIMALES ,13,'0' );
							LINEA:= 'AC404'||
							LPAD(REPLACE(:NUMCUENTA,'-',''),10,'0')||
							LPAD(TO_CHAR(CANREG),8,'0')||
							LPAD(MONTOCHAR,13,'0')||
							'0506';
							INSERT INTO NPDEPBAN VALUES (CANREG,LINEA);
				 */

							while(!$tbg->EOF)
							{
								$cod_instituto='0506';
								$cod='AC202';
								$cuenta_banco=str_replace('-','',trim($tbg->fields["cuenta_banco"]));
								$cuenta_banco=str_pad($cuenta_banco, 10, '0', STR_PAD_LEFT);
								$contador_formateado=str_pad($contador+1, 8, '0', STR_PAD_LEFT);
								$cedemp=str_pad(trim($tbg->fields["cedemp"]), 11, '0', STR_PAD_LEFT);
								$monto=number_format(trim($tbg->fields["monto"]),2,'.',',');
									$monto=str_replace(',','',$monto);
									$monto=str_replace('.','',$monto);
									$monto=str_pad(rtrim($monto), 13, '0', STR_PAD_LEFT);
								$relleno='00000000000000';
								$cadena=$cod.$cuenta_banco.$contador_formateado.$monto.$cod_instituto.$relleno;
								fwrite($depositos, $cadena);
								fwrite($depositos, chr(13).chr(10));
								$monto_total=$monto_total + $tbg->fields["monto"];
								$contador++;
								$tbg->MoveNext();
							}
						$cod='AC404';
						$numcuenta=str_pad($this->numcuenta, 10, '0', STR_PAD_LEFT);
						$contador=str_pad($contador, 8, '0', STR_PAD_LEFT);
						$monto_total=number_format(trim($monto_total),2,'.',',');
							$monto_total=str_replace(',','',$monto_total);
							$monto_total=str_replace('.','',$monto_total);
							$monto_total=str_pad(rtrim($monto_total), 13, '0', STR_PAD_LEFT);
						$cadena_final=$cod.$numcuenta.$contador.$monto_total.$cod_instituto;
						fwrite($depositos, $cadena_final);
						fwrite($depositos, chr(13).chr(10));
						fclose($depositos);

			}
			else if ($this->bancos=='00')
			{
				/*
				 * -------------------------------------------------------------------------------------------------------------------------------------------------
				 *BANCO CORPBANCA*/
 							while(!$tbg->EOF)
							{
							    $cod='02';
								if ($tbg->fields["cuenta_banco"]=='Cta. Corriente'){
								   $tipocuenta='01';
								}elseif ($tbg->fields["cuenta_banco"]=='Cta. de Ahorros'){
								   $tipocuenta='02';
								}else{
								   $tipocuenta='03';
								}
								$cuenta_banco=str_replace('-','',trim($tbg->fields["cuenta_banco"]));
								$cuenta_banco=str_pad($cuenta_banco, 16, '0', STR_PAD_LEFT);
								$monto=number_format(trim($tbg->fields["monto"]),2,'.',',');
									$monto=str_replace(',','',$monto);
									$monto=str_replace('.','',$monto);
									$monto=str_pad(rtrim($monto), 15, '0', STR_PAD_LEFT);
								$relleno=str_pad('0',64,'0',STR_PAD_LEFT);
								$cadena=$cod.$tipocuenta.$cuenta_banco.$monto.$relleno.'1';
								fwrite($depositos, $cadena);
								fwrite($depositos, chr(13).chr(10));
								$monto_total=$monto_total + $tbg->fields["monto"];
								$contador++;
								$tbg->MoveNext();
							}
						$cod='01';
						$numcontrato='********';
						//$fechaaplicacion=$this->fechaefectiva;
						$fechaaplicacion=date('Ymd',mktime(0,0,0,substr($this->fechaefectiva,3,2),substr($this->fechaefectiva,0,2),substr($this->fechaefectiva,6,4)));
						$contador=str_pad($contador, 8, '0', STR_PAD_LEFT);
						$monto_total=number_format(trim($monto_total),2,'.',',');
							$monto_total=str_replace(',','',$monto_total);
							$monto_total=str_replace('.','',$monto_total);
							$monto_total=str_pad(rtrim($monto_total), 17, '0', STR_PAD_LEFT);
						$relleno=str_pad('0',57,'0',STR_PAD_LEFT);
						$cadena_final=$cod.$numcontrato.$fechaaplicacion.$contador.$monto_total.$relleno;
						fwrite($depositos, $cadena_final);
						fwrite($depositos, chr(13).chr(10));
						fclose($depositos);


			}
			else if ($this->bancos=='01')
			{//print $this->fechaefectiva;exit;
				/*
				 * -------------------------------------------------------------------------------------------------------------------------------------------------
				 *BANCO BANPRO*/
 							while(!$tbg->EOF)
							{
							    //$cod='02';
								/*if ($tbg->fields["cuenta_banco"]=='Cta. Corriente'){
								   $tipocuenta='01';
								}elseif ($tbg->fields["cuenta_banco"]=='Cta. de Ahorros'){
								   $tipocuenta='02';
								}else{
								   $tipocuenta='03';
								}*/
								$cod='FOND';
								$dia=substr($this->fechaefectiva,0,2);
								$mes=substr($this->fechaefectiva,3,2);
								$año=substr($this->fechaefectiva,6,4);
						/*		$cedula = str_replace('.','',trim($tbg->fields["cedemp"]));
								$cedula = str_replace(',','',$cedula);
								$cedula=str_pad($cedula, 9 , '0', STR_PAD_LEFT);
                         */
								$cuenta_banco=str_replace('-','',trim($tbg->fields["cuenta_banco"]));
								//$cuenta_banco=str_pad($cuenta_banco, 20, '0', STR_PAD_LEFT);
								$cuenta_banco=substr($cuenta_banco,strlen($cuenta_banco)-10,strlen($cuenta_banco));
								$monto=number_format(trim($tbg->fields["monto"]),2,'.',',');
									$monto=str_replace(',','',$monto);
									$monto=str_replace('.','',$monto);
									$monto=str_pad(rtrim($monto), 15, '0', STR_PAD_LEFT);
								//$relleno=str_pad('0',64,'0',STR_PAD_LEFT);

								$cadena=$cod.$dia.$mes.$año.'00'.$cuenta_banco.$monto;
								fwrite($depositos, $cadena);
								fwrite($depositos, chr(13).chr(10));
								$monto_total=$monto_total + $tbg->fields["monto"];
								//$contador++;
								$tbg->MoveNext();
							}
						//$numcontrato='********';
						//$fechaaplicacion=$this->fechaefectiva;
						//$fechaaplicacion=date('Ymd',mktime(0,0,0,substr($this->fechaefectiva,3,2),substr($this->fechaefectiva,0,2),substr($this->fechaefectiva,6,4)));
						//$contador=str_pad($contador, 8, '0', STR_PAD_LEFT);
/*						$empresa='';
						$empresa=str_pad(trim($empresa), 9, '0', STR_PAD_LEFT);

						$cuenta_empresa = str_replace('-','',trim($this->numcuenta));
						$cuenta_empresa=str_pad($cuenta_empresa, 20, '0', STR_PAD_LEFT);

						$monto_total=number_format(trim($monto_total),2,'.',',');
							$monto_total=str_replace(',','',$monto_total);
							$monto_total=str_replace('.','',$monto_total);
							$monto_total=str_pad(rtrim($monto_total), 15, '0', STR_PAD_LEFT);

						//$relleno=str_pad('0',57,'0',STR_PAD_LEFT);
						$cadena_final=$empresa.$cuenta_empresa.$monto_total;
						fwrite($depositos, $cadena_final);
						fwrite($depositos, chr(13).chr(10));*/
						fclose($depositos);


			}
          }


			$canreg=0;
			$contador=0;
			$eltotal=0;
			$this->Ln(10);
			$this->Line(10,$this->GetY(),206,$this->GetY());
			$this->Cell(20,5,"Cédula",0,0,'C');
			$this->Cell(60,5,"Nombre del Empleado");
			$this->Cell(10);
			$this->Cell(30,5,"Cuenta Bancaria");
			$this->Cell(20);
			$this->Cell(30,5,"Monto a Depositar");
			$tbg=$this->bd->select($this->sql_cursor);
							while(!$tbg->EOF)
							{
								//$this->setFont("Arial","B",9);
								$this->SetTextColor(0,0,128);
								$cedemp=strtoupper($tbg->fields["cedemp"]);
								$nomemp=strtoupper($tbg->fields["nomemp"]);
								$cuenta_banco=strtoupper($tbg->fields["cuenta_banco"]);
								$monto=strtoupper($tbg->fields["monto"]);
									$this->Ln(5);
									$this->Line(10,$this->GetY(),206,$this->GetY());
									$this->Cell(20,5,strtoupper($tbg->fields["cedemp"]),0,0,'C');
									$this->Cell(60,5,strtoupper($tbg->fields["nomemp"]));
									$this->Cell(10);
									$this->Cell(30,5,strtoupper($tbg->fields["cuenta_banco"]));
									$this->Cell(20);
									$this->Cell(30,5,number_format(trim($tbg->fields["monto"]),2,'.',','));
									$canreg++;
									$eltotal=$eltotal + $tbg->fields["monto"];
								$tbg->MoveNext();
							}
							$this->Ln(5);
							$this->Line(10,$this->GetY(),206,$this->GetY());
							$this->Cell(40,5,"Cantidad de Personas: ".$canreg,0,0,'C');
							$this->Ln(5);
							$this->Cell(60,5,"Total a Pagar: ".number_format(trim($eltotal),2,'.',','));
							$this->Ln(5);



//		  	  $this->PutLink('descargar.php?archivo='.$nombre_archivo,'Descargar Archivo');
							if ($this->gendis=='SI'){
   							   $this->PutLink($archivo.'descargar.php?archivo='.$nombre_archivo,'Archivo al Banco');
							}



				if(!$tbg->EOF)
				{
					//$this->Ln(12);
					$this->Addpage();
				}
			}
			//exit;

		}
?>
