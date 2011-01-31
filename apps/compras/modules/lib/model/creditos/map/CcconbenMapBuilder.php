<?php



class CcconbenMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcconbenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccconben');
		$tMap->setPhpName('Ccconben');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccconben_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CEDCON', 'Cedcon', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LUGTRACON', 'Lugtracon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELCON', 'Telcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CELCON', 'Celcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIRNOMURB', 'Dirnomurb', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRCALLES', 'Dircalles', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRCASEDI', 'Dircasedi', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRNUMPIS', 'Dirnumpis', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRAPATAR', 'Dirapatar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRPUNREF', 'Dirpunref', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARECEL', 'Codarecel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CORELE', 'Corele', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('OCUPA', 'Ocupa', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PROFE', 'Profe', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INGMEN', 'Ingmen', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

	} 
} 