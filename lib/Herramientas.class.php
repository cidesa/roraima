<?php

class Herramientas
{
	public function BuscarDatos($sql, &$output)
	{
		$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$stmt = $con->createStatement();
		$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$i = pg_num_fields($rs->getResource());
		//print $i;
		$fieldname = array();
		$result = array();
		$output = array();
		for ($j = 0; $j < $i; $j++)
		{
			$fieldname[]  = pg_field_name($rs->getResource(),$j);
		}
		while ($rs->next())
		{
			while ($a <= $i)
			{
				$fila = $rs->getRow();
				$a++;
				$result += array($fieldname[$a] => $fila[$a]);
			}
			$output += array($result);
		}
		return $this->output;
	}
}

