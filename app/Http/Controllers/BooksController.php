<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditBookRequest;
use Core\Services\BookServiceContract;
use App\Http\Requests\CreateBookRequest;

class BooksController extends Controller
{
    protected $service;

    public function __construct(BookServiceContract $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $items = $this->service->paginate();
        return view('books.index', compact("items"));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(CreateBookRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $item = $this->service->find($id);
        return view('books.show', compact('item'));
    }

    public function edit($id)
    {
        $item = $this->service->find($id);
        return view('books.edit', compact('item'));
    }

    public function update(EditBookRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('books.index');
    }
}
