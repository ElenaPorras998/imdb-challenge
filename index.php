<?php

require_once 'functions.php';
$db= db_connect();

$stmt = $db->prepare('SELECT imdb_id, name, year FROM imdb_movie');
$stmt ->execute();
$movies = $stmt->fetchAll();
$inp=null;
$count=null;
$find=null;


if ($_POST)
{
    $inp=strtolower($_POST['search']);
    $count=strlen($inp);

    foreach($movies as $movie)
    if($inp == strtolower(substr($movie['name'], 0, $count)))
    {
        $find[]=$movie;
    }
}
?>

<form action="" method="post">
    <input type="text" name="search">
    <input type="submit">
</form>

<ul>
<?php if($_POST){foreach($find as $mov): ?>
    <a href="movie.php?id=<?php echo $mov['imdb_id']?>"><li><?php echo $mov['name']?> (<?php echo $mov['year']?>)</li></a>
<?php endforeach;}?>
</ul>