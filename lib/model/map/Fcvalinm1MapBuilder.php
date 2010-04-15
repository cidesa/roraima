<?php



class Fcvalinm1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Fcvalinm1MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcvalinm1');
		$tMap->setPhpName('Fcvalinm1');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcvalinm1_SEQ');

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('VALFIN', 'Valfin', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('ALIINM', 'Aliinm', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DEDUC', 'Deduc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODREF', 'Codref', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('ZONI', 'Zoni', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MANZ', 'Manz', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PARMTS', 'Parmts', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('VALOR', 'Valor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPEDI', 'Tipedi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESEDI', 'Desedi', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('NIVEL', 'Nivel', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 