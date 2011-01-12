<?php



class CcvariabMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcvariabMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccvariab');
		$tMap->setPhpName('Ccvariab');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccvariab_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMVAR', 'Nomvar', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('VALOR', 'Valor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ABREVI', 'Abrevi', 'string', CreoleTypes::VARCHAR, true, 10);

	} 
} 