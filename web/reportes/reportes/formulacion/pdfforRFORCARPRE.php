<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $sqla;
		var $sqla2;
		var $sqlb;
		var $sqlg;
		var $sqlg2;
		var $rep;
		var $cab;
		var $titulo;
		var $agr;
		var $filtro;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;	
		var $cantcat=0;
		var $loncat=0;
		var $cancat=0;
		var $lonpar=0;
		var $canpar=0;
		var $nombre=array();
		var $nombre2=array();
		var $lon=array();
		var $lon2=array();
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->agr=$_POST["agr"];
			$this->filtro=$_POST["filtro"];
            $this->titulo=$_POST["titulo"];
			//buscamos nombre del grupo
			$sq="select nomext,lonniv from forniveles where catpar='C' and consec <= ".$this->agr." order by consec";
			$t=$this->bd->select($sq);
			$i=0;
			while (!$t->EOF)		
			{
				$this->nombre[$i] = $t->fields["nomext"];
				$this->lon[$i] = $t->fields["lonniv"];
				
			$i++;	
			$t->MoveNext();	
			}
			$this->nombre[1];
			
			//sacamos cuanto es la longitud de la cat y cuantas son
			$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma, count(catpar) as cont
						from forniveles
						where catpar='C'";
			$tba=$this->bd->select($this->sqla);
			$this->loncat=$tba->fields["suma"];
			$this->cancat=$tba->fields["cont"];
			
			// sacamos hasta donde vamos a agrupar las categorias
			$this->sqlb="select sum(lonniv) + (count(catpar)-1) as agrup
						from forniveles
						where catpar='C' and consec <= '".$this->agr."'";
			$tbb=$this->bd->select($this->sqlb);		
			$this->agrup=$tbb->fields["agrup"];

			
			$this->sqlg="select substr(a.codcat,1,".$this->agrup.") as cat,a.codcar,a.nomcar,b.codtip,moncar,
						sum(a.canasi) as asi,sum(a.canvac) as vac
						
						from forcarpre a, npcargos b
						where a.codcar=b.codcar
						
						group by substr(a.codcat,1,".$this->agrup."),a.codcar,a.nomcar,b.codtip,moncar
						order by substr(a.codcat,1,".$this->agrup.")";
						
		}
		

		function Header()
		{
			/////////////////////
			$this->Image("../../img/logo_1.jpg",10,8,33);
			
			$sql="select nomext from forniveles where consec=".$this->agr." ";
			$tb=$this->bd->select($sql);
			
			$this->Rect(10,10,190,30);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			$this->SetX(45);
			$this->cell(5,5,"JOSE FELIX RIBAS");
			$this->SetY(13);
			$this->SetX(45);
			$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->setFont("Arial","",7);
			$this->SetY(11);
			$this->SetX(184);
			$this->cell(5,5,"FECHA");
			$this->setFont("Arial","",8);
			$this->SetY(15);
			$this->SetX(183);
			$this->cell(5,5,date('d/m/y'));
			$this->setFont("Arial","B",14);
			$this->SetY(22);
			$this->SetX(52);
			$this->Multicell(105,4,$this->titulo,0,"C");
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(10);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(30);
			$this->cell(5,5,date('Y'));
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(185);
			$this->cell(5,5,"Pag. ".$this->PageNo());
			
			$this->SetY(35);
			$this->setFont("Arial","B",7);
			$this->SetTextColor(140,0,0);
			$this->SetX(130);
			$this->cell(5,5,"Agrupado por: ");
			$this->SetX(150);
			$this->SetTextColor(0,0,0);
			$this->cell(5,5,trim($tb->fields["nomext"]));
			/////////////////////

			$this->ln(7); 
			
		}
		function Cuerpo()
		{
			
		    $tbg=$this->bd->select($this->sqlg);
			$tbg2=$this->bd->select($this->sqlg);
			$this->setFont("Arial","B",7);
			$primera="S";
			
			$acumcarasi=0;
			$acumcarvac=0;
			$acumsueldo=0;
			$acumtotcar=0;
			$acumtotmonto=0;
			
			
			if (!$tbg2->EOF)
			{
				$cate=trim($tbg2->fields["cat"]);
				
				//PINTA TITULOS
				$this->Line(10,42,200,42);
				$this->Line(10,42,10,53);
				$this->Line(200,42,200,53);
				$this->Line(10,53,200,53);
				
				$i=count($this->nombre);
				$categoria= array();
				$categoria=split("-",trim($tbg2->fields["cat"]));
				$cat="";
				$x=32;
				for ($j=0;$j<$i;$j++)
				{
					if ($j==0)
					{
						$cat=$categoria[$j];
						$this->setFont("Arial","B",7);
					}
					else
					{
						$cat=$cat."-".$categoria[$j];
						$this->setFont("Arial","",7);
					}
					$this->cell(5,5,strtoupper($this->nombre[$j]).": ");
					$sql="select codcat,nomcat from fordefcatpre where trim(codcat)=trim('".$cat."')";
					$tb=$this->bd->select($sql);
					$this->SetX($x);
					$this->cell(5,5,trim(substr($tb->fields["codcat"],strlen(trim($tb->fields["codcat"]))-$this->lon[$j],strlen(trim($tb->fields["codcat"]))))."    ".strtoupper($tb->fields["nomcat"]));
					$this->ln(3);
					$x=$x+5;
				}	
				/////////////////////////
				/////////////////////////
				$this->Rect(10,54,190,8);
				$this->Line(24,54,24,62);
				$this->Line(92,54,92,62);
				$this->Line(104,54,104,62);
				$this->Line(116,54,116,62);
				$this->Line(139,54,139,62);
				$this->Line(153,54,153,62);
				
				//letras
				$this->SetY(55);
				$this->SetX(9);
				$this->setFont("Arial","B",6);
				$this->Multicell(15,3,"Código Cargo",0,"C");
				
				$this->SetY(58);
				$this->SetX(27);
				$this->setFont("Arial","B",6);
				$this->Multicell(60,3,"Nombre Cargo",0,"C");
				
				$this->SetY(55);
				$this->SetX(90);
				$this->setFont("Arial","B",6);
				$this->Multicell(16,3,"Nº Cargos Asignados",0,"C");
				
				$this->SetY(55);
				$this->SetX(102);
				$this->setFont("Arial","B",6);
				$this->Multicell(16,3,"Nº Cargos Vacantes",0,"C");
				
				$this->SetY(55);
				$this->SetX(117);
				$this->setFont("Arial","B",6);
				$this->Multicell(20,2,"Monto Bs. Presupuestado por Cargo",0,"C");
				
				$this->SetY(55);
				$this->SetX(138);
				$this->setFont("Arial","B",6);
				$this->Multicell(15,3,"Nº Total Cargos",0,"C");
				
				$this->SetY(58);
				$this->SetX(154);
				$this->setFont("Arial","B",6);
				$this->Multicell(45,3,"Monto Bs. Total Presupuestado",0,"C");
				
				$this->ln(1);
				/////////////////////////
			}
			
			while (!$tbg->EOF)
			{
			
				if ($tbg->fields["cat"] != $cate)
				{
						$this->ln();
						$this->setFont("Arial","B",7);
						
						$this->SetX(96);
						$this->cell(5,5,intval($acumcarasi),0,0,"C");
						
						$this->SetX(108);
						$this->cell(5,5,intval($acumcarvac),0,0,"C");
						
						$this->SetX(134);
						$this->cell(5,5,number_format($acumsueldo,2,'.',','),0,0,"R");
						
						$this->SetX(144);
						$this->cell(5,5,intval($acumtotcar),0,0,"C");
						
						$this->SetX(195);
						$this->cell(5,5,number_format($acumtotmonto,2,'.',','),0,0,"R");
						
						$this->Line(10,$this->GetY()-4,10,$this->GetY()+5);
						$this->Line(24,$this->GetY()-4,24,$this->GetY());
						$this->Line(92,$this->GetY()-4,92,$this->GetY()+5);
						$this->Line(104,$this->GetY()-4,104,$this->GetY()+5);
						$this->Line(116,$this->GetY()-4,116,$this->GetY()+5);
						$this->Line(139,$this->GetY()-4,139,$this->GetY()+5);
						$this->Line(153,$this->GetY()-4,153,$this->GetY()+5);
						$this->Line(200,$this->GetY()-4,200,$this->GetY()+5);
						//
						$this->line(10,$this->GetY(),200,$this->GetY());
						$this->line(10,$this->GetY()+5,200,$this->GetY()+5);
						
						$this->SetX(75);
						$this->cell(5,5,"TOTALES");
				
						$acumcarasi=0;
						$acumcarvac=0;
						$acumsueldo=0;
						$acumtotcar=0;
						$acumtotmonto=0;
				
						$this->AddPage();
					
						//PINTA TITULOS
						$this->Line(10,42,200,42);
						$this->Line(10,42,10,53);
						$this->Line(200,42,200,53);
						$this->Line(10,53,200,53);
						
						$i=count($this->nombre);
						$categoria= array();
						$categoria=split("-",trim($tbg->fields["cat"]));
						$cat="";
						$x=32;
						for ($j=0;$j<$i;$j++)
						{
							if ($j==0)
							{
								$cat=$categoria[$j];
								$this->setFont("Arial","B",7);
							}
							else
							{
								$cat=$cat."-".$categoria[$j];
								$this->setFont("Arial","",7);
							}
							$this->cell(5,5,strtoupper($this->nombre[$j]).": ");
							$sql="select codcat,nomcat from fordefcatpre where trim(codcat)=trim('".$cat."')";
							$tb=$this->bd->select($sql);
							$this->SetX($x);
							$this->cell(5,5,trim(substr($tb->fields["codcat"],strlen(trim($tb->fields["codcat"]))-$this->lon[$j],strlen(trim($tb->fields["codcat"]))))."    ".strtoupper($tb->fields["nomcat"]));
							$this->ln(3);
							$x=$x+5;
						}	
						/////////////////////////
						/////////////////////////
						$this->Rect(10,54,190,8);
						$this->Line(24,54,24,62);
						$this->Line(92,54,92,62);
						$this->Line(104,54,104,62);
						$this->Line(116,54,116,62);
						$this->Line(139,54,139,62);
						$this->Line(153,54,153,62);
						
						//letras
						$this->SetY(55);
						$this->SetX(9);
						$this->setFont("Arial","B",6);
						$this->Multicell(15,3,"Código Cargo",0,"C");
						
						$this->SetY(58);
						$this->SetX(27);
						$this->setFont("Arial","B",6);
						$this->Multicell(60,3,"Nombre Cargo",0,"C");
						
						$this->SetY(55);
						$this->SetX(90);
						$this->setFont("Arial","B",6);
						$this->Multicell(16,3,"Nº Cargos Asignados",0,"C");
						
						$this->SetY(55);
						$this->SetX(102);
						$this->setFont("Arial","B",6);
						$this->Multicell(16,3,"Nº Cargos Vacantes",0,"C");
						
						$this->SetY(55);
						$this->SetX(117);
						$this->setFont("Arial","B",6);
						$this->Multicell(20,2,"Monto Bs. Presupuestado por Cargo",0,"C");
							
						$this->SetY(55);
						$this->SetX(138);
						$this->setFont("Arial","B",6);
						$this->Multicell(15,3,"Nº Total Cargos",0,"C");
						
						$this->SetY(58);
						$this->SetX(154);
						$this->setFont("Arial","B",6);
						$this->Multicell(45,3,"Monto Bs. Total Presupuestado",0,"C");
						
						$this->ln(1);
						/////////////////////////
						
				}
			/////////
			//DETALLE
			/////////
			$cate=$tbg->fields["cat"];
			
				if ($this->GetY()>=245)
				{
						$this->line(10,$this->GetY()+1,200,$this->GetY()+1);
						$this->AddPage();
					
						//PINTA TITULOS
						$this->Line(10,42,200,42);
						$this->Line(10,42,10,53);
						$this->Line(200,42,200,53);
						$this->Line(10,53,200,53);
						
						$i=count($this->nombre);
						$categoria= array();
						$categoria=split("-",trim($tbg->fields["cat"]));
						$cat="";
						$x=32;
						for ($j=0;$j<$i;$j++)
						{
							if ($j==0)
							{
								$cat=$categoria[$j];
								$this->setFont("Arial","B",7);
							}
							else
							{
								$cat=$cat."-".$categoria[$j];
								$this->setFont("Arial","",7);
							}
							$this->cell(5,5,strtoupper($this->nombre[$j]).": ");
							$sql="select codcat,nomcat from fordefcatpre where trim(codcat)=trim('".$cat."')";
							$tb=$this->bd->select($sql);
							$this->SetX($x);
							$this->cell(5,5,trim(substr($tb->fields["codcat"],strlen(trim($tb->fields["codcat"]))-$this->lon[$j],strlen(trim($tb->fields["codcat"]))))."    ".strtoupper($tb->fields["nomcat"]));
							$this->ln(3);
							$x=$x+5;
						}	
						/////////////////////////
						/////////////////////////
						$this->Rect(10,54,190,8);
						$this->Line(24,54,24,62);
						$this->Line(92,54,92,62);
						$this->Line(104,54,104,62);
						$this->Line(116,54,116,62);
						$this->Line(139,54,139,62);
						$this->Line(153,54,153,62);
						
						//letras
						$this->SetY(55);
						$this->SetX(9);
						$this->setFont("Arial","B",6);
						$this->Multicell(15,3,"Código Cargo",0,"C");
						
						$this->SetY(58);
						$this->SetX(27);
						$this->setFont("Arial","B",6);
						$this->Multicell(60,3,"Nombre Cargo",0,"C");
						
						$this->SetY(55);
						$this->SetX(90);
						$this->setFont("Arial","B",6);
						$this->Multicell(16,3,"Nº Cargos Asignados",0,"C");
						
						$this->SetY(55);
						$this->SetX(102);
						$this->setFont("Arial","B",6);
						$this->Multicell(16,3,"Nº Cargos Vacantes",0,"C");
						
						$this->SetY(55);
						$this->SetX(117);
						$this->setFont("Arial","B",6);
						$this->Multicell(20,2,"Monto Bs. Presupuestado por Cargo",0,"C");
						
						$this->SetY(55);
						$this->SetX(138);
						$this->setFont("Arial","B",6);
						$this->Multicell(15,3,"Nº Total Cargos",0,"C");
						
						$this->SetY(58);
						$this->SetX(154);
						$this->setFont("Arial","B",6);
						$this->Multicell(45,3,"Monto Bs. Total Presupuestado",0,"C");
						
						$this->ln(1);
						/////////////////////////
			
				}
			
			$this->setFont("Arial","",7);
			$this->SetX(12);
			$this->cell(5,5,$tbg->fields["codcar"]);
			
			$this->SetX(24);
			$this->setFont("Arial","",6);
			$this->cell(5,5,substr($tbg->fields["nomcar"],0,50));
			$this->setFont("Arial","",7);
			
			$this->SetX(96);
			$this->cell(5,5,intval($tbg->fields["asi"]),0,0,"C");
			
			$this->SetX(108);
			$this->cell(5,5,intval($tbg->fields["vac"]),0,0,"C");
			
			$this->SetX(134);
			$this->cell(5,5,number_format($tbg->fields["moncar"],2,'.',','),0,0,"R");
			
			$this->SetX(144);
			$this->cell(5,5,intval($tbg->fields["vac"]+$tbg->fields["asi"]),0,0,"C");
			
			$this->SetX(195);
			$this->cell(5,5,number_format(($tbg->fields["moncar"]*($tbg->fields["vac"]+$tbg->fields["asi"])),2,'.',','),0,0,"R");
			
			$acumcarasi = $acumcarasi + $tbg->fields["asi"];
			$acumcarvac = $acumcarvac + $tbg->fields["vac"];
			$acumsueldo = $acumsueldo + $tbg->fields["moncar"];
			$acumtotcar = $acumtotcar + ($tbg->fields["vac"]+$tbg->fields["asi"]);
			$acumtotmonto = $acumtotmonto + ($tbg->fields["moncar"]*($tbg->fields["vac"]+$tbg->fields["asi"]));
			
			$this->Line(10,$this->GetY(),10,$this->GetY()+5);
			$this->Line(24,$this->GetY(),24,$this->GetY()+5);
			$this->Line(92,$this->GetY(),92,$this->GetY()+5);
			$this->Line(104,$this->GetY(),104,$this->GetY()+5);
			$this->Line(116,$this->GetY(),116,$this->GetY()+5);
			$this->Line(139,$this->GetY(),139,$this->GetY()+5);
			$this->Line(153,$this->GetY(),153,$this->GetY()+5);
			$this->Line(200,$this->GetY(),200,$this->GetY()+5);
			
			$this->ln(4);
			
			$tbg->MoveNext();
			}
			
		$this->ln();
		$this->setFont("Arial","B",7);
		
		$this->SetX(96);
		$this->cell(5,5,intval($acumcarasi),0,0,"C");
		
		$this->SetX(108);
		$this->cell(5,5,intval($acumcarvac),0,0,"C");
		
		$this->SetX(134);
		$this->cell(5,5,number_format($acumsueldo,2,'.',','),0,0,"R");
		
		$this->SetX(144);
		$this->cell(5,5,intval($acumtotcar),0,0,"C");
		
		$this->SetX(195);
		$this->cell(5,5,number_format($acumtotmonto,2,'.',','),0,0,"R");
		
		$this->Line(10,$this->GetY()-4,10,$this->GetY()+5);
		$this->Line(24,$this->GetY()-4,24,$this->GetY());
		$this->Line(92,$this->GetY()-4,92,$this->GetY()+5);
		$this->Line(104,$this->GetY()-4,104,$this->GetY()+5);
		$this->Line(116,$this->GetY()-4,116,$this->GetY()+5);
		$this->Line(139,$this->GetY()-4,139,$this->GetY()+5);
		$this->Line(153,$this->GetY()-4,153,$this->GetY()+5);
		$this->Line(200,$this->GetY()-4,200,$this->GetY()+5);
		//
		$this->line(10,$this->GetY(),200,$this->GetY());
		$this->line(10,$this->GetY()+5,200,$this->GetY()+5);
		
		$this->SetX(75);
		$this->cell(5,5,"TOTALES");
			
			
		}
	}
?>
