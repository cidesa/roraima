<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
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
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codesde;
		var $codhasta;
		var $conf;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesde=H::GetPost("codartdes");
			$this->codhasta=H::GetPost("codarthas");
			$this->codubides=H::GetPost("codubides");
			//$this->codubihas=H::GetPost("codubihas");
			$this->sql="SELECT DISTINCT
			(A.CODART) as codart,
			A.DESART as desart,
			C.EXIACT as exitot,
			A.UNIMED as unimed,D.NOMUBI,
			B.PTOREO as ptoreo, B.eximin, B.eximax
			FROM CAREGART A, CAARTALM B, caartalmubi C,CADEFUBI D
			WHERE
			(A.CODART)= (B.CODART) AND
			(A.CODART) >= ('".$this->codesde."') AND
			(A.CODART) <= ('".$this->codhasta."') AND
			(C.CODUBI) = ('".$this->codubides."') AND
			A.CODART=C.CODART AND B.CODALM=C.CODALM AND  C.CODUBI=D.CODUBI AND C.EXIACT>0
			ORDER BY A.DESART,A.CODART
";
						//print '<pre>'; print $this->sql; exit;


		}


		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s");
			$this->setFont("Arial","B",9);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			$total=0;
			$i=0;
			//$this->ln();
			$this->cell(0,5,$tb->fields["nomubi"],0,0,'C');
			$this->ln();
			$this->setwidths(array(20,60,25,25,15,25,15));
            $this->setaligns(array("L","L","C","R","C","R","C"));
            $this->rowm(array("Codigo","Descripcion","Unidad Medida","Exist. Actual","Min","Pto. Reorden","Max"));
			$this->ln(4);
			$this->Line(10,$this->gety(),200,$this->gety());
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5);


			while(!$tb->EOF)

			{
				$i++;
				$this->setFont("Arial","",8);
			    $this->setwidths(array(20,60,25,25,15,25,15));
                $this->setaligns(array("L","L","C","R","C","R","C"));
                $this->rowm(array($tb->fields["codart"],$tb->fields["desart"],$tb->fields["unimed"],H::FormatoMonto($tb->fields["exitot"]),H::FormatoMonto( $tb->fields["eximin"]),H::FormatoMonto($tb->fields["ptoreo"]),H::FormatoMonto($tb->fields["eximax"])));
                $total+=$tb->fields["exitot"];
				$tb->MoveNext();
			    $this->ln(3);
			}

			$this->ln();
			$this->line(10,$this->gety(),205,$this->gety());
			$this->setwidths(array(20,60,25,25,15,25,15));
            $this->setaligns(array("L","L","C","R","C","R","C"));
            $this->rowm(array("Cantidad:",H::FormatoMonto($i),"TOTAL: ",H::FormatoMonto($total),"","",""));
            $total=0;

		}
	}
?>