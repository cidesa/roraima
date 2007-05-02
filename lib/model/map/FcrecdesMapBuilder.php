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

		$tMap->addPrimaryKey('CODREDE', 'Codrede', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('RECDES', 'Recdes', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DESREDE', 'Desrede', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 18);

		$tMap->addColumn('PORREDE', 'Porrede', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DIAS', 'Dias', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORCIEN', 'Porcien', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 