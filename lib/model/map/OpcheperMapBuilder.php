<?php



class OpcheperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpcheperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opcheper');
		$tMap->setPhpName('Opcheper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opcheper_SEQ');

		$tMap->addColumn('REFOPP', 'Refopp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFCUO', 'Refcuo', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 