<?php



class CccreregMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccreregMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccrereg');
		$tMap->setPhpName('Cccrereg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccrereg_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECPROTOC', 'Fecprotoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMERO', 'Numero', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TOMO', 'Tomo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PROTOC', 'Protoc', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FOLIO', 'Folio', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TRIMES', 'Trimes', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ANNO', 'Anno', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCREGNOT_ID', 'CcregnotId', 'int', CreoleTypes::INTEGER, 'ccregnot', 'ID', true, null);

	} 
} 