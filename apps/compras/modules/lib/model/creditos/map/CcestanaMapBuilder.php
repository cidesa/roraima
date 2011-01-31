<?php



class CcestanaMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcestanaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccestana');
		$tMap->setPhpName('Ccestana');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccestana_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCESTADO_ID', 'CcestadoId', 'int', CreoleTypes::INTEGER, 'ccestado', 'ID', true, null);

		$tMap->addForeignKey('CCANALIS_ID', 'CcanalisId', 'int', CreoleTypes::INTEGER, 'ccanalis', 'ID', true, null);

	} 
} 