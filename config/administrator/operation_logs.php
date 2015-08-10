<?php

/**
 * Actors model config
 */

return array(

	'title' => '操作记录查询',

	'single' => '操作记录',

	'model' => 'App\AdminOperationLog',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'admin_name' => array(
			'title' => '操作员',
			'relationship' => 'admin',
			'select' => '(:table).name',
		),
		'action' => array(
			'title' => '动作',
		),
		'remark' => array(
			'title' => '备注'
		),
		'created_at'
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'admin' => array(
		    'type' => 'relationship',
		    'title' => '管理员',
		    'name_field' => 'name'
		)
	),
	'edit_fields' => array(
		'id',
		'admin' => array(
		    'type' => 'relationship',
		    'title' => '操作员',
		    'name_field' => 'name',
			'editable' => false,
		),
		'action' =>array(
			'title' => '动作',
			'editable' => false,
		),
		'remark' =>array(
			'title' => '备注',
			'editable' => false,
		)
	),
	
	
	'action_permissions'=> array(
	    'create' => function($model)
	    {
	        #return Auth::admin()->has_role('super_admin');
			return false;
	    },

	    'delete' => function($model)
	    {
	        #return Auth::admin()->has_role('super_admin');
			return false;
	    },

	    'update' => function($model)
	    {
	        #return Auth::admin()->has_role('super_admin');
			return false;
	    },

	    'view' => function($model)
	    {
	        #return Auth::admin()->has_role('super_admin');
			return true;
	    }
	),
);