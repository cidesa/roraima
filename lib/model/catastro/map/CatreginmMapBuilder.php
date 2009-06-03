<?php



class CatreginmMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatreginmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catreginm');
		$tMap->setPhpName('Catreginm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catreginm_SEQ');

		$tMap->addForeignKey('CATSUBPRC_ID', 'CatsubprcId', 'int', CreoleTypes::INTEGER, 'catsubprc', 'ID', false, null);

		$tMap->addForeignKey('CATPRC_ID', 'CatprcId', 'int', CreoleTypes::INTEGER, 'catprc', 'ID', false, null);

		$tMap->addForeignKey('CATMAN_ID', 'CatmanId', 'int', CreoleTypes::INTEGER, 'catman', 'ID', false, null);

		$tMap->addForeignKey('CATSEC_ID', 'CatsecId', 'int', CreoleTypes::INTEGER, 'catsec', 'ID', false, null);

		$tMap->addForeignKey('CATPAR_ID', 'CatparId', 'int', CreoleTypes::INTEGER, 'catpar', 'ID', false, null);

		$tMap->addForeignKey('CATMUN_ID', 'CatmunId', 'int', CreoleTypes::INTEGER, 'catmun', 'ID', false, null);

		$tMap->addForeignKey('CATCIU_ID', 'CatciuId', 'int', CreoleTypes::INTEGER, 'catciu', 'ID', false, null);

		$tMap->addForeignKey('CATEST_ID', 'CatestId', 'int', CreoleTypes::INTEGER, 'catest', 'ID', false, null);

		$tMap->addForeignKey('CATBARURB_ID', 'CatbarurbId', 'int', CreoleTypes::INTEGER, 'catbarurb', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOFRO_ID', 'CattramofroId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOLAT_ID', 'CattramolatId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOLAT2_ID', 'Cattramolat2Id', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('CATCODPOS_ID', 'CatcodposId', 'int', CreoleTypes::INTEGER, 'catcodpos', 'ID', false, null);

		$tMap->addForeignKey('CATTIPVIV_ID', 'CattipvivId', 'int', CreoleTypes::INTEGER, 'cattipviv', 'ID', false, null);

		$tMap->addForeignKey('CATCONINM_ID', 'CatconinmId', 'int', CreoleTypes::INTEGER, 'catconinm', 'ID', false, null);

		$tMap->addForeignKey('CATUSOESP_ID', 'CatusoespId', 'int', CreoleTypes::INTEGER, 'catusoesp', 'ID', false, null);

		$tMap->addForeignKey('CATCONSOC_ID', 'CatconsocId', 'int', CreoleTypes::INTEGER, 'catconsoc', 'ID', false, null);

		$tMap->addForeignKey('CATRUT_ID', 'CatrutId', 'int', CreoleTypes::INTEGER, 'catrut', 'ID', false, null);

		$tMap->addForeignKey('CATCARTERINM_ID', 'CatcarterinmId', 'int', CreoleTypes::INTEGER, 'catcarterinm', 'ID', false, null);

		$tMap->addForeignKey('CATPROTER_ID', 'CatproterId', 'int', CreoleTypes::INTEGER, 'catproter', 'ID', false, null);

		$tMap->addColumn('CODDIVGEO', 'Coddivgeo', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('NROCAS', 'Nrocas', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIRINM', 'Dirinm', 'string', CreoleTypes::VARCHAR, false, 254);

		$tMap->addColumn('NIVINM', 'Nivinm', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('UNIHAB', 'Unihab', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('EDICAS', 'Edicas', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('PISINM', 'Pisinm', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMINM', 'Numinm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('UBIGEX', 'Ubigex', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('UBIGEY', 'Ubigey', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('UBIGEZ', 'Ubigez', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMHAB', 'Numhab', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMPER', 'Numper', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMSAN', 'Numsan', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMTOM', 'Numtom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('AREVER', 'Arever', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('LOCCOM', 'Loccom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('LOCIND', 'Locind', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CAPTAN', 'Captan', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CAPPIS', 'Cappis', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TRAPIS', 'Trapis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMTEL', 'Numtel', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMARCCRO', 'Nomarccro', 'string', CreoleTypes::VARCHAR, false, 254);

		$tMap->addColumn('OFICOM', 'Oficom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FOTINM', 'Fotinm', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LINESTE', 'Lineste', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('LINNOR', 'Linnor', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('LINOES', 'Linoes', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 