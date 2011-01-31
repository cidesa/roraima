<?php



class CatdetavalMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatdetavalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catdetaval');
		$tMap->setPhpName('Catdetaval');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catdetaval_SEQ');

		$tMap->addForeignKey('CATDEFAVAL_ID', 'CatdefavalId', 'int', CreoleTypes::INTEGER, 'catdefaval', 'ID', false, null);

		$tMap->addForeignKey('CATUSOESP_ID', 'CatusoespId', 'int', CreoleTypes::INTEGER, 'catusoesp', 'ID', true, null);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, true, 12);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 