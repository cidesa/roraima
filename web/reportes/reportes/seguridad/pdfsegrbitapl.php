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
		var $campos;
		var $sql;
		
		var $fecdes;
		var $fechas;
		var $apldes;			
		var $aplhas;									
		var $nomusudes;
		var $nomusuhas;
				
		function pdfreporte()
		{		
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->ancho=array();
			$this->nomusudes=$_POST["nomusudes"];
			$this->nomusuhas=$_POST["nomusuhas"];			
			$this->apldes=$_POST["apldes"];			
			$this->aplhas=$_POST["aplhas"];									
			$this->fecdes=$_POST["fecdes"];
			$this->fechas=$_POST["fechas"];
	
			$this->sql="select
							a.refmov,
							b.cedemp,         
							b.nomuse,
							a.codmod,
							case when a.tipope='G' then 'GUARDAR' 
								when a.tipope='E' then 'ELIMINAR'
								else 'SIN DEFINIAR' end as tipo,
							to_char(a.fecope,'dd/mm/yyyy') as fecope,
							to_char(a.horope,'hh:mi:ss') as horope,       
							a.valcla,
							upper(a.codapl) as codapl,         							
							case when codapl='aut' then 'SEGURIDAD'
								when codapl='bie' then 'BIENES NACIONALES'
								when codapl='com' then 'COMPRAS Y ALMACEN'
								when codapl='doc' then 'CONTROL DE DOCUMENTO'
								when codapl='for' then 'FORMULACION PRESUPUESTARIA'
								when codapl='nom' then 'NOMINA Y PERSONAL'
								when codapl='pre' then 'EJECUCION PRESUPUESTARIA'
								when codapl='tes' then 'TESORERIA O BANCO'
								when codapl='con' then 'CONTABILIDAD FINANCIERA'
								else 'SIN DEFINIR' end as desapl,
							a.codintusu,
							b.loguse,
							b.diremp
							from \"SIMA_USER\".segbitaco a,\"SIMA_USER\".usuarios b
							where 
							a.codintusu::numeric=b.id and 
							(b.nomuse)>=('".$this->nomusudes."') and
							(b.nomuse)<=('".$this->nomusuhas."') and
							fecope>=to_date('".$this->fecdes."','dd/mm/yyyy') and
							fecope<=to_date('".$this->fechas."','dd/mm/yyyy') and
							(a.codapl)>=('".$this->apldes."') and
							(a.codapl)<=('".$this->aplhas."')							
							order by 
							a.codapl,fecope,a.horope  ";

			$this->arrp = $this->bd->select($this->sql);
			$this->cab=new cabecera();			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
					
		}
	
		function Cuerpo()
		{   			
			$totope=0;		 			
			$refcod="";
			foreach($this->arrp as $reg)
			{
				if($refcod!=$reg['codapl'])
				{
					$this->setFont("Arial","B",8);
					if($refcod)
					{
						$this->setautopagebreak(false);
						$this->multicell(180,4,'Total Operaciones: '.$totope);
						$totope=0;
						$this->setautopagebreak(true);						
					}
					$this->setFont("Arial","B",8);
					$this->cell(35,4,'CODIGO APLICACION: ',1);
					$this->setFont("Arial","",8);
					$this->cell(10,4,$reg['codapl'],1);
					$this->setFont("Arial","B",8);
					$this->cell(20,4,'LOGIN: ',1);
					$this->setFont("Arial","",8);
					$this->multicell(125,4,$reg['loguse'],1);
					$this->setFont("Arial","B",8);
					$this->cell(30,4,'DESCRIPCION: ',1);
					$this->setFont("Arial","",8);
					$this->multicell(160,4,$reg['desapl'],1);
					$this->setFont("Arial","B",8);
					$this->setwidths(array(25,20,40,25,20,20,20,30));
					$this->setAligns(array('C','C','C','C','C','C','C','C'));	
					$this->rowm(array("REFERENCIA\n(ID)",'C.I.','NOMBRE USUARIO','NOMBRE MODULO','OPERACION','FECHA OPERACION','HORA OPERACION',"TABLA\nMODIFICADA"));
					$this->setwidths(array(25,20,40,25,20,20,20,30));
					$this->setAligns(array('C','C','L','L','C','C','C','C'));
					$this->setFont("Arial","",8);					
				}
				#DETALLE				
				$this->rowm(array_slice($reg,0,16));				
				$totope+=1;
				$refcod=$reg['codapl'];
			}
			#TOTALES
			$this->setFont("Arial","B",8);
			$this->setautopagebreak(false);
			$this->multicell(180,4,'Total Operaciones: '.$totope);
		} 
}
?>
