<?php



class FordefparingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefparingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefparing');
		$tMap->setPhpName('Fordefparing');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefparing_SEQ');

		$tMap->addColumn('CODPARING', 'Codparing', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NOMPARING', 'Nomparing', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('ESTANT', 'Estant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTANTAJU', 'Estantaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BASCAL', 'Bascal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 