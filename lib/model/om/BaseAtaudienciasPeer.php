<?php


abstract class BaseAtaudienciasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ataudiencias';

	
	const CLASS_DEFAULT = 'lib.model.Ataudiencias';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ATCIUDADANO_ID = 'ataudiencias.ATCIUDADANO_ID';

	
	const MOTAUD = 'ataudiencias.MOTAUD';

	
	const ATUNIDADES_ID = 'ataudiencias.ATUNIDADES_ID';

	
	const PERSONA = 'ataudiencias.PERSONA';

	
	const STATUS = 'ataudiencias.STATUS';

	
	const FECHA = 'ataudiencias.FECHA';

	
	const FECHAR = 'ataudiencias.FECHAR';

	
	const FECHAA = 'ataudiencias.FECHAA';

	
	const LUGAR = 'ataudiencias.LUGAR';

	
	const OBSERVACION = 'ataudiencias.OBSERVACION';

	
	const ID = 'ataudiencias.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AtciudadanoId', 'Motaud', 'AtunidadesId', 'Persona', 'Status', 'Fecha', 'Fechar', 'Fechaa', 'Lugar', 'Observacion', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtaudienciasPeer::ATCIUDADANO_ID, AtaudienciasPeer::MOTAUD, AtaudienciasPeer::ATUNIDADES_ID, AtaudienciasPeer::PERSONA, AtaudienciasPeer::STATUS, AtaudienciasPeer::FECHA, AtaudienciasPeer::FECHAR, AtaudienciasPeer::FECHAA, AtaudienciasPeer::LUGAR, AtaudienciasPeer::OBSERVACION, AtaudienciasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('atciudadano_id', 'motaud', 'atunidades_id', 'persona', 'status', 'fecha', 'fechar', 'fechaa', 'lugar', 'observacion', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AtciudadanoId' => 0, 'Motaud' => 1, 'AtunidadesId' => 2, 'Persona' => 3, 'Status' => 4, 'Fecha' => 5, 'Fechar' => 6, 'Fechaa' => 7, 'Lugar' => 8, 'Observacion' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (AtaudienciasPeer::ATCIUDADANO_ID => 0, AtaudienciasPeer::MOTAUD => 1, AtaudienciasPeer::ATUNIDADES_ID => 2, AtaudienciasPeer::PERSONA => 3, AtaudienciasPeer::STATUS => 4, AtaudienciasPeer::FECHA => 5, AtaudienciasPeer::FECHAR => 6, AtaudienciasPeer::FECHAA => 7, AtaudienciasPeer::LUGAR => 8, AtaudienciasPeer::OBSERVACION => 9, AtaudienciasPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('atciudadano_id' => 0, 'motaud' => 1, 'atunidades_id' => 2, 'persona' => 3, 'status' => 4, 'fecha' => 5, 'fechar' => 6, 'fechaa' => 7, 'lugar' => 8, 'observacion' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtaudienciasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtaudienciasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtaudienciasPeer::getTableMap();
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
		return str_replace(AtaudienciasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtaudienciasPeer::ATCIUDADANO_ID);

		$criteria->addSelectColumn(AtaudienciasPeer::MOTAUD);

		$criteria->addSelectColumn(AtaudienciasPeer::ATUNIDADES_ID);

		$criteria->addSelectColumn(AtaudienciasPeer::PERSONA);

		$criteria->addSelectColumn(AtaudienciasPeer::STATUS);

		$criteria->addSelectColumn(AtaudienciasPeer::FECHA);

		$criteria->addSelectColumn(AtaudienciasPeer::FECHAR);

		$criteria->addSelectColumn(AtaudienciasPeer::FECHAA);

		$criteria->addSelectColumn(AtaudienciasPeer::LUGAR);

		$criteria->addSelectColumn(AtaudienciasPeer::OBSERVACION);

		$criteria->addSelectColumn(AtaudienciasPeer::ID);

	}

	const COUNT = 'COUNT(ataudiencias.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ataudiencias.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtaudienciasPeer::doSelectRS($criteria, $con);
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
		$objects = AtaudienciasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtaudienciasPeer::populateObjects(AtaudienciasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtaudienciasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtaudienciasPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtciudadano(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtaudienciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = AtaudienciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtunidades(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtaudienciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = AtaudienciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtaudienciasPeer::addSelectColumns($c);
		$startcol = (AtaudienciasPeer::NUM_COLUMNS - AtaudienciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtciudadanoPeer::addSelectColumns($c);

		$c->addJoin(AtaudienciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtaudienciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtaudiencias($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtaudienciass();
				$obj2->addAtaudiencias($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtunidades(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtaudienciasPeer::addSelectColumns($c);
		$startcol = (AtaudienciasPeer::NUM_COLUMNS - AtaudienciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtunidadesPeer::addSelectColumns($c);

		$c->addJoin(AtaudienciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtaudienciasPeer::getOMClass();

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
										$temp_obj2->addAtaudiencias($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtaudienciass();
				$obj2->addAtaudiencias($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtaudienciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$criteria->addJoin(AtaudienciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = AtaudienciasPeer::doSelectRS($criteria, $con);
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

		AtaudienciasPeer::addSelectColumns($c);
		$startcol2 = (AtaudienciasPeer::NUM_COLUMNS - AtaudienciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;

		AtunidadesPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AtunidadesPeer::NUM_COLUMNS;

		$c->addJoin(AtaudienciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$c->addJoin(AtaudienciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtaudienciasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtaudiencias($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAtaudienciass();
				$obj2->addAtaudiencias($obj1);
			}


					
			$omClass = AtunidadesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAtunidades(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAtaudiencias($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAtaudienciass();
				$obj3->addAtaudiencias($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptAtciudadano(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtaudienciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = AtaudienciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAtunidades(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtaudienciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtaudienciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = AtaudienciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtaudienciasPeer::addSelectColumns($c);
		$startcol2 = (AtaudienciasPeer::NUM_COLUMNS - AtaudienciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtunidadesPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtunidadesPeer::NUM_COLUMNS;

		$c->addJoin(AtaudienciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtaudienciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtunidadesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtunidades(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtaudiencias($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtaudienciass();
				$obj2->addAtaudiencias($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtunidades(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtaudienciasPeer::addSelectColumns($c);
		$startcol2 = (AtaudienciasPeer::NUM_COLUMNS - AtaudienciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AtciudadanoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;

		$c->addJoin(AtaudienciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtaudienciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAtaudiencias($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAtaudienciass();
				$obj2->addAtaudiencias($obj1);
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
		return AtaudienciasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtaudienciasPeer::ID); 

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
			$comparison = $criteria->getComparison(AtaudienciasPeer::ID);
			$selectCriteria->add(AtaudienciasPeer::ID, $criteria->remove(AtaudienciasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtaudienciasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtaudienciasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ataudiencias) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtaudienciasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ataudiencias $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtaudienciasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtaudienciasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtaudienciasPeer::DATABASE_NAME, AtaudienciasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtaudienciasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtaudienciasPeer::DATABASE_NAME);

		$criteria->add(AtaudienciasPeer::ID, $pk);


		$v = AtaudienciasPeer::doSelect($criteria, $con);

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
			$criteria->add(AtaudienciasPeer::ID, $pks, Criteria::IN);
			$objs = AtaudienciasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtaudienciasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtaudienciasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtaudienciasMapBuilder');
}
