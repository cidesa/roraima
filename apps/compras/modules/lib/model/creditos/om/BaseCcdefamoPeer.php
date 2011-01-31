<?php


abstract class BaseCcdefamoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccdefamo';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccdefamo';

	
	const NUM_COLUMNS = 35;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccdefamo.ID';

	
	const MONTOT = 'ccdefamo.MONTOT';

	
	const CUOTAS = 'ccdefamo.CUOTAS';

	
	const NUMCUO = 'ccdefamo.NUMCUO';

	
	const NUMCUOFIN = 'ccdefamo.NUMCUOFIN';

	
	const NUMCUOANU = 'ccdefamo.NUMCUOANU';

	
	const PERGRA = 'ccdefamo.PERGRA';

	
	const PERMUE = 'ccdefamo.PERMUE';

	
	const PLAFIN = 'ccdefamo.PLAFIN';

	
	const PLAZO = 'ccdefamo.PLAZO';

	
	const FECDESDEF = 'ccdefamo.FECDESDEF';

	
	const FECHASDEF = 'ccdefamo.FECHASDEF';

	
	const DIFINT = 'ccdefamo.DIFINT';

	
	const TASINTMOR = 'ccdefamo.TASINTMOR';

	
	const TASINT = 'ccdefamo.TASINT';

	
	const DISANU = 'ccdefamo.DISANU';

	
	const PORDISANU = 'ccdefamo.PORDISANU';

	
	const RESEQU = 'ccdefamo.RESEQU';

	
	const CUOESP = 'ccdefamo.CUOESP';

	
	const CUOESPIGU = 'ccdefamo.CUOESPIGU';

	
	const INTGRAVA = 'ccdefamo.INTGRAVA';

	
	const INTCUMINC = 'ccdefamo.INTCUMINC';

	
	const APORGRAVA = 'ccdefamo.APORGRAVA';

	
	const CCPERIOD_ID = 'ccdefamo.CCPERIOD_ID';

	
	const CCTIPINT_ID = 'ccdefamo.CCTIPINT_ID';

	
	const CCCREDIT_ID = 'ccdefamo.CCCREDIT_ID';

	
	const CCPARTID_ID = 'ccdefamo.CCPARTID_ID';

	
	const CCPROGRA_ID = 'ccdefamo.CCPROGRA_ID';

	
	const CCPERGRAVA_ID = 'ccdefamo.CCPERGRAVA_ID';

	
	const CANTCUOESP = 'ccdefamo.CANTCUOESP';

	
	const CUOESPINIC = 'ccdefamo.CUOESPINIC';

	
	const FRECUOESP = 'ccdefamo.FRECUOESP';

	
	const MONCUOESP = 'ccdefamo.MONCUOESP';

	
	const MONCUOPLA = 'ccdefamo.MONCUOPLA';

	
	const OBSERV = 'ccdefamo.OBSERV';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Montot', 'Cuotas', 'Numcuo', 'Numcuofin', 'Numcuoanu', 'Pergra', 'Permue', 'Plafin', 'Plazo', 'Fecdesdef', 'Fechasdef', 'Difint', 'Tasintmor', 'Tasint', 'Disanu', 'Pordisanu', 'Resequ', 'Cuoesp', 'Cuoespigu', 'Intgrava', 'Intcuminc', 'Aporgrava', 'CcperiodId', 'CctipintId', 'CccreditId', 'CcpartidId', 'CcprograId', 'CcpergravaId', 'Cantcuoesp', 'Cuoespinic', 'Frecuoesp', 'Moncuoesp', 'Moncuopla', 'Observ', ),
		BasePeer::TYPE_COLNAME => array (CcdefamoPeer::ID, CcdefamoPeer::MONTOT, CcdefamoPeer::CUOTAS, CcdefamoPeer::NUMCUO, CcdefamoPeer::NUMCUOFIN, CcdefamoPeer::NUMCUOANU, CcdefamoPeer::PERGRA, CcdefamoPeer::PERMUE, CcdefamoPeer::PLAFIN, CcdefamoPeer::PLAZO, CcdefamoPeer::FECDESDEF, CcdefamoPeer::FECHASDEF, CcdefamoPeer::DIFINT, CcdefamoPeer::TASINTMOR, CcdefamoPeer::TASINT, CcdefamoPeer::DISANU, CcdefamoPeer::PORDISANU, CcdefamoPeer::RESEQU, CcdefamoPeer::CUOESP, CcdefamoPeer::CUOESPIGU, CcdefamoPeer::INTGRAVA, CcdefamoPeer::INTCUMINC, CcdefamoPeer::APORGRAVA, CcdefamoPeer::CCPERIOD_ID, CcdefamoPeer::CCTIPINT_ID, CcdefamoPeer::CCCREDIT_ID, CcdefamoPeer::CCPARTID_ID, CcdefamoPeer::CCPROGRA_ID, CcdefamoPeer::CCPERGRAVA_ID, CcdefamoPeer::CANTCUOESP, CcdefamoPeer::CUOESPINIC, CcdefamoPeer::FRECUOESP, CcdefamoPeer::MONCUOESP, CcdefamoPeer::MONCUOPLA, CcdefamoPeer::OBSERV, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'montot', 'cuotas', 'numcuo', 'numcuofin', 'numcuoanu', 'pergra', 'permue', 'plafin', 'plazo', 'fecdesdef', 'fechasdef', 'difint', 'tasintmor', 'tasint', 'disanu', 'pordisanu', 'resequ', 'cuoesp', 'cuoespigu', 'intgrava', 'intcuminc', 'aporgrava', 'ccperiod_id', 'cctipint_id', 'cccredit_id', 'ccpartid_id', 'ccprogra_id', 'ccpergrava_id', 'cantcuoesp', 'cuoespinic', 'frecuoesp', 'moncuoesp', 'moncuopla', 'observ', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Montot' => 1, 'Cuotas' => 2, 'Numcuo' => 3, 'Numcuofin' => 4, 'Numcuoanu' => 5, 'Pergra' => 6, 'Permue' => 7, 'Plafin' => 8, 'Plazo' => 9, 'Fecdesdef' => 10, 'Fechasdef' => 11, 'Difint' => 12, 'Tasintmor' => 13, 'Tasint' => 14, 'Disanu' => 15, 'Pordisanu' => 16, 'Resequ' => 17, 'Cuoesp' => 18, 'Cuoespigu' => 19, 'Intgrava' => 20, 'Intcuminc' => 21, 'Aporgrava' => 22, 'CcperiodId' => 23, 'CctipintId' => 24, 'CccreditId' => 25, 'CcpartidId' => 26, 'CcprograId' => 27, 'CcpergravaId' => 28, 'Cantcuoesp' => 29, 'Cuoespinic' => 30, 'Frecuoesp' => 31, 'Moncuoesp' => 32, 'Moncuopla' => 33, 'Observ' => 34, ),
		BasePeer::TYPE_COLNAME => array (CcdefamoPeer::ID => 0, CcdefamoPeer::MONTOT => 1, CcdefamoPeer::CUOTAS => 2, CcdefamoPeer::NUMCUO => 3, CcdefamoPeer::NUMCUOFIN => 4, CcdefamoPeer::NUMCUOANU => 5, CcdefamoPeer::PERGRA => 6, CcdefamoPeer::PERMUE => 7, CcdefamoPeer::PLAFIN => 8, CcdefamoPeer::PLAZO => 9, CcdefamoPeer::FECDESDEF => 10, CcdefamoPeer::FECHASDEF => 11, CcdefamoPeer::DIFINT => 12, CcdefamoPeer::TASINTMOR => 13, CcdefamoPeer::TASINT => 14, CcdefamoPeer::DISANU => 15, CcdefamoPeer::PORDISANU => 16, CcdefamoPeer::RESEQU => 17, CcdefamoPeer::CUOESP => 18, CcdefamoPeer::CUOESPIGU => 19, CcdefamoPeer::INTGRAVA => 20, CcdefamoPeer::INTCUMINC => 21, CcdefamoPeer::APORGRAVA => 22, CcdefamoPeer::CCPERIOD_ID => 23, CcdefamoPeer::CCTIPINT_ID => 24, CcdefamoPeer::CCCREDIT_ID => 25, CcdefamoPeer::CCPARTID_ID => 26, CcdefamoPeer::CCPROGRA_ID => 27, CcdefamoPeer::CCPERGRAVA_ID => 28, CcdefamoPeer::CANTCUOESP => 29, CcdefamoPeer::CUOESPINIC => 30, CcdefamoPeer::FRECUOESP => 31, CcdefamoPeer::MONCUOESP => 32, CcdefamoPeer::MONCUOPLA => 33, CcdefamoPeer::OBSERV => 34, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'montot' => 1, 'cuotas' => 2, 'numcuo' => 3, 'numcuofin' => 4, 'numcuoanu' => 5, 'pergra' => 6, 'permue' => 7, 'plafin' => 8, 'plazo' => 9, 'fecdesdef' => 10, 'fechasdef' => 11, 'difint' => 12, 'tasintmor' => 13, 'tasint' => 14, 'disanu' => 15, 'pordisanu' => 16, 'resequ' => 17, 'cuoesp' => 18, 'cuoespigu' => 19, 'intgrava' => 20, 'intcuminc' => 21, 'aporgrava' => 22, 'ccperiod_id' => 23, 'cctipint_id' => 24, 'cccredit_id' => 25, 'ccpartid_id' => 26, 'ccprogra_id' => 27, 'ccpergrava_id' => 28, 'cantcuoesp' => 29, 'cuoespinic' => 30, 'frecuoesp' => 31, 'moncuoesp' => 32, 'moncuopla' => 33, 'observ' => 34, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcdefamoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcdefamoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcdefamoPeer::getTableMap();
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
		return str_replace(CcdefamoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcdefamoPeer::ID);

		$criteria->addSelectColumn(CcdefamoPeer::MONTOT);

		$criteria->addSelectColumn(CcdefamoPeer::CUOTAS);

		$criteria->addSelectColumn(CcdefamoPeer::NUMCUO);

		$criteria->addSelectColumn(CcdefamoPeer::NUMCUOFIN);

		$criteria->addSelectColumn(CcdefamoPeer::NUMCUOANU);

		$criteria->addSelectColumn(CcdefamoPeer::PERGRA);

		$criteria->addSelectColumn(CcdefamoPeer::PERMUE);

		$criteria->addSelectColumn(CcdefamoPeer::PLAFIN);

		$criteria->addSelectColumn(CcdefamoPeer::PLAZO);

		$criteria->addSelectColumn(CcdefamoPeer::FECDESDEF);

		$criteria->addSelectColumn(CcdefamoPeer::FECHASDEF);

		$criteria->addSelectColumn(CcdefamoPeer::DIFINT);

		$criteria->addSelectColumn(CcdefamoPeer::TASINTMOR);

		$criteria->addSelectColumn(CcdefamoPeer::TASINT);

		$criteria->addSelectColumn(CcdefamoPeer::DISANU);

		$criteria->addSelectColumn(CcdefamoPeer::PORDISANU);

		$criteria->addSelectColumn(CcdefamoPeer::RESEQU);

		$criteria->addSelectColumn(CcdefamoPeer::CUOESP);

		$criteria->addSelectColumn(CcdefamoPeer::CUOESPIGU);

		$criteria->addSelectColumn(CcdefamoPeer::INTGRAVA);

		$criteria->addSelectColumn(CcdefamoPeer::INTCUMINC);

		$criteria->addSelectColumn(CcdefamoPeer::APORGRAVA);

		$criteria->addSelectColumn(CcdefamoPeer::CCPERIOD_ID);

		$criteria->addSelectColumn(CcdefamoPeer::CCTIPINT_ID);

		$criteria->addSelectColumn(CcdefamoPeer::CCCREDIT_ID);

		$criteria->addSelectColumn(CcdefamoPeer::CCPARTID_ID);

		$criteria->addSelectColumn(CcdefamoPeer::CCPROGRA_ID);

		$criteria->addSelectColumn(CcdefamoPeer::CCPERGRAVA_ID);

		$criteria->addSelectColumn(CcdefamoPeer::CANTCUOESP);

		$criteria->addSelectColumn(CcdefamoPeer::CUOESPINIC);

		$criteria->addSelectColumn(CcdefamoPeer::FRECUOESP);

		$criteria->addSelectColumn(CcdefamoPeer::MONCUOESP);

		$criteria->addSelectColumn(CcdefamoPeer::MONCUOPLA);

		$criteria->addSelectColumn(CcdefamoPeer::OBSERV);

	}

	const COUNT = 'COUNT(ccdefamo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccdefamo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
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
		$objects = CcdefamoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcdefamoPeer::populateObjects(CcdefamoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcdefamoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcdefamoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcperiodRelatedByCcperiodId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCctipint(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCccredit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcpartid(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcprogra(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcperiodRelatedByCcpergravaId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCcperiodRelatedByFrecuoesp(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);

		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcperiodRelatedByCcperiodId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperiodPeer::addSelectColumns($c);

		$c->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperiodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperiodRelatedByCcperiodId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdefamoRelatedByCcperiodId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdefamosRelatedByCcperiodId();
				$obj2->addCcdefamoRelatedByCcperiodId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCctipint(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CctipintPeer::addSelectColumns($c);

		$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CctipintPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCctipint(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdefamo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdefamos();
				$obj2->addCcdefamo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CccreditPeer::addSelectColumns($c);

		$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CccreditPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCccredit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdefamo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdefamos();
				$obj2->addCcdefamo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcpartidPeer::addSelectColumns($c);

		$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcpartidPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcpartid(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdefamo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdefamos();
				$obj2->addCcdefamo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcprograPeer::addSelectColumns($c);

		$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcprograPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcprogra(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdefamo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdefamos();
				$obj2->addCcdefamo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcperiodRelatedByCcpergravaId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperiodPeer::addSelectColumns($c);

		$c->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperiodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperiodRelatedByCcpergravaId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdefamoRelatedByCcpergravaId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdefamosRelatedByCcpergravaId();
				$obj2->addCcdefamoRelatedByCcpergravaId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCcperiodRelatedByFrecuoesp(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcperiodPeer::addSelectColumns($c);

		$c->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcperiodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcperiodRelatedByFrecuoesp(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcdefamoRelatedByFrecuoesp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcdefamosRelatedByFrecuoesp();
				$obj2->addCcdefamoRelatedByFrecuoesp($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcdefamoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$criteria->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
			$criteria->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
	
		$rs = CcdefamoPeer::doSelectRS($criteria, $con);
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

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipintPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcprograPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcperiodPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol9 = $startcol8 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiodRelatedByCcperiodId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamoRelatedByCcperiodId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamosRelatedByCcperiodId();
					$obj2->addCcdefamoRelatedByCcperiodId($obj1);
				}
	

							
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	

							
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	

							
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcpartid(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
				}
	

							
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcprogra(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdefamo($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdefamos();
					$obj6->addCcdefamo($obj1);
				}
	

							
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcperiodRelatedByCcpergravaId(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcdefamoRelatedByCcpergravaId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initCcdefamosRelatedByCcpergravaId();
					$obj7->addCcdefamoRelatedByCcpergravaId($obj1);
				}
	

							
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj8 = new $cls();
				$obj8->hydrate($rs, $startcol8);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj8 = $temp_obj1->getCcperiodRelatedByFrecuoesp(); 					if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
						$newObject = false;
						$temp_obj8->addCcdefamoRelatedByFrecuoesp($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj8->initCcdefamosRelatedByFrecuoesp();
					$obj8->addCcdefamoRelatedByFrecuoesp($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCcperiodRelatedByCcperiodId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcdefamoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCctipint(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
		
			$rs = CcdefamoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCccredit(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
		
			$rs = CcdefamoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcpartid(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
		
			$rs = CcdefamoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcprogra(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
		
			$rs = CcdefamoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcperiodRelatedByCcpergravaId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcdefamoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCcperiodRelatedByFrecuoesp(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CcdefamoPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
		
				$criteria->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
		
			$rs = CcdefamoPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCcperiodRelatedByCcperiodId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipintPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipintPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipint(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamos();
					$obj2->addCcdefamo($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcprogra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCctipint(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiodRelatedByCcperiodId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamoRelatedByCcperiodId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamosRelatedByCcperiodId();
					$obj2->addCcdefamoRelatedByCcperiodId($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcprogra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiodRelatedByCcpergravaId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdefamoRelatedByCcpergravaId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdefamosRelatedByCcpergravaId();
					$obj6->addCcdefamoRelatedByCcpergravaId($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcperiodRelatedByFrecuoesp(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcdefamoRelatedByFrecuoesp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcdefamosRelatedByFrecuoesp();
					$obj7->addCcdefamoRelatedByFrecuoesp($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCccredit(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipintPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiodRelatedByCcperiodId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamoRelatedByCcperiodId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamosRelatedByCcperiodId();
					$obj2->addCcdefamoRelatedByCcperiodId($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcprogra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiodRelatedByCcpergravaId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdefamoRelatedByCcpergravaId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdefamosRelatedByCcpergravaId();
					$obj6->addCcdefamoRelatedByCcpergravaId($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcperiodRelatedByFrecuoesp(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcdefamoRelatedByFrecuoesp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcdefamosRelatedByFrecuoesp();
					$obj7->addCcdefamoRelatedByFrecuoesp($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcpartid(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipintPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiodRelatedByCcperiodId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamoRelatedByCcperiodId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamosRelatedByCcperiodId();
					$obj2->addCcdefamoRelatedByCcperiodId($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcprogra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiodRelatedByCcpergravaId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdefamoRelatedByCcpergravaId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdefamosRelatedByCcpergravaId();
					$obj6->addCcdefamoRelatedByCcpergravaId($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcperiodRelatedByFrecuoesp(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcdefamoRelatedByFrecuoesp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcdefamosRelatedByFrecuoesp();
					$obj7->addCcdefamoRelatedByFrecuoesp($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcprogra(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcperiodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcperiodPeer::NUM_COLUMNS;
	
			CctipintPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CctipintPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcpartidPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + CcperiodPeer::NUM_COLUMNS;
	
			CcperiodPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + CcperiodPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCPERIOD_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPERGRAVA_ID, CcperiodPeer::ID);
	
			$c->addJoin(CcdefamoPeer::FRECUOESP, CcperiodPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcperiodRelatedByCcperiodId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamoRelatedByCcperiodId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamosRelatedByCcperiodId();
					$obj2->addCcdefamoRelatedByCcperiodId($obj1);
				}
	
				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCctipint(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCccredit(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcpartid(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getCcperiodRelatedByCcpergravaId(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addCcdefamoRelatedByCcpergravaId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initCcdefamosRelatedByCcpergravaId();
					$obj6->addCcdefamoRelatedByCcpergravaId($obj1);
				}
	
				$omClass = CcperiodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7  = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getCcperiodRelatedByFrecuoesp(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addCcdefamoRelatedByFrecuoesp($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj7->initCcdefamosRelatedByFrecuoesp();
					$obj7->addCcdefamoRelatedByFrecuoesp($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcperiodRelatedByCcpergravaId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipintPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipintPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipint(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamos();
					$obj2->addCcdefamo($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcprogra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCcperiodRelatedByFrecuoesp(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcdefamoPeer::addSelectColumns($c);
		$startcol2 = (CcdefamoPeer::NUM_COLUMNS - CcdefamoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CctipintPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CctipintPeer::NUM_COLUMNS;
	
			CccreditPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CccreditPeer::NUM_COLUMNS;
	
			CcpartidPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + CcpartidPeer::NUM_COLUMNS;
	
			CcprograPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + CcprograPeer::NUM_COLUMNS;
	
			$c->addJoin(CcdefamoPeer::CCTIPINT_ID, CctipintPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCCREDIT_ID, CccreditPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPARTID_ID, CcpartidPeer::ID);
	
			$c->addJoin(CcdefamoPeer::CCPROGRA_ID, CcprograPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcdefamoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CctipintPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCctipint(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCcdefamos();
					$obj2->addCcdefamo($obj1);
				}
	
				$omClass = CccreditPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCccredit(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCcdefamos();
					$obj3->addCcdefamo($obj1);
				}
	
				$omClass = CcpartidPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getCcpartid(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initCcdefamos();
					$obj4->addCcdefamo($obj1);
				}
	
				$omClass = CcprograPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getCcprogra(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addCcdefamo($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initCcdefamos();
					$obj5->addCcdefamo($obj1);
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
		return CcdefamoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcdefamoPeer::ID); 

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
			$comparison = $criteria->getComparison(CcdefamoPeer::ID);
			$selectCriteria->add(CcdefamoPeer::ID, $criteria->remove(CcdefamoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcdefamoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcdefamoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccdefamo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcdefamoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccdefamo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcdefamoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcdefamoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcdefamoPeer::DATABASE_NAME, CcdefamoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcdefamoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcdefamoPeer::DATABASE_NAME);

		$criteria->add(CcdefamoPeer::ID, $pk);


		$v = CcdefamoPeer::doSelect($criteria, $con);

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
			$criteria->add(CcdefamoPeer::ID, $pks, Criteria::IN);
			$objs = CcdefamoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcdefamoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcdefamoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcdefamoMapBuilder');
}
