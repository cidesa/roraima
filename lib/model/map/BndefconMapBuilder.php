<?php



class BndefconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndefconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndefcon');
		$tMap->setPhpName('Bndefcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndefcon_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CTADEPCAR', 'Ctadepcar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTADEPABO', 'Ctadepabo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAAJUCAR', 'Ctaajucar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAAJUABO', 'Ctaajuabo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAREVCAR', 'Ctarevcar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAREVABO', 'Ctarevabo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('STACTA', 'Stacta', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CTAPERCAR', 'Ctapercar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAPERABO', 'Ctaperabo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 