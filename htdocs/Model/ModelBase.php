<?php
namespace Mvc\Model;
abstract class ModelBase
{
    private static $pdo;
    /**
     * Get the connection. This will open a connection, if does not exist yet.
     *
     * @return \PDO
     */
    public function getPdo()
    {
        if (self::$pdo === null) {
            self::$pdo = new \PDO('mysql:host=mysql;dbname=vorlage', 'root', 'mypass');
        }
        return self::$pdo;
    }

    /**
     * @param string $where
     *
     * @return static
     */
    public static function find($where)
    {
        $model = new static();
        $table = $model->getSource();
        /** @var \PDO $pdo */
        $pdo = $model->getPdo();

        $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE '.$where);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, get_class($model));
    }

    /**
     * @param string $where
     *
     * @return static
     */
    public static function findOne($where)
    {
        $model = new static();
        $table = $model->getSource();
        /** @var \PDO $pdo */
        $pdo = $model->getPdo();
        $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE '.$where.' LIMIT 1');
        $stmt->execute();
        return $stmt->fetchObject(get_class($model));
    }


    /**
     * @return static
     */
    public static function findAll()
    {
        $model = new static();
        $table = $model->getSource();
        /** @var \PDO $pdo */
        $pdo = $model->getPdo();

        $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, get_class($model));

    }
    /**
     * Create/update data.
     */
    public function save()
    {
        $table = $this->getSource();
        /** @var \PDO $pdo */
        $pdo = $this->getPdo();

           if (!$pdo->exec('INSERT INTO `'.$table.'` SET '.implode(',', $this->getFields()))) {
                throw new \RuntimeException('Could not create '.get_class($this).': '.$pdo->errorInfo()[2]);
            }


    }
    /**
     * Build fields data.
     *
     * @return array
     */
    private function getFields()
    {
        $pdo = $this->getPdo();
        $fields = [];
        foreach ($this as $name => $val) {
            if ($val === null) {
                $fields[] = "`$name`=null";
            } elseif (is_int($val)) {
                $fields[] = "`$name`=".$val;
            } else {
                $fields[] = "`$name`=".$pdo->quote($val);
            }
        }
        return $fields;
    }
    /**
     * The table name of the model.
     *
     * @return string
     */
    abstract public function getSource();
}