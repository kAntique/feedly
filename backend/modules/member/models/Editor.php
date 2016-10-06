<?php

namespace backend\modules\member\models;

use Yii;
use common\models\User;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * This is the model class for table "editor".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $lastname
 * @property string $avatar
 * @property string $date_register
 * @property string $website
 *
 * @property User $user
 */
class Editor extends \yii\db\ActiveRecord
{
    //public $avatar_img;
    public $image;
    public $crop_info;
    //public $reCaptcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'editor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'lastname', 'avatar'], 'required'],
            [['name','lastname'], 'match', 'pattern' => '/^[ก-ฮ,a-z]\w*$/i'],
            [['user_id'], 'integer'],
            [['date_register'], 'safe'],
            [['website'], 'string'],
            [['name', 'lastname', 'avatar'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [ 'image',
              'image',
              'extensions' => ['jpg','png','gif'],
              'mimeTypes' => ['image/jpg','image/png', 'image/gif'],
            ],
            ['crop_info', 'safe'],
            //[['avatar_img'], 'file', 'skipOnEmpty' => true, 'on' => 'create', 'extensions' => 'jpg,png,gif'], //'maxSize' => 1024*1024
            //['website', 'url', 'defaultScheme' => 'http'], // checks if "website" is a valid URL. Prepend "http://" to the "website" attribute
            //[['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Le55CgTAAAAAMRv7obGVW6Ju4x3JEgnQTwBylm3'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสผู้รวบรวม',
            'user_id' => 'User ID',
            'name' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'avatar' => 'รูปโปรไฟล์',
            'date_register' => 'วันที่สมัคร',
            'website' => 'เว็บไซต์',
            'image' => 'รูปโปรไฟล์',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $model = new Editor();


        $file = \yii\web\UploadedFile::getInstance($model, 'image');
        $img = $file;
        if ($file != '') {
            $name_img = $file->name;
            $oldImages = $file->name;
            // open image
            $image = Image::getImagine()->open(Yii::getAlias('@webroot/uploads/avatar/'.$name_img));
            // rendering information about crop of ONE option
            $cropInfo = Json::decode($this->crop_info)[0];
            $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
            $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
            $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
            $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y
            // extension
            //$ext = $img->getExtension();
            //saving thumbnail
            $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
            $cropSizeThumb = new Box(200, 200); //frame size of crop
            $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
            $pathThumbImage = Yii::getAlias('@webroot/uploads/avatar')
                . '/thumb_'
                . $this->id
                . '.'
                . 'jpg';
                //$ext;
                //.$this->image->getExtension();

            $image->resize($newSizeThumb)
                ->crop($cropPointThumb, $cropSizeThumb)
                ->save($pathThumbImage, ['quality' => 100]);


            if ($oldImages != 0) {
              if ($oldImages == $name_img) {
                 unlink('uploads/avatar/'.$oldImages);
              }
            }

      }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
