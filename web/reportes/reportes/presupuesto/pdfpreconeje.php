<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $sql;
		//var $titulos;
		var $perdesde;
		var $perhasta;
		var $codpredesde;
		var $codprehasta;
		var $codpre;
		var $fechadesde;
		var $fechahasta;
		var $comodin;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			//Recibir las variables por el Post
			$this->perdesde=$_POST["perdesde"];
			$this->perhasta=$_POST["perhasta"];
			$this->codpredesde=$_POST["codpredesde"];
			$this->codprehasta=$_POST["codprehasta"];
			$this->comodin=$_POST["comodin"];

			$this->sql="select a.codpre as codpre,
						 a.nompre as nompre,
						 sum(a.mondis) as mondis,
						 sum(a.montra) as montra,
						 sum(a.monadi) as monadi,
						 sum(a.monasi) as  monasi,
						 sum(a.mondim) as  mondim,
						 sum(a.montrn) as montrn
				  from cpasiini a, cpdefniv b
				  where a.codpre>='".$this->codpredesde."' and
						a.codpre<='".$this->codprehasta."' and
						a.perpre >= '".$this->perdesde."' and
						a.perpre <=  '".$this->perhasta."' and
						(a.anopre = to_char(b.fecini,'yyyy') or
						a.anopre = to_char(b.feccie,'yyyy'))and
						a.codpre like rtrim(('".$this->comodin."')) and
						b.codemp='001'
						group by a.codpre,a.nompre
						order by a.codpre";
						//--a.codpre like rtrim((:comodin)) and
		/*	$this->sql="select
							a.codpre,
							rtrim(a.nompre) as nompre ,
							a.mondis,
							a.montra,
							a.monadi,
							a.monasi,
							a.mondim,
							a.montrn,
							a.ref,
							to_char(a.fecha,'dd/mm/yyyy') as fecha,
							a.tipo,
							rtrim(a.descrip) as descrip,
							a.monimp,
							(case when a.status='P' then a.monimp else 0 end) as monprc,
							(case when a.status='C' then a.monimp else 0 end) as moncom,
							(case when a.status='A' then a.monimp else 0 end) as moncau,
							(case when a.status='G' then a.monimp else 0 end) as monpag,
							(case when a.status='P' then a.monaju else 0 end) as ajuprc,
							(case when a.status='C' then a.monaju else 0 end) as ajucom,
							(case when a.status='A' then a.monaju else 0 end) as ajucau,
							(case when a.status='G' then a.monaju else 0 end) as ajupag
							from cpconeje a
							order by a.codpre,a.fecha"; */



			//print $this->sql;
			//exit();
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="FECHA";
				$this->titulos[1]="TIPO";
				$this->titulos[2]="REFERENCIA";
				$this->titulos[3]="DESCRIPCION DOCUMENTO";
				$this->titulos[4]="MONTO";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"","s");
			$this->setFont("Arial","B",8);

			$this->cell(50,6,"Ejecucion Financiera al ".date('d-m-Y'));
			$this->ln(3);
			$this->cell(50,6,"Periodo : ".$this->perdesde."  Al  ".$this->perhasta);
			$this->ln();
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);
			$this->cell(20,6,$this->titulos[0]);  //Fecha
			$this->cell(23,6,$this->titulos[1]);	//Tipo
			$this->cell(20,6,$this->titulos[2]);   //REFERENCIA
			$this->cell(183,6,$this->titulos[3]);	//DESCRIPCION
			$this->cell(25,6,$this->titulos[4]);	//MONTO
			$this->Ln(4);
			$this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);


		}


		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$this->fechaini = date('d-m-Y');
			$this->fechacie = date('d-m-Y');
			$sum_monaju=0;
//			exit;

				$this->sql2="select a.fecdes as fechaini  from cppereje a,cpdefniv b where b.codemp='001' and a.fecini=b.fecini and
							a.feccie=b.feccie and
							a.pereje='".$this->perdesde."'";



			 $tb2=$this->bd->select($this->sql2);
			 $this->fechaini = $tb2->fields["fechaini"];

		 	$this->sql2="select a.fechas as fechacie from cppereje a,cpdefniv b where b.codemp='001' and a.fecini=b.fecini and
						a.feccie=b.feccie and
						a.pereje='".$this->perhasta."'";
			 $tb2=$this->bd->select($this->sql2);
			 $this->fechacie = $tb2->fields["fechacie"];
//		exit;
		while(!$tb->EOF)
		{
		// Por Grupo de Codigo Presupuestario
				$this->setFont("Arial","B",8);
				$codpre=$tb->fields["codpre"];
				$this->cell(20,6,$tb->fields["codpre"]);
				$this->Ln(4);
				$this->cell(20,6,$tb->fields["nompre"]);
				$this->Ln(4);
				$this->setFont("Arial","",8);
				$sum_monaju=0;
			    $sum_ajupag=0;
			    $sum_ajucau=0;
			    $sum_ajucom=0;
			    $sum_ajuprc=0;

		//	/	/	/	/	/	/	/	//
		/// DETALLES COMPROMISO-CAUSADO-PAGADO-PRECOMPROMISO//
					$this->sql2="select 'COM' as tip,b.refcom as ref,to_char(b.feccom,'dd/mm/yyyy') as fecha,b.tipcom as tipo,b.descom as descrip,a.monimp,a.monaju
								 from
								 	cpimpcom a,cpcompro b
								 where
									 (a.codpre)='".$tb->fields["codpre"]."' and
									 rtrim(b.refcom)=rtrim(a.refcom) and
									 b.feccom>='".$this->fechaini."' and
									 b.feccom<='".$this->fechacie."'
									 union
									 select 'CAU' as tip, b.refcau as ref,to_char(b.feccau,'dd/mm/yyyy') as fecha,b.tipcau as tipo,b.descau as descrip,a.monimp,a.monaju
								 from
								 	cpimpcau a,cpcausad b
								 where
									 (a.codpre)='".$tb->fields["codpre"]."' and
									 rtrim(b.refcau)=rtrim(a.refcau)  and
									 b.feccau>='".$this->fechaini."' and
									 b.feccau<='".$this->fechacie."'
									 union
									 select  'PRC' as tip,b.refprc as ref,to_char(b.fecprc,'dd/mm/yyyy') as fecha,b.tipprc as tipo,b.desprc as descrip,a.monimp,a.monaju
								 from
								 	cpimpprc a,cpprecom b
								 where
									 (a.codpre)='".$tb->fields["codpre"]."' and
									 rtrim(b.refprc)=rtrim(a.refprc)  and
									 b.fecprc>='".$this->fechaini."' and
									 b.fecprc<='".$this->fechacie."' and
									 b.staprc like('A%')
									 union
									 select  'PAG' as tip,b.refpag as ref,to_char(b.fecpag,'dd/mm/yyyy') as fecha,b.tippag as tipo,b.despag as descrip,a.monimp,a.monaju
								 from
								 	cpimppag a,cppagos b
								 where
									 (a.codpre)='".$tb->fields["codpre"]."'  and
									 rtrim(b.refpag)=rtrim(a.refpag)  and
									 b.fecpag>='".$this->fechaini."' and
									 b.fecpag<='".$this->fechacie."'";
									 //exit;

					 $tb2=$this->bd->select($this->sql2);

					 //if (!empty($tb2->fields["fecha"])){
					 while(!$tb2->EOF)
					{
						if($tb2->fields["monimp"]=="COM")
						{
							$sum_moncom=$sum_moncom+$tb2->fields["monimp"];
							$sum_ajucom=$sum_ajucom+$tb2->fields["monaju"];
						}elseif($tb2->fields["monimp"]=="CAU")
						{
							$sum_moncau=$sum_moncau+$tb2->fields["monimp"];
							$sum_ajucau=$sum_ajucau+$tb2->fields["monaju"];
						}elseif($tb2->fields["monimp"]=="PRC")
						{
							$sum_monprc=$sum_monprc+$tb2->fields["monimp"];
							$sum_ajuprc=$sum_ajuprc+$tb2->fields["monaju"];
						}else
						{
							$sum_monpag=$sum_monpag+$tb2->fields["monimp"];
							$sum_ajupag=$sum_ajupag+$tb2->fields["monaju"];
						}
						$this->cell(20,4,$tb2->fields["fecha"]);
						$this->cell(23,4,$tb2->fields["tipo"]);
						$this->cell(20,4,$tb2->fields["ref"]);
						$x=$this->GetX();
						$this->cell(175);
						$this->cell(20,4,H::FormatoMonto($tb2->fields["monimp"]),0,0,'R');
						$this->SetX($x);
						$this->Multicell(168,3,$tb2->fields["descrip"]);
						//$this->cell(175,6,substr($tb2->fields["descrip"],0,98));
						//$this->cell(20,6,H::FormatoMonto($tb2->fields["monimp"]),0,0,'R');
						//$acum_ajust=$acum_ajust+$tb2->fields["ajuprc"];
						$this->Ln(4);
						$tb2->MoveNext();
					}
			// CAUSADO
					/*$this->sql2="select  b.refcau as ref,to_char(b.feccau,'dd/mm/yyyy') as fecha,b.tipcau as tipo,b.descau as descrip,a.monimp,a.monaju,c.nomben
								 from
								 	cpimpcau a,cpcausad b inner join opbenefi c on (b.cedrif=c.cedrif)
								 where
									 rtrim(a.codpre)=rtrim('".$tb->fields["codpre"]."') and
									 rtrim(b.refcau)=rtrim(a.refcau)  and
									 b.feccau>='".$this->fechaini."' and
									 b.feccau<='".$this->fechacie."'
									 and b.cedrif= rpad('".$this->cedrif."',15,' ')";
									// print $this->sql2;
									 //exit;

					 $tb2=$this->bd->select($this->sql2);
					// if (!empty($tb2->fields["fecha"])){
					 while(!$tb2->EOF)
					{
						$sum_moncau=$sum_moncau+$tb2->fields["monimp"];
						$sum_ajucau=$sum_ajucau+$tb2->fields["monaju"];
						$this->cell(20,3,$tb2->fields["fecha"]);
						$this->cell(23,3,$tb2->fields["tipo"]);
						$this->cell(20,3,$tb2->fields["ref"]);
						$x=$this->GetX();
						$this->cell(175);
						$this->cell(20,3,H::FormatoMonto($tb2->fields["monimp"]),0,0,'R');
						$this->SetX($x);
						$this->Multicell(168,3,$tb2->fields["descrip"]);
						//$acum_ajust=$acum_ajust+$tb2->fields["ajuprc"];
						$this->Ln(4);
						$tb2->MoveNext();
					}

			// prc
					$this->sql2="select  b.refprc as ref,to_char(b.fecprc,'dd/mm/yyyy') as fecha,b.tipprc as tipo,b.desprc as descrip,a.monimp,a.monaju,c.nomben
								 from
								 	cpimpprc a,cpprecom b inner join opbenefi c on (b.cedrif=c.cedrif)
								 where
									 rtrim(a.codpre)=rtrim('".$tb->fields["codpre"]."') and
									 rtrim(b.refprc)=rtrim(a.refprc)  and
									 b.fecprc>='".$this->fechaini."' and
									 b.fecprc<='".$this->fechacie."'
									 and b.cedrif= rpad('".$this->cedrif."',15,' ')";
									// print $this->sql2;
								//	 exit;
					 $tb2=$this->bd->select($this->sql2);
					 //if (!empty($tb2->fields["fecha"])){
					 while(!$tb2->EOF)
					 {
						$sum_monprc=$sum_monprc+$tb2->fields["monimp"];
						$sum_ajuprc=$sum_ajuprc+$tb2->fields["monaju"];
					 	$this->cell(20,3,$tb2->fields["fecha"]);
						$this->cell(23,3,$tb2->fields["tipo"]);
						$this->cell(20,3,$tb2->fields["ref"]);
						$x=$this->GetX();
						$this->cell(175);
						$this->cell(20,3,H::FormatoMonto($tb2->fields["monimp"]),0,0,'R');
						$this->SetX($x);
						$this->Multicell(168,3,$tb2->fields["descrip"]);
						//$acum_ajust=$acum_ajust+$tb2->fields["ajuprc"];
						$tb2->MoveNext();
						$this->Ln(4);
					 }


			// pagado
					$this->sql2="select  b.refpag as ref,to_char(b.fecpag,'dd/mm/yyyy') as fecha,b.tippag as tipo,b.despag as descrip,a.monimp,a.monaju,c.nomben
								 from
								 	cpimppag a,cppagos b inner join opbenefi c on (b.cedrif=c.cedrif)
								 where
									 rtrim(a.codpre)=rtrim('".$tb->fields["codpre"]."') and
									 rtrim(b.refpag)=rtrim(a.refpag)  and
									 b.fecpag>='".$this->fechaini."' and
									 b.fecpag<='".$this->fechacie."'
									 and b.cedrif= rpad('".$this->cedrif."',15,' ')";
									// print $this->sql2;
									 //exit;

					 $tb2=$this->bd->select($this->sql2);
				// if (!empty($tb2->fields["fecha"])){
					 while(!$tb2->EOF)
					 {
						$sum_monpag=$sum_monpag+$tb2->fields["monimp"];
						$sum_ajupag=$sum_ajupag+$tb2->fields["monaju"];
						$this->cell(20,3,$tb2->fields["fecha"]);
						$this->cell(23,3,$tb2->fields["tipo"]);
						$this->cell(20,3,$tb2->fields["ref"]);
						$x=$this->GetX();
						$this->cell(175);
						$this->cell(20,3,H::FormatoMonto($tb2->fields["monimp"]),0,0,'R');
						$this->SetX($x);
						$this->Multicell(168,3,$tb2->fields["descrip"]);
						//$acum_ajust=$acum_ajust+$tb2->fields["ajuprc"];
						$tb2->MoveNext();
						$this->Ln(4);

					}*/

				////////////// TOTALES /////////////////
					$this->Ln();
					$this->setFont("Arial","B",8);
					 $this->cell(85,6,"Ajustes",0,0,'R');
					 $this->Ln();
					//// PRECOMPROMETIDO///
						$this->sql2="select sum(monprc) as totprc,sum(moncom) as totcom,sum(moncau) as totcau,sum(monpag) as totpag
								    from cpasiini where codpre='".$tb->fields["codpre"]."'
									and perpre >= '".rtrim($this->perdesde)."'
									and perpre <= '".rtrim($this->perhasta)."'";
									//print $this->sql2;
									//exit;
						 $tb2=$this->bd->select($this->sql2);
						 $this->cell(20,6,"Precomprometido    ".H::FormatoMonto($tb2->fields["totprc"]));
						 $this->cell(70,6,H::FormatoMonto($sum_ajuprc),0,0,'R');
						 $this->cell(40,6,"Traslados(+)",0,0,'R');
						 $this->cell(40,6,"Adiciones",0,0,'R');
						 $this->cell(40,6,"Asignado",0,0,'R');

					 //////////////
					$this->Ln();
					//// Comprometido ///
						/*$this->sql2="select sum(moncom) as totprc from cpasiini where codpre=rpad('".$tb->fields["codpre"]."',50,' ')
									and perpre >= '".rtrim($this->perdesde)."'
									and perpre <= '".rtrim($this->perhasta)."'";
									//print $this->sql2;
									//exit;
						 $tb2=$this->bd->select($this->sql2);*/
						 $this->cell(20,6,"Comprometido        ".H::FormatoMonto($tb2->fields["totprc"]));
						 $this->cell(70,6,H::FormatoMonto($sum_ajucom),0,0,'R');
						 $this->cell(40,6,H::FormatoMonto($tb->fields["montra"]),0,0,'R');
						 $this->cell(40,6,H::FormatoMonto($tb->fields["monadi"]),0,0,'R');
						 $this->cell(40,6,H::FormatoMonto($tb->fields["monasi"]),0,0,'R');
					 //////////////
					$this->Ln();
					//// Causado ///
						/*$this->sql2="select sum(moncau) as totprc from cpasiini where codpre=rpad('".$tb->fields["codpre"]."',50,' ')
									and perpre >= '".rtrim($this->perdesde)."'
									and perpre <= '".rtrim($this->perhasta)."'";
									//print $this->sql2;
									//exit;
						 $tb2=$this->bd->select($this->sql2);*/
						 $this->cell(20,6,"Causado                  ".H::FormatoMonto($tb2->fields["totcau"]));
						 $this->cell(70,6,H::FormatoMonto($sum_ajucau),0,0,'R');
						 $this->cell(40,6,"Traslados(-)",0,0,'R');
						 $this->cell(40,6,"Disminuciones",0,0,'R');
						 $this->cell(40,6,"Disponiblidad",0,0,'R');
					 //////////////
					$this->Ln();
					//// Pagado ///
						/*$this->sql2="select sum(monpag) as totprc from cpasiini where codpre=rpad('".$tb->fields["codpre"]."',50,' ')
									and perpre >= '".rtrim($this->perdesde)."'
									and perpre <= '".rtrim($this->perhasta)."'";
									//print $this->sql2;
									//exit;
						 $tb2=$this->bd->select($this->sql2);*/
						 $this->cell(20,6,"Pagado                     ".H::FormatoMonto($tb2->fields["totpag"]));
						  $this->cell(70,6,H::FormatoMonto($sum_ajupag),0,0,'R');
						 $this->cell(40,6,H::FormatoMonto($tb->fields["montrn"]),0,0,'R');
						 $this->cell(40,6,H::FormatoMonto($tb->fields["mondim"]),0,0,'R');
						 $this->cell(40,6,H::FormatoMonto($tb->fields["mondis"]),0,0,'R');

					 //////////////
			$this->Ln();

			$tb->MoveNext();
		}
		$this->bd->closed();
		}
	}
?>
