<?php
// namespace application\libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

class k_means
{
    public function start_kmeans(array $listStudent, array $number_clusters) {
        
        
        $number_students = count($listStudent) - 1;
        
        $random_clusters = $this->getRandomArray($number_students,$number_clusters);
        
        $students = $this->generateStructureStudents($listStudent);
        
        $students = $this->calculateCluster($students,$random_clusters);
        
        $students = $this->asignClusterLetter($students,$random_clusters);
        
    }
    
    private function getRandomArray($number_students,$number_clusters) {
        
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
    
    private function calculateCluster($students,$random_clusters) {
        
        
        $lowestCluster = 0;
        $distanceCluster = 0;
        $flagClusterChange = 1;
        
        while ($flagClusterChange) {
            
            $flagClusterChange = 0;
            foreach ($students as $student) {
                
                $lowestCluster = 0;
                //Get lowest distance and so on
                foreach ($random_clusters as $ClusterValue) {
                    $distanceCluster = $this->distanceBetweenPoints($ClusterValue,$student['average']);
                    
                    if ($distanceCluster < $lowestCluster ) {
                        $lowestCluster = $distanceCluster;
                    }
                }
                
                if ($students['cluster_value'] != $lowestCluster) {
                    $students['cluster_value'] = $lowestCluster;
                    $flagClusterChange = 1;
                }
                
            }

        }

        return $students;
    }
    
    private function distanceBetweenPoints($pointX, $pointY) {
        $distance = abs($pointX - $pointY);
        
        return $distance;
    }
    
    private function generateStructureStudents($listStudent) {
        
        
        $students = (object) [
            "id" => "0.0",
            "average" => "0.0",
            "cluster" => "0.0",
            "cluster_value" => "0.0"
        ];
        
        $students = array();
        
        
        foreach ($listStudent as $student) {
            
            $students['id'] = $student['id'];
            $students['average'] = $student['average'];
            $students['cluster'] = '';
            $students['cluster_value'] = '';
            
            array_push($students,$students);
        }
        
        return $students;
    }
    
    private function asignClusterLetter($students,$random_clusters) {
               
        $alphabet = range('A', 'Z');
        $contador_alphabet = 0;
        
        foreach ($random_clusters as $random_value) {
            $random['value'] = $random_value;
            $random['letter'] = $alphabet[$contador_alphabet];
            array_push($array_random,$random);
            $contador_alphabet =  $contador_alphabet + 1;
        }
        
        foreach ($students as $student) {
            
            foreach ($random_clusters as $random_value) {
                
                if ($random_value['value'] == $student['average']) {
                    $student['cluster'] = $random_value['letter'] ;
                    break;
                }   
            }           
   
        }
        return $students;
        
    }

}

