<?php



class CcfiadorMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcfiadorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccfiador');
		$tMap->setPhpName('Ccfiador');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccfiador_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMFIA', 'Nomfia', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CEDFIA', 'Cedfia', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELFIA', 'Telfia', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CELFIA', 'Celfia', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DIRFIA', 'Dirfia', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('PARENT', 'Parent', 'string', CreoleTypes::VARCHAR, false, 70);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

	} 
} 