<?php
namespace application\libraries;

/**
 *
 * @author jclavo
 *        
 */
class Kmeans
{

    /**
     */
    public function __construct()
    {}
    
    public function startKmeans($list_values,$numbers_clusters) {
        
        $size_list_values = count($list_values) - 1;
        
        $random_clusters_index = $this-> getRandom(0,$size_list_values,$numbers_clusters);
        
        $clusters = $this->getClusters($list_values,$random_clusters_index);
        
        $this->executeKmeans($list_values,$clusters);
        
        return 0;
    }
    
    
    private function getRandom($initial_index,$final_index,$number_Random) {
        
        $i = 0;
        $array_random = array();
        
        while ($i<$number_Random) {
            
            $random_value = rand($initial_index,$initial_index);
            
            if (!in_array($random_value, $array_random)) 
            {
                array_push($array_random,$random_value);
                $i++;
            }         
               
        }
        
        return $array_random;
    }
    
    private function getClusters($list_values,$random_clusters_index) {
        
        $clusters = array();
        
        foreach ($random_clusters_index as $value) {
            array_push($clusters,$list_values[$value]['amount']);
        }        
        return $clusters;
    }
    
    private function executeKmeans($list_values,$clusters) {
        
        $flag = true;
        
        $size_list_values = count($list_values) - 1;
        
        while ($flag) {
            
            for ($i = 0; $i < $size_list_values; $i++) {
                
                $this->searchClosestCluster($clusters,$value);
                
            }
            
            
            
            
        }
        
        
    }
    
    private function searchClosestCluster($clusters,$value) {
        
        
        return;
    }
    
}

