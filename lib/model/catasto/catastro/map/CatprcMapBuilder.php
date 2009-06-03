<?php



class CatprcMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatprcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catprc');
		$tMap->setPhpName('Catprc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catprc_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CATSEC_ID', 'CatsecId', 'int', CreoleTypes::INTEGER, 'catsec', 'ID', false, null);

		$tMap->addForeignKey('CATPAR_ID', 'CatparId', 'int', CreoleTypes::INTEGER, 'catpar', 'ID', false, null);

		$tMap->addForeignKey('CATMUN_ID', 'CatmunId', 'int', CreoleTypes::INTEGER, 'catmun', 'ID', false, null);

		$tMap->addForeignKey('CATCIU_ID', 'CatciuId', 'int', CreoleTypes::INTEGER, 'catciu', 'ID', false, null);

		$tMap->addForeignKey('CATEST_ID', 'CatestId', 'int', CreoleTypes::INTEGER, 'catest', 'ID', false, null);

		$tMap->addColumn('NOMPRC', 'Nomprc', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ALIPRC', 'Aliprc', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 