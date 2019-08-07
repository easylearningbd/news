@extends('front.layout.master')
@section('content')

<section id="feature_news_section" class="feature_news_section">
     <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
 <img class="img-responsive top_static_article_img" src="{{ asset('public/post') }}/{{ $hot_news->main_image }}"  alt="{{ $hot_news->title }}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Hot News</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{ url('/details') }}/{{ $hot_news->slug }}" target="_self">{{ $hot_news->title }} </a></h1>
                        </div>
                         <!-- feature_article_title -->

 <div class="feature_article_date">
    <a href="{{ url('/author') }}/{{ $hot_news->creator->id }}" >{{ $hot_news->creator->name }}</a>,
      {{ date('F j,Y',strtotime( $hot_news->created_at )) }}           </a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                           {{ $hot_news->short_description }}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                             
                            <span><i class="fa fa-comments-o"></i><a href="#">{{ $hot_news->comments_count }}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->
             @foreach($top_viewed as $item)
            <div class="col-md-5" style="margin-bottom: 3%">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" width="450" style="height: 270px" src="{{ asset('public/post') }}/{{ $item->main_image }}" alt="{{ $item->title }}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Top Viewed</a></div>
                        <div class="feature_article_title">
 <h1><a href="{{ url('/details') }}/{{ $item->slug }}">{{ str_limit( $item->title,25,'..' )  }} </a></h1>
                        </div>
                        <!-- feature_article_title -->

  <div class="feature_article_date"><a href="{{ url('/author') }}/{{ $item->creator->id }}"  >{{ $item->creator->name }}</a>, {{ date('F j,Y',strtotime( $item->created_at )) }}   </div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{ str_limit( $item->short_description,50,'...' )  }}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            
                            <span><i class="fa fa-comments-o"></i><a href="#">{{ $item->comments_count }}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->
         @endforeach
            
            <!-- col-md-5 -->

        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->

<section id="category_section" class="category_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="category_section mobile">
    @foreach($shareData['categories'] as $category)
      @foreach($category->posts as $key=>$item)
        @if($key === 0)
    <div class="article_title header_purple">
        <h2><a href="{{ url('/category') }}/{{ $category->id }}">{{ $category->name }}</a></h2>
    </div>
    <!----article_title------>
    
    <div class="category_article_wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="top_article_img">
                    <a href="{{ url('/details') }}/{{ $item->slug }}"><img class="img-responsive"
          src="{{ asset('public/post') }}/{{ $item->list_image }}" alt="{{ $item->title }}">
                    </a>
                </div>
                <!----top_article_img------>
            </div>
            <div class="col-md-6">
                <span class="tag purple">{{ $category->name }}</span>

                <div class="category_article_title">
                    <h2><a href="{{ url('/details') }}/{{ $item->slug }}" target="_self">{{ $item->title }} </a></h2>
                </div>
                <!----category_article_title------>
  <div class="category_article_date"> <a href="{{ url('/author') }}/{{ $item->creator->id }}"  >{{ $item->creator->name }}</a>, {{ date('F j,Y',strtotime( $item->created_at )) }}</div>
                <!----category_article_date------>
                <div class="category_article_content">
                    {{ str_limit( $item->short_description,100,'...' )  }}
                </div>
                <!----category_article_content------>
                <div class="media_social">
                     
                    <span><i class="fa fa-comments-o"></i><a href="#">{{ count($item->comments) }}</a> Comments</span>
                </div>
                <!----media_social------>
            </div>
        </div>
    </div>
    @else
    @if($key === 1)
    <div class="category_article_wrapper">
        <div class="row">
            @endif
            <div class="col-md-6" style="margin-bottom: 2%">
                <div class="media">
                    <div class="media-left">
                        <a href="{{ url('/details') }}/{{ $item->slug }}"><img class="media-object" src="{{ asset('public/post') }}/{{ $item->thumb_image }}"
                                         alt="{{ $item->title }}"></a>
                    </div>
                    <div class="media-body">
                        <span class="tag purple">{{ $category->name }}</span>

                        <h3 class="media-heading"><a href="{{ url('/details') }}/{{ $item->slug }}" >{{ $item->title }}</a></h3>
                        <span class="media-date"><a href="{{ url('/author') }}/{{ $item->creator->id }}"  >{{ $item->creator->name }}</a>, {{ date('F j,Y',strtotime( $item->created_at )) }}</span>

                        <div class="media_social">
                            
                            <span><a href="#"><i class="fa fa-comments-o"></i>{{ count($item->comments) }}</a> Comments</span>
                        </div>
                    </div>
                </div>
                 
            </div>
           @if($loop->last)
        </div>
    </div>
     @endif
    @endif
    @endforeach
    <p class="divider"><a href="{{ url('/category') }}/{{ $category->id }}">More News&nbsp;&raquo;</a></p>
    @endforeach
</div>
<!-- Mobile News Section -->

 </div>
<!-- Left Section -->

<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Viewed</a></h2>
    </div>

   @foreach($shareData['most_viewed'] as $item)

    <div class="media">
        <div class="media-left">
            <a href="{{ url('/details') }}/{{ $item->slug }}">
                <img class="media-object" src="{{ asset('public/post') }}/{{ $item->thumb_image  }}" alt="{{ $item->title }}"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{ url('/details') }}/{{ $item->slug }}">{{ $item->title }}</a>
            </h3> <span class="media-date">
                <a href="#">{{ date('j F -y',strtotime($item->created_at)) }}</a>,  by:
                 <a href="{{ url('/author') }}/{{ $item->creator->id }}">{{ $item->creator->name }}</a></span>

            <div class="widget_article_social">
                
                <span>
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{ count($item->comments) }}</a> Comments
                </span>
            </div>
        </div>
    </div>
    @endforeach
     
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<!-- Popular News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive adv_img" src="{{ asset('public/front/img/right_add1.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('public/front/img/right_add2.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('public/front/img/right_add3.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('public/front/img/right_add4.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{ asset('public/front/img/right_add5.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

 
<!-- Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Commented</a></h2>
    </div>

    @foreach($shareData['most_commented'] as $item)
    <div class="media">
        <div class="media-left">
            <a href="{{ url('/details') }}/{{ $item->slug }}"><img class="media-object" src="{{ asset('public/post') }}/{{ $item->thumb_image  }}" alt="{{ $item->title }}"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{ url('/details') }}/{{ $item->slug }}" >{{ $item->title }}</a>
            </h3>

            <div class="media_social">
                <span><i class="fa fa-comments-o"></i><a href="#">{{ $item->comments_count }}</a> Comments</span>
            </div>
        </div>
    </div>
    @endforeach
  
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
</div>
<!-- Most Commented News -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Editor Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{ asset('public/front/img/editor.jpg')}}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!-- Editor News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive add_img" src="{{ asset('public/front/img/right_add7.jpg')}} " alt="add_one">
    <img class="img-responsive add_img" src="{{ asset('public/front/img/right_add7.jpg')}} " alt="add_one">
    <img class="img-responsive add_img" src="{{ asset('public/front/img/right_add7.jpg')}} " alt="add_one">
    <img class="img-responsive add_img" src="{{ asset('public/front/img/right_add7.jpg')}} " alt="add_one">
</div>
<!--Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Readers Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{ asset('public/front/img/reader.jpg')}}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!--  Readers Corner News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{ asset('public/front/img/podcast.jpg')}}" alt="add_one">
</div>
<!--Advertisement-->
</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>
<!-- Category News Section -->

<section id="video_section" class="video_section">
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MJ-jbFdUPns"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-6 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h5Jni-vy_5M"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wQ5Gj0UB_R8"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UPvJXBI_3V4"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTCtj5Wz6BM"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

            </div>
            <!-- row -->

        </div>
        <!-- well -->

    </div>
    <!-- Container -->

</section>
<!-- Video News Section -->

@endsection