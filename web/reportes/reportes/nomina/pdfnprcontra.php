<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprcontra.class.php");

class pdfreporte extends fpdf
{
	function pdfreporte()
	{
		 $this->fpdf("p","mm","Letter");
		 $this->codemp=H::GetPost("codemp");
		 $this->dirrec=H::GetPost("dirrec");
		 $this->concop=H::GetPost("concop");
		 $this->monces=H::GetPost("monces");
		 $this->valmes=H::GetPost("valmes");
		 $this->sueldo=H::GetPost("sueldo");
		 $this->cesta=H::GetPost("cesta");
		 $this->cab = new Cabecera();
		 $this->objeto = new Nprcontra();

		 $this->arrp = $this->objeto->sqlp($this->codemp);
	}

	function Header()
	{
	 #$this->Image("../../img/orla_gobierno.jpg",10,240,200);
	 $rs=$this->arrp[0];
	 $this->cab->poner_cabecera($this,"","p","n","n");
	 $this->ln(10);
	 $this->multicell(180,10,H::GetPost("titulo"),0,'C');
	 $this->ln(10);
	 $this->setFont(arial,"",10);
	 if ( $this->sueldo=='S') {
	 $this->MCPLUS(180,8,"Por medio de la presente hago constar, que el (la) ciudadano(a) <@ ".
	 strtoupper($rs["nomemp"]).", <,>arial,B,10 @> C.I. N° <@ ".$rs["cedemp"].", <,>arial,B,10@>".
	 " presta sus servicios en esta Institución, desde el <@ ".$rs["fecing"].", <,>arial,B,10@> " .
	 " actualmente desempeñando  el cargo de <@ ".$rs["nomcar"].", <,>arial,B,10@> adscrito  a la " .
	 " <@ ".$rs["desniv"].", <,>arial,B,10@> devengado una  remuneración mensual  de <@ ".H::Obtenermontoescrito($rs["suecar"])." (Bs. ".H::Formatomonto($rs["suecar"])."). <,>arial,B,10@>");
	 }else {
	 	 $this->MCPLUS(180,8,"Por medio de la presente hago constar, que el (la) ciudadano(a) <@ ".
	 strtoupper($rs["nomemp"]).", <,>arial,B,10 @> C.I. N° <@ ".$rs["cedemp"].", <,>arial,B,10@>".
	 " presta sus servicios en esta Institución, desde el <@ ".$rs["fecing"].", <,>arial,B,10@> " .
	 " actualmente desempeñando  el cargo de <@ ".$rs["nomcar"].", <,>arial,B,10@> adscrito  a la " .
	 " <@ ".$rs["desniv"].". <,>arial,B,10@>");
	 }
	 $this->ln();
	 if ($this->cesta=='S') {
	 $this->MCPLUS(180,8,"Así mismo, la cantidad de <@ ".H::Obtenermontoescrito($this->monces)." (Bs. ".H::FormatoMonto($this->monces)."), <,>arial,B,10@> " .
	 " por concepto de Ticket Alimentación.Dividiendo entre jornadas efectivamente laboradas");
	 }
	 $this->ln();
	 $arrp = $this->objeto->sqlempresa();
	 $dated=date("d");
	 if(intval($dated)<=10)
	 {
	 	if(intval($dated)==1)
	 	{
			$nomnum='UN';
	 	}else
	 	{
	 		$num = $this->objeto->sqlnumeros(strlen(intval($dated)),intval($dated));
	 		$nomnum=$num[0]["numeros"];
	 	}
	 }elseif(intval($dated)<=15)
	 {
	 	if(intval($dated)==11)
	 		$nomnum='ONCE';
	 	elseif(intval($dated)==12)
	 		$nomnum='DOCE';
	 	elseif(intval($dated)==13)
	 		$nomnum='TRECE';
	 	elseif(intval($dated)==14)
	 		$nomnum='CATORCE';
	 	else
	 		$nomnum='QUINCE';
	 }elseif(intval($dated)<=19)
	 {
	 	$num = $this->objeto->sqlnumeros(1,substr(intval($dated),1,1));
	 	$nomnum='DIECI'.strtoupper($num[0]["numeros"]);
	 }else
	 {
	 	$num = $this->objeto->sqlnumeros(strlen(intval($dated)),substr(intval($dated),0,1));
	 	$num2 = $this->objeto->sqlnumeros(1,substr(intval($dated),1,1));
	 	$nomnum=$num[0]["numeros"].' Y '.$num2[0]["numeros"];
	 	if(substr(intval($dated),1,1)==0)
	 		$nomnum=$num[0]["numeros"];

	 }

	 $this->MCPLUS(180,8,"Constacia que se expide a solicitud  de la parte interesada en ".ucfirst(strtolower($arrp[0]["ciuemp"])).", " .
	 "a los ".ucfirst(strtolower($nomnum))." ($dated) Díaz del Mes de ".ucfirst(strtolower(H::Obtenermesenletras(date('m'))))." del Año  ".date('Y'));
	 $this->ln(10);
	 $this->multicell(180,4,"Atentamente,",0,'C');
	 $this->ln(20);
	 $this->setFont(arial,"B",10);
	 $this->multicell(180,4,$this->dirrec."\nDirectora de Recursos Humanos",0,'C');
	 $this->ln(20);
	 $this->setFont(arial,"",7);
	 $this->multicell(180,4,$this->concop);
	 $this->setFont(arial,"B",7);
	 $num = $this->objeto->sqlnumeros(strlen(intval($this->valmes)),intval($this->valmes));
	 $nmes=intval($this->valmes);
	 if(intval($this->valmes)<=9)
	 	$nmes='0'.$this->valmes;
	 $m="meses";
	 if(intval($this->valmes)==1)
	 	$m="mes";
	 $this->multicell(180,4,"Válida por ".ucfirst(strtolower($num[0]["numeros"]))." ($nmes) $m, a partir de su fecha de expedición");



	}
	function Cuerpo()
	{

    }
}
?>