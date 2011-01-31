<?php



class AtestadosMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtestadosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atestados');
		$tMap->setPhpName('Atestados');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atestados_SEQ');

		$tMap->addColumn('DESEST', 'Desest', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 