<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql;
		var $sql2;
		var $con1;
		var $con2;
		var $directora;
		var $nota;
		var $decreto;
		var $gaceta;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->directora=$_POST["directora"];
			$this->nota=$_POST["nota"];
			$this->decreto=$_POST["decreto"];
			$this->gaceta=$_POST["gaceta"];


			$this->sql= " SELECT distinct a.codemp, a.nomemp, a.cedemp, to_char(a.fecing, 'dd/mm/yyyy') as fecing, to_char(a.fecret,'dd/mm/yyyy') as fecret, b.nomcat, c.monto
							FROM
							nphojint a, npasicaremp b, npasiconemp c
							WHERE
							TRIM(a.codemp) >= TRIM('".$this->con1."') AND
							TRIM(a.codemp) <= TRIM('".$this->con2."') AND
							c.monto > 0 AND
							a.codemp = b.codemp AND
							a.codemp = c.codemp
							ORDER BY a.codemp";
							//print $this->sql;
		}


		function Cuerpo()
		{
		  $tbg=$this->bd->select($this->sql);
		  while(!$tbg->EOF)
		 {

			//$rs=$this->bd->select("select codcon as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			$this->ln(20);
			$this->setX(90);
			$this->setFont("Arial","BU",16);
			$this->cell(180,5,'CONSTANCIA');
			$this->ln(15);
			$this->setFont('arial',"I",12);
			$this->setX(20);
			$this->multicell(170,7,'El Suscrito Jefe de Division de Administracion y Control de personal, hace constar que el(la) ciudadano(a): '.$tbg->fields["nomemp"].', titular de la cedula de identidad Nro '.trim($tbg->fields["cedemp"]).', presta(o) sus servicios al Ejecutivo, desempenandose como personal Contratado, a tiempo determinado, en la '.$tbg->fields["nomcat"]. ' del Ejecutivo del Estado, desde '.$tbg->fields["fecing"]. ' hasta '.$tbg->fields["fecret"]. ' devengando un salario de: '.montoescrito($tbg->fields["monto"],$this->bd). ' (BsF. '.$tbg->fields["monto"].'). ');

			$this->ln(10);


			$hoy = date("m.d.y ");
			$dia=substr($hoy,3,2);
			if ($dia == '01')
			  $dias= 'un';
			if($dia=='02')
			  $dias='dos';
			if($dia=='03')
			  $dias='tres';
			if($dia=='04')
			  $dias='cuatro';
			if($dia=='05')
			  $dias='cinco';
			if($dia=='06')
			  $dias='seis';
			if($dia=='07')
			  $dias='siete';
			if($dia=='08')
			  $dias='ocho';
			if($dia=='09')
			  $dias='nueve';
			if($dia=='10')
			  $dias='diez';
			if($dia=='11')
			  $dias='once';
			if($dia=='12')
			  $dias='doce';
			if($dia=='13')
			  $dias='trece';
			if($dia=='14')
			  $dias='catorce';
			if($dia=='15')
			  $dias='quince';
			if($dia=='16')
			  $dias='dieciseis';
			if($dia=='17')
			  $dias='diecisiete';
			if($dia=='18')
			  $dias='dieciocho';
			if($dia=='19')
			  $dias='diecinueve';
			if($dia=='20')
			  $dias='veinte';
			if($dia=='21')
			  $dias='veintiuno';
			if($dia=='22')
			  $dias='veintidos';
			if($dia=='23')
			  $dias='veintitres';
			if($dia=='24')
			  $dias='veinticuatro';
			if($dia=='25')
			  $dias='veinticinco';
			if($dia=='26')
			  $dias='veinteseis';
			if($dia=='27')
			  $dias='veintisiete';
			if($dia=='28')
			  $dias='veintiocho';
			if($dia=='29')
			  $dias='veintinueve';
			if($dia=='30')
			  $dias='treinta';
			if($dia=='31')
			  $dias='treinta y uno';



			$mes=substr($hoy,0,2);
			if($mes== '01')
		        $mes= 'ENERO';
			if($mes== '02')
				$mes= 'FEBRERO';
			if($mes== '03')
				$mes= 'MARZO';
			if($mes== '04')
				$mes= 'ABRIL';
			if($mes== '05')
				$mes= 'MAYO';
			if($mes== '06')
				$mes= 'JUNIO';
			if($mes== '07')
				$mes= 'JULIO';
			if($mes== '08')
				$mes= 'AGOSTO';
			if($mes== '09')
				$mes= 'SEPTIEMBRE';
			if($mes== '10')
				$mes= 'OCTUBRE';
			if($mes== '11')
				$mes= 'NOVIEMBRE';
			if($mes== '12')
		       $mes= 'DICIEMBRE';


			$ano=substr($hoy,6,2);
			if($ano== '06')
		        $ano= 'DOS MIL SEIS';
			if($ano== '07')
		        $ano= 'DOS MIL SIETE';
			if($ano== '08')
				$ano= 'DOS MIL OCHO';
			if($ano== '09')
				$ano= 'DOS MIL NUEVE';
			if($ano== '10')
				$ano= 'DOS MIL DIEZ';
			if($ano== '11')
				$ano= 'DOS MIL ONCE';
			$diaesc = date("D");
			//print $dia;

			$this->setX(20);
			$this->multicell(170,7,'Documento expedido, a peticion de la interesada (o) a los ' .$dias. ' (' .$dia. ') dias del mes de ' .$mes.  ' de ' .$ano.' ');

			$this->ln(10);
			$this->setX(20);
			$this->multicell(170,7,'Sin otro particular a que hacer referencia, quedo de usted. ');


			$this->ln(25);
			$this->setX(100);
			$this->cell(30,7,'Atentamente, ');


			$this->ln(25);
			$this->setX(115);
			$this->cell(10,5,$this->directora,0,0,'R');
			$this->ln();
			$this->setFont("Arial","B",13);
			$this->setX(120);
			$this->cell(10,7,'Directora de Personal',0,0,'R');
			$this->ln();
			$this->setFont("Arial","",11);
			$this->setX(45);
			$this->cell(100,5,$this->decreto,0,0,'R');
			$this->ln();
			$this->setX(45);
			$this->cell(100,5,$this->gaceta,0,0,'R');

			$this->ln(25);
			$this->setX(10);
			$this->setFont("Arial","B",11);
			$this->cell(15,5,'Nota: ',0,0,'L');
			$this->setX(15);
			$this->setFont("Arial","",10);
			$this->Multicell(160,5,$this->nota,0,0,'L');

			$y=$this->GetY();
			$tbg->MoveNext();
			if ($y >=150 and !$tbg->EOF)
			{
				$this->Addpage();
			}
		}

	}
}
?>