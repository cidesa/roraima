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
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $tipnom;
		var $annofiscal;
		var $conf;
		var $nombre;
				
		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->tipnom=$_POST["tipnom"];
			$this->annofiscal=$_POST["annofiscal"];
			$this->sql="SELECT
							distinct
							B.CODEMP,
							B.NOMEMP,
							to_char(B.FECING,'dd/mm/yyyy') as fecing,
							to_char(B.FECRET,'dd/mm/yyyy') as fecret,
							B.NUMCUE,
							C.CODCON,
							(CASE WHEN B.STAEMP='A' THEN 'ACTIVO' WHEN B.STAEMP='S' THEN 'SUSPENDIDO' WHEN B.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS
						FROM NPCONARC A,NPHOJINT B,NPHISCON C
						WHERE
							B.CODEMP=C.CODEMP and
							A.CODCON=C.CODCON AND
							A.codnom=c.codnom and
							B.CODEMP >=RPAD('".$this->codempdes."',16,' ') AND
							B.CODEMP <=RPAD('".$this->codemphas."',16,' ') AND
							C.CODNOM='".$this->tipnom."'";
						//print $this->sql;			
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$this->cell(20,5,'NOMINA: ');
			$this->cell(20,5,$this->tipnom);
			$r=$this->bd->select("SELECT UPPER(NOMNOM) as NOMBRE FROM NPNOMINA  WHERE CODNOM=('".$this->tipnom."')");
			if(!$r->EOF)
			{
				$this->nombre=$r->fields["nombre"];
			}
			$this->cell(150,5,$this->nombre);
			$this->cell(20,5,'AÑO: '.$this->annofiscal);
			$this->ln(5);
			$this->line(10,$this->getY(),270,$this->getY());
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$aene=0;
			$afeb=0;
			$amar=0;
			$aabr=0;
			$amay=0;
			$ajun=0;
			$ajul=0;
			$aago=0;
			$asep=0;
			$aoct=0;
			$anov=0;
			$adic=0;
			$atot=0;
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["codemp"];
				 $this->setFont("Arial","B",8);
				 $this->setFillColor(192,192,192);
				 $this->ln(2);
				 $this->cell(20,4,$tb2->fields["codemp"],0,0,'',1);
				 $this->cell(90,4,strtoupper($tb2->fields["nomemp"]),0,0,'',1);
				 $this->cell(20,4,'CARGO: ',0,0,'',1);
				 $f=$this->bd->select("Select coalesce(max(codcar),' ') as codcargo from npasicaremp where codemp=rpad('".$tb2->fields["codemp"]."',16,' ')");
				 if(!$f->EOF)
				 {
				 	$cargo=$f->fields["codcargo"];
				 }
				 $this->cell(25,4,$cargo,0,0,'',1);
				 $e=$this->bd->select("Select UPPER(nomcar) as nomcargo from npcargos where codcar=rpad('".$cargo."',16,' ')");
				 if(!$e->EOF)
				 {
				 	$nomcargo=$e->fields["nomcargo"];
				 }
				 $this->cell(105,4,$nomcargo,0,0,'',1);
				 $this->setFillColor(0,0,0);
				 $this->ln(4);
				 $this->cell(30,5,'FECHA DE INGRESO: ');
				 $this->cell(30,5,$tb2->fields["fecing"]);
				 $this->cell(30,5,'FECHA DE EGRESO: ');
				 if($tb2->fields["fecret"]==NULL)
				 {
				 	$retiro="";
				 }
				 else
				 {
				 	$retiro=$tb2->fields["fecret"];
				 }
				 $this->cell(65,5,$retiro);
				 $this->cell(30,5,'Cuenta Bancaria: ');
				 $this->cell(60,5,$tb2->fields["numcue"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $this->cell(8,5,'Cod.');
				 $this->cell(35,5,'Nombre Concepto');
				 $this->cell(15,5,'Enero');
				 $this->cell(15,5,'Febrero');
				 $this->cell(15,5,'Marzo');
				 $this->cell(15,5,'Abril');
				 $this->cell(15,5,'Mayo');
				 $this->cell(15,5,'Junio');
				 $this->cell(15,5,'Julio');
				 $this->cell(15,5,'Agosto');
				 $this->cell(20,5,'Septiembre');
				 $this->cell(18,5,'Octubre');
				 $this->cell(20,5,'Noviembre');
				 $this->cell(20,5,'Diciembre');
				 $this->cell(20,5,'Total Año');
				 $this->ln(5);
				 $this->line(10,$this->getY(),270,$this->getY());
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codemp"]!=$ref)
				{
				 //totales
				 $this->ln(6);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $this->cell(8,5,'');
				 $this->cell(35,5,'');
				 $this->cell(15,5,number_format($aene,2,'.',','));
				 $this->cell(15,5,number_format($afeb,2,'.',','));
				 $this->cell(15,5,number_format($amar,2,'.',','));
				 $this->cell(15,5,number_format($aabr,2,'.',','));
				 $this->cell(15,5,number_format($amay,2,'.',','));
				 $this->cell(15,5,number_format($ajun,2,'.',','));
				 $this->cell(15,5,number_format($ajul,2,'.',','));
				 $this->cell(15,5,number_format($aago,2,'.',','));
				 $this->cell(20,5,number_format($asep,2,'.',','));
				 $this->cell(18,5,number_format($aoct,2,'.',','));
				 $this->cell(20,5,number_format($anov,2,'.',','));
				 $this->cell(20,5,number_format($adic,2,'.',','));
				 $this->cell(20,5,number_format($atot,2,'.',','));
				 $this->ln(6);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $aene=0;
				 $afeb=0;
				 $amar=0;
				 $aabr=0;
				 $amay=0;
				 $ajun=0;
				 $ajul=0;
				 $aago=0;
				 $asep=0;
				 $aoct=0;
				 $anov=0;
				 $adic=0;
				 $atot=0;
				 //
				 $this->setFont("Arial","B",8);
				 $this->setFillColor(192,192,192);
				 $this->ln(2);
				 $this->cell(20,4,$tb->fields["codemp"],0,0,'',1);
				 $this->cell(90,4,strtoupper($tb->fields["nomemp"]),0,0,'',1);
				 $this->cell(20,4,'CARGO: ',0,0,'',1);
				 $f=$this->bd->select("Select coalesce(max(codcar),' ') as codcargo from npasicaremp where codemp=rpad('".$tb->fields["codemp"]."',16,' ')");
				 if(!$f->EOF)
				 {
				 	$cargo=$f->fields["codcargo"];
				 }
				 $this->cell(25,4,$cargo,0,0,'',1);
				 $e=$this->bd->select("Select UPPER(nomcar) as nomcargo from npcargos where codcar=rpad('".$cargo."',16,' ')");
				 if(!$e->EOF)
				 {
				 	$nomcargo=$e->fields["nomcargo"];
				 }
				 $this->cell(105,4,$nomcargo,0,0,'',1);
				 $this->setFillColor(0,0,0);
				 $this->ln(4);
				 $this->cell(30,5,'FECHA DE INGRESO: ');
				 $this->cell(30,5,$tb->fields["fecing"]);
				 $this->cell(30,5,'FECHA DE EGRESO: ');
				 if($tb->fields["fecret"]==NULL)
				 {
				 	$retiro="";
				 }
				 else
				 {
				 	$retiro=$tb->fields["fecret"];
				 }
				 $this->cell(65,5,$retiro);
				 $this->cell(30,5,'Cuenta Bancaria: ');
				 $this->cell(60,5,$tb->fields["numcue"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $this->cell(8,5,'Cod.');
				 $this->cell(35,5,'Nombre Concepto');
				 $this->cell(15,5,'Enero');
				 $this->cell(15,5,'Febrero');
				 $this->cell(15,5,'Marzo');
				 $this->cell(15,5,'Abril');
				 $this->cell(15,5,'Mayo');
				 $this->cell(15,5,'Junio');
				 $this->cell(15,5,'Julio');
				 $this->cell(15,5,'Agosto');
				 $this->cell(20,5,'Septiembre');
				 $this->cell(18,5,'Octubre');
				 $this->cell(20,5,'Noviembre');
				 $this->cell(20,5,'Diciembre');
				 $this->cell(20,5,'Total Año');
				 $this->ln(5);
				 $this->line(10,$this->getY(),270,$this->getY());
				}
				 $this->setFont("Arial","B",7);
				 $this->cell(8,5,$tb->fields["codcon"]);
				 $p=$this->bd->select("SELECT NOMCON as TIRA FROM NPDEFCPT  WHERE  CODCON='".$tb->fields["codcon"]."'");
				 if(!$p->EOF)
				 {
				 	$concepto=$p->fields["tira"];
				 }
				 $this->cell(35,5,substr($concepto,0,22));
				 $this->setFont("Arial","B",6);
				 //enero
				 $mesdesde='01/01/'.$this->annofiscal;
				 $meshasta='31/01/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$enero=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($enero,2,'.',','));
				 $aene=$aene+$enero;
				 //febrero
				 $mesdesde='01/02/'.$this->annofiscal;
				 $meshasta='29/02/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$febrero=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($febrero,2,'.',','));
				 $afeb=$afeb+$febrero;
				 //marzo
				 $mesdesde='01/03/'.$this->annofiscal;
				 $meshasta='31/03/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$marzo=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($marzo,2,'.',','));
				 $amar=$amar+$marzo;
				 //abril
				 $mesdesde='01/04/'.$this->annofiscal;
				 $meshasta='30/04/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$abril=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($abril,2,'.',','));
				 $aabr=$aabr+$abril;
				 //mayo
				 $mesdesde='01/05/'.$this->annofiscal;
				 $meshasta='31/05/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$mayo=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($mayo,2,'.',','));
				 $amay=$amay+$mayo;
				 //junio
				 $mesdesde='01/06/'.$this->annofiscal;
				 $meshasta='30/06/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$junio=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($junio,2,'.',','));
				 $ajun=$ajun+$junio;
				 //julio
				 $mesdesde='01/07/'.$this->annofiscal;
				 $meshasta='31/07/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$julio=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($julio,2,'.',','));
				 $ajul=$ajul+$julio;
				 //agosto
				 $mesdesde='01/08/'.$this->annofiscal;
				 $meshasta='31/08/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$agosto=$t->fields["numero"];
				 }
				 $this->cell(15,5,number_format($agosto,2,'.',','));
				 $aago=$aago+$agosto;
				 //septiembre
				 $mesdesde='01/09/'.$this->annofiscal;
				 $meshasta='30/09/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$septiembre=$t->fields["numero"];
				 }
				 $this->cell(20,5,number_format($septiembre,2,'.',','));
				 $asep=$asep+$septiembre;
				 //octubre
				 $mesdesde='01/10/'.$this->annofiscal;
				 $meshasta='31/10/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$octubre=$t->fields["numero"];
				 }
				 $this->cell(18,5,number_format($octubre,2,'.',','));
				 $aoct=$aoct+$octubre;
				 //noviembre
				 $mesdesde='01/11/'.$this->annofiscal;
				 $meshasta='30/11/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$noviembre=$t->fields["numero"];
				 }
				 $this->cell(20,5,number_format($noviembre,2,'.',','));
				 $anov=$anov+$noviembre;
				 //diciembre
				 $mesdesde='01/12/'.$this->annofiscal;
				 $meshasta='31/12/'.$this->annofiscal;
				 $t=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON 
   									   WHERE 
       										CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       										CODCON='".$tb->fields["codcon"]."' AND 
       										CODNOM='".$this->tipnom."' AND 
       										FECNOM>=to_date('".$mesdesde."','dd/mm/yyyy') AND FECNOM<=to_date('".$meshasta."','dd/mm/yyyy')");
				 if(!$t->EOF)
				 {
				 	$diciembre=$t->fields["numero"];
				 }
				 $this->cell(20,5,number_format($diciembre,2,'.',','));
				 $adic=$adic+$diciembre;
				 //total Anual
				 $totalanual=$enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$noviembre+$diciembre;
				 $this->cell(20,5,number_format($totalanual,2,'.',','));
				 $atot=$atot+$totalanual;
				 $ref=$tb->fields["codemp"];
				 $tb->MoveNext();
			     $this->ln(3);
			}
				 //totales
				 $this->ln(6);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $this->cell(8,5,'');
				 $this->cell(35,5,'');
				 $this->cell(15,5,number_format($aene,2,'.',','));
				 $this->cell(15,5,number_format($afeb,2,'.',','));
				 $this->cell(15,5,number_format($amar,2,'.',','));
				 $this->cell(15,5,number_format($aabr,2,'.',','));
				 $this->cell(15,5,number_format($amay,2,'.',','));
				 $this->cell(15,5,number_format($ajun,2,'.',','));
				 $this->cell(15,5,number_format($ajul,2,'.',','));
				 $this->cell(15,5,number_format($aago,2,'.',','));
				 $this->cell(20,5,number_format($asep,2,'.',','));
				 $this->cell(18,5,number_format($aoct,2,'.',','));
				 $this->cell(20,5,number_format($anov,2,'.',','));
				 $this->cell(20,5,number_format($adic,2,'.',','));
				 $this->cell(20,5,number_format($atot,2,'.',','));
				 $this->ln(6);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $aene=0;
				 $afeb=0;
				 $amar=0;
				 $aabr=0;
				 $amay=0;
				 $ajun=0;
				 $ajul=0;
				 $aago=0;
				 $asep=0;
				 $aoct=0;
				 $anov=0;
				 $adic=0;
				 $atot=0;
				 //
		}
	}
?>