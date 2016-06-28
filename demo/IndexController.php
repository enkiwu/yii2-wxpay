<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * WxnewreplyController implements the CRUD actions for Wxnewreply model.
 */
class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    public $defaultAction = 'callback';


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'callback' => ['post'],
                ],
            ],
        ];
    }

    /** 公众号支付
     * @return string
     * @author wuqi
     */
    public function actionPay()
    {
        return $this->renderPartial('pay');
    }

    /** 扫码模式二支付
     * @return string
     * @author wuqi
     */
    public function actionNative()
    {
        return $this->renderPartial('native');
    }
    
    /**
     *  回调通知地址只需填写  http://localhost/frontend/web/index.php  
     *  配置当前控制器为默认控制器,当前方法为默认方法即可
     * @author wuqi
     */
    public function actionCallback()
    {
        file_put_contents(__DIR__ . "/../web/data.log", $GLOBALS["HTTP_RAW_POST_DATA"]);
    }
    

}