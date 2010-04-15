<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprautvac.class.php");


class pdfreporte extends fpdf
{
	function pdfreporte()
	{
	 $this->fpdf("p","mm","Letter");
	 $this->codempdes=H::GetPost("codempdes");
	 $this->codemphas=H::GetPost("codemphas");
	 $this->dirapo=H::GetPost("dirapo");

	 $this->cab = new Cabecera();

	 $this->objclass = new Nprautvac();
	 $this->arrp= $this->objclass->SQLp($this->codempdes,$this->codemphas);
	 $this->setAutoPageBreak(true,25);
	}

	function Header()
	{
		 $this->setdrawcolor(255,255,255);
		 $this->cab->poner_cabecera($this,H::GetPost('titulo'),"p","p","s");
		 $this->ln(10);
		 $this->setdrawcolor(0,0,0);
		 $this->setfont(arial,B,8);
	}

	function Cuerpo()
	{
		$ref="";
		foreach($this->arrp as $r)
		{
			if($ref!=$r['codemp'])
			{
				if($ref)
				{
					$this->AddPage();
				}
			}else
				$this->AddPage();
			$this->setFont(arial,'B',12);
			$this->MCPLUS(180,6,'PARA: <@ '.$r['nomemp'].' <,>arial,,11@>'.chr(9).'C.I.: <@ '.H::FormatoMonto($r['cedemp'],0).' <,>arial,,11@>');
			$this->MCPLUS(180,6,'DE:  '.'DIRECTOR DE RECURSOS HUMANOS');
			$this->MCPLUS(180,6,'FECHA: <@ '.date('d/m/Y').' <,>arial,,11@>');
			$this->ln();
			$this->setFont(arial,'',12);
			$this->Multicell(180,6,'Me es grato dirigirme a usted, en la oportunidad de hacer de su conocimiento que está autorizado(a) para disfrutar de sus Vacaciones, correspondientes al (los) período(s) : ');
			$this->ln();
			$this->arrp2= $this->objclass->SQLp2($r['cedemp']);
			$this->setwidths(array(25,25,25));
			$this->setaligns(array("C","C","C"));
			$this->setBorder(true);
			$this->setx(70);
			$this->rowm(array("Inical","Final","Dias Disfrutados"));
			$this->setaligns(array("C","C","C"));
			foreach ($this->arrp2 as $det){
			 $this->setx(70);
             $this->rowm(array($det['perini'],$det['perfin'],$det['diasvac']));
             $this->acum+=$det['diasvac'];
             //$this->ln();
			}
			$this->ln(10);
			$this->setFont(arial,'B',12);
			$this->MCPLUS(180,6,'Fecha de Ingreso: <@ '.date('d/m/Y',strtotime($r['fecing'])).' <,>arial,,11@>');
			$this->MCPLUS(180,6,'Dias a Disfrutar: <@ '.$this->acum.' <,>arial,,11@>');
			$this->MCPLUS(180,6,'Fecha de Inicio: <@ '.date('d/m/Y',strtotime($r['fecdes'])).' <,>arial,,11@>');
			$this->MCPLUS(180,6,'Fecha de Retorno: <@ '.date('d/m/Y',strtotime($r['fechas'])).' <,>arial,,11@>');
			$this->acum=0;
			//$this->ln(15);
			//$this->MCPLUS(180,6,' <@ Sin otro particular a que hacer referencia, me despido.<,>arial,,11@>');
			//$this->ln(12);
			//$this->multicell(180,6,'Atentamente,',0,'C');
			$this->ln(20);
			$this->multicell(180,6,$this->dirapo."\n".'Director(a) de Recursos Humanos',0,'C');
			$this->ln(8);
			$this->setFont(arial,'',11);
			$this->multicell(180,6,'Recibi conforme:________________________',0,'R');
			$this->ln(8);
			$this->setFont(arial,'',11);
			$this->multicell(180,6,'Fecha:__________',0,'R');
			$ref=$r['codemp'];
		}

    }
}
?>