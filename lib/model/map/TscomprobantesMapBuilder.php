<?php


	
class TscomprobantesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TscomprobantesMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tscomprobantes');
		$tMap->setPhpName('Tscomprobantes');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('ANO', 'Ano', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MES', 'Mes', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('COMPROBANTE', 'Comprobante', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 