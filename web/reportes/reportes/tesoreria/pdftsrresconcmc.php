<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
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
		var $ncta1;
		var $ncta2;
		var $mes1;
		var $meshas;
		var $ano1;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcue1=$_POST["numcue1"];
			$this->numcue2=$_POST["numcue2"];
			$this->mes1=$_POST["mes1"];
			$this->mes2=$_POST["mes2"];
			$this->ano1=$_POST["ano1"];
			$this->result=$_POST["result"];
			$this->tipmov=$_POST["tipmov"];
	
			if($this->result=='T')
			{
				$sqlresult="";
			}else
			{
				$sqlresult="A.RESULT='".$this->result."' AND";
			}
			if($this->tipmov=='T')
			{
				$sqltipmov="";
			}else
			{
				$sqltipmov="A.MOVLIB='".$this->tipmov."' AND";
			}



				$this->sql="SELECT distinct A.NUMCUE as anumcue,B.NOMCUE as anomcue,A.REFERE as arefere, to_char(A.FECLIB,'DD/MM/YYYY') as afeclib,
							to_char(A.FECBAN,'DD/MM/YYYY') as afecban,(A.MONLIB-A.MONBAN) as dif,A.MOVLIB as amovlib,A.MOVBAN as amovban,RTRIM(A.DESREF) as adesref,
							A.MONLIB as amonlib,A.MONBAN as amonban,A.RESULT as aresult from TSCONCIL A, TSDEFBAN B WHERE
							A.NUMCUE = B.NUMCUE  AND
							RTRIM(A.NUMCUE) >= RTRIM('".$this->numcue1."') AND
							RTRIM(A.NUMCUE) <= RTRIM('".$this->numcue2."')  AND
							$sqlresult
							$sqltipmov
							COALESCE(TO_CHAR(A.FECLIB,'MM'),TO_CHAR(A.FECBAN,'MM'))>='".$this->mes1."' AND
							COALESCE(TO_CHAR(A.FECLIB,'MM'),TO_CHAR(A.FECBAN,'MM'))<='".$this->mes2."'
							GROUP BY anumcue,anomcue,arefere,afeclib,afecban,amovlib,amovban,adesref,amonlib,amonban,aresult";
							/*order BY RTRIM(A.NUMCUE),A.REFERE,A.FECLIB,A.FECBAN,A.MOVLIB,A.MOVBAN,A.RESULT*/
							#print '<pre>';print $this->sql;exit;

				/*$this->sql="SELECT distinct(A.NUMCUE) as NUMCUE,B.NOMCUE,
							A.REFERE,to_char(A.FECLIB,'DD/MM/YYYY') as afeclib,to_char(A.FECBAN,'DD/MM/YYYY') as afecban,
							A.MOVLIB,A.MOVBAN,RTRIM(A.DESREF) as DESREF,A.MONLIB,A.MONBAN,A.RESULT
							FROM TSCONCIL A,TSDEFBAN B
							WHERE RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RTRIM(A.NUMCUE) >= RTRIM('".$this->numcue1."') AND
							RTRIM(A.NUMCUE) <= RTRIM('".$this->numcue2."') AND
							((TO_CHAR(A.FECLIB,'MM')=RTRIM('".$this->mes1."') AND
							TO_CHAR(A.FECLIB,'MM')=RTRIM('".$this->mes2."') ) OR
							(TO_CHAR(A.FECBAN,'MM')=RTRIM('".$this->mes1."') AND
							TO_CHAR(A.FECBAN,'MM')=RTRIM('".$this->mes2."') ))";
							ORDER BY RTRIM(A.NUMCUE),A.REFERE,A.FECLIB,A.FECBAN,
							A.MOVLIB,A.MOVBAN,A.RESULT*/

							#print "<pre>".$this->sql;
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);
			$this->llenartitulosmaestro();

		}

			function llenartitulosmaestro()
				{

				$this->titulos[0]="Referencia";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Fecha Libro";
				$this->titulos[3]="Fecha Banco";
				$this->titulos[4]="Tipo Libro";
				$this->titulos[5]="Tipo Banco";
				$this->titulos[6]="Monto Libro";
				$this->titulos[7]="Monto Banco";
				$this->titulos[8]="Diferencia";
				$this->titulos[9]="Resultado";

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->setFont("Arial","B",9);
			$this->cell(100,5,"Período: ".H::ObtenerMesenLetras($this->mes1)." - ".H::ObtenerMesenLetras($this->mes2)." - ".$this->ano1);
			$this->ln();
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{

				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			for($i=0;$i<$ncampos2;$i++)
			{

				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->Line(10,45+5,270,45+5);
			$this->ln(10);
		}


			function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			if(!$tb2->EOF)
			{
				 $ref=$tb2->fields["anumcue"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Banco   ");
 		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb2->fields["anomcue"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Número Cuenta  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb2->fields["anumcue"]);
				 $this->ln();
				 $this->ln();


			}
			while(!$tb->EOF)
			{
				if($tb->fields["anumcue"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
				 $this->ln();
				 $this->SetLineWidth(0.5);
           		 $this->Line(162,$this->GetY(),230,$this->GetY());
				 $this->cell(20,4,"                                                                                                                                                                      TOTALES:         ".number_format($this->acum1,2,'.',','));
				 $this->cell(20,4,"                                                                                                                                                                                                       ".number_format($this->acum2,2,'.',','));
				 $this->cell(20,4,"                                                                                                                                                                                                            ".number_format($this->acum3,2,'.',','));
				 $this->ln();
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
           		 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Banco   ");
 		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb->fields["anomcue"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Número Cuenta  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb->fields["anumcue"]);
				 $this->ln();
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->ln();
		        }
				$ref=$tb->fields["anumcue"];
				$this->setFont("Arial","",8);
				//Detalle
				 $aux=$tb->fields["adesref"];
      			 $this->cell($this->anchos[0],4," ".$tb->fields["arefere"]);
      			 $this->cell($this->anchos[1]+3,4,"".substr($aux,0,20));
				 $this->cell($this->anchos[2],4,"".$tb->fields["afeclib"]);
				 $this->cell($this->anchos[3],4,"".$tb->fields["afecban"]);
				 $this->cell($this->anchos[4],4,"".$tb->fields["amovlib"]);
				 $this->cell($this->anchos[5]-5,4,"".$tb->fields["amovban"]);
				 $this->cell($this->anchos[6],4,"".H::FormatoMonto($tb->fields["amonlib"]),0,0,'R');
				 $this->cell($this->anchos[7],4,"".H::FormatoMonto($tb->fields["amonban"]),0,0,'R');
				 $this->cell($this->anchos[6]-3,4,"".H::FormatoMonto($tb->fields["dif"]),0,0,'R');
				 $this->cell(12,4,"",0,0,'R');
				 $this->cell($this->anchos[9],4,"".$tb->fields["aresult"]);
 				 $this->acum1=($this->acum1+$tb->fields["amonlib"]);
 				 $this->acum2=($this->acum2+$tb->fields["amonban"]);
 				 $this->acum3=($this->acum3+$tb->fields["dif"]);
				 $tb->MoveNext();
				 $y=$this->GetY();
				 $this->ln();
				 if ($y>170)
				 {
				 	$this->AddPage();
				 }

			 }
				 $this->SetLineWidth(0.5);
				 $this->ln();
           		 $this->Line(150,$this->GetY(),230,$this->GetY());
           		 $this->SetX(130);
 				 $this->cell(20,4,"TOTALES:");
 				 $this->cell($this->anchos[6],4,"".H::FormatoMonto($this->acum1),0,0,'R');
				 $this->cell($this->anchos[7],4,"".H::FormatoMonto($this->acum2),0,0,'R');
				 $this->cell($this->anchos[7]-5,4,"".H::FormatoMonto($this->acum3),0,0,'R');

		}
		}


?>