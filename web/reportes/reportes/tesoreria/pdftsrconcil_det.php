<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");


	class pdfreporte extends fpdf
		{

		function pdfreporte()
		{

			$this->bd=new basedatosAdo();
			$this->fpdf("p","mm","Letter");
			$this->cabe='s';
			$this->numcue=H::GetPost("ctades");
			$this->mes=H::GetPost("mes");
			$this->tesore=H::GetPost("tesore");
			$this->concil=H::GetPost("concil");

			$sqlaño="select anocon as anofis from tsconcil where RPAD(numcue,20,' ') = RPAD('".$this->numcue."',20,' ')";

  	  		$ano=$this->bd->select($sqlaño);
	  		$this->ano=$ano->fields["anofis"];
if ($this->mes=='1' and $this->ano=="2008" )
{

$this->fecfin='31/12/2007';
}
else
{
$this->mes=$this->mes-1;
			$this->fec="select to_char(b.fechas,'dd/mm/yyyy') as fecha
							from contaba a, contaba1 b
							where a.fecini=b.fecini and
							a.feccie=b.feccie and
							b.fecdes=to_date('01/'||'".$this->mes."'||'/'||'".$this->ano."','dd/mm/yyyy')";
			$tbfec=$this->bd->select($this->fec);
			 $this->fecfin=$tbfec->fields["fecha"];

}
			$this->arrpb="select to_char(b.fechas,'dd/mm/yyyy') as fecha
							from contaba a, contaba1 b
							where a.fecini=b.fecini and
							a.feccie=b.feccie and
							b.fecdes=to_date('01/'||'".$this->mes."'||'/'||'".$this->ano."','dd/mm/yyyy')";
			$tbf=$this->bd->select($this->arrpb);
			$this->fechas=$tbf->fields["fecha"];
			$this->fecdes='01'.'/'.$this->mes.'/'.$this->ano;


//			$this->fecha=$this->arrpb[$this->i]["fecha"];
			$this->sqlp="select b.refere,b.result,b.numcue,(b.movlib) as movlib,(b.movban) as movban,to_char(b.feclib,'dd/mm/yyyy') as feclib,b.desref,
					     coalesce(b.monlib,0) as mon, coalesce(b.monban,0) as monb, b.result
					from tsconcil b,tsdefban a
					where (a.numcue)=(b.numcue) and
					RPAD(b.numcue,20,' ') = RPAD('".$this->numcue."',20,' ') and
					--(b.feclib >= to_date('".$this->fecdes."','dd/mm/yyyy')) and
					(b.feclib <= to_date('".$this->fechas."','dd/mm/yyyy'))
					order by b.feclib";//print $this->sqlp;exit;
			$this->arrp=$this->bd->select($this->sqlp);
			$this->sql="select distinct a.numcue,a.nomcue,a.antlib,a.antban,a.valmon,a.tipmon,a.codcta,b.simbolo,b.nommon
						from tsdefban a, tsdesmon b
						where (a.numcue) = rpad('".$this->numcue."',20,' ') and (a.tipmon)=(b.codmon)
						order by a.numcue";//,$tb->fields["nommon"]
		//	$this->j=$this->bd->select($this->sql);
		//	$this->simbolo=$tb->fields["simbolo"];
		//	$this->nommon=$tb->fields["nommon"];
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->setAutoPageBreak(true,30);

		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Debitos";
				$this->titulos[5]="Creditos";
				$this->titulos[6]="Saldo Segun Libros";

		}
  public function getCabecera($titulo='',$departamento='')
  {
      $pdf = $this;
      $this->confcabecera = $this->getConfigCabecera();
      $this->conf = $this->getConfig();
      $ori = strtolower($pdf->getOrientation());
      $conf = $this->conf;
      $c = $this->confcabecera;
      $r = $this->conf;
//print $ori;exit;
      if($ori=='p')
      {
        $xtitulo = 180;
        $xlinea = 200;
        $xdetalles= 180;
        $xpagina = 350;

      }
       else
       {
       	if($ori=='1')
      	{   $ori='p';
	        $xtitulo = 330;
	        $xlinea = 330;
	        $xdetalles= 100;
	        $xpagina = 600;
      	}
      else
	      {
            $ori='p';
	        $xtitulo = 265;
	        $xlinea = 265;
	        $xdetalles= 180;
	        $xpagina = 480;
	      }
       }



      //print_r($this->conf);exit();
      //H::PrintR(strtolower($ori));
      //configuro la pagina con Orientacion Vertical
      //busco la descripcion y direccion de la empresa
    $bd = new basedatosAdo();
    $tb3=$bd->select("select * from empresa where codemp='001'");
    if(!$tb3->EOF)
    {
      $nombre=trim($tb3->fields["nomemp"]);
      $direccion=$tb3->fields["diremp"];
      $telef=$tb3->fields["tlfemp"];
      $fax=$tb3->fields["faxemp"];
    }

    $pdf->setFont("Arial","B",8);
    //Logo de la Empresa
    $pdf->Image($c['logo']['img'],10,8,33);

    //fecha actual
    $fecha=date("d/m/Y");

    if($c['fecha']){
      $pdf->Cell($xpagina,10,'Fecha: '.$fecha,0,0,'C');
    }else{$pdf->Cell($xpagina,10,'',0,0,'C');}
    $pdf->ln(5);

    //Paginas
    if($c['nropagina'])
    {
      $pdf->Cell($xpagina,10,'',0,0,'C');
    }else{$pdf->Cell($xpagina,10,'',0,0,'C');}

    //Titulo Descripcion de la Empresa
    $pdf->Ln(-5);
    $tab = 50;

    $pdf->setX($c['empresa']['x'][$ori]);
    if($c['empresa']['y'][$ori]!='0') $pdf->setY($c['empresa']['y'][$ori]);
    $pdf->setFont($c['empresa']['fuente'],"B",11);
    $pdf->Cell($xdetalles,5,'República Bolivariana de Venezuela',0,0,$c['empresa']['pos']);

    // Detalles de la empresa
    $pdf->setFont($c['detemp']['fuente'],"B",$c['detemp']['tam']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    if($c['detemp']['y'][$ori]!='0') $pdf->setY($c['detemp']['y'][$ori]);
    $pdf->Cell($xdetalles,5,'Ministerio del Poder Popular Para la Finanzas',0,0,$c['depemp']['pos']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    $pdf->Cell($xdetalles,5,$nombre,0,0,$c['depemp']['pos']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    $pdf->Cell($xdetalles,5,'',0,0,$c['depemp']['pos']);
    $pdf->Ln(8);

    //Departamento
    $pdf->setFont($c['departamento']['fuente'],"B",$c['departamento']['tam']);
    $pdf->setX($c['departamento']['x'][$ori]);
    if($c['departamento']['y'][$ori]!='0') $pdf->setY($c['departamento']['y'][$ori]);
    $pdf->Cell($xtitulo,10,$departamento,0,0,$c['departamento']['pos'],0);

    //Titulo del Reporte
    $pdf->setFont($c['titulo']['fuente'],"B",$c['titulo']['tam']);
    $pdf->setX($c['titulo']['x'][$ori]);
    if($c['titulo']['y'][$ori]!='0') $pdf->setY($c['titulo']['y'][$ori]);
    $pdf->Cell($xtitulo,10,$titulo,0,0,$c['titulo']['pos'],0);
    $pdf->ln(10);
    $pdf->Line(10,35,$xlinea,35);

    $pdf->setFont($r['fuente'],"",$conf['tamletra']);
  }

		function Header()
		{
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->ln();

		}
	function formato($cuenta,$cuanta2,$numerocuenta,$tipo,$moneda)
		{	$this->setFont("Arial","B",8);
			$this->ln(-9);
			$this->cell(110,5,$tipo,0,70);
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			$this->cell(110,5,"Codigo Contable ".$cuanta2."                                                                             Cuenta Expresada en Moneda ".$moneda,0,100).
		//	$this->numcue=$tb->fields["numcue"];
		//	$this->antlib=$tb->fields["antlib"];
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",8);
			$this->cell(12,5,"Banco");
			$this->cell(110,5,substr(strtoupper($cuenta),0,100));
			$this->cell(20,5,"Nro. Cuenta");
			$this->cell(100,5,$numerocuenta);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->SetTextColor(0,0,0);
			$this->ln();
			$this->cell(15,5,"Tipo");
			$this->cell(20,5,"Referencia");
			//$this->cell(25,5,"Beneficiario");
			$this->cell(65,5,"Descripción");
			$this->cell(20,5,"Status");
			$this->cell(20,5,"Fecha");
			$this->cell(30,5,"Debitos");
			$this->cell(22,5,"Creditos");
//			$this->cell(30,5,"Saldo Actual");
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->ln();
		}

	function formatotro($cuenta,$numerocuenta,$tipo)
		{	$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			$this->ln(-9);
			$this->cell(110,5,$tipo,0,100);
		//	$this->numcue=$tb->fields["numcue"];
		//	$this->antlib=$tb->fields["antlib"];
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",8);
			$this->cell(12,5,"Banco");
			$this->cell(110,5,substr(strtoupper($cuenta),0,100));
			$this->cell(20,5,"Nro. Cuenta");
			$this->cell(100,5,$numerocuenta);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->SetTextColor(0,0,0);
			$this->ln();
//			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
//			$this->ln();
		}

		function Cuerpo()
		{
			$tb=$this->bd->select($this->sql);
			$this->bd->validar();
			$this->formato($tb->fields["nomcue"],$tb->fields["codcta"],$this->numcue,"MOVIMIENTOS CONCILIADOS",$tb->fields["nommon"]);
			$tb3=$this->arrp;//print $tb->fields["tipmon"];exit;
			$this->setFont("Arial","",7);
			$this->debe=0;$this->haber=0;
			$this->CdepC=0;$this->CncC=0;$this->CchC=0;$this->CndC=0;
			$this->tdepC=0;$this->tncC=0;$this->tchC=0;$this->tndC=0;
			while (!$tb3->EOF and (trim(trim($tb3->fields["result"]))=='CONCILIADO'))
			{//print $tb3->fields["tipmov"];exit;
						$this->setX(10);
						$this->cont=$this->cont+1;
						if ($tb3->fields["movban"]==$tb3->fields["movlib"])
						{	$this->sqlO="select valmon,tipmon from tsmovlib where trim(reflib)=trim('".$tb3->fields["refere"]."')";
                        	//print $this->sqlO;exit;
                        	$tbO=$this->bd->select($this->sqlO);
//							$tbO->fields["valmon"];
						if ($tbO->fields["tipmon"]=='')
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
                        //	print $this->sqlO."   hola  ".$tb3->fields["refere"]."   estes ".$tbO->fields["valmon"];exit;
						}elseif (trim($tbO->fields["tipmon"])<>trim($tb->fields["tipmon"]))
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
						}

						$mon=($tb3->fields["mon"]/$tbO->fields["valmon"]);
						$mov=$tb3->fields["movlib"];
						$this->cell(15,5,$tb3->fields["movlib"]);
						$this->sqlM="select debcre from tstipmov where trim(codtip)=trim('".$tb3->fields["movlib"]."')";
                        $tb1=$this->bd->select($this->sqlM);

						}
						elseif($tb3->fields["movban"]=='')
						{
							$this->sqlO="select valmon from tsmovlib where trim(reflib)=trim('".$tb3->fields["refere"]."')";
                        	$tbO=$this->bd->select($this->sqlO);
//							$tbO->fields["valmon"];
						if ($tbO->fields["tipmon"]=='')
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
                        //	print $this->sqlO."   hola  ".$tb3->fields["refere"]."   estes ".$tbO->fields["valmon"];exit;
						}elseif (trim($tbO->fields["tipmon"])<>trim($tb->fields["tipmon"]))
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
						}

							$mon=($tb3->fields["mon"]/$tbO->fields["valmon"]);

						//$mon=$tb3->fields["mon"];
						$mov=$tb3->fields["movlib"];
						$this->cell(15,5,$tb3->fields["movlib"]);
						$this->sqlM="select debcre from tstipmov where trim(codtip)=trim('".$tb3->fields["movlib"]."')";
                        $tb1=$this->bd->select($this->sqlM);
						}
						else
						{
						$this->sqlO="select valmon from tsmovban where trim(reflib)=trim('".$tb3->fields["refere"]."')";
                    	$tbO=$this->bd->select($this->sqlO);
						if ($tbO->fields["tipmon"]=='')
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
                        //	print $this->sqlO."   hola  ".$tb3->fields["refere"]."   estes ".$tbO->fields["valmon"];exit;
						}elseif (trim($tbO->fields["tipmon"])<>trim($tb->fields["tipmon"]))
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
						}
						$mon=($tb3->fields["monb"]/$tbO->fields["valmon"]);

			//			$mon=$tb3->fields["monb"];
						$mov=$tb3->fields["movban"];
						$this->sqlM="select debcre from tstipmov where trim(codtip)=trim('".$tb3->fields["movban"]."')";
                        $tb1=$this->bd->select($this->sqlM);
						$this->cell(15,5,$tb3->fields["movban"]);
						}
						$this->cell(20,5,$tb3->fields["refere"]);
						//print $tb3->fields["desref"];exit;
						//$this->cell(25,5,"beneficiario");
						$this->cell(65,5,substr($tb3->fields["desref"],0,40));
						$this->cell(20,5,substr(substr("CONCILIADO",0,10),0,30));
						$this->cell(15,5,$tb3->fields["feclib"]);
						if (substr($mov,0,2)=='DP')
						{
							$this->CdepC++;
							$this->tdepC=$this->tdepC+$mon;
						}
						elseif (substr($mov,0,2)=='CH')
						{
							$this->CchC++;
							$this->tchC=$this->tchC+$mon;
						}
						elseif (substr($mov,0,2)=='ND')
						{
							$this->CndC++;
							$this->tndC=$this->tndC+$mon;
						}
						elseif (substr($mov,0,2)=='NC')
						{
							$this->CncC++;
							$this->tncC=$this->tncC+$mon;
						}

						if (strtoupper($tb1->fields["debcre"])=='C'){
						$this->Setx(135);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->cell(30,5);
						$deb=$mon;
						$cre=0;
						$this->debe=$this->debe+$mon;
						}
						else
						{
						//$this->cell(30,5,0);
						$this->Setx(165);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->haber=$this->haber+$mon;
						$deb=0;
						$cre=$mon;
						}
						$this->ln();
					//----------------------------------------------------------------
					$tb3->MoveNext();

					}
						$this->Line(58,$this->GetY(),200,$this->GetY());
						$this->cell(40,5,"");
						$this->setFont("Arial","B",7);
						$this->cell(70,5,"Saldo disponible del fondo concilado  al  ".$this->fechas);
						$this->setFont("Arial","",7);
						$this->cell(23,5,$this->cont);
						$this->SetX(135);
						$this->cell(30,5,number_format($this->debe,2,'.',','),0,0,'R');
						$this->SetX(165 );
						$this->cell(30,5,number_format($this->haber,2,'.',','),0,0,'R');
						$y=$this->getY();
						$this->ln(20);
//////////////////////////////////////////////////////////////////77

	if (substr($tb->fields["nomcue"],0,1)<>'O')
{
//print substr($tb->fields["nomcue"],0,1);exit;

$this->Addpage();
			$cuentaint=substr(trim($tb->fields["codcta"]),0,strlen(trim($tb->fields["codcta"]))-2).'02';
			$this->formato($tb->fields["nomcue"],$cuentaint,$this->numcue,"INTERESES CONCILIADOS",$tb->fields["nommon"]);
//			$this->formato($tb->fields["nomcue"],$tb->fields["codcta"],$this->numcue,"MOVIMIENTOS CONCILIADOS");
			$this->interes="SELECT A.CODCTA as codcta, A.DESCTA as descta, A.DEBCRE as DEBITOCREDITO, C.CODCTA as NROCTA,
							 to_char(C.FECCOM,'dd/mm/yyyy') as feccom, C.NUMCOM as numcom, C.REFASI as refasi, substr(B.DESCOM,1,80) as descom,
							 C.DEBCRE as debcre, B.STACOM as stacom, (CASE WHEN C.DEBCRE='D' THEN C.MONASI ELSE 0 END) as DEBITOS,
							 (CASE WHEN C.DEBCRE='C' THEN C.MONASI ELSE 0 END) as CREDITOS FROM CONTABB A,CONTABC B,CONTABC1 C
							WHERE A.CODCTA = C.CODCTA AND RTRIM(A.CODCTA) = RTRIM('".$cuentaint."') AND A.CARGAB = 'C' AND
							 B.NUMCOM = C.NUMCOM AND B.FECCOM = C.FECCOM AND C.FECCOM >= to_date('".$this->fecdes."','dd/mm/yyyy') AND
							 C.FECCOM <= to_date('".$this->fechas."','dd/mm/yyyy') AND B.STACOM <> 'N' AND B.STACOM <> 'R' AND (b.stacom='A')
							ORDER BY A.CODCTA,C.CODCTA,C.FECCOM,C.DEBCRE ,C.NUMCOM";//print $this->interes;exit;
$this->cont=0;
			$tb3=$tb1=$this->bd->select($this->interes);
			$this->setFont("Arial","",7);
			$this->debe=0;$this->haber=0;
//			$this->CdepC=0;$this->CncC=0;$this->CchC=0;$this->CndC=0;
//			$this->tdepC=0;$this->tncC=0;$this->tchC=0;$this->tndC=0;
			while (!$tb3->EOF)
			{ //print "hola";exit;
						$this->setX(10);
						$this->cont=$this->cont+1;
						if ($tb3->fields["debcre"]=='D')
						{
						$this->sqlO="select valmon from cireging where trim(reflib)=trim('".$tb3->fields["refasi"]."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						//print $tbO->fields["valmon"];exit;
						if ($tbO->fields["valmon"]=='')

						{$val=substr($tb3->fields["numcom"],2,strlen(trim($tb3->fields["numcom"])));
						$this->sqlO="select distinct(a.valmon) from ciajuste a,contabc1 b,contabc c where a.refaju like '%".$val."'
									 and trim(a.desaju)=trim(c.descom) and c.numcom=b.numcom";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);

						if ($tbO->fields["valmon"]=='')
						{
						$this->sqlO="select distinct(valmon) from cireging where reflib like ('%".substr(trim($tb3->fields["refasi"]),2,4)."%') and trim(ctaban)=trim('".$this->numcue."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						}
						if ($tbO->fields["valmon"]=='')
						{
						$this->sqlO="select valmon from cireging where trim(numcom)=trim('".$tb3->fields["numcom"]."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						}
						if ($tbO->fields["valmon"]=='' and (substr($tb3->fields["numcom"],0,1)=='R'))
						{
						$this->sqlO="select valmon from cireging where numcom like ('%".substr(trim($tb3->fields["numcom"]),3,strlen($tb3->fields["numcom"])-2)."%') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						}
						}

						$mon=($tb3->fields["debitos"]/$tbO->fields["valmon"]);
						$mov="NC";
						$this->cell(15,5,$mov);
						}
						if ($tb3->fields["debcre"]=='C')
						{
						$this->sqlO="select valmon from cireging where trim(reflib)=trim('".$tb3->fields["refasi"]."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						if ($tbO->fields["valmon"]=='')

						{$val=substr($tb3->fields["numcom"],2,strlen(trim($tb3->fields["numcom"])));
						$this->sqlO="select distinct(a.valmon) from ciajuste a,contabc1 b,contabc c where a.refaju like '%".$val."'
									 and trim(a.desaju)=trim(c.descom) and c.numcom=b.numcom";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						if ($tbO->fields["valmon"]=='')
						{
						$this->sqlO="select distinct(valmon) from cireging where reflib like ('%".substr(trim($tb3->fields["refasi"]),2,4)."%') and trim(ctaban)=trim('".$this->numcue."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						}

						if ($tbO->fields["valmon"]=='')
						{
						$this->sqlO="select valmon from cireging where trim(numcom)=trim('".$tb3->fields["numcom"]."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						}
						if ($tbO->fields["valmon"]=='' and (substr($tb3->fields["numcom"],0,1)=='R'))
						{
						$this->sqlO="select valmon from cireging where numcom like ('%".substr(trim($tb3->fields["numcom"]),3,strlen($tb3->fields["numcom"])-2)."%') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						}

						}

						$mon=($tb3->fields["creditos"]/$tbO->fields["valmon"]);
						$mov="ND";
						$this->cell(15,5,$mov);
						}
						$this->cell(20,5,$tb3->fields["refasi"]);
						//print $tb3->fields["desref"];exit;
						//$this->cell(25,5,"beneficiario");
						$this->cell(65,5,substr($tb3->fields["descom"],0,40));
						$this->cell(20,5,substr(substr("CONCILIADO",0,10),0,30));
						$this->cell(15,5,$tb3->fields["feccom"]);
						if ($mov=='ND')
						{
							$this->CndC++;
							$this->tndC=$this->tndC+$mon;
						}
						elseif ($mov=='NC')
						{
							$this->CncC++;
							$this->tncC=$this->tncC+$mon;
						}

						if (strtoupper($tb1->fields["debcre"])=='C'){
						$this->Setx(135);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->cell(30,5);
						$deb=$mon;
						$cre=0;
						$this->debe=$this->debe+$mon;
						}
						else
						{
						//$this->cell(30,5,0);
						$this->Setx(165);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->haber=$this->haber+$mon;
						$deb=0;
						$cre=$mon;
						}
/*						$this->sal=$this->salant+$deb-$cre;
						$this->Setx(165);
						$this->cell(30,5,number_format($this->sal,2,'.',','),0,0,'R');
						$this->salant=$this->sal;*/
						$this->ln();
					//----------------------------------------------------------------
					$tb3->MoveNext();

					}
						$this->Line(58,$this->GetY(),200,$this->GetY());
						$this->cell(50,5,"");
						$this->setFont("Arial","B",7);
						$this->cell(60,5,"Intereses a cobrar conciliado  al  ".$this->fechas);
						$this->setFont("Arial","",7);
						$this->cell(23,5,$this->cont);
						$this->SetX(135);
						$this->cell(30,5,number_format($this->debe,2,'.',','),0,0,'R');
						$this->SetX(165 );
						$this->cell(30,5,number_format($this->haber,2,'.',','),0,0,'R');
						$y=$this->getY();
//////////////////////////////////////////////////////////////////77
			$this->ln(20);
			$cuentaint=substr(trim($tb->fields["codcta"]),0,strlen(trim($tb->fields["codcta"]))-2).'03';
			$this->formato($tb->fields["nomcue"],$cuentaint,$this->numcue,"AMORTIZACIONES CONCILIADAS",$tb->fields["nommon"]);
//			$this->formato($tb->fields["nomcue"],$tb->fields["codcta"],$this->numcue,"MOVIMIENTOS CONCILIADOS");
			$this->interes="SELECT A.CODCTA as codcta, A.DESCTA as descta, A.DEBCRE as DEBITOCREDITO, C.CODCTA as NROCTA,
							 to_char(C.FECCOM,'dd/mm/yyyy') as feccom, C.NUMCOM as numcom, C.REFASI as refasi, substr(B.DESCOM,1,80) as descom,
							 C.DEBCRE as debcre, B.STACOM as stacom, (CASE WHEN C.DEBCRE='D' THEN C.MONASI ELSE 0 END) as DEBITOS,
							 (CASE WHEN C.DEBCRE='C' THEN C.MONASI ELSE 0 END) as CREDITOS FROM CONTABB A,CONTABC B,CONTABC1 C
							WHERE A.CODCTA = C.CODCTA AND RTRIM(A.CODCTA) = RTRIM('".$cuentaint."') AND A.CARGAB = 'C' AND
							 B.NUMCOM = C.NUMCOM AND B.FECCOM = C.FECCOM AND C.FECCOM >= to_date('".$this->fecdes."','dd/mm/yyyy') AND
							 C.FECCOM <= to_date('".$this->fechas."','dd/mm/yyyy') AND B.STACOM <> 'N' AND B.STACOM <> 'R' AND (b.stacom='A')
							ORDER BY A.CODCTA,C.CODCTA,C.FECCOM,C.DEBCRE ,C.NUMCOM";//print $this->interes;exit;
$this->cont=0;
			$tb3=$tb1=$this->bd->select($this->interes);
			$this->setFont("Arial","",7);
			$this->debe=0;$this->haber=0;
//			$this->CdepC=0;$this->CncC=0;$this->CchC=0;$this->CndC=0;
//			$this->tdepC=0;$this->tncC=0;$this->tchC=0;$this->tndC=0;
			while (!$tb3->EOF)
			{ //print "hola";exit;
						$this->setX(10);
						$this->cont=$this->cont+1;
						if ($tb3->fields["debcre"]=='D')
						{
						$this->sqlO="select valmon from cireging where trim(numcom)=trim('".$tb3->fields["numcom"]."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						//$tbO->fields["valmon"];

						$mon=($tb3->fields["debitos"]/$tbO->fields["valmon"]);
						$mov="NC";
						$this->cell(15,5,$mov);
						}
						if ($tb3->fields["debcre"]=='C')
						{
						$this->sqlO="select valmon from cireging where trim(numcom)=trim('".$tb3->fields["numcom"]."') and fecing=to_date('".$tb3->fields["feccom"]."','dd/mm/yyyy')";//print $this->sqlO;exit;
                       	$tbO=$this->bd->select($this->sqlO);
						//$tbO->fields["valmon"];
						$mon=($tb3->fields["creditos"]/$tbO->fields["valmon"]);
						$mov="ND";
						$this->cell(15,5,$mov);
						}
						$this->cell(20,5,$tb3->fields["refasi"]);
						//print $tb3->fields["desref"];exit;
						//$this->cell(25,5,"beneficiario");
						$this->cell(65,5,substr($tb3->fields["descom"],0,40));
						$this->cell(20,5,substr(substr("CONCILIADO",0,10),0,30));
						$this->cell(15,5,$tb3->fields["feccom"]);
						if ($mov=='ND')
						{
							$this->CndC++;
							$this->tndC=$this->tndC+$mon;
						}
						elseif ($mov=='NC')
						{
							$this->CncC++;
							$this->tncC=$this->tncC+$mon;
						}

						if (strtoupper($tb1->fields["debcre"])=='C'){
						$this->Setx(135);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->cell(30,5);
						$deb=$mon;
						$cre=0;
						$this->debe=$this->debe+$mon;
						}
						else
						{
						//$this->cell(30,5,0);
						$this->Setx(165);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->haber=$this->haber+$mon;
						$deb=0;
						$cre=$mon;
						}
/*						$this->sal=$this->salant+$deb-$cre;
						$this->Setx(165);
						$this->cell(30,5,number_format($this->sal,2,'.',','),0,0,'R');
						$this->salant=$this->sal;*/
						$this->ln();
					//----------------------------------------------------------------
					$tb3->MoveNext();

					}
						$this->Line(58,$this->GetY(),200,$this->GetY());
						$this->cell(50,5,"");
						$this->setFont("Arial","B",7);
						$this->cell(60,5,"Amortización al  ".$this->fechas);
						$this->setFont("Arial","",7);
						$this->cell(23,5,$this->cont);
						$this->SetX(135);
						$this->cell(30,5,number_format($this->debe,2,'.',','),0,0,'R');
						$this->SetX(165 );
						$this->cell(30,5,number_format($this->haber,2,'.',','),0,0,'R');
						$y=$this->getY();
//////////////////////////////////////////////////////////////////77
}
		$this->Addpage();
			//$this->setY($y+18);
			$this->formato($tb->fields["nomcue"],$tb->fields["codcta"],$tb->fields["numcue"],"MOVIMIENTOS EN TRÁNSITO",$tb->fields["nommon"]);
			$tb3=$this->arrp;
			$this->setFont("Arial","",7);
			$this->debe=0;$this->haber=0;$this->cont=0;
			$this->CdepN=0;$this->CncN=0;$this->CchN=0;$this->CndN=0;
			$this->tdepN=0;$this->tncN=0;$this->tchN=0;$this->tndN=0;
			$this->CdepNB=0;$this->CncNB=0;$this->CchNB=0;$this->CndNB=0;
			$this->tdepNB=0;$this->tncNB=0;$this->tchNB=0;$this->tndNB=0;
			while (!$tb3->EOF and (trim(trim($tb3->fields["result"]))!='CONCILIADO'))
			{//print $tb3->fields["tipmov"];exit;
						$this->setX(10);
						$this->cont=$this->cont+1;
						if ($tb3->fields["movban"]==$tb3->fields["movlib"])
						{
							$this->sqlO="select valmon from tsmovlib where trim(reflib)=trim('".$tb3->fields["refere"]."')";
                        	$tbO=$this->bd->select($this->sqlO);
						if ($tbO->fields["tipmon"]=='')
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
                        //	print $this->sqlO."   hola  ".$tb3->fields["refere"]."   estes ".$tbO->fields["valmon"];exit;
						}elseif (trim($tbO->fields["tipmon"])<>trim($tb->fields["tipmon"]))
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
						}
							$mon=($tb3->fields["mon"]/$tbO->fields["valmon"]);
						$mov=$tb3->fields["movlib"];
						$this->cell(15,5,$tb3->fields["movlib"]);
						$this->sqlM="select debcre from tstipmov where trim(codtip)=trim('".$tb3->fields["movlib"]."')";
                        $tb1=$this->bd->select($this->sqlM);

						}
						elseif($tb3->fields["movban"]=='')
						{
							$this->sqlO="select valmon from tsmovlib where trim(reflib)=trim('".$tb3->fields["refere"]."')";
                        	$tbO=$this->bd->select($this->sqlO);
						if ($tbO->fields["tipmon"]=='')
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
                        //	print $this->sqlO."   hola  ".$tb3->fields["refere"]."   estes ".$tbO->fields["valmon"];exit;
						}elseif (trim($tbO->fields["tipmon"])<>trim($tb->fields["tipmon"]))
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
						}

						$mon=($tb3->fields["mon"]/$tbO->fields["valmon"]);
						$mov=$tb3->fields["movlib"];
						$this->cell(15,5,$tb3->fields["movlib"]);
						$this->sqlM="select debcre from tstipmov where trim(codtip)=trim('".$tb3->fields["movlib"]."')";
                        $tb1=$this->bd->select($this->sqlM);
						}
						else
						{
							$this->sqlO="select valmon from tsmovban where trim(reflib)=trim('".$tb3->fields["refere"]."')";
                        	$tbO=$this->bd->select($this->sqlO);
						if ($tbO->fields["tipmon"]=='')
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
                        //	print $this->sqlO."   hola  ".$tb3->fields["refere"]."   estes ".$tbO->fields["valmon"];exit;
						}elseif (trim($tbO->fields["tipmon"])<>trim($tb->fields["tipmon"]))
						{
							$this->sqlO="select distinct(a.valmon) from tsdesmon a,tsmovlib b where b.feclib=a.fecmon and trim(a.codmon)='".trim($tb->fields["tipmon"])."'";
                        	$tbO=$this->bd->select($this->sqlO);
						}
							$mon=($tb3->fields["monb"]/$tbO->fields["valmon"]);
						$mov=$tb3->fields["movban"];
						$this->sqlM="select debcre from tstipmov where trim(codtip)=trim('".$tb3->fields["movban"]."')";
                        $tb1=$this->bd->select($this->sqlM);
						$this->cell(15,5,$tb3->fields["movban"]);
						}
						$this->cell(20,5,$tb3->fields["refere"]);
						//print $tb3->fields["desref"];exit;
						//$this->cell(25,5,"beneficiario");
						$this->cell(62,5,substr($tb3->fields["desref"],0,40));
						if(trim($tb3->fields["result"])==('MOVIMIENTO EN TRANSITO'))
						{
						$this->cell(22,5,substr(substr("TRAN. EN LIBRO",0,14),0,30));
						if (substr($mov,0,2)=='DP')
						{
							$this->CdepN++;
							$this->tdepN=$this->tdepN+$mon;
						}
						elseif (substr($mov,0,2)=='CH')
						{
							$this->CchN++;
							$this->tchN=$this->tchN+$mon;
						}
						elseif (substr($mov,0,2)=='ND')
						{
							$this->CndN++;
							$this->tndN=$this->tndN+$mon;
						}
						elseif (substr($mov,0,2)=='NC')
						{
							$this->CncN++;
							$this->tncN=$this->tncN+$mon;
						}

						}
						else
						{
						$this->cell(22,5,substr(substr("TRAN. EN BANCO",0,14),0,30));

						if (substr($mov,0,2)=='DP')
						{
							$this->CdepN=$this->CdepN++;
							$this->$this->tdepNB=$this->tdepN=$this->tdepN+$mon;
						}
						elseif (substr($mov,0,2)=='CH')
						{
							$this->CchNB=$this->CchN++;
							$this->tchNB=$this->tchN=$this->tchN+$mon;
						}
						elseif (substr($mov,0,2)=='ND')
						{
							$this->CndNB=$this->CndN++;
							$this->tndNB=$this->tndN=$this->tndN+$mon;
						}
						elseif (substr($mov,0,2)=='NC')
						{
							$this->CncNB=$this->CncN++;
							$this->tncNB=$this->tncN=$this->tncN+$mon;
						}

						}
						$this->cell(15,5,$tb3->fields["feclib"]);

						if (strtoupper($tb1->fields["debcre"])=='C'){
						$this->Setx(135);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->cell(30,5);
						$deb=$mon;
						$cre=0;
						$this->debe=$this->debe+$mon;
						}
						else
						{
						//$this->cell(30,5,0);
						$this->Setx(165);
						$this->cell(30,5,number_format($mon,2,'.',','),0,0,'R');
						$this->haber=$this->haber+$mon;
						$deb=0;
						$cre=$mon;
						}

						$this->ln();
					//----------------------------------------------------------------
					$tb3->MoveNext();

					}
						$this->Line(58,$this->GetY(),200,$this->GetY());
						$this->cell(50,5,"");
						$this->setFont("Arial","B",7);
						$this->cell(60,5,"Saldo disponible del fondo conciliado  al  ".$this->fechas);
						$this->setFont("Arial","",7);
						$this->cell(23,5,$this->cont);
						$this->SetX(135);
						$this->cell(30,5,number_format($this->debe,2,'.',','),0,0,'R');
						$this->SetX(165 );
						$this->cell(30,5,number_format($this->haber,2,'.',','),0,0,'R');
						$y=$this->getY();
//////////////////////////////////////////////////////////////////77
						$this->Addpage();
						$this->formatotro($tb->fields["nomcue"],$tb->fields["numcue"],"RESUMEN DE OPERACIONES AL  ".$this->fechas);
						$this->SetX(10);
						$this->ln(4);
			$this->setFillColor(200,200,200);
			$this->MCplus(188,5,'OPERACIONES CONCILIADAS',1,"L",1);
			$this->ln(3);
			$this->cell(60,5,"Saldo anterior conciliado  al  ".$this->fecfin);
			$this->cell(124,5,number_format(($tb->fields["antban"]/$tb->fields["valmon"]),2,'.',','),0,0,'R');
			$this->setFont("Arial","",7);
			$this->ln(6);
			$this->SetX(10);
			$this->setFont("Arial","B",10);
			$this->cell(10,5,'+');
			$this->setFont("Arial","",7);
			$this->cell(50,5,$this->CdepC."  Depósitos");
			$this->cell(124,5,number_format($this->tdepC,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(20);
			$this->cell(50,5,$this->CncC."  Notas de créditos");
			$this->cell(124,5,number_format($this->tncC,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(30);
			$this->setFont("Arial","B",7);
			$this->cell(40,5,"Total Créditos");
			$this->cell(124,5,number_format($this->tdepC+$this->tncC,2,'.',','),0,0,'R');
			$this->ln(6);
			$this->SetX(10);
			$this->setFont("Arial","B",10);
			$this->cell(10,5,'-');
			$this->setFont("Arial","",7);
			$this->cell(50,5,$this->CchC."  Cheques");
			$this->cell(124,5,number_format($this->tchC,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(20);
			$this->cell(50,5,$this->CndC."  Notas de débito");
			$this->cell(124,5,number_format($this->tndC,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(30);
			$this->setFont("Arial","B",7);
			$this->cell(40,5,"Total Débitos");
			$this->cell(124,5,number_format($this->tchC+$this->tndC,2,'.',','),0,0,'R');
			$this->ln(6);
			$this->cell(60,5,"Saldo conciliado  al  ".$this->fechas);
			$this->cell(124,5,number_format((($tb->fields["antban"]/$tb->fields["valmon"])+($this->tdepC+$this->tncC)-($this->tchC+$this->tndC)),2,'.',','),0,0,'R');
			$subtotal=(($tb->fields["antban"]/$tb->fields["valmon"])+($this->tdepC+$this->tncC)-($this->tchC+$this->tndC));

			$this->SetX(10);
			$this->ln(30);
			$this->setFillColor(200,200,200);
			$this->MCplus(188,5,'OPERACIONES EN TRÁNSITO',1,"L",1);
			$this->ln(6);
			$this->SetX(10);
			$this->setFont("Arial","B",10);
			$this->cell(10,5,'+');
			$this->setFont("Arial","",7);
			$this->cell(50,5,$this->CdepN."  Depósitos en tránsito");
			$this->cell(124,5,number_format($this->tdepN,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(20);
			$this->cell(50,5,$this->CncN."  Notas de créditos en tránsito");
			$this->cell(124,5,number_format($this->tncN,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(30);
			$this->setFont("Arial","B",7);
			$this->cell(40,5,"Total Créditos en tránsito");
			$this->cell(124,5,number_format($this->tdepN+$this->tncN,2,'.',','),0,0,'R');
			$this->ln(6);
			$this->SetX(10);
			$this->setFont("Arial","B",10);
			$this->cell(10,5,'-');
			$this->setFont("Arial","",7);
			$this->cell(50,5,$this->CchN."  Cheques en tránsito");
			$this->cell(124,5,number_format($this->tchN,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(20);
			$this->cell(50,5,$this->CndN."  Notas de débito en tránsito");
			$this->cell(124,5,number_format($this->tndN,2,'.',','),0,0,'R');
			$this->ln(5);
			$this->SetX(30);
			$this->setFont("Arial","B",7);
			$this->cell(40,5,"Total Débitos en tránsito");
			$this->cell(124,5,number_format($this->tchN+$this->tndN,2,'.',','),0,0,'R');
			$this->ln(6);
			$this->cell(60,5,"Saldo en libros  al  ".$this->fechas);
			$this->cell(124,5,number_format(($subtotal-($this->tdepN+$this->tncN)-($this->tchN+$this->tndN)),2,'.',','),0,0,'R');
			$this->ln(12);
	//		$this->cell(60,5,"Diferencia saldo conciliado al ".$this->fechas);
	//		$this->cell(124,5,number_format(-1*(($this->tdepN+$this->tncN)-($this->tchN+$this->tndN)),2,'.',','),0,0,'R');

		}
	}
?>
