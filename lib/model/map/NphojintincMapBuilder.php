<?php



class NphojintincMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NphojintincMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nphojintinc');
		$tMap->setPhpName('Nphojintinc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nphojintinc_SEQ');

		$tMap->addForeignKey('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, 'nphojint', 'CODEMP', false, 16);

		$tMap->addForeignKey('CODINC', 'Codinc', 'string', CreoleTypes::VARCHAR, 'npincapa', 'CODINC', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 