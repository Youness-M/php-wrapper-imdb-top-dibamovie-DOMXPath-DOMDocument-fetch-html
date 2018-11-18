<?php

class dibamovieClass extends config{


    public function selectdibamovie($sql,$array=array(),$style=PDO::FETCH_ASSOC){


        $state=$this->db->prepare($sql);

        foreach ($array as $key=>$value){
            $state->bindValue($key+1,$value);
        }

        $state->execute();
        $result=$state->fetchAll($style);

        return  $result;
    }



    public function query($sql,$array=array(),$style=PDO::FETCH_ASSOC){

        $stat=$this->db->prepare($sql);

        foreach ($array as $key=>$value){
            $stat->bindValue($key+1,$value);
        }

        $stat->execute();
    }


}