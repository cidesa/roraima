<?php



class CcsiniesMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsiniesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsinies');
		$tMap->setPhpName('Ccsinies');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsinies_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('CCPOLIZA_ID', 'CcpolizaId', 'int', CreoleTypes::INTEGER, 'ccpoliza', 'ID', true, null);

	} 
} 