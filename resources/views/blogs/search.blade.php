@foreach($blogPosts as $key => $blogPost)
<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $blogPost->content }}</td>
    <td>{{ $blogPost->publication_date }}</td>
    <td>
        <a href="{{ route('blogs.edit', $blogPost->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('blogs.destroy', $blogPost->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
