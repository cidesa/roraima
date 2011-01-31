<?php



class CcprograMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcprograMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccprogra');
		$tMap->setPhpName('Ccprogra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccprogra_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONMAX', 'Monmax', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PREPRO', 'Prepro', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBJETO', 'Objeto', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTINO', 'Destino', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONFIN', 'Monfin', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CONDIC', 'Condic', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('GARANT', 'Garant', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('RECAUD', 'Recaud', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('PLAFIN', 'Plafin', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NOMPROCOM', 'Nomprocom', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCPERIOD_ID', 'CcperiodId', 'int', CreoleTypes::INTEGER, 'ccperiod', 'ID', false, null);

		$tMap->addForeignKey('CCFUEFIN_ID', 'CcfuefinId', 'int', CreoleTypes::INTEGER, 'ccfuefin', 'ID', true, null);

		$tMap->addForeignKey('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, 'cpdoccom', 'TIPCOM', true, null);

	} 
} 