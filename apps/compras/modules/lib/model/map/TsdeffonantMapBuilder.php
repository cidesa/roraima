<?php



class TsdeffonantMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdeffonantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdeffonant');
		$tMap->setPhpName('Tsdeffonant');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdeffonant_SEQ');

		$tMap->addColumn('CODFON', 'Codfon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESFON', 'Desfon', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addForeignKey('UNIEJE', 'Unieje', 'string', CreoleTypes::VARCHAR, 'bnubica', 'CODUBI', true, 15);

		$tMap->addForeignKey('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, 'tsuniadm', 'CODUNIADM', true, 30);

		$tMap->addForeignKey('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, 'opbenefi', 'CEDRIF', true, 15);

		$tMap->addForeignKey('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, 'npcatpre', 'CODCAT', true, 32);

		$tMap->addForeignKey('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, 'tsdefban', 'NUMCUE', true, 20);

		$tMap->addColumn('TIPMOVSAL', 'Tipmovsal', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('TIPMOVREN', 'Tipmovren', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONMINCON', 'Monmincon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONMAXCON', 'Monmaxcon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORREP', 'Porrep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMINI', 'Numini', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 