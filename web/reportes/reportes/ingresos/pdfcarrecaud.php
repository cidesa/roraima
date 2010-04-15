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


				 $this->sql="
				 		SELECT
						distinct(CODREC),
						DESREC,
						case when LIMREC='S' then 'SI' else 'NO' end as LIMREC
						FROM CARECAUD
						WHERE
						RPAD('".$this->cod1."',10,' ') >= RPAD('".$this->cod1."',10,' ') AND
						RPAD('".$this->cod2."',10,' ') <= RPAD('".$this->cod2."',10,' ')
						ORDER BY CODREC";

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
			$this->cell(20,5,"CODIGO DEL RECAUDO: ");

		$this->Setx(70);
			$this->cell(20,5,"REPRESENTANTE RECAUDO: ");

		$this->Setx(180);
			$this->cell(25,5,"LIMITANTE");

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
						$this->cell(20,5,$tb->fields["codrec"]);// codigo


					   $this->Setx(180);
						$this->cell(20,5,$tb->fields["limrec"]);//representante

						$this->Setx(70);
						$this->multicell(90,3,$tb->fields["desrec"]);//descripcion


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