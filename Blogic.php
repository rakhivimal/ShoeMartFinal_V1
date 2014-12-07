<?php
require_once "config.php";
error_reporting(E_ALL ^ E_NOTICE);
class Blogic
{
    function OpenConnection()
    {
        $link=@mysql_connect(HOST,USERNAME,PASSWORD);
        if($link)
        {
            return $link;
        }
        else
        {
            return false;
        }
    }
    function SelectDb()
    {
        if(@mysql_select_db(DATABASE))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function CloseConnection()
    {
        @mysql_close(self::OpenConnection());
    }
    function ExecuteQuery($str)
    {
        self::OpenConnection();
        self::SelectDb();
        $ResultSet=@mysql_query($str);
        if($ResultSet)
        {
            return $ResultSet;
        }
        else
        {
            return false;
        }
    }
    
}
class login extends Blogic
{
    private $uname;
    private $upass;
    function __construct($unm,$ps)
    {
        $this->uname=$unm;
        $this->upass=$ps;
    }
    function getUserName()
    {
        return $this->uname;
    }
    function valid_user()
    {
        self::OpenConnection();
        self::SelectDb();
        $str="select uname,upass from image where uname='$this->uname' and upass='$this->upass'";
        $rs=self::ExecuteQuery($str);
        if(mysql_affected_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>