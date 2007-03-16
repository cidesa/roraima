<?php


	
class FacorrelatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FacorrelatMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('facorrelat');
		$tMap->setPhpName('Facorrelat');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRE', 'Codpre', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CODPED', 'Codped', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CODFAC', 'Codfac', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CODNOT', 'Codnot', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CODDPH', 'Coddph', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CODDEV', 'Coddev', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CODAJU', 'Codaju', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 