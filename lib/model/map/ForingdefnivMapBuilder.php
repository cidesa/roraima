<?php



class ForingdefnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForingdefnivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('foringdefniv');
		$tMap->setPhpName('Foringdefniv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('foringdefniv_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LONCOD', 'Loncod', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('RUPCAT', 'Rupcat', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('RUPPAR', 'Ruppar', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('NIVDIS', 'Nivdis', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('FORPRE', 'Forpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('ASIPER', 'Asiper', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NUMPER', 'Numper', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('PERACT', 'Peract', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('FECPER', 'Fecper', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ETADEF', 'Etadef', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAPRC', 'Staprc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CARAEP', 'Caraep', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORAEP', 'Coraep', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NIVOBR', 'Nivobr', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
