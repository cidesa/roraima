<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprparrettra.class.php");

class pdfreporte extends fpdf
{
	function pdfreporte()
	{
		 $this->fpdf("p","mm","Letter");
		 $this->codemp=H::GetPost("codemp");
		 $this->numseg=H::GetPost("numseg");
		 $this->numseg2=H::GetPost("numseg2");
		 $this->fecha=H::GetPost("fecha");
	     $this->causa=H::GetPost("causa");

		 $this->objeto = new Nprparrettra();

		 $this->arrp = $this->objeto->sqlp($this->codemp);
	}

	function Header()
	{
	  $this->formato();
	  /*$this->setautopagebreak(false);
	  $this->ln();
	  $this->ln();
	  $this->formato();*/
	}

	function Formato()
	{
		$this->setFont("arial",B,6);
		$this->Image("../../img/1826_ivss.jpg",20,$this->GetY(),12);
		$Y=$this->GetY();
		$this->setXY(160,$this->GetY());
		$this->cell(40,2,"Forma 14 - 03");
		$this->getY($Y);
		$this->setx(20);
		$this->multicell(100,2.5,"MINISTERIO DEL TRABAJO\nINSTITUTO VENEZOLANO DE LOS SEGUROS SOCIALES\nDIRECCION GENERAL DE AFILIACION \nY PRESTACIONES EN DINERO",0,'C');
		$this->setFont("arial",B,11);
		$this->setX(20);
		$this->cell(160,9,H::GetPost("titulo"),0,0,'C');
		$this->setFont("arial","",7);
		$this->ln();
		$this->setX(20);
		$this->cell(130,6,'RAZON SOCIAL DE LA EMPRESA O NOMBRE DEL PRATRONO',1,0,'C');
		$this->cell(3);
		$this->multicell(36,6,'NUMERO DE LA EMPRESA',1,'C');
		$emp = $this->objeto->sqlempresa();
		$this->setFont("arial","B",9);
		$this->setX(20);
		$this->cell(130,5,substr($emp[0]["nomemp"],0,150),1,0,'C');
		$this->cell(3);
		$this->cell(4,5,substr($this->numseg2,0,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,1,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,2,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,3,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,4,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,5,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,6,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,7,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg2,8,1),1,0,'C');
		$this->setFont("arial","",7);
		$this->ln(8);
		$this->setX(20);
		$this->cell(130,6,'1er APELLIDO Y 1er NOMBRE DEL ASEGURADO',1,0,'C');
		$this->cell(3);
		$this->multicell(36,6,'NUMERO DEL ASEGURADO',1,'C');
		$emp = $this->objeto->sqlempresa();
		$this->setFont("arial","B",9);
		$this->setX(20);
		$this->cell(130,5,$this->arrp[0]["nomemp"],1,0,'C');
		$this->cell(3);
		if ($this->numseg=='')
		{
			$this->numseg=$this->codemp;
		}
		$this->cell(4,5,substr($this->numseg,0,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,1,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,2,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,3,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,4,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,5,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,6,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,7,1),1,0,'C');
		$this->cell(4,5,substr($this->numseg,8,1),1,0,'C');

		$this->setFont("arial","",6);
		$this->ln(8);
		$this->setX(20);
		$this->cell(24,3,"FECHA DE INGRESO",1,0,'C');
		$this->cell(21,3,"SALARIO SEMANAL",1,0,'C');
		$this->cell(74,3,"OCUPACION u OFICIO",1,0,'C');
		$this->cell(20,3,"COD.OCUPAC.",1,0,'C');
		$this->cell(24,3,"FECHA DE EGRESO",1,0,'C');
		$this->cell(6,3,"COD",1,0,'C');
		$this->ln(3);
		$this->setFont("arial","B",9);
		$this->setX(44);
		$this->cell(21,6,H::formatomonto((($this->arrp[0]["suecar"])/30)*7),1,0,'C');
		/*$this->cell(74,6,substr($this->arrp[0]["nomcar"],0,73),1,0,'C');
		$this->cell(5,6,substr(trim($this->arrp[0]["codcar"]),0,1),1,0,'C');
		$this->cell(5,6,substr(trim($this->arrp[0]["codcar"]),1,1),1,0,'C');
		$this->cell(5,6,substr(trim($this->arrp[0]["codcar"]),2,1),1,0,'C');
		$this->cell(5,6,substr(trim($this->arrp[0]["codcar"]),3,1),1,0,'C');*/
		$this->cell(74,6,substr($this->arrp[0]["nomcar"],0,73),1,0,'C');
		$this->cell(5,6,"",1,0,'C');
		$this->cell(5,6,"",1,0,'C');
		$this->cell(5,6,"",1,0,'C');
		$this->cell(5,6,"",1,0,'C');
		$this->cell(24);
		$this->cell(6,6,"",1,0,'C');
		$this->setX(20);
		$this->setFont("arial","",5);
		$this->setX(20);
		$this->cell(8,1.5,"D",1,0,'C');
		$this->cell(8,1.5,"M",1,0,'C');
		$this->cell(8,1.5,"A",1,0,'C');
		//$auxfec= split("/",$this->arrp[0]["fecing"]);
		$this->setX(159);
		$this->cell(8,1.5,"D",1,0,'C');
		$this->cell(8,1.5,"M",1,0,'C');
		$this->cell(8,1.5,"A",1,0,'C');
		$this->setFont("arial","B",9);
		$auxfec= split("/",$this->arrp[0]["fecing"]);
		$this->setXY(20,$this->getY()+1.5);
		$this->cell(4,4.5,substr($auxfec[0],0,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[0],1,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[1],0,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[1],1,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[2],2,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[2],3,1),1,0,'C');
		$auxfec= split("/",$this->arrp[0]["fecret"]);
		$this->setX(159);
		$this->cell(4,4.5,substr($auxfec[0],0,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[0],1,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[1],0,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[1],1,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[2],2,1),1,0,'C');
		$this->cell(4,4.5,substr($auxfec[2],3,1),1,0,'C');
		$this->setFont("arial","",8);
		$this->ln(8);
		$this->setX(20);
		$this->cell(80,4,"CAUSA DEL RETIRO",1,0,'C');

		$this->rect(20,$this->getY(),$this->GetX()-20,32);
		$this->ln(8);
		$this->setX(21);
		$this->cell(40,4,"1.DESPIDO");
		if ($this->causa=='1') $this->rect($this->GetX()-18,$this->getY(),5,4,"DF"); else $this->rect($this->GetX()-18,$this->getY(),5,4);

		$this->cell(40,4,"4.PENSIONADO");
		if ($this->causa=='4') $this->rect($this->GetX()-10,$this->getY(),5,4,"DF"); else $this->rect($this->GetX()-10,$this->getY(),5,4);
		$this->ln(8);
		$this->setX(21);

		$this->cell(40,4,"2.RENUNCIA");
		if ($this->causa=='2') $this->rect($this->GetX()-18,$this->getY(),5,4,"DF"); else $this->rect($this->GetX()-18,$this->getY(),5,4);
		if ($this->causa=='5') $this->rect(91,$this->getY(),5,4,"DF"); else $this->rect(91,$this->getY(),5,4);
		$this->multicell(40,3,"5.TRASLADO A \nOTRA EMPRESA");
		$this->ln(2);
		$this->setX(21);
		$this->cell(40,4,"3.JUBILADO");
		if ($this->causa=='3') $this->rect($this->GetX()-18,$this->getY(),5,4,"DF"); else $this->rect($this->GetX()-18,$this->getY(),5,4);
		$this->cell(40,4,"6.FALLECIMIENTO");
		if ($this->causa=='6') $this->rect($this->GetX()-10,$this->getY(),5,4,"DF"); else$this->rect($this->GetX()-10,$this->getY(),5,4);

		$this->line($this->getX()+5,$this->getY()+2,185,$this->getY()+2);
		$this->cell(90,10,"SELLO DE LA EMPRESA Y FIRMA DEL PATRONO",0,0,'C');



		$this->ln(12);
		$this->setFont("arial","B",8);
		$this->setX(20);
		$this->cell(113,4,"RECIBIDO EN EL I.V.S.S. POR: ",1,0,'C');
		$this->cell(56,4,"ACTA DE FISCALIZACIÓN: ",1,0,'C');
		$this->ln();
		$this->setX(20);
		$this->setFont("arial","",6);
		$this->cell(89,5,"FIRMA Y SELLO",0,0,'C');
		$this->cell(24,5,"F E C H A",1,0,'C');
		$this->cell(8,5,"SIGLA",1,0,'C');
		$this->cell(8,5,"AÑO",1,0,'C');
		$this->cell(16,5,"NÚMERO",1,0,'C');
		$this->cell(24,5,"FECHA",1,0,'C');
		$this->setx(20);
		$this->cell(89,13,"",1,0,'C');
		$this->ln(5);
		$this->setFont("arial","",4.5);
		$this->setX(109);
		$this->cell(8,1.5,"D",1,0,'C');
		$this->cell(8,1.5,"M",1,0,'C');
		$this->cell(8,1.5,"A",1,0,'C');
		$this->setFont("arial","",6);
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->cell(4,8,"",1,0,'C');
		$this->setFont("arial","B",8);
		$this->setXY(109,$this->GetY()+1.5);
		$auxfec= split("/",$this->fecha);
		$this->cell(4,6.5,substr($auxfec[0],0,1),1,0,'C');
		$this->cell(4,6.5,substr($auxfec[0],1,1),1,0,'C');
		$this->cell(4,6.5,substr($auxfec[1],0,1),1,0,'C');
		$this->cell(4,6.5,substr($auxfec[1],1,1),1,0,'C');
		$this->cell(4,6.5,substr($auxfec[2],2,1),1,0,'C');
		$this->cell(4,6.5,substr($auxfec[2],3,1),1,0,'C');
		$this->ln(7);
		$this->setX(20);
		$this->setFont("arial","B",5);
		$this->cell(140,2,"ESTE FORMULARIO DEBERA SER CONSIGNADO EN LAS OFICINAS DE I.V.S.S DENTRO DE LOS TRES (3)");
		$this->multicell(50,2,"DOS/0491");
		$this->setX(20);
		$this->multicell(140,2,"DÍAS HÁBILES SIGUIENTES A LA FECHA DEL RETIRO, CON COPIA DE LA 14-02 TARJETA DE SERVICIO,");
		$this->setX(20);
		$this->cell(140,2,"14-01 O FACTURA DE COTIZACIONES");
		$this->ln(10);

	}

	function Cuerpo()
	{

    }
}
?>