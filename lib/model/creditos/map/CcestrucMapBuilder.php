<?php



class CcestrucMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcestrucMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccestruc');
		$tMap->setPhpName('Ccestruc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccestruc_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMESTRUC', 'Nomestruc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DESESTRUC', 'Desestruc', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 