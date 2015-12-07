<?php
class LoginFormBack extends CFormModel {

    public $username;
    public $password;
    public $status;
    public $rememberMe;
    private $_identity;
    public function rules() {
        return array(
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }
    public function attributeLabels() {
        return array(
            'username' => 'รหัสผู้ใช้',
            'password' => 'รหัสผ่าน',
            'rememberMe' => 'จดจำ',
        );
    }
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentityBack($this->username, $this->password);
            if (!$this->_identity->authenticate())
                $this->addError('password', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
        }
    }
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentityBack($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentityBack::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }

}
