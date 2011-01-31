<?php



class CatperinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatperinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catperinm');
		$tMap->setPhpName('Catperinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catperinm_SEQ');

		$tMap->addForeignKey('CATREGINM_ID', 'CatreginmId', 'int', CreoleTypes::INTEGER, 'catreginm', 'ID', false, null);

		$tMap->addForeignKey('CATREGPER_ID', 'CatregperId', 'int', CreoleTypes::INTEGER, 'catregper', 'ID', false, null);

		$tMap->addColumn('CONOCU', 'Conocu', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 