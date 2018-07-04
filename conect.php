<?php

function Conexao_db()
{
mysql_connect('localhost','root','');
mysql_select_db('decret');

// mysql_connect('192.168.1.1','autofast','af@css');
// mysql_select_db('dbautofast');

// mysql_connect('sql108.epizy.com','epiz_22127370','91589701Aa');
// mysql_select_db('epiz_22127370_secret');

//mysql_connect('192.168.0.2','pc2820172','senai127');
//mysql_select_db('dbpc2820172');

    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');

}


?>
