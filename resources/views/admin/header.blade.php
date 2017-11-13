<div class="container portfolio_title">

    <!-- Title -->
    <div class="section-title">
        <h2><a style="float: left;" href="/" class="btn btn-primary">
                Сайт
            </a>

        {{$title}}  <a style="float: right;" href="{{ route('logout') }}" class="btn btn-danger"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Вийти
                </a></h2>

    </div>
    <!--/Title -->

</div>
<!-- Container -->

<div class="portfolio">

    <div id="filters" class="sixteen columns">
        <ul style="padding:0px 0px 0px 0px">
            <li><a  href="{{route('pages')}}">
                    <h5>Сторінки</h5>
                </a>
            </li>  
           

            <li><a href="{{route('services')}}">
                    <h5>Сервіси</h5>
                </a>
            </li>

          
               
            
        </ul>
        
    </div>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
</div>
