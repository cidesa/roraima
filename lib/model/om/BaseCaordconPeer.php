<?php


abstract class BaseCaordconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caordcon';

	
	const CLASS_DEFAULT = 'lib.model.Caordcon';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDCON = 'caordcon.ORDCON';

	
	const FECCON = 'caordcon.FECCON';

	
	const TIPCON = 'caordcon.TIPCON';

	
	const CODPRO = 'caordcon.CODPRO';

	
	const DESCON = 'caordcon.DESCON';

	
	const OBJCON = 'caordcon.OBJCON';

	
	const FECINI = 'caordcon.FECINI';

	
	const FECCUL = 'caordcon.FECCUL';

	
	const MULATRINI = 'caordcon.MULATRINI';

	
	const LAPGAR = 'caordcon.LAPGAR';

	
	const MULATRCUL = 'caordcon.MULATRCUL';

	
	const STACON = 'caordcon.STACON';

	
	const MONCON = 'caordcon.MONCON';

	
	const FECANU = 'caordcon.FECANU';

	
	const CANCUO = 'caordcon.CANCUO';

	
	const ID = 'caordcon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcon', 'Feccon', 'Tipcon', 'Codpro', 'Descon', 'Objcon', 'Fecini', 'Feccul', 'Mulatrini', 'Lapgar', 'Mulatrcul', 'Stacon', 'Moncon', 'Fecanu', 'Cancuo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaordconPeer::ORDCON, CaordconPeer::FECCON, CaordconPeer::TIPCON, CaordconPeer::CODPRO, CaordconPeer::DESCON, CaordconPeer::OBJCON, CaordconPeer::FECINI, CaordconPeer::FECCUL, CaordconPeer::MULATRINI, CaordconPeer::LAPGAR, CaordconPeer::MULATRCUL, CaordconPeer::STACON, CaordconPeer::MONCON, CaordconPeer::FECANU, CaordconPeer::CANCUO, CaordconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcon', 'feccon', 'tipcon', 'codpro', 'descon', 'objcon', 'fecini', 'feccul', 'mulatrini', 'lapgar', 'mulatrcul', 'stacon', 'moncon', 'fecanu', 'cancuo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcon' => 0, 'Feccon' => 1, 'Tipcon' => 2, 'Codpro' => 3, 'Descon' => 4, 'Objcon' => 5, 'Fecini' => 6, 'Feccul' => 7, 'Mulatrini' => 8, 'Lapgar' => 9, 'Mulatrcul' => 10, 'Stacon' => 11, 'Moncon' => 12, 'Fecanu' => 13, 'Cancuo' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (CaordconPeer::ORDCON => 0, CaordconPeer::FECCON => 1, CaordconPeer::TIPCON => 2, CaordconPeer::CODPRO => 3, CaordconPeer::DESCON => 4, CaordconPeer::OBJCON => 5, CaordconPeer::FECINI => 6, CaordconPeer::FECCUL => 7, CaordconPeer::MULATRINI => 8, CaordconPeer::LAPGAR => 9, CaordconPeer::MULATRCUL => 10, CaordconPeer::STACON => 11, CaordconPeer::MONCON => 12, CaordconPeer::FECANU => 13, CaordconPeer::CANCUO => 14, CaordconPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcon' => 0, 'feccon' => 1, 'tipcon' => 2, 'codpro' => 3, 'descon' => 4, 'objcon' => 5, 'fecini' => 6, 'feccul' => 7, 'mulatrini' => 8, 'lapgar' => 9, 'mulatrcul' => 10, 'stacon' => 11, 'moncon' => 12, 'fecanu' => 13, 'cancuo' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaordconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaordconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaordconPeer::getTableMap();
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
		return str_replace(CaordconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaordconPeer::ORDCON);

		$criteria->addSelectColumn(CaordconPeer::FECCON);

		$criteria->addSelectColumn(CaordconPeer::TIPCON);

		$criteria->addSelectColumn(CaordconPeer::CODPRO);

		$criteria->addSelectColumn(CaordconPeer::DESCON);

		$criteria->addSelectColumn(CaordconPeer::OBJCON);

		$criteria->addSelectColumn(CaordconPeer::FECINI);

		$criteria->addSelectColumn(CaordconPeer::FECCUL);

		$criteria->addSelectColumn(CaordconPeer::MULATRINI);

		$criteria->addSelectColumn(CaordconPeer::LAPGAR);

		$criteria->addSelectColumn(CaordconPeer::MULATRCUL);

		$criteria->addSelectColumn(CaordconPeer::STACON);

		$criteria->addSelectColumn(CaordconPeer::MONCON);

		$criteria->addSelectColumn(CaordconPeer::FECANU);

		$criteria->addSelectColumn(CaordconPeer::CANCUO);

		$criteria->addSelectColumn(CaordconPeer::ID);

	}

	const COUNT = 'COUNT(caordcon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caordcon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaordconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaordconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaordconPeer::doSelectRS($criteria, $con);
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
		$objects = CaordconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaordconPeer::populateObjects(CaordconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaordconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaordconPeer::getOMClass();
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
		return CaordconPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CaordconPeer::ID);
			$selectCriteria->add(CaordconPeer::ID, $criteria->remove(CaordconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaordconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaordconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caordcon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaordconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caordcon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaordconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaordconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaordconPeer::DATABASE_NAME, CaordconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaordconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaordconPeer::DATABASE_NAME);

		$criteria->add(CaordconPeer::ID, $pk);


		$v = CaordconPeer::doSelect($criteria, $con);

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
			$criteria->add(CaordconPeer::ID, $pks, Criteria::IN);
			$objs = CaordconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaordconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaordconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaordconMapBuilder');
}
