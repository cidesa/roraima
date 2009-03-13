<?php



class AtsoliciMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtsoliciMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atsolici');
		$tMap->setPhpName('Atsolici');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atsolici_SEQ');

		$tMap->addColumn('CEDSOL', 'Cedsol', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('NOMSOL', 'Nomsol', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('APESOL', 'Apesol', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NACSOL', 'Nacsol', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONEXT', 'Conext', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LUGNAC', 'Lugnac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIRNAC', 'Dirnac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ESTCIV', 'Estciv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TELHAB', 'Telhab', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TELADIHAB', 'Teladihab', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('PROSOL', 'Prosol', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addForeignKey('ATESTADOS_ID', 'AtestadosId', 'int', CreoleTypes::INTEGER, 'atestados', 'ID', false, null);

		$tMap->addForeignKey('ATMUNICIPIOS_ID', 'AtmunicipiosId', 'int', CreoleTypes::INTEGER, 'atmunicipios', 'ID', false, null);

		$tMap->addForeignKey('ATPARROQUIAS_ID', 'AtparroquiasId', 'int', CreoleTypes::INTEGER, 'atparroquias', 'ID', false, null);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CASERIO', 'Caserio', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRHAB', 'Dirhab', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRTRA', 'Dirtra', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CONCOMSOL', 'Concomsol', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARCONCOMSOL', 'Carconcomsol', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOTA', 'Nota', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('GRAINS', 'Grains', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TRASOL', 'Trasol', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TIPING', 'Tiping', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 