<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;
use yii\console\Controller;
use common\rbac\AuthorRule;

class RbacController extends Controller{
    public function actionInit(){
        $auth =Yii::$app->authManager;
        $auth->removeAll();
        Console::output('Removing All Rbac...');

        $createPost=$auth->createPermission('createBlog');
        $createPost->description='Create a application';
        $auth->add($createPost);

        $updatePost=$auth->createPermission('updateBlog');
        $updatePost->description='Update application';
        $auth->add($updatePost);


        $manageUser=$auth->createRole('ManageUser');
        $manageUser->description='สำหรับจัดการข้อมูลผู้ใช้งาน';
        $auth->add($manageUser);

        $author=$auth->createRole('Author');
        $author->description='สำหรับการเขียนบทความ';
        $auth->add($author);

        $management=$auth->createRole('Management');
        $management->description='สำหรับจัดการข้อมูลผู้ใช้งานและบทความ';
        $auth->add($management);

        $admin=$auth->createRole('Admin');
        $admin->description='สำหรับผู้ดูแลระบบ';
        $auth->add($admin);

        //เรียกใช้ AuthorRule
        $rule=new AuthorRule;
        $auth->add($rule);
        // สร้าง permission ขึ้นมาใหม่เพื่อเอาไว้ตรวจสอบและนำ AuthorRule มาใช้งานกับ updateOwnPost
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update Own Post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

        $auth->addChild($author,$createPost);

        // เปลี่ยนลำดับ โดยใช้ updatePost อยู่ภายใต้ updateOwnPost และ updateOwnPost อยู่ภายใต้ author อีกที
        $auth->addChild($updateOwnPost, $updatePost);
        $auth->addChild($author, $updateOwnPost);

        $auth->addChild($management, $manageUser);
        $auth->addChild($management, $author);
        $auth->addChild($admin, $management);

        $auth->assign($admin, 1);
        $auth->assign($management, 2);
        $auth->assign($author, 3);

        Console::output('Success! RBAC roles has been added.');


    }
}
?>
