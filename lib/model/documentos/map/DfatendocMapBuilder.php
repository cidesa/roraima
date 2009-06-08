<?php



class DfatendocMapBuilder {

	
	const CLASS_NAME = 'lib.model.documentos.map.DfatendocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dfatendoc');
		$tMap->setPhpName('Dfatendoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dfatendoc_SEQ');

		$tMap->addColumn('CODDOC', 'Coddoc', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DESDOC', 'Desdoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONDOC', 'Mondoc', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECDOC', 'Fecdoc', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('STAATE', 'Staate', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ANUATE', 'Anuate', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('ID_DFTABTIP', 'IdDftabtip', 'int', CreoleTypes::INTEGER, 'dftabtip', 'ID', true, null);

		$tMap->addColumn('INFDOC1', 'Infdoc1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INFDOC2', 'Infdoc2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INFDOC3', 'Infdoc3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INFDOC4', 'Infdoc4', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 