<?php



class CcanaestMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcanaestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccanaest');
		$tMap->setPhpName('Ccanaest');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccanaest_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCESTADO_ID', 'CcestadoId', 'int', CreoleTypes::INTEGER, 'ccestado', 'ID', true, null);

		$tMap->addForeignKey('CCANALIS_ID', 'CcanalisId', 'int', CreoleTypes::INTEGER, 'ccanalis', 'ID', true, null);

	} 
} 