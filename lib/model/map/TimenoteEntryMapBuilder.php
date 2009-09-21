<?php


/**
 * This class adds structure of 'timenote_entry' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Mon Sep 21 23:19:57 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TimenoteEntryMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TimenoteEntryMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(TimenoteEntryPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TimenoteEntryPeer::TABLE_NAME);
		$tMap->setPhpName('TimenoteEntry');
		$tMap->setClassname('TimenoteEntry');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('PROJECT_ID', 'ProjectId', 'INTEGER', 'timenote_project', 'ID', true, null);

		$tMap->addForeignKey('TYPE_ID', 'TypeId', 'INTEGER', 'timenote_type', 'ID', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('START_DT', 'StartDt', 'TIMESTAMP', false, null);

		$tMap->addColumn('END_DT', 'EndDt', 'TIMESTAMP', false, null);

		$tMap->addColumn('COMMENT', 'Comment', 'VARCHAR', true, 255);

		$tMap->addColumn('PERCENT', 'Percent', 'NUMERIC', false, null);

	} // doBuild()

} // TimenoteEntryMapBuilder
