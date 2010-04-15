<?php



class InprofesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InprofesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inprofes');
		$tMap->setPhpName('Inprofes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inprofes_SEQ');

		$tMap->addColumn('VENEXT', 'Venext', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CEDPROF', 'Cedprof', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('NOMPROF', 'Nomprof', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('APEPROF', 'Apeprof', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NACPROF', 'Nacprof', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LUGNAC', 'Lugnac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIRNAC', 'Dirnac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ESTCIV', 'Estciv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TELHAB', 'Telhab', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TELCEL', 'Telcel', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addForeignKey('INESTADO_ID', 'InestadoId', 'int', CreoleTypes::INTEGER, 'inestado', 'ID', false, null);

		$tMap->addForeignKey('INMUNICIPIO_ID', 'InmunicipioId', 'int', CreoleTypes::INTEGER, 'inmunicipio', 'ID', false, null);

		$tMap->addForeignKey('INPARROQUIA_ID', 'InparroquiaId', 'int', CreoleTypes::INTEGER, 'inparroquia', 'ID', false, null);

		$tMap->addForeignKey('INESPECI_ID', 'InespeciId', 'int', CreoleTypes::INTEGER, 'inespeci', 'ID', false, null);

		$tMap->addColumn('DIRHAB', 'Dirhab', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPOST', 'Codpost', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 