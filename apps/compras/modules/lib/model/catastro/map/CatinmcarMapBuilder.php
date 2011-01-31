<?php



class CatinmcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatinmcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catinmcar');
		$tMap->setPhpName('Catinmcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catinmcar_SEQ');

		$tMap->addForeignKey('CATCARINM_ID', 'CatcarinmId', 'int', CreoleTypes::INTEGER, 'catcarinm', 'ID', false, null);

		$tMap->addColumn('CANCAR', 'Cancar', 'double', CreoleTypes::NUMERIC, true, 4);

		$tMap->addColumn('METARE', 'Metare', 'double', CreoleTypes::NUMERIC, true, 12);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 