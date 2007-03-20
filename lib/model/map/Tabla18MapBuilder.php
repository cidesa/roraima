<?php


	
class Tabla18MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla18MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla18');
		$tMap->setPhpName('Tabla18');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAIMP', 'Staimp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 