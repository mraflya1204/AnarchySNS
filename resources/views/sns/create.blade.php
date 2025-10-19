<x-layout>
@section('title', 'Create Ninja')
  <form action="{{ route('sns.store') }}" method="POST">
    @csrf

    <h2>Create a New Post</h2>
    <!-- Post -->
    <label for="post">Post:</label>
    <textarea
      rows="3"
      id="post" 
      name="post" 
      required
    >
    {{ old('post') }}
    </textarea>

    <!-- Username -->
    <label for="post">Username:</label>
    <textarea
      rows="2"
      id="username" 
      name="username" 
      required
    >
    {{ old('username') }}
    </textarea>

    <button type="submit" class="btn mt-4">Post</button>

    <!-- validation errors -->
    @if ($errors->any())
        <div class="error-messages">
            <ul class="px-4 py-3 mb-4 bg-red-100 border border-red-400 text-red-700 rounded">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
    
</form>
</x-layout>