<?php


	
class TsmovbanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsmovbanMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsmovban');
		$tMap->setPhpName('Tsmovban');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('REFBAN', 'Refban', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECBAN', 'Fecban', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESBAN', 'Desban', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TRANSITO', 'Transito', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STACON1', 'Stacon1', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 