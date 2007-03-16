<?php


abstract class BaseCpcausadPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpcausad';

	
	const CLASS_DEFAULT = 'lib.model.Cpcausad';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCAU = 'cpcausad.REFCAU';

	
	const TIPCAU = 'cpcausad.TIPCAU';

	
	const FECCAU = 'cpcausad.FECCAU';

	
	const ANOCAU = 'cpcausad.ANOCAU';

	
	const REFCOM = 'cpcausad.REFCOM';

	
	const TIPCOM = 'cpcausad.TIPCOM';

	
	const DESCAU = 'cpcausad.DESCAU';

	
	const DESANU = 'cpcausad.DESANU';

	
	const MONCAU = 'cpcausad.MONCAU';

	
	const SALPAG = 'cpcausad.SALPAG';

	
	const SALAJU = 'cpcausad.SALAJU';

	
	const STACAU = 'cpcausad.STACAU';

	
	const FECANU = 'cpcausad.FECANU';

	
	const CEDRIF = 'cpcausad.CEDRIF';

	
	const ID = 'cpcausad.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau', 'Tipcau', 'Feccau', 'Anocau', 'Refcom', 'Tipcom', 'Descau', 'Desanu', 'Moncau', 'Salpag', 'Salaju', 'Stacau', 'Fecanu', 'Cedrif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpcausadPeer::REFCAU, CpcausadPeer::TIPCAU, CpcausadPeer::FECCAU, CpcausadPeer::ANOCAU, CpcausadPeer::REFCOM, CpcausadPeer::TIPCOM, CpcausadPeer::DESCAU, CpcausadPeer::DESANU, CpcausadPeer::MONCAU, CpcausadPeer::SALPAG, CpcausadPeer::SALAJU, CpcausadPeer::STACAU, CpcausadPeer::FECANU, CpcausadPeer::CEDRIF, CpcausadPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau', 'tipcau', 'feccau', 'anocau', 'refcom', 'tipcom', 'descau', 'desanu', 'moncau', 'salpag', 'salaju', 'stacau', 'fecanu', 'cedrif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau' => 0, 'Tipcau' => 1, 'Feccau' => 2, 'Anocau' => 3, 'Refcom' => 4, 'Tipcom' => 5, 'Descau' => 6, 'Desanu' => 7, 'Moncau' => 8, 'Salpag' => 9, 'Salaju' => 10, 'Stacau' => 11, 'Fecanu' => 12, 'Cedrif' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (CpcausadPeer::REFCAU => 0, CpcausadPeer::TIPCAU => 1, CpcausadPeer::FECCAU => 2, CpcausadPeer::ANOCAU => 3, CpcausadPeer::REFCOM => 4, CpcausadPeer::TIPCOM => 5, CpcausadPeer::DESCAU => 6, CpcausadPeer::DESANU => 7, CpcausadPeer::MONCAU => 8, CpcausadPeer::SALPAG => 9, CpcausadPeer::SALAJU => 10, CpcausadPeer::STACAU => 11, CpcausadPeer::FECANU => 12, CpcausadPeer::CEDRIF => 13, CpcausadPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau' => 0, 'tipcau' => 1, 'feccau' => 2, 'anocau' => 3, 'refcom' => 4, 'tipcom' => 5, 'descau' => 6, 'desanu' => 7, 'moncau' => 8, 'salpag' => 9, 'salaju' => 10, 'stacau' => 11, 'fecanu' => 12, 'cedrif' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpcausadMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpcausadMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpcausadPeer::getTableMap();
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
		return str_replace(CpcausadPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpcausadPeer::REFCAU);

		$criteria->addSelectColumn(CpcausadPeer::TIPCAU);

		$criteria->addSelectColumn(CpcausadPeer::FECCAU);

		$criteria->addSelectColumn(CpcausadPeer::ANOCAU);

		$criteria->addSelectColumn(CpcausadPeer::REFCOM);

		$criteria->addSelectColumn(CpcausadPeer::TIPCOM);

		$criteria->addSelectColumn(CpcausadPeer::DESCAU);

		$criteria->addSelectColumn(CpcausadPeer::DESANU);

		$criteria->addSelectColumn(CpcausadPeer::MONCAU);

		$criteria->addSelectColumn(CpcausadPeer::SALPAG);

		$criteria->addSelectColumn(CpcausadPeer::SALAJU);

		$criteria->addSelectColumn(CpcausadPeer::STACAU);

		$criteria->addSelectColumn(CpcausadPeer::FECANU);

		$criteria->addSelectColumn(CpcausadPeer::CEDRIF);

		$criteria->addSelectColumn(CpcausadPeer::ID);

	}

	const COUNT = 'COUNT(cpcausad.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpcausad.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcausadPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcausadPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpcausadPeer::doSelectRS($criteria, $con);
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
		$objects = CpcausadPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpcausadPeer::populateObjects(CpcausadPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpcausadPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpcausadPeer::getOMClass();
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
		return CpcausadPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(CpcausadPeer::ID);
			$selectCriteria->add(CpcausadPeer::ID, $criteria->remove(CpcausadPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpcausadPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpcausadPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpcausad) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpcausadPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpcausad $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpcausadPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpcausadPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpcausadPeer::DATABASE_NAME, CpcausadPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpcausadPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpcausadPeer::DATABASE_NAME);

		$criteria->add(CpcausadPeer::ID, $pk);


		$v = CpcausadPeer::doSelect($criteria, $con);

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
			$criteria->add(CpcausadPeer::ID, $pks, Criteria::IN);
			$objs = CpcausadPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpcausadPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpcausadMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpcausadMapBuilder');
}
