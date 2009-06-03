<?php



class CatsubprcMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatsubprcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catsubprc');
		$tMap->setPhpName('Catsubprc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catsubprc_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CATPRC_ID', 'CatprcId', 'int', CreoleTypes::INTEGER, 'catprc', 'ID', false, null);

		$tMap->addForeignKey('CATMAN_ID', 'CatmanId', 'int', CreoleTypes::INTEGER, 'catman', 'ID', false, null);

		$tMap->addForeignKey('CATSEC_ID', 'CatsecId', 'int', CreoleTypes::INTEGER, 'catsec', 'ID', false, null);

		$tMap->addForeignKey('CATPAR_ID', 'CatparId', 'int', CreoleTypes::INTEGER, 'catpar', 'ID', false, null);

		$tMap->addForeignKey('CATMUN_ID', 'CatmunId', 'int', CreoleTypes::INTEGER, 'catmun', 'ID', false, null);

		$tMap->addForeignKey('CATCIU_ID', 'CatciuId', 'int', CreoleTypes::INTEGER, 'catciu', 'ID', false, null);

		$tMap->addForeignKey('CATEST_ID', 'CatestId', 'int', CreoleTypes::INTEGER, 'catest', 'ID', false, null);

		$tMap->addColumn('NOMSUBPRC', 'Nomsubprc', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ALISUBPRC', 'Alisubprc', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 