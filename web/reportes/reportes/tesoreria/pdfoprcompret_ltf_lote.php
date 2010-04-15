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
		var $sqla;
		var $sqlx;
		var $sqlb;
		var $sqlc;
		var $sqld;
		var $sqlmes;
		var $sqldia;
		var $sql1;
		var $sql2;
		var $sql3;
		var $sql4;
		var $sql5;
		var $ag;
		var $rif;
		var $dire;
		var $orde;
		var $ben;
		var $corr;


		var $benalt;
		var $fechasys;
		var $correlativo;
		var $mes;
		var $ano;


		function pdfreporte()
		{$this->i=0;
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->m=0;
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->ag=$_POST["ag"];
			$this->rif=$_POST["rif"];
			$this->dire=$_POST["dire"];
			$this->orde=$_POST["orde"];
			$this->rifben=$_POST["ben"];
			$this->ejecutor=$_POST["ejecutor"];
			//$this->nombre=$_POST["nombre"];
	        $this->corre=$_POST["corre"];
	        $this->fecdes=$_POST["fecdes"];
	        $this->fechas=$_POST["fechas"];
if($this->ejecutor<>'')
{
				$this->sql="select a.numord,b.cedrif,b.cedrifres,b.nomben,b.fecemi,to_char(a.fecfac,'dd/mm/yyyy') as fecfac,a.numfac,
							a.numctr,a.tiptra,a.facafe,
							a.totfac,a.basltf,a.porltf,a.monltf
							from opfactur a,opordpag b
							where
							a.numord=b.numord and
							a.fecfac>= to_date('".$this->fecdes."','dd/mm/yyyy') and
							a.fecfac<= to_date('".$this->fechas."','dd/mm/yyyy') and
							trim(b.cedrifres)=trim('".$this->ejecutor."') and
							trim(b.cedrif)=trim('".$this->rifben."')
							order by a.numord";

}
else
{
				$this->sql="select a.numord,b.cedrif,b.cedrifres,b.nomben,b.fecemi,to_char(a.fecfac,'dd/mm/yyyy') as fecfac,a.numfac,
							a.numctr,a.tiptra,a.facafe,
							a.totfac,a.basltf,a.porltf,a.monltf
							from opfactur a,opordpag b
							where
							a.numord=b.numord and
							a.fecfac>= to_date('".$this->fecdes."','dd/mm/yyyy') and
							a.fecfac<= to_date('".$this->fechas."','dd/mm/yyyy') and
							trim(b.cedrif)=trim('".$this->rifben."')
							order by a.numord";
}
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Débitos";
				$this->titulos[5]="Créditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function br()
		{
			$this->fechasys=date('d/m/Y');
			$this->ano=date('Y');
			$this->mes=date('m');
		//---------------------
		//----GENERAR CORRELATIVO
			$this->correlativo=$this->corre;
		}
		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->br();

			$this->SetFillColor(190,190,190);
			$this->Rect(170,36,45,12,"DF");
			$this->Rect(225,36,45,12);
			$this->setFont("Arial","",7);
			$this->ln(-1);
			$this->cell(163,5,"");
			$this->cell(54,5,"Numero Comprobante:");
			$this->cell(50,5,"Fecha:");
            $this->ln(10);
			$this->setFont("Arial","B",8);
		//	$this->MultiCell(135,5,"Reglamento Parcial de la ley de Impuesto Sobre la Renta en Materia de Retenciones Dec 1808 6.0.36.203 de 12/05/1997",0,"J",0);
			$this->cell(95,5,strtoupper($tba->fields["nomemp"]));
			$this->setFont("Arial","B",8);
			$this->cell(50,5,"Datos del Agente de Retención");
			$this->ln();
			$this->Rect(10,$this->GetY(),100,8);
			$this->Rect(120,$this->GetY(),85,8);
			$this->Rect(210,$this->GetY(),60,13);
			$this->Rect(10,$this->GetY()+10,195,11);
			$this->ln(1);
			$this->cell(1,5,"");
			$this->cell(110,5,"Nombre:");
			$this->cell(150,5,"No. R.I.F.:");
			$this->ln(-1);
			$this->cell(218,5,"");
			$this->cell(20,5,"Periodo Fiscal");
			$this->ln(6);
			$this->cell(203,5,"");
			$this->cell(33,5,"Año:");
			$this->cell(20,5,"Mes:");
			$this->ln(6);
			$this->cell(1,5,"");
			$this->cell(110,5,"Direccion:");
			$this->ln(10);
			$this->cell(99,5,"");
			$tb=$this->bd->select($this->sql);
			//print ($tb->fields["cedrifres"]);exit;
			if (trim($tb->fields["cedrifres"])<>'')
			{$this->setFont("Arial","B",8);
			$this->cell(50,5,"Datos del Contribuyente");
			$this->Rect(10,$this->GetY()+5,100,10);
			$this->Rect(120,$this->GetY()+5,85,10);
			$this->ln();
			$this->setFont("Arial","B",7);
			$this->cell(2,5,"");
			$this->cell(110,5,"Nombre o Razón Social:");
			$this->cell(50,5,"RIF. del Sujeto Retenido:");
			$this->setY(90);
		    $this->setFont("Arial","B",8);
			$this->cell(132,5,"Datos del Ente Ejecutor",0,0,'R');
			$this->Rect(10,$this->GetY()+5,100,10);
			$this->Rect(120,$this->GetY()+5,85,10);
			$this->ln();
			$this->setFont("Arial","B",7);
			$this->cell(2,5,"");
			$this->cell(110,5,"Nombre o Razón Social:");
			$this->cell(50,5,"RIF. del Sujeto Retenido:");
			$this->m=15;
			}
			else
			{
			$this->cell(50,5,"Datos del Contribuyente");
			$this->Rect(10,$this->GetY()+5,100,15);
			$this->Rect(120,$this->GetY()+5,85,15);
			$this->ln();
			$this->cell(2,5,"");
			$this->cell(110,5,"Nombre o Razón Social:");
			$this->cell(50,5,"RIF. del Sujeto Retenido:");
			$this->m=0;
			}

			$this->setY(100+$this->m);
			$this->Rect(140,$this->GetY(),49,5,"DF");
			$this->Rect(47,$this->GetY()+5,183,9,"DF");
			$this->Line(47,$this->Gety()+5,47,$this->Gety()+14);
			$this->Line(66,$this->Gety()+5,66,$this->Gety()+14);
			$this->Line(83,$this->Gety()+5,83,$this->Gety()+14);
			$this->Line(100,$this->Gety()+5,100,$this->Gety()+14);
			$this->Line(140,$this->Gety()+5,140,$this->Gety()+14);
			//$this->Line(155,$this->Gety()+5,155,$this->Gety()+14);
			$this->Line(189,$this->Gety()+5,189,$this->Gety()+14);
			$this->Line(200,$this->Gety()+5,200,$this->Gety()+14);
			//----
			$this->setX(155);
			$this->cell(50,5,"Importe Gravado");
			$this->ln();
			$this->setFont("Arial","",7);
            $this->setX(50);
			$this->cell(17,5,"Fecha de");
			$this->cell(17,5,"Numero de");
			$this->cell(26,5,"N° Control");
			$this->cell(34,5,"  Total");
			$this->cell(15,5,"");
			$this->cell(35,5,"Base");
			$this->cell(13,5,"%");
			$this->cell(6,5,"");
			$this->cell(20,5,"LTF");
			$this->ln(3);
			$this->setX(51);
			$this->cell(18,5,"Factura");
			$this->cell(17,5,"Factura");
			$this->cell(22,5,"Factura");
			$this->cell(27,5,"  Facturado");
			$this->cell(21,5,"");
			$this->cell(37,5,"Imponible");
			$this->cell(17,5,"Alic.");
			$this->cell(1,5,"");
			$this->cell(20,5,"Retenido");
			$this->setFont("Arial","B",9);
			$this->ln(12);
		 $tb2=$tb=$this->bd->select($this->sql);
		 $this->setY(42);
		 $this->setFont("Arial","B",10);
		 $this->cell(163,5,"");
		 $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
		 $this->cell(20,5,$this->fechasys);
		 $this->setFont("Arial","",8);
		 $this->ln(9);
		 $this->cell(15,5,"");
		 $this->cell(115,5,strtoupper($this->ag));
		 $this->cell(20,5,strtoupper($this->rif));
		 $this->ln();
		 $this->cell(212,5,"");
		 $this->cell(34,5,$this->ano);
		 $this->cell(30,5,$this->mes);
		 $this->ln(6);
		 $this->cell(16,5,"");
		 $this->cell(115,5,strtoupper($this->dire));
		 $this->ln(20);
		 if ($this->rifalt<>"")
		 {
				   $this->sqlE="select nomben from opbenefi where trim(cedrif)=trim('".$this->tb2->fields["cedrifres"]."');";
		           $tbE=$this->bd->select($this->sqlE);
				   $benE=$tbE->fields["nomben"];
				   $ben=$this->nombre;
				   $rif=$this->rifalt;
		 }
		 else
		 {
				   $this->sqlE="select nomben from opbenefi where trim(cedrif)=trim('".$this->tb2->fields["cedrifres"]."');";
		           $tbE=$this->bd->select($this->sqlE);
				   $benE=$tbE->fields["nomben"];
				   $ben=$tb->fields["nomben"];
		 		   $rif=$tb->fields["cedrif"];
		 }
	//	$this->ln(3);
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($ben));
		$this->cell(115,5,$rif);
		$this->ln(18);
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($benE));
		$this->cell(115,5,$this->ejecutor);
		$this->ln(11.2);

			$this->setY(114.2+$this->m);

		}
		function Cuerpo()
		{
			$tb=$this->bd->select($this->sql);
		 $this->tb2=$tb;
		 $totfac=0;
		 $exeiva=0;
		 $basimp=0;
		 $moniva=0;
		 $monret=0;

		 $ref=$tb->fields["cedrifres"];
		 $this->setY(42);
		 $this->setFont("Arial","B",10);
		 $this->cell(163,5,"");
		 $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
		 $this->cell(20,5,$this->fechasys);
		 $this->setFont("Arial","",8);
		 $this->ln(9);
		 $this->cell(15,5,"");
		 $this->cell(115,5,strtoupper($this->ag));
		 $this->cell(20,5,strtoupper($this->rif));
		 $this->ln();
		 $this->cell(212,5,"");
		 $this->cell(34,5,$this->ano);
		 $this->cell(30,5,$this->mes);
		 $this->ln(6);
		 $this->cell(16,5,"");
		 $this->cell(115,5,strtoupper($this->dire));
		 $this->ln(20);
		 if ($this->rifalt<>"")
		 {
				   $this->sqlE="select nomben from opbenefi where trim(cedrif)=trim('".$tb->fields["cedrifres"]."');";
		           $tbE=$this->bd->select($this->sqlE);
				   $benE=$tbE->fields["nomben"];
				   $ben=$this->nombre;
				   $rif=$this->rifalt;
		 }
		 else
		 {
				   $this->sqlE="select nomben from opbenefi where trim(cedrif)=trim('".$tb->fields["cedrifres"]."');";
		           $tbE=$this->bd->select($this->sqlE);
				   $benE=$tbE->fields["nomben"];
				   $ben=$tb->fields["nomben"];
		 		   $rif=$tb->fields["cedrif"];
		 }
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($ben));
		$this->cell(115,5,$rif);
		$this->ln(18);
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($benE));
		$this->cell(115,5,$tb2->fields["cedrifres"]);
		$this->ln(11.2);

			$this->setY(114.2+$this->m);
//print strlen($tb->fields["cedrifres"])."  ".strlen($ref);exit;
		while (!$tb->EOF)
		{

			if ($tb->fields["cedrifres"]<>$ref)
			{
				$this->Rect(128,$this->GetY()-0.2,25,7);
				$this->Rect(153,$this->GetY()-0.2,27,7);
				$this->Rect(180,$this->GetY()-0.2,28,7);
				$this->Rect(217,$this->GetY()-0.2,28,7);
				$this->Rect(245,$this->GetY()-0.2,25,7);
				$this->setFont("Arial","B",9);
				$this->ln(0.5);
				$this->cell(103,5,"");
				$this->cell(15,5,"Totales");
				$this->ln(1);
				$this->cell(24,5,number_format($totfac,2,'.',','),0,0,"R");
				$this->cell(27,5,"");
				$this->cell(28,5,number_format($basimp,2,'.',','),0,0,"R");
				$this->cell(11,5,"");
				$this->cell(26,5,number_format($moniva,2,'.',','),0,0,"R");
				$this->cell(25,5,number_format($monret,2,'.',','),0,0,"R");

				$totfac=0;
				$exeiva=0;
				$basimp=0;
				$moniva=0;
				$monret=0;
				$this->ln(250);
				$this->cell(5,5,"");
				$this->ln(-75);
				$this->setFont("Arial","B",10);
				$this->cell(163,5,"");
				 $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
				 $this->cell(20,5,$this->fechasys);
				 $this->setFont("Arial","",8);
				 $this->ln(12);
				 $this->cell(15,5,"");
				 $this->cell(115,5,strtoupper($this->ag));
				 $this->cell(20,5,strtoupper($this->rif));
				 $this->ln();
				 $this->cell(212,5,"");
				 $this->cell(34,5,$this->ano);
				 $this->cell(30,5,$this->mes);
				 $this->ln(6);
				 $this->cell(16,5,"");
				 $this->cell(115,5,strtoupper($this->dire));
				 $this->ln(20);
				 if ($this->rifalt<>"")
				 {
						   $this->sqlE="select nomben from opbenefi where trim(cedrif)=trim('".$tb->fields["cedrifres"]."');";
				           $tbE=$this->bd->select($this->sqlE);
						   $benE=$tbE->fields["nomben"];
						   $ben=$this->nombre;
						   $rif=$this->rifalt;
				 }
				 else
				 {
						   $this->sqlE="select nomben from opbenefi where trim(cedrif)=trim('".$tb->fields["cedrifres"]."');";
				           $tbE=$this->bd->select($this->sqlE);
						   $benE=$tbE->fields["nomben"];
						   $ben=$tb->fields["nomben"];
				 		   $rif=$tb->fields["cedrif"];
				 }
				$this->cell(5,5,"");
				$this->cell(119,5,strtoupper($ben));
				$this->cell(115,5,$rif);
				$this->ln(15);
				$this->cell(5,5,"");
				$this->cell(119,5,strtoupper($benE));
				$this->cell(115,5,$tb2->fields["cedrifres"]);
				$this->ln(11.2);
			}
		//Detalle
		$this->setFont("Arial","",6);
		$ref=$tb->fields["cedrifres"];
		$this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
                	 where numord='".$tb->fields["numord"]."'";
		$tb4=$this->bd->actualizar($this->sql4);
       $this->setFont("Arial","",6);
		$ref=$tb->fields["cedrifres"];
        $this->setX(47);
		$this->cell(19,5,$tb->fields["fecfac"],0,0,"C");
		$this->cell(16,5,$tb->fields["numfac"],0,0,"C");
		$this->cell(17,5,$tb->fields["numctr"],0,0,"C");
        $this->cell(33,5,number_format($tb->fields["totfac"],2,'.',','),0,0,"R");
		$totfac=$totfac+$tb->fields["totfac"];
		$this->cell(20,5,"",0,0,"R");
	//	$exeiva=$exeiva+$tb->fields["exeiva"];
		$this->cell(30,5,number_format($tb->fields["basltf"],2,'.',','),0,0,"R");
		$basimp=$basimp+$tb->fields["basltf"];
		$this->cell(20,5,number_format($tb->fields["porltf"],2,'.',','),0,0,"C");
		$this->cell(27,5,number_format($tb->fields["monltf"],2,'.',','),0,0,"R");
		$monret=$monret+$tb->fields["monltf"];
		$this->Rect(47,$this->GetY()-0.2,19,5);
		$this->Rect(66,$this->GetY()-0.2,17,5);
		$this->Rect(83,$this->GetY()-0.2,17,5);
		$this->Rect(100,$this->GetY()-0.2,40,5);
		//$this->Rect(122,$this->GetY()-0.2,33,5);
		$this->Rect(140,$this->GetY()-0.2,49,5);//basimp
		$this->Rect(189,$this->GetY()-0.2,11,5);
		$this->Rect(200,$this->GetY()-0.2,30,5);
		$this->ln();
		$tb->MoveNext();
		}
		$this->Rect(100,$this->GetY()-0.2,40,7);
		//$this->Rect(122,$this->GetY()-0.2,33,7);
		$this->Rect(140,$this->GetY()-0.2,49,7);//basimp
		$this->Rect(200,$this->GetY()-0.2,30,7);
		$this->setFont("Arial","B",9);
		$this->ln(0.5);
		$this->setX(75);
		$this->cell(15,5,"Totales");
		$this->ln(1.5);
		$this->ln(-1);
		$this->setFont("Arial","",6);
		$this->setX(100);
		$this->cell(33,5,number_format($totfac,2,'.',','),0,0,"R");
		$this->cell(20,5,"",0,0,"R");
		//$this->setX(130);
		$this->cell(30,5,number_format($basimp,2,'.',','),0,0,"R");
		$this->cell(45,5,number_format($monret,2,'.',','),0,0,"R");
		    //PIE DE PAGINA
          $this->setY(163);
	      $this->line(75,$this->GetY()+25,110,$this->GetY()+25);
	      $this->line(170,$this->GetY()+25,205,$this->GetY()+25);
	      $this->setXY(80,$this->GetY()+25);
	      $this->cell(115,4,'JOSÉ MANUEL TAVARES                                                                                                                          JUAN J. GOMEZ',0,0,'C');
	      $this->setXY(80,$this->GetY()+3);
	      $this->cell(120,4,'COORDINADOR DE ODENACIÓN DE PAGO                                                                                                  GERENTE DE ADMINISTRACIÓN   ',0,0,'C');


		}
	}
?>
