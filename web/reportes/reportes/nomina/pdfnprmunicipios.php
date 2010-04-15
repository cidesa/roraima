<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $titulos3;
		var $anchos;
		var $anchos2;
		var $anchos3;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $per1;
		var $per2;
		var $codmundes;
		var $codmunhas;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;	
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->titulos3=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->anchos3=array();
			$this->codmundes=$_POST["codmundes"];
			$this->codmunhas=$_POST["codmunhas"];

			
			$this->sql="select a.codpai, rtrim(a.nompai) as nompai, b.codedo, b.nomedo, c.codciu, c.nomciu 
			from nppais a, npestado b, npciudad c 
			where 
			(c.codciu) >= rpad('".$this->codmundes."',4,' ') and (c.codciu) <= rpad('".$this->codmunhas."',4,' ') and
			(a.codpai) = rpad(b.codpai,4,' ') and
			(b.codedo) = rpad(c.codedo,4,' ')
			order by a.codpai";

			$this->llenartitulosmaestro();
			$this->llenartitulosmaestro2();
			$this->llenartitulosmaestro3();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]=" ";
				$this->titulos[1]="Codigo Pais";
				$this->titulos[2]="Descripcion Pais";
		}
		function llenartitulosmaestro2()
		{
				$this->titulos2[0]=" ";
				$this->titulos2[1]="Codigo Estado";
				$this->titulos2[2]="Descripcion Estado";
		}
		function llenartitulosmaestro3()
		{
				$this->titulos3[0]=" ";
				$this->titulos3[1]="Codigo Ciudad";
				$this->titulos3[2]="Descripcion Ciudad";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$ncampos3=count($this->titulos3);
			$this->SetX(10);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],6,$this->titulos[$i]);
			}
			$this->ln(); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],6,$this->titulos2[$i]);
			}
			$this->ln(); 
			for($i=0;$i<$ncampos3;$i++)
			{
				$this->cell($this->anchos3[$i],6,$this->titulos3[$i]);
			}
			$this->ln(); 
			$this->Line(10,55,200,55);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);
			
			if (!$tb2->EOF)
			{
				$this->setFont("Arial","B",8);
				$ref=$tb2->fields["codpai"];
				$this->cell($this->anchos[0],5," ");
				$this->cell($this->anchos[1],5,"".$tb2->fields["codpai"]);
				$this->cell($this->anchos[2],5,substr($tb->fields["nompai"],0,120));
				$this->ln();
				$this->SetLineWidth(0.4);
				$this->Line(30,$this->GetY(),120,$this->GetY());
				
			}
			while (!$tb->EOF)
			{
				if($tb->fields["codpai"]!=$ref)
				{
				$this->setFont("Arial","B",8);
				$this->cell($this->anchos[0],5," ");
				$this->cell($this->anchos[1],5,"".$tb->fields["codpai"]);
				$this->cell($this->anchos[2],5,substr($tb->fields["nompai"],0,120));
				$this->SetLineWidth(0.4);
				$this->Line(30,$this->GetY(),120,$this->GetY());
				$this->ln();
				}
				//Detalle 
				$this->setFont("Arial","",8);
				$ref=$tb->fields["codpai"];
				$this->cell($this->anchos2[0],5," ");
				$this->cell($this->anchos2[1],5,"".$tb->fields["codedo"]);
 				$this->cell($this->anchos2[2],5,substr($tb->fields["nomedo"],0,120));
				$this->ln();
				$this->cell($this->anchos3[0],5," ");
				$this->cell($this->anchos3[1],5,"".$tb->fields["codciu"]);
				$this->cell($this->anchos3[2],5,substr($tb->fields["nomciu"],0,120));
				$this->ln();
				$tb->MoveNext();
			}
		}
	}
?>
