<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $cod1;
		var $cod2;
		var $des1;
		var $des2;
		var $nac;
		var $nacionalidad;
		var $exit1;
		var $exit2;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->des1=$_POST["des1"];
			$this->des2=$_POST["des2"];
			$this->exit1=$_POST["exit1"];
			$this->exit2=$_POST["exit2"];


				 $this->sql=" SELECT
				 				A.CODESP,
								A.DESESP,
								A.UNIMED,
								A.UNIALT,
								A.EXITOT,
								A.RELART
								FROM INREGESP A
								WHERE
								A.CODESP >= RPAD('".$this->cod1."',20,' ') AND
								A.CODESP <= RPAD('".$this->cod2."',20,' ') AND
								A.DESESP>='".$this->des1."' AND
								A.DESESP<='".$this->des2."'  AND
								A.EXITOT >='".$this->exit1."' AND
								A.EXITOT <='".$this->exit2."'
								ORDER BY A.CODESP";

				//	print ($this->sql);
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);
		}

	function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			$this->SetTextColor(135,0,0);
		    $this->setFont("Arial","B",8);
			$this->Line(10, $this->getY(),210,$this->getY());

// aqui van los titulos

			$this->setFont("Arial","B",7);
			$this->SetTextColor(0,0,128);
		$this->Setx(10);
			$this->cell(20,5,"CODIGO: ");
		$this->Setx(30);
			$this->cell(60,5,"DESCRIPCION: ");
		$this->Setx(95);
			$this->cell(20,5,"UNIDAD DE ");
		$this->Setx(125);
			$this->cell(20,5,"UNIDAD ");
		$this->Setx(150);
			$this->cell(25,5,"RELACION");
		$this->Setx(180);
			$this->cell(25,5,"EXISTENCIA");

		$this->ln(5);

		$this->Setx(90);
			$this->cell(20,5,"MEDIDA");

			$this->Setx(120);
			$this->cell(20,5,"ALTERNA ");

			 $this->ln(4);
			 $this->Line(10, $this->getY()+3,210,$this->getY()+3);
			 $this->Sety(50);
		}

		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$this->SetFillColor(255,255,255);
		    $tb=$this->bd->select($this->sql);

		 while(!$tb->EOF)
			 {


						$this->Setx(10);
						$this->cell(20,5,$tb->fields["codesp"]);// codigo
						$this->Setx(30);
						$this->cell(20,5,$tb->fields["desesp"]);//descripcion
						$this->Setx(95);
						$this->cell(20,5,number_format($tb->fields["unimed"],2,'.',','),0,0,'R');//representante

			        	$this->Setx(125);
						$this->cell(20,5,number_format($tb->fields["unialt"],2,'.',','),0,0,'R');//fre

						$this->Setx(170);
						$this->cell(20,5,number_format($tb->fields["exitot"],2,'.',','),0,0,'R');// inicio del periodo

				    	$this->Setx(145);

				    	$this->cell(20,5,$tb->fields["relart"]);// inicio del periodo




  			  $this->ln(3);

			  $tb->MoveNext();
  			  $this->ln(3);
  		  	}	//end while

//totales
			if ($this->getY() >230 )
			{
				$this->AddPage();
			}
			 $this->ln(4);



		}
	}
?>