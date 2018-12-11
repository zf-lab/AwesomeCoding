<?php
/**
 * Created by PhpStorm.
 * User: It's me
 * Date: 2018/12/3
 * Time: 2:26 PM
 */

namespace Home\Controller;


class FuturesController extends BaseController
{

    public function import_futures_data()
    {
        //excel导入功能
        //todo excel导入
        $id = 2;
        $fileName = $_SERVER['DOCUMENT_ROOT'] . '/Public/tmp/data' . $id . '.xlsx';

        G('begin');
        vendor('PHPExcel.PHPExcel.Reader.Excel2007');
        $phpReader = new \PHPExcel_Reader_Excel2007();

        $phpExcel = $phpReader->load($fileName);
        $currentSheet = $phpExcel->getSheet($id - 1);

        $allColumn = $currentSheet->getHighestColumn();

        $allRow = $currentSheet->getHighestRow();

        $cellData = array();

        $count = 0;
        for ($currentRow = 2; $currentRow <= $allRow; $currentRow++) {
            $rowValue = $currentSheet->getCell('A' . $currentRow)->getValue();

            for ($currentColumn = 'B'; $currentColumn <= $allColumn; $currentColumn = $this->get_next_column($currentColumn)) {
                $address = $currentColumn . $currentRow;
                $cellValue = $currentSheet->getCell($address)->getValue();

                $columnValue = $currentSheet->getCell($currentColumn . '1')->getValue();

                if (!empty($cellValue) && abs($cellValue) > 0) {
                    $cellDatum['data'] = $cellValue;
                    $cellDatum['data_time'] = \PHPExcel_Shared_Date::ExcelToPHP($rowValue);
                    $cellDatum['index_id'] = '\'' . $columnValue . '\'';
                    $cellDatum['created'] = $cellDatum['modified'] = NOW_TIME;
                    $cellData[] = $cellDatum;

                    $count++;
                } else {
                }
            }
        }

        echo $count = 'count=' . $count;
        G('end');
        echo 'time use:' . G('begin', 'end');

        $this->insert($cellData);

    }

    public function get_next_column($currentColumn)
    {
        $finalStr = '';
        $isAdd = false;
        for ($i = strlen($currentColumn) - 1; $i >= 0; $i--) {
            $chra = ord($currentColumn[$i]);

            if ($chra == ord('Z')) {
                $finalStr =  'A' . $finalStr;
            } else {
                if ($isAdd){
                    $finalStr = chr($chra) . $finalStr;
                }else{
                    $finalStr = chr($chra + 1) . $finalStr;
                }
                $isAdd = true;
            }
        }

        if (!$isAdd){
            $finalStr =  'A' . $finalStr;
        }
        return $finalStr;
    }

    public
    function insert($result)
    {
        echo '<br> php 变更表的数据 insert()()处理 <br><br>';
        $stime = microtime(true);

        $conn = mysqli_connect(C('My_Database.DB_HOST'), C('My_Database.DB_USER'), C('My_Database.DB_PWD'), C('My_Database.DB_NAME'));

        if (!$conn) {
            echo '数据库连接失败';
        }

        //数据库处理操作
        if (count($result) > 0) {
            $memValues = implode(',', array_values($result[0]));
            $finalSql = "insert pb_db_index_value(data,data_time,index_id,created,modified) values(" . $memValues . ")";

            $row = 1;
            while ($row < count($result)) {
                $memValues = implode(',', array_values($result[$row]));

                $finalSql .= ',(' . $memValues . ')';

                $row++;
            }

            $finalStr = $finalSql . ';';
            echo 'str length=' . strlen($finalStr);
            echo $finalStr;
            $getMaxAllow = mysqli_query($conn, 'show global variables like "%max_allowed_packet%";');

            $maxAllowSize = 0;
            while ($row = $getMaxAllow->fetch_assoc()){
                if ($row['Variable_name'] == 'max_allowed_packet'){
                    $maxAllowSize = $row['Value'];
                    break;
                }
            }

            if ($maxAllowSize <= strlen($finalStr)){
//            set global 需要设置权限
//            $setResult = mysqli_query($conn, 'set global max_allowed_packet = 2048000000;');
//            if ($setResult){
//            $result = mysqli_query($conn, $finalStr);
//            }
            }else{
//                $result = mysqli_query($conn, $finalStr);
            }

        } else {
            echo '无结果';
        }

        echo '<br><br>执行sql 完毕<br><br>';

        echo mysqli_error($conn);

        $etime = microtime(ture);

        echo "<br>total time = " . ($etime - $stime) . ' 秒<br>';

        mysqli_close($conn);

        return $result;

    }

}
