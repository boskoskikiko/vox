<?php 

require_once 'konektor.php';

$err = 
if (isset($_POST['delete'])) {
        $qDelete = "DELETE FROM `users` WHERE `id` = :id";

            $konektor->exec($qDelete);
            echo "Record deleted successfully";
            }
        catch(PDOException $e)
            {
            echo $qDelete . "<br>" . $e->getMessage();
            }

        $konektor = null;

