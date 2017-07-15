<?php
//配置文件
return [
    'login_session_identifier' => '_L', // 登录标识
    'no_auth_controller_name'  => 'index', // 不需要验证的控制器

    'paginate'                 => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'namespace' => '\\app\\admin\\paginator\\',
    ],

    'imgUrl' => 'http://img.61xsw.com/',
	'webUrl' => 'http://m.61xsw.com/',

	'paytype'  => [
		1 => 'CPS',
		2 => 'CPA',
		3 => '买量',
		4 => '免费',
	],
	
	'mrtype'  => [
		1 => '言情都市',
		2 => '玄幻奇幻',
		3 => '网游竞技',
		4 => '历史军事',
	],
];
