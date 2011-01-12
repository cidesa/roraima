<?php



class CacotizaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CacotizaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cacotiza');
		$tMap->setPhpName('Cacotiza');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cacotiza_SEQ');

		$tMap->addColumn('REFCOT', 'Refcot', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCOT', 'Feccot', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, 'caprovee', 'CODPRO', true, 15);

		$tMap->addColumn('DESCOT', 'Descot', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('MONCOT', 'Moncot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CONPAG', 'Conpag', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FORENT', 'Forent', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PRIORI', 'Priori', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, 'tsdesmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('REFPRO', 'Refpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CORREL', 'Correl', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('PORVAN', 'Porvan', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORANT', 'Porant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSCOT', 'Obscot', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 