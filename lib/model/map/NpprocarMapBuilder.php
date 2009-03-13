<?php



class NpprocarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpprocarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npprocar');
		$tMap->setPhpName('Npprocar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npprocar_SEQ');

		$tMap->addForeignKey('CODPROFES', 'Codprofes', 'string', CreoleTypes::VARCHAR, 'npprofesion', 'CODPROFES', true, 4);

		$tMap->addForeignKey('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, 'npcargos', 'CODCAR', true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 