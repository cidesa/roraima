<?php



class NpinfcurReneMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpinfcurReneMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinfcur_rene');
		$tMap->setPhpName('NpinfcurRene');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinfcur_rene_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMTIT', 'Nomtit', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('DESCUR', 'Descur', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('INSTIT', 'Instit', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('DURCUR', 'Durcur', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECCUR', 'Feccur', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NIVEST', 'Nivest', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('DIAINI', 'Diaini', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MESINI', 'Mesini', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ANOINI', 'Anoini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIAFIN', 'Diafin', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MESFIN', 'Mesfin', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ANOFIN', 'Anofin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 