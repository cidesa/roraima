<?php


abstract class BaseCpprecomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpprecom';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpprecom';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRC = 'cpprecom.REFPRC';

	
	const TIPPRC = 'cpprecom.TIPPRC';

	
	const FECPRC = 'cpprecom.FECPRC';

	
	const ANOPRC = 'cpprecom.ANOPRC';

	
	const DESPRC = 'cpprecom.DESPRC';

	
	const DESANU = 'cpprecom.DESANU';

	
	const MONPRC = 'cpprecom.MONPRC';

	
	const SALCOM = 'cpprecom.SALCOM';

	
	const SALCAU = 'cpprecom.SALCAU';

	
	const SALPAG = 'cpprecom.SALPAG';

	
	const SALAJU = 'cpprecom.SALAJU';

	
	const STAPRC = 'cpprecom.STAPRC';

	
	const FECANU = 'cpprecom.FECANU';

	
	const CEDRIF = 'cpprecom.CEDRIF';

	
	const REFSOL = 'cpprecom.REFSOL';

	
	const ID = 'cpprecom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refprc', 'Tipprc', 'Fecprc', 'Anoprc', 'Desprc', 'Desanu', 'Monprc', 'Salcom', 'Salcau', 'Salpag', 'Salaju', 'Staprc', 'Fecanu', 'Cedrif', 'Refsol', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpprecomPeer::REFPRC, CpprecomPeer::TIPPRC, CpprecomPeer::FECPRC, CpprecomPeer::ANOPRC, CpprecomPeer::DESPRC, CpprecomPeer::DESANU, CpprecomPeer::MONPRC, CpprecomPeer::SALCOM, CpprecomPeer::SALCAU, CpprecomPeer::SALPAG, CpprecomPeer::SALAJU, CpprecomPeer::STAPRC, CpprecomPeer::FECANU, CpprecomPeer::CEDRIF, CpprecomPeer::REFSOL, CpprecomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refprc', 'tipprc', 'fecprc', 'anoprc', 'desprc', 'desanu', 'monprc', 'salcom', 'salcau', 'salpag', 'salaju', 'staprc', 'fecanu', 'cedrif', 'refsol', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refprc' => 0, 'Tipprc' => 1, 'Fecprc' => 2, 'Anoprc' => 3, 'Desprc' => 4, 'Desanu' => 5, 'Monprc' => 6, 'Salcom' => 7, 'Salcau' => 8, 'Salpag' => 9, 'Salaju' => 10, 'Staprc' => 11, 'Fecanu' => 12, 'Cedrif' => 13, 'Refsol' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (CpprecomPeer::REFPRC => 0, CpprecomPeer::TIPPRC => 1, CpprecomPeer::FECPRC => 2, CpprecomPeer::ANOPRC => 3, CpprecomPeer::DESPRC => 4, CpprecomPeer::DESANU => 5, CpprecomPeer::MONPRC => 6, CpprecomPeer::SALCOM => 7, CpprecomPeer::SALCAU => 8, CpprecomPeer::SALPAG => 9, CpprecomPeer::SALAJU => 10, CpprecomPeer::STAPRC => 11, CpprecomPeer::FECANU => 12, CpprecomPeer::CEDRIF => 13, CpprecomPeer::REFSOL => 14, CpprecomPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('refprc' => 0, 'tipprc' => 1, 'fecprc' => 2, 'anoprc' => 3, 'desprc' => 4, 'desanu' => 5, 'monprc' => 6, 'salcom' => 7, 'salcau' => 8, 'salpag' => 9, 'salaju' => 10, 'staprc' => 11, 'fecanu' => 12, 'cedrif' => 13, 'refsol' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpprecomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpprecomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpprecomPeer::getTableMap();
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
		return str_replace(CpprecomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpprecomPeer::REFPRC);

		$criteria->addSelectColumn(CpprecomPeer::TIPPRC);

		$criteria->addSelectColumn(CpprecomPeer::FECPRC);

		$criteria->addSelectColumn(CpprecomPeer::ANOPRC);

		$criteria->addSelectColumn(CpprecomPeer::DESPRC);

		$criteria->addSelectColumn(CpprecomPeer::DESANU);

		$criteria->addSelectColumn(CpprecomPeer::MONPRC);

		$criteria->addSelectColumn(CpprecomPeer::SALCOM);

		$criteria->addSelectColumn(CpprecomPeer::SALCAU);

		$criteria->addSelectColumn(CpprecomPeer::SALPAG);

		$criteria->addSelectColumn(CpprecomPeer::SALAJU);

		$criteria->addSelectColumn(CpprecomPeer::STAPRC);

		$criteria->addSelectColumn(CpprecomPeer::FECANU);

		$criteria->addSelectColumn(CpprecomPeer::CEDRIF);

		$criteria->addSelectColumn(CpprecomPeer::REFSOL);

		$criteria->addSelectColumn(CpprecomPeer::ID);

	}

	const COUNT = 'COUNT(cpprecom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpprecom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpprecomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpprecomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpprecomPeer::doSelectRS($criteria, $con);
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
		$objects = CpprecomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpprecomPeer::populateObjects(CpprecomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpprecomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpprecomPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpdocprc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpprecomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpprecomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpprecomPeer::TIPPRC, CpdocprcPeer::TIPPRC);

		$rs = CpprecomPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CpprecomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpprecomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpprecomPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = CpprecomPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpdocprc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpprecomPeer::addSelectColumns($c);
		$startcol = (CpprecomPeer::NUM_COLUMNS - CpprecomPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdocprcPeer::addSelectColumns($c);

		$c->addJoin(CpprecomPeer::TIPPRC, CpdocprcPeer::TIPPRC);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpprecomPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdocprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdocprc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpprecom($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpprecoms();
				$obj2->addCpprecom($obj1); 			}
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

		CpprecomPeer::addSelectColumns($c);
		$startcol = (CpprecomPeer::NUM_COLUMNS - CpprecomPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpbenefiPeer::addSelectColumns($c);

		$c->addJoin(CpprecomPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpprecomPeer::getOMClass();

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
										$temp_obj2->addCpprecom($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpprecoms();
				$obj2->addCpprecom($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpprecomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpprecomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpprecomPeer::TIPPRC, CpdocprcPeer::TIPPRC);
	
			$criteria->addJoin(CpprecomPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
		$rs = CpprecomPeer::doSelectRS($criteria, $con);
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

		CpprecomPeer::addSelectColumns($c);
		$startcol2 = (CpprecomPeer::NUM_COLUMNS - CpprecomPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdocprcPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdocprcPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CpprecomPeer::TIPPRC, CpdocprcPeer::TIPPRC);
	
			$c->addJoin(CpprecomPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpprecomPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpdocprcPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdocprc(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpprecom($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpprecoms();
					$obj2->addCpprecom($obj1);
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
						$temp_obj3->addCpprecom($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpprecoms();
					$obj3->addCpprecom($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpdocprc(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpprecomPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpprecomPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpprecomPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
			$rs = CpprecomPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CpprecomPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpprecomPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpprecomPeer::TIPPRC, CpdocprcPeer::TIPPRC);
		
			$rs = CpprecomPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpdocprc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpprecomPeer::addSelectColumns($c);
		$startcol2 = (CpprecomPeer::NUM_COLUMNS - CpprecomPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OpbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CpprecomPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpprecomPeer::getOMClass();

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
						$temp_obj2->addCpprecom($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpprecoms();
					$obj2->addCpprecom($obj1);
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

		CpprecomPeer::addSelectColumns($c);
		$startcol2 = (CpprecomPeer::NUM_COLUMNS - CpprecomPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdocprcPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdocprcPeer::NUM_COLUMNS;
	
			$c->addJoin(CpprecomPeer::TIPPRC, CpdocprcPeer::TIPPRC);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpprecomPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdocprcPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdocprc(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpprecom($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpprecoms();
					$obj2->addCpprecom($obj1);
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
		return CpprecomPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpprecomPeer::ID); 

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
			$comparison = $criteria->getComparison(CpprecomPeer::ID);
			$selectCriteria->add(CpprecomPeer::ID, $criteria->remove(CpprecomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpprecomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpprecomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpprecom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpprecomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpprecom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpprecomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpprecomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpprecomPeer::DATABASE_NAME, CpprecomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpprecomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpprecomPeer::DATABASE_NAME);

		$criteria->add(CpprecomPeer::ID, $pk);


		$v = CpprecomPeer::doSelect($criteria, $con);

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
			$criteria->add(CpprecomPeer::ID, $pks, Criteria::IN);
			$objs = CpprecomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpprecomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpprecomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpprecomMapBuilder');
}
