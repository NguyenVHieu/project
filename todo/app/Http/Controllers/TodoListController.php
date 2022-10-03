<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = TodoList::all();
        return view('index',compact('todolists'));
    }
    public function fetchAll() {
		$todolists = TodoList::all();
		$output = '';
		if ($todolists->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Image</th>
                <th>Note</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($todolists as $todolist) {
				$output .= '<tr>
                <td>' . $todolist->id . '</td>
                <td>' . $todolist->content . '</td>
                <td><img src="images/' . $todolist->image . '" width="50px" class="img-thumbnail rounded-circle"></td>
                <td>' . $todolist->note . '</td>
                <td>
                  <a href="#" id="' . $todolist->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $todolist->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$data = ['content' => $request->content, 'image' => $request->image, 'note' => $request->note];
		TodoList::create($data);
		return response()->json([
			'status' => 200,
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
		$todolists = TodoList::find($id);
        // $emp -> delete();
        return response()->json($todolists);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fileName = '';
		$todolists = TodoList::find($request->id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($todolists->image) {
				Storage::delete('public/images/' . $todolists->image);
			}
		} else {
			$fileName = $request->image;
		}

		$data = ['content' => $request->content, 'image' => $request->image, 'note' => $request->note];

		$todolists->update($data);
		return response()->json([
			'status' => 200,
		]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
		$todolist = TodoList::find($id);
		// if (Storage::delete('public/images/' . $emp->avatar)) {
			TodoList::destroy($id);
		// }
    }
}
