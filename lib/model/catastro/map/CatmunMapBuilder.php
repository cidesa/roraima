<?php



class CatmunMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatmunMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catmun');
		$tMap->setPhpName('Catmun');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catmun_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CATCIU_ID', 'CatciuId', 'int', CreoleTypes::INTEGER, 'catciu', 'ID', false, null);

		$tMap->addForeignKey('CATEST_ID', 'CatestId', 'int', CreoleTypes::INTEGER, 'catest', 'ID', false, null);

		$tMap->addColumn('NOMMUN', 'Nommun', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ALIMUN', 'Alimun', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 