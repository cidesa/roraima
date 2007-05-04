<?php


	
class FcusovehMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcusovehMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcusoveh');
		$tMap->setPhpName('Fcusoveh');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESUSO', 'Desuso', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MONAFO', 'Monafo', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('PORALI', 'Porali', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('ANOLIM', 'Anolim', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, true);
				
    } 
} 