<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sql1;
		var $sql2;
		var $rep;
		var $cab;
		var $titulo;
		var $cat1;
		var $cat2;
		var $uni1;
		var $uni2;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;
		var $cantcat=0;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->cat1=$_POST["cat1"];
			$this->cat2=$_POST["cat2"];
			$this->uni1=$_POST["uni1"];
			$this->uni2=$_POST["uni2"];
            $this->titulo=$_POST["titulo"];


			$this->sql="select a.codcat as codcat, a.nomcat as nomcat, b.nomuni as nomuni
					--from fordefcatpre a left outer join fordefunieje b on (a.coduni=b.coduni and (b.coduni >= '".$this->uni1."' and b.coduni <= '".$this->uni2."'))
					from fordefcatpre a left outer join fordefunieje b on (a.coduni=b.coduni)
					where (a.codcat >= '".$this->cat1."' and a.codcat <= '".$this->cat2."')
					order by a.codcat";

		//print $this->sql;
			$this->cab=new cabecera();

		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,H::GetPost("titulo"),"p","s");
			$this->Image("../../img/logo_1.jpg",10,12,18);
			/////////////////////
			$this->Rect(10,10,190,30);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			$this->SetX(45);
			//$this->cell(5,5,"JOSE FELIX RIBAS");
			$this->SetY(13);
			$this->SetX(45);
			//$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->setFont("Arial","",7);
			$this->SetY(11);
			$this->SetX(175);
			$this->cell(10,5,"FECHA");
			$this->setFont("Arial","",7);
			//$this->SetY(15);
			//$this->SetX(183);
			$this->cell(20,5,date('d/m/y'));
			$this->setFont("Arial","B",14);
			$this->SetY(25);
			$this->SetX(62);
			$this->cell(5,5,$this->titulo);
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(80);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(100);
			$this->cell(5,5,date('Y'));
			$this->setFont("Arial","",7);

			$this->SetY(16);
			$this->SetX(175);
			$this->cell(5,5,'Pagina ' . $this->PageNo() . ' de {nb}');


			/////////////////////

			$sql="select * from forniveles where catpar='C' order by consec";
			$tb=$this->bd->select($sql);

			$this->setFont("Arial","B",7);
			$this->Rect(10,42,190,5);

			$this->SetY(42);
			$y=42;
			$acumancho=0;
			$this->arre=array();
			$i=0;
			while (!$tb->EOF)
			{
				$ancho=$tb->fields["lonniv"]*2+5;
				$acumancho=$acumancho+$ancho;
				$this->arre[$i]=$ancho;
				$this->cell($ancho,5,substr($tb->fields["nomext"],0,4),0,0,"C");
				$this->line(10+$acumancho,$y,10+$acumancho,$y+5);

			$i=$i+1;
			$tb->MoveNext();
			}
			$this->cantcat=$i;
			$ancho=$ancho+90;
			$acumancho=$acumancho+$ancho;
			$this->cell($ancho,5,"DENOMINACION",0,0,"C");
			$this->line(10+$acumancho,$y,10+$acumancho,$y+5);
			$this->cell(65,5,"UNIDAD EJECUTORA",0,0,"L");
			$this->ln(5);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",7);
			while (!$tb->EOF)
			{
				$y=$this->GetY();
				if ($y>=250)
				{
					$this->line(10,$this->GetY()+1,200,$this->GetY()+1);
					$this->ln(500);
					$this->cell(1,5,"");
				}
			$cod=array();
			$cod=split("-",$tb->fields["codcat"]);
			$cont=count($cod);
			$cont=$cont-1;


			//chekeamos hasta que nivel esta lleno
			for ($cc=$cont;$cc>=0;$cc--)
			{
				if ($cod[$cc]!='')
				{
					$i=$cc;
					break;
				}
			}
			///////////////////////////////////////


			//pintar lineas por registro
			$j=0;
			$acumarrej=10;
			$this->line(10,$this->GetY(),10,$this->GetY()+5);
			while ($j<=$this->cantcat)
			{
				$acumarrej=$acumarrej+$this->arre[$j];
				$this->line($acumarrej,$this->GetY(),$acumarrej,$this->GetY()+5);

				$j=$j+1;
			}
			//////////


			///Pintamos registros
			$j=0;
			$this->cell(2,5,"");
			while ($j<=$i)
			{

				//$this->cell(5,5,"arrej=".$this->arre[$j]);
				if ($j!=$i)
				{
					$this->cell($this->arre[$j],5,"",0,0,"L");
				}
				else
				{
					$this->cell($this->arre[$j],5,$cod[$j],0,0,"L");
				}
				$j=$j+1;
			}

			$this->SetX($acumarrej);
			$this->cell(80,5,substr($tb->fields["nomcat"],0,65));
			$this->SetX($acumarrej+100);
			$this->line($acumarrej+99,$this->GetY(),$acumarrej+99,$this->GetY()+5);
			$this->cell(45,5,substr($tb->fields["nomuni"],0,40));
			$this->line($acumarrej+136,$this->GetY(),$acumarrej+136,$this->GetY()+5);
			//$this->line($acumarrej+153,$this->etY(),$acumarrej+500,$this->GetY()+5);
			//////////////////////////////////////


			$this->ln(4);
			$tb->MoveNext();
			}
			$this->line(10,$this->GetY()+1,200,$this->GetY()+1);
		}
	}
?>
