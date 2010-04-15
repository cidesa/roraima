<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{



		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->codtrades=$_POST["codtrades"];
			$this->codtrahas=$_POST["codtrahas"];
			$this->fectrades=$_POST["fectrades"];
			$this->fectrahas=$_POST["fectrahas"];
			$this->ano_independ=$_POST["ano_independ"];
			$this->nro_federacion=$_POST["nro_federacion"];
			$this->decreto=$_POST["decreto"];
			$this->gober=$_POST["gobernador"];
			$this->secre=$_POST["secretario"];
			$this->fecha=$_POST["fecha"];
			$this->pag = true;

			$this->sql="SELECT
						DISTINCT RTRIM(B.CodOri ) as origen,
						B.coddes as coddes,
						C.RefTra as referencia,
						C.FecTra as fecha,
						b.monmov as monmov,

						SUM(B.MonMov)as monto,
						obtener_ano_cierre() as anofis
						FROM
						CPMOVTRA B,
						CPTRASLA C
						WHERE
						B.REFTRA  = C.REFTRA AND
						C.REFTRA >= '".$this->codtrades."' AND
						C.REFTRA <= '".$this->codtrahas."' AND
						C.FECTRA >= to_date('".$this->fectrades."','dd/mm/yyyy') AND
						C.FECTRA <= to_date('".$this->fectrahas."','dd/mm/yyyy') --AND
						--B.CODORI LIKE '15-01-00-57-498-01-01-00-001%'
						GROUP BY B.CODORI,b.coddes,C.REFTRA,C.FECTRA,b.monmov,obtener_ano_cierre()";

		    //    print '<pre>'; print $this->sql;exit;
			$this->cab=new cabecera();


		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$this->titulo,"l","s");

			$this->setFont('arial',"B",9);
			$this->setXY(25,10);
			$this->cell(50,5,'REPUBLICA BOLIVARIANA DE VENEZUELA');
			$this->Image('../../img/logo_1.jpg',50,17,13);
			$this->setXY(17,35);
			$this->cell(20,5,'Ministerio del Poder Popular Para las Industrias ligeras y Comercio');
			$this->setXY(28,40);
			$this->cell(20,5,'SU DESPACHO');
			$this->setXY(30,43);
			$this->cell(30,5,'    ---------------------------------');
			$this->setXY(10,51);
			$this->cell(7,5,'Nº.:');
			$this->setFont('arial',"BU",9);
			$this->cell(20,5,'   '.$this->decreto.'   ');
			$this->setFont('arial',"B",9);
			if (!$this->pag)
			{
			    $this->setFont('arial','B',10);
			    $this->setXY(10,140);
			    $this->cell(45,5,'INCREMENTAR GASTOS CORRIENTES:');
			    $this->setY($this->GetY()+5);
			    /*$this->setXY(20,20);
			    $this->setFont('arial',"B",8);
			    $this->cell(45,5,'CODIGO PRESUPUESTARIO');
			    $this->setXY(20,23);
			    $this->setFont('arial',"B",6);
			    $this->cell(45,5,'ST-PR-PY-OA-PAR-GE-ES-SE-NUM');

				$this->setFont('arial',"B",8);
			    $this->setXY(100,20);
			    $this->cell(45,5,'DENOMINACION');

			    $this->setXY(178,20);
			    $this->cell(45,5,'MONTO EN');
			    $this->setXY(178,23);
			    $this->cell(45,5,'BOLIVARES');

			    $this->rect(20,18,180,10);
			    $this->setY(30);*/
			}
			$this->setY(65);
		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
    		$ori = $tb->fields["origen"];
		    $sql3="select a.nompre as nompre from cpdeftit a where
				a.codpre = '".$tb->fields["origen"]."'";
    		$tb3=$this->bd->select($sql3);
		    $nomori = $tb3->fields["nompre"];
    		$monto = $tb->fields["monto"];
		    $this->setFont('arial','B',12);
		    $this->setY(65);
		    $this->cell(190,5,strtoupper($this->gober),0,0,'C');
		    $this->ln();
		    $this->cell(190,5,'SUVINCA',0,0,'C');
		    $this->setFont('arial','',10);
            $this->ln(12);
		    $this->multicell(190,5,'En uso de las atribuciones legales establecidas en los Artículos 32 y 35 de la Ley Orgánica de Régimen Presupuestario del Estado, en concordancia con el Artículo 35 Páragrafo Segundo, Literal "e" de las Disposiciones Generales de la Ley Presupuesto Vigente y oída la opinión de la Dirección General de Presupuesto y Control de Gestión');

		    $this->ln(10);
		    $this->setFont('arial','B',12);
		    $this->cell(190,5,'R E S U E L V E',0,0,'C');

		    $this->ln(16);
		    $this->setFont('arial','B',11);
		    $this->cell(30,5,'ARTICULO 1.-  ');
		    $this->setFont('arial','',10);
		    $this->setXY(10,$this->GetY());
		    $this->multicell(190,5,'                           Se Rectifica el Presupuesto de Gastos Corrientes para el Ejercicio Fiscal '.$tb->fields["anofis"].', por la cantidad de '.montoescrito($monto,$this->bd).' (Bs.F: '.number_format($monto,2,',','.').'), con cargo al Crédito Presupuestario '.$ori.'     "'.$nomori.'", para incrementar los siguientes presupuesto:');

		    $this->setFont('arial','B',11);
		    $this->ln(8);
		    $this->cell(80,5,'INCREMENTAR GASTOS CORRIENTES:');
	        $this->ln(12);

		    $tot_monmov = 0;
		    $nombres=array();
		    $montos=array();
		    $i=1;
		    while (!$tb->EOF)
		    {
				$this->setFont('arial',"B",10);
			    //$this->setX(10);
			    $this->cell(100,5,$tb->fields["coddes"]);
				$this->ln(4);
				$this->setFont('arial',"",9);
				$sql2="select a.nompre as nompre from cpdeftit a where
						a.codpre = '".$tb->fields["coddes"]."'";
	            $tb2=$this->bd->select($sql2);
	            $nombres[$i] = $tb2->fields["nompre"];
	            $montos[$i] = $tb->fields["monmov"];
				$this->multicell(150,5,$tb2->fields["nompre"]);
				$this->setXY(160,$this->GetY());
				$this->cell(25,5,number_format($tb->fields["monmov"],2,',','.'),0,0,'R');
				$this->ln(8);
				$tot_monmov = $tot_monmov + $tb->fields["monmov"];
				$i++;
				$tb->MoveNext();
		   }
		   $this->setFont('arial',"B",10);
		   $this->cell(120,5,'TOTAL INCREMENTADO GASTOS CORRIENTES:        Bs.F: '.number_format($tot_monmov),2,',','.');
		   $this->ln(8);
		   $this->cell(120,5,'TOTAL RECTIFICACIONES:                       Bs.F: '.number_format($tb->fields["monto"],2,',','.'));

		   $this->ln(12);

		   $this->setFont('arial','B',11);
		   $this->cell(30,5,'ARTICULO 2.-  ');
		   $this->setFont('arial','',10);
		   $this->setXY(10,$this->GetY());
		   $this->multicell(190,5,'                           La presente Rectificación al Presupuesto de Gastos Corrientes, tiene como finalidad transferir recursos a los institutos siguientes:');

		   $this->ln(6);
		   for ($i=0;$i< count($nombres);$i++)
		   {
		   	   $this->setFont('arial','B',10);
			   $this->cell(5,5,$i++ .".-");
			   $this->setFont('arial','',10);
		       $this->cell(150,5,'     ');
		       $this->cell(25,5,$montos[$i++]);
		       $this->setX(7);
		       $this->multicell(150,5,$nombres[$i++]);
		       $this->ln(4);
		   }
		   $this->cell(190,5,'TOTAL                                             Bs.F:'.number_format($tot_monmov,2,',','.'));

		   $this->multicell(190,5,$tb->fields["justificacion"]);

		   $this->ln(6);

		   $this->setFont('arial','B',11);
		   $this->cell(30,5,'ARTICULO 3.-  ');
		   $this->setFont('arial','',10);
		   $this->setXY(10,$this->GetY());
		   $this->multicell(190,5,'                           El Secretario General de Gobierno queda encargado de la Ejecucion de la presente Resolución');
		   $this->ln(6);

		   $this->multicell(190,5,'Dado, firmado y sellado en el Palacio de Gobierno Generalísimo "Franscico de Miranda", de la Ciudad de Los Teques, a los '.date("d").' días del mes de '.date("m").' del año '.date("Y").'. Años '.$this->ano_independ.'° de la Independencia y '.$this->nro_federacion.'° de la Federacion');

		   $this->ln(16);

		   $this->cell(190,5,strtoupper($this->gober),0,0,'C');
		   $this->ln(4);
		   $this->cell(190,5,'GOBERNADOR',0,0,'C');
		   $this->ln(8);

		   $this->cell(40,5,'REFRENDADO:');
		   $this->ln(4);
		   $this->cell(120,5,'EL SECRETARIO GENERAL DE GOBIERNO');
		   $this->ln(4);
		   $this->cell(40,5,strtoupper($this->secre));
		   $this->ln(12);
		   $this->cell(40,5,strtoupper('Dr. Alirio Mendoza Galué'));
		   $this->ln(16);
		   $this->cell(190,5,'ING. LUIS RODRIGUEZ GUEVARA',0,0,'C');
		   $this->ln(4);
		   $this->cell(190,5,'DIRECCION GENERAL DE PRESUPUESTO Y CONTROL DE GESTION',0,0,'C');
		   $this->setFont('arial','',7);
		   $this->ln(6);
		   $this->cell(20,5,'RC/DP/ch.-');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Despacho del Gobernador');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Secretaria General de Gobierno');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Consejo Legislativo del Estado Miranda');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Contraloría del Estado Miranda');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Auditoría Interna');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Dirección General de Administración y Finanzas');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Dirección General de Presupuesto y Control de Gestió');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Dirección de Programación y Presupuesto');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. Dirección de Control y Evaluación');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. División de Evaluación Presupuestaria');
		   $this->ln(4);
		   $this->cell(100,5,'c.c. División de Ordenación de Pagos');
		   $this->ln(4);
		   $this->cell(100,5,'****Pendiente nombres de institutos beneficiados****');

		}
	}
?>
