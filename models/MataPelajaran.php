<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mata_pelajaran".
 *
 * @property int $id_mapel
 * @property int $id_kelas
 * @property string $nama_mapel
 * @property int $id_guru
 *
 * @property Guru $guru
 * @property Kelas $kelas
 */
class MataPelajaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mata_pelajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelas', 'nama_mapel', 'id_guru'], 'required'],
            [['id_kelas', 'id_guru'], 'integer'],
            [['nama_mapel'], 'string', 'max' => 50],
            [['id_guru'], 'exist', 'skipOnError' => true, 'targetClass' => Guru::className(), 'targetAttribute' => ['id_guru' => 'nip']],
            [['id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['id_kelas' => 'id_kelas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mapel' => 'Id Mapel',
            'id_kelas' => 'Id Kelas',
            'nama_mapel' => 'Nama Mapel',
            'id_guru' => 'Id Guru',
        ];
    }

    /**
     * Gets query for [[Guru]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuru()
    {
        return $this->hasOne(Guru::className(), ['nip' => 'id_guru']);
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
}
