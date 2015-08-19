<?php

/**
 * Films model config
 */

return array(

	'title' => '站内信息管理',

	'single' => '站内信息',

	'model' => 'App\Message',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'category_name' => array('title' => '消息类型'),
		'title' => array('title' => '标题'),
		'from_user_name' => array('title' => '发送用户'),
		'to_user_name' => array('title' => '接收用户'),
		'is_read' => array('title' => '是否已读'),
		'created_at' => array('title' => '发送时间')
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'title' => array('title' => '标题'),
		'category' => array(
			'title' => '消息类型',
			'type' => 'enum',
			'options' => array(
				'1' => '站内消息',
				'2' => '系统消息'
			),
		),
		'from_user_id' => array('title' => '发送用户'),
		'to_user_id' => array('title' => '接收用户'),
		'readed' => array(
			'title' => '是否已读',
			'type' => 'enum',
			'options' => array(
			  '1' => '已读',
			  '0' => '未读',
			),
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name',
	),
	'action_permissions'=> array(
    'create' => function($model)
    {
			return false;
    }
	),
	'global_actions' => array(
	    //Create Excel Download
	    'download_excel' => array(
	        'title' => '发布站内消息',
	        'action' => function($query)
	        {
						return '123';
						//return redirect('/admin/page/administrator.change_pwd');
	        }
	    ),
	),

);

