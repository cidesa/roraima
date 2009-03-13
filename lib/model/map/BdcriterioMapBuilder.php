<?php



class BdcriterioMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BdcriterioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bdcriterio');
		$tMap->setPhpName('Bdcriterio');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bdcriterio_SEQ');

		$tMap->addColumn('CRITERIO', 'Criterio', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('SQL', 'Sql', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TEMPORAL', 'Temporal', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NUMERO', 'Numero', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 