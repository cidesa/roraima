<?php



class BnipcactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnipcactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnipcact');
		$tMap->setPhpName('Bnipcact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnipcact_SEQ');

		$tMap->addColumn('ANOIPC', 'Anoipc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('IPCENE', 'Ipcene', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCFEB', 'Ipcfeb', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCMAR', 'Ipcmar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCABR', 'Ipcabr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCMAY', 'Ipcmay', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCJUN', 'Ipcjun', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCJUL', 'Ipcjul', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCAGO', 'Ipcago', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCSEP', 'Ipcsep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCOCT', 'Ipcoct', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCNOV', 'Ipcnov', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IPCDIC', 'Ipcdic', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAIPC', 'Staipc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 