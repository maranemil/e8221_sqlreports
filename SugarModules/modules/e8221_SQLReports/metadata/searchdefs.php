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

/*
 * Created on May 29, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
$module_name = 'e8221_SQLReports';
$searchdefs[$module_name] = array(
    'templateMeta' => array(
        'maxColumns'      => '3',
        'maxColumnsBasic' => '4',
        'widths'          => array('label' => '10', 'field' => '30'),
    ),
    'layout'       => array(
        'basic_search'    => array(
            'name',
            array('name' => 'current_user_only', 'label' => 'LBL_CURRENT_USER_FILTER', 'type' => 'bool'),
            array('name' => 'favorites_only', 'label' => 'LBL_FAVORITES_FILTER', 'type' => 'bool',),
        ),
        'advanced_search' => array(
            'name',
            array('name' => 'assigned_user_id', 'label' => 'LBL_ASSIGNED_TO', 'type' => 'enum', 'function' => array('name' => 'get_user_array', 'params' => array(false))),
            array('name' => 'favorites_only', 'label' => 'LBL_FAVORITES_FILTER', 'type' => 'bool',),
        ),
    ),
);

