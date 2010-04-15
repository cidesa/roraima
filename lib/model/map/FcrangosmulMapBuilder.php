<?php



class FcrangosmulMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrangosmulMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcrangosmul');
		$tMap->setPhpName('Fcrangosmul');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcrangosmul_SEQ');

		$tMap->addColumn('CODMUL', 'Codmul', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIASDESDE', 'Diasdesde', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('DIASHASTA', 'Diashasta', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('VALOR', 'Valor', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 