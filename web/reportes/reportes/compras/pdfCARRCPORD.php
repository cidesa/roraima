<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
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
		var $fecha1;
		var $fecha2;
		var $pro1;
		var $pro2;
		var $art1;
		var $art2;
		var $com1;
		var $com2;
		var $status;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;	
				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->com1=$_POST["com1"];
			$this->com2=$_POST["com2"];
			$this->pro1=$_POST["pro1"];
			$this->pro2=$_POST["pro2"];
			$this->art1=$_POST["art1"];
			$this->art2=$_POST["art2"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];			
			$this->status=strtolower($_POST["status"]);
			
			if ($this->status=='t')
			{
			 $this->sql="select a.ordcom,a.fecord,a.desord,b.codart,d.rcpart,e.desrcp,e.fecrcp,b.canord,b.canrec,b.preart,
						c.desart,c.exitot
						from caordcom a, caartord b, caregart c,caartrcp d, carcpart e
						where 
						rtrim(a.ordcom) = rtrim(b.ordcom) and rtrim(b.codart)  = rtrim(c.codart) and
						rtrim(b.codart)  = rtrim(d.codart) and rtrim(b.ordcom)  = rtrim(d.ordcom) and
						rtrim(d.rcpart)  = rtrim(e.rcpart) and
						rtrim(a.ordcom) >= rtrim('".$this->com1."') and rtrim(a.ordcom) <= rtrim('".$this->com2."') and
						rtrim(a.codpro) >= rtrim('".$this->pro1."') and rtrim(a.codpro) <= rtrim('".$this->pro2."') and
						rtrim(b.codart) >= rtrim('".$this->art1."') and rtrim(b.codart) <= rtrim('".$this->art2."') and
						a.fecord >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecord <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.canord<>b.canrec
						order by a.ordcom";
			}
			else
			{
			$this->sql="select a.ordcom,a.fecord,a.desord,b.codart,d.rcpart,e.desrcp,e.fecrcp,b.canord,b.canrec,b.preart,
						c.desart,c.exitot
						from caordcom a, caartord b, caregart c,caartrcp d, carcpart e
						where 
						rtrim(a.ordcom) = rtrim(b.ordcom) and rtrim(b.codart)  = rtrim(c.codart) and
						rtrim(b.codart)  = rtrim(d.codart) and rtrim(b.ordcom)  = rtrim(d.ordcom) and
						rtrim(d.rcpart)  = rtrim(e.rcpart) and
						rtrim(a.ordcom) >= rtrim('".$this->com1."') and rtrim(a.ordcom) <= rtrim('".$this->com2."') and
						rtrim(a.codpro) >= rtrim('".$this->pro1."') and rtrim(a.codpro) <= rtrim('".$this->pro2."') and
						rtrim(b.codart) >= rtrim('".$this->art1."') and rtrim(b.codart) <= rtrim('".$this->art2."') and
						a.fecord >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecord <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.canord<>b.canrec and
						staord='".$this->status."'
						order by a.ordcom";
			}

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO. CUENTA";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="CARGABLE";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
		
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->cell(8,5,"Al  ".date('d/m/Y'));
			$this->ln(); 
			$this->ln(); 
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",8);
			
			if (!$tb2->EOF)
			{
				$ref=$tb2->fields["codart"];
				$this->cell(25,5,"C�digo Art�culo");
				$this->cell(60,5,"Descripci�n Art�culo");
				$this->cell(20,5,"Existencia Actual");
				$this->ln(); 
				$this->setFont("Arial","",8);
				$this->cell(25,5,$tb2->fields["codart"]);
				$this->cell(60,5,$tb2->fields["desart"]);
				$this->cell(20,5,$tb2->fields["exitot"]);
				$this->ln(); 
				$this->setFont("Arial","I",8);
				$this->cell(20,5,"Fecha Orden");
				$this->cell(20,5,"Nro. Orden");
				$this->cell(50,5,"Descripci�n Orden");
				$this->cell(25,5,"Fecha Recepci�n");
				$this->cell(25,5,"Nro. Recepci�n");
				$this->cell(50,5,"Descripci�n Recepci�n");
				$this->cell(20,5,"Precio Art.");
				$this->cell(20,5,"Cant. Ord.");
				$this->cell(20,5,"Cant. Recib.");
				$this->cell(20,5,"Diferencia");
				$this->setFont("Arial","",8);
				$this->ln(); 	
			}
			
			while(!$tb->EOF)
			{
				if ($tb->fields["codart"]!=$ref)
				{
				$this->ln(); 
				$this->cell(25,5,"C�digo Art�culo");
				$this->cell(60,5,"Descripci�n Art�culo");
				$this->cell(20,5,"Existencia Actual");
				$this->ln(); 
				$this->setFont("Arial","",8);
				$this->cell(25,5,$tb->fields["codart"]);
				$this->cell(60,5,$tb->fields["desart"]);
				$this->cell(20,5,$tb->fields["exitot"]);
				$this->ln(); 
				$this->setFont("Arial","I",8);
				$this->cell(20,5,"Fecha Orden");
				$this->cell(20,5,"Nro. Orden");
				$this->cell(50,5,"Descripci�n Orden");
				$this->cell(25,5,"Fecha Recepci�n");
				$this->cell(25,5,"Nro. Recepci�n");
				$this->cell(50,5,"Descripci�n Recepci�n");
				$this->cell(20,5,"Precio Art.");
				$this->cell(20,5,"Cant. Ord.");
				$this->cell(20,5,"Cant. Recib.");
				$this->cell(20,5,"Diferencia");
				$this->setFont("Arial","",8);
				$this->ln(); 
				}
			//Detalle
			$this->setFont("Arial","",8);
			$ref=$tb->fields["codart"];
			$this->cell(20,5,$tb->fields["fecord"]);
			$this->cell(20,5,$tb->fields["ordcom"]);
			$this->cell(50,5,$tb->fields["desord"]);
			$this->cell(25,5,$tb->fields["fecrcp"]);
			$this->cell(25,5,$tb->fields["rcpart"]);
			$this->cell(50,5,$tb->fields["desrcp"]);
			$this->cell(20,5,number_format($tb->fields["preart"],2,'.',','));
			$this->cell(20,5,$tb->fields["canord"]);
			$this->cell(20,5,$tb->fields["canrec"]);
			$this->cell(20,5,abs($tb->fields["canord"]-$tb->fields["canrec"]));
			$this->ln(); 
			$tb->MoveNext();
			}
		}
	}
?>
