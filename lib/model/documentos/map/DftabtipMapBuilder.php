<?php



class DftabtipMapBuilder {

	
	const CLASS_NAME = 'lib.model.documentos.map.DftabtipMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dftabtip');
		$tMap->setPhpName('Dftabtip');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dftabtip_SEQ');

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMTAB', 'Nomtab', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('VIDUTIL', 'Vidutil', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CLVPRM', 'Clvprm', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CLVFRN', 'Clvfrn', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MONDOC', 'Mondoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECDOC', 'Fecdoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DESDOC', 'Desdoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('STADOC', 'Stadoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('INFDOC1', 'Infdoc1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INFDOC2', 'Infdoc2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INFDOC3', 'Infdoc3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INFDOC4', 'Infdoc4', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('VALACT', 'Valact', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VALANU', 'Valanu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 