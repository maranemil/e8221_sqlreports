<?php
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

$dictionary['e8221_SQLReports'] = array(
	'table'              => 'e8221_sqlreports',
	'audited'            => true,
	'duplicate_merge'    => true,
	'fields'             => array(
		'sqlgraph_type' =>
			array(
				'required'                  => false,
				'name'                      => 'sqlgraph_type',
				'vname'                     => 'LBL_SQLGRAPH_TYPE',
				'type'                      => 'enum',
				'massupdate'                => 0,
				'no_default'                => false,
				'comments'                  => '',
				'help'                      => '',
				'importable'                => 'true',
				'duplicate_merge'           => 'disabled',
				'duplicate_merge_dom_value' => '0',
				'audited'                   => false,
				'reportable'                => true,
				'unified_search'            => false,
				'merge_filter'              => 'disabled',
				'calculated'                => false,
				'len'                       => 100,
				'size'                      => '20',
				'options'                   => 'sqlquery_graph_type_list',
				'studio'                    => 'visible',
				'dependency'                => false,
			),
		'sqlquery_text' =>
			array(
				'required'                  => false,
				'name'                      => 'sqlquery_text',
				'vname'                     => 'LBL_SQLQUERY_TEXT',
				'type'                      => 'text',
				'massupdate'                => 0,
				'no_default'                => false,
				'comments'                  => '',
				'help'                      => '',
				'importable'                => 'true',
				'duplicate_merge'           => 'disabled',
				'duplicate_merge_dom_value' => '0',
				'audited'                   => false,
				'reportable'                => true,
				'unified_search'            => false,
				'merge_filter'              => 'disabled',
				'calculated'                => false,
				'size'                      => '20',
				'studio'                    => 'visible',
				'rows'                      => '4',
				'cols'                      => '20',
			),
		'sqljson_data'  =>
			array(
				'required'                  => false,
				'name'                      => 'sqljson_data',
				'vname'                     => 'LBL_SQLJSON_DATA',
				'type'                      => 'text',
				'massupdate'                => 0,
				'no_default'                => false,
				'comments'                  => '',
				'help'                      => '',
				'importable'                => 'true',
				'duplicate_merge'           => 'disabled',
				'duplicate_merge_dom_value' => '0',
				'audited'                   => false,
				'reportable'                => true,
				'unified_search'            => false,
				'merge_filter'              => 'disabled',
				'calculated'                => false,
				'size'                      => '20',
				'studio'                    => 'visible',
				'rows'                      => '4',
				'cols'                      => '20',
			),
	),
	'relationships'      => array(),
	'optimistic_locking' => true,
	'unified_search'     => true,
);
if (!class_exists('VardefManager')) {
   require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('e8221_SQLReports', 'e8221_SQLReports', array('basic', 'team_security', 'assignable'));