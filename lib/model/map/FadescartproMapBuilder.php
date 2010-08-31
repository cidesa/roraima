<?php



class FadescartproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FadescartproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadescartpro');
		$tMap->setPhpName('Fadescartpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadescartpro_SEQ');

		$tMap->addColumn('CODDESC', 'Coddesc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFDOC', 'Refdoc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MONDESC', 'Mondesc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDETDESC', 'Mondetdesc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 