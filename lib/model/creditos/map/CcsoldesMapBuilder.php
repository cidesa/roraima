<?php



class CcsoldesMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsoldesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsoldes');
		$tMap->setPhpName('Ccsoldes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsoldes_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMSOLDES', 'Numsoldes', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECSOLDES', 'Fecsoldes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSUACT', 'Codusuact', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('PARA', 'Para', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('DE', 'De', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCTIPDES_ID', 'CctipdesId', 'int', CreoleTypes::INTEGER, 'cctipdes', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

	} 
} 