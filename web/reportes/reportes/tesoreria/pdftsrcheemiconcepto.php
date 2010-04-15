<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrcheemiconcepto.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab=new cabecera();
			$this->cabe='s';
			$this->index=0;
			$this->numchedes= H::GetPost('numche1');
			$this->numchehas= H::GetPost('numche2');
			$this->numcuedes= H::GetPost('numcue1');
			$this->numcuehas= H::GetPost('numcue2');
			$this->bendes= H::GetPost('ben1');
			$this->benhas= H::GetPost('ben2');
			$this->fecregdes = H::GetPost('fecreg1');
			$this->fecreghas= H::GetPost('fecreg2');
			$this->tipdocdes = H::GetPost('tipdoc1');
			$this->tipdochas= H::GetPost('tipdoc2');
			$this->status = H::GetPost('status');


			$this->objTsrscheemiconcepto = new Tsrcheemiconcepto();
			$this->arrp = $this->objTsrscheemiconcepto->SQLp($this->numchedes,$this->numchehas,$this->numcuedes,$this->numcuehas,$this->bendes,$this->benhas,$this->fecregdes,$this->fecreghas,$this->tipdocdes,$this->tipdochas,$this->status);
			$this->cargarEstatus();
			//$this->cab=new cabecera();

		}

		function cargarEstatus()
		{
			if (strtoupper($this->status)=="T")
			{
				$this->estatus="ENTREGADOS,	ANULADOS y EN CAJA";
			}
			if (strtoupper($this->status)=="E")
			{
				$this->estatus="ENTREGADOS";
			}
			if (strtoupper($this->status)=="A")
			{
				$this->estatus="ANULADOS";
			}
			if (strtoupper($this->status)=="C")
			{
				$this->estatus="EN CAJA";
			}
		}

		function header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->SetLineWidth(0);
			//$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
			$this->Line(10,46,210,46);
			$i=$this->index;
			$this->SetLineWidth(0.2);
	 		$this->setFont("Arial","B",8);
	 		$this->setTextColor(0,0,155);
			$this->cell(20,4,"Numero Cuenta:   ");
			$this->setTextColor(0,0,0);
			$this->setFont("Arial","",8);
			$this->cell(20,4,"         ".$this->arrp[$i]["anumcue"]);
			$this->ln();
			$this->setTextColor(0,0,155);
			$this->setFont("Arial","B",8);
			$this->cell(20,4,"Banco:  ");
			$this->setFont("Arial","",8);
			$this->setTextColor(0,0,0);
			$this->cell(50,4,"         ".$this->arrp[$i]["anomcue"]);
			$this->setFont("Arial","B",7);
			$this->setTextColor(155,0,0);
			$this->cell(20,4,"ESTATUS:  ");$this->cell(60,4,$this->estatus);
			$this->setTextColor(0,0,0);
			$this->ln();
			$this->ln();
	  		$this->rect(10,$this->GetY()-14,200,18);
	  		$this->setTextColor(155,0,0);
	  		$this->setFont("Arial","B",7);
	  		$this->cell(35,4,"Nº CHEQUE");
	  		$this->cell(45,4,"BENEFICIARIO");
	  		$this->cell(35,4,"FECHA EMISION");
	  		$this->cell(40,4,"MONTO");
	  		$this->cell(60,4,"CONCEPTO");

   		    $this->ln(6);

		}

		function Cuerpo()
		{
			$i=0;
			$ref=$this->arrp[$i]["anumcue"];
			$this->setWidths(array(23,60,25,20,5,60));
			$this->setAligns(array("L","L","L","R","L","L"));

			foreach($this->arrp as $objtb)
			{
				if($objtb["anumcue"]!=$ref)
				{
			 	 $this->SetLineWidth(0.5);
				 $this->ln();
				 $this->Line(142,$this->GetY(),200,$this->GetY());
 		 		 $this->setFont("Arial","B",7);
				 $this->cell(10,4);
				 $this->cell(130,4,"TOTAL CHEQUES POR BANCO:         ".$this->cont);
				 $this->cell(40,4,"TOTAL BANCO                ".H::FormatoMonto($this->acum2));
				 $this->index=$i;
				 $this->AddPage();
				 $this->cont=0;
				 $this->acum2=0;
		        }
				$ref=$objtb["anumcue"];
				$this->setFont("Arial","",7);

				if (trim($objtb["deslib"])=="")
					 $concepto="                        ***SIN DESCRIPCION***";
				else
				     $concepto=	trim($objtb["deslib"]);
				$this->Row(array($objtb["anumche"],trim($objtb["anomben"]),date("d/m/Y",strtotime($objtb["afecemi"])),H::FormatoMonto($objtb["amonche"]),"",$concepto));

				$this->cont=($this->cont+1);
				$this->cont1=($this->cont1+1);
 				$this->acum2=($this->acum2+$objtb["amonche"]);
 				$this->acum3=($this->acum3+$objtb["amonche"]);
				$i++;
			 }

			 $this->SetLineWidth(0.5);
			 $this->ln();
			 $this->Line(142,$this->GetY(),200,$this->GetY());
	 		 $this->setFont("Arial","B",7);
			 $this->cell(10,4);
			 $this->cell(130,4,"TOTAL CHEQUES POR BANCO:         ".$this->cont);
			 $this->cell(40,4,"TOTAL BANCO                ".H::FormatoMonto($this->acum2));
		}

	}