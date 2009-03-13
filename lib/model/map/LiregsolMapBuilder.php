<?php



class LiregsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiregsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liregsol');
		$tMap->setPhpName('Liregsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liregsol_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addForeignKey('LIDATSTE_ID', 'LidatsteId', 'int', CreoleTypes::INTEGER, 'lidatste', 'ID', true, null);

		$tMap->addForeignKey('LITIPSOL_ID', 'LitipsolId', 'int', CreoleTypes::INTEGER, 'litipsol', 'ID', true, null);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSSOL', 'Obssol', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addForeignKey('LICOMLIC_ID', 'LicomlicId', 'int', CreoleTypes::INTEGER, 'licomlic', 'ID', false, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 