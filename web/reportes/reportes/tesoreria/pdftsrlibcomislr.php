<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  class pdfreporte extends fpdf
  {

    var $bd;
    var $titulos;
    var $titulos2;
    var $anchos;
    var $campos;
    var $sql;
    var $rif = 'G200001607';

    var $fecdes;
    var $fechas;
    var $benalterno;
    var $rifalterno;
    var $rete;
    var $notit=false;
    var $nopie=false;

    function pdfreporte()
    {
      $pag= array(280,395);
      $this->fpdf("l","mm",$pag);
      $this->bd=new basedatosAdo();
      $this->bd->validar();
      $this->titulos=array();
      $this->titulos2=array();
      $this->campos=array();
      $this->anchos=array();
      $this->ancho=array();
      $this->fecdes=$_POST["fecdes"];
      $this->fechas=$_POST["fechas"];
      $this->elaborado=$_POST["elaborado"];
      $this->autorizado=$_POST["autorizado"];
      $this->revisado=$_POST["revisado"];
      $this->rete="V";
      $conf = $this->getConfig();
      if($conf){
        if($conf['rif']) $this->rif = $conf['rif'];
      }
      $this->sql="(select
              to_char(a.fecfac,'dd/mm/yyyy') as fecfac,
              a.fecfac as fecha,
              b.cedrif,
              to_char(b.fecemi,'dd/mm/yyyy') as fecemi,
              to_char(b.fecpag,'dd/mm/yyyy') as fecpag,
	      b.numche,
              b.nomben,
	      b.numord,
	      b.desord,
              TO_CHAR(B.FECCOMRET,'yyyymm')||LPAD(b.COMRET,8,'0') as COMPROBANTE,
              a.numfac,
              a.numctr,a.tiptra,a.facafe,
              a.totfac,
              a.exeiva,
              a.basimp,
              a.poriva,
              a.moniva,
              a.monret,
              a.rifalt,
              (case when b.comretislr=null then ' ' else to_char(b.feccomretislr,'yyyy')||'-'||to_char(b.feccomretislr,'mm')||'-'||lpad(b.comretislr,8,'0') end) as comprobante_islr,
              porislr,
              monislr,
              basislr,
              porltf,
              monltf,
              basltf,
	      b.ctaban
            from
              opfactur a,opordpag b
            where
              a.moniva<>0  and
	      trim(a.rifalt) is not null  and
              a.numord=b.numord and
              b.fecemi>=to_date('".$this->fecdes."','dd/mm/yyyy') and
              b.fecemi<=to_date('".$this->fechas."','dd/mm/yyyy')
              group by
                a.fecfac,
                a.numfac,
                a.tiptra,
                a.facafe,
                a.numctr,
                b.cedrif,
                b.fecpag,
                b.numche,
                b.nomben,
                b.numord,
                b.fecemi,
                b.desord,
                B.FECEMI,
		B.FECCOMRET,
                b.COMRET,
                a.totfac,
                a.exeiva,
                a.basimp,
                a.poriva,
                moniva,
                a.monret,
                a.rifalt,
                b.comretislr,
                b.feccomretislr,
                porislr,
                monislr,
                basislr,
                porltf,
                monltf,
                basltf,
		b.ctaban
union all
select
              to_char(a.fecfac,'dd/mm/yyyy') as fecfac,
              a.fecfac as fecha,
              b.cedrif,
              to_char(b.fecemi,'dd/mm/yyyy') as fecemi,
              to_char(b.fecpag,'dd/mm/yyyy') as fecpag,
	      b.numche,
              b.nomben,
	      b.numord,
	      b.desord,
              TO_CHAR(B.FECCOMRET,'yyyymm')||LPAD(b.COMRET,8,'0') as COMPROBANTE,
              a.numfac,
              a.numctr,a.tiptra,a.facafe,
              a.totfac,
              a.exeiva,
              a.basimp,
              a.poriva,
              a.moniva,
              a.monret,
              a.rifalt,
              (case when b.comretislr=null then ' ' else to_char(b.feccomretislr,'yyyy')||'-'||to_char(b.feccomretislr,'mm')||'-'||lpad(b.comretislr,8,'0') end) as comprobante_islr,
              porislr,
              monislr,
              basislr,
              porltf,
              monltf,
              basltf,
	      b.ctaban
            from
              opfactur a,opordpag b
            where
              a.moniva<>0  and
	      trim(a.rifalt) is null  and
              a.numord=b.numord and
              b.fecpag>=to_date('".$this->fecdes."','dd/mm/yyyy') and
              b.fecpag<=to_date('".$this->fechas."','dd/mm/yyyy')
              group by
                a.fecfac,
                a.numfac,
                a.tiptra,
                a.facafe,
                a.numctr,
                b.cedrif,
                b.fecpag,
                b.numche,
                b.nomben,
                b.numord,
                b.fecemi,
                b.desord,
                B.FECEMI,
		B.FECCOMRET,
                b.COMRET,
                a.totfac,
                a.exeiva,
                a.basimp,
                a.poriva,
                moniva,
                a.monret,
                a.rifalt,
                b.comretislr,
                b.feccomretislr,
                porislr,
                monislr,
                basislr,
                porltf,
                monltf,
                basltf,
		        b.ctaban)";

  // H::PrintR($this->sql);exit();
   if ($this->rete=="V")
      {
		$this->imp="IVA";

      }
      else if ($this->rete=="I"){
      	$this->imp="ISLR";
      }
      else if ($this->rete=="L"){
      	$this->imp="LTF";
      }
      $this->llenartitulos();
    }

	function llenartitulos()
	{
		$this->titulos[]="ITEM";
		$this->anchos[]=13;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Fecha de Factura";
		$this->anchos[]=16;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Nro. de Rif";
		$this->anchos[]=19;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Nombre Del Proveedor";
		$this->anchos[]=90;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='L';
        $this->titulos[]="Tipo De Comprobante";
		$this->anchos[]=15;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Nro de Factura";
		$this->anchos[]=24;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Nro Control Factura";
		$this->anchos[]=16;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
		$this->titulos[]="Nro del Comprobante";
		$this->anchos[]=26;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Total Factura";
		$this->anchos[]=22;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='R';
        $this->titulos[]="Base Imponible ";
		$this->anchos[]=25;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='R';
        $this->titulos[]="%Alicuota Del ISLR";
		$this->anchos[]=15;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Monto Del ISLR";
		$this->anchos[]=25;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='r';
        $this->titulos[]="Fecha Del Oficio o Cheque ";
		$this->anchos[]=24;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
        $this->titulos[]="Nro. De Oficio o Cheque";
		$this->anchos[]=24;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';		}



    function Header()
    {

      //configuro la pagina con Orientacion Horizontal
      //busco la descripcion y direccion de la empresa

      $this->setFont("Arial","B",8);
      //Logo de la Empresa
      $this->Image("../../img/logo_1.jpg",10,8,33);
      //fecha actual
      $fecha=date("d/m/Y");
      $this->Cell(675,10,'Fecha: '.$fecha,0,0,'C');
      $this->ln(5);
      //Paginas
      $this->Cell(675,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');

      $this->Ln(-5);
        $this->Cell(270,5,'',0,0,'C');
      $this->Ln(3);
        $this->Cell(270,5,'',0,0,'C');
      $this->Ln(3);
        $this->Cell(270,5,'',0,0,'C');
      $this->Ln(3);
        $this->Cell(270,5,'',0,0,'C');
        $this->Ln(8);
      //Titulo del Reporte
      $this->setFont("Arial","B",12);
      $this->Cell(370,10,$_POST["titulo"],0,0,'C',0);
      $this->ln(10);
      $this->Line(10,35,385,35);
      $this->setFont("Arial","B",9);
      $this->L1();
      $this->cell(15,10,"Desde :");$this->L2();$this->cell(25,10,$this->fecdes);
      $this->Ln(4);
      $this->L1();
      $this->cell(15,10,"Hasta :");$this->L2();$this->cell(25,10,$this->fechas);
      $this->Ln(4);
      $tb1=$this->bd->select("SELECT NOMEMP as NOMEMPRESA FROM EMPRESA");
      $this->L1();
      $this->cell(15,10,"Oficina :");$this->L2();$this->cell(25,10,strtoupper($tb1->fields["nomempresa"]));
      $this->SetWidths($this->anchos);
      $this->SetAligns($this->aliniacion);
      $this->SetBorder(true);
      if(!$this->notit)
      {
	      $this->SetXY(234,$this->GetY()+5);
	      $this->Multicell(112,5,"",0,'C');
	      $this->setFont("Arial","B",8);
	      $this->RowM($this->titulos);
      }
      $this->SetAligns($this->aliniacion2);
    }

    function Footer()
    {
    	if(!$this->nopie and $this->rete=="V")
    	{
	    	$this->SetXY(10,264);
		    $this->setFont("Arial","",8);
	      	//$this->Cell(100,5,'DE = Deducibles    PD = Parcialmente Deducibles    ND = No Deducibles');
    	}
    }

    function L1()
    {
    $this->setFont("Arial","B",9);
    }
    function L2()
    {
    $this->setFont("Arial","",9);
    }


    function PutLink($URL,$txt)
    {
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
    function Cuerpo()
    {
      $tb=$this->bd->select($this->sql);
      $tbt=$this->bd->select($this->sql);
      $this->tb2=$tb;
      $Inicio=$this->GetY();
      $this->setFont("Arial","",7);
      $rif=$this->rif;
      $cont=1;
      $existe=false;
          if ($tb->fields["fecfac"]!=""){
              while (!$tb->EOF)
              {

              	  if ($this->rete=="V") //iva
     			  {
     			  	$base=$tb->fields["basislr"];
   //  			 	$por=$tb->fields["porislr"];
     			 	$iva=$tb->fields["monislr"];
//     			 	$exe=$tb->fields["exeiva"];
     			  }
                  if (trim($tb->fields["numche"])!='')
                  {
                  	$numche=trim($tb->fields["numche"]);
                  	$fechemi=$tb->fields["fecemi"];
                  }
                  else
                  {
                  	$numche=trim($tb->fields["numord"]);
                  	$fechemi=$tb->fields["fecemi"];
                  }

      $tbrif=$this->bd->select("SELECT nomben as nomben FROM opbenefi where trim(cedrif)=('".trim($tb->fields["rifalt"])."')");

                  if ($tb->fields["tiptra"]=='01')
                  {
					if((trim($tb->fields["rifalt"])<>''))
					{
                	$this->RowM(array($cont,$tb->fields["fecfac"],strtoupper(trim($tb->fields["rifalt"])),trim($tbrif->fields["nomben"]),"C",$tb->fields["numfac"],$tb->fields["numctr"],$tb->fields["comprobante_islr"],H::FormatoMonto($tb->fields["totfac"]),H::FormatoMonto($tb->fields["basislr"]),$tb->fields["porislr"],H::FormatoMonto($tb->fields["monislr"]),$fechemi,$numche));
					}
					else
					{
                	$this->RowM(array($cont,$tb->fields["fecfac"],strtoupper(trim($tb->fields["cedrif"])),trim($tb->fields["nomben"]),"C",$tb->fields["numfac"],$tb->fields["numctr"],$tb->fields["comprobante_islr"],H::FormatoMonto($tb->fields["totfac"]),H::FormatoMonto($tb->fields["basislr"]),$tb->fields["porislr"],H::FormatoMonto($tb->fields["monislr"]),$fechemi,$numche));
					}
                  }

                $Tot_totfac=$Tot_totfac + $tb->fields["totfac"];
           //     $Tot_exeiva=$Tot_exeiva + $exe;
                $Tot_baseimp=$Tot_baseimp + $base;
                $Tot_moniva=$Tot_moniva + $iva;
          //      $Tot_monret=$Tot_monret + $rete;

                $cont=$cont+1;
              $tb->MoveNext();
            } //------------------------------ fin while EOF
             //     $this->SetWidths($this->anchos);
			//      $this->SetAligns($this->aliniacion);
			//      $this->SetBorder(false);

            $this->setFont("Arial","B",7);
				if($this->rete=="V")
					{
                	$this->RowM(array('','','','','','','TOTALES','',H::FormatoMonto($Tot_totfac),H::FormatoMonto($Tot_baseimp),'',H::FormatoMonto($Tot_moniva),'','',''));
					}

          $this->Ln(4);

          if($this->GetY()>160)
	  	  $this->AddPage();
      }


 /*     if ($txt=='SI')
      {
			$dir = parse_url($_SERVER['HTTP_REFERER']);
			$dir = eregi_replace(".php","_hc.php",$dir['scheme'].'://'.$dir['host'].$dir['path']);
			#$direccion= eregi_replace(" ","@#@",trim($dir).'?fecdes='.$this->fecdes.'&fechas='.$this->fechas.'&elaborado='.$this->elaborado.'&autorizado='.$this->autorizado.'&revisado='.$this->revisado.'&rete='.$this->rete);
			$this->PutLink(trim($dir).'?fecdes='.$this->fecdes.'&fechas='.$this->fechas.'&elaborado='.$this->elaborado.'&autorizado='.$this->autorizado.'&revisado='.$this->revisado.'&rete='.$this->rete,'Visualizar HOJA DE CALCULO');
      }
 */
$this->setxy(10,237);
$this->cell(120,4,'_______________________________________',0,0,'C');
$this->setxy(130,237);
$this->cell(130,4,'_______________________________________',0,0,'C');
$this->setxy(260,237);
$this->cell(130,4,'_______________________________________',0,0,'C');	  //-----------------------------------------------------------------------------------------------------------------------------//
$this->setxy(10,240);
$this->cell(120,4,'YOHANNA BOLIVAR',0,0,'C');
$this->setxy(130,240);
$this->cell(130,4,'JOSÉ MANUEL TAVARES',0,0,'C');
$this->setxy(260,240);
$this->cell(130,4,'JUAN  GÓMEZ',0,0,'C');
$this->setxy(10,243);
$this->cell(120,4,'ANALISTA ADMINISTRATIVO',0,0,'C');
$this->setxy(130,243);
$this->cell(130,4,'COORDINADOR DE ADMINISTRACIÓN',0,0,'C');
$this->setxy(260,243);
$this->cell(130,4,'GERENTE DE ADMINISTRACIÓN',0,0,'C');	  //-----------------------------------------------------------------------------------------------------------------------------//
    $this->bd->closed();

    }
}
?>
