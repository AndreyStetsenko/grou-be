<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Questionary;
use DB;

class QuestionaryController extends Controller
{
    public function questionaryPage()
    {
        $pageConfigs = ['bodyCustomClass'=> 'bg-full-screen-image'];
        return view('auth.questionary',['pageConfigs' => $pageConfigs]);
    }

    public function questionaryStore(Request $request)
    {
        $user = Auth::user()->id;

        if (( Questionary::where('user_id', '=', $user )->exists() )) {
            $mch = '';
            $main_chanels = $request->main_chanels;
            
            $quest_id = Questionary::where('user_id', $user)->pluck('id');
            $quest = Questionary::find($quest_id[0]);
            $quest->user_id = $user;
            $quest->person_aim = $request->person_aim;
            $quest->main_chanels = implode($main_chanels, ', ');
            $quest->save();
            
            return response()->json([
                'code' => 200,
                'message' => 'Данные обновлены',
                'dataQuest' => [
                    'id' => $quest->id,
                    'user_id' => $quest->user_id,
                    'person_aim' => $quest->person_aim
                ]
            ], 200);
        } else {
            $quest = new Questionary();
            $quest->user_id = $user;
            $quest->person_aim = $request->person_aim;
            $quest->main_chanels = implode($main_chanels, ', ');
            $quest->save();

            return response()->json([
                'code' => 200,
                'message' => 'Данные созданы',
                'dataQuest' => [
                    'id' => $quest->id,
                    'user_id' => $quest->user_id,
                    'person_aim' => $quest->person_aim
                ]
            ], 200);
        }
    }
}
