<?php

namespace App\Controllers;

use App\Models\context\Views\film_list;
use CodeIgniter\Exceptions\PageNotFoundException;

class FilmList extends BaseController
{
	public function index()
	{
		$list = new film_list();
		$data['film_list'] = $list->findAll();

		echo view('FilmList', $data);
	}

	//------------------------------------------------------------

	public function viewNews($slug)
	{
		$news = new film_list();
		$data['news'] = $news->where([
			'slug' => $slug,
			'status' => 'published'
		])->first();

		// tampilkan 404 error jika data tidak ditemukan
		if (!$data['news']) {
			throw PageNotFoundException::forPageNotFound();
		}

		echo view('news_detail', $data);
	}
}
