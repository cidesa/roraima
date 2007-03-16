<?php


	
class ActipdocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ActipdocMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('actipdoc');
		$tMap->setPhpName('Actipdoc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMDOC', 'Nomdoc', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('VIDUTIL', 'Vidutil', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 