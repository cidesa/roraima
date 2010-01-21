<?php



class CcactecoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcactecoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccacteco');
		$tMap->setPhpName('Ccacteco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccacteco_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMACTECO', 'Nomacteco', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESACTECO', 'Desacteco', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODCIIU', 'Codciiu', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 