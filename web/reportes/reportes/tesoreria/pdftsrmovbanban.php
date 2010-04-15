<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $titulos;
		var $refcaudes;
		var $nombendes;
		var $nombenhas;
		var $contrato;
		var $concepto;
		var $agencia;
		var $administracion;
		var $ci_administracion;
		var $secretario;
		var $ci_secretario;
		var $contralor;
		var $ci_contralor;
		var $y;
		var $x;
		var $numcuedes;
		var $tipodes;
		var $tipohas;
		var $refdes;
		var $refhas;
		var $fecha_tra_des;
		var $fecha_tra_has;
		var $status;


		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->numcuedes=$_POST["numcuedes"];
			$this->tipodes=$_POST["tipodes"];
			$this->tipohas=$_POST["tipohas"];
			$this->refdes=$_POST["refdes"];
			$this->refhas=$_POST["refhas"];
			$this->fecha_tra_des=$_POST["fecha_tra_des"];
			$this->fecha_tra_has=$_POST["fecha_tra_has"];
			$this->status=$_POST["status"];

			  if (trim($this->status='T')):
				  $this->sta_1 = 'A';
				  $this->sta_2 = 'C';
				  $this->sta_3 = 'N';
			  elseif (trim($this->status='A')):
				  $this->sta_1 = 'A';
				  $this->sta_2 = 'A';
				  $this->sta_3 = 'A';
			  elseif (trim($this->status='C')):
				  $this->sta_1 = 'C';
				  $this->sta_2 = 'C';
				  $this->sta_3 = 'C';
			  elseif (trim($this->status='NC')):
				  $this->sta_1 = 'N';
				  $this->sta_2 = 'N';
				  $this->sta_3 = 'N';
			  elseif ( trim($this->status='TMA')):
				  $this->sta_1 = 'C';
				  $this->sta_2 = 'C';
				  $this->sta_3 = 'N';
			  endif;

			$this->sql="select
					(b.tipmov) as tipmov,
					b.refban,
					b.desban,
					to_char(fecban,'dd/mm/yyyy') as fecban,
					b.status,
					(case when c.debcre='D' then b.monmov else '0' end) as debitos,
					(case when c.debcre='C' then b.monmov else '0' end) as creditos
			from
					tsmovban b,
					tstipmov c
			where
					(b.tipmov)=(c.codtip) and
					rpad(b.numcue,20,' ') = rpad('".$this->numcuedes."',20,' ') and
					(b.tipmov) >= rpad('".$this->tipodes."',4,' ')  and
					(b.tipmov) <= rpad('".$this->tipohas."',4,' ')  and
					b.fecban >= to_date('".$this->fecha_tra_des."','dd/mm/yyyy') and
					b.fecban <= to_date('".$this->fecha_tra_has."','dd/mm/yyyy') and
					( b.status = '".$this->sta_1."' or
					  b.status = '".$this->sta_2."' or
					  b.status = '".$this->sta_3."')
			order by b.fecban,refban asc";






					//print $this->sql;
					//exit;
		}



		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","l");
			$this->setFont("Arial","",8);
			$this->SetXY(10,45);
			$this->Line($this->GetX(),$this->GetY(),$this->GetX()+260,$this->GetY());//horizontal
			$this->Line($this->GetX(),$this->GetY()+10,$this->GetX()+260,$this->GetY()+10);//horizontal
			$this->Line($this->GetX(),$this->GetY()+15,$this->GetX()+260,$this->GetY()+15);//horizontal
			$this->Line($this->GetX(),$this->GetY()+20,$this->GetX()+260,$this->GetY()+20);//horizontal
			$this->Line($this->GetX(),$this->GetY()+150,$this->GetX()+260,$this->GetY()+150);//horizontal
			$this->SetXY(10,45);
			$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+150);//verical MARCO
			$this->Line($this->GetX()+20,$this->GetY()+10,$this->GetX()+20,$this->GetY()+150);
			$this->Line($this->GetX()+40,$this->GetY()+10,$this->GetX()+40,$this->GetY()+150);
			$this->Line($this->GetX()+60,$this->GetY()+10,$this->GetX()+60,$this->GetY()+150);
			$this->Line($this->GetX()+70,$this->GetY()+10,$this->GetX()+70,$this->GetY()+150);
			$this->Line($this->GetX()+90,$this->GetY()+10,$this->GetX()+90,$this->GetY()+150);
			$this->Line($this->GetX()+185,$this->GetY()+10,$this->GetX()+185,$this->GetY()+150);
			$this->Line($this->GetX()+210,$this->GetY()+10,$this->GetX()+210,$this->GetY()+150);
			$this->Line($this->GetX()+235,$this->GetY()+10,$this->GetX()+235,$this->GetY()+150);
			$this->Line($this->GetX()+260,$this->GetY(),$this->GetX()+260,$this->GetY()+150);//verical MARCO
			$this->SetXY(10,55);
			$this->cell(5,5,"      Correl               Emision          Registrado        Tipo      Referencia        Beneficiario Cheque/Origen Deposito                                                                   Debitos                   Creditos                    Saldo");
			$this->SetXY(10,70);


		}

		function Cuerpo()
		{
			$this->setFont("Arial","",8);

			$this->sql2="select
						antban as anterior,
						nomcue as nombre
					from
					    tsdefban
					where
						numcue=rpad('".$this->numcuedes."',20,' ')";
						//print $this->sql2;
			$tb2=$this->bd->select($this->sql2);

			$this->sql1="select
						coalesce(sum(case when a.debcre='D' then b.monmov else '0' end),0) as deblibpos,
				        coalesce(sum(case when a.debcre='C' then b.monmov else '0' end),0) as crelibpos
					from
						tstipmov a,
				        tsmovban b
					where
						b.numcue = rpad('".$this->numcuedes."',20,' ') and
					    b.tipmov = a.codtip and
				        b.fecban < '".$this->fecha_tra_des."' and
				        b.fecban>=to_date('01/01/2002','dd/mm/yyyy')";

			$tb1=$this->bd->select($this->sql1);
			$this->SetXY(10,40);
			$this->cell(5,5,"Del: ".$this->fecha_tra_des." Hasta: ".$this->fecha_tra_has);
			$this->SetXY(10,45);
			$this->cell(5,5,"Banco: ".$tb2->fields["nombre"]);
			$this->SetXY(10,50);
			$this->cell(5,5,"Cuenta: ".$this->numcuedes);
			$this->SetXY(10,55);
			$this->cell(5,5,"      Correl               Emision          Registrado        Tipo      Referencia        Beneficiario Cheque/Origen Deposito                                                                   Debitos                   Creditos                    Saldo");
			$this->SetXY(102,60);
			$this->cell(5,5,"Saldo Inicial");
			$this->SetXY($this->GetX()+150,$this->GetY());
			$this->cell(10,5,number_format($tb2->fields["anterior"]+($tb1->fields["deblibpos"]-$tb1->fields["crelibpos"]),2,'.',','),0,0,'R',0);;
			$this->SetXY(12,65);
			$tb=$this->bd->select($this->sql);
			$this->contador=0;
			$this->setFont("Arial","",7);
		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;
			while (!$tb->EOF)
			{
					$this->SetX(12);
					$this->contador=$this->contador+1;
					$this->cell(10,5,$this->contador);
					$this->SetXY($this->GetX()+10,$this->GetY());
					$this->cell(10,5,trim($tb->fields["fecban"]));
					$this->SetXY($this->GetX()+10,$this->GetY());
					$this->cell(10,5,trim($tb->fields["fecban"]));
					$this->SetXY($this->GetX()+10,$this->GetY());
					$this->cell(10,5,trim($tb->fields["tipmov"]));
					$this->SetXY($this->GetX(),$this->GetY());
					$this->cell(10,5,trim($tb->fields["refban"]));
					$this->SetXY($this->GetX()+118,$this->GetY());
					$this->cell(10,5,number_format($tb->fields["debitos"],2,'.',','),0,0,'R',0);
					$this->SetXY($this->GetX()+15,$this->GetY());
					$this->cell(10,5,number_format($tb->fields["creditos"],2,'.',','),0,0,'R',0);
					$this->SetXY($this->GetX()+15,$this->GetY());
					$this->total_debitos=$this->total_debitos+$tb->fields["debitos"];
					$this->total_creditos=$this->total_creditos+$tb->fields["creditos"];
					$this->total_saldo=$this->total_debitos-$this->total_creditos;
					$this->cell(10,5,number_format($this->total_saldo,2,'.',','),0,0,'R',0);;
					$this->SetXY($this->GetX()+160,$this->GetY());
					$this->SetXY($this->GetX()-328,$this->GetY()+1);
					$this->setFont("Arial","",6);
					$this->multicell(90,3,strtoupper($tb->fields["desban"]),0,'l');// DESCRIPCION
					$this->setFont("Arial","",7);
					$this->Line($this->GetX(),$this->GetY(),$this->GetX()+260,$this->GetY());//horizontal
					$this->total_debitos_general=$this->total_debitos_general+$tb->fields["debitos"];
					$this->total_creditos_general=$this->total_creditos_general+$tb->fields["creditos"];
					$this->total_general=$this->total_saldo;

			$tb->MoveNext();
			}//ciclo
			$this->setFont("Arial","B",7);
					$this->SetXY($this->GetX()+150,$this->GetY());
					$this->cell(10,5,"TOTALES: ");
					$this->SetXY($this->GetX()+35,$this->GetY());
					$this->cell(10,5,number_format($this->total_debitos_general,2,'.',','),0,0,'R',0);
					$this->SetXY($this->GetX()+15,$this->GetY());
					$this->cell(10,5,number_format($this->total_creditos_general,2,'.',','),0,0,'R',0);
					$this->SetXY($this->GetX()+15,$this->GetY());
					$this->cell(10,5,number_format($this->total_general,2,'.',','),0,0,'R',0);


			///////////////////////*/
		}
	}



?>