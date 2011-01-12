<?php



class CcperbenMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcperbenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccperben');
		$tMap->setPhpName('Ccperben');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccperben_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPERBEN', 'Nomperben', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CEDPERBEN', 'Cedperben', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DIRPERBEN', 'Dirperben', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELPERBEN', 'Telperben', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CELULAR', 'Celular', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('SEXPERBEN', 'Sexperben', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCCARGO_ID', 'CccargoId', 'int', CreoleTypes::INTEGER, 'cccargo', 'ID', true, null);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

	} 
} 