<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $codigo1;
		var $codigo2;
		var $nombre1;
		var $nombre2;
		var $nac;
		var $nacionalidad;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->nombre1=$_POST["nombre1"];
			$this->nombre2=$_POST["nombre2"];
			$this->nac=$_POST["nac"];
			$this->AUXNAC="";
			$this->AUXNAC2="";

				if ($this->nac=='A'){
  					$this->AUXNAC2='E';
  					$this->AUXNAC='V';
  					}
  				else if ($this->nac=='V'){
  					$this->AUXNAC2='V';
  					$this->AUXNAC='V';
  					}
  				else if(	$this->nac=='E'){
  					$this->AUXNAC2='E';
  					$this->AUXNAC='E';
  					}
			$this->sql="select DISTINCT(A.RIFCON),
						A.NITCON,
						A.NOMCON,
						A.DIRCON,
						A.NACCON,
						A.CODPAR,
						A.CIUCON,
						A.CPOCON,
						case when A.TIPCON='N' then 'NATURAL' else 'JURIDICA' end as TIPCON,
						A.TELCON,
						A.FAXCON,
						A.EMACON,
						A.CODMUN,
						A.CODEDO,
						B.NOMEDO,
						C.NOMMUN,
						D.NOMPAR
						FROM INCONREP A,INESTADO B, INMUNICI C, INPARROQ D
						WHERE
						(NACCON='".$this->AUXNAC."'  OR NACCON= '".$this->AUXNAC2."') AND
						A.RIFCON>='".$this->cod1."' AND
						A.RIFCON<='".$this->cod2."' AND
						A.NOMCON>='".$this->nombre1."' AND
						A.NOMCON<='".$this->nombre2."'AND
						A.CODEDO=B.CODEDO AND
						A.CODMUN=C.CODMUN AND
						A.CODPAR=D.CODPAR AND
						D.CODMUN=C.CODMUN AND
						D.CODEDO=B.CODEDO AND
						C.CODEDO=B.CODEDO
						ORDER BY A.RIFCON";
						//print ($this->sql);



			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);
		}

	function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			$this->SetTextColor(135,0,0);
		    $this->setFont("Arial","B",8);
			$this->Line(10, $this->getY(),270,$this->getY());

// aqui van los titulos

			$this->setFont("Arial","B",7);
			$this->SetTextColor(0,0,128);
		$this->Setx(10);
			$this->cell(20,5,"C.I/ RIF.: ");
		$this->Setx(25);
			$this->cell(20,5,"NOMBRE/RAZON: ");
		$this->Setx(55);
			$this->cell(15,5,"NIT: ");
		$this->Setx(70);
			$this->cell(15,5,"NACIONALIDAD:");
		$this->Setx(100);
			$this->cell(15,5,"TIPO: ");
		$this->Setx(115);
			$this->cell(20,5,"MUNICIPIO: ");
		$this->Setx(135);
			$this->cell(20,5,"PARROQUIA: ");
		$this->Setx(155);
			$this->cell(20,5,"ESTADO: ");
		$this->Setx(175);
			$this->cell(20,5,"DIRECCION: ");
		$this->Setx(196);
			$this->cell(15,5,"COD.POSTAL: ");
		$this->Setx(215);
			$this->cell(15,5,"TELÉFONO: ");
		$this->Setx(235);
			$this->cell(15,5,"FAX: ");
		$this->Setx(250);
			$this->cell(15,5,"EMAIL: ");
			 $this->ln(4);
			 $this->Line(10, $this->getY()+3,270,$this->getY()+3);
			 $this->Sety(50);
		}

		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$this->SetFillColor(255,255,255);
		    $tb=$this->bd->select($this->sql);

			if(!$tb->EOF){

			if($tb->fields["naccon"]=='V'){
				$this->nacionalidad="VENEZOLANA";
				}
				else if($tb->fields["naccon"]=='E')
				{
				$this->nacionalidad="EXTRANGERA";}
			}

			 while(!$tb->EOF){
			$this->Setx(10);
			$this->cell(20,5,$tb->fields["rifcon"]);// rif
			$this->Setx(25);
			$this->cell(20,5,$tb->fields["nomcon"]);//nombre
			$this->Setx(55);
			$this->cell(20,5,$tb->fields["nitcon"]);//nit
			$this->Setx(70);
			$this->cell(20,5,$this->nacionalidad);//nacionalidad
				$this->Setx(100);
			$this->cell(20,5,$tb->fields["tipcon"]);

			$this->Setx(115);
			$this->cell(20,5,$tb->fields["nommun"]);// municipio
			$this->Setx(135);
			$this->cell(20,5,$tb->fields["nompar"]);// parroquia
					$this->Setx(155);

			$this->cell(20,5,$tb->fields["nomedo"]);//estado
			$this->Setx(175);

			$this->cell(20,5,$tb->fields["dircon"]);// direcciion
					$this->Setx(196);

			$this->cell(20,5,$tb->fields["cpocon"]); // codigo postal
			$this->Setx(215);
			$this->cell(20,5,$tb->fields["telcon"]); // telefono
				$this->Setx(235);
			$this->cell(20,5,$tb->fields["faxcon"]);// fax
				$this->Setx(250);
			$this->cell(20,5,$tb->fields["emacon"]);//email


  			  $this->ln(3);

			  $tb->MoveNext();
  			  $this->ln(3);
  		  	}	//end while

//totales
			if ($this->getY() >230 )
			{
				$this->AddPage();
			}
			 $this->ln(4);



		}
	}
?>