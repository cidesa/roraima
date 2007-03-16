<?php


abstract class BaseFordefegrgenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefegrgen';

	
	const CLASS_DEFAULT = 'lib.model.Fordefegrgen';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'fordefegrgen.CODEMP';

	
	const NIVPROACC = 'fordefegrgen.NIVPROACC';

	
	const DESPROACC = 'fordefegrgen.DESPROACC';

	
	const HASPROACC = 'fordefegrgen.HASPROACC';

	
	const LONPROACC = 'fordefegrgen.LONPROACC';

	
	const FORPROACC = 'fordefegrgen.FORPROACC';

	
	const NIVACCESP = 'fordefegrgen.NIVACCESP';

	
	const DESACCESP = 'fordefegrgen.DESACCESP';

	
	const HASACCESP = 'fordefegrgen.HASACCESP';

	
	const LONACCESP = 'fordefegrgen.LONACCESP';

	
	const FORACCESP = 'fordefegrgen.FORACCESP';

	
	const NIVSUBACCESP = 'fordefegrgen.NIVSUBACCESP';

	
	const DESSUBACCESP = 'fordefegrgen.DESSUBACCESP';

	
	const HASSUBACCESP = 'fordefegrgen.HASSUBACCESP';

	
	const LONSUBACCESP = 'fordefegrgen.LONSUBACCESP';

	
	const FORSUBACCESP = 'fordefegrgen.FORSUBACCESP';

	
	const NIVUAE = 'fordefegrgen.NIVUAE';

	
	const DESUAE = 'fordefegrgen.DESUAE';

	
	const HASUAE = 'fordefegrgen.HASUAE';

	
	const LONUAE = 'fordefegrgen.LONUAE';

	
	const FORUAE = 'fordefegrgen.FORUAE';

	
	const COREST = 'fordefegrgen.COREST';

	
	const CORSEC = 'fordefegrgen.CORSEC';

	
	const COREQU = 'fordefegrgen.COREQU';

	
	const DESPAR = 'fordefegrgen.DESPAR';

	
	const HASPAR = 'fordefegrgen.HASPAR';

	
	const LONPAR = 'fordefegrgen.LONPAR';

	
	const FORPAR = 'fordefegrgen.FORPAR';

	
	const ID = 'fordefegrgen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nivproacc', 'Desproacc', 'Hasproacc', 'Lonproacc', 'Forproacc', 'Nivaccesp', 'Desaccesp', 'Hasaccesp', 'Lonaccesp', 'Foraccesp', 'Nivsubaccesp', 'Dessubaccesp', 'Hassubaccesp', 'Lonsubaccesp', 'Forsubaccesp', 'Nivuae', 'Desuae', 'Hasuae', 'Lonuae', 'Foruae', 'Corest', 'Corsec', 'Corequ', 'Despar', 'Haspar', 'Lonpar', 'Forpar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefegrgenPeer::CODEMP, FordefegrgenPeer::NIVPROACC, FordefegrgenPeer::DESPROACC, FordefegrgenPeer::HASPROACC, FordefegrgenPeer::LONPROACC, FordefegrgenPeer::FORPROACC, FordefegrgenPeer::NIVACCESP, FordefegrgenPeer::DESACCESP, FordefegrgenPeer::HASACCESP, FordefegrgenPeer::LONACCESP, FordefegrgenPeer::FORACCESP, FordefegrgenPeer::NIVSUBACCESP, FordefegrgenPeer::DESSUBACCESP, FordefegrgenPeer::HASSUBACCESP, FordefegrgenPeer::LONSUBACCESP, FordefegrgenPeer::FORSUBACCESP, FordefegrgenPeer::NIVUAE, FordefegrgenPeer::DESUAE, FordefegrgenPeer::HASUAE, FordefegrgenPeer::LONUAE, FordefegrgenPeer::FORUAE, FordefegrgenPeer::COREST, FordefegrgenPeer::CORSEC, FordefegrgenPeer::COREQU, FordefegrgenPeer::DESPAR, FordefegrgenPeer::HASPAR, FordefegrgenPeer::LONPAR, FordefegrgenPeer::FORPAR, FordefegrgenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nivproacc', 'desproacc', 'hasproacc', 'lonproacc', 'forproacc', 'nivaccesp', 'desaccesp', 'hasaccesp', 'lonaccesp', 'foraccesp', 'nivsubaccesp', 'dessubaccesp', 'hassubaccesp', 'lonsubaccesp', 'forsubaccesp', 'nivuae', 'desuae', 'hasuae', 'lonuae', 'foruae', 'corest', 'corsec', 'corequ', 'despar', 'haspar', 'lonpar', 'forpar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nivproacc' => 1, 'Desproacc' => 2, 'Hasproacc' => 3, 'Lonproacc' => 4, 'Forproacc' => 5, 'Nivaccesp' => 6, 'Desaccesp' => 7, 'Hasaccesp' => 8, 'Lonaccesp' => 9, 'Foraccesp' => 10, 'Nivsubaccesp' => 11, 'Dessubaccesp' => 12, 'Hassubaccesp' => 13, 'Lonsubaccesp' => 14, 'Forsubaccesp' => 15, 'Nivuae' => 16, 'Desuae' => 17, 'Hasuae' => 18, 'Lonuae' => 19, 'Foruae' => 20, 'Corest' => 21, 'Corsec' => 22, 'Corequ' => 23, 'Despar' => 24, 'Haspar' => 25, 'Lonpar' => 26, 'Forpar' => 27, 'Id' => 28, ),
		BasePeer::TYPE_COLNAME => array (FordefegrgenPeer::CODEMP => 0, FordefegrgenPeer::NIVPROACC => 1, FordefegrgenPeer::DESPROACC => 2, FordefegrgenPeer::HASPROACC => 3, FordefegrgenPeer::LONPROACC => 4, FordefegrgenPeer::FORPROACC => 5, FordefegrgenPeer::NIVACCESP => 6, FordefegrgenPeer::DESACCESP => 7, FordefegrgenPeer::HASACCESP => 8, FordefegrgenPeer::LONACCESP => 9, FordefegrgenPeer::FORACCESP => 10, FordefegrgenPeer::NIVSUBACCESP => 11, FordefegrgenPeer::DESSUBACCESP => 12, FordefegrgenPeer::HASSUBACCESP => 13, FordefegrgenPeer::LONSUBACCESP => 14, FordefegrgenPeer::FORSUBACCESP => 15, FordefegrgenPeer::NIVUAE => 16, FordefegrgenPeer::DESUAE => 17, FordefegrgenPeer::HASUAE => 18, FordefegrgenPeer::LONUAE => 19, FordefegrgenPeer::FORUAE => 20, FordefegrgenPeer::COREST => 21, FordefegrgenPeer::CORSEC => 22, FordefegrgenPeer::COREQU => 23, FordefegrgenPeer::DESPAR => 24, FordefegrgenPeer::HASPAR => 25, FordefegrgenPeer::LONPAR => 26, FordefegrgenPeer::FORPAR => 27, FordefegrgenPeer::ID => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nivproacc' => 1, 'desproacc' => 2, 'hasproacc' => 3, 'lonproacc' => 4, 'forproacc' => 5, 'nivaccesp' => 6, 'desaccesp' => 7, 'hasaccesp' => 8, 'lonaccesp' => 9, 'foraccesp' => 10, 'nivsubaccesp' => 11, 'dessubaccesp' => 12, 'hassubaccesp' => 13, 'lonsubaccesp' => 14, 'forsubaccesp' => 15, 'nivuae' => 16, 'desuae' => 17, 'hasuae' => 18, 'lonuae' => 19, 'foruae' => 20, 'corest' => 21, 'corsec' => 22, 'corequ' => 23, 'despar' => 24, 'haspar' => 25, 'lonpar' => 26, 'forpar' => 27, 'id' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefegrgenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefegrgenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefegrgenPeer::getTableMap();
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
		return str_replace(FordefegrgenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefegrgenPeer::CODEMP);

		$criteria->addSelectColumn(FordefegrgenPeer::NIVPROACC);

		$criteria->addSelectColumn(FordefegrgenPeer::DESPROACC);

		$criteria->addSelectColumn(FordefegrgenPeer::HASPROACC);

		$criteria->addSelectColumn(FordefegrgenPeer::LONPROACC);

		$criteria->addSelectColumn(FordefegrgenPeer::FORPROACC);

		$criteria->addSelectColumn(FordefegrgenPeer::NIVACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::DESACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::HASACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::LONACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::FORACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::NIVSUBACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::DESSUBACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::HASSUBACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::LONSUBACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::FORSUBACCESP);

		$criteria->addSelectColumn(FordefegrgenPeer::NIVUAE);

		$criteria->addSelectColumn(FordefegrgenPeer::DESUAE);

		$criteria->addSelectColumn(FordefegrgenPeer::HASUAE);

		$criteria->addSelectColumn(FordefegrgenPeer::LONUAE);

		$criteria->addSelectColumn(FordefegrgenPeer::FORUAE);

		$criteria->addSelectColumn(FordefegrgenPeer::COREST);

		$criteria->addSelectColumn(FordefegrgenPeer::CORSEC);

		$criteria->addSelectColumn(FordefegrgenPeer::COREQU);

		$criteria->addSelectColumn(FordefegrgenPeer::DESPAR);

		$criteria->addSelectColumn(FordefegrgenPeer::HASPAR);

		$criteria->addSelectColumn(FordefegrgenPeer::LONPAR);

		$criteria->addSelectColumn(FordefegrgenPeer::FORPAR);

		$criteria->addSelectColumn(FordefegrgenPeer::ID);

	}

	const COUNT = 'COUNT(fordefegrgen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefegrgen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefegrgenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefegrgenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefegrgenPeer::doSelectRS($criteria, $con);
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
		$objects = FordefegrgenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefegrgenPeer::populateObjects(FordefegrgenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefegrgenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefegrgenPeer::getOMClass();
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
		return FordefegrgenPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FordefegrgenPeer::ID);
			$selectCriteria->add(FordefegrgenPeer::ID, $criteria->remove(FordefegrgenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefegrgenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefegrgenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefegrgen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefegrgenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefegrgen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefegrgenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefegrgenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefegrgenPeer::DATABASE_NAME, FordefegrgenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefegrgenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefegrgenPeer::DATABASE_NAME);

		$criteria->add(FordefegrgenPeer::ID, $pk);


		$v = FordefegrgenPeer::doSelect($criteria, $con);

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
			$criteria->add(FordefegrgenPeer::ID, $pks, Criteria::IN);
			$objs = FordefegrgenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefegrgenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefegrgenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefegrgenMapBuilder');
}
