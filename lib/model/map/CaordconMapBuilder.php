<?php


	
class CaordconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaordconMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caordcon');
		$tMap->setPhpName('Caordcon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('ORDCON', 'Ordcon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('TIPCON', 'Tipcon', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBJCON', 'Objcon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MULATRINI', 'Mulatrini', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LAPGAR', 'Lapgar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MULATRCUL', 'Mulatrcul', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CANCUO', 'Cancuo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 