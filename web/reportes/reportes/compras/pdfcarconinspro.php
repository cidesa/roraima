<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/Herramientas.class.php");
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
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codprodes;
		var $codprohas;
		var $rifprodes;
		var $rifprohas;
		var $nomprodes;
		var $nomprohas;
		var $fecinv;
		var $conf;
		var $now;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->bd->validar();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codprodes=trim(H::GetPost("codprodes"));
			$this->codprohas=trim(H::GetPost("codprohas"));
			$this->rifprodes=trim(H::GetPost("rifprodes"));
			$this->rifprohas=trim(H::GetPost("rifprohas"));
			$this->nomprodes=trim(H::GetPost("nomprodes"));
			$this->nomprohas=trim(H::GetPost("nomprohas"));
			$this->registrador=trim(H::GetPost("registrador"));
			$this->now=fechaenletras();
		//	exit;

			$this->sql="select
							a.codpro as codpro,
							a.nompro as nompro,
							a.rifpro as rifpro,
							a.nitpro as nitpro
						from
							caprovee a
						where
							a.codpro >= '".$this->codprodes."' and
							a.codpro <= '".$this->codprohas."' and
							a.rifpro >= '".$this->rifprodes."' and
							a.rifpro <= '".$this->rifprohas."' and
							a.nompro >= '".$this->nomprodes."' and
							a.nompro <= '".$this->nomprohas."'
						order by a.codpro";
							//print $this->sql;

		}
		function Header()
		 {  $this->Image("../../img/logo_1.jpg",13,10,20);
			$this->tb4=$this->bd->select("Select nomemp,ciuemp from empresa where codemp='001'");
			$this->setX(25);
                        $this->setFont("Arial","B",8);
			$this->cell(120,10,'          República Bolivariana de Venezuela',0,0,'L');
			$this->ln(4);
                        $this->setX(25);
			$this->cell(60,10,'        '.ucwords(strtolower($this->tb4->fields["nomemp"])),0,0,'C');
			$this->ln(2);

			//$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s","s");
			/*$this->ln(20);
			$this->cell(120,10,'					   								Dirección de Administración');*/
			$this->ln(4);
			//$this->cell(120,10,'						  				  			Servicios Generales');
			$this->ln(15);
			$this->setFont("Arial","B",12);
			$this->cell(200,10,'REGISTRO DE PROVEDORES ',0,0,'C');
			$this->ln(4);
			$this->cell(200,10,H::GetPost("titulo"),0,0,'C');
			$this->ln(15);
			$this->setFont("Arial","",8);
			$this->cell(100,10,'Por Medio de la Presente se hace constar que la Empresa:',0,0,'C');
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$this->tb2=$tb;
			while(!$tb->EOF)
			{
				$this->setFont("Arial","B",8);
				$this->cell(60,10,'																				Nombre: '.$tb->fields["nompro"]);
				$this->ln(4);
				$this->cell(60,10,'																				R.I.F.: '.$tb->fields["rifpro"]);
				$this->ln(4);
				$this->cell(60,10,'																				NIT: '.$tb->fields["nitpro"]);
				$this->ln(10);
				$this->setFont("Arial","",8);
				$this->cell(157,10,'															Ha Quedado Inscrita , en el Registro Auxiliar de Empresa de este Departamento, bajo el Numero:  ');
				$this->setFont("Arial","B",8);
				$this->cell(30,10,$tb->fields["codpro"]);
				$this->setFont("Arial","",8);
				$this->sqlr="  select b.codrec, b.desrec from carecpro a, carecaud b, caprovee c where a.codpro=rtrim('".$tb->fields["rifpro"]."') and a.codrec =b.codrec and a.codpro = c.codpro";
			    $tbr=$this->bd->select($this->sqlr);
			    $this->ln();
			    $this->setFont("Arial","B",9);
			    $this->cell(100,10,'Recaudos del Proveedor:');
			    $this->ln(4);
			 //   $this->cell(30,10,'Cód del Recaudo');
			 //  $this->cell(60,10,'Descripción');
			 //  $this->ln(4);
			    $this->setFont("Arial","",8);
				 while(!$tbr->EOF)
				{
			//	$this->cell(30,10,$tbr->fields["codrec"]);
				$this->cell(60,10,$tbr->fields["desrec"]);
				$this->ln(4);
				$tbr->MoveNext();
				}
				$this->ln(20);
				$this->cell(60,10,'															'.ucwords(strtolower($this->tb4->fields["ciuemp"])).' ,'.$this->now);
				$this->ln(50);
				$this->setFont("Arial","BU",8);
				$this->cell(200,10,H::GetPost("registrador"),0,0,'C');
				$this->ln(3);
				$this->setFont("Arial","",8);
				$this->cell(200,10,'Firma',0,0,'C');
				$tb->MoveNext();
				$this->ln(100);
			}
			$this->bd->closed();
		}
	}
?>
