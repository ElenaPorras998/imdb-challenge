<?php
require_once 'functions.php';
$db= db_connect();

$id=1431045;
$stmt= $db->prepare(
    'SELECT imdb_person.imdb_id,
    imdb_person.fullname,
    imdb_person.first_name,
    imdb_person.middle_name,
    imdb_person.last_name,
    imdb_person.birth_date,
    imdb_person.birth_location,
    imdb_person.death_date,
    imdb_person.death_location
    FROM imdb_person 
    LEFT OUTER JOIN imdb_movie_type ON imdb_movie.imdb_movie_type_id=imdb_movie_type.id
    WHERE imdb_id = ?;');
    $stmt->execute([$id]);
    $mov= $stmt->fetch(); //array of all the columns of specific movie

?>
    <h1>Movies</h1>
    <div>
        <p>Type:<?php echo $mov['type_name']?></p>
        <p>Status:<?php echo $mov['status_name']?></p>
        <p>Name:<?php echo $mov['name']?></p>
        <p>length:<?php echo $mov['length']?></p>
        <p>Year:<?php echo $mov['year']?></p>
        <p>Start year:<?php echo $mov['start_year']?></p>
        <p>End year:<?php echo $mov['end_year']?></p>
        <p>Rating:<?php echo $mov['rating']?></p>
        <p>Votes:<?php echo $mov['votes_nr']?></p>
        <p>Metascore:<?php echo $mov['metascore']?></p>
        <p>Certification:<?php echo $mov['label']?></p>
        <p>Budget:<?php echo $mov['budget']?></p>
        <p>Currency:<?php echo $mov['budget_currency']?></p>
        <p>Color:<?php echo $mov['color_code']?></p>                  
    </div>