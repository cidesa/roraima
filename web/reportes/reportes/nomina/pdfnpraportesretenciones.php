<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
        var $rif = 'G200002395';

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulo=$_POST["titulo"];
			$this->codtipapodes=$_POST["codtipapodes"];
			//$this->codtipapohas=$_POST["codtipapohas"];
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->tipnom=$_POST["tipnom"];
			$this->gendis=$_POST["gendis"];
			$this->eltipo=$_POST["eltipo"];
			$this->elab=$_POST["elab"];
			$this->rev=$_POST["rev"];
			$this->auto=$_POST["auto"];
			$this->catdes = $_POST["codcatdes"];
			$this->cathas = $_POST["codcathas"];
			$this->cab1="1";
            $this->especial = $_POST["especial"];
            $this->tipnomesp=$_POST["tipnomesp"];

   if ($this->especial == 'S')
            {
            	$especial = " a.especial = 'S' AND
		(A.CODNOMESP) = TRIM('".$this->tipnomesp."') AND
 ";
 $this->especial2 = " a.especial = 'S' AND
		(A.CODNOMESP) = TRIM('".$this->tipnomesp."') AND
 ";
            }
            else
            {  if ($this->especial == 'N')       	$especial = " a.especial = 'N' AND --A.CODCON<>'A03' AND"; else
            	if ($this->especial == 'T') $especial = "A.CODCON<>'A03' AND";
            }


			$this->sql="SELECT DISTINCT A.CODTIPAPO as codtipapo,A.DESTIPAPO as destipapo,(A.PORAPO) as porapo,(A.PORRET) as porret,B.CODNOM as CODNOMAPO
						FROM NPTIPAPORTES A,NPCONTIPAPORET B  WHERE
						A.CODTIPAPO=B.CODTIPAPO AND
						A.CODTIPAPO='".$this->codtipapodes."' AND
						--A.CODTIPAPO<='".$this->codtipapohas."' AND
						B.CODNOM='".$this->tipnom."'
						 ";
			//print '<pre>';print $this->sql;exit;
			$this->tb=$this->bd->select($this->sql);


			if($this->codtipapodes=='0001' or $this->codtipapodes=='0002' or $this->codtipapodes=='0007' or $this->codtipapodes=='0008' )
			{
				$this->sql2="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						((SUM(A.SALDO))* 2) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV,
						C.CODCAT
						 FROM
						   NPNOMCAL  A join npconsalint d on (A.codcon = d.codcon and A.codnom = d.codnom),NPHOJINT B,NPASICAREMP C
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND ".$especial."
						B.CODEMP = A.CODEMP
						AND A.ASIDED='A'

						AND  A.CODNOM = '".$this->tipnom."'
						AND  B.CODEMP >=  ('".$this->codempdes."')
						AND  B.CODEMP <= ('".$this->codemphas."')
						and c.codcat >= ('".$this->catdes."')
						and c.codcat <= ('".$this->cathas."')
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING)
						ORDER BY B.NOMEMP,A.CODEMP,c.codcat,a.codcar  ";
					//	print '<pre>'; print $this->sql2; exit;
			}else
			if($this->codtipapodes=='0003' or $this->codtipapodes=='0009')
			{
				$this->sql2="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						SUM(A.SALDO) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV,
						C.CODCAT
						 FROM
						   NPNOMCAL  A join npconsalint d on (A.codcon = d.codcon and A.codnom = d.codnom),NPHOJINT B,NPASICAREMP C
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND ".$especial."
						B.CODEMP = A.CODEMP
						AND A.ASIDED='A'
						AND  A.CODNOM = '".$this->tipnom."'
						AND  B.CODEMP >=  ('".$this->codempdes."')
						AND  B.CODEMP <= ('".$this->codemphas."')
						and c.codcat >= ('".$this->catdes."')
						and c.codcat <= ('".$this->cathas."')
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING)
						ORDER BY B.NOMEMP,A.CODEMP,c.codcat,a.codcar  ";
						//print '<pre>'; print $this->sql2; exit;
			}
else
			if($this->codtipapodes=='0004' or $this->codtipapodes=='0010')
			{
				$cond="";
				if ($this->tipnom=='002' and $this->especial == 'N'){

					$cond="and (A.CODCON='A48' or A.CODCON='A42' )";
				}
				$this->sql2="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						SUM(A.SALDO) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV,
						C.CODCAT
						 FROM
						   NPNOMCAL  A join npconsalint d on (A.codcon = d.codcon and A.codnom = d.codnom),NPHOJINT B,NPASICAREMP C
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND ".$especial."
						B.CODEMP = A.CODEMP
						AND A.ASIDED='A'
						AND  A.CODNOM = '".$this->tipnom."'
						AND  B.CODEMP >=  ('".$this->codempdes."')
						AND  B.CODEMP <= ('".$this->codemphas."')
						and c.codcat >= ('".$this->catdes."')
						and c.codcat <= ('".$this->cathas."')
						AND A.CODCON<>'A02' AND A.CODCON<>'A08' AND A.CODCON<>'A09' $cond
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING)
						ORDER BY B.NOMEMP,A.CODEMP,c.codcat,a.codcar  ";
					//	print '<pre>'; print $this->sql2; exit;
			}else
			if($this->codtipapodes=='0005' or $this->codtipapodes=='0011')
			{
				$cond="";
				if ($this->tipnom=='002' and $this->especial == 'N'){

					$cond="and (A.CODCON='A47' or A.CODCON='A42' )";
				}
				$this->sql2="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						SUM(A.SALDO) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV,
						C.CODCAT
						 FROM
						   NPNOMCAL  A join npconsalint d on (A.codcon = d.codcon and A.codnom = d.codnom),NPHOJINT B,NPASICAREMP C
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND ".$especial."
						B.CODEMP = A.CODEMP
						AND A.ASIDED='A'
						AND  A.CODNOM = '".$this->tipnom."'
						AND  B.CODEMP >=  ('".$this->codempdes."')
						AND  B.CODEMP <= ('".$this->codemphas."')
						and c.codcat >= ('".$this->catdes."')
						and c.codcat <= ('".$this->cathas."')
						AND A.CODCON<>'A34' AND A.CODCON<>'A08' AND A.CODCON<>'A09' $cond
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING)
						ORDER BY B.NOMEMP,A.CODEMP,c.codcat,a.codcar  ";
					//	print '<pre>'; print $this->sql2; exit;
			}else
			$this->sql2="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						SUM(A.SALDO) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV,
						C.CODCAT
						 FROM
						   NPNOMCAL  A join npconsalint d on (A.codcon = d.codcon and A.codnom = d.codnom),NPHOJINT B,NPASICAREMP C
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND
						B.CODEMP = A.CODEMP
						AND A.ASIDED='A'
						AND  A.CODNOM = '".$this->tipnom."'
						AND  B.CODEMP >=  ('".$this->codempdes."')
						AND  B.CODEMP <= ('".$this->codemphas."')
						and c.codcat >= ('".$this->catdes."')
						and c.codcat <= ('".$this->cathas."') and staemp='A'
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING)
						ORDER BY A.CODEMP,c.codcat,a.codcar  ";




		//	H::PrintR($this->sql2);exit;
			//exit;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function CFnomnom($tipnom)
		{

			$tb0=$this->bd->select("SELECT DISTINCT(NOMNOM) as nombre
									FROM NPNOMINA WHERE CODNOM = '".$tipnom."' ");
			return $tb0->fields["nombre"];
		}
	    function CFfecha($tipnom,$num)
		{
			if ($num==1)
			{
				$tb0=$this->bd->select("SELECT to_char(ULTFEC,'dd/mm/yyyy') as VALOR FROM NPNOMINA WHERE CODNOM='".$tipnom."'");
				return $tb0->fields["valor"];
			}else
			{
				$tb0=$this->bd->select("SELECT to_char(profec,'dd/mm/yyyy') as VALOR FROM NPNOMINA WHERE CODNOM='".$tipnom."'");
				return $tb0->fields["valor"];
			}
		}
        //IMPRIME UNA CELDA POSICIONADA
		function celda($x,$y,$mensaje,$l=0,$r=0,$p='L')
		{
			if ($y==''){
				$this->setX($x);
				$this->cell(20,3,$mensaje,$l,$r,$p);
			}else
			{
				$this->setXY($x,$y);
				$this->cell(20,0,$mensaje,$l,$r,$p);
			}
		}

		function llenartitulosmaestro()
		{
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);

			    $this->celda(15,43,'RECURSOS HUMANOS');

				$this->setFont("Arial","B",9);
				$this->setXY(15,53);
				$this->Multicell(190,4,$this->tb->fields["destipapo"],0,'C',0);
				$this->ln(10);
				$tipo = $this->CFnomnom($this->tipnom);

				$this->setX(20);
				$this->cell(70,0,'Nomina:   '.$this->tipnom.'  -  '.$tipo);
				$this->ln(4);
				$fechades = $this->CFfecha($this->tipnom,1);
				$fechahas = $this->CFfecha($this->tipnom,2);
				$this->setX(20);
				if($this->codtipapodes=='0001' or $this->codtipapodes=='0002'){
					$this->cell(50,0,'Fecha al: '.$fechahas);
				}else
				$this->cell(50,0,'Fecha desde:   '.$fechades.'   hasta:  '.$fechahas);
				$this->ln(4);
				$this->setX(20);
				$this->cell(50,0,'Categoria desde:   '.$this->catdes.'   hasta:  '.$this->cathas);


				if ($this->cab1=='1')
				{
					if ($this->encabezado=='TIPO1' )
					{
						//CUADRO DE EMPLEADOS
							$this->rect(20,80,180,180);
							//LINEAS HORIZONTAL
							$this->line(20,93,200,93);
							//LINEAS VERTICALES QUE COMPLEMENTAN EL CUADRO
							$this->line(40,80,40,260);
							$this->line(90,80,90,260);
							$this->line(113,80,113,260);
							$this->line(130,80,130,260);
							$this->line(152,80,152,260);
							$this->line(176,80,176,260);
							//////////////////////////////////////
							//ENCABEZADOS DEL CUADRO TIPO 1
							/* ESTA FUNCION CELDA SE ENCUENTRA DEFINIDA ARRIBA */
								$this->celda(23,85,'Cedula');
								$this->celda(55,85,'Empleado');
								$this->celda(95,85,'Salario Int.');
								$this->celda(116,85,'Fecha');
								$this->celda(115,89,'Ingreso');
								$this->celda(133,85,'Retencion');
								$this->celda(132,89,"        ".$this->tb->fields["porret"].'%');
								$this->celda(156,85,'Aporte');
								$this->celda(155,89,"       ".$this->tb->fields["porapo"].'%');
								$this->celda(183,85,'Total');
							/////////////////////////////7
							$this->setY(95);

					}else
					{
						//CUADRO DE EMPLEADOS
							$this->rect(20,80,180,180);
							//LINEAS HORIZONTAL
							$this->line(20,93,200,93);
							//LINEAS VERTICALES QUE COMPLEMENTAN EL CUADRO
							$this->line(40,80,40,260);
							$this->line(80,80,80,260);
							$this->line(86,80,86,260);
							$this->line(100,80,100,260);
							$this->line(122,80,122,260);
							$this->line(137,80,137,260);
							$this->line(158,80,158,260);
							$this->line(179,80,179,260);
							//////////////////////////////
							//ENCABEZADO DEL CUADRO TIPO 2
							/* ESTA FUNCION CELDA SE ENCUENTRA DEFINIDA ARRIBA */
								$this->celda(23,85,'Cedula');
								$this->celda(50,85,'Empleado');
								$this->celda(81,82,'S');
								$this->celda(81,85,'E');
								$this->celda(81,88,'X');
								$this->celda(81,91,'O');
								$this->celda(86,85,'FECHA');
								$this->celda(88,90,'NAC.');
								$this->celda(105,85,'Salario');
								$this->celda(104,89,'Integral');
								$this->celda(124,85,'Fecha');
								$this->celda(123,89,'Ingreso');
								$this->celda(138,85,"Retencion");
								$this->celda(137,89,"        ".$this->tb->fields["porret"]."%");
								$this->celda(161,85,"Aporte");
								$this->celda(160,89,"        ".$this->tb->fields["porapo"]."%");
								$this->celda(185,85,'Total');
							///////////////////////////////////////7
							$this->setY(95);
					}
				}
		}
		function PutLink($URL,$txt)
    {
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

		function Cuerpo()
		{



			while (!$this->tb->EOF)
			{

				$tb2=$this->bd->select($this->sql2);
				$cs_total = 0;
				$num_emp = 0;
				$cs_ret = 0;
				$cs_apo = 0;

				{
					//DETALLE DEL TIPO DE APORTE Y RENTENCION
						$this->setFont("Arial","B",7);
						while (!$tb2->EOF)
						{
								$this->sql4=("SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$this->tb->fields["codtipapo"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='R' AND
										 B.CODEMP=A.CODEMP and ".$this->especial2 ."
										 B.CODEMP='".$tb2->fields["codemp"]."'
										");
									//	print '<pre>'; print $this->sql4;
										$tb4 = $this->bd->select($this->sql4);
										//condicion para quitar a los trabajadore que tengan retencion igual a cero
										if ($this->codtipapodes=='0012' OR number_format($tb4->fields["elmonto"],2,'.',',')>0 )
										{
							$num_emp++;
							$this->celda(23,'',$tb2->fields["cedemp"]);
							$this->celda(40,'','');
							$this->celda(81,'',$tb2->fields["sexemp"]);
							$this->celda(85.8,'',$tb2->fields["fecnac"]);

							//aqui la condicion si el sueldo base del calculo para el tope es mayor a 3996 muestre ese sueldo
							if ($tb2->fields["monto"] > 3996 and ( $this->tb->fields["codtipapo"]=='0001' or $this->tb->fields["codtipapo"]=='0002') ){
								$tb2->fields["monto"]=3996;
							}
							$this->celda(102,'',number_format($tb2->fields["monto"],2,'.',','),0,0,'R');
							$this->celda(122,'',$tb2->fields["fecing"]);

									//		print '<pre>'; print $this->sql4;


							$this->celda(138,'',number_format($tb4->fields["elmonto"],2,'.',','),0,0,'R');
							$cs_ret = $cs_ret +  $tb4->fields["elmonto"];
							$this->sql5="SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$this->tb->fields["codtipapo"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='A' AND
										 B.CODEMP=A.CODEMP and  ".$this->especial2 ."
										 B.CODEMP='".$tb2->fields["codemp"]."' ";

										// print '<pre>'; print $this->sql5;
							$tb5= $this->bd->select($this->sql5);
							$this->celda(159,'',number_format($tb5->fields["elmonto"],2,'.',','),0,0,'R');
							$cs_apo = $cs_apo +  $tb5->fields["elmonto"];
							$CF_total = $tb4->fields["elmonto"] + $tb5->fields["elmonto"];
							$cs_total = $cs_total  + $CF_total;
							$this->celda(180,'',number_format($CF_total,2,'.',','),0,0,'R');
							$this->setX(40);
							$this->multicell(40,3,$tb2->fields["nomemp"]);
							//fin de la condicion
							$this->ln(2);
							}

						    $tb2->MoveNext();
						    if ($tb2->EOF)
						    {
						    	 $this->cab1="0";
						    	 $this->AddPage();
						    	 $this->cab1="1";
						    	 $this->rect(50,95,100,40);
						    	 $this->setFont("Arial","B",12);
						    	 $this->celda(100,85,'RESUMEN');
						    	 $this->setFont("Arial","B",9);
						    	 $this->celda(85,100,'Trabajadores:                   '.$num_emp);
						    	 $this->celda(85,110,'Monto Total:                     '.number_format($cs_total,2,'.',','));
						    	 $this->celda(85,120,'Retenciones:                    '.number_format($cs_ret,2,'.',','));
						    	 $this->celda(85,130,'Aportes:                           '.number_format($cs_apo,2,'.',','));
						    	 $this->setFont("Arial","B",14);
						    	 $this->celda(57,115,'TOTAL');
						    	 $this->ln();
						    	 	 $this->setFont("Arial","",8);

$this->setxy(10,240);
						    	 	$this->cell(75,10,"Elaborado: ".$this->elab,0,0,'l');
						    	 	$this->cell(75,10,"Revisado: ".$this->rev,0,0,'l');
						    	 	$this->cell(75,10,"Autorizado: ".$this->auto,0,0,'l');
						    }
						}
						$this->setFont("Arial","B",9);
				}
			$this->tb->MoveNext();
			if (!$this->tb->EOF)
			{$this->AddPage();}
			}
          $txt='SI';
         if ($txt=='SI')
      { $this->sety(150);
      	    if ($this->codtipapodes=='0003'  or $this->codtipapodes=='0009')
      	    {
      	    	$dir = parse_url($_SERVER['HTTP_REFERER']);
				$dirpath=$dir['path'];
				if(!(strrpos($dir['path'],".php")))
					$dirpath=$dir['path'].".php";
				    $dir = eregi_replace(".php","_hc.php",$dir['scheme'].'://'.$dir['host'].$dirpath);
			    	$this->PutLink(trim($dir).'?codempdes='.$_POST["codempdes"].'&codemphas='.$_POST["codemphas"].'&tipnom='.$_POST["tipnom"].'&codcatdes='.$_POST["codcatdes"].'&codcathas='.$_POST["codcathas"].'&especial='.$_POST["especial"].'&tipnomesp='.$_POST["tipnomesp"].'&codtipapodes='.$_POST["codtipapodes"].'&schema='.$_SESSION["schema"],'Descargar TXT de Faov');
      	    }
      	    if ($this->codtipapodes=='0004'  or $this->codtipapodes=='0010')
      	    {
      	    	$dir = parse_url($_SERVER['HTTP_REFERER']);
				$dirpath=$dir['path'];
				if(!(strrpos($dir['path'],".php")))
					$dirpath=$dir['path'].".php";
				    $dir = eregi_replace(".php","_hc.php",$dir['scheme'].'://'.$dir['host'].$dirpath);
			    	$this->PutLink(trim($dir).'?codempdes='.$_POST["codempdes"].'&codemphas='.$_POST["codemphas"].'&tipnom='.$_POST["tipnom"].'&codcatdes='.$_POST["codcatdes"].'&codcathas='.$_POST["codcathas"].'&especial='.$_POST["especial"].'&tipnomesp='.$_POST["tipnomesp"].'&codtipapodes='.$_POST["codtipapodes"].'&schema='.$_SESSION["schema"],'Descargar TXT de fondo de Jubilacion');
      	    }
      }//fin del si txt
   }//cuerpo
}//clase
?>
