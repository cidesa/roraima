<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $titulos;
		var $refcaudes;
		var $nombendes;
		var $nombenhas;
		var $contrato;
		var $concepto;
		var $agencia;
		var $administracion;
		var $ci_administracion;
		var $secretario;
		var $ci_secretario;
		var $contralor;
		var $ci_contralor;
		var $y;
		var $x;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","A4");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->refcaudes=$_POST["refcaudes"];
			$this->contrato=$_POST["contrato"];
			$this->concepto=$_POST["concepto"];
			$this->agencia=$_POST["agencia"];
			$this->administracion=$_POST["administracion"];
			$this->ci_administracion=$_POST["ci_administracion"];
			$this->secretario=$_POST["secretario"];
			$this->ci_secretario=$_POST["ci_secretario"];
			$this->contralor=$_POST["contralor"];
		    $this->ci_contralor=$_POST["ci_contralor"];

			$this->sql="select
							refcau,
							descau,
							to_char(feccau,'dd/mm/yyyy') as feccau,
							moncau,
							b.nomben
						from
							cpcausad a,
							opbenefi b
						where
							a.cedrif=b.cedrif and
							a.refcau=  '".$this->refcaudes."'
							order by a.refcau";

					//print $this->sql;
					//exit;
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","",8);

			$this->cell(155,6,"Ciudad Bolivar, ",0,0,'R');
			//$this->x=$this->Getx();
			//$this->y=$this->Gety();
			//$this->cell(20,6,$this->x);
			//$this->cell(20,6,$this->x);
			$this->ln(10);
			$this->cell(20,6,"Señores: ");
			$this->ln();
			$this->setFont("Arial","B",8);
			$this->cell(20,6,"GERENTE GENERAL DE FEDEICOMISO");
			$this->ln(10);
			$this->cell(20,6,"Presente.-");

		}

		function Cuerpo()
		{
			$this->setFont("Arial","",8);
		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;

			$this->SetXY(165.00125,37.00125);
			$this->cell(20,6,enletras(substr($tb->fields["feccau"],0,2),substr($tb->fields["feccau"],3,2)).'   de  '.substr($tb->fields["feccau"],6,4));

			$this->ln(20);
			$this->cell(20,6,$this->agencia);
			$this->ln(15);
			$this->Multicell(180,6,"En relación con el contrato de Fideicomiso suscrito el día   ".enletras(substr($tb->fields["feccau"],0,2),substr($tb->fields["feccau"],3,2)).'   de  '.substr($tb->fields["feccau"],6,4).", " .
					"entre el Fondo Intergubernamental para la Descentralización  (FIDES) y esa Entidad Bancaria," .
					" a objeto de dar cumplimimiento al Convenio de Financiamiento del Proyecto denominado ".$this->contrato."." .
					" Suscrito entre el mencionado Fondo y la Gobernación del Estado Bolívar, solicitamos de Usted, el pago de " .
					"".$this->concepto." presentada por la Empresa: ".$tb->fields["nomben"]);
			$this->ln(20);
			$this->cell(20,6,"Se Anexa a la presente");
			$this->ln();
			$this->cell(20,6,"  -Original de la Valuación");

			$this->ln(10);
			$this->cell(20,6,"Esperando de esta manera dar cumplimiento a la Normativa Vigente le Saludan");

			//$this->AddPage();
			$this->ln(50);
			$this->cell(180,6,"Atentamente,",0,0,'C');
			$this->ln(50);
			////////////////////////
			$this->cell(20,6,"");
			$this->cell(30,6,$this->administracion,0,0,'C');
			$this->cell(40,6,"");
			$this->cell(30,6,$this->secretario,0,0,'C');
			$this->cell(40,6,"");
			$this->cell(30,6,$this->contralor,0,0,'C');
			///////////////////////
			$this->ln(4);
			$this->cell(20,6,"");
			$this->cell(30,6,"Directora de Admon y Finanzas",0,0,'C');
			$this->cell(40,6,"");
			$this->cell(30,6,"Secretaria General de Gobierno",0,0,'C');
			$this->cell(40,6,"");
			$this->cell(30,6,"Controlador General del Estado",0,0,'C');
			////////////////////////
			$this->ln(4);
			$this->cell(20,6,"");
			$this->cell(30,6,"C.I: ".$this->ci_administracion,0,0,'C');
			$this->cell(40,6,"");
			$this->cell(30,6,"C.I: ".$this->ci_secretario,0,0,'C');
			$this->cell(40,6,"");
			$this->cell(30,6,"C.I: ".$this->ci_contralor,0,0,'C');
			///////////////////////
			$this->ln(15);
			$this->cell(30,6,"Copia:");
			$this->ln(4);
			$this->cell(30,6,"FIDES");
			$this->ln(4);
			$this->cell(30,6,"Archivo");

			$this->ln(4);
			///////////////////////
		}


	}

	function enletras($dia,$mes)
	{
	//	$dia=date('d');
	//	$mes=date('m');
	//	$anno=date('Y');
		if($mes==01)
		{
			$mesletras='Enero';
		}
		else if($mes==02)
		{
			$mesletras='Febrero';
		}
		else if($mes==03)
		{
			$mesletras='Marzo';
		}
		else if($mes==04)
		{
			$mesletras='Abril';
		}
		else if($mes==05)
		{
			$mesletras='Mayo';
		}
		else if($mes==06)
		{
			$mesletras='Junio';
		}
		else if($mes==07)
		{
			$mesletras='Julio';
		}
		else if($mes==08)
		{
			$mesletras='Agosto';
		}
		else if($mes==09)
		{
			$mesletras='Septiembre';
		}
		else if($mes==10)
		{
			$mesletras='Octubre';
		}
		else if($mes==11)
		{
			$mesletras='Noviembre';
		}
		else if($mes==12)
		{
			$mesletras='Diciembre';
		}
		$fecha=$dia.'  de  '.$mesletras;
		return $fecha;
	}

?>