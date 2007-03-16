<?php


abstract class BaseBndefconiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndefconi';

	
	const CLASS_DEFAULT = 'lib.model.Bndefconi';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bndefconi.CODACT';

	
	const CODINM = 'bndefconi.CODINM';

	
	const CTADEPCAR = 'bndefconi.CTADEPCAR';

	
	const CTADEPABO = 'bndefconi.CTADEPABO';

	
	const CTAAJUCAR = 'bndefconi.CTAAJUCAR';

	
	const CTAAJUABO = 'bndefconi.CTAAJUABO';

	
	const CTAREVCAR = 'bndefconi.CTAREVCAR';

	
	const CTAREVABO = 'bndefconi.CTAREVABO';

	
	const STACTA = 'bndefconi.STACTA';

	
	const CTAPERCAR = 'bndefconi.CTAPERCAR';

	
	const CTAPERABO = 'bndefconi.CTAPERABO';

	
	const ID = 'bndefconi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codinm', 'Ctadepcar', 'Ctadepabo', 'Ctaajucar', 'Ctaajuabo', 'Ctarevcar', 'Ctarevabo', 'Stacta', 'Ctapercar', 'Ctaperabo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndefconiPeer::CODACT, BndefconiPeer::CODINM, BndefconiPeer::CTADEPCAR, BndefconiPeer::CTADEPABO, BndefconiPeer::CTAAJUCAR, BndefconiPeer::CTAAJUABO, BndefconiPeer::CTAREVCAR, BndefconiPeer::CTAREVABO, BndefconiPeer::STACTA, BndefconiPeer::CTAPERCAR, BndefconiPeer::CTAPERABO, BndefconiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codinm', 'ctadepcar', 'ctadepabo', 'ctaajucar', 'ctaajuabo', 'ctarevcar', 'ctarevabo', 'stacta', 'ctapercar', 'ctaperabo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codinm' => 1, 'Ctadepcar' => 2, 'Ctadepabo' => 3, 'Ctaajucar' => 4, 'Ctaajuabo' => 5, 'Ctarevcar' => 6, 'Ctarevabo' => 7, 'Stacta' => 8, 'Ctapercar' => 9, 'Ctaperabo' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (BndefconiPeer::CODACT => 0, BndefconiPeer::CODINM => 1, BndefconiPeer::CTADEPCAR => 2, BndefconiPeer::CTADEPABO => 3, BndefconiPeer::CTAAJUCAR => 4, BndefconiPeer::CTAAJUABO => 5, BndefconiPeer::CTAREVCAR => 6, BndefconiPeer::CTAREVABO => 7, BndefconiPeer::STACTA => 8, BndefconiPeer::CTAPERCAR => 9, BndefconiPeer::CTAPERABO => 10, BndefconiPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codinm' => 1, 'ctadepcar' => 2, 'ctadepabo' => 3, 'ctaajucar' => 4, 'ctaajuabo' => 5, 'ctarevcar' => 6, 'ctarevabo' => 7, 'stacta' => 8, 'ctapercar' => 9, 'ctaperabo' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndefconiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndefconiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndefconiPeer::getTableMap();
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
		return str_replace(BndefconiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndefconiPeer::CODACT);

		$criteria->addSelectColumn(BndefconiPeer::CODINM);

		$criteria->addSelectColumn(BndefconiPeer::CTADEPCAR);

		$criteria->addSelectColumn(BndefconiPeer::CTADEPABO);

		$criteria->addSelectColumn(BndefconiPeer::CTAAJUCAR);

		$criteria->addSelectColumn(BndefconiPeer::CTAAJUABO);

		$criteria->addSelectColumn(BndefconiPeer::CTAREVCAR);

		$criteria->addSelectColumn(BndefconiPeer::CTAREVABO);

		$criteria->addSelectColumn(BndefconiPeer::STACTA);

		$criteria->addSelectColumn(BndefconiPeer::CTAPERCAR);

		$criteria->addSelectColumn(BndefconiPeer::CTAPERABO);

		$criteria->addSelectColumn(BndefconiPeer::ID);

	}

	const COUNT = 'COUNT(bndefconi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndefconi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndefconiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndefconiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndefconiPeer::doSelectRS($criteria, $con);
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
		$objects = BndefconiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndefconiPeer::populateObjects(BndefconiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndefconiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndefconiPeer::getOMClass();
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
		return BndefconiPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(BndefconiPeer::ID);
			$selectCriteria->add(BndefconiPeer::ID, $criteria->remove(BndefconiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BndefconiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BndefconiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bndefconi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndefconiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bndefconi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndefconiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndefconiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BndefconiPeer::DATABASE_NAME, BndefconiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndefconiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BndefconiPeer::DATABASE_NAME);

		$criteria->add(BndefconiPeer::ID, $pk);


		$v = BndefconiPeer::doSelect($criteria, $con);

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
			$criteria->add(BndefconiPeer::ID, $pks, Criteria::IN);
			$objs = BndefconiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndefconiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndefconiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndefconiMapBuilder');
}
