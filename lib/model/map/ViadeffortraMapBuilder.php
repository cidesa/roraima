<?php



class ViadeffortraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadeffortraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadeffortra');
		$tMap->setPhpName('Viadeffortra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadeffortra_SEQ');

		$tMap->addColumn('CODFORTRA', 'Codfortra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESFORTRA', 'Desfortra', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODTIPTRA', 'Codtiptra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 