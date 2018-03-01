<?php
/**
 * Author: virtual.tang@yingzt.com
 * Date: 2018/3/1
 * Time: 下午2:16
 */

$csv = new CSV();

$header = ["姓名", "性别", "手机号", "金额"];

$fp = $csv->create($title = '测试', $header);

$show_data = ['user_name', 'gender', 'mobile', 'money'];
$data = [
    ['张三', '男', '13200000000', '321.21'],
    ['张三', '男', '13200000000', '321.21'],
    ['张三', '男', '13200000000', '321.21'],
    ['张三', '男', '13200000000', '321.21'],
    ['张三', '男', '13200000000', '321.21'],
    ['张三', '男', '13200000000', '321.21'],
    ['张三', '男', '13200000000', '321.21'],
    ['张三', '男', '13200000000', '321.21'],
    //...........
];

$csv->writeDataToCSV($show_data, $data, $fp);