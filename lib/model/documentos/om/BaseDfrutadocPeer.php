<?php


abstract class BaseDfrutadocPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dfrutadoc';

	
	const CLASS_DEFAULT = 'lib.model.documentos.Dfrutadoc';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RUTDOC = 'dfrutadoc.RUTDOC';

	
	const DESUNI = 'dfrutadoc.DESUNI';

	
	const DESRUT = 'dfrutadoc.DESRUT';

	
	const DIADOC = 'dfrutadoc.DIADOC';

	
	const ID_ACUNIDAD = 'dfrutadoc.ID_ACUNIDAD';

	
	const ID_DFTABTIP = 'dfrutadoc.ID_DFTABTIP';

	
	const ID = 'dfrutadoc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rutdoc', 'Desuni', 'Desrut', 'Diadoc', 'IdAcunidad', 'IdDftabtip', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DfrutadocPeer::RUTDOC, DfrutadocPeer::DESUNI, DfrutadocPeer::DESRUT, DfrutadocPeer::DIADOC, DfrutadocPeer::ID_ACUNIDAD, DfrutadocPeer::ID_DFTABTIP, DfrutadocPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rutdoc', 'desuni', 'desrut', 'diadoc', 'id_acunidad', 'id_dftabtip', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rutdoc' => 0, 'Desuni' => 1, 'Desrut' => 2, 'Diadoc' => 3, 'IdAcunidad' => 4, 'IdDftabtip' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (DfrutadocPeer::RUTDOC => 0, DfrutadocPeer::DESUNI => 1, DfrutadocPeer::DESRUT => 2, DfrutadocPeer::DIADOC => 3, DfrutadocPeer::ID_ACUNIDAD => 4, DfrutadocPeer::ID_DFTABTIP => 5, DfrutadocPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('rutdoc' => 0, 'desuni' => 1, 'desrut' => 2, 'diadoc' => 3, 'id_acunidad' => 4, 'id_dftabtip' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/documentos/map/DfrutadocMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.documentos.map.DfrutadocMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DfrutadocPeer::getTableMap();
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
		return str_replace(DfrutadocPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DfrutadocPeer::RUTDOC);

		$criteria->addSelectColumn(DfrutadocPeer::DESUNI);

		$criteria->addSelectColumn(DfrutadocPeer::DESRUT);

		$criteria->addSelectColumn(DfrutadocPeer::DIADOC);

		$criteria->addSelectColumn(DfrutadocPeer::ID_ACUNIDAD);

		$criteria->addSelectColumn(DfrutadocPeer::ID_DFTABTIP);

		$criteria->addSelectColumn(DfrutadocPeer::ID);

	}

	const COUNT = 'COUNT(dfrutadoc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dfrutadoc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DfrutadocPeer::doSelectRS($criteria, $con);
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
		$objects = DfrutadocPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DfrutadocPeer::populateObjects(DfrutadocPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DfrutadocPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DfrutadocPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAcunidad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfrutadocPeer::ID_ACUNIDAD, AcunidadPeer::ID);

		$rs = DfrutadocPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDftabtip(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfrutadocPeer::ID_DFTABTIP, DftabtipPeer::ID);

		$rs = DfrutadocPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAcunidad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfrutadocPeer::addSelectColumns($c);
		$startcol = (DfrutadocPeer::NUM_COLUMNS - DfrutadocPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AcunidadPeer::addSelectColumns($c);

		$c->addJoin(DfrutadocPeer::ID_ACUNIDAD, AcunidadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfrutadocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AcunidadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAcunidad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfrutadoc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfrutadocs();
				$obj2->addDfrutadoc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDftabtip(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfrutadocPeer::addSelectColumns($c);
		$startcol = (DfrutadocPeer::NUM_COLUMNS - DfrutadocPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DftabtipPeer::addSelectColumns($c);

		$c->addJoin(DfrutadocPeer::ID_DFTABTIP, DftabtipPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfrutadocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DftabtipPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDftabtip(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfrutadoc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfrutadocs();
				$obj2->addDfrutadoc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfrutadocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(DfrutadocPeer::ID_ACUNIDAD, AcunidadPeer::ID);
	
			$criteria->addJoin(DfrutadocPeer::ID_DFTABTIP, DftabtipPeer::ID);
	
		$rs = DfrutadocPeer::doSelectRS($criteria, $con);
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

		DfrutadocPeer::addSelectColumns($c);
		$startcol2 = (DfrutadocPeer::NUM_COLUMNS - DfrutadocPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AcunidadPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AcunidadPeer::NUM_COLUMNS;
	
			DftabtipPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + DftabtipPeer::NUM_COLUMNS;
	
			$c->addJoin(DfrutadocPeer::ID_ACUNIDAD, AcunidadPeer::ID);
	
			$c->addJoin(DfrutadocPeer::ID_DFTABTIP, DftabtipPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfrutadocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = AcunidadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAcunidad(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addDfrutadoc($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initDfrutadocs();
					$obj2->addDfrutadoc($obj1);
				}
	

							
				$omClass = DftabtipPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getDftabtip(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addDfrutadoc($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initDfrutadocs();
					$obj3->addDfrutadoc($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptAcunidad(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(DfrutadocPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(DfrutadocPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(DfrutadocPeer::ID_DFTABTIP, DftabtipPeer::ID);
		
			$rs = DfrutadocPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptDftabtip(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(DfrutadocPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(DfrutadocPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(DfrutadocPeer::ID_ACUNIDAD, AcunidadPeer::ID);
		
			$rs = DfrutadocPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptAcunidad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfrutadocPeer::addSelectColumns($c);
		$startcol2 = (DfrutadocPeer::NUM_COLUMNS - DfrutadocPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			DftabtipPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + DftabtipPeer::NUM_COLUMNS;
	
			$c->addJoin(DfrutadocPeer::ID_DFTABTIP, DftabtipPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfrutadocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = DftabtipPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getDftabtip(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addDfrutadoc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initDfrutadocs();
					$obj2->addDfrutadoc($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDftabtip(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfrutadocPeer::addSelectColumns($c);
		$startcol2 = (DfrutadocPeer::NUM_COLUMNS - DfrutadocPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AcunidadPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AcunidadPeer::NUM_COLUMNS;
	
			$c->addJoin(DfrutadocPeer::ID_ACUNIDAD, AcunidadPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfrutadocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AcunidadPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAcunidad(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addDfrutadoc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initDfrutadocs();
					$obj2->addDfrutadoc($obj1);
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
		return DfrutadocPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DfrutadocPeer::ID); 

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
			$comparison = $criteria->getComparison(DfrutadocPeer::ID);
			$selectCriteria->add(DfrutadocPeer::ID, $criteria->remove(DfrutadocPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DfrutadocPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dfrutadoc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DfrutadocPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dfrutadoc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DfrutadocPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DfrutadocPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DfrutadocPeer::DATABASE_NAME, DfrutadocPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DfrutadocPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		$criteria->add(DfrutadocPeer::ID, $pk);


		$v = DfrutadocPeer::doSelect($criteria, $con);

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
			$criteria->add(DfrutadocPeer::ID, $pks, Criteria::IN);
			$objs = DfrutadocPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDfrutadocPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/documentos/map/DfrutadocMapBuilder.php';
	Propel::registerMapBuilder('lib.model.documentos.map.DfrutadocMapBuilder');
}
