<?php



class AtrubrosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtrubrosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atrubros');
		$tMap->setPhpName('Atrubros');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atrubros_SEQ');

		$tMap->addForeignKey('ATTIPAYU_ID', 'AttipayuId', 'int', CreoleTypes::INTEGER, 'attipayu', 'ID', false, null);

		$tMap->addColumn('DESRUB', 'Desrub', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 