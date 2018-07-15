@extends('layouts.master')
@section('content')
<!-- CONTENT -->
        <div class="content col-xs-8">
        
        
            <!-- ARTICLE 1 -->
            <article>
                <div class="post-image">
                    <img src="{{ asset($post->thumbnail) }}" alt="post image 1">
                    
                </div>                
                <div class="post-text text-content">
                    <h2>{{$post->title}}</h2>
                    <p>{{$post->content}}</p>
                    <center>
                        <h4>Post by: {{$post->user->name}}</h4>
                        <p>{{$post->created_at->format('Y-M-d')}}</p>
                    </center> 
                    <h3>Tag: </h3>
                    <ul class="list-inline">
                       @foreach($post->tags as $post_tag) 
                            <li><a href="#">{{$post_tag->name}}</a></li>
                       @endforeach
                    </ul>

                </div>
            
            </article>
        
        </div>


        <!-- SIDEBAR -->        
        <div class="sidebar col-xs-4">
            
            
            <!-- ABOUT ME -->                  
            <div class="widget about-me">
                <div class="ab-image">
                    <img src="{{asset('blog_assets/img/about-me.jpg')}}" alt="about me">
                    <div class="ab-title">About Me</div>
                </div>
                <div class="ad-text">
                    <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    <span class="signing"><img src="{{asset('blog_assets/img/signing.png')}}" alt="signing"></span>
                </div>
            </div>


            <!-- LATEST POSTS -->                              
            <div class="widget latest-posts">
                <h3 class="widget-title">
                    The article attached
                </h3>
                <div class="posts-container">
                    <div class="item">
                        @foreach($posts_related as $post_related)
                            <img src="{{ $post_related->thumbnail }}" alt="post 1" class="post-image">
                            <span class="date">{{$post_related->created_at->format('Y-M-d')}}</span> 
                            <h3><a href=" {{ asset("") }}posts/{{$post_related->slug}}">{{$post_related->title}}</a></h3>
                            <br>
                            
                        @endforeach
                        <div class="clearfix"></div>   
                    </div>

                    
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget advertising">
                <div class="advertising-container">
                    <img src="{{asset('blog_assets/img/350x300.png')}}" alt="banner 350x300">
                </div>
            </div>


            <!-- NEWSLETTER -->                              
            


            <!-- FOLLOW US -->                              
            <div class="widget follow-us">
                <h3 class="widget-title">
                    Follow Us
                </h3>
                <div class="follow-container">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>                
                </div>
                <div class="clearfix"></div>
            </div>                                       
            <!-- NEWSLETTER -->                              
            <div class="widget newsletter">
                <h3 class="widget-title">
                    Newsletter
                </h3>
                <div class="newsletter-container">
                    <h4>DO NOT MISS OUR NEWS</h4>
                    <p>Sign up and receive the <br> latest news of our company</p> 
                    <form>
                       <input type="email" class="newsletter-email" placeholder="Your email address...">
                       <button type="submit" class="newsletter-btn">Send</button>
                    </form>                                  
                </div>
                <div class="clearfix"></div>
            </div>  
            
            
        </div> <!-- #SIDEBAR -->
        <div class="content">
        @foreach($posts_related as $post_related)
        <div class="content col-xs-4">
            <article>
                <div class="post-image">
                    <img src="{{ $post_related->thumbnail }}" alt="post image 1">
                    <div class="category"><a href="#">{{$post->category->name}}</a></div>
                </div>
                <div class="post-text">
                    <span class="date">{{$post_related->created_at->format('Y-M-d')}}</span>
                    <h3><a href="{{ asset("") }}posts/{{$post_related->slug}}">{{$post_related->title}}</a></h3>                                
                </div>
                <div class="post-info">
                    <div class="post-by">Post By <a href="#"> {{$post_related->user->name}}</a></div>
                </div>
            </article>
        
        </div>
        @endforeach
        </div>
        <div class="clearfix"></div>
@endsection