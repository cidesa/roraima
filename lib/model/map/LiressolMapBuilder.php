<?php



class LiressolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiressolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liressol');
		$tMap->setPhpName('Liressol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liressol_SEQ');

		$tMap->addForeignKey('LIREGSOL_ID', 'LiregsolId', 'int', CreoleTypes::INTEGER, 'liregsol', 'ID', true, null);

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMCOR', 'Numcor', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('CODEMPEMI', 'Codempemi', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODEMPFIR', 'Codempfir', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('UBIARC', 'Ubiarc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIR', 'Fecfir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 