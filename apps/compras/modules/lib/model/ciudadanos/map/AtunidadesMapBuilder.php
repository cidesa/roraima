<?php



class AtunidadesMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtunidadesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atunidades');
		$tMap->setPhpName('Atunidades');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atunidades_SEQ');

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESUNI', 'Desuni', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DIRUNI', 'Diruni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TELFUNI', 'Telfuni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PERCON', 'Percon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TELPERCON', 'Telpercon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MAILPERCON', 'Mailpercon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('HORARIO', 'Horario', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 