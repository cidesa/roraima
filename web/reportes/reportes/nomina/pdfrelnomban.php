<?
	require_once("../../lib/general/fpdf/fpdf.php");
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
		var $sql;
		var $tipnomdes;
		var $tipnomhas;
		var $archivo;
		var $bancos;
		var $gendis;
		var $numcuenta;
		var $fechaefectiva;
		var $formato;
		var $nombresolic;
		var $numctasol;
		var $tipo;
		var $cf_banco;
		var $elrif="G200005742";

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
			$this->tipnomhas=$_POST["tipnomhas"];
			$this->bancos=$_POST["bancos"];
			$this->gendis=$_POST["gendis"];
			$this->numcuenta="00070001110000104806";//$_POST["numcuenta"];
			$this->fechaefectiva=$_POST["fechaefectiva"];
			$this->formato=$_POST["formato"];
			$this->nombresolic=$_POST["nombresolic"];
			$this->numctasol=$_POST["numctasol"];
			$this->tipo=$_POST["tipo"];
			$this->archivo=$_POST["archivo"];
            $this->especial = $_POST["especial"];
              $this->tipnomesp1=$_POST["tipnomesp"];


              if ($this->especial == 'S')
            {
                $especial = " g.especial = 'S' AND
                              (g.CODNOMESP) = TRIM('".$this->tipnomesp1."') AND";
             }
            else
            {  if ($this->especial == 'N')           $especial = " g.especial = 'N' AND";
            }


/*
 *SQL para crear el cursor
 */

/*			$this->sql_cursor="SELECT A.NACEMP,
		       SUBSTR(A.CODEMP,2,8) as CODEMP,
		       A.cedemp,
		       A.FECNAC,A.NOMEMP,
		       A.NUMCUE as cuenta_banco,
		       A.TIPCUE,
		       COALESCE(B.MONTONOMINA,0) as monto,
		       B.CODNOM
			FROM
			   NPHOJINT A,
			   NPASICAREMP B,
			   NPCARGOS C,
			   NPBANCOS D
			WHERE
			   trim(B.CODNOM)=trim('".$this->tipnomdes."')  AND
			   A.CODBAN=D.CODBAN AND
			   B.CODEMP = A.CODEMP AND
			   B.CODCAR=C.CODCAR AND
			   STATUS='V' AND
			   A.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S') AND
			   MONTONOMINA>0
			   AND RTRIM(COALESCE(A.NUMCUE,' '))<>''
			GROUP BY B.CODNOM,D.CODBAN,A.CEDEMP,A.CODEMP,SUBSTR(A.CODEMP,2,8),A.NOMEMP,B.CODCAR,C.NOMCAR,A.NUMCUE,A.TIPCUE,A.NACEMP,A.FECNAC,MONTONOMINA
			ORDER BY TRIM(A.CODEMP)";
*/
			$this->sql="SELECT
							distinct C.CODEMP as codemp,
							B.CODNOM,
							to_char(C.FECRET,'dd/mm/yyyy') as fecret,
							C.NOMEMP as nomemp,
							to_char(C.FECING,'dd/mm/yyyy') as fecing,
							C.NUMCUE as CUENTA_BANCO,
							B.CODCAT as CODCAT,
							D.nomcat as nomcat,
							C.CEDEMP as cedemp,
							LTRIM(RTRIM(B.CODCAR)) as CODCAR,
							B.NOMCAR as nomcar,
							(CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
							G.CODCAR as codcargo,
							G.CODCON as codcon,
							LTRIM(RTRIM(G.NOMCON)) AS NOMCON,
							(CASE WHEN G.ASIDED='A' THEN coalesce(G.SALDO,0) ELSE 0 END) as ASIGNA,
							(CASE WHEN G.ASIDED='D' THEN coalesce(G.SALDO,0) ELSE 0 END) as DEDUC,
							(CASE WHEN G.ASIDED='P' THEN coalesce(G.SALDO,0) ELSE 0 END) as APORTE
						FROM
							NPHOJINT C,
							NPASICAREMP B,
							NPCATPRE D,
							NPNOMCAL G,
							NPDEFCPT H
						WHERE
							TRIM(B.CODNOM) = TRIM('".$this->tipnomdes."') AND".$especial."
							D.CODCAT=B.CODCAT AND
							B.CODEMP=C.CODEMP AND
							B.STATUS='V' AND
							G.CODCON=H.CODCON AND H.IMPCPT='S' AND
							TRIM(G.CODNOM) = TRIM('".$this->tipnomdes."') AND
							rtrim(G.CODCAR)=rtrim(B.CODCAR) AND
							G.CODEMP=C.CODEMP
						ORDER BY
							B.CODNOM";


            //print "<pre>".$this->sql."</pre>";exit;
			$this->cab=new cabecera();

		}

		function PutLink($URL,$txt)
		{
		    //Escribir un hiper-enlace
		    $this->SetTextColor(0,0,255);
		    $this->SetStyle('U',true);
		    $this->Write(5,$txt,$URL);
		    $this->SetStyle('U',false);
		    $this->SetTextColor(0);
		}

		function SetStyle($tag,$enable)
		{
		    //Modificar estilo y escoger la fuente correspondiente
		    $this->$tag+=($enable ? 1 : -1);
		    $style='';
		    foreach(array('B','I','U') as $s)
		        if($this->$s>0)
		            $style.=$s;
		    $this->SetFont('',$style);
		}

		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);
			$this->Ln(1);
			$per = $this->bd->select("select to_char(ultfec,'dd/mm/yyyy') as ultfec, to_char(profec,'dd/mm/yyyy') as profec from npnomina where TRIM(CODNOM) = TRIM('".$this->tipnomdes."')");
			$this->Cell(30,5,"Periodo del: ".$per->fields["ultfec"]." al ".$per->fields["profec"]);
			$this->Ln(8);
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->Cell(20,5,"No. Nomina",0,0,'C');
			$this->Cell(20,5,"Cédula",0,0,'C');
			$this->Cell(60,5,"Apellidos y Nombres");
			$this->Cell(10);
			$this->Cell(30,5,"No. de Cuenta");
			$this->Cell(20);
			$this->Cell(30,5,"Monto");
			$this->Ln(7);
			$this->Line(10,$this->GetY()-2,200,$this->GetY()-2);
		}
		function Cuerpo()
		{
			$canreg=0;
			$contador=0;
			$eltotal=0;


			$tbg=$this->bd->select($this->sql);
			while(!$tbg->EOF)
			{
				$this->SetTextColor(0,0,128);
				$cedemp= 1 * trim( $tbg->fields["cedemp"] );
				$nomemp=strtoupper(trim($tbg->fields["nomemp"]));
				//$rc = $this->bd->select("select cuenta_banco as cuenta from npempleados_banco where trim(codemp) = trim('".$tbg->fields["codemp"]."')");
				//$cuenta_banco=strtoupper($rc->fields["cuenta"]);
				$this->Cell(20,5,strtoupper($tbg->fields["codnom"]),0,0,'C');
				$this->Cell(20,5,strtoupper($tbg->fields["cedemp"]),0,0,'C');
				$x = $this->GetX();
				$this->Cell(60);
				$this->Cell(10);
				$this->Cell(30,5,$tbg->fields["cuenta_banco"]);
				//$this->Cell(20);
				$monto=0;
				$empleado=$tbg->fields["codemp"];
				//$this->ln();
				while(!$tbg->EOF  and $empleado==$tbg->fields["codemp"])
				{
					if($tbg->fields["deduc"]==0 and $tbg->fields["aporte"]==0)
					{
						$monto+=$tbg->fields["asigna"];
					}
					if($tbg->fields["asigna"]==0 and $tbg->fields["aporte"]==0)
					{
						$monto-=$tbg->fields["deduc"];
					}
					// $this->cell(100,5,"asigna: ".$tbg->fields["asigna"]." --- deduc: ".$tbg->fields["deduc"],1,1);
					$tbg->MoveNext();
				}
				//$monto=strtoupper($monto);
				$this->Cell(30,5,number_format(trim($monto),2,',','.'),0,0,'R');
				$this->SetX($x);
				$this->MultiCell(60,5,strtoupper($nomemp));
				//$this->Line(10,$this->GetY(),200,$this->GetY());
				$canreg++;
				$eltotal+=$monto;
			}
			/*
			$this->Ln(5);
			$this->Line(10,$this->GetY()-5,206,$this->GetY()-5);
			$this->Cell(190,5,"Total Cuentas de Ahorro:     ".number_format(trim($eltotal),2,',','.'),0,0,'R');
			$this->Ln(5);
			$this->Cell(190,5,"Total Agencia:     ".number_format(trim($eltotal),2,',','.'),0,0,'R');
			$this->Ln(5);
			$this->Cell(190,5,"Total Rango:     ".number_format(trim($eltotal),2,',','.'),0,0,'R');
			*/
			$this->Ln(3);
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->Ln(3);
			$this->Cell(190,5,"Total General:     ".number_format(trim($eltotal),2,',','.'),0,0,'R');
		}
			//exit;

	}
?>