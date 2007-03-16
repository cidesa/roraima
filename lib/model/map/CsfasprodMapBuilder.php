<?php


	
class CsfasprodMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsfasprodMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('csfasprod');
		$tMap->setPhpName('Csfasprod');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODFAS', 'Codfas', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DURACION', 'Duracion', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 