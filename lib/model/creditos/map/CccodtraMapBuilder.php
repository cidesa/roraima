<?php



class CccodtraMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccodtraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccodtra');
		$tMap->setPhpName('Cccodtra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccodtra_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODTRA', 'Codtra', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DESCODTRA', 'Descodtra', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCBANCO_ID', 'CcbancoId', 'int', CreoleTypes::INTEGER, 'ccbanco', 'ID', true, null);

	} 
} 