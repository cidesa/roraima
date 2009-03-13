<?php


abstract class BaseOcreglicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocreglic';

	
	const CLASS_DEFAULT = 'lib.model.Ocreglic';

	
	const NUM_COLUMNS = 31;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODLIC = 'ocreglic.CODLIC';

	
	const CODTIPLIC = 'ocreglic.CODTIPLIC';

	
	const DESLIC = 'ocreglic.DESLIC';

	
	const SITACT = 'ocreglic.SITACT';

	
	const ENTE = 'ocreglic.ENTE';

	
	const FECREG = 'ocreglic.FECREG';

	
	const FECEDI = 'ocreglic.FECEDI';

	
	const CODOBR = 'ocreglic.CODOBR';

	
	const FECDISDES = 'ocreglic.FECDISDES';

	
	const FECDISHAS = 'ocreglic.FECDISHAS';

	
	const COSTO = 'ocreglic.COSTO';

	
	const FORPAG = 'ocreglic.FORPAG';

	
	const DECRETOS = 'ocreglic.DECRETOS';

	
	const DIRRET = 'ocreglic.DIRRET';

	
	const PERCONTAC = 'ocreglic.PERCONTAC';

	
	const HORARET = 'ocreglic.HORARET';

	
	const PERIODICO = 'ocreglic.PERIODICO';

	
	const FECPUB = 'ocreglic.FECPUB';

	
	const PAGINA = 'ocreglic.PAGINA';

	
	const CUERPO = 'ocreglic.CUERPO';

	
	const MES = 'ocreglic.MES';

	
	const CODPAIEFEC = 'ocreglic.CODPAIEFEC';

	
	const CODPAIRECEP = 'ocreglic.CODPAIRECEP';

	
	const CODFIN = 'ocreglic.CODFIN';

	
	const FECOFER = 'ocreglic.FECOFER';

	
	const HORAOFER = 'ocreglic.HORAOFER';

	
	const DIROFER = 'ocreglic.DIROFER';

	
	const PERCONTACOFER = 'ocreglic.PERCONTACOFER';

	
	const CODCLACOMP = 'ocreglic.CODCLACOMP';

	
	const OBSERVACIONES = 'ocreglic.OBSERVACIONES';

	
	const ID = 'ocreglic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codlic', 'Codtiplic', 'Deslic', 'Sitact', 'Ente', 'Fecreg', 'Fecedi', 'Codobr', 'Fecdisdes', 'Fecdishas', 'Costo', 'Forpag', 'Decretos', 'Dirret', 'Percontac', 'Horaret', 'Periodico', 'Fecpub', 'Pagina', 'Cuerpo', 'Mes', 'Codpaiefec', 'Codpairecep', 'Codfin', 'Fecofer', 'Horaofer', 'Dirofer', 'Percontacofer', 'Codclacomp', 'Observaciones', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcreglicPeer::CODLIC, OcreglicPeer::CODTIPLIC, OcreglicPeer::DESLIC, OcreglicPeer::SITACT, OcreglicPeer::ENTE, OcreglicPeer::FECREG, OcreglicPeer::FECEDI, OcreglicPeer::CODOBR, OcreglicPeer::FECDISDES, OcreglicPeer::FECDISHAS, OcreglicPeer::COSTO, OcreglicPeer::FORPAG, OcreglicPeer::DECRETOS, OcreglicPeer::DIRRET, OcreglicPeer::PERCONTAC, OcreglicPeer::HORARET, OcreglicPeer::PERIODICO, OcreglicPeer::FECPUB, OcreglicPeer::PAGINA, OcreglicPeer::CUERPO, OcreglicPeer::MES, OcreglicPeer::CODPAIEFEC, OcreglicPeer::CODPAIRECEP, OcreglicPeer::CODFIN, OcreglicPeer::FECOFER, OcreglicPeer::HORAOFER, OcreglicPeer::DIROFER, OcreglicPeer::PERCONTACOFER, OcreglicPeer::CODCLACOMP, OcreglicPeer::OBSERVACIONES, OcreglicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codlic', 'codtiplic', 'deslic', 'sitact', 'ente', 'fecreg', 'fecedi', 'codobr', 'fecdisdes', 'fecdishas', 'costo', 'forpag', 'decretos', 'dirret', 'percontac', 'horaret', 'periodico', 'fecpub', 'pagina', 'cuerpo', 'mes', 'codpaiefec', 'codpairecep', 'codfin', 'fecofer', 'horaofer', 'dirofer', 'percontacofer', 'codclacomp', 'observaciones', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codlic' => 0, 'Codtiplic' => 1, 'Deslic' => 2, 'Sitact' => 3, 'Ente' => 4, 'Fecreg' => 5, 'Fecedi' => 6, 'Codobr' => 7, 'Fecdisdes' => 8, 'Fecdishas' => 9, 'Costo' => 10, 'Forpag' => 11, 'Decretos' => 12, 'Dirret' => 13, 'Percontac' => 14, 'Horaret' => 15, 'Periodico' => 16, 'Fecpub' => 17, 'Pagina' => 18, 'Cuerpo' => 19, 'Mes' => 20, 'Codpaiefec' => 21, 'Codpairecep' => 22, 'Codfin' => 23, 'Fecofer' => 24, 'Horaofer' => 25, 'Dirofer' => 26, 'Percontacofer' => 27, 'Codclacomp' => 28, 'Observaciones' => 29, 'Id' => 30, ),
		BasePeer::TYPE_COLNAME => array (OcreglicPeer::CODLIC => 0, OcreglicPeer::CODTIPLIC => 1, OcreglicPeer::DESLIC => 2, OcreglicPeer::SITACT => 3, OcreglicPeer::ENTE => 4, OcreglicPeer::FECREG => 5, OcreglicPeer::FECEDI => 6, OcreglicPeer::CODOBR => 7, OcreglicPeer::FECDISDES => 8, OcreglicPeer::FECDISHAS => 9, OcreglicPeer::COSTO => 10, OcreglicPeer::FORPAG => 11, OcreglicPeer::DECRETOS => 12, OcreglicPeer::DIRRET => 13, OcreglicPeer::PERCONTAC => 14, OcreglicPeer::HORARET => 15, OcreglicPeer::PERIODICO => 16, OcreglicPeer::FECPUB => 17, OcreglicPeer::PAGINA => 18, OcreglicPeer::CUERPO => 19, OcreglicPeer::MES => 20, OcreglicPeer::CODPAIEFEC => 21, OcreglicPeer::CODPAIRECEP => 22, OcreglicPeer::CODFIN => 23, OcreglicPeer::FECOFER => 24, OcreglicPeer::HORAOFER => 25, OcreglicPeer::DIROFER => 26, OcreglicPeer::PERCONTACOFER => 27, OcreglicPeer::CODCLACOMP => 28, OcreglicPeer::OBSERVACIONES => 29, OcreglicPeer::ID => 30, ),
		BasePeer::TYPE_FIELDNAME => array ('codlic' => 0, 'codtiplic' => 1, 'deslic' => 2, 'sitact' => 3, 'ente' => 4, 'fecreg' => 5, 'fecedi' => 6, 'codobr' => 7, 'fecdisdes' => 8, 'fecdishas' => 9, 'costo' => 10, 'forpag' => 11, 'decretos' => 12, 'dirret' => 13, 'percontac' => 14, 'horaret' => 15, 'periodico' => 16, 'fecpub' => 17, 'pagina' => 18, 'cuerpo' => 19, 'mes' => 20, 'codpaiefec' => 21, 'codpairecep' => 22, 'codfin' => 23, 'fecofer' => 24, 'horaofer' => 25, 'dirofer' => 26, 'percontacofer' => 27, 'codclacomp' => 28, 'observaciones' => 29, 'id' => 30, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcreglicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcreglicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcreglicPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(OcreglicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcreglicPeer::CODLIC);

		$criteria->addSelectColumn(OcreglicPeer::CODTIPLIC);

		$criteria->addSelectColumn(OcreglicPeer::DESLIC);

		$criteria->addSelectColumn(OcreglicPeer::SITACT);

		$criteria->addSelectColumn(OcreglicPeer::ENTE);

		$criteria->addSelectColumn(OcreglicPeer::FECREG);

		$criteria->addSelectColumn(OcreglicPeer::FECEDI);

		$criteria->addSelectColumn(OcreglicPeer::CODOBR);

		$criteria->addSelectColumn(OcreglicPeer::FECDISDES);

		$criteria->addSelectColumn(OcreglicPeer::FECDISHAS);

		$criteria->addSelectColumn(OcreglicPeer::COSTO);

		$criteria->addSelectColumn(OcreglicPeer::FORPAG);

		$criteria->addSelectColumn(OcreglicPeer::DECRETOS);

		$criteria->addSelectColumn(OcreglicPeer::DIRRET);

		$criteria->addSelectColumn(OcreglicPeer::PERCONTAC);

		$criteria->addSelectColumn(OcreglicPeer::HORARET);

		$criteria->addSelectColumn(OcreglicPeer::PERIODICO);

		$criteria->addSelectColumn(OcreglicPeer::FECPUB);

		$criteria->addSelectColumn(OcreglicPeer::PAGINA);

		$criteria->addSelectColumn(OcreglicPeer::CUERPO);

		$criteria->addSelectColumn(OcreglicPeer::MES);

		$criteria->addSelectColumn(OcreglicPeer::CODPAIEFEC);

		$criteria->addSelectColumn(OcreglicPeer::CODPAIRECEP);

		$criteria->addSelectColumn(OcreglicPeer::CODFIN);

		$criteria->addSelectColumn(OcreglicPeer::FECOFER);

		$criteria->addSelectColumn(OcreglicPeer::HORAOFER);

		$criteria->addSelectColumn(OcreglicPeer::DIROFER);

		$criteria->addSelectColumn(OcreglicPeer::PERCONTACOFER);

		$criteria->addSelectColumn(OcreglicPeer::CODCLACOMP);

		$criteria->addSelectColumn(OcreglicPeer::OBSERVACIONES);

		$criteria->addSelectColumn(OcreglicPeer::ID);

	}

	const COUNT = 'COUNT(ocreglic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocreglic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcreglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcreglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcreglicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = OcreglicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcreglicPeer::populateObjects(OcreglicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcreglicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcreglicPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return OcreglicPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcreglicPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(OcreglicPeer::ID);
			$selectCriteria->add(OcreglicPeer::ID, $criteria->remove(OcreglicPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(OcreglicPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(OcreglicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocreglic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcreglicPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Ocreglic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcreglicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcreglicPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(OcreglicPeer::DATABASE_NAME, OcreglicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcreglicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(OcreglicPeer::DATABASE_NAME);

		$criteria->add(OcreglicPeer::ID, $pk);


		$v = OcreglicPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(OcreglicPeer::ID, $pks, Criteria::IN);
			$objs = OcreglicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcreglicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcreglicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcreglicMapBuilder');
}
