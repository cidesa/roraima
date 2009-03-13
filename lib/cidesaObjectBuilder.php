<?php
/*
 * Created on 31/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

<?php

require_once 'addon/propel/builder/SfObjectBuilder.php';


class cidesaObjectBuilder extends sfObjectBuilder
{


  /**
  * Metodo __call .
  * @param string &$script The script will be modified in this method.
  */
  protected function addMyCall(&$script)
  {
    $script .= "
  /**
  * Función para agilizar la generación de funciones Get y Set
  * basada en la función __call de PHP.
  * Generado por Luis Hernández.
  */
  public function __call(\$m, \$a)
    {
      \$prefijo = substr(\$m,0,3);
    \$metodo = strtolower(substr(\$m,3));
    //print \$prefijo.\$metodo;
    if(\$prefijo=='get'){
      if(isset(\$this->\$metodo)) return \$this->\$metodo;
      else return '';
    }elseif(\$prefijo=='set'){
      if(isset(\$this->\$metodo)) \$this->\$metodo = \$a[0];
    }else call_user_func_array(\$m, \$a);

    }
";
  }

  /**
  * Adds setter method for "normal" columns.
  * @param string &$script The script will be modified in this method.
  * @param Column $col The current column.
  * @see parent::addColumnMutators()
  */
  protected function addDefaultMutator(&$script, Column $col)
  {
    $clo = strtolower($col->getName());

    // FIXME: refactor this
    $defaultValue = null;
    if (($val = $col->getPhpDefaultValue()) !== null) {
      settype($val, $col->getPhpNative());
      $defaultValue = var_export($val, true);
    }

    $this->addMutatorOpen($script, $col);
    $script .= "
    if (\$this->$clo !== \$v";
    if ($defaultValue !== null) {
      $script .= " || \$v === $defaultValue";
    }
    if($col->getType() == PropelTypes::NUMERIC){
      $script .= ") {
        \$this->$clo = Herramientas::toFloat(\$v);
        \$this->modifiedColumns[] = ".$this->getColumnConstant($col).";
      }
  ";
    }else{
      $script .= ") {
        \$this->$clo = \$v;
        \$this->modifiedColumns[] = ".$this->getColumnConstant($col).";
      }
  ";
    }

    $this->addMutatorClose($script, $col);
  }

  /**
  * Adds a normal (non-temporal) getter method.
  * @param string &$script The script will be modified in this method.
  * @param Column $col The current column.
  * @see parent::addColumnAccessors()
  */
  protected function addGenericAccessor(&$script, $col)
  {
    $cfc=$col->getPhpName();
    $clo=strtolower($col->getName());

    $script .= "
  /**
  * Get the [$clo] column value.
  * ".$col->getDescription()."
  * @return ".$col->getPhpNative()."
  */
  public function get$cfc(";

    if($col->getType() == PropelTypes::NUMERIC){
      $script .= "\$val=false";}

    if ($col->isLazyLoad()) $script .= "\$con = null";
    $script .= ")
  {
";
    if ($col->isLazyLoad()) {
      $script .= "
    if (!\$this->".$clo."_isLoaded && \$this->$clo === null && !\$this->isNew()) {
      \$this->load$cfc(\$con);
    }
";
    }

//              Código Agregado - Luis Hernández - 24/06/07
    if($col->getType() == PropelTypes::NUMERIC){
      $script .= "
    if(\$val) return number_format(\$this->".$clo.",2,',','.');
    else return \$this->".$clo.";

  }";
      //$script .= "  // Tipo de Columna = ".$col->getType();
    }elseif($col->getType() == PropelTypes::VARCHAR){
      $script .= "
    return trim(\$this->".$clo.");

  }";
    }else{
      $script .= "
    return \$this->".$clo.";

  }";
    }
  }

  /**
   * Adds the hydrate() method, which sets attributes of the object based on a ResultSet.
   */
  protected function addMyHydrate(&$script)
  {
    $table = $this->getTable();

    $script .= "
  /**
   * Hydrates (populates) the object variables with values from the database resultset.
   *
   * An offset (1-based \"start column\") is specified so that objects can be hydrated
   * with a subset of the columns in the resultset rows.  This is needed, for example,
   * for results of JOIN queries where the resultset row includes columns from two or
   * more tables.
   *
   * @param      ResultSet \$rs The ResultSet class with cursor advanced to desired record pos.
   * @param      int \$startcol 1-based offset column which indicates which restultset column to start with.
   * @return     int next starting column
   * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
   */
  public function hydrate(ResultSet \$rs, \$startcol = 1)
  {
    try {
";
      $n = 0;
      foreach($table->getColumns() as $col) {
        if(!$col->isLazyLoad()) {
          $affix = CreoleTypes::getAffix(CreoleTypes::getCreoleCode($col->getType()));
          $clo = strtolower($col->getName());
          switch($col->getType()) {

            case PropelTypes::DATE:
            case PropelTypes::TIME:
            case PropelTypes::TIMESTAMP:
              $script .= "
      \$this->$clo = \$rs->get$affix(\$startcol + $n, null);
";
              break;
            default:
              $script .= "
      \$this->$clo = \$rs->get$affix(\$startcol + $n);
";
          }
          $n++;
        } // if col->isLazyLoad()
      } /* foreach */

      if ($this->getBuildProperty("addSaveMethod")) {
        $script .= "
      \$this->resetModified();
";
      }

      $script .= "
      \$this->setNew(false);

      \$this->afterHydrate();

      // FIXME - using NUM_COLUMNS may be clearer.
      return \$startcol + $n; // $n = ".$this->getPeerClassname()."::NUM_COLUMNS - ".$this->getPeerClassname()."::NUM_LAZY_LOAD_COLUMNS).

    } catch (Exception \$e) {
      throw new PropelException(\"Error populating ".$table->getPhpName()." object\", \$e);
    }
  }

";

  } // addHydrate()

  protected function addafterHydrate(&$script)
  {
    $script .= "
  protected function afterHydrate()
  {

  }
    ";
  }


  protected function addHydrate(&$script)
  {
    $this->addMyHydrate($script);

    $this->addafterHydrate($script);

    $this->addMyCall($script);



  }



  // --------------------------------------------------------------
  //
  // A C C E S S O R    M E T H O D S
  //
  // --------------------------------------------------------------

  /**
  * Adds a date/time/timestamp getter method.
  * @param string &$script The script will be modified in this method.
  * @param Column $col The current column.
  * @see parent::addColumnAccessors()
  */
  protected function addTemporalAccessor(&$script, $col)
  {
    $cfc=$col->getPhpName();
    $clo=strtolower($col->getName());

    // these default values are based on the Creole defaults
    // the date and time default formats are locale-sensitive
    if ($col->getType() === PropelTypes::DATE) {
      $defaultfmt = $this->getBuildProperty('defaultDateFormat');
    } elseif ($col->getType() === PropelTypes::TIME) {
      $defaultfmt = $this->getBuildProperty('defaultTimeFormat');
    } elseif ($col->getType() === PropelTypes::TIMESTAMP) {
      $defaultfmt = $this->getBuildProperty('defaultTimeStampFormat');
    }

    // if the default format property was an empty string, then we'll set it
    // to NULL, which will return the "native" integer timestamp
    if (empty($defaultfmt)) { $defaultfmt = null; }

    $script .= "
  /**
  * Get the [optionally formatted] [$clo] column value.
  * ".$col->getDescription()."
  * @param string \$format The date/time format string (either date()-style or strftime()-style).
  *              If format is NULL, then the integer unix timestamp will be returned.
  * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
  * @throws PropelException - if unable to convert the date/time to timestamp.
  */
  public function get$cfc(\$format = ".var_export($defaultfmt, true)."";
    if ($col->isLazyLoad()) $script .= ", \$con = null";
    $script .= ")
  {
";
    if ($col->isLazyLoad()) {
      $script .= "
    if (!\$this->".$clo."_isLoaded && \$this->$clo === null && !\$this->isNew()) {
      \$this->load$cfc(\$con);
    }
";
    }
    $script .= "
    if (\$this->$clo === null || \$this->$clo === '') {
      return null;
    } elseif (!is_int(\$this->$clo)) {
      // a non-timestamp value was set externally, so we convert it
      \$ts = adodb_strtotime(\$this->$clo);
      if (\$ts === -1 || \$ts === false) { // in PHP 5.1 return value changes to FALSE
        throw new PropelException(\"Unable to parse value of [$clo] as date/time value: \" . var_export(\$this->$clo, true));
      }
    } else {
      \$ts = \$this->$clo;
    }
    if (\$format === null) {
      return \$ts;
    } elseif (strpos(\$format, '%') !== false) {
      return adodb_strftime(\$format, \$ts);
    } else {
      return @adodb_date(\$format, \$ts);
    }
  }
";
  } // addTemporalAccessor


  /**
  * Adds a setter method for date/time/timestamp columns.
  * @param string &$script The script will be modified in this method.
  * @param Column $col The current column.
  * @see parent::addColumnMutators()
  */
  protected function addTemporalMutator(&$script, Column $col)
  {
    $clo = strtolower($col->getName());

    $defaultValue = null;
    if (($val = $col->getPhpDefaultValue()) !== null) {
      settype($val, $col->getPhpNative());
      $defaultValue = var_export($val, true);
    }

    $this->addMutatorOpen($script, $col);

    $script .= "
    if (\$v !== null && !is_int(\$v)) {
      \$ts = adodb_strtotime(\$v);
      if (\$ts === -1 || \$ts === false) { // in PHP 5.1 return value changes to FALSE
        throw new PropelException(\"Unable to parse date/time value for [$clo] from input: \" . var_export(\$v, true));
      }
    } else {
      \$ts = \$v;
    }
    if (\$this->$clo !== \$ts";
    if ($defaultValue !== null) {
      $script .= " || \$ts === $defaultValue";
    }
    $script .= ") {
      \$this->$clo = \$ts;
      \$this->modifiedColumns[] = ".$this->getColumnConstant($col).";
    }
";
    $this->addMutatorClose($script, $col);
  }
}



