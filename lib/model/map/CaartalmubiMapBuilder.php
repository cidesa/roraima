<?php



class CaartalmubiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaartalmubiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caartalmubi');
		$tMap->setPhpName('Caartalmubi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caartalmubi_SEQ');

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addForeignKey('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, 'cadefubi', 'CODUBI', true, 20);

		$tMap->addColumn('EXIACT', 'Exiact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 