<?php



class AtdonacionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtdonacionesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdonaciones');
		$tMap->setPhpName('Atdonaciones');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdonaciones_SEQ');

		$tMap->addColumn('CODDON', 'Coddon', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESDON', 'Desdon', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('UNIDON', 'Unidon', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 