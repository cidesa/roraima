<?php



class CobtipdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobtipdesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobtipdes');
		$tMap->setPhpName('Cobtipdes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobtipdes_SEQ');

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESDES', 'Desdes', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('TIPDES', 'Tipdes', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('VALDES', 'Valdes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DIADES', 'Diades', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ESTRET', 'Estret', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 