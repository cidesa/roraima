<?php



class CatsecMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatsecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catsec');
		$tMap->setPhpName('Catsec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catsec_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CATPAR_ID', 'CatparId', 'int', CreoleTypes::INTEGER, 'catpar', 'ID', false, null);

		$tMap->addForeignKey('CATMUN_ID', 'CatmunId', 'int', CreoleTypes::INTEGER, 'catmun', 'ID', false, null);

		$tMap->addForeignKey('CATCIU_ID', 'CatciuId', 'int', CreoleTypes::INTEGER, 'catciu', 'ID', false, null);

		$tMap->addForeignKey('CATEST_ID', 'CatestId', 'int', CreoleTypes::INTEGER, 'catest', 'ID', false, null);

		$tMap->addColumn('NOMSEC', 'Nomsec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ALISEC', 'Alisec', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 