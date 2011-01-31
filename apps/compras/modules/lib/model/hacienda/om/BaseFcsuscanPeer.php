<?php


abstract class BaseFcsuscanPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcsuscan';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcsuscan';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSUS = 'fcsuscan.NUMSUS';

	
	const NUMSOL = 'fcsuscan.NUMSOL';

	
	const NUMLIC = 'fcsuscan.NUMLIC';

	
	const ESTLIC = 'fcsuscan.ESTLIC';

	
	const MOTSUS = 'fcsuscan.MOTSUS';

	
	const FECSUS = 'fcsuscan.FECSUS';

	
	const RESOLU = 'fcsuscan.RESOLU';

	
	const TOMO = 'fcsuscan.TOMO';

	
	const FOLIO = 'fcsuscan.FOLIO';

	
	const NUMERO = 'fcsuscan.NUMERO';

	
	const FUNSUS = 'fcsuscan.FUNSUS';

	
	const ID = 'fcsuscan.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsus', 'Numsol', 'Numlic', 'Estlic', 'Motsus', 'Fecsus', 'Resolu', 'Tomo', 'Folio', 'Numero', 'Funsus', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcsuscanPeer::NUMSUS, FcsuscanPeer::NUMSOL, FcsuscanPeer::NUMLIC, FcsuscanPeer::ESTLIC, FcsuscanPeer::MOTSUS, FcsuscanPeer::FECSUS, FcsuscanPeer::RESOLU, FcsuscanPeer::TOMO, FcsuscanPeer::FOLIO, FcsuscanPeer::NUMERO, FcsuscanPeer::FUNSUS, FcsuscanPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsus', 'numsol', 'numlic', 'estlic', 'motsus', 'fecsus', 'resolu', 'tomo', 'folio', 'numero', 'funsus', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsus' => 0, 'Numsol' => 1, 'Numlic' => 2, 'Estlic' => 3, 'Motsus' => 4, 'Fecsus' => 5, 'Resolu' => 6, 'Tomo' => 7, 'Folio' => 8, 'Numero' => 9, 'Funsus' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (FcsuscanPeer::NUMSUS => 0, FcsuscanPeer::NUMSOL => 1, FcsuscanPeer::NUMLIC => 2, FcsuscanPeer::ESTLIC => 3, FcsuscanPeer::MOTSUS => 4, FcsuscanPeer::FECSUS => 5, FcsuscanPeer::RESOLU => 6, FcsuscanPeer::TOMO => 7, FcsuscanPeer::FOLIO => 8, FcsuscanPeer::NUMERO => 9, FcsuscanPeer::FUNSUS => 10, FcsuscanPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('numsus' => 0, 'numsol' => 1, 'numlic' => 2, 'estlic' => 3, 'motsus' => 4, 'fecsus' => 5, 'resolu' => 6, 'tomo' => 7, 'folio' => 8, 'numero' => 9, 'funsus' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcsuscanMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcsuscanMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcsuscanPeer::getTableMap();
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
		return str_replace(FcsuscanPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcsuscanPeer::NUMSUS);

		$criteria->addSelectColumn(FcsuscanPeer::NUMSOL);

		$criteria->addSelectColumn(FcsuscanPeer::NUMLIC);

		$criteria->addSelectColumn(FcsuscanPeer::ESTLIC);

		$criteria->addSelectColumn(FcsuscanPeer::MOTSUS);

		$criteria->addSelectColumn(FcsuscanPeer::FECSUS);

		$criteria->addSelectColumn(FcsuscanPeer::RESOLU);

		$criteria->addSelectColumn(FcsuscanPeer::TOMO);

		$criteria->addSelectColumn(FcsuscanPeer::FOLIO);

		$criteria->addSelectColumn(FcsuscanPeer::NUMERO);

		$criteria->addSelectColumn(FcsuscanPeer::FUNSUS);

		$criteria->addSelectColumn(FcsuscanPeer::ID);

	}

	const COUNT = 'COUNT(fcsuscan.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcsuscan.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcsuscanPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcsuscanPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcsuscanPeer::doSelectRS($criteria, $con);
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
		$objects = FcsuscanPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcsuscanPeer::populateObjects(FcsuscanPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcsuscanPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcsuscanPeer::getOMClass();
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
		return FcsuscanPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcsuscanPeer::ID); 

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
			$comparison = $criteria->getComparison(FcsuscanPeer::ID);
			$selectCriteria->add(FcsuscanPeer::ID, $criteria->remove(FcsuscanPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcsuscanPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcsuscanPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcsuscan) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcsuscanPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcsuscan $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcsuscanPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcsuscanPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcsuscanPeer::DATABASE_NAME, FcsuscanPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcsuscanPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcsuscanPeer::DATABASE_NAME);

		$criteria->add(FcsuscanPeer::ID, $pk);


		$v = FcsuscanPeer::doSelect($criteria, $con);

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
			$criteria->add(FcsuscanPeer::ID, $pks, Criteria::IN);
			$objs = FcsuscanPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcsuscanPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcsuscanMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcsuscanMapBuilder');
}
