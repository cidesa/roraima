<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
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
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->codn1=$_POST["codn1"];
			$this->codn2=$_POST["codn2"];


			$this->sql="select distinct a.codcar, a.nomcar, a.suecar, b.codnom,c.nomnom,count(b.codemp) as canemp, a.carvan
			from npcargos a, npasicaremp b, npnomina c, nphojint d
			where rtrim(a.codcar) >= rtrim('".$this->cod1."') and rtrim(a.codcar) <= rtrim('".$this->cod2."')
			and rtrim(b.codnom) >= rtrim('".$this->codn1."') and rtrim(b.codnom) <= rtrim('".$this->codn2."')
			and a.codcar = b.codcar
			and b.codnom = c.codnom  and b.codemp=d.codemp and staemp='A'
			group by a.codcar, a.nomcar, a.suecar, b.codnom,c.nomnom, a.carvan";

			//select codcar,nomcar,suecar, stacar from npcargos where carvan>0
			//cuando funcione lo del cargo vacante

//print '<pre>'; print $this->sql; exit;
			$this->llenartitulosmaestro();
			$this->getAncho();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Cargo";
				$this->titulos[1]="Descripcion Cargo";
				$this->titulos[2]="Sueldo Cargo";
				$this->titulos[3]="Cantidad Empleados";
				$this->titulos[4]="Cargo Vacantes";
		}
		function getAncho()
		{

			$this->anchos[0]=28;
			$this->anchos[1]=85;
			$this->anchos[2]=40;
			$this->anchos[3]=20;
			$this->anchos[4]=20;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->setwidths($this->anchos);
			$this->setAligns(array("C","C","R","C","C"));
			$this->Row($this->titulos);
			$this->setwidths($this->anchos);
			$this->setAligns(array("C","L","R","C","C"));
			$this->Line(10,43,200,43);
			$this->ln();

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    $totnom=0;
		    $empnom=0;
		    $total=0;
		    $totalemp=0;
			$this->setFont("Arial","",8);
			$ref=$tb->fields["codnom"];
			if(!$tb->EOF)
			{
				$this->MCplus(180,4,' <@ Código Nómina:  '.$tb->fields["codnom"].'<,>arial,B,10,155,0,0 @>');
				$this->MCplus(180,4,' <@ Descripción Nómina:  '.$tb->fields["nomnom"].'<,>arial,B,10,155,0,0 @> ');
				$this->ln(3);
			}
			while (!$tb->EOF)
			{
				if($ref!=$tb->fields["codnom"])
				{
					$this->ln(6);
					$this->MCplus(180,4,' <@Total Nómina  '.trim($nomref).' : '.H::FormatoMonto($totnom).' <,>arial,B,10,155,0,0  @>');
					$this->MCplus(180,4,' <@Total Empleados de la Nómina   : '.($empnom).' <,>arial,B,10,155,0,0  @>');
					$totnom=0;
					$empnom=0;
					$this->ln(8);
					$this->MCplus(180,4,' <@ Código Nómina:  '.$tb->fields["codnom"].'<,>arial,B,10,155,0,0 @>');
					$this->MCplus(180,4,' <@ Descripción Nómina:  '.$tb->fields["nomnom"].'<,>arial,B,10,155,0,0 @> ');
					$this->ln(3);
				}
				$this->Row(array("".$tb->fields["codcar"],trim($tb->fields["nomcar"]),H::FormatoMonto($tb->fields["suecar"]),$tb->fields["canemp"],$tb->fields["carvan"]));
				$totnom+=$tb->fields["suecar"];
				$empnom+=$tb->fields["canemp"];
				$totalemp+=$tb->fields["canemp"];
				$total+=$tb->fields["suecar"];
				$nomref=$tb->fields["nomnom"];
				$ref=$tb->fields["codnom"];
				$tb->MoveNext();
			}
			$this->ln(6);
			$this->MCplus(180,4,' <@Total Nómina  '.trim($nomref).' : '.H::FormatoMonto($totnom).' <,>arial,B,10,155,0,0  @>');
			$this->MCplus(180,4,' <@Total Empleados de la Nómina   : '.($empnom).' <,>arial,B,10,155,0,0  @>');
			$this->ln(6);
			$this->MCplus(180,4,' <@Total General   : '.H::FormatoMonto($total).' <,>arial,B,11,0,0,155 @>');
			$this->MCplus(180,4,' <@Total de Empleados : '.($totalemp).' <,>arial,B,11,0,0,155 @>');
			$this->bd->closed();
		}
	}
?>
