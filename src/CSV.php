<?php
/**
 * Author: tangchunlinit@foxmail.com
 * Date: 2018/3/1
 * Time: 下午2:06
 */

class CSV
{
    /**
     * @param $title |string filename
     * @param $header |array content
     * create csv file and add header
     * @return bool|resource
     */
    public function create($title, $header)
    {
        $header = join(',', $header) . "\n";
        $file = __DIR__ . '/exports/' . date('Y-m-d') . "_" . $title . '.csv';
        $fp = fopen($file, 'wb');
        fwrite($fp, $this->stringToGBK($header));
        return $fp;
    }

    /**
     * @param $show_data |array
     * write data to csv.
     * @param $data
     * @param $fp
     */
    public function writeDataToCSV($show_data, $data, $fp)
    {
        foreach ($data as $item) {
            $line = $this->array_only((array)$item, $show_data);
            //dd($line);
            $line['money'] = '"' . $line['money'] . '"'; // 处理千分位
            $line['mobile'] = $line['mobile'] . "\t"; // 防止科学计数
            $line = $this->stringToGBK(join(',', $line)) . "\n";
            //dd($line);
            fwrite($fp, $line);
        }
        fclose($fp);
    }

    /**
     * convert chinese language to gbk.
     * @param $string
     * @return string
     */
    protected function stringToGBK($string)
    {
        return mb_convert_encoding($string, 'gbk', mb_detect_encoding($string));
    }

    /**
     * @param $array
     * @param $keys
     * @return array
     */
    protected function array_only($array, $keys)
    {
        return Arr::only($array, $keys);
    }
}