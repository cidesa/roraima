<?php



class CcbieadqMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbieadqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbieadq');
		$tMap->setPhpName('Ccbieadq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbieadq_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESBIEADQ', 'Desbieadq', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONFACPRO', 'Monfacpro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PROCED', 'Proced', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('GRAVAM', 'Gravam', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('GRADO', 'Grado', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('UBINOMURB', 'Ubinomurb', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UBINUMCAL', 'Ubinumcal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UBINUMCAS', 'Ubinumcas', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UBIPUNREF', 'Ubipunref', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TIPBIEN', 'Tipbien', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('UBINUMPIS', 'Ubinumpis', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UBINUMAPT', 'Ubinumapt', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESOTR', 'Desotr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMBIE', 'Numbie', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TERMETCUA', 'Termetcua', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CONMETCUA', 'Conmetcua', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMHAB', 'Numhab', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMBAN', 'Numban', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMEST', 'Numest', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PRECINMU', 'Precinmu', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DIAOFE', 'Diaofe', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NOMPROVEN', 'Nomproven', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDRIFPRO', 'Cedrifpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODAREHAB', 'Codarehab', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('TELHAB', 'Telhab', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('TELCEL', 'Telcel', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODAREOFI', 'Codareofi', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('TELOFI', 'Telofi', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

		$tMap->addForeignKey('CCCLABIE_ID', 'CcclabieId', 'int', CreoleTypes::INTEGER, 'ccclabie', 'ID', true, null);

		$tMap->addForeignKey('CCTIPPROBIE_ID', 'CctipprobieId', 'int', CreoleTypes::INTEGER, 'cctipprobie', 'ID', false, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

	} 
} 