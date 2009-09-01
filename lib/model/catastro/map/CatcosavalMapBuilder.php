<?php



class CatcosavalMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatcosavalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catcosaval');
		$tMap->setPhpName('Catcosaval');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catcosaval_SEQ');

		$tMap->addColumn('CODDIVGEO', 'Coddivgeo', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addForeignKey('CATUSOESP_ID', 'CatusoespId', 'int', CreoleTypes::INTEGER, 'catusoesp', 'ID', true, null);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('COSTO', 'Costo', 'double', CreoleTypes::NUMERIC, true, 12);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 