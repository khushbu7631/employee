<?php

namespace frontend\models;

use Yii;
use frontend\models\Employee;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property string $date_of_birth
 * @property int $phone
 * @property string $email
 * @property int $state
 * @property int $district
 *
 * @property District $district0
 * @property State $state0
 */
class Employee extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'username',  'date_of_birth', 'phone', 'email', 'state', 'district'], 'required'],
            [['date_of_birth'], 'safe'],
            [['phone', 'state', 'district'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['username', 'email'], 'string', 'max' => 50],
           
            [['password'], 'string', 'max' => 8],
            [['username'], 'unique'],
            [['phone'], 'unique'],
            [['email'], 'unique'],
            [['state'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state' => 'id']],
            [['district'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district' => 'state_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'date_of_birth' => 'Date Of Birth',
            'phone' => 'Phone',
            'email' => 'Email',
            'state' => 'State',
            'district' => 'District',
        ];
    }

    /**
     * Gets query for [[District0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict0()
    {
        return $this->hasOne(District::className(), ['state_id' => 'district']);
    }

    /**
     * Gets query for [[State0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState0()
    {
        return $this->hasOne(State::className(), ['id' => 'state']);
    }


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

	public static function findIdentityByAccessToken($token, $type = null)
    {
       throw new NotSupportedException();
    }

	public function getId()
    {
        return $this->id;
    }

    


   public function getAuthKey()
    {
        return $this->auth_key;
    }

	public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

	public static function findByUsername($username){

		return self::findOne(['username'=>Html::encode($username)]);
	}

	public function validatePassword($password){

		return $this->password === Html::encode($password);
	}
}

