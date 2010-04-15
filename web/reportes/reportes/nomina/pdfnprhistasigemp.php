<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprhistasigemp.class.php");

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
		var $codcardes;
		var $codcarhas;
		var $codnivdes;
		var $codnivhas;
		var $codcondes;
		var $codconhas;
		var $tipnom;
		var $elaborado;
		var $revisado;
		var $autorizado;
		var $conf;
		var $nombre;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Legal");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcardes=$_POST["codcardes"];
			$this->codcarhas=$_POST["codcarhas"];
			$this->codnivdes=$_POST["codnivdes"];
			$this->codnivhas=$_POST["codnivhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->especial=$_POST["especial"];
		    $this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->tipnomesp1=$_POST["tipnomesp1"];
		    $this->tipnomesp2=$_POST["tipnomesp2"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
            $this->encabe=true;
			$this->nprhistasigemp= new Nprhistasigemp();
			$this->arrp=$this->nprhistasigemp->sqlp($this->tipnom,$this->codempdes,$this->codemphas,$this->codcardes,$this->codcarhas,$this->codnivdes,$this->codnivhas,$this->codcondes,$this->codconhas,$this->fechades,$this->fechahas,$this->especial,$this->tipnomesp1,$this->tipnomesp2);


						//print '<pre>'; print $this->sql;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera_f2($this,$_POST["titulo"],"ll","s","s");
			$this->setFont("Arial","B",8);
			if ($this->encabe){


			$rs=$this->bd->select("select nomnom as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
			$sr=$this->bd->select("SELECT to_char(ULTFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=('".$this->tipnom."')");
			if(!$sr->EOF)
			{
				$fechad=$sr->fields["fecha"];
			}
			$ss=$this->bd->select("SELECT to_char(PROFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=('".$this->tipnom."')");
			if(!$ss->EOF)
			{
				$fechah=$ss->fields["fecha"];
			}

			$this->cell(100,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre.'    PERIODO DEL: '. $this->fechades.' AL '. $this->fechahas );
			//$this->cell(60,5,'PERIODO DEL: '. $this->fechades.' AL '. $this->fechahas);
			$this->ln(5);
		$this->line(10,190,350,190);
        $this->line(10,$this->gety(),350,$this->gety());
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(18,50,18,50));
		$this->SetAligns(array("L","L","C","C"));
		$this->SetBorder(0);
		$y=$this->gety();
		$this->setJump(5);
		$this->Row(array("Cedula","Apellido, Nombre","Fecha de Ingreso","Cargo"));
		$this->line(350,$y,350,190);
		$this->line(10,$y,10,190);
		$this->line(28,$y,28,190);
		$this->line(78,$y,78,190);
		$this->line(96,$y,96,190);
		$this->line(146,$y,146,190);
		$this->line(163,$y,163,190);

			$this->arrp2=$this->nprhistasigemp->asignaciones($this->tipnom);
			$cuantos=count($this->arrp2);
			$this->cuantos=count($this->arrp);
			$i=0;
			$x1=163;
			while ($i<$cuantos){
				$i++;
				$x1+=17;
				$this->line($x1,$y,$x1,190);

		     }
			$i=0;
			$x=146;

				foreach($this->arrp2 as $dato2)
         {
               $i++;
               $this->setxy($x,$y);
               $this->cell(17,5,$dato2["codcon"],0,1,"C");
               $x+=17;
         }
               $this->setxy($x,$y);
               $this->cell(17,5,"Total",0,1,"C");

         $this->ln();
         $this->line(10,$this->gety(),350,$this->gety());
			}else //imprime informacion de los conceptos
			{

			}
		}

		function Footer()
		{
			$cadena=' ';
			$this->ln();
			$this->arrp2=$this->nprhistasigemp->asignaciones($this->tipnom);
			$this->sety(185);

		foreach($this->arrp2 as $dato2)
         {
		  $cadena=$cadena.' '.$dato2["codcon"].' - '.$dato2["nomcon"].' ; ';
         }
         $this->ln();
        // $this->setx(10);
          $this->setFont("Arial","B",8);
         $this->multicell(0,5,$cadena,0,'C');

		}

		function Cuerpo()
		{
        $cont=0;
        foreach($this->arrp as $dato)
        {
        $total=0;
        $cont++;
        $this->setFont("Arial","",8);
		$this->SetWidths(array(18,50,18,50));
		$this->SetAligns(array("R","L","C","L"));
		$this->SetBorder(0);
		$y=$this->gety();
		$this->setJump(5);
		$tama=strlen($dato["nomcar"]);
		$this->Row(array($dato["cedemp"],$dato["nomemp"],$dato["fecing"],$dato["nomcar"]));
		$this->SetBorder(0);
		$this->SetFillTable(0);

		    $this->arrp2=$this->nprhistasigemp->asignaciones($this->tipnom);
			$x=146;

			foreach($this->arrp2 as $dato2)//para recorrer todas las asignaciones
            {
                   $this->setxy($x,$y);
               ////////////////////// para conseguir el monto de cada asignacion por cada empleado
               $this->arrp3=$this->nprhistasigemp->montoasignaciones($dato["codemp"],$this->tipnom,$dato2["codcon"]);

			   foreach($this->arrp3 as $dato3)
	           {


	               $this->cell(17,5,H::Formatomonto($dato3["monto"]),0,1,"R");
	               $total+=$dato3["monto"];

	            }

               //////////////////////// FIN para conseguir el monto de cada asignacion por cada empleado
             $x+=17;

            }//FIN para recorrer todas las asignaciones
                  $this->setxy($x,$y);
	              $this->cell(17,5,H::Formatomonto($total),0,1,"R");
       if ($this->gety() >= 180 and $this->cuantos<>$cont)
       {
       	  $this->addpage();
       }
       if($tama>30 or $tama>50){
       	  $this->ln();
       }

       $this->line(10,$this->gety(),350,$this->gety());

       $this->ln();

     }// fin del cliclo principal
  /*   $this->encabe=false;
     $this->addpage();*/

		}// fin del cuerpo
	}
?>