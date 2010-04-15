<?php



class ViadettabcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadettabcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadettabcar');
		$tMap->setPhpName('Viadettabcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadettabcar_SEQ');

		$tMap->addForeignKey('VIAREGTIPTAB_ID', 'ViaregtiptabId', 'int', CreoleTypes::INTEGER, 'viaregtiptab', 'ID', false, null);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 