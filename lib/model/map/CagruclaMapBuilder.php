<?php



class CagruclaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CagruclaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cagrucla');
		$tMap->setPhpName('Cagrucla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cagrucla_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESGRU', 'Desgru', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 