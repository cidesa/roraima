<?php



class ViadefnivaprMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadefnivaprMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadefnivapr');
		$tMap->setPhpName('Viadefnivapr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadefnivapr_SEQ');

		$tMap->addColumn('CODNIVAPR', 'Codnivapr', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESNIVAPR', 'Desnivapr', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 