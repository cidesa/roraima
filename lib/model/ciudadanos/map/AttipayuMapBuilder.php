<?php



class AttipayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AttipayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('attipayu');
		$tMap->setPhpName('Attipayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('attipayu_SEQ');

		$tMap->addColumn('CODAYU', 'Codayu', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESAYU', 'Desayu', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 