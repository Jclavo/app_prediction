<?php
// namespace application\libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

class kmeans
{
    public function start_kmeans(array $listStudent, array $number_clusters) {
        
        $number_students = count($listStudent) - 1;
        
        $random_clusters = $this->getRandomArray($number_students,$number_clusters);
        
    }
    
    private function function_name($number_students,$number_clusters) {
        
        $random_value = rand(0,$number_students);
        array_push($array_random,$random_value);
        $condition = TRUE;
        
        while ($condition) {
            IF (count($array_random) == 2)
            {
                return $array_random;
            }
            
            $random_value = rand(0,$number_students);
            if(!in_array($random_value,$array_random))
            {
                array_push($array_random,$random_value);
            }
        }
        
    }
}

