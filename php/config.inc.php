<?php
    function dbConnect($connectionType = 'mysqli', $username = 'administrator', $password = 'eyabantu_administrator')
    {
        $host = 'localhost';
        $db = 'eyabantu';
        
        $user = $username;
        $pass = $password;        
                
        if ($connectionType == 'mysqli')
        {
            $con = new mysqli($host, $user, $pass, $db)
                    or die ('Cannot open database');
            return $con;
        }
        else 
        {
            try 
            {
                return new PDO("mysql:host=$host;dbname=$db", $user, $password);
            }
            catch (PDOException $e)
            {               
                exit("$e->getMes())");
            }
        }       
    }
?>
