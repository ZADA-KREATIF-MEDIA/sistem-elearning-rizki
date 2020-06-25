<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id_admin
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property int $level
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'username', 'password', 'level'], 'required'],
            [['level'], 'integer'],
            [['nama', 'username', 'password'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_admin' => 'Id Admin',
            'nama' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
            'level' => 'Level',
        ];
    }
}
