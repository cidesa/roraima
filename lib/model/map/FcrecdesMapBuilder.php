<?php


	
class FcrecdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrecdesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrecdes');
		$tMap->setPhpName('Fcrecdes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODREDE', 'Codrede', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('RECDES', 'Recdes', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('DESREDE', 'Desrede', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 18);

		$tMap->addColumn('PORREDE', 'Porrede', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DIAS', 'Dias', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORCIEN', 'Porcien', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 