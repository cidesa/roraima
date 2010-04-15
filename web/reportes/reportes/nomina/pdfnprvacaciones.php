<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprvacaciones.class.php");


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

	 $this->objclass = new Nprvacaciones();
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
		 $this->setFont("Arial","B",10);
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

	function Cuerpo()
	{
		$ref="";
		$nom="";
		foreach($this->arrp as $r)
		{			
			if($ref!=$r['codemp'])
			{
				$this->setFont("Arial","",10);
				if($ref)
				{
					if($this->relacion=='S')
					{
						$this->ln(20);	
						$YY = $this->GetY();
						$this->setFont("Arial","UB",10);
						$this->multicell(190,6,'Relación de salidas de Vacaciones',0,'C');
						$this->setFont("Arial","B",10);
						$this->multicell(190,6,'* * *  SIN SALIDAS  * * *',0,'C');
						$this->setX(60);
						$this->setWidths(array(30,30,30));
						$this->setaligns('C');
						$this->setBorder(true);
						$this->rowm(array('Fecha Salida','Fecha Regreso','Dias Disfrutados'));
						$this->setFont("Arial","",10);
						$arrp2 = $this->objclass->SQLp2($ref);
						foreach($arrp2 as $d)
						{
							$this->setx(60);
							$this->rowm(array_slice($d,2));
						}
						if(!$arrp2)
							$this->multicell(190,6,'NO POSEE SOLICITUD DE VACACIONES',0,'C');
						$this->rect(50,$YY-5,110,$this->getY()-$YY+15);
					}
					$this->AddPage();	
				}				
			}elseif($nom!=$r['codnom'])
			{
				if($nom)
				{					
					$this->AddPage();	
				}				
			}
			$this->setX(42);
			$difer = (intval($r['diadis'])-intval($r['diadisfru']));
			$difer==0 ? $estatus='TOMADAS' : ($difer==$r['diadis'] ? $estatus='PENDIENTES' : $estatus='PARCIALES') ;
			$this->rowm(array($r['ano'],$r['diadis'],$r['diadisfru'],$difer,$estatus));
			$ref=$r['codemp'];
			$nom=$r['codnom'];
			$this->i++;
		}
		if($this->relacion=='S')
		{
			$this->ln(20);
			$YY = $this->GetY();			
			$this->setFont("Arial","UB",10);
			$this->multicell(190,6,'Relación de salidas de Vacaciones',0,'C');
			$this->setFont("Arial","B",10);
			$this->multicell(190,6,'* * *  SIN SALIDAS  * * *',0,'C');
			$this->setX(60);
			$this->setWidths(array(30,30,30));
			$this->setaligns('C');
			$this->setBorder(true);
			$this->rowm(array('Fecha Salida','Fecha Regreso','Dias Disfrutados'));
			$this->setFont("Arial","",10);
			$arrp2 = $this->objclass->SQLp2($this->arrp[$this->i-1]['codemp']);
			foreach($arrp2 as $d)
			{
				$this->setx(60);
				$this->rowm(array_slice($d,2));
			}
			if(!$arrp2)
				$this->multicell(190,6,'NO POSEE SOLICITUD DE VACACIONES',0,'C');
			$this->rect(50,$YY-5,110,$this->getY()-$YY+15);
		}
	
    }
}
?>