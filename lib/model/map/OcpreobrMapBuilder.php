<?php


	
class OcpreobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcpreobrMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocpreobr');
		$tMap->setPhpName('Ocpreobr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CANOBR', 'Canobr', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANCON', 'Cancon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANCONFIN', 'Canconfin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ADIPAR', 'Adipar', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('COSUNI', 'Cosuni', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('COSUNIFIN', 'Cosunifin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 