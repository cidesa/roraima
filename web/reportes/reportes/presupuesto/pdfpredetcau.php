<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $sql;
		var $titulos;
		var $refcaudesd;
		var $refcauhast;
		var $fecdes;
		var $fechast;
		var $tipocomdes;
		var $tipocomhas;
		var $status;
		var $codpredesde;
		var $codprehasta;
		var $comodin;
		var $monto;
		var $cedula;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			//Recibir las variables por el Post
			$this->refcaudesd=$_POST["refcaudesd"];
			$this->refcauhast=$_POST["refcauhast"];
			$this->fecdes=$_POST["fecdes"];
			$this->fechast=$_POST["fechast"];
			$this->tipocomdes=$_POST["tipocomdes"];
			$this->tipocomhas=$_POST["tipocomhas"];
			$this->status=$_POST["status"];
			$this->codpredesde=$_POST["codpredesde"];
			$this->codprehasta=$_POST["codprehasta"];
			$this->comodin=$_POST["comodin"];
			//$this->cab=new cabecera();

			 $this->sql="select a.refcau,
					a.tipcau,
					to_char(a.feccau,'dd/mm/yyyy')as feccau,
					rtrim(a.descau) as descom,
					rtrim(b.codpre ) as codpre,
					rtrim(c.nompre) as nompre,
					b.monimp,
					b.monpag,
					b.monaju as ajuste,
					a.cedrif,
					(b.monimp-b.monaju) as mon_aju
					from
					cpcausad a,
					cpimpcau b,
					cpdeftit c
					where a.refcau = b.refcau and
								   b.codpre = c.codpre  and
								   a.refcau>='".$this->refcaudesd."'   and
								   a.refcau <='".$this->refcauhast."'  and
								   a.feccau>=to_date('".$this->fecdes."','dd/mm/yyyy') and
								   a.feccau<=to_date('".$this->fechast."','dd/mm/yyyy') and
								   b.codpre >=rpad('".$this->codpredesde."',32,' ') and
								   b.codpre <=rpad('".$this->codprehasta."',32,' ') and
								   a.tipcau >= '".$this->tipocomdes."' and
								   a.tipcau <= '".$this->tipocomhas."' and
								   a.stacau='".$this->status."' and
								   (b.codpre like rtrim( '".$this->comodin."') )
					order by a.cedrif,b.codpre,a.feccau,a.refcau";

			//print $this->sql;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO PRESUPUESTARIO";
				$this->titulos[1]="BENEFICIARIO";
				$this->titulos[2]="NRO";
				$this->titulos[6]="CAUSADO";
				$this->titulos[3]="NRO.ORDEN";
				$this->titulos[4]="FECHA";
				$this->titulos[5]="MONTO";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera_f_b($this,$_POST["titulo"],"l","s","s");
			$this->setFont("Arial","B",8);

			if ($this->status=='A')
			{
				$status="ACTIVO";
			}else{
				$status="NULO";
			}


			$this->cell(80,6,"CONTABILIDAD PRESUPUESTARIA");
			$this->ln(3);
			$this->cell(80,6,"DETALLE DE CAUSADO A LA FECHA  ".$status."  DEL  ".$this->fecdes."  HASTA  ".$this->fechast);
			$this->ln();

			$this->cell(45,6,$this->titulos[0]);
			$this->cell(120,6,$this->titulos[1]);
			$this->cell(20,6,$this->titulos[2]);
			$this->cell(20,6,$this->titulos[3]);
			$this->cell(25,6,$this->titulos[4]);
			$this->cell(30,6,$this->titulos[5]);
			$this->ln(3);
			$this->cell(165,6," ");
			$this->cell(30,6,$this->titulos[6]);
			$this->ln();
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);
				$this->ln();

		}
		function Cuerpo()
		{
			//$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ref=$tb->fields["cedrif"];
			$pri=true;
			while(!$tb->EOF)
			{   //$this->ln();
				$this->cell(45,4,$tb->fields["codpre"]);
			//	$this->cell(120,6,substr($tb->fields["nompre"],0,68));
				$this->cell(120,4,"");$y=$this->gety();
				$this->cell(20,4,$tb->fields["refcau"]);
				$this->cell(20,4,$tb->fields["refcau"]);
				$this->cell(25,4,$tb->fields["feccau"]);
				$monto=$monto + $tb->fields["monimp"];
				$this->cell(25,4,number_format($tb->fields["monimp"],2,'.',','),0,0,'R');
				//$this->ln(3);
			//	$this->cell(50,6," ");
					$cedula=$tb->fields["cedrif"];
						if ($pri){
						$pri=false;
					$tb1=$this->bd->select("select cedrif, nomben from opbenefi where cedrif='$cedula'");
					//$this->cell(120,6,substr($tb1->fields["nomben"],0,68));
					$this->setxy(56,$y);	$this->setFont("Arial","B",8);
					$this->multicell(120,4,strtoupper($tb1->fields["nomben"]));	$this->setFont("Arial","",8);
					}

					if ($ref!=$tb->fields["cedrif"]){
						$this->line(10,$this->gety(),270,$this->gety());
					$ref=$tb->fields["cedrif"];
					$tb1=$this->bd->select("select cedrif, nomben from opbenefi where cedrif='$cedula'");
					$this->setxy(56,$y);	$this->setFont("Arial","B",8);
					$this->multicell(120,4,strtoupper($tb1->fields["nomben"]));	$this->setFont("Arial","",8);
				//	$this->cell(120,6,substr($tb1->fields["nomben"],0,68));
					}
				$this->ln();

				$tb->MoveNext();
			}
			$this->Line($this->GetX()+210,$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);
			$this->cell(215,6," ");
			$this->cell(10,6,"Total  :  ");
			$this->cell(30,6,number_format($monto,2,'.',','),0,0,'R');

		}
	}
?>