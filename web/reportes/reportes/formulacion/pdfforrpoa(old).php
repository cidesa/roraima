<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sqlg;
		var $sql1;
		var $sql2;
		var $rep;
		var $cab;
		var $titulo;
		var $cat1;
		var $cat2;
		var $pro1;
		var $pro2;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->cat1=trim($_POST["cat1"]);
			$this->cat2=trim($_POST["cat2"]);
			$this->pro1=trim($_POST["pro1"]);
			$this->pro2=trim($_POST["pro2"]);
            $this->titulo=trim($_POST["titulo"]);


			$this->sqlg="select distinct(a.codpro) as codpro, e.nomcat as nomcat
						from
						fordefproble a left outer join
						(forasoproobj b left outer join
						(forasometobj c left outer join forasometcre d on c.codmet=d.codmet) on b.codobj=c.codobj) on a.codpro=b.codpro,
						fordefcatpre e
						where
						a.codpro >= '".$this->pro1."' and a.codpro <= '".$this->pro2."' and
						rtrim(d.codcat) >= '".$this->cat1."' and rtrim(d.codcat) <= '".$this->cat2."' and
						d.codcat=e.codcat
						order by (a.codpro)";

/*print $this->sqlg;
exit;*/
		}

		function Header()
		{
			$this->Image("../../img/logo_1.jpg",10,10,33);
			/////////////////////
			$this->Rect(10,10,260,20);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			$this->SetX(45);
			#$this->cell(5,5,"JOSE FELIX RIBAS");
			$this->SetY(13);
			$this->SetX(45);
			#$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->setFont("Arial","",7);
			$this->SetY(11);
			$this->SetX(254);
			$this->cell(5,5,"FECHA");
			$this->setFont("Arial","",8);
			$this->SetY(15);
			$this->SetX(253);
			$this->cell(5,5,date('d/m/y'));
			$this->setFont("Arial","B",14);
			$this->SetY(18);
			$this->SetX(105);
			$this->cell(5,5,$this->titulo);
			$this->setFont("Arial","",7);
			$this->SetY(25);
			$this->SetX(10);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(30);
			$this->cell(5,5,date('Y'));




			/////////////////////
			$this->ln(8);

		}
		function Cuerpo()
		{
		    $tbg=$this->bd->select($this->sqlg);
			$primera="S";

			while (!$tbg->EOF)
			{
				if ($primera!="S")
				{
					$this->AddPage();
				}
				else
				{
					$primera="N";
				}

				//////////////////////////////////////
				$this->setFont("Arial","B",8);
				$this->SetTextColor(140,0,0);
				$this->SetY(25);
				$this->SetX(40);
				$this->cell(5,5,"ORGANISMO: ");
				$this->SetX(60);
				$this->SetTextColor(0,0,0);
				$this->cell(5,5,"GOBERNACION DEL ESTADO TACHIRA");
				$this->SetTextColor(140,0,0);
				$this->SetY(25);
				$this->SetX(130);
				$this->cell(5,5,"DEPENDENCIA: ");
				$this->SetX(153);
				$this->SetTextColor(0,0,0);
				$this->cell(5,5,substr($tbg->fields["nomcat"],0,65));
				$this->SetY(33);
				//////////////////////////////////////
				$cod=$tbg->fields["codpro"];
				$sql="select * from fordefproble where codpro='".$cod."' ";
				$tb=$this->bd->select($sql);
					//buscamos el objetivo
					$sqlx="select a.codobj as codobj, trim(b.desobj) as desobj
						from forasoproobj a, fordefobj b
						where a.codpro= '".$cod."' and a.codobj=b.codobj";
					$tbx=$this->bd->select($sqlx);
					$codobj=$tbx->fields["codobj"];
					///////////////////////


				$this->line(10,32,270,32);
				///////////////////////////////////////////////////////////////
				// PRIMER RECTANGULO DE ARRIBA/////////////////////////////////


				//PLAN DE DESARROLLO ECONOMICO
				$this->SetX(10);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"1.- PLAN DE DESARROLLO ECONOMICO SOCIAL DE LA NACION",0,"L");
				$this->ln(1);
				$this->SetX(10);
				$this->setFont("Arial","",7);
				$this->Multicell(80,3,trim($tb->fields["plaeco"]),0,"L");
				$y1=$this->GetY();
				//OBJETIVO ESTRATEGICO DE LA NACION
				$this->SetY(33);
				$this->SetX(90);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"2.- OBJETIVOS ESTRATEGICOS DE LA NACION",0,"L");
				$this->ln(1);
				$this->SetX(90);
				$this->setFont("Arial","",7);
				$this->Multicell(80,3,trim($tb->fields["objest"]),0,"L");
				$y2=$this->GetY();
				//PLAN DE GOBIERNO MUNICIPAL
				$this->SetY(33);
				$this->SetX(180);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"3.- PLAN DE GOBIERNO MUNICIPAL",0,"L");
				$this->ln(1);
				$this->SetX(180);
				$this->setFont("Arial","",7);
				$this->Multicell(80,3,trim($tb->fields["plagob"]),0,"L");
				$y3=$this->GetY();

				$y=max($y1,$y2,$y3)+2;

				$this->line(10,32,10,$y);
				$this->line(90,32,90,$y);
				$this->line(180,32,180,$y);
				$this->line(270,32,270,$y);
				$this->line(10,$y,270,$y);
				///////////////////////////////////////////////////////////////

				///////////////////////////////////////////////////////////////
				// SEGUNDO RECTANGULO DE ARRIBA/////////////////////////////////

				//PROBLEMA
				$this->SetY($y+1);
				$this->SetX(10);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"4.- PROBLEMA",0,"L");
				$this->ln(1);
				$this->SetX(10);
				$this->setFont("Arial","",7);
				$this->Multicell(80,3,trim($tb->fields["progra"]),0,"L");
				$y1=$this->GetY();
				//PROGRAMA/PROYECTO
				$this->SetY($y+1);
				$this->SetX(90);
				$this->setFont("Arial","B",8);
				$this->Multicell(80,3,"5.- PROGRAMA/PROYECTO",0,"L");
				$this->ln(1);
				$this->SetX(90);
				$this->setFont("Arial","",7);
				$this->Multicell(80,3,trim($tb->fields["nompro"]),0,"L");
				$y2=$this->GetY();
				//RESPONSABLE
				$this->SetY($y+1);
				$this->SetX(180);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"6.- RESPONSABLE",0,"L");
				$this->ln(1);

				$sqly="select b.codemp as codemp, c.nomemp as nomemp
						from forasometobj a, fordefmet b, nphojint c
						where a.codobj= '".$codobj."' and a.codmet=b.codmet
						and b.codemp=c.codemp
						group by b.codemp,c.nomemp
						order by b.codemp,c.nomemp";
				$tby=$this->bd->select($sqly);
				$this->setFont("Arial","",7);
				while (!$tby->EOF)
				{
					$this->SetX(180);
					$this->Multicell(80,3,"- ".$tby->fields["nomemp"],0,"L");
					$this->ln(1);
				$tby->MoveNext();
				}
				$y3=$this->GetY();

				$yy=max($y1,$y2,$y3)+2;

				$this->line(10,$y,10,$yy);
				$this->line(90,$y,90,$yy);
				$this->line(180,$y,180,$yy);
				$this->line(270,$y,270,$yy);
				$this->line(10,$yy,270,$yy);
				$y=$yy;
				///////////////////////////////////////////////////////////////

				///////////////////////////////////////////////////////////////
				// TERCER RECTANGULO DE ARRIBA/////////////////////////////////

				//OBJETIVO
				$this->SetY($y+1);
				$this->SetX(10);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"7.- OBJETIVO",0,"L");
				$this->ln(1);

				$sqlx="select a.codobj as codobj, trim(b.desobj) as desobj
						from forasoproobj a, fordefobj b
						where a.codpro= '".$cod."' and a.codobj=b.codobj";
				$tbx=$this->bd->select($sqlx);
				$this->setFont("Arial","",7);
				$this->SetX(10);
				$codobj=$tbx->fields["codobj"];
				$this->Multicell(80,3,$tbx->fields["desobj"],0,"L");
				$y1=$this->GetY();
				//METAS ESTRATEGICAS Y ACTIVIDADES
				//META
				$this->SetY($y+1);
				$this->SetX(90);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"8.- METAS ESTRATEGICAS",0,"L");

				//ACTIVIDAD
				$this->SetY($y+1);
				$this->SetX(180);
				$this->setFont("Arial","B",8);
				$this->Multicell(80,3,"9.- ACTIVIDADES",0,"L");


				//META
				$sqlx1="select trim(b.desmet) as desmet
						from forasometobj a, fordefmet b
						where a.codobj= '".$codobj."' and a.codmet=b.codmet
						order by a.codmet";
				$tbx1=$this->bd->select($sqlx1);
				//ACTIVIDAD
				$sqlx2="select trim(c.desact) as desact
						from
						forasometobj a left outer join (forasoactpro b left outer join fordefact c on b.codact=c.codact) on a.codmet=b.codmet
						where codobj='".$codobj."'
						order by b.codmet";
				$tbx2=$this->bd->select($sqlx2);
				$this->setFont("Arial","",7);

				$ym=$y+5;
				$ya=$y+5;
				while (!$tbx1->EOF && !$tbx2->EOF)
				{
					if ($ym<=150 || $ya<=150)
					{
							$this->SetY($ym);
							$this->SetX(90);
							$this->Multicell(80,3,"- ".$tbx1->fields["desmet"],0,"L");
							$this->ln(1);
							$ym=$this->GetY();
							//////
							$this->SetY($ya);
							$this->SetX(180);
							$this->Multicell(80,3,"- ".$tbx2->fields["desact"],0,"L");
							$this->ln(1);
							$ya=$this->GetY();

							$tbx1->MoveNext();
							$tbx2->MoveNext();
					}
					else
					{
							$salto="S";
							$yy=max($ym,$ya)+2;
							$this->line(10,$y,10,$yy);
							$this->line(90,$y,90,$yy);
							$this->line(180,$y,180,$yy);
							$this->line(270,$y,270,$yy);
							$this->line(10,$yy,270,$yy);

							$this->AddPage();

							$this->setFont("Arial","B",8);
							$this->SetTextColor(140,0,0);
							$this->SetY(25);
							$this->SetX(40);
							$this->cell(5,5,"ORGANISMO: ");
							$this->SetX(60);
							$this->SetTextColor(0,0,0);
							$this->cell(5,5,"GOBERNACION DEL ESTADO TACHIRA");
							$this->SetTextColor(140,0,0);
							$this->SetY(25);
							$this->SetX(130);
							$this->cell(5,5,"DEPENDENCIA: ");
							$this->SetX(153);
							$this->SetTextColor(0,0,0);
							$this->cell(5,5,$tbg->fields["nomcat"]);

							$this->line(10,32,270,32);
							$this->SetY(32);
							$y=32;
							$ym=32;
							$ya=32;
							$this->setFont("Arial","",7);

					}


				}
				if ($salto=="S")
				{
					$yy=max($ym,$ya)+2;
					$salto="N";
				}
				else
				{
					$yy=max($y1,$ym,$ya)+2;
				}
				$this->line(10,$y,10,$yy);
				$this->line(90,$y,90,$yy);
				$this->line(180,$y,180,$yy);
				$this->line(270,$y,270,$yy);
				$this->line(10,$yy,270,$yy);
				$y=$yy;

				if ($y>=145)
				{
					$this->AddPage();

					$this->setFont("Arial","B",8);
					$this->SetTextColor(140,0,0);
					$this->SetY(25);
					$this->SetX(40);
					$this->cell(5,5,"ORGANISMO: ");
					$this->SetX(60);
					$this->SetTextColor(0,0,0);
					$this->cell(5,5,"GOBERNACION DEL ESTADO TACHIRA");
					$this->SetTextColor(140,0,0);
					$this->SetY(25);
					$this->SetX(130);
					$this->cell(5,5,"DEPENDENCIA: ");
					$this->SetX(153);
					$this->SetTextColor(0,0,0);
					$this->cell(5,5,$tbg->fields["nomcat"]);

					$this->line(10,32,270,32);
					$this->SetY(32);
					$y=32;
				}

				///////////////////////////////////////////////////////////////

				///////////////////////////////////////////////////////////////
				// RECTANGULO DE ABAJO /////////////////////////////////

				//ASIGNACION PRESUPUESTARIA
				$this->SetY($y+1);
				$this->SetX(60);
				$this->setFont("Arial","B",8);
				$this->Multicell(40,3,"11.- ASIGNACION PRESUPUESTARIA EN Bs.",0,"L");
				$this->ln(5);

				$sqlx="select sum(coalesce(b.monto,0)) as monto
							from forasometobj a, forasipreact b
							where
							a.codobj='".$codobj."' and
							b.codmet=a.codmet and
							b.perpre='00' ";
				$tbx=$this->bd->select($sqlx);
				$this->setFont("Arial","",7);

				$total=$tbx->fields["monto"];
				$this->SetX(60);
				$this->setFont("Arial","B",8);
				$this->cell(36,5,"Bs. ".H::formatoMonto($tbx->fields["monto"]),0,0,"C");
				$this->setFont("Arial","",5);
				$y1=$this->GetY();
				//RECURSOS PRESUPUESTARIOS
				$this->SetY($y+1);
				$this->SetX(155);
				$this->setFont("Arial","B",8);
				$this->Multicell(55,3,"13.- RECURSOS PRESUPUESTARIOS",0,"L");

				$this->SetY($y+20);
				$this->SetX(168);
				$this->setFont("Arial","B",16);
				$this->cell(5,5,"X",0,0,"C");
				$this->setFont("Arial","B",8);
					//CUADRITO
					$this->Rect(158,$y+5,50,25);
					$this->line(183,$y+5,183,$y+30);
					$this->SetY($y+6);
					$this->SetX(161);
					$this->Multicell(20,3,"ORDINARIO",0,"L");
					$this->SetY($y+6);
					$this->SetX(184);
					$this->setFont("Arial","B",6);
					$this->Multicell(23,3,"EXTRAORDINARIO",0,"L");
					//
				$y2=$this->GetY()+25;
				//TIEMPO DE EJECUCION
				$this->SetY($y+1);
				$this->SetX(211);
				$this->setFont("Arial","B",8);
				$this->Multicell(50,3,"14.- TIEMPO DE EJECUCION",0,"L");

					//CUADRITO
					$this->Rect(213,$y+5,54,25);
					$this->line(240,$y+5,240,$y+30);
					$this->line(235,$y+5,235,$y+30);
					$this->line(262,$y+5,262,$y+30);
					$this->SetY($y+6);
					$this->SetX(215);
					$this->Multicell(60,3,"   1° SEM           %        2° SEM           %",0,"L");


					//PRIMER
					$sqlx="select sum(coalesce(b.monto,0)) as primer
						from
						forasometobj a left outer join forasipreact b on a.codmet=b.codmet
						where a.codobj='".$codobj."' and
						perpre >= '01' and perpre <= '06' ";
					$tbx=$this->bd->select($sqlx);
					$this->setFont("Arial","",7);
					if ($total!=0)
					{
						$primer=$tbx->fields["primer"]*100/$total;
					}
					else
					{
						$primer=0;
					}
					//$this->SetY(178);
					//$this->SetX(224);
					//$this->cell(5,5,number_format($tbx->fields["primer"],2,'.',','),0,0,"C");
					$this->SetY($y+15);
					$this->SetX(235);
					$this->setFont("Arial","",7);
					$this->cell(5,5,round($primer,0),0,0,"C");
					//SEGUNDO
					$sqlx="select sum(b.monto) as segundo
						from
						forasometobj a left outer join forasipreact b on a.codmet=b.codmet
						where a.codobj='".$codobj."' and
						perpre >= '07' and perpre <= '12' ";
					$tbx=$this->bd->select($sqlx);
					$this->setFont("Arial","",7);
					if ($total!=0)
					{
						$segundo=$tbx->fields["segundo"]*100/$total;
					}
					else
					{
						$segundo=0;
					}
					//$this->SetY(178);
					//$this->SetX(249);
					//$this->setFont("Arial","",5);
					//$this->cell(5,5,number_format($tbx->fields["segundo"],2,'.',','),0,0,"C");
					$this->SetY($y+15);
					$this->SetX(262);
					$this->setFont("Arial","",7);
					$this->cell(5,5,round($segundo,0),0,0,"C");
				$y3=$this->GetY()+25;

				//INDICADORES Y PARTIDAS
				//INDICADOR
				$this->SetY($y+1);
				$this->SetX(10);
				$this->setFont("Arial","B",8);
				$this->Multicell(85,3,"10.- INDICADORES",0,"L");

				//PARTIDA
				$this->SetY($y+1);
				$this->SetX(105);
				$this->setFont("Arial","B",8);
				$this->Multicell(45,3,"12.- PARTIDAS PRESUPUESTARIAS",0,"L");

				//INDICADOR
				$sqlx1="select trim(b.indpro) as indpro
						from forasometobj a, fordefmet b
						where a.codobj= '".$codobj."' and a.codmet=b.codmet
						group by trim(b.indpro)
						having trim(b.indpro) is not null";
				$tbx1=$this->bd->select($sqlx1);

				//PARTIDA
				$sqlx2="select b.codparegr as par, trim(c.nomparegr) as des
							from forasometobj a, forasipreact b, fordefparegr c
							where
							a.codobj='".$codobj."' and
							b.codmet=a.codmet and
							b.codparegr=c.codparegr and
							b.perpre='00' ";
				$tbx2=$this->bd->select($sqlx2);
				$this->setFont("Arial","",7);
				$yi=$y+5;
				$yp=$y+8;
				while (!$tbx1->EOF && !$tbx2->EOF)
				{
					if ($yi<=170 || $yp<=170)
					{
							$this->SetY($yi);
							$this->SetX(10);
							$this->Multicell(50,3,"- ".$tbx1->fields["indpro"],0,"L");
							$this->ln(1);
							$yi=$this->GetY();
							//////
							$this->SetY($yp);
							$this->SetX(105);
							$this->Multicell(45,3,$tbx2->fields["par"]." ".$tbx2->fields["des"],0,"L");
							$this->ln(1);
							$yp=$this->GetY();

							$tbx1->MoveNext();
							$tbx2->MoveNext();
					}
					else
					{
							$salto="S";

							$yy=max($yi,$yp)+2;
							$this->line(10,$y,10,$yy);
							$this->line(60,$y,60,$yy);
							$this->line(105,$y,105,$yy);
							$this->line(155,$y,155,$yy);
							$this->line(211,$y,211,$yy);
							$this->line(270,$y,270,$yy);
							$this->line(10,$yy,270,$yy);

							$this->AddPage();

							$this->setFont("Arial","B",8);
							$this->SetTextColor(140,0,0);
							$this->SetY(25);
							$this->SetX(40);
							$this->cell(5,5,"ORGANISMO: ");
							$this->SetX(60);
							$this->SetTextColor(0,0,0);
							$this->cell(5,5,"GOBERNACION DEL ESTADO TACHIRA");
							$this->SetTextColor(140,0,0);
							$this->SetY(25);
							$this->SetX(130);
							$this->cell(5,5,"DEPENDENCIA: ");
							$this->SetX(153);
							$this->SetTextColor(0,0,0);
							$this->cell(5,5,$tbg->fields["nomcat"]);

							$this->line(10,32,270,32);
							$this->SetY(32);
							$y=32;
							$yi=32;
							$yp=32;
							$this->setFont("Arial","",7);
					}


				}
				if ($salto=="S")
				{
					$yy=max($yi,$yp)+2;
					$salto="N";
				}
				else
				{
					$yy=max($yi,$yp,$y1,$y2,$y3)+2;
				}
				$this->line(10,$y,10,$yy);
				$this->line(60,$y,60,$yy);
				$this->line(105,$y,105,$yy);
				$this->line(155,$y,155,$yy);
				$this->line(211,$y,211,$yy);
				$this->line(270,$y,270,$yy);
				$this->line(10,$yy,270,$yy);


			$tbg->MoveNext();
			}

		}
	}
?>
