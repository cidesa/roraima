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
			$this->codesde=H::GetPost("codesde");
			$this->codhasta=H::GetPost("codhasta");
			$this->sql="SELECT
							A.CODART as codart,
							substr(A.DESART,1,30) as desart
						FROM  CAREGART A
						WHERE
							A.CODART >= '".$this->codesde."' AND
							A.CODART <= '".$this->codhasta."' ORDER BY A.CODART";

		}

		function Header()
		{
				$this->line(10,10,200,10);
				$this->line(10,10,10,255);
				$this->Image("../../img/logo_1.jpg",13,12,20);
				$this->Image("../../img/logo_1.jpg",103,12,20);
				$this->line(100,10,100,255);
				$this->line(200,10,200,255);
				$this->line(10,45,200,45);
				$this->line(10,80,200,80);
				$this->Image("../../img/logo_1.jpg",13,47,20);
				$this->Image("../../img/logo_1.jpg",103,47,20);
				$this->line(10,115,200,115);
				$this->Image("../../img/logo_1.jpg",13,82,20);
				$this->Image("../../img/logo_1.jpg",103,82,20);
				$this->line(10,150,200,150);
				$this->Image("../../img/logo_1.jpg",13,117,20);
				$this->Image("../../img/logo_1.jpg",103,117,20);
				$this->line(10,185,200,185);
				$this->Image("../../img/logo_1.jpg",13,152,20);
				$this->Image("../../img/logo_1.jpg",103,152,20);
				$this->line(10,220,200,220);
				$this->Image("../../img/logo_1.jpg",13,187,20);
				$this->Image("../../img/logo_1.jpg",103,187,20);
				$this->line(10,255,200,255);
				$this->Image("../../img/logo_1.jpg",13,222,20);
				$this->Image("../../img/logo_1.jpg",103,222,20);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$cont=2;
			while(!$tb->EOF)
			{
			 if(($cont%2)==0)
			 {
				$this->setFont("Arial","B",8);
				//$this->SetXY(10,10);
				$this->cell(60,20,'                                Codigo Articulo');
				$y1=$this->getY();
				$this->ln(5);
				$this->setFont("Arial","",8);
				$this->cell(60,20,'                                '.$tb->fields["codart"]);
				$y2=$this->getY();
				$this->ln(5);
				$this->setFont("Arial","B",8);
				$this->cell(60,20,'                                Descripcion Articulo');
				$y3=$this->getY();
				$this->ln(5);
				$this->setFont("Arial","",8);
				$this->cell(60,20,'                                '.$tb->fields["desart"]);
				$y4=$this->getY();
			 }
			 else
			  {
				$this->setFont("Arial","B",8);
				$this->SetXY(103,$y1);
				$this->cell(103,20,'                                 Codigo Articulo');
				$this->ln(5);
				$this->SetXY(103,$y2);
				$this->setFont("Arial","",8);
				$this->cell(103,20,'                                 '.$tb->fields["codart"]);
				$this->ln(5);
				$this->SetXY(103,$y3);
				$this->setFont("Arial","B",8);
				$this->cell(103,20,'                                 Descripcion Articulo');
				$this->ln(5);
				$this->SetXY(103,$y4);
				$this->setFont("Arial","",8);
				$this->cell(103,20,'                                 '.$tb->fields["desart"]);
			  }
			  $cont=$cont+1;
			  $tb->MoveNext();
			  $this->ln(20);
			}
		}
	}
?>