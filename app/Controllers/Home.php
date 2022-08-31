<?php

namespace App\Controllers;

use App\Models\context\Views\film_list;

use App\Models\context\Tables\film;
use App\Models\context\Tables\film_actor;
use App\Models\context\Tables\film_category;

class Home extends BaseController
{
    public function index()
    {
        $list = new film_list();
        $data = [
            'film_list' => $list->paginate(9, 'film_list'),
            'pager' => $list->pager
        ];
        return view('home', $data);
    }

    public function delete($id)
    {
        $film = new film();
        $film_category = new film_category();
        $film_actor = new film_actor();
        $film->where('film_id', $id)->delete();
        $film_category->where('film_id', $id)->delete();
        $film_actor->where('film_id', $id)->delete();
        return redirect('home');
    }
}
