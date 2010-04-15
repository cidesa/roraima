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
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codart1;
		var $codart2;
		var $conf;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codart1=H::GetPost("codart1");
			$this->codart2=H::GetPost("codart2");
				$this->maxcodalm=H::GetPost("maxcodalm");
			$this->mincodalm=H::GetPost("mincodalm");

		$this->sql=	"
SELECT
                A.CODART as codart,
                (C.DESART) as desart,
		A.CODALM as codalm,
		C.UNIMED as unimed,
                a.exiact as exis
	FROM  caartalm A, CAREGART C
where
		(A.CODART)=(C.CODART) AND
		(a.CODART) >= ('".$this->codart1."') AND
		(a.CODART) <= ('".$this->codart2."') and
		a.codalm>= ('".$this->mincodalm."') and a.codalm<= ('".$this->maxcodalm."')
	GROUP BY A.CODALM,a.CODART,C.DESART,C.UNIMED , a.exiact order by A.codalm  ";

			$this->sql2="SELECT
							A.CODALM as codalm,
							A.NOMALM as nomalm,
							B.CODART as codart,
							B.CODUBI as codubi,
							(C.DESART) as desart,
							C.UNIMED as unimed, c.exitot as exis
						FROM  CADEFALM A, CAARTALM B,  CAREGART C
						WHERE
							(A.CODALM)=(B.CODALM) AND
							(B.CODART)=(C.CODART) AND
							(B.CODART) >= ('".$this->codart1."') AND
							(B.CODART) <= ('".$this->codart2."') and
							A.codalm>= ('".$this->mincodalm."') and A.codalm<= ('".$this->maxcodalm."')
						GROUP BY A.CODALM,A.NOMALM,B.CODART,B.CODUBI,C.DESART,C.UNIMED , c.exitot order by A.codalm  ";

						//print '<pre>';print $this->sql;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
					for($i=0;$i<$ncampos;$i++)
						{
							$this->cell($this->anchos[$i],10,$this->titulos[$i]);
						}
			$this->ln(5);
				$this->setFont("Arial","B",8);
				 $this->setwidths(array(25,80,18,20,18));
			 $this->setaligns(array("C","C","C","C","C"));
			 $this->rowm(array("Cod. Artículo",'Descripción Artículo','Almacen','Und. Medida','Cantidad'));
				/*

		    	$this->cell(20,2,"Cod. Artículo");
		    	$this->cell(5);
		    	$this->cell(60,2,'Descripción Artículo');
		    	$this->cell(15,2,'Almacen');
		    	$this->cell(15,2,'Ubicación');
		    	$this->cell(5);
				$this->cell(20,2,'Und. Medida');
				$this->cell(15,2,'Cant.');
				$this->cell(30,2,'Observaciones');*/
				$this->line(10,45,200,45);
				$this->Ln(3);

		}

		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$ref=" ";
			$x=0;
		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;

			while(!$tb->EOF)
			{
			  if($tb->fields["codalm"]!=$ref)
			  {
			  	$this->ln();
			  	$this->setFont("Arial","",8);
			 // 	$this->cell(25,3,$tb->fields["codart"]);
			  	$x=$this->GetX();
			  	//$y=$this->GetY();
			/*  	$this->cell(60,3);
			  	$this->cell(15,3,$tb->fields["codalm"]);
			  	$this->cell(20,3,$tb->fields["codubi"]);
			  	$this->cell(20,3,$tb->fields["unimed"]);*/
			  	$this->SetX($x);
			//	$this->MultiCell(60,3,$tb->fields["desart"]);
				$ref=$tb->fields["codalm"];

			 $this->setwidths(array(25,80,15,20,15));
			 $this->setaligns(array("C","L","C","C","R"));
			 $this->rowm(array($tb->fields["codart"],$tb->fields["desart"],$tb->fields["codalm"],$tb->fields["unimed"]));


			  }
			 else
			  {
			  	$this->ln();
			 // 	$this->cell(25,3,$tb->fields["codart"]);
			  	$x=$this->GetX();
			  	//$y=$this->GetY();
			  	$this->cell(60,3);
			  	//$this->cell(60,10,$tb->fields["desart"]);

			 /* 	$this->cell(15,3,$tb->fields["codalm"]);
			  	$this->cell(20,3,$tb->fields["codubi"]);
			  	$this->cell(20,3,$tb->fields["unimed"]);*/
			  	$this->SetX($x);
				//$this->MultiCell(60,3,$tb->fields["desart"]);

				// $this->setX(13);
			 $this->setwidths(array(25,80,15,20,15));
			 $this->setaligns(array("C","L","C","C","R"));
			 $this->rowm(array($tb->fields["codart"],$tb->fields["desart"],$tb->fields["codalm"],$tb->fields["unimed"]));


			  //	$ref=$tb->fields["codalm"];
			 }
			  $x=$this->GetX();
			  $y=$this->GetY();
			  //$this->cell(15,10,$x);
			  //$this->cell(20,10,$y);
			  if(($x==145.00125)&&($y==193))
			  {
			  	$this->ln(100);
			  }
			  else
			  {
			    //$this->ln();
			  }
			  $tb->MoveNext();

			}
		}
	}
?>