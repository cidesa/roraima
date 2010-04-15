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
		var $codesde;
		var $codhasta;
		var $coddphdes;
		var $coddphhas;
		var $codprodes;
		var $codprohas;
		var $fechadesde;
		var $fechahasta;
		var $estado;
		var $conf;
		var $nombre;
		var $direccion;
		var $telefono;

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
			$this->codrcpdes=H::GetPost("codrcpdes");
			$this->codrcphas=H::GetPost("codrcphas");
			$this->codprodes=H::GetPost("codprodes");
			$this->codprohas=H::GetPost("codprohas");
			$this->codesde=H::GetPost("codesde");
			$this->codhasta=H::GetPost("codhasta");
			$this->fechadesde=H::GetPost("fechadesde");
			$this->fechahasta=H::GetPost("fechahasta");
			$this->estado=H::GetPost("estado");
			$this->otros();
			if($this->estado=='Ambos')
			{
				$sta1='A';
				$sta2='N';
			}
			else if($this->estado=='Activas')
			{
				$sta1='A';
				$sta2='A';
			}
			else if($this->estado=='Anuladas')
			{
				$sta1='N';
				$sta2='N';
			}
			$this->sql="SELECT
							A.RCPART as rcpart,
							to_char(A.FECRCP,'dd/mm/yyyy') as fecrcp,
							A.CODPRO as codpro,
							E.NOMPRO as nompro,
							E.RIFPRO as rifpro,
							A.DESRCP as desrcp,
							A.NUMFAC as numfac,
							A.MONRCP as monrcp,
							A.NUMCOM as numcom,
							(CASE WHEN A.STARCP='A' THEN 'Activo' WHEN A.STARCP='N' THEN 'Anulado' ELSE ' ' END) as STARCP,
							B.CODART as codart,
							B.ORDCOM as ordcom,
							B.CANREC as canrec,
							B.CANDEV as candev,
							B.CANTOT as cantot,
							B.MONTOT as montot,
							(C.DESART) as DESART,
							C.COSULT as cosult,
							D.CANTOT as CANORD,
							to_char(F.FECORD,'dd/mm/yyyy') as fecord
						FROM
							CARCPART A,
							CAARTRCP B,
							CAREGART C,
							CAARTORD D,
							CAPROVEE E,
							CAORDCOM F
						WHERE
							(A.RCPART)  =  (B.RCPART) AND
							(A.CODPRO)  =  (E.CODPRO) AND
							(B.CODART)  =  (C.CODART) AND
							(B.ORDCOM) =  (F.ORDCOM)  AND
							(B.ORDCOM) =  (D.ORDCOM)  AND
							(B.CODART)  =  (D.CODART) AND
							(A.RCPART) >= ('".$this->codrcpdes."') AND
							(A.RCPART) <= ('".$this->codrcphas."') AND
							(A.CODPRO) >= ('".$this->codprodes."') AND
							(A.CODPRO) <= ('".$this->codprohas."') AND
							(B.CODART) >= ('".$this->codesde."') AND
							(B.CODART) <= ('".$this->codhasta."') AND
							A.FECRCP  >= to_date('".$this->fechadesde."','dd/mm/yyyy') AND
							A.FECRCP  <= to_date('".$this->fechahasta."','dd/mm/yyyy') AND
							(STARCP      = '".$sta1."' OR
 							STARCP      = '".$sta2."' )
						ORDER BY A.RCPART,B.CODART";
//						print '<pre>'; print $this->sql; exit;

		}
		function otros()
		{
			$tr=$this->bd->select("SELECT NOMEMP as nombre,DIREMP as dir,TLFEMP as telf FROM EMPRESA");
			if(!$tr->EOF)
			{
				$this->nombre=$tr->fields["nombre"];
				$this->direccion=$tr->fields["dir"];
				$this->telefono=$tr->fields["telf"];
			}
		}
		function Header()
		{
			    $this->setFont("Arial","B",8);
			    //cuadro externo
			//	$this->line(10,04,200,04);
				$this->line(10,270,200,270);
				$this->line(10,35,10,270);
				$this->line(200,35,200,270);
				//hasta aqui
			   // $this->Image("../../img/logo_1.jpg",13,12,20);
			   $this->cab->poner_cabecera_f($this,$_POST["titulo"],$this->conf,"n","n");
			/*	$this->cell(200,10,'No RECEPCION                                      ',0,0,'R');
				$this->ln(11);
				$this->cell(200,10,'FECHA                                      		   ',0,0,'R');*/
				$this->ln(5);
			    $this->setFont("Arial","B",14);
			//	$this->cell(200,25,H::GetPost("titulo"),0,0,'C');
			    $this->setFont("Arial","B",8);
				$this->ln(15);
				$this->line(15,45,195,45);
				$this->line(15,53,195,53);
				$this->line(15,65,195,65);
				$this->line(15,45,15,65);
				$this->line(130,45,130,65);
				$this->line(195,45,195,65);
				$this->line(145,12,200,12);
				$this->line(145,12,145,35);
				$this->line(145,23.5,200,23.5);
				$this->line(200,12,200,35);
				$this->line(145,35,195,35);

				$this->Setxy(15,71);
			    $this->setwidths(array(30,70,20,20,20,20));
                $this->setaligns(array("C","C","C","C","C","C"));
                $this->setborder(true);
                $this->rowm(array("Cod.Material","Descripción Material","Cant.Orden","Cant.Recib","Precio Unitario","Precio Total"));

                //cuadro interno del detalle
				$this->line(195,79,195,230);
				$this->line(15,79,15,230);
				//lineas internas
				$this->line(45,79,45,225);
				$this->line(115,79,115,225);
				$this->line(135,79,135,225);
				$this->line(155,79,155,225);
				$this->line(175,79,175,225);

               $this->line(15,225,195,225);
				$this->line(15,230,195,230);
				 //cuadro de las firmas
				$this->line(15,234,195,234);
				$this->setXY(15,235);
				$this->cell(30,3,'							Observaciones:');
				$this->line(15,245,195,245);
				$this->setXY(15,246);
				$this->cell(60,3,'							ENTREGA PROVEEDOR:');
				$this->cell(65,3,'							                  ');
				$this->cell(60,3,'							ALMACEN:');
				$this->ln(8);
				$this->setX(15);
				$this->cell(60,1,'							FIRMA:');
				$this->cell(65,1,'							              ');
				$this->cell(60,1,'							FIRMA Y SELLO:');
		    	$this->line(75,245,75,256);
				$this->line(140,245,140,256);
				$this->line(15,256,195,256);
				$this->line(15,234,15,265);
				$this->line(195,234,195,265);
				$this->line(15,265,195,265);
				$this->setXY(15,15);

		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$ref=" ";
			$acum1=0;
			$x=0;
			$cont=73;
			$cont2=189;
			$contador=80;
			$ok=false;
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			if(!$tb2->EOF)
			{
			$ref=$tb2->fields["rcpart"];//No RECEPCION
				$this->setXY(155,10);
			$this->cell(30,10,"No RECEPCION",0,0,'C');

			$this->setXY(10,15);
			$this->cell(200,10,$tb->fields["rcpart"].'																																											',0,0,'R');
				$this->setXY(155,21);
			$this->cell(30,10,"Fecha",0,0,'C');
				$this->setXY(10,25);
			$this->cell(200,10,$tb->fields["fecrcp"].'																																								',0,0,'R');
			$this->ln(20);
			$this->setFont("Arial","B",8);
			$this->cell(125,10,'							   		   ORDEN DE COMPRA: '.$tb->fields["ordcom"]);
			$this->cell(30,10,'FECHA O/C: '.$tb->fields["fecord"],0,0,'R');
			$this->ln(7);
			$this->cell(130,10,'									      RIF PROVEEDOR: '.$tb->fields["rifpro"]);
			$this->cell(30,10,'No de FACTURA: '.$tb->fields["numfac"],0,0,'R');
			$this->ln(5);
			$this->cell(138,10,'									      NOMBRE: '.$tb->fields["nompro"]);
			//$this->cell(30,10,'ASIENTO CONTABLE: '.$tb->fields["numcom"],0,0,'R');
			}
			while(!$tb->EOF)
			{
			  if($tb->fields["rcpart"]!=$ref)
			  {
				$this->setXY(10,226);
			  	$this->cell(200,3,'TOTAL BOLIVARES:	'.H::FormatoMonto($acum1).'																							',0,0,'R');
                $contador=80;
			  	$x=$this->GetX();
			  	$y=$this->GetY();
				if(($x==210)&&($y==226))
				{
					$this->ln(230);
					//$this->setXY(10,15);
					$this->cell(200,10,$tb->fields["rcpart"].'																																											',0,0,'R');
					$this->ln(10);
			  		$this->cell(200,10,$tb->fields["fecrcp"].'																																								',0,0,'R');
					$this->ln(20);
					$this->setFont("Arial","B",8);
			  		$this->cell(125,10,'								  	   ORDEN DE COMPRA: '.$tb->fields["ordcom"]);
					$this->cell(30,10,'FECHA O/C: '.$tb->fields["fecord"],0,0,'R');
					$this->ln(7);
					$this->cell(130,10,'									     RIF PROVEEDOR: '.$tb->fields["rifpro"]);
					$this->cell(30,10,'No de FACTURA: '.$tb->fields["numfac"],0,0,'R');
					$this->ln(5);
					$this->cell(138,10,'									     NOMBRE: '.$tb->fields["nompro"]);
					//$this->cell(30,10,'ASIENTO CONTABLE: '.$tb->fields["numcom"],0,0,'R');
				}
				else
				{
					$this->setXY(10,15);
					$this->cell(200,10,$tb->fields["rcpart"].'																																											',0,0,'R');
					$this->ln(10);
			  		$this->cell(200,10,$tb->fields["fecrcp"].'																																								',0,0,'R');
					$this->ln(20);
					$this->setFont("Arial","B",8);
			  		$this->cell(125,10,'									   ORDEN DE COMPRA: '.$tb->fields["ordcom"]);
					$this->cell(30,10,'FECHA O/C: '.$tb->fields["fecord"],0,0,'R');
					$this->ln(7);
					$this->cell(130,10,'									      RIF PROVEEDOR: '.$tb->fields["rifpro"]);
					$this->cell(30,10,'No de FACTURA: '.$tb->fields["numfac"],0,0,'R');
					$this->ln(5);
					$this->cell(138,10,'									      NOMBRE: '.$tb->fields["nompro"]);
					//$this->cell(30,10,'ASIENTO CONTABLE: '.$tb->fields["numcom"],0,0,'R');
				}
				$ok=true;
				$temp=$ref;
				$cont=$cont-3;
			  }
				$this->setXY(10,$cont);
			    $cont=$cont+3;
				$this->setFont("Arial","",8);
				$acum1=$acum1+$tb->fields["montot"];
				$ref=$tb->fields["rcpart"];
				$this->Setxy(15,$contador);
			    $this->setwidths(array(30,70,20,20,20,20));
                $this->setaligns(array("C","L","R","R","R","R"));
                $this->setborder(false);
                $this->rowm(array($tb->fields["codart"],$tb->fields["desart"],H::FormatoMonto($tb->fields["canord"]),H::FormatoMonto($tb->fields["canrec"]),H::FormatoMonto($tb->fields["cosult"]),H::FormatoMonto($tb->fields["montot"])));

				$contador=$contador+7;
				$this->setXY(10,235);
			  	$this->cell(45,10,'													  	    '.$tb->fields["desrcp"]);


			  $x=$this->GetX();
			  $y=$this->GetY();
			  $tb->MoveNext();
  			  $this->ln(3);
  		  }
				$this->setXY(10,226);
			  	$this->cell(200,3,'TOTAL BOLIVARES:	'.H::FormatoMonto($acum1).'																							',0,0,'R');
				$this->setXY(10,259);
			  	$this->cell(200,0,$this->direccion.'  -  '.$this->telefono,0,0,'C');
		}
	}
?>