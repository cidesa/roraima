<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $result=0;
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
		var $codubi;
		var $reftra1;
		var $reftra2;
		var $fecreg1;
		var $fecreg2;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->reftra1=$_POST["reftra1"];
			$this->reftra2=$_POST["reftra2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];



				$this->sql="SELECT A.REFTRA as areftra, A.FECTRA as afectra, A.DESTRA as adestra, A.CTAORI as actaori, B.NOMCUE as bnomcue,
						   C.NOMCUE as cnomcue, A.CTADES as actades, A.MONTRA as amontra FROM TSMOVTRA A, TSDEFBAN B, TSDEFBAN C
						   WHERE A.CTAORI=B.NUMCUE AND A.CTADES=C.NUMCUE";

/*						    AND
						   A.REFTRA >= RPAD('".$this->reftra1."',20,' ') AND
						   A.REFTRA <= RPAD('".$this->reftra2."',20,' ') AND
						   A.FECTRA >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND
						   A.FECTRA <= to_date('".$this->fecreg2."','dd/mm/yyyy') ORDER BY A.FECTRA, A.REFTRA"; */


			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Referencia";
				$this->titulos[1]="Fecha";
				$this->titulos[2]="Descripción";
				$this->titulos[3]="                            Banco Origen";
				$this->titulos[4]="";
				$this->titulos[5]="                            Banco Destino";
				$this->titulos[6]="";
				$this->titulos[7]="Monto";

		}

		function llenartitulosdetalle()
		{
				$this->titulos2[0]=" ";
				$this->titulos2[1]=" ";
				$this->titulos2[2]=" ";
				$this->titulos2[3]="Nro Cuenta";
				$this->titulos2[4]="Banco";
				$this->titulos2[5]="Nro Cuenta";
				$this->titulos2[6]="Banco";

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
			$this->Line(10,48,270,48);
			$this->Line(92,43,162,43);
			$this->Line(173,43,237,43);
		}


		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

//			if(!$tb->EOF)
	//		{
			while(!$tb->EOF)
			{

				$this->setFont("Arial","",8);
				 $aux=$tb->fields["adestra"];
				 $this->cell($this->anchos[0],7,$tb->fields["areftra"]);
				 $this->cell($this->anchos[1],7,$tb->fields["afectra"]);
				 $this->cell($this->anchos[2],7,substr($aux,0,20));
				 $this->cell($this->anchos[3],7,$tb->fields["actaori"]);
				 $this->cell($this->anchos[4],7,substr($tb->fields["bnomcue"],0,30));
				 $this->cell($this->anchos[5],7,$tb->fields["actades"]);
				 $this->cell($this->anchos[6],7,substr($tb->fields["cnomcue"],0,30));
				 $this->cell($this->anchos[7],7,$tb->fields["amontra"]);
				 $this->acum=($this->acum+$tb->fields["amontra"]);
				 $this->ln();
				 $tb->MoveNext();
				}
				$this->setFont("Arial","B",8);
				$this->cell(20,10,"                                                                                                                                                                                                                                                                                 Total General   ".number_format($this->acum,2,',','.'));



		//	}
		}


	}
?>