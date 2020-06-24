<?php

namespace app\models;

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
class Guru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru';
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
}
