<?php



class NptipespMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipespMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipesp');
		$tMap->setPhpName('Nptipesp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipesp_SEQ');

		$tMap->addColumn('CODTIPESP', 'Codtipesp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPESP', 'Destipesp', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 