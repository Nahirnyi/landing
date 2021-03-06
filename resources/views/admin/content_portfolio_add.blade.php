<div class="wrapper container-fluid">

    {!! Form::open(['url' => route('admin.portfolios.store'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Назва:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder'=>'Введіть назву сторінки']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('filter', 'Фільтр:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('filter', old('filter'), ['class' => 'form-control','placeholder'=>'Введіть псевдонім сторінки']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Зображення:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Виберіть зображення','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла немає"]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Зберегти', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>