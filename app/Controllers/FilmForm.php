<?php

namespace App\Controllers;

use App\Models\context\Views\film_list;

use App\Models\context\Tables\film;
use App\Models\context\Tables\language;
use App\Models\context\Tables\film_actor;
use App\Models\context\Tables\film_category;
use App\Models\context\Tables\category;
use App\Models\context\Tables\actor;

class FilmForm extends BaseController
{
    public function index()
    {
        $category = new category();
        $language = new language();
        $actor = new actor();
        $data = [
            'category' => $category->findAll(),
            'language' => $language->findAll(),
            'actor' => $actor->findAll()
        ];
        return view('film_form', $data);
    }

    public function preview($id)
    {
        $list = new film_list();
        $category = new category();
        $language = new language();
        $actor = new actor();
        $data = [
            'film_list' => $list->where('FID', $id)->first(),
            'language' => $language->findAll(),
            'category' => $category->findAll(),
            'actor' => $actor->findAll()
        ];
        return view('film_edit', $data);
    }

    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'language_id' => 'required',
            'release_year' => 'required',
            'description' => 'required',
            'rental_rate' => 'required',
            'length' => 'required',
            'rating' => 'required',

            'category_id' => 'required',
            //'actor_id' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $film = new film();
            $film->insert([
                "title" => $this->request->getPost('title'),
                "description" => $this->request->getPost('description'),
                "release_year" => $this->request->getPost('release_year'),
                "language_id" => $this->request->getPost('language_id'),
                "rental_rate" => $this->request->getPost('rental_rate'),
                "length" => $this->request->getPost('length'),
                "rating" => $this->request->getPost('rating')
            ]);
            $film_id = $film->getInsertID();

            $film_category = new film_category();
            $film_category->insert([
                'film_id' => $film_id,
                'category_id' => $this->request->getPost('category_id'),
            ]);

            $film_actor = new film_actor();
            foreach ($this->request->getPost('actor_id') as $actor_id) {
                $film_actor->insert([
                    'actor_id' => $actor_id,
                    'film_id' => $film_id
                ]);
            }

            $list = new film_list();
            $data = [
                'film_list' => $list->paginate(9, 'film_list'),
                'pager' => $list->pager
            ];
            return redirect('Home', $data);
        }

        // tampilkan form create
        $category = new category();
        $language = new language();
        $actor = new actor();
        $data = [
            'language' => $language->findAll(),
            'category' => $category->findAll(),
            'actor' => $actor->findAll()
        ];
        echo view('film_form', $data);
    }


    public function edit($id)
    {
        // ambil artikel yang akan diedit
        $list = new film_list();
        $category = new category();
        $language = new language();
        $actor = new actor();
        $data_edit = [
            'film_list' => $list->where('FID', $id)->first(),
            'language' => $language->findAll(),
            'category' => $category->findAll(),
            'actor' => $actor->findAll()
        ];

        $actor = new actor();
        $data = [
            'film_list' => $list->paginate(9, 'film_list'),
            'category' => $category->findAll(),
            'actor' => $actor->findAll(),
            'pager' => $list->pager
        ];

        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'FID' => 'required',
            'title' => 'required',
            'description' => 'required',
            'release_year' => 'required',
            'language_id' => 'required',
            'rental_rate' => 'required',
            'length' => 'required',
            'rating' => 'required',

            'category_id' => 'required',
            //'actor_id' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $film = new film();
            $film->update($id, [
                "title" => $this->request->getPost('title'),
                "description" => $this->request->getPost('description'),
                "release_year" => $this->request->getPost('release_year'),
                "language_id" => $this->request->getPost('language_id'),
                "rental_rate" => $this->request->getPost('rental_rate'),
                "length" => $this->request->getPost('length'),
                "rating" => $this->request->getPost('rating')
            ]);

            $film_category = new film_category();

            $film_category->insert([
                'film_id' => $id,
                'category_id' => $this->request->getPost('category_id'),
            ]);

            $film_actor = new film_actor();
            $film_actor->delete($id);
            foreach ($this->request->getPost('actor_id') as $actor_id) {

                $film_actor->insert([
                    'actor_id' => $actor_id,
                    'film_id' => $id
                ]);
            }
            return redirect('home', $data);
        }

        return view('film_edit', $data_edit);
    }
}
