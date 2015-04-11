<?php

namespace terabyte\checktime\models;

use yii;

/**
 * This is the model class for table "horarios".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $tipo
 *
 */
class Horarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo'], 'required'],
            [['nombre'], 'string', 'max' => 60],
            [['tipo'], 'in', 'range' => ['NORMAL','ROTATIVO', 'CALENDARIO']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('check', 'ID'),
            'nombre' => Yii::t('check', 'Nombre'),
            'tipo' => Yii::t('check', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turnos::className(), ['horarios_id' => 'id']);
    }
}
