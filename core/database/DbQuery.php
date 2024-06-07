<?php
  

  // this class interface the backend with the database
  class DbQuery {
    protected $pdo;
    public function __construct(PDO $pdo) {
      try {
        $this->pdo = $pdo; 
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
    // retrun all resources from a table
    public function getAll($table) {
      try {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_CLASS);  
      } catch (PDOException $e) {
        throw $e;
      }
    }
    // return on resources from a table
    public function getOne($table, $id) {
      try {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE id = ' . $id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_CLASS);
      } catch (PDOException $e) {
        throw $e;
      }
    }
    // insert new rerources in a table
    public function post($table, $param) {
      $query = sprintf('INSERT INTO %s (%s) VALUES (%s)', 
        $table, 
        implode(', ', array_keys($param)),
        ':' . implode(', :', array_keys($param))
      );
      $stm = $this->pdo->prepare($query);
      try {
        return $stm->execute($param);
      } catch (PDOException $e) {
        throw $e;
      }

    }
    // delete a resources from a table
    public function delete($table, $id) {
      $query = sprintf('DELETE FROM %s WHERE id = %s', $table, ':id');
      try {
        $stm = $this->pdo->prepare($query);
        $param['id'] = $id;
        return $stm->execute($param);
      } catch (PDOException $e) {
        throw new PDOException('Cannot delete if assigned to a foreign key');
      }
    }
    // update a resources from a table
    public function update($table, $param, $id) {
      $value = '';
      foreach(array_keys($param) as $key) {

        $value .= $key . ' = :' . $key . ', ';
      }
      $query = sprintf('UPDATE %s SET %s  WHERE id = %s', 
      $table,
      substr($value, 0,-2),
      ':id'
      );
      $param['id'] = $id;
      try {
        $stm = $this->pdo->prepare($query);
        $stm->execute($param);
      } catch (PDOException $e) {
        throw new PDOException('wrong id reference to bonus db');
      }
    }

    public function typeFilter($name) {
      $query = 'SELECT * FROM bonuses JOIN bonus ON bonus.id = bonuses.bonus_ref WHERE bonus.name = ' . $name;
      $stm = $this->pdo->prepare($query);
      try {
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_CLASS);
      } catch (PDOException $e) {
        throw $e;
      }
    }

    public function dateFilter($dateS, $dateE) {
      $query = 'SELECT * FROM bonuses WHERE date BETWEEN ' . $dateS . 'AND' . $dateE;
      $stm = $this->pdo->prepare($query);
      try {
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_CLASS);
      } catch (PDOException $e) {
        throw $e;
      }
    }

    public function countFilter() {
      $query = 'SELECT SUM(time) FROM bonus';
      $stm = $this->pdo->prepare($query);
      try {
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_CLASS);
      } catch (PDOException $e) {
        throw $e;
      }
    }
  }


  