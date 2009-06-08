<?php


abstract class BaseAtreclamosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atreclamos';

	
	const CLASS_DEFAULT = 'lib.model.ciudadanos.Atreclamos';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATSOLICI = 'atreclamos.ATSOLICI';

	
	const DESREC = 'atreclamos.DESREC';

	
	const TELEFONO = 'atreclamos.TELEFONO';

	
	const ATUNIDADES_ID = 'atreclamos.ATUNIDADES_ID';

	
	const PERSONA = 'atreclamos.PERSONA';

	
	const STATUS = 'atreclamos.STATUS';

	
	const RESPUESTA = 'atreclamos.RESPUESTA';

	
	const FECHAA = 'atreclamos.FECHAA';

	
	const FECHAR = 'atreclamos.FECHAR';

	
	const ID = 'atreclamos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Atsolici', 'Desrec', 'Telefono', 'AtunidadesId', 'Persona', 'Status', 'Respuesta', 'Fechaa', 'Fechar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtreclamosPeer::ATSOLICI, AtreclamosPeer::DESREC, AtreclamosPeer::TELEFONO, AtreclamosPeer::ATUNIDADES_ID, AtreclamosPeer::PERSONA, AtreclamosPeer::STATUS, AtreclamosPeer::RESPUESTA, AtreclamosPeer::FECHAA, AtreclamosPeer::FECHAR, AtreclamosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atsolici', 'desrec', 'telefono', 'atunidades_id', 'persona', 'status', 'respuesta', 'fechaa', 'fechar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Atsolici' => 0, 'Desrec' => 1, 'Telefono' => 2, 'AtunidadesId' => 3, 'Persona' => 4, 'Status' => 5, 'Respuesta' => 6, 'Fechaa' => 7, 'Fechar' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (AtreclamosPeer::ATSOLICI => 0, AtreclamosPeer::DESREC => 1, AtreclamosPeer::TELEFONO => 2, AtreclamosPeer::ATUNIDADES_ID => 3, AtreclamosPeer::PERSONA => 4, AtreclamosPeer::STATUS => 5, AtreclamosPeer::RESPUESTA => 6, AtreclamosPeer::FECHAA => 7, AtreclamosPeer::FECHAR => 8, AtreclamosPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('atsolici' => 0, 'desrec' => 1, 'telefono' => 2, 'atunidades_id' => 3, 'persona' => 4, 'status' => 5, 'respuesta' => 6, 'fechaa' => 7, 'fechar' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ciudadanos/map/AtreclamosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ciudadanos.map.AtreclamosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtreclamosPeer::getTableMap();
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
		return str_replace(AtreclamosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtreclamosPeer::ATSOLICI);

		$criteria->addSelectColumn(AtreclamosPeer::DESREC);

		$criteria->addSelectColumn(AtreclamosPeer::TELEFONO);

		$criteria->addSelectColumn(AtreclamosPeer::ATUNIDADES_ID);

		$criteria->addSelectColumn(AtreclamosPeer::PERSONA);

		$criteria->addSelectColumn(AtreclamosPeer::STATUS);

		$criteria->addSelectColumn(AtreclamosPeer::RESPUESTA);

		$criteria->addSelectColumn(AtreclamosPeer::FECHAA);

		$criteria->addSelectColumn(AtreclamosPeer::FECHAR);

		$criteria->addSelectColumn(AtreclamosPeer::ID);

	}

	const COUNT = 'COUNT(atreclamos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atreclamos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtreclamosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtreclamosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtreclamosPeer::doSelectRS($criteria, $con);
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
		$objects = AtreclamosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtreclamosPeer::populateObjects(AtreclamosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtreclamosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtreclamosPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtunidades(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtreclamosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtreclamosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtreclamosPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = AtreclamosPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtunidades(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtreclamosPeer::addSelectColumns($c);
		$startcol = (AtreclamosPeer::NUM_COLUMNS - AtreclamosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtunidadesPeer::addSelectColumns($c);

		$c->addJoin(AtreclamosPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtreclamosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtunidadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtunidades(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtreclamos($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtreclamoss();
				$obj2->addAtreclamos($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtreclamosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtreclamosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtreclamosPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = AtreclamosPeer::doSelectRS($criteria, $con);
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

		AtreclamosPeer::addSelectColumns($c);
		$startcol2 = (AtreclamosPeer::NUM_COLUMNS - AtreclamosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtunidadesPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtunidadesPeer::NUM_COLUMNS;

		$c->addJoin(AtreclamosPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtreclamosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AtunidadesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtunidades(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtreclamos($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtreclamoss();
				$obj2->addAtreclamos($obj1);
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
		return AtreclamosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtreclamosPeer::ID); 

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
			$comparison = $criteria->getComparison(AtreclamosPeer::ID);
			$selectCriteria->add(AtreclamosPeer::ID, $criteria->remove(AtreclamosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtreclamosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtreclamosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atreclamos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtreclamosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atreclamos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtreclamosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtreclamosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtreclamosPeer::DATABASE_NAME, AtreclamosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtreclamosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtreclamosPeer::DATABASE_NAME);

		$criteria->add(AtreclamosPeer::ID, $pk);


		$v = AtreclamosPeer::doSelect($criteria, $con);

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
			$criteria->add(AtreclamosPeer::ID, $pks, Criteria::IN);
			$objs = AtreclamosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtreclamosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ciudadanos/map/AtreclamosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ciudadanos.map.AtreclamosMapBuilder');
}
