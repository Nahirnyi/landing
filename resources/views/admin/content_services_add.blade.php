<div class="wrapper container-fluid">

    {!! Form::open(['url' => route('servicesStore'),'class'=>'form-horizontal','method'=>'POST']) !!}


    <div class="form-group">

        {!! Form::label('name','Назва',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Введіть назву сервіса'])!!}
        </div>

    </div>




    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введіть текст сторінки']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('icon', 'Іконка:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('icon', old('icon'), ['class' => 'form-control','placeholder'=>'Задайте іконку сервіса']) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Зберегти', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>



    {!! Form::close() !!}

    <script>
        CKEDITOR.replace('editor');
    </script>

</div>
