<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id_kelas
 * @property string $nama_kelas
 * @property int $jenjang
 *
 * @property MataPelajaran[] $mataPelajarans
 * @property Siswa[] $siswas
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kelas', 'jenjang'], 'required'],
            [['jenjang'], 'integer'],
            [['nama_kelas'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'nama_kelas' => 'Nama Kelas',
            'jenjang' => 'Jenjang',
        ];
    }

    /**
     * Gets query for [[MataPelajarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMataPelajarans()
    {
        return $this->hasMany(MataPelajaran::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * Gets query for [[Siswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(Siswa::className(), ['id_kelas' => 'id_kelas']);
    }
}
