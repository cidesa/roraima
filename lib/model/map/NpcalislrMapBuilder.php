<?php


	
class NpcalislrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcalislrMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npcalislr');
		$tMap->setPhpName('Npcalislr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('MESPER', 'Mesper', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('ANOPER', 'Anoper', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('REMUNE', 'Remune', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('IMPRET', 'Impret', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 