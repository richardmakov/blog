<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;

use Livewire\WithPagination;

class AllpostsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $posts = Post::where('name', 'LIKE','%' . $this->search . '%')
                            ->oldest('id')
                            ->paginate();

        return view('livewire.admin.allposts-index', compact('posts'));
    }
}
