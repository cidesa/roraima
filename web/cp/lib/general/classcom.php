<?
class classcom
{
	var $codigo;
	var $descripcion;
	var $fecha;
	var $tipcom;
	var $asientos=array(0 => array("cuenta" => " ","descripcion" => " ","referencia" => " ","debecre" => " ","monasi" => 0));
	var $numAsientos;
	var $sql;
	var $contabb;
	function inicializar()
	{
		$this->numAsientos=0;
	}
	function classcom()
	{
	}
	function parametrosComprobante($cod,$desc,$fec,$tip)
	{
		$this->codigo=$cod;
		$this->descripcion=$desc;
		$this->fecha=$fec;
		$this->tipcom=$tip;
	}
	function incluirAsiento($pCuenta,$pDescripcion,$pReferencia,$pDebCre,$pMonAsi)
	{
		$ind;
		$enc;
		
   		$enc = false;
   		$ind = 0;
   		while(($ind < $this->numAsientos)&&(!$enc))
		{
      		if(($this->asientos[$ind]["cuenta"] == $pCuenta)&&($this->asientos[$ind]["debecre"] == $pDebCre))
			{
         		$enc = true;
      		}
			else
			{
         		$ind = $ind + 1;
      		}
   		}

   		if(!$enc)
		{
      		$this->asientos[$this->numAsientos]["cuenta"] =str_pad($pCuenta,32,' ',STR_PAD_RIGHT);
      		$this->asientos[$this->numAsientos]["descripcion"] = $pDescripcion;
      		$this->asientos[$this->numAsientos]["referencia"] = $pReferencia;
      		$this->asientos[$this->numAsientos]["debecre"] = $pDebCre;
      		$this->asientos[$this->numAsientos]["monasi"] = $pMonAsi;
      		$this->numAsientos = $this->numAsientos + 1;
   		}
		else
		{
     		$this->asientos[$ind]["monasi"] = $this->asientos[$ind]["monasi"] + $pMonAsi;
   		}
	}
	function cargarComprobante()
	{
		
		$pagina="../../presupuesto/relacion/comprobante.php?codigo=".$this->codigo."&desc=".$this->descripcion."&fecha=".$this->fecha."&tip_com=".$this->tipcom;
		for($i=0;$i<=$this->numAsientos - 1;$i++)
		{
			$pagina=$pagina."&cuenta".$i."=".$this->asientos[$i]["cuenta"]."&desc".$i."=".$this->asientos[$i]["descripcion"]."&refere".$i."=".$this->asientos[$i]["referencia"]."&debe".$i."=".$this->asientos[$i]["debecre"]."&monto".$i."=".$this->asientos[$i]["monasi"];
		}
		$pagina=$pagina."&cont=".$this->numAsientos;
		?>
		<script>
			pagina='<?=$pagina;?>';
			//alert(pagina);
			//pagina='../../aplicaciones/presupuesto/comprobante.php?codigo='+codigo+"&cuenta="+cuenta1;
			window.open(pagina,'Comprobante','menubar=no,toolbar=no,scrollbars=no,width=600,height=460,rezizable=no,left=100,top=200');
		</script>
	 <?
	}
}
?>