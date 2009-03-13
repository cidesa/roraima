<?php



class FcmultasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcmultasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcmultas');
		$tMap->setPhpName('Fcmultas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcmultas_SEQ');

		$tMap->addColumn('CODMUL', 'Codmul', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMMUL', 'Nommul', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONPRO', 'Monpro', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPDEC', 'Tipdec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 