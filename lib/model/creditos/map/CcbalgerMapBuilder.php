<?php



class CcbalgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbalgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbalger');
		$tMap->setPhpName('Ccbalger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbalger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECBALGER', 'Fecbalger', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

		$tMap->addForeignKey('CCUSUARIO_ID', 'CcusuarioId', 'int', CreoleTypes::INTEGER, 'ccusuario', 'ID', true, null);

	} 
} 