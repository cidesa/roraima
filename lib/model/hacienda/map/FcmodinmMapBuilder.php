<?php



class FcmodinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcmodinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcmodinm');
		$tMap->setPhpName('Fcmodinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcmodinm_SEQ');

		$tMap->addColumn('REFMOD', 'Refmod', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NROINM', 'Nroinm', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECMOD', 'Fecmod', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODCATFIS', 'Codcatfis', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCARINM', 'Codcarinm', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODSITINM', 'Codsitinm', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCAL', 'Feccal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIRINM', 'Dirinm', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('LINNOR', 'Linnor', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LINEST', 'Linest', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LINOES', 'Linoes', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MTRTER', 'Mtrter', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MTRCON', 'Mtrcon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BSTER', 'Bster', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BSCON', 'Bscon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DOCPRO', 'Docpro', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('CODCATFISANT', 'Codcatfisant', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODUSOANT', 'Codusoant', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCARINMANT', 'Codcarinmant', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODSITINMANT', 'Codsitinmant', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECPAGANT', 'Fecpagant', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCALANT', 'Feccalant', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIRINMANT', 'Dirinmant', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('LINNORANT', 'Linnorant', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LINSURANT', 'Linsurant', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LINESTANT', 'Linestant', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LINOESANT', 'Linoesant', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MTRTERANT', 'Mtrterant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MTRCONANT', 'Mtrconant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BSTERANT', 'Bsterant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BSCONANT', 'Bsconant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DOCPROANT', 'Docproant', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('CODCATINM', 'Codcatinm', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 