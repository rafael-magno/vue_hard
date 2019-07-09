<?php

namespace Base;

use \AlunoHasDisciplina as ChildAlunoHasDisciplina;
use \AlunoHasDisciplinaQuery as ChildAlunoHasDisciplinaQuery;
use \Exception;
use \PDO;
use Map\AlunoHasDisciplinaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'aluno_has_disciplina' table.
 *
 *
 *
 * @method     ChildAlunoHasDisciplinaQuery orderByAlunoIdaluno($order = Criteria::ASC) Order by the aluno_idaluno column
 * @method     ChildAlunoHasDisciplinaQuery orderByDisciplinaIddisciplina($order = Criteria::ASC) Order by the disciplina_iddisciplina column
 * @method     ChildAlunoHasDisciplinaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildAlunoHasDisciplinaQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildAlunoHasDisciplinaQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 *
 * @method     ChildAlunoHasDisciplinaQuery groupByAlunoIdaluno() Group by the aluno_idaluno column
 * @method     ChildAlunoHasDisciplinaQuery groupByDisciplinaIddisciplina() Group by the disciplina_iddisciplina column
 * @method     ChildAlunoHasDisciplinaQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildAlunoHasDisciplinaQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildAlunoHasDisciplinaQuery groupByDeletedAt() Group by the deleted_at column
 *
 * @method     ChildAlunoHasDisciplinaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAlunoHasDisciplinaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAlunoHasDisciplinaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAlunoHasDisciplinaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAlunoHasDisciplinaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAlunoHasDisciplinaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAlunoHasDisciplinaQuery leftJoinAluno($relationAlias = null) Adds a LEFT JOIN clause to the query using the Aluno relation
 * @method     ChildAlunoHasDisciplinaQuery rightJoinAluno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Aluno relation
 * @method     ChildAlunoHasDisciplinaQuery innerJoinAluno($relationAlias = null) Adds a INNER JOIN clause to the query using the Aluno relation
 *
 * @method     ChildAlunoHasDisciplinaQuery joinWithAluno($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Aluno relation
 *
 * @method     ChildAlunoHasDisciplinaQuery leftJoinWithAluno() Adds a LEFT JOIN clause and with to the query using the Aluno relation
 * @method     ChildAlunoHasDisciplinaQuery rightJoinWithAluno() Adds a RIGHT JOIN clause and with to the query using the Aluno relation
 * @method     ChildAlunoHasDisciplinaQuery innerJoinWithAluno() Adds a INNER JOIN clause and with to the query using the Aluno relation
 *
 * @method     ChildAlunoHasDisciplinaQuery leftJoinDisciplina($relationAlias = null) Adds a LEFT JOIN clause to the query using the Disciplina relation
 * @method     ChildAlunoHasDisciplinaQuery rightJoinDisciplina($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Disciplina relation
 * @method     ChildAlunoHasDisciplinaQuery innerJoinDisciplina($relationAlias = null) Adds a INNER JOIN clause to the query using the Disciplina relation
 *
 * @method     ChildAlunoHasDisciplinaQuery joinWithDisciplina($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Disciplina relation
 *
 * @method     ChildAlunoHasDisciplinaQuery leftJoinWithDisciplina() Adds a LEFT JOIN clause and with to the query using the Disciplina relation
 * @method     ChildAlunoHasDisciplinaQuery rightJoinWithDisciplina() Adds a RIGHT JOIN clause and with to the query using the Disciplina relation
 * @method     ChildAlunoHasDisciplinaQuery innerJoinWithDisciplina() Adds a INNER JOIN clause and with to the query using the Disciplina relation
 *
 * @method     \AlunoQuery|\DisciplinaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAlunoHasDisciplina findOne(ConnectionInterface $con = null) Return the first ChildAlunoHasDisciplina matching the query
 * @method     ChildAlunoHasDisciplina findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAlunoHasDisciplina matching the query, or a new ChildAlunoHasDisciplina object populated from the query conditions when no match is found
 *
 * @method     ChildAlunoHasDisciplina findOneByAlunoIdaluno(int $aluno_idaluno) Return the first ChildAlunoHasDisciplina filtered by the aluno_idaluno column
 * @method     ChildAlunoHasDisciplina findOneByDisciplinaIddisciplina(int $disciplina_iddisciplina) Return the first ChildAlunoHasDisciplina filtered by the disciplina_iddisciplina column
 * @method     ChildAlunoHasDisciplina findOneByCreatedAt(string $created_at) Return the first ChildAlunoHasDisciplina filtered by the created_at column
 * @method     ChildAlunoHasDisciplina findOneByUpdatedAt(string $updated_at) Return the first ChildAlunoHasDisciplina filtered by the updated_at column
 * @method     ChildAlunoHasDisciplina findOneByDeletedAt(string $deleted_at) Return the first ChildAlunoHasDisciplina filtered by the deleted_at column *

 * @method     ChildAlunoHasDisciplina requirePk($key, ConnectionInterface $con = null) Return the ChildAlunoHasDisciplina by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAlunoHasDisciplina requireOne(ConnectionInterface $con = null) Return the first ChildAlunoHasDisciplina matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAlunoHasDisciplina requireOneByAlunoIdaluno(int $aluno_idaluno) Return the first ChildAlunoHasDisciplina filtered by the aluno_idaluno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAlunoHasDisciplina requireOneByDisciplinaIddisciplina(int $disciplina_iddisciplina) Return the first ChildAlunoHasDisciplina filtered by the disciplina_iddisciplina column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAlunoHasDisciplina requireOneByCreatedAt(string $created_at) Return the first ChildAlunoHasDisciplina filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAlunoHasDisciplina requireOneByUpdatedAt(string $updated_at) Return the first ChildAlunoHasDisciplina filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAlunoHasDisciplina requireOneByDeletedAt(string $deleted_at) Return the first ChildAlunoHasDisciplina filtered by the deleted_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAlunoHasDisciplina[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAlunoHasDisciplina objects based on current ModelCriteria
 * @method     ChildAlunoHasDisciplina[]|ObjectCollection findByAlunoIdaluno(int $aluno_idaluno) Return ChildAlunoHasDisciplina objects filtered by the aluno_idaluno column
 * @method     ChildAlunoHasDisciplina[]|ObjectCollection findByDisciplinaIddisciplina(int $disciplina_iddisciplina) Return ChildAlunoHasDisciplina objects filtered by the disciplina_iddisciplina column
 * @method     ChildAlunoHasDisciplina[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildAlunoHasDisciplina objects filtered by the created_at column
 * @method     ChildAlunoHasDisciplina[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildAlunoHasDisciplina objects filtered by the updated_at column
 * @method     ChildAlunoHasDisciplina[]|ObjectCollection findByDeletedAt(string $deleted_at) Return ChildAlunoHasDisciplina objects filtered by the deleted_at column
 * @method     ChildAlunoHasDisciplina[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AlunoHasDisciplinaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AlunoHasDisciplinaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AlunoHasDisciplina', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAlunoHasDisciplinaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAlunoHasDisciplinaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAlunoHasDisciplinaQuery) {
            return $criteria;
        }
        $query = new ChildAlunoHasDisciplinaQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$aluno_idaluno, $disciplina_iddisciplina] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAlunoHasDisciplina|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AlunoHasDisciplinaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AlunoHasDisciplinaTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildAlunoHasDisciplina A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aluno_idaluno, disciplina_iddisciplina, created_at, updated_at, deleted_at FROM aluno_has_disciplina WHERE aluno_idaluno = :p0 AND disciplina_iddisciplina = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAlunoHasDisciplina $obj */
            $obj = new ChildAlunoHasDisciplina();
            $obj->hydrate($row);
            AlunoHasDisciplinaTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildAlunoHasDisciplina|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the aluno_idaluno column
     *
     * Example usage:
     * <code>
     * $query->filterByAlunoIdaluno(1234); // WHERE aluno_idaluno = 1234
     * $query->filterByAlunoIdaluno(array(12, 34)); // WHERE aluno_idaluno IN (12, 34)
     * $query->filterByAlunoIdaluno(array('min' => 12)); // WHERE aluno_idaluno > 12
     * </code>
     *
     * @see       filterByAluno()
     *
     * @param     mixed $alunoIdaluno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByAlunoIdaluno($alunoIdaluno = null, $comparison = null)
    {
        if (is_array($alunoIdaluno)) {
            $useMinMax = false;
            if (isset($alunoIdaluno['min'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $alunoIdaluno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($alunoIdaluno['max'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $alunoIdaluno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $alunoIdaluno, $comparison);
    }

    /**
     * Filter the query on the disciplina_iddisciplina column
     *
     * Example usage:
     * <code>
     * $query->filterByDisciplinaIddisciplina(1234); // WHERE disciplina_iddisciplina = 1234
     * $query->filterByDisciplinaIddisciplina(array(12, 34)); // WHERE disciplina_iddisciplina IN (12, 34)
     * $query->filterByDisciplinaIddisciplina(array('min' => 12)); // WHERE disciplina_iddisciplina > 12
     * </code>
     *
     * @see       filterByDisciplina()
     *
     * @param     mixed $disciplinaIddisciplina The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByDisciplinaIddisciplina($disciplinaIddisciplina = null, $comparison = null)
    {
        if (is_array($disciplinaIddisciplina)) {
            $useMinMax = false;
            if (isset($disciplinaIddisciplina['min'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $disciplinaIddisciplina['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($disciplinaIddisciplina['max'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $disciplinaIddisciplina['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $disciplinaIddisciplina, $comparison);
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
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
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
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DELETED_AT, $deletedAt, $comparison);
    }

    /**
     * Filter the query by a related \Aluno object
     *
     * @param \Aluno|ObjectCollection $aluno The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByAluno($aluno, $comparison = null)
    {
        if ($aluno instanceof \Aluno) {
            return $this
                ->addUsingAlias(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $aluno->getIdaluno(), $comparison);
        } elseif ($aluno instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO, $aluno->toKeyValue('PrimaryKey', 'Idaluno'), $comparison);
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
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
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
     * Filter the query by a related \Disciplina object
     *
     * @param \Disciplina|ObjectCollection $disciplina The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function filterByDisciplina($disciplina, $comparison = null)
    {
        if ($disciplina instanceof \Disciplina) {
            return $this
                ->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $disciplina->getIddisciplina(), $comparison);
        } elseif ($disciplina instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA, $disciplina->toKeyValue('PrimaryKey', 'Iddisciplina'), $comparison);
        } else {
            throw new PropelException('filterByDisciplina() only accepts arguments of type \Disciplina or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Disciplina relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function joinDisciplina($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Disciplina');

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
            $this->addJoinObject($join, 'Disciplina');
        }

        return $this;
    }

    /**
     * Use the Disciplina relation Disciplina object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DisciplinaQuery A secondary query class using the current class as primary query
     */
    public function useDisciplinaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDisciplina($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Disciplina', '\DisciplinaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAlunoHasDisciplina $alunoHasDisciplina Object to remove from the list of results
     *
     * @return $this|ChildAlunoHasDisciplinaQuery The current query, for fluid interface
     */
    public function prune($alunoHasDisciplina = null)
    {
        if ($alunoHasDisciplina) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AlunoHasDisciplinaTableMap::COL_ALUNO_IDALUNO), $alunoHasDisciplina->getAlunoIdaluno(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AlunoHasDisciplinaTableMap::COL_DISCIPLINA_IDDISCIPLINA), $alunoHasDisciplina->getDisciplinaIddisciplina(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the aluno_has_disciplina table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoHasDisciplinaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AlunoHasDisciplinaTableMap::clearInstancePool();
            AlunoHasDisciplinaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AlunoHasDisciplinaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AlunoHasDisciplinaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AlunoHasDisciplinaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AlunoHasDisciplinaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AlunoHasDisciplinaQuery
