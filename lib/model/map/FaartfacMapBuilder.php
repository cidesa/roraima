<?php



class FaartfacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaartfacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faartfac');
		$tMap->setPhpName('Faartfac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartfac_SEQ');

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 1500);

		$tMap->addColumn('CODREF', 'Codref', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PRECIO', 'Precio', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANAJU', 'Canaju', 'double', CreoleTypes::NUMERIC, false, 14);

        $tMap->addColumn('NRONOT', 'Nronot', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 