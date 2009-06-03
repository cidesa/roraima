<?php



class CatcarterinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatcarterinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catcarterinm');
		$tMap->setPhpName('Catcarterinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catcarterinm_SEQ');

		$tMap->addForeignKey('CATREGINM_ID', 'CatreginmId', 'int', CreoleTypes::INTEGER, 'catreginm', 'ID', false, null);

		$tMap->addForeignKey('CATCARTER_ID', 'CatcarterId', 'int', CreoleTypes::INTEGER, 'catcarter', 'ID', false, null);

		$tMap->addColumn('DIMENSIONES', 'Dimensiones', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('VALOR', 'Valor', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 