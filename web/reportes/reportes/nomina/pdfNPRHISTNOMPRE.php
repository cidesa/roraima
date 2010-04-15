<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $sql3;
		var $sql4;
		var $sql5;
		var $rep;
		var $numero;
		var $cab;
		var $tipnomdes;
		var $empdes;
		var $emphas;
		var $cardes;
		var $carhas;
		var $condes;
		var $conhas;
		var $rev;
		var $aut;
		var $elab;
              var $especial;




		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->condes=$_POST["condes"];
			$this->conhas=$_POST["conhas"];
			$this->especial=$_POST["especial"];
			$this->codnomesp1=$_POST["codnomesp1"];
			$this->codnomesp2=$_POST["codnomesp2"];
			$this->loncodpre=H::longitudcampo('codpre');
			 $this->fechades=$_POST["fechades"];
	  $this->fechahas=$_POST["fechahas"];
	   $this->tipnomesp=$_POST["tipnomesp"];

	       if ($this->especial == 'S')
            {
                $especial = " a.especial = 'S' AND
                             (A.CODNOMESP) = TRIM('".$this->tipnomesp1."') AND ";
             }
            else
            {  if ($this->especial == 'N')           $especial = " a.especial = 'N' AND";
            }

	  /*and
						      a.fecnomdes>=to_date('".$this->fechades."','dd/mm/yyyy') and
							  a.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy') and*/

			$this->sql="SELECT distinct A.CODPRE,b.nompre,A.ASIGNA as ASIGNA,A.DEDUCI as DEDUCI, A.APORTE as APORTE,a.codtipgas,a.destipgas FROM
		        (
		        SELECT (TRIM(B.CODCAT)||'-'||TRIM(C.CODPAR)) as CODPRE,
		        a.codnom as codnom,
		        SUM(case when C.OPECON = 'A' then A.MONTO else 0 end) as ASIGNA,
		        SUM(case when C.OPECON = 'D' then A.MONTO else 0 end ) as DEDUCI,
		        SUM(case when C.OPECON = 'P' then A.MONTO else 0 end) as APORTE,
		        b.codtipgas,d.destipgas
		        FROM NPHISCON A,NPASICAREMP B,NPDEFCPT C,nptipgas d
		        WHERE
		        A.CODNOM = ('".$this->tipnomdes."') AND
		        trim(A.CODCON) >= trim('".$this->condes."') AND
		        trim(A.CODCON) <= trim('".$this->conhas."') AND   A.CODCON<>trim('006') and
		        trim(B.CODEMP)=trim(A.CODEMP) AND
		        trim(B.CODCAR)=trim(A.CODCAR) AND ".$especial."
                a.fecnomdes>=to_date('".$this->fechades."','dd/mm/yyyy') and
				a.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy') and
		        B.CODNOM=A.CODNOM AND
		        B.CODTIPGAS=D.CODTIPGAS AND
		        C.CODCON=A.CODCON AND
		        B.STATUS='V' AND
		        A.MONTO>0 AND
		        A.CODCON NOT IN (SELECT CODCON FROM npconceptoscategoria) and
                A.CODCON NOT IN (SELECT CODCON FROM npasiparcon)
		        GROUP BY  (TRIM(B.CODCAT)||'-'||TRIM(C.CODPAR)),a.codnom,b.codtipgas,d.destipgas
		        UNION
		        SELECT trim(RTRIM(D.CODCAT)||'-'||RTRIM(C.CODPAR)) as CODPRE,
		        a.codnom as codnom,
		        SUM(case when C.OPECON='A' then A.MONTO else 0 end) as ASIGNA,
		        SUM(case when C.OPECON='D' then A.MONTO else 0 end) as DEDUCI,
		        SUM(case when C.OPECON='P' then A.MONTO else 0 end) as APORTE,
		        b.codtipgas,e.destipgas
                FROM NPHISCON A,NPASICAREMP B,NPDEFCPT C, npconceptoscategoria D, nptipgas e
                WHERE
                a.codcon=d.codcon and
		        A.CODNOM = ('".$this->tipnomdes."') AND
		        trim(A.CODCON) >= trim('".$this->condes."') AND
		        trim(A.CODCON) <= trim('".$this->conhas."') AND   A.CODCON<>trim('006') and
		        trim(B.CODEMP)=trim(A.CODEMP) AND
		        trim(B.CODCAR)=trim(A.CODCAR) AND ".$especial."
                a.fecnomdes>=to_date('".$this->fechades."','dd/mm/yyyy') and
			    a.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy') and
		        B.CODNOM=A.CODNOM AND
		        B.CODTIPGAS=E.CODTIPGAS AND
		        C.CODCON=A.CODCON AND
		        B.STATUS='V' AND
		        A.MONTO>0
		        GROUP BY trim(RTRIM(D.CODCAT)||'-'||RTRIM(C.CODPAR)),a.codnom,b.codtipgas,e.destipgas
				UNION
				SELECT trim(RTRIM(B.CODCAT)||'-'||RTRIM(D.CODPar)) as CODPRE,
				a.codnom as codnom,
				SUM(case when C.OPECON='A' then A.MONTO else 0 end) as ASIGNA,
				SUM(case when C.OPECON='D' then A.MONTO else 0 end) as DEDUCI,
				SUM(case when C.OPECON='P' then A.MONTO else 0 end) as APORTE,
				b.codtipgas,e.destipgas
				FROM NPHISCON A,NPASICAREMP B,NPDEFCPT C, npasiparcon D, nptipgas E
				WHERE
				a.codnom=d.codnom and
				a.codcon=d.codcon and
				a.codcar=d.codcar and   A.CODCON<>trim('006') and
				A.CODNOM = ('".$this->tipnomdes."') AND
				trim(B.CODEMP)=trim(A.CODEMP) AND
				trim(B.CODCAR)=trim(A.CODCAR) AND ".$especial."
				a.fecnomdes>=to_date('".$this->fechades."','dd/mm/yyyy') and
				a.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy') and
				B.CODNOM=A.CODNOM AND
				B.CODTIPGAS=E.CODTIPGAS AND
				C.CODCON=A.CODCON AND
				B.STATUS='V' AND
				A.MONTO>0
				GROUP BY trim(RTRIM(B.CODCAT)||'-'||RTRIM(D.CODPar)),a.codnom,b.codtipgas,e.destipgas
		        ) A left outer join  CPDEFTIT B on (trim(A.CODPRE)=trim(B.CODPRE))  left outer join CONTABB C  on (trim(B.CODCTA)=trim(C.CODCTA))
		         where
		         (a.asigna>0 OR A.APORTE>0) AND
		         a.codpre is not null
		         order by a.codtipgas,a.codpre";
 //print '<pre>'; print $this->sql;exit;


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,30);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Presupuestario";
				$this->titulos[1]="                                             Descripcion                 ";
				$this->titulos[2]="                                  Asignación";
				$this->titulos[3]="                                  Deduccion";
				$this->titulos[4]="                                      Aporte";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->SetTextColor(0,0,128);
			//-----------------------sql2--------------------------
			 $this->sql2="SELECT DISTINCT(nomnom) as nombre FROM NPHISCON WHERE codnom='".$this->tipnomdes."'";
			 $tb2b=$this->bd->select($this->sql2);
			 $this->cell(45,5,"Nómina: ".$this->tipnomdes." - ".strtoupper($tb2b->fields["nombre"]));
			//-----------------------fin--------------------------
			$this->ln();
			//-----------------------sql3--------------------------
 			$this->sql3="SELECT to_char(ULTFEC,'DD/MM/YYYY') as fecha FROM NPNOMINA WHERE CODNOM='".$this->tipnomdes."'";
			 $tb2c=$this->bd->select($this->sql3);
			// print $this->sql3;
			 $this->cell(45,5,"Desde: ".$this->fechades);
			//-----------------------fin--------------------------
			//-----------------------sql4--------------------------
			 $this->sql4="SELECT to_char(PROFEC,'DD/MM/YYYY') as fecha2 FROM NPNOMINA WHERE CODNOM='".$this->tipnomdes."'";
			 $tb2d=$this->bd->select($this->sql4);
			 //print $this->sql4;
			 $this->cell(45,5,"Hasta: ".$this->fechahas);
			//-----------------------fin--------------------------
			$this->ln();
			$this->SetTextColor(0,0,0);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->Line(10,48,200,48);
			$this->SetLineWidth(0.5);
			$this->Line(10,55,200,55);
		}


		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		//    print $this->sql;
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$reftip=trim($tb->fields["codtipgas"]);
			$refcat=substr($tb->fields["codpre"],0,8);

			$acum1cat=0;
			$acum2cat=0;
			$acum3cat=0;
			$acum1tip=0;
			$acum2tip=0;
			$acum3tip=0;
			$acum1gen=0;
			$acum2gen=0;
			$acum3gen=0;
			if(!$tb->EOF)
			{
				$this->sql5="SELECT NOMPRE as nombre FROM CPDEFTIT
				WHERE trim(CODPRE) = trim('".$refcat."')";
				$this->MCplus(180,6,'TIPO GASTOS: '.$tb->fields["codtipgas"]." - ".$tb->fields["destipgas"]);
				$this->sql5="SELECT NOMPRE as nombre FROM CPDEFTIT
				WHERE trim(CODPRE) = trim('".$refcat."')";
			     $tb2e=$this->bd->select($this->sql5);
				$this->MCplus(180,6,($refcat)."  ".strtoupper($tb2e->fields["nombre"]));
			}
			while(!$tb->EOF)
			{
				if($reftip!=trim($tb->fields["codtipgas"]))
				{
					//TOTALES
					$this->SetAutoPageBreak(false);
					$this->SetLineWidth(0.5);
	  			    $this->Line(119,$this->GetY(),200,$this->GetY());
					$this->SetLineWidth(0.2);
					$this->setFont("Arial","B",8);
					$this->ln(1);
				    $this->cell($this->anchos[0],7," ");
				    $this->cell($this->anchos[1],7,"                               TOTALES  CATEGORIA:         ");
					$this->cell($this->anchos[2],7,"");
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum1cat),0,0,'R');
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum2cat),0,0,'R');
					$this->cell($this->anchos[3],7,"".H::FormatoMonto($acum3cat),0,0,'R');
					$this->ln(4);
					$acum1cat=0;
				 	$acum2cat=0;
				 	$acum3cat=0;
				 	//GASTOS
					$this->SetLineWidth(0.5);
	  			    $this->Line(119,$this->GetY()+5,200,$this->GetY()+5);
					$this->SetLineWidth(0.2);
					$this->setFont("Arial","B",8);
					$this->ln(4);
				    $this->cell($this->anchos[0],7," ");
				    $this->cell($this->anchos[1],7,"                        TOTALES  POR TIPO GASTO:         ");
					$this->cell($this->anchos[2],7,"");
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum1tip),0,0,'R');
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum2tip),0,0,'R');
					$this->cell($this->anchos[3],7,"".H::FormatoMonto($acum3tip),0,0,'R');
					$this->SetAutoPageBreak(true,30);
					///////////
					$acum1tip=0;
				 	$acum2tip=0;
				 	$acum3tip=0;
					$this->ln(6);
					$this->MCplus(180,6,'TIPO GASTOS: '.$tb->fields["codtipgas"]." - ".$tb->fields["destipgas"]);
					$this->ln(2);
					$this->ln(6);
					$this->sql5="SELECT NOMPRE as nombre FROM CPDEFTIT
					WHERE trim(CODPRE) = trim('".substr($tb->fields["codpre"],0,8)."')";
				     $tb2e=$this->bd->select($this->sql5);
					$this->MCplus(180,6,(substr($tb->fields["codpre"],0,8))."  ".strtoupper($tb2e->fields["nombre"]));
					$this->ln(4);
				}elseif($refcat!=substr($tb->fields["codpre"],0,8)  )
				{
				    //TOTALES
					$this->SetAutoPageBreak(false);
					$this->SetLineWidth(0.5);
	  			    $this->Line(119,$this->GetY(),200,$this->GetY());
					$this->SetLineWidth(0.2);
					$this->setFont("Arial","B",8);
					$this->ln(4);
				    $this->cell($this->anchos[0],7," ");
				    $this->cell($this->anchos[1],7,"                               TOTALES  CATEGORIA:         ");
					$this->cell($this->anchos[2],7,"");
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum1cat),0,0,'R');
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum2cat),0,0,'R');
					$this->cell($this->anchos[3],7,"".H::FormatoMonto($acum3cat),0,0,'R');
					$this->SetAutoPageBreak(true,30);
					//////////
					$acum1cat=0;
				 	$acum2cat=0;
				 	$acum3cat=0;
					$this->ln(6);
					$this->sql5="SELECT NOMPRE as nombre FROM CPDEFTIT
					WHERE trim(CODPRE) = trim('".substr($tb->fields["codpre"],0,8)."')";
				     $tb2e=$this->bd->select($this->sql5);
					$this->MCplus(180,6,(substr($tb->fields["codpre"],0,8))."  ".strtoupper($tb2e->fields["nombre"]));
					$this->ln(4);
				}
				 $this->setFont("Arial","",8);
				 $this->cell($this->anchos[0],7,$tb->fields["codpre"]);
  	 		//	 print $tb->fields["codpar"];

				/* $this->sql5="SELECT NOMPRE as nombre FROM CPDEFTIT
				WHERE RTRIM(CODPRE)=RTRIM('".$tb->fields["codpre"]."')";
			     $tb2e=$this->bd->select($this->sql5);*/
			     //print $this->sql5;
			     $this->setX(150);
			     //$this->total=($tb->fields["asigna"]-$tb->fields["deduci"]);
			     $this->total=($tb->fields["asigna"])+($tb->fields["aporte"]);
			//	 $this->cell($this->anchos[2],7,"".H::FormatoMonto($this->total),0,0,'R');
				 $this->cell($this->anchos[2],7,H::FormatoMonto($tb->fields["asigna"]));
				 $this->cell($this->anchos[3],7,H::FormatoMonto($tb->fields["deduci"]));
		    	 $this->cell($this->anchos[4],7,H::FormatoMonto($tb->fields["aporte"]));
				 $this->setX(70);
				 $this->Multicell($this->anchos[1],4,strtoupper($tb->fields["nompre"]),0,'L',0);

				 $this->acum1=($this->acum1+$tb->fields["asigna"]);
				 $this->acum2=($this->acum2+$tb->fields["deduci"]);
				 $acum1cat+=$tb->fields["asigna"];
				 $acum2cat+=$tb->fields["deduci"];
				 $acum3cat+=$tb->fields["aporte"];
				 $acum1tip+=$tb->fields["asigna"];
				 $acum2tip+=$tb->fields["deduci"];
				 $acum3tip+=$tb->fields["aporte"];
				 $acum1gen+=$tb->fields["asigna"];
				 $acum2gen+=$tb->fields["deduci"];
				 $acum3gen+=$tb->fields["aporte"];
				 $this->acum3=($this->acum3+$tb->fields["aporte"]);
				 $this->ln(5);
				 $reftip=trim($tb->fields["codtipgas"]);
				 $refcat=substr($tb->fields["codpre"],0,8);
				$tb->MoveNext();
				}
				$this->SetAutoPageBreak(false);
					$this->SetLineWidth(0.5);
	  			    $this->Line(119,$this->GetY(),200,$this->GetY());
					$this->SetLineWidth(0.2);
					$this->setFont("Arial","B",8);
					$this->ln(4);
				    $this->cell($this->anchos[0],7," ");
				    $this->cell($this->anchos[1],7,"                               TOTALES  CATEGORIA:         ");
					$this->cell($this->anchos[2],7,"");
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum1cat),0,0,'R');
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum2cat),0,0,'R');
					$this->cell($this->anchos[3],7,"".H::FormatoMonto($acum3cat),0,0,'R');


				$this->ln(6);
				$this->SetLineWidth(0.5);
	  			    $this->Line(119,$this->GetY(),200,$this->GetY());
					$this->SetLineWidth(0.2);
					$this->setFont("Arial","B",8);
					$this->ln(4);
				    $this->cell($this->anchos[0],7," ");
				    $this->cell($this->anchos[1],7,"                        TOTALES  POR TIPO GASTO:         ");
					$this->cell($this->anchos[2],7,"");
				    $this->cell($this->anchos[2],7,"".H::FormatoMonto($acum1tip),0,0,'R');
					$this->cell($this->anchos[2],7,"".H::FormatoMonto($acum2tip),0,0,'R');
					$this->cell($this->anchos[3],7,"".H::FormatoMonto($acum3tip),0,0,'R');

				$this->ln(6);
				$this->SetLineWidth(0.5);
  			    $this->Line(119,$this->GetY(),200,$this->GetY());
				$this->SetLineWidth(0.2);
				$this->ln(4);
				$this->setFont("Arial","B",8);
			    $this->cell($this->anchos[0],7," ");
			    $this->cell($this->anchos[1],7,"                             TOTALES   GENERALES        ");
				$this->cell($this->anchos[2],7,"");
				$this->cell($this->anchos[2],7,"".H::FormatoMonto($this->acum1),0,0,'R');
				$this->cell($this->anchos[2],7,"".H::FormatoMonto($this->acum2),0,0,'R');
				$this->cell($this->anchos[3],7,"".H::FormatoMonto($this->acum3),0,0,'R');

			/*	 $this->ln(30);
				 $this->Line(15,$this->GetY(),65,$this->GetY());
				 $this->Line(80,$this->GetY(),130,$this->GetY());
				 $this->Line(145,$this->GetY(),195,$this->GetY());
				 $this->ln(5);
				 $this->setX(15);
				 $this->cell(50,5,$this->elab,0,0,'C');
				 $this->setX(80);
				 $this->cell(50,5,$this->rev,0,0,'C');
				 $this->setX(145);
				 $this->cell(50,5,$this->aut,0,0,'C');
				  $this->ln(5);
				 $this->setX(15);
				 $this->cell(50,5,"Elaborado",0,0,'C');
				 $this->setX(80);
				 $this->cell(50,5,"Revisado",0,0,'C');
				 $this->setX(145);
				 $this->cell(50,5,"Autorizado",0,0,'C');*/

			$this->bd->closed();
		}


	}
?>