<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprcontraivss.class.php");

class pdfreporte extends fpdf
{
	function pdfreporte()
	{
		 $this->fpdf("p","mm","Letter");
		 $this->codemp=H::GetPost("codemp");
		 $this->numseg=H::GetPost("numseg");
		 $this->repleg=H::GetPost("repleg");
		 $this->cedrep=H::GetPost("cedrep");
		 $this->telrep=H::GetPost("telrep");
		 $this->observ=H::GetPost("observ");
		 $this->nomfir=H::GetPost("nomfir");
		 $this->cedfir=H::GetPost("cedfir");
		 $this->carfir=H::GetPost("carfir");
		 $this->lugar=H::GetPost("lugar");


		 $this->objeto = new Nprcontraivss();

		 $this->arrp = $this->objeto->sqlp($this->codemp);
	}

	function Header()
	{
	  $this->formato();
	}

	function Formato()
	{
		$this->setFont("arial",B,6);
		$this->Image("../../img/1826_ivss.jpg",10,9,12);
		$this->multicell(100,2.5,"REPUBLICA BOLIVARIANA DE VENEZUELA\nMINISTERIO DEL TRABAJO\nINSTITUTO VENEZOLANO DE LOS SEGUROS SOCIALES\nDIRECCION GENERAL DE AFILIACION Y PRESTACIONES EN DINERO",0,'C');
		$this->setFont("arial",B,11);
		$this->cell(180,9,H::GetPost("titulo"),0,0,'C');
		$this->setFont("arial",B,9);
		$this->ln();
		$this->multicell(190,4,'DATOS DE LA EMPRESA',1,'C');
		$this->setFont("arial","",7);
		$this->cell(150,4,'RAZON SOCIAL DE LA EMPRESA O NOMBRE DEL PRATRONO',1,0,'C');
		$this->multicell(40,4,'NUMERO DE EMPRESA',1,'C');
		$emp = $this->objeto->sqlempresa();
		$this->setFont("arial",B,9);
		$this->cell(190,6,"D  1   9   9   1   8  9  9  3",0,0,'R');
		$this->setFont("arial","",7);
		$this->line(164.4,$this->getY(),164.4,$this->getY()+4);
		$this->line(164.4+4,$this->getY(),164.4+4,$this->getY()+4);
		$this->line(164.4+4+4,$this->getY(),164.4+4+4,$this->getY()+4);
		$this->line(164.4+4+4+4,$this->getY(),164.4+4+4+4,$this->getY()+4);
		$this->line(164.4+4+4+4+4,$this->getY(),164.4+4+4+4+4,$this->getY()+4);
		$this->line(164.4+4+4+4+4+4,$this->getY(),164.4+4+4+4+4+4,$this->getY()+4);
		$this->line(164.4+4+4+4+4+4+4,$this->getY(),164.4+4+4+4+4+4+4,$this->getY()+4);
		$this->line(164.4+4+4+4+4+4+4+4,$this->getY(),164.4+4+4+4+4+4+4+4,$this->getY()+4);
		$this->line(164.4+4+4+4+4+4+4+4+4,$this->getY(),164.4+4+4+4+4+4+4+4+4,$this->getY()+4);
		$this->setx(160);
		$this->cell(4.4,6,substr('',0,1),1,0,'C');
		$this->cell(4,6,substr('',1,1),1,0,'C');
		$this->cell(4,6,substr('',2,1),1,0,'C');
		$this->cell(4,6,substr('',3,1),1,0,'C');
		$this->cell(4,6,substr('',4,1),1,0,'C');
		$this->cell(4,6,substr('',5,1),1,0,'C');
		$this->cell(4,6,substr('',6,1),1,0,'C');
		$this->cell(4,6,substr('',7,1),1,0,'C');
		$this->cell(4,6,substr('',8,1),1,0,'C');
		$this->multicell(3.6,6,substr('',9,1),1,'C');
		$this->multicell(190,4,'DIRECCION DE EMPRESA',1,'C');
		$this->multicell(190,6,$emp[0]["diremp"],1,'C');
		$this->cell(110,4,'APELLIDOS Y NOMBRES DEL PATRONO O REPRESENTANTE LEGAL',1,0,'C');
		$this->cell(40,4,'CEDULA DE INDENTIDAD N°',1,0,'C');
		$this->multicell(40,4,'TELEFONO',1,'C');
		$this->cell(110,6,strtoupper($this->repleg),1,0,'C');
		$this->cell(40,6,strtoupper($this->cedrep),1,0,'C');
		$this->multicell(40,6,$this->telrep,1,'C');
		$this->setFont("arial",B,9);
		$this->multicell(190,4,'DATOS DEL TRABAJADOR',1,'C');
		$this->setFont("arial","",7);
		$this->cell(140,4,'APELLIDOS Y NOMBRES ',1,0,'C');
		$this->cell(5,4,'E',1,0,'C');
		$this->cell(5,4,'V',1,0,'C');
		$this->multicell(40,4,'CEDULA DE IDENTIDAD N°',1,'C');
		$this->cell(140,6,$this->arrp[0]["nomemp"],1,0,'C');
		if(strtoupper($this->arrp[0]["nacemp"])=='V')
		{
			$this->cell(5,6,'',1,0,'C');
			$this->cell(5,6,'X',1,0,'C');
		}else
		{
			$this->cell(5,6,'X',1,0,'C');
			$this->cell(5,6,'',1,0,'C');
		}
		$this->multicell(40,6,$this->arrp[0]["nacemp"].'-'.number_format($this->arrp[0]["cedemp"],0,'.',','),1,'C');
		$this->ln();
		$this->setx(60);
		$this->cell(30,4,'FECHA DE INGRESO',1,0,'C');
		$this->setx(120);
		$this->multicell(30,4,'FECHA DE EGRESO',1,'C');
		$this->setx(60);
		$auxfec = split("/",$this->arrp[0]["fecing"]);
		$this->cell(10,8,$auxfec[0],1,0,'C');
		$this->cell(10,8,$auxfec[1],1,0,'C');
		$this->cell(10,8,$auxfec[2],1,0,'C');
		$this->setx(120);
		$auxfec = split("/",$this->arrp[0]["fecret"]);
		$this->cell(10,8,$auxfec[0],1,0,'C');
		$this->cell(10,8,$auxfec[1],1,0,'C');
		$this->multicell(10,8,$auxfec[2],1,'C');
		$this->setFont("arial",B,9);
		$this->ln();
		$this->multicell(188,4,'SALARIOS DEVENGADOS',1,'C');
		$this->setwidths(array(28,20,20,20,20,20,20,20,20,20,20));
		$this->setAligns('C');
		$this->setborder(true);
		$this->setJump(6);
		$Y1=$this->getY();
		$this->rowm(array("","","","","","",""));
		$Y=$this->getY();
		$this->setFont("arial","",6);
		$this->line($this->GetX(),$this->getY()-6,38,$this->getY());
		$this->setxy(10,$this->getY()-3);
		$this->cell(27,4,'MESES');
		$this->setxy(28,$this->getY()-1.5);
		$this->cell(27,4,'AÑOS');
		$this->setY($Y);
		$anos = $this->objeto->sqlanos($this->codemp,$this->arrp[0]["codnom"],$this->arrp[0]["fecing"]);
		$this->setFont("arial","",8);
		$totales=array("TOTALES");
		if(count($anos)==1)		
			for($t=0;$t<7;$t++)
				array_unshift($anos, array('0' =>($anos[0][0]-1),'ano'=>($anos[0][0]-1)));
						
		elseif(count($anos)==2)		
			for($t=0;$t<6;$t++)
				array_unshift($anos, array('0' =>($anos[0][0]-1),'ano'=>($anos[0][0]-1)));
		elseif(count($anos)==3)		
			for($t=0;$t<5;$t++)
				array_unshift($anos, array('0' =>($anos[0][0]-1),'ano'=>($anos[0][0]-1)));
		elseif(count($anos)==4)		
			for($t=0;$t<4;$t++)
				array_unshift($anos, array('0' =>($anos[0][0]-1),'ano'=>($anos[0][0]-1)));		
		elseif(count($anos)==5)		
			for($t=0;$t<3;$t++)
				array_unshift($anos, array('0' =>($anos[0][0]-1),'ano'=>($anos[0][0]-1)));		
		elseif(count($anos)==6)		
			for($t=0;$t<2;$t++)
				array_unshift($anos, array('0' =>($anos[0][0]-1),'ano'=>($anos[0][0]-1)));		
		elseif(count($anos)==7)		
			for($t=0;$t<1;$t++)
				array_unshift($anos, array('0' =>($anos[0][0]-1),'ano'=>($anos[0][0]-1)));		
				
		$mes = $this->objeto->sqlmes($this->codemp);
		foreach($mes as $reg)
		{
		  $this->setwidths(array(28));
		  $this->setAligns('C');
		  $this->setborder(true);
		  $this->setJump(6);
		  $this->rowm(array($reg["mes"]));
		  $YYY = $this->GetY();
		}
		$X1=38;
		$first="";
		foreach($anos as $reg)
		{
			$this->setxy($X1,$Y1);
			$this->cell(20,6,$reg["ano"],1,0,'C');
			$salario = $this->objeto->sqlsalario($this->codemp,$reg["ano"]);
			$this->ln();
			$total=0;			
			if ($salario)
			{		
				$c = count($salario);
				$m = count($mes);
				$r = $m - $c;
				if($r!=0)
				{
					if(!$first)
					{
						for($h=1;$h<=$r;$h++)
							 array_unshift($salario, array(H::obtenermesenletras(str_pad($r,2,'0',STR_PAD_LEFT)),H::formatomonto('0')));						
						$first=count($anos);		 
					}else
					{
						for($h=1;$h<=$r;$h++)
							 array_push($salario, array(H::obtenermesenletras(str_pad($r,2,'0',STR_PAD_LEFT)),H::formatomonto('0')));						
					}
					
				}									
				foreach($salario as $reg)
				{
				  $this->setX($X1);
		  		  $this->setwidths(array(20));
				  $this->setAligns('R');
				  $this->setborder(true);
				  $this->setJump(6);
				  $this->rowm(array(H::formatoMonto($reg["monto"])));
				  $total+=$reg["monto"];
				}
			}else
			{
				for($i=0;$i<count($mes);$i++)
				{
				  $this->setX($X1);
				  $this->setwidths(array(20));
				  $this->setAligns('R');
				  $this->setborder(true);
				  $this->setJump(6);
				  $this->rowm(array(H::formatoMonto('0')));
				}

			}

			$totales[]=H::FormatoMonto($total);
			$salario=array();
			$X1=$X1+20;
		}
		$this->setY($YYY);
		$this->setwidths(array(28,20,20,20,20,20,20,20,20,20,20));
	    $this->setAligns('R');
		$this->setborder(true);
		$this->setJump(6);
		$this->rowm($totales);
		$this->ln();
		$this->multicell(190,5,"Observacion: ".$this->observ."\n\n",1);
		$this->ln();
		$this->setFont("arial","B",8);
		$this->multicell(190,4,"DECLARACION JURADA",0,'C');
		$this->setFont("arial","",7);
		$this->multicell(190,4,"CERTIFICO BAJO FE DE JURAMENTO QUE LA INFORMACION QUE ANTECEDE ES CIERTA" .
				" EN TODAS SUS PARTES",0,'C');
		$Y2=$this->GetY();
		$this->multicell(140,4,"APELLIDOS Y NOMBRES DEL FIRMANTES",1,'C');
		$this->multicell(140,6,$this->nomfir,1,'C');
		$this->ln();
		$this->cell(50,4,"CARGOS QUE OCUPA",1,0,'C');
		$this->cell(50,4,"LUGAR",1,0,'C');
		$this->multicell(40,4,"FECHA",1,'C');
		$this->cell(50,6,$this->carfir,1,0,'C');
		$this->cell(50,6,$this->lugar,1,0,'C');
		$this->cell(13.3,6,date('d'),1,0,'C');
		$this->cell(13.3,6,date('m'),1,0,'C');
		$this->multicell(13.3,6,date('Y'),1,'C');
		$this->multicell(190,4,"Este Formulario está autorizado por el IVSS y válido únicamente para ser consignado" .
				" en las oficinas administrativas",0,'C');
		$this->multicell(190,4,"EL FORMULARIO Y SU TRAMITACION SON COMPLETAMENTE GRATUITOS",0,'C');
		$this->multicell(190,4,"www.ivss.gov.ve",0,'C');
		$this->setXY(160,$Y2);
		$this->multicell(40,4,"FIRMA Y SELLO\n\n\n\n\n",1,'C');
		$this->setX(160);
		$this->multicell(40,5,"C.I N°: ".$this->cedfir,1);
		$this->setFont("arial","",5);
		$this->setX(180);
		$this->cell(20,4,"DOS/06.2004",0,0,'R');
		$this->setXY(180,10);
		$this->cell(20,4,"FORMA: 14-100",0,0,'R');


	}

	function Cuerpo()
	{

    }
}
?>