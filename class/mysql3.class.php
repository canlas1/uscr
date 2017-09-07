<?php
 
/**********************************************************************
lib db

in top of script do $_SERVER['db'] = new mysql3(); to initiate it
then to call it just do  $_SERVER['db']->query();


**********************************************************************/
 
class mysql3
{
 var $username;
 var $password;
 var $host;
 var $connection;
 var $dbname;
 
 function mysql3($username, $password, $dbname, $host = 'localhost')
 {
  $this->username = $username;
  $this->password = $password;
  $this->host = $host;
  $this->dbname = $dbname;
 }
 
 function connect()
 {
  $return_var = false;
  
  if(!@is_resource($this->connection))
  {
   $this->connection = mysql_connect($this->host, $this->username, $this->password);
  }
  
  if($this->connection !== false)
  {
   if(mysql_select_db($this->dbname))
   {   
    $return_var=true;
   }
  }
  
  return $return_var;
 }
 
 function query($sql)
 {
  if(!$this->connect())
  {
   // cant connect 
   return false;
  }
  return mysql_query($sql, $this->connection);
 }

 
 
 
 function error()
 {
  return @mysql_error($this->connection);
 }
 
 function num_rows($resource_identifier)
 {
  return @mysql_num_rows($resource_identifier);
 }
 
 function fetch_assoc($resource_identifier)
 {
  return @mysql_fetch_assoc($resource_identifier);
 }
 
 function fetch_array($resource_identifier)
 {
  return @mysql_fetch_array($resource_identifier);
 }
 
 function fetch_row($resource_identifier)
 {
  return @mysql_fetch_row($resource_identifier);
 }
 
 function free_result($resource_identifier)
 {
  return @mysql_free_result($resource_identifier);
 }
 
 function result($resource_identifier, $cell = 0)
 {
  return mysql_result($resource_identifier, $cell);
 }
 
 
  //********************custom modifications********************
 //connect and query in a single function
 function cquery($sql)
  {
  $return_var = false;

  if(!@is_resource($this->connection))
  {
   $this->connection = mysql_connect($this->host, $this->username, $this->password);
  }
  
  if($this->connection !== false)
  {
   if(mysql_select_db($this->dbname))
   {   
    $return_var=true;
    return mysql_query($sql, $this->connection);
   }
  } 
  else return $return_var;
  } //end cquery
  
  
  
  //optimize a database
  function optimizeDB() {
		if(!@is_resource($this->connection))
		  {
		   $this->connection = mysql_connect($this->host, $this->username, $this->password);
		  }
		mysql_select_db($this->dbname);
   		$result = mysql_list_tables($this->dbname);
    
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysql_error();
        exit;
    }

    while ($row = mysql_fetch_row($result)) {

        $sql = "optimize table $row[0]";
        mysql3::cquery($sql);
        print "<P>$row[0]\n";
        
	   }	  	
    
  }//optimizeDB
  
    function describeDB() {
		if(!@is_resource($this->connection))
		  {
		   $this->connection = mysql_connect($this->host, $this->username, $this->password);
		  }
		mysql_select_db($this->dbname);
   		$result = mysql_list_tables($this->dbname);
    
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysql_error();
        exit;
    }
        print "<P>\n";    
    while ($row = mysql_fetch_row($result)) {

        $sql = "describe $row[0]";
        $query = mysql3::cquery($sql);
        print "<P><B>".$row[0]."</B><BR>\n";
        	while ($line = mysql3::fetch_array($query)) {
				print $line[0]."<BR>\n";
		}//while
	   }	
	  	
    
  }//describeDB
 
 
}


 
 

?>