<?php

require_once('include/main.php');

function __test($cond, $message)
{
	if ($cond)
		return;
	$bt = debug_backtrace(false);
	array_shift($bt);
	$frame = array_shift($bt);
	$line = $frame['line'];
	echo "Test failed on line $line: $message\n";
	exit(1);
}

function test_unreachable($message)
{
	__test(false, $message);
}

function test_true($cond, $message)
{
	__test($cond, $message);
}

function test_false($cond, $message)
{
	__test(!$cond, $message);
}

function test_equal($a, $b, $message)
{
	__test($a == $b, $message);
}

function test_nonequal($a, $b, $message)
{
	__test($a != $b, $message);
}

function test_type($a, $t, $message)
{
	__test(gettype($a) == $t, $message);
}

function test_class($a, $c, $message)
{
	__test(get_class($a) == $c, $message);
}