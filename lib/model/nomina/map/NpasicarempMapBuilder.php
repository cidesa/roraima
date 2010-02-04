<?php



class NpasicarempMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpasicarempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasicaremp');
		$tMap->setPhpName('Npasicaremp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasicaremp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('FECASI', 'Fecasi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 510);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NOMNOM', 'Nomnom', 'string', CreoleTypes::VARCHAR, false, 290);

		$tMap->addColumn('NOMCAT', 'Nomcat', 'string', CreoleTypes::VARCHAR, false, 400);

		$tMap->addColumn('UNIEJE', 'Unieje', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('SUELDO', 'Sueldo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NRONOM', 'Nronom', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('MONTONOMINA', 'Montonomina', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTIPGAS', 'Codtipgas', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('GRADO', 'Grado', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('PASO', 'Paso', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODTIPDED', 'Codtipded', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTIPCAT', 'Codtipcat', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMOTCAMCAR', 'Codmotcamcar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 