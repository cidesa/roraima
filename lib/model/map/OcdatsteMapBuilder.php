<?php


	
class OcdatsteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcdatsteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocdatste');
		$tMap->setPhpName('Ocdatste');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CEDSTE', 'Cedste', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMSTE', 'Nomste', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODSTE', 'Codste', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DIRSTE', 'Dirste', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELSTE', 'Telste', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXSTE', 'Faxste', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMASTE', 'Emaste', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CEDREP', 'Cedrep', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMREP', 'Nomrep', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRREP', 'Dirrep', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELREP', 'Telrep', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXREP', 'Faxrep', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAREP', 'Emarep', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 