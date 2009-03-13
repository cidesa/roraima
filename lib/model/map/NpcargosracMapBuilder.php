<?php



class NpcargosracMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcargosracMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcargosrac');
		$tMap->setPhpName('Npcargosrac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcargosrac_SEQ');

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('SUECAR', 'Suecar', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('STACAR', 'Stacar', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODOCP', 'Codocp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('PUNMIN', 'Punmin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('GRAOCP', 'Graocp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('COMCAR', 'Comcar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PASOCP', 'Pasocp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECCAR', 'Feccar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NRONOM', 'Nronom', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('ESTORG', 'Estorg', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('ANORAC', 'Anorac', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 