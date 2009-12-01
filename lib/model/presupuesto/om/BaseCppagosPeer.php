<?php


abstract class BaseCppagosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cppagos';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cppagos';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPAG = 'cppagos.REFPAG';

	
	const TIPPAG = 'cppagos.TIPPAG';

	
	const FECPAG = 'cppagos.FECPAG';

	
	const ANOPAG = 'cppagos.ANOPAG';

	
	const REFCAU = 'cppagos.REFCAU';

	
	const TIPCAU = 'cppagos.TIPCAU';

	
	const DESPAG = 'cppagos.DESPAG';

	
	const DESANU = 'cppagos.DESANU';

	
	const MONPAG = 'cppagos.MONPAG';

	
	const SALAJU = 'cppagos.SALAJU';

	
	const STAPAG = 'cppagos.STAPAG';

	
	const FECANU = 'cppagos.FECANU';

	
	const CEDRIF = 'cppagos.CEDRIF';

	
	const ID = 'cppagos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag', 'Tippag', 'Fecpag', 'Anopag', 'Refcau', 'Tipcau', 'Despag', 'Desanu', 'Monpag', 'Salaju', 'Stapag', 'Fecanu', 'Cedrif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CppagosPeer::REFPAG, CppagosPeer::TIPPAG, CppagosPeer::FECPAG, CppagosPeer::ANOPAG, CppagosPeer::REFCAU, CppagosPeer::TIPCAU, CppagosPeer::DESPAG, CppagosPeer::DESANU, CppagosPeer::MONPAG, CppagosPeer::SALAJU, CppagosPeer::STAPAG, CppagosPeer::FECANU, CppagosPeer::CEDRIF, CppagosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag', 'tippag', 'fecpag', 'anopag', 'refcau', 'tipcau', 'despag', 'desanu', 'monpag', 'salaju', 'stapag', 'fecanu', 'cedrif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag' => 0, 'Tippag' => 1, 'Fecpag' => 2, 'Anopag' => 3, 'Refcau' => 4, 'Tipcau' => 5, 'Despag' => 6, 'Desanu' => 7, 'Monpag' => 8, 'Salaju' => 9, 'Stapag' => 10, 'Fecanu' => 11, 'Cedrif' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (CppagosPeer::REFPAG => 0, CppagosPeer::TIPPAG => 1, CppagosPeer::FECPAG => 2, CppagosPeer::ANOPAG => 3, CppagosPeer::REFCAU => 4, CppagosPeer::TIPCAU => 5, CppagosPeer::DESPAG => 6, CppagosPeer::DESANU => 7, CppagosPeer::MONPAG => 8, CppagosPeer::SALAJU => 9, CppagosPeer::STAPAG => 10, CppagosPeer::FECANU => 11, CppagosPeer::CEDRIF => 12, CppagosPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag' => 0, 'tippag' => 1, 'fecpag' => 2, 'anopag' => 3, 'refcau' => 4, 'tipcau' => 5, 'despag' => 6, 'desanu' => 7, 'monpag' => 8, 'salaju' => 9, 'stapag' => 10, 'fecanu' => 11, 'cedrif' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CppagosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CppagosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CppagosPeer::getTableMap();
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
		return str_replace(CppagosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CppagosPeer::REFPAG);

		$criteria->addSelectColumn(CppagosPeer::TIPPAG);

		$criteria->addSelectColumn(CppagosPeer::FECPAG);

		$criteria->addSelectColumn(CppagosPeer::ANOPAG);

		$criteria->addSelectColumn(CppagosPeer::REFCAU);

		$criteria->addSelectColumn(CppagosPeer::TIPCAU);

		$criteria->addSelectColumn(CppagosPeer::DESPAG);

		$criteria->addSelectColumn(CppagosPeer::DESANU);

		$criteria->addSelectColumn(CppagosPeer::MONPAG);

		$criteria->addSelectColumn(CppagosPeer::SALAJU);

		$criteria->addSelectColumn(CppagosPeer::STAPAG);

		$criteria->addSelectColumn(CppagosPeer::FECANU);

		$criteria->addSelectColumn(CppagosPeer::CEDRIF);

		$criteria->addSelectColumn(CppagosPeer::ID);

	}

	const COUNT = 'COUNT(cppagos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cppagos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CppagosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CppagosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CppagosPeer::doSelectRS($criteria, $con);
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
		$objects = CppagosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CppagosPeer::populateObjects(CppagosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CppagosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CppagosPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpdocpag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CppagosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CppagosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CppagosPeer::TIPPAG, CpdocpagPeer::TIPPAG);

		$rs = CppagosPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOpbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CppagosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CppagosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CppagosPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = CppagosPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpdocpag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CppagosPeer::addSelectColumns($c);
		$startcol = (CppagosPeer::NUM_COLUMNS - CppagosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdocpagPeer::addSelectColumns($c);

		$c->addJoin(CppagosPeer::TIPPAG, CpdocpagPeer::TIPPAG);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CppagosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdocpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdocpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCppagos($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCppagoss();
				$obj2->addCppagos($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOpbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CppagosPeer::addSelectColumns($c);
		$startcol = (CppagosPeer::NUM_COLUMNS - CppagosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpbenefiPeer::addSelectColumns($c);

		$c->addJoin(CppagosPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CppagosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OpbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOpbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCppagos($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCppagoss();
				$obj2->addCppagos($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CppagosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CppagosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CppagosPeer::TIPPAG, CpdocpagPeer::TIPPAG);
	
			$criteria->addJoin(CppagosPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
		$rs = CppagosPeer::doSelectRS($criteria, $con);
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

		CppagosPeer::addSelectColumns($c);
		$startcol2 = (CppagosPeer::NUM_COLUMNS - CppagosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdocpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdocpagPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CppagosPeer::TIPPAG, CpdocpagPeer::TIPPAG);
	
			$c->addJoin(CppagosPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CppagosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpdocpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdocpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCppagos($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCppagoss();
					$obj2->addCppagos($obj1);
				}
	

							
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCppagos($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCppagoss();
					$obj3->addCppagos($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpdocpag(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CppagosPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CppagosPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CppagosPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
			$rs = CppagosPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptOpbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CppagosPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CppagosPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CppagosPeer::TIPPAG, CpdocpagPeer::TIPPAG);
		
			$rs = CppagosPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpdocpag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CppagosPeer::addSelectColumns($c);
		$startcol2 = (CppagosPeer::NUM_COLUMNS - CppagosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OpbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CppagosPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CppagosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOpbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCppagos($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCppagoss();
					$obj2->addCppagos($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOpbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CppagosPeer::addSelectColumns($c);
		$startcol2 = (CppagosPeer::NUM_COLUMNS - CppagosPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdocpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdocpagPeer::NUM_COLUMNS;
	
			$c->addJoin(CppagosPeer::TIPPAG, CpdocpagPeer::TIPPAG);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CppagosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdocpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdocpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCppagos($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCppagoss();
					$obj2->addCppagos($obj1);
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
		return CppagosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CppagosPeer::ID); 

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
			$comparison = $criteria->getComparison(CppagosPeer::ID);
			$selectCriteria->add(CppagosPeer::ID, $criteria->remove(CppagosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CppagosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CppagosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cppagos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CppagosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cppagos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CppagosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CppagosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CppagosPeer::DATABASE_NAME, CppagosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CppagosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CppagosPeer::DATABASE_NAME);

		$criteria->add(CppagosPeer::ID, $pk);


		$v = CppagosPeer::doSelect($criteria, $con);

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
			$criteria->add(CppagosPeer::ID, $pks, Criteria::IN);
			$objs = CppagosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCppagosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CppagosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CppagosMapBuilder');
}
