<?php

namespace app\core;

use app\models\Model;
use PDO;
use PDOStatement;

/**
 * Class QueryBuilder
 */
class QueryBuilder
{
    /**
     * @var string
     */
    private $modelClass;

    /**
     * @var PDO|PDOStatement
     */
    private $statement;

    /**
     * @var string
     */
    private $query = '';

    /**
     * @var array
     */
    private $select = [];

    /**
     * @var string
     */
    private $from;

    /**
     * @var array
     */
    private $params = [];

    /**
     * QueryBuilder constructor.
     *
     * @param string $tblName
     * @param string $modelClass
     */
    public function __construct(string $tblName, string $modelClass)
    {
        $this->statement = DB::getConnection();
        $this->modelClass = $modelClass;
        $this->from = $tblName;
        $this->query = 'SELECT ' .
            (count($this->select) ? implode(',', $this->select) : '*') .
            ' FROM ' . $this->from;

    }

    /**
     * @param array $properties
     *
     * @return $this
     */
    public function select(array $properties): self
    {
        return $this;
    }

    /**
     * @param string $tblName
     * @param string|null $alias
     *
     * @return $this
     */
    public function from(string $tblName, ?string $alias = null): self
    {
        $this->from = $tblName;
        $this->query = 'SELECT ' .
            (count($this->select) ? implode(',', $this->select) : '*') .
            ' FROM ' . $this->from . ' AS ' . $alias;

        return $this;
    }

    /**
     * @param string $condition
     *
     * @return $this
     */
    public function andWhere(string $condition): self
    {
        if (strpos($this->query, 'WHERE') !== false) {
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $condition;

        return $this;
    }

    /**
     * @param string $condition
     *
     * @return $this
     */
    public function orWhere(string $condition): self
    {
        if (strpos($this->query, 'WHERE') !== false) {
            $this->query .= ' OR ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $condition;

        return $this;
    }

    /**
     * @param string $bind
     * @param mixed $param
     *
     * @return $this
     */
    public function addParam(string $bind, $param): self
    {
        if (!$this->statement instanceof PDOStatement) {
            $this->statement = $this->statement->prepare($this->query);
        }
        $this->statement->bindParam(':' . $bind, $param);
        $this->params[$bind] = $param;

        return $this;
    }

    /**
     * @return $this
     */
    public function getQuery(): self
    {
        if (!$this->statement instanceof PDOStatement) {
            $this->statement = $this->statement->prepare($this->query);
        }

        return $this;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getResult(): array
    {
        $this->statement->execute();
        $objects =  $this->statement->fetchAll(PDO::FETCH_CLASS);

        return $this->fetchObjects($objects);
    }

    /**
     * @param array|\stdClass[]$stdObjects
     *
     * @return array|Model[]
     *
     * @throws \ReflectionException
     * @throws \Exception
     */
    private function fetchObjects(array $stdObjects): array
    {
        $result = [];
        foreach ($stdObjects as $stdObject) {
            $modelObject = new $this->modelClass;
            $reflectionObject = new \ReflectionClass($modelObject);
            foreach ($stdObject as $key => $value) {
                $property = $reflectionObject->getProperty(self::underscoreToCamelCase($key));
                $property->setAccessible(true);
                $docComment = $property->getDocComment();
                if (!is_bool($docComment)) {
                    $value = self::convertProperty($docComment, $value);
                }
                $property->setValue($modelObject, $value);
                $property->setAccessible(false);
            }
            $result[] = $modelObject;
        }

        return $result;
    }

    /**
     * @param string $type
     * @param string $value
     *
     * @return mixed
     *
     * @throws \Exception
     */
    private static function convertProperty(string $type, string $value)
    {
        //define the regular expression pattern to use for string matching
        $pattern = "#(@var ([\\a-zA-Z]+)\s*[a-zA-Z0-9, ()_].*)#";
        //perform the regular expression on the string provided
        preg_match_all($pattern, $type, $matches, PREG_PATTERN_ORDER);
        switch (trim($matches[2][0])) {
            case 'bool':
                return (bool) $value;
            case 'int':
                return (int) $value;
            case 'float':
                return (float) $value;
            case '\\DateTime':
                return new \DateTime($value);
            default:
                return $value;
        }
    }

    /**
     * @param $string
     * @return string
     */
    private static function underscoreToCamelCase($string): string
    {
        return lcfirst(
            str_replace(
                '_',
                '',
                ucwords($string, '_')
            )
        );
    }
}