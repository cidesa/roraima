<?php


	
class FcrepliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrepliqMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrepliq');
		$tMap->setPhpName('Fcrepliq');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMREP', 'Numrep', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('ANO', 'Ano', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONING', 'Moning', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONIMP', 'Monimp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONBOM', 'Monbom', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 