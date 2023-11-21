<?php
include_once 'app/QueryBuilder.php';
include_once 'load.php';
include_once 'views/accesos.view.php';
$cicles = \BatBook\QueryBuilder::sql(\BatBook\Course::class);
include_once 'views/cicles.view.php';
