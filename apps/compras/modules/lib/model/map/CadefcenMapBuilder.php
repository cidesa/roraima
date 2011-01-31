<?php



class CadefcenMapBuilder {


	const CLASS_NAME = 'lib.model.map.CadefcenMapBuilder';


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

		$tMap = $this->dbMap->addTable('cadefcen');
		$tMap->setPhpName('Cadefcen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefcen_SEQ');

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCEN', 'Descen', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRCEN', 'Dircen', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	}
}