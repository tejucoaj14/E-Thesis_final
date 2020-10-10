<?php
    $params = array_merge($_GET, array("test" => "axel"));

    $new_query_string = http_build_query( $params );

    print($new_query_string);
?>