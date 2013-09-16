<?php

class Club_Type_Model extends Active_Record_Model
{   
    public function __construct($key = null, $col = 'id')
    {
        parent::__construct('club_type', $key, $col);
    }
    
    public static function build_all()
    {
        $res = DB::mysqli()->query('SELECT * FROM club_type');
        if(!$res)
            return false;
        
        $arr = array();
        while($row = $res->fetch_assoc())
        {
            $obj = new Club_Type_Model($row['id']);
            $obj->load($row);
            $arr[] = $obj;
        }
        
        return $arr;
    }
}

?>