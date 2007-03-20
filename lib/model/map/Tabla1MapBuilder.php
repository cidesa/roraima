<?php


	
class Tabla1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla1MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla1');
		$tMap->setPhpName('Tabla1');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('ANOPRE', 'Anopre', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONPRC', 'Monprc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONCAU', 'Moncau', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTRA', 'Montra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTRN', 'Montrn', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONADI', 'Monadi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONDIM', 'Mondim', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONDIS', 'Mondis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIFERE', 'Difere', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 