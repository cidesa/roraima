<?php



class ViadeftiptraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadeftiptraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadeftiptra');
		$tMap->setPhpName('Viadeftiptra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadeftiptra_SEQ');

		$tMap->addColumn('CODTIPTRA', 'Codtiptra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESTIPTRA', 'Destiptra', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 