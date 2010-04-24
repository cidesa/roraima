<?php



class FaestadoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaestadoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faestado');
		$tMap->setPhpName('Faestado');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faestado_SEQ');

		$tMap->addForeignKey('FAPAIS_ID', 'FapaisId', 'int', CreoleTypes::INTEGER, 'fapais', 'ID', false, null);

		$tMap->addColumn('NOMEDO', 'Nomedo', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 