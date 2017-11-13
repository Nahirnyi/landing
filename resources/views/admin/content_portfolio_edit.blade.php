<div class="wrapper container-fluid">

    {!! Form::open(['url' => route('admin.portfolios.update',['portfolios'=>$data['id']]),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    {!! Form::hidden('_method', 'patch') !!}
    <div class="form-group">
        {!! Form::label('name', 'Назва:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'Введіть назву сторінки']) !!}
        </div>
    </div>
    {!! Form::hidden('id', $data['id']) !!}
    <div class="form-group">
        {!! Form::label('filter', 'Фільтр:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('filter', $data['filter'], ['class' => 'form-control','placeholder'=>'Введіть псевдонім сторінки']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Зображення:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/img/'.$data['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
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