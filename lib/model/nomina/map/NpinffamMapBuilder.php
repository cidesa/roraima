<?php



class NpinffamMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinffamMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinffam');
		$tMap->setPhpName('Npinffam');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinffam_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CEDFAM', 'Cedfam', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NOMFAM', 'Nomfam', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('SEXFAM', 'Sexfam', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('EDAFAM', 'Edafam', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('PARFAM', 'Parfam', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('EDOCIV', 'Edociv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GRAINS', 'Grains', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TRAOFI', 'Traofi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODGUA', 'Codgua', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALGUA', 'Valgua', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('SEGHCM', 'Seghcm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORSEGHCM', 'Porseghcm', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('OCUPAC', 'Ocupac', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CARBEN', 'Carben', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DISSUS', 'Dissus', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
