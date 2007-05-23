<?php


	
class DfatendocdefMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DfatendocdefMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dfatendocdef');
		$tMap->setPhpName('Dfatendocdef');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignKey('ID_DFATENDOC', 'IdDfatendoc', 'int', CreoleTypes::INTEGER, 'dfatendoc', 'ID', true, null);

		$tMap->addColumn('ID_USUARIOS', 'IdUsuarios', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('HORREC', 'Horrec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECATE', 'Fecate', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('HORATE', 'Horate', 'int', CreoleTypes::DATE, false);

		$tMap->addForeignKey('ID_NUMUNI', 'IdNumuni', 'int', CreoleTypes::INTEGER, 'acunidad', 'ID', false, null);

		$tMap->addForeignKey('ID_NUMUNIORI', 'IdNumuniori', 'int', CreoleTypes::INTEGER, 'acunidad', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_DFRUTADOC', 'IdDfrutadoc', 'int', CreoleTypes::INTEGER, 'dfrutadoc', 'ID', true, null);
				
    } 
} 