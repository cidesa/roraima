<?php



class NpvacdisfruteMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacdisfruteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacdisfrute');
		$tMap->setPhpName('Npvacdisfrute');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacdisfrute_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PERINI', 'Perini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PERFIN', 'Perfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIASDISFUTAR', 'Diasdisfutar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASDISFRUTADOS', 'Diasdisfrutados', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASBONOVAC', 'Diasbonovac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASBONOVACPAG', 'Diasbonovacpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 