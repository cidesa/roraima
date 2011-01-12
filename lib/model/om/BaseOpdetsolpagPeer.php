<?php


abstract class BaseOpdetsolpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opdetsolpag';

	
	const CLASS_DEFAULT = 'lib.model.Opdetsolpag';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFSOL = 'opdetsolpag.REFSOL';

	
	const CODPRE = 'opdetsolpag.CODPRE';

	
	const MONIMP = 'opdetsolpag.MONIMP';

	
	const STAIMP = 'opdetsolpag.STAIMP';

	
	const REFORD = 'opdetsolpag.REFORD';

	
	const REFERE = 'opdetsolpag.REFERE';

	
	const REFPRC = 'opdetsolpag.REFPRC';

	
	const REFCOM = 'opdetsolpag.REFCOM';

	
	const ID = 'opdetsolpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refsol', 'Codpre', 'Monimp', 'Staimp', 'Reford', 'Refere', 'Refprc', 'Refcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpdetsolpagPeer::REFSOL, OpdetsolpagPeer::CODPRE, OpdetsolpagPeer::MONIMP, OpdetsolpagPeer::STAIMP, OpdetsolpagPeer::REFORD, OpdetsolpagPeer::REFERE, OpdetsolpagPeer::REFPRC, OpdetsolpagPeer::REFCOM, OpdetsolpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refsol', 'codpre', 'monimp', 'staimp', 'reford', 'refere', 'refprc', 'refcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refsol' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Staimp' => 3, 'Reford' => 4, 'Refere' => 5, 'Refprc' => 6, 'Refcom' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (OpdetsolpagPeer::REFSOL => 0, OpdetsolpagPeer::CODPRE => 1, OpdetsolpagPeer::MONIMP => 2, OpdetsolpagPeer::STAIMP => 3, OpdetsolpagPeer::REFORD => 4, OpdetsolpagPeer::REFERE => 5, OpdetsolpagPeer::REFPRC => 6, OpdetsolpagPeer::REFCOM => 7, OpdetsolpagPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refsol' => 0, 'codpre' => 1, 'monimp' => 2, 'staimp' => 3, 'reford' => 4, 'refere' => 5, 'refprc' => 6, 'refcom' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpdetsolpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpdetsolpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpdetsolpagPeer::getTableMap();
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
		return str_replace(OpdetsolpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpdetsolpagPeer::REFSOL);

		$criteria->addSelectColumn(OpdetsolpagPeer::CODPRE);

		$criteria->addSelectColumn(OpdetsolpagPeer::MONIMP);

		$criteria->addSelectColumn(OpdetsolpagPeer::STAIMP);

		$criteria->addSelectColumn(OpdetsolpagPeer::REFORD);

		$criteria->addSelectColumn(OpdetsolpagPeer::REFERE);

		$criteria->addSelectColumn(OpdetsolpagPeer::REFPRC);

		$criteria->addSelectColumn(OpdetsolpagPeer::REFCOM);

		$criteria->addSelectColumn(OpdetsolpagPeer::ID);

	}

	const COUNT = 'COUNT(opdetsolpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opdetsolpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
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
		$objects = OpdetsolpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpdetsolpagPeer::populateObjects(OpdetsolpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpdetsolpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpdetsolpagPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinOpsolpag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);

		$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOpordpag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);

		$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpcompro(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);

		$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinOpsolpag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpdetsolpagPeer::addSelectColumns($c);
		$startcol = (OpdetsolpagPeer::NUM_COLUMNS - OpdetsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpsolpagPeer::addSelectColumns($c);

		$c->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpdetsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OpsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOpsolpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addOpdetsolpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initOpdetsolpags();
				$obj2->addOpdetsolpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOpordpag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpdetsolpagPeer::addSelectColumns($c);
		$startcol = (OpdetsolpagPeer::NUM_COLUMNS - OpdetsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpordpagPeer::addSelectColumns($c);

		$c->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpdetsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OpordpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOpordpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addOpdetsolpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initOpdetsolpags();
				$obj2->addOpdetsolpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpcompro(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpdetsolpagPeer::addSelectColumns($c);
		$startcol = (OpdetsolpagPeer::NUM_COLUMNS - OpdetsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpcomproPeer::addSelectColumns($c);

		$c->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpdetsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpcompro(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addOpdetsolpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initOpdetsolpags();
				$obj2->addOpdetsolpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);
	
			$criteria->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);
	
			$criteria->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
	
		$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
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

		OpdetsolpagPeer::addSelectColumns($c);
		$startcol2 = (OpdetsolpagPeer::NUM_COLUMNS - OpdetsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OpsolpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OpsolpagPeer::NUM_COLUMNS;
	
			OpordpagPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpordpagPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);
	
			$c->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);
	
			$c->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpdetsolpagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = OpsolpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOpsolpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addOpdetsolpag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initOpdetsolpags();
					$obj2->addOpdetsolpag($obj1);
				}
	

							
				$omClass = OpordpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpordpag(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addOpdetsolpag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initOpdetsolpags();
					$obj3->addOpdetsolpag($obj1);
				}
	

							
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCpcompro(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addOpdetsolpag($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initOpdetsolpags();
					$obj4->addOpdetsolpag($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptOpsolpag(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);
		
				$criteria->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
		
			$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptOpordpag(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);
		
				$criteria->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
		
			$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpcompro(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(OpdetsolpagPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(OpdetsolpagPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);
		
				$criteria->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);
		
			$rs = OpdetsolpagPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptOpsolpag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpdetsolpagPeer::addSelectColumns($c);
		$startcol2 = (OpdetsolpagPeer::NUM_COLUMNS - OpdetsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OpordpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OpordpagPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);
	
			$c->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpdetsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OpordpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOpordpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addOpdetsolpag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initOpdetsolpags();
					$obj2->addOpdetsolpag($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpcompro(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addOpdetsolpag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initOpdetsolpags();
					$obj3->addOpdetsolpag($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOpordpag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpdetsolpagPeer::addSelectColumns($c);
		$startcol2 = (OpdetsolpagPeer::NUM_COLUMNS - OpdetsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OpsolpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OpsolpagPeer::NUM_COLUMNS;
	
			CpcomproPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpcomproPeer::NUM_COLUMNS;
	
			$c->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);
	
			$c->addJoin(OpdetsolpagPeer::REFCOM, CpcomproPeer::REFCOM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpdetsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OpsolpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOpsolpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addOpdetsolpag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initOpdetsolpags();
					$obj2->addOpdetsolpag($obj1);
				}
	
				$omClass = CpcomproPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpcompro(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addOpdetsolpag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initOpdetsolpags();
					$obj3->addOpdetsolpag($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpcompro(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpdetsolpagPeer::addSelectColumns($c);
		$startcol2 = (OpdetsolpagPeer::NUM_COLUMNS - OpdetsolpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OpsolpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OpsolpagPeer::NUM_COLUMNS;
	
			OpordpagPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpordpagPeer::NUM_COLUMNS;
	
			$c->addJoin(OpdetsolpagPeer::REFSOL, OpsolpagPeer::REFSOL);
	
			$c->addJoin(OpdetsolpagPeer::REFORD, OpordpagPeer::NUMORD);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpdetsolpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OpsolpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOpsolpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addOpdetsolpag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initOpdetsolpags();
					$obj2->addOpdetsolpag($obj1);
				}
	
				$omClass = OpordpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpordpag(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addOpdetsolpag($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initOpdetsolpags();
					$obj3->addOpdetsolpag($obj1);
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
		return OpdetsolpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpdetsolpagPeer::ID); 

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
			$comparison = $criteria->getComparison(OpdetsolpagPeer::ID);
			$selectCriteria->add(OpdetsolpagPeer::ID, $criteria->remove(OpdetsolpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpdetsolpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpdetsolpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opdetsolpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpdetsolpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opdetsolpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpdetsolpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpdetsolpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpdetsolpagPeer::DATABASE_NAME, OpdetsolpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpdetsolpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpdetsolpagPeer::DATABASE_NAME);

		$criteria->add(OpdetsolpagPeer::ID, $pk);


		$v = OpdetsolpagPeer::doSelect($criteria, $con);

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
			$criteria->add(OpdetsolpagPeer::ID, $pks, Criteria::IN);
			$objs = OpdetsolpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpdetsolpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpdetsolpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpdetsolpagMapBuilder');
}
