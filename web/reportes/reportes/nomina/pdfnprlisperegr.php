<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $i=0;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->fecretdes=$_POST["fecretdes"];
			$this->fecrethas=$_POST["fecrethas"];
			$this->tipnom=$_POST["tipnom"];

			$this->sql="select a.cedemp,a.nomemp,to_char(fecing,'dd/mm/yyyy') as fecing,to_char(fecret,'dd/mm/yyyy') as fecret,
			b.nomcar,c.desniv,e.nomnom as nomina
			from nphojint a, npcargos b, npestorg c, npasicaremp d,npnomina e
			where
			a.codemp>=('$this->codempdes') and
			a.codemp<=('$this->codemphas') and
			a.fecret>=to_date('$this->fecretdes','dd/mm/yyyy') and
			a.fecret<=to_date('$this->fecrethas','dd/mm/yyyy') and
			d.codnom='".$this->tipnom."' and
			a.codemp=d.codemp and
			d.codcar=b.codcar and d.codnom=e.codnom and
			a.codniv=c.codniv
			order by c.codniv";
			/*			$this->sql="select case when length(cedemp)='8' then substr(cedemp,1,2)||'.'||substr(cedemp,3,3)||'.'||substr(cedemp,6,3)
			when length(cedemp)='7' then substr(cedemp,1,1)||'.'||substr(cedemp,2,3)||'.'||substr(cedemp,5,3)
			else substr(cedemp,1,3)||'.'||substr(cedemp,4,3) end as cedemp,a.nomemp,to_char(fecing,'dd/mm/yyyy') as fecing,to_char(fecret,'dd/mm/yyyy') as fecret,
			b.nomcar,c.desniv,e.nomnom as nomina
			from nphojint a, npcargos b, npestorg c, npasicaremp d,npnomina e
			where
			a.codemp>=('$this->codempdes') and
			a.codemp<=('$this->codemphas') and
			a.fecret>=to_date('$this->fecretdes','dd/mm/yyyy') and
			a.fecret<=to_date('$this->fecrethas','dd/mm/yyyy') and
			d.codnom='".$this->tipnom."' and
			a.codemp=d.codemp and
			d.codcar=b.codcar and d.codnom=e.codnom and
			a.codniv=c.codniv
			order by c.codniv";*/
		//print "<pre>".$this->sql;exit;
						$arrp=$this->bd->select($this->sql);
						$this->arrp= $arrp->GetArray();

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			$this->cell(60,5,'DESDE EL: '.$this->fecretdes.' HASTA '.$this->fecrethas);
			$this->setFont("Arial","B",8);
			$this->ln(5);
			$this->setTextColor(0,0,255);
			$this->setwidths(array(15,50,20,20,50,50,30));
			$this->setAligns('C');
			$this->setborder(true);
			$this->rowm(array("CEDULA","NOMBRE","FECHA DE INGRESO","FECHA DE EGRESO","CARGO","DEPENDENCIA","NOMINA"));
			$this->setwidths(array(15,50,20,20,50,50,30));
			$this->setAligns(array('C','L','C','C','L','L','C'));
			$this->setborder(true);
			$this->setFont("Arial","",7);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$totemp=0;
			foreach($this->arrp as $reg)
			{
				$this->setAligns(array('L','L','C','L','L','L','L'));
				$this->rowm($reg);
				$totemp++;
			}
			//TOTALES
			$this->setFont("Arial","B",8);
			$this->setautopagebreak(false);
			$this->rowm(array("","","","","","TOTAL EMPLEADOS",$totemp));
		}
	}
?>