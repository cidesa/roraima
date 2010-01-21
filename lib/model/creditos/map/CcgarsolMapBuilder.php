<?php



class CcgarsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcgarsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccgarsol');
		$tMap->setPhpName('Ccgarsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccgarsol_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMGAR', 'Nomgar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONESTGAR', 'Monestgar', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DESGAR', 'Desgar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONAVA', 'Monava', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSU', 'Codusu', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UBINOMURB', 'Ubinomurb', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UBINUMCASEDI', 'Ubinumcasedi', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UBINUMCAL', 'Ubinumcal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UBINUMPIS', 'Ubinumpis', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UBINUMAPT', 'Ubinumapt', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('UBIPUNREF', 'Ubipunref', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('GRAVAM', 'Gravam', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('GRADO', 'Grado', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('CEDPRO', 'Cedpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMGAR', 'Numgar', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCTIPGAR_ID', 'CctipgarId', 'int', CreoleTypes::INTEGER, 'cctipgar', 'ID', true, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', false, null);

	} 
} 