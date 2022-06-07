<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use WithPagination;
use App\Models\User;

class Index extends Component
{
    public $selectedUsers = [];
    public $selectAll = false;

    public $user;
    public $search;
    public $perPage = 15;
    public $sortColumn = 'created_at';
    public $sortDirection = 'asc';
    public $deleteId = '';

    protected $paginationTheme = 'tailwind';

    protected $queryString = ['search'];

    public function clear()
    {
        $this->search = "";
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
        }
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete(User $user)
    {
        // $this->alert('A post was added with the id of: ' );

        User::find($this->deleteId)->delete();

        $this->user = $user;
    }

    public function confirmedDelete()
    {
        $this->user->delete();
        $this->emit('updateList');
        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    public function cancelledDelete()
    {
        $this->alert(
            'success',
            __('bap.cancelled')
        );
    }

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function updatedSelectAll($value)
    {
        if($value) {
            $this->selectedUsers = User::pluck('id')->toArray();
        } else {
            $this->selectedUsers = [];
        }
    }

    public function updatedSelectedUsers($value)
    {
        if($this->selectAll) {
            $this->selectAll = false;
        }
    }

    public function deleteSelected()
    {
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'deleteSelectedQuery',
            'onCancelled' => 'cancelledDelete'
        ]);
    }

    public function deleteSelectedQuery()
    {
        User::query()
            ->whereIn('id', $this->selectedUsers)
            ->delete();
        $this->selectedUsers = [];
        $this->selectAll = false;

        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    // public function exportSelectedQuery()
    // {
    //     return Excel::download(new UsersExport($this->selectedUsers), 'users-'.date('Y-m-d').'.xlsx');
    // }

    public function render()
    {
        $users = User::filter(['search' => $this->search])->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.users.index', compact('users'));
    }
}
