#!/usr/bin/env php
<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
$phpunit_bin      = __DIR__ . '/../vendor/bin/phpunit';
$phpunit_bin      = file_exists($phpunit_bin) ? $phpunit_bin : 'phpunit';
$phpunit_conf     = 'phpunit.xml';
$phpunit_opts     = "-c $phpunit_conf";
system("$phpunit_bin $phpunit_opts", $result);
exit($result);
