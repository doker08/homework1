<?php

/**
 * Created by PhpStorm.
 * User: sokol_000
 * Date: 06.12.2016
 * Time: 16:03
 */
class Db2
{
    private $db;

    public function __construct()
    {
        $configPath = SITE_PATH."/config/db_config.php";
        $params = include($configPath);

        if(!$this->db)
        {
            $connection = @mysql_connect($params['host'],$params['user'],$params['password']);
            if($connection)
            {
                $selectDB = @mysql_select_db($params['dbname'],$connection);
                if($selectDB)
                {
                    $this->db = true;
                    mysql_query('SET NAMES UTF8');
                    return true;
                }
                else
                {
                    return false;
                }
            } else
            {
                return false;
            }
        } else
        {
            return true;
        }
    }
    public function select($what,$from,$where = null,$order = null)
    {   $fetched = array();
        $sql = 'SELECT '.$what.' FROM '.$from;
        if($where != null) $sql .= ' WHERE '.$where;
        if($order != null) $sql .= ' ORDER BY '.$order;

        $query = mysql_query($sql);
        if($query)
        {
            $rows = mysql_num_rows($query);
            for($i = 0; $i < $rows; $i++)
            {
                $results = mysql_fetch_assoc($query);
                $key = array_keys($results);
                $numKeys = count($key);
                for($x = 0; $x < $numKeys; $x++)
                {
                    $fetched[$i][$key[$x]] = $results[$key[$x]];
                }
            }
            return $fetched;
        }
        else
        {
            return false;
        }
    }
    public function insert($table,$values,$rows = null)
    {

        $insert = 'INSERT INTO '.$table;
        if($rows != null)
        {
            $insert .= ' ('.$rows.')';
        }
        $numValues = count($values);
        for($i = 0; $i < $numValues; $i++)
        {
            if(is_string($values[$i])) $values[$i] = '"'.$values[$i].'"';
        }
        $values = implode(',',$values);
        $insert .= ' VALUES ('.$values.')';
        $ins = mysql_query($insert);
        return ($ins) ? true : false;

    }
    public function delete($table,$where = null)
    {

        $sql = 'DELETE FROM '.$table.' WHERE '.$where;
        if($where == null)
        {
            $sql = 'DELETE '.$table;
        }
        $deleted = @mysql_query($sql);
        return ($deleted)? true : false;
    }
}