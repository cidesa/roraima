<?php



class ForpryorgpubMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForpryorgpubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forpryorgpub');
		$tMap->setPhpName('Forpryorgpub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forpryorgpub_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('MONAPO', 'Monapo', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('RESEJE', 'Reseje', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPCNX', 'Tipcnx', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DETOBS', 'Detobs', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('REQACC', 'Reqacc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CONCOMOTRPRY', 'Concomotrpry', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ENTCFLPRY', 'Entcflpry', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
