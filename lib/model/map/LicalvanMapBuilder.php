<?php



class LicalvanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LicalvanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('licalvan');
		$tMap->setPhpName('Licalvan');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('licalvan_SEQ');

		$tMap->addForeignKey('LIREGLIC_ID', 'LireglicId', 'int', CreoleTypes::INTEGER, 'lireglic', 'ID', true, null);

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('VANDECLA', 'Vandecla', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VANMAYOR', 'Vanmayor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VANPREFER', 'Vanprefer', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREADIPYM', 'Preadipym', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREPORTOT', 'Preportot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREEVAOFE', 'Preevaofe', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREAJUSTA', 'Preajusta', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 