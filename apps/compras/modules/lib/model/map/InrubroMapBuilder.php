<?php



class InrubroMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InrubroMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inrubro');
		$tMap->setPhpName('Inrubro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inrubro_SEQ');

		$tMap->addForeignKey('INGRUPRUB_ID', 'IngruprubId', 'int', CreoleTypes::INTEGER, 'ingruprub', 'ID', false, null);

		$tMap->addColumn('CODRUB', 'Codrub', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESRUB', 'Desrub', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('MONRUB', 'Monrub', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 