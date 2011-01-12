<?php



class CcparamoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcparamoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccparamo');
		$tMap->setPhpName('Ccparamo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccparamo_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PRIORI', 'Priori', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('PRIMONINTMOR', 'Primonintmor', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PRIMONINT', 'Primonint', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PRIMONPRI', 'Primonpri', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PRIMONINTGRA', 'Primonintgra', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PRIMONINTCUM', 'Primonintcum', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCPERPARAMO_ID', 'CcperparamoId', 'int', CreoleTypes::INTEGER, 'ccperparamo', 'ID', true, null);

	} 
} 