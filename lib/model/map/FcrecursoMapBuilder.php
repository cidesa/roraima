<?php


	
class FcrecursoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrecursoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrecurso');
		$tMap->setPhpName('Fcrecurso');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODING', 'Coding', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESING', 'Desing', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 