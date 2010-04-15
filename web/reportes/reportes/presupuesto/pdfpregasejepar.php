<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
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
			$this->conf="p";
			$this->fpdf($this->conf,"mm","letter");
			$this->bd=new basedatosAdo();
			$this->cab=new cabecera();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->perhasta=$_POST["perhasta"];
			$this->niveles=$_POST["niveles"];
			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];
			$this->pardesde=$_POST["pardesde"];
			$this->parhasta=$_POST["parhasta"];
			$this->filtro=$_POST["filtro"];

			$this->antesreporte();


			$this->sql="select distinct(substr(codpre,".$this->inipartida.",".$this->lonpartida.")) as codpre
								from cpdeftit
								where rtrim(codpre) >= rtrim('".$this->codpredes."') and
								rtrim(codpre) <= rtrim('".$this->codprehas."') and
								substr(codpre,13,3)>= '".$this->pardesde."' and
								substr(codpre,13,3)<= '".$this->parhasta."' and
								length(rtrim(codpre))>='".$this->inipartida."' and
								rtrim(codpre) like '".$this->filtro."'
								group by  substr(codpre,".$this->inipartida.",".$this->lonpartida.")";

			$this->llenartitulos();
			$this->llenartitulos12();
			$this->llenartitulos2();
			$this->llenartitulos22();
		}



 		function antesreporte(){
				$this->sql01="select nomemp as empresa from empresa";
				$this->tb01=$this->bd->select($this->sql01);
	//:MASCARA:=OBTENER_MASCARA;

				$this->sql02="select to_char(fecini,'yyyy') as anoini, to_char(feccie,'yyyy') as anofin from cpdefniv where codemp= '001'";
				$this->tb02=$this->bd->select($this->sql02);

				$this->sql03="select sum(lonniv) as  loncategoria, count(lonniv) as concategoria from cpniveles where catpar = 'c'";
			$tb03=$this->bd->select($this->sql03);

				$this->inipartida =  $this->tb03->fields["loncategoria"] + $tb03->fields["concategoria"] + 1;

				$this->sql04="select sum(lonniv) into lonmascara from cpniveles where consec <= '".$this->niveles."'";
				$tb04=$this->bd->select($this->sql04);

				$this->lonpartida = ($tb04->fields["lonmascara"]+$this->niveles) - $this->inipartida;

 		}


		function llenartitulos(){
			$this->titulos[0]="";
			$this->titulos[1]="";
			$this->titulos[2]="TOTAL ORGANISMO";
		}

		function llenartitulos12(){
			$this->titulos12[0]="";
			$this->titulos12[1]="";
			$this->titulos12[2]="Suma Sectores";
		}

		function llenartitulos2(){
			$this->titulos2[0]="CÓDIGO";
			$this->titulos2[1]="DENOMINACIÓN";
			$this->titulos2[2]="PRIMER";
			$this->titulos2[3]="SEGUNDO";
			$this->titulos2[4]="TERCER";
			$this->titulos2[5]="CUARTO";
			$this->titulos2[6]="AÑO";
		}

		function llenartitulos22(){
			$this->titulos22[0]="";
			$this->titulos22[1]="";
			$this->titulos22[2]="TRIMESTRE";
			$this->titulos22[3]="TRIMESTRE";
			$this->titulos22[4]="TRIMESTRE";
			$this->titulos22[5]="TRIMESTRE";
			$this->titulos22[6]=$this->tb02->fields["anoini"];
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->ln(-8);
			$this->setFont("Arial","B",8);
			$this->cell(180,5,"    AÑO  ".$this->tb02->fields["anofin"],0,0,'R');
			$this->ln(8);
			$this->setFont("Arial","B",7);
			$this->setTextColor(0,0,128);
			$this->SetXY(10,35);
			$ncampos=count($this->titulos);
			for($i=0;$i<=$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i],0,0,'C');
			}
			$this->ln(3);
			$ncampos12=count($this->titulos12);
			for($i=0;$i<=$ncampos12;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos12[$i],0,0,'C');
			}
			$this->ln(5);
			$this->Line(100,$this->GetY(),200,$this->GetY());
			$y=$this->GetY();
			$this->setFont("Arial","B",7);
			$this->setTextColor(0,0,128);
			$ncampos2=count($this->titulos2);
			$this->ln(-5);
			$this->setTextColor(128,0,0);
			$this->cell($this->anchos2[0],10,$this->titulos2[0],0,0,'C');
			$this->cell($this->anchos2[1],10,$this->titulos2[1],0,0,'C');
			$this->ln(5);
			$this->SetX($this->anchos2[0]+$this->anchos2[1]+10);
			for($i=2;$i<=$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],5,$this->titulos2[$i],0,0,'C');
			}
			$this->ln(3);
			$ncampos22=count($this->titulos22);
			for($i=0;$i<=$ncampos22;$i++)
			{
				$this->cell($this->anchos2[$i],5,$this->titulos22[$i],0,0,'C');
			}

			$this->Line(10,50,200,50);
			$this->SetXY(10,35);
			$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+220);
			$this->Line($this->GetX()+$this->anchos[0],$this->GetY(),$this->GetX()+$this->anchos[0],$this->GetY()+220);
			$ancho=$this->anchos[0]+$this->anchos[1];
			$this->Line($this->GetX()+$ancho,$this->GetY(),$this->GetX()+$ancho,$this->GetY()+220);
			for($i=2;$i<=$ncampos2;$i++){
			$ancho=$ancho+$this->anchos2[$i];
			if ($i==$ncampos2)
			$this->Line($this->GetX()+$ancho,35,$this->GetX()+$ancho,255);
			else $this->Line($this->GetX()+$ancho,$y,$this->GetX()+$ancho,$y+212);
			$this->Line(10,255,200,255);
			}
				}


		function montoasignado($per1,$per2,$per3){
			   if ($per1<=$this->perhasta){
			  	$sql2="SELECT COALESCE(SUM(MonCAU),0) as montoasignado
        				FROM CPASIINI
       					WHERE
        				(rtrim(codpre) like '%%-%%-%%-%%-%%-4-01-%%-%%-%%-%%%-%%'  or
						rtrim(codpre) like '%%-%%-%%-%%-%%-4-02-%%-%%-%%-%%%-%%' or
						rtrim(codpre) like '%%-%%-%%-%%-%%-4-03-%%-%%-%%-%%%-%%' or
						rtrim(codpre) like '%%-%%-%%-%%-%%-4-04-%%-%%-%%-%%%-%%') and
             			PerPre >= '".$per2."' AND
             			PerPre <= '".$per3."'  AND
            			AnoPre >= '".$this->tb02->fields["anoini"]."' AND
             			AnoPre <= '".$this->tb02->fields["anofin"]."'";

			 	$tb2=$this->bd->select($sql2);
			 	return ($tb2->fields["montoasignado"]/1000);
			 }

       else return (0);
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

		function MontoAsignadoDetalle($per1,$per2,$per3){
			   if ($per1<=$this->perhasta){
				    $sql2="SELECT COALESCE(SUM(MonCAU),0) as montoasignado
             			FROM CPASIINI
      		 			WHERE SubStr(CodPre,'".$this->inipartida."',
      		 				  COALESCE(LENGTH(RTRIM('".$this->tb->fields["codpre"]."')), 0))= RTRIM('".$this->tb->fields["codpre"]."') AND
             				  PerPre >= '".$per2."' AND
             		          PerPre <= '".$per3."'  AND
            		          AnoPre >= '".$this->tb02->fields["anoini"]."' AND
             		          AnoPre <= '".$this->tb02->fields["anofin"]."'";

	    			$tb2=$this->bd->select($sql2);
		   		 	return ($tb2->fields["montoasignado"]/1000);
			 }
       		else return (0);
		}

		function Cuerpo(){
			$this->tb=$this->bd->select($this->sql);
			$this->SetTextColor(0,0,0);

			$this->SetXY(10,50);
			$this->cell($this->anchos2[0],5,"  4");
			$this->cell($this->anchos2[1],5,"EGRESOS");
			$totegrpritri=$this->montoasignado("01","01","03");
			$this->cell($this->anchos2[2],5,number_format($totegrpritri,'2',',','.'),0,0,'R');
			$totegrsegtri=$this->montoasignado("02","04","06");
			$this->cell($this->anchos2[3],5,number_format($totegrsegtri,'2',',','.'),0,0,'R');
			$totegrtertri=$this->montoasignado("03","07","09");
			$this->cell($this->anchos2[4],5,number_format($totegrtertri,'2',',','.'),0,0,'R');
			$totegrcuatri=$this->montoasignado("03","10","12");
			$this->cell($this->anchos2[5],5,number_format($totegrcuatri,'2',',','.'),0,0,'R');
			$total=$totegrpritri+$totegrsegtri+$totegrtertri+$totegrcuatri;
			$this->cell($this->anchos2[6],5,number_format($total,'2',',','.'),0,0,'R');
			$this->setFont("Arial","",7);
			$this->ln();
			while(!$this->tb->EOF){
				$this->cell($this->anchos2[0],5,$this->tb->fields["codpre"]);
				$y=$this->GetY();
				$this->Multicell($this->anchos2[1],4,$this->NomPreFormula());
				$y2=$this->GetY();
				$this->SetXY($this->anchos2[0]+$this->anchos2[1]+10,$y);
                $this->cell($this->anchos2[2],5,number_format($this->MontoAsignadoDetalle("01","01","03"),'2',',','.'),0,0,'R');
				$this->cell($this->anchos2[3],5,number_format($this->MontoAsignadoDetalle("02","04","06"),'2',',','.'),0,0,'R');
				$this->cell($this->anchos2[4],5,number_format($this->MontoAsignadoDetalle("03","07","09"),'2',',','.'),0,0,'R');
				$this->cell($this->anchos2[5],5,number_format($this->MontoAsignadoDetalle("04","10","12"),'2',',','.'),0,0,'R');
				$total2=$this->MontoAsignadoDetalle("01","01","03")+$this->MontoAsignadoDetalle("02","04","06")+$this->MontoAsignadoDetalle("03","07","09")+$this->MontoAsignadoDetalle("04","10","12");
				$this->cell($this->anchos2[6],5,number_format($total2,'2',',','.'),0,0,'R');

				$this->tb->MoveNext();

				if ($this->GetY()>=235){
					$this->AddPage();
					 $this->SetXY(10,50);

				}
				else $this->SetY($y2+3);
			}
				}


	}
?>