<div style="margin:0px 50px 0px 50px;">

    @if($pages)

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Імя</th>
            <th>Псевдонім</th>
            <th>Текст</th>
            <th>Дата створення</th>

            <th>Видалити</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pages as $k => $page)

        <tr>

            <td>{{ $page->id }}</td>
            <td>{!! Html::link(route('pagesEdit',['page'=>$page->id]),$page->name,['alt'=>$page->name]) !!}</td>
            <td>{{ $page->alias }}</td>
            <td>{{ $page->text }}</td>
            <td>{{ $page->created_at }}</td>
            <td>
            {!! Form::open(['url'=>route('pagesDestroy',['page'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
            {!! Form::hidden('_method', 'delete') !!}
            {!! Form::button('Видалити',['class'=>'btn btn-danger', 'type'=>'submit']) !!}
            {!! Form::close() !!}
            </td>
        </tr>

        @endforeach


        </tbody>
    </table>
    @endif

    {!! Html::link(route('pagesAdd'),'Нова сторінка') !!}

</div>