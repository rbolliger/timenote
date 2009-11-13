<?php

/**
 * Base class that represents a row from the 'timeline_generator' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Thu Nov 12 15:55:32 2009
 *
 * @package    lib.model.om
 */
abstract class BaseTimelineGenerator extends BaseObject  implements Persistent {


  const PEER = 'TimelineGeneratorPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TimelineGeneratorPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the date_start field.
	 * @var        string
	 */
	protected $date_start;

	/**
	 * The value for the workdays field.
	 * @var        string
	 */
	protected $workdays;

	/**
	 * The value for the off_days field.
	 * @var        string
	 */
	protected $off_days;

	/**
	 * The value for the hours_start field.
	 * @var        string
	 */
	protected $hours_start;

	/**
	 * The value for the hours_stop field.
	 * @var        string
	 */
	protected $hours_stop;

	/**
	 * @var        array UserWorktime[] Collection to store aggregation of UserWorktime objects.
	 */
	protected $collUserWorktimes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collUserWorktimes.
	 */
	private $lastUserWorktimeCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Initializes internal state of BaseTimelineGenerator object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [optionally formatted] temporal [date_start] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateStart($format = 'Y-m-d H:i:s')
	{
		if ($this->date_start === null) {
			return null;
		}


		if ($this->date_start === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_start);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_start, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [workdays] column value.
	 * 
	 * @return     string
	 */
	public function getWorkdays()
	{
		return $this->workdays;
	}

	/**
	 * Get the [off_days] column value.
	 * 
	 * @return     string
	 */
	public function getOffDays()
	{
		return $this->off_days;
	}

	/**
	 * Get the [hours_start] column value.
	 * 
	 * @return     string
	 */
	public function getHoursStart()
	{
		return $this->hours_start;
	}

	/**
	 * Get the [hours_stop] column value.
	 * 
	 * @return     string
	 */
	public function getHoursStop()
	{
		return $this->hours_stop;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     TimelineGenerator The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TimelineGeneratorPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [date_start] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     TimelineGenerator The current object (for fluent API support)
	 */
	public function setDateStart($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->date_start !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->date_start !== null && $tmpDt = new DateTime($this->date_start)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->date_start = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = TimelineGeneratorPeer::DATE_START;
			}
		} // if either are not null

		return $this;
	} // setDateStart()

	/**
	 * Set the value of [workdays] column.
	 * 
	 * @param      string $v new value
	 * @return     TimelineGenerator The current object (for fluent API support)
	 */
	public function setWorkdays($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->workdays !== $v) {
			$this->workdays = $v;
			$this->modifiedColumns[] = TimelineGeneratorPeer::WORKDAYS;
		}

		return $this;
	} // setWorkdays()

	/**
	 * Set the value of [off_days] column.
	 * 
	 * @param      string $v new value
	 * @return     TimelineGenerator The current object (for fluent API support)
	 */
	public function setOffDays($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->off_days !== $v) {
			$this->off_days = $v;
			$this->modifiedColumns[] = TimelineGeneratorPeer::OFF_DAYS;
		}

		return $this;
	} // setOffDays()

	/**
	 * Set the value of [hours_start] column.
	 * 
	 * @param      string $v new value
	 * @return     TimelineGenerator The current object (for fluent API support)
	 */
	public function setHoursStart($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hours_start !== $v) {
			$this->hours_start = $v;
			$this->modifiedColumns[] = TimelineGeneratorPeer::HOURS_START;
		}

		return $this;
	} // setHoursStart()

	/**
	 * Set the value of [hours_stop] column.
	 * 
	 * @param      string $v new value
	 * @return     TimelineGenerator The current object (for fluent API support)
	 */
	public function setHoursStop($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hours_stop !== $v) {
			$this->hours_stop = $v;
			$this->modifiedColumns[] = TimelineGeneratorPeer::HOURS_STOP;
		}

		return $this;
	} // setHoursStop()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->date_start = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->workdays = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->off_days = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->hours_start = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->hours_stop = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = TimelineGeneratorPeer::NUM_COLUMNS - TimelineGeneratorPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating TimelineGenerator object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TimelineGeneratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = TimelineGeneratorPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collUserWorktimes = null;
			$this->lastUserWorktimeCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseTimelineGenerator:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TimelineGeneratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			TimelineGeneratorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTimelineGenerator:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseTimelineGenerator:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TimelineGeneratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTimelineGenerator:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			TimelineGeneratorPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = TimelineGeneratorPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TimelineGeneratorPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += TimelineGeneratorPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUserWorktimes !== null) {
				foreach ($this->collUserWorktimes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = TimelineGeneratorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserWorktimes !== null) {
					foreach ($this->collUserWorktimes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TimelineGeneratorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDateStart();
				break;
			case 2:
				return $this->getWorkdays();
				break;
			case 3:
				return $this->getOffDays();
				break;
			case 4:
				return $this->getHoursStart();
				break;
			case 5:
				return $this->getHoursStop();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = TimelineGeneratorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDateStart(),
			$keys[2] => $this->getWorkdays(),
			$keys[3] => $this->getOffDays(),
			$keys[4] => $this->getHoursStart(),
			$keys[5] => $this->getHoursStop(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TimelineGeneratorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDateStart($value);
				break;
			case 2:
				$this->setWorkdays($value);
				break;
			case 3:
				$this->setOffDays($value);
				break;
			case 4:
				$this->setHoursStart($value);
				break;
			case 5:
				$this->setHoursStop($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TimelineGeneratorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDateStart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setWorkdays($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOffDays($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHoursStart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHoursStop($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TimelineGeneratorPeer::DATABASE_NAME);

		if ($this->isColumnModified(TimelineGeneratorPeer::ID)) $criteria->add(TimelineGeneratorPeer::ID, $this->id);
		if ($this->isColumnModified(TimelineGeneratorPeer::DATE_START)) $criteria->add(TimelineGeneratorPeer::DATE_START, $this->date_start);
		if ($this->isColumnModified(TimelineGeneratorPeer::WORKDAYS)) $criteria->add(TimelineGeneratorPeer::WORKDAYS, $this->workdays);
		if ($this->isColumnModified(TimelineGeneratorPeer::OFF_DAYS)) $criteria->add(TimelineGeneratorPeer::OFF_DAYS, $this->off_days);
		if ($this->isColumnModified(TimelineGeneratorPeer::HOURS_START)) $criteria->add(TimelineGeneratorPeer::HOURS_START, $this->hours_start);
		if ($this->isColumnModified(TimelineGeneratorPeer::HOURS_STOP)) $criteria->add(TimelineGeneratorPeer::HOURS_STOP, $this->hours_stop);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TimelineGeneratorPeer::DATABASE_NAME);

		$criteria->add(TimelineGeneratorPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of TimelineGenerator (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDateStart($this->date_start);

		$copyObj->setWorkdays($this->workdays);

		$copyObj->setOffDays($this->off_days);

		$copyObj->setHoursStart($this->hours_start);

		$copyObj->setHoursStop($this->hours_stop);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserWorktimes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserWorktime($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     TimelineGenerator Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     TimelineGeneratorPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TimelineGeneratorPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collUserWorktimes collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserWorktimes()
	 */
	public function clearUserWorktimes()
	{
		$this->collUserWorktimes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserWorktimes collection (array).
	 *
	 * By default this just sets the collUserWorktimes collection to an empty array (like clearcollUserWorktimes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUserWorktimes()
	{
		$this->collUserWorktimes = array();
	}

	/**
	 * Gets an array of UserWorktime objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this TimelineGenerator has previously been saved, it will retrieve
	 * related UserWorktimes from storage. If this TimelineGenerator is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array UserWorktime[]
	 * @throws     PropelException
	 */
	public function getUserWorktimes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TimelineGeneratorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserWorktimes === null) {
			if ($this->isNew()) {
			   $this->collUserWorktimes = array();
			} else {

				$criteria->add(UserWorktimePeer::TIMELINE_GENERATOR_ID, $this->id);

				UserWorktimePeer::addSelectColumns($criteria);
				$this->collUserWorktimes = UserWorktimePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UserWorktimePeer::TIMELINE_GENERATOR_ID, $this->id);

				UserWorktimePeer::addSelectColumns($criteria);
				if (!isset($this->lastUserWorktimeCriteria) || !$this->lastUserWorktimeCriteria->equals($criteria)) {
					$this->collUserWorktimes = UserWorktimePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserWorktimeCriteria = $criteria;
		return $this->collUserWorktimes;
	}

	/**
	 * Returns the number of related UserWorktime objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserWorktime objects.
	 * @throws     PropelException
	 */
	public function countUserWorktimes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TimelineGeneratorPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUserWorktimes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UserWorktimePeer::TIMELINE_GENERATOR_ID, $this->id);

				$count = UserWorktimePeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(UserWorktimePeer::TIMELINE_GENERATOR_ID, $this->id);

				if (!isset($this->lastUserWorktimeCriteria) || !$this->lastUserWorktimeCriteria->equals($criteria)) {
					$count = UserWorktimePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUserWorktimes);
				}
			} else {
				$count = count($this->collUserWorktimes);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a UserWorktime object to this object
	 * through the UserWorktime foreign key attribute.
	 *
	 * @param      UserWorktime $l UserWorktime
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserWorktime(UserWorktime $l)
	{
		if ($this->collUserWorktimes === null) {
			$this->initUserWorktimes();
		}
		if (!in_array($l, $this->collUserWorktimes, true)) { // only add it if the **same** object is not already associated
			array_push($this->collUserWorktimes, $l);
			$l->setTimelineGenerator($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TimelineGenerator is new, it will return
	 * an empty collection; or if this TimelineGenerator has previously
	 * been saved, it will retrieve related UserWorktimes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TimelineGenerator.
	 */
	public function getUserWorktimesJoinsfGuardUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(TimelineGeneratorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserWorktimes === null) {
			if ($this->isNew()) {
				$this->collUserWorktimes = array();
			} else {

				$criteria->add(UserWorktimePeer::TIMELINE_GENERATOR_ID, $this->id);

				$this->collUserWorktimes = UserWorktimePeer::doSelectJoinsfGuardUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UserWorktimePeer::TIMELINE_GENERATOR_ID, $this->id);

			if (!isset($this->lastUserWorktimeCriteria) || !$this->lastUserWorktimeCriteria->equals($criteria)) {
				$this->collUserWorktimes = UserWorktimePeer::doSelectJoinsfGuardUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastUserWorktimeCriteria = $criteria;

		return $this->collUserWorktimes;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collUserWorktimes) {
				foreach ((array) $this->collUserWorktimes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collUserWorktimes = null;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTimelineGenerator:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTimelineGenerator::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseTimelineGenerator
