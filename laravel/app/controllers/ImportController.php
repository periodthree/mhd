<?php

class ImportController extends \BaseController {

    public function csvtoarray($file)
    {

        $i = 0;
            $array = array();
            if (($handle = fopen($file, "r")) !== FALSE) {

                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {

                    //Get First Field
                    if($i == 0) {

                        $fields = $row;

                    }
                    if($i>0) {
                        foreach ($row as $k=>$value) {
                            $array[$i][$fields[$k]] = $value;
                        }
                    }
                    $i++;

                }
                fclose($handle);

            }

        return $array;

    }

    public function import($name)
    {

        // echo $name;
        // exit;

        $file = '../laravel/app/storage/csv/' .$name .'.csv';

        // echo $file;
        // exit;

        $allowedfilenames = array("serials","installers");

        if(in_array($name, $allowedfilenames)) {

            //Parse into array
            $array = $this->csvtoarray($file);


            switch($name) {

                case 'serials' :

                    foreach($array as $item) {

                        $serial = new Serial;
                        $find = $serial->where('serial','=',$item['serial'])->first();

                        if(!$find) {

                            $serial->model_id = $item['model_id'];
                            $serial->serial = $item['serial'];
                            $serial->save();

                        }

                    }

                break;

                case 'installers' :

                    // echo "<pre>";
                    // print_r($array);
                    // echo "</pre>";
                    // exit;

                    $insertcount = 0;
                    $updatecount = 0;

                    foreach($array as $item) {

                            $installer                          = new Installer();
                            $find = $installer->where('account_number','=',$item['account_number'])->first();

                            if($find->id) {
                                $installer                      = Installer::find($find->id);
                            }

                            $installer->account_number          = trim($item['account_number']);
                            $installer->business_name           = trim($item['business_name']);
                            $installer->address                 = trim($item['address']);
                            $installer->city                    = trim($item['city']);
                            $installer->state                   = trim($item['state']);
                            $installer->zip                     = trim($item['zip']);
                            $installer->phone                   = trim($item['phone']);


                            if($installer->save()) {

                                if($find->id) {
                                    $updatecount++;
                                } else {
                                    $insertcount++;
                                }

                            } else {
                                echo "Whoops";
                                exit;
                            }


                    }

                    echo "Updated: " .$updatecount ."<br />";
                    echo "Inserted: " .$insertcount ."<br />";

                break;

            }


        }

        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";


    }

    public function importmodels($file)
    {
        echo $file;
        exit;

        // $file = '../laravel/app/storage/csv/' .$name .'.csv';

        // $array = $this->csvtoarray($file);

    }


}
