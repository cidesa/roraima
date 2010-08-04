<?php


abstract class BaseCpcomproPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpcompro';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpcompro';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'cpcompro.REFCOM';

	
	const TIPCOM = 'cpcompro.TIPCOM';

	
	const FECCOM = 'cpcompro.FECCOM';

	
	const ANOCOM = 'cpcompro.ANOCOM';

	
	const REFPRC = 'cpcompro.REFPRC';

	
	const TIPPRC = 'cpcompro.TIPPRC';

	
	const DESCOM = 'cpcompro.DESCOM';

	
	const DESANU = 'cpcompro.DESANU';

	
	const MONCOM = 'cpcompro.MONCOM';

	
	const SALCAU = 'cpcompro.SALCAU';

	
	const SALPAG = 'cpcompro.SALPAG';

	
	const SALAJU = 'cpcompro.SALAJU';

	
	const STACOM = 'cpcompro.STACOM';

	
	const FECANU = 'cpcompro.FECANU';

	
	const CEDRIF = 'cpcompro.CEDRIF';

	
	const TIPO = 'cpcompro.TIPO';

	
	const APRCOM = 'cpcompro.APRCOM';

	
	const CODUBI = 'cpcompro.CODUBI';

	
	const MOTREC = 'cpcompro.MOTREC';

	
	const LOGUSE = 'cpcompro.LOGUSE';

	
	const ID = 'cpcompro.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Tipcom', 'Feccom', 'Anocom', 'Refprc', 'Tipprc', 'Descom', 'Desanu', 'Moncom', 'Salcau', 'Salpag', 'Salaju', 'Stacom', 'Fecanu', 'Cedrif', 'Tipo', 'Aprcom', 'Codubi', 'Motrec', 'Loguse', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpcomproPeer::REFCOM, CpcomproPeer::TIPCOM, CpcomproPeer::FECCOM, CpcomproPeer::ANOCOM, CpcomproPeer::REFPRC, CpcomproPeer::TIPPRC, CpcomproPeer::DESCOM, CpcomproPeer::DESANU, CpcomproPeer::MONCOM, CpcomproPeer::SALCAU, CpcomproPeer::SALPAG, CpcomproPeer::SALAJU, CpcomproPeer::STACOM, CpcomproPeer::FECANU, CpcomproPeer::CEDRIF, CpcomproPeer::TIPO, CpcomproPeer::APRCOM, CpcomproPeer::CODUBI, CpcomproPeer::MOTREC, CpcomproPeer::LOGUSE, CpcomproPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'tipcom', 'feccom', 'anocom', 'refprc', 'tipprc', 'descom', 'desanu', 'moncom', 'salcau', 'salpag', 'salaju', 'stacom', 'fecanu', 'cedrif', 'tipo', 'aprcom', 'codubi', 'motrec', 'loguse', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Tipcom' => 1, 'Feccom' => 2, 'Anocom' => 3, 'Refprc' => 4, 'Tipprc' => 5, 'Descom' => 6, 'Desanu' => 7, 'Moncom' => 8, 'Salcau' => 9, 'Salpag' => 10, 'Salaju' => 11, 'Stacom' => 12, 'Fecanu' => 13, 'Cedrif' => 14, 'Tipo' => 15, 'Aprcom' => 16, 'Codubi' => 17, 'Motrec' => 18, 'Loguse' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (CpcomproPeer::REFCOM => 0, CpcomproPeer::TIPCOM => 1, CpcomproPeer::FECCOM => 2, CpcomproPeer::ANOCOM => 3, CpcomproPeer::REFPRC => 4, CpcomproPeer::TIPPRC => 5, CpcomproPeer::DESCOM => 6, CpcomproPeer::DESANU => 7, CpcomproPeer::MONCOM => 8, CpcomproPeer::SALCAU => 9, CpcomproPeer::SALPAG => 10, CpcomproPeer::SALAJU => 11, CpcomproPeer::STACOM => 12, CpcomproPeer::FECANU => 13, CpcomproPeer::CEDRIF => 14, CpcomproPeer::TIPO => 15, CpcomproPeer::APRCOM => 16, CpcomproPeer::CODUBI => 17, CpcomproPeer::MOTREC => 18, CpcomproPeer::LOGUSE => 19, CpcomproPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'tipcom' => 1, 'feccom' => 2, 'anocom' => 3, 'refprc' => 4, 'tipprc' => 5, 'descom' => 6, 'desanu' => 7, 'moncom' => 8, 'salcau' => 9, 'salpag' => 10, 'salaju' => 11, 'stacom' => 12, 'fecanu' => 13, 'cedrif' => 14, 'tipo' => 15, 'aprcom' => 16, 'codubi' => 17, 'motrec' => 18, 'loguse' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpcomproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpcomproMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpcomproPeer::getTableMap();
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
		return str_replace(CpcomproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpcomproPeer::REFCOM);

		$criteria->addSelectColumn(CpcomproPeer::TIPCOM);

		$criteria->addSelectColumn(CpcomproPeer::FECCOM);

		$criteria->addSelectColumn(CpcomproPeer::ANOCOM);

		$criteria->addSelectColumn(CpcomproPeer::REFPRC);

		$criteria->addSelectColumn(CpcomproPeer::TIPPRC);

		$criteria->addSelectColumn(CpcomproPeer::DESCOM);

		$criteria->addSelectColumn(CpcomproPeer::DESANU);

		$criteria->addSelectColumn(CpcomproPeer::MONCOM);

		$criteria->addSelectColumn(CpcomproPeer::SALCAU);

		$criteria->addSelectColumn(CpcomproPeer::SALPAG);

		$criteria->addSelectColumn(CpcomproPeer::SALAJU);

		$criteria->addSelectColumn(CpcomproPeer::STACOM);

		$criteria->addSelectColumn(CpcomproPeer::FECANU);

		$criteria->addSelectColumn(CpcomproPeer::CEDRIF);

		$criteria->addSelectColumn(CpcomproPeer::TIPO);

		$criteria->addSelectColumn(CpcomproPeer::APRCOM);

		$criteria->addSelectColumn(CpcomproPeer::CODUBI);

		$criteria->addSelectColumn(CpcomproPeer::MOTREC);

		$criteria->addSelectColumn(CpcomproPeer::LOGUSE);

		$criteria->addSelectColumn(CpcomproPeer::ID);

	}

	const COUNT = 'COUNT(cpcompro.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpcompro.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpcomproPeer::doSelectRS($criteria, $con);
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
		$objects = CpcomproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpcomproPeer::populateObjects(CpcomproPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpcomproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpcomproPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpdoccom(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);

		$rs = CpcomproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCpprecom(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);

		$rs = CpcomproPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = CpcomproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpdoccom(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomproPeer::addSelectColumns($c);
		$startcol = (CpcomproPeer::NUM_COLUMNS - CpcomproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdoccomPeer::addSelectColumns($c);

		$c->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdoccomPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdoccom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpcompro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpcompros();
				$obj2->addCpcompro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCpprecom(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomproPeer::addSelectColumns($c);
		$startcol = (CpcomproPeer::NUM_COLUMNS - CpcomproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpprecomPeer::addSelectColumns($c);

		$c->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpprecomPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpprecom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpcompro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpcompros();
				$obj2->addCpcompro($obj1); 			}
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

		CpcomproPeer::addSelectColumns($c);
		$startcol = (CpcomproPeer::NUM_COLUMNS - CpcomproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpbenefiPeer::addSelectColumns($c);

		$c->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomproPeer::getOMClass();

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
										$temp_obj2->addCpcompro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpcompros();
				$obj2->addCpcompro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$criteria->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);
	
			$criteria->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
		$rs = CpcomproPeer::doSelectRS($criteria, $con);
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

		CpcomproPeer::addSelectColumns($c);
		$startcol2 = (CpcomproPeer::NUM_COLUMNS - CpcomproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdoccomPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdoccomPeer::NUM_COLUMNS;
	
			CpprecomPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpprecomPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$c->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);
	
			$c->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomproPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdoccom(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcompro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcompros();
					$obj2->addCpcompro($obj1);
				}
	

							
				$omClass = CpprecomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpprecom(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcompro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcompros();
					$obj3->addCpcompro($obj1);
				}
	

							
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getOpbenefi(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCpcompro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCpcompros();
					$obj4->addCpcompro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpdoccom(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpcomproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);
		
				$criteria->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
			$rs = CpcomproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCpprecom(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpcomproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		
				$criteria->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
			$rs = CpcomproPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(CpcomproPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpcomproPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		
				$criteria->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);
		
			$rs = CpcomproPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpdoccom(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomproPeer::addSelectColumns($c);
		$startcol2 = (CpcomproPeer::NUM_COLUMNS - CpcomproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpprecomPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpprecomPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);
	
			$c->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpprecomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpprecom(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcompro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcompros();
					$obj2->addCpcompro($obj1);
				}
	
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcompro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcompros();
					$obj3->addCpcompro($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCpprecom(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomproPeer::addSelectColumns($c);
		$startcol2 = (CpcomproPeer::NUM_COLUMNS - CpcomproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdoccomPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdoccomPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$c->addJoin(CpcomproPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdoccom(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcompro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcompros();
					$obj2->addCpcompro($obj1);
				}
	
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcompro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcompros();
					$obj3->addCpcompro($obj1);
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

		CpcomproPeer::addSelectColumns($c);
		$startcol2 = (CpcomproPeer::NUM_COLUMNS - CpcomproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdoccomPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdoccomPeer::NUM_COLUMNS;
	
			CpprecomPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CpprecomPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomproPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$c->addJoin(CpcomproPeer::REFPRC, CpprecomPeer::REFPRC);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdoccom(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcompro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcompros();
					$obj2->addCpcompro($obj1);
				}
	
				$omClass = CpprecomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCpprecom(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcompro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcompros();
					$obj3->addCpcompro($obj1);
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
		return CpcomproPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpcomproPeer::ID); 

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
			$comparison = $criteria->getComparison(CpcomproPeer::ID);
			$selectCriteria->add(CpcomproPeer::ID, $criteria->remove(CpcomproPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpcomproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpcomproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpcompro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpcomproPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpcompro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpcomproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpcomproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpcomproPeer::DATABASE_NAME, CpcomproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpcomproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpcomproPeer::DATABASE_NAME);

		$criteria->add(CpcomproPeer::ID, $pk);


		$v = CpcomproPeer::doSelect($criteria, $con);

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
			$criteria->add(CpcomproPeer::ID, $pks, Criteria::IN);
			$objs = CpcomproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpcomproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpcomproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpcomproMapBuilder');
}
