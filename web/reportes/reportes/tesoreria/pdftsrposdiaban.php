<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrposdiaban.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cabe='s';
			$this->index=0;
			$this->numcuedes= H::GetPost('numcuedes');
			$this->numcuehas= H::GetPost('numcuehas');
			$this->fecregdes = H::GetPost('fechades');
			$this->fecreghas = H::GetPost('fechahas');

			$this->objTsrposdiaban = new Tsrposdiaban();
			$this->arrp = $this->objTsrposdiaban->SQLp($this->numcuedes,$this->numcuehas,$this->fecregdes,$this->fecreghas);
			

		}

		function header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->SetLineWidth(0.4);
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setTextColor(0,0,155);
			$i=$this->index;
			$this->setFont("Arial","B",9);
			$this->setXY(15,40);
			$this->cell(45,4,"  Al Dia:   ".date("d/m/Y",strtotime($this->arrp[$i]["feclib"])));
			$this->ln(6);
			$this->cell(5,4,"");
			$this->cell(40,4,"BANCO");
			$this->cell(30,4,"NUMERO");
			$this->cell(25,4,"SALDO");
			$this->cell(55,4,"INGRESOS",0,0,"C");
			$this->cell(50,4,"EGRESOS");
			$this->cell(30,4,"SALDO");
			$this->cell(30,4,"SALDO");
			$this->ln(4);
			$this->cell(3,4,"");
			$this->cell(40,4,"");
			$this->cell(30,4,"DE CUENTA");
			$this->cell(25,4,"ANTERIOR");
			$this->cell(55,4,"");
			$this->cell(47,4,"");
			$this->cell(30,4,"ACTUAL S/LIB");
			$this->cell(30,4,"ACTUAL S/BCOS");
			$this->rect(10,35,260,20);
			$this->ln(7);

		}

		function Cuerpo()
		{
			$i=0;
			$this->setTextColor(0,0,0);
			$this->setWidths(array(40,30,25,50,50,30,30));
			$this->setAligns(array("L","L","R","R","R","R","R"));
			$tot_salant = 0;
			$tot_ingresos = 0;
			$tot_egresos = 0;
			$tot_salactsls = 0;
			$tot_salactsb = 0;

			foreach($this->arrp as $objtb)
			{
				$this->setFont("Arial","",7);
				if($objtb["ingresos"]>0)
				  $ingresos = H::FormatoMonto($objtb["ingresos"]);
				else
				  $ingresos = '';
				if ($objtb["egresos"]>0)
				  $egresos = H::FormatoMonto($objtb["egresos"]);
				else
				  $egresos = '';

				 $salactsl = $objtb["salant"] +$objtb["ingresos"] - $objtb["egresos"];

				/********************FORMULA PARA CALCULAR SALDO SEGUN BANCO OJO***********/
				$forsalactsb=0;
				/*************************************************************************/
				if ($forsalactsb>0)
				    $salactsb = $forsalactsb;
				else
				   $salactsb = '';

				if ($objtb["salant"]<0)
				   $salant = "(".H::FormatoMonto($objtb["salant"]).")";
				else
  				   $salant = H::FormatoMonto($objtb["salant"]);

  				if ($salactsl<0)
				   $actsl = "(".H::FormatoMonto($salactsl).")";
				else
  				   $actsl = H::FormatoMonto($salactsl);

  				if ($salactsb<0)
				   $actsb = "(".H::FormatoMonto($salactsb).")";
				elseif($salactsb==0)
					$actsb = '';
				else
  				   $actsb = H::FormatoMonto($salactsb);

				$this->Row(array($objtb["nomcue"],$objtb["numcue"],$salant,$ingresos,$egresos,$actsl,$actsb));
				$tot_salant += $objtb["salant"];
				$tot_ingresos += $objtb["ingresos"];
				$tot_egresos += $objtb["egresos"];
				$tot_salactsl += $salactsl;
				$tot_salactsb += $salactsb;
				$i++;
			 }

			 $this->SetLineWidth(0.4);
			 $this->ln();
			 $this->setTextColor(155,0,0);
			 //$this->Line(142,$this->GetY(),200,$this->GetY());
	 		 $this->setFont("Arial","B",8);
			 $this->ln(6);
			 $this->rect(10,$this->GetY()-2,260,10);
			 $this->cell(47,4,"TOTAL DISPONIBLE ");
			 $this->cell(50,4,H::FormatoMonto($tot_salant),0,0,"R");
			 $this->cell(50,4,H::FormatoMonto($tot_ingresos),0,0,"R");
			 $this->cell(50,4,H::FormatoMonto($tot_egresos),0,0,"R");
			 $this->cell(30,4,H::FormatoMonto($tot_salactsl),0,0,"R");
			 $this->cell(30,4,H::FormatoMonto($tot_salactsb),0,0,"R");
		}

	}