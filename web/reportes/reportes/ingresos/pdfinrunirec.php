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

				 $this->sql="
					SELECT distinct(CODUNI),
					DESUNI,
					REPUNI,
					DIRUNI,
					TELUNI,
					EXTUNI,
					FAXUNI,
					EMAUNI
					FROM INUNIREC
					WHERE CODUNI>='".$this->cod1."'  AND
					CODUNI<='".$this->cod2."'  AND
					DESUNI>='".$this->des1."'  AND
					DESUNI<='".$this->des2."'
					ORDER BY CODUNI";


					//print ($this->sql);
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
			$this->cell(30,5,"DESCRIPCION: ");
		$this->Setx(70);
			$this->cell(20,5,"REPRESENTANTE: ");
		$this->Setx(100);
			$this->cell(20,5,"DIRECCIÓN: ");
		$this->Setx(130);
			$this->cell(25,5,"TELEFONO");
		$this->Setx(155);
			$this->cell(25,5,"EXTENSIÓN");
		$this->Setx(180);
			$this->cell(20,5,"FAX");

			$this->Setx(200);
			$this->cell(20,5,"EMAIL ");

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
						$this->cell(20,5,$tb->fields["coduni"]);// codigo
						$this->Setx(30);
						$this->cell(20,5,$tb->fields["desuni"]);//descripcion
					   $this->Setx(70);
						$this->cell(20,5,$tb->fields["repuni"]);//representante

			        	$this->Setx(100);
						$this->cell(20,5,$tb->fields["diruni"]);//fre

						$this->Setx(130);
						$this->cell(20,5,$tb->fields["teluni"]);// inicio del periodo

				    	$this->Setx(155);

				    	$this->cell(20,5,$tb->fields["extuni"]);// inicio del periodo

						$this->Setx(180);
						$this->cell(20,5,$tb->fields["faxuni"]);//fin del periodo
						$this->Setx(200);

						$this->cell(20,5,$tb->fields["emauni"]);// fecaha ultima factura



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