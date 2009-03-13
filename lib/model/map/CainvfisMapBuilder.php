<?php



class CainvfisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CainvfisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cainvfis');
		$tMap->setPhpName('Cainvfis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cainvfis_SEQ');

		$tMap->addColumn('FECINV', 'Fecinv', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('EXIACT', 'Exiact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EXIACT2', 'Exiact2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 