    <?php  
    /** 
     * Created by PhpStorm. 
     * User: luyanfeng 
     * Date: 16/7/12 
     * Time: 下午1:45 
     */  
      
    /** 
     * @param $dir 
     * @return int 
     */  
    function countLine($dir)  
    {  
        $count = 0;  
        if (is_dir($dir)) {  
            $files = scandir($dir);  
            foreach ($files as $file) {  
                if ($file[0] == '.') continue;  
                $file = $dir . "/" . $file;  
                if (is_dir($file)) {  
                    $count += countLine($file . "/");  
                } else {  
                    if (strpos($file, ".php"))  
                        $count += count(file($file));  
                }  
            }  
        } else {  
            $count += count(file($dir));  
        }  
        return $count;  
    }  
      
    if (count($argv) < 2) {  
        echo "lack params\n";  
        die;  
    }  
    $dir = $argv[1];  
    echo countLine($dir) . "\n";  