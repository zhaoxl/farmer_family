<?php

/**
 * Actors model config
 */

return array(

	'title' => '注册信息管理',

	'single' => '用户',

	'model' => 'App\User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'email' => array(
			'title' => '邮箱',
		),
		'name' => array(
			'title' => '姓名',
		),
		'mobile' => array(
			'title' => '手机号'
		),
		'qq' => array(
			'title' => 'QQ'
		),
		'weixin' => array(
			'title' => '微信'
		),
		'area_name' => array(
			'title' => '所在区域'
		),
		'age' => array(
			'title' => '年龄'
		),
		'gender' => array(
			'title' => '性别'
		),
		'hometown' => array(
			'title' => '籍贯'
		),
		'expect_salary' => array(
			'title' => '期望收入'
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id'
	),
	'global_actions' => array(
	    //Create Excel Download
	    'download_excel' => array(
	        'title' => '导出Excel',
	        'messages' => array(
	            'active' => 'Creating the spreadsheet...',
	            'success' => 'Spreadsheet created! Downloading now...',
	            'error' => 'There was an error while creating the spreadsheet',
	        ),
	        //the Eloquent query builder is passed to the closure
	        'action' => function($query)
	        {
	            //get all the rows for this query
	            $result = $query->get();
							$excel = Excel::create('users', function($excel) use(&$result){
								$excel->sheet('sheet1', function($sheet) use(&$result){
									$rows = array(array('ID', '姓名', '邮箱'));
									foreach($result as $key=>$value){
										$row = array();
										array_push($row, $value->id, $value->name);
										array_push($rows, $row);
									}
									$sheet->rows($rows);
						    });
							})->store('xls', false, true);
							//echo $excel['full'];
							//return '123';
							//Response::download($excel['full
							//$file = $excel['this']
							//return response()->download();
							return response()->download($excel['full']);
	        }
	    ),
	),
);