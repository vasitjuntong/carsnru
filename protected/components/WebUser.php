<?php

class WebUser extends CWebUser {

    public function getMemberProfile() {
        if (Yii::app()->user->getState('backEnd'))
            $member = Personnel::model()->findByPk(Yii::app()->user->id);
        else
            $member = Member::model()->findByPk(Yii::app()->user->id);

        return $member;
    }

    public function isAdmin() {
        if (Yii::app()->user->getState('backEnd')) {
            $member = Personnel::model()->findByPk(Yii::app()->user->id);
            if (!empty($member)) {
                if ($member->position_id == 6) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else
                return false;
        }else {
            $member = Member::model()->findByPk(Yii::app()->user->id);
            return false;
        }
    }

    public function isRector() {
        if (Yii::app()->user->getState('backEnd'))
            $member = Personnel::model()->findByPk(Yii::app()->user->id);
        else
            $member = Member::model()->findByPk(Yii::app()->user->id);

        if (!empty($member)) {
            if ($member->position_id == 4) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else
            return false;
    }

    public function isBossCar() {
        if (Yii::app()->user->getState('backEnd'))
            $member = Personnel::model()->findByPk(Yii::app()->user->id);
        else
            $member = Member::model()->findByPk(Yii::app()->user->id);

        if (!empty($member)) {
            if ($member->position_id == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else
            return false;
    }

    public function isViceRector() {
        if (Yii::app()->user->getState('backEnd'))
            $member = Personnel::model()->findByPk(Yii::app()->user->id);
        else
            $member = Member::model()->findByPk(Yii::app()->user->id);

        if (!empty($member)) {
            if ($member->position_id == 5) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else
            return false;
    }

    public function getAdmins() {
        $_members = array();
        $member = Personnel::model()->admin()->findAll();
        foreach ($member as $value) {
            array_push($_members, $value->username);
        }

        return $_members;
    }

    public function getBossCars() {
        $_members = array();
        $member = Personnel::model()->bossCar()->findAll();
        foreach ($member as $value) {
            array_push($_members, $value->username);
        }

        return $_members;
    }

    public function getRectors() {
        $_members = array();
        $member = Personnel::model()->rector()->findAll();
        foreach ($member as $value) {
            array_push($_members, $value->username);
        }

        return $_members;
    }

    public function getViceRectors() {
        $_members = array();
        $member = Personnel::model()->vice_rector()->findAll();
        foreach ($member as $value) {
            array_push($_members, $value->username);
        }

        return $_members;
    }

    public function isMember() {
        $member = Member::model()->findByPk(Yii::app()->user->id);
        if ($member->status == 3) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getMembers() {
        $_members = array();
        $member = Member::model()->findAll();
        foreach ($member as $value) {
            array_push($_members, $value->username);
        }

        return $_members;
    }

    public function getMemberBackend() {
        $_members = array();
        $member = Personnel::model()->findAll();
        foreach ($member as $value) {
            array_push($_members, $value->username);
        }

        return $_members;
    }

}
