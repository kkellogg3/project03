<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Hotel Guests List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link rel="stylesheet" href="../css/normalize.min.css">-->
        <!--<link rel="stylesheet" href="../css/style.css">-->

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    
    <body>
        
        <section class="notebook">
            
            <?php
            
                $servername = getenv('kkellogg-valenciawebcoding-kendallkellogg92.c9users.io');
                $username = 'kendallkellogg92';
                $password ="";
                $database = "c9";
                $dbport = 3306;
                $dbname = "storednotes";
                
                $db = new mysqli($servername, $username, $password, $database, $dbport);
                
                if ($db->connect_error) {
                    die("Connection Failed: " . $db->connect_error);
                }
                
                echo ("Connected Successfully: " . $db->host_info);
                
                mysqli_select_db($db, $dbname);
              
              
                if (empty($result)) {
                    $sql = "CREATE TABLE NoteBook(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, title VARCHAR(30) NOT NULL, notes VARCHAR(30) NOT NULL)";
                    
                    if ($db->query($sql) === TRUE) {
                        print_r("<br>Table NoteBook was created successfully");
                    } else {
                        print_r("<br> There was an error creating the table: " . $db->error);
                    }
                }
                
                $title = mysqli_real_escape_string($db, $_POST['title']);
                $notes = mysqli_real_escape_string($db, $_POST['notes']);
                
                $notes_insert = "INSERT INTO NoteBook (title, notes) VALUES ('$title', '$notes')";
                
                if (mysqli_query($db, $notes_insert)) {
                    print_r("<br>Record added successfully.");
                } else {
                    print_r("<br>Error: " . mysqli_error($db));
                }
                
                print_r("<h1>Your current Notebook</h1>");
                
                $sql = "SELECT id, title, notes FROM NoteBook";
                $notesresult = $db->query($sql);
                
                if ($notesresult->num_rows > 0) {
                    
                    while ($row = $notesresult->fetch_assoc()) {
                        echo "Note ID: " . $row["id"] . "<br>Note Title: " . $row["title"] . " " . "<br>Notes: " . $row["notes"] . " ";
                    }
                } else {
                    print_r("<br>No results to display.");
                }
                
                $db->close();
                
                ?>
            
            <br>
            <a href="../index.html">Back to Notebook</a>
            
        </section>
        <script src="js/main.js"></script>
        
        
        
    </body>
    
    
    
    
    
</html>