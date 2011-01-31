<?php



class ViaregdetgassolviaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaregdetgassolviaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaregdetgassolvia');
		$tMap->setPhpName('Viaregdetgassolvia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaregdetgassolvia_SEQ');

		$tMap->addForeignKey('VIAREGDETSOLVIA_ID', 'ViaregdetsolviaId', 'int', CreoleTypes::INTEGER, 'viaregdetsolvia', 'ID', false, null);

		$tMap->addForeignKey('VIAREGTIPSER_ID', 'ViaregtipserId', 'int', CreoleTypes::INTEGER, 'viaregtipser', 'ID', false, null);

		$tMap->addColumn('DETGASMONT', 'Detgasmont', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 