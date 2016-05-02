<?php

require "vendor/autoload.php";

$consoles=
[
	[
		"name"=>"Playstation 1",
		"image"=>"http://a.fastcompany.net/multisite_files/fastcompany/imagecache/inline-large/inline/2014/12/3039258-inline-i-1-10-playstation-oddities.jpg",
		"game"=>"https://cdn2.vox-cdn.com/thumbor/AK-cWN5BHyDxOEI-37XUpodEAqc=/0x0:1920x1080/1600x900/cdn0.vox-cdn.com/uploads/chorus_image/image/46920082/ori-and-the-blind-forest-screenshot_1920.0.0.jpg"
	],
	[
		"name"=>"PCMasterRace",
		"image"=>"https://i.ytimg.com/vi/aDMsGl_XxTk/maxresdefault.jpg",
		"game"=>"http://images.akamai.steamusercontent.com/ugc/419187061813794087/81F03EFADEB9E8CA0404C8A0425C93174EFF0647/"
	],
	[
		"name"=>"Gameboy",
		"image"=>"http://nerdist.com/wp-content/uploads/2015/08/gameboy_by_sbstn723-det7or.jpg",
		"game"=>"http://img.gamefaqs.net/screens/c/3/6/gfs_27873_2_1.jpg"

	]

];
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB;
$db->addConnection([
    'driver'    => 'mysql',
    'database'  => 'consoles',
    'username'  => 'root',
    'password'  => '',
    'host'      => 'localhost',
    'charset'   => 'latin1',
    'collation' => 'latin1_swedish_ci',
    'prefix'    => ''
]);
$db->setAsGlobal();

$db->schema()->dropIfExists('classics');

$db->schema()->create('classics',function($table){
	$table->string('name');
	$table->string("image");
	$table->string("game");
});

$db->table('classics')->insert($consoles);

$classics = $db->table('classics')->get();

//print_r($classics);

foreach($classics as $classic){
	print "<img width='300px' src=".$classic->image.">";
	print "<img width='300px' src=".$classic->game.">";
}