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
							case when codapl='aut' then 'SEGURIDAD'
								when codapl='bie' then 'BIENES NACIONALES'
								when codapl='com' then 'COMPRAS Y ALMACEN'
								when codapl='doc' then 'CONTROL DE DOCUMENTO'
								when codapl='for' then 'FORMULACION PRESUPUESTARIA'
								when codapl='nom' then 'NOMINA Y PERSONAL'
								when codapl='pre' then 'EJECUCION PRESUPUESTARIA'
								when codapl='tes' then 'TESORERIA O BANCO'
								when codapl='con' then 'CONTABILIDAD FINANCIERA'
								else 'SIN DEFINIR' end as apli,
							a.codmod,
							case when a.tipope='G' then 'GUARDAR' 
								when a.tipope='E' then 'ELIMINAR'
								else 'SIN DEFINIAR' end as tipope,
							to_char(a.fecope,'dd/mm/yyyy') as fecope,
							to_char(a.horope,'hh:mi:ss') as horope,
							a.valcla,
							b.cedemp,         
							b.nomuse,
							b.loguse,
							b.diremp,upper(a.codapl) as codapl
						from 
							\"SIMA_USER\".segbitaco a,\"SIMA_USER\".usuarios b
						where 							
							a.codintusu::numeric=b.id and 
							(b.nomuse)>=('".$this->nomusudes."') and
							(b.nomuse)<=('".$this->nomusuhas."') and
							a.fecope>=to_date('".$this->fecdes."','dd/mm/yyyy') and
							a.fecope<=to_date('".$this->fechas."','dd/mm/yyyy') and
							(a.codapl)>=('".$this->apldes."') and
							(a.codapl)<=('".$this->aplhas."')
						order by b.nomuse,upper(a.codapl),
							a.fecope,a.horope";
			#print "<pre>".$this->sql;exit;
			$this->arrp=$this->bd->select($this->sql);
			$this->cab=new cabecera();			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");							 
		}	
		

		function Cuerpo()
		{   
			$ref='';
			$refapl='';
			$totopeusu=0;
			$totopeapl=0;
			foreach($this->arrp as $reg)
			{
				if($ref!=$reg['cedemp'])
				{
					#POR USUARIO
					$this->setFont("Arial","B",8);
					if($ref)
					{
						$this->setautopagebreak(false);
						$this->multicell(180,4,'Total Operaciones Aplicacion: '.$totopeapl);
						$this->multicell(180,4,'Total Operaciones Usuario: '.$totopeusu);
						$totopeusu=0;
						$totopeapl=0;
						$this->setautopagebreak(true);
					}					
					$this->cell(50,4,'CEDULA: '.number_format($reg['cedemp'],0,',','.'),1);
					$this->cell(90,4,'NOMBRE: '.$reg['nomuse'],1);
					$this->multicell(50,4,'LOGIN: '.$reg['loguse'],1);
					$this->multicell(190,4,'DIRECCION HAB: '.$reg['diremp'],1);								
					#POR APLICACION
					$this->setFont("Arial","B",8);
					$this->cell(40,4,'Código Aplicación: ',1);
					$this->setFont("Arial","",8);
					$this->cell(20,4,$reg['codapl'],1);					
					$this->setFont("Arial","B",8);
					$this->cell(20,4,'Descripción: ',1);
					$this->setFont("Arial","",8);
					$this->multicell(110,4,$reg['apli'],1);					
					$this->setFont("Arial","B",8);
					$this->setwidths(array(25,40,25,25,25,25,25));				
					$this->setAligns(array('C','L','C','C','C','C','C'));	
					$this->setborder(true);	
					$this->rowm(array("REFERENCIA\n(ID)",'APLICACION','NOMBRE MODULO','OPERACION','FECHA OPERACION','HORA OPERACION',"TABLA\nMODIFICADA"));
					$this->setwidths(array(25,40,25,25,25,25,25));		
					$this->setAligns(array('C','L','L','C','C','C','C'));
					$this->setFont("Arial","",8);
				}elseif($refapl!=$reg['codapl'])
				{
					$this->setFont("Arial","B",8);
					if($refapl)
					{
						$this->setautopagebreak(false);
						$this->multicell(180,4,'Total Operaciones Aplicacion: '.$totopeapl);						
						$totopeapl=0;
						$this->setautopagebreak(true);
					}
					#POR APLICACION
					$this->setFont("Arial","B",8);
					$this->cell(40,4,'Código Aplicación: ',1);
					$this->setFont("Arial","",8);
					$this->cell(20,4,$reg['codapl'],1);					
					$this->setFont("Arial","B",8);
					$this->cell(20,4,'Descripción: ',1);
					$this->setFont("Arial","",8);
					$this->multicell(110,4,$reg['apli'],1);					
					$this->setFont("Arial","B",8);
					$this->setwidths(array(25,40,25,25,25,25,25));				
					$this->setAligns(array('C','L','C','C','C','C','C'));	
					$this->setborder(true);	
					$this->rowm(array("REFERENCIA\n(ID)",'APLICACION','NOMBRE MODULO','OPERACION','FECHA OPERACION','HORA OPERACION',"TABLA\nMODIFICADA"));
					$this->setwidths(array(25,40,25,25,25,25,25));		
					$this->setAligns(array('C','L','L','C','C','C','C'));
					$this->setFont("Arial","",8);
				}
				#DETALLE				
				$this->rowm(array_slice($reg,0,14));
				$totopeusu+=1;
				$totopeapl+=1;
				$ref=$reg['cedemp'];
				$refapl=$reg['codapl'];
			}
			$this->setFont("Arial","B",8);
			$this->setautopagebreak(false);
			$this->multicell(180,4,'Total Operaciones: '.$totope);
			
		}
}
?>
