<?php


abstract class BaseCcestatuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccestatu';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccestatu';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccestatu.ID';

	
	const ALIAS = 'ccestatu.ALIAS';

	
	const NOMBRE = 'ccestatu.NOMBRE';

	
	const MAXDIA = 'ccestatu.MAXDIA';

	
	const COMENTARIO = 'ccestatu.COMENTARIO';

	
	const MOVCONT = 'ccestatu.MOVCONT';

	
	const ENRUTA = 'ccestatu.ENRUTA';

	
	const ORDEN = 'ccestatu.ORDEN';

	
	const CCGERENC_ID = 'ccestatu.CCGERENC_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Alias', 'Nombre', 'Maxdia', 'Comentario', 'Movcont', 'Enruta', 'Orden', 'CcgerencId', ),
		BasePeer::TYPE_COLNAME => array (CcestatuPeer::ID, CcestatuPeer::ALIAS, CcestatuPeer::NOMBRE, CcestatuPeer::MAXDIA, CcestatuPeer::COMENTARIO, CcestatuPeer::MOVCONT, CcestatuPeer::ENRUTA, CcestatuPeer::ORDEN, CcestatuPeer::CCGERENC_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'alias', 'nombre', 'maxdia', 'comentario', 'movcont', 'enruta', 'orden', 'ccgerenc_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Alias' => 1, 'Nombre' => 2, 'Maxdia' => 3, 'Comentario' => 4, 'Movcont' => 5, 'Enruta' => 6, 'Orden' => 7, 'CcgerencId' => 8, ),
		BasePeer::TYPE_COLNAME => array (CcestatuPeer::ID => 0, CcestatuPeer::ALIAS => 1, CcestatuPeer::NOMBRE => 2, CcestatuPeer::MAXDIA => 3, CcestatuPeer::COMENTARIO => 4, CcestatuPeer::MOVCONT => 5, CcestatuPeer::ENRUTA => 6, CcestatuPeer::ORDEN => 7, CcestatuPeer::CCGERENC_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'alias' => 1, 'nombre' => 2, 'maxdia' => 3, 'comentario' => 4, 'movcont' => 5, 'enruta' => 6, 'orden' => 7, 'ccgerenc_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcestatuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcestatuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcestatuPeer::getTableMap();
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
		return str_replace(CcestatuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcestatuPeer::ID);

		$criteria->addSelectColumn(CcestatuPeer::ALIAS);

		$criteria->addSelectColumn(CcestatuPeer::NOMBRE);

		$criteria->addSelectColumn(CcestatuPeer::MAXDIA);

		$criteria->addSelectColumn(CcestatuPeer::COMENTARIO);

		$criteria->addSelectColumn(CcestatuPeer::MOVCONT);

		$criteria->addSelectColumn(CcestatuPeer::ENRUTA);

		$criteria->addSelectColumn(CcestatuPeer::ORDEN);

		$criteria->addSelectColumn(CcestatuPeer::CCGERENC_ID);

	}

	const COUNT = 'COUNT(ccestatu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccestatu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestatuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestatuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcestatuPeer::doSelectRS($criteria, $con);
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
		$objects = CcestatuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcestatuPeer::populateObjects(CcestatuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcestatuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcestatuPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcgerenc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestatuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestatuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcestatuPeer::CCGERENC_ID, CcgerencPeer::ID);

		$rs = CcestatuPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcgerenc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcestatuPeer::addSelectColumns($c);
		$startcol = (CcestatuPeer::NUM_COLUMNS - CcestatuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcgerencPeer::addSelectColumns($c);

		$c->addJoin(CcestatuPeer::CCGERENC_ID, CcgerencPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestatuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcgerencPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcgerenc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcestatu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcestatus();
				$obj2->addCcestatu($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcestatuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcestatuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcestatuPeer::CCGERENC_ID, CcgerencPeer::ID);
	
		$rs = CcestatuPeer::doSelectRS($criteria, $con);
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

		CcestatuPeer::addSelectColumns($c);
		$startcol2 = (CcestatuPeer::NUM_COLUMNS - CcestatuPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcgerencPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcgerencPeer::NUM_COLUMNS;
	
			$c->addJoin(CcestatuPeer::CCGERENC_ID, CcgerencPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcestatuPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcgerencPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcgerenc(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcestatu($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcestatus();
					$obj2->addCcestatu($obj1);
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
		return CcestatuPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcestatuPeer::ID); 

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
			$comparison = $criteria->getComparison(CcestatuPeer::ID);
			$selectCriteria->add(CcestatuPeer::ID, $criteria->remove(CcestatuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcestatuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcestatuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccestatu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcestatuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccestatu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcestatuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcestatuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcestatuPeer::DATABASE_NAME, CcestatuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcestatuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcestatuPeer::DATABASE_NAME);

		$criteria->add(CcestatuPeer::ID, $pk);


		$v = CcestatuPeer::doSelect($criteria, $con);

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
			$criteria->add(CcestatuPeer::ID, $pks, Criteria::IN);
			$objs = CcestatuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcestatuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcestatuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcestatuMapBuilder');
}
