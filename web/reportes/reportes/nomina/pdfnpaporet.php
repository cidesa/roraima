<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulo;
		var $anchos2;
		var $sql;		
		var $cab;

		var $codtipapodes;
		var $codtipapohas;
		var $codempdes;
		var $codemphas;
		var $catdesde;
		var $cathasta;
		var $tipnomdes;
		var $elaborado;
		var $revisado;
		var $autorizado;
		var $car;
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codtipapodes=$_POST["codtipapodes"];
			$this->codtipapohas=$_POST["codtipapohas"];
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->catdesde=$_POST["catdesde"];
			$this->cathasta=$_POST["cathasta"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
			$this->titulo=$_POST["titulo"];


			
			$this->sql="select distinct 
						c.frecon,
						a.codtipapo,
						a.destipapo,
						a.porapo,
						a.porret,
						b.codnom as codnomapo
						from nptipaportes a,npcontipaporet b, npasiconnom c  where 
						a.codtipapo=b.codtipapo and 
						b.codcon=c.codcon and
						b.codnom=c.codnom and
						a.codtipapo>='".$this->codtipapodes."' and
						a.codtipapo<='".$this->codtipapohas."' and
						b.codnom='".$this->tipnomdes."'";

			$this->cab=new cabecera();
			
		}

		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->SetY(40);
				$n=$this->bd->select("select distinct(nomnom) as nombre from npnomcal 
									where (codnom) = ('".$this->tipnomdes."')");
				$this->Cell(60,5,'Nomina:  '.$this->tipnomdes.'  -  '.$n->fields["nombre"]);
				$this->ln(4);
				
				 //fecha desde//
					
					$n=$this->bd->select("select distinct to_char(profec,'dd/mm/yyyy') as profec, 
										  to_number(substr(to_char(profec,'dd/mm/yyyy'),1,2),'99')
										  as valor, substr(to_char(profec,'dd/mm/yyyy'),3,8) as valor2  
										  from npnomina where codnom='".$this->tipnomdes."'");
					if (($tb->fields["frecon"]=='P') || ($tb->fields["frecon"]=='D')) {
						if ($n->fields["valor"]<=15) {
							$fecha= '01'.$n->fields["valor2"];
						}
						else {
							$fecha= '16'.$n->fields["valor1"];
						}
					}
					else {
						if ($tb->fields["frecon"]=='S') {
							if ($n->fields["valor"]>15) {
								$fecha= '16'.$n->fields["valor1"];
							}
						}
						
					}
				
				$this->Cell(60,5,'Fecha desde:  '.$fecha.'      Hasta:  '.$n->fields["profec"]);
			
				

				
				$this->ln(5);

		}
		function Cuerpo()
		{
			
	$tb=$this->bd->select($this->sql);
	$porret=0;
	$porapo=0;
	if (!$tb->EOF) { $cod = $tb->fields["codnomapo"];}
	

	while (!$tb->EOF) {
		
		$this->setFont("Arial","B",9);
		$this->SetTextColor(0,0,128);
		$this->SetY(35);
		$this->cell(200,5,$tb->fields["destipapo"],0,0,'C');
		$this->ln(20);
		
		$porret=$tb->porret;
		$porapo=$tb->porapo;
		
		$tb2=$this->bd->select("select
								distinct
								a.codemp,
								a.codnom,
								a.codcar,
								c.codcat,
								d.nomcat,
								sum(a.saldo) as monto,
								to_char(coalesce(fecrei,fecing),'dd/mm/yyyy') as fecing,
								b.nomemp
								 from 
								   npnomcal a,nphojint b,npasicaremp c,npcatpre d
								 where
							  	a.codnom = '".$cod."' and
								c.codnom=a.codnom and
								c.codcar=a.codcar and
								c.codemp=a.codemp and
								c.codcat=d.codcat and 
								b.codemp=a.codemp 
								                  and  b.codemp >=  rpad('".$this->codempdes."',16,' ')
								                  and  b.codemp<= rpad('".$this->codemphas."',16,' ')
								                  and  c.codcat >=  rpad('".$this->catdesde."',16,' ')
								                  and  c.codcat<= rpad('".$this->cathasta."',16,' ')
								group by a.codemp,a.codnom,a.codcar,b.nomemp,coalesce(fecrei,fecing),c.codcat,d.nomcat
								order by c.codcat,a.codnom,a.codemp");
		
		if (!$tb2->EOF) {$cat=$tb2->fields["codcat"];}
		$this->SetY(50);
			$ttra=0;
	$tsue=0;
	$tret=0;
	$tapo=0;
	
		while (!$tb2->EOF) {

			$this->Cell(20,5,$tb2->fields["codcat"].'     '.$tb2->fields["nomcat"]);
			$this->SetTextColor(0,0,0);
			$this->ln(4);
			$this->setFont("Arial","B",8);
			$r=$this->GetY();
			$this->Rect(10,$r,200,10);
			$this->ln(2);
			$this->SetX(10);
			$this->Cell(10,3,'CEDULA');
			$this->Line(30,$r,30,$r+10);
			$this->SetX(32);
			$this->Cell(30,3,'EMPLEADO');
			$this->Line(80,$r,80,$r+10);
			$this->SetX(82);
			$this->Cell(20,3,'SUELDO');
			$this->Line(110,$r,110,$r+10);
			$this->SetX(110);
			$this->Cell(20,3,'FECHA DE');
			$this->Line(130,$r,130,$r+10);
			$this->SetX(135);
			$this->Cell(30,3,'RETENCION');
			$this->Line(160,$r,160,$r+10);
			$this->SetX(165);
			$this->Cell(30,3,'APORTE');
			$this->Line(185,$r,185,$r+10);
			$this->SetX(188);
			$this->Cell(30,3,'TOTAL');
			$this->ln(4);
			$this->SetX(110);
			$this->Cell(20,3,' INGRESO');
			$this->SetX(135);
			$this->Cell(30,3,$porret.' %');
			$this->SetX(165);
			$this->Cell(30,3,$porapo.' %');
			$this->ln(5);

			$ret=0;
			$apo=0;
			$tot=0;
			
			while (($tb2->fields["codcat"]==$cat) && (!$tb2->EOF)) {
				
				$this->SetFont("Arial","",8);
				$s=$this->bd->select("select coalesce(sum(saldo),0) as valor 
						   from npnomcal a,npconsalint b 
						   where 
						   (codemp) =rpad('".$tb2->fields["codemp"]."',16,' ') and 
						   (codcar) =rpad('".$tb2->fields["codcar"]."',16,' ') and 
						   a.codcon=b.codcon");	
									
				$r=$this->GetY();
				$this->Rect(10,$r,200,4);
				$this->ln(1);
				$this->SetX(12);
				$this->Cell(10,3,$tb2->fields["codemp"]);
				$ttra+=1;
				$this->Line(30,$r,30,$r+4);
				$this->SetX(30);
				$this->Cell(30,3,$tb2->fields["nomemp"]);
				$this->Line(80,$r,80,$r+4);
				$this->SetX(82);
				$this->Cell(20,3,$s->fields["valor"]);
				$tsue+=$s->fields["valor"];
				$this->Line(110,$r,110,$r+4);
				$this->SetX(110);
				$this->Cell(20,3,$tb2->fields["fecing"]);
				$this->Line(130,$r,130,$r+4);
				$s=$this->bd->select(" select coalesce(sum(saldo),0) as elmonto from npnomcal a, nphojint b, npcontipaporet c
						 where
						 c.codtipapo='".$tb->fields["codtipapo"]."' and
						 a.codnom=c.codnom and
						 a.codcon=c.codcon and 
						 c.tipo='R' and 
						 b.codemp=a.codemp and
						 b.codemp='".$tb2->fields["codemp"]."'");
				$total=$s->fields["elmonto"];
				$ret+=$s->fields["elmonto"];
				$this->SetX(135);
				$this->Cell(30,3,$s->fields["elmonto"]);
				$this->Line(160,$r,160,$r+4);
				$s=$this->bd->select(" select coalesce(sum(saldo),0) as elmonto from npnomcal a, nphojint b, npcontipaporet c
						 where
						 c.codtipapo='".$tb->fields["codtipapo"]."' and
						 a.codnom=c.codnom and
						 a.codcon=c.codcon and 
						 c.tipo='A' and 
						 b.codemp=a.codemp and
						 b.codemp='".$tb2->fields["codemp"]."'");
				$total+=$s->fields["elmonto"];
				$apo+=$s->fields["elmonto"];
				$this->SetX(165);
				$this->Cell(30,3,$s->fields["elmonto"]);
				$this->Line(185,$r,185,$r+4);
				$this->SetX(188);
				$this->Cell(30,3,$total);
				$tot+=$total;
				
				$this->ln(3);
				
				$tb2->MoveNext();
			} // end while cat tb2

			$this->Ln(1);
			$this->Rect(130,$this->GetY(),80,5);
			
			$this->SetX(135);
			$this->Cell(30,3,$ret);
			$tret+=$ret;
			$this->SetX(165);
			$this->Cell(30,3,$apo);
			$tapo+=$apo;
			$this->SetX(188);
			$this->Cell(30,3,$tot);
			$this->Ln(10);
			// muestra totales de cat

		if (!$tb2->EOF) {
			$cat=$tb2->fields["codcat"];
			
		}	

		} // end while $tb2

		$this->ln(10);
		$L=$this->GetY();
		$this->Rect(30,$L-10,135,40);
		$this->SetXY(65,$L-9);
		$this->Cell(10,4,'RESUMEN');
		$this->Rect(50,$L,95,20);
		$this->Line(70,$L,70,$L+20);
		$this->Line(105,$L,105,$L+20);
		$this->Line(70,$L+5,145,$L+5);
		$this->Line(70,$L+10,145,$L+10);
		$this->Line(70,$L+15,145,$L+15);
		
		$this->SetXY(50,$L+9);
		$this->Cell(10,5,'TOTAL');
		$this->SetXY(70,$L);
		$this->Cell(10,5,'TRABAJADORES');
		$this->SetXY(70,$L+5);
		$this->Cell(10,5,'SUELDO TOTAL');
		$this->SetXY(70,$L+10);
		$this->Cell(10,5,'RETENCIONES');
		$this->SetXY(70,$L+15);
		$this->Cell(10,5,'APORTES');
		$this->SetXY(110,$L);
		$this->Cell(10,5,$ttra);
		$this->SetXY(110,$L+5);
		$this->Cell(10,5,$tsue);
		$this->SetXY(110,$L+10);
		$this->Cell(10,5,$tret);
		$this->SetXY(110,$L+15);
		$this->Cell(10,5,$tapo);



// muentra  resument de totaleeeeees
		$tb->MoveNext();
		if (!$tb->EOF) {
	 		$this->AddPage();
	 		$cod =  $tb->fields["codnomapo"];
		}
		
		
			
	}	//end while $tb
			

		}
	}
?>
