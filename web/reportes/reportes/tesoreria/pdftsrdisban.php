<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/tesoreria/Tsrdisban.class.php");

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
			$this->fpdf("l","mm","Letter");
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcuedes=H::GetPost("numcuedes");
			$this->numcuehas=H::GetPost("numcuehas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->dispon=H::GetPost("dispon");
			$this->tsrdisban= new Tsrdisban();
		    $this->arrp=$this->tsrdisban->sqlp($this->numcuedes,$this->numcuehas);

			$this->llenartitulosmaestro();
			$this->llenaranchos();

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
			//$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);


			for($i=0;$i<= 1;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			for($i=2;$i<= 5;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i],0,0,'R');
			}
			$this->ln();
			$this->ln();
			$this->Line(10,50,270,50);

		}

		function Cuerpo()
		{
			foreach($this->arrp as $dato)
			{
				$this->numcue=$dato["numcue"];
				$this->antlib=$dato["antlib"];
				//---------------------------------------------------------------------
				//ejecuto todos los sqls, para tener todos los datos cargados en los arreglos
				$arrtstipmov=$this->tsrdisban->sql_tstipmov($this->numcue,$this->fecdes);
				$arrtsmovlib=$this->tsrdisban->sql_tsmovlib($this->numcue,$this->fecdes,$this->fechas);
                //---------------------------------------------------------------------
				$this->deb=$arrtstipmov[0]['deblibpos'];
				$this->cre=$$arrtstipmov[0]['crelibpos'];
				$salant=$this->antlib+$this->deb-$this->cre;
				//---------------------------------------------------------------------
				$totdeb=$arrtsmovlib[0]['mondeb'];
				//---------------------------------------------------------------------
				$totcre=$arrtsmovlib[0]['moncre'];
				//---------------------------------------------------------------------
				$res=$salant+$totdeb-$totcre;
				//---------------------------------------------------------------------
				$mondis=H::toFloat($this->dispon);
				//muentra los datos solo si el saldo de la cuenta bancaria es mayo o igual que el indicado por parametro
				if  ($res >= $mondis)
				{
					//IMPRESION DE LOS DATOS
					$this->setFont("Arial","",7);
					$this->cell($this->anchos[0],5,$dato["numcue"]);
					$this->cell($this->anchos[1]);
					$this->cell($this->anchos[2],5,number_format($salant,2,',','.'),0,0,'R');
					$this->cell($this->anchos[3],5,number_format($totdeb,2,',','.'),0,0,'R');
	                $this->cell($this->anchos[4],5,number_format($totcre,2,',','.'),0,0,'R');
	                $this->cell($this->anchos[5],5,number_format($res,2,',','.'),0,0,'R');
					//aqui imprimo la descripcion de la cuenta bancaria (2° campo del listado)
					$this->setxy($this->anchos[0]+10,$this->GetY());
					$this->MultiCell($this->anchos[1],3,$dato["nomcue"]);
					$this->ln();
					//acumuladores para los totales
					$this->acumsalant=$this->acumsalant+$salant;
					$this->acumdeb=$this->acumdeb+$totdeb;
					$this->acumcre=$this->acumcre+$totcre;
					$this->acumseg=$this->acumseg+$res;
				}//if  ($res >= $mondis)
				//---------------------------------------------------------------------

				$res=0;
				$salant=0;
				$totdeb=0;
				$totcre=0;
			}//foreach($arrp as $dato)

				$this->Line(10,$this->GetY(),270,$this->GetY());
				$this->setFont("Arial","B",7);
				$this->cell(100,5,"");
				$this->cell(25,5,"TOTALES");
				$this->cell($this->anchos[2],5,number_format($this->acumsalant,2,',','.'),0,0,'R');
				$this->cell($this->anchos[3],5,number_format($this->acumdeb,2,',','.'),0,0,'R');
				$this->cell($this->anchos[4],5,number_format($this->acumcre,2,',','.'),0,0,'R');
				$this->cell($this->anchos[5],5,number_format($this->acumseg,2,',','.'),0,0,'R');
				$arrtsmovlib=$this->tsrdisban->sql_tsmovlib($this->numcue,$this->fecdes,$this->fechas);
				unset($this->tsrdisban);
		}
	}
?>
