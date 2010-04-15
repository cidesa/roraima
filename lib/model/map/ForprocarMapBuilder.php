<?php



class ForprocarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForprocarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forprocar');
		$tMap->setPhpName('Forprocar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forprocar_SEQ');

		$tMap->addForeignKey('CODPROFES', 'Codprofes', 'string', CreoleTypes::VARCHAR, 'npprofesion', 'CODPROFES', true, 4);

		$tMap->addForeignKey('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, 'forcargos', 'CODCAR', true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 