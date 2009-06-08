<?php



class DfdiaferMapBuilder {

	
	const CLASS_NAME = 'lib.model.documentos.map.DfdiaferMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dfdiafer');
		$tMap->setPhpName('Dfdiafer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dfdiafer_SEQ');

		$tMap->addColumn('DIAFER', 'Diafer', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 