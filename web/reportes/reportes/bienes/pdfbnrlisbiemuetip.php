<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $acum2=0;
		var $acum3=0;
		var $result=0;
		var $result2=0;
		var $result3=0;
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
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $fecreg1;
		var $fecreg2;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;
		var $acumcat;
	    var	$acumtotal;
	    var $y;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
	        $this->arrp=array("no_vacio");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codubi=H::GetPost("codubi");
			$this->codact1=H::GetPost("codact1");//activo
			$this->codact2=H::GetPost("codact2");
			$this->codmue1=H::GetPost("codmue1");//bien
			$this->codmue2=H::GetPost("codmue2");
			$this->fecreg1=H::GetPost("fecreg1");
			$this->fecreg2=H::GetPost("fecreg2");
			$this->prenom=H::GetPost("prenom");
			$this->respon=H::GetPost("respon");
			$this->responcar=H::GetPost("responcar");


			$this->sql="SELECT DISTINCT(A.CODACT ) AS codact, B.DESACT AS desact, COUNT (A.CODACT ) AS cant, SUM(A.VALINI) AS total
						FROM
						BNREGMUE A, BNDEFACT B
						WHERE
						RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND
						RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND
						RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."')  AND
						A.CODACT=B.CODACT AND
                        to_date(RTRIM(A.FECREG),'yyyy-mm-dd') >= to_date(RTRIM('".$this->fecreg1."'),'dd/mm/yyyy') AND
                       to_date(RTRIM(A.FECREG),'yyyy-mm-dd') <= to_date(RTRIM('".$this->fecreg2."'),'dd/mm/yyyy')--AND
                        --RTRIM(A.CODUBI) >= RTRIM('2-01-01') AND RTRIM(A.CODUBI) <= RTRIM('2-14-01')
						GROUP BY A.CODACT, B.DESACT
						ORDER BY  A.CODACT" ;
  //print '<pre>'; print $this->sql;exit;
/*WHERE AND
						 AND RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND RTRIM(A.CODUBI) = RTRIM('".$this->codubi."')
						AND  A.FECREG >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECREG <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND A.STAMUE<>'D' AND RTRIM(A.CODUBI)=RTRIM(B.CODUBI) ORDER BY A.CODMUE, A.CODACT

	*/
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

	for($i=0;$i<count($this->titulos);$i++)
	{
		$this->anchos[$i]=$this->getAncho($i);
	}
		}

	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=35;
		$anchos[1]=100;
		$anchos[2]=20;
		$anchos[3]=35;


		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=35;
		$anchos2[1]=100;
		$anchos2[2]=20;
		$anchos2[3]=35;


		return $anchos2[$pos];
	}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código del Activo";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Cantidad";
				$this->titulos[3]="total";


		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i],0,0,'C');
			}
			$this->Line(10,46,200,46);
   		    $this->ln();

		}
	function Footer()
		{
			if ($this->acumtotal!=0 and $this->acumcat!=0)
			{
		 	   $this->setFont("Arial","B",10);
			   $this->cell($this->anchos[0],10,'');
			   $this->cell($this->anchos[1],10,'TOTAL PARCIAL: ',0,0,'R');
			   $this->cell($this->anchos[2],10,H::FormatoMonto($this->acumcat),0,0,'R');
			   $this->cell($this->anchos[3],10,H::FormatoMonto($this->acumtotal),0,0,'R');
			}
		}
			function Cuerpo()
{
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			$acumcat=0;
			$acumtotal=0;
			$this->acumcat=0;
			$y=$this->GetY()+7;
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);
				$this->cell($this->anchos[0],10,$tb->fields["codact"]);
				$this->cell($this->anchos[1],10,$tb->fields["desact"]);
				$this->cell($this->anchos[2],10,H::FormatoMonto($tb->fields["cant"]),0,0,'R');
				$this->cell($this->anchos[3],10,H::FormatoMonto($tb->fields["total"]),0,0,'R');
				$this->acumcat+=$tb->fields["cant"];
			    $this->acumtotal+=$tb->fields["total"];
		//	    $this->Line(10,$y,220,$y);
				$y=$this->GetY()+10;
				$tb->MoveNext();
			    $this->ln(4);
			}
			  $this->SetXY(27,$this->getY()+5);
			  $this->Line(10,$this->getY(),200,$this->getY());
			  $this->Line(10,$this->getY()+2,200,$this->getY()+2);
 $this->ln(2);
			   $this->setFont("Arial","B",10);
			   $this->cell($this->anchos[0],10,'');
			   $this->cell($this->anchos[1],10,'TOTAL GENERAL: ',0,0,'R');
			   $this->cell($this->anchos[2],10,H::FormatoMonto($this->acumcat),0,0,'R');
			   $this->cell($this->anchos[3],10,H::FormatoMonto($this->acumtotal),0,0,'R');
			   $this->acumcat=0;
			   $this->acumtotal=0;


			   $this->SetXY(0,$this->getY()+10);
			   $this->cell(90,10,"RESPONSABLE: ".$this->respon.'                  Cargo: '.$this->responcar,0,0,'C');



		}

	}

?>