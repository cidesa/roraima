<?php



class CacontxtalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CacontxtalmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cacontxtalm');
		$tMap->setPhpName('Cacontxtalm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cacontxtalm_SEQ');

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('INIART', 'Iniart', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINART', 'Finart', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INIDES', 'Inides', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINDES', 'Findes', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INICAN', 'Inican', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINCAN', 'Fincan', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INISUB', 'Inisub', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINSUB', 'Finsub', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INIIVA', 'Iniiva', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINIVA', 'Finiva', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INIPRE', 'Inipre', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINPRE', 'Finpre', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 