<?
	require_once("../../lib/general/fpdf/fpdf.php");
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
		var $sql3;
		var $sql4;
		var $sql5;
		var $sql6;
		var $numcue;
		var $antlib;
		var $sal;
		var $rep;
		var $numero;
		var $cab;
		var $fecha1;
		var $fecha2;


		var $cta1;
		var $cta2;

		var $mov1;
		var $mov2;

		var $ref1;
		var $ref2;

		var $fechat1;
		var $fechat2;

		var $fecham1;
		var $fecham2;

		var $deb;
		var $cre;
		var $mes;
		var $estatus;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumcre=0;
		var $acumseg=0;
		var $cont=0;
		var $cont2=0;
		var $sta1;
		var $sta2;
		var $sta3;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cta1=$_POST["cta1"];
			$this->cta2=$_POST["cta2"];
			$this->mov1=$_POST["mov1"];
			$this->mov2=$_POST["mov2"];
			$this->ref1=$_POST["ref1"];
			$this->ref2=$_POST["ref2"];
			$this->fechat1=$_POST["fechat1"];
			$this->fechat2=$_POST["fechat2"];
			$this->fecham1=$_POST["fecham1"];
			$this->fecham2=$_POST["fecham2"];
			$this->estatus=strtoupper($_POST["status"]);


			///Verificar Status
			$this->verificar_status();

				$this->sql="SELECT
							C.DEBCRE,
							b.HORING,
							(B.TIPMOV)as TIPMOV,
							B.REFLIB,
							B.DESLIB,
							to_char(B.feclib,'dd/mm/yyyy') as feclib,
							B.NUMCUE,
							B.ORDEN,
							to_char(B.FECING,'dd/mm/yyyy') as fecing,
							B.STATUS,
							(case when C.DEBCRE='D' then B.MONMOV else 0 end) as DEBITOS,
							(case when C.DEBCRE='C' then B.MONMOV else 0 end) as CREDITOS
							FROM
							TSMOVLIB B,
							TSTIPMOV C
							WHERE
							(B.TIPMOV)=(C.CODTIP) AND
							(B.NUMCUE) = rpad('".$this->cta1."',20,' ') AND
							(B.TIPMOV) >=rpad('".$this->mov1."',4,' ')  AND
							(B.TIPMOV) <= rpad('".$this->mov2."',4,' ')  AND
							(B.REFLIB) >= rpad('".$this->ref1."',20,' ')  AND
							(B.REFLIB) <= rpad('".$this->ref2."',20,' ')  AND
							B.FECING >=  to_date('".$this->fecham1."','dd/mm/yyyy')AND
							B.FECING <=  to_date('".$this->fecham2."','dd/mm/yyyy') AND
							(B.STATUS  = '".$this->sta1."' or
						     B.STATUS  = '".$this->sta2."' or
						     B.STATUS  = '".$this->sta3."')
							ORDER BY B.FECLIB,B.REFLIB,B.FECING,B.HORING,C.DEBCRE DESC";

				$this->cab=new cabecera();

		}

			function verificar_status()
		{
			if ($this->estatus=='T')
			{  //TODOS
				  $this->sta1='A';
				  $this->sta2='C';
				  $this->sta3='N';
			}else if ($this->estatus=='A')
			{  //ANULADOS
				  $this->sta1='A';
				  $this->sta2='A';
				  $this->sta3='A';
			}else if ($this->estatus=='C')
			{  //Contabilizados
				  $this->sta1='C';
				  $this->sta2='C';
				  $this->sta3='C';
			}else if ($this->estatus=='N')
			{  //No Contabilizados
				  $this->sta1='N';
				  $this->sta2='N';
				  $this->sta3='N';
			}else if ($this->estatus=='TA')
			{  //Todos menos anulados
				  $this->sta1='C';
				  $this->sta2='C';
				  $this->sta3='N';
			}

			return true;
		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);

			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",8);
			$this->cell(12,5,"Banco");


			$this->ln();
			$this->cell(20,5,"Nro. Cuenta");
			$this->cell(100,5,$this->cta1."   ".$enlace);
			$this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
			$this->SetTextColor(0,0,0);
			$this->ln();
			$this->cell(10,5,"Correl");
			$this->cell(18,5,"Emisión");
			$this->cell(18,5,"Registro");
			$this->cell(18,5,"Pagado");

			$this->cell(8,5,"Tipo");
			$this->cell(20,5,"Referencia");
			$this->cell(90,5,"Descripción");
			$this->cell(30,5,"         Debitos");
			$this->cell(30,5,"      Creditos");
			$this->cell(30,5,"Saldo Actual");
			$this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
			$this->ln(6);
			//$this->SetFillColor(255,255,255);


			  $sql="SELECT ANTLIB as anterior,NOMCUE as nombre,DESENL as enlace
					  FROM TSDEFBAN
					  WHERE NUMCUE=rpad('".$this->cta1."',20,' ')";
			   $tbN=$this->bd->select($sql);



			   if (!$tbN->EOF)
			    {
			      $anterior=$tbN->fields["anterior"];
				  $nombre=$tbN->fields["nombre"];
				  $enlace=$tbN->fields["enlace"];
				   //nombre del banco
				$this->setFont("Arial","B",8);
					$this->SetTextColor(0,0,128);
					$this->SetXY(30,37);
					 $this->cell(10,5,substr(strtoupper($nombre),0,100));
					 $this->SetY(55);
					$this->SetTextColor(0,0,0);

			    }

		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    #$this->bd->validar();


			$this->cont=0;
			$salant=0;

			   $sqlSA="SELECT coalesce(SUM((case when A.DEBCRE='D' then B.MONMOV else 0 end)),0) as deblibpos,
					   		  coalesce(SUM((case when A.DEBCRE='C' then B.MONMOV else 0 end)),0) as crelibpos
						FROM   TSTIPMOV A,
							   TSMOVLIB B,
							   CONTABA C
						WHERE  B.NUMCUE = rpad('".$this->cta1."',20,' ') AND
							   B.TIPMOV = A.CODTIP AND
							   B.FECLIB< to_date('".$this->fecham2."','dd/mm/yyyy')";
			  $tbSA=$this->bd->select($sqlSA);
			   if (!$tbSA->EOF)
			   {
			       $salant=$anterior + ($tbSA->fields["deblibpos"]-$tbSA->fields["crelibpos"]);
			   }
			    $this->cell(10,5,"");
			    $this->cell(18,5,"");
				$this->cell(18,5,"");
				$this->cell(18,5,"");
				$this->cell(8,5,"");
				$this->cell(20,5,"");
				$this->setFont("Arial","B",8);
				$this->cell(90,5,"Saldo Inicial");
				$this->cell(25,5,"");
				$this->cell(26,5,"");
				$this->cell(27,5,number_format($salant,2,'.',','),0,0,'R');
				$this->ln();

				$esprimero=1;
			    while (!$tb->EOF) // while
			   {
			       //fecha pagado
				   if (trim($tb->fields["tipmov"])=='CHQ')
				   {
					 $sql="SELECT DISTINCT(TO_CHAR(FECENT,'DD/MM/YYYY')) as fecpag
						 	FROM TSCHEEMI WHERE RPAD(NUMCHE,20,' ')=rpad('".$tb->fields["reflib"]."',20,' ') AND
							NUMCUE=rpad('".$tb->fields["numcue"]."',20,' ')";
					 $tbFP=$this->bd->select($sql);
	  				 if (!$tbFP->EOF)  { $fechapago=$tbFP->fields["fecpag"];}
				   }
				  else
				   {
				    $sql="SELECT DISTINCT(TO_CHAR(FECING,'DD/MM/YYYY')) as fecpag
						 	FROM TSMOVLIB	where RPAD(REFLIB,20,' ')=rpad('".$tb->fields["reflib"]."',20,' ') AND
							FECLIB=to_date('".$tb->fields["feclib"]."','dd/mm/yyyy') AND
							NUMCUE=rpad('".$tb->fields["numcue"]."',20,' ')";
					$tbFP=$this->bd->select($sql);
	  				if (!$tbFP->EOF)  { $fechapago=$tbFP->fields["fecpag"];}
				   }

				   /////////////////////////////////////////////////////////////////////////////////////////////////
					 $nombreben="";
			   		 if (trim($tb->fields["tipmov"])=='CHQ')
					 {
						 $sq="SELECT B.NOMBEN as nombreben
						   FROM TSCHEEMI A,OPBENEFI B
						  WHERE A.NUMCHE=rpad('".$tb->fields["reflib"]."',20,' ') AND
								A.NUMCUE=rpad('".$tb->fields["numcue"]."',20,' ') AND
								A.CEDRIF=B.CEDRIF";
					  	 $tbNom=$this->bd->select($sql);
	  				  if (!$tbNom->EOF)  { $nombreben=$tbNom->fields["nombreben"];}
					  }
					  else
					  {
							$nombreben=$tb->fields["deslib"];
					   }
					 /////////////////////////////////////////////////////////////////////////////////////////////////
					//detalle
						$this->cont=$this->cont+1;
						$this->cell(10,5,$this->cont);
						$this->cell(18,5,$tb->fields["feclib"]);
						$this->cell(18,5,$tb->fields["fecing"]);
						$this->cell(18,5,$fechapago);

						$this->cell(8,5,$tb->fields["tipmov"]);
						$this->cell(20,5,$tb->fields["reflib"]);
						$this->setFont("Arial","B",6);
						$this->cell(90,5,"");
						$this->setFont("Arial","B",8);
						$this->cell(25,5,number_format($tb->fields["debitos"],2,'.',','),0,0,'R');
						$this->cell(26,5,number_format($tb->fields["creditos"],2,'.',','),0,0,'R');

						 if ($esprimero==1)
						 {
           					 $cuentainicial=$this->cta1;
							 $this->sal=$salant;
							 $this->sal=$this->sal+$tb->fields["debitos"]-$tb->fields["creditos"];
							 $esprimero=0;
						 }
						 else
						 {
							if  ($cuentainicial==$this->cta1)
							{
								$this->sal=$this->sal+$tb->fields["debitos"]-$tb->fields["creditos"];
							}
							else
							 {
								$this->sal=$salant;
          					    $cuentainicial=$this->cta1;
								$this->sal=$this->sal+$tb->fields["debitos"]-$tb->fields["creditos"];
							}
						 }

						$this->cell(27,5,number_format($this->sal,2,'.',','),0,0,'R');

						$y=$this->GetY();
						$this->setXY(112,$y+1);
						$this->Multicell(90,3,$nombreben); //Beneficiario
						$salant=$this->sal;
						$this->ln();
					//----------------------------------------------------------------
					$tb->MoveNext();
					} //while


		}
	}
?>
