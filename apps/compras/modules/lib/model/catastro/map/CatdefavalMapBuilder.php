<?php



class CatdefavalMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatdefavalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catdefaval');
		$tMap->setPhpName('Catdefaval');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catdefaval_SEQ');

		$tMap->addColumn('CODDIVGEO', 'Coddivgeo', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('NROCAS', 'Nrocas', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECAVAL', 'Fecaval', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 