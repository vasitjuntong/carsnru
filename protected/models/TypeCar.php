<?php
class TypeCar extends TypeCarBase {
    public function rules() {
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('type_car, name', 'safe', 'on' => 'search'),
        );
    }
    public function relations() {
        return array(
        );
    }
    public function attributeLabels() {
        return array(
            'type_car' => 'รหัส',
            'name' => 'ประเภทรถยนต์',
        );
    }
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('type_car', $this->type_car);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
