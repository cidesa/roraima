<?php



class OcadjobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcadjobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocadjobr');
		$tMap->setPhpName('Ocadjobr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocadjobr_SEQ');

		$tMap->addColumn('CODADJ', 'Codadj', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPADJ', 'Tipadj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECADJ', 'Fecadj', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('FECINIPUB', 'Fecinipub', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFINPUB', 'Fecfinpub', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECBASEINI', 'Fecbaseini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECBASEFIN', 'Fecbasefin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPREOFINI', 'Fecpreofini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPREOFFIN', 'Fecpreoffin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECANAOFINI', 'Fecanaofini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECANAOFFIN', 'Fecanaoffin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPROGAN', 'Codprogan', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECGAN', 'Fecgan', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 