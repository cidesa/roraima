<?php



class LirecomendetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LirecomendetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lirecomendet');
		$tMap->setPhpName('Lirecomendet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lirecomendet_SEQ');

		$tMap->addColumn('NUMRECOFE', 'Numrecofe', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PUNLEG', 'Punleg', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNTEC', 'Puntec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNFIN', 'Punfin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNFIA', 'Punfia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNTIPEMP', 'Puntipemp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNVAN', 'Punvan', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNMIN', 'Punmin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNTOT', 'Puntot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 