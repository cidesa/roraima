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
			$this->fecingdes=$_POST["fecingdes"];
			$this->fecinghas=$_POST["fecinghas"];
			$this->tipnom=$_POST["tipnom"];
			$this->estatus=$_POST["estatus"];

			if ($this->estatus=='T'){
				$estatus="    ";
			}else
			    $estatus=" a.staemp = 'A' AND     ";



			$this->sql="select a.cedemp,a.nomemp,to_char(fecing,'dd/mm/yyyy') as fecing,
			b.nomcar,c.desniv,e.nomnom as nomina
			from nphojint a, npcargos b, npestorg c, npasicaremp d,npnomina e
			where
			a.codemp>='$this->codempdes' and
			a.codemp<='$this->codemphas' and
			a.fecing>=to_date('$this->fecingdes','dd/mm/yyyy') and
			a.fecing<=to_date('$this->fecinghas','dd/mm/yyyy') and
			d.codnom='".$this->tipnom."' and $estatus
			a.codemp=d.codemp and
			d.status='V' and
			d.codcar=b.codcar and
			(a.codniv)=(c.codniv) and d.codnom=e.codnom
			order by c.codniv";
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
			$this->cell(60,5,'DESDE EL: '.$this->fecingdes.' HASTA '.$this->fecinghas);
			$this->setFont("Arial","B",8);
			$this->ln(5);
			$this->setTextColor(0,0,255);
			$this->setwidths(array(15,45,20,45,45,30));
			$this->setAligns('C');
			$this->setborder(true);
			$this->rowm(array("CEDULA","NOMBRE","FECHA DE INGRESO","CARGO","DEPENDENCIA","NOMINA"));
			$this->setwidths(array(15,45,20,45,45,30));
			$this->setAligns(array('C','L','C','C','L','L','C','C'));
			$this->setborder(true);
			$this->setFont("Arial","",7);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$totemp=0;
			foreach($this->arrp as $reg)
			{
					$this->setAligns(array('L','L','C','L','L','L','L','L'));
				$this->rowm($reg);
				$totemp++;
			}
			//TOTALES
			$this->setFont("Arial","B",8);
			$this->setautopagebreak(false);

			$this->rowm(array("","","","","TOTAL TRABAJADORES",$totemp));
		}
	}
?>