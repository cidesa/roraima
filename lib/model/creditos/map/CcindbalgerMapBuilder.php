<?php



class CcindbalgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcindbalgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccindbalger');
		$tMap->setPhpName('Ccindbalger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccindbalger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECINDBALGER', 'Fecindbalger', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONINDBALGER', 'Monindbalger', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addForeignKey('CCBALGER_ID', 'CcbalgerId', 'int', CreoleTypes::INTEGER, 'ccbalger', 'ID', true, null);

		$tMap->addForeignKey('CCINDICA_ID', 'CcindicaId', 'int', CreoleTypes::INTEGER, 'ccindica', 'ID', true, null);

	} 
} 