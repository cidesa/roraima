<?php


	
class DfrutadocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DfrutadocMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dfrutadoc');
		$tMap->setPhpName('Dfrutadoc');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_ACUNIDAD', 'IdAcunidad', 'int', CreoleTypes::INTEGER, 'acunidad', 'ID', true, null);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('RUTDOC', 'Rutdoc', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('DIADOC', 'Diadoc', 'int', CreoleTypes::INTEGER, true);
				
    } 
} 