<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $anchos;
		var $campos;
		var $sql;
		var $conf;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->campos=array();
			$this->anchos=array();


				$this->sql="select a.codact, a.desact, a.afoact, a.mintri, a.minofac from  inregfue a
							order by codact";


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(false,32);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código";
				$this->titulos[1]="Concepto";
				$this->titulos[2]="Base Legal";
				$this->titulos[3]="Alícuota";
				$this->titulos[4]="U.T. x Alícuota";



		}

		function Header()
		{
			$this->SetLineWidth(0.1);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<5;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i],0,0,'C');
			}
			$this->ln();

			$this->Line(10,45,200,45);
			$this->Line(10,45.8,200,45.8);
			$this->SetXY(10,25);
			$this->Line($this->GetX(),$this->GetY()+10,$this->GetX(),$this->GetY()+220);
			$this->Line($this->GetX()+$this->anchos[0],$this->GetY()+10,$this->GetX()+$this->anchos[0],$this->GetY()+220);
			$this->Line($this->GetX()+$this->anchos[0]+$this->anchos[1],$this->GetY()+10,$this->GetX()+$this->anchos[0]+$this->anchos[1],$this->GetY()+220);
			$this->Line($this->GetX()+$this->anchos[0]+$this->anchos[1]+$this->anchos[2],$this->GetY()+10,$this->GetX()+$this->anchos[0]+$this->anchos[1]+$this->anchos[2],$this->GetY()+220);
			$this->Line($this->GetX()+$this->anchos[0]+$this->anchos[1]+$this->anchos[2]+$this->anchos[3],$this->GetY()+10,$this->GetX()+$this->anchos[0]+$this->anchos[1]+$this->anchos[2]+$this->anchos[3],$this->GetY()+220);
			$this->Line(200,$this->GetY()+10,200,$this->GetY()+220);
			$this->Line(10,245,200,245);
			$this->SetXY(10,50);
		}




		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$acum=0;
			while(!$tb->EOF)
			{
				$sql2="SELECT (UNITRI*".$tb->fields["afoact"].") into montotal FROM INDEFINS";
				$tb2=$this->bd->select($sql2);
				$this->setFont("Arial","",8);
				 $this->SetAutoPageBreak(false);
				 $yy=$this->GetY();
				 $this->cell($this->anchos[0],4,$tb->fields["codact"],0,0,'C');
				 $this->Multicell($this->anchos[1],3,$tb->fields["desact"]);
				 $y1=$this->GetY();
				 $this->SetXY($this->anchos[0]+$this->anchos[1]+10,$yy);
				 $this->Multicell($this->anchos[2]-2,3,"",0,0,'R'); //ojo en el reporte original no tenia ningún campo asignado... REVISAR
				 $y2=$this->GetY();
				 $this->SetXY($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+10,$yy);
				 $this->cell($this->anchos[3]-2,4,$tb->fields["afoact"],0,0,'R');
				 $this->cell($this->anchos[4]-4,4,number_format($tb2->fields["montototal"],'2','.',','),0,0,'R');
				 $this->SetAutoPageBreak(true);
				 if($y1>$y2){
				 	$this->SetY($y1+5);
				 } else $this->SetY($y2+5);
				 $tb->MoveNext();
				 if ($this->GetY()>=220){
				 	$this->AddPage();
				 }
				}

		}


	}
?>