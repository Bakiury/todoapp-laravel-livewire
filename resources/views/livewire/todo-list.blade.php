<div class="flex justify-center">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div>
        <input type="text" wire:model="task" wire:keydown.enter="addTodo" placeholder="add todo">
        @forelse ($todos as $todo)
            <div>
                @if ($todo->status == 'open')
                    <input type="checkbox" id="markAsDone-{{ $todo->id }}"
                        wire:change="markAsDone({{ $todo->id }})" />
                @endif

                <label for="markAsDone-{{ $todo->id }}"
                    style="{{ $todo->status == 'done' ? 'text-decoration: line-through' : '' }}">{{ $todo->task }}</label>

                @if ($todo->status == 'done')
                    <button wire:click="remove({{ $todo->id }})">
                        Delete
                    </button>
                @endif
            </div>
        @empty
            <p>No todos here.</p>
        @endforelse
    </div>
</div>
