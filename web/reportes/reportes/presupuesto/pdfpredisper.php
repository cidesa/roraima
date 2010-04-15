<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Prerasiini.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Predisper.class.php");

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
	var $agrupar;
	var $asignacion;
	var $codpredes;
	var $codprehas;
	var $comodin;
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
	var $totalcomcat;
	var $totalcaucat;
	var $totalpagcat;
	var $totalmodcat;
    var $totalacocat;
	var $totaldeucat;
	var $totaldiscat;
	var $categoria;
	var $nomcat;
	var $nivel;
	var $posY;
	var $clasepresup;

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
		$this->codpredes=H::GetPost("codpredes");
		$this->codprehas=H::GetPost("codprehas");
		$this->asignacion=H::GetPost("asignacion");
		$this->agrupar=H::GetPost("agrupar");
		$this->comodin=H::GetPost("comodin");
		if($this->asignacion=="Acumulados")
		{ $this->perasi=$this->perdesde;}
		else { $this->perasi='01';}
		$prerasiini= new Prerasiini();
		$this->longitud=$prerasiini->sql_cpniveles2($this->agrupar);
		unset($prerasiini);
		$this->predisper= new Predisper();
		$this->arrp=$this->predisper->sqlp($this->perdesde,$this->perhasta,$this->codpredes,$this->codprehas,$this->comodin,$this->perasi,$this->longitud);
		$this->llenartitulosmaestro();
		$this->cab=new cabecera();
	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="CODIGO";
	 $this->titulos[1]="DENOMINACION";
	 $this->titulos[2]="ASIG. INICIAL";
	 $this->titulos[3]="MODIFICACION(+/-)";
	 $this->titulos[4]="ASIG. MODIFICADA";
	 $this->titulos[5]="COMPROMISO";
	 $this->titulos[6]="DISPONIBILIDAD";
	 $this->titulos[7]="CAUSADO";
	 $this->titulos[8]="PAGADO";
	 $this->titulos[9]="DEUDA";
	 $this->anchos[0]=40;//codigo
	 $this->anchos[1]=35;//denominacion
     $this->anchos[2]=25;//ley asignacion inicial
	 $this->anchos[3]=25;//modificaciones
     $this->anchos[4]=25;//asignacion actualizada (gasto acordado)
     $this->anchos[5]=20;//compromisos
     $this->anchos[6]=27;//disponibilidad
	 $this->anchos[7]=24;//causado
     $this->anchos[8]=25;//pagado
     $this->anchos[9]=21;//deuda
	}

	function Header()
	{
	 $dir = parse_url($_SERVER["HTTP_REFERER"]);
	 $parte = explode("/",$dir["path"]);
	 $ubica = count($parte)-2;
	$this->cab->poner_cabecera_f_b($this,$_POST["titulo"].' DEUDA',"l","s","s");
	 $this->setXY(219,25);
	 $this->setFont("Arial","B",7);
	 $this->cell(125,0,"  Periodo : ".$this->FecPerEje($this->perdesde)."   Al   ".$this->FecPerEje($this->perhasta));
	 $this->ln(12);
	 $ncampos=count($this->titulos);
	 for($i=0;$i<$ncampos;$i++)
	 {
		$this->cell($this->anchos[$i],5,$this->titulos[$i]);
	 }
	 $this->ln(3);
	 $this->Line(10,45,270,45);
     $this->ln(5);
	}

	function Cuerpo()
	{
     $totalcom=0;
     $totalcau=0;
     $totalpag=0;
     $totalmod=0;
     $totalasi=0;
     $totalaco=0;
     $totaldeu=0;
     $totaldis=0;

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
       $this->setFont("Arial","",6);

	   if (($categoria!=$datos["categoria"])&&($categoria!=""))
	   {
	    $this->nomcat=$this->predisper->sql_cpdeftit($categoria);
	    $this->setFont("Arial","B",7);
		$this->Line(60,$this->GetY(),270,$this->GetY());
		$this->cell(68,4,"",0,0,'R'); $y=$this->gety();
		$this->cell(27,4,H::FormatoMonto($totalasicat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalmodcat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalacocat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalcomcat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totaldiscat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalcaucat),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($totalpagcat),0,0,'R');
		$this->cell(22,4,H::FormatoMonto($totaldeucat),0,0,'R');
		$this->setxy(10,$y);
		$this->multicell(68,4,"TOTAL ".$this->nomcat[0][0],0,'L',0);
		$this->ln(6);
		$this->setFont("Arial","",7);
		$totalcomcat=$datos["compromiso"];
		$totalcaucat=$datos["causado"];
		$totalpagcat=$datos["pagado"];
		$totalmodcat=$datos["modificado"];
		$totalasicat=$datos["asignacion"];
		$totalacocat=$datos["asignacion"]+$datos["modificado"];
		$totaldiscat=$datos["asignacion"]+$datos["modificado"]-$datos["compromiso"];
		$totaldeucat=$datos["causado"]-$datos["pagado"];
	   }
	   else
	   {
		//ACUMULADOR POR CATEGORIAS
		$totalcomcat=$totalcomcat+$datos["compromiso"];
		$totalcaucat=$totalcaucat+$datos["causado"];
		$totalpagcat=$totalpagcat+$datos["pagado"];
		$totalmodcat=$totalmodcat+$datos["modificado"];
		$totalasicat=$totalasicat+$datos["asignacion"];
		$totalacocat=$totalacocat+$datos["asignacion"]+$datos["modificado"];
		$totaldiscat=$totaldiscat+$datos["asignacion"]+$datos["modificado"]-$datos["compromiso"];
		$totaldeucat=$totaldeucat+$datos["causado"]-$datos["pagado"];
		}
		$this->setFont("Arial","",6);
		$categoria=$datos["categoria"];

		//Detalle
		$this->cell(50,4,$datos["codpre"]);

        $this->SetX(84);
		$this->cell(23,4,H::FormatoMonto($datos["asignacion"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["modificado"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["asignacion"]+$datos["modificado"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["compromiso"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["asignacion"]+$datos["modificado"]-$datos["compromiso"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["causado"]),0,0,'R');
		$this->cell(23,4,H::FormatoMonto($datos["pagado"]),0,0,'R');
		$this->cell(22,4,H::FormatoMonto($datos["causado"]-$datos["pagado"]),0,0,'R');
        $this->SetX(48);
		$this->multicell(38,4,$datos["nompre"]);

		//ACUMULADOR GENERAL
        $totalcom=$totalcom+$datos["compromiso"];
        $totalcau=$totalcau+$datos["causado"];
	    $totalpag=$totalpag+$datos["pagado"];
        $totalmod=$totalmod+$datos["modificado"];
        $totalasi=$totalasi+$datos["asignacion"];
        $totalaco=$totalaco+$datos["asignacion"]+$datos["modificado"];
	    $totaldis=$totaldis+$datos["asignacion"]+$datos["modificado"]-$datos["compromiso"];
        $totaldeu=$totaldeu+$datos["causado"]-$datos["pagado"];
	}


	$this->setFont("Arial","B",7);
	$this->Line(10,$this->GetY(),270,$this->GetY());
	//IMPRIMO EL ULTIMO TOTAL DE CAT
	$this->cell(70,4,"TOTAL ".$this->agrupar."     ",0,0,'R');
	$this->cell(27,4,H::FormatoMonto($totalasicat),0,0,'R');
	$this->cell(24,4,H::FormatoMonto($totalmodcat),0,0,'R');
	$this->cell(24,4,H::FormatoMonto($totalacocat),0,0,'R');
	$this->cell(24,4,H::FormatoMonto($totalcomcat),0,0,'R');
	$this->cell(24,4,H::FormatoMonto($totaldiscat),0,0,'R');
	$this->cell(24,4,H::FormatoMonto($totalcaucat),0,0,'R');
	$this->cell(24,4,H::FormatoMonto($totalpagcat),0,0,'R');
	$this->cell(24,4,H::FormatoMonto($totaldeucat),0,0,'R');
	$this->ln();

	//AHORA EL TOTAL GENERAL
	$this->Line(10,$this->GetY(),270,$this->GetY());
	$this->cell(68,7,"");
	$this->cell(27,7,H::FormatoMonto($totalasi),0,0,'R');
	$this->cell(24,7,H::FormatoMonto($totalmod),0,0,'R');
	$this->cell(24,7,H::FormatoMonto($totalaco),0,0,'R');
	$this->cell(24,7,H::FormatoMonto($totalcom),0,0,'R');
	$this->cell(24,7,H::FormatoMonto($totaldis),0,0,'R');
	$this->cell(24,7,H::FormatoMonto($totalcau),0,0,'R');
	$this->cell(24,7,H::FormatoMonto($totalpag),0,0,'R');
	$this->cell(24,7,H::FormatoMonto($totaldeu),0,0,'R');
    $this->setFont("Arial","",7);
    unset($this->predisper);

	}

}
?>