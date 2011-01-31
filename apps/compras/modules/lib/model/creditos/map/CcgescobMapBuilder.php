<?php



class CcgescobMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcgescobMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccgescob');
		$tMap->setPhpName('Ccgescob');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccgescob_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECGES', 'Fecges', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCOMPAG', 'Feccompag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPACC', 'Tipacc', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CCBANCO_ID', 'CcbancoId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONDEP', 'Mondep', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ENVFAX', 'Envfax', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('COMENT', 'Coment', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('CCCLAACT_ID', 'CcclaactId', 'int', CreoleTypes::INTEGER, 'ccclaact', 'ID', true, null);

		$tMap->addForeignKey('CCUSUINT_ID', 'CcusuintId', 'int', CreoleTypes::INTEGER, 'ccusuint', 'ID', true, null);

		$tMap->addForeignKey('CCACTANA_ID', 'CcactanaId', 'int', CreoleTypes::INTEGER, 'ccactana', 'ID', true, null);

		$tMap->addForeignKey('CCTIPTRA_ID', 'CctiptraId', 'int', CreoleTypes::INTEGER, 'cctiptra', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCANALIS_ID', 'CcanalisId', 'int', CreoleTypes::INTEGER, 'ccanalis', 'ID', true, null);

		$tMap->addForeignKey('CCESTADO_ID', 'CcestadoId', 'int', CreoleTypes::INTEGER, 'ccestado', 'ID', true, null);

	} 
} 