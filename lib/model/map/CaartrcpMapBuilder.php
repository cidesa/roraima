<?php



class CaartrcpMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaartrcpMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caartrcp');
		$tMap->setPhpName('Caartrcp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caartrcp_SEQ');

		$tMap->addColumn('RCPART', 'Rcpart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CANREC', 'Canrec', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('CANDEV', 'Candev', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANASILOT', 'Canasilot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODFAL', 'Codfal', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECEST', 'Fecest', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SERIAL', 'Serial', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 