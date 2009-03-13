<?php



class NpmovracMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpmovracMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmovrac');
		$tMap->setPhpName('Npmovrac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmovrac_SEQ');

		$tMap->addColumn('NRONOM', 'Nronom', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('PERRAC', 'Perrac', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ANORAC', 'Anorac', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECMOV', 'Fecmov', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODCARAPR', 'Codcarapr', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMCARAPR', 'Nomcarapr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SUECARAPR', 'Suecarapr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COMCARAPR', 'Comcarapr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODOCPAPR', 'Codocpapr', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PASOCPAPR', 'Pasocpapr', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMPAPR', 'Codempapr', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMEMPAPR', 'Nomempapr', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODCATAPR', 'Codcatapr', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('ESTORGAPR', 'Estorgapr', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCARPRO', 'Codcarpro', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMCARPRO', 'Nomcarpro', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SUECARPRO', 'Suecarpro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COMCARPRO', 'Comcarpro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODOCPPRO', 'Codocppro', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PASOCPPRO', 'Pasocppro', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMPPRO', 'Codemppro', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMEMPPRO', 'Nomemppro', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODCATPRO', 'Codcatpro', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('ESTORGPRO', 'Estorgpro', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 