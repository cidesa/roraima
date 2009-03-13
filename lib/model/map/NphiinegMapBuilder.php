<?php



class NphiinegMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NphiinegMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nphiineg');
		$tMap->setPhpName('Nphiineg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nphiineg_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECEGR', 'Fecegr', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 