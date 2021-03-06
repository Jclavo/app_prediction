<?php
// namespace application\libraries;

defined('BASEPATH') OR exit('No direct script access allowed');

class K_means
{
    public function start_kmeans(array $listStudent, int $number_clusters) {
        
        
        //$data[] - All the information will be loaded in this array 
        
        $number_students = count($listStudent) - 1;
        
        $random_clusters = $this->getRandomArray($number_students,$number_clusters);
        
        $students = $this->generateStructureStudents($listStudent);
        
        $random_clusters = $this->asignClusterLetter($students,$random_clusters);
        
       $data_aux = $this->calculateCluster($students,$random_clusters);
        
       $data['clusters'] = $data_aux['clusters']; // add "Cluster" to array DATA
       $data['students'] = $data_aux['students']; // add "Students" to array DATA
        
        return $data;
    }
    
    
    private function getRandomArray($number_students,$number_clusters) {
        
        $array_random = array();
        $random_value = rand(0,$number_students);
        
        array_push($array_random,$random_value);
        $condition = TRUE;
        
        while ($condition) {
            IF (count($array_random) == $number_clusters)
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
        $list_random_clusters = array();
        $list_students = array();
        
        while ($flagClusterChange) {
            
            array_push($list_random_clusters,$random_clusters); //Acumulate all clusters iterations
            
            $flagClusterChange = 0;
            foreach ($students as $key => $student) {
                
                $lowestCluster = 0;
                $lowestDistance = 0;
                $contadorCluster = 0;
                //Get lowest distance and so on
                foreach ($random_clusters as $random_cluster) {
                    $clusterValue = $random_cluster['value'];
                    $distanceCluster = $this->distanceBetweenPoints($clusterValue,$student['average']);
                    
                    if ($contadorCluster == 0) {
                        $lowestDistance = $distanceCluster;
                        $lowestCluster = $clusterValue;
                    }
                    
                    if ($distanceCluster < $lowestDistance ) {
                        $lowestDistance = $distanceCluster;
                        $lowestCluster = $clusterValue;
                    }
                    
                    $contadorCluster = $contadorCluster + 1;
                }
                
                if ($student['cluster_value'] != $lowestCluster) {
                    $students[$key]['cluster_value'] = $lowestCluster;
                    $flagClusterChange = 1;
                }
                
            }
            
            
            /*foreach ($students as $key => $student) {
                foreach ($random_clusters as $random_cluster) {
                    
                }
                
            }*/
            $points_high_lows = array();
            $points_high_low = array();
            
            foreach ($students as $key => $student) {
                              
                if ($this->isClusterInList($points_high_lows,$student)) {
                        
                    foreach ($points_high_lows as $key => $point)
                      {
                        if ($student['cluster_value'] == $point['cluster_value'] ) {
                            
                            if ($student['average'] < $point['low']) {
                                $points_high_lows[$key]['low'] = $student['average'];
                            }
                            else {
                                if ($student['average'] > $point['high']) {
                                    $points_high_lows[$key]['high'] = $student['average'];
                                }
                            }                            
                        }
                    }

                }
                else 
                {
                    $points_high_low['cluster_value'] = $student['cluster_value'];
                    $points_high_low['low']     = $student['average'];
                    $points_high_low['high']    = $student['average'];
                    
                    array_push($points_high_lows, $points_high_low);
                   
                }
                
            }
            
            foreach ($random_clusters as $key => $random_cluster) {
                
                foreach ($points_high_lows as $point)
                {
                    if ($random_cluster['value'] == $point['cluster_value']) {
                        $random_clusters[$key]['value'] = ( $point['low'] + $point['high'] ) / 2;
                        $random_clusters[$key]['value'] = round( $random_clusters[$key]['value'], 2);
                    }
                }
                
            }
            
            array_push($list_students,$students); //Acumulate all Students iterations
        }

        $data_aux['students'] = $list_students;
        //$data_aux['clusters'] = array_pop($list_random_clusters); //the last element is deleted
        $data_aux['clusters'] = $list_random_clusters; 
        return $data_aux;
    }
    
    private function distanceBetweenPoints($pointX, $pointY) {
        $distance = abs($pointX - $pointY);
        
        return $distance;
    }
    
    private function generateStructureStudents($listStudent) {
                
        $students = array();
        $student = array();
        
        foreach ($listStudent as $std) {
            $student['id'] = $std['student_id'];
            $student['average'] = round($std['average'],2);
            $student['cluster'] = '';
            $student['cluster_value'] = '';
            
            array_push($students, $student);
            
        }
        
        return $students;
    }
    
    private function asignClusterLetter($students,$clusters) {
               
        $alphabet = range('A', 'Z');
        $contador_alphabet = 0;
        $random_clusters = array();
        $random_cluster = array();
        
        foreach ($clusters as $cluster) {
            $random_cluster['value'] = round($students[$cluster]['average'],2);
            $random_cluster['letter'] = $alphabet[$contador_alphabet];
            $random_cluster['number'] = $contador_alphabet;
            array_push($random_clusters,$random_cluster);
            $contador_alphabet =  $contador_alphabet + 1;
        }
        
        return $random_clusters;
    }
    
    private function isClusterInList($points_high_lows,$student) {
        
        foreach ($points_high_lows as $point)
        {
            if ($student['cluster_value'] == $point['cluster_value'] ) {
                return 1;
            }
        }
        return 0;
    }
    
}

