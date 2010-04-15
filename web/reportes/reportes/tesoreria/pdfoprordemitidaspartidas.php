<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $numorddes;
		var $numordhas;
		var $bendes;
		var $fechades;
		var $fechahas;
		var $cuentades;
		var $estatus;
		var $comodin;
		var $benhas;
		var $acum;
		/*var $sta1;
		var $sta2;
		var $sta3;
		var $sta4;	*/


		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->nroorddes=$_POST["nroorddes"];
			$this->nroordhas=$_POST["nroordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->cuentades=$_POST["cuentades"];
			$this->estatus=$_POST["estatus"];
			$this->comodin=$_POST["comodin"];

			///Verificar Status
			$this->verificar_status();
			///
			$this->sql="select
						distinct c.numord as numord,
						c.numord as numord2,
						to_char(c.fecemi,'dd/mm/yyyy') as fecemi,
						c.nomben,
						c.ctaban,
						c.status,
						c.tipcau,
						c.numtiq as numtiq
						from
						opordpag c,
						opdetord d
						where
						c.numord=d.numord and
						c.numord >='".$this->nroorddes."' and
						c.numord <='".$this->nroordhas."' and
						c.cedrif >=rpad('".$this->bendes."',15,' ') and
						c.cedrif <=rpad('".$this->benhas."',15,' ') and
						c.fecemi >=to_date('".$this->fechades."','dd/mm/yyyy') and
						c.fecemi <=to_date('".$this->fechahas."','dd/mm/yyyy')and
						( c.status = '".$this->sta1."' or
						  c.status = '".$this->sta2."' or
						  c.status = '".$this->sta3."'  or
						  c.status = '".$this->sta4."' ) and
						(d.codpre like '".$this->comodin."')
						order by c.numord
						";
						//print $this->sql;
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
		}


		function verificar_status()
		{

		if ($this->estatus=='I'){
			  $this->sta1='I';
			  $this->sta2='I';
			  $this->sta3='I';
			  $this->sta4='I';

		}else if ($this->estatus=='N'){
			  $this->sta1='N';
			  $this->sta2='N';
			  $this->sta3='N';
			  $this->sta4='N';

		}else if ($this->estatus=='A'){
			  $this->sta1='A';
			  $this->sta2='A';
			  $this->sta3='A';
			  $this->sta4='A';

		}else if ($this->estatus=='C'){
			  $this->sta1='C';
			  $this->sta2='C';
			  $this->sta3='C';
			  $this->sta4='C';
		}else if ($this->estatus=='AC'){
			 $this->sta1='I';
			 $this->sta2='N';
			 $this->sta3='C';
			  $this->sta4='C';
		}
		return true;
		}


		function llenartitulosmaestro()
		{
				$this->titulos[0]="Cta. Bancaria";
				$this->titulos[1]="Orden de Pago";
				$this->titulos[2]="Nombre o Razon Social";
				$this->titulos[3]="Fecha";
				$this->titulos[4]="Emisión";
				$this->titulos[5]="Nro Ticket";
				$this->titulos[6]="Tipo Orden";
				$this->titulos[7]="Monto";
		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			//$this->ln();
			//$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+263,$this->GetY()+1);
			$this->cell(50,4,$this->titulos[0]."  ".$this->cuentades,0,0,'L');
			$this->ln();
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+190,$this->GetY()+1);
			//
			$this->ln(2);
			$this->cell(23,4,$this->titulos[1],0,0,'L');
			$this->cell(70,4,$this->titulos[2],0,0,'L');
			$this->cell(20,4,$this->titulos[3],0,0,'L');
			$this->cell(20,4,$this->titulos[5],0,0,'L');
			$this->cell(35,4,$this->titulos[6],0,0,'L');
			$this->cell(40,4,$this->titulos[7],0,0,'L');
			$this->ln(3);
			$this->cell(100,4,$this->titulos[4],0,0,'L');
			$this->ln();
			$this->Line($this->GetX(),$this->GetY()+2,$this->GetX()+190,$this->GetY()+2);
			$this->setY(53);

			//
		}

		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;
			$this->setFont("Arial","",7);
			$acum=0;

			while(!$tb->EOF)
			{

				$this->cell(23,4,$tb->fields["numord"],0,0,'L');
				$this->cell(70,4,'');
				$this->cell(20,4,$tb->fields["fecemi"],0,0,'L');
				$this->cell(20,4,$tb->fields["numtiq"],0,0,'L');

				// Tipo de ORDEN
				$this->cell(30,4,'');


				//////////////////////
				////// Total ///////
				$this->sql2="select sum(d.moncau-d.monret) as total
							from
								  opordpag c,
									opdetord d
							where
								c.numord=d.numord and
								c.numord='".$tb->fields["numord"]."' and

							c.ctaban ='".$this->cuentades."' and
							c.cedrif >=rpad('".$this->bendes."',15,' ') and
							c.cedrif <=rpad('".$this->benhas."',15,' ') and
							c.fecemi >=to_date('".$this->fechades."','dd/mm/yyyy') and
							c.fecemi <=to_date('".$this->fechahas."','dd/mm/yyyy') and
							( c.status = '".$this->sta1."' or
							  c.status = '".$this->sta2."' or
							  c.status = '".$this->sta3."'  or
							  c.status = '".$this->sta4."' ) and
							(d.codpre like '".$this->comodin."')";

				$tb2=$this->bd->select($this->sql2);
				$acum=$acum+$tb2->fields["total"];
				$this->cell(25,4,number_format($tb2->fields["total"],2,'.',','),0,0,'R');


				$Y2=$this->GetY();
				$this->sql2="select coalesce(count(tipcau),0) as contador, nomext from cpdoccau where tipcau='".$tb->fields["tipcau"]."' group by nomext";
				$tb2=$this->bd->select($this->sql2);

				if ($tb2->fields["contador"]<>0)
				{
					//$this->sql2="select coalesce(count(tipcau),0) as contador, nomext from cpdoccau where tipcau='".$tb->fields["tipcau"]."' group by nomext";
					//$tb2=$this->bd->select($this->sql2);
					$this->setX(126);
					$this->multicell(35,4,$tb2->fields["nomext"]);

				}else{
					$this->sql2="select nomext from cpdoccom where tipcau='".$tb->fields["tipcau"]."'";
					$this->setX(126);
					$tb2=$this->bd->select($this->sql2);

					$this->multicell(23,4,$tb2->fields["nomext"]);

				}



				$Y3=$this->GetY();
				$this->setY($this->GetY()-($Y3-$Y2));
				$this->setX(25);
				$this->multicell(75,4,$tb->fields["nomben"]);

				////////////////
				$this->ln(4);
				$Y=$this->GetY();
				if ($Y>=220)
				{ $this->AddPage();}
				$tb->MoveNext();
			}
				$this->setFont("Arial","B",8);
				$this->cell(148,6,"TOTAL  :",0,0,'R');
				$this->cell(40,6,number_format($acum,2,'.',','),0,0,'R');
		}
	}
?>