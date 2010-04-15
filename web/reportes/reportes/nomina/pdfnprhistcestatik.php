<?
	require_once("../../lib/general/fpdf/fpdf.php");
    require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprhistcestatik.class.php");

	class pdfreporte extends fpdf
	{
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulo=H::GetPost("titulo");
		    $this->codnomdes = H::GetPost("codnomdes");
            $this->especial = H::GetPost("especial");
            $this->tipnomesp=H::GetPost("tipnomesp");
            $this->nomminesp=H::GetPost("nomminesp");
            $this->codcondes=H::GetPost("codcondes");
            $this->fecnomdes= H::GetPost('fecnomdes');
            $this->fecnomhas= H::GetPost('fecnomhas');
            $this->cliente = H::GetPost("cliente");
            $this->producto=H::GetPost("producto");
            $this->punto=H::GetPost("punto");
            $this->pedido=H::GetPost("pedido");
            $this->cesta=H::GetPost("cesta");

            if ($this->cesta<>''){
            	$this->monto=$this->cesta;
            } else  $this->monto=13.75;

             if ($this->cliente<>''){
            	$this->cliente=$this->cliente;
            } else  $this->cliente='4386';

            if ($this->producto<>''){
            	$this->producto=$this->producto;
            } else  $this->producto='7';


             if ($this->punto<>''){
            	$this->punto=$this->punto;
            } else  $this->punto='89711';

             if ($this->pedido<>''){
            	$this->pedido=$this->pedido;
            } else  $this->pedido='1';





            $this->objNprcestatik = new Nprhistcestatik();
		    $this->arrp = $this->objNprcestatik->SQLp($this->especial,$this->codnomdes,$this->codcondes,$this->nomminesp,$this->fecnomdes,$this->fecnomhas);
			//H::PrintR($this->sql2);exit;
			//exit;
			$this->cab=new cabecera();
		}


		function Header()
		{
				$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
				$this->setFont("Arial","B",9);
			    $this->cell(15,5,'RECURSOS HUMANOS');
			    $this->ln();
				$this->cell(70,5,'Nomina:   '.$this->codnomdes);
				$this->setX(20);
				$this->ln();
			    $this->setFont("Arial","B",10);
				$this->SetWidths(array(25,70,45,20,30));
				$this->SetAligns(array("C","C","C","C","C"));
				$this->SetBorder(1);
				$this->Row(array("Cedula","Empleado","Valor del ticket","Cantidad","Monto"));
				$this->SetBorder(0);
					$this->SetAligns(array("L","L","R","R","R"));


		}

		function Cuerpo()
		{
        $i=0;
        $acum=0;
		foreach ($this->arrp as $dato)
      	{
			$i++;
	    	$this->setFont("Arial","",10);
			$this->SetWidths(array(25,70,45,20,30));
			$this->SetAligns(array("L","L","R","R","R"));
			$this->SetBorder(0);
			$this->Row(array($dato["cedemp"],$dato["nomemp"],H::FormatoMonto($this->monto),number_format((($dato["saldo"]/$this->monto)),0,'.',','),H::FormatoMonto($dato["saldo"])));
			$acum+=$dato["saldo"];


      	}
      	$this->cell(0,10,"Total de Empleados: ".$i."      Monto Total: ".H::FormatoMonto($acum));


                $this->ln();
      	    	$dir = parse_url($_SERVER['HTTP_REFERER']);
				$dirpath=$dir['path'];
				if(!(strrpos($dir['path'],".php")))
					$dirpath=$dir['path'].".php";
				    $dir = eregi_replace(".php","_hc.php",$dir['scheme'].'://'.$dir['host'].$dirpath);
			    	$this->PutLink(trim($dir).'?codnomdes='.$_POST["codnomdes"].'&especial='.$_POST["especial"].'&tipnomesp='.$_POST["tipnomesp"].'&nomminesp='.$_POST["nomminesp"].'&codcondes='.$_POST["codcondes"].'&monto='.$this->monto.'&cliente='.$this->cliente.'&producto='.$this->producto.'&punto='.$this->punto.'&pedido='.$this->pedido.'&fecnomdes='.$this->fecnomdes.'&fecnomhas='.$this->fecnomhas.'&schema='.$_SESSION["schema"],'Descargar TXT de Cesta Tiket');



   }//cuerpo
}//clase
?>
