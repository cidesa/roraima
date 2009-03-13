<?php



class FadtocteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FadtocteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fadtocte');
		$tMap->setPhpName('Fadtocte');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fadtocte_SEQ');

		$tMap->addForeignKey('FATIPCTE_ID', 'FatipcteId', 'int', CreoleTypes::INTEGER, 'fatipcte', 'ID', false, null);

		$tMap->addColumn('CODDESC', 'Coddesc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 