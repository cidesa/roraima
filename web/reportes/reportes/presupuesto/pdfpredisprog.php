<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Prerasiini.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Predisper.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Predisprog.class.php");

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
	var $perdesde;
	var $perhasta;
	var $nivdesde;
	var $nivhasta;
	var $agrupar;
	var $asignacion;
	var $codpredes;
	var $codprehas;
	var $comodin;
	var $totalprc;
	var $totalcom;
	var $totalcau;
	var $totalpag;
	var $totalmod;
    var $totalaco;
	var $totaldeu;
	var $totaldis;
	var $perasi;
	var $consec;
    var $grupo;
	var $cuantos;
	var $longrupo;
	var $lonpartida;
	var $cadena;
	var $totalprccat;
	var $totalcomcat;
	var $totalcaucat;
	var $totalpagcat;
	var $totalmodcat;
    var $totalacocat;
	var $totaldeucat;
	var $totaldiscat;
	var $categoria;
	var $nivel;
	var $posY;
	var $inipartida;
	var $nomcat;

	function pdfreporte()
	{
		$this->fpdf("l","mm","Letter");
		$this->bd=new basedatosAdo();
		$this->titulos=array();
		$this->titulos2=array();
		$this->campos=array();
		$this->anchos=array();
		$this->anchos2=array();
		$this->perdesde=H::GetPost("perdesde");
		$this->perhasta=H::GetPost("perhasta");
		$this->nivhasta=H::GetPost("nivhasta");
		$this->asignacion=H::GetPost("asignacion");
		$this->movimiento=H::GetPost("movimiento");
		$this->agrupar=H::GetPost("agrupar");
		$this->codpredes=H::GetPost("codpredes");
		$this->codprehas=H::GetPost("codprehas");
		$this->comodin=H::GetPost("comodin");
		$this->pretitulo=H::GetPost("titulo");
		if ($this->pretitulo=='Otro')
		{ $this->titulopdf=H::GetPost("otrotit");}
		else { $this->titulopdf=$this->pretitulo;}
		if($this->asignacion=="Acumulada")
		{ $this->perasidesde=$this->perdesde;
		  $this->perasihasta=$this->perhasta;
	    }
		else
		{
		  $this->perasidesde='01';
		  $this->perasihasta='12';
		}
		if($this->movimiento=="Acumulados")
		{ $this->permovdesde='01';
		  $this->permovhasta=$this->perhasta;
	    }
		else
		{
		  $this->permovdesde=$this->perdesde;
		  $this->permovhasta=$this->perhasta;
		}
		$this->predisper= new Predisper();
		$annos=$this->predisper->sql_cpdefniv();
		$this->anno=substr($annos,0,3);
		$this->predisprog= new Predisprog();
        $this->longrupo=$this->predisprog->sql_cpniveles($this->agrupar);
        $this->lonpartida=$this->predisprog->sql_cpniveles2($this->nivhasta);
        $this->inipartida=$this->predisprog->sql_cpniveles3();
        $this->arrp=$this->predisprog->sqlp($this->longrupo,$this->inipartida,$this->lonpartida,$this->perasidesde,$this->perasihasta,$this->perdesde,$this->perhasta,$this->codpredes,$this->codprehas,$this->comodin,$this->anno,$this->permovdesde,$this->permovhasta);
		$this->llenartitulosmaestro();
		$this->cab=new cabecera();
	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="CODIGO";
	 $this->titulos[1]="DENOMINACION";
	 $this->titulos[2]="LEY";
	 $this->titulos[3]="MODIFICACION(+/-)";
	 $this->titulos[4]="ACORDADO";
	 $this->titulos[5]="PRECOMPROMISO";
	 $this->titulos[6]="DISPONIBILIDAD";
	 $this->titulos[7]="COMPROMISO";
	 $this->titulos[8]="CAUSADO";
	 $this->titulos[9]="PAGADO";
	 $this->anchos[0]=15;//codigo
	 $this->anchos[1]=40;//denominacion
     $this->anchos[2]=23;//ley asignacion inicial
	 $this->anchos[3]=26;//modificaciones
     $this->anchos[4]=26;//asignacion actualizada (gasto acordado)
     $this->anchos[5]=23;//compromisos
     $this->anchos[6]=23;//disponibilidad
	 $this->anchos[7]=23;//causado
     $this->anchos[8]=23;//pagado
     $this->anchos[9]=23;//deuda
	}

	function Header()
	{
	 $dir = parse_url($_SERVER["HTTP_REFERER"]);
	 $parte = explode("/",$dir["path"]);
	 $ubica = count($parte)-2;
	 $this->cab->poner_cabecera($this,$this->titulopdf,"l","s",$parte[$ubica]);
	 $this->setFont("Arial","B",7);
	 $ncampos=count($this->titulos);
	 for($i=0;$i<$ncampos;$i++)
	 {
		$this->cell($this->anchos[$i],5,$this->titulos[$i],0,0,'R');
	 }
	 $this->ln(3);
	 $this->Line(10,45,270,45);
	 $this->ln(5);
	 $t=$this->GetY();
	 $this->SetY($t+5);
	}

	function Cuerpo()
	{
	 $ref="";
	 $totalprc=0;
     $totalcom=0;
     $totalcau=0;
     $totalpag=0;
     $totalmod=0;
     $totalasi=0;
     $totalaco=0;
     $totaldeu=0;
     $totaldis=0;

	 $totalprccat=0;
     $totalcomcat=0;
     $totalcaucat=0;
     $totalpagcat=0;
     $totalmodcat=0;
     $totalasicat=0;
     $totalacocat=0;
     $totaldeucat=0;
     $totaldiscat=0;
	 $categoria="";
	 foreach($this->arrp as $datos)
	 {
        if ($categoria=="")
		{
		 $this->setFont("Arial","B",7);
		 $this->cell(24,4,$datos["categoria"],0,0,'L');
		 $this->SetX(36);
		 $this->nombre=$this->predisper->sql_cpdeftit($datos["categoria"]);
		 $this->cell(23,4,$this->nombre[0][0],0,0,'L');
		 $this->ln(6);
		}
		$this->setFont("Arial","",7);
		if (($categoria!=$datos["categoria"])&&($categoria!="") )
		{
		    $this->nomcat=$this->predisper->sql_cpdeftit($categoria);
		    $this->setFont("Arial","B",7);
			$this->ln(2);
			$this->cell(68,4,"TOTAL ".$this->nomcat[0][0]." ",0,0,'R');
			$this->cell(27,4,H::FormatoMonto($totalasicat),0,0,'R');
			$this->cell(23,4,H::FormatoMonto($totalmodcat),0,0,'R');
			$this->cell(23,4,H::FormatoMonto($totalacocat),0,0,'R');
			$this->cell(23,4,H::FormatoMonto($totalprccat),0,0,'R');
			$this->cell(23,4,H::FormatoMonto($totaldiscat),0,0,'R');
			$this->cell(23,4,H::FormatoMonto($totalcaucat),0,0,'R');
			$this->cell(23,4,H::FormatoMonto($totalpagcat),0,0,'R');
			$this->cell(23,4,H::FormatoMonto($totalcomcat),0,0,'R');
			$this->ln(6);
		    $this->cell(24,4,$datos["categoria"],0,0,'L');
		    $this->SetX(36);
		    $this->nombre=$this->predisper->sql_cpdeftit($datos["categoria"]);
		    $this->cell(23,4,$this->nombre[0][0],0,0,'L');
		    $this->ln(6);
			$this->setFont("Arial","",7);
			$totalprccat=$datos["precompromiso"];
			$totalcomcat=$datos["compromiso"];
			$totalcaucat=$datos["causado"];
			$totalpagcat=$datos["pagado"];
			$totalmodcat=$datos["modificado"];
			$totalasicat=$datos["asignacion"];
			$totalacocat=$datos["asignacion"]+$datos["modificado"];
			$totaldiscat=$datos["asignacion"]+$datos["modificado"]-$datos["precompromiso"];
			$totaldeucat=$datos["causado"]-$datos["pagado"];
		}
		else
		{
			//ACUMULADOR POR CATEGORIAS
			$totalprccat=$totalprccat+$datos["precompromiso"];
			$totalcomcat=$totalcomcat+$datos["compromiso"];
			$totalcaucat=$totalcaucat+$datos["causado"];
			$totalpagcat=$totalpagcat+$datos["pagado"];
			$totalmodcat=$totalmodcat+$datos["modificado"];
			$totalasicat=$totalasicat+$datos["asignacion"];
			$totalacocat=$totalacocat+$datos["asignacion"]+$datos["modificado"];
			$totaldiscat=$totaldiscat+$datos["asignacion"]+$datos["modificado"]-$datos["precompromiso"];
			$totaldeucat=$totaldeucat+$datos["causado"]-$datos["pagado"];
		}
		$categoria=$datos["categoria"];

		//Detalle
		$this->cell(20,4,$datos["codpres"],0,0,'R');
        $this->SetX(82);
		$this->cell(23,4,H::FormatoMonto($datos["asignacion"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["modificado"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["asignacion"]+$datos["modificado"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["precompromiso"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["asignacion"]+$datos["modificado"]-$datos["precompromiso"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["compromiso"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["causado"]),0,0,'R');
		$this->cell(22,4,H::FormatoMonto($datos["pagado"]),0,0,'R');
        $this->SetX(36);
		$this->multicell(47,4,$datos["nompre"]);

		//ACUMULADOR GENERAL
		$totalprc=$totalprc+$datos["precompromiso"];
        $totalcom=$totalcom+$datos["compromiso"];
        $totalcau=$totalcau+$datos["causado"];
	    $totalpag=$totalpag+$datos["pagado"];
        $totalmod=$totalmod+$datos["modificado"];
        $totalasi=$totalasi+$datos["asignacion"];
        $totalaco=$totalaco+$datos["asignacion"]+$datos["modificado"];
	    $totaldis=$totaldis+$datos["asignacion"]+$datos["modificado"]-$datos["precompromiso"];
        $totaldeu=$totaldeu+$datos["causado"]-$datos["pagado"];
			if ($this->GetY()>=170){
				$this->AddPage();
			}
		}

		$this->setFont("Arial","B",7);
		//IMPRIMO EL ULTIMO TOTAL DE CAT
	    $this->nomcat=$this->predisper->sql_cpdeftit($categoria);
	    $this->cell(68,4,"TOTAL ".substr($this->nomcat,0,60)."     ",0,0,'R');
		$this->cell(27,4,H::FormatoMonto($totalasicat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalmodcat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalacocat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalprccat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totaldiscat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalcomcat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalcaucat),0,0,'R');
		$this->cell(22,4,H::FormatoMonto($totalpagcat),0,0,'R');
		$this->ln();

		//AHORA EL TOTAL GENERAL
		$this->Line(10,$this->GetY(),270,$this->GetY());

		$this->cell(68,7,"TOTAL GENERAL",0,0,'R');
		$this->cell(27,7,H::FormatoMonto($totalasi),0,0,'R');
		$this->cell(23,7,H::FormatoMonto($totalmod),0,0,'R');
		$this->cell(23,7,H::FormatoMonto($totalaco),0,0,'R');
		$this->cell(23,7,H::FormatoMonto($totalprc),0,0,'R');
		$this->cell(23,7,H::FormatoMonto($totaldis),0,0,'R');
		$this->cell(23,7,H::FormatoMonto($totalcom),0,0,'R');
		$this->cell(23,7,H::FormatoMonto($totalcau),0,0,'R');
		$this->cell(22,7,H::FormatoMonto($totalpag),0,0,'R');
        $this->setFont("Arial","",7);
        unset($this->predisper);
        unset($this->predisprog);
	}
	}
?>