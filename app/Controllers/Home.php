<?php

namespace App\Controllers;

use App\Models\context\Views\film_list;
use App\Models\context\Tables\category;
use App\Models\context\Tables\actor;

class Home extends BaseController
{
    public function index()
    {
        $list = new film_list();
        $category = new category();
        $actor = new actor();
        //$data['film_list'] = $list->paginate(9);
        $data = [
            'film_list' => $list->paginate(9, 'film_list'),
            'category' => $category->findAll(),
            'actor' => $actor->findAll(),
            'pager' => $list->pager
        ];
        return view('home', $data);
    }

    public function delete($id)
    {
        $list = new film_list();
        $list->delete($id);
        return redirect('home');
    }
}
