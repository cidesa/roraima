<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrconcil.class.php");

	class pdfreporte extends fpdf
	{
		var $i=0;

		function pdfreporte()
		{

			$this->elaborado=H::GetPost("elaborado");
			$this->revisado=H::GetPost("revisado");
			$this->aprobado=H::GetPost("aprobado");
			$this->fpdf("l","mm","Letter");
			$this->ctades=H::GetPost("ctades");
			$this->ctahas=$this->ctades;
			$this->bd = new basedatosado();
			$rscon=$this->bd->select("select mescon from tsconcil where numcue=('$this->ctades') limit 1");
			$this->mes=$rscon->fields["mescon"];
			//$this->mes=H::GetPost("mes");
			$this->tesore=H::GetPost("tesore");
			$this->concil=H::GetPost("concil");
			$this->sw=true;
			$this->swlib=false;
			$this->swban=false;
			$this->objTsrconcil = new Tsrconcil();
			$this->ano=$this->objTsrconcil->sqlano();
            //H::printR($this->ano);exit;
			$this->arrpb = $this->objTsrconcil->sqlpb($this->mes,$this->ano);
			//H::printR($this->arrpb);exit;
			$this->fecha=$this->arrpb[$this->i]["fecha"];

			$this->arrp = $this->objTsrconcil->sqlp($this->ctades,$this->ctahas,$this->fecha,$this->mes);

			if(empty($this->arrp))
				$this->arrp=array('no-vacio');

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->setAutoPageBreak(true,30);

		}
		function llenartitulosmaestro()
		{
				$this->titulosG[]="DETALLE";
				$this->titulosG[]="SEGUN LIBROS";
				$this->titulosG[]="SEGUN BANCOS";
				$this->titulos[]="TIPO";
				$this->titulos[]="FECHA";
				$this->titulos[]="REFERENCIA";
				$this->titulos[]="DESCRIPCION";
				$this->titulos[]="DEBE(+)";
				$this->titulos[]="HABER(-)";
				$this->titulos[]="DEBE(-)";
				$this->titulos[]="HABER(+)";
				$this->anchos=array(15,20,25,80,30,30,30,30);
				$this->aligns0=array("C","C","C","C","C","C","C","C");
				$this->aligns2=array("C","C","C","L","R","R","R","R");
		}

		function Saldos($arr)
		{
			if($this->mes=="01")
			{
				$mes="12";
				$ano=$this->ano-1;
			}else
			{
				$mes=$this->mes-1;
				$ano=$this->ano;
			}
			$fecant=H::periodo2($mes,$ano);
			if($this->mes=="01")
				$arrsaldos = $this->objTsrconcil->SQLsaldosenero($arr["numcue"]);
			else
				$arrsaldos = $this->objTsrconcil->SQLsaldos($arr["numcue"],$fecant);
			$bancos=$arrsaldos[$this->i]["salban"];
			$libros=$arrsaldos[$this->i]["sallib"];
			$arrerror= $this->objTsrconcil->SQLerror($arr["numcue"],$this->fecha);
			$this->error=$arrerror[$this->i]["debbanpos"]-$arrerror[$this->i]["crebanpos"];
			$this->fecant=date("d/m/Y",strtotime($fecant));
			if($bancos<0)
			{
				$bancosdeb=0;
				$bancoshab=$bancos;
				$this->bancosdeb=0;
				$this->bancoscre=$bancos;
			}
			else
			{
				$bancosdeb=$bancos;
				$bancoshab=0;
				$this->bancosdeb=$bancos;
				$this->bancoscre=0;
			}

			if($libros<0)
			{
				$librosdeb=$libros;
				$libroshab=0;
				$this->librosdeb=$libros;
				$this->libroscre=0;
			}
			else
			{
				$librosdeb=0;
				$libroshab=$libros;
				$this->librosdeb=0;
				$this->libroscre=$libros;
			}
			return array('SALDOS AL:  '.date("d/m/Y",strtotime($fecant)),H::FormatoMonto($libroshab),H::FormatoMonto($librosdeb),H::FormatoMonto($bancoshab),H::FormatoMonto($bancosdeb));
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo")."   Al:  ".$this->fecha,"l","s");
			$this->setFont("Arial","B",10);
			$this->settextcolor(0,0,155);
			/*if ($this->arrp[0]=='no-vacio')
			{*/
				$nomcue = $this->objTsrconcil->sqlcuenta($this->ctades);
				$this->MCplus(250,5,'BANCO:  '.$this->ctades);
				$this->MCplus(250,5,'CTA.CTE.N°.:  '.$nomcue);
				$this->settextcolor(0,0,0);
				$this->ln(2);
				if($this->arrp[$this->i]["result"]=='CONCILIADO')
					$this->MCplus(250,5,'MOVIMIENTOS CONCILIADOS');
				else
				{
					if($this->arrp[$this->i]["result"]=='MOVIMIENTO EN TRANSITO')
						$this->MCplus(250,5,'PARTIDAS NO CONCILIADAS EN BANCO');
					else
						$this->MCplus(250,5,'PARTIDAS NO CONCILIADAS EN LIBRO');
				}

			/*}else
			{
				$this->MCplus(250,5,'BANCO:  '.$this->arrp[$this->i]["desenl"]);
				$this->MCplus(250,5,'CTA.CTE.N°.:  '.$this->arrp[$this->i]["numcue"]);
			}*/

			$this->settextcolor(0,0,0);
			$this->ln(2);
			$this->setWidths(array(140,60,60));
			$this->setAligns(array("C","C","C"));
			$this->settextcolor(155,0,0);
			$this->row($this->titulosG);
			$this->ln(2);
			$this->setWidths($this->anchos);
			$this->setAligns($this->aligns0);
			$this->row($this->titulos);
			$this->settextcolor(0,0,0);
			$this->setAligns($this->aligns2);
			$this->setborder(true);
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY()-12,270,$this->GetY()-12);
			$this->Line(10,$this->GetY()+2,270,$this->GetY()+2);
			$this->SetLineWidth(0.2);
			$this->ln(4);
			$this->ln(3);

		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",9);
			if(!empty($this->arrp))
			{
				$arrsal = $this->Saldos($this->arrp[$this->i]);
				$this->setwidths(array(140,30,30,30,30));
				$this->setAligns(array("L","R","R","R","R"));
				$this->setborder(true);
				$this->settextcolor(155,0,0);
				$this->row($arrsal);
				$this->settextcolor(0,0,0);
				$this->setWidths($this->anchos);
				$this->setAligns($this->aligns2);
				$this->setborder(true);
				$this->ln(3);
			}

			$refcue=$this->arrp[$this->i]["numcue"];
			$refmov=$this->arrp[$this->i]["result"];
			$sum_ldeb=0;
			$sum_lcre=0;
			$sum_bdeb=0;
			$sum_bcre=0;
			$i=0;
			foreach($this->arrp as $arr)
			{
				if($refcue!=$arr["numcue"])
				{
					//TOTALES
					$this->setAutoPageBreak(false);
					$this->ln(6);
					$this->row(array("","","","SUB-TOTAL:",H::FormatoMonto($sum_bcre),H::FormatoMonto($sum_bdeb),H::FormatoMonto($sum_lcre),H::FormatoMonto($sum_ldeb)));
					$this->setAutoPageBreak(true,30);
					$sum_bcre=0;
					$sum_bdeb=0;
					$sum_lcre=0;
					$sum_ldeb=0;
					#$this->idefine(IND,$i-1);
					$this->AddPage();
					$this->setFont("Arial","B",9);
					$this->setwidths(array(140,30,30,30,30));
					$this->setAligns(array("L","R","R","R","R"));
					$bancosdeb=$this->bancosdeb;
					$bancoshab=$this->bancoscre;
					$librosdeb=$this->librosdeb;
					$libroshab=$this->libroscre;
					if($bancosdeb!=0)
						$ban1=H::FormatoMonto($bancosdeb);
					else
						$ban1="";
					if($bancoshab!=0)
						$ban2=H::FormatoMonto($bancoshab);
					else
						$ban2="";
					if($librosdeb!=0)
						$lib1=H::FormatoMonto($librosdeb);
					else
						$lib1="";
					if($libroshab!=0)
						$lib2=H::FormatoMonto($libroshab);
					else
						$lib2="";

					$this->settextcolor(155,0,0);
					$this->row(array('SALDOS AL:  '.$this->fecant,$lib2,$lib1,$ban2,$ban1));
					$this->settextcolor(0,0,0);
					$arrres= $this->objTsrconcil->SQLresumen($this->ctades,$this->ctahas,$this->fecha);
					$this->ln(4);
					$this->setwidths(array(140,30,30,30,30));
					$this->setAligns(array("L","R","R","R","R"));
					$tot_1=0;
					$tot_2=0;
					$tot_3=0;
					$tot_4=0;
					foreach($arrres as $det)
					{
						//$this->row(array($det["destip"],H::FormatoMonto($det["bancoscre"]),H::FormatoMonto($det["bancosdeb"]),H::FormatoMonto($det["libroscre"]),H::FormatoMonto($det["librosdeb"])));
						$tot_1+=$det["bancoscre"];
						$tot_2+=$det["bancosdeb"];
						$tot_3+=$det["libroscre"];
						$tot_4+=$det["librosdeb"];
					}
					$this->setAutoPageBreak(false);
					$this->ln(2);
					$this->Row(array('SUB- TOTAL: ',H::FormatoMonto($tot_1),H::FormatoMonto($tot_2),H::FormatoMonto($tot_3),H::FormatoMonto($tot_4)));
					$tot_ban=$tot_1-$tot_2;
					$tot_lib=$tot_4-$tot_3;
					$tot_1=0;
					$tot_2=0;
					$tot_3=0;
					$tot_4=0;
					$this->ln(5);
					$this->setFillColor(200,200,200);
					$this->MCplus(258,5,'RESUMEN',1,"C",1);
					$this->setWidths(array(65,65,65,65));
					$this->setAligns(array("C","R","C","R"));
					$this->setBorder(true);
					$this->setFillTable(1);
					$fec = split("/",$this->fecha);
					/*if($this->mes=="01")
						$asal = $this->objTsrconcil->SQLsaldosenero($arr["numcue"]);
					else*/
						$asal = $this->objTsrconcil->SQLsaldos($arr["numcue"],$fec[2]."-".$fec[1]."-".$fec[0]);
					$this->bancos= $asal[0]["sallib"];
					$this->libros= $asal[0]["salban"];
					$this->rowM(array('SALDOS LIBROS: ',H::FormatoMonto($this->bancos),'   SALDOS BANCOS:  ',H::FormatoMonto($this->libros)));
					$this->rowM(array('TOTAL TRANSITO LIBROS: ',H::FormatoMonto($tot_ban),'   TOTAL TRANSITO BANCOS:  ',H::FormatoMonto($tot_lib)));
					$this->rowM(array('TOTAL LIBROS: ',H::FormatoMonto($this->bancos+$tot_ban),'   TOTAL BANCOS:  ',H::Formatomonto($this->libros+$tot_lib)));
					$this->setWidths(array(140,120));
					$this->setAligns(array("C","C"));
					$this->setBorder(true);
					$this->setFillTable(1);
					$this->setJump(8);
					$this->rowM(array('',''));
					$this->rowM(array('DIFERENCIA:   ',H::FormatoMonto(($this->bancos+$tot_ban)-($this->libros+$tot_lib))));
					$this->ln(20);
					$this->line(45,$this->gety(),110,$this->gety());
					$this->line(170,$this->gety(),235,$this->gety());
					$this->setWidths(array(130,130));
					$this->setAligns(array("C","C"));
					$this->rowM(array($this->tesore,$this->concil));
					$this->rowM(array('TESORERA GENERAL DEL ESTADO (E)','CONCILIACIONES'));
					$this->setAutoPageBreak(true,30);
					#define('IND',$i);
					$this->AddPage();
					$this->setFont("Arial","B",9);
					$arrsal = $this->Saldos($this->arrp[$this->i]);
					$this->setwidths(array(140,30,30,30,30));
					$this->setAligns(array("L","R","R","R","R"));
					$this->settextcolor(155,0,0);
					$this->row($arrsal);
					$this->settextcolor(0,0,0);
					$this->setWidths($this->anchos);
					$this->setAligns($this->aligns2);
					$this->ln(3);

				}else
				{
					if($refmov!=$arr["result"])
					{
						//TOTALES
						$this->setAutoPageBreak(false);
						$this->ln(6);
						$this->row(array("","","","SUB-TOTAL:",H::FormatoMonto($sum_bcre),H::FormatoMonto($sum_bdeb),H::FormatoMonto($sum_lcre),H::FormatoMonto($sum_ldeb)));
						$this->setAutoPageBreak(true,30);
						$sum_bcre=0;
						$sum_bdeb=0;
						$sum_lcre=0;
						$sum_ldeb=0;
						#$this->idefine(IND,$i-1);
						$this->AddPage();
					}
				}
				$this->i++;
				//DETALLE MOVIMIENTOS
				if($arr["result"]!='CONCILIADO')
				{
					if($arr["movlib"]=='')
					{
						if($this->swlib)
						{
							$this->MCplus(250,5,'PARTIDAS NO REGISTRADAS EN LIBROS',0,'C');
							$this->swlib=false;
						}
					}else
					{
						if($this->swban)
						{
							$this->MCplus(250,5,'PARTIDAS NO REGISTRADAS EN BANCOS',0,'C');
							$this->swban=false;
						}
					}

				}
				$libdeb="";
				if($arr["librosdeb"]!=0)
				{
					$libdeb=H::FormatoMonto(abs($arr["librosdeb"]));
					$sum_ldeb+=$arr["librosdeb"];
				}
				$libhab="";
				if($arr["libroscre"]!=0)
				{
					$libhab=H::FormatoMonto(abs($arr["libroscre"]));

					$sum_lcre+=$arr["libroscre"];
				}
				$bandeb="";
				if($arr["bancosdeb"]!=0)
				{
					$bandeb=H::FormatoMonto(abs($arr["bancosdeb"]));
					$sum_bdeb+=$arr["bancosdeb"];
				}
				$banhab="";
				if($arr["bancoscre"]!=0)
				{
					$banhab=H::FormatoMonto(abs($arr["bancoscre"]));
					$sum_bcre+=$arr["bancoscre"];
				}
				//$this->row(array($arr["tipmov"],$arr["fecmov"],($arr["refere"]),($arr["desmov"]),$libdeb,$libhab,$bandeb,$banhab));
				$this->row(array($arr["tipmov"],$arr["fecmov"],($arr["refere"]),($arr["desmov"]),$banhab,$bandeb,$libhab,$libdeb));

				$refcue=$arr["numcue"];
				$refmov=$arr["result"];
			}
			//TOTALES
			if(!empty($this->arrp))
			{
				$this->setAutoPageBreak(false);
				$this->ln(6);
				$this->row(array("","","","SUB-TOTAL:",H::FormatoMonto($sum_bcre),H::FormatoMonto($sum_bdeb),H::FormatoMonto($sum_lcre),H::FormatoMonto($sum_ldeb)));
				$this->setAutoPageBreak(true,30);
				$this->AddPage();
			}else
			{
				$arrsal = $this->Saldos($arr=array('numcue'=>$this->ctades));
			}
			$this->setFont("Arial","B",9);
			$this->setwidths(array(140,30,30,30,30));
			$this->setAligns(array("L","R","R","R","R"));
			$bancosdeb=$this->bancosdeb;
			$bancoshab=$this->bancoscre;
			$librosdeb=$this->librosdeb;
			$libroshab=$this->libroscre;
			$this->settextcolor(155,0,0);
			$this->row(array('SALDOS AL:  '.$this->fecant,H::FormatoMonto($libroshab),H::FormatoMonto($librosdeb),H::FormatoMonto($bancoshab),H::FormatoMonto($bancosdeb)));
			$this->settextcolor(0,0,0);
			$arrres= $this->objTsrconcil->SQLresumen($this->ctades,$this->ctahas,$this->fecha);
			$this->ln(4);
			$this->setwidths(array(140,30,30,30,30));
			$this->setAligns(array("L","R","R","R","R"));
			$tot_1=0;
			$tot_2=0;
			$tot_3=0;
			$tot_4=0;
			foreach($arrres as $det)
			{
				//$this->row(array($det["destip"],H::FormatoMonto($det["bancoscre"]),H::FormatoMonto($det["bancosdeb"]),H::FormatoMonto($det["libroscre"]),H::FormatoMonto($det["librosdeb"])));
				$tot_1+=$det["bancoscre"];
				$tot_2+=$det["bancosdeb"];
				$tot_3+=$det["libroscre"];
				$tot_4+=$det["librosdeb"];
			}
			$this->ln(2);
			//$this->Row(array('SUB- TOTAL: ',H::FormatoMonto($tot_1),H::FormatoMonto($tot_2),H::FormatoMonto($tot_3),H::FormatoMonto($tot_4)));
			$tot_ban=$tot_1-$tot_2;
			$tot_lib=$tot_4-$tot_3;
			$this->ln(5);
			$this->setFillColor(200,200,200);
			$this->MCplus(258,5,'RESUMEN',1,"C",1);
			$this->setWidths(array(65,65,65,65));
			$this->setAligns(array("C","R","C","R"));
			$this->setBorder(true);
			$this->setFillTable(1);
			$fec = split("/",$this->fecha);

			/*if($this->mes=="01")
				$asal = $this->objTsrconcil->SQLsaldosenero($this->ctades);
			else*/
				$asal=$this->objTsrconcil->SQLsaldos($this->ctades,$fec[2]."-".$fec[1]."-".$fec[0]);
			$this->bancos= $asal[0]["sallib"];
			$this->libros= $asal[0]["salban"];
			$this->rowM(array('SALDOS FINAL DE MES LIBROS: ',H::FormatoMonto($this->bancos),'   SALDOS FINAL DE MES BANCOS:  ',H::FormatoMonto($this->libros)));
			$this->rowM(array('TOTAL TRANSITO LIBROS: ',H::FormatoMonto($tot_ban),'   TOTAL TRANSITO BANCOS:  ',H::FormatoMonto($tot_lib)));
			$this->rowM(array('TOTAL LIBROS: ',H::FormatoMonto($this->bancos+$tot_ban),'   TOTAL BANCOS:  ',H::Formatomonto($this->libros+$tot_lib)));
			$this->setWidths(array(140,120));
			$this->setAligns(array("C","C"));
			$this->setBorder(true);
			$this->setFillTable(1);
			$this->setJump(8);
			$bant=round($this->bancos+$tot_ban,2);
			$libt=round($this->libros+$tot_lib,2);
			$this->rowM(array('',''));
			$this->rowM(array('DIFERENCIA:   ',H::FormatoMonto(($bant)-($libt))));
			$this->ln(20);
	    	$this->sety(160);
			$this->SetWidths(array(86,88,86));
			$this->SetAligns(array("C","C","C"));
			$this->SetBorder(1);
			$this->ln();
			$this->Row(array("ELABORADO","REVISADO","APROBADO"));
			// $this->ln();
			$this->setJump(8);
			$this->Row(array($this->elaborado,$this->revisado,$this->aprobado));
			$this->setJump(2);
			$this->setFont("Arial","B",7);
			$this->Row(array("Contador","Coordinador","Director(A) Adm y Finanzas"));

		 }
	}
?>
