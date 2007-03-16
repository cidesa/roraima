<?php


	
class CaresordcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaresordcomMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caresordcom');
		$tMap->setPhpName('Caresordcom');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESRES', 'Desres', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODARTPRO', 'Codartpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CANORD', 'Canord', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANAJU', 'Canaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANREC', 'Canrec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('COSTO', 'Costo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RGOART', 'Rgoart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 