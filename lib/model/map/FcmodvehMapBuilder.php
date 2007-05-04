<?php


	
class FcmodvehMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcmodvehMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcmodveh');
		$tMap->setPhpName('Fcmodveh');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFMOD', 'Refmod', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('PLAVEH', 'Plaveh', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECMOD', 'Fecmod', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('ANOVEH', 'Anoveh', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('SERMOT', 'Sermot', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('SERCAR', 'Sercar', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MARVEH', 'Marveh', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('COLVEH', 'Colveh', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('VALORI', 'Valori', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MODVEH', 'Modveh', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DUEANT', 'Dueant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRANT', 'Dirant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PLAANT', 'Plaant', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODUSOANT', 'Codusoant', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('ANOVEHANT', 'Anovehant', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('SERMOTANT', 'Sermotant', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('SERCARANT', 'Sercarant', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MARVEHANT', 'Marvehant', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('COLVEHANT', 'Colvehant', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('VALORIANT', 'Valoriant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MODVEHANT', 'Modvehant', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DUEANTANT', 'Dueantant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRANTANT', 'Dirantant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PLAANTANT', 'Plaantant', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 