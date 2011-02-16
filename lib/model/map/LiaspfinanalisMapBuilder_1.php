<?php



class LiaspfinanalisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiaspfinanalisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liaspfinanalis');
		$tMap->setPhpName('Liaspfinanalis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liaspfinanalis_SEQ');

		$tMap->addForeignKey('LIREGLIC_ID', 'LireglicId', 'int', CreoleTypes::INTEGER, 'lireglic', 'ID', true, null);

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addForeignKey('LIASPFINCRIEVA_ID', 'LiaspfincrievaId', 'int', CreoleTypes::INTEGER, 'liaspfincrieva', 'ID', true, null);

		$tMap->addColumn('PUNTAJE', 'Puntaje', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 