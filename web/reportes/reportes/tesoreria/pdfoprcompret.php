<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
//	require_once("../../lib/general/caracteres.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $numorddes;
		var $conf;
		var $formato;
		var $direccion;
		var $telefono;
		var $correlativo;
				
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
			$this->numorddes=$_POST["numorddes"];
			$this->sql="SELECT
							C.CEDRIF as cedula,
							C.NOMBEN,
							C.DIRBEN,
							C.TELBEN ,
							C.NITBEN,
							TO_CHAR(E.FECLIB, 'DD') as DIAENT,
							TO_CHAR(E.FECLIB, 'MM') as MESENT,
							TO_CHAR(E.FECLIB, 'YYYY') as ANNOENT,
							B.NUMCHE,
							B.DESORD,
							B.NUMORD,
							B.MONORD,
							(B.MONORD-B.MONRET) as NETO,
							D.CODTIP,
							E.NUMCUE,
							F.NOMCUE,
							sum(D.MONRET) as monret
						FROM OPORDPAG B,OPBENEFI C,OPRETORD D,TSMOVLIB E, TSDEFBAN F
						WHERE
							B.STATUS<>'A' AND
							B.NUMCHE=E.REFLIB AND
							B.CEDRIF=C.CEDRIF AND
							B.NUMORD=D.NUMORD AND
							B.NUMORD=RPAD('".$this->numorddes."',8,' ')  AND
							E.NUMCUE=F.NUMCUE
						GROUP BY
							C.CEDRIF,
							C.NOMBEN,
							C.DIRBEN,
							C.TELBEN ,
							C.NITBEN,
							TO_CHAR(E.FECLIB, 'DD') ,
							TO_CHAR(E.FECLIB, 'MM'),
							TO_CHAR(E.FECLIB, 'YYYY'),
							B.NUMCHE,
							B.DESORD,
							B.NUMORD,
							B.MONORD,
							(B.MONORD-B.MONRET) ,
							D.CODTIP,
							E.NUMCUE,
							F.NOMCUE";			
			//print $this->sql;
		}
		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->Cell(350,10,'Fecha: '.$fecha,0,0,'C');
			$this->ln(5);
			//Paginas
			$n=$this->bd->select("SELECT TO_CHAR('now'::date,'DD/MM/YYYY') as FECHA_ACT FROM EMPRESA");
			if(!$n->EOF)
			{
				$fecha_act=$n->fields["fecha_act"];
			}
			$e=$this->bd->select("SELECT coalesce(COMRETGEN,' ') as COMRET,FECCOMRETGEN as FECCOMRET FROM OPORDPAG WHERE NUMORD='".$this->numorddes."'");
			if(!$e->EOF)
			{
				$comret=$e->fields["comret"];
				$feccomret=$e->fields["feccomret"];
			}
			//generamos el correlativo
			if(is_null($comret)==true)
			{
				$p=$this->bd->select("SELECT NEXTVAL('correlativo_general') as CORRELATIVO");
				if(!$p->EOF)
				{
					$this->correlativo=$p->fields["correlativo"];
				}
				$this->bd->actualizar("UPDATE OPORDPAG SET COMRETGEN='".$this->correlativo."',FECCOMRETGEN=TO_DATE('".$fecha_act."','DD/MM/YYYY') WHERE NUMORD='".$this->numorddes."'");
				
			}
			else
			{
				$this->correlativo=$comret;
				if(is_null($feccomret)!=true)
				{
					$fecha_act=date('d/m/Y',$feccomret);
				}
			}
			$this->Cell(350,10,'N� de Planilla: '.$this->correlativo,0,0,'C');
	    	//Titulo Descripcion de la Empresa
			$p=$this->bd->select("SELECT NOMEMP as NOMEMPRESA FROM EMPRESA WHERE CODEMP='001'");
			if(!$p->EOF)
			{
				$empresa=$p->fields["nomempresa"];
			}
    		$this->Ln(-5);
    		$this->Cell(180,5,strtoupper('hidrocentro'),0,0,'C');
			$this->Ln(20);
			//Titulo del Reporte
			$this->setFont("Arial","B",12);
			$this->Cell(180,10,$_POST["titulo"],0,0,'C',0); 
			$this->ln(10);
			$this->setFont("Arial","B",8);
    		$this->Cell(60,5,'DATOS DEL AGENTE DE RETENCION');
			$this->ln(4);
			$this->line(10,$this->getY(),200,$this->getY());
			$this->line(10,$this->getY(),10,210);
			$this->line(200,$this->getY(),200,210);
			$this->line(10,210,200,210);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$acum1=0;
			$neto=0;
			$ref="";
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			if(!$tb2->EOF)
			{
				//creaci�n del los cuadros
				$this->Rect($this->getX()+1,$this->getY()+5,140,10);
				$this->Rect($this->getX()+141,$this->getY()+5,45,10);
				$this->Rect($this->getX()+1,$this->getY()+15,140,10);
				$this->Rect($this->getX()+141,$this->getY()+15,45,10);
				//
				$this->ln(5);
				$this->setFont("Arial","",7);
				$this->cell(142,5,' NOMBRE O RAZON SOCIAL: ');
				$this->cell(20,5,' N� RIF: ');
				$this->setFont("Arial","",8);
				$this->ln(4);
				$this->cell(142,5,' C.A. HIDROLOGICA DEL CENTRO  (HIDROCENTRO)');
				$this->cell(20,5,' J-075737393');
				$this->ln(6);
				$this->setFont("Arial","",7);
				$this->cell(142,5,' DIRECCION: ');
				$this->cell(20,5,' TELF: ');
				$this->setFont("Arial","",8);
				$this->ln(4);
				$this->cell(142,5,' AV. PAEZ C.C. GUACARA LOCALES 96-106 GUACARA  EDO  CARABOBO');
				$this->cell(20,5,' 0245-5601907 / 1839');
				$this->ln(8);
				$this->setFont("Arial","B",8);
				$this->cell(142,5,'DATOS DEL BENEFICIARIO');
				$this->ln(1);
				//creaci�n del los cuadros
				$this->Rect($this->getX()+1,$this->getY()+5,140,10);
				$this->Rect($this->getX()+141,$this->getY()+5,45,10);
				$this->Rect($this->getX()+1,$this->getY()+15,140,10);
				$this->Rect($this->getX()+141,$this->getY()+15,45,10);
				$this->Rect($this->getX()+1,$this->getY()+25,40,10);
				$this->Rect($this->getX()+41,$this->getY()+25,30,10);
				$this->Rect($this->getX()+71,$this->getY()+25,50,10);
				$this->Rect($this->getX()+121,$this->getY()+25,65,10);
				$this->Rect($this->getX()+1,$this->getY()+35,40,10);
				$this->Rect($this->getX()+41,$this->getY()+35,80,10);
				$this->Rect($this->getX()+121,$this->getY()+35,65,10);
				$this->Rect($this->getX()+1,$this->getY()+45,185,15);
				//
				$this->ln(5);
				$this->setFont("Arial","",7);
				$this->cell(142,5,' NOMBRE O RAZON SOCIAL: ');
				$this->cell(20,5,' N� RIF: ');
				$this->setFont("Arial","",8);
				$this->ln(4);
				$this->cell(142,5,' '.strtoupper($tb2->fields["nomben"]));
				$this->cell(20,5,' '.$tb2->fields["cedula"]);
				$this->ln(6);
				$this->setFont("Arial","",7);
				$this->cell(142,5,' DIRECCION: ');
				$this->cell(20,5,' TELF: ');
				$this->setFont("Arial","",7);
				$this->ln(4);
				$this->cell(142,5,' '.strtoupper($tb2->fields["dirben"]));
				$this->setFont("Arial","",8);
				$this->cell(20,5,' '.$tb2->fields["telben"]);
				$this->ln(5);
				$this->setFont("Arial","",7);
				$this->cell(40,5,' ORDEN DE PAGO');
				$this->cell(30,5,' N� DE CHEQUE:');
				$this->cell(50,5,' N� DE CUENTA:');
				$this->cell(65,5,' BANCO:');
				$this->ln(4);
				$this->setFont("Arial","",8);
				$this->cell(42,5,' '.$tb2->fields["numord"]);
				$this->cell(32,5,$tb2->fields["numche"]);
				$this->cell(52,5,$tb2->fields["numcue"]);
				$this->setFont("Arial","",6);
				$this->cell(65,5,strtoupper($tb2->fields["nomcue"]));
				$this->ln(7);
				$this->setFont("Arial","",7);
				$this->cell(40,5,' FACTURA');
				$this->cell(80,5,' CONTRATO:');
				$this->cell(65,5,' LA CANTIDAD DE BS:');
				$this->ln(4);
				$this->setFont("Arial","",8);
				$this->cell(40,5,' ');
				$this->cell(80,5,' ');
				$this->cell(65,5,' '.number_format($tb2->fields["monord"],2,'.',','));
				$this->ln(6);
				$this->setFont("Arial","",7);
				$this->cell(40,5,' DESCRIPCION:');
				$this->ln(4);
				$this->setFont("Arial","",8);
				$y = $this->GetY();
				$this->Cell(5);
				$this->MultiCell(175,3,strtoupper($tb2->fields["desord"]));
				$this->SetY($y);
				$this->ln(12);
				$this->setFont("Arial","B",8);
				$this->cell(40,5,'INFORMACION DEL IMPUESTO RETENIDO');
				$this->ln(1);
				//creaci�n del los cuadros
				$this->Rect($this->getX()+1,$this->getY()+5,20,5);
				$this->Rect($this->getX()+1,$this->getY()+10,6,5);
				$this->Rect($this->getX()+7,$this->getY()+10,7,5);
				$this->Rect($this->getX()+14,$this->getY()+10,7,5);
				$this->Rect($this->getX()+21,$this->getY()+5,110,10);
				$this->Rect($this->getX()+131,$this->getY()+5,10,10);
				$this->Rect($this->getX()+141,$this->getY()+5,45,10);
			 	$this->Rect($this->getX()+1,$this->getY()+15,185,49);
				//
				$this->ln(6);
				$this->setFont("Arial","",6);
				$this->cell(20,5,' FECHA DE PAGO');
				$this->cell(90,5,' RETENCION');
				$this->cell(23,5,'MONTO BASE');
				$this->cell(20,5,'%');
				$this->cell(20,5,'IMPUESTO RETENIDO');
				$this->ln(5);
				$this->cell(7,5,' DIA');
				$this->cell(7,5,'MES');
				$this->cell(7,5,'A�O');
				$ref=$tb2->fields["numord"];
				$neto=$tb2->fields["neto"];
				$ok=true;
				$cont=0;
				$this->ln(5);
			}
			while((!$tb->EOF)&&($ok==true))
			{
				if($tb->fields["numord"]!=$ref)
				{
					$ok=false;
				}
				$this->setFont("Arial","",7);
				//$this->ln(2);
				$this->cell(7,3,' '.$tb->fields["diaent"]);
				$this->cell(7,3,$tb->fields["mesent"]);
				$this->cell(7,3,$tb->fields["annoent"]);
				$tsql="SELECT PORRET as tarifa, PORSUS as SUSTRA FROM OPTIPRET WHERE CODTIP='".$tb->fields["codtip"]."'";
				//print $tsql;
				$h=$this->bd->select($tsql);
				if(!$h->EOF)
				{
					$tarifa=$h->fields["tarifa"];
					$sustra=$h->fields["sustra"];
				}
				if($sustra!=0)
				{
					$mitarifa=$sustra;
				}
				else
				{
					$mitarifa=$tarifa;
				}
				$g=$this->bd->select("SELECT MAX(coalesce(MONBAS,0)) as BASE FROM OPRETORD WHERE NUMORD='".$tb->fields["numord"]."' AND CODTIP='".$tb->fields["codtip"]."'");
				if(!$g->EOF)
				{
					$base=$g->fields["base"];
				}
				if($base==0)
				{
					$base=$tb->fields["monret"]*100/$mitarifa;
				}
				$this->SetX(121);
				$this->cell(21,3,number_format($base,2,'.',','),0,0,'R');
				$this->cell(10,3,$mitarifa,0,0,'R');
				$this->cell(36,3,number_format($tb->fields["monret"],2,'.',','),0,0,'R');
				$this->SetX(31);
				$t=$this->bd->select("SELECT DESTIP as DESCRIP FROM OPTIPRET WHERE CODTIP='".$tb->fields["codtip"]."'");
				if(!$t->EOF)
				{
					$desc=$t->fields["descrip"];
				}
				$this->setFont("Arial","",6);
				$this->MultiCell(90,3,$tb->fields["codtip"].' '.$desc);
				$acum1=$acum1+$tb->fields["monret"];
				$ref=$tb->fields["numord"];
			  $tb->MoveNext();
  			  //$this->ln(3);	
			  $cont=$cont+1;		
  		  }	
				//Totales
				$this->setFont("Arial","B",7);
				$this->SetXY(141,200);
				$this->cell(25,5,'TOTAL RETENCION:');
				$this->cell(25,5,number_format($acum1,2,'.',','),0,0,'R');
				$this->ln(4);
				$this->cell(131,5,'');
				$this->cell(25,5,'TOTAL A CACELAR:');
				$this->cell(25,5,number_format($neto,2,'.',','),0,0,'R');
				$this->ln(4);
				$this->Rect($this->getX()+10,$this->getY()+5,55,30);
				$this->Rect($this->getX()+65,$this->getY()+5,55,30);
				$this->Rect($this->getX()+120,$this->getY()+5,55,30);
				$this->setFont("Arial","",7);
				$this->ln(5);
				$this->cell(65,5,'															ELABORADO POR: ');
				$this->cell(55,5,'CONFORME POR: ');
				$this->cell(65,5,'RECIBIDO POR: ');
				$this->ln(25);
				$this->cell(70,5,'																														FIRMA Y FECHA');
				$this->cell(65,5,'FIRMA Y FECHA');
				$this->cell(65,5,'FIRMA Y FECHA');
				//
		}
	}
?>