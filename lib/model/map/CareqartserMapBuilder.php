<?php



class CareqartserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CareqartserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('careqartser');
		$tMap->setPhpName('Careqartser');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('careqartser_SEQ');

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREQ', 'Fecreq', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESREQ', 'Desreq', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STAREQ', 'Stareq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCATREQ', 'Codcatreq', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 