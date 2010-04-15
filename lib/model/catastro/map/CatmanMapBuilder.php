<?php



class CatmanMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatmanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catman');
		$tMap->setPhpName('Catman');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catman_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CATDIVGEO_ID', 'CatdivgeoId', 'int', CreoleTypes::INTEGER, 'catdivgeo', 'ID', false, null);

		$tMap->addColumn('NOMMAN', 'Nomman', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ALIMAN', 'Aliman', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('CATTRAMONOR_ID', 'CattramonorId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('TIPLINNOR_ID', 'TiplinnorId', 'int', CreoleTypes::INTEGER, 'cattipvia', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOSUR_ID', 'CattramosurId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('TIPLINSUR_ID', 'TiplinsurId', 'int', CreoleTypes::INTEGER, 'cattipvia', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOEST_ID', 'CattramoestId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('TIPLINEST_ID', 'TiplinestId', 'int', CreoleTypes::INTEGER, 'cattipvia', 'ID', false, null);

		$tMap->addForeignKey('CATTRAMOOES_ID', 'CattramooesId', 'int', CreoleTypes::INTEGER, 'cattramo', 'ID', false, null);

		$tMap->addForeignKey('TIPLINOES_ID', 'TiplinoesId', 'int', CreoleTypes::INTEGER, 'cattipvia', 'ID', false, null);

	} 
} 