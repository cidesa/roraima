<?php


	
class CadetcotMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadetcotMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cadetcot');
		$tMap->setPhpName('Cadetcot');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCOT', 'Refcot', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANORD', 'Canord', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('COSTO', 'Costo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTDET', 'Totdet', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('PRIORI', 'Priori', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('JUSTIFICA', 'Justifica', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 