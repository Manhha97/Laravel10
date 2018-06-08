@extends('layouts.master')
@section('content')

 <!-- COMMENTS -->      
                  <div class="comments">
                            <h3>3 Comments</h3>
                            <div class="comments-list">
                                <div class="main-comment">
                                    <div class="comment-image-author">
                                        <img src="{{asset('blog_assets/img/img-author.jpg')}}">
                                    </div>
                                    <div class="comment-info">
                                        <div class="comment-name-date"><span class="comment-name">LUCAS NEWAR</span><span class="comment-date">June 2, 2016</span><div class="clearfix"></div></div>
                                        <span class="comment-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur. Donec in dui vitae tellus sodales dapibus non quis libero. Quisque nec tortor ac ligula sagittis rutrum in a felis. <i class="icon-arrow-right2"></i></span>                                
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="reply-comment">
                                    <span class="reply-line"></span>
                                    <div class="comment-image-author">
                                        <img src="{{asset('blog_assets/img/img-author.jpg')}}">
                                    </div>
                                    <div class="comment-info">
                                        <div class="comment-name-date"><span class="comment-name">LUCAS NEWAR</span><span class="comment-date">June 2, 2016</span><div class="clearfix"></div></div>
                                        <span class="comment-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur. Donec in dui vitae tellus sodales dapibus non quis libero. Quisque nec tortor ac ligula. <i class="icon-arrow-right2"></i></span>                                
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
    
                            <div class="comments-list">
                                <div class="main-comment">
                                    <div class="comment-image-author">
                                        <img src="{{asset('blog_assets/img/img-author.jpg')}}">
                                    </div>
                                    <div class="comment-info">
                                        <div class="comment-name-date"><span class="comment-name">LUCAS NEWAR</span><span class="comment-date">June 2, 2016</span><div class="clearfix"></div></div>
                                        <span class="comment-description">Morbi gravida, sem non egestas ullamcorper, tellus ante laoreet nisl, id iaculis urna eros vel turpis curabitur. Donec in dui vitae tellus sodales dapibus non quis libero. Quisque nec tortor ac ligula sagittis rutrum in a felis. <i class="icon-arrow-right2"></i></span>                                
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        
                </div>                                  
                
                
                <!-- COMMENT FORM -->
                <div class="comment-form">
                    <h3>Leavy a Reply</h3>
                    <span class="field-name">Your Name (required)</span>
                    <input type="text" class="name">
                    <span class="field-name">Your Name (required)</span>
                    <input type="text" class="email">
                    <span class="field-name">Your Message</span>
                    <textarea class="message"></textarea>
                    
                    <button type="submit">Send Comment</button>
                
                </div>
@endsection