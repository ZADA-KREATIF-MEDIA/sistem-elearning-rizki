<?php

namespace app\models;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property int $nis
 * @property string $nama
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property string $tgl_lahir
 * @property string $username
 * @property string $password
 * @property int $level
 * @property int|null $id_kelas
 *
 * @property Kelas $kelas
 * @property TugasDetail[] $tugasDetails
 */
class Siswa extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%siswa}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nis', 'nama', 'alamat', 'jenis_kelamin', 'tgl_lahir', 'username', 'password', 'level'], 'required'],
            [['nis', 'level', 'id_kelas'], 'integer'],
            [['alamat', 'jenis_kelamin'], 'string'],
            [['tgl_lahir'], 'safe'],
            [['nama', 'username', 'password'], 'string', 'max' => 50],
            [['nis'], 'unique'],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nis' => 'Nis',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tgl_lahir' => 'Tgl Lahir',
            'username' => 'Username',
            'password' => 'Password',
            'level' => 'Level',
            'id_kelas' => 'Id Kelas',
        ];
    }

    /**
     * Gets query for [[Kelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * Gets query for [[TugasDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTugasDetails()
    {
        return $this->hasMany(TugasDetail::className(), ['nis' => 'nis']);
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

    //generator 
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
