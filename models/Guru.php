<?php

namespace app\models;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property int $nip
 * @property string $nama
 * @property string $alamat
 * @property string $no_tlp
 * @property string $username
 * @property string $password
 * @property int $level
 *
 * @property MataPelajaran[] $mataPelajarans
 */
class Guru extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%guru}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'alamat', 'no_tlp', 'username', 'password', 'level'], 'required'],
            [['nip', 'level'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'username', 'password'], 'string', 'max' => 25],
            [['no_tlp'], 'string', 'max' => 12],
            [['nip'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'Nip',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_tlp' => 'No Tlp',
            'username' => 'Username',
            'password' => 'Password',
            'level' => 'Level',
        ];
    }

    /**
     * Gets query for [[MataPelajarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMataPelajarans()
    {
        return $this->hasMany(MataPelajaran::className(), ['id_guru' => 'nip']);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === ($password);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomKey();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomKey() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
