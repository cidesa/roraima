<?php



class CacroconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CacroconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cacrocon');
		$tMap->setPhpName('Cacrocon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cacrocon_SEQ');

		$tMap->addColumn('ORDCON', 'Ordcon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NROPAG', 'Nropag', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORMON', 'Pormon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORAMO', 'Poramo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 