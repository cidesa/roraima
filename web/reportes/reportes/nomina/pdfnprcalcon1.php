<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{



		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->pcodnom=$_POST["pcodnom"];
			$this->pcodnom1=$_POST["pcodnom1"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];

			$this->pag = true;

			$this->sql="SELECT
						A.CODNOM as codnom,
						B.NOMNOM as nomnom,
						A.CODCON as codcon,
						C.NOMCON as nomcon,
						A.NUMCON,
						A.CAMPO as campo,
						A.OPERADOR as operador,
						A.VALOR as valor,
						A.CONFOR as confor
						FROM NPCALCON A, NPNOMINA B, NPDEFCPT C
						WHERE
						RTRIM(A.CODNOM) = RTRIM(B.CODNOM) AND
						RTRIM(A.CODCON) = RTRIM(C.CODCON)  AND
						RTRIM(A.CODNOM) >= RTRIM('".$this->pcodnom."') AND
						RTRIM(A.CODNOM) <= RTRIM('".$this->pcodnom1."') AND
						RTRIM(A.CODCON) >= RTRIM('".$this->codcondes."') AND
						RTRIM(A.CODCON) <= RTRIM('".$this->codconhas."')
						ORDER BY A.CODNOM, A.CODCON,NUMCON";

			#print $this->sql;exit;

			$this->cab=new cabecera();
			$this->tb=$this->bd->select($this->sql);

		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$this->titulo,"l","s");


			if ($this->pag)
			{
				$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
					$this->ln();
					$this->setFont('arial',"B",9);
					$this->setXY(15,28);
					$this->cell(45,5,'Nómina y Personal');

				   $this->setFont('arial',"B",9);
					$this->setXY(15,28);
					$this->cell(0,5,'CALCULO DE CONCEPTOS',0,0,'C');

					$this->setFont('arial',"B",8);
					$this->setXY(15,38);
					$this->cell(100,5,'De la nomina:   '.$this->pcodnom.'     a la nomina:   '.$this->pcodnom1 );
					$this->setXY(20,45);
					$this->cell(60,5,'Nomina:   '.$this->tb->fields["nomnom"]);

					$this->setXY(20,52);
					$this->cell(50,5,'Codigo Concepto');$this->cell(50,5,'Nombre Concepto');
					$this->setXY(35,57);
					$this->cell(20,5,'Campo');$this->cell(20,5,'Valor');$this->cell(20,5,'Operador');$this->cell(20,5,'Condicion');



					$this->rect(15,45,185,220);
					$this->line(18,51,197,51);
					$this->line(18,63,197,63);
					$this->setY(65);
			}




		}
		function Cuerpo()
		{

			$tb=$this->tb;
			$codnom = $tb->fields["codnom"];
			$codcon = $tb->fields["codcon"];
			if (!$tb->EOF)
					{
						$this->setX(28);
						$this->cell(45,4,$tb->fields["codcon"]);
						$this->cell(80,4,$tb->fields["nomcon"]);
						$this->ln(6);

					}

				while (!$tb->EOF)
				{
					if ($codnom==$tb->fields["codnom"])
					{

						if ($codcon!=$tb->fields["codcon"])
						{
							$this->ln(2);
							$this->setX(28);
							$this->cell(45,4,$tb->fields["codcon"]);
							$this->cell(80,4,$tb->fields["nomcon"]);
								$this->line(18,$this->gety(),197,$this->gety());
							$this->ln(6);

						}
						//Detalle PRESUPUESTO DE GASTOS

						$this->setX(37);
						$this->cell(20,4,$tb->fields["campo"]);
						$this->cell(20,4,$tb->fields["valor"]);
						$this->cell(20,4,$tb->fields["operador"]);
						$this->cell(80,4,$tb->fields["confor"]);
						$this->ln(4);

						$codcon = $tb->fields["codcon"];
					}else
					{
						$this->AddPage();
						if ($codcon!=$tb->fields["codcon"])
						{
							$this->ln(2);
							$this->setX(28);
							$this->cell(45,4,$tb->fields["codcon"]);
							$this->cell(80,4,$tb->fields["nomcon"]);
							$this->ln(6);

						}


						$this->setX(37);
						$this->cell(20,4,$tb->fields["campo"]);
						$this->cell(20,4,$tb->fields["valor"]);
						$this->cell(40,4,$tb->fields["operador"]);
						$this->cell(80,4,$tb->fields["confor"]);
						$this->ln(4);


						$codcon = $tb->fields["codcon"];
					}

					$codnom = $tb->fields["codnom"];
					$tb->MoveNext();


				}
		}
	}
?>
