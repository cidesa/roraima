<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $cont=0;
		var $cont1=0;
		var $result=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $numcue1;
		var $numcue2;
		var $meses;
		var $anos;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcue1=$_POST["numcue1"];
			$this->numcue2=$_POST["numcue2"];
			$this->meses=$_POST["meses"];
			$this->anos=$_POST["anos"];



				/*ESTO FUE LO QUE ENCONTRE DE ESTE REPORTE¡¡ MAS MALO
				 * $this->sql="SELECT RTRIM(A.NUMCUE) as numcue, A.REFERE, as arefere,
							DECODE(A.MONLIB,0,FECBAN,A.FECLIB) as afecmov, DECODE(A.MONLIB,0,A.MOVBAN,A.MOVLIB) as atipmov,
							RTRIM(A.DESREF) as desmov, NVL(DECODE(C.DEBCRE,'D',A.MONLIB,A.MONLIB),0) as libros,
							NVL(DECODE(C.DEBCRE,'D',A.MONBAN,A.MONBAN*(-1)),0)  as bancos,
							RTRIM(B.NUMCUE) as cueban, B.NOMCUE as anomcue, B.ANTLIB as sallib, B.ANTBAN as salban,
							DECODE(A.MONLIB,0,A.MONBAN,A.MONLIB) as monmov, A.RESULT, C.DEBCRE FROM TSCONCIL A,TSTIPMOV C,TSDEFBAN B

							WHERE
							A.NUMCUE=B.NUMCUE AND
							B.NUMCUE >= '".$this->numcue1."' AND B.NUMCUE >= '".$this->numcue2."' AND
							RTRIM(DECODE(A.MONLIB,0,A.MOVBAN,A.MOVLIB))=RTRIM(C.CODTIP) AND
							RTRIM(A.NUMCUE) >= RTRIM('".$this->numcue1."') AND
							RTRIM(A.NUMCUE) >= RTRIM('".$this->numcue2."') AND
							RTRIM(A.RESULT) <> 'CONCILIADO' ORDER BY RTRIM(A.NUMCUE),A.FECLIB,A.REFERE,A.MOVLIB";*/

			$this->sql="SELECT RTRIM(A.NUMCUE) as numcue,
						A.REFERE as refere,
						case when A.MONLIB='0' then FECBAN else A.FECLIB end as afecmov,
						case when A.MONLIB='0' then A.MOVBAN else A.MOVLIB end as atipmov,
						RTRIM(A.DESREF) as desmov,
						coalesce(case when C.DEBCRE='D'then A.MONLIB else A.MONLIB end,0) as libros,
						coalesce(case when C.DEBCRE='D' then A.MONBAN else A.MONBAN*(-1) end,0) as bancos,
						RTRIM(B.NUMCUE) as cueban,
						B.NOMCUE as anomcue,
						B.ANTLIB as sallib,
						B.ANTBAN as salban,
						case when A.MONLIB='0' then A.MONBAN else A.MONLIB end as monmov,
						A.RESULT, C.DEBCRE
						FROM TSCONCIL A,TSTIPMOV C,TSDEFBAN B
							WHERE
							A.NUMCUE=B.NUMCUE AND
							B.NUMCUE >= '".$this->numcue1."' AND B.NUMCUE >= '".$this->numcue2."' AND
							RTRIM(case when A.MONLIB='0' then A.MOVBAN else A.MOVLIB end)=RTRIM(C.CODTIP) AND
							RTRIM(A.NUMCUE) >= RTRIM('".$this->numcue1."') AND
							RTRIM(A.NUMCUE) >= RTRIM('".$this->numcue2."') AND
							RTRIM(A.RESULT) <> 'CONCILIADO' ORDER BY RTRIM(A.NUMCUE),A.FECLIB,A.REFERE,A.MOVLIB" ;

							//print($this->sql);


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro. Cheque";
				$this->titulos[1]="Fecha";
				$this->titulos[2]="Tipo";
				$this->titulos[3]="Beneficiario";
				$this->titulos[4]="Monto";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i]+5,7,$this->titulos[$i]);
			}
			 $this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
			$this->Line(10,46,200,46);
   		    $this->ln();

		}



			function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->bd->validar();

			$this->setFont("Arial","B",8);

			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["numcue"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Banco  ");
				 $this->cell(20,4,"         ".$tb2->fields["anomcue"]);
				 $this->ln();
				 $this->cell(20,4,"Numero Cuenta   ");
				 $this->cell(20,4,"         ".$tb2->fields["numcue"]);
				 $this->ln();
				 $this->cell(20,4,"En el Mes de,");
				 $this->cell(20,4,"                ".$this->meses);
				 //$this->cell(20,4,"                ".$tb2->fields["meses"]);
				 $this->cell(20,4,"                 De");
				 $this->cell(20,4,"                        ".$this->anos);
				 //$this->cell(20,4,"                        ".$tb2->fields["anos"]);
				 $this->ln();
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
			}
			while(!$tb->EOF)
			{
				if($tb->fields["numcue"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
				 $this->ln();

				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"         TOTALES:                       ".$this->cont);
				 $this->cell(20,4,"                                                                                                                                               TOTAL BANCO                ".number_format($this->acum2,2,'.',','));
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Banco  ");
				 $this->cell(20,4,"         ".$tb->fields["anomcue"]);
				 $this->ln();
				 $this->cell(20,4,"Numero Cuenta   ");
				 $this->cell(20,4,"         ".$tb->fields["cueban"]);
				 $this->ln();
				/* $this->cell(20,4,"En el Mes de,");
				 $this->cell(20,4,"                ".$tb->fields["meses"]);
				 $this->cell(20,4,"                 De");
				 $this->cell(20,4,"                        ".$tb->fields["anos"]);*/

				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->ln();
		        }

				$ref=$tb->fields["numcue"];
				$this->setFont("Arial","",8);

				//Detalle

				 if (($tb->fields["atipmov"])=='CHQ') {
				 	$this->sql3 = "SELECT A.NOMBEN as nombre
				 		FROM OPBENEFI A, TSCHEEMI B
      					WHERE RTRIM(A.CEDRIF)=RTRIM(B.CEDRIF)AND
      					RPAD(B.NUMCHE,20,' ')=RPAD('".$tb->fields["refere"]."')";
      					$tb3=$this->bd->select($this->sql3);
      					$nombre=$tb3->fields["nombre"];
				 }
				 else{$nombre= $tb->fields["desmov"];}

						 $this->cell($this->anchos[0],5,$tb->fields["refere"]);
						 $this->cell($this->anchos[1],5,$tb->fields["afecmov"]);
		 				 $this->cell($this->anchos[2],5,$nombre);
						 $this->cell($this->anchos[3],5,$tb->fields["atipmov"]);
						 $this->cell($this->anchos[4],5,$tb->fields["anomben"]);
						 $this->cell($this->anchos[5],5,$tb->fields["libros"]);
						 $this->cont=($this->cont+1);
						 $this->cont1=($this->cont1+1);
		 				 $this->acum2=($this->acum2+$tb->fields["libros"]);
						 $this->cell(30,5,$this->acum2);
						 $this->ln();


				 $tb->MoveNext();
			 }
				 $this->SetLineWidth(0.5);
				 $this->ln();
          		 $this->Line(162,$this->GetY(),200,$this->GetY());
 				 $this->cell(20,4,"                                                                                                                                                      TOTAL                       ".number_format($this->acum2,2,'.',','));

		}

	}
?>