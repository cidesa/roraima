<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	//require_once("../../lib/general/cabecera.php");
require_once("../../lib/general/funcionescontabilidad.php");

	class pdfreporte extends fpdf
	{

	var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $perdesde;
		var $perhasta;
		var $nivdesde;
		var $nivhasta;
		var $codpredes;
		var $codprehas;
		var $tippre;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Legal");
			$this->bd=new basedatosAdo();
			//$this->cab=new cabecera();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->perdesde=$_POST["perdesde"];
			$this->perhasta=$_POST["perhasta"];
			$this->niveles=$_POST["niveles"];
			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];
			$this->filtro=$_POST["filtro"];

			$this->antesreporte();


			$this->sql="SELECT SubStr(CodPre,".$this->inipartida.",3) as Partida, substr(codpre,".$this->inipartida.",".$this->lonpartida.") as CodPre,
						SUM(MonAsi) as MontAsig,
						SUM(MonPrc) as MonPrc,
						SUM(MonCom) as MonCom,
						SUM(MonCau) as MonCau,
						SUM(MonPag) as MonPag,
						SUM(MonTra) as MonTra,
						SUM(MonTrN) as MonTrN,
						SUM(MonAdi) as MonAdi,
						SUM(MonDim) as MonDim,
						SUM(MonDis) as MonDis,
						(SUM(MONCAU)-SUM(MONPAG)) as Deuda
					FROM CPASIINI
					WHERE  (CodPre) >= RTRIM('".$this->codpredes."') AND
                		(CodPre) <= RTRIM('".$this->codprehas."') AND
                		PerPre >= '".$this->perdesde."' AND
                		PerPre <= '".$this->perhasta."' AND
                    	AnoPre >= '".$this->tb02->fields["anoini"]."' AND
             			AnoPre <= '".$this->tb02->fields["anofin"]."' AND
                		RTRIM(CodPre) Like '".$this->filtro."'
					GROUP BY
						Partida, CodPre";

			//print $this->sql;
			//exit;

			$this->llenartitulos();
			$this->llenartitulos2();
		}


	function poner_cabecera($objeto,$rep,$configuracion,$pagina)
	{
		//configuro la pagina con Orientacion Horizontal
		//busco la descripcion y direccion de la empresa
		$tb3=$this->bd->select("select * from empresa where codemp='001'");
		if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp"];
				$direccion=$tb3->fields["diremp"];
				$telef=$tb3->fields["tlfemp"];
				$fax=$tb3->fields["faxemp"];
			}
			$objeto->setFont("Arial","B",8);
			//Logo de la Empresa
			$objeto->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->SetX(300);
			$objeto->Cell(50,10,'Fecha: '.$fecha,0,0,'C');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$this->SetX(300);
				$objeto->Cell(50,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
			}
	    //Titulo Descripcion de la Empresa
    		/*$objeto->Ln(-5);*/
			$objeto->Ln(-5);
    		$objeto->Cell(270,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(270,5,'',0,0,'C');
    		$objeto->Ln(8);
			//Titulo del Reporte
			$objeto->setFont("Arial","B",12);
			$objeto->Cell(340,10,$rep,0,0,'C',0);
			$objeto->ln(10);
			$objeto->Line(10,35,340,35);
		}



		function antesreporte(){
			$this->sql01="select nomemp as empresa from empresa";
			$this->tb01=$this->bd->select($this->sql01);
			//:MASCARA:=OBTENER_MASCARA;

			$this->sql02="select to_char(fecini,'yyyy') as anoini, to_char(feccie,'yyyy') as anofin from cpdefniv where codemp= '001'";
			$this->tb02=$this->bd->select($this->sql02);

			$this->sql03="select sum(lonniv) as  loncategoria, count(lonniv) as concategoria from cpniveles where RTRIM(catpar) = RTRIM('P')";
			$tb03=$this->bd->select($this->sql03);

			$this->inipartida =  $tb03->fields["loncategoria"] + $tb03->fields["concategoria"] + 1;
			//print "-".$tb03->fields["loncategoria"]."-";
			//print $tb03->fields["concategoria"];
			$this->sql04="select sum(lonniv) as lonmascara from cpniveles where consec <= '".$this->niveles."'";
			$tb04=$this->bd->select($this->sql04);
			//print "-".$tb04->fields["lonmascara"]."-".$this->niveles;
			$this->lonpartida = ($tb04->fields["lonmascara"]+$this->niveles) - $this->inipartida;
			//exit;
		}


		function llenartitulos(){
						$this->titulos[0]="Partida";
						$this->titulos[1]="Nombre";
						$this->titulos[2]="Asignación";
						$this->titulos[3]="Modificaciones";
						$this->titulos[4]="Asignación";
						$this->titulos[5]="Compromomisos";
						$this->titulos[6]="%";
						$this->titulos[7]="Saldo por";
						$this->titulos[8]="Gasto";
						$this->titulos[9]="%";
						$this->titulos[10]="Gasto";
						$this->titulos[11]="%";
						$this->titulos[12]="Saldo";

		}

		function llenartitulos2(){
						$this->titulos2[0]="";
						$this->titulos2[1]="";
						$this->titulos2[2]="Inicial";
						$this->titulos2[3]="";
						$this->titulos2[4]="Modificada";
						$this->titulos2[5]="";
						$this->titulos2[6]="";
						$this->titulos2[7]="Comprometer";
						$this->titulos2[8]="Causado";
						$this->titulos2[9]="";
						$this->titulos2[10]="Pagado";
						$this->titulos2[11]="";
						$this->titulos2[12]="Pendiente";

		}

		function Header()
		{


			$this->poner_cabecera($this,"Resumen General de la Ejec. Presup. por Partidas",$this->conf,"s");
			/*$this->ln(10);
			$this->Line(10,35,340,35);*/
			$this->SetXY(10,37);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			for($i=0;$i<=$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i],0,0,'C');
			}
			$this->ln(3);
			$ncampos12=count($this->titulos2);
			for($i=0;$i<=$ncampos12;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos2[$i],0,0,'C');
			}
			$this->Line(10,48,340,48);
			$this->ln(5);

		}

			function NomPreFormula(){
			$sql3="SELECT UPPER(RTRIM(NomPre)) as NomPre, COALESCE(LENGTH(RTRIM(NomPre)), 0) as NomPre2
						         FROM CPDefTit WHERE SUBSTR(CodPre,".$this->inipartida.",".$this->lonpartida.")= rtrim('".$this->tb->fields["codpre"]."') AND
                                 COALESCE(LENGTH(RTRIM(CODPRE)), 0)>=".$this->inipartida." and
                                 COALESCE(LENGTH(RTRIM(CODPRE)), 0)<=(".$this->inipartida."+".$this->lonpartida.") group by nompre, nompre";


    		$tb3=$this->bd->select($sql3);
    		$Nombre = "";
    		while(!$tb3->EOF){
    			if ($tb3->fields["nompre2"]<1000)
    				$Nombre = $Nombre.RTRIM($tb3->fields["nompre"])."-";
    				$tb3->MoveNext();
    			}
    			return(substr($Nombre,0,instr($Nombre,'-',1,1)));
		}


		function Cuerpo(){
			$this->ln();
			$this->tb=$this->bd->select($this->sql);
				$acummonasi=0;
				$acummonmod=0;
				$acumasiact=0;
				$acummoncom=0;
				$acumdisnet=0;
				$acummoncau=0;
				$acummonpag=0;
				$acumdeuda=0;
				$totmonasi=0;
				$totmonmod=0;
				$totasiact=0;
				$totmoncom=0;
				$totdisnet=0;
				$totmoncau=0;
				$totmonpag=0;
				$totdeuda=0;

			$ref=$this->tb->fields["partida"];
			while(!$this->tb->EOF){
				if ($ref!=$this->tb->fields["partida"]){
					$this->setFont("Arial","B",8);
					$this->cell($this->anchos[0],5,"");
					$this->cell($this->anchos[1],5,"TOTAL PARTIDA",0,0,'R');
					$this->cell($this->anchos[2],5,number_format($acummonasi,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[3],5,number_format($acummonmod,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[4],5,number_format($acumasiact,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[5],5,number_format($acummoncom,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[6],5,"");
					$this->cell($this->anchos[7],5,number_format($acumdisnet,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[8],5,number_format($acummoncau,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[9],5,"");
					$this->cell($this->anchos[10],5,number_format($acummonpag,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[11],5,"");
					$this->cell($this->anchos[12],5,number_format($acumdeuda,'2',',','.'),0,0,'R');
					$this->Line($tis->anchos[0]+10,$this->GetY(),340,$this->GetY());
					$acummonasi=0;
					$acummonmod=0;
					$acumasiact=0;
					$acummoncom=0;
					$acumdisnet=0;
					$acummoncau=0;
					$acummonpag=0;
					$acumdeuda=0;
					$this->ln(10);

				}
				$this->setFont("Arial","",8);
				$this->cell($this->anchos[0],5,$this->tb->fields["codpre"]);
				$this->cell($this->anchos[1],5,"");

				$sql2="SELECT SUM(MonAsi) as MontoAsignado  FROM CPASIINI WHERE SubStr(CodPre,".$this->inipartida.",".$this->lonpartida.")= RTRIM('".$this->tb->fields["codpre"]."') AND
          				PerPre = '00'";
				$tb2=$this->bd->select($sql2);
				$this->cell($this->anchos[2],5,number_format($tb2->fields["montoasignado"],'2',',','.'),0,0,'R');
				$fmoncom= ($this->tb->fields["montra"]+$this->tb->fields["monadi"])-($this->tb->fields["montrn"]+$this->tb->fields["mondim"]);
				$this->cell($this->anchos[3],5,number_format($fmoncom,'2',',','.'),0,0,'R');
				$asigactual=$this->tb->fields["monasi"] + $this->tb->fields["montra"] + $this->tb->fields["monadi"] - $this->tb->fields["montrn"] - $this->tb->fields["mondim"];
				$this->cell($this->anchos[4],5,number_format($asigactual,'2',',','.'),0,0,'R');
				$this->cell($this->anchos[5],5,number_format($this->tb->fields["moncom"],'2',',','.'),0,0,'R');
				 if ($asigactual != 0)
     				$porcom= Abs(($this->tb->fields["moncom"]*100)/$asigactual);
  				else
     				$porcom= 0;
  				$this->cell($this->anchos[6],5,number_format($porcom,'2',',','.'),0,0,'R');
  				$disnet=$asigactual-$this->tb->fields["moncom"];
  				$this->cell($this->anchos[7],5,number_format($disnet,'2',',','.'),0,0,'R');
  				$this->cell($this->anchos[8],5,number_format($this->tb->fields["moncau"],'2',',','.'),0,0,'R');
  				if ($asigactual != 0)
     				$porcau= Abs(($this->tb->fields["moncau"]*100)/$asigactual);
  				else
     				$porcau=0;
  				$this->cell($this->anchos[9],5,number_format($porcau,'2',',','.'),0,0,'R');
  				$this->cell($this->anchos[10],5,number_format($this->tb->fields["monpag"],'2',',','.'),0,0,'R');
  				if ($asigactual != 0)
     				$porpag= Abs(($this->tb->fields["monpag"]*100)/$asigactual);
  				else
     				$porpag=0;
     			$this->cell($this->anchos[11],5,number_format($porpag,'2',',','.'),0,0,'R');
				$this->cell($this->anchos[12],5,number_format($this->tb->fields["deuda"],'2',',','.'),0,0,'R');
				$this->SetX($this->anchos[0]+10);
				$this->Multicell($this->anchos[1],5,$this->NomPreFormula());
				$acummonasi=$acummonasi+$tb2->fields["montoasignado"];
				$acummonmod=$acummonmod+$fmoncom;
				$acumasiact=$acumasiact+$asigactual;
				$acummoncom=$acummoncom+$this->tb->fields["moncom"];
				$acumdisnet=$acumdisnet+$disnet;
				$acummoncau=$acummoncau+$this->tb->fields["moncau"];
				$acummonpag=$acummonpag+$this->tb->fields["monpag"];
				$acumdeuda=$acumdeuda+$this->tb->fields["deuda"];
				$totmonasi=$totmonasi+$tb2->fields["montoasignado"];
				$totmonmod=$totmonmod+$fmoncom;
				$totasiact=$totasiact+$asigactual;
				$totmoncom=$acummoncom+$this->tb->fields["moncom"];
				$totdisnet=$totdisnet+$disnet;
				$totmoncau=$totmoncau+$this->tb->fields["moncau"];
				$totmonpag=$totmonpag+$this->tb->fields["monpag"];
				$totdeuda=$totdeuda+$this->tb->fields["deuda"];

				$ref=$this->tb->fields["partida"];
				$this->tb->MoveNext();
				if ($this->GetY()>=170){
					$this->AddPage();
					$this->ln(5);
				}

			}
			//TOTALES
					$this->setFont("Arial","B",8);
					$this->cell($this->anchos[0],5,"");
					$this->cell($this->anchos[1],5,"TOTAL PARTIDA",0,0,'R');
					$this->cell($this->anchos[2],5,number_format($acummonasi,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[3],5,number_format($acummonmod,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[4],5,number_format($acumasiact,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[5],5,number_format($acummoncom,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[6],5,"");
					$this->cell($this->anchos[7],5,number_format($acumdisnet,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[8],5,number_format($acummoncau,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[9],5,"");
					$this->cell($this->anchos[10],5,number_format($acummonpag,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[11],5,"");
					$this->cell($this->anchos[12],5,number_format($acumdeuda,'2',',','.'),0,0,'R');
					$this->Line($tis->anchos[0]+10,$this->GetY(),340,$this->GetY());
					$this->ln(10);
					$this->cell($this->anchos[0],5,"");
					$this->cell($this->anchos[1],5,"TOTAL ",0,0,'R');
					$this->cell($this->anchos[2],5,number_format($totmonasi,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[3],5,number_format($totmonmod,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[4],5,number_format($totasiact,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[5],5,number_format($totmoncom,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[6],5,"");
					$this->cell($this->anchos[7],5,number_format($totdisnet,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[8],5,number_format($totmoncau,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[9],5,"");
					$this->cell($this->anchos[10],5,number_format($totmonpag,'2',',','.'),0,0,'R');
					$this->cell($this->anchos[11],5,"");
					$this->cell($this->anchos[12],5,number_format($totdeuda,'2',',','.'),0,0,'R');
					$this->Line($tis->anchos[0]+10,$this->GetY(),340,$this->GetY());
					}


	}
?>