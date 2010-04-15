<?php



class ViaregenteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaregenteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaregente');
		$tMap->setPhpName('Viaregente');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaregente_SEQ');

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESENTE', 'Desente', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NACENT', 'Nacent', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TIPENT', 'Tipent', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ACTPRO', 'Actpro', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DIRENTE', 'Dirente', 'string', CreoleTypes::VARCHAR, false, 254);

		$tMap->addColumn('TELENTE', 'Telente', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CORENTE', 'Corente', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ACTECOENTE', 'Actecoente', 'string', CreoleTypes::VARCHAR, false, 254);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 