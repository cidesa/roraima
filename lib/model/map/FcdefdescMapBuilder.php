<?php



class FcdefdescMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefdescMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefdesc');
		$tMap->setPhpName('Fcdefdesc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefdesc_SEQ');

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMDES', 'Nomdes', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('LIMITA', 'Limita', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('AUTO', 'Auto', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ANOACT', 'Anoact', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 