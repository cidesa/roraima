<?php



class LilichisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LilichisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lilichis');
		$tMap->setPhpName('Lilichis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lilichis_SEQ');

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PERIODICO', 'Periodico', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECPUB', 'Fecpub', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PAGINA', 'Pagina', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MES', 'Mes', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CUERPO', 'Cuerpo', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 