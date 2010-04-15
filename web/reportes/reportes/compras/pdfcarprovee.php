<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

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
		var $codprodesde;
		var $codprohasta;
		var $rifdesde;
		var $rifhasta;
		var $nombdesde;
		var $nombhasta;
		var $ramodesde;
		var $ramohasta;
		var $orden;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codprodesde=H::GetPost("codprodesde");
			$this->codprohasta=H::GetPost("codprohasta");
			$this->rifdesde=H::GetPost("rifdesde");
			$this->rifhasta=H::GetPost("rifhasta");
			$this->ramodesde=H::GetPost("ramodesde");
			$this->ramohasta=H::GetPost("ramohasta");

			$this->codgruprodes=H::GetPost("codgruprodes");
			$this->codgruprohas=H::GetPost("codgruprohas");
			$this->orden=H::GetPost("orden");
			if($this->orden=="CODIGO PROVEEDOR")
			{
				$this->orden="A.CODPRO";
			}
			else
			{
				$this->orden="A.NOMPRO";
			}
			$this->sql="SELECT
							rtrim(A.CODPRO) as codpro,
							rtrim(A.NOMPRO) as nompro,
							rtrim(A.RIFPRO) as rif,
							rtrim(A.DIRPRO) as dir,
							rtrim(A.TELPRO) as telf,
							A.CODRAM as ramo,
							B.RAMART as ramo_2,
							B.NOMRAM as nombre
						FROM CAPROVEE A FULL OUTER JOIN CARAMART B ON (A.CODRAM=B.RAMART)
						WHERE
							(A.RIFPRO) >= ('".$this->rifdesde."') AND
							(A.RIFPRO) <= ('".$this->rifhasta."') AND
							(A.CODRAM) >= ('".$this->ramodesde."') AND
							(A.CODRAM) <= ('".$this->ramohasta."') AND
							(A.CODTIPREC) >= ('".$this->codgruprodes."') AND
							(A.CODTIPREC) <= ('".$this->codgruprohas."')
						ORDER BY ".$this->orden;

			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo";
				$this->titulos[1]="Rif";
				$this->titulos[2]="      Nombre";
				$this->titulos[3]="Dirección                  ";
				$this->titulos[4]="Télefono";
				$this->titulos[5]="Ramo";
				$this->titulos[6]="   ";
				$this->anchos[0]=20;
				$this->anchos[1]=17;
				$this->anchos[2]=65;
				$this->anchos[3]=65;
				$this->anchos[4]=42;
				$this->anchos[5]=13;
				$this->anchos[6]=30;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(7);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $this->bd->validar();
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);


				 $h=$this->Gety();
				 if($h>=170)
				 {
				 	$this->Addpage();
				 	$Y=50;
				 }
				 $y=$this->Gety();
				 $this->cell($this->anchos[0],3,$tb->fields["codpro"]);
				 $this->cell($this->anchos[1],3,$tb->fields["rif"]);


				 $this->SetXY(50,$y);
				 $this->multicell(60,3,$tb->fields["nompro"]);
				 $aqui1=$this->GetY();

				 $z=$this->Gety();
				 $this->SetXY(110,$y);
				 $this->multicell(60,3,$tb->fields["dir"]);
				 $aqui2=$this->GetY();

				 $l=$this->Gety();
				 $this->SetXY(170,$y);
				 $this->multicell(30,3,$tb->fields["telf"]);
				 $aqui3=$this->GetY();

				 $p=$this->Gety();
				 $this->SetXY(200,$y);

				 $this->multicell(60,3,$tb->fields["ramo"]."  ".$tb->fields["nombre"]);
				 $aqui4=$this->GetY();
				 if($aqui1>=$aqui2 and $aqui1>=$aqui3 and $aqui1>=$aqui4)
				 {
				 	$this->SetY($aqui1);
				 }
				 elseif($aqui2>=$aqui1 and $aqui2>=$aqui3 and $aqui2>=$aqui4)
				 {
				 	$this->SetY($aqui2);
				 }
				 elseif($aqui3>=$aqui1 and $aqui3>=$aqui2 and $aqui3>=$aqui4)
				 {
				 	$this->SetY($aqui3);
				 }
				 elseif($aqui4>=$aqui1 and $aqui4>=$aqui2 and $aqui4>=$aqui3)
				 {
				 	$this->SetY($aqui4);
				 }
				 $this->ln(2);


				$tb->MoveNext();
			    //$this->ln(5);
			}
		}
	}
?>