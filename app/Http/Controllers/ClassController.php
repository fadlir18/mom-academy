<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Validator;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use DB;

class ClassController extends Controller
{
    public function index(ClassModel $model, Request $request)
    {
        $academyType = $request->input('category');

        // dd($moduleType);

        //paging
        $limit = 9;
        $page = $request->input('page') ?: 1;
        $offset = $limit * ($page - 1);
        $custompath = '/class';
        $param['offset'] = $offset;
        $param['limit'] = $limit;

        if ($academyType == 'module-video') {
            $data['type'] = 'module-video';
            $data['title'] = 'Module Video';
            $result = $model->db_lists_module_video($param);
            $custompath = '/class?category=module-video';
        } elseif ($academyType == 'module-ebook') {
            $data['type'] = 'module-ebook';
            $data['title'] = 'Module Ebook';
            $result = $model->db_lists_module($param);
            $custompath = '/class?category=module-ebook';
        } elseif ($academyType == 'class') {
            $data['type'] = 'class';
            $data['title'] = 'Class';
            $result = $model->db_lists_class($param);
            $custompath = '/class?category=class';
        } elseif ($academyType == 'module') {
            $data['type'] = 'module-ebook';
            $data['title'] = 'Module';
            $result = $model->db_lists_module($param);
            $custompath = '/class?category=module-ebook';
        } else {
            $data['title'] = 'Class';
            $result = $model->db_lists_class($param);
        }

        // dd($result);

        $data['cekOrderEbook'] = DB::table('module_ebook')->select('module_ebook.*', 'orders.status', 'orders.product_id')->leftJoin('orders', function ($join) {
            $join->on('module_ebook.ebook_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Module Ebook")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->orderBy('module_ebook.created_at')->get();

        $data['cekOrderVideo'] = DB::table('module_video')->select('module_video.*', 'orders.status', 'orders.product_id')->leftJoin('orders', function ($join) {
            $join->on('module_video.video_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Module Video")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->orderBy('module_video.created_at')->get();

        $data['cekOrderClass'] = DB::table('course')->select('course.*', 'orders.status', 'orders.product_id', 'expert.expert_name')->leftJoin('orders', function ($join) {
            $join->on('course.course_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Course")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->leftJoin('expert', function ($join) {
            $join->on('course.speaker', '=', 'expert.expert_id');
        })->orderBy('course.created_at')->orderBy('course.created_at')->get();

        // dd($data['cekOrderClass']);

        $path = url('/') . $custompath;
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($result['data'], $result['count'], $limit, $page);
        $paginator = $paginator->withPath($path);
        // dd($paginator);
        $moms   = $model->db_expert_lists(['limit' => 6]);
        // dd($moms);
        $data['moms'] = $moms;
        // $data['module'] = $module;
        $data['results'] = $result['data'];
        $data['paginator'] = $paginator;
        $data['titlepage'] = 'Class';
        return view('class.index', $data);
    }

    public function indexScolarship(ClassModel $model, Request $request)
    {
        $academyType = $request->input('category');

        //paging
        $limit = 9;
        $page = $request->input('page') ?: 1;
        $offset = $limit * ($page - 1);
        $custompath = '/class';
        $param['offset'] = $offset;
        $param['limit'] = $limit;

        if ($academyType) {
            if ($academyType == 'class') {
                $data['title'] = 'Class';
                $result = $model->db_lists_class($param);
                $custompath = '/class?category=class';
            } else {
                $data['title'] = 'Module';
                $result = $model->db_lists_module($param);
                $custompath = '/class?category=module';
            }
        } else {
            $data['title'] = 'Class';
            $result = $model->db_lists_class($param);
        }

        // dd($result);
        $path = url('/') . $custompath;
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($result['data'], $result['count'], $limit, $page);
        $paginator = $paginator->withPath($path);
        // dd($paginator);
        $moms   = $model->db_expert_lists(['limit' => 6]);
        // dd($moms);
        $data['moms'] = $moms;
        // $data['module'] = $module;
        $data['results'] = $result['data'];
        $data['paginator'] = $paginator;
        $data['titlepage'] = 'Class';
        return view('class.scolarship', $data);
    }

    public function indexExpert(ClassModel $model, Request $request)
    {
        $academyType = $request->input('category');

        //paging
        $limit = 9;
        $page = $request->input('page') ?: 1;
        $offset = $limit * ($page - 1);
        $custompath = '/class';
        $param['offset'] = $offset;
        $param['limit'] = $limit;

        if ($academyType) {
            if ($academyType == 'class') {
                $data['title'] = 'Class';
                $result = $model->db_lists_class($param);
                $custompath = '/class?category=class';
            } else {
                $data['title'] = 'Module';
                $result = $model->db_lists_module($param);
                $custompath = '/class?category=module';
            }
        } else {
            $data['title'] = 'Class';
            $result = $model->db_lists_class($param);
        }

        // dd($result);
        $path = url('/') . $custompath;
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($result['data'], $result['count'], $limit, $page);
        $paginator = $paginator->withPath($path);
        // dd($paginator);
        $moms   = $model->db_expert_lists(['limit' => 6]);
        // dd($moms);
        $data['moms'] = $moms;
        // $data['module'] = $module;
        $data['results'] = $result['data'];
        $data['paginator'] = $paginator;
        $data['titlepage'] = 'Class';
        return view('class.expert', $data);
    }

    public function detail(ClassModel $model, Request $request, $id)
    {
        $data_session = AppHelper::getAuth();
        if (!$data_session || $data_session == '') {
            return redirect('/home');
        }

        $class = $model->db_detail($id);

        $data['results'] = $class;
        $data['titlepage'] = 'Class Detail';
        return view('class.detail', $data);
    }

    public function detailvideo(ClassModel $model, Request $request, $id)
    {
        $video = $request->input('video');

        $data_session = AppHelper::getAuth();
        if (!$data_session || $data_session == '') {
            return redirect('/home');
        }

        if ($video == null) {
            return redirect('class/detail-video/' . $id . '?video=1');
        }


        // $data['results'] = $class;
        $data['resultsDetail'] = $model->db_detail_video($id);
        $data['results'] = $model->db_detail_video_player($id);
        $data['resultsPlay'] = $model->db_detail_video_play($video);
        // dd($data['resultsPlay']);
        $data['titlepage'] = 'Class Detail';
        return view('class.detail-video', $data);
    }
}
