<?php



class NpbenefiembMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpbenefiembMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npbenefiemb');
		$tMap->setPhpName('Npbenefiemb');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npbenefiemb_SEQ');

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('FECNACBEN', 'Fecnacben', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DIRBEN', 'Dirben', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('TELBEN', 'Telben', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 