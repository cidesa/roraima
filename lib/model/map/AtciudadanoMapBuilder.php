<?php



class AtciudadanoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtciudadanoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atciudadano');
		$tMap->setPhpName('Atciudadano');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atciudadano_SEQ');

		$tMap->addColumn('CEDCIU', 'Cedciu', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('APECIU', 'Apeciu', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NACCIU', 'Nacciu', 'string', CreoleTypes::VARCHAR, true, 50);

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

		$tMap->addColumn('PROCIU', 'Prociu', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addForeignKey('ATESTADOS_ID', 'AtestadosId', 'int', CreoleTypes::INTEGER, 'atestados', 'ID', false, null);

		$tMap->addForeignKey('ATMUNICIPIOS_ID', 'AtmunicipiosId', 'int', CreoleTypes::INTEGER, 'atmunicipios', 'ID', false, null);

		$tMap->addForeignKey('ATPARROQUIAS_ID', 'AtparroquiasId', 'int', CreoleTypes::INTEGER, 'atparroquias', 'ID', false, null);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CASERIO', 'Caserio', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRHAB', 'Dirhab', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRTRA', 'Dirtra', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CONCOMCIU', 'Concomciu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CARCONCOMCIU', 'Carconcomciu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOTA', 'Nota', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('GRAINS', 'Grains', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TRACIU', 'Traciu', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addForeignKey('ATTIPING_ID', 'AttipingId', 'int', CreoleTypes::INTEGER, 'attiping', 'ID', false, null);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('ATINSREFIER_ID', 'AtinsrefierId', 'int', CreoleTypes::INTEGER, 'atinsrefier', 'ID', false, null);

		$tMap->addColumn('AYUSOLANT', 'Ayusolant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('INSAYUANT', 'Insayuant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SEGPRI', 'Segpri', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addForeignKey('ATTIPPROVIV_ID', 'AttipprovivId', 'int', CreoleTypes::INTEGER, 'attipproviv', 'ID', false, null);

		$tMap->addForeignKey('ATTIPVIV_ID', 'AttipvivId', 'int', CreoleTypes::INTEGER, 'attipviv', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 