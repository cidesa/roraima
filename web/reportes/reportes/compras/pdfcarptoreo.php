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
			$this->sql="SELECT
							A.CODART as codart,
							A.DESART as desart,
							A.EXITOT as exitot,
							A.UNIMED as unimed,
							B.PTOREO as ptoreo
						FROM CAREGART A, CAARTALM B
						WHERE
							(A.CODART)= (B.CODART) AND
							(A.CODART) >= ('".$this->codesde."') AND
							(A.CODART) <= ('".$this->codhasta."') AND
							A.EXITOT <= B.PTOREO
						ORDER BY A.CODART";
						//print '<pre>'; print $this->sql; exit;


		}


		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s");
			$this->setFont("Arial","B",9);
			$this->setwidths(array(40,70,25,25,25));
            $this->setaligns(array("L","L","C","R","R"));
            $this->rowm(array("Codigo","Descripcion","Unidad Medida","Exist. Actual","Pto. Reorden"));
			$this->ln(4);
			$this->Line(10,45,200,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{	$this->setFont("Arial","",8);
			    $this->setwidths(array(40,70,25,25,25));
                $this->setaligns(array("L","L","C","R","R"));
                $this->rowm(array($tb->fields["codart"],$tb->fields["desart"],$tb->fields["unimed"],$tb->fields["exitot"],$tb->fields["ptoreo"]));
				$tb->MoveNext();
			    $this->ln(3);
			}
		}
	}
?>