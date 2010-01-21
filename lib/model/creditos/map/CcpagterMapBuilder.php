<?php



class CcpagterMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcpagterMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccpagter');
		$tMap->setPhpName('Ccpagter');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccpagter_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTER', 'Nomter', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('RIFTER', 'Rifter', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELTER', 'Telter', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DIRTEL', 'Dirtel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCACTECO_ID', 'CcactecoId', 'int', CreoleTypes::INTEGER, 'ccacteco', 'ID', false, null);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

		$tMap->addForeignKey('CCTIPUPS_ID', 'CctipupsId', 'int', CreoleTypes::INTEGER, 'cctipups', 'ID', false, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', false, null);

	} 
} 