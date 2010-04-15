<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/general/numerosALetras.class.php");
    require_once("../../lib/modelo/sqls/tesoreria/Tsrbancheemi.class.php");

	class pdfreporte extends fpdf
	{
		var $titulos;
		var $titulos2;
		var $campos;
	    var $fecdes;
		var $fechas;
		var $numcuedes;
		var $numcuehas;
		var $dispon;
		var $numcue;
		var $antlib;
		var $deb;
		var $cre;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumcre=0;
		var $acumseg=0;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcue=H::GetPost("numcue");
			$this->ageban=H::GetPost("ageban");
			$this->ctaori=H::GetPost("ctaori");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->gerente=H::GetPost("gerente");
			$this->teso=H::GetPost("teso");
			$this->tsrbancheemi= new Tsrbancheemi();
		    $this->arrp=$this->tsrbancheemi->sqlp($this->numcue);
		    $this->empresa=$this->tsrbancheemi->sql_empresa('001');
			$this->arr_tsrbancheemi=$this->tsrbancheemi->sql_tscheemi($this->numcue,$this->fecdes,$this->fechas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
			//$this->cab=new cabecera();
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Cuenta";
				$this->titulos[1]="Banco";
				$this->titulos[2]="Saldo Anterior";
				$this->titulos[3]="Débitos";
				$this->titulos[4]="Créditos";
				$this->titulos[5]="Saldo Según Libros";

		}

    function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=35;
		$this->anchos[1]=90;
		$this->anchos[2]=35;
		$this->anchos[3]=30;
		$this->anchos[4]=30;
		$this->anchos[5]=38;

	}


		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST[""],"l","s");
			$this->getCabecera(H::GetPost("titulo"),"");
		}

		function Cuerpo()
		{
			foreach($this->arrp as $dato)
			{
				//---------------------------------------------------------------------
				//ejecuto todos los sqls, para tener todos los datos cargados en los arreglos
				$this->ln(8);
				$this->setFont("Arial","",10);
				$this->cell(30,5,"Señores:");
				$this->ln();
				$this->setFont("Arial","B",10);
				$this->cell(30,5,'BANCO '.$this->nomcue=$dato["nomcue"]);
				$this->ln();
				$this->setFont("Arial","",10);
				$this->cell(30,5,'Agencia '.ucfirst(strtolower($this->ageban)));
				$this->ln();
				$this->cell(30,5,'Ciudad ');
				$this->ln(10);
				$this->Setx(120);
				$fecha= date("d/m/Y");
				$dia=substr($fecha,0,2);
				$ano=substr($fecha,6,4);
				$mes=substr($fecha,3,2);
				$mesletras=H::ObtenerMesenLetras($mes);
				$this->cell(25,5,'Los Teques, '.$dia.' de '.$mesletras.' de '.$ano,0,0,'');
				$this->ln(10);
				$this->Setx(130);
				$this->setFont("Arial","B",11);
				$this->cell(30,5,'Atn. '.strtoupper($this->gerente));
				$this->ln();
				$this->Setx(135);
				$this->cell(30,5,'GERENTE');
				$this->setFont("Arial","",11);
				if (count($this->arr_tsrbancheemi)>0)
					$num=count($this->arr_tsrbancheemi);
				else
					$num=0;
				$n= new numerosALetras($num);
				$this->ln(15);
				$this->Setx(30);
				$this->cell(30,5,'            Es grato dirigirnos  a usted, en  la oportunidad de extenderle un cordial');
				$this->ln();
				$this->Setx(30);
				$this->cell(30,5,'saludo  y  a  la vez informarle que  se emitieron '.$n->resultado.' ('.count($this->arr_tsrbancheemi).')  cheques  del  día');
				$this->ln();
				$this->Setx(30);
				$this->cell(30,5,$this->fecdes.', correspondiente a la cuenta corriente N° '.$this->numcue.',');
				$this->ln();
				$this->Setx(30);
				$this->cell(30,5,'perteneciente  a   la  '.strtoupper($this->empresa[0]['nomemp']).', que se detallan a continuación:');
				$this->numcue=$dato["numcue"];
				$this->nomcue=$dato["nomcue"];
				$this->ln(15);
				$this->Setx(60);
				$this->cell(30,5,'Del Serial N°');
				$this->Setx(130);
				$this->cell(30,5,'Al Serial N°');
                //---------------------------------------------------------------------
					foreach($this->arr_tsrbancheemi as $dato2)
					{
						$this->ln();
						$this->Setx(82);
						$this->cell(30,5,current($dato2));
						$this->Setx(152);
						$this->cell(30,5,end($dato2));
					}//foreach(arr_tsrbancheemi as $dato2)
				$this->ln(15);
				$this->cell(30,5,'            Sin otro particular al cual hacer referencia, nos suscribimos a usted,');
				$this->ln(20);
				$this->Setx(100);
				$this->setFont("Arial","B",10);
				$this->cell(30,5,$this->teso,0,1,'C');
				$this->ln();
				$this->Setx(100);
				$this->cell(30,5,'TESORERIA GENERAL',0,1,'C');

			}//foreach($arrp as $dato)
				unset($this->tsrbancheemi);
		}
	}
?>
