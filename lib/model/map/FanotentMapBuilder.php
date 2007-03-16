<?php


	
class FanotentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FanotentMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fanotent');
		$tMap->setPhpName('Fanotent');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NRONOT', 'Nronot', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECNOT', 'Fecnot', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('TIPREF', 'Tipref', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODREF', 'Codref', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESNOT', 'Desnot', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONNOT', 'Monnot', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('OBSNOT', 'Obsnot', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPNOT', 'Tipnot', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('RIFENT', 'Rifent', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMENT', 'Noment', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('AUTORI', 'Autori', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECAUT', 'Fecaut', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('AUTPOR', 'Autpor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 