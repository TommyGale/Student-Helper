<br>


                                    <div class="user justify-content-between d-flex">
                                        <div class="desc">
                                            <h5><a href="{{ route('profile' , $comment->user)}}">{{ $comment->user->name }}</a> posted: {{ $comment->created_at->diffForHumans()}}</h5>
                                            <p class="fa fa-heart"> {{$comment->like_count }}</p>
                                            <p class="comment">
                                                {{ $comment->description}}
                                            </p>
                                            @can('update', $comment)
                                        <a href="/comments/{{ $comment->id}}/edit" class="">Edit Comment</a>
                                         @endcan
                                        </div>
                                            <br>
                                            @if(auth()->check())
                                            @if($comment->commentIsLiked())
                                        <form method="POST" action ="/comments/{{$comment->id}}/unlike">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class ="blog_btn" type="submit">Unlike</button>
                                        </form>
                                        @else

                                        <form method="POST" action ="/comments/{{$comment->id}}/like">
                           
                                        @csrf
                                        
                                        <button class ="blog_btn" type="submit" {{ $comment->commentIsLiked() ? 'disabled' : '' }} >Like</button>
                                        </form>

                                        @endif
                                        @endif
                                    </div>
     
