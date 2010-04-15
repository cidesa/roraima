<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrchecomban.class.php");

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
			//$this->tipdocdes = H::GetPost('tipdoc1');
			//$this->tipdochas= H::GetPost('tipdoc2');
			//$this->status = H::GetPost('status');
			//$this->gendis=H::GetPost('gendis');


			$this->objTsrchecomban = new Tsrchecomban();
			$this->arrp = $this->objTsrchecomban->SQLp($this->numchedes,$this->numchehas,$this->numcuedes,$this->numcuehas,$this->bendes,$this->benhas,$this->fecregdes,$this->fecreghas);
			$this->arrp3=$this->objTsrchecomban->sqlpx($this->numchedes,$this->numchehas);
			//$this->cargarEstatus();
			$this->cab=new cabecera();
		}

		/*function cargarEstatus()
		{
			if (strtoupper($this->status)=="T")
			{
				$this->estatus="IMPRESOS, EN LA FIRMA, EN CAJA, ENTREGADOS y	ANULADOS ";
			}
			if (strtoupper($this->status)=="L")
			{
				$this->estatus="IMPRESOS";
			}
			if (strtoupper($this->status)=="F")
			{
				$this->estatus="EN LA FIRMA";
			}
			if (strtoupper($this->status)=="C")
			{
				$this->estatus="EN CAJA";
			}
			if (strtoupper($this->status)=="E")
			{
				$this->estatus="ENTREGADOS";
			}
			if (strtoupper($this->status)=="A")
			{
				$this->estatus="ANULADOS";
			}
		}*/

		function header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->SetLineWidth(0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			//$this->Line(10,46,210,46);
			$i=$this->index;
			$this->SetLineWidth(0.2);
	 		$this->setFont("Arial","B",8);
	 		$this->setTextColor(0,0,155);
			$this->cell(20,4,"BANCO:   ");
			$this->setTextColor(0,0,0);
			$this->setFont("Arial","",8);
			$this->cell(20,4,"         ".$this->arrp[$i]["anomcue"]);
			$this->ln();
			$this->setTextColor(0,0,155);
			$this->setFont("Arial","B",8);
			$this->cell(20,4,"No DE CUENTA:  ");
			$this->setFont("Arial","",8);
			$this->setTextColor(0,0,0);
			$this->cell(80,4,"         ".$this->arrp[$i]["anumcue"]);
			$this->setFont("Arial","B",7);
			$this->setTextColor(155,0,0);
			//$this->cell(20,4,"ESTATUS:  ");$this->cell(30,4,$this->estatus);
			$this->setTextColor(0,0,0);
			$this->ln();
			$this->ln();
	  		//$this->rect(10,$this->GetY()-14,200,18);
	  		$this->setTextColor(155,0,0);
	  		$this->setFont("Arial","B",7);
	  		$this->cell(30,4,"FECHA Nro",1,0,'C');
	  		$this->cell(25,4,"REFERENCIA",1,0,'C');
	  		$this->cell(75,4,"DESCRIPCION",1,0,'C');
	  		$this->cell(30,4,"MONTO EN Bs.",1,0,'C');
   		    $this->ln(4);
		}

		function Cuerpo()
		{
			/*if ($this->gendis=='SI')//NUEVO
			{
				//$nombre_archivo="".substr($tb->fields["destippag"],0,3).strftime('%h_%m_%s',time()).".txt";
				$nombre_archivo='cheemi'.strftime('%I%M%S',time()).".txt";

				if (!file_exists($nombre_archivo))
				{
					fopen($nombre_archivo,"w");
				}
				chmod ($nombre_archivo,0777);

				$host = $_SERVER["HTTP_HOST"];
				$aux = split('/',$_SERVER["REQUEST_URI"]);
				$uri='';
				for ($i=0;$i<count($aux)-1;$i++)
					$uri = $uri.$aux[$i]."/";

				$archivo='http://'.$host.$uri.$nombre_archivo;
				$cheques = fopen($nombre_archivo,'w+');

				//ESTA LINEA ME COLOCA EL TITULO DE CADA COLUMNA A SALIR EN EL TXT
				$linea = (str_pad('Nro. DE CHEQUE',20,' ',STR_PAD_RIGHT).str_pad(' ',8,' ',STR_PAD_LEFT).str_pad('BENEFICIARIO',80,' ',STR_PAD_RIGHT).str_pad('MONTO',15,' ',STR_PAD_RIGHT).str_pad(' ',5,' ',STR_PAD_LEFT).str_pad('FECHA',8,' ',STR_PAD_RIGHT));

				fwrite($cheques, $linea);
				fwrite($cheques, chr(13).chr(10));


				foreach($this->arrp as $cheque)
				{
					$linea = (str_pad($cheque["anumche"],10,' ',STR_PAD_LEFT).str_pad($cheque["anomben"],85,' ',STR_PAD_RIGHT).str_pad(number_format($cheque["amonche"],2,'.',','),10,' ',STR_PAD_LEFT).str_pad(' ',10,' ',STR_PAD_LEFT).str_pad(date("d/m/Y",strtotime($cheque["afecemi"])),8,' ',STR_PAD_RIGHT));

					fwrite($cheques, $linea);
					fwrite($cheques, chr(13).chr(10));
				}
     			fclose($cheques);
			}//Hasta aqui lo nuevo*/


//Reporte Original
			$i=0;
			$ref=$this->arrp[$i]["anumcue"];
			$this->setWidths(array(0,30,25,75,30));
			$this->setAligns(array("L","C","C","L","R"));
			$this->setBorder(array(1,1,1,1,1));

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
			               $this->SetLineWidth(0.2);

		        }
				$ref=$objtb["anumcue"];
				$this->setFont("Arial","",7);
				$y2=$this->GetY();
				$this->Row(array('',date("d/m/Y",strtotime($objtb["afecemi"])),$objtb["anumche"],trim($objtb["deslib"]),H::FormatoMonto($objtb["amonche"])));
				$this->cont=($this->cont+1);
				$this->cont1=($this->cont1+1);
 				$this->acum2=($this->acum2+$objtb["amonche"]);
 				$this->acum3=($this->acum3+$objtb["amonche"]);
				$i++;

				/*$y3=$y2-15;
				$yy=67;
				foreach ($this->arrp3 as $op)
			        {

				if($objtb["anumche"]==$op["numche"])
				{

				$yy=$this->GetY();
				$this->SetXY(20,$y3+15);
				$this->cell(45,5,'');
				$this->cell(45,5,'');
				$this->cell(30,5,trim($op["numord"]),0,0,'R');
				$b++;
				$vv++;
				$y3=$this->GetY()-10;
				$this->ln();
				$this->ln();

				}
			        }*/

				if($yy>=230)
				{
					$this->AddPage();
				}
			}

			 $this->SetLineWidth(0.5);
			 $this->ln();
			 $this->Line(142,$this->GetY(),200,$this->GetY());
	 		 $this->setFont("Arial","B",7);
			 $this->cell(10,4);
			 $this->cell(130,4,"TOTAL CHEQUES POR BANCO:         ".$this->cont);
			 $this->cell(40,4,"TOTAL BANCO                ".H::FormatoMonto($this->acum2));

			/* if ($this->gendis=='SI')//Nuevo
			 {
			 	$this->ln();
   				$this->PutLink('descargar.php?archivo='.$nombre_archivo,'Descargar Archivo');
			 }		*/
		}
	}
