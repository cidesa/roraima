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
						A.CODART as articulo,
						A.DESART as des,
						A.EXITOT as exiact,
						A.UNIMED as unimed,
						B.EXIMAX as eximax
 						FROM
						CAREGART A,
						CAARTALM B
						WHERE
						A.CODART= B.CODART AND
						A.CODART >= ('".$this->codesde."') AND
						A.CODART <= ('".$this->codhasta."')AND
						A.EXITOT >= B.EXIMAX 
						ORDER BY A.CODART";


			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo";
				$this->titulos[1]="Descripcion";
				$this->titulos[2]="Unidad Medida";
				$this->titulos[3]="Exis. Actual";
				$this->titulos[4]="Stock Maximo";
				$this->anchos[0]=25;
				$this->anchos[1]=68;
				$this->anchos[2]=45;
				$this->anchos[3]=30;
				$this->anchos[4]=30;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
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
			{
				$this->setFont("Arial","",8);
		/*	 $this->cell($this->anchos[0],10,$tb->fields["articulo"]);
				 $this->cell($this->anchos[1],10,$tb->fields["des"]);
				 $this->cell($this->anchos[2]+10,10,$tb->fields["unimed"]);
				 $this->cell($this->anchos[3],10,H::FormatoMonto($tb->fields["exiact"]));
				 $this->cell($this->anchos[4],10,H::FormatoMonto($tb->fields["eximax"]));*/
				    $this->setwidths(array(25,68,38,30,30));
$this->setaligns(array("L","L","C","R","R"));
//$this->Setborder(true);
$this->rowm(array($tb->fields["articulo"],$tb->fields["des"],$tb->fields["unimed"],H::FormatoMonto($tb->fields["exiact"]),H::FormatoMonto($tb->fields["eximax"])));

			    $tb->MoveNext();
			    $this->ln(4);
			}
		}
	}
?>