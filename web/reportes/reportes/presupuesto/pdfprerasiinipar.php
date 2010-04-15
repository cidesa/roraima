<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	//require_once("../../lib/general/funcionespresupuesto.php");
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
		var $niveles;
		var $asignacion;
		var $movimientos;
		var $grupo;
		var $codpredesde;
		var $codprehasta;
		var $comodin;
		var $conf;
		var $cadena;
		var $longrupo;
		var $formato;
		var $loncategoria;
		var $concategoria;
		var $inipartida;
		var $lonmascara;
		var $lonpartida;
		var $anoini;
		var $anofin;
		var $perdesde;
		var $perhasta;
		var $periodo;
		var $adis;
		var $dism;
		var $totalAdis;
		var $totalDism;
		var $mesdesde;
		var $meshasta;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->bd->validar();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->perdesde=$_POST["perdesde"];
			$this->perhasta=$_POST["perhasta"];
			$this->niveles=$_POST["niveles"];
			$this->asignacion=$_POST["asignacion"];
			$this->movimientos=$_POST["movimientos"];
			$this->grupo=$_POST["grupo"];
			$this->codpredesde=$_POST["codpredesde"];
			$this->codprehasta=$_POST["codprehasta"];
			$this->comodin=$_POST["comodin"];
			$this->ejecutaAntes($this->niveles,$this->grupo,$this->codpredesde,$this->codprehasta,$this->comodin);
			$this->sql="SELECT DISTINCT (substr(RTRIM(B.NomPre),1,70)) as nompre,
							SubStr(A.CodPre,1,".$this->longrupo.") as programa,
							SubStr(A.CodPre,".$this->inipartida.",3) as partida,
							SUM(A.MonAsi) as montasig,
							SUM(MonTra) as montra,
							SUM(MonTrN) as montrn,
							SUM(MonAdi) as monadi,
							SUM(MonDim) as mondim,
							SUM(MonDis) as mondis,
							SubStr(A.CodPre,".$this->inipartida.",".$this->lonpartida.") as codpre
						FROM CPASIINI as A, CPDEFTIT as B
						WHERE
							   RTRIM(A.CodPre)=RTRIM(B.CodPre) AND coalesce(coalesce(LENGTH(RTRIM(B.codpre)), 0), 0)=".$this->inipartida."+".$this->lonpartida."-1 AND
							   RTRIM(A.CodPre) >= RTRIM('".$this->codpredesde."') AND
                			   RTRIM(A.CodPre) <= RTRIM('".$this->codprehasta."') AND
                			   A.PerPre = '00' AND
                               A.AnoPre >= '".$this->anoini."' AND
                               A.AnoPre <= '".$this->anofin."' AND
                               RTRIM(A.CodPre) Like rtrim('".$this->comodin."')||'%'
                        GROUP BY  SubStr(A.CodPre,1,".$this->longrupo."),SubStr(A.CodPre,".$this->inipartida.",3),SubStr(A.CodPre,".$this->inipartida.",".$this->lonpartida."),B.nompre
						ORDER BY  SubStr(A.CodPre,1,".$this->longrupo."),SubStr(A.CodPre,".$this->inipartida.",3),SubStr(A.CodPre,".$this->inipartida.",".$this->lonpartida.")";
						//print $this->sql;
			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Presupuestario";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Asignado";
				$this->titulos[3]="Modificaciones";
				$this->titulos[4]="Asig.Actualizada";
				$this->anchos[0]=52;
				$this->anchos[1]=115;
				$this->anchos[2]=30;
				$this->anchos[3]=30;
				$this->anchos[4]=30;

		}
		function ejecutaAntes($nivel,$grup,$codes,$codhas,$como)
		{
			$this->cadena='';
			$this->longrupo=0;
			if($grup=="PROGRAMA")
			{
				$grup=1;
			}
			else if($grup=="ACTIVIDAD")
			{
				$grup=2;
			}
			$reg=$this->bd->select("SELECT SUM(coalesce(LONNIV+1,0))-1 as lonsub FROM CPNIVELES WHERE CONSEC<=$grup");
			if(!$reg->EOF)
			{
				$this->longrupo=$reg->fields["lonsub"];
			}
			$this->formato='INICIA';
			$rs=$this->bd->select("SELECT * FROM CPNIVELES WHERE CATPAR='c'");
			while(!$rs->EOF)
			{
				if($this->formato=='INICIA')
				{
					$this->formato=ltrim(str_pad(' ',$rs->fields["LONNIV"]+1,'%'));
				}
				else
				{
					$this->formato=$this->formato.'-'.ltrim(str_pad(' ',$rs->fields["LONNIV"]+1,'%'));
				}
				$rs->MoveNext();
			}
			$this->formato=$this->formato.'-';
			$this->cadena=substr($this->formato,$this->longrupo);
			$rb=$this->bd->select("SELECT TO_CHAR(FECINI,'YYYY') as anoini,TO_CHAR(FECCIE,'YYYY') as anofin FROM CPDEFNIV WHERE CODEMP= '001'");
			if(!$rb->EOF)
			{
				$this->anoini=$rb->fields["anoini"];
				$this->anofin=$rb->fields["anofin"];
			}
			$tb=$this->bd->select("SELECT SUM(LonNiv) as loncategoria,COUNT(LonNiv) as concategoria FROM CPNiveles WHERE CatPar = 'c'");
			if(!$tb->EOF)
			{
				$this->loncategoria=$tb->fields["loncategoria"];
				$this->concategoria=$tb->fields["concategoria"];
			}
			$this->inipartida=$this->loncategoria + $this->concategoria + 1;
			$tb=$this->bd->select("SELECT SUM(LonNiv) as lonmascara FROM CPNiveles WHERE Consec <= $nivel");
			if(!$tb->EOF)
			{
				$this->lonmascara=$tb->fields["lonmascara"];
			}
			$this->lonpartida=($this->lonmascara + $nivel) - $this->inipartida;

			if($this->movimientos=="ACUMULADOS")
			{
				$this->periodo=$this->perdesde;
				$this->perdesde='01';
			}
			else
			{
				$this->periodo=$this->perdesde;
			}

			if($this->periodo=='01')
			{
				$this->mesdesde='Enero';
			}
			else if($this->periodo=='02')
			{
				$this->mesdesde='Febrero';
			}
			else if($this->periodo=='03')
			{
				$this->mesdesde='Marzo';
			}
			else if($this->periodo=='04')
			{
				$this->mesdesde='Abril';
			}
			else if($this->periodo=='05')
			{
				$this->mesdesde='Mayo';
			}
			else if($this->periodo=='06')
			{
				$this->mesdesde='Junio';
			}
			else if($this->periodo=='07')
			{
				$this->mesdesde='Julio';
			}
			else if($this->periodo=='08')
			{
				$this->mesdesde='Agosto';
			}
			else if($this->periodo=='09')
			{
				$this->mesdesde='Septiembre';
			}
			else if($this->periodo=='10')
			{
				$this->mesdesde='Octubre';
			}
			else if($this->periodo=='11')
			{
				$this->mesdesde='Noviembre';
			}
			else if($this->periodo=='12')
			{
				$this->mesdesde='Diciembre';
			}

			if($this->perhasta=='01')
			{
				$this->meshasta='Enero';
			}
			else if($this->perhasta=='02')
			{
				$this->meshasta='Febrero';
			}
			else if($this->perhasta=='03')
			{
				$this->meshasta='Marzo';
			}
			else if($this->perhasta=='04')
			{
				$this->meshasta='Abril';
			}
			else if($this->perhasta=='05')
			{
				$this->meshasta='Mayo';
			}
			else if($this->perhasta=='06')
			{
				$this->meshasta='Junio';
			}
			else if($this->perhasta=='07')
			{
				$this->meshasta='Julio';
			}
			else if($this->perhasta=='08')
			{
				$this->meshasta='Agosto';
			}
			else if($this->perhasta=='09')
			{
				$this->meshasta='Septiembre';
			}
			else if($this->perhasta=='10')
			{
				$this->meshasta='Octubre';
			}
			else if($this->perhasta=='11')
			{
				$this->meshasta='Noviembre';
			}
			else if($this->perhasta=='12')
			{
				$this->meshasta='Diciembre';
			}

			$bb=$this->bd->select("SELECT COALESCE(SUM(A.MONMOV),0) as adis FROM CPMOVADI A, CPADIDIS B
  									WHERE B.ADIDIS='a' AND
        							A.REFADI=B.REFADI AND
        							A.PERPRE>='00' AND
        							A.PERPRE<='".$this->perhasta."' AND
       								A.CODPRE LIKE '".$this->comodin."' AND
        							(B.STAADI='a' OR (B.STAADI='n' AND SUBSTR(TO_CHAR(B.FECANU,'DD-MM-YYYY'),4,2)>'".$this->perhasta."'))");
			if(!$bb->EOF)
			{
				$this->adis=$bb->fields["adis"];
			}
			$bc=$this->bd->select("SELECT COALESCE(SUM(A.MONMOV),0) as dis FROM CPMOVADI A, CPADIDIS B
  									WHERE B.ADIDIS='d' AND
        							A.REFADI=B.REFADI AND
        							A.PERPRE>='00' AND
        							A.PERPRE<='".$this->perhasta."' AND
       								A.CODPRE LIKE '".$this->comodin."' AND
        							(B.STAADI='a' OR (B.STAADI='n' AND SUBSTR(TO_CHAR(B.FECANU,'DD-MM-YYYY'),4,2)>'".$this->perhasta."'))");
			if(!$bc->EOF)
			{
				$this->dism=$bc->fields["dis"];
			}
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			//$this->cell(14,-10,'Año:'.$this->anno);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(9000,10,$this->sql);
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tr=$this->bd->select($this->sql);
			if($this->grupo=="PROGRAMA")
			{
				$ref="01";
			}
			else if($this->grupo=="ACTIVIDAD")
			{
				$ref="01-01";
			}
			$temp="";
			$temporal="";
			$montoacu=0;
			$monpro=0;
			$montotal=0;
			$total=0;
			$montomod=0;
			$montomodpro=0;
			$montomodtotal=0;
			$montoact=0;
			$montoactpro=0;
			$montoactotal=0;
			$referencia="401";
			while(!$tr->EOF)
			{
			 if($tr->fields["programa"]==$ref)
			 {
			  if($tr->fields["partida"]==$referencia)
			   {
				$this->setFont("Arial","",8);
				$this->SetAutoPageBreak(false);
				$this->cell($this->anchos[0],10,$tr->fields["codpre"]);
				$this->cell(108,10,substr($tr->fields["nompre"],0,105));
				$this->cell($this->anchos[2],10,number_format($tr->fields["montasig"],2,',','.'),0,0,"R");
				$this->cell($this->anchos[3],10,number_format($tr->fields["monadi"]-$tr->fields["monadi"],2,',','.'),0,0,"R");
				$this->cell($this->anchos[3],10,number_format($tr->fields["montasig"],2,',','.'),0,0,"R");
				$montoacu=$montoacu+$tr->fields["montasig"];
				$monpro=$monpro+$tr->fields["montasig"];
				$montotal=$montotal+$tr->fields["montasig"];
				$montomod=$montomod+($tr->fields["monadi"]-$tr->fields["monadi"]);
				$montomodpro=$montomodpro+($tr->fields["monadi"]-$tr->fields["monadi"]);
				$montomodtotal=$montomodtotal+($tr->fields["monadi"]-$tr->fields["monadi"]);
				$montoact=$montoact+($tr->fields["montasig"]);
				$montoactpro=$montoactpro+($tr->fields["montasig"]);
				$montoactotal=$montoactotal+($tr->fields["montasig"]);
				$this->ln(3);
				$this->SetAutoPageBreak(true);
				$temp=$referencia;
				$ok=true;
			   }
			   else
			   {
			    $referencia=$tr->fields["partida"];
				if($referencia!=$temp && $ok==true)
				{
					$totasig=0;
					$totasig=$montoacu;
					$montoacu=0;
					$totmod=0;
					$totmod=$montomod;
					$montomod=0;
					$totact=0;
					$totact=$montoact;
					$montoact=0;
					$this->ln(4);
					$this->setFont("Arial","B",9);
					$this->Line(10,$this->getY(),270,$this->getY());
					$this->cell($this->anchos[0],5,' Total Por Partida');
					$this->cell(108,5,'');
					$this->cell($this->anchos[2],5,number_format($totasig,2,'.',','),0,0,"R");
					$this->cell($this->anchos[3],5,number_format($totmod,2,'.',','),0,0,"R");
					$this->cell($this->anchos[4],5,number_format($totact,2,'.',','),0,0,"R");
					$this->Line(10,$this->getY()+5,270,$this->getY()+5);
					$this->ln(3);
				}
			   }
			   $temporal=$ref;
			   $tr->MoveNext();
			   if ($this->GetY()>=170){
			   		$this->AddPage();
			   }
			  }
			  else
			  {
				$ref=$tr->fields["programa"];
				if($ref!=$temporal)
				{
					$totasig=0;
					$totasig=$montoacu;
					$montoacu=0;
					$totmod=0;
					$totmod=$montomod;
					$montomod=0;
					$totact=0;
					$totact=$montoact;
					$montoact=0;
					$this->ln(4);
					$this->setFont("Arial","B",9);
					$this->Line(10,$this->getY(),270,$this->getY());
					$this->cell($this->anchos[0],5,' Total Por Partida');
					$this->cell(108,5,'');
					$this->cell($this->anchos[2],5,number_format($totasig,2,'.',','),0,0,"R");
					$this->cell($this->anchos[3],5,number_format($totmod,2,'.',','),0,0,"R");
					$this->cell($this->anchos[4],5,number_format($totact,2,'.',','),0,0,"R");
					$this->Line(10,$this->getY()+5,270,$this->getY()+5);
					//$this->ln(2);
					$total=0;
					$total=$monpro;
					$monpro=0;
					$totalmod=0;
					$totalmod=$montomodpro;
					$montomodpro;
					$totalact=0;
					$totalact=$montoactpro;
					$montoactpro=0;
					$this->ln(5);
					$this->setFont("Arial","B",9);
					$this->Line(10,$this->getY(),270,$this->getY());
					$this->cell($this->anchos[0],5,' Total Por '.$this->grupo);
					$this->cell(108,5,'');
					$this->cell($this->anchos[2],5,number_format($total,2,'.',','),0,0,"R");
					$this->cell($this->anchos[3],5,number_format($totalmod,2,'.',','),0,0,"R");
					$this->cell($this->anchos[4],5,number_format($totalact,2,'.',','),0,0,"R");
					$this->Line(10,$this->getY()+5,270,$this->getY()+5);
					//$temp=$referencia;
					$ok=false;
					$this->ln(5);
				}
			  }
			}
			$this->ln(4);
			$this->setFont("Arial","B",9);
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->cell($this->anchos[0],5,' Total Por Partida');
			$this->cell(108,5,'');
			$this->cell($this->anchos[2],5,number_format($montoacu,2,'.',','),0,0,"R");
			$this->cell($this->anchos[3],5,number_format($montomod,2,'.',','),0,0,"R");
			$this->cell($this->anchos[4],5,number_format($montoact,2,'.',','),0,0,"R");
			$this->Line(10,$this->getY()+5,270,$this->getY()+5);
			$this->ln(8);
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->cell($this->anchos[0],5,' TOTAL POR PROGRAMA');
			$this->cell($this->anchos[1],5,'');
			$this->cell($this->anchos[2],5,number_format($montotal,2,'.',','),0,0,"R");
			$this->cell($this->anchos[3],5,number_format($montomodtotal,2,'.',','),0,0,"R");
			$this->cell($this->anchos[4],5,number_format($montoactotal,2,'.',','),0,0,"R");
			$this->bd->closed();
		}
	}
?>