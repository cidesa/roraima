<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $result=0;
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
		var $ncta1;
		var $ncta2;
		var $tipcta1;
		var $tipcta2;
		var $saldo;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->ncta1=$_POST["ncta1"];
			$this->ncta2=$_POST["ncta2"];
			$this->tipcta1=$_POST["tipcta1"];
			$this->tipcta2=$_POST["tipcta2"];
			$this->saldo=$_POST["saldo"];

			$this->sql="
								SELECT
										A.NUMCUE as anumcue,
										A.NOMCUE as anomcue,
										A.TIPCUE as atipcue,
										A.CODCTA as acodcta,
										A.FECREG as afecreg,
										A.FECVEN as afecven,
										A.FECPER as afecper,
										A.RENAUT as arenaut,
										A.PORINT as aporint,
										A.TIPINT as atipint,
										A.NUMCHE as anumche,
										A.ANTBAN as aantban,
										A.DEBBAN as adebban,
										(A.ANTBAN+A.DEBBAN)-A.CREBAN as actual,
										(A.ANTLIB+A.DEBLIB)-A.CRELIB as actual2,
										A.CREBAN as acreban,
										A.ANTLIB as aantlib,
										A.DEBLIB as adeblib,
										A.CRELIB as acrelib,
										A.VALCHE as avalche,
										A.CONCIL as aconcil,
										A.PLAZO as aplazo,
										B.DESTIP as adestip,
										F.NOMINS as anomis
								from
										TSDEFBAN A,
										TSTIPCUE B,
										BNDEFINS F
								WHERE
										A.TIPCUE = B.CODTIP  AND
										A.TIPCUE >= RPAD('".$this->tipcta1."',3,' ') AND
										A.TIPCUE <= RPAD('".$this->tipcta2."',3,' ') AND
										RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->ncta1."',20,' ') AND
										RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->ncta2."',20,' ')
								GROUP BY
										A.NUMCUE,
										A.NOMCUE,
										A.TIPCUE,
										A.CODCTA,
										A.FECREG,
										A.FECVEN,
										A.FECPER,
										A.RENAUT,
										A.PORINT,
										A.TIPINT,
										A.NUMCHE,
										A.ANTBAN,
										A.DEBBAN,
										A.CREBAN,
										A.ANTLIB,
										A.DEBLIB,
										A.CRELIB,
										A.VALCHE,
										A.CONCIL,
										A.PLAZO,
										B.DESTIP,
										F.NOMINS
								ORDER BY
										A.NUMCUE";


			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}

		}



		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    #$this->bd->validar();
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

			while(!$tb->EOF)
			{
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Numero de Cuenta   ");
 		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb->fields["anumcue"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                              Nombre Cuenta  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                   ".$tb->fields["anomcue"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Uso Cuenta  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb->fields["ausocue"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Tipo Cuenta  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb->fields["atipcue"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                              Descripción Cuenta  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                              ".$tb->fields["adestip"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Código Contable  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"         ".$tb->fields["acodcta"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                              Fecha Apertura  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                              ".$tb->fields["afecape"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Fecha Inicio de Periodo             ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                    ".$tb->fields["afecper"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                              Renovación Automatica  ");
		 		 $this->setFont("Arial","",8);
				 if ($tb->fields["arenaut"]=='s'){$arre="Si";}
				 if ($tb->fields["arenaut"]=='n'){$arre="No";}
				 $this->cell(20,4,"                                                                                   ".$arre);
		 		 $this->setFont("Arial","B",8);
				 if ($tb->fields["aconcil"]=='s'){$conci="Si";}
				 if ($tb->fields["aconcil"]=='n'){$conci="No";}
				 $this->cell(20,4,"                                                                   Conciliable  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                 ".$conci);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"Fecha Fin de Periodo             ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                    ".$tb->fields["afecven"]);
				 $this->ln();
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,3,"                                                                                                                                                                Saldo de la Cuenta  ");
 				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,3,"Validez Cheque  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,3,"         ".$tb->fields["avalche"]."dias");
				 $this->ln();
		  	     $this->Line(97,$this->GetY(),198,$this->GetY());
		  	     $this->Line(97,$this->GetY()+22,198,$this->GetY()+22);
		  	     $this->Line(97,$this->GetY()+28,198,$this->GetY()+28);
 		  	     $this->Line(97,$this->GetY(),97,$this->GetY()+28);
 		  	     $this->Line(122,$this->GetY(),122,$this->GetY()+28);
 		  	     $this->Line(163,$this->GetY(),163,$this->GetY()+28);
 		  	     $this->Line(198,$this->GetY(),198,$this->GetY()+28);
				 $this->ln();
		  	     $this->Line(14,$this->GetY(),93,$this->GetY());
		  	     $this->Line(14,$this->GetY(),14,$this->GetY()+20);
		  	     $this->Line(93,$this->GetY(),93,$this->GetY()+20);
		  	     $this->Line(14,$this->GetY()+20,93,$this->GetY()+20);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,2,"                                                                                                                                                            Bancos  ");
				 $this->cell(20,2,"                                                                                                                                                                                       Libros  ");
				 $this->ln();
				 $this->ln();
				 $this->cell(20,4,"          Intereses Ganados  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                     ".$tb->fields["aantban"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                              Saldo Anterior  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                              ".$tb->fields["aantban"]);
				 $this->cell(20,4,"                                                                                                       ".$tb->fields["aantlib"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                                                                                 Débitos  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                                                                                  ".$tb->fields["adebban"]);
				 $this->cell(20,4,"                                                                                                                                                          ".$tb->fields["adeblib"]);
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"           Tipo Rendimiento  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                     ".$tb->fields["tipo_rendimiento"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                              Créditos  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                               ".$tb->fields["acreban"]);
				 $this->cell(20,4,"                                                                                                       ".$tb->fields["acrelib"]);
				 $this->ln();
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                                                                                                 Saldo Actual  ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                                                                                                                                  ".$tb->fields["actual"]);
				 $this->cell(20,4,"                                                                                                                                                          ".$tb->fields["actual2"]);
				 $this->ln();
				 $this->ln();
				 $this->ln();
				 $this->SetLineWidth(0.4);
	   	         $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->ln();
				 $this->ln();
				 $tb->MoveNext();
				}
		}

	}
?>