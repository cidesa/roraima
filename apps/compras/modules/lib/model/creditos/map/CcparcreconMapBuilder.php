<?php



class CcparcreconMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcparcreconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccparcrecon');
		$tMap->setPhpName('Ccparcrecon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccparcrecon_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addForeignKey('CCPARCRE_ID', 'CcparcreId', 'int', CreoleTypes::INTEGER, 'ccparcre', 'ID', true, null);

		$tMap->addForeignKey('CCCONCEP_ID', 'CcconcepId', 'int', CreoleTypes::INTEGER, 'ccconcep', 'ID', true, null);

	} 
} 