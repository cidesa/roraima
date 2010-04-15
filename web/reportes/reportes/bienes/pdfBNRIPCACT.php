<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $acum=0;
		var $result=0;				
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
		var $anoipc1;
		var $anoipc2;

						
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->anoipc1=$_POST["anoipc1"];
			$this->anoipc2=$_POST["anoipc2"];
						
						

									
						
				$this->sql="SELECT A.ANOIPC as aanoipc,A.IPCENE as aipcene,A.IPCFEB as aipcfeb,A.IPCMAR as aipcmar,A.IPCABR as aipcabr,
				A.IPCMAY as aipcmay,A.IPCJUN as aipcjun,A.IPCJUL as aipcjul,A.IPCAGO as aipcago,A.IPCSEP as aipcsep,A.IPCOCT as aipcoct,A.IPCNOV as aipcnov,
				A.IPCDIC as aipcdic,A.STAIPC as astaipc FROM BNIPCACT A WHERE  
				RTRIM(A.ANOIPC) >= RTRIM('".$this->anoipc1."') AND RTRIM(A.ANOIPC) <= RTRIM('".$this->anoipc2."') ORDER BY A.ANOIPC"; 	
						 
									
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(false,32);			
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="AÑO";
				$this->titulos[1]="Ene.";
				$this->titulos[2]="Feb.";
				$this->titulos[3]="Mar.";
				$this->titulos[4]="Abr.";
				$this->titulos[5]="May.";
				$this->titulos[6]="Jun.";
				$this->titulos[7]="Jul.";
				$this->titulos[8]="Ago.";
				$this->titulos[9]="Sep.";
				$this->titulos[10]="Oct.";
				$this->titulos[11]="Nov.";
				$this->titulos[12]="Dic.";								
	
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln(); 
			$this->Line(10,50,270,50);
		}
		
				
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

//			if(!$tb->EOF)
	//		{
			while(!$tb->EOF)
			{
	
				$this->setFont("Arial","",8); 
				 $this->cell($this->anchos[0],7,$tb->fields["aanoipc"]);
				 $this->cell($this->anchos[1],7,$tb->fields["aipcene"]);
				 $this->cell($this->anchos[2],7,$tb->fields["aipcfeb"]);
				 $this->cell($this->anchos[3],7,$tb->fields["aipcmar"]);
				 $this->cell($this->anchos[4],7,$tb->fields["aipcabr"]);
				 $this->cell($this->anchos[5],7,$tb->fields["aipcmay"]);				 
				 $this->cell($this->anchos[6],7,$tb->fields["aipcjun"]);
				 $this->cell($this->anchos[7],7,$tb->fields["aipcjul"]);
				 $this->cell($this->anchos[8],7,$tb->fields["aipcago"]);
				 $this->cell($this->anchos[9],7,$tb->fields["aipcsep"]);
				 $this->cell($this->anchos[10],7,$tb->fields["aipcoct"]);
				 $this->cell($this->anchos[11],7,$tb->fields["aipcnov"]);
				 $this->cell($this->anchos[12],7,$tb->fields["aipcdic"]);				 				 				 
				 $this->ln();
				 $tb->MoveNext();
				}

		//	}	
		}
		
		
	}
?>