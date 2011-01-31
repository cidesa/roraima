<?php



class Fcdefdetsol2MapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.Fcdefdetsol2MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefdetsol2');
		$tMap->setPhpName('Fcdefdetsol2');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefdetsol2_SEQ');

		$tMap->addColumn('CODSOL', 'Codsol', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CUANTOS', 'Cuantos', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PROPIE', 'Propie', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('IMPRIM', 'Imprim', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 