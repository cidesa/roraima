<?php



class CatregperMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatregperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catregper');
		$tMap->setPhpName('Catregper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catregper_SEQ');

		$tMap->addForeignKey('CATBARURB_ID', 'CatbarurbId', 'int', CreoleTypes::INTEGER, 'catbarurb', 'ID', false, null);

		$tMap->addForeignKey('CATSEC_ID', 'CatsecId', 'int', CreoleTypes::INTEGER, 'catsec', 'ID', false, null);

		$tMap->addForeignKey('CATPAR_ID', 'CatparId', 'int', CreoleTypes::INTEGER, 'catpar', 'ID', false, null);

		$tMap->addForeignKey('CATMUN_ID', 'CatmunId', 'int', CreoleTypes::INTEGER, 'catmun', 'ID', false, null);

		$tMap->addForeignKey('CATDIVGEO_ID', 'CatdivgeoId', 'int', CreoleTypes::INTEGER, 'catdivgeo', 'ID', false, null);

		$tMap->addForeignKey('CATEST_ID', 'CatestId', 'int', CreoleTypes::INTEGER, 'catest', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOFRO_ID', 'CattramofroId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOLAT_ID', 'CattramolatId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOLAT2_ID', 'Cattramolat2Id', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('CATCODPOS_ID', 'CatcodposId', 'int', CreoleTypes::INTEGER, 'catcodpos', 'ID', false, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECPER', 'Fecper', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NOMPER', 'Nomper', 'string', CreoleTypes::VARCHAR, false, 80);

		$tMap->addColumn('PRINOM', 'Prinom', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('SEGNOM', 'Segnom', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('PRIAPE', 'Priape', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('SEGAPE', 'Segape', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('RELEMP', 'Relemp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NACPER', 'Nacper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TELPER', 'Telper', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FAXPER', 'Faxper', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('APAPOSPER', 'Apaposper', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('EMAPER', 'Emaper', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRPER', 'Dirper', 'string', CreoleTypes::VARCHAR, false, 254);

		$tMap->addColumn('EDICAS', 'Edicas', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('PISHAB', 'Pishab', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMHAB', 'Numhab', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODOFI', 'Codofi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('STAPER', 'Staper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 