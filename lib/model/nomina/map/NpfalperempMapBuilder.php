<?php



class NpfalperempMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpfalperempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npfalperemp');
		$tMap->setPhpName('Npfalperemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npfalperemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECRET', 'Fecret', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('HORAS', 'Horas', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('CODMOT', 'Codmot', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('IVSS', 'Ivss', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 