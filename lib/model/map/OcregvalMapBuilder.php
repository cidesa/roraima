<?php



class OcregvalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcregvalMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('ocregval');
		$tMap->setPhpName('Ocregval');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocregval_SEQ');

		$tMap->addColumn('MONVAL', 'Monval', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('SALLIQ', 'Salliq', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('RETACU', 'Retacu', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('AMOANT', 'Amoant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAVAL', 'Staval', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PORIVA', 'Poriva', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORANT', 'Porant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALANT', 'Salant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('GASREE', 'Gasree', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONFUL', 'Monful', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONFIA', 'Monfia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONANT', 'Monant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPERIVA', 'Monperiva', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMVAL', 'Numval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODTIPVAL', 'Codtipval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('AUMOBR', 'Aumobr', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DISOBR', 'Disobr', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('OBREXT', 'Obrext', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONPER', 'Monper', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('TOTDED', 'Totded', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('OBSVAL', 'Obsval', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 