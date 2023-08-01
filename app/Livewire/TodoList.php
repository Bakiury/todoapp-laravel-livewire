<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoList extends Component
{
    public $todos;
    public $task = '';

    function fetchTodos() {
        $this->todos = Todo::all()->reverse();
    }

    function addTodo() {
        if ($this->task != '') {
            $todo = new Todo();
            $todo->task = $this->task;
            $todo->save();

            $this->$task = '';
        }
    }

    function mount() {
        $this->fetchTodos();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
