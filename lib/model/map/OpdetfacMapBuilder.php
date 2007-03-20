<?php


	
class OpdetfacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdetfacMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('opdetfac');
		$tMap->setPhpName('Opdetfac');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESDET', 'Desdet', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MONDET', 'Mondet', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 