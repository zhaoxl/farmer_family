<?php

/**
 * Directors model config
 */

return array(

	'title' => '导演',

	'single' => 'director',

	'model' => 'App\Director',

	/**
	 * The display columns
	 */
	'columns' => array(
		'name' => array(
			'title' => '姓名',
		),
		'formatted_salary' => array(
			'title' => '薪水',
			'sort_field' => 'salary'
		),
		'num_films' => array(
			'title' => '# 电影数',
			'relation' => 'films',
			'select' => 'COUNT((:table).id)',
		),
		'created_at' => array('title' => '添加时间'),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'first_name',
		'last_name',
		'salary' => array(
			'type' => 'number',
			'symbol' => '$',
			'decimals' => 2,
		),
		'created_at' => array(
			'type' => 'datetime'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'first_name' => array(
			'title' => 'First Name',
			'type' => 'text',
		),
		'last_name' => array(
			'title' => 'Last Name',
			'type' => 'text',
		),
		'salary' => array(
			'title' => 'Salary',
			'type' => 'number',
			'symbol' => '$',
			'decimals' => 2
		),
	),

);