<?php



class FcdeclarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdeclarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdeclar');
		$tMap->setPhpName('Fcdeclar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdeclar_SEQ');

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECDEC', 'Fecdec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MONDEC', 'Mondec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EDODEC', 'Edodec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MORA', 'Mora', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PRONTOPG', 'Prontopg', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('AUTLIQ', 'Autliq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FUNDEC', 'Fundec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CONPAG', 'Conpag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONABO', 'Monabo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMABO', 'Numabo', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('OTRO', 'Otro', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MIGINC', 'Miginc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ANODEC', 'Anodec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECULTPAG', 'Fecultpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 