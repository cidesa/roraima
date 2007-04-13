<?php

class Herramientas
{
	public static function BuscarDatos($sql,&$rg,$numbr=false)
	// no esta terminada todavia
	//BuscarDatos($sql,&$rg,true);
	//$sql=la tira sql
	//$rg=trae true si encontro registros
	//true= dice si queremos traajar los campos con [n][n], si esta en false sera [n][nombre del campo] donde n es un indice
	{
		$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$stmt = $con->createStatement();
		$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$i = pg_num_fields($rs->getResource());
		$fieldname = array();
		$result = array();
		$output = array();
		if ($numbr)
		{
			for ($j = 0; $j < $i; $j++)
			{
				$fieldname[]  = pg_field_name($rs->getResource(),$j);
			}
		}
		else
		{
			for ($j = 0; $j < $i; $j++)
			{
				$fieldname[]  = pg_field_name($rs->getResource(),$j);
			}
		}
		$b=0;
		while ($rs->next())
		{
			$a=0;
			while ($a < $i)
			{
				$fila = $rs->getRow();
				$result[$fieldname[$a]] = $fila[$a];
				$a++;
			}
			$output[] = $result;
		}
		//print $output[0]['codemp'];
		if (count($rs)>0) 
		{
		    $rg = true;
		}
		else
		{
			$rg = false;
		}
		return $output;
	}
}

