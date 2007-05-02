<?php


	
class Fcregveh1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Fcregveh1MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcregveh1');
		$tMap->setPhpName('Fcregveh1');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('PLAVEH', 'Plaveh', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('ANOVEH', 'Anoveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('SERMOT', 'Sermot', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('SERCAR', 'Sercar', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MARVEH', 'Marveh', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('COLVEH', 'Colveh', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('IMPVEH', 'Impveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALACT', 'Salact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALANT', 'Salant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALORI', 'Valori', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ABOVEH', 'Aboveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MORVEH', 'Morveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DESVEH', 'Desveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ESTVEH', 'Estveh', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('OBSVEH', 'Obsveh', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('MODVEH', 'Modveh', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DUEANT', 'Dueant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRANT', 'Dirant', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PLAANT', 'Plaant', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('ESTDEC', 'Estdec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CLACON', 'Clacon', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('CAPVEH', 'Capveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PESVEH', 'Pesveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPVEH', 'Tipveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECACT', 'Fecact', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 