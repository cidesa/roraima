<?
require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/cabecera.php");

class pdfreporte extends fpdf
{
	var $acum=0;
	var $result=0;
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
	var $codubides;
	var $codubihas;
	var $codact1;
	var $codact2;
	var $codmue1;
	var $codmue2;
	var $fecreg1;
	var $fecreg2;
	var $prenom;
	var $precar;
	var $confnom;
	var $confcar;
	var $apronom;
	var $aprocar;

	function pdfreporte()
	{
		$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
			$this->bd=new basedatosAdo();
		$this->titulos=array();
		$this->titulos2=array();
		$this->campos=array();
		$this->anchos=array();
		$this->anchos2=array();
		$this->codubides=H::GetPost("codubides");
		$this->codubihas=H::GetPost("codubihas");
		$this->codact1=H::GetPost("codact1");
		$this->codact2=H::GetPost("codact2");
		$this->codmue1=H::GetPost("codmue1");
		$this->codmue2=H::GetPost("codmue2");
		$this->fecreg1=H::GetPost("fecreg1");
		$this->fecreg2=H::GetPost("fecreg2");
		$this->prenom=H::GetPost("prenom");
		$this->precar=H::GetPost("precar");
		$this->confnom=H::GetPost("confnom");
		$this->confcar=H::GetPost("confcar");
		$this->apronom=H::GetPost("apronom");
		$this->aprocar=H::GetPost("aprocar");

			$this->sql="SELECT
						 A.CODUBI  as acodubi,
						 SUBSTR(A.CODACT,1,10) as acodact,
						 A.CODMUE as acodmue,
						 generar_descripcion(a.CODMUE) as adesmue,
						 to_char(A.FECCOM,'dd/mm/yyyy') as afeccom,
						 to_char(A.FECREG,'dd/mm/yyyy') as afecreg,
						 A.VALINI as avalini,
						 A.VIDUTI as aviduti,
						 A.STAMUE as astamue,
						 A.ORDCOM as aordcom,
						 coalesce(A.MARMUE,'No Especifica') as amarmue,
						 coalesce(A.SERMUE,'No Especifica') as asermue,
						 coalesce(A.DETMUE,'Ninguna') as adetmue,
						 B.DESUBI as bdesubi
						 FROM
						 BNREGMUE A,
						 BNUBIBIE B
						 WHERE
						 RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND
						 RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND
						 RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND
						 RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND
						 RTRIM(A.CODUBI) >= RTRIM('".$this->codubides."') AND
						 RTRIM(A.CODUBI) <= RTRIM('".$this->codubihas."') AND
						 A.FECREG >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND
						 A.FECREG <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
						 A.STAMUE<>'D' AND
						 RTRIM(A.CODUBI)=RTRIM(B.CODUBI)
						 ORDER BY A.CODUBI, A.CODACT";
	//	print '<pre>';print $this->sql;exit;
		$this->llenartitulosmaestro();
		$this->cab=new cabecera();
		$this->SetAutoPageBreak(true,32);
	for($i=0;$i<count($this->titulos);$i++)
	{
		$this->anchos[$i]=$this->getAncho($i);
	}
	}

	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=40;
		$anchos[1]=40;
		$anchos[2]=100;
		$anchos[3]=40;
		$anchos[4]=40;
		$anchos[5]=30;
		$anchos[6]=30;
/*		$anchos[7]=30;
		$anchos[8]=30;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;*/

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=50;
		$anchos2[1]=50;
		$anchos2[2]=110;
		$anchos2[3]=20;
		$anchos2[4]=40;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;
		$anchos2[11]=30;

		return $anchos2[$pos];
	}


	function llenartitulosmaestro()
	{
	 $this->titulos[0]="CODIGO DEL ACTIVO";
	 $this->titulos[1]="Nro DEL REGISTRO";
	 $this->titulos[2]="DESCRIPCION";
	 $this->titulos[3]="OBSERVACIONES";
	 $this->titulos[4]="MONTO DEL MUEBLE";
//	 $this->titulos[5]="MARCA";
//	 $this->titulos[6]="SERIAL";
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
	 $this->setFont("Arial","B",9);
	 $ncampos=count($this->titulos);
	 for($i=0;$i<$ncampos;$i++)
	 {
		$this->cell($this->anchos[$i],10,$this->titulos[$i]);
	 }
	 $this->ln();
     $this->ln(4);
	 $this->Line(10,50,270,50);
	}

	function Footer()
	{
	 $this->SetY(-30);
	 $this->Line(10,$this->GetY(),270,$this->GetY());
	 $this->Line(10,$this->GetY(),10,$this->GetY()+25);
	 $this->Line(100,$this->GetY(),100,$this->GetY()+25);
	 $this->Line(180,$this->GetY(),180,$this->GetY()+25);
	 $this->Line(270,$this->GetY(),270,$this->GetY()+25);
	 $this->cell(0,5,"Preparación                                                                                                  Conformación                                                                                  Aprobación");
	 $this->ln();
	 $this->setFont("Arial","",8);
	 $this->cell(20,5,"Nombre:     ".$this->prenom);
	 $this->cell(20,5,"                                                                                         ".$this->confnom);
	 $this->cell(20,5,"                                                                                                                                                                      ".$this->apronom);
	 $this->ln();
	 $this->Line(10,$this->GetY(),270,$this->GetY());
	 $this->cell(20,7,"Cargo:     ".$this->precar);
	 $this->cell(20,7,"                                                                                         ".$this->confcar);
	 $this->cell(20,7,"                                                                                                                                                                      ".$this->aprocar);
	 $this->ln();
	 $this->Line(10,$this->GetY(),270,$this->GetY());
	 $this->cell(0,8,"Firma:");
	 $this->ln();
	 $this->Line(10,$this->GetY(),270,$this->GetY());
	}

	function Cuerpo()
	{
	 $tb=$this->bd->select($this->sql);
	 $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4]));
	 $this->SetAligns(array('L','L','J','J','R','L','L'));
	 $this->SetBorder(false);
	 $this->setFont("Arial","B",8);
	 $ncampos=count($this->titulos);
        $ref = "";
    	$primeravez = true;
	 while(!$tb->EOF)
	 {

	 	if ($tb->fields["acodubi"] != $ref) //Imprimimos encabezado
				{
				$ref = $tb->fields["acodubi"];
			/*	if (!$primeravez) {
					$this->AddPage();
				}
				$primeravez = false;*/
				$this->setFillcolor(150,150,150);
				 $this->setFont("Arial","B",8);
				//$this->MultiCell(260,5,$tb->fields["bdesubi"],0,'C',1);
				$this->MultiCell(260,5,$tb->fields["bdesubi"],0,1,1);
				 $this->setFont("Arial","",8);
            	}

 	  $this->setFont("Arial","",8);
	  $this->RowM(array($tb->fields["acodact"],$tb->fields["acodmue"],$tb->fields["adesmue"],$tb->fields["adetmue"],H::FormatoMonto($tb->fields["avalini"])));
      $this->acum=($this->acum+$tb->fields["avalini"]);
	  $this->result=($this->result+1);
	  $tb->MoveNext();
	 }
	 $this->setFont("Arial","B",8);
	 $this->cell(20,10,"                                                                                                                                                                                 Total General    ".H::FormatoMonto($this->acum));
	 $this->cell(20,10,"                                                                                                                                                                                                                                                     Cantidad Total       ".H::FormatoMonto($this->result));
	}
}
?>