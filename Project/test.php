<?php
    require_once('utils/db.php');
    $db = getConnection();
    $users = $db->users;
    $user = $users->find(array('_id' => new MongoId("4e0a026afcddd32812000005")), array('_id' => 1));
    var_dump(iterator_to_array($user));
?>
