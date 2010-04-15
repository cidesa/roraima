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
			$this->conf="p";
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
							distinct rtrim(B.CODEMP) as CODEMP,
							B.NOMEMP as nomemp,
							B.FECING,
							B.FECRET,
							B.NUMCUE,
							(CASE WHEN B.STAEMP='A' THEN 'ACTIVO' WHEN B.STAEMP='S' THEN 'SUSPENDIDO' WHEN B.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS
						FROM NPHOJINT B,NPHISCON C
						WHERE 
							B.CODEMP=C.CODEMP and 
							B.CODEMP >=RPAD('".$this->codempdes."',16,' ') AND
							B.CODEMP <=RPAD('".$this->codemphas."',16,' ') AND
							CODNOM='".$this->tipnom."'";
						//print $this->sql;			
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				if($tb->fields["codemp"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 $this->setFillColor(192,192,192);
				 $this->cell(20,3,'Cedula',0,0,'',1);
				 $this->cell(60,3,'Apellidos y Nombres',0,0,'',1);
				 $this->setFillColor(0,0,0);
				 $tira='01/01/'.$this->annofiscal;
				 $tira2='31/12/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='51' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$numero=$b->fields["numero"];
				 }
				 $this->cell(40,5,'Seguro Social: '.number_format($numero,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='52' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$numero2=$b->fields["numero"];
				 }
				 $this->cell(40,5,'Fondo Juvilación: '.number_format($numero2,2,'.',','));
				 $this->ln(4);
				 $this->setFont("Arial","",8); 
				 $this->cell(20,5,$tb->fields["codemp"]);
				 $this->cell(60,5,$tb->fields["nomemp"]);
				 $this->setFont("Arial","B",8);
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='57' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$numero3=$b->fields["numero"];
				 }
				 $this->cell(40,5,'IPASME: '.number_format($numero3,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='55' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$numero4=$b->fields["numero"];
				 }
				 $this->cell(40,5,'Caja de Ahorro: '.number_format($numero4,2,'.',','));
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->setFillColor(192,192,192);
				 $this->cell(20,10,'Meses',0,0,'',1);
				 $this->cell(30,10,'Remuneración',0,0,'',1);
				 $this->cell(30,10,'% I.S.L.R.',0,0,'',1);
				 $this->cell(30,10,'I.S.L.R.',0,0,'',1);
				 $this->cell(40,10,'Remuneración Acumulada',0,0,'',1);
				 $this->cell(40,10,'I.S.L.R. Acumulado',0,0,'',1);				
				 $this->ln(10); 
				 $this->setFillColor(0,0,0);
				 $this->line(10,$this->getY(),200,$this->getY());
				}
				
				 $this->setFont("Arial","",8); 
				 $this->cell(20,10,'Enero');
				 $tira='01/01/'.$this->annofiscal;
				 $tira2='31/01/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer1=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer1,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr1=$b->fields["numero"];
				 }
				 if($renumer1==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr1/$renumer1*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr1,2,'.',','));
				 $this->cell(40,10,number_format($renumer1,2,'.',','));
				 $this->cell(40,10,number_format($islr1,2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Febrero');
				 $tira='01/02/'.$this->annofiscal;
				 $tira2='29/02/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer2=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer2,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr2=$b->fields["numero"];
				 }
				 if($renumer2==0)
				 {
				 	$division2=0;
				 }
				 else
				 {
				 	$division2=($islr2/$renumer2*100);
				 }
				 $this->cell(30,10,number_format($division2,2,'.',','));
				 $this->cell(30,10,number_format($islr2,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2),2,'.',','));		
				 $this->ln(3);	
				 $this->cell(20,10,'Marzo');
				 $tira='01/03/'.$this->annofiscal;
				 $tira2='31/03/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer3=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer3,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr3=$b->fields["numero"];
				 }
				 if($renumer3==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr3/$renumer3*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr3,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Abril');
				 $tira='01/04/'.$this->annofiscal;
				 $tira2='31/04/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer4=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer4,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr4=$b->fields["numero"];
				 }
				 if($renumer4==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr4/$renumer4*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr4,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Mayo');
				 $tira='01/05/'.$this->annofiscal;
				 $tira2='31/05/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer5=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer5,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr5=$b->fields["numero"];
				 }
				 if($renumer5==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr5/$renumer5*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr5,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Junio');
				 $tira='01/06/'.$this->annofiscal;
				 $tira2='31/06/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer6=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer6,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr6=$b->fields["numero"];
				 }
				 if($renumer6==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr6/$renumer6*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr6,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5+$renumer6),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5+$islr6),2,'.',','));			
				 $this->ln(3);
				 $this->cell(20,10,'Julio');
				 $tira='01/07/'.$this->annofiscal;
				 $tira2='31/07/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer7=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer7,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr7=$b->fields["numero"];
				 }
				 if($renumer7==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr7/$renumer7*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr7,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5+$renumer6+$renumer7),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5+$islr6+$islr7),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Agosto');
				 $tira='01/08/'.$this->annofiscal;
				 $tira2='31/08/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer8=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer8,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr8=$b->fields["numero"];
				 }
				 if($renumer8==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr8/$renumer8*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr8,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5+$renumer6+$renumer7+$renumer8),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5+$islr6+$islr7+$islr8),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Septiembre');
				 $tira='01/09/'.$this->annofiscal;
				 $tira2='31/09/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer9=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer9,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr9=$b->fields["numero"];
				 }
				 if($renumer9==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr9/$renumer9*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr9,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5+$renumer6+$renumer7+$renumer8+$renumer9),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5+$islr6+$islr7+$islr8+$islr9),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Octubre');
				 $tira='01/10/'.$this->annofiscal;
				 $tira2='31/10/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer10=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer10,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr10=$b->fields["numero"];
				 }
				 if($renumer10==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr10/$renumer10*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr10,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5+$renumer6+$renumer7+$renumer8+$renumer9+$renumer10),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5+$islr6+$islr7+$islr8+$islr9+$islr10),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Noviembre');
				 $tira='01/11/'.$this->annofiscal;
				 $tira2='31/11/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer11=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer11,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr11=$b->fields["numero"];
				 }
				 if($renumer11==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr11/$renumer11*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr11,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5+$renumer6+$renumer7+$renumer8+$renumer9+$renumer10+$renumer11),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5+$islr6+$islr7+$islr8+$islr9+$islr10+$islr11),2,'.',','));			
				 $this->ln(3);	
				 $this->cell(20,10,'Diciembre');
				 $tira='01/12/'.$this->annofiscal;
				 $tira2='31/12/'.$this->annofiscal;
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPCONARC A,NPHISCON B
   									   WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									A.CODCON=B.CODCON AND
       									A.CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$renumer12=$b->fields["numero"];
				 }
				 $this->cell(30,10,number_format($renumer12,2,'.',','));
				 $b=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as NUMERO FROM NPHISCON
   										WHERE 
       									(CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
       									SUBSTR(CODCON,2,2)='56' AND
       									CODNOM='".$this->tipnom."' AND 
       									FECNOM>=to_date('".$tira."','dd/mm/yyyy') AND FECNOM<=to_date('".$tira2."','dd/mm/yyyy')");
				 if(!$b->EOF)
				 {
				 	$islr12=$b->fields["numero"];
				 }
				 if($renumer12==0)
				 {
				 	$division=0;
				 }
				 else
				 {
				 	$division=($islr12/$renumer12*100);
				 }
				 $this->cell(30,10,number_format($division,2,'.',','));
				 $this->cell(30,10,number_format($islr12,2,'.',','));
				 $this->cell(40,10,number_format(($renumer1+$renumer2+$renumer3+$renumer4+$renumer5+$renumer6+$renumer7+$renumer8+$renumer9+$renumer10+$renumer11+$renumer12),2,'.',','));
				 $this->cell(40,10,number_format(($islr1+$islr2+$islr3+$islr4+$islr5+$islr6+$islr7+$islr8+$islr9+$islr10+$islr11+$islr12),2,'.',','));			
				 $this->ln(8);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $ref=$tb->fields["codemp"];
				 $tb->MoveNext();
			     $this->ln(15);
			}
		}
	}
?>