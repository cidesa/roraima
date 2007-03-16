<?php


	
class FaartnotMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaartnotMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('faartnot');
		$tMap->setPhpName('Faartnot');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NRONOT', 'Nronot', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMLOT', 'Numlot', 'string', CreoleTypes::VARCHAR, true, 25);

		$tMap->addColumn('CANSOL', 'Cansol', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANENT', 'Canent', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANDES', 'Candes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANAJU', 'Canaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANDEV', 'Candev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PREART', 'Preart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 