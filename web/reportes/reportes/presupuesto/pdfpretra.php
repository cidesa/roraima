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
		var $ancho;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $reftra1;
		var $reftra2;
		var $fectra1;
		var $fectra2;
		var $pertra1;
		var $pertra2;
		var $stacom;
		var $codpre1;
		var $codpre2;
		var $comodin;
		var $acum_mon;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->arrp=array('no-vacio');
			$this->acum_mon=0;
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->ancho=array();
			$this->reftra1=H::GetPost("codtra1");
			$this->reftra2=H::GetPost("codtra2");
			$this->fectra1=H::GetPost("fectra1");
			$this->fectra2=H::GetPost("fectra2");
			$this->estado=H::GetPost("estado");
			$this->pertra1=H::GetPost("pertra1");
			$this->pertra2=H::GetPost("pertra2");
			$this->codpre1=H::GetPost("codpre1");
			$this->codpre2=H::GetPost("codpre2");
			$this->comodin=H::GetPost("comodin");

			  if
			($this->estado=="Activo")
				{
				$this->stacom="A";
				$t=" (A.STATRA='".$this->stacom."' OR (A.STATRA='N' AND A.FECANU>to_date('".$this->fectra2."','dd/mm/yyyy'))) AND";
				}
			elseif ($this->estado=="Anulado")
			{ 	$this->stacom="N";
				$t=" A.STATRA='".$this->stacom."'and A.FECANU <= to_date('".$this->fectra2."','dd/mm/yyyy') AND ";
			}

				$this->sql="SELECT A.PerTra as periodo,c.tipo,
							A.RefTra as referencia,
							to_char(A.FecTra,'dd/mm/yyyy') as fecha,
							a.statra,
							a.fecanu,
							(case when a.statra='A' then 'Activo' when a.statra='N' then 'Anulado' else '' end) as status2,
							RTRIM(A.DesTra) as destra ,
							RTRIM(B.CodOri ) as origen  ,
							RTRIM(B.CodDes ) as destino,
							B.MonMov as monto
							FROM cpsoltrasla C right outer join CPTRASLA  A on (a.reftra=c.reftra), CPMOVTRA B
						WHERE
							(A.REFTRA = B.REFTRA) AND
                 			(
								(
									b.CODORI >= ('".$this->codpre1."') AND
									b.CODORI <= ('".$this->codpre2."')
								)
							OR
								(
									b.CODDES >= ('".$this->codpre1."')    AND
									b.CODDES <= ('".$this->codpre2."')
								)
							)
							AND
                			(
								A.PERTRA >= '".$this->pertra1."' AND
								A.PERTRA <= '".$this->pertra2."'
							)
							AND
                			(
								A.REFTRA >= '".$this->reftra1."'  AND
								A.REFTRA <= '".$this->reftra2."'
							)
							AND
                			(
								A.FECTRA >= to_date('".$this->fectra1."','dd/mm/yyyy')  AND
								A.FECTRA <= to_date('".$this->fectra2."','dd/mm/yyyy')
							)
							AND
							".$t."
                			(  B.CODORI LIKE ('".$this->comodin."') ) ";
						//}

					//	print $this->sql;
			$this->llenartitulosmaestro();
			//$this->llenartitulosdetalle();
			$this->cab=new cabecera();
			$this->tb=$this->bd->select($this->sql);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="PERIODO";
				$this->titulos[1]="REFERENCIA";
				$this->titulos[2]="FECHA";
				$this->titulos[3]="DESCRIPCION";
				$this->anchos[0]=20;
				$this->anchos[1]=30;
				$this->anchos[2]=25;
				$this->anchos[3]=130;
				$this->anchos[4]=30;
				$this->anchos[5]=30;
				$this->anchos[6]=30;
				$this->anchos[7]=30;
				$this->anchos[8]=30;
				$this->anchos[9]=30;
				$this->anchos[10]=30;
				$this->anchos[11]=30;


		}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="Código Emisor";
				$this->titulos2[1]="Descripción";
				$this->titulos2[2]="Codigo Receptor";
				$this->titulos2[3]="Descripcion";
				$this->titulos2[4]="Monto";
				$this->ancho[0]=60;
				$this->ancho[1]=40;
				$this->ancho[2]=60;
				$this->ancho[3]=75;
				$this->ancho[4]=40;
				$this->ancho[5]=50;
		}

		function Header()
		{
			if($this->reftra1==$this->reftra2)
			{	$titulo=$this->tb->fields["tipo"];
				if(strtoupper($titulo)=='TRASLADO')
					$titulo="TRASPASO";
			}
			else
				$titulo=H::GetPost("titulo");

			$this->cab->poner_cabecera($this,strtoupper($titulo)." (".$this->estado."s)","l","s","n");
			$this->setFont("Arial","B",9);
			$this->cell(270,5,'Del '.$this->fectra1.' Al '.$this->fectra2,0,0,'C');
			$this->ln(4);
			$this->Line(10,$this->getY(),270,$this->getY());
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln(5);
			$this->cell(90,5,'Código Emisor');
			$this->cell(80,5,'Código Receptor');
			$this->ln(4);
			$this->cell(110,5,'							Denominación');
			$this->cell(110,5,'Denominación');
			$this->cell(30,5,'Monto');
			$this->ln(6);
			$this->Line(10,$this->getY(),270,$this->getY());
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(6);
		}
		function Cuerpo()
		{
		    $acun=0;
			$totacun=0;
			$tb=$this->tb;
			$tb2=$tb;
			$ref=" ";
			$cont=0;
			$cod="";
			if(!$tb->EOF)
			{
				 $this->setFont("Arial","B",8);
				 $this->cell($this->anchos[0],4,$tb2->fields["periodo"]);
				 $this->cell($this->anchos[1],4,$tb2->fields["referencia"]);
				 $this->cell($this->anchos[2],4,$tb2->fields["fecha"]);
				 $this->MultiCell($this->anchos[3],4,trim(strtoupper($tb2->fields["destra"])));
				 $ref=$tb2->fields["referencia"];
				 $this->ln(3);
			}
			while(!$tb->EOF)
			{
				if($tb->fields["referencia"]!=$ref)
				{
				 //totales
				 	$this->ln(2);
					$this->cell(110,5,'');
					$this->cell(110,5,'');
					$this->cell(30,5,'__________________');
					$this->ln(3);
					$this->cell(110);
					$x31 = $this->GetX();
					$this->cell(110);
					$this->cell(30,5,H::FormatoMonto($acun),0,0,'R');
					$this->SetX($x31);
					$this->MultiCell(80,3,'SUB-TOTAL ');
					$this->ln(3);
					$this->cell(110,5,'');
					$this->cell(110,5,'');
					$this->cell(30,5,'__________________');
					$this->ln(4);
					$this->cell(110);
					$x32 = $this->GetX();
					$this->cell(110);
					$this->cell(30,5,H::FormatoMonto($acun),0,0,'R');
					$this->SetX($x32);
					$this->MultiCell(80,3,'TOTAL '.$ref);
					$this->ln(2);
					$totacun=$totacun+$acun;
					$acun=0;
					$cont=0;
					$cod="";
					$this->Line(10,$this->getY(),270,$this->getY());
				 //
				 $this->ln(6);
				 $this->setFont("Arial","B",8);
				 $this->cell($this->anchos[0],4,$tb->fields["periodo"]);
				 $this->cell($this->anchos[1],4,$tb->fields["referencia"]);
				 $this->cell($this->anchos[2],4,$tb->fields["fecha"]);
				 $this->MultiCell($this->anchos[3],4,trim(strtoupper($tb->fields["destra"])));
				 $this->ln(3);
		        }
				$ref=$tb->fields["referencia"];
				$this->setFont("Arial","",8);
				//Detalle
				$cont=$cont+1;
				if($tb->fields["origen"]==$cod)
				{
					$this->cell(90);
					$this->cell(80,8,$tb->fields["destino"]);
					$this->ln(6);
					$s=$this->bd->select("SELECT NOMPRE as NOMBRE FROM CPDEFTIT WHERE CODPRE=('".$tb->fields["destino"]."')");
					if(!$s->EOF)
					{
						$nomdes=$s->fields["nombre"];
					}
					$this->SetX(230);
					$this->cell(30,3,H::FormatoMonto($tb->fields["monto"]),0,0,'R');
					$this->SetX(105);
					$this->MultiCell(85,3,trim(strtolower($nomdes)));
					$acun=$acun + $tb->fields["monto"];
				}
				else
				{
					$this->ln(3);
					$this->cell(90,8,$tb->fields["origen"]);
					$this->cell(90,8,$tb->fields["destino"]);
					$this->ln(6);
					$d=$this->bd->select("SELECT NOMPRE as NOMBRE FROM CPDEFTIT WHERE CODPRE=('".$tb->fields["origen"]."')");
					if(!$d->EOF)
					{
						$nomori=$d->fields["nombre"];
					}
					$s=$this->bd->select("SELECT NOMPRE as NOMBRE FROM CPDEFTIT WHERE CODPRE=('".$tb->fields["destino"]."')");
					if(!$s->EOF)
					{
						$nomdes=$s->fields["nombre"];
					}
					$y = $this->GetY();
					$this->SetX(230);
					$this->cell(30,3,H::FormatoMonto($tb->fields["monto"]),0,0,'R');
					$this->SetX(15);
					$this->MultiCell(85,3,trim(strtolower($nomori)));
					$this->SetY($y);
					$this->SetX(105);
					$this->MultiCell(85,3,trim(strtolower($nomdes)));
					$acun=$acun + $tb->fields["monto"];
				}
				$cod=$tb->fields["origen"];
				$tb->MoveNext();
			    //$this->ln(3);
				//$this->cell($this->ancho[5],8,H::FormatoMonto($this->acum_mon));
			}
				 //totales
				 	$this->ln(2);
					$this->cell(110,5,'');
					$this->cell(110,5,'');
					$this->cell(30,5,'__________________');
					$this->ln(3);
					$this->cell(110);
					$x31 = $this->GetX();
					$this->cell(110);
					$this->cell(30,5,H::FormatoMonto($acun),0,0,'R');
					$this->SetX($x31);
					$this->MultiCell(80,3,'SUB-TOTAL ');
					$this->ln(2);
					$this->cell(110,5,'');
					$this->cell(110,5,'');
					$this->cell(30,5,'__________________');
					$this->ln(4);
					$this->cell(110);
					$x32 = $this->GetX();
					$this->cell(110);
					$this->cell(30,5,H::FormatoMonto($acun),0,0,'R');
					$this->SetX($x32);
					$this->MultiCell(80,3,'TOTAL '.$ref);
					$this->ln(2);
					$totacun=$totacun+$acun;
					$acun=0;
					$this->setFont("Arial","B",8);
					$this->Line(10,$this->getY(),270,$this->getY());
					$this->cell(110,5,'');
					$this->cell(110,5,'TOTAL GENERAL');
					$this->cell(30,5,H::FormatoMonto($totacun),0,0,'R');
				 //
			$this->bd->closed();
		}
	}
?>