<?php



class CcagenciMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcagenciMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccagenci');
		$tMap->setPhpName('Ccagenci');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccagenci_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODAGE', 'Codage', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DIRAGE', 'Dirage', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELAGE', 'Telage', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELAGE2', 'Telage2', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FAXAGE', 'Faxage', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL2', 'Codaretel2', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODAREFAX', 'Codarefax', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCBANCO_ID', 'CcbancoId', 'int', CreoleTypes::INTEGER, 'ccbanco', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

	} 
} 