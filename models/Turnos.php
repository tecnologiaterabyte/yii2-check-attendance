<?php

namespace terabyte\checktime\models;

use Yii;

/**
 * This is the model class for table "turnos".
 *
 * @property string $id
 * @property string $horarios_id
 * @property string $turnos003
 * @property string $turnos004
 * @property string $turnos005
 * @property string $turnos006
 * @property string $turnos007
 * @property string $turnos008
 * @property string $turnos009
 * @property integer $turnos010
 * @property integer $turnos011
 * @property string $turnos012
 * @property string $turnos013
 * @property string $turnos014
 * @property string $turnos015
 *
 * @property Horarios $horarios
 */
class Turnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['horarios_id', 'turnos003'], 'required'],
            [['horarios_id', 'turnos010', 'turnos011'], 'integer'],
            [['turnos008'], 'date', 'format'=>'php:H:i'],
            [['turnos004', 'turnos005', 'turnos006', 'turnos007', 'turnos009', 'turnos012', 'turnos013', 'turnos014', 'turnos015'], 'safe'],
            [['turnos003'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'horarios_id' => 'Horarios ID',
            'turnos003' => 'Nombre Turno',
            'turnos004' => 'Entrada',
            'turnos005' => 'Salir-Comer',
            'turnos006' => 'Entrada-Comer',
            'turnos007' => 'Salida',
            'turnos008' => 'Inicio Turno',
            'turnos009' => 'Fin Turno',
            'turnos010' => 'Dia Inicial',
            'turnos011' => 'Dia Final',
            'turnos012' => 'Turnos012',
            'turnos013' => 'Turnos013',
            'turnos014' => 'Turnos014',
            'turnos015' => 'Turnos015',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasOne(Horarios::className(), ['id' => 'horarios_id']);
    }
}
