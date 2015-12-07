<?php

class Lists {

    public static function position() {
        return CHtml::listData(Position::model()->desc()->findAll(), 'position_id', 'name');
    }

    public static function personnel($criteria = array()) {
        return CHtml::listData(Personnel::model()->findAll($criteria), 'personnel_id', 'positionANDname');
    }

    public static function brand() {
        return CHtml::listData(Brand::model()->desc()->findAll(), 'brand_id', 'name');
    }
    
    public static function place() {
        return CHtml::listData(Place::model()->desc()->findAll(), 'place_id', 'name');
    }
    
    public static function car($criteria = array()){
        return CHtml::listData(Car::model()->desc()->findAll($criteria), 'car_id', 'license_no');
    }
    
    public static function typeCars(){
        return CHtml::listData(TypeCar::model()->findAll(), 'type_car', 'name');
    }

}
