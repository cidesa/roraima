<?php



class CpdoccomMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdoccomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdoccom');
		$tMap->setPhpName('Cpdoccom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdoccom_SEQ');

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEPRC', 'Afeprc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFECOM', 'Afecom', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFEDIS', 'Afedis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('REQAUT', 'Reqaut', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 