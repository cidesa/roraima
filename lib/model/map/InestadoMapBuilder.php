<?php



class InestadoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InestadoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inestado');
		$tMap->setPhpName('Inestado');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inestado_SEQ');

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEDO', 'Nomedo', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 