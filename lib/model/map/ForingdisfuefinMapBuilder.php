<?php



class ForingdisfuefinMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForingdisfuefinMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('foringdisfuefin');
		$tMap->setPhpName('Foringdisfuefin');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('foringdisfuefin_SEQ');

		$tMap->addColumn('CODPARING', 'Codparing', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONTOING', 'Montoing', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 