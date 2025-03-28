<?php


use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

// class Task{
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description, // optional
//         public bool $completed)
//         {
//         }
// }
        

// $tasks = [
//     new Task(1, 'Uống đủ nước', 'Uống 4 lít 1 ngày', null, false), 
//     new Task(2, 'Dậy lúc 6h30', 'Dậy lúc 6h30', null, true),
//     new Task(3, 'Làm bài tập về nhà', 'Làm bài tập PHP', null, false),
//     new Task(4, 'Học từ vựng tiếng anh', 'Học 100 từ mỗi tuần', null, true),
// ];

// Route::get('/', function () use ($tasks) {
//     return view('index', ['tasks' => $tasks]);
// });

// Route::get('/tasks/{id}', function ($id) use ($tasks) {
//     $task = collect($tasks)->firstWhere('id', $id); // Lấy task đầu có id trùng với id truyền vào
//     if(!$task){
//         return redirect('404');
//     }
//     return view('detail', ['task' => $task]);
// })->name('tasks.detail');

// Route::fallback(function () {
//     return "Khong tim thay trang";
// });

// Route::get('about', function(){
//     return view('index',['name' => 'About']);
// });

// Route::get('/greeting', function () {
//     return 'Hello world';
// })->name('greeting'); // name of route

// Route::get('/greeting/{name}', function ($name) {
//     return 'Hello ' . $name;
// });

// Route::get('/hiU', function () {
//     return redirect('/greeting');
// });

// Route::get('/hi2', function () {
//     return redirect()->route('greeting'); // redirect to route has name 'greeting'
// });

// Route::get('/Home', function () {
//     return redirect('/');
// });

Route::get('/', function () {
    $task = Task::latest('id')->get();
    return view('index',['tasks'=>$task]);
})->name('tasks.index');



Route::get('/tasks/create', function () {
    return view('create');
})->name('tasks.create'); 

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('detail',['task'=>$task]);
})->name('tasks.detail');    

Route::post('tasks',function(Request $request){
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|min:3|max:255',
        'long_description' => 'required|min:3|max:255'
    ]);
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->completed = false; // set default value = false
    $task->save();
    return redirect()->route('tasks.index')->with('success','Task created successfully');
})->name('tasks.create');