<?php

class Herramientas
{
	public static function BuscarDatos($sql,$numbr=false)
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
		return $output;
	}
}

