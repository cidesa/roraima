<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/nomina/Relacion_federal_disco.class.php");



	class pdfreporte extends fpdf
	{

	var $bd;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddes=H::GetPost("nommin");
			$this->codhas=H::GetPost("nommax");
			$this->codespdes=H::GetPost("nomminesp");
			$this->codesphas=H::GetPost("nommaxesp");
			$this->banco=H::GetPost("banco");
			$this->fecha = H::GetPost("fecha");
			$this->cuenta = H::GetPost("cuenta");
			$this->especial = H::GetPost("especial");
			$this->quincena = H::GetPost("quincena");
			$this->codfederal = H::GetPost("codfederal");

			$this->bd=new basedatosAdo();
			$this->fed = new Federal();
		    $this->arrp = $this->fed->sqlp($this->coddes,$this->codhas,$this->codespdes,$this->codesphas,$this->banco,$this->especial);

		    $this->arrp2 = $this->fed->nomina($this->coddes,$this->codhas,$this->banco,$this->especial,$this->codespdes,$this->codesphas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

				$this->titulos[0]="CÉDULA";
				$this->titulos[1]="NOMBRE DEL EMPLEADO";
				$this->titulos[2]="CUENTA";
				$this->titulos[3]="MONTO A DEPOSITAR";
		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=60;
		$this->anchos[1]=60;
		$this->anchos[2]=35;
		$this->anchos[3]=35;

	}

	function PutLink($URL,$txt)
		{
		    //Escribir un hiper-enlace
		    $this->SetTextColor(0,0,255);
		    $this->SetStyle('U',true);
		    $this->Write(5,$txt,$URL);
		    $this->SetStyle('U',false);
		    $this->SetTextColor(0);
		}

		function SetStyle($tag,$enable)
		{
		    //Modificar estilo y escoger la fuente correspondiente
		    $this->$tag+=($enable ? 1 : -1);
		    $style='';
		    foreach(array('B','I','U') as $s)
		        if($this->$s>0)
		            $style.=$s;
		    $this->SetFont('',$style);
		}


		function Header()
    {
         $this->setFont("Arial","B",9);
         $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
         $this->setFont("Arial","",9);
         $this->Ln(10);



    }
function Cuerpo()

		{

	    $reg=1;
		$cuenta="";
		$registro=count($this->arrp);
		$acumulado = 0;
		$lineatxt = "";

		$nombre_archivo="/tmp/bancofederal_"."_".strftime('%d_%m_%Y',time()).".txt";
			if (!file_exists($nombre_archivo)){
				$cuentas = fopen($nombre_archivo,"w+");
				chmod ($nombre_archivo,0755);
			}
			else {
				unlink($nombre_archivo);
				$cuentas = fopen($nombre_archivo,"w+");
				chmod ($nombre_archivo,0755);
			}


        $this->setFont("Arial","B",12);
	    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3]));
		$this->SetAligns(array("C","C","C","C"));
		$this->SetFillColor(230,230,230);
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array($this->titulos[0],$this->titulos[1],$this->titulos[2],$this->titulos[3]));
		$this->SetBorder(0);
		$this->SetFillTable(0);

		//print $this->arrp2[0][nomina];exit;
		 $cuantos = $registro+1;
		 $monto1=number_format(trim($this->arrp2[0][nomina]),2,'.',',');
		 $monto1=str_replace(',','',$monto1);
		 $monto1=str_replace('.','',$monto1);
         $fecha = str_replace('/','',trim($this->fecha));
         $mes = substr ($fecha,2,2);
         //print $mes;exit;
         //$lineatxt1 = "00100000000018100000904203".str_pad($monto1,13,'0',STR_PAD_LEFT).str_pad($monto1,13,'0',STR_PAD_LEFT).str_pad($fecha,8,'0',STR_PAD_LEFT)."N0000000000000000000".chr(13);

         $lineatxt1 = "00100000".str_pad($cuantos,7,'0',STR_PAD_LEFT)."0000".$mes.$this->quincena.$this->codfederal.str_pad($monto1,13,'0',STR_PAD_LEFT).str_pad($monto1,13,'0',STR_PAD_LEFT).str_pad($fecha,8,'0',STR_PAD_LEFT)."N0000000000000000000\n";
         fputs ($cuentas,$lineatxt1);

		foreach($this->arrp as $dato)
         {
                $this->setFont("Arial","",8);
			    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3]));
				$this->SetAligns(array("L","L","L","R"));
				//$this->SetFillColor(230,230,230);
				//$this->SetFillTable(1);
				$this->SetBorder(1);
				$this->Row(array($dato["cedemp"],$dato["nomemp"],$dato["cuenta_banco"],H::FormatoMonto($dato["monto"])));
				$this->SetBorder(0);
				$this->SetFillTable(0);
				//$acumulado = $acumulado + $dato["monto"];
				 $chrmonto = strval($dato["monto"]);
				 $monto=number_format(trim($dato["monto"]),2,'.',',');
				 $monto=str_replace(',','',$monto);
				 $monto=str_replace('.','',$monto);
				//$lineatxt = "770".str_pad($dato["cuenta_banco"],20,'0',STR_PAD_LEFT)."00000904203".str_pad($monto,13,'0',STR_PAD_LEFT);
                $lineatxt = "770".str_pad($dato["cuenta_banco"],20,'0',STR_PAD_LEFT)."0000".$mes.$this->quincena.$this->codfederal.str_pad($monto,13,'0',STR_PAD_LEFT);
                $lineatext2 = $lineatxt."000000000000000000000000000000000".chr(13);
                fputs ($cuentas,$lineatext2);

                $acumulado = $acumulado + $dato["monto"];
				$y = $this->gety();
				if($y>180){
					$this->addPage();
				}

         }

         $this->ln(); 
         $this->setFont("Arial","B",10);
		 $this->SetWidths(array(190));
		 $this->SetAligns(array("L","L","L","R"));
		  //$this->SetFillColor(230,230,230);
		 //$this->SetFillTable(1);
		// $this->SetBorder(1);
		 $this->Row(array("TOTAL A PAGAR: ".H::FormatoMonto($acumulado)));
		 //$this->SetBorder(0);
		 $this->SetFillTable(0);

         $lineatxt3 = "670".str_pad($this->cuenta,20,'0',STR_PAD_LEFT)."0000".$mes.$this->quincena.$this->codfederal.str_pad($monto1,13,'0',STR_PAD_LEFT)."000000000000000000000000000000000";

         fputs ($cuentas,$lineatxt3);

         //H::PrintR ($linea);exit;

        unset($this->creapecue);
				fclose ($cuentas);


 				//$dir = parse_url($_SERVER['PATH_TRANSLATED']);
 				$dir = parse_url($_SERVER['HTTP_REFERER']);

				$parte = explode("/",$dir['path']);
				for($i=0;$i<count($parte)-1;$i++)
				{
					$agregar.=$parte[$i]."/";
				}

//print $agregar." ----- ".$dir['path']." ----- ".$dir['host'] ;
				$dir = $dir['scheme'].'://'.$dir['host'].$agregar;

				//print $dir;
			    $this->PutLink($dir.'descargar.php?archivo='.$nombre_archivo,'Descargar Archivo');

		}
}