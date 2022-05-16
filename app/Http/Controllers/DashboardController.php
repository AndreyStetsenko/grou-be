<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //ecommerce
    public function dashboard(Request $request)
    {
        $users = User::orderBy('created_at', 'asc')->get();
        $authUser = Auth::user();
        $tasks = Tasks::where('user_id', $authUser->id)
                                ->orderBy('created_at', 'asc')
                                ->get();
        $tags = Tags::orderBy('id', 'asc')->get();

        return view('dashboard.index', [
            'users' => $users,
            'authUser' => $authUser,
            'tasks' => $tasks,
            'tags' => $tags,
        ]);
    }

    public function dashboardList(Request $request)
    {
        $tags = Tags::orderBy('id', 'asc')->get();
        $users = User::orderBy('id', 'asc')->get();
        $authUser = Auth::user();

        /**
         * Фильтр данных
         */
        if ($request->userId) {

            if ($request->userId == 'all') {
                $tasks = Tasks::orderBy('id', 'asc')
                                ->get();

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
                        'userLogin'     => $user->login,
                        'userAvatar'    => $user->avatar,
                        'tag'           => $tag->tag,
                    ];
                }

                return response()->json( $data );
            } else {
                $tasks = Tasks::where('user_id', $request->userId)
                                ->orderBy('id', 'asc')
                                ->get();

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
                        'userLogin'     => $user->login,
                        'userAvatar'    => $user->avatar,
                        'tag'           => $tag->tag,
                    ];
                }

                return response()->json( $data );
            }
        }

        $pageConfigs = ['isContentSidebar' => true, 'bodyCustomClass' => 'todo-application'];

        return view('dashboard.index', [
            'pageConfigs' => $pageConfigs,
            'authUser' => $authUser,
            'tags' => $tags,
            'tasks' => $tasks,
            'users' => $users
        ]);
    }

    // analystic
    public function dashboardAnalytics(){
        return view('dashboard.analytics');
    }
}
