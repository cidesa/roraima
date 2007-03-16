<?php


	
class NpcestaticketsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcestaticketsMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npcestatickets');
		$tMap->setPhpName('Npcestatickets');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('MONPOR', 'Monpor', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VALTIC', 'Valtic', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMTIC', 'Numtic', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMDIA', 'Numdia', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIAHAB', 'Diahab', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SABADO', 'Sabado', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DOMING', 'Doming', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIAFER', 'Diafer', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 