<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tugas_detail".
 *
 * @property int $nis
 * @property int $id_tugas
 * @property string $tanggal_upload
 * @property string $nama_file
 * @property float $nilai
 *
 * @property Siswa $nis0
 * @property Tugas $tugas
 */
class TugasDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tugas_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nis', 'id_tugas', 'tanggal_upload', 'nama_file', 'nilai'], 'required'],
            [['nis', 'id_tugas'], 'integer'],
            [['tanggal_upload'], 'safe'],
            [['nilai'], 'number'],
            [['nama_file'], 'string', 'max' => 25],
            [['nis'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['nis' => 'nis']],
            [['id_tugas'], 'exist', 'skipOnError' => true, 'targetClass' => Tugas::className(), 'targetAttribute' => ['id_tugas' => 'id_tugas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nis' => 'Nis',
            'id_tugas' => 'Id Tugas',
            'tanggal_upload' => 'Tanggal Upload',
            'nama_file' => 'Nama File',
            'nilai' => 'Nilai',
        ];
    }

    /**
     * Gets query for [[Nis0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNis0()
    {
        return $this->hasOne(Siswa::className(), ['nis' => 'nis']);
    }

    /**
     * Gets query for [[Tugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTugas()
    {
        return $this->hasOne(Tugas::className(), ['id_tugas' => 'id_tugas']);
    }
}
