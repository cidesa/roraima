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
		var $codesde;
		var $codhasta;
		var $tipo;
		var $conf;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesde=H::GetPost("codesde");
			$this->codhasta=H::GetPost("codhasta");
			$this->tipo=H::GetPost("tipo");
			if($this->tipo=="Ambos")
			{
				$tipo1="P";
				$tipo2="M";
			}
			else if($this->tipo=="Porcentual")
			{
				$tipo1="P";
				$tipo2="P";
			}
			else if($this->tipo=="Puntual")
			{
				$tipo1="M";
				$tipo2="M";
			}

			$this->sql="SELECT
							CODRGO as codigo,
							UPPER(NOMRGO) as nombre,
							CODPRE as codpre,
							(CASE WHEN TIPRGO='P' THEN 'Porcentual' WHEN TIPRGO='M' THEN 'Puntual' ELSE '' END) as tipo,
							MONRGO as monto
						FROM CARECARG
						WHERE (CODRGO) >= ('".$this->codesde."') AND
							(CODRGO) <= ('".$this->codhasta."') AND
							((TIPRGO) = ('".$tipo1."') OR
  							(TIPRGO) = ('".$tipo2."'))
						ORDER BY CODRGO";
							//print $this->sql;
			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo";
				$this->titulos[1]="Descripción";
				//$this->titulos[2]="Tipo Recargo";
				//$this->titulos[3]="Monto Recargo";
				$this->anchos[0]=15;
				$this->anchos[1]=140;
				$this->anchos[2]=25;
				$this->anchos[3]=5;
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
				$this->setXY(155,39);
				$this->cell(30,5,'Tipo Recargo');
				$this->setXY(180,39);
				$this->cell(30,5,'Monto');

			$this->ln(4);
			$this->Line(10,45,200,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",7);
				 $this->cell($this->anchos[0],10,$tb->fields["codigo"]);
				 $this->cell($this->anchos[1]-10,10,$tb->fields["nombre"]);
				 $this->cell($this->anchos[2],10,$tb->fields["tipo"]);
				 $this->cell($this->anchos[3],10,$tb->fields["monto"]);
				$tb->MoveNext();
			    $this->ln(3);
			}
		}
	}
?>