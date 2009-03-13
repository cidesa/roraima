<?php



class AtbenefiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtbenefiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atbenefi');
		$tMap->setPhpName('Atbenefi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atbenefi_SEQ');

		$tMap->addColumn('CEDBEN', 'Cedben', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('APEBEN', 'Apeben', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONEXT', 'Conext', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LUGNAC', 'Lugnac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NACBEN', 'Nacben', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DIRNAC', 'Dirnac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ESTCIV', 'Estciv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TELHAB', 'Telhab', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TELADIHAB', 'Teladihab', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('PROBEN', 'Proben', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addForeignKey('ATESTADOS_ID', 'AtestadosId', 'int', CreoleTypes::INTEGER, 'atestados', 'ID', false, null);

		$tMap->addForeignKey('ATMUNICIPIOS_ID', 'AtmunicipiosId', 'int', CreoleTypes::INTEGER, 'atmunicipios', 'ID', false, null);

		$tMap->addForeignKey('ATPARROQUIAS_ID', 'AtparroquiasId', 'int', CreoleTypes::INTEGER, 'atparroquias', 'ID', false, null);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CASERIO', 'Caserio', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRHAB', 'Dirhab', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRTRA', 'Dirtra', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CONCOMBEN', 'Concomben', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARCONCOMBEN', 'Carconcomben', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOTA', 'Nota', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('GRAINS', 'Grains', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TRABEN', 'Traben', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TIPING', 'Tiping', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPVIV', 'Tipviv', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TENVIV', 'Tenviv', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CARVIVSAL', 'Carvivsal', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVCOM', 'Carvivcom', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVHAB', 'Carvivhab', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVCOC', 'Carvivcoc', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVBAN', 'Carvivban', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVPAT', 'Carvivpat', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVAREVER', 'Carvivarever', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVPIS', 'Carvivpis', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVPAR', 'Carvivpar', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('CARVIVTEC', 'Carvivtec', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('ANASOCECO', 'Anasoceco', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('ANAFAM', 'Anafam', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('OTROS', 'Otros', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 