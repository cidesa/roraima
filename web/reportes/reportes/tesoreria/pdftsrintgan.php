<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $acum4=0;
		var $acum5=0;
		var $acum6=0;
		var $acum7=0;
		var $acum8=0;
		var $acum9=0;
		var $acum10=0;
		var $acum11=0;
		var $acum12=0;
		var $acum13=0;
		var $acummes1=0;
		var $acummes2=0;
		var $acummes3=0;
		var $acummes4=0;
		var $acummes5=0;
		var $acummes6=0;
		var $acummes7=0;
		var $acummes8=0;
		var $acummes9=0;
		var $acummes10=0;
		var $acummes11=0;
		var $acummes12=0;


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
		var $sql7;
		var $sql8;
		var $sql9;
		var $sql10;
		var $sql11;
		var $sql12;
		var $sqlx;
		var $rep;
		var $numero;
		var $cab;
		var $codban1;
		var $codban2;
		var $fecha1;
		var $fecha2;
		var $ano1;
		var $ano2;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codban1=$_POST["codban1"];
			$this->codban2=$_POST["codban2"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->ano1=substr($this->fecha1,6,4);
			$this->ano2=substr($this->fecha2,6,4);



				$this->sqlx="SELECT DISTINCT(B.NUMCUE) as numcue, A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue FROM TSMOVLIB B, TSDEFBAN A WHERE B.TIPMOV LIKE '%' AND
							A.NUMCUE=B.NUMCUE AND
							RPAD(B.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(B.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') ORDER BY A.NUMCUE,A.NOMCUE";

				$this->sql="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/01/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('31/01/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY A.NUMCUE,A.NOMCUE";

				$this->sql2="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, SUM(coalesce(B.monmov,0)) as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/02/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('28/02/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY A.NUMCUE,A.NOMCUE";

				$this->sql3="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/03/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('31/03/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

				$this->sql4="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/04/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('30/04/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";


				$this->sql5="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/05/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('31/05/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

				$this->sql6="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/06/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('30/06/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

				$this->sql7="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/07/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('31/07/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

				$this->sql8="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/08/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('31/08/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";


				$this->sql9="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/09/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('30/09/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

				$this->sql10="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/10/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('31/10/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

				$this->sql11="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/11/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('30/11/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

				$this->sql12="SELECT A.NUMCUE  as anumcue,A.NOMCUE as anomcue,A.USOCUE as ausocue, B.NUMCUE as bnumcue, B.MONMOV as bmonmov from
							tsdefban A, tsmovlib B WHERE B.TIPMOV LIKE '%' AND
							RTRIM(A.NUMCUE)=RTRIM(B.NUMCUE) AND
							RPAD(A.NUMCUE,20,' ') >= RPAD('".$this->codban1."',20,' ') AND
							RPAD(A.NUMCUE,20,' ') <= RPAD('".$this->codban2."',20,' ') AND
							B.FECLIB>=to_date('".$this->fecha1."','dd/mm/yyyy') AND
							B.FECLIB<=to_date('".$this->fecha2."','dd/mm/yyyy') AND
							B.FECLIB>=TO_DATE('01/12/'||'".$this->ano1."','DD/MM/YYYY') AND
							B.FECLIB<=TO_DATE('31/12/'||'".$this->ano2."','DD/MM/YYYY')
							GROUP BY A.NUMCUE, A.NOMCUE, B.NUMCUE, A.USOCUE, B.MONMOV ORDER BY B.NUMCUE";

							//print($this->sql);



			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nombre";
				$this->titulos[1]="Uso";
				$this->titulos[2]="Nro Cuenta";
				$this->titulos[3]="Enero";
				$this->titulos[4]="Febrero";
				$this->titulos[5]="Marzo";
				$this->titulos[6]="Abril";
				$this->titulos[7]="Mayo";
				$this->titulos[8]="Junio";
				$this->titulos[9]="Julio";
				$this->titulos[10]="Agos";
				$this->titulos[11]="Sep";
				$this->titulos[12]="Oct";
				$this->titulos[13]="Nov";
				$this->titulos[14]="Dic";
				$this->titulos[15]="Acumulado";

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",5);
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
		    $tb2=$this->bd->select($this->sql2);
		    $tb3=$this->bd->select($this->sql3);
		    $tb4=$this->bd->select($this->sql4);
		    $tb5=$this->bd->select($this->sql5);
		    $tb6=$this->bd->select($this->sql6);
		    $tb7=$this->bd->select($this->sql7);
		    $tb8=$this->bd->select($this->sql8);
		    $tb9=$this->bd->select($this->sql9);
		    $tb10=$this->bd->select($this->sql10);
		    $tb11=$this->bd->select($this->sql11);
		    $tb12=$this->bd->select($this->sql12);
		    $tbx=$this->bd->select($this->sqlx);
			$tbx1=$this->bd->select($this->sqlx);
			$this->bd->validar();


			$this->tb20=$tbx;

			$this->setFont("Arial","B",6);
			$ncampos=count($this->titulos);



			while(!$tbx->EOF)
			//while((!$tb->EOF)||(!$tb2->EOF) || (!$tb3->EOF)||(!$tb4->EOF) || (!$tb5->EOF)||(!$tb6->EOF) || (!$tb7->EOF)||(!$tb8->EOF) || (!$tb9->EOF)||(!$tb10->EOF) || (!$tb11->EOF)||(!$tb12->EOF)||(!$tbx->EOF))
			{

				 $this->ln();
				 $this->setFont("Arial","",4);
				 $this->cell($this->anchos[0],7,substr($tbx->fields["anomcue"],0,15));

				 $this->cell($this->anchos[1],7,substr($tbx->fields["ausocue"],0,15));
				 $this->cell($this->anchos[2],7,$tbx->fields["numcue"]);

			$ref=$tbx->fields["anumcue"];
//----------------------------------------------------------------------------------------------------------------
				 $this->acummes1=0;
				 $aux=0;
				 $z=1;
				 $tb=$this->bd->select($this->sql);
	 			 $check=false;
				 while (!$tb->EOF)
				  {
					 if ($tb->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb->fields["bmonmov"];
						$this->acum1=$this->acum1+$tb->fields["bmonmov"];
						$this->acummes1=$this->acummes1+$tb->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[3],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[3],7,$aux);
				 }



//----------------------------------------------------------------------------------------------------------------
				 $this->acummes2=0;
				 $aux=0;
				 $acum1=0;
				 $z=1;
				 $tb2=$this->bd->select($this->sql2);
	 			 $check=false;
				 while (!$tb2->EOF)
				  {
					 if ($tb2->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb2->fields["bmonmov"];
						$this->acum2=$this->acum2+$tb2->fields["bmonmov"];
						$this->acummes2=$this->acummes2+$tb2->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb2->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[4],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[4],7,$aux);
				 }


//----------------------------------------------------------------------------------------------------------------
				 $this->acummes3=0;
				 $aux=0;
				 $z=1;
				 $tb3=$this->bd->select($this->sql3);
	 			 $check=false;
				 while (!$tb3->EOF)
				  {
					 if ($tb3->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb3->fields["bmonmov"];
						$this->acum3=$this->acum3+$tb3->fields["bmonmov"];
						$this->acummes3=$this->acummes3+$tb3->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb3->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[5],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[5],7,$aux);
				 }


//----------------------------------------------------------------------------------------------------------------
				 $this->acummes4=0;
				 $aux=0;
				 $z=1;
				 $tb4=$this->bd->select($this->sql4);
	 			 $check=false;
				 while (!$tb4->EOF)
				  {
					 if ($tb4->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb4->fields["bmonmov"];
						$this->acum4=$this->acum4+$tb4->fields["bmonmov"];
						$this->acummes4=$this->acummes4+$tb4->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb4->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[6],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[6],7,$aux);
				 }
 //----------------------------------------------------------------------------------------------------------------
				 $this->acummes5=0;
				 $aux=0;
				 $z=1;
				 $tb5=$this->bd->select($this->sql5);
	 			 $check=false;
				 while (!$tb5->EOF)
				  {
					 if ($tb5->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb5->fields["bmonmov"];
						$this->acum5=$this->acum5+$tb5->fields["bmonmov"];
						$this->acummes5=$this->acummes5+$tb5->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb5->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[7],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[7],7,$aux);
				 }

//----------------------------------------------------------------------------------------------------------------
				 $this->acummes6=0;
				 $aux=0;
				 $z=1;
				 $tb6=$this->bd->select($this->sql6);
	 			 $check=false;
				 while (!$tb6->EOF)
				  {
					 if ($tb6->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb6->fields["bmonmov"];
						$this->acum6=$this->acum6+$tb6->fields["bmonmov"];
						$this->acummes6=$this->acummes6+$tb6->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb6->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[8],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[8],7,$aux);
				 }

//----------------------------------------------------------------------------------------------------------------
				 $this->acummes7=0;
				 $aux=0;
				 $z=1;
				 $tb7=$this->bd->select($this->sql7);
	 			 $check=false;
				 while (!$tb7->EOF)
				  {
					 if ($tb7->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb7->fields["bmonmov"];
						$this->acum7=$this->acum7+$tb7->fields["bmonmov"];
						$this->acummes7=$this->acummes7+$tb7->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb7->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[9],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[9],7,$aux);
				 }



//----------------------------------------------------------------------------------------------------------------
				 $this->acummes8=0;
				 $aux=0;
				 $z=1;
				 $tb8=$this->bd->select($this->sql8);
	 			 $check=false;
				 while (!$tb8->EOF)
				  {
					 if ($tb8->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb8->fields["bmonmov"];
						$this->acum8=$this->acum8+$tb8->fields["bmonmov"];
						$this->acummes8=$this->acummes8+$tb8->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb8->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[10],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[10],7,$aux);
				 }


//----------------------------------------------------------------------------------------------------------------
				 $this->acummes9=0;
				 $aux=0;
				 $z=1;
				 $tb9=$this->bd->select($this->sql9);
	 			 $check=false;
				 while (!$tb9->EOF)
				  {
					 if ($tb9->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb9->fields["bmonmov"];
						$this->acum9=$this->acum9+$tb9->fields["bmonmov"];
						$this->acummes9=$this->acummes9+$tb9->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb9->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[11],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[11],7,$aux);
				 }


//----------------------------------------------------------------------------------------------------------------
				 $this->acummes10=0;
				 $aux=0;
				 $z=1;
				 $tb10=$this->bd->select($this->sql10);
	 			 $check=false;
				 while (!$tb10->EOF)
				  {
					 if ($tb10->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb10->fields["bmonmov"];
						$this->acum10=$this->acum10+$tb10->fields["bmonmov"];
						$this->acummes10=$this->acummes10+$tb10->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb10->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[12],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[12],7,$aux);
				 }

 //----------------------------------------------------------------------------------------------------------------
				 $this->acummes11=0;
				 $aux=0;
				 $z=1;
				 $tb11=$this->bd->select($this->sql11);
	 			 $check=false;
				 while (!$tb11->EOF)
				  {
					 if ($tb11->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb11->fields["bmonmov"];
						$this->acum11=$this->acum11+$tb11->fields["bmonmov"];
						$this->acummes11=$this->acummes11+$tb11->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb11->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[13],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[13],7,$aux);
				 }


//----------------------------------------------------------------------------------------------------------------
				 $this->acummes12=0;
				 $aux=0;
				 $z=1;
				 $tb12=$this->bd->select($this->sql12);
	 			 $check=false;
				 while (!$tb12->EOF)
				  {
					 if ($tb12->fields["anumcue"]==$ref)
						{
						$aux= $aux+$tb12->fields["bmonmov"];
						$this->acum12=$this->acum12+$tb12->fields["bmonmov"];
						$this->acummes12=$this->acummes12+$tb12->fields["bmonmov"];
						$check=true;
						$z=0;
						}
					else
						{
						$check=false;
						}
					$tb12->MoveNext();
				 }

				if (($check==false) && ($z==1))
				{
				 $this->cell($this->anchos[14],7,'0');
     			 }

				 if($z==0)
				 {
   			      $this->cell($this->anchos[14],7,$aux);
				 }

	         $sum= $this->acummes1+$this->acummes2+$this->acummes3+$this->acummes4+$this->acummes5+$this->acummes6+$this->acummes7+$this->acummes8+$this->acummes9+$this->acummes10+$this->acummes11+$this->acummes12;
			 $sum2= $sum2+$sum;
			 $this->cell($this->anchos[13],10," ".number_format($sum,2,'.',''));
			 $sum=0;
//----------------------------------------------------------------------------------------------------------------


				 $tbx->MoveNext();

				}



$this->ln();
$this->setFont("Arial","B",4);
$this->cell($this->anchos[0],10,"");

$this->Line(20,$this->GetY(),270,$this->GetY());
$this->cell($this->anchos[1],10," Sub-total Meses");
$this->cell($this->anchos[2],10,"");
$this->cell($this->anchos[3],10," ".number_format($this->acum1,2,'.',''));
$this->cell($this->anchos[4],10," ".number_format($this->acum2,2,'.',''));
$this->cell($this->anchos[5],10," ".number_format($this->acum3,2,'.',''));
$this->cell($this->anchos[6],10," ".number_format($this->acum4,2,'.',''));
$this->cell($this->anchos[7],10," ".number_format($this->acum5,2,'.',''));
$this->cell($this->anchos[8],10," ".number_format($this->acum6,2,'.',''));
$this->cell($this->anchos[9],10," ".number_format($this->acum7,2,'.',''));
$this->cell($this->anchos[10],10," ".number_format($this->acum8,2,'.',''));
$this->cell($this->anchos[11],10," ".number_format($this->acum9,2,'.',''));
$this->cell($this->anchos[12],10," ".number_format($this->acum10,2,'.',''));
$this->cell($this->anchos[13],10," ".number_format($this->acum11,2,'.',''));
$this->cell($this->anchos[14],10," ".number_format($this->acum12,2,'.',''));
$this->cell($this->anchos[15],10," ".number_format($sum2,2,'.',''));



		//	}
		}


	}
?>format($this->acum12,2,'.',''));
$this->cell($this->anchos[15