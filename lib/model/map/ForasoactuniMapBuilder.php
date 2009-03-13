<?php



class ForasoactuniMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForasoactuniMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forasoactuni');
		$tMap->setPhpName('Forasoactuni');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODUNIMET', 'Codunimet', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 