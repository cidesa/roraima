<?php

class Herramientas
{
	// no esta terminada todavia
	//BuscarDatos($sql,&$output);
	//$sql=la tira sql
	//$$output=trae registros
	public static function BuscarDatos($sql,&$output)
    {
		$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$stmt = $con->createStatement();
		$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$i = pg_num_fields($rs->getResource());
		$fieldname = array();
		$result = array();
		$output = array();
		for ($j = 0; $j < $i; $j++)
			{
				$fieldname[]  = pg_field_name($rs->getResource(),$j);
			}
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
		if (count($rs)>0) return true; else return false;
	}
}

