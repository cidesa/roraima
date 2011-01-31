<?php



class CcdebcueresMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdebcueresMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdebcueres');
		$tMap->setPhpName('Ccdebcueres');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdebcueres_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCDEBCUE_ID', 'CcdebcueId', 'int', CreoleTypes::INTEGER, 'ccdebcue', 'ID', true, null);

		$tMap->addForeignKey('CCRESPUE_ID', 'CcrespueId', 'int', CreoleTypes::INTEGER, 'ccrespue', 'ID', true, null);

	} 
} 