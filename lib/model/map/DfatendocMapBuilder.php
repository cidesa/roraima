<?php


	
class DfatendocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DfatendocMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dfatendoc');
		$tMap->setPhpName('Dfatendoc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODDOC', 'Coddoc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('OBSDOC', 'Obsdoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STAATE', 'Staate', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addForeignKey('ID_DFTABTIP', 'IdDftabtip', 'int', CreoleTypes::INTEGER, 'dftabtip', 'ID', false, null);

		$tMap->addColumn('ANUATE', 'Anuate', 'int', CreoleTypes::INTEGER, false);

		$tMap->addColumn('ESTADO', 'Estado', 'int', CreoleTypes::INTEGER, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 