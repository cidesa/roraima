<?php



class Npsalint03022007MapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.Npsalint03022007MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npsalint_03022007');
		$tMap->setPhpName('Npsalint03022007');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npsalint_03022007_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODASI', 'Codasi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECINICON', 'Fecinicon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFINCON', 'Fecfincon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 