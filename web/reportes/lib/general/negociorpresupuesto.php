<?
 require_once("../../lib/bd/basedatosAdo.php");
 
 class negociorpresupuesto
 {
    var $bd2;
	var $lonpre;
	var $loncat;
	var $nomcat;
	var $nompre;
	var $nompar;
	var $formatopre;
	function negociorpresupuesto()
	{
	  $this->bd2=new basedatosAdo();
	   $this->lonpre=32;
	   $this->loncat=32;
	   $this->nomcat="";
	   $this->nompre="";
	   $this->nompar="";
	   $tb=$this->bd2->select("select * from cpdefniv where codemp='001';");
	   $this->lonpre=$tb->fields["loncod"]; 
	   $tb->close();  
	} 
	
	function nombrecodigo($codigopre)
	{
	  // $tb=$this->bd->select("select max(nompre) as nompre from cpdeftit where codpre=rpad('".$codigopre."',".$this->lonpre.",' ');");
	   $tb=$this->bd2->select("select max(nompre) as nompre from cpdeftit where trim(codpre)=trim('".$codigopre."');");
	   //print "select max(nompre) as nompre from cpdeftit where codpre=rpad('".$codigopre."',".$this->lonpre.",' ');";
	   $this->nompre=$tb->fields["nompre"]; 
	   $tb->close();  
	   return $this->nompre;
	}
 }
?>