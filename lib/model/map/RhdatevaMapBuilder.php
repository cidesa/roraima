<?php


	
class RhdatevaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdatevaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rhdateva');
		$tMap->setPhpName('Rhdateva');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEVDO', 'Codevdo', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODEVOR', 'Codevor', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODSUP', 'Codsup', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECELA', 'Fecela', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 