<?
	function enletras()
	{
		$dia=date('d');
		$mes=date('m');
		$anno=date('Y');
		if($mes==01)
		{
			$mesletras='Enero';
		}
		else if($mes==02)
		{
			$mesletras='Febrero';
		}
		else if($mes==03)
		{
			$mesletras='Marzo';
		}
		else if($mes==04)
		{
			$mesletras='Abril';
		}
		else if($mes==05)
		{
			$mesletras='Mayo';
		}
		else if($mes==06)
		{
			$mesletras='Junio';
		}
		else if($mes==07)
		{
			$mesletras='Julio';
		}
		else if($mes==08)
		{
			$mesletras='Agosto';
		}
		else if($mes==09)
		{
			$mesletras='Septiembre';
		}
		else if($mes==10)
		{
			$mesletras='Octubre';
		}
		else if($mes==11)
		{
			$mesletras='Noviembre';
		}
		else if($mes==12)
		{
			$mesletras='Diciembre';
		}
		$fecha=$dia.' de '.$mesletras.' de '.$anno;
		return $fecha;
	}
?>