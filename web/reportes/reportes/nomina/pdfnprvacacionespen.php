<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprvacacionespen.class.php");


class pdfreporte extends fpdf
{
	var $i=0;
	function pdfreporte()
	{
	 $this->fpdf("p","mm","Letter");
	 $this->codempdes=H::GetPost("codempdes");
	 $this->codemphas=H::GetPost("codemphas");
	 $this->codnomdes=H::GetPost("codnomdes");
	 $this->codnomhas=H::GetPost("codnomhas");
	 $this->relacion=H::GetPost("relacion");

	 $this->cab = new Cabecera();

	 $this->objclass = new Nprvacacionespen();
	 $this->arrp= $this->objclass->SQLp($this->codempdes,$this->codemphas,$this->codnomdes,$this->codnomhas,$this->relacion);
	 $this->llenartitulosmaestro();
	 $this->setAutoPageBreak(true,25);
	}

	function llenartitulosmaestro()
	{
		$this->titulos[]="Año";
		 $this->anchos[]=25;
		 $this->titulos[]="Dias Disponibles";
		 $this->anchos[]=25;
		 $this->titulos[]="Dias Disfrutados";
		 $this->anchos[]=25;
		 $this->titulos[]="Dias Pendientes";
		 $this->anchos[]=25;
		 $this->titulos[]="Estatus";
		 $this->anchos[]=25;
	}

	function Header()
	{
		 $this->cab->poner_cabecera($this,H::GetPost('titulo'),"p","p","s");


	}

	function Cuerpo()
	{
		$ref="";
		$nom="";
		$this->setFont("Arial","B",10);
                     $this->ln();
					 $this->multicell(190,6,$this->arrp[$this->i]['codemp'].'  -  '.$this->arrp[$this->i]['nomemp'].'                  Fecha de Ingreso: '.date('d/m/Y',strtotime($this->arrp[$this->i]['fecing'])),1);
					 $this->multicell(190,6,$this->arrp[$this->i]['codnom'].'  -  '.$this->arrp[$this->i]['nomnom'],1);
		 			 $this->ln();
		 $this->setWidths($this->anchos);
		 $this->setAligns('C');
		 $this->setborder(true);
		 $this->setJump(6);
		 $this->setX(42);
		 $this->rowm($this->titulos);
		  $this->ln();
		 $this->setFont("Arial","",10);
		 $this->setX(42);
		foreach($this->arrp as $r)
		{
			$difer = (intval($r['diadis'])-intval($r['diadisfru']));
			$difer==0 ? $estatus='TOMADAS' : ($difer==$r['diadis'] ? $estatus='PENDIENTES' : $estatus='PARCIALES') ;
			if($ref!=$r['codemp'])
			{
				$this->setFont("Arial","",10);
				if($ref)
				{
					if ($this->gety()>180){ $this->AddPage();}

				     $this->setFont("Arial","B",10);
					 $this->ln();
					 $this->multicell(190,6,$this->arrp[$this->i]['codemp'].'  -  '.$this->arrp[$this->i]['nomemp'].'                  Fecha de Ingreso: '.date('d/m/Y',strtotime($this->arrp[$this->i]['fecing'])),1);
					 $this->multicell(190,6,$this->arrp[$this->i]['codnom'].'  -  '.$this->arrp[$this->i]['nomnom'],1);
		 			 $this->ln();
		 			 $this->setWidths($this->anchos);
					 $this->setAligns('C');
					 $this->setborder(true);
					 $this->setJump(6);
					 $this->setX(42);
					 $this->rowm($this->titulos);
					 $this->setFont("Arial","",10);
					 $this->setX(42);
				}
			}elseif($nom!=$r['codnom'])
			{
				if($nom)
				{
					$this->AddPage();
				}
			}
			$this->setX(42);

			$this->rowm(array($r['ano'],$r['diadis'],$r['diadisfru'],$difer,$estatus));
			$ref=$r['codemp'];
			$nom=$r['codnom'];
			$this->i++;
		}


    }
}
?>