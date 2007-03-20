<?php


	
class NpvacdisfruteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvacdisfruteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npvacdisfrute');
		$tMap->setPhpName('Npvacdisfrute');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PERINI', 'Perini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PERFIN', 'Perfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIASDISFUTAR', 'Diasdisfutar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIASDISFRUTADOS', 'Diasdisfrutados', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 