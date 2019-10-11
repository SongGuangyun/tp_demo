<?php

namespace app\controller;

use think\Request;
use app\models\User;
use think\facade\Db;
use app\BaseController;
use think\facade\Queue;
use app\job\UserCreateJob;
use app\validate\UserValidate;
use think\exception\ValidateException;

class UserController extends BaseController
{
    public function index()
    {
        // 查询
        // $res = Db::name('user')->find(1);
        // dd($res);
        $res = User::select();
        // $res = User::paginate(10);

        // 接口返回
        return $this->data($res);
        // 模板渲染返回数据
        // return view('user', ['list' => $res]);

    }

    public function save(Request $request)
    {
        // 新增
        // eg1:
        // $userModel = new User();
        // $userModel->nickname = 'save方式';
        // $createResult = $userModel->save();
        // eg2:
        try {
            $data  = $request->param();
            validate(UserValidate::class)->check($data);
            User::create($data);
            return $this->success('success');
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return $this->failed($e->getError());
        }
        
    }

    public function create()
    {
        // 创建页面
    }


    public function edit(int $id)
    {
        // 编辑页面
    }

    public function update(int $id)
    {
        // 编辑操作
    }

    public function read(int $id)
    {
        // 数据详情
    }

    public function delete(int $id)
    {
        // 软删除
        $res = User::destroy($id); //没有使用软删除这个就是真实删除
        dd($res);
        // 真实删除
        // User::destroy(1,true);
    }


    /**
     * 使用队列批量创建用户
     * php think queue:work --queue=create_user_queue
     * @return void
     */
    public function createUserToQueue()
    {
        $queue_name = 'create_user_queue';
        $t1 = microtime(true);
        $i = 0;
        for ($i = 0; $i < 100; $i++) {
            Queue::push(UserCreateJob::class, [
                'nickname'=>'test_'.$i,
                'sex'=>2
            ], $queue_name);
        }
        // 延迟队列
        // Queue::later($delay, $job, $data = '', $queue = null)
        $t2 = microtime(true);
        echo '耗时' . round($t2 - $t1, 3) . '秒';
    }

}
