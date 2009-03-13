<?php



class InarticuloMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InarticuloMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inarticulo');
		$tMap->setPhpName('Inarticulo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inarticulo_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 