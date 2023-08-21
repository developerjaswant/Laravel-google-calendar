<!-- FOOTER -->
      <footer class="grid">
        <!-- Footer - top -->
        <!-- Image-->
        @foreach($pages2 as $key=>$page)
        <div class="s-12 l-3 m-row-3 margin-bottom background-image" style="background-image:url({{asset('public'.$page->image)}})"></div>
        
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase">{{$page->short_describation}}</h2>
           <p>{{$page->meta_describation}}</p>
        </div>
        
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase">{{$page->short_describation}}</h2>
           <img class="full-img" src="public/assets/img/map.svg" alt=""/>
        </div>
        
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase">{{$page->title1}}</h2>
           <p><b class="text-primary margin-right-10">P</b> {{$page->title2}}</p>
           <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:{{$page->title3}}">{{$page->title3}}</a></p>
           <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:{{$page->title4}}">{{$page->title4}}</a></p>
        </div>
        @endforeach
        @foreach($pages3 as $key=>$page) 
        <!-- Footer - bottom -->
        <div class="s-12 text-center margin-bottom">
          <p class="text-size-12">{{$page->title1}}</p>
          <p class="text-size-12">{{$page->short_describation}}</p>
          <p><a class="text-size-12 text-primary-hover" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">{{$page->meta_describation}}</a></p>
        </div>
        @endforeach
      </footer>            