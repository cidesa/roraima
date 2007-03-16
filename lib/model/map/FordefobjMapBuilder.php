<?php


	
class FordefobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefobjMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefobj');
		$tMap->setPhpName('Fordefobj');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODOBJ', 'Codobj', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESOBJ', 'Desobj', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('AREEST', 'Areest', 'string', CreoleTypes::VARCHAR, false, 1500);

		$tMap->addColumn('DIREST', 'Direst', 'string', CreoleTypes::VARCHAR, false, 1500);

		$tMap->addColumn('OBJEIN', 'Objein', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBJEPR', 'Objepr', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ENUPRO', 'Enupro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('INDACT', 'Indact', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('INDOBJ', 'Indobj', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('METPRO', 'Metpro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBJNET', 'Objnet', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 