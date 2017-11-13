<div style="margin:0px 50px 0px 50px;">
    @if($portfolios)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Імя</th>
                <th>Фільтр</th>
                <th>Зображення</th>
                <th>Дата створення</th>
                <th>Видалити</th>
            </tr>
            </thead>
            <tbody>
            @foreach($portfolios as $k => $portfolio)
                <tr>
                    <td>{{$portfolio->id}}</td>
                    <td>  {!! Html::link(route('admin.portfolios.edit',['portfolios'=>$portfolio->id]),$portfolio->name,['alt'=>$portfolio->name]) !!}  </td>
                    <td>{{$portfolio->filter}}</td>
                    <td>{!! Html::image('assets/img/'.$portfolio->images,'', array('style' => 'width:150px' )) !!}</td>
                    <td>{{$portfolio->created_at}}</td>
                    <td>

                        {!! Form::open(['url' => route('admin.portfolios.destroy',['portfolios'=>$portfolio->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Видалити', ['class' => 'btn btn-danger','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

    {!! Html::link(route('admin.portfolios.create'),'Нова сторінка') !!}
</div>