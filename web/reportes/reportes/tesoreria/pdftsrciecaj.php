<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $numcuedes;
		var $numcuehas;
		var $meses;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->numcuedes=$_POST["numcuedes"];
			$this->numcuehas=$_POST["numcuehas"];
			$this->meses=$_POST["meses"];

			$this->sql="select
							a.numcue,
							a.nomcue,
							a.codcta,
							b.tipmov,
							b.reflib,
							b.deslib,
							b.feclib,
							to_char(b.feclib,'dd/mm/yyyy') as feclib,
							(case when c.debcre='D' then b.monmov else 0 end) as debitos ,
							(case when c.debcre='C' then b.monmov else 0 end) as creditos,
							a.antlib
						from
							tsdefban a, tsmovlib b, tstipmov c
						where
							rtrim(a.numcue) = rtrim(b.numcue) and
							rtrim(b.tipmov)=rtrim(c.codtip) and
							rtrim(a.numcue) >= rtrim('".$this->numcuedes."') and
							rtrim(a.numcue) <= rtrim('".$this->numcuehas."') and
							to_char(b.feclib,'mm')=rtrim('".$this->meses."')
							order by a.numcue,b.feclib";

				//	print $this->sql;
		}

		/*

  SELECT FECINI INTO :FECHADES
  FROM CONTABA;

  SELECT FECCIE INTO :FECHAHAS
  FROM CONTABA;

		*/
		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
		/*	$this->setFont("Arial","B",9);
			$this->cell(40,5,'Cuenta Bancaria');
			$this->cell(120,5,'Banco');
			$this->cell(30,5,'Monto',0,0,'R');
			$this->ln(4);
			$this->line(10,$this->getY(),210,$this->getY());*/

		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
  		     $this->sql3="select to_char(fecini,'yyyy') as fecini from contaba";
			 $tb=$this->bd->select($this->sql);
				 $anos=$tb->fields["fecini"];
			     $fechades="01/01/".$anos;
				 $fechahas="31/12/".$anos;
				 $mesant=$this->meses-1;

		    $tb=$this->bd->select($this->sql);
		    $this->bd->validar();
			 while(!$tb->EOF){

				 $sum_deb=0;
				 $sum_cre=0;
				 $salant=0;
				 $y=$this->Gety();
				 if ($y>=220)
					{
						$this->Addpage();
					}
				$this->setFont("Arial","B",8);
 				 $numcue=$tb->fields["numcue"];
			     $this->cell(20,6,"Banco :");
				 $this->cell(50,6,$tb->fields["nomcue"]);
				 $this->ln();
				 $this->cell(20,6,"Nro de Cuenta  :");
				 $this->cell(50,6, "   ".$tb->fields["numcue"]);
				 $this->ln();
				 $this->line(10,$this->getY(),200,$this->getY());

				 $this->cell(17,6,"Fecha");
				 $this->cell(17,6,"Referencia");
				 $this->cell(95,6,"Descripción");
				 $this->cell(10,6,"Tipo");
				 $this->cell(25,6,"Débitos");
				 $this->cell(25,6,"Créditos");
				 $this->ln();
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(159,6,"Saldo Anterior...",0,0,'R');
						//Saldo Anterior
						if ($this->meses=='01')
						{
							$salant=$tb->fields["antlib"];
						}else
						{
							 $this->sql2="select salact from contabb1 where fecini='".fechades."' and feccie='".fechahas."' and rtrim(codcta)=rtrim('".$tb->fields["codcta"]."')
											and rtrim(perefe)=rtrim($mesant)";
							 $tb1=$this->bd->select($this->sql2);

							$salant=$tb1->fields["antlib"];
						}

						//print 		$this->sql2; exit;
						 $this->cell(31,6,number_format($salant,2,'.',','),0,0,'R');
				     $this->ln();
// del segundo en adelante
					while($tb->fields["numcue"]==$numcue){
						 $y=$this->GetY();
							 if ($y>220)
							{
								$this->AddPage();
 							$this->setFont("Arial","B",8);
							$this->cell(17,6,"Fecha");
							 $this->cell(17,6,"Referencia");
							 $this->cell(95,6,"Descripción");
							 $this->cell(10,6,"Tipo");
							 $this->cell(25,6,"Débitos");
							 $this->cell(25,6,"Créditos");
							 $this->ln();
							 $this->line(10,$this->getY(),200,$this->getY());
							 $this->cell(159,6,"Saldo Anterior...",0,0,'R');
									//Saldo Anterior
									if ($this->meses=='01')
									{
										$salant=$tb->fields["antlib"];
									}else
									{
										 $this->sql2="select salact from contabb1 where fecini='".fechades."' and feccie='".fechahas."' and rtrim(codcta)=rtrim('".$tb->fields["codcta"]."')
														and rtrim(perefe)=rtrim($mesant)";
										 $tb1=$this->bd->select($this->sql2);

										$salant=$tb1->fields["antlib"];
									}

						//print 		$this->sql2; exit;
						 $this->cell(31,6,number_format($salant,2,'.',','),0,0,'R');
				     $this->ln();

							}

						 $this->setFont("Arial","",8);
						 $numcue=$tb->fields["numcue"];
						 $this->cell(17,6,$tb->fields["feclib"]);
						 $this->cell(17,6,$tb->fields["reflib"]);

						 $y=$this->GetY();
						 $this->setXY(45,$y+2);
						$this->Multicell(90,3,$tb->fields["deslib"]); //Beneficiario
						$this->ln(2);
						// $this->setY($y+1);
						 $this->setXY(140,$y);
						 $this->cell(10,6,$tb->fields["tipmov"]);
						 $this->cell(25,6,number_format($tb->fields["debitos"],2,'.',','),0,0,'R');
						 $this->cell(25,6,number_format($tb->fields["creditos"],2,'.',','),0,0,'R');
						 $sum_deb=$sum_deb + $tb->fields["debitos"];
						 $sum_cre=$sum_cre + $tb->fields["creditos"];

						 $this->ln(11);
					  $tb->MoveNext();
			  		}

				//	$tb->MoveNext();

	 				$this->cell(130,6," ");
	 				$this->cell(25,6,"---------------------------------------------------------------");
					$this->ln(4);
					$this->setFont("Arial","B",8);
					$this->cell(139,6,"Totales...  ",0,0,'R');
					$this->cell(25,6,number_format($sum_deb,2,'.',','),0,0,'R');
					$this->cell(25,6,number_format($sum_cre,2,'.',','),0,0,'R');
					$this->ln(4);
					$this->cell(139,6," ",0,0,'R');
					$this->cell(25,6,"Saldo Actual...");
					$this->cell(25,6,number_format($salant+$sum_deb-$sum_cre,2,'.',','),0,0,'R');
					$this->ln(5);
					$this->line(10,$this->getY(),200,$this->getY());
					 $y=$this->GetY();
							 if ($y>100)
							{
								$this->AddPage();
							}


  		  	  }
		}
	}
?>