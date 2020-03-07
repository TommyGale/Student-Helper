<br>
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="box">
                                        <div class="desc">
                                            <h5><a href="#">{{ $comment->user->name }}</a> posted: {{ $comment->created_at->diffForHumans()}}</h5>
                                            <p class="lnr lnr-thumbs-up"> {{$comment->likes->count()}}</p>
                                            <p class="comment">
                                                {{ $comment->description}}
                                            </p>
                                            @can('update', $comment)
                                        <a href="/posts/{{ $post->id}}/comments/{{ $comment->id}}/edit" class="text-uppercase">Edit Comment</a>
                                         @endcan
                                        </div>
                                            <br>
                                            @if(auth()->check())
                                            @if($comment->commentIsLiked())
                                        <form method="POST" action ="/comments/{{$comment->id}}/unlike">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class ="button is-link lnr lnr-thumbs-down" type="submit">Unlike</button>
                                        </form>
                                        @else

                                        <form method="POST" action ="/comments/{{$comment->id}}/like">
                           
                                        @csrf
                                        
                                        <button class ="button is-link lnr lnr-thumbs-up" type="submit" {{ $comment->commentIsLiked() ? 'disabled' : '' }} >Like</button>
                                        </form>

                                        @endif
                                        @endif
                                    </div>
     
                                </div>
                                <br>
                            </div>