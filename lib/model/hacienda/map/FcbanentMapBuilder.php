<?php



class FcbanentMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcbanentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcbanent');
		$tMap->setPhpName('Fcbanent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcbanent_SEQ');

		$tMap->addColumn('CODDOC', 'Coddoc', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODFUN', 'Codfun', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODENTEXT', 'Codentext', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODTIPDOC', 'Codtipdoc', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECDOC', 'Fecdoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORDOC', 'Hordoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ASUNTO', 'Asunto', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODUBIFIS', 'Codubifis', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECUBIFIS', 'Fecubifis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORUBIFIS', 'Horubifis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUBIMAG', 'Codubimag', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECUBIMAG', 'Fecubimag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORUBIMAG', 'Horubimag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 