<?php



class NpconceptosprimaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpconceptosprimaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npconceptosprima');
		$tMap->setPhpName('Npconceptosprima');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npconceptosprima_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 