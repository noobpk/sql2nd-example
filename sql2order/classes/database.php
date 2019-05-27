<?php
class DB
{
    private $hostname = 'localhost',
            $username = 'root',
            $password = '',
            $dbname = 'db_sql';

    public $cn = NULL;
    public $rs = NULL;

    public function connect()
    {
        $this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }

    public function close(){
        if ($this->cn){
            mysqli_close($this->cn);
        }
    }
 
    public function query($sql = null) 
    {       
        if ($this->cn){
            mysqli_query($this->cn, $sql);
        }
    }

    public function num_rows($sql = null) 
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            $row = mysqli_num_rows($query);
            return $row;
        }
    }

    public function fetch_assoc($sql = null, $type)
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($type == 0)
            {
                while ($row = mysqli_fetch_assoc($query))
                {
                    $data[] = $row;
                }
                return $data;
            }
            else if ($type == 1)
            {
                $data = mysqli_fetch_assoc($query);
                return $data;
            }       
        }
    }
 
    public function real_escape_string($string) {
        if ($this->cn)
        {
            $string = mysqli_real_escape_string($this->cn, $string);
        }
        else
        {
            $string = $string;
        }
        return $string;
    }
 
    public function insert_id() {
        if ($this->cn)
        {
            return mysqli_insert_id($this->cn);
        }
    }
}
?>