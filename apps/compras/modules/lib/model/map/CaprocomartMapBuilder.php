<?php



class CaprocomartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaprocomartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caprocomart');
		$tMap->setPhpName('Caprocomart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caprocomart_SEQ');

		$tMap->addColumn('FECPROCOM', 'Fecprocom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CANPRO', 'Canpro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPRO', 'Monpro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MESPRO', 'Mespro', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 