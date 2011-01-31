<?php



class CcsoliciMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsoliciMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsolici');
		$tMap->setPhpName('Ccsolici');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsolici_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONSOL', 'Monsol', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSBIE', 'Obsbie', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECREV', 'Fecrev', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMREV', 'Nomrev', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CARREV', 'Carrev', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ACTAPR', 'Actapr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMCOR', 'Nomcor', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('EXISTEAVAL', 'Existeaval', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

		$tMap->addForeignKey('CCUSUARIO_ID', 'CcusuarioId', 'int', CreoleTypes::INTEGER, 'ccusuario', 'ID', true, null);

		$tMap->addForeignKey('CCCIUDAD_ID', 'CcciudadId', 'int', CreoleTypes::INTEGER, 'ccciudad', 'ID', true, null);

		$tMap->addForeignKey('CCMUNICI_ID', 'CcmuniciId', 'int', CreoleTypes::INTEGER, 'ccmunici', 'ID', true, null);

		$tMap->addForeignKey('CCCIRCUITO_ID', 'CccircuitoId', 'int', CreoleTypes::INTEGER, 'cccircuito', 'ID', false, null);

		$tMap->addForeignKey('CCCONDIC_ID', 'CccondicId', 'int', CreoleTypes::INTEGER, 'cccondic', 'ID', false, null);

	} 
} 