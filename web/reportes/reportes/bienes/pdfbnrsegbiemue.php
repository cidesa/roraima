<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $acum=0;
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
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $numpol1;
		var $numpol2;
		var $fecreg1;
		var $fecreg2;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codubi=$_POST["codubi"];
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codmue1=$_POST["codmue1"];
			$this->codmue2=$_POST["codmue2"];
			$this->numpol1=$_POST["numpol1"];
			$this->numpol2=$_POST["numpol2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];

				$this->sql="SELECT
							SUBSTR(A.CODACT,1,10) as acodact,
							A.CODMUE as acodmue,
							B.DESMUE as adesmue,
							A.NROSEGMUE as anrosegmue,
							A.NOMSEGMUE as anomsegmue,
							to_char(A.FECSEGMUE,'dd/mm/yyyy') as afecsegmue,
							A.COBSEGMUE as acobsegmue,
							--A.MONSEGMUE as amonsegmue,
							C.monto as amonsegmue,
							to_char(A.FECSEGVEN,'DD/MM/YYYY') as afecsegven,
							A.PROSEGMUE as aprosegmue,
							A.OBSSEGMUE as aobssegmue,
							C.codcob
							FROM
							BNSEGMUE A,
							BNREGMUE B,
							bncobsegmue C
							WHERE    A.CODACT=C.CODACT  AND
                                     A.CODMUE=C.CODMUE and
                                     A.CODACT=B.CODACT AND
                                     A.CODMUE=B.CODMUE AND
                                     A.CODACT >= '".$this->codact1."' AND A.CODACT <= '".$this->codact2."' AND
							         (A.CODMUE) >= ('".$this->codmue1."') AND (A.CODMUE) <= ('".$this->codmue2."') AND
							         (A.NROSEGMUE) >= ('".$this->numpol1."') AND (A.NROSEGMUE) <= ('".$this->numpol2."') ORDER BY A.CODACT,A.CODMUE , A.NROSEGMUE";
//print '<pre>'; print $this->sql;


			$this->cab=new cabecera();

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			 $this->setFont("Arial","B",8);
		 		$this->setwidths(array(30,45,30,17,40,40,20,35));
		        $this->setaligns(array("C","C","C","C","C","C","C","C"));
		        $this->rowm(array("CODIGO DEL ACTIVO","DESCRIPCION","Nro DE POLIZA","FECHA","NOMBRE DE SEGURO","PROMOTOR","FECHA DE VEN.","OBSERVACIONES"));
				$this->Line(10,45,270,45);
			    $this->setFont("Arial","",8);

		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
            $ref="";
            $status=0;
            $tnis->total=0;
            $tnis->totalt=0;

			while(!$tb->EOF)
			{
				 if (($tb->fields["acodact"]."-".$tb->fields["acodmue"])!=$ref)
				 {
				 	if ( $status==1)
				 {
			     $this->setFont("Arial","B",10);
			     $this->setwidths(array(30,50));
                 $this->setaligns(array("C","R"));
                 $this->rowm(array("TOTAL...",H::FormatoMonto($tnis->total)));
                  $this->line(10,$this->getY(),270,$this->getY());
				 $tnis->total=0;
				 $this->ln();
				 }
				 $this->ln();
				 $this->setFont("Arial","",8);
                 $ref=$tb->fields["acodact"]."-".$tb->fields["acodmue"];
             /*    if($this->getY()>186){
				$this->addpage;
                $this->setFont("Arial","B",8);
		 		$this->setwidths(array(30,45,30,17,40,40,20,35));
		        $this->setaligns(array("C","C","C","C","C","C","C","C"));
		        $this->rowm(array("CODIGO DEL ACTIVO","DESCRIPCION","Nro DE POLIZA","FECHA","NOMBRE DE SEGURO","PROMOTOR","FECHA DE VEN.","OBSERVACIONES"));
				$this->Line(10,45,270,45);
			    $this->setFont("Arial","",8);
					 }*/
			     $this->setwidths(array(30,45,30,17,40,40,18,40));
                 $this->setaligns(array("C","L","C","C","C","L","L","L"));
                 $this->rowm(array($tb->fields["acodact"]."-".$tb->fields["acodmue"],$tb->fields["adesmue"],$tb->fields["anrosegmue"],$tb->fields["afecsegmue"],$tb->fields["anomsegmue"],$tb->fields["aprosegmue"],$tb->fields["afecsegven"]));
                // $this->ln();


		   	     $this->setFont("Arial","B",8);
                 $this->setwidths(array(200));
                 $this->setaligns(array("L"));
                 $this->rowm(array("OBSERVACIONES:"));
                 $this->setFont("Arial","",8);
                 $this->multicell(200,4,trim( $tb->fields["aobssegmue"]));
                 $this->ln();
                 $this->setFont("Arial","B",8);
                 if($this->getY()>186){
		   	     $this->addpage;
                 $this->setFont("Arial","B",8);
                 $this->cell(0,5,"CONTINUACION...");
                 $this->ln();
                 $this->setwidths(array(30,50));
                 $this->setaligns(array("C","R"));
                 $this->rowm(array("COBERTURA","MONTO"));
                 $this->setFont("Arial","",8);
                 }
                 $this->setwidths(array(30,50));
                 $this->setaligns(array("C","R"));
                 $this->rowm(array("COBERTURA","MONTO"));
                 $status=1;
                 $this->ln();

				 }
				 $this->setFont("Arial","",8);
			     if($this->getY()>186){
		   	     $this->addpage;
                 $this->setFont("Arial","B",8);
                 $this->cell(0,5,"CONTINUACION...");
                 $this->ln();
                 $this->setwidths(array(30,50));
                 $this->setaligns(array("C","R"));
                 $this->rowm(array("COBERTURA","MONTO"));
                 $this->setFont("Arial","",8);
                 }
				 $this->setwidths(array(30,50));
                 $this->setaligns(array("C","R"));
                 $this->rowm(array($tb->fields["codcob"],H::FormatoMonto($tb->fields["amonsegmue"])));
				 $tnis->total+=$tb->fields["amonsegmue"];
				 $tnis->totalt+=$tb->fields["amonsegmue"];
			     $tb->MoveNext();
				}
                 $this->setFont("Arial","B",10);
			     $this->setwidths(array(30,50));
                 $this->setaligns(array("C","R"));
                 $this->rowm(array("TOTAL...",H::FormatoMonto($tnis->total)));
				 $tnis->total=0;
				 $this->ln();
			     $this->setFont("Arial","B",12);
			     $this->setwidths(array(40,40));
                 $this->setaligns(array("C","R"));
                 $this->rowm(array("TOTAL GENERAL",H::FormatoMonto($tnis->totalt)));
				 $tnis->total=0;
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln();
		}
	}
?>