<?php



class InempresaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InempresaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inempresa');
		$tMap->setPhpName('Inempresa');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inempresa_SEQ');

		$tMap->addColumn('RIFEMP', 'Rifemp', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('RAZSOC', 'Razsoc', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addForeignKey('INTIPEMP_ID', 'IntipempId', 'int', CreoleTypes::INTEGER, 'intipemp', 'ID', false, null);

		$tMap->addForeignKey('INESTADO_ID', 'InestadoId', 'int', CreoleTypes::INTEGER, 'inestado', 'ID', false, null);

		$tMap->addForeignKey('INMUNICIPIO_ID', 'InmunicipioId', 'int', CreoleTypes::INTEGER, 'inmunicipio', 'ID', false, null);

		$tMap->addForeignKey('INPARROQUIA_ID', 'InparroquiaId', 'int', CreoleTypes::INTEGER, 'inparroquia', 'ID', false, null);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPOST', 'Codpost', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDREPLEG', 'Cedrepleg', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('VENEXTREPLEG', 'Venextrepleg', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NOMREPLEG', 'Nomrepleg', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('APEREPLEG', 'Aperepleg', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTCIV', 'Estciv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TELHAB', 'Telhab', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TELCEL', 'Telcel', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('EMAILREPLEG', 'Emailrepleg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 