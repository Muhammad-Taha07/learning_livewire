<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;
    public $username = "UserName"; // Public property which is defined in the same class will also be accessible in blade without sending it through array.
    public $name, $email, $password; // defining properties as public ||

    // Just another customizable livewire validation way...
    // #[Rule('required')]
    // public $name;
    
    // #[Rule('required|email|unique:users', message: [
    //     'required' => 'The email field is required.',
    //     'email' => 'Please provide a valid email address.',
    //     'unique' => 'This email is already registered.',
    // ])]
    // public $email;
    
    // #[Rule('password|max:10|min:3')]
    // public $password;

    // Function to create data with validation from front end.
    public function createNewRecord() {
        // Validation with Custom Attributes & Messages
        $validated = $this->validate([
            'name'      =>  'required',
            'email'     =>  'required|email',
            'password'  =>  'required',
        ],
        [
            '*.required' =>  ':attribute is required',
        ],
        [
            'name'  =>  'Name',
            'email' =>  'Email Address',
        ]);

        // $data = [
        //     'name'      =>  $this->name,
        //     'email'     =>  $this->email,
        //     'password'  =>  $this->password,
        // ];
        // User::create($data);
// dd($validated['password']);
        $user_creation = User::create([
            'name'  =>  $this->name,
            'email' =>  $this->email,
            'password'  =>  $this->password,
        ]);
        
        // Resets the field after submitting...
        // $this->reset(['name', 'email', 'password']);
        $this->reset();

        request()->session()->flash('success', 'User Created Successfully');
    }

    public function render()
    {
        $title = "Livewire Script Testing Enviornment";
        // $users = User::all();
        $users = User::paginate(2);

        return view('livewire.clicker', [
            'title' => $title,
            'users' => $users,
        ]);
    }
}
