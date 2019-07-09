<?php

namespace Base;

use \Turno as ChildTurno;
use \TurnoQuery as ChildTurnoQuery;
use \Exception;
use \PDO;
use Map\TurnoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'turno' table.
 *
 *
 *
 * @method     ChildTurnoQuery orderByIdturno($order = Criteria::ASC) Order by the idturno column
 * @method     ChildTurnoQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildTurnoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTurnoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildTurnoQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 *
 * @method     ChildTurnoQuery groupByIdturno() Group by the idturno column
 * @method     ChildTurnoQuery groupByNome() Group by the nome column
 * @method     ChildTurnoQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTurnoQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildTurnoQuery groupByDeletedAt() Group by the deleted_at column
 *
 * @method     ChildTurnoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTurnoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTurnoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTurnoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTurnoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTurnoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTurnoQuery leftJoinAluno($relationAlias = null) Adds a LEFT JOIN clause to the query using the Aluno relation
 * @method     ChildTurnoQuery rightJoinAluno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Aluno relation
 * @method     ChildTurnoQuery innerJoinAluno($relationAlias = null) Adds a INNER JOIN clause to the query using the Aluno relation
 *
 * @method     ChildTurnoQuery joinWithAluno($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Aluno relation
 *
 * @method     ChildTurnoQuery leftJoinWithAluno() Adds a LEFT JOIN clause and with to the query using the Aluno relation
 * @method     ChildTurnoQuery rightJoinWithAluno() Adds a RIGHT JOIN clause and with to the query using the Aluno relation
 * @method     ChildTurnoQuery innerJoinWithAluno() Adds a INNER JOIN clause and with to the query using the Aluno relation
 *
 * @method     \AlunoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTurno findOne(ConnectionInterface $con = null) Return the first ChildTurno matching the query
 * @method     ChildTurno findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTurno matching the query, or a new ChildTurno object populated from the query conditions when no match is found
 *
 * @method     ChildTurno findOneByIdturno(int $idturno) Return the first ChildTurno filtered by the idturno column
 * @method     ChildTurno findOneByNome(string $nome) Return the first ChildTurno filtered by the nome column
 * @method     ChildTurno findOneByCreatedAt(string $created_at) Return the first ChildTurno filtered by the created_at column
 * @method     ChildTurno findOneByUpdatedAt(string $updated_at) Return the first ChildTurno filtered by the updated_at column
 * @method     ChildTurno findOneByDeletedAt(string $deleted_at) Return the first ChildTurno filtered by the deleted_at column *

 * @method     ChildTurno requirePk($key, ConnectionInterface $con = null) Return the ChildTurno by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurno requireOne(ConnectionInterface $con = null) Return the first ChildTurno matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTurno requireOneByIdturno(int $idturno) Return the first ChildTurno filtered by the idturno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurno requireOneByNome(string $nome) Return the first ChildTurno filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurno requireOneByCreatedAt(string $created_at) Return the first ChildTurno filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurno requireOneByUpdatedAt(string $updated_at) Return the first ChildTurno filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTurno requireOneByDeletedAt(string $deleted_at) Return the first ChildTurno filtered by the deleted_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTurno[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTurno objects based on current ModelCriteria
 * @method     ChildTurno[]|ObjectCollection findByIdturno(int $idturno) Return ChildTurno objects filtered by the idturno column
 * @method     ChildTurno[]|ObjectCollection findByNome(string $nome) Return ChildTurno objects filtered by the nome column
 * @method     ChildTurno[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTurno objects filtered by the created_at column
 * @method     ChildTurno[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTurno objects filtered by the updated_at column
 * @method     ChildTurno[]|ObjectCollection findByDeletedAt(string $deleted_at) Return ChildTurno objects filtered by the deleted_at column
 * @method     ChildTurno[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TurnoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TurnoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Turno', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTurnoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTurnoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTurnoQuery) {
            return $criteria;
        }
        $query = new ChildTurnoQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTurno|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TurnoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TurnoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTurno A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idturno, nome, created_at, updated_at, deleted_at FROM turno WHERE idturno = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTurno $obj */
            $obj = new ChildTurno();
            $obj->hydrate($row);
            TurnoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTurno|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TurnoTableMap::COL_IDTURNO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TurnoTableMap::COL_IDTURNO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idturno column
     *
     * Example usage:
     * <code>
     * $query->filterByIdturno(1234); // WHERE idturno = 1234
     * $query->filterByIdturno(array(12, 34)); // WHERE idturno IN (12, 34)
     * $query->filterByIdturno(array('min' => 12)); // WHERE idturno > 12
     * </code>
     *
     * @param     mixed $idturno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByIdturno($idturno = null, $comparison = null)
    {
        if (is_array($idturno)) {
            $useMinMax = false;
            if (isset($idturno['min'])) {
                $this->addUsingAlias(TurnoTableMap::COL_IDTURNO, $idturno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idturno['max'])) {
                $this->addUsingAlias(TurnoTableMap::COL_IDTURNO, $idturno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurnoTableMap::COL_IDTURNO, $idturno, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurnoTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TurnoTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TurnoTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurnoTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TurnoTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TurnoTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurnoTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the deleted_at column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $deletedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(TurnoTableMap::COL_DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(TurnoTableMap::COL_DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TurnoTableMap::COL_DELETED_AT, $deletedAt, $comparison);
    }

    /**
     * Filter the query by a related \Aluno object
     *
     * @param \Aluno|ObjectCollection $aluno the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTurnoQuery The current query, for fluid interface
     */
    public function filterByAluno($aluno, $comparison = null)
    {
        if ($aluno instanceof \Aluno) {
            return $this
                ->addUsingAlias(TurnoTableMap::COL_IDTURNO, $aluno->getTurnoIdturno(), $comparison);
        } elseif ($aluno instanceof ObjectCollection) {
            return $this
                ->useAlunoQuery()
                ->filterByPrimaryKeys($aluno->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAluno() only accepts arguments of type \Aluno or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Aluno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function joinAluno($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Aluno');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Aluno');
        }

        return $this;
    }

    /**
     * Use the Aluno relation Aluno object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AlunoQuery A secondary query class using the current class as primary query
     */
    public function useAlunoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAluno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Aluno', '\AlunoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTurno $turno Object to remove from the list of results
     *
     * @return $this|ChildTurnoQuery The current query, for fluid interface
     */
    public function prune($turno = null)
    {
        if ($turno) {
            $this->addUsingAlias(TurnoTableMap::COL_IDTURNO, $turno->getIdturno(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the turno table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TurnoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TurnoTableMap::clearInstancePool();
            TurnoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TurnoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TurnoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TurnoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TurnoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TurnoQuery
