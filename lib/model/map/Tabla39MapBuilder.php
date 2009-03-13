<?php



class Tabla39MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla39MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tabla39');
		$tMap->setPhpName('Tabla39');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tabla39_SEQ');

		$tMap->addColumn('REFAJU', 'Refaju', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPAJU', 'Tipaju', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOAJU', 'Anoaju', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESAJU', 'Desaju', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TOTAJU', 'Totaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAAJU', 'Staaju', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CUOANU', 'Cuoanu', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('FECANUDES', 'Fecanudes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECANUHAS', 'Fecanuhas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ORDPAG', 'Ordpag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECENVCON', 'Fecenvcon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECENVFIN', 'Fecenvfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 