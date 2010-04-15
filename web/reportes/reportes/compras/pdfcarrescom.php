<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{



		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","A4");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->orddes=H::GetPost("orddes");
			$this->ordhas=H::GetPost("ordhas");
			$this->fecmin=H::GetPost("fecmin");
			$this->fecmax=H::GetPost("fecmax");
			$this->rifdes=H::GetPost("rifdes");
			$this->rifhas=H::GetPost("rifhas");
			$this->ordpor=H::GetPost("ordpor");
			if($this->ordpor=='1')
				$sqlorder="order by a.ordcom";
			else
				$sqlorder="order by a.codpro,a.ordcom";

			$tb0=$this->bd->select("SELECT NOMINS as NOMINSTITUCION
  						FROM BNDEFINS");

  			$tb01=$this->bd->select("SELECT to_char(MAX(FECINI),'YYYY') as ANOPRE FROM CONTABA");
  			$this->anopre=$tb01->fields["ANOPRE"];

			$this->sql=("select
			 			a.ordcom,a.codpro,
			 			to_char(a.fecord,'dd/mm/yyyy') as fecord,
			 			b.reqart,
			 			to_char(b.fecreq,'dd/mm/yyyy') as fecreq,
						c.desubi as nomubi,
						d.refprc as refsol,
						e.nompro,
						a.monord,
						a.staord,to_char(f.fecprc,'dd/mm/yyyy') as fecprc
						from
						caordcom a left outer join casolart b on (a.refsol=b.reqart)
						left outer join caprovee e on (a.codpro=e.codpro)
						left outer join bnubica c on ((a.coduni)=(c.codubi)),
						cpcompro d left outer join cpprecom f on (d.refprc=f.refprc)
						where
						a.ordcom>= '".$this->orddes."'
						and a.ordcom<= '".$this->ordhas."'
						and a.fecord>= to_date('".$this->fecmin."','dd/mm/yyyy')
						and a.fecord<= to_date('".$this->fecmax."','dd/mm/yyyy')
						and e.rifpro>= ('".$this->rifdes."')
						and e.rifpro<= ('".$this->rifhas."')
						and a.ordcom=d.refcom
						group by
						a.ordcom,a.codpro,
						to_char(a.fecord,'dd/mm/yyyy'),
						b.reqart,
						to_char(b.fecreq,'dd/mm/yyyy'),
						c.desubi
						,d.refprc
						,e.nompro,
						a.monord,
						a.staord,f.fecprc
						$sqlorder ");
						/* print '<pre>';
						print_r(  $this->sql);
						 print '</pre>';
						exit;*/
						//MESESCRITO HAY QUE EMPLEARLO//
				$this->setAutoPageBreak(true,20);

				$this->arrp=$this->bd->select($this->sql);

				$tbti=$this->bd->select("SELECT NOMABR FROM CPNIVELES WHERE CATPAR='C'
									UNION ALL
									SELECT NOMEXT FROM CPNIVELES WHERE UPPER(TRIM(NOMEXT))='PARTIDA'");
				$arrtb = $tbti->GetArray();
				foreach($arrtb as $ar)
				{
					$arr[]=$ar[0];
				}
				$this->vartit=strtoupper(implode("-",$arr));
		}
		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s");
			$this->ln(1);
			$this->setFont("Arial","B",8);
			$this->setwidths(array(20,25,20,25,50,70,30,20));
			$this->setaligns(array("C","C","C","C","C","C","C","C"));
			$this->setBorder(true);
			$this->rowM(array('N° ORDEN','FECHA ORDEN','N° SOLICITUD','FECHA SOL.','DESTINO','PROVEEDOR','MONTO','ESTATUS'));
			$this->setaligns(array("C","C","C","C","L","L","R","C"));

		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$tb=$this->arrp;
			$tot_ord=0;
			while (!$tb->EOF)
			{
				if(strtoupper($tb->fields["staord"])=='A')
				{
					$status="ACTIVADA";
				}else
				{
					$status="ANULADA";
				}
				//$tb->fields["codpar"]
				$this->rowM(array($tb->fields["ordcom"],$tb->fields["fecord"],$tb->fields["refsol"],$tb->fields["fecprc"],$tb->fields["nomubi"]
								,$tb->fields["nompro"],H::FormatoMonto($tb->fields["monord"]),$status));
				$tot_ord+=$tb->fields["monord"];
				$tb->MoveNext();
			}
			//TOTAL
			$this->setFont("Arial","B",9);
			$this->setwidths(array(230,30));
			$this->setaligns(array("C","R"));
			$this->setBorder(true);
			$this->ROWM(array('TOTAL ORDENES',H::FormatoMonto($tot_ord)));

		}
	}
?>