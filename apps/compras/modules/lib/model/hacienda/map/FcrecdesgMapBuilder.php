<?php



class FcrecdesgMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcrecdesgMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcrecdesg');
		$tMap->setPhpName('Fcrecdesg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcrecdesg_SEQ');

		$tMap->addColumn('CODREDE', 'Codrede', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DIAS', 'Dias', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('PORCIEN', 'Porcien', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 