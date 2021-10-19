<?php

namespace App\Controllers;

use App\Models\ComicModel;
use CodeIgniter\Validation\Rules;

class Comic extends BaseController
{
    protected $comicModel;
    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Comic List',
            'comic' => $this->comicModel->getComic()

        ];

        return view('comic/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Comic Detail',
            'comic' => $this->comicModel->getComic($slug)
        ];

        //if comic not exist
        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($slug . 'not exist');
        }

        return view('comic/detail', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Comic',
            'validation' => \Config\Services::validation()

        ];

        return view('comic/add', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comic.title]',
                'errors' => [
                    'required' => '{field} comic must be filled',
                    'is_unique' => '{field} already exist'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('comic/add')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'penerbit' => $this->request->getVar('penerbit'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'Added');

        return redirect()->to('/comic');
    }

    public function delete($id)
    {
        $this->comicModel->delete($id);
        return redirect()->to('/comic');
    }
}
