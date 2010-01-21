<?php



class CcanalisMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcanalisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccanalis');
		$tMap->setPhpName('Ccanalis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccanalis_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CEDANA', 'Cedana', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NOMANA', 'Nomana', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('SEXANA', 'Sexana', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELANA', 'Telana', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CELANA', 'Celana', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DIRANA', 'Dirana', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

		$tMap->addForeignKey('CCTIPANA_ID', 'CctipanaId', 'int', CreoleTypes::INTEGER, 'cctipana', 'ID', true, null);

		$tMap->addForeignKey('CCAREGER_ID', 'CcaregerId', 'int', CreoleTypes::INTEGER, 'ccareger', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

	} 
} 