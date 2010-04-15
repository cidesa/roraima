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
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $art1;
		var $art2;
		var $exitot1;
		var $exitot2;
		var $comodin;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->art1=$_POST["art1"];
			$this->art2=$_POST["art2"];
			$this->exitot1=$_POST["exitot1"];
			$this->exitot2=$_POST["exitot2"];
			$this->comodin=$_POST["comodin"];
			$this->sql="SELECT
							A.CODART as articulo,
							substr(A.DESART,1,40) as des,
							A.CODCTA as codcta,
							A.CODPAR as par,
							A.EXITOT as exi,
							A.UNIMED as medida, b.nomram
						FROM CAREGART A join caramart b on a.ramart=b.ramart
						WHERE
							A.CODART >= ('".$this->art1."') AND
							A.CODART <= ('".$this->art2."') AND
							A.EXITOT >= ('".$this->exitot1."') AND
							A.EXITOT <= ('".$this->exitot2."') and
							a.codpar like '$this->comodin'
						GROUP BY A.CODART,A.DESART,A.CODCTA,A.CODPAR,A.EXITOT,A.UNIMED, b.nomram
                                          order by a.codart"; 
//print '<pre>' ;print $this->sql; exit;

			$this->llenartitulosmaestro();
			$this->setAutoPAgeBreak(true,30);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Artículo";
				$this->titulos[1]="Descripción Artículo";
				$this->titulos[2]="Unidad Medida";
				$this->titulos[3]="Código Contable";
				$this->titulos[4]="Código Partida";
				$this->titulos[5]="Rama del Artículo";
				$this->titulos[6]="Existencia Total";
				$this->anchos[0]=30;
				$this->anchos[1]=60;
				$this->anchos[2]=30;
				$this->anchos[3]=40;
				$this->anchos[4]=30;
				$this->anchos[5]=40;
				$this->anchos[6]=18;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(8);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$tb;
		    $this->tb2=$tb;
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);

				$this->setwidths(array(30,60,30,40,30,40,18));
                            $this->setaligns(array("L","L","C","L","C","L","R"));
                            $this->rowm(array($tb->fields["articulo"],$tb->fields["des"],$tb->fields["medida"],$tb->fields["codcta"],$tb->fields["par"],$tb->fields["nomram"],H::Formatomonto($tb->fields["exi"])));

				 $tb->MoveNext();
				 $y=$this->GetY();
			    $this->ln(3);
			}
		}
	}
?>