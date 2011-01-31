<?php



class IndetfacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IndetfacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('indetfac');
		$tMap->setPhpName('Indetfac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('indetfac_SEQ');

		$tMap->addForeignKey('INFACTURA_ID', 'InfacturaId', 'int', CreoleTypes::INTEGER, 'infactura', 'ID', false, null);

		$tMap->addForeignKey('INARTICULO_ID', 'InarticuloId', 'int', CreoleTypes::INTEGER, 'inarticulo', 'ID', false, null);

		$tMap->addColumn('CANART', 'Canart', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 