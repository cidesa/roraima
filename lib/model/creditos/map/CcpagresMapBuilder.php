<?php



class CcpagresMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcpagresMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccpagres');
		$tMap->setPhpName('Ccpagres');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccpagres_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DETRES', 'Detres', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addForeignKey('CCPAGO_ID', 'CcpagoId', 'int', CreoleTypes::INTEGER, 'ccpago', 'ID', true, null);

		$tMap->addForeignKey('CCRESPUE_ID', 'CcrespueId', 'int', CreoleTypes::INTEGER, 'ccrespue', 'ID', true, null);

	} 
} 