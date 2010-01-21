<?php



class CcdetcuadesMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdetcuadesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdetcuades');
		$tMap->setPhpName('Ccdetcuades');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdetcuades_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONDED', 'Monded', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NROCHEQCON', 'Nrocheqcon', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('BENPRO', 'Benpro', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addForeignKey('CCPAGTER_ID', 'CcpagterId', 'int', CreoleTypes::INTEGER, 'ccpagter', 'ID', false, null);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', false, null);

		$tMap->addForeignKey('CCCUEBAN_ID', 'CccuebanId', 'int', CreoleTypes::INTEGER, 'cccueban', 'ID', false, null);

		$tMap->addForeignKey('CCCONCEP_ID', 'CcconcepId', 'int', CreoleTypes::INTEGER, 'ccconcep', 'ID', true, null);

		$tMap->addForeignKey('CCCUADES_ID', 'CccuadesId', 'int', CreoleTypes::INTEGER, 'cccuades', 'ID', true, null);

		$tMap->addForeignKey('CPCAUSAD_ID', 'CpcausadId', 'int', CreoleTypes::INTEGER, 'cpcausad', 'ID', false, null);

	} 
} 