<?php



class CcavalisMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcavalisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccavalis');
		$tMap->setPhpName('Ccavalis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccavalis_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMAVA', 'Nomava', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDAVA', 'Cedava', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CORAVA', 'Corava', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NUMTELLOC', 'Numtelloc', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NUMCEL', 'Numcel', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODAREOTRO', 'Codareotro', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NUMOTRTEL', 'Numotrtel', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DIRNOMURB', 'Dirnomurb', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRNUMCAL', 'Dirnumcal', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRNUMCASEDIF', 'Dirnumcasedif', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRNUMPIS', 'Dirnumpis', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRPUNREF', 'Dirpunref', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRNUMAPT', 'Dirnumapt', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

		$tMap->addForeignKey('CCGARANT_ID', 'CcgarantId', 'int', CreoleTypes::INTEGER, 'ccgarant', 'ID', true, null);

	} 
} 