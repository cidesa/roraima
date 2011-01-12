<?php


abstract class BaseCcregnotPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccregnot';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccregnot';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccregnot.ID';

	
	const NOMREGNOT = 'ccregnot.NOMREGNOT';

	
	const DESREGNOT = 'ccregnot.DESREGNOT';

	
	const DIRREGNOT = 'ccregnot.DIRREGNOT';

	
	const CODARETEL = 'ccregnot.CODARETEL';

	
	const NUMTELREG = 'ccregnot.NUMTELREG';

	
	const CODARETEL2 = 'ccregnot.CODARETEL2';

	
	const NUMTELREG2 = 'ccregnot.NUMTELREG2';

	
	const TIPREGNOT = 'ccregnot.TIPREGNOT';

	
	const CCMUNICI_ID = 'ccregnot.CCMUNICI_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomregnot', 'Desregnot', 'Dirregnot', 'Codaretel', 'Numtelreg', 'Codaretel2', 'Numtelreg2', 'Tipregnot', 'CcmuniciId', ),
		BasePeer::TYPE_COLNAME => array (CcregnotPeer::ID, CcregnotPeer::NOMREGNOT, CcregnotPeer::DESREGNOT, CcregnotPeer::DIRREGNOT, CcregnotPeer::CODARETEL, CcregnotPeer::NUMTELREG, CcregnotPeer::CODARETEL2, CcregnotPeer::NUMTELREG2, CcregnotPeer::TIPREGNOT, CcregnotPeer::CCMUNICI_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomregnot', 'desregnot', 'dirregnot', 'codaretel', 'numtelreg', 'codaretel2', 'numtelreg2', 'tipregnot', 'ccmunici_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomregnot' => 1, 'Desregnot' => 2, 'Dirregnot' => 3, 'Codaretel' => 4, 'Numtelreg' => 5, 'Codaretel2' => 6, 'Numtelreg2' => 7, 'Tipregnot' => 8, 'CcmuniciId' => 9, ),
		BasePeer::TYPE_COLNAME => array (CcregnotPeer::ID => 0, CcregnotPeer::NOMREGNOT => 1, CcregnotPeer::DESREGNOT => 2, CcregnotPeer::DIRREGNOT => 3, CcregnotPeer::CODARETEL => 4, CcregnotPeer::NUMTELREG => 5, CcregnotPeer::CODARETEL2 => 6, CcregnotPeer::NUMTELREG2 => 7, CcregnotPeer::TIPREGNOT => 8, CcregnotPeer::CCMUNICI_ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomregnot' => 1, 'desregnot' => 2, 'dirregnot' => 3, 'codaretel' => 4, 'numtelreg' => 5, 'codaretel2' => 6, 'numtelreg2' => 7, 'tipregnot' => 8, 'ccmunici_id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcregnotMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcregnotMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcregnotPeer::getTableMap();
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
		return str_replace(CcregnotPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcregnotPeer::ID);

		$criteria->addSelectColumn(CcregnotPeer::NOMREGNOT);

		$criteria->addSelectColumn(CcregnotPeer::DESREGNOT);

		$criteria->addSelectColumn(CcregnotPeer::DIRREGNOT);

		$criteria->addSelectColumn(CcregnotPeer::CODARETEL);

		$criteria->addSelectColumn(CcregnotPeer::NUMTELREG);

		$criteria->addSelectColumn(CcregnotPeer::CODARETEL2);

		$criteria->addSelectColumn(CcregnotPeer::NUMTELREG2);

		$criteria->addSelectColumn(CcregnotPeer::TIPREGNOT);

		$criteria->addSelectColumn(CcregnotPeer::CCMUNICI_ID);

	}

	const COUNT = 'COUNT(ccregnot.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccregnot.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcregnotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcregnotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcregnotPeer::doSelectRS($criteria, $con);
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
		$objects = CcregnotPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcregnotPeer::populateObjects(CcregnotPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcregnotPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcregnotPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcmunici(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcregnotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcregnotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcregnotPeer::CCMUNICI_ID, CcmuniciPeer::ID);

		$rs = CcregnotPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcmunici(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcregnotPeer::addSelectColumns($c);
		$startcol = (CcregnotPeer::NUM_COLUMNS - CcregnotPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcmuniciPeer::addSelectColumns($c);

		$c->addJoin(CcregnotPeer::CCMUNICI_ID, CcmuniciPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcregnotPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcmuniciPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcmunici(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcregnot($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcregnots();
				$obj2->addCcregnot($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcregnotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcregnotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcregnotPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
		$rs = CcregnotPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcregnotPeer::addSelectColumns($c);
		$startcol2 = (CcregnotPeer::NUM_COLUMNS - CcregnotPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcmuniciPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcmuniciPeer::NUM_COLUMNS;
	
			$c->addJoin(CcregnotPeer::CCMUNICI_ID, CcmuniciPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcregnotPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcmuniciPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcmunici(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcregnot($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcregnots();
					$obj2->addCcregnot($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CcregnotPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcregnotPeer::ID); 

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
			$comparison = $criteria->getComparison(CcregnotPeer::ID);
			$selectCriteria->add(CcregnotPeer::ID, $criteria->remove(CcregnotPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcregnotPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcregnotPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccregnot) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcregnotPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccregnot $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcregnotPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcregnotPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcregnotPeer::DATABASE_NAME, CcregnotPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcregnotPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcregnotPeer::DATABASE_NAME);

		$criteria->add(CcregnotPeer::ID, $pk);


		$v = CcregnotPeer::doSelect($criteria, $con);

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
			$criteria->add(CcregnotPeer::ID, $pks, Criteria::IN);
			$objs = CcregnotPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcregnotPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcregnotMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcregnotMapBuilder');
}
