<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tugas".
 *
 * @property int $id_tugas
 * @property int $id_mapel
 * @property string $nama_tugas
 *
 * @property TugasDetail[] $tugasDetails
 */
class Tugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mapel', 'nama_tugas'], 'required'],
            [['id_mapel'], 'integer'],
            [['nama_tugas'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tugas' => 'Id Tugas',
            'id_mapel' => 'Id Mapel',
            'nama_tugas' => 'Nama Tugas',
        ];
    }

    /**
     * Gets query for [[TugasDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTugasDetails()
    {
        return $this->hasMany(TugasDetail::className(), ['id_tugas' => 'id_tugas']);
    }
}
