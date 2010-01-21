<?php



class CcdircorbenMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdircorbenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdircorben');
		$tMap->setPhpName('Ccdircorben');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdircorben_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIRNOMURB', 'Dirnomurb', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMCAL', 'Dirnumcal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMCASEDI', 'Dirnumcasedi', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMPIS', 'Dirnumpis', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMAPT', 'Dirnumapt', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRPUNREF', 'Dirpunref', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NUMTEL', 'Numtel', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMCEL', 'Numcel', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMFAX', 'Numfax', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODAREFAX', 'Codarefax', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MAIL', 'Mail', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

	} 
} 