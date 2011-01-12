<?php



class CarecaudMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CarecaudMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('carecaud');
		$tMap->setPhpName('Carecaud');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('carecaud_SEQ');

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('LIMREC', 'Limrec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CANUTR', 'Canutr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CODTIPREC', 'Codtiprec', 'string', CreoleTypes::VARCHAR, 'catiprec', 'CODTIPREC', true, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 