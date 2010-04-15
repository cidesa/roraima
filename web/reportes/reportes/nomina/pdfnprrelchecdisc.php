<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sql;
		var $tipgas;
		var $banco;
		var $generar;
		var $cta;
		var $fecdes;
		var $fechas;
		var $nom;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
 			$this->banco=$_POST["banco"];
			$this->tipgas=$_POST["tipgas"];
			$this->generar=$_POST["generar"];
			$this->cta=$_POST["cta"];
			$this->fecdes=$_POST["fecdes"];
			$this->fechas=$_POST["fechas"];


			$this->sql="SELECT A.NACEMP,A.CEDEMP as CODEMP, A.CODEMP as IDEMP, B.CODNOM,
					 A.NOMEMP, NUMCUE, D.CODBAN as CODBAN, B.CODCAR, C.NOMCAR, B.CODTIPGAS,
					SUM(coalesce(MONTONOMINA,0)) as MONTO
					FROM NPHOJINT A, NPASICAREMP B, NPCARGOS C , NPBANCOS D
					WHERE A.CODTIPPAG=RTRIM('02') and
					B.CODEMP = A.CODEMP AND B.CODCAR=C.CODCAR AND
					B.CODTIPGAS='".$this->tipgas."' AND
					STATUS='V'
					AND A.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S')
					AND NUMCUE IS NOT NULL
					GROUP BY B.CODNOM,D.CODBAN,B.CODTIPGAS,A.CEDEMP,A.CODEMP,A.NOMEMP,
					B.CODCAR,C.NOMCAR,NUMCUE,A.NACEMP
					ORDER BY  B.CODNOM, D.CODBAN, RTRIM(A.CODEMP);";
					//print '<pre>';print  $this->sql;exit;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CEDULA";
				$this->titulos[1]="NOMBRE DEL EMPLEADOR";
				$this->titulos[2]="CARGOS";
				$this->titulos[3]="";
				$this->titulos[4]="MONTO";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","",8);
		}

		function PreCuerpo()
		{
			$this->setFont("Arial","",7);
			$this->ln();
			$this->cell(13,6,$this->titulos[0]);
			$this->cell(65,6,$this->titulos[1]);
			$this->cell(60,6,$this->titulos[2]);
			$this->cell(30,6,$this->titulos[3]);
			$this->cell(15,6,$this->titulos[4]);
			$this->ln(4);
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);

		}

		function Cuerpo()
		{
			//$banco=$_POST["banco"];
			$this->setFont("Arial","",7);
		    $tb=$this->bd->select($this->sql);
		    $tb=$this->bd->select($this->sql);
			$this->cell(15,6,"NOMINA :".$tb->fields["codnom"]);
		    $nom=$tb->fields["codnom"];
			$this->sql2="SELECT to_char(ULTFEC,'dd/mm/yyyy') as ultfec,
					 to_char(PROFEC,'dd/mm/yyyy') as profec FROM NPNOMINA
					 WHERE CODNOM='".$tb->fields["codnom"]."';";
  			$tb2=$this->bd->select($this->sql2);
   			$this->ln();
   			$this->cell(13,6,"Desde: ".$tb2->fields["ultfec"]. "       Hasta : ".$tb2->fields["profec"]);

		    $this->PreCuerpo();
		     $nom=$tb->fields["codnom"];
		    $cont=0;
			$acum=0;
			while (!$tb->EOF)
			{
				if ($tb->fields["codnom"]==$nom)
				{
				$cont=$cont+1;
				$cont2=$cont2+1;
				$this->cell(13,6,$tb->fields["codemp"]);
				$this->cell(65,6,$tb->fields["nomemp"]);
				$this->cell(60,6,$tb->fields["nomcar"]);
				$this->cell(30,6,$tb->fields["numcue"]);
				$acum=$acum+$tb->fields["monto"];
				$acum2=$acum2+$tb->fields["monto"];
				$this->cell(15,6,number_format($tb->fields["monto"],2,'.',','),0,0,'R');
				$this->ln(4);
				$tb->MoveNext();}
				else
				{

					$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
				  $this->ln(4);
				  $this->sql3="SELECT nomnom as nombre FROM NPNOMINA
					 WHERE CODNOM='".$nom."';";
  				  $tb3=$this->bd->select($this->sql3);
				  $this->cell(13,6,"Total   ".$tb3->fields["nombre"]."   ".number_format($acum2,2,'.',','));
			//    $this->cell(13,6,);
				$this->ln(4);
				$this->cell(13,6,"Cantidad de Trabajadores de la nomina: ".$cont2);

				$this->AddPage();
				//$this->cell(13,6,$tb->fields["codnom"]);
				$this->cell(15,6,"NOMINA :".$tb->fields["codnom"]);
		    	$nom=$tb->fields["codnom"];
				$this->sql2="SELECT to_char(ULTFEC,'dd/mm/yyyy') as ultfec,
					 to_char(PROFEC,'dd/mm/yyyy') as profec FROM NPNOMINA
					 WHERE CODNOM='".$tb->fields["codnom"]."';";
  				$tb2=$this->bd->select($this->sql2);
   				$this->ln();
   				$this->cell(13,6,"Desde: ".$tb2->fields["ultfec"]. "       Hasta : ".$tb2->fields["profec"]);
				$this->ln();
				  $this->PreCuerpo();
				//  $nom=$tb->fields["codnom"];
				  $cont2=0;
				  $acum2=0;
				 }


			}


			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			$this->ln(4);
				  $this->sql3="SELECT nomnom as nombre FROM NPNOMINA
					 WHERE CODNOM='".$nom."';";
  				  $tb3=$this->bd->select($this->sql3);
				  $this->cell(13,6,"Total Nomina ".$tb3->fields["nombre"]."   ".number_format($acum2,2,'.',','));
			//    $this->cell(13,6,);
				$this->ln(4);
				$this->cell(13,6,"Cantidad de Trabajadores de la nomina: ".$cont2);

		//	$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+195,$this->GetY()+1);
			$this->ln(14);

			$this->sql5="SELECT DISTINCT(NOMBAN) as nombre FROM NPBANCOS WHERE CODBAN='".$this->banco."';";
  			$tb5=$this->bd->select($this->sql5);
			//print $this->sql5;
			$this->cell(13,6,"Total Banco ".$tb5->fields["nombre"]."   ".number_format($acum,2,'.',','));
		    $this->ln(4);
			$this->cell(13,6,"Cantidad de Trabajadores Total : ".$cont);




		}
	}
?>
