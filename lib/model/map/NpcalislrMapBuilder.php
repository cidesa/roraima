<?php



class NpcalislrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcalislrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcalislr');
		$tMap->setPhpName('Npcalislr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcalislr_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MESPER', 'Mesper', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('ANOPER', 'Anoper', 'double', CreoleTypes::NUMERIC, true, 4);

		$tMap->addColumn('REMUNE', 'Remune', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IMPRET', 'Impret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 