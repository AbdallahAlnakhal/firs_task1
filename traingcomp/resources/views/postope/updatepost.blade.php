<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>

<div class="container my-5">
    <h1>Edit Post</h1>

    {{-- Global Error Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update_post', ['userId' => $post->user_id, 'postId' => $post->id]) }}" method="post">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control @error('title') is-invalid @enderror" />

            @error('title')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea class="form-control" name="content">{{ $post->content }}</textarea>

            @error('content')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>



        <div class="mb-3">
            <label>User ID</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="{{ $post->user_id }}" selected>{{ $post->user_id }}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }}</option>
                @endforeach
            </select>

            @error('user_id')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>


        <button class="btn btn-success">Update</button>
        <a href="{{ route('showpo', [$post->user_id, $post->id]) }}" class="btn btn-success">Cancel</a>
    </form>
</div>

</body>
</html>
