<?php

/* set the cache limiter to 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

session_cache_expire(1);
$cache_expire = session_cache_expire();

/* start the session */

session_start();

echo "The cache limiter is now set to $cache_limiter<br />";
echo "The cached session pages expire after $cache_expire minutes";



// Manually trigger garbage collection
$deleted = session_gc();

echo "Deleted $deleted expired session(s).";

$params = session_get_cookie_params();

print_r($params);


