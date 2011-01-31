<?php



class CccreditMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccreditMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccredit');
		$tMap->setPhpName('Cccredit');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccredit_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NATCRE', 'Natcre', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTINO', 'Destino', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONAPR', 'Monapr', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ACTAPR', 'Actapr', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('APERCUE', 'Apercue', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECCRECUE', 'Feccrecue', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('GENTXT', 'Gentxt', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECLIQ', 'Fecliq', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DISDES', 'Disdes', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

		$tMap->addForeignKey('CCFUEFIN_ID', 'CcfuefinId', 'int', CreoleTypes::INTEGER, 'ccfuefin', 'ID', false, null);

		$tMap->addForeignKey('CCTIPCAR_ID', 'CctipcarId', 'int', CreoleTypes::INTEGER, 'cctipcar', 'ID', false, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', false, null);

		$tMap->addForeignKey('CCTIPMON_ID', 'CctipmonId', 'int', CreoleTypes::INTEGER, 'cctipmon', 'ID', false, null);

		$tMap->addForeignKey('CCBANCO_ID', 'CcbancoId', 'int', CreoleTypes::INTEGER, 'ccbanco', 'ID', false, null);

		$tMap->addForeignKey('CCAGENCI_ID', 'CcagenciId', 'int', CreoleTypes::INTEGER, 'ccagenci', 'ID', false, null);

		$tMap->addForeignKey('CCPRIORIDAD_ID', 'CcprioridadId', 'int', CreoleTypes::INTEGER, 'ccprioridad', 'ID', false, null);

		$tMap->addForeignKey('CCCONDIC_ID', 'CccondicId', 'int', CreoleTypes::INTEGER, 'cccondic', 'ID', false, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCTIPUPS_ID', 'CctipupsId', 'int', CreoleTypes::INTEGER, 'cctipups', 'ID', false, null);

		$tMap->addColumn('NUMNOM', 'Numnom', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addForeignKey('CPCOMPRO_ID', 'CpcomproId', 'int', CreoleTypes::INTEGER, 'cpcompro', 'ID', false, null);

	} 
} 