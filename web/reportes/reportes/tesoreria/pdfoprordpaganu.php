<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $nroorddes;
		var $nroordhas;
		var $bendes;
		var $benhas;
		var $tipcaudes;
		var $tipcauhas;
		var $fechades;
		var $fechahas;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->nroorddes=$_POST["nroorddes"];
			$this->nroordhas=$_POST["nroordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->tipcaudes=$_POST["tipcaudes"];
			$this->tipcauhas=$_POST["tipcauhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];

			$this->sql="select
						a.numord as numord,
						a.numord as numord2,
						a.cedrif,
						a.nomben,
						to_char(a.fecemi,'dd/mm/yyyy') as fecemi,
						a.monord as monto_orden,
						a.monret,
						(case when a.status='A' then 'anulada' end) as status_ord,
						a.numtiq as numerotiq,
						b.nomext
					from
						opordpag a,
						cpdoccau b
					where
						a.tipcau=b.tipcau and
						a.status = 'A' and
						a.numord>= '".$this->nroorddes."' and
						a.numord <= '".$this->nroordhas."' and
						a.cedrif >= '".$this->bendes."' and
						a.cedrif <= '".$this->benhas."' and
						a.tipcau >= '".$this->tipcaudes."' and
						a.tipcau <= '".$this->tipcauhas."' and
						a.fecemi >= to_date('".$this->fechades."','dd/mm/yyyy') and
						a.fecemi <= to_date('".$this->fechahas."','dd/mm/yyyy')
					union
						select
						f.numord as numord,
						f.numord as numord2,
						f.cedrif,
						f.nomben,
						to_char(f.fecemi,'dd/mm/yyyy') as fecemi,
						f.monord as monto_orden,
						f.monret,
						(case when f.status='A' then 'anulada' end) as status_ord,
						f.numtiq as numerotiq,
						g.nomext
					from
						opordpag f,
						cpdoccom g
					where
						f.tipcau=g.tipcom and
						f.status = 'A' and
						f.numord>= '".$this->nroorddes."' and
						f.numord <= '".$this->nroordhas."' and
						f.cedrif >= '".$this->bendes."' and
						f.cedrif <= '".$this->benhas."' and
						f.tipcau >= '".$this->tipcaudes."' and
						f.tipcau <= '".$this->tipcauhas."' and
						f.fecemi >= to_date('".$this->fechades."','dd/mm/yyyy') and
						f.fecemi <= to_date('".$this->fechahas."','dd/mm/yyyy')
					union
						select
						b.refaju as numord,
						b.refaju as numord2,
						d.cedrif,
						d.nomben,
						to_char(b.fecaju,'dd/mm/yyyy') as fecemi,
						sum(c.monaju) as monto_orden,
						0,
						(case when d.status='A' then ' ' end) as status_ord,
						d.numtiq as numerotiq,
						e.nomext
					from
						cpajuste b,
						cpmovaju c,
						opordpag d,
						cpdocaju e
					where
						b.refaju=c.refaju and
						b.refere=d.numord and
						b.tipaju=e.tipaju and
						b.tipaju >= '".$this->tipcaudes."' and
						b.tipaju <= '".$this->tipcauhas."' and
						d.status='A' and
						c.refaju>= '".$this->nroorddes."' and
						c.refaju <= '".$this->nroordhas."' and
						b.fecaju >= to_date('".$this->fechades."','dd/mm/yyyy') and
						b.fecaju <= to_date('".$this->fechahas."','dd/mm/yyyy') and
						(b.tipaju='OP11' or b.tipaju='OP12')
					group by
						b.refaju,
						d.cedrif,
						d.nomben,
						b.fecaju,
						d.status,
						d.numtiq,
						e.nomext
					order by
					numord";


				//print $this->sql;
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",7);
			$this->cell(14,5,'Nro.');
			$this->cell(14,5,'Nro.');
			$this->cell(70,5,'Beneficiario');
			$this->cell(14,5,'N° Pagos',0,0,'C');
			$this->cell(20,5,'Monto',0,0,'R');
			$this->cell(30,5,'Tipo de Orden');
			$this->cell(15,5,'Fecha');
			$this->cell(20,5,'Estado');
			$this->ln(3);
			$this->cell(14,5,'O/P');
			$this->cell(15,5,'Ticket');
			$this->cell(102,5,'Total',0,0,'R');
			$this->cell(43,5,'Emisión',0,0,'R');
			$this->ln(4);
			$this->line(10,$this->getY(),200,$this->getY());

		}

		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$tb=$this->bd->select($this->sql);
			$this->tb2=$tb;

			while(!$tb->EOF){
				 $this->cell(14,4,$tb->fields["numord2"]);
				 $this->cell(14,4,$tb->fields["numerotiq"]);
				 $this->cell(78,4,'');

				 $numord=$tb->fields["numord"];
				    $this->sql2="select numcuo from opordper where refopp='$numord'";
				    $tb2=$this->bd->select($this->sql2);
					if (!empty($tb2->fields["numcuo"])){
						$this->cell(6,4,$tb2->fields["numcuo"],0,0,'C');
					}else{
						$this->cell(6,4,'1',0,0,'C');
					}

				$sum_total=$sum_total+($tb->fields["monto_orden"]-$tb->fields["monret"]);

				$this->cell(20,4,number_format(($tb->fields["monto_orden"]-$tb->fields["monret"]),2,'.',','),0,0,'R');
				$this->cell(30,4,'');
				$this->cell(15,4,$tb->fields["fecemi"]);
				$this->cell(15,4,strtoupper($tb->fields["status_ord"]));

				$Y2=$this->GetY();
				$this->setX(143);
				$this->multicell(30,4,$tb->fields["nomext"],0,'L',0);

				$Y3=$this->GetY();
				$this->setY($this->GetY()-($Y3-$Y2));
				$this->setX(38);
				$this->multicell(78,4,$tb->fields["nomben"]);


				$this->ln($Y3-$Y2);
				$cont=$cont+1;
				$Y=$this->GetY();
				if ($Y>=220)
				{ $this->AddPage(); }

			  $tb->MoveNext();
			}
			$this->setFont("Arial","B",8);
			$this->ln();
			$this->line(10,$this->getY(),200,$this->getY());
			$this->cell(50,6," ",0,0,'R');
 			$this->cell(25,6,"Total de Ordernes :   ".$cont);
			$this->cell(15,6," ",0,0,'R');
			$this->cell(30,6,"Total :        ".number_format($sum_total,2,'.',','),0,0,'R');

		}
	}
?>