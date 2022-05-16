<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tasks;
use App\Models\CommentToTask;
use App\Models\Tags;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function list(Request $request)
    {
        $tags = Tags::orderBy('id', 'asc')->get();
        $users = User::orderBy('id', 'asc')->get();

        /**
         * Определяем роль пользователя и выводим таски доступные для него
         */
        if (Auth::user()->hasRole('Admin')) {
            $tasks = Tasks::orderBy('id', 'asc')->get();
        } else if (Auth::user()->hasRole('Manager')) {
            $tasks = Tasks::where('user_create_id', Auth::user()->id)
                            ->orderBy('id', 'asc')
                            ->get();
        } else {
            $tasks = Tasks::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        }

        /**
         * Фильтр данных
         */
        if ($request->val) {

            if ($request->val == 'all') { // Вывести все таски

                if (Auth::user()->hasRole('Admin')) { // Админ

                    $tasks = Tasks::orderBy('id', 'asc')->get();

                } else if (Auth::user()->hasRole('Manager')) { // Менеджер

                    $tasks = Tasks::where('user_create_id', Auth::user()->id)
                                    ->orderBy('id', 'asc')
                                    ->get();

                } else { // Пользователь

                    $tasks = Tasks::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();

                }

            } else if ($request->val == 'filter') { // Таски фильтрации по статусу

                if (Auth::user()->hasRole('Admin')) { // Админ

                    $tasks = Tasks::where($request->filter, '1')
                                    ->orderBy('id', 'asc')
                                    ->get();

                } else if (Auth::user()->hasRole('Manager')) { // Менеджер

                    $tasks = Tasks::where('user_create_id', Auth::user()->id)
                                    ->where($request->filter, '1')
                                    ->orderBy('id', 'asc')
                                    ->get();

                } else { // Пользователь

                    $tasks = Tasks::where('user_id', Auth::user()->id)
                                    ->where($request->filter, '1')
                                    ->orderBy('id', 'asc')
                                    ->get();

                }
            } else if ($request->val == 'tag') { // Фильтрация по тегам

                if (Auth::user()->hasRole('Admin')) { // Админ

                    $tasks = Tasks::where('tag_id', $request->tag)
                                    ->orderBy('id', 'asc')
                                    ->get();

                } else if (Auth::user()->hasRole('Manager')) { // Менеджер

                    $tasks = Tasks::where('user_create_id', Auth::user()->id)
                                    ->where('tag_id', $request->tag)
                                    ->orderBy('id', 'asc')
                                    ->get();

                } else { // Пользователь

                    $tasks = Tasks::where('user_id', Auth::user()->id)
                                    ->where('tag_id', $request->tag)
                                    ->orderBy('id', 'asc')
                                    ->get();

                }
            } else if ($request->val == 'reklama') {
                if (Auth::user()->hasRole('Admin')) { // Админ

                    $tasks = Tasks::where('from_advertisers', $request->from_advertisers)
                                    ->orderBy('id', 'asc')
                                    ->get();

                } else if (Auth::user()->hasRole('Manager')) { // Менеджер

                    $tasks = Tasks::where('user_create_id', Auth::user()->id)
                                    ->where('from_advertisers', $request->from_advertisers)
                                    ->orderBy('id', 'asc')
                                    ->get();

                } else { // Пользователь

                    $tasks = Tasks::where('user_id', Auth::user()->id)
                                    ->where('from_advertisers', $request->from_advertisers)
                                    ->orderBy('id', 'asc')
                                    ->get();

                }
            }

            $data = [];

            // Респонс
            foreach ( $tasks as $task ) {
                $user = User::find($task->user_id);
                $tag = Tags::find($task->tag_id);

                $data[] = [
                    'taskId'        => $task->id,
                    'userId'        => $task->user_id,
                    'userCreateId'  => $task->user_create_id,
                    'title'         => $task->title,
                    'description'   => $task->description,
                    'status'        => $task->status,
                    'favorite'      => $task->favorite,
                    'date_todo'     => $task->date_todo,
                    'userName'      => $user->name,
                    'userAvatar'    => $user->avatar,
                    'tag'           => $tag->tag,
                ];
            }

            return response()->json( $data );
        }

        $pageConfigs = ['isContentSidebar' => true, 'bodyCustomClass' => 'todo-application'];

        return view('todo.index', [
            'pageConfigs' => $pageConfigs,
            'tags' => $tags,
            'tasks' => $tasks,
            'users' => $users,
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $user = User::find($request->userDev);
        $tags = Tags::find($request->tag);
        $tasks = new Tasks();
        $tasks->user_create_id = Auth::user()->id;
        $tasks->title = $request->title;
        $tasks->description = $request->description;
        $tasks->status = $request->status;
        $tasks->date_todo = $request->date_todo;
        $tasks->user_id = $request->userDev ? $request->userDev : Auth::user()->id;
        $tasks->tag_id = $request->tag;
        $tasks->from_advertisers = $request->from_advertisers;

        if ($user) {
            // Сохраняем
            $user->tasks()->save($tasks);

            // Передаем респонс
            return response()->json([
                'code' => 200,
                'message' => 'Задача создана',
                'responseTask' => [
                    'taskId'            => $tasks->id,
                    'userId'            => $tasks->user_id,
                    'userCreateId'      => $tasks->user_create_id,
                    'title'             => $tasks->title,
                    'description'       => $tasks->description,
                    'status'            => $tasks->status,
                    'date_todo'         => $tasks->date_todo,
                    'from_advertisers'  => $tasks->from_advertisers,
                    'userName'          => $user->name,
                    'userAvatar'        => $user->avatar,
                    'tag'               => $tags->tag,
                ]
            ], 200);
        } else {
            // Если ошибка создания
            // return response()->json([
            //     'code'=>403,
            //     'message'=>'Ошибка создания задачи'
            // ], 403);
        }

    }

    public function view(Request $request)
    {
        $id = $request->id;
        $task = Tasks::find($id);
        $us = $task->user_create_id;
        $user = User::find($us);
        $comments = $task->comments()->orderBy('id', 'desc')->get();
        $com = CommentToTask::find($comments);
        $commentUser = User::find($com);

        if ($task) {
            // Передаем респонс
            return response()->json([
                'code' => 200,
                'responseTask' => [
                    'taskId'            => $task->id,
                    'userId'            => $task->user_id,
                    'userCreateId'      => $task->user_create_id,
                    'tagId'             => $task->tag_id,
                    'title'             => $task->title,
                    'description'       => $task->description,
                    'status'            => $task->status,
                    'date_todo'         => $task->date_todo,
                    'created_at'        => $task->created_at,
                    'from_advertisers'  => $task->from_advertisers,
                    'userName'          => $user->name,
                    'userAvatar'        => $user->avatar,
                    'userLogin'         => $user->login,
                    'comments'          => $comments,
                ]
            ], 200);
        } else {
            // Если ошибка создания
            return response()->json([
                'code'=>403,
                'message'=>'Ошибка'
            ], 403);
        }
    }

    public function status(Request $request)
    {

        $tasks = $request->all();

        $data = Tasks::whereId($tasks['id'])->update($request->all());
    }

    public function update(Request $request)
    {

        $user = User::find($request->userDev);
        $tasks = Tasks::find($request->id);
        $tasks->title = $request->title;
        $tasks->description = $request->description;
        $tasks->date_todo = $request->date_todo;
        $tasks->tag_id = $request->tag;
        $tasks->user_id = $request->userDev;

        if ($tasks) {
            // Сохраняем
            $tasks->save();

            // Передаем респонс
            return response()->json([
                'code' => 200,
                'message' => 'Задача обновлена',
                'responseTask' => [
                    'taskId'        => $tasks->id,
                    'userId'        => $tasks->user_id,
                    'userCreateId'  => $tasks->user_create_id,
                    'tagID'         => $tasks->tag_id,
                    'title'         => $tasks->title,
                    'description'   => $tasks->description,
                    'status'        => $tasks->status,
                    'date_todo'     => $tasks->date_todo,
                    'userName'      => $user->name,
                    'userAvatar'    => $user->avatar,
                ]
            ], 200);
        } else {
            // Если ошибка создания
            return response()->json([
                'code'=>403,
                'message'=>'Ошибка обновления задачи'
            ], 403);
        }
    }

    public function favorite(Request $request)
    {
        $tasks = $request->all();

        $data = Tasks::whereId($tasks['id'])->update($request->all());
    }

    public function addComment(Request $request)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $task = Tasks::find($request->id);
        $comment = new CommentToTask;
        $comment->comment = $request->comment;
        $comment->task_id = $request->tasksId;
        $comment->user_id = $userId;
        $comment->user_name = $userName;

        if ($comment) {
            // Сохраняем
            
            CommentToTask::create([
                'comment' => $request->comment,
                'task_id' => $request->tasksId,
                'user_id' => $userId,
                'user_name' => $userName,
            ]);

            // Передаем респонс
            return response()->json([
                'code' => 200,
                'message' => 'Комментарий добавлен',
                'response' => [
                    'comment' => $comment->comment,
                    'userName' => $comment->user_name,
                    'userId' => $comment->user_id,
                    'dateCreate' => $comment->created_at
                ],
            ], 200);
        } else {
            // Если ошибка создания
            return response()->json([
                'code' => 403,
                'message' => 'Ошибка добавления комментария'
            ], 403);
        }
    }

    public function destroy(Request $request)
    {
        $tasks = $request->id;

        Tasks::find($tasks)->delete();
    }
}
