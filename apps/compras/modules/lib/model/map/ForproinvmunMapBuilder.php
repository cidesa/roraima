<?php



class ForproinvmunMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForproinvmunMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forproinvmun');
		$tMap->setPhpName('Forproinvmun');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODPREMUN', 'Codpremun', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPREGOB', 'Codpregob', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESPREMUN', 'Despremun', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('MONAPOMUN', 'Monapomun', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 