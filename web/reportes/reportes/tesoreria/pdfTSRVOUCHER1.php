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
		var $sql;
		var $sql1;
		var $sql1b;
		var $sql1c;
		var $sql2;
		var $sql3;
		var $sqlb;
		var $che1;
		var $che2;
		var $hecho;
		var $revi;
		var $conta;
		var $audi;

		var $mes;
		var $ano;
		var $apro;
		var $ela;
		var $cod1;
		var $cod2;
		var $deb;
		var $cre;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumlib=0;
		var $acumban=0;
		var $acumlib2=0;
		var $acumban2=0;
		var $sal=0;
		var $fecha;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->che1=$_POST["che1"];
			$this->che2=$_POST["che2"];
			$this->hecho=$_POST["hecho"];
			$this->revi=$_POST["revi"];
			$this->apro=$_POST["apro"];
			$this->conta=$_POST["conta"];
			$this->audi=$_POST["audi"];

				$this->sql="select a.numche as numche,a.fecemi,rtrim(c.nomben) as nomben,a.numcue,a.monche,
				to_char(a.fecemi,'dd') as dia,
				to_char(a.fecemi,'mm') as mes,
				to_char(a.fecemi,'yyyy') as ano,
				ltrim(rtrim(to_char(a.monche,'999,999,999,999.99'))) as monchestr,
				c.cedrif,b.nomcue,d.deslib as descon,d.numcom,e.numord,e.desord
				from tsdefban b, opbenefi c, tsmovlib d, tscheemi a
				left join opordpag e on rtrim(a.numche)=rtrim(e.numche)
				where
				rtrim(a.numcue)=rtrim(b.numcue) and rtrim(a.numche)=rtrim(d.reflib) and
				rtrim(a.numcue)=rtrim(d.numcue) and rtrim(a.cedrif)=rtrim(c.cedrif) and
				rtrim(a.numche)>=rtrim('".$this->che1."') and rtrim(a.numche)<=rtrim('".$this->che2."')
				order by rtrim(a.numche)";

			//print $this->sql;exit;

			$this->llenartitulosmaestro();
			//$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Débitos";
				$this->titulos[5]="Créditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function Header()
		{
			/*$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);*/
			$this->setFont("Arial","B",11);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
          //  $this->ln(4);

		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",11);
		    $tb=$this->bd->select($this->sql);

			//------------------------------------------------------------------------------------------------
			while (!$tb->EOF)//while
			{
				//$this->ln();

				$this->numcom=$tb->fields["numcom"];

				$this->setFont("Arial","B",11);
				$this->SetXY(165,8);
				$this->cell(30,2,str_pad($tb->fields["monchestr"], 20, "*", STR_PAD_LEFT));
				$this->setFont("Arial","",11);
				$this->SetXY(60,24);
				$this->cell(130,5,'***'.strtoupper($tb->fields["nomben"]).'***'.'       '.$tb->fields["cedrif"]);
				$this->SetXY(60,31);
				$this->MultiCell(130,5,(str_pad(montoescrito($tb->fields["monche"],$this->bd),100," ",STR_PAD_RIGHT)).'--------------');
				$this->SetXY(45,43);
				$this->cell(30,5,"LOS TEQUES,   ");
				$this->cell(20,5,$tb->fields["dia"]."/".$tb->fields["mes"]);
				/*if ($tb->fields["mes"]=='01'){$this->cell(25,5,"ENERO");}
				if ($tb->fields["mes"]=='02'){$this->cell(25,5,"FEBRERO");}
				if ($tb->fields["mes"]=='03'){$this->cell(25,5,"MARZO");}
				if ($tb->fields["mes"]=='04'){$this->cell(25,5,"ABRIL");}
				if ($tb->fields["mes"]=='05'){$this->cell(25,5,"MAYO");}
				if ($tb->fields["mes"]=='06'){$this->cell(25,5,"JUNIO");}
				if ($tb->fields["mes"]=='07'){$this->cell(25,5,"JULIO");}
				if ($tb->fields["mes"]=='08'){$this->cell(25,5,"AGOSTO");}
				if ($tb->fields["mes"]=='09'){$this->cell(25,5,"SEPTIEMBRE");}
				if ($tb->fields["mes"]=='10'){$this->cell(25,5,"OCTUBRE");}
				if ($tb->fields["mes"]=='11'){$this->cell(25,5,"NOVIEMBRE");}
				if ($tb->fields["mes"]=='12'){$this->cell(25,5,"DICIEMBRE");}*/
				$this->cell(20,5,"       ".$tb->fields["ano"]);
				$this->SetXY(45,70);
				$this->cell(10,5,'CADUCA A LOS 90 DIAS              NO ENDOSABLE');
				$this->SetXY(60,90);
				$this->MultiCell(130,5,strtoupper($tb->fields["desord"]));
				$this->SetXY(50,168);
				$this->cell(10,5,$tb->fields["numord"]);
				$this->SetXY(50,175);
				$this->cell(30,5,date("d/m/Y"));
				$this->SetXY(70,158);
				$this->cell(100,5,'BANESCO  CTA.CTE.:    '.$tb->fields["numcue"].'    '.$tb->fields["numche"]);
				$this->SetXY(190,210);
				$this->Cell(30,5,$tb->fields["numche"]);


			$tb->MoveNext();
			if(!$tb->EOF)
			{
				$this->AddPage();
			}
			}


		}
	}
?>
