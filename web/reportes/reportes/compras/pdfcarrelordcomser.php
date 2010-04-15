<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{



		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->orddes=H::GetPost("orddes");
			$this->ordhas=H::GetPost("ordhas");
			$this->fecmin=H::GetPost("fecmin");
			$this->fecmax=H::GetPost("fecmax");
			$this->rifdes=H::GetPost("rifdes");
			$this->rifhas=H::GetPost("rifhas");
			$this->realizadopor=H::GetPost("realizadopor");

  			$tb01=$this->bd->select("SELECT to_char(MAX(FECINI),'YYYY') as ANOPRE FROM CONTABA");
  			$this->anopre=$tb01->fields["ANOPRE"];

	$this->sql="		select a.ordcom,
 b.refprc as ref,
 e.nompro,
 a.monord
		from
		caordcom a left outer join caprovee e on (a.codpro=e.codpro) , cpcompro b
		where
		 a.ordcom=b.refcom
		and a.ordcom>= '".$this->orddes."'
						and a.ordcom<= '".$this->ordhas."'
						and a.fecord>= to_date('".$this->fecmin."','dd/mm/yyyy')
						and a.fecord<= to_date('".$this->fecmax."','dd/mm/yyyy')
						and e.rifpro>= ('".$this->rifdes."')
						and e.rifpro<= ('".$this->rifhas."')
		order by a.ordcom";

		/*	$this->sql=("select a.ordcom, b.reqart,e.nompro,a.monord
						from
						caordcom a left outer join casolart b on (a.refsol=b.reqart)
						left outer join caprovee e on (a.codpro=e.codpro)
						where
						a.ordcom>= '".$this->orddes."'
						and a.ordcom<= '".$this->ordhas."'
						and a.fecord>= to_date('".$this->fecmin."','dd/mm/yyyy')
						and a.fecord<= to_date('".$this->fecmax."','dd/mm/yyyy')
						and e.rifpro>= rpad('".$this->rifdes."',15,' ')
						and e.rifpro<= rpad('".$this->rifhas."',15,' ')
						order by a.ordcom");
						/*print '<pre>';
						print_r(  $this->sql);
						 print '</pre>';
						exit;*/
						//MESESCRITO HAY QUE EMPLEARLO//
				$this->setAutoPageBreak(true,20);
				$this->arrp=$this->bd->select($this->sql);
		}
		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$this->setwidths(array(105,25,25,35));
			$this->setaligns(array("C","C","C","C"));
			$this->setBorder(true);
			$this->rowM(array('BENEFICIARIO','N° ORDEN DE COMPRA / SERVICIO','N° SOLICITUD','TOTAL BS.'));
			$this->setaligns(array("L","C","C","R"));
			$this->ln(0.3);

		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$tb=$this->arrp;
			$tot_ord=0;
			while (!$tb->EOF)
			{
				$this->rowM(array($tb->fields["nompro"],$tb->fields["ordcom"],$tb->fields["ref"],H::FormatoMonto($tb->fields["monord"])));
				$tot_ord+=$tb->fields["monord"];
				$tb->MoveNext();
			}
			$this->setAutoPageBreak(false);
			//TOTAL
			/*$this->setFont("Arial","B",9);
			$this->setwidths(array(230,30));
			$this->setaligns(array("C","R"));
			$this->setBorder(true);
			$this->ROWM(array('TOTAL ORDENES',H::FormatoMonto($tot_ord)));*/
			//RECIBIDO
			$this->ln(2);
			$this->cell(60,5,'REALIZADO POR: '.strtoupper($this->realizadopor));
			$this->setAutoPageBreak(true,20);


		}
	}
?>