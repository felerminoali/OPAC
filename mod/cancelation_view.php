<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/11/2016
 * Time: 5:02 PM
 */

require_once('../inc/autoload.php');

if(isset($_POST['reservation'])){

$id = $_POST['reservation'];
?>

<h1>Reservation Cancelation</h1>

<p>Reservation <?php echo $id;?> was canceled.</p>
    <p><a href="/?page=reservations">Go to Reservations</a></p>

<?php } else{
    echo '<h1>Error</h1> <p>An error has occured </p>'; 
}?>
