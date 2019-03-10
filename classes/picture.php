<?php

/**
 * Picture class
 * 
 * @var string $file Name of the picture (should be a path to the actual file, but we 
 *            use just the name to simplify in this case) 
 * @var array $filters Array with the filters applied to the picture
 * 
 * - We could add more attributes to the class, such as size, type, etc. with 
 *   its corresponding methods, but they are't really necessary for this exercise.
 */
class Picture {
    private $file;
    private $filters = array();

    /**
     * __construct
     *
     * @param  array $arr Asociative array with the picture data
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
     * @return string File name
     */

    public function getFileName(){

        return $this->file;

    }

    /**
     * getFilters
     *
     * @return array Array with the filters applied to the picture
     */

    public function getFilters(){

        return $this->filters;

    }

    /**
     * setFilters: 
     * 
     * Set the object's filters, checking its values (this 
     * should be done also on the client side)
     *
     * @param  array $filters Asociative array with the new filters
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

    /**
     * filtersToString
     * 
     * Transforms the filters asociative array into a string
     *
     * @return string The string representing the filters array, 
     *                it will be an empty array if there are no filters.
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

    /**
     * toString
     * 
     * Transforms the object into a string
     *
     * @return string The string representing the object
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