<?php


	
class FcdetrepMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetrepMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdetrep');
		$tMap->setPhpName('Fcdetrep');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMREP', 'Numrep', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DESCRIP', 'Descrip', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 