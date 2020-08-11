<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tugas_detail".
 *
 * @property int $id
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
            [['nis', 'id_tugas', 'tanggal_upload', 'nilai'], 'required'],
            [['nis', 'id_tugas'], 'integer'],
            [['tanggal_upload'], 'safe'],
            [['nilai'], 'number'],
            [['nama_file'],'file','skipOnEmpty'=>TRUE,'extensions'=>'pdf'],
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
            'id' => 'ID',
            'nis' => 'NAMA SISWA',
            'id_tugas' => 'NAMA TUGAS',
            'tanggal_upload' => 'TANGGAL UPLOAD',
            'nama_file' => 'FILE TUGAS',
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
