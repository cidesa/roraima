<?php



class NpdefcptMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefcptMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefcpt');
		$tMap->setPhpName('Npdefcpt');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefcpt_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('OPECON', 'Opecon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ACUHIS', 'Acuhis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('INIMON', 'Inimon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CONACT', 'Conact', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('IMPCPT', 'Impcpt', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ORDPAG', 'Ordpag', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEPRE', 'Afepre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FRECON', 'Frecon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NROCTA', 'Nrocta', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
