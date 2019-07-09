<?php

namespace Base;

use \Aluno as ChildAluno;
use \AlunoQuery as ChildAlunoQuery;
use \Exception;
use \PDO;
use Map\AlunoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'aluno' table.
 *
 *
 *
 * @method     ChildAlunoQuery orderByIdaluno($order = Criteria::ASC) Order by the idaluno column
 * @method     ChildAlunoQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildAlunoQuery orderByTurnoIdturno($order = Criteria::ASC) Order by the turno_idturno column
 * @method     ChildAlunoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildAlunoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildAlunoQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 *
 * @method     ChildAlunoQuery groupByIdaluno() Group by the idaluno column
 * @method     ChildAlunoQuery groupByNome() Group by the nome column
 * @method     ChildAlunoQuery groupByTurnoIdturno() Group by the turno_idturno column
 * @method     ChildAlunoQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildAlunoQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildAlunoQuery groupByDeletedAt() Group by the deleted_at column
 *
 * @method     ChildAlunoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAlunoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAlunoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAlunoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAlunoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAlunoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAlunoQuery leftJoinTurno($relationAlias = null) Adds a LEFT JOIN clause to the query using the Turno relation
 * @method     ChildAlunoQuery rightJoinTurno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Turno relation
 * @method     ChildAlunoQuery innerJoinTurno($relationAlias = null) Adds a INNER JOIN clause to the query using the Turno relation
 *
 * @method     ChildAlunoQuery joinWithTurno($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Turno relation
 *
 * @method     ChildAlunoQuery leftJoinWithTurno() Adds a LEFT JOIN clause and with to the query using the Turno relation
 * @method     ChildAlunoQuery rightJoinWithTurno() Adds a RIGHT JOIN clause and with to the query using the Turno relation
 * @method     ChildAlunoQuery innerJoinWithTurno() Adds a INNER JOIN clause and with to the query using the Turno relation
 *
 * @method     ChildAlunoQuery leftJoinAlunoHasDisciplina($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlunoHasDisciplina relation
 * @method     ChildAlunoQuery rightJoinAlunoHasDisciplina($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlunoHasDisciplina relation
 * @method     ChildAlunoQuery innerJoinAlunoHasDisciplina($relationAlias = null) Adds a INNER JOIN clause to the query using the AlunoHasDisciplina relation
 *
 * @method     ChildAlunoQuery joinWithAlunoHasDisciplina($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AlunoHasDisciplina relation
 *
 * @method     ChildAlunoQuery leftJoinWithAlunoHasDisciplina() Adds a LEFT JOIN clause and with to the query using the AlunoHasDisciplina relation
 * @method     ChildAlunoQuery rightJoinWithAlunoHasDisciplina() Adds a RIGHT JOIN clause and with to the query using the AlunoHasDisciplina relation
 * @method     ChildAlunoQuery innerJoinWithAlunoHasDisciplina() Adds a INNER JOIN clause and with to the query using the AlunoHasDisciplina relation
 *
 * @method     \TurnoQuery|\AlunoHasDisciplinaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAluno findOne(ConnectionInterface $con = null) Return the first ChildAluno matching the query
 * @method     ChildAluno findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAluno matching the query, or a new ChildAluno object populated from the query conditions when no match is found
 *
 * @method     ChildAluno findOneByIdaluno(int $idaluno) Return the first ChildAluno filtered by the idaluno column
 * @method     ChildAluno findOneByNome(string $nome) Return the first ChildAluno filtered by the nome column
 * @method     ChildAluno findOneByTurnoIdturno(int $turno_idturno) Return the first ChildAluno filtered by the turno_idturno column
 * @method     ChildAluno findOneByCreatedAt(string $created_at) Return the first ChildAluno filtered by the created_at column
 * @method     ChildAluno findOneByUpdatedAt(string $updated_at) Return the first ChildAluno filtered by the updated_at column
 * @method     ChildAluno findOneByDeletedAt(string $deleted_at) Return the first ChildAluno filtered by the deleted_at column *

 * @method     ChildAluno requirePk($key, ConnectionInterface $con = null) Return the ChildAluno by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAluno requireOne(ConnectionInterface $con = null) Return the first ChildAluno matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAluno requireOneByIdaluno(int $idaluno) Return the first ChildAluno filtered by the idaluno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAluno requireOneByNome(string $nome) Return the first ChildAluno filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAluno requireOneByTurnoIdturno(int $turno_idturno) Return the first ChildAluno filtered by the turno_idturno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAluno requireOneByCreatedAt(string $created_at) Return the first ChildAluno filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAluno requireOneByUpdatedAt(string $updated_at) Return the first ChildAluno filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAluno requireOneByDeletedAt(string $deleted_at) Return the first ChildAluno filtered by the deleted_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAluno[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAluno objects based on current ModelCriteria
 * @method     ChildAluno[]|ObjectCollection findByIdaluno(int $idaluno) Return ChildAluno objects filtered by the idaluno column
 * @method     ChildAluno[]|ObjectCollection findByNome(string $nome) Return ChildAluno objects filtered by the nome column
 * @method     ChildAluno[]|ObjectCollection findByTurnoIdturno(int $turno_idturno) Return ChildAluno objects filtered by the turno_idturno column
 * @method     ChildAluno[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildAluno objects filtered by the created_at column
 * @method     ChildAluno[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildAluno objects filtered by the updated_at column
 * @method     ChildAluno[]|ObjectCollection findByDeletedAt(string $deleted_at) Return ChildAluno objects filtered by the deleted_at column
 * @method     ChildAluno[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AlunoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AlunoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Aluno', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAlunoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAlunoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAlunoQuery) {
            return $criteria;
        }
        $query = new ChildAlunoQuery();
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
     * @return ChildAluno|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AlunoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AlunoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAluno A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idaluno, nome, turno_idturno, created_at, updated_at, deleted_at FROM aluno WHERE idaluno = :p0';
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
            /** @var ChildAluno $obj */
            $obj = new ChildAluno();
            $obj->hydrate($row);
            AlunoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAluno|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AlunoTableMap::COL_IDALUNO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AlunoTableMap::COL_IDALUNO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idaluno column
     *
     * Example usage:
     * <code>
     * $query->filterByIdaluno(1234); // WHERE idaluno = 1234
     * $query->filterByIdaluno(array(12, 34)); // WHERE idaluno IN (12, 34)
     * $query->filterByIdaluno(array('min' => 12)); // WHERE idaluno > 12
     * </code>
     *
     * @param     mixed $idaluno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByIdaluno($idaluno = null, $comparison = null)
    {
        if (is_array($idaluno)) {
            $useMinMax = false;
            if (isset($idaluno['min'])) {
                $this->addUsingAlias(AlunoTableMap::COL_IDALUNO, $idaluno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idaluno['max'])) {
                $this->addUsingAlias(AlunoTableMap::COL_IDALUNO, $idaluno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTableMap::COL_IDALUNO, $idaluno, $comparison);
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
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the turno_idturno column
     *
     * Example usage:
     * <code>
     * $query->filterByTurnoIdturno(1234); // WHERE turno_idturno = 1234
     * $query->filterByTurnoIdturno(array(12, 34)); // WHERE turno_idturno IN (12, 34)
     * $query->filterByTurnoIdturno(array('min' => 12)); // WHERE turno_idturno > 12
     * </code>
     *
     * @see       filterByTurno()
     *
     * @param     mixed $turnoIdturno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByTurnoIdturno($turnoIdturno = null, $comparison = null)
    {
        if (is_array($turnoIdturno)) {
            $useMinMax = false;
            if (isset($turnoIdturno['min'])) {
                $this->addUsingAlias(AlunoTableMap::COL_TURNO_IDTURNO, $turnoIdturno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($turnoIdturno['max'])) {
                $this->addUsingAlias(AlunoTableMap::COL_TURNO_IDTURNO, $turnoIdturno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTableMap::COL_TURNO_IDTURNO, $turnoIdturno, $comparison);
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
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AlunoTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AlunoTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(AlunoTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(AlunoTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
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
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(AlunoTableMap::COL_DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(AlunoTableMap::COL_DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoTableMap::COL_DELETED_AT, $deletedAt, $comparison);
    }

    /**
     * Filter the query by a related \Turno object
     *
     * @param \Turno|ObjectCollection $turno The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByTurno($turno, $comparison = null)
    {
        if ($turno instanceof \Turno) {
            return $this
                ->addUsingAlias(AlunoTableMap::COL_TURNO_IDTURNO, $turno->getIdturno(), $comparison);
        } elseif ($turno instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlunoTableMap::COL_TURNO_IDTURNO, $turno->toKeyValue('PrimaryKey', 'Idturno'), $comparison);
        } else {
            throw new PropelException('filterByTurno() only accepts arguments of type \Turno or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Turno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function joinTurno($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Turno');

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
            $this->addJoinObject($join, 'Turno');
        }

        return $this;
    }

    /**
     * Use the Turno relation Turno object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TurnoQuery A secondary query class using the current class as primary query
     */
    public function useTurnoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTurno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Turno', '\TurnoQuery');
    }

    /**
     * Filter the query by a related \AlunoHasDisciplina object
     *
     * @param \AlunoHasDisciplina|ObjectCollection $alunoHasDisciplina the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAlunoQuery The current query, for fluid interface
     */
    public function filterByAlunoHasDisciplina($alunoHasDisciplina, $comparison = null)
    {
        if ($alunoHasDisciplina instanceof \AlunoHasDisciplina) {
            return $this
                ->addUsingAlias(AlunoTableMap::COL_IDALUNO, $alunoHasDisciplina->getAlunoIdaluno(), $comparison);
        } elseif ($alunoHasDisciplina instanceof ObjectCollection) {
            return $this
                ->useAlunoHasDisciplinaQuery()
                ->filterByPrimaryKeys($alunoHasDisciplina->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlunoHasDisciplina() only accepts arguments of type \AlunoHasDisciplina or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlunoHasDisciplina relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function joinAlunoHasDisciplina($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlunoHasDisciplina');

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
            $this->addJoinObject($join, 'AlunoHasDisciplina');
        }

        return $this;
    }

    /**
     * Use the AlunoHasDisciplina relation AlunoHasDisciplina object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AlunoHasDisciplinaQuery A secondary query class using the current class as primary query
     */
    public function useAlunoHasDisciplinaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlunoHasDisciplina($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlunoHasDisciplina', '\AlunoHasDisciplinaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAluno $aluno Object to remove from the list of results
     *
     * @return $this|ChildAlunoQuery The current query, for fluid interface
     */
    public function prune($aluno = null)
    {
        if ($aluno) {
            $this->addUsingAlias(AlunoTableMap::COL_IDALUNO, $aluno->getIdaluno(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the aluno table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AlunoTableMap::clearInstancePool();
            AlunoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AlunoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AlunoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AlunoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AlunoQuery
