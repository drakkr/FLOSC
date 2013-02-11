<?php
/*
**  Copyright (C) 2011 Atos 
**
**  Author: Raphael Semeteys <raphael.semeteys@atos.net>
**
**  This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
**  the Free Software Foundation; either version 2 of the License, or
**  (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
**  but WITHOUT ANY WARRANTY; without even the implied warranty of
**  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
**  GNU General Public License for more details.
**
**  You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
**
**
** FLOSSC - Evaluate FLOSS complexity
** bulk.php: bulk upload of cloc reports
**
*/
include("config.php");
  
if ($dir=@opendir($bulk)) {
  while (($file=readdir($dir))!== false) {
    if (substr($file, -4) == ".csv") {
      $name = substr($file, 0, strlen($file)-4);
      if (substr($name, -4) == ".tgz") $name = substr($name, 0, strlen($name)-4);
      if (substr($name, -3) == ".gz") $name = substr($name, 0, strlen($name)-3);
      if (substr($name, -4) == ".bz2") $name = substr($name, 0, strlen($name)-4);
      if (substr($name, -4) == ".zip") $name = substr($name, 0, strlen($name)-4);
      if (substr($name, -4) == ".jar") $name = substr($name, 0, strlen($name)-4);
      if (substr($name, -4) == ".tar") $name = substr($name, 0, strlen($name)-4);
      if ((substr($name, -4) == "_src") 
	  || (substr($name, -4) == "-src")
	  || (substr($name, -4) == ".src")
      ) $name = substr($name, 0, strlen($name)-4);
      if ((substr($name, -8) == "_sources") 
	  || (substr($name, -8) == "-sources")
	  || (substr($name, -8) == ".sources")
      ) $name = substr($name, 0, strlen($name)-8);
      if ((substr($name, -7) == "_source") 
	  || (substr($name, -7) == "-source")
	  || (substr($name, -7) == ".source")
      ) $name = substr($name, 0, strlen($name)-7);
      if ((substr($name, -5) == "_dist") 
	  || (substr($name, -5) == "-dist")
	  || (substr($name, -5) == ".dist")
      ) $name = substr($name, 0, strlen($name)-5);

      echo "$name :<br/>";

      $IdDB = mysql_connect($db_host ,$db_user, $db_pwd);
      mysql_select_db($db_db);
      $query = "INSERT INTO Project (Name) VALUES ('$name')";
      $IdReq = mysql_query($query, $IdDB);
      $id = mysql_insert_id();

      $lines = file($bulk.DIRECTORY_SEPARATOR.$file);
      array_shift($lines);
      foreach ($lines as $line) {
	list($nbFiles, $language, $nbBlank, $nbComment, $nbCode) = explode(",", $line);
	echo "INSERT INTO Sloc VALUES ($id,'$language',$nbCode, 0)<br/>";
	$query = "INSERT INTO Sloc VALUES ($id,'$language',$nbCode, 0)";
	$IdReq = mysql_query($query, $IdDB);
      }

    }
  }
  closedir($dir);
} 



