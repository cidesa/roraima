<?php



class OcofeservalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcofeservalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocofeserval');
		$tMap->setPhpName('Ocofeserval');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocofeserval_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMVAL', 'Numval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODTIPVAL', 'Codtipval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODTIPPRO', 'Codtippro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NIVPRO', 'Nivpro', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('EXPPRO', 'Exppro', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 