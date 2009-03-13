<?php



class AtparroquiasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtparroquiasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atparroquias');
		$tMap->setPhpName('Atparroquias');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atparroquias_SEQ');

		$tMap->addForeignKey('ATMUNICIPIOS_ID', 'AtmunicipiosId', 'int', CreoleTypes::INTEGER, 'atmunicipios', 'ID', false, null);

		$tMap->addColumn('DESPAR', 'Despar', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 