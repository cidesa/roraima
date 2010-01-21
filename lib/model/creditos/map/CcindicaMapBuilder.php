<?php



class CcindicaMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcindicaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccindica');
		$tMap->setPhpName('Ccindica');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccindica_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMIND', 'Nomind', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('FORMULA', 'Formula', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('OPERANDOS', 'Operandos', 'string', CreoleTypes::VARCHAR, true, null);

	} 
} 