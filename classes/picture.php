<?php

//===============================================================================
// Picture class
// - $file: name of the picture (should be a path to the actual file, but we 
//          use just the name to simplify in this case) 
//
// * We could add more attributes to the class, such as size, type, etc. with 
//   its corresponding methods, but they are't really necessary for this exercise
//================================================================================

class Picture {
    private $file;
    private $filters = array();

    //=================================================
    // Constructor
    // - $arr: asociative array with the picture data
    //=================================================

    /**
     * __construct
     *
     * @param  mixed $arr
     *
     * @return void
     */
    public function __construct($arr){

        $this->file = $arr['file'];
        $this->filters = $arr['filters'];
        
    }

    //=================================================
    // GET METHODS
    //=================================================

    /**
     * getFileName
     *
     * @return void
     */
    public function getFileName(){

        return $this->file;

    }

    /**
     * getFilters
     *
     * @return void
     */
    public function getFilters(){

        return $this->filters;

    }

    //=================================================
    // SET METHODS
    //=================================================
    
    //====================================================
    // Set the object's filters, checking its values (this 
    // should be done also on the client side)
    // - $filters: asociative array with the new filters
    //====================================================
    /**
     * setFilters
     *
     * @param  mixed $filters
     *
     * @return void
     */
    public function setFilters($filters){

        foreach ($filters as $key => $value) {
            switch ($key) {
                case 'resize':
                case 'blur':
                    if ($value >= 0){

                        if ($value > 0) {
                            
                            $this->filters[$key] = $value;

                        }

                    } else {

                        echo "- ERROR: " . $key . " must be a positive number.\n";

                    }
                    break;

                case 'negate':
                case 'grayscale':
                    if ($value >= 0 && $value <= 1){

                        $this->filters[$key] = $value;

                    } else {

                        echo "- ERROR: " . $key . " must have a value of 0 or 1.\n";
                    }
                    break;

                case 'brightness':
                case 'contrast':
                    if ($value >= -255 && $value <=255 ){

                        if ($value != 0) {
                            
                            $this->filters[$key] = $value;

                        }

                    } else {

                        echo "- ERROR: " . $key . " must be a number between -255 and 255.\n";

                    }
                    break;

                default:
                    echo "- ERROR: " . $key . " is not a valid filter.\n";
                    break;
            }
        }

    }

    //=======================================================
    // Transforms the filters asociative array into a string
    // - return: the string representing the filters array,
    //           it will be an empty array if there are no
    //           filters.
    //=======================================================

    /**
     * filtersToString
     *
     * @return void
     */
    public function filtersToString(){

        if (count($this->getFilters()) > 0) {
            $output = "\t" . "filters: \n";

            foreach ($this->getFilters() as $key => $value) {
                $output .= "\t\t" . $key . ': ' . $value . "\n";
            }

            return $output . "\n";
        } 

        return "";

    }
    
    //==============================================
    // Transforms the object into a string
    // - return: the string representing the object
    //==============================================

    /**
     * toString
     *
     * @return void
     */
    public function toString(){

        echo $this->getFileName() . "\n";

        if ($this->filtersToString() != '') {
            
            echo $this->filtersToString();

        } else {

            echo "\tNo filters\n";
        }
        
        echo "\n";

    } 

}