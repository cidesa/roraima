<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $sql;
		var $titulos;
		var $refcompdesd;
		var $refcomphast;
		var $fecdes;
		var $fechast;
		var $tipocomdes;
		var $tipocomhas;
		var $status;
		var $codpredesde;
		var $codprehasta;
		var $comodin;
		var $tipo_gasto;
		var $WINVERS;
		var $WFUNCIO;
		var $cedula;
		var $nomst;
		var $refcom;
		var $Total_monimp;
		var $Total_ajuste;
		var $Total_mon_aju;
		var $Total_moncau;
		var $Total_saldo;
		var $ST_monimp;
		var $ST_ajuste;
		var $ST_mon_aju;
		var $ST_moncau;
		var $ST_saldo;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->bd->validar();
			//Recibir las variables por el Post
			$this->refcompdesd=trim($_POST["refcompdesd"]);
			$this->refcomphast=trim($_POST["refcomphast"]);
			$this->fecdes=trim($_POST["fecdes"]);
			$this->fechast=trim($_POST["fechast"]);
			$this->tipocomdes=trim($_POST["tipocomdes"]);
			$this->tipocomhas=trim($_POST["tipocomhas"]);
			$this->status=trim($_POST["status"]);
			$this->codpredesde=trim($_POST["codpredesde"]);
			$this->codprehasta=trim($_POST["codprehasta"]);
			$this->comodin=trim($_POST["comodin"]);
			$this->tipo_gasto=trim($_POST["tipo_gasto"]);

			//$this->cab=new cabecera();
			if ($this->tipo_gasto=='CONSOLIDADO'){
				$WINVERS = 'I';
				$WFUNCIO = 'F';
			}else{
				if ($this->tipo_gasto=='INVERSION'){
					$WINVERS = 'I';
					$WFUNCIO = 'I';
				}else{
					$WINVERS = 'F';
					$WFUNCIO = 'F';
				}
			}

			$this->sql="select a.refcom,
						a.tipcom,
						to_char(a.feccom,'dd/mm/yyyy') as feccom,
						a.moncom,
						a.salcau,
						a.salaju,
						rtrim(a.descom) as descom,
						rtrim(b.codpre ) as codpre,
						rtrim(c.nompre) as nompre,
						b.monimp,
						b.moncau,
						b.monpag,
						b.monaju as ajuste,
						(b.monimp-b.monaju) as mon_aju,
						a.cedrif
						from
						cpcompro a,
						cpimpcom b,
						cpdeftit c
						where
						(b.monimp-b.moncau)>0 and
						(b.monimp-b.monaju)>moncau and
						a.refcom = b.refcom and
						b.codpre = c.codpre  and
						a.tipcom not in('op09','op10','cfl ','cled','ccnv') and
						(rtrim(a.refcom)>=rtrim('".$this->refcompdesd."')  and
						rtrim(a.refcom) <=rtrim('".$this->refcomphast."') ) and
						(a.feccom>=to_date('".$this->fecdes."','dd/mm/yyyy') and
						a.feccom<=to_date('".$this->fechast."','dd/mm/yyyy')) and
						(rtrim(b.codpre) >=rtrim('".$this->codpredesde."') and
						rtrim(b.codpre) <=rtrim('".$this->codprehasta."')) and
						(rtrim(a.tipcom) >= rtrim('".$this->tipocomdes."')) and
						(rtrim(a.tipcom) <= rtrim('".$this->tipocomhas."')) and

						((rtrim(a.stacom)=rtrim('".$this->status."') and (rtrim(a.stacom)='A' or a.fecanu<=to_date('".$this->fechast."','dd/mm/yyyy')))
						or (rtrim(a.stacom)='N' and a.fecanu>to_date('".$this->fechast."','dd/mm/yyyy') and rtrim(a.stacom)<>'".$this->status."')) and

						(b.codpre like rtrim('".$this->comodin."') )  and
						(c.estatus = '$WINVERS' or c.estatus = '$WFUNCIO')
						Group by " .
								"a.refcom,
								a.tipcom,
								a.feccom,
								a.moncom,
								a.salcau,
								a.salaju,
								a.descom,
								b.codpre,
								c.nompre,
								b.monimp,
								b.moncau,
								b.monpag,
								b.monaju,
								a.cedrif
						order by
								b.codpre,
								a.refcom,
								a.feccom,
								a.tipcom";


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="REFERENCIA";
				$this->titulos[1]="TIPO";
				$this->titulos[2]="FECHA";
				$this->titulos[3]="BENEFICIARIO";
				$this->titulos[4]="DESCRIPCION";
				$this->titulos[5]="Imputaciones Presupuestarias";
				$this->titulos[6]="Comprometido";
				$this->titulos[7]="Ajustado";
				$this->titulos[8]="Monto Ajustado";
				$this->titulos[9]="Causado";
				$this->titulos[10]="Saldo por Causar";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);

			$this->cell(25,6,$this->titulos[0]);
			$this->cell(36,6,$this->titulos[1]);
			$this->cell(20,6,$this->titulos[2]);
			$this->cell(20,6,$this->titulos[3]);
			$this->ln(3);
			$this->cell(105,6," ");
			$this->setFont("Arial","I",8);
			$this->cell(25,6,$this->titulos[4]);
			$this->ln(3);
			$this->cell(45,6," ");
			$this->setFont("Arial","B",8);
			$this->cell(100,6,$this->titulos[5]);
			$this->cell(29,6,$this->titulos[6]);
			$this->cell(17,6,$this->titulos[7]);
			$this->cell(30,6,$this->titulos[8]);
			$this->cell(18,6,$this->titulos[9]);
			$this->cell(25,6,$this->titulos[10]);

			$this->ln();
			$this->Line($this->GetX(),$this->GetY(),$this->GetX()+260,$this->GetY());
			//$this->ln(3);

		}
		function Cuerpo()
		{
			//$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;
			$this->setFont("Arial","",8);

			if ($this->status=='A'){ $nomsta='Activo'; }else { $nomsta='Anulado'; }

			//Inicializar
			$Total_monimp=0;
			$Total_ajuste=0;
			$Total_mon_aju=0;
			$Total_moncau=0;
			$Total_saldo=0;

			$ST_monimp=0;
			$ST_ajuste=0;
			$ST_mon_aju=0;
			$ST_moncau=0;
			$ST_saldo=0;
			//////////////
			while(!$tb->EOF)
			{
				//if ($refcom!=$tb->fields["refcom"]){
					$refcom=$tb->fields["refcom"];
					$this->setFont("Arial","B",8);
					$this->ln();
					$this->cell(25,6,$tb->fields["refcom"]);
					$this->cell(15,6,$tb->fields["tipcom"]);
					$this->cell(20,6,$nomsta);
					$this->cell(20,6,$tb->fields["feccom"]);

					$cedula=$tb->fields["cedrif"];
					$tb1=$this->bd->select("select cedrif, nomben from opbenefi where cedrif='$cedula'");
					$this->cell(25,6,substr($tb1->fields["nomben"],0,100));

					$this->ln(5);
					$this->cell(43,6,"");
					$this->setFont("Arial","I",8);
					$this->Multicell(212,4,$tb->fields["descom"]);
					$this->ln(1);
				//}
				while($tb->fields["refcom"]==$refcom){
				$this->setFont("Arial","",8);
					$refcom=$tb->fields["refcom"];
					$this->cell(41,6,$tb->fields["codpre"]);
					$this->cell(98,6,substr($tb->fields["nompre"],0,56));

					//Sumatorias
					$Total_monimp= $Total_monimp + $tb->fields["monimp"];
					$Total_ajuste= $Total_ajuste + $tb->fields["ajuste"];
					$Total_mon_aju= $Total_mon_aju + $tb->fields["mon_aju"];
					$Total_moncau= $Total_moncau + $tb->fields["moncau"];
					$Total_saldo= $Total_saldo + ($tb->fields["mon_aju"]-$tb->fields["moncau"]);
					//
					$this->cell(25,6,number_format($tb->fields["monimp"],2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($tb->fields["ajuste"],2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($tb->fields["mon_aju"],2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($tb->fields["moncau"],2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($tb->fields["mon_aju"]-$tb->fields["moncau"],2,'.',','),0,0,'R');
				$this->ln(4);
				$tb->MoveNext();
				if ($this->GetY()>=170){
					$this->AddPage();
				}
				}
				//Imprimir Totales por Grupo
				    $this->Line($this->GetX()+140,$this->GetY()+1,$this->GetX()+263,$this->GetY()+1);
					$this->setFont("Arial","B",8);
					$this->cell(139,6," ");
					$this->cell(25,6,number_format($Total_monimp,2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($Total_ajuste,2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($Total_mon_aju,2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($Total_moncau,2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($Total_saldo,2,'.',','),0,0,'R');
				///
					//Sumatorias
					$ST_monimp= $ST_monimp + $Total_monimp;
					$ST_ajuste= $ST_ajuste + $Total_ajuste;
					$ST_mon_aju= $ST_mon_aju + $Total_mon_aju;
					$ST_moncau= $ST_moncau + $Total_moncau;
					$ST_saldo= $ST_saldo + $Total_saldo;
					//
					//Inicializar
					$Total_monimp=0;
					$Total_ajuste=0;
					$Total_mon_aju=0;
					$Total_moncau=0;
					$Total_saldo=0;
					//

				if ($tb->EOF)
				{
					//Imprimir Totales Generales
					$this->ln();
						$this->Line($this->GetX()+140,$this->GetY()+1,$this->GetX()+263,$this->GetY()+1);
						$this->setFont("Arial","B",8);
						$this->cell(135,6,"TOTAL GENERAL",0,0,'R');
						$this->cell(25,6,number_format($ST_monimp,2,'.',','),0,0,'R');
						$this->cell(25,6,number_format($ST_ajuste,2,'.',','),0,0,'R');
						$this->cell(25,6,number_format($ST_mon_aju,2,'.',','),0,0,'R');
						$this->cell(25,6,number_format($ST_moncau,2,'.',','),0,0,'R');
						$this->cell(25,6,number_format($ST_saldo,2,'.',','),0,0,'R');
					//////////////////////
				}
				$this->bd->closed();
			}
		}
	}
?>