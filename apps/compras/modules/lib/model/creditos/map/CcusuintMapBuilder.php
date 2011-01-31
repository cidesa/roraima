<?php



class CcusuintMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcusuintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccusuint');
		$tMap->setPhpName('Ccusuint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccusuint_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMUSUINT', 'Nomusuint', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONTRAS', 'Contras', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDUSUINT', 'Cedusuint', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('LOGIN', 'Login', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

	} 
} 