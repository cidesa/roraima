<?php



class CatcarconinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatcarconinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catcarconinm');
		$tMap->setPhpName('Catcarconinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catcarconinm_SEQ');

		$tMap->addForeignKey('CATREGINM_ID', 'CatreginmId', 'int', CreoleTypes::INTEGER, 'catreginm', 'ID', false, null);

		$tMap->addForeignKey('CATCARCON_ID', 'CatcarconId', 'int', CreoleTypes::INTEGER, 'catcarcon', 'ID', false, null);

		$tMap->addColumn('CANCAR', 'Cancar', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('METARE', 'Metare', 'double', CreoleTypes::NUMERIC, true, 12);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 