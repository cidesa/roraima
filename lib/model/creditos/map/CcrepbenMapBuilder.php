<?php



class CcrepbenMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcrepbenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccrepben');
		$tMap->setPhpName('Ccrepben');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccrepben_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMREPBEN', 'Nomrepben', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CEDRIFBEN', 'Cedrifben', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OCUPA', 'Ocupa', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNOMURB', 'Dirnomurb', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMCAL', 'Dirnumcal', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMCASEDI', 'Dirnumcasedi', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMPIS', 'Dirnumpis', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRNUMAPT', 'Dirnumapt', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRPUNREF', 'Dirpunref', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NUMTEL', 'Numtel', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMCEL', 'Numcel', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NUMFAX', 'Numfax', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODAREFAX', 'Codarefax', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CORELE', 'Corele', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SEXREPBEN', 'Sexrepben', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('PARLOCCAS', 'Parloccas', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

		$tMap->addForeignKey('CCPARENT_ID', 'CcparentId', 'int', CreoleTypes::INTEGER, 'ccparent', 'ID', true, null);

	} 
} 