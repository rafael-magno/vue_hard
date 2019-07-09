<?php

namespace Map;

use \AlunoHasDisciplina;
use \AlunoHasDisciplinaQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'aluno_has_disciplina' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AlunoHasDisciplinaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AlunoHasDisciplinaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'aluno_has_disciplina';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AlunoHasDisciplina';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AlunoHasDisciplina';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the aluno_idaluno field
     */
    const COL_ALUNO_IDALUNO = 'aluno_has_disciplina.aluno_idaluno';

    /**
     * the column name for the disciplina_iddisciplina field
     */
    const COL_DISCIPLINA_IDDISCIPLINA = 'aluno_has_disciplina.disciplina_iddisciplina';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'aluno_has_disciplina.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'aluno_has_disciplina.updated_at';

    /**
     * the column name for the deleted_at field
     */
    const COL_DELETED_AT = 'aluno_has_disciplina.deleted_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('AlunoIdaluno', 'DisciplinaIddisciplina', 'CreatedAt', 'UpdatedAt', 'DeletedAt', ),
        self::TYPE_CAMELNAME     => array('alunoIdaluno', 'disciplinaIddisciplina', 'createdAt', 'updatedAt', 'deletedAt', ),
        self::TYPE_COLNAME       => array(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, AlunoHasDisciplinaTableMap::COL_CREATED_AT, AlunoHasDisciplinaTableMap::COL_UPDATED_AT, AlunoHasDisciplinaTableMap::COL_DELETED_AT, ),
        self::TYPE_FIELDNAME     => array('aluno_idaluno', 'disciplina_iddisciplina', 'created_at', 'updated_at', 'deleted_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AlunoIdaluno' => 0, 'DisciplinaIddisciplina' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, 'DeletedAt' => 4, ),
        self::TYPE_CAMELNAME     => array('alunoIdaluno' => 0, 'disciplinaIddisciplina' => 1, 'createdAt' => 2, 'updatedAt' => 3, 'deletedAt' => 4, ),
        self::TYPE_COLNAME       => array(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO => 0, AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA => 1, AlunoHasDisciplinaTableMap::COL_CREATED_AT => 2, AlunoHasDisciplinaTableMap::COL_UPDATED_AT => 3, AlunoHasDisciplinaTableMap::COL_DELETED_AT => 4, ),
        self::TYPE_FIELDNAME     => array('aluno_idaluno' => 0, 'disciplina_iddisciplina' => 1, 'created_at' => 2, 'updated_at' => 3, 'deleted_at' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('aluno_has_disciplina');
        $this->setPhpName('AlunoHasDisciplina');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\AlunoHasDisciplina');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('aluno_idaluno', 'AlunoIdaluno', 'INTEGER' , 'aluno', 'idaluno', true, null, null);
        $this->addForeignPrimaryKey('disciplina_iddisciplina', 'DisciplinaIddisciplina', 'INTEGER' , 'disciplina', 'iddisciplina', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('deleted_at', 'DeletedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Aluno', '\\Aluno', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':aluno_idaluno',
    1 => ':idaluno',
  ),
), null, null, null, false);
        $this->addRelation('Disciplina', '\\Disciplina', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':disciplina_iddisciplina',
    1 => ':iddisciplina',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \AlunoHasDisciplina $obj A \AlunoHasDisciplina object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getAlunoIdaluno() || is_scalar($obj->getAlunoIdaluno()) || is_callable([$obj->getAlunoIdaluno(), '__toString']) ? (string) $obj->getAlunoIdaluno() : $obj->getAlunoIdaluno()), (null === $obj->getDisciplinaIddisciplina() || is_scalar($obj->getDisciplinaIddisciplina()) || is_callable([$obj->getDisciplinaIddisciplina(), '__toString']) ? (string) $obj->getDisciplinaIddisciplina() : $obj->getDisciplinaIddisciplina())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \AlunoHasDisciplina object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \AlunoHasDisciplina) {
                $key = serialize([(null === $value->getAlunoIdaluno() || is_scalar($value->getAlunoIdaluno()) || is_callable([$value->getAlunoIdaluno(), '__toString']) ? (string) $value->getAlunoIdaluno() : $value->getAlunoIdaluno()), (null === $value->getDisciplinaIddisciplina() || is_scalar($value->getDisciplinaIddisciplina()) || is_callable([$value->getDisciplinaIddisciplina(), '__toString']) ? (string) $value->getDisciplinaIddisciplina() : $value->getDisciplinaIddisciplina())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \AlunoHasDisciplina object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AlunoIdaluno', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DisciplinaIddisciplina', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AlunoIdaluno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AlunoIdaluno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AlunoIdaluno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AlunoIdaluno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AlunoIdaluno', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DisciplinaIddisciplina', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DisciplinaIddisciplina', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DisciplinaIddisciplina', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DisciplinaIddisciplina', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DisciplinaIddisciplina', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('AlunoIdaluno', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('DisciplinaIddisciplina', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AlunoHasDisciplinaTableMap::CLASS_DEFAULT : AlunoHasDisciplinaTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (AlunoHasDisciplina object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AlunoHasDisciplinaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AlunoHasDisciplinaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AlunoHasDisciplinaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AlunoHasDisciplinaTableMap::OM_CLASS;
            /** @var AlunoHasDisciplina $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AlunoHasDisciplinaTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AlunoHasDisciplinaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AlunoHasDisciplinaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AlunoHasDisciplina $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AlunoHasDisciplinaTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO);
            $criteria->addSelectColumn(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA);
            $criteria->addSelectColumn(AlunoHasDisciplinaTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(AlunoHasDisciplinaTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(AlunoHasDisciplinaTableMap::COL_DELETED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.aluno_idaluno');
            $criteria->addSelectColumn($alias . '.disciplina_iddisciplina');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.deleted_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AlunoHasDisciplinaTableMap::DATABASE_NAME)->getTable(AlunoHasDisciplinaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AlunoHasDisciplinaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AlunoHasDisciplinaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AlunoHasDisciplinaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AlunoHasDisciplina or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AlunoHasDisciplina object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoHasDisciplinaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AlunoHasDisciplina) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AlunoHasDisciplinaTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = AlunoHasDisciplinaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AlunoHasDisciplinaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AlunoHasDisciplinaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the aluno_has_disciplina table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AlunoHasDisciplinaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AlunoHasDisciplina or Criteria object.
     *
     * @param mixed               $criteria Criteria or AlunoHasDisciplina object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoHasDisciplinaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AlunoHasDisciplina object
        }


        // Set the correct dbName
        $query = AlunoHasDisciplinaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AlunoHasDisciplinaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AlunoHasDisciplinaTableMap::buildTableMap();
