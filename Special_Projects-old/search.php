<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("project1") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM annual_project
            WHERE (program LIKE '%".$query."%') OR (status LIKE '%".$query."%') OR (aip LIKE '%".$query."%') OR (source LIKE '%".$query."%') OR (start LIKE '%".$query."%') OR (end LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: id, title, text
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query%' ...OR ... '$query %' ... OR ... '% $query'
            echo "<h1 align='center' style='color:#33D0FD;'>Search Results</h1>";    

        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
        
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

             echo "<table border='1' width='100%' height='auto' align='center' text-align='center' style='border-collapse:collapse;    background: #FFF; color: #47433F; padding: 0.75em 0.5em; text-align: left;'>";
             echo "<thead>";
                echo "<th align='center' width='8%'>AIP</th>";
                echo "<th align='center' width='8%'>Programs</th>";
                echo "<th align='center' width='8%'>Department</th>";
                echo "<th align='center' width='8%'>Project cost</th>";
                echo "<th align='center' width='8%'>Source</th>";
                echo "<th align='center' width='8%'>Year Started</th>";    
                echo "<th align='center' width='8%'>Year Completed</th>";
                echo "<th align='center' width='8%'>Status</th>";
                echo "<th align='center' width='8%'>Expected Output</th>";                
            echo "</thead>";                    

                echo "<tr align='newt_centered_window(width, height)'>";
                echo "<td width='8%'>".$results['aip'] . "</td>";  
                echo "<td width='8%'>".$results['program'] . "</td>";
                echo "<td width='8%'>".$results['department'] . "</td>";   
                echo "<td width='8%'>".$results['amount'] . "</td>";   
                echo "<td width='8%'>".$results['source'] . "</td>"; 
                echo "<td width='8%'>".$results['start'] . "</td>";   
                echo "<td width='8%'>".$results['end'] . "</td>";
                echo "<td width='8%'>".$results['status'] . "</td>"; 
                echo "<td width='8%'>".$results['e_output'] . "</td>";                               
                echo "</tr>";
            echo "</table>";


                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }

            echo "<a href='dashboard.php'>Home<a>";
?>
<body>

</body>
</body>
</html>