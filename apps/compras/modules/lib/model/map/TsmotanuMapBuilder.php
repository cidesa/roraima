<?php



class TsmotanuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsmotanuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsmotanu');
		$tMap->setPhpName('Tsmotanu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsmotanu_SEQ');

		$tMap->addColumn('CODMOTANU', 'Codmotanu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESMOTANU', 'Desmotanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 