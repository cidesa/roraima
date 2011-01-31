<?php



class OcpervalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcpervalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocperval');
		$tMap->setPhpName('Ocperval');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocperval_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CEDINS', 'Cedins', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CEDTEC', 'Cedtec', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CEDFIS', 'Cedfis', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CEDRES', 'Cedres', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CEDTOP', 'Cedtop', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 