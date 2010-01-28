<?php



class OpretordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpretordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opretord');
		$tMap->setPhpName('Opretord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opretord_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addForeignKey('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, 'optipret', 'CODTIP', true, 3);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMRET', 'Numret', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORREL', 'Correl', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('MONBAS', 'Monbas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 